@extends('admin.index')

@section('admin_view')

<div class="card">
 
    <div class="card-header">
        <div class="card-title">Student Fines </div>
        <div class="control-box">
        </div>
    </div>
    <div class="card-body">
        
        <div class="row">
            <div class="col-md-6 mt-2">
                    <form action="/admin/studentfines/show" method="GET">
                        @csrf
                    <div class="input-group">
                            <input type="search" name="id" class="form-control form-control-lg" placeholder="Search....">
                            <div class="input-group-prepend">
                                <span class="input-group-text" type="submit" id="sizing-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
                            </div>
                             
                    </div>
                    </form>
              
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                    <div class="card">
                        <div class="card-header px-2 pt-1 pb-0">
                            <div class="card-title"><strong class="text-muted">Information</strong> </div>
                        </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                            <h6 class="text-muted">Name : </h6>
                                    </div>
                                    <div class="ml-2">
                                            {{ $student->name ?? ""}}
                                    </div>
                                </div>
                                <div class="d-flex">
                                        <div>
                                                <h6 class="text-muted">Year : </h6>
                                        </div>
                                        <div class="ml-2">
                                                {{ $student->year ?? ""}}
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                            <div>
                                                    <h6 class="text-muted">Course : </h6>
                                            </div>
                                            <div class="ml-2">
                                                    {{ $student->program ?? ""}}
                                            </div>
                                        </div>
                                  
                            </div>
                        </div>
            </div>
         
            
        </div>
        <div class="row mt-3">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                        
                            <th>Event</th>
                            <th class="d-none d-md-table-cell">Time In AM</th>
                            <th class="d-none d-md-table-cell">Time Out AM</th>
                            <th class="d-none d-md-table-cell">Time In PM</th>
                            <th  class="d-none d-md-table-cell">Time Out PM</th>
                            <th>Fines</th>
                        </tr>
                    </thead>
                    <tbody>
                            <div style="display:none;">{{ $total = 0}}</div>
                       @foreach ($event_name as $key => $item)
                       <tr>
                          
                            <td>{{ $item->title }}</td>
                            <td  class="d-none d-md-table-cell">{{ $item->attendances($student_id )->timein_am ?? ""  }}</td>
                            <td  class="d-none d-md-table-cell">{{ $item->attendances($student_id)->timeout_am ?? "" }}</td>
                            <td  class="d-none d-md-table-cell">{{ $item->attendances($student_id)->timein_pm ?? "" }}</td>
                            <td  class="d-none d-md-table-cell">{{ $item->attendances($student_id)->timeout_pm ?? "" }}</td>
                            <td>{{ ($item->fines * $item->signature_count) - ($item->attendances($student_id)->amount ?? 0) }}</td>
                       <td style="display:none;">{{ $total = ($total + (($item->fines * $item->signature_count) - ($item->attendances($student_id)->amount ?? 0))) }}</td>
                       </tr>
                           
                       @endforeach
                    </tbody>
                    <tfoot class="bg-info p-0">
                        <th  class="d-none d-md-table-cell"></th>
                        <th  class="d-none d-md-table-cell"></th>
                        <th  class="d-none d-md-table-cell"></th>
                        <th  class="d-none d-md-table-cell"></th>
                        <th><div class="text-light">Total Fines: </div></th>
                    <th> <h4 class="text-white font-weight-bold">{{ number_format($total, 2, '.',',')}}</h4></th>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col text-right">
            <form action=" {{ route('payment.store') }}" method="POST">
                    
                    @csrf
                <input type="hidden" value="{{$total}}" name="amount">
                  <button type="submit" name="id" value="{{$student->id ?? '' }}" class="btn btn-primary px-5"><i class="fa fa-money" aria-hidden="true"></i>  Pay</button>
      
                </form>
            </div>
        </div>
      
    </div>
</div>
@endsection    