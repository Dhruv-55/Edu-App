@extends('admin.template.layout')
@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
          <div class="row ">
            <div class="col-md-6 text-left">
              <h5 class="card-header ">Admins</h5>
            </div>
            <div class="col-md-6 text-right mt-3 px-5">
              <a href="{{ route('admin-create')}}" class="btn btn-warning ">Create</a>
            </div>
          </div>
          <div class="table-responsive text-nowrap">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Created At</th>
                  <th>Username</th>
                  <th>Phone</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                  @if( count($admins) > 0 )
                      @foreach ($admins as $index => $admin)
                      <tr>
                        <td> {{ $index+1}} </td>
                        <td>{{ $admin->created_at->format('d m Y') }}</td>
                          <td>{{ $admin->username}}</td>
                          <td> {{ $admin->phone }} </td>
                          <td>
                            @if($admin->status == App\Models\Admin::ACTIVE)
                            <span class="badge bg-label-primary me-1">Active</span>
                            @else
                            <span class="badge bg-label-danger me-1">In Active</span>
                            @endif
                          </td>
                          <td> <a href="{{ route('admin-update',['id' => $admin->id]  )}}" class="btn btn-primary btn-sm">Update</a> </td>
                      </tr>
                      @endforeach
                  @else
                      <tr>
                          <td colspan="5">No Admin Found</td>    
                      </tr>    
                  @endif   
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
  @stop