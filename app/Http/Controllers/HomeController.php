<?php

namespace App\Http\Controllers;

use App\Mail\SendInvite;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function create_role()
    {
        return view('Users.create-role');
    }

    public function store_role(Request $request)
    { $this->validate($request, [
        'role' => 'required',
    ]);
        $role_name = $request->input('role');
        $role = new Role(['role' => $role_name,]);
        $role->save();
        return redirect()->route('index');
    }

    public function invite_form()
    {
        return view('Users.invite-user');
    }

    public function invite_mail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);
        $user = $request->input('email');
        $role = Input::get('role');
        $sender = $request->user()->email;
        $sender_name = $request->user()->name;

        Mail::send(new SendInvite($user, $role, $sender, $sender_name));

        return redirect()->route('invite');
    }

    public function user_list(){

        $users =User::orderBy('created_at', 'asc')->get();

        return view('Users.listed-users', compact('users'));
    }

    public function show_user_edit($id)
    {
        $user = User::where('id', '=', $id)->firstOrFail();
        return view("Users.edit-user", ['user'=>$user, 'userId'=>$id]);
    }

    public function update_user(Request $request)
    {
        $user_id = $request->get('id');
        $role = Input::get('role');

        $user = User::find($user_id);
        $user->role_id = $role;

        $user->save();

        return redirect()->route('users.list');
    }

    public function delete_user($id){
        User::where('id' , $id)->delete();
        return redirect()->route('users.list');
    }

}
