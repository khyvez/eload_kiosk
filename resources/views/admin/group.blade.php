@extends('admin.index')

@section('admin_view')

<div class="card">


    <div class="card-header">
        <div class="card-title">Group</div>
        <div class="control-box">

        </div>
    </div>
    <div class="card-body">
        <div class="row">
         
            <div class="col-md-12">
               <all-groups></all-groups>
            </div>
        </div>
    
    </div>
</div>

@endsection
