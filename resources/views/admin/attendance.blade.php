@extends('admin.index')

@section('admin_view')

<div class="card">
 
    <div class="card-header">
        <div class="card-title text-danger">Attendance</div>
        <div class="control-box">
                <button class="btn btn-primary"  data-toggle="modal" data-target="#modelId">Filter</button>
                <button class="btn btn-primary"  data-toggle="modal" data-target="#modelId">Print</button>
       
            </div>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <form action="{{route('attendance')}}">
                        <input type="text" name="student_id" class="form-control">

                        <button type="submit" class="btn btn-danger">OK</button>
                </form>
                    
            </div>
        </div>
      
    </div>
</div>
@endsection    