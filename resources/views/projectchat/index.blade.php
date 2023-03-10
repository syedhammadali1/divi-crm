@extends('layouts.main') @section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Project Chat : {{$project->name}}</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{url('/')}}"> <i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('viewbrandproject')}}">Project</a></li>
                        <li class="breadcrumb-item active">Project Chat</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row project-cards">
            <div class="col-md-12 project-list">
                <div class="card">
                    <div class="row details">
                        <div class="col">
                            <span>
                                Client Name
                                <div class="col text-primary">{{$project->client->name}}</div>
                            </span>
                        </div>
                        <div class="col">
                            <span>
                                Sales Name
                                <div class="col text-primary">{{$project->support->name}}</div>
                            </span>
                        </div>
                        @if(Auth::user()->type == 2)
                        <div class="col">
                            <span>
                                Manager Name
                                <div class="col text-primary">{{$project->manager->name}}</div>
                            </span>
                        </div>
                        @endif
                        <div class="col">
                            <span>
                                Cost
                                <div class="col text-primary">$ {{$project->project_cost}}</div>
                            </span>
                        </div>
                        <div class="col">
                            <span>
                                Creation Date
                                <div class="col text-primary">{{date('M d-Y' , strtotime($project->created_at))}}</div>
                            </span>
                        </div>
                        @if(Auth::user()->type == 2)
                        <div class="col">
                            <span>
                                <a class="btn btn-primary" id="create-thread" data-project_id="{{$project->project_number}}" data-project_name="{{$project->name}}" href="javascript:void(0)"> <i data-feather="plus-square"> </i>Create Thread</a>
                            </span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div id="thread-body">
            @if($project_thread)
            @foreach($project_thread as $key => $thread)
            <div class="email-wrap">
                <div class="row">
                    <div class="col-xl-12 col-md-12 box-col-12">
                        <div class="email-right-aside">
                            <div class="card email-body radius-left">
                                <div class="ps-0">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="pills-darkprofile" role="tabpanel" aria-labelledby="pills-darkprofile-tab">
                                            <div class="email-content">
                                                <div class="thread-content">
                                                    <div class="email-top">
                                                        <div class="row">
                                                            <div class="col-md-6 xl-100 col-sm-12">
                                                                <div class="media">
                                                                    <img class="me-3 rounded-circle" src="../assets/images/user/user.png" alt="" />
                                                                    <div class="media-body">
                                                                        <h6>{{$thread->title}}
                                                                             <small><span>(</span> {{date("D M" , strtotime($thread->created_at))}}) <span>{{date('h:i a', strtotime($thread->created_at))}}</span></small>
                                                                        </h6>
                                                                        <p>Created By : <b>{{$thread->employee->username}}</b></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 xl-100 col-sm-12">
                                                                <div class="float-end d-flex">
                                                                    <p class="user-emailid">Lormlpsa<span>23</span>@company.com</p>
                                                                    <i class="fa fa-star-o f-18 mt-1"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="email-wrapper">
                                                    <p>Hello</p>
                                                    <p>Dear Sir Good Morning,</p>
                                                    <h5>Elementum varius nisi vel tempus. Donec eleifend egestas viverra.</h5>
                                                    <p class="m-b-20">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non diam facilisis, commodo libero et, commodo sapien. Pellentesque sollicitudin massa sagittis dolor facilisis, sit amet
                                                        vulputate nunc molestie. Pellentesque maximus nibh id luctus porta. Ut consectetur dui nec nulla mattis luctus. Donec nisi diam, congue vitae felis at, ullamcorper bibendum tortor.
                                                        Vestibulum pellentesque felis felis. Etiam ac tortor felis. Ut elit arcu, rhoncus in laoreet vel, gravida sed tortor.
                                                    </p>
                                                    <p>
                                                        In elementum varius nisi vel tempus. Donec eleifend egestas viverra. Donec dapibus sollicitudin blandit. Donec scelerisque purus sit amet feugiat efficitur. Quisque feugiat semper sapien
                                                        vel hendrerit. Mauris lacus felis, consequat nec pellentesque viverra, venenatis a lorem. Sed urna lectus.Quisque feugiat semper sapien vel hendrerit
                                                    </p>
                                                    <hr />
                                                </div>
                                                <div class="action-wrapper">

                                                    <form id="save-message">

                                                    <div class="card-body">
                                                        <div id="editor_container">
                                                            <textarea id="editable{{$key+10}}_edit" name="comment">Enter your message here</textarea>
                                                        </div>
                                                        <div id="html_container"></div>
                                                        <button class="btn btn-primary">Submit</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>

    </div>
    <!-- Container-fluid Ends-->
</div>

<!-- Create thread modal -->
<div class="modal fade" id="create-thread-modal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="threadLabel">New Thread for </h5>
                           <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                        </div>
                        <form id="thread-form">
                        <div class="modal-body">
                            <input type="hidden" name="project_id" id="thread_project_id">
                              <div class="mb-3">
                                 <label class="col-form-label" for="recipient-name">Project Name:</label>
                                 <input class="form-control" id="project_name" type="text" readonly="" data-bs-original-title="" title="Project Name">
                              </div>
                              <div class="mb-3">
                                 <label class="col-form-label" for="message-text">Thread Title:</label>
                                 <input class="form-control" required="" id="thread-title" name="title" type="text" data-bs-original-title="" title="Thread Title">
                              </div>

                        </div>
                        <div class="modal-footer">
                           <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">Close</button>
                           <button class="btn btn-primary" type="button" id="submit-thread-form" data-bs-original-title="" title="">Create Thread</button>
                        </div>
                        </form>
                     </div>
                  </div>
               </div>
<!-- Create thread modal End-->

@endsection @section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/vendors/simple-mde.css')}}" />
@endsection @section('js')
<script src="{{asset('js/editor/simple-mde/simplemde.min.js')}}"></script>
<!-- <script src="{{asset('js/editor/simple-mde/simplemde.custom.js')}}"></script> -->
<script src="{{asset('js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/datatable/datatables/datatable.custom.js')}}"></script>
<!-- Comment save -->
<script type="text/javascript">

    // Comment Message
    socket.on("thread-message post", function (msg) {
        // Receiver
        console.log(msg.project_id);
        if (msg.project_id == "{{$project->project_number}}") {

        var body = "<div class='email-wrap'><div class='row'><div class='col-xl-12 col-md-12 box-col-12'><div class='email-right-aside'><div class='card email-body radius-left'><div class='ps-0'><div class='tab-content'><div class='tab-pane fade active show' id='pills-darkprofile' role='tabpanel' aria-labelledby='pills-darkprofile-tab'><div class='email-content'><div class='thread-content'><div class='email-top'><div class='row'><div class='col-md-6 xl-100 col-sm-12'><div class='media'><img class='me-3 rounded-circle' src='../assets/images/user/user.png' alt='' /><div class='media-body'><h6>"+msg.title+" <small><span>("+msg.created_month+")</span> <span>"+msg.created_time+"</span></small></h6><p>Created By : <b>"+msg.created_by+"</b></p></div></div></div><div class='col-md-6 xl-100 col-sm-12'><div class='float-end d-flex'><p class='user-emailid'>Lormlpsa<span>23</span>@company.com</p><i class='fa fa-star-o f-18 mt-1'></i></div></div></div></div></div><div class='action-wrapper'><form class='save-message'><div class='card-body'><div id='editor_container'><textarea id='editable2' name='comment'>Type your messge here</textarea></div><div id='html_container'></div><button class='btn btn-primary'>Submit</button></div></form></div></div></div></div></div></div></div></div></div></div>";
        }

        console.log(body);
        $("#thread-body").prepend(body);


        (function($) {
            id = "editable2";
            var simplemde = new SimpleMDE({
                element: $("textarea#" + id)[0]
            });
            toolbarInitialTop = $('.editor-toolbar').offset().top;
            toolbarOuterHeight = $('.editor-toolbar').outerHeight();
            toolbarFixedTop = 0;
            cmPaperTop = toolbarFixedTop + toolbarOuterHeight;
            toolbarAffixAt = toolbarInitialTop - toolbarFixedTop;
            $(document).scroll(fnAffix);
            $(document).resize(fnSetWidth);
            function fnAffix() {
                // Fix toolbar at set distance from top
                // and adjust toolbar width
                if ($(document).scrollTop() > toolbarAffixAt) {
                    $('.editor-toolbar').addClass('toolbar-fixed');
                    $('.editor-toolbar').css({'top': toolbarFixedTop + 'px'});
                    $('.CodeMirror.cm-s-paper.CodeMirror-wrap').css({'top': cmPaperTop + 'px'});
                    fnSetWidth();
                }
                else {
                    $('.editor-toolbar').removeClass('toolbar-fixed');
                    $('.CodeMirror.cm-s-paper.CodeMirror-wrap').css({'top': ''});
                }
            }
            function fnSetWidth() {
                // Adjust fixed toolbar width to the width of CodeMirror
                $('.toolbar-fixed').width($('.CodeMirror.cm-s-paper.CodeMirror-wrap').width());
            }
        })(jQuery);

    });

    function submit_msg() {
        var data;
        var messagedata = $("#thread-form").serialize();
        return $.ajax({
            type: "POST",
            url: "{{ route('create_project_thread') }}",
            data: messagedata,
            dataType: "JSON",
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
            async: false,
            success: function (response) {
                if (response.status == true) {
                    // toastr.success("Message Sent!",'Success!');
                    data = response;
                } else {
                    toastr.success("Something went wrong!", "Error!");
                }
            },
        });
    }
</script>

@if($project_thread)
    @foreach($project_thread as $key => $thread)
        <script type="text/javascript">
            (function($) {
            id = "editable{{$key+10}}_edit";
            var simplemde = new SimpleMDE({
                element: $("textarea#" + id)[0]
            });
            toolbarInitialTop = $('.editor-toolbar{{$key+10}}_edit').offset().top;
            toolbarOuterHeight = $('.editor-toolbar{{$key+10}}_edit').outerHeight();
            toolbarFixedTop = 0;
            cmPaperTop = toolbarFixedTop + toolbarOuterHeight;
            toolbarAffixAt = toolbarInitialTop - toolbarFixedTop;
            $(document).scroll(fnAffix);
            $(document).resize(fnSetWidth);
            function fnAffix() {
                // Fix toolbar at set distance from top
                // and adjust toolbar width
                if ($(document).scrollTop() > toolbarAffixAt) {
                    // $('.editor-toolbar').addClass('toolbar-fixed');
                    // $('.editor-toolbar').css({'top': toolbarFixedTop + 'px'});
                    // $('.CodeMirror.cm-s-paper.CodeMirror-wrap').css({'top': cmPaperTop + 'px'});
                    //fnSetWidth();
                }
                else {
                    //$('.editor-toolbar').removeClass('toolbar-fixed');
                    //$('.CodeMirror.cm-s-paper.CodeMirror-wrap').css({'top': ''});
                }
            }
            function fnSetWidth() {
                // Adjust fixed toolbar width to the width of CodeMirror
                //$('.toolbar-fixed').width($('.CodeMirror.cm-s-paper.CodeMirror-wrap').width());
            }
        })(jQuery);
        </script>
    @endforeach
@endif

<script type="text/javascript">
    $("#create-thread").click(function(){
        $("#threadLabel").html("New thread for Project : <br>" + $(this).data("project_id"))
        $("#project_name").val($(this).data("project_name"));
        $("#thread_project_id").val($(this).data("project_id"));
        $("#create-thread-modal").modal("show");
    })

    $("#submit-thread-form").click(function(){
        if ($("#thread-title").val() == "") {
            toastr.error("Title cannot be Empty");
            $("#thread-title").focus()
            return false;
            }
            else
            {
                var post_comment_id = $("#mail").val();
                if (post_comment_id != "") {
                    var bodymaker = submit_msg();
                    $("#thread-title").val("");
                    $("#create-thread-modal").modal("hide");
                    //toastr.success("Thread Created!",'Success!');
                    //var comment_body = bodymaker.responseJSON.body;
                    var comment_body = bodymaker.responseJSON;
                    console.log(comment_body);
                    socket.emit("thread-message post", comment_body); // Sender Comment
                    //socket.emit("notification post", comment_body); // Sender Notification
                    //input.value = '';
                } else {
                    toastr.success("You Can't Create A Thread!", "Error!");
                }
            }
    })


</script>
@endsection
