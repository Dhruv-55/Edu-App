<?php

namespace App\Http\Middleware\Auth;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Student
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(Session::has('user')){

            if(Session::get('user')->type == User::STUDENT){
                return $next($request);
            }
            else{
                return redirect()->route('login')->with(['error' => 'UnAuthenicated User']);
            }

        }else{
            return redirect()->route('login')->with(['error' => 'Session Expired']);
        }

       

        
    }
}
