@extends('sbadmin2::page')

@section('title', 'Dashboard')

@section('content_header')
<link href="/css/print.css" rel="stylesheet" media="print" type="text/css">
@stop

@section('content')

    <div id="app">
            @yield('admin_view')
    </div>
 
@stop

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}" />


@yield('self-style')
<!--
    <link rel="stylesheet" href="/css/admin_custom.css">
-->
    <link rel="stylesheet" href="{{ mix('css/app.css')}}">
    <style>
      .control-box{
        position: absolute;
        right: 10px;
        top: 10px;
    }</style>
@stop

@section('js')
@include('sweetalert::alert')
  
  
    @yield('self-script')

 

@stop