<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <body onload="startTime()" >
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
                <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
              </filter>
            </svg>
          </div>
        <!-- tap on top starts-->
            <div class="tap-top"><i data-feather="chevrons-up"></i></div>
        <!-- tap on tap ends-->
        <div class="page-wrapper horizontal-wrapper" id="pageWrapper">
            @auth
            <!-- START: Header-->
            @include('layouts.header')
            <!-- END: Header-->
            @endauth
            
            @auth
                @if(Auth::user()->role_id == 1)
                    @include('layouts.popup')
                @endif
            @endauth
        
        <!-- END: Pre Loader-->
        <div class="page-body-wrapper">
        @auth
        <!-- START: Main Menu-->
        @include('layouts.sidebar')
        
        <!-- END: Main Menu-->
        @endauth
        <!-- START: Main Content-->
        @yield('content')
        <!-- END: Content-->
        <!-- START: Footer-->
        @auth

            <footer class="footer">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0"> 2020 &copy; Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})  </p>
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
