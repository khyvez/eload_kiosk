@extends('admin.index')

@section('admin_view')

<div class="card">
 
    <div class="card-header">
        <div class="card-title">Fines </div>
        <div class="control-box">
                <button class="btn btn-primary"  data-toggle="modal" data-target="#modelId">Add New</button>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fine as $key=> $item)
                        <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->amount }}</td>
                                <td> 
                                    <form action=" {{ route('fine.destroy', $item->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button> 
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                      
                    </tbody>
                </table>
            </div>
        </div>
      
    </div>
</div>


<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Set Fines</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('fine.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="">Name</label>
                              <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                              <label for="">Amount</label>
                              <input type="text" name="amount" id="" class="form-control" placeholder="ex. 10.00" aria-describedby="helpId">
                           </div>
                            <div class="form-group text-right">
                               <button class="btn btn-danger">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
       
        </div>
    </div>
</div>
@endsection    