<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CheckEmployeeStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('Employee')->user();

        
        if($user && $user->status == 0){
            return redirect(route('employee.UpdateProfile'))->with('message',"Please update your profile details");
        }

        if($user && $user->status == 1){
            return $next($request);
        }
    }
}
