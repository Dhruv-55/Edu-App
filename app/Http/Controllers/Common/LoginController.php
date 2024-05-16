<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
 public function Login(Request $request){

   //  dd($request->all());
   if($request->isMethod('POST')){
     $this->validate($request,[
        'email' => 'required',
        'password'=>'required'
     ]);
      
     if( !$user = User::where('name',$request->email)->orWhere('email',$request->email)->first() )
        return redirect()->back()->with(['error' => 'User Not Found']);

        if( ! Hash::check($request->password, $user->password))
          return redirect()->back()->with(['error' => 'Invalid Password']);

        session(['user' => $user]);
     
        if($user->type == User::PARENTS ){
          return redirect()->route('parent-dashboard');
        }elseif($user->type == User::TEACHER){
          return redirect()->route('teacher-dashboard');
        }elseif($user->type == User::STUDENT){
          return redirect()->route('student-dashboard');
        }else{
          return redirect()->back()->with(['error' => 'Invalid User']);
        }  
    
   }
   return view('common.login');

 } 
}
