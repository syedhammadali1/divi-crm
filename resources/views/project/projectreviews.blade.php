@extends('layouts.main') @section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Project Review : {{$projectinfo->name}}</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{url('/')}}"> <i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('viewbrandproject')}}">Project</a></li>
                        <li class="breadcrumb-item active">Project Review</li>
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
                                Project Number
                                <div class="col text-primary">{{$projectinfo->project_number}}</div>
                            </span>
                        </div>
                        <div class="col">
                            <span>
                                Client Name
                                <div class="col text-primary">{{$projectinfo->client->name}}</div>
                            </span>
                        </div>
                        <div class="col">
                            <span>
                                Sales Name
                                <div class="col text-primary">{{$projectinfo->support->name}}</div>
                            </span>
                        </div>
                        @if(Auth::user()->type == 2)
                        <div class="col">
                            <span>
                                Manager Name
                                <div class="col text-primary">{{$projectinfo->manager->name}}</div>
                            </span>
                        </div>
                        @endif
                        <div class="col">
                            <span>
                                Creation Date
                                <div class="col text-primary">{{date('M d-Y' , strtotime($projectinfo->created_at))}}</div>
                            </span>
                        </div>
                        @if($addreview)
                            <div class="col">
                                <span>
                                    <a class="btn btn-primary" id="create-review" data-project_id="{{$projectinfo->project_number}}" data-project_name="{{$projectinfo->name}}" href="javascript:void(0)"> <i data-feather="plus-square"> </i>Create Review</a>
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

            @if($projectreviews)
                <div class="row">
                    @foreach($projectreviews as $projectreview)
                        <div class="col-xl-6 xl-100">
                            <div class="card">
                                <div class="job-search">
                                    <div class="card-body">
                                        <div class="media">
                                            <img class="img-40 img-fluid m-r-20 rounded-circle" src="{{ asset($projectreview->employeesByID->profile_pic ?? 'images/user.jpg')}}" alt="">
                                            <div class="media-body">
                                                <h6 class="f-w-600 text-center"><a>{{$projectreview->employeesByID->name}}</a></h6>
                                                <p class="text-center">{{$projectreview->employeesByID->email}} | Employee ID : <strong>{{$projectreview->employeesByID->emp_id}}</strong></p>
                                            </div>
                                        </div>
                                        <p class="text-center">{{$projectreview->message}}</p>
                                        <span class="badge badge-primary pull-right">{{$projectreview->created_at->diffForHumans()}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
    </div>
    <!-- Container-fluid Ends-->
</div>

<!-- Create thread modal -->
<div class="modal fade" id="create-review-modal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="threadLabel">New Review for </h5>
                           <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                        </div>
                         <form method="POST" action="{{route('submitprojectreview')}}" id="review-form">
                             @csrf
                             <div class="modal-body">
                                 <input type="hidden" name="project_id" id="review_project_id">
                                 <div class="mb-3">
                                     <label class="col-form-label" for="recipient-name">Project Name</label>
                                     <input class="form-control" id="project_name" type="text" readonly=""
                                            data-bs-original-title="" title="Project Name">
                                 </div>
                                 <div class="mb-3">
                                     <label class="col-form-label" for="message-text">Review *</label>
                                     <input class="form-control" required="" id="review-message" name="post_message"
                                            type="text" data-bs-original-title="" title="Review">
                                 </div>

                             </div>
                             <div class="modal-footer">
                                 <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"
                                         data-bs-original-title="" title="">Close
                                 </button>
                                 <button class="btn btn-primary" type="submit" id="submit-review-form"
                                         data-bs-original-title="" title="">Create Review
                                 </button>
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
<script type="text/javascript">

    $("#create-review").click(function () {
        // open modal
        $("#threadLabel").html("New Review for Project : <br>" + $(this).data("project_id"))
        $("#project_name").val($(this).data("project_name"));
        $("#review_project_id").val($(this).data("project_id"));
        $("#create-review-modal").modal("show");
    })


    $("#submit-review-form").click(function () {
        // submit modal
        var project_id = $("#create-review").data("project_id");
        var post_message = $("#review-message").val();

        console.log(project_id);
        console.log(post_message);

        if ($("#review-message").val() == "") {
            toastr.error("You Can't Send Empty Review !!", "Error!");
            $("#review-message").focus()
            return false;
        }
    });

</script>
@endsection
