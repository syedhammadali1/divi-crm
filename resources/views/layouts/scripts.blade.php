
<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
      <!-- Bootstrap js-->
      <script src="{{asset('js/bootstrap/bootstrap.bundle.min.js')}}"></script>
      <!-- feather icon js-->
      <script src="{{asset('js/icons/feather-icon/feather.min.js')}}"></script>
      <script src="{{asset('js/icons/feather-icon/feather-icon.js')}}"></script>
<script>


    $("#my_bellicon").click(function(){
        let notifyIds = $("#header-notification-count").data('serial');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url :  '{{url("read-notifications")}}',
            type : "POST",
            data : {notifyIds : notifyIds},
            success:function(data)
            {
                console.log(data);
                 $("#header-notification-count").text('0');

            }
        });
    })

</script>
@auth


      <!-- scrollbar js-->
      <script src="{{asset('js/scrollbar/simplebar.js')}}"></script>
      <script src="{{asset('js/scrollbar/custom.js')}}"></script>
      <!-- Sidebar jquery-->
@endauth
      <script src="{{asset('js/config.js')}}"></script>
@auth
      <!-- Plugins JS start-->
      <script id="menu" src="{{asset('js/sidebar-menu.js')}}"></script>
      <script src="{{asset('js/chart/chartist/chartist.js')}}"></script>
      <script src="{{asset('js/chart/chartist/chartist-plugin-tooltip.js')}}"></script>
      <script src="{{asset('js/chart/knob/knob.min.js')}}"></script>
      <script src="{{asset('js/chart/knob/knob-chart.js')}}"></script>
      <script src="{{asset('js/chart/apex-chart/apex-chart.js')}}"></script>
      <script src="{{asset('js/chart/apex-chart/stock-prices.js')}}"></script>
      <script src="{{asset('js/notify/bootstrap-notify.min.js')}}"></script>

      <script src="{{asset('js/notify/index.js')}}"></script>
      <script src="{{asset('js/datepicker/date-picker/datepicker.js')}}"></script>
      <script src="{{asset('js/datepicker/date-picker/datepicker.en.js')}}"></script>
      <script src="{{asset('js/datepicker/date-picker/datepicker.custom.js')}}"></script>
      <script src="{{asset('js/typeahead/handlebars.js')}}"></script>
      <script src="{{asset('js/typeahead/typeahead.bundle.js')}}"></script>
      <script src="{{asset('js/typeahead/typeahead.custom.js')}}"></script>
      <script src="{{asset('js/typeahead-search/handlebars.js')}}"></script>
      <script src="{{asset('js/typeahead-search/typeahead-custom.js')}}"></script>
      <script src="{{asset('js/tooltip-init.js')}}"></script>
      <!-- Plugins JS Ends-->
      <!-- Socket Start-->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/qs/6.9.4/qs.min.js" integrity="sha512-BHtomM5XDcUy7tDNcrcX1Eh0RogdWiMdXl3wJcKB3PFekXb3l5aDzymaTher61u6vEZySnoC/SAj2Y/p918Y3w==" crossorigin="anonymous"></script>
      <script type="text/javascript">
        var socket = io.connect('127.0.0.1:9001');//url
      </script>
      <!-- Socket Ends-->

      <!-- Theme js-->
      <!-- Generate Notification -->
      <script type="text/javascript">
        //Notification
      socket.on("notification post", function (msg) {
          // Receiver
          if (msg.notification_receiver == "{{Auth::user()->emp_id}}") {
              //console.log("Notify for emp id : "+msg.notification_receiver);
              imagenn = "{{ asset('images/user.jpg')}}";
              // console.log(image);

              var body_notify =
                  "<li><p><i class='fa fa-circle-o me-3 font-primary'> </i>"+msg.notification_msg+" <span class='pull-right'>"+msg.created_at +"</span></p></li>";

              $("#header-notification").prepend(body_notify);
              var num = +$("#header-notification-count").text() + +1;
              $("#header-notification-count").text(num);
          }
      });
      </script>
      <!-- Generate Notification End-->

      <script type="text/javascript"></script>
@endauth
      <script src="{{asset('js/script.js')}}"></script>
@auth
        @if(Auth::user()->getRoles()->first() == 'adminn')
            <script src="{{asset('js/theme-customizer/customizer.js')}}"></script>
        @endif
      <!-- Plugin used-->
      <script type="text/javascript">
         if ($(".page-wrapper").hasClass("horizontal-wrapper")) {
               $(".according-menu.other" ).css( "display", "none" );
               $(".sidebar-submenu" ).css( "display", "block" );
         }
      </script>
<!-- START: Page Vendor JS-->
@if(Auth::user()->role_id == 1)
  @if(!Session::has('project_id'))
  <script type="text/javascript">
    //$("#exampleModaltooltip2").modal("show");
  </script>
  @endif
@endif

@endauth
<!-- END: Page Vendor JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

@yield('script')

<!-- START: APP JS-->
<!-- END: APP JS-->


<script>

//   var notify = $.notify('<i class="fa fa-bell-o"></i><strong>Loading</strong> page Do not close this page...', {
//     type: 'theme',
//     allow_dismiss: true,
//     delay: 2000,
//     showProgressbar: true,
//     timer: 300,
//     animate:{
//         enter:'animated fadeInDown',
//         exit:'animated fadeOutUp'
//     }
// });
  $( document ).ready(function() {
      $("html").css("--theme-deafult" , "#055156")
    });
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
  	"debug": false,
  	"positionClass": "toast-bottom-right",
  }
  		toastr.success("{{ session('message') }}");
      setTimeout(function() {
          notify.update('message', '<i class="fa fa-bell-o"></i><strong>Success</strong> {{ session("message") }}.');
      }, 1000);
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
  	"debug": false,
  	"positionClass": "toast-bottom-right",
  }
  		toastr.error("{{ session('error') }}");
      setTimeout(function() {
          notify.update('message', '<i class="fa fa-bell-o"></i><strong>Error</strong> {{ session("error") }}.');
      }, 1000);
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
  	"debug": false,
  	"positionClass": "toast-bottom-right",
  }
  		toastr.info("{{ session('info') }}");
      setTimeout(function() {
          notify.update('message', '<i class="fa fa-bell-o"></i><strong>Info</strong> {{ session("info") }}.');
      }, 1000);
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
  	"debug": false,
  	"positionClass": "toast-bottom-right",
  }
  		toastr.warning("{{ session('warning') }}");
  @endif

  String.prototype.hashCode = function() {
                    var hash = 0,
                        i, chr;
                    if (this.length === 0) return hash;
                    for (i = 0; i < this.length; i++) {
                        chr = this.charCodeAt(i);
                        hash = ((hash << 5) - hash) + chr;
                        hash |= 0; // Convert to 32bit integer
                    }
                    return hash;
     }

     function removeElement(fileName){
        let element = document.getElementById(fileName.hashCode());
        element.remove();
     }
</script>

