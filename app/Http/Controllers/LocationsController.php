<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

class LocationsController extends Controller
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
        $locations = DB::table('locations')
                    ->select('locations.*')
                    ->where('locations.is_deleted', '=', 0)
                    ->get();

        return view('locations.index', compact('locations'));
    }

     public function create(){
        return view('locations.create');
    }

    public function store(){
    	$user_id = Auth::id();
        $data = request()->validate([
            'name' => 'required',
        ]);

        DB::table('locations')->insert(array_merge($data, ["created_by"=> $user_id, "created_at"=> Carbon::now()]));

        return redirect('/locations');
    }

    public function edit($id){
    	 $location = DB::table('locations')
                    ->select('locations.*')
                    ->where('locations.id', '=', $id)
                    ->get();
                    
    	return view('locations.edit', compact('location'));
    }

    public function update($id)
    {
    	$user_id = Auth::id();
        $data = request()->validate([
            'name' => 'required',
        ]);

        DB::table('locations')
            ->where('id', $id)
            ->update(array_merge($data, ["updated_by"=> $user_id, "updated_at"=> Carbon::now()]));

        return redirect("/locations");
    }

    public function delete($id)
    {
        DB::table('locations')
            ->where('id', $id)
            ->update(['is_deleted' => 1, 'updated_at' => Carbon::now()]);
        return redirect("/locations");
    }
}
