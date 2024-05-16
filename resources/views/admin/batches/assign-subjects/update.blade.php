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
                         <option value="{{ $batch->id }}" {{ $assign_subject->batch_id == $batch->id ? 'selected' : ''}}>{{ $batch->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    @foreach( $subjects as $subject )

                    <div class="form-check mb-3">
                      <input class="form-check-input" type="checkbox" name="subject_id[]" value="{{ $subject->id }}" {{ $assign_subject->subject_id == $subject->id ? 'checked' : '' }} id="defaultCheck{{ $subject->id}}" />
                      <label class="form-check-label" for="defaultCheck{{ $subject->id}}"> {{ $subject->name }} </label>
                    </div>
                    @endforeach

                    <button type="submit" class="btn btn-primary">Send</button>
                  </form>
                </div>
              </div>
            </div>
      
          </div>
    </div>
</div>
@stop