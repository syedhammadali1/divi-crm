@extends('layouts.main') @section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Project Task Edit</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}"> <i data-feather="home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('projecttask',$project_task->project_id)}}">Task</a></li>
                            <li class="breadcrumb-item active">Task Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Sorry!</strong> There are some problems.<br/>
                                <br/>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        <br/>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="form theme-form">
                                <form method="POST" action="{{route('projecttask_update')}}" id="project-form"
                                      autocomplete="off">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$id}}">
                                    <input type="hidden" name="project_id" value="{{$project_task->project_id}}">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Task Title</label>
                                                <input class="form-control @error('title') is-invalid @enderror"
                                                       value="{{ old('title',$project_task->title ) }}" name="title"
                                                       type="text" placeholder="Task name *"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Project Assigned Under</label>
                                                <select class="js-example-basic-multiple col-sm-12" name="dpt_to"
                                                        id="dpt_to" required="">
                                                        <option value="" selected="" disabled="">Please select any one
                                                        </option>
                                                        @foreach($dpt_user as $user)
                                                            <option value="{{$user->emp_id}}" {{$user->emp_id == $project_task->dpt_to ? 'selected' : ''}}>{{$user->name}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
{{--                                        <div class="col-sm-4">--}}
{{--                                            <div class="mb-3">--}}
{{--                                                <label>Tag to</label>--}}
{{--                                                <select class="js-example-basic-multiple col-sm-12" name="assigned_to"--}}
{{--                                                        id="assigned_to" required=""> </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Priority</label>
                                                <select class="form-select" name="task_priority">
                                                    <option {{ $project_task->task_priority == 'Low' ? 'selected' : ''}} value="Low">Low</option>
                                                    <option {{ $project_task->task_priority == 'Medium' ? 'selected' : ''}} value="Medium">Medium</option>
                                                    <option {{ $project_task->task_priority == 'High' ? 'selected' : ''}} value="High">High</option>
                                                    <option {{ $project_task->task_priority == 'Urgent' ? 'selected' : ''}} value="Urgent">Urgent</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Task Label</label>
                                                <select class="form-select" name="task_label">
                                                    <option {{ $project_task->task_label == 'new' ? 'selected' : ''}} value="new">New</option>
                                                    <option {{ $project_task->task_label == 'in-progress' ? 'selected' : ''}} value="in-progress">In Progress</option>
                                                    <option {{ $project_task->task_label == 'awaiting-feedback' ? 'selected' : ''}} value="awaiting-feedback">Awaiting Feedback</option>
                                                    <option {{ $project_task->task_label == 'revision' ? 'selected' : ''}} value="revision">Revision</option>
                                                    <option {{ $project_task->task_label == 'complete' ? 'selected' : ''}} value="complete">Complete</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Due Date</label>
                                                <input class="datepicker-here form-control" type="text" required value="{{ old('due_date',date('m/d/Y' , strtotime($project_task->due_date))) }}" readonly name="due_date" data-language="en" data-position="bottom right"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Enter some Details</label>

                                                <div id="editor_container">
                                                    <textarea id="editable" name="details" required="">{{ old('details',$project_task->details ) }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <div id="uploaded-images"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <input type="hidden" name="attachment_path_id[]" id="attachment_path"> -->
                                </form>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Upload project file</label>
                                            <form class="dropzone" id="multiFileUpload">
                                                @csrf
                                                <div class="dz-message needsclick">
                                                    <i class="icon-cloud-up"></i>
                                                    <h6>Drop files here or click to upload.</h6>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <a class="btn btn-danger" href="javascript:void(0)" id="project-form-reset">Reset</a>
                                    </div>
                                    <div class="col-6" style="text-align: right">
                                        <a class="btn btn-success me-3" id="project-submit" href="javascript:void(0)">Submit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection @section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendors/dropzone.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendors/select2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendors/simple-mde.css')}}"/>
    <style type="text/css">
        #uploaded-images img {
            width: 15%;
            /*height: 15%;*/
            border-radius: 26px;
            padding: 5px;
        }
        .dz-image img {
            width: 97%;
        }
    </style>
@endsection @section('js')
    <script src="{{asset('js/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('js/dropzone/dropzone-script.js')}}"></script>
    <script src="{{asset('js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('js/select2/select2-custom.js')}}"></script>

    <script src="{{asset('js/editor/simple-mde/simplemde.min.js')}}"></script>
    <script src="{{asset('js/editor/simple-mde/simplemde.custom.js')}}"></script>

    <script type="text/javascript">
        $("#project-submit").click(function () {
            $("#project-form").submit();
        });
        $("#project-form-reset").click(function () {
            $("#project-form").trigger("reset");
        });

        $("#multiFileUpload").dropzone({
            url: "{{route('project_attachment')}}",
            maxFilesize: 3,
            addRemoveLinks: true,
            init: function () {
                // For Uploaded Attachments
                var attachmentdata =  JSON.parse('{{$project_attachment_data}}'.replace(/&quot;/g,'"'));

                var myDropzone = this;

                $.each(attachmentdata, function (key, value) {
                    var file = {name: value.name, size: value.size};
                    myDropzone.options.addedfile.call(myDropzone, file);
                    myDropzone.options.thumbnail.call(myDropzone, file, value.path);
                    myDropzone.emit("complete", file);

                    // $("#uploaded-images").append('<img src="' + value.path + '">');
                    $("#uploaded-images").append('<input type="hidden" name="attachment_path_id[]" value="' + value.path + '">');
                });

                this.on("success", function (file, response) {
                    var obj = jQuery.parseJSON(response);
                    //console.log(obj);
                    var img = obj.filepath;
                    var url = $("#web_url").val();
                    if (url != "http://127.0.0.1:8000") {
                        url = url + "/public";
                    }

                    if (obj.filetype == "pdf") {
                        // $("#uploaded-images").append('<a download href="' + url + img + '"><i class="fa fa-file-pdf-o"></i> Download PDF File</a>');
                        $("#uploaded-images").append('<input type="hidden" name="attachment_path_id[]" value="' + img + '">');
                    } else if (obj.filetype == "docx") {
                        // $("#uploaded-images").append('<a download href="' + url + img + '"><i class="fa fa-file-word-o" aria-hidden="true"></i> Download Word File</a>');
                        $("#uploaded-images").append('<input type="hidden" name="attachment_path_id[]" value="' + img + '">');
                    } else {
                        // $("#uploaded-images").append('<img src="' + url + img + '">');
                        $("#uploaded-images").append('<input type="hidden" name="attachment_path_id[]" value="' + img + '">');
                    }
                });
            },
        });
    </script>

{{--    <script type="text/javascript">--}}
{{--        $("#dpt_to").change(function () {--}}
{{--            var id = $(this).find(":selected").val();--}}
{{--            $.ajax({--}}
{{--                type: "post",--}}
{{--                dataType: "json",--}}
{{--                url: "{{route('get_emp')}}",--}}
{{--                data: {emp_id: id, _token: "{{csrf_token()}}"},--}}
{{--                success: function (response) {--}}
{{--                    if (response.status == 0) {--}}
{{--                        toastr.error("No data found");--}}
{{--                        $("#assigned_to").html("");--}}
{{--                    } else {--}}
{{--                        $("#assigned_to").html(response.body);--}}
{{--                    }--}}
{{--                },--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endsection
