@extends('admin.index')

@section('admin_view')

<div class="card">
 
    <div class="card-header">
        <div class="card-title">Fines </div>
        
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Account Created</th>
                            <th>Status</th>
                      
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $key=> $item)
                        <tr>
                                <td> {{ $item->username }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at  }}</td>


                                @if ($item->active == 1)
                                <td><button class="btn btn-success btn-sm">Active</button> </td>
          
                                @endif
                              
                                @if ($item->active == 0)
                                <td>

                                <form action=" {{route('account.update', $item->id)}}" method="POST">
                                @method('PUT')
                                   
                                <button type="submit" class="btn btn-danger btn-sm">Approve</button> 
                                  
 
                                @csrf
                                </form>
                            </td>
                                @endif
                        
                              
                             </tr>
                        @endforeach
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection    