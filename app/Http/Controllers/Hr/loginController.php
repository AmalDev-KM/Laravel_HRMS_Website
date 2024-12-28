<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterHrRequest;
use App\Http\Requests\UpdateHrProfileRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Hr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function register(){
        return view('hr.register');
    }

    public function registration(RegisterHrRequest $request){
        $input = $request->validated();
        $input['password'] = bcrypt($input['password']);
        Hr::create($input);
        return redirect(route('hr.register'))->with('message',"Registration successfull");
    }

    public function login(){
        return view ('hr.login');
    }

    public function dologin(){
        $input = request()->only(['username','password']);
        if(auth()->guard('Hr')->attempt($input)){
            return redirect()->route('hr.dashboard');
        }
        else{
            return "login Failed";
        }
    }

    public function addprofile(){
        return view('hr.addprofile');
    }

    public function updateprofile(UpdateHrProfileRequest $request){
        $input = $request->validated();
        if($request->hasFile('image')){
            $extension = $request->image->extension();
            $filename = Str::random(6).'_'.time()."_Hr.".$extension;
            $request->image->storeAs('images',$filename,'public');
            $input['image'] = $filename;
        }
        $hr = Hr::find($request->hr_id);
        $hr->update($input);
        return redirect(route('hr.addprofile'))->with('message',"profile updated successfully..");
    }
}
