@extends('admin.index')

@section('admin_view')

<div class="card">
 
  
    <div class="card-header">
        <div class="card-title">Student Fines </div>
        <div class="control-box">
                <button class="btn btn-outline-primary" data-target="#modalId" data-toggle="modal"><i class="fa fa-filter" aria-hidden="true"></i>Filter</button>
                <button id="print-window" class="btn btn-primary d-none d-sm-inline"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
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
                    Course : <strong>{{ $request->program ?? ""}}</strong> <br>
                    Year :  <strong>{{ $request->year ?? ""}}</strong> <br>
                    Block : <strong>{{ $request->block ?? ""}}</strong> <br>
                </div>
            </div>
        </div>
    <div class="card-body">
    
        <div class="row mt-3">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student ID</th>
                            <td  class="d-none d-md-table-cell">Name</th>
                            <td  class="d-none d-md-table-cell">Course</th>
                            <td  class="d-none d-md-table-cell">Year</th>
                            <th>Fines</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                            <div style="display:none;">{{ $total = 0}}</div>

                       @foreach ($event_name as $key => $item)
                       <tr>
                       <td>{{ $key++}}</td>
                          
                                    <td>{{ $item->student_id }}</td>
                                    <td  class="d-none d-md-table-cell">{{ $item->name ?? "" }}</td>
                                    <td  class="d-none d-md-table-cell">{{ $item->program ?? ""}}</td>
                                    <td  class="d-none d-md-table-cell">{{ $item->year ?? "" }}</td>
                              
                          
                          
                            <td class="font-weight-bold">{{ number_format($max_fine - $item->attendances($key )->sum('amount'), 2, ".", ",") ?? ""  }}</td>
                       </tr>
                           
                       @endforeach
                    
                    </tbody>
              
                </table>
            </div>
        </div>
      
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Filter Print</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="/admin/filterfine" method="GET">
                <div class="row">
                    <div class="col">
                    <div class="form-group">
                      <label for="">Block</label>
                      <select class="form-control" name="block" id="block">
                          <option value=""></option>
                            @foreach ($blocks as $item)
                                 <option value="{{$item->block}}">{{$item->block}}</option>
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
$("#block").select2();


        $('#print-window').click(function() {
           
         //    var docs = document.title;
          //   document.title = "Fines";
    window.print();
   // document.title = docs;
   // docum
});



    </script>
@endsection