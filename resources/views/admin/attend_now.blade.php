@extends('admin.index')

@section('admin_view')

<div class="card">
 
    <div class="card-header">
        <div class="card-title">Attendance</div>
        <div class="control-box">
            <button class="btn btn-outline-primary"  data-toggle="modal" data-target="#modalId"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
            <button class="btn btn-primary  d-none d-sm-inline" id="print-window"  ><i class="fa fa-print" aria-hidden="true"></i> Print</button>
     </div>
    </div>
    <div class="header-print p-3">
        <div class="row">
            <div class="col text-center">
                <strong>Catanduanes State University</strong><br>
                College of Engineering <br>
                Virac, Catanduanes
            
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                Event Name : <strong>{{ $event_name->title ?? ""}}</strong> <br>
                Count : <strong> {{ $attend_count ?? 0}} </strong>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        
                        <th>Time In AM</th>
                        <th>Time Out AM</th>
                        <th>Time In PM</th>
                        <th>Time Out PM</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($attends as $key => $attend)
                    <tr>
                        <td>{{ $attend->student->name ?? ""}}</td>
                        <td>{{ $attend->timein_am ?? ""}}</td>
                        <td>{{ $attend->timeout_am ?? ""}}</td>
                        <td>{{ $attend->timein_pm ?? ""}}</td>
                        <td>{{ $attend->timeout_pm ?? ""}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
      
    </div>
</div>

<div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Filter Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('attendance.show', 0)}}" method="GET">
                <div class="row">
                    <div class="col">
                    <div class="form-group">
                      <label for="">Event</label>
                      <select class="form-control" name="event" id="event">
                        @foreach ($event as $item)
                            <option value="{{$item->id}}"> {{$item->title}}</option>
                        @endforeach
                       </select>
                    </div>

                </div>
                </div>
                                 
          
                <div class="row">
                    <div class="col">
                        <div class="form-group text-right pr-3">
                            <button class="btn btn-danger" type="submit">Filter</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection    
@section('self-script')
    <script>
     
        $('#print-window').click(function() {
           
         //    var docs = document.title;
          //   document.title = "Fines";
    window.print();
   // document.title = docs;
   // docum
});
</script>
@endsection