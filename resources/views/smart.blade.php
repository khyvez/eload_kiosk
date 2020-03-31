@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col text-right">
        <img src="/image/smart.png" style="width:100px; height:70px;" class="imgchoice" alt="">
    </div>
</div>
<div class="row px-5 py-2">
    <div class="col text-center">
        <h1 class="text-header">SMART</h1>  
    </div>

</div>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card-choice" style="width:100%;">
         
            <div id="accordion" class="accordion">
                <div class="card-header text-center collapsed" data-toggle="collapse" href="#collapseOne">
                    <a class="card-title ">
                       Regular Load
                    </a>
                </div>
                <div id="collapseOne" class="card-body collapse " data-parent="#accordion">
                   <div class="row">
                        <div class="col">
                            <form action="{{ route('smartload') }}" method="POST">
                                @csrf
                            <div class="form-group">
                              <small><label for="">Cellphone #</label></small>
                              <input type="text" name="contact" id="contact" class="form-control" placeholder="" aria-describedby="helpId">
                       
                            </div>
                            <div class="form-group">
                                <small><label for="">Amount</label></small>
                                <input type="text" name="load_amount" id="load_amount" class="form-control" placeholder="" aria-describedby="helpId">
                         
                              </div>

                              <input type="hidden" name="network" value="smart">
                              <input type="hidden" name="loadtype" value="regular">
                              <div class="form-group mt-5">
                                  <button type="submit" class="btn btn-lg btn-primary btn-block">Buy Load</button>
                              </div>
                            </form>
                        </div>
                    </div> 
                </div>
                <div class="card-header text-center collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    <a class="card-title ">
                      Promo
                    </a>
                </div>
                <div id="collapseTwo" class="card-body collapse" data-parent="#accordion" >
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <small><label for="">Cellphone #</label></small>
                                <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                         
                              </div>
                          
                                 <div class="form-group">
                                    <small><label for="">Promo</label></small>
                                   <select class="form-control promo" id="promo" name="promo">
                                     <option>Giga Video 50</option>
                                     <option>Giga Video 99</option>
                                     <option>Giga Video 299</option>
                                     <option>Giga Video 399</option>
                                     <option>Giga Video 499</option>

                                     <option>Giga Video plus 75</option>
                                     <option>Giga Video plus 149</option>
                                     <option>Giga Video plus 499</option>
                                     <option>Giga Video plus 549</option>
                                     <option>Giga Video plus 649</option>

                                     <option>Giga Video plus Allnet 100</option> 
                                     <option>Giga Video plus Allnet 199</option>
                                     <option>Giga Video plus Allnet 549</option>
                                     <option>Giga Video plus Allnet 649</option>
                                     <option>Giga Video plus Allnet 749</option>

                                     <option>Giga Games 50</option>
                                     <option>Giga Games 99</option>
                                     <option>Giga Games 299</option>
                                     <option>Giga Games 399</option>
                                     <option>Giga Games 499</option>
                             
                                    
                                     <option>Giga IG+FB 50</option>
                                     <option>Giga IG+FB 99</option>
                                     <option>Giga IG+FB 299</option>
                                     <option>Giga IG+FB 399</option>
                                     <option>Giga IG+FB 499</option>

                                     <option>ALL OUT SURF 20</option>
                                     <option>ALL OUT SURF 30</option>
                                     <option>ALL OUT SURF 50</option>
                                     <option>ALL OUT SURF 99</option>
                                     
                                     <option>UCT 30</option>
                                     <option>UCT 50</option>
                                     <option>UCT 100</option>
                                     <option>UCT 350</option>
                                   </select>
                                 </div>

                                 <div class="form-group mt-5">
                                    <button class="btn btn-lg btn-primary btn-block">Buy Promo</button>
                                </div>
                           
                             
                        </div>
                    </div>
                </div>
           
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script>


  </script>
@endsection