<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Location;
use App\Models\Stand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
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
        $clients = Client::query()->where('is_deleted', 0)->count();
        $sold_stands = Stand::query()->where('status', 1)->count();
        $stands = Stand::query()->where('is_deleted', 0)->count();
        $locations = Location::query()->where('is_deleted', 0)->count();

        $locs = Location::query()->where('is_deleted', 0)->get();
        $checks = Stand::all()->where('is_deleted', 0)->groupBy(['location_id','size']);
       //dd($checks);
        $checks=json_decode($checks);
//        dd($checks);
        return view('home', compact('clients', 'sold_stands', 'stands', 'locations','checks','locs'));
    }

    public function locationGraph()
    {
        $sold = DB::select("SELECT locations.id, locations.name, count( stands.id ) count
                            FROM locations
                            INNER JOIN stands ON locations.id = stands.location_id
                            WHERE stands.status = 1
                            GROUP BY locations.id");

        $notSold = DB::select("SELECT locations.id, locations.name, count( stands.id ) count
                            FROM locations
                            INNER JOIN stands ON locations.id = stands.location_id
                            WHERE stands.status = 0
                            GROUP BY locations.id");

        $stands = DB::select("SELECT locations.id, locations.name, count( stands.id ) count
                            FROM locations
                            INNER JOIN stands ON locations.id = stands.location_id
                            WHERE stands.is_deleted = 0
                            GROUP BY locations.id");

        $data = [
            'sold' => $sold,
            'notSold' => $notSold,
            'stands' => $stands,
        ];

        return json_encode($data);
    }
}
