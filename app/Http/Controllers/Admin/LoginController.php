<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPasswordEmail;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(Request $request){

        if($request->isMethod('POST')){

           $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
           ],
           [
            'email.required' => 'Email Is Required',
            'password.required' => 'Password Is Required'
           ]);

           if( !$admin = Admin::where('username',$request->email)->orWhere('email',$request->email)->first() )
                return redirect()->back()->with(['error' => 'Admin Not Found']);

             if( ! Hash::check($request->password,$admin->password) )   
                 return redirect()->back()->with(['error' => 'Invalid Password']);

            if($admin->status == Admin::INACTIVE)
                return redirect()->back()->with(['error' => 'Your Account Is In Active..Kindly Contact Developers']);


            session(['admin' => $admin]);
            return redirect()->route('admin-dashboard')->with(['success' => 'Login Successful']);
        }
        return view('admin.login');

    }

    public function ForgotPassword(Request $request){

        if($request->isMethod('POST')){
           $this->validate($request,[
                'email' => 'required'
           ]);

           $user = User::getEmail($request->email);
           if($user){
            $user->remember_token = Str::random(40);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordEmail($user));
            return redirect()->back()->with('success','Please Check Your Email');
           }

           return redirect()->back()->with('error','Something Went Wrong');

        }

        return view('common.forgot-password');

    }

    public function resetPassword($token){
        if(!$verify_token = User::getToken($token)){
                abort(404);
        }else{
            return view('common.reset-password',['token' => $token]);
        }
    }

    public function resetPasswordPost(Request $request){

        // $this->validate($request, [
        //     'password' => 'required|confirmed',
        //     'confirm_password' => 'required'
        // ],[
        //     'password.required' => 'Password Is Required',
        //     'password.confirmed' => 'Confirm Password Not Match',
        //     'confirm_password.required' => 'Confirm Password Is Required'
        // ]);
        if(!$user = User::getToken($request->token)){
           return redirect()->back()->with('error','Something Went Wrong');
               
        }else{

            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('admin-login')->with('success','Password Has Been Updated');

        }
        
 }

 public function logout(){
    Session::forget(['admin']);
    notify()->success('Logout successful', 'Goodbye!');
    return redirect()->route('admin-login');
 }
}
