<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Stand;
use App\Models\StandDetail;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

class ReportsController extends Controller
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
        $paid = StandDetail::query()->where('is_deleted', 0)->sum('amount_paid');
        $armotisation = StandDetail::query()->where('is_deleted', 0)->sum('armotisation');
        $sold_stands = Stand::query()->where('status', 1)->count();
        $stands = Stand::query()->where('is_deleted', 0)->count();
        $value_amount = StandDetail::query()->where('is_deleted', 0)->sum('price');
        $locations = Location::query()->where('is_deleted', 0)->get();
        $amount_paid=$paid+$armotisation;
        return view('reports.index', compact('amount_paid', 'sold_stands', 'stands', 'value_amount', 'locations'));
    }

    public function data()
    {
        $data = DB::select('SELECT SUM(stand_details.amount_paid) amount_paid, locations.name, locations.id
                            FROM stand_details
                            INNER JOIN stands ON stand_details.stand_id = stands.id
                            INNER JOIN locations ON stands.location_id = locations.id
                            WHERE stand_details.is_deleted = 0
                            GROUP BY locations.id');

        return json_encode($data);
    }

    public function revenue(Request $request)
    {
        $startDate = $request['startDate'];
        $endDate = $request['endDate'];

        $revenue = DB::select("SELECT SUM(payments.amount) revenue, locations.name, locations.id
                            FROM stands
                            INNER JOIN locations ON stands.location_id = locations.id
                            INNER JOIN payments ON stands.id = payments.stand_id
                            WHERE payments.is_deleted = 0 AND (payments.created_at BETWEEN DATE_SUB(CAST('" . $startDate . "' AS DATE), INTERVAL 1 DAY) AND DATE_ADD(CAST('" . $endDate . "' AS DATE), INTERVAL 1 DAY))
                            GROUP BY locations.id");

        return json_encode($revenue);
    }

    function reportByLocation(Request $request)
    {
        $stands = Stand::query()->where('location_id', $request->id)->get();
        $revenue = 0;
        $value = 0;
        $name = Location::query()->where('id', $request->id)->value('name');
        foreach ($stands as $stand) {
            $rev = StandDetail::query()->where('stand_id', $stand->id)->first();
            $revenue+=$rev['amount_paid']+$rev['armotisation'];
            $value += $rev['price'];
        }
        $sold = Stand::query()->where('location_id', $request->id)->where('status', 1)->count();
        $total = Stand::query()->where('location_id', $request->id)->count();
        //revenue received by stand size

        //stands activity

        //stands count by size
        $size=Stand::query()->where('location_id',$request->id)->distinct()->get();

        return view('reports.locations', compact('revenue', 'name', 'sold', 'total', 'value'));
    }

    public function reportByLocationData($id)
    {
        $amount_paid = DB::table('stand_details')
            ->join('stands', 'stand_details.stand_id', '=', 'stands.id')
            ->join('locations', 'stands.location_id', '=', 'locations.id')
            ->where([['stand_details.is_deleted', 0], ['locations.id', $id]])
            ->sum('amount_paid');
        $sold_stands = DB::table('stands')
            ->where([['status', 1], ['location_id', $id]])
            ->count();
        $stands = DB::table('stands')
            ->where([['is_deleted', 0], ['location_id', $id]])
            ->count();
        $value_amount = DB::table('stand_details')
            ->join('stands', 'stand_details.stand_id', '=', 'stands.id')
            ->join('locations', 'stands.location_id', '=', 'locations.id')
            ->where([['stand_details.is_deleted', 0], ['locations.id', $id]])
            ->sum('price');

        $overview = [
            'amount_paid' => $amount_paid,
            'sold_stands' => $sold_stands,
            'stands' => $stands,
            'value_amount' => $value_amount,
        ];

        $revenue = DB::select("SELECT SUM(stand_details.amount_paid) amount_paid, locations.name,                               stands.size
                            FROM stand_details
                            INNER JOIN stands ON stand_details.stand_id = stands.id
                            INNER JOIN locations ON stands.location_id = locations.id
                            WHERE stand_details.is_deleted = 0 AND locations.id = " . $id . "
                            GROUP BY stands.size");

        $sold = DB::select("SELECT locations.name, locations.id, stands.size, COUNT(stands.id) count
                            FROM stands
                            INNER JOIN locations ON stands.location_id = locations.id
                            WHERE stands.is_deleted = 0 AND status = 1 AND locations.id = " . $id . "
                            GROUP BY stands.size");

        $notSold = DB::select("SELECT locations.name, locations.id, stands.size, COUNT(stands.id) count
                            FROM stands
                            INNER JOIN locations ON stands.location_id = locations.id
                            WHERE stands.is_deleted = 0 AND status = 0 AND locations.id = " . $id . "
                            GROUP BY stands.size");

        $standsCount = DB::select("SELECT locations.name, locations.id, stands.size, COUNT(stands.id) count
                            FROM stands
                            INNER JOIN locations ON stands.location_id = locations.id
                            WHERE stands.is_deleted = 0 AND locations.id = " . $id . "
                            GROUP BY stands.size");

        $data = [
            'overview' => $overview,
            'revenue' => $revenue,
            'sold' => $sold,
            'notSold' => $notSold,
            'standsCount' => $standsCount,
        ];

        return json_encode($data);
    }
}
