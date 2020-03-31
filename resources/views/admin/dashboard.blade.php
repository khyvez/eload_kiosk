@extends('admin.index')

@section('admin_view')


<div class="row">
        <div class="col-md-3">
                <div class="card bg-primary">
                  
                    <div class="card-body p-3 text-light">
                        <div class="d-flex justify-content-between">
                            <div class="flex-item">
                                <i class="fa fa-building fa-2x" aria-hidden="true"></i>
                           </div>
                            <div class="flex-item text-right">
                                   {{ $organization->name ?? "None" }}
                            </div>
                        </div>
                       
                    </div>
                    <div class="card-footer px-2 pb-0 pt-2 bg-white text-muted">
                        <div class="d-flex justify-content-between">
                            <div class="flex-item">
                                    <h5><strong>Organization Name</strong></h5>
                            </div>
                            <div class="flex-item">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#modalid">Edit Name</a>
                            </div>
                        </div>
                          
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                    <div class="card bg-success">
                      
                        <div class="card-body p-3 text-light">
                            <div class="d-flex justify-content-between">
                                <div class="flex-item">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                </div>
                                <div class="flex-item text-right">
                                <h5> {{ $paid }}</h5>
                                </div>
                            </div>
                           
                        </div>
                        <div class="card-footer px-2 pb-0 pt-2 bg-white text-muted">
                                <h5><strong>Amount Fines Paid</strong></h5>
                        </div>
                    </div>
                </div>

    <div class="col-md-3">
        <div class="card bg-danger">
          
            <div class="card-body p-3 text-light">
                <div class="d-flex justify-content-between">
                    <div class="flex-item">
                        
                        <i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
                    </div>
                    <div class="flex-item text-right">
                            {{ $event_name[0]->title ?? "None" }}
                    </div>
                </div>
               
            </div>
            <div class="card-footer px-2 pb-0 pt-2 bg-white text-muted">
                    <h5><strong>Current Event</strong></h5>
            </div>
        </div>
    </div>

    <div class="col-md-3">
            <div class="card bg-success">
              
                <div class="card-body p-3 text-light">
                    <div class="d-flex justify-content-between">
                        <div class="flex-item">
                            <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                       </div>
                        <div class="flex-item text-right">
                        <h5> {{ $attend_count}}</h5>
                        </div>
                    </div>
                   
                </div>
                <div class="card-footer px-2 pb-0 pt-2 bg-white text-muted">
                        <h5><strong>Attend</strong></h5>
                </div>
            </div>
        </div>

      
</div>
<section class="mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                    <div class="card-header pt-2 pb-0 px-2">
                            <div class="card-title font-weight-bold text-muted">Student Population</div>
                        </div>
                        <div class="card-body p-0">
                            {!! $chart1->container() !!} 
                               
                        </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">

         
                <div class="card-header pt-2 pb-0 px-2">
                        <div class="card-title font-weight-bold text-muted">Event Attendance Data</div>
                    </div>
                    <div class="card-body p-0">
                            {!! $attchart->container() !!} 
                    
                </div>
            </div>
        </div>
      
    </div>
    <div class="row mt-5">
        <div class="col-md-8 px-3">
            <h4 class="text-muted">Calendar Event</h4>
        </div>
        
    </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        {!! $calendar->calendar() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col">
                    <div class="card">
                        <div class="card-header pt-2 pb-0 px-2">
                            <div class="card-title font-weight-bold text-muted">Recent Attendance</div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table" style="font-size: 12px;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th class="text-right">Time In</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($attend_now as $key => $attend )
                                      <tr>
                                        <td>{{ $attend->name}}</td>
                                        <td class="text-right">{{ $attend->updated_at}}</td>
                                      </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row mt-3">
                <div class="col">
                        <div class="card">
                                <div class="card-header pt-2 pb-0 px-2">
                                    <div class="card-title font-weight-bold text-muted">Paid Fines Summary</div>
                                </div>
                                <div class="card-body p-2">
                                        {!! $paidchart->container() !!} 
                              
                                </div>
                        </div>  
                </div>
                </div>
                <div class="row mt-3">
                        <div class="col">
                                <div class="card bg-info">
                                        <div class="card-header pt-2 pb-0 px-2">
                                            <div class="card-title font-weight-bold text-light">Maximum fines per student</div>
                                        </div>
                                        <div class="card-body text-center p-2">
                                          <h2 class="text-white">P  {{ $max_fines  }}</h2>
                                        </div>
                                </div>  
                        </div>
                        </div>
                  
            </div>
          
        </div>
        

</section>



<!-- Modal -->
<div class="modal fade" id="modalid" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Set Organization</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
            <form action="/organization" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
          
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Save</button>

                    </div>

               </form>
            </div>
            <div class="modal-footer">
              
            </div>
        </div>
    </div>
</div>

@endsection    



@section('self-style')
  
    <link rel="stylesheet" href="/css/fullcalendar.css"/>
@endsection
@section('self-script')

{!! $chart1->script() !!}
{!! $paidchart->script() !!}
{!! $attchart->script() !!}
    <script src="/js/moment.js"></script>
    <script src="/js/fullcalendar.js"></script>
    {!! $calendar->script() !!}

    <script>
    $("#btnadd").click(function(e){
        e.preventDefault;
     
    });


</script>

@endsection
