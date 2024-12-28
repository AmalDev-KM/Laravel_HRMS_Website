<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function dologin(){
        $input = request()->only(['username','password']);
        if(auth()->guard('admin')->attempt($input)){
            return redirect()->route('admin.dashboard');
        }
        else{
            return "login Failed";
        }
    }
}
