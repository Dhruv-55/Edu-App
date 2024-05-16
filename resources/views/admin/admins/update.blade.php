@extends('admin.template.layout')
@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-8 offset-2">
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Update Admin</h5>
                </div>
                <div class="card-body">
                  <form method="POST">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-fullname">Full Name</label>
                      <input type="text" name="name" value="{{ $admin->name }}"  class="form-control" id="basic-default-fullname" placeholder="Enter Full Name" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Username</label>
                        <input type="text" name="username" value="{{ $admin->username }}"  class="form-control" id="basic-default-fullname" placeholder="Enter User Name" />
                      </div>
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-company">Phone</label>
                      <input type="text" name="phone" value="{{ $admin->phone }}"  class="form-control" id="basic-default-company" placeholder="Enter Phone" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-email">Email</label>
                      <div class="input-group input-group-merge">
                        <input
                          type="text"
                          id="basic-default-email"
                          class="form-control"
                          placeholder="Enter Email"
                          aria-label="john.doe"
                          name="email"
                          value="{{ $admin->email }}"
                          aria-describedby="basic-default-email2"
                        />
                        <span class="input-group-text" id="basic-default-email2">@example.com</span>
                      </div>
                      <div class="form-text">You can use letters, numbers & periods</div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlSelect1" class="form-label">Status</label>
                      <select class="form-select" id="exampleFormControlSelect1" name="status" aria-label="Default select example">
                        
                        <option value="1"{{ $admin->status == 1 ? 'selected' : ''}}>Active</option>
                        <option value="2" {{ $admin->status == 2 ? 'selected' : ''}}>In Active</option>
                      </select>
                    </div>
                    {{-- <div class="mb-3">
                      <label class="form-label" for="basic-default-phone">Password</label>
                      <input
                        name="password"
                        type="text"
                        id="basic-default-phone"
                        class="form-control phone-mask"
                        placeholder="Enter Password"
                      />
                    </div> --}}
                 
                    <button type="submit" class="btn btn-primary">Send</button>
                  </form>
                </div>
              </div>
            </div>
      
          </div>
    </div>
</div>
@stop