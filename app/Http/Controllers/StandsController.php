<?php

namespace App\Http\Controllers;

use App\Models\Stand;
use App\Models\Stands;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Imports\StandsImport;
use DB;
use Maatwebsite\Excel\Facades\Excel;;

class StandsController extends Controller
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
    	$stands = DB::table('stands')
    	->join('locations', 'stands.location_id', '=', 'locations.id')
    	->select('stands.*', 'locations.name')
    	->where('stands.is_deleted', '=', 0)
    	->get();

    	return view('stands.index', compact('stands'));
    }

    public function create(){
    	//$locations = Location::pluck('name', 'id');
    	$locations = DB::table('locations')
                    ->select('locations.name', 'locations.id')
                    ->where('locations.is_deleted', '=', 0)
                    ->get();

    	return view('stands.import', compact('locations'));
    }

    public function import(Request $request) {
    	
         $data = request()->validate([
            'file'  => 'required|mimes:xls,xlsx,csv',
            'location_id'  => 'required',
        ]);

    	if ($request->file('file')) {
            Excel::import(new StandsImport($data['location_id']), request()->file('file'));
            return redirect('/stands');
        }

    }

    public function view($id){

        $data = DB::table('stand_details')
        ->join('stands', 'stand_details.stand_id', '=', 'stands.id')
        ->join('locations', 'stands.location_id', '=', 'locations.id')
        ->join('clients', 'stand_details.client_id', '=', 'clients.id')
        ->join('users', 'stand_details.created_by', '=', 'users.id')
        ->select('stand_details.*', 'locations.name as location', 'stands.stand_number', 'stands.size', 'clients.name', 'clients.phone', 'clients.email', 'clients.national_id', 'clients.address', 'clients.dob', 'clients.marital_status', 'clients.spouse', 'clients.spouse_phone', 'clients.spouse_address', 'clients.spouse_national_id', 'users.name as approved_by')
        ->where('stand_details.stand_id', '=', $id)
        ->get();
        if (count($data) > 0) {
            $details = $data[0];
            //dd($data);
        } else {
            return redirect()->back()->with("error","Nothing to view for this stand");
//            $details = [
//                "id"=> null,
//                "client_id"=> null,
//                "stand_id"=> null,
//                "price"=> null,
//                "armotisation"=> null,
//                "mortgage_protection"=> null,
//                "monthly_installment"=> null,
//                "com_date"=> null,
//                "name"=> null,
//                "relationship"=> null,
//                "address"=> null,
//                "phone"=> null,
//                "status"=> null,
//                "balance"=> null,
//                "amount_paid"=>null,
//                "attachment"=> null,
//                "created_by"=> null,
//                "updated_by"=> null,
//                "is_deleted"=> null,
//                "created_at"=> null,
//                "updated_at"=> null,
//                "location"=> null,
//                "stand_number"=> null,
//                "size"=> null,
//                "email"=> null,
//                "national_id"=> null,
//                "dob"=> null,
//                "marital_status"=> null,
//                "spouse"=> null,
//                "spouse_phone"=> null,
//                "spouse_address"=> null,
//                "spouse_national_id"=> null,
//                "approved_by"=> null
//            ];
        }

//        dd($details);
        return view('stands.view', compact('details'));
    }

    public function delete($id){

      //  Stand::query()->where('id',$id)->delete();

        DB::table('stands')
            ->where('id', $id)
            ->update(['is_deleted' => 1, 'updated_at' => Carbon::now()]);
        return redirect("/stands");
    }

}
