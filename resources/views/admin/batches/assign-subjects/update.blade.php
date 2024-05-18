@extends('admin.template.layout')
@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-8 offset-2">
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Assign Subject</h5>
                </div>
                <div class="card-body">
                  <form method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleFormControlSelect1" class="form-label">Batch</label>
                      <select class="form-select" id="exampleFormControlSelect1" name="batch_id" aria-label="Default select example">
                        @foreach ($batches as $batch)
                         <option value="{{ $batch->id }}" {{ $assign_subject->batch_id == $batch->id ? 'selected' : '' }}>{{ $batch->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    @foreach( $subjects as $subject )

                    <div class="form-check mb-3">
                      <input class="form-check-input" type="checkbox" name="subjects[]" value="{{ $subject->name }}" id="defaultCheck{{ $subject->id}}" {{ collect($assign_subject->subjects)->contains($subject->name) ? 'checked'  :''  }} />
                      <label class="form-check-label" for="defaultCheck{{ $subject->id}}"> {{ $subject->name }} </label>
                    </div>
                    @endforeach
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Status</label>
                        <select class="form-select" id="exampleFormControlSelect1" name="status" aria-label="Default select example" required>
                          <option value="1" {{ $assign_subject->status == 1 ? 'selected' : ''}}>Active</option>
                          <option value="2" {{ $assign_subject->status == 2 ? 'selected' : ''}}>In Acitive</option>
                        </select>
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