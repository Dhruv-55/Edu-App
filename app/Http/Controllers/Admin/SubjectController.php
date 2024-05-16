<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubjectController extends Controller
{
    public function index(Request $request){
        return view('admin.subjects.index',[
            'subjects' => Subject::latest()->paginate(209)
        ]);
    }

    public function create(Request $request){
        if($request->isMethod('post')){

            $this->validate($request,[
                'name' => 'required',
                'type' => 'required'
            ]);

            
            Subject::create([
                'name' => $request->name,
                'type' => $request->type,
                'admin_id' => Session::get('admin')->id
            ]);

            notify()->success('Subject Created','Success');
            return redirect()->route('subject-view');
           
        }
        return view('admin.subjects.create');
    }
    
    public function update(Request $request){

        if(! $subject = Subject::where('id',$request->id)->first()){
            notify()->error('Something went wrong','Error');
            return redirect()->back();
        }

        if($request->isMethod('post')){
            
            $subject->name = $request->name;
            $subject->type = $request->type;
            $subject->status = $request->status;
            $subject->save();

            notify()->success('Subject Updated','Success');
            return redirect()->route('subject-view');
        }

        return view('admin.subjects.update',[
            'subject' => $subject
        ]);

    }
}
