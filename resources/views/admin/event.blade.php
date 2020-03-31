@extends('admin.index')

@section('admin_view')

<div class="card">


    <div class="card-header">
        <div class="card-title">Events</div>
        <div class="control-box">
                <button class="btn btn-primary"  data-toggle="modal" data-target="#modelId">Add New</button>
     
        </div>
    </div>
    <div class="card-body">
        <all-events></all-events>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Set Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body p-5">
            <form action="{{ route('events.store') }}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                        <input type="text" name="title" id="" value="{{ old('title') }}" class="form-control" placeholder="" aria-describedby="helpId">             
                        </div>
                        <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" name="date" id="" value="{{ old('date') }}"  class="form-control" placeholder="" aria-describedby="helpId">             
                            </div>
                        <div class="row">
                              
                            <div class="col-md-6">
                                <div class="col text-center text-danger"><strong>Moorning</strong></div>
                                <small class="text-muted">Must ensure the time for moorning set to AM</small>
                                <hr>
                                    <div class="form-group">
                                            <label for="Time In AM">Time In AM</label>
                                            <input type="time" name="timein_am" id="" value="00:00:00 AM" class="form-control" placeholder="" aria-describedby="helpId">             
                                        </div>
                                        <div class="form-group">
                                            <label for="Time Out AM">Time Out AM</label>
                                            <input type="time" name="timeout_am" id="" class="form-control" placeholder="" aria-describedby="helpId">             
                                        </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="col text-center text-danger"><strong>Afternoon</strong></div>
                                    <small class="text-muted">Must ensure the time for Afternoon set to PM</small>
                           
                                    <hr>
                                    <div class="form-group">
                                            <label for="Time In PM">Time In PM</label>
                                            <input type="time" name="timein_pm" id="" class="form-control" placeholder="" aria-describedby="helpId">             
                                        </div>
                                        <div class="form-group">
                                            <label for="Time Out PM">Time Out PM</label>
                                            <input type="time" name="timeout_pm" id="" class="form-control" placeholder="" aria-describedby="helpId">             
                                        </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                          <label for="">Fines</label>
                          <select class="form-control" name="fines" id="">
                             @foreach ($fine as $key => $item)
                                <option value="{{ $item->amount}}">{{$item->name}}</option>
                        
                             @endforeach
                          
                           
                          </select>
                        </div>
                       <div class="form-group text-right">
                           <button id="btnadd" class="btn btn-danger" type="submit">Save</button>
                       </div>

                </form>
          
            </div>
          
        </div>
    </div>
</div>

@endsection



                   
    
 
@section('self-style')
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection
@section('self-script')

    <script>
    $("#btnadd").click(function(e){
        e.preventDefault;
     
    });
  
    </script>
   

@endsection






