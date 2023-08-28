<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class Home extends Controller
{
    //
    public function index(){
        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id','=',Session::get('loginId'))->first();
            $name = $data->name;
        }else{
            $name = "Guest";
        }
        return view('home' , compact('data','name'));
        //return view('home');
    }
}
