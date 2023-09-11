<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    //
    public function index(){
        $user = User::get();
        return view('registration');
    }

    public function user_list(){
        $user = User::where('user_role', '!=' , 'S')
        ->get();
        $data = compact('user');
        return view('/User/userlist')->with($data);
    }

    public function register(Request $req){
        // echo "<pre>";
        // print_r($req->name);
        // echo "<pre>";
        $req->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);
        $data['name'] = $req->username;
        $data['email'] = $req->email;
        $data['password'] = Hash::make($req->password);
        $user = User::create($data);
        if(!$user){
            return redirect(route('reg'))->with("error", "Registration unsuccessful");
        }
        return redirect(route('log'))->with("success","Registratiom Successful");;
    }
    public function user_edit($id){
        $user = User::findOrFail($id);
        $status = [
            [
                'label' => 'active',
                'value' => 1,
            ],
            [
                'label' => 'inactive',
                'value' => 0,
            ]
        ];

        $role = [
            [
                'label' => 'Admin',
                'value' => 'A',
            ],
            [
                'label' => 'User',
                'value' => 'U',
            ],
            [
                'label' => 'Guest',
                'value' => 'G',
            ]
        ];

        return view('/User/userlistedit', compact('status','role', 'user'));
    }

    public function user_update($id , Request $req){
        $user = User::findOrFail($id);

        $user->status = $req->status;
        $user->user_role = $req->user_role;

        $user->save();

        return redirect()->route('userlist');
    }

    public function user_delete($id){
        
    }
}
