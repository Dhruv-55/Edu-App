<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request){
        return view('admin.admins.index',[
            'admins' => Admin::latest()->paginate(20)
        ]);
    }

    public function create(Request $request){

        if($request->isMethod('post')){
            $this->validate($request,[
                'name' => 'required',
                'username' => 'required',
                'email' => 'required|email|unique:admins,email',
                'phone' => 'required',
                'password' => 'required'
            ]);

            Admin::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password)
            ]);

            return redirect()->route('admin-view')->with(['success' => 'Admin Created']);
        }
        return view('admin.admins.create');
    }

    public function update(Request $request){

        if(! $admin = Admin::where('id',$request->id)->first()){
            notify()->error('Something went wrong','Error');
            return redirect()->back();
        }

        if($request->isMethod('post')){

            $admin->username = $request->username;
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->status = $request->status;
            $admin->save();

            return redirect()->route('admin-view')->with(['success','Admin Updated']);
        }
        return view('admin.admins.update',[
            'admin' => $admin
        ]);
    }
}
