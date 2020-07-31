<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\StandDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

class PaymentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $payments = DB::table('payments')
            ->join('clients', 'payments.client_id', '=', 'clients.id')
            ->join('stands', 'payments.stand_id', '=', 'stands.id')
            ->join('locations', 'stands.location_id', '=', 'locations.id')
            ->select('payments.*', 'clients.name', 'stands.stand_number', 'stands.size', 'locations.name as location')
            ->where('clients.is_deleted', '=', 0)
            ->get();

        return view('payments.index', compact('payments'));
    }

    public function runBilling()
    {
        $user_id = Auth::id();
//    	$clients = DB::select('SELECT stand_details.* FROM `stand_details` WHERE
//								status = 0 AND
//								(
//								    com_date < CURRENT_DATE() OR
//								    (MONTH(DATE_ADD(CURRENT_DATE(), INTERVAL 15 DAY)) = MONTH(com_date)) AND
//								    (YEAR(DATE_ADD(CURRENT_DATE(), INTERVAL 15 DAY)) = YEAR(com_date))
//								)');
        $clients = StandDetail::query()
            ->where('status', 0)
            ->get();
        foreach ($clients as $client) {
            $balance = $client->monthly_installment + $client->balance;

            DB::table('invoices')->insert([
                'client_id' => $client->client_id,
                'stand_id' => $client->stand_id,
                'amount' => $balance,
                'description' => 'Invoice for the month of',
                "created_by" => $user_id,
                "created_at" => Carbon::now()]);

            $stand = DB::table('stand_details')
                ->join('stands', 'stand_details.stand_id', '=', 'stands.id')
                ->join('locations', 'stands.location_id', '=', 'locations.id')
                ->join('users', 'stand_details.created_by', '=', 'users.id')
                ->select('stand_details.*', 'stands.stand_number', 'stands.size', 'locations.name as location', 'users.name as created_by')
                ->where([['stand_details.client_id', '=', $client->client_id], ['stand_details.stand_id', '=', $client->stand_id]])
                ->get();

            $balance = $stand[0]->balance + $client->monthly_installment;

            DB::table('stand_details')
                ->where('id', $stand[0]->id)
                ->update([
                    "balance" => $balance,
                    "updated_by" => $user_id,
                    "updated_at" => Carbon::now(),
                ]);
        }

        return redirect('/payments');
    }

    public function makePayment(Request $request)
    {
        $user_id = Auth::id();

        $data = request()->validate([
            'stand_id' => 'required|numeric',
            'client_id' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        $id=Payment::query()->create([
            'created_by' => $user_id,
            'amount' => $request->input('amount'),
            'client_id' => $request->input('client_id'),
            'stand_id' => $request->input('stand_id')
        ]);

        $entry = StandDetail::query()
            ->where('client_id', $request->input('client_id'))
            ->where('stand_id', $request->input('stand_id'))
            ->first();
        $amount_paid = $entry->amount_paid + $request->input('amount');

        $balance = $entry->balance - $request->input('amount');

        if ($amount_paid == $entry->price) {
            $status = 1;
        } else {
            $status = 0;
        }
        $entry->update([
            "balance" => $balance,
            "amount_paid" => $amount_paid,
            "status" => $status,
            "updated_by" => $user_id
        ]);
        return redirect('/payment/' . $id->id . '/view');
    }

    public function view($id)
    {

        $data = DB::table('payments')
            ->join('clients', 'payments.client_id', '=', 'clients.id')
            ->join('stands', 'payments.stand_id', '=', 'stands.id')
            ->join('locations', 'stands.location_id', '=', 'locations.id')
            ->select('payments.*', 'clients.name', 'clients.phone', 'clients.email', 'stands.stand_number', 'stands.size', 'locations.name as location')
            ->where('payments.id', $id)
            ->get();

        $payment = $data[0];

        return view('payments.view', compact('payment'));
    }
}
