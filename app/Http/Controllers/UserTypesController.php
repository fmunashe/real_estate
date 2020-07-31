<?php

namespace App\Http\Controllers;

use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

class UserTypesController extends Controller
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
        $user_types = DB::table('user_types')
                    ->select('user_types.*')
                    ->where('user_types.is_deleted', '=', 0)
                    ->get();

        return view('user_types.index', compact('user_types'));
    }

     public function create(){
        return view('user_types.create');
    }

    public function store(){
    	$user_id = Auth::id();
        $data = request()->validate([
            'name' => 'required',
        ]);

        DB::table('user_types')->insert(array_merge($data, ["created_by"=> $user_id, "created_at"=> Carbon::now()]));

        return redirect('/user/types');
    }

    public function edit($id){
    	 $user_type = DB::table('user_types')
                    ->select('user_types.*')
                    ->where('user_types.id', '=', $id)
                    ->get();
                    
    	return view('user_types.edit', compact('user_type'));
    }

    public function update($id)
    {
    	$user_id = Auth::id();
        $data = request()->validate([
            'name' => 'required',
        ]);

        DB::table('user_types')
            ->where('id', $id)
            ->update(array_merge($data, ["updated_by"=> $user_id, "updated_at"=> Carbon::now()]));

        return redirect("/user/types");
    }

    public function delete($id)
    {
        DB::table('user_types')
            ->where('id', $id)
            ->update(['is_deleted' => 1, 'updated_at' => Carbon::now()]);
        return redirect("/user/types");
    }
}
