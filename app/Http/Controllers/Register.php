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
        return view('registration');
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
}
