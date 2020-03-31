<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
   
 
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
 
    
    <style>
        #background-carousel{
	position:fixed;
	width:100%;
	height:100%;
	z-index:-1;
}
.carousel,
.carousel-inner {
	width:100%;
	height:100%;
	z-index:0;
	overflow:hidden;
}
.item {
	width:100%;
	height:100%;
	background-position:center center;
	background-size:cover;
	z-index:0;
}
 
#content-wrapper {
	position:absolute;
	z-index:1 !important;
	min-width:100%;
	min-height:100%;
}
 
.background-overlay{
	position:absolute;
	z-index:1 !important;
	min-width:100%;
	min-height:100%;
    background: #0000005c;
 
}
.text-header{
    color: #ffffff !important;
    font-size: 40px;
    font-family: monospace;
    text-shadow: 1px 1px 1px #515151;

}
.choice{
    height: 200px;
    background: #aeafb169;
    width: 350px;
    opacity: 1;
    border: 1px solid #acacaca1;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0px 0px 6px 1px #00000080;
}
.card-choice{

    background: #aeafb169;
    width: 100%;
    opacity: 1;
    border: 1px solid #acacaca1;
    border-radius: 15px;
    padding: 10px;
    font-size: 25px;
    color: #fff;
    box-shadow: 0px 0px 6px 1px #00000080;
}
.imgchoice{
    width: 100%;
    height: 100%;
}
input.form-control{
    font-size: 30px;
}
    </style>
</head>
<body>
    <div id="app">
    
        <main class="">

    <div class="row">
        <div class="col">
         <div id="background-carousel">
         <div id="carouselId" class="carousel slide" data-ride="carousel">
       
             <div class="carousel-inner" role="listbox">
                 <div class="carousel-item active">
                     <img src="/image/bg4.jpg" width="100%" height="100%" style="filter:blur(8px);" alt="First slide">
                 </div>
                 <div class="carousel-item">
                     <img src="/image/bg5.png" width="100%" height="100%" style="filter:blur(8px);" alt="First slide">  </div>
                 <div class="carousel-item">
                     <img src="/image/bg6.jpg" width="100%" height="100%" style="filter:blur(8px);" alt="First slide">  </div>
             </div>
         
         </div>
         </div>
        </div>
     </div>
     <div class="background-overlay">
 


    <div id="content-wrapper">
 
        <div class="container p-5">
            @yield('content')

        </div>
    </div>



</div>
        </main>
    </div>
    @include('sweetalert::alert')
   
       <!-- Scripts -->


       <script src="{{ asset('js/app.js') }}" ></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" ></script>

    
    @yield('script')

</body>
</html>
