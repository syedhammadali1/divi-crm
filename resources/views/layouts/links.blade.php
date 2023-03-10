<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/vendors/icofont.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/vendors/themify.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/vendors/flag-icon.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/vendors/feather-icon.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/vendors/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
<link id="color" rel="stylesheet" href="{{asset('css/color-1.css')}}" media="screen">
<link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/vendors/datatables.css')}}">

@auth
<!-- Plugins css start-->
<link rel="stylesheet" type="text/css" href="{{asset('css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/vendors/chartist.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/vendors/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/vendors/scrollbar.css')}}">
<!-- Responsive css-->

@if(Auth::user()->role_id == 1)
  @if(!Session::has('project_id'))
  <style type="text/css">
    .main-body{
      filter: blur(6px);
      overflow: hidden;
    }

  </style>
  @endif
@endif
<style>
    .word-overflow-hidden{
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
</style>
@endauth
<!-- END: Page CSS-->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@yield('link')
