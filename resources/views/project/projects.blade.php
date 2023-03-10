@extends('layouts.main')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Project List</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{route('viewbrandproject')}}" >Project</a></li>
                        <li class="breadcrumb-item active">Project List</li>
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
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true"><i data-feather="target"></i>All</a></li>
                                <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false"><i data-feather="info"></i>Doing</a></li>
                                <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><i data-feather="check-circle"></i>Done</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-0 me-0"></div>
                            @can('add-project')
                            <a class="btn btn-primary" href="{{route('viewProjectCreate')}}"> <i data-feather="plus-square"> </i>Create New Project</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="top-tabContent">
                            <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                                <div class="row">

                                    @if(count($projects) > 0)
                                    @foreach($projects as $project)
                                    <div class="col-xxl-12 col-lg-12" id="{{$project->project_number}}">
                                        <div class="project-box">
                                            <span class="badge badge-primary">{{$project->status}}</span>
                                            <h6>{{$project->name}} | {{$project->project_number}}</h6>
                                            <div class="media">
                                                <img class="img-20 me-1 rounded-circle" src="{{asset('images/user/3.jpg')}}" alt="" data-original-title="" title="">
                                                <div class="media-body">
                                                    @if($project->packages)

                                                    @foreach($project->packages as $val)
                                                    <a href="">{{$val->package->name}}</a>
                                                    @endforeach

                                                    @endif
                                                </div>
                                            </div>
                                            <p>{{$project->project_details}}</p>
                                            <div class="row details">
                                                @if (!auth()->user()->isA('developer','team lead'))
                                                <div class="col"><span>Client Email <div class="col text-primary">  <a @if(Bouncer::is(Auth()->user())->A('admin','sales','client')) href="{{route('client_task_profile',[$project->client->id])}}" @else href="#" @endif>{{$project->client_email}}</a>  </div></span></div>
                                                <div class="col"><span>Sale person Email <div class="col text-primary">  <a @if(Auth::user()->type == 2) href="{{route('support_task_profile',[$project->support->emp_id])}}" @endif >{{$project->support->email}}</a>  </div></span></div>

                                                @endif

                                                @if(isset($project->supportPerson->email))
                                                <div class="col"><span>Support person <div class="col text-primary">  <a href="#">{{$project->supportPerson->email}}</a>  </div></span></div>
                                                @endif
                                                @if(Auth::user()->type == 2)
                                                <div class="col"><span>Project Manager<div class="col text-primary">  <a href="#">{{isset($project->manager->name) ? $project->manager->name : 'Not Asigne'}}</a>  </div></span></div>
                                                <div class="col"><span>Source<div class="col text-primary">  <a href="#">{{isset($project->sourceaccount->name) ? $project->sourceaccount->name : 'Not Asigne'}}</a>  </div></span></div>
                                                @endif

                                                <div class="col"><span>Brand <div class="col text-primary"> <a @if(Bouncer::can('view-brands')) href="{{route('brand.show',['brand' => $project->brand->id ])}}" @else href="#" @endif> {{$project->brand->name}} </a></div></span></div>

                                                <div class="col"><span>Project Category <div class="col text-primary"> <a href="#"> {{$project->project_category}} </a></div></span></div>
                                                @if(Auth::user()->type == 2)
                                                <div class="col"><span>Task <div class="col text-primary"> <a @if(Bouncer::can('view-task')) href="{{route('projecttask',[$project->project_number])}}" @else href="#" @endif> {{count($project->projectTasks)}} </a></div></span></div>

{{--                                                <div class="col"><span>Project Owner <div class="col text-primary">--}}
{{--                                                                  <a href="#"> {{$project->projownertype == 'soleprop' ? 'Sole Proprietor' : 'Partnership'}} </a></div></span></div>--}}

                                                    <div class="col"><span>Dead-line <div class="col text-primary">
                                                                  <a href="#"> {{date('M d-Y' , strtotime($project->deadline))}} </a></div></span>
                                                    </div>

                                                @endif
                                            </div>

                                            <div class="row details">
                                                @if(!auth()->user()->isA('developer','team lead'))
                                                <div class="col"><span>Total Cost <div class="col text-primary">{{$project->project_cost}}</div></span></div>
                                                <div class="col"><span>Upfront Payment <div class="col text-primary">{{$project->paid_cost}}</div></span></div>
                                                <div class="col"><span>Remaining Cost <div class="col text-primary">{{$project->remaining_cost}}</div></span></div>
                                                @endif
                                                <div class="col"><span>Project Priority <div class="col text-primary">{{$project->project_priority}} </div></span></div>
                                                <div class="col"><span>Created By <div class="col text-primary"> {{$project->support->name}}</div></span></div>
                                                <div class="col"><span>Creation Date <div class="col text-primary">{{date('M d-Y' , strtotime($project->created_at))}} </div></span></div>
                                                <div class="col"><span>Project Assigne To <div class="col text-primary"> {{$project->assign_project_to_user->name ?? '---'}}</div></span></div>
                                            </div>

                                            <div class="customers">

                                                <ul>
                                                    <li class="d-inline-block">
                                                        <img
                                                            class="img-30 rounded-circle"
                                                            src="{{isset($project->client->profile_pic) ? asset($project->client->profile_pic) : asset('uploads/avatar/demo-user-icon.png')}}"
                                                            alt="{{$project->client->name}}"
                                                            data-original-title="{{$project->client->name}}"
                                                            title="{{$project->client->name}}"
                                                        />
                                                    </li>
                                                    <li class="d-inline-block">
                                                        <img
                                                            class="img-30 rounded-circle"
                                                            src="{{isset($project->support->profile_pic) ? asset($project->support->profile_pic) : asset('uploads/avatar/demo-user-icon.png')}}"
                                                            alt="{{$project->support->name}}"
                                                            data-original-title="{{$project->support->name}}"
                                                            title="{{$project->support->name}}"
                                                        />
                                                    </li>
                                                    {{--
                                                    @php $empRecords = \App\Helpers\Helper::empAvatarbyProjectID($project->project_number)@endphp

                                                    @foreach($empRecords as $empRecord)
                                                    <li class="d-inline-block">
                                                        <img
                                                            class="img-30 rounded-circle"
                                                            src="{{isset($empRecord->assigner->profile_pic) ? asset($empRecord->assigner->profile_pic) : asset('uploads/avatar/demo-user-icon.png')}}"
                                                            alt="{{$empRecord->assigner->name}}"
                                                            data-original-title="{{$empRecord->assigner->name}}"
                                                            title="{{$empRecord->assigner->name}}"
                                                        />
                                                    </li>
                                                    @endforeach--}}

                                                    <li class="d-inline-block ms-2">
                                                        <p class="f-12">+10 More</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="project-status mt-4">
                                                <div class="media mb-0">
                                                    <p>{{round(count($project->projectTasks) != 0 ? count($compelettasks)/count($project->projectTasks)*100 : '0')}}% </p>
                                                    <div class="media-body text-end"><span>{{$project->status}}</span></div>
                                                </div>
                                                <div class="progress" style="height: 5px">
                                                    <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: {{round(count($project->projectTasks) != 0 ? count($compelettasks)/count($project->projectTasks)*100 : '0')}}%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="pt-2">
                                                @can('view-task')
                                                <a class="btn btn-primary mt-2 create-task-btn" href="{{route('projecttask',[$project->project_number])}}"> <i class="icofont icofont-eye-alt"> </i> View Task</a>
                                                @endcan

                                                <a class="btn btn-primary mt-2 create-task-btn" href="{{route('projectdetail.id',[$project->project_number])}}"> <i class="icofont icofont-files"> </i>Detail</a>
                                                @if(!auth()->user()->isA('developer','team lead'))
                                                <a class="btn btn-primary mt-2" href="{{route('projecttransitionhistory.id',[$project->project_number])}}"><i class="icofont icofont-money-bag"> </i> Project Transition</a>
                                                @endif
                                                @if(Bouncer::is(Auth()->user())->A('admin','sales','hod sales and support'))
                                                @if($project->status != 'Completed' && $project->status != 'Closed')
                                                <a class="btn btn-success mt-2" href="{{route('projectAndTaskStatusUpdate',[1,$project->project_number])}}">
                                                    <i class="icofont icofont-check-alt"> </i>Mark As Complete</a>
                                                <a class="btn btn-danger mt-2" href="{{route('projectAndTaskStatusUpdate',[2,$project->project_number])}}">
                                                    <i class="icofont icofont-close"> </i>Mark As Closed</a>

                                                @if(Bouncer::is(Auth()->user())->A('admin','hod sales and support'))
                                                <a class="btn btn-danger mt-2" onclick="deleteRecord('{{ $project->project_number }}')" href="#"> <i class="icofont icofont-bin"> </i> Delete </a>
                                                @endif
                                                @endif
                                                @endif
                                                @if(Bouncer::is(Auth()->user())->A('admin','sales','client','production manager'))
                                                <a class="btn btn-primary mt-2 create-task-btn" href="{{route('projectChat',[$project->project_number])}}"> <i class="icofont icofont-ui-message"> </i> Chat </a>
                                                @endif
                                                <a class="btn btn-primary mt-2" href="{{route('projectattachments.id',$project->id)}}"> <i class="icofont icofont-attachment"> </i> Project Attachments</a>
                                                @if($project->status == 'Completed' || $project->status == 'Closed')
                                                <a class="btn btn-primary mt-2" href="{{route('projectreview.id',$project->project_number)}}"> <i class="icofont icofont-attachment"> </i> Project Reviews</a>
                                                @endif

                                                @if(Bouncer::is(Auth()->user())->A('admin','hod production','production manager'))
                                                <a class="btn btn-primary mt-2" href="{{route('assigneeProject.projectId',$project->id)}}"> <i class="icofont icofont-paper-plane"> </i> Assign Project </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <h4>No Project Found!</h4>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                                <div class="row">
                                    @if($projects)
                                    @foreach($projects as $project)
                                    @if($project->status == 'None' || $project->status == 'Doing')
                                    <div class="col-xxl-12 col-lg-12">
                                        <div class="project-box">
                                            <span class="badge badge-primary">{{$project->status}}</span>
                                            <h6>{{$project->name}}</h6>
                                            <div class="media">
                                                <img class="img-20 me-1 rounded-circle" src="{{asset('images/user/3.jpg')}}" alt="" data-original-title="" title="">
                                                <div class="media-body">
                                                    @if($project->packages)

                                                    @foreach($project->packages as $val)
                                                    <a href="">{{$val->package->name}}</a>
                                                    @endforeach

                                                    @endif
                                                </div>
                                            </div>
                                            <p>{{$project->project_details}}</p>


                                            <div class="row details">
                                                @if (!auth()->user()->isA('developer','team lead'))
                                                <div class="col"><span>Client Email <div class="col text-primary">{{$project->client_email}} </div></span></div>
                                                @endif
                                                <div class="col"><span>Task <div class="col text-primary"> <a @if(Bouncer::can('view-task')) href="{{route('projecttask',[$project->project_number])}}" @else href="#" @endif> {{count($project->projectTasks)}} </a></div></span></div>

{{--                                                <div class="col"><span>Project Owner <div class="col text-primary">--}}
{{--                                                                  <a href="#"> {{$project->projownertype == 'soleprop' ? 'Sole Proprietor' : 'Partnership'}} </a></div></span></div>--}}

                                                <div class="col"><span>Dead-line <div class="col text-primary">
                                                                  <a href="#"> {{date('M d-Y' , strtotime($project->deadline))}} </a></div></span>
                                                </div>
                                                @if(!auth()->user()->isA('developer','team lead'))
                                                <div class="col"><span>Total Cost <div class="col text-primary">{{$project->project_cost}}</div></span></div>
                                                <div class="col"><span>Upfront Payment <div class="col text-primary">{{$project->paid_cost}}</div></span></div>
                                                <div class="col"><span>Remaining Cost <div class="col text-primary">{{$project->remaining_cost}}</div></span></div>
                                                @endif
                                                <div class="col"><span>Project Priority <div class="col text-primary">{{$project->project_priority}} </div></span></div>
                                                <div class="col"><span>Created By <div class="col text-primary"> {{$project->support->name}}</div></span></div>
                                                <div class="col"><span>Creation Date <div class="col text-primary">{{date('M d-Y' , strtotime($project->created_at))}} </div></span></div>
                                            </div>
                                            <div class="customers">
                                                <ul>
                                                    <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('images/user/3.jpg')}}" alt="" data-original-title="" title=""></li>
                                                    <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('images/user/5.jpg')}}" alt="" data-original-title="" title=""></li>
                                                    <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('images/user/1.jpg')}}" alt="" data-original-title="" title=""></li>
                                                    <li class="d-inline-block ms-2">
                                                        <p class="f-12">+10 More</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="project-status mt-4">
                                                <div class="media mb-0">
                                                    <p>{{round(count($project->projectTasks) != 0 ? count($compelettasks)/count($project->projectTasks)*100 : '0')}}% </p>
                                                    <div class="media-body text-end"><span>{{$project->status}}</span></div>
                                                </div>
                                                <div class="progress" style="height: 5px">
                                                    <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: {{round(count($project->projectTasks) != 0 ? count($compelettasks)/count($project->projectTasks)*100 : '0')}}%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="pt-2">
                                                @can('view-task')
                                                <a class="btn btn-primary create-task-btn" href="{{route('projecttask',[$project->project_number])}}"> <i class="icofont icofont-eye-alt"> </i>  View Task</a>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                                <div class="row">
                                    @if($projects)
                                    @foreach($projects as $project)
                                    @if($project->status == 'Done')
                                    <div class="col-xxl-12 col-lg-12">
                                        <div class="project-box">
                                            <span class="badge badge-success">{{$project->status}}</span>
                                            <h6>Endless admin Design</h6>
                                            <div class="media">
                                                <img class="img-20 me-1 rounded-circle" src="{{asset('images/user/3.jpg')}}" alt="" data-original-title="" title="">
                                                <div class="media-body">
                                                    @if($project->packages)

                                                    @foreach($project->packages as $val)
                                                    <a href="">{{$val->package->name}}</a>
                                                    @endforeach

                                                    @endif
                                                </div>
                                            </div>
                                            <p>{{$project->project_details}}</p>
                                            <div class="row details">
                                                @if (!auth()->user()->isA('developer','team lead'))
                                                <div class="col"><span>Client Email <div class="col text-primary">{{$project->client_email}} </div></span></div>
                                                @endif
                                                <div class="col"><span>Task <div class="col text-primary"> <a @if(Bouncer::can('view-task')) href="{{route('projecttask',[$project->project_number])}}" @else href="#" @endif> {{count($project->projectTasks)}} </a></div></span></div>

{{--                                                <div class="col"><span>Project Owner <div class="col text-primary">--}}
{{--                                                                  <a href="#"> {{$project->projownertype == 'soleprop' ? 'Sole Proprietor' : 'Partnership'}} </a></div></span></div>--}}

                                                <div class="col"><span>Dead-line <div class="col text-primary">
                                                                  <a href="#"> {{date('M d-Y' , strtotime($project->deadline))}} </a></div></span>
                                                </div>
                                                @if(!auth()->user()->isA('developer','team lead'))
                                                <div class="col"><span>Total Cost <div class="col text-primary">{{$project->project_cost}}</div></span></div>
                                                <div class="col"><span>Upfront Payment <div class="col text-primary">{{$project->paid_cost}}</div></span></div>
                                                <div class="col"><span>Remaining Cost <div class="col text-primary">{{$project->remaining_cost}}</div></span></div>
                                                @endif
                                                <div class="col"><span>Project Priority <div class="col text-primary">{{$project->project_priority}} </div></span></div>
                                                <div class="col"><span>Created By <div class="col text-primary"> {{$project->support->name}}</div></span></div>
                                                <div class="col"><span>Creation Date <div class="col text-primary">{{date('M d-Y' , strtotime($project->created_at))}} </div></span></div>
                                            </div>
                                            <div class="customers">
                                                <ul>
                                                    <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('images/user/3.jpg')}}" alt="" data-original-title="" title=""></li>
                                                    <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('images/user/5.jpg')}}" alt="" data-original-title="" title=""></li>
                                                    <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('images/user/1.jpg')}}" alt="" data-original-title="" title=""></li>
                                                    <li class="d-inline-block ms-2"><p class="f-12">+10 More</p> </li>
                                                </ul>
                                            </div>
                                            <div class="project-status mt-4">
                                                <div class="media mb-0">
                                                    <p>{{round(count($project->projectTasks) != 0 ? count($compelettasks)/count($project->projectTasks)*100 : '0')}}% </p>
                                                    <div class="media-body text-end"><span>{{$project->status}}</span></div>
                                                </div>
                                                <div class="progress" style="height: 5px">
                                                    <div class="progress-bar-animated bg-success progress-bar-striped" role="progressbar" style="width: {{round(count($project->projectTasks) != 0 ? count($compelettasks)/count($project->projectTasks)*100 : '0')}}%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="pt-2">
                                                @can('view-task')
                                                <a class="btn btn-primary create-task-btn" href="{{route('projecttask',[$project->project_number])}}"> <i class="icofont icofont-eye-alt"> </i>  View Task</a>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        <form id="delete-form" method="POST" style="display:none">
                            @method('DELETE')
                            @csrf
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection

@section('css')
<style type="text/css">
    .create-task-btn{
        display: flex;
        align-items: center;
        margin-right: 5px;
        vertical-align: -12px;
        float: left;
    }
</style>
@endsection

@section('js')
<script>

    function deleteRecord(id) {
        let confirmBox = confirm('Are You Really Want To Delete!');
        if (confirmBox) {
            let path = `{{ url('project-delete/${id}') }}`;
            $('#delete-form').attr('action', path);
            $('#delete-form').submit();
        }
    }
</script>
@endsection
