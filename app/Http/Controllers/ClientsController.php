<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Location;
use App\Models\Stand;
use App\Models\StandDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

class ClientsController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clients = Client::query()
            ->where('is_deleted', '=', 0)
            ->get();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store()
    {
        $user_id = Auth::id();

        $data = request()->validate([
            'name' => 'required|string',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'phone' => 'required|string',
            'address' => 'required|string',
            'national_id' => 'required|string',
            'dob' => 'required',
            'marital_status' => 'required|string',
            'spouse' => ['nullable', 'string'],
            'spouse_phone' => ['nullable', 'string'],
            'spouse_address' => ['nullable', 'string'],
            'spouse_national_id' => ['nullable', 'string'],
        ]);

        DB::table('clients')->insert(array_merge($data, ['dob' => Carbon::createFromFormat('d-m-Y', $data['dob']), "created_by" => $user_id, "created_at" => Carbon::now()]));

        $id = DB::getPdo()->lastInsertId();

        return redirect('/client/' . $id . '/view');
    }

    public function edit($id)
    {
        $status = array(
            'Married' => 'Married',
            'Single' => 'Single',
            'Divorced' => 'Divorced',
            'Widowed' => 'Widowed',
        );

        $client=Client::query()
            ->where('id',$id)
            ->get();

        return view('clients.edit', compact('client', 'status'));
    }

    public function view($id)
    {

        $client=Client::query()
            ->where('id',$id)
            ->get();

        $stands = DB::table('stand_details')
            ->join('stands', 'stand_details.stand_id', '=', 'stands.id')
            ->join('locations', 'stands.location_id', '=', 'locations.id')
            ->join('users', 'stand_details.created_by', '=', 'users.id')
            ->select('stand_details.*', 'stands.stand_number', 'stands.size', 'locations.name as location', 'users.name as created_by')
            ->where('stand_details.client_id', '=', $id)
            ->get();

        $invoices = DB::table('invoices')
            ->join('stands', 'invoices.stand_id', '=', 'stands.id')
            ->join('locations', 'stands.location_id', '=', 'locations.id')
            ->select('invoices.*', 'stands.stand_number', 'stands.size', 'locations.name as location')
            ->where('invoices.client_id', '=', $id)
            ->get();

        $payments = DB::table('payments')
            ->join('clients', 'payments.client_id', '=', 'clients.id')
            ->join('stands', 'payments.stand_id', '=', 'stands.id')
            ->join('locations', 'stands.location_id', '=', 'locations.id')
            ->select('payments.*', 'stands.stand_number', 'stands.size', 'locations.name as location', 'clients.name')
            ->where('payments.client_id', '=', $id)
            ->get();

        return view('clients.view', compact('client', 'stands', 'invoices', 'payments'));
    }

    public function update(Client $client)
    {
        $user_id = Auth::id();
        $data = request()->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'national_id' => 'required|string',
            'dob' => 'required',
            'marital_status' => 'required|string',
            'spouse' => ['nullable', 'string'],
            'spouse_phone' => ['nullable', 'string'],
            'spouse_address' => ['nullable', 'string'],
            'spouse_national_id' => ['nullable', 'string'],
        ]);

        $client->update(array_merge($data, ["updated_by" => $user_id, "updated_at" => Carbon::now()]));
        return redirect("/clients");
    }

    public function stand($id)
    {

        $locations = Location::query()->where('is_deleted', 0)->get();

        return view('clients.add_stand', compact('id', 'locations'));
    }

    public function addStand($id)
    {
        $user_id = Auth::id();

        $data = request()->validate([
            'stand_id' => 'required|string',
            'location_id' => ['required', 'string'],
            'price' => ['required', 'string'],
            'armotisation' => 'required|string',
            'mortgage_protection' => 'nullable|string',
            'monthly_installment' => 'required|string',
            'com_date' => 'required',
            'name' => 'required|string',
            'relationship' => ['required', 'string'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'attachment' => ['required'],
        ]);

        $stand = Stand::query()
            ->where('stand_number', $data['stand_id'])
            ->where('location_id', $data['location_id'])
            ->first();
        //dd(count($stand));
        if ($stand) {
            //dd($stand);
            $stand_id = $stand->id;

            $stand_details = StandDetail::query()
                ->where('stand_id', $stand->id)
                ->exists();

            if ($stand_details) {
                //dd($stand_details);
                return redirect()->back()->with("error", "Stand has already been purchased.");

            } else {
                $attachmentPath = request('attachment')->store('applications', 'public');

                StandDetail::query()->create([
                    'stand_id' => $stand->id,
                    'client_id' => $id,
                    'price' => $data['price'],
                    'armotisation' => $data['armotisation'],
                    'mortgage_protection' => $data['mortgage_protection'],
                    'monthly_installment' => $data['monthly_installment'],
                    'name' => $data['name'],
                    'relationship' => $data['relationship'],
                    'address' => $data['address'],
                    'phone' => $data['phone'],
                    'attachment' => $attachmentPath,
                     'com_date'=> Carbon::createFromFormat('d-m-Y', $data['com_date']),
                    "created_by" => $user_id, "created_at" => Carbon::now()
                ]);

                Stand::query()
                    ->where('id', $stand->id)
                    ->update([
                        "status" => 1,
                        "updated_by" => $user_id,
                        "updated_at" => Carbon::now(),
                    ]);
                return redirect('/client/' . $id . '/view');
            }
        } else {
            return redirect()->back()->with("error", "Stand number is not available for selected location.");
        }
    }

    public function invoice($id)
    {
        $data = DB::table('invoices')
            ->join('clients', 'invoices.client_id', '=', 'clients.id')
            ->join('stands', 'invoices.stand_id', '=', 'stands.id')
            ->join('locations', 'stands.location_id', '=', 'locations.id')
            ->select('clients.*', 'invoices.amount', 'invoices.created_at', 'invoices.description', 'stands.stand_number', 'stands.size', 'locations.name as location')
            ->where('invoices.id', '=', $id)
            ->get();

        $invoice = $data[0];

        return view('clients.invoice', compact('invoice'));
    }

    public function delete($id)
    {
        Client::query()
            ->where('id', $id)
            ->update(['is_deleted' => 1, 'updated_at' => Carbon::now()]);
        return redirect("/clients");
    }
}
