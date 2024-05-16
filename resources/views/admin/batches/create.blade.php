@extends('admin.template.layout')
@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-8 offset-2">
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Create Batch</h5>
                </div>
                <div class="card-body">
                  <form method="POST">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-fullname">Name</label>
                      <input type="text" name="name" value="{{ old('name')}}"  class="form-control" id="basic-default-fullname" placeholder="Enter  Name" />
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                  </form>
                </div>
              </div>
            </div>
      
          </div>
    </div>
</div>
@stop