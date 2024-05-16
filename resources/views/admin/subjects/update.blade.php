@extends('admin.template.layout')
@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-8 offset-2">
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Update Subject</h5>
                </div>
                <div class="card-body">
                  <form method="POST">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-fullname"> Name</label>
                      <input type="text" name="name" value="{{ $subject->name}}"  class="form-control" id="basic-default-fullname" placeholder="Enter  Name" />
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlSelect1" class="form-label">Type</label>
                      <select class="form-select" id="exampleFormControlSelect1" name="type" aria-label="Default select example" required>
                        <option value="1" {{ $subject->type == 1 ? 'selected' : ''}}>Theoretical</option>
                        <option value="2" {{ $subject->type == 2 ? 'selected' : ''}}>Practical</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlSelect1" class="form-label">Status</label>
                      <select class="form-select" id="exampleFormControlSelect1" name="status" aria-label="Default select example" required>
                        <option value="1" {{ $subject->status == 1 ? 'selected' : ''}}>Active</option>
                        <option value="2" {{ $subject->status == 2 ? 'selected' : ''}}>In Acitive</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-warning text-dark">Update</button>
                  </form>
                </div>
              </div>
            </div>
      
          </div>
    </div>
</div>
@stop