@extends('admin.index')

@section('admin_view')

<div class="card">
 
 
    <div class="card-header">
        <div class="card-title">Students</div>
        <div class="control-box">
            <button class="btn btn-outline-primary d-none d-sm-inline"  data-toggle="modal" data-target="#modelimport">Import/Export</button>
            <button class="btn btn-primary" data-toggle="modal" data-target="#modaladd">Add New</button>
        </div>
    </div>
    <div class="card-body">
            <all-users></all-users>
    </div>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modelimport" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Import Excel File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body text-center">
                    <form class="mt-4" action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" accept=".csv">
                              <br>
                              <div class="form-group mt-5">
                                    <button class="btn btn-danger"><i class="fa fa-upload" aria-hidden="true"></i> Import</button>
                                    <a class="btn btn-outline-danger" href="{{ route('export') }}"><i class="fa fa-download" aria-hidden="true"></i> Export</a>
                              </div>
                     
                              
                       </form>
            </div>
            
        </div>
    </div>
</div>
@endsection