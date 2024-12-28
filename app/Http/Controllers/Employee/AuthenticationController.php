<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterEmployeeRequest;
use App\Http\Requests\LoginEmployeeRequest;

class AuthenticationController extends Controller
{
    public function register(){
        return view('employee.register');
    }

    public function doregister(RegisterEmployeeRequest $request){
        $input = $request->validated();
        $input['password'] = bcrypt($input['password']);
        Employee::create($input);
        return redirect(route('employee.login'))->with('message',"Registration successfull");    
    }

    public function login(){
        return view('employee.login');
    }

    public function dologin(LoginEmployeeRequest $request){
        $input = request()->only(['email','password']);
        if(auth()->guard('Employee')->attempt($input)){
            return redirect()->route('employee.dashboard')->with('message',"Login Successful");
        }
        else{
            return "Login Failed";
        }
    }

    public function dashboard()
    {
        return view('employee.dashboard');
    }
}
