@extends('admin.index')

@section('admin_view')

<div class="card">
 
    <div class="card-header">
        <div class="card-title">Paid Report</div>
        <div class="control-box">
                <button class="btn btn-outline-primary"  data-toggle="modal" data-target="#modelId"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
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
                    Date From : <strong> {{ $request->datefrom ?? ""}}</strong> <br>
                    Date To :  <strong>   {{ $request->dateto ?? ""}}</strong> <br>
                    Total Amount : <strong>{{ $paymentTotal ?? ""}}</strong> <br>
                </div>
            </div>
        </div>
    <div class="card-body">
            
        <div class="row mt-2">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Officer in Charge</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($payment as $key => $item)
                            <tr>
                                <td>{{ $item->student->student_id ?? ""}}</td>
                                <td>{{ $item->student->name ?? ""}}</td>
                                <td>{{ $item->amount ?? ""}}</td>
                                <td> {{ $item->created_at ?? ""}}</td>
                                <td> {{ $item->user->name ?? ""}}</td>
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
                <h5 class="modal-title text-danger">Filter Payment Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
               <form action="/admin/payment_filter" method="GET">
                
                    <div class="form-group">
                            <label for="">Date from</label>
                            <input type="date" name="datefrom" id="" value="{{ old('date') }}"  class="form-control" placeholder="" aria-describedby="helpId">             
                        </div>
                        <div class="form-group">
                                <label for="">Date To</label>
                                <input type="date" name="dateto" id="" value="{{ old('date') }}"  class="form-control" placeholder="" aria-describedby="helpId">             
                            </div>
                            <div class="form-group text-right mt-2">
                                <button type="submit" class="btn btn-danger">Filter</button>
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
           
  
      window.print();

  });</script>
    
@endsection