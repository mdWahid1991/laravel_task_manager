<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;
use Session;


class Login extends Controller
{
    //
    public function index(){
        return view('login');
    }

    public function login(Request $req){
        $req->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $userdata = User::where('name','=',$req->username )->first();
        if($userdata)
        {
            if(Hash::check($req->password, $userdata->password)){
                if($userdata -> status == 0)
                {
                    return back()->with('error', 'Your account is waiting for admin approval');
                }else{
                $req->session()->put('loginId',$userdata->id);
                $req->session()->put('user_name',$userdata->name);
                $req->session()->put('status',$userdata->status);
                $req->session()->put('user_role',$userdata->user_role);
                $s = session()->all();

                // echo '<pre>';
                // print_r($s); 

                return redirect(route('home'));
                }
            }else{
                return back()->with('error', 'password do not match');
            } 

        }else{
            return back()->with('error', 'user not found');
        }

        
     

        
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('home'));
    }
}
