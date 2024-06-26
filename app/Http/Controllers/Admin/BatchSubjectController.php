<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\BatchSubject;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BatchSubjectController extends Controller
{
    public function index(Request $request){
        return view('admin.batches.assign-subjects.index',[
            'records' => BatchSubject::with(['admin','subject','batch'])->latest()->paginate(20)
        ]);
    }

    public function create(Request $request){

        if ( $request->isMethod('post') ){
            $this->validate($request,[
                'batch_id' => 'required',
                'subject_id.*' => 'required'
            ],[
                'batch_id.required' => 'Please Select Batch',
                'subject_id.*.required' => 'Please Select Subject'
            ]);

             BatchSubject::create([
                'batch_id' => $request->batch_id,
                'subjects' => $request->subjects,
                'admin_id' =>  Session::get('admin')->id,
             ]);   

            return redirect()->route('batch-subject-view')->with(['success' => 'Subject Assigned']);
           
        }

        return view('admin.batches.assign-subjects.create',[
            'subjects' => Subject::where('status',1)->get(),
            'batches' => Batch::where('status',1)->get() 
        ]);
    }

    public function update(Request $request){
        if(  !$assign_subject = BatchSubject::where('id',$request->id)->first()){
            notify()->error('Record Not Found','Error');
            return redirect()->back();
        }

        if($request->isMethod('post')){
            $assign_subject->batch_id = $request->batch_id;
            $assign_subject->subjects = $request->subjects;
            $assign_subject->status - $request->status;
            $assign_subject->save();

            return redirect()->route('batch-subject-view')->with(['success' => 'Subject Updated']);
         
        }

        return view('admin.batches.assign-subjects.update',[
            'assign_subject' => $assign_subject,
            'subjects' => Subject::where('status',1)->get(),
            'batches' => Batch::where('status',1)->get() 
        ]);
    }
}
