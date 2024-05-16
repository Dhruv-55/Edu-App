<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BatchController extends Controller
{
    public function index(Request $request){
        return view('admin.batches.index',[
            'batches' => Batch::latest()->paginate(20)
        ]);
    }

    public function create(Request $request){

        if($request->isMethod('post')){
            $this->validate($request,[
                'name' => 'required'
            ],[
                'name.required' => 'Please Enter Name'
            ]);

            Batch::create([
                'name' => $request->name,
                'admin_id' => Session::get('admin')->id
            ]);

            notify()->success('Batch Created','Success');
            return redirect()->route('batch-view');
        }
        return view('admin.batches.create');
    }

    public function update(Request $request){

        if(! $batch = Batch::where('id',$request->id)->first()){
            notify()->error('Something went wrong','Error');
            return redirect()->back();
        }

        if($request->isMethod('post')){
            
            $batch->name = $request->name;
            $batch->status = $request->status;
            $batch->save();

            notify()->success('Batch Updated','Success');
            return redirect()->route('batch-view');
        }

        return view('admin.batches.update',[
            'batch' => $batch
        ]);

    }
}
