@extends('admin.template.layout')
@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
          <div class="row ">
            <div class="col-md-6 text-left">
              <h5 class="card-header ">Batches</h5>
            </div>
            <div class="col-md-6 text-right mt-3 px-5">
              <a href="{{ route('batch-create')}}" class="btn btn-warning ">Create</a>
            </div>
          </div>
          <div class="table-responsive text-nowrap">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Created At</th>
                  <th>Name</th>
                  <th>Created By</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                  @if( count($batches) > 0 )
                      @foreach ($batches as $index => $batch)
                      <tr>
                        <td> {{ $index+1}} </td>
                        <td>{{ $batch->created_at->format('d m Y') }}</td>
                          <td>{{ $batch->name}}</td>
                          <td> {{ $batch->admin->name }} </td>
                          <td>
                            @if($batch->status == App\Models\Batch::ACTIVE)
                            <span class="badge bg-label-primary me-1">Active</span>
                            @else
                            <span class="badge bg-label-danger me-1">In Active</span>
                            @endif
                          </td>
                          <td> <a href="{{ route('batch-update',['id' => $batch->id]  )}}" class="btn btn-primary btn-sm">Update</a> </td>
                      </tr>
                      @endforeach
                  @else
                      <tr>
                          <td colspan="6" class="text-center">No Record Found</td>    
                      </tr>    
                  @endif   
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
  @stop