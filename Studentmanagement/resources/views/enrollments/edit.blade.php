
@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
    <form action="{{ url('enrollments/' .$enrollments->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$enrollments->id}}" id="id" />
        <label>Enroll No</label></br>
        <input type="text" name="enroll_no" id="enroll_no" value="{{$enrollments->enroll_no}}" class="form-control"></br>
        <label>Batch</label></br>
        <input type="text" name="batch_id" id="batch_id" value="{{ $enrollments->batch->name ?? '' }}" class="form-control">

        <label>Student</label></br>
        <input type="text" name="student_id" id="student_id" value="{{ optional($enrollments->student)->name }}" class="form-control">

    
        <label>Join_date</label></br>
        <input type="text" name="join_date" id="join_date" value="{{$enrollments->join_date}}" class="form-control"></br>
        
        <label>Fee</label></br>
        <input type="text" name="fee" id="fee" value="{{$enrollments->fee}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop
