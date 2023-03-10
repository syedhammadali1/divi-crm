<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="--theme-deafult:#055156; --theme-secondary:#2e9de4;">
    <!-- START: Head-->
    <head>
        <meta charset="UTF-8">
        <title>{{isset($title)?$title:'CRM'}}</title>

        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- START: Template CSS-->
        @include('layouts.links')
        @yield('css')
        <!-- END: Custom CSS-->
    </head>
    <!-- END Head-->

    <!-- START: Body-->
    @auth
        @if(url('/') != "http://127.0.0.1:8000")
            <body onload="startTime()" >
        @endif
    @else
    <body>
    @endauth
    <input type="hidden" id="web_url" value="{{url('/')}}"/>
         <div class="loader-wrapper">
            <div class="loader-index"><span></span></div>
            <svg>
              <defs></defs>
              <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" values="1 0 0 0 0  1 0 1 0 0  0 1 1 0 0  0 1 0 19 -9" result="goo"> </fecolormatrix>
              </filter>
            </svg>
          </div>
        <!-- tap on top starts-->
            <div class="tap-top"><i data-feather="chevrons-up"></i></div>
        <!-- tap on tap ends-->
        <div class="page-wrapper compact-sidebar" style="height: 100vh !important;">

        <!-- END: Pre Loader-->
        <div class="page-body-wrapper sidebar-icon" style="height: 100% !important;">
        @auth
        <!-- START: Main Menu-->

        <!-- END: Main Menu-->
        @endauth
        <!-- START: Main Content-->
        @yield('content')
        <!-- END: Content-->
        <!-- START: Footer-->
        @auth

            <footer class="footer" style="bottom: 0;
            position: fixed;
            width: 100%;">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0"> 2021 &copy; CRM v{{ Illuminate\Foundation\Application::VERSION }} </p>
                     </div>
                  </div>
               </div>
            </footer>
        @endauth
        </div>
      </div>
        <!-- END: Footer-->

        <!-- START: Template JS-->
        @include('layouts.scripts')
        @yield('js')


    </body>
    <!-- END: Body-->
</html>
