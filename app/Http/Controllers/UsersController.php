<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        //$users = User::all();
        $users = DB::table('users')
            ->join('user_types', 'users.user_type_id', '=', 'user_types.id')
            ->select('users.*', 'user_types.name as user_type')
            ->where('users.is_deleted', '=', 0)
            ->get();

        return view('users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = DB::table('users')->find($id);
        $types = UserType::query()->pluck('name', 'id');
        return view('users.edit', compact('user', 'types'));
    }

    public function update(Request $request, User $user)
    {
        $user_id = Auth()->user()->id;
        request()->validate([
            'email' => 'required|email',
            'name' => 'required|string',
            'user_type' => 'required',
        ]);
        if ($request->password == null) {
            $password = $user->password;
        } else {
            $password = Hash::make($request->input('password'));
        }

        $user->update([
            'name' => $request->input('name'),
            'user_type_id' => $request->input('user_type'),
            'password' => $password,
            'updated_by' => $user_id
        ]);
        return redirect('/users')->with("success", "User updated successfully !");
    }

    public function profile()
    {
        return view('users.profile');
    }

    public function showChangePasswordForm()
    {
        return view('users.change_password');
    }

    public function changePassword(Request $request)
    {

        if (!(Hash::check($request->get('current-password'), Auth()->user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }

        $user_id = Auth()->user()->id;
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth()->user();
        $user->password = bcrypt($request->get('new-password'));
        $user->updated_by = $user_id;
        $user->save();

        return redirect()->back()->with("success", "Password changed successfully !");
    }

    public function resetPassword()
    {
        $user_id = Auth::id();
        $data = request()->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        DB::table('users')
            ->where('id', request('id'))
            ->update(['password' => $data['password'], 'updated_by' => $user_id, 'updated_at' => Carbon::now()]);

        return redirect()->back()->with("success", "Password reset successfully !");
    }

    public function delete($id)
    {

        User::query()->where('id', $id)->delete();

        return redirect("/users");
    }
}
