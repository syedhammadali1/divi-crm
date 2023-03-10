@extends('layouts.main')
@section('content')
<div class="page-body">
               <div class="container-fluid">
                  <div class="page-title">
                     <div class="row">
                        <div class="col-6">
                           <h3>Project Task List</h3>
                        </div>
                        <div class="col-6">
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                              <li class="breadcrumb-item"><a href="{{route('viewbrandproject')}}">Project</a></li>
                              <li class="breadcrumb-item active">Project Task</li>
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
                                        Project Id
                                        <div class="col text-primary"><a href="{{route('viewbrandproject.id',$projectinfo->brand->slug)}}#{{$projectinfo->project_number}}">{{$projectinfo->project_number}}</a></div>
                                    </span>
                                </div>

                                <div class="col">
                                    <span>
                                        Project Name
                                        <div class="col text-primary"><a href="{{route('viewbrandproject.id',$projectinfo->brand->slug)}}#{{$projectinfo->project_number}}">{{$projectinfo->name}}</a></div>
                                    </span>
                                </div>

                                <div class="col">
                                    <span>
                                        Brand Name
                                        <div class="col text-primary">{{$projectinfo->brand->name}}</div>
                                    </span>
                                </div>

                                <div class="col">
                                    <span>
                                        Project Type
                                        <div class="col text-primary">{{$projectinfo->project_type}}</div>
                                    </span>
                                </div>

                                <div class="col">
                                    <span>
                                        Project Priority
                                        <div class="col text-primary">{{$projectinfo->project_priority}}</div>
                                    </span>
                                </div>

                                <div class="col">
                                    <span>
                                        Production Manager
                                        <div class="col text-primary">{{$projectinfo->manager->name}}</div>
                                    </span>
                                </div>

                            </div>
                        </div>
                     </div>

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
                                      @can('add-task')
                                          <a class="btn btn-primary" href="{{route('createtask',$id)}}"> <i data-feather="plus-square"> </i>Create New Task</a>
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
                                        @if($project_task)
                                            @foreach($project_task as $task)
                                                <div class="col-xxl-12 col-lg-12" id="{{$task->task_number}}">
                                                    <div class="project-box">
                                                        <span class="badge badge-primary">{{$task->status}}</span>
                                                        <h6>{{$task->title}} | {{$task->task_number}}</h6>
                                                        <div class="media">
                                                            <img class="img-20 me-1 rounded-circle"
                                                                 src="{{asset('images/user/3.jpg')}}" alt=""
                                                                 data-original-title="" title="">
                                                            <div class="media-body">
                                                                <a href="javascript:void(0)"
                                                                   data-project_id="{{$task->project_id}}"
                                                                   data-task_id="{{$task->task_number}}"
                                                                   class="btn btn-primary view-comments">View
                                                                    Comments</a>
                                                            </div>
                                                        </div>
                                                        <p>{{$task->details}}</p>
                                                        <div class="row details">
                                                            <div class="col">
                                                    <span>
                                                        Task Assigned Under
                                                        <div
                                                            class="col text-primary">{{$task->assign_under->name}}</div>
                                                    </span>
                                                            </div>

                                                            <div class="col">
                                                    <span>
                                                        Task Assign To
                                                        <div class="col text-primary">
                                                            <a
                                                                @if(Bouncer::is(Auth()->user())->A('admin','team lead','developer','production manager'))
                                                                class="task-modal"
                                                                @else class="" @endif
                                                                href="javascript:void(0)"
                                                                data-label="User"
                                                                data-title="Task Assigner"
                                                                data-old="{{!is_null($task->assigner_label($task->task_number))?$task->assigner_label($task->task_number)->assigner->emp_id:''}}"
                                                                data-dpt_id="{{$task->dpt_to}}"
                                                                data-task_id="{{$task->task_number}}"
                                                                data-task_type="1"
                                                                data-whatever="@fat"
                                                                data-update="{{!is_null($task->assigner_label($task->task_number))?$task->assigner_label($task->task_number)->id:0}}"
                                                            >
                                                                {{!is_null($task->assigner_label($task->task_number))?$task->assigner_label($task->task_number)->assigner->name:'Not Assigned'}}
                                                            </a>
                                                        </div>
                                                    </span>
                                                            </div>

                                                            <div class="col">
                                                    <span>
                                                        Due Date
                                                        <div class="col text-primary">
                                                            <a
                                                                href="javascript:void(0)"
                                                                @if(Bouncer::is(Auth()->user())->A('admin','team lead','production manager'))
                                                                class="task-modal"
                                                                @else class="" @endif
                                                                data-label="Due Date"
                                                                data-title="Update Due Date"
                                                                data-old="{{date('m/d/Y' , strtotime($task->due_date))}}"
                                                                data-dpt_id="{{$task->dpt_to}}"
                                                                data-task_id="{{$task->task_number}}"
                                                                data-task_type="3"
                                                                data-whatever="@fat"
                                                                data-update="{{$task->id}}"
                                                            >
                                                                {{date('d-m-Y' , strtotime($task->due_date))}}
                                                            </a>
                                                        </div>
                                                    </span>
                                                            </div>

                                                            <div class="col">
                                                    <span>
                                                        Tags
                                                        <div class="col text-primary">
                                                            <a
                                                                href="javascript:void(0)"
                                                                @if(Bouncer::is(Auth()->user())->A('admin','team lead','developer','production manager'))
                                                                class="task-modal"
                                                                @else class="" @endif
                                                                data-label="Tag"
                                                                data-title="Add Tags"
                                                                data-old="{{!is_null($task->assigner_tags($task->task_number))?$task->assigner_tags($task->task_number)->title:'#notag'}}"
                                                                data-task_id="{{$task->task_number}}"
                                                                data-update="{{!is_null($task->assigner_tags($task->task_number))?$task->assigner_tags($task->task_number)->id:0}}"
                                                                data-task_type="2"
                                                                data-whatever="@fat"
                                                            >
                                                                {{!is_null($task->assigner_tags($task->task_number))?$task->assigner_tags($task->task_number)->title:'No Tags'}}
                                                            </a>
                                                        </div>
                                                    </span>
                                                            </div>

                                                            <div class="col">
                                                                <span>
                                                                    Task Label
                                                                    <div class="col text-primary">{{$task->task_label}}</div>
                                                                </span>
                                                            </div>

                                                            <div class="col">
                                                                <span>
                                                                    Task Priority
                                                                    <div class="col text-primary">{{$task->task_priority}}</div>
                                                                </span>
                                                            </div>

                                                            <div class="col">
                                                                <span>
                                                                    Created By
                                                                    <div class="col text-primary">{{$task->support->name}}</div>
                                                                </span>
                                                            </div>

                                                            <div class="col">
                                                    <span>
                                                        Creation Date Time
                                                        <div
                                                            class="col text-primary">{{date('M-d-Y / H:i:s' , strtotime($task->created_at))}}</div>
                                                    </span>
                                                            </div>
                                                            @if(isset($task->task_updated_at))
                                                                <div class="col">
                                                        <span>
                                                            Updated By
                                                            <div
                                                                class="col text-primary">{{$task->taskUpdatedBy->name}}</div>
                                                        </span>
                                                                </div>

                                                                <div class="col">
                                                        <span>
                                                            Task Updated At
                                                            <div
                                                                class="col text-primary">{{date('M-d-Y / H:i:s' , strtotime($task->task_updated_at))}}</div>
                                                        </span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="customers">
                                                            <ul>
                                                                <li class="d-inline-block">
                                                                    <img
                                                                        class="img-30 rounded-circle"
                                                                        src="{{asset($task->assign_under->profile_pic)}}"
                                                                        alt="{{$task->assign_under->name}}"
                                                                        data-original-title="Assigned Under - '{{$task->assign_under->name}}'"
                                                                        title="Assigned Under - '{{$task->assign_under->name}}'"
                                                                    />
                                                                </li>
                                                                @if($task->total_users($task->task_number)) @foreach($task->total_users($task->task_number) as $val)
                                                                    @if($val->assigner)

                                                                        <li class="d-inline-block">
                                                                            <img
                                                                                class="img-30 rounded-circle"
                                                                                src="{{asset($val->assigner->profile_pic)}}"
                                                                                alt="{{$val->assigner->name}}"
                                                                                data-original-title="Assigned To - '{{$val->assigner->name}}'"
                                                                                title="Assigned To - '{{$val->assigner->name}}'"
                                                                            />
                                                                        </li>
                                                                    @endif
                                                                @endforeach

                                                                <li class="d-inline-block ms-2">
                                                                    <p class="f-12">{{count($task->total_users($task->task_number)) + 1}}
                                                                        Members</p>
                                                                </li>
                                                                @else
                                                                    <li class="d-inline-block ms-2">
                                                                        <p class="f-12">1 Member</p>
                                                                    </li>

                                                                @endif
                                                            </ul>
                                                        </div>
                                                        <div class="project-status mt-4">
                                                            <div class="media mb-0">
                                                                <?php
                                                                if ($task->status == 'Completed') {
                                                                    $style = "success";
                                                                } elseif ($task->status == 'Closed') {
                                                                    $style = "danger";
                                                                } else {
                                                                    $style = "primary";
                                                                } ?>
                                                                <p>{{($task->status == 'Completed' || $task->status == 'Closed')?100 : $task->progress}}%</p>
                                                                <div class="media-body text-end">
                                                                    <span>{{$task->status}}</span></div>
                                                            </div>

                                                            <div class="progress" style="height: 5px;">
                                                                <div
                                                                    class="progress-bar-animated bg-{{$style}} progress-bar-striped"
                                                                    role="progressbar"
                                                                    style="width: {{($task->status == 'Completed' || $task->status == 'Closed')?100 : $task->progress}}%"
                                                                    aria-valuenow="{{$task->progress}}"
                                                                    aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                ></div>
                                                            </div>
                                                            <div class="col-lg-12 pt-2">
{{--                                                                @if($task->status != 'Completed' && $task->status != 'Closed')--}}
                                                                    @can('edit-task')
                                                                        <a class="btn btn-primary"
                                                                           href="{{route('edittask',$task->id)}}"> <i
                                                                                class="icofont icofont-eye-alt"> </i>
                                                                            Edit Task</a>
                                                                    @endcan
{{--                                                                @endif--}}
                                                                @if($task->user_id == Auth()->user()->emp_id)
                                                                    @if($task->status != 'Completed' && $task->status != 'Closed')
                                                                        <a class="btn btn-success"
                                                                           href="{{route('projectAndTaskStatusUpdate',[3,$task->task_number])}}">
                                                                            <i class="icofont icofont-check-alt"> </i>Mark
                                                                            As Complete</a>
                                                                        <a class="btn btn-danger"
                                                                           href="{{route('projectAndTaskStatusUpdate',[4,$task->task_number])}}">
                                                                            <i class="icofont icofont-close"> </i>Mark
                                                                            As Closed</a>
                                                                    @endif
                                                                @endif
                                                                    <a class="btn btn-primary" href="{{route('projecttaskattachments.id',$task->id)}}"> <i class="icofont icofont-eye-alt"> </i> Tasks Attachments</a>

{{--                                                                    <button class="btn btn-primary" id="taskprogressbtn" onclick="taskprogressbtn('{{ $task->project_id }}' , '{{ $task->task_number }}')" data-project_id="{{$task->project_id}}" data-task_id="{{$task->task_number}}" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#taskprogressmodel"><i class="icofont icofont-bars"> </i>  Task Progress</button>--}}
                                                                    <button class="btn btn-primary taskprogressbtn" data-project_id="{{$task->project_id}}" data-task_id="{{$task->task_number}}" type="button" data-bs-toggle="modal" data-original-title="test"><i class="icofont icofont-bars"> </i>  Task Progress</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                                <div class="row">
                                    @if($project_task)
                                    @foreach($project_task as $task)
                                    @if($task->status == 'None' || $task->status == 'Doing')
                                    <?php
                                          if($task->status == 'Completed'){ $style = "success"; }elseif ($task->status == 'Closed') { $style = "danger"; }else{ $style = "primary"; } ?>
                                    <div class="col-xxl-12 col-lg-12">
                                        <div class="project-box">
                                            <span class="badge badge-{{$style}}">{{$task->status}}</span>
                                            <h6>{{$task->title}}</h6>
                                            <div class="media">
                                                <img class="img-20 me-1 rounded-circle" src="{{asset('images/user/3.jpg')}}" alt="" data-original-title="" title="" />
                                                <div class="media-body">
                                                    <a href="javascript:void(0)" data-project_id="{{$task->project_id}}" data-task_id="{{$task->task_number}}" class="btn btn-primary view-comments">View Comments</a>
                                                </div>
                                            </div>
                                            <p>{{$task->details}}</p>
                                            <div class="row details">
                                                <div class="col">
                                                    <span>
                                                        Task Assigned Under
                                                        <div class="col text-primary">{{$task->assign_under->name}}</div>
                                                    </span>
                                                </div>

                                                <div class="col">
                                                    <span>
                                                        Task Assign To
                                                        <div class="col text-primary">
                                                            <a @if(Bouncer::is(Auth()->
                                                                user())->A('admin','team lead','production manager')) class="task-modal" @else class="" @endif href="javascript:void(0)" data-label="User" data-title="Task Assigner"
                                                                data-old="{{!is_null($task->assigner_label($task->task_number))?$task->assigner_label($task->task_number)->assigner->emp_id:''}}" data-dpt_id="{{$task->dpt_to}}"
                                                                data-task_id="{{$task->task_number}}" data-task_type="1" data-whatever="@fat"
                                                                data-update="{{!is_null($task->assigner_label($task->task_number))?$task->assigner_label($task->task_number)->id:0}}" >
                                                                {{!is_null($task->assigner_label($task->task_number))?$task->assigner_label($task->task_number)->assigner->name:'Not Assigned'}}
                                                            </a>
                                                        </div>
                                                    </span>
                                                </div>

                                                <div class="col">
                                                    <span>
                                                        Due Date
                                                        <div class="col text-primary">
                                                            <a href="javascript:void(0)" @if(Bouncer::is(Auth()->
                                                                user())->A('admin','team lead','production manager')) class="task-modal" @else class="" @endif data-label="Due Date" data-title="Update Due Date" data-old="{{date('m/d/Y' ,
                                                                strtotime($task->due_date))}}" data-dpt_id="{{$task->dpt_to}}" data-task_id="{{$task->task_number}}" data-task_type="3" data-whatever="@fat" data-update="{{$task->id}}" >
                                                                {{date('d-m-Y' , strtotime($task->due_date))}}
                                                            </a>
                                                        </div>
                                                    </span>
                                                </div>

                                                <div class="col">
                                                    <span>
                                                        Tags
                                                        <div class="col text-primary">
                                                            <a href="javascript:void(0)" @if(Bouncer::is(Auth()->
                                                                user())->A('admin','team lead','production manager')) class="task-modal" @else class="" @endif data-label="Tag" data-title="Add Tags"
                                                                data-old="{{!is_null($task->assigner_tags($task->task_number))?$task->assigner_tags($task->task_number)->title:'#notag'}}" data-task_id="{{$task->task_number}}"
                                                                data-update="{{!is_null($task->assigner_tags($task->task_number))?$task->assigner_tags($task->task_number)->id:0}}" data-task_type="2" data-whatever="@fat" >
                                                                {{!is_null($task->assigner_tags($task->task_number))?$task->assigner_tags($task->task_number)->title:'No Tags'}}
                                                            </a>
                                                        </div>
                                                    </span>
                                                </div>

                                                <div class="col">
                                                    <span>
                                                        Task Label
                                                        <div class="col text-primary">{{$task->task_label}}</div>
                                                    </span>
                                                </div>

                                                <div class="col">
                                                    <span>
                                                        Task Priority
                                                        <div class="col text-primary">{{$task->task_priority}}</div>
                                                    </span>
                                                </div>

                                                <div class="col">
                                                    <span>
                                                        Created By
                                                        <div class="col text-primary">{{$task->support->name}}</div>
                                                    </span>
                                                </div>

                                                <div class="col">
                                                    <span>
                                                        Creation Date
                                                        <div class="col text-primary">{{date('M-d-Y / H:i:s' , strtotime($task->created_at))}}</div>
                                                    </span>
                                                </div>
                                                @if(isset($task->task_updated_at))
                                                    <div class="col">
                                                        <span>
                                                            Updated By
                                                            <div class="col text-primary">{{$task->taskUpdatedBy->name}}</div>
                                                        </span>
                                                    </div>

                                                    <div class="col">
                                                        <span>
                                                            Task Updated At
                                                            <div class="col text-primary">{{date('M-d-Y / H:i:s' , strtotime($task->task_updated_at))}}</div>
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="customers">
                                                <ul>
                                                    <li class="d-inline-block">
                                                        <img
                                                            class="img-30 rounded-circle"
                                                            src="{{asset($task->assign_under->profile_pic)}}"
                                                            alt="{{$task->assign_under->name}}"
                                                            data-original-title="Assigned Under - '{{$task->assign_under->name}}'"
                                                            title="Assigned Under - '{{$task->assign_under->name}}'"
                                                        />
                                                    </li>
                                                    @if($task->total_users($task->task_number)) @foreach($task->total_users($task->task_number) as $val) @if($val->assigner)
                                                    <li class="d-inline-block">
                                                        <img
                                                            class="img-30 rounded-circle"
                                                            src="{{asset($val->assigner->profile_pic)}}"
                                                            alt="{{$val->assigner->name}}"
                                                            data-original-title="Assigned To - '{{$val->assigner->name}}'"
                                                            title="Assigned To - '{{$val->assigner->name}}'"
                                                        />
                                                    </li>
                                                    @endif @endforeach

                                                    <li class="d-inline-block ms-2">
                                                        <p class="f-12">{{count($task->total_users($task->task_number)) + 1}} Members</p>
                                                    </li>
                                                    @else
                                                    <li class="d-inline-block ms-2">
                                                        <p class="f-12">1 Member</p>
                                                    </li>

                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="project-status mt-4">
                                                <div class="media mb-0">
                                                    <p>{{($task->status == 'Completed' || $task->status == 'Closed')?100 : $task->progress}}%</p>
                                                    <div class="media-body text-end"><span>{{$task->status}}</span></div>
                                                </div>
                                                <div class="progress" style="height: 5px;">
                                                    <div
                                                        class="progress-bar-animated bg-{{$style}} progress-bar-striped"
                                                        role="progressbar"
                                                        style="width: {{($task->status == 'Completed' || $task->status == 'Closed')?100 : $task->progress}}%"
                                                        aria-valuenow="{{$task->progress}}"
                                                        aria-valuemin="0"
                                                        aria-valuemax="100"
                                                    ></div>
                                                </div>
                                                <div class="col-lg-12 pt-2">
                                                    @can('edit-task')
                                                    <a class="btn btn-primary" href="{{route('edittask',$task->id)}}"> <i class="icofont icofont-eye-alt"> </i> Edit Task</a>
                                                    @endcan
                                                        @if($task->user_id == Auth()->user()->emp_id)
                                                            @if($task->status != 'Completed' && $task->status != 'Closed')
                                                                <a class="btn btn-success"
                                                                   href="{{route('projectAndTaskStatusUpdate',[3,$task->task_number])}}">
                                                                    <i class="icofont icofont-check-alt"> </i>Mark As Complete</a>
                                                                <a class="btn btn-danger"
                                                                   href="{{route('projectAndTaskStatusUpdate',[4,$task->task_number])}}">
                                                                    <i class="icofont icofont-close"> </i>Mark As Closed</a>
                                                            @endif
                                                        @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                                <div class="row">
                                    @if($project_task)
                                    @foreach($project_task as $task)
                                    @if($task->status == 'None' || $task->status == 'Doing')
                                    <?php
                                          if($task->status == 'Completed'){ $style = "success"; }elseif ($task->status == 'Closed') { $style = "danger"; }else{ $style = "primary"; } ?>
                                    <div class="col-xxl-12 col-lg-12">
                                        <div class="project-box">
                                            <span class="badge badge-{{$style}}">{{$task->status}}</span>
                                            <h6>{{$task->title}}</h6>
                                            <div class="media">
                                                <img class="img-20 me-1 rounded-circle" src="{{asset('images/user/3.jpg')}}" alt="" data-original-title="" title="" />
                                                <div class="media-body">
                                                    <a href="javascript:void(0)" data-task_id="{{$task->task_number}}" class="btn btn-primary view-comments">View Comments</a>
                                                </div>
                                            </div>
                                            <p>{{$task->details}}</p>
                                            <div class="row details">
                                                <div class="col">
                                                    <span>
                                                        Task Assigned Under
                                                        <div class="col text-primary">{{$task->assign_under->name}}</div>
                                                    </span>
                                                </div>

                                                <div class="col">
                                                    <span>
                                                        Task Assign To
                                                        <div class="col text-primary">
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="task-modal"
                                                                data-label="User"
                                                                data-title="Task Assigner"
                                                                data-old="{{!is_null($task->assigner_label($task->task_number))?$task->assigner_label($task->task_number)->assigner->emp_id:''}}"
                                                                data-dpt_id="{{$task->dpt_to}}"
                                                                data-task_id="{{$task->task_number}}"
                                                                data-task_type="1"
                                                                data-whatever="@fat"
                                                                data-update="{{!is_null($task->assigner_label($task->task_number))?$task->assigner_label($task->task_number)->id:0}}"
                                                            >
                                                                {{!is_null($task->assigner_label($task->task_number))?$task->assigner_label($task->task_number)->assigner->name:'Not Assigned'}}
                                                            </a>
                                                        </div>
                                                    </span>
                                                </div>

                                                <div class="col">
                                                    <span>
                                                        Tags
                                                        <div class="col text-primary">
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="task-modal"
                                                                data-label="Tag"
                                                                data-title="Add Tags"
                                                                data-old="{{!is_null($task->assigner_tags($task->task_number))?$task->assigner_tags($task->task_number)->title:'#notag'}}"
                                                                data-task_id="{{$task->task_number}}"
                                                                data-update="{{!is_null($task->assigner_tags($task->task_number))?$task->assigner_tags($task->task_number)->id:0}}"
                                                                data-task_type="2"
                                                                data-whatever="@fat"
                                                            >
                                                                {{!is_null($task->assigner_tags($task->task_number))?$task->assigner_tags($task->task_number)->title:'No Tags'}}
                                                            </a>
                                                        </div>
                                                    </span>
                                                </div>

                                                <div class="col">
                                                    <span>
                                                        Task Label
                                                        <div class="col text-primary">{{$task->task_label}}</div>
                                                    </span>
                                                </div>

                                                <div class="col">
                                                    <span>
                                                        Task Priority
                                                        <div class="col text-primary">{{$task->task_priority}}</div>
                                                    </span>
                                                </div>

                                                <div class="col">
                                                    <span>
                                                        Created By
                                                        <div class="col text-primary">{{$task->support->name}}</div>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <span>
                                                        Creation Date
                                                        <div class="col text-primary">{{date('M-d-Y / H:i:s' , strtotime($task->created_at))}}</div>
                                                    </span>
                                                </div>
                                                @if(isset($task->task_updated_at))
                                                    <div class="col">
                                                        <span>
                                                            Updated By
                                                            <div class="col text-primary">{{$task->taskUpdatedBy->name}}</div>
                                                        </span>
                                                    </div>

                                                    <div class="col">
                                                        <span>
                                                            Task Updated At
                                                            <div class="col text-primary">{{date('M-d-Y / H:i:s' , strtotime($task->task_updated_at))}}</div>
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="customers">
                                                <ul>
                                                    <li class="d-inline-block">
                                                        <img
                                                            class="img-30 rounded-circle"
                                                            src="{{asset($task->assign_under->profile_pic)}}"
                                                            alt="{{$task->assign_under->name}}"
                                                            data-original-title="Assigned Under - '{{$task->assign_under->name}}'"
                                                            title="Assigned Under - '{{$task->assign_under->name}}'"
                                                        />
                                                    </li>
                                                    @if($task->total_users($task->task_number)) @foreach($task->total_users($task->task_number) as $val) @if($val->assigner)
                                                    <li class="d-inline-block">
                                                        <img
                                                            class="img-30 rounded-circle"
                                                            src="{{asset($val->assigner->profile_pic)}}"
                                                            alt="{{$val->assigner->name}}"
                                                            data-original-title="Assigned To - '{{$val->assigner->name}}'"
                                                            title="Assigned To - '{{$val->assigner->name}}'"
                                                        />
                                                    </li>
                                                    @endif @endforeach

                                                    <li class="d-inline-block ms-2">
                                                        <p class="f-12">{{count($task->total_users($task->task_number)) + 1}} Members</p>
                                                    </li>
                                                    @else
                                                    <li class="d-inline-block ms-2">
                                                        <p class="f-12">1 Member</p>
                                                    </li>

                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="project-status mt-4">
                                                <div class="media mb-0">
                                                    <p>{{($task->status == 'Completed')?100:10}}%</p>
                                                    <div class="media-body text-end"><span>{{$task->status}}</span></div>
                                                </div>
                                                <div class="progress" style="height: 5px;">
                                                    <div
                                                        class="progress-bar-animated bg-primary progress-bar-striped"
                                                        role="progressbar"
                                                        style="width: {{($task->status == 'Completed')?100:10}}%"
                                                        aria-valuenow="10"
                                                        aria-valuemin="0"
                                                        aria-valuemax="100"
                                                    ></div>
                                                </div>
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
                                    @if($project_task)
                                    @foreach($project_task as $task)
                                    @if($task->status == 'Done' || $task->status == 'Closed')
                                    <?php
                                          if($task->status == 'Completed'){ $style = "success"; }elseif ($task->status == 'Closed') { $style = "danger"; }else{ $style = "primary"; } ?>
                                    <div class="col-xxl-12 col-lg-12">
                                        <div class="project-box">
                                            <span class="badge badge-{{$style}}">{{$task->status}}</span>
                                            <h6>{{$task->title}}</h6>
                                            <div class="media">
                                                <img class="img-20 me-1 rounded-circle" src="{{asset('images/user/3.jpg')}}" alt="" data-original-title="" title="" />
                                                <div class="media-body">
                                                    <a href="javascript:void(0)" data-project_id="{{$task->project_id}}" data-task_id="{{$task->task_number}}" class="btn btn-primary view-comments">View Comments</a>
                                                </div>
                                            </div>
                                            <p>{{$task->details}}</p>
                                            <div class="row details">
                                                <div class="col">
                                                    <span>
                                                        Task Assigned Under
                                                        <div class="col text-primary">{{$task->assign_under->name}}</div>
                                                    </span>
                                                </div>

                                                <div class="col">
                                                    <span>
                                                        Task Assign To
                                                        <div class="col text-primary">
                                                            <a @if(Bouncer::is(Auth()->
                                                                user())->A('admin','team lead','production manager')) class="task-modal" @else class="" @endif href="javascript:void(0)" data-label="User" data-title="Task Assigner"
                                                                data-old="{{!is_null($task->assigner_label($task->task_number))?$task->assigner_label($task->task_number)->assigner->emp_id:''}}" data-dpt_id="{{$task->dpt_to}}"
                                                                data-task_id="{{$task->task_number}}" data-task_type="1" data-whatever="@fat"
                                                                data-update="{{!is_null($task->assigner_label($task->task_number))?$task->assigner_label($task->task_number)->id:0}}" >
                                                                {{!is_null($task->assigner_label($task->task_number))?$task->assigner_label($task->task_number)->assigner->name:'Not Assigned'}}
                                                            </a>
                                                        </div>
                                                    </span>
                                                </div>

                                                <div class="col">
                                                    <span>
                                                        Due Date
                                                        <div class="col text-primary">
                                                            <a href="javascript:void(0)" @if(Bouncer::is(Auth()->
                                                                user())->A('admin','team lead','production manager')) class="task-modal" @else class="" @endif data-label="Due Date" data-title="Update Due Date" data-old="{{date('m/d/Y' ,
                                                                strtotime($task->due_date))}}" data-dpt_id="{{$task->dpt_to}}" data-task_id="{{$task->task_number}}" data-task_type="3" data-whatever="@fat" data-update="{{$task->id}}" >
                                                                {{date('d-m-Y' , strtotime($task->due_date))}}
                                                            </a>
                                                        </div>
                                                    </span>
                                                </div>

                                                <div class="col">
                                                    <span>
                                                        Tags
                                                        <div class="col text-primary">
                                                            <a href="javascript:void(0)" @if(Bouncer::is(Auth()->
                                                                    user())->A('admin','team lead','production manager')) class="task-modal" @else class="" @endif data-label="Tag" data-title="Add Tags"
                                                                data-old="{{!is_null($task->assigner_tags($task->task_number))?$task->assigner_tags($task->task_number)->title:'#notag'}}" data-task_id="{{$task->task_number}}"
                                                                data-update="{{!is_null($task->assigner_tags($task->task_number))?$task->assigner_tags($task->task_number)->id:0}}" data-task_type="2" data-whatever="@fat" >
                                                                {{!is_null($task->assigner_tags($task->task_number))?$task->assigner_tags($task->task_number)->title:'No Tags'}}
                                                            </a>
                                                        </div>
                                                    </span>
                                                </div>

                                                <div class="col">
                                                    <span>
                                                        Task Label
                                                        <div class="col text-primary">{{$task->task_label}}</div>
                                                    </span>
                                                </div>

                                                <div class="col">
                                                    <span>
                                                        Task Priority
                                                        <div class="col text-primary">{{$task->task_priority}}</div>
                                                    </span>
                                                </div>

                                                <div class="col">
                                                    <span>
                                                        Created By
                                                        <div class="col text-primary">{{$task->support->name}}</div>
                                                    </span>
                                                </div>

                                                <div class="col">
                                                    <span>
                                                        Creation Date
                                                        <div class="col text-primary">{{date('M-d-Y / H:i:s' , strtotime($task->created_at))}}</div>
                                                    </span>
                                                </div>
                                                @if(isset($task->task_updated_at))
                                                    <div class="col">
                                                        <span>
                                                            Updated By
                                                            <div class="col text-primary">{{$task->taskUpdatedBy->name}}</div>
                                                        </span>
                                                    </div>

                                                    <div class="col">
                                                        <span>
                                                            Task Updated At
                                                            <div class="col text-primary">{{date('M-d-Y / H:i:s' , strtotime($task->task_updated_at))}}</div>
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="customers">
                                                <ul>
                                                    <li class="d-inline-block">
                                                        <img
                                                            class="img-30 rounded-circle"
                                                            src="{{asset($task->assign_under->profile_pic)}}"
                                                            alt="{{$task->assign_under->name}}"
                                                            data-original-title="Assigned Under - '{{$task->assign_under->name}}'"
                                                            title="Assigned Under - '{{$task->assign_under->name}}'"
                                                        />
                                                    </li>
                                                    @if($task->total_users($task->task_number)) @foreach($task->total_users($task->task_number) as $val) @if($val->assigner)
                                                    <li class="d-inline-block">
                                                        <img
                                                            class="img-30 rounded-circle"
                                                            src="{{asset($val->assigner->profile_pic)}}"
                                                            alt="{{$val->assigner->name}}"
                                                            data-original-title="Assigned To - '{{$val->assigner->name}}'"
                                                            title="Assigned To - '{{$val->assigner->name}}'"
                                                        />
                                                    </li>
                                                    @endif @endforeach

                                                    <li class="d-inline-block ms-2">
                                                        <p class="f-12">{{count($task->total_users($task->task_number)) + 1}} Members</p>
                                                    </li>
                                                    @else
                                                    <li class="d-inline-block ms-2">
                                                        <p class="f-12">1 Member</p>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="project-status mt-4">
                                                <div class="media mb-0">
                                                    <p>{{($task->status == 'Completed' || $task->status == 'Closed')?100 : $task->progress}}%</p>
                                                    <div class="media-body text-end"><span>{{$task->status}}</span></div>
                                                </div>
                                                <div class="progress" style="height: 5px;">
                                                    <div
                                                        class="progress-bar-animated bg-{{$style}} progress-bar-striped"
                                                        role="progressbar"
                                                        style="width: {{($task->status == 'Completed' || $task->status == 'Closed')?100 : $task->progress}}%"
                                                        aria-valuenow="{{$task->progress}}"
                                                        aria-valuemin="0"
                                                        aria-valuemax="100"
                                                    ></div>
                                                </div>
                                                <div class="col-lg-12 pt-2">
                                                    @can('edit-task')
                                                    <a class="btn btn-primary" href="{{route('edittask',$task->id)}}"> <i class="icofont icofont-eye-alt"> </i> Edit Task</a>
                                                    @endcan
                                                        @if($task->user_id == Auth()->user()->emp_id)
                                                            @if($task->status != 'Completed' && $task->status != 'Closed')
                                                                <a class="btn btn-success"
                                                                   href="{{route('projectAndTaskStatusUpdate',[3,$task->task_number])}}">
                                                                    <i class="icofont icofont-check-alt"> </i>Mark As Complete</a>
                                                                <a class="btn btn-danger"
                                                                   href="{{route('projectAndTaskStatusUpdate',[4,$task->task_number])}}">
                                                                    <i class="icofont icofont-close"> </i>Mark As Closed</a>
                                                            @endif
                                                        @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    @endif
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

<div class="modal fade" id="taskprogressmodel" tabindex="-1" role="dialog" aria-labelledby="taskprogresstitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taskprogresstitle">Task ID: </h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="bootstrap-touchspin mb-2">
                    <form method="POST" action="{{route('submitprojecttaskbar')}}" id="projtaskbar" class="clprojtaskbar" >
                        @csrf
                        <input type="hidden" name="taskid" id="bartaskid" value="">
                        <fieldset>
                            <div class="input-group">
                                <input class="touchspin" name="progvalue" id="progvalue" type="text" readonly data-bts-min="0" data-bts-max="100" value="" data-bts-postfix="%">
                            </div>
                        </fieldset>
                    </form>
                </div>

                <div class="col-xl-12 xl-100 chat-sec box-col-12">
                    <div class="card chat-default">
                        <div class="card-header card-no-border">
                            <div class="media media-dashboard">
                                <div class="media-body">
                                    <h5 class="mb-0">Task Chat</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body chat-box">
                            <div class="chat">

                                <div id="taskmsgarea" style="overflow-y: scroll;height: 280px;"></div>

                                <form action="javascript:void(0)" id="save-task-message" method="post">
                                    <input type="hidden" id="task_id" name="task_id" />
                                    <div class="input-group">
                                        <input class="form-control" id="sendtaskmessage" type="text" placeholder="Type Your Message..." name="message" />
                                        <button class="send-msg border-0" id="taskformsubmit"><i data-feather="send"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-secondary" id="submitprogbar" type="button">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalmdo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="task-title">New message</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="task-former">
                    <input type="hidden" name="task_id" id="task_id" />
                    <input type="hidden" name="type" id="task_type" />
                    <input type="hidden" name="type" id="due_date" />
                    <input type="hidden" name="is_update" id="is_update" />
                    <div class="mb-3">
                        <label class="col-form-label" for="data-name" id="label-task">Data:</label>
                        <div id="selection-box">
                            <input class="datepicker-here form-control" type="text" readonly required="" name="due_date" data-language="en" data-bs-original-title="" id="data-name" title="" />
                        </div>
                        <span id="error-line"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button" id="submit-modal">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Comments</h4>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-xl-12 xl-100 chat-sec box-col-6">
                    <div class="card chat-default">
                        <div class="card-header card-no-border">
                            <div class="media media-dashboard">
                                <div class="media-body">
                                    <h5 class="mb-0">Comments</h5>
                                </div>
                                {{--
                                <div class="icon-box"><i class="fa fa-ellipsis-h"></i></div>
                                --}}
                            </div>
                        </div>
                        <div class="card-body chat-box">
                            <div class="chat">
                                <div id="msgarea"></div>
                                <!-- Receiver Message Start-->
                                {{--
                                <div class="media left-side-chat">
                                    <div class="media-body d-flex">
                                        <div class="img-profile"><img class="img-fluid" src="{{asset('images/user.jpg')}}" alt="Profile" /></div>
                                        <div class="main-chat">
                                            <div class="message-main"><span class="mb-0">Hi deo, Please send me link.</span></div>
                                        </div>
                                    </div>
                                    <p class="f-w-400">7:28 PM</p>
                                </div>
                                <!-- Receiver Message End-->

                                <!-- Sender Message Start-->
                                <div class="media right-side-chat">
                                    <p class="f-w-400">7:28 PM</p>
                                    <div class="media-body text-end">
                                        <div class="message-main pull-right">
                                            <span class="mb-0 text-start">How can do for you</span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                --}}
                                <!-- Sender Message End-->
                                <form action="javascript:void(0)" id="save-message" method="post">
                                    <input type="hidden" id="comment_task_id" name="comment_task_id" />
                                    <input type="hidden" id="comment_project_id" name="comment_project_id" />
                                    <div class="input-group">
                                        <input class="form-control" id="mail" type="text" placeholder="Type Your Message..." name="message" />
                                        <div class="send-msg" id="formsubmit"><i data-feather="send"></i></div>
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

@endsection @section('css')
<style type="text/css">
    .create-task-btn {
        display: flex;
        align-items: center;
        margin-right: 5px;
        vertical-align: -12px;
        float: left;
    }

    span#error-line {
        color: red;
    }

    #msgarea {
        overflow-y: scroll;
        height: 300px;
        min-height: 300px;
    }
</style>
<link rel="stylesheet" type="text/css" href="{{asset('css/vendors/simple-mde.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/vendors/daterange-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/vendors/scrollbar.css')}}">
@endsection @section('js')
<script src="{{asset('js/editor/simple-mde/simplemde.min.js')}}"></script>
<script src="{{asset('js/editor/simple-mde/simplemde.custom.js')}}"></script>
<script src="{{asset('js/touchspin/vendors.min.js')}}"></script>
<script src="{{asset('js/touchspin/touchspin.js')}}"></script>
<script src="{{asset('js/touchspin/input-groups.min.js')}}"></script>


<!-- Comment save -->
<script type="text/javascript">

    $("#submitprogbar").click(function () {
        $(".clprojtaskbar").submit();
    });

    $(".taskprogressbtn").click(function () {

        var task_id = $(this).data("task_id");
        var project_id = $(this).data("project_id");

        $("#taskprogresstitle").text("Task ID : " + task_id);
        $("#bartaskid").val( task_id);

        $.ajax({
            type: "post",
            dataType: "json",
            url: "{{route('getprojecttaskprogress')}}",
            data: {project_id: project_id, task_id: task_id, _token: "{{csrf_token()}}"},
            success: function (response) {
                // console.log(response);
                // console.log(response.progressvalue);
                // $("#progvalue").data('bts-min', response.progressvalue);
                $("#progvalue").val(response.progressvalue);
                $("#progvalue").attr('data-bts-min', response.progressvalue);
                // $("#progvalue").attr('value',response.progressvalue);

                $("#taskmsgarea").html(response.taskmessages);

            },
        });

        $("#taskprogressmodel").modal("show");
        setTimeout(function () {
            $("#taskmsgarea").animate({scrollTop: $("#taskmsgarea").prop("scrollHeight")}, 1000);
        }, 2000);
    })

    $("#taskformsubmit").click(function () {
        var task_id = $(".taskprogressbtn").data("task_id");
        var post_message = $("#sendtaskmessage").val();

        if (post_message != "") {

            $("#sendtaskmessage").val('');

            $.ajax({
                type: "post",
                dataType: "json",
                url: "{{route('submitprojecttaskprogresschat')}}",
                data: {post_message: post_message, task_id: task_id, _token: "{{csrf_token()}}"},
                success: function (response) {
                    $("#taskmsgarea").append(response.taskmessages);
                    var post_message = $("#sendtaskmessage").val();

                    $("#taskmsgarea").animate({scrollTop: $("#taskmsgarea").prop("scrollHeight")}, 1000);
                    toastr.success("Message Send", "Success !");
                },

            });

        } else {
            toastr.error("You Can't Send Empty Message!!!", "Error!");
        }
    });

    $("#formsubmit").click(function () {
        var post_comment_id = $("#mail").val();

        if (post_comment_id != "") {
            var bodymaker = submit_msg();
            $("#mail").val("");
            //var comment_body = bodymaker.responseJSON.body;
            var comment_body = bodymaker.responseJSON;
            socket.emit("message post", comment_body); // Sender Comment
            socket.emit("notification post", comment_body); // Sender Notification
            //input.value = '';
        } else {
            toastr.success("You Can't Send Empty Message!", "Error!");
        }
    });

    // Comment Message
    socket.on("message post", function (msg) {
        // Receiver
        //$("#msgarea").append(msg.body);
        // console.log(msg);
        if (msg.to_user_id == "{{Auth::user()->emp_id}}") {
            console.log("from");
            console.log(msg.to_user_id);
            //image = "{{ asset(Auth::user()->profile_pic)}}";
            //imagenn="{{ asset('/')}}"+msg.touserimage;
            imagenn = "{{ asset('images/user.jpg')}}";
            // console.log(image);

            var body =
                "<div class='media left-side-chat'><div class='media-body d-flex'><div class='img-profile'><img class='img-fluid' src='" +
                imagenn +
                "' alt='Profile' /></div><div class='main-chat'><div class='message-main'><span class='mb-0'>" +
                msg.message +
                "</span></div></div></div><p class='f-w-400'>" +
                msg.created_at +
                "</p></div>";
        } else {
            // Sender
            console.log("to");
            console.log(msg.to_user_id);
            //imagenn="{{ asset('/')}}"+msg.touserimage;

            var body =
                "<div class='media right-side-chat'><p class='f-w-400'>" +
                msg.created_at +
                "</p><div class='media-body text-end'><div class='message-main pull-right'><span class='mb-0 text-start'>" +
                msg.message +
                "</span><div class='clearfix'></div></div></div></div>";
        }

        $("#msgarea").append(body);
        //window.scrollTo(0, document.body.scrollHeight);
        $("#msgarea").animate({ scrollTop: $("#msgarea").prop("scrollHeight") }, 1000);
    });



    function submit_msg() {
        var data;
        var messagedata = $("#save-message").serialize();
        return $.ajax({
            type: "POST",
            url: "{{ route('save_comment_msg') }}",
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

<script type="text/javascript">
    $(".task-modal").on("click", function () {
        $("#task-title").text($(this).data("title"));
        $("#label-task").text($(this).data("label"));
        $("#task_id").val($(this).data("task_id"));
        $("#task_type").val($(this).data("task_type"));
        $("#is_update").val($(this).data("update"));
        $("#due_date").val($(this).data("due_date"));
        var emp_id = $(this).data("old");

        if ($(this).data("task_type") == 1) {
            // For Users
            var id = $(this).data("dpt_id");
            $.ajax({
                type: "post",
                dataType: "json",
                url: "{{route('get_emp')}}",
                data: { emp_id: id, _token: "{{csrf_token()}}" },
                success: function (response) {
                    if (response.status == 0) {
                        $("#selection-box").html("<select  class='form-control' id='data-name' required=''>" + response.body + "</select>");
                    } else {
                        $("#selection-box").html("<select  class='form-control' id='data-name' required=''>" + response.body + "</select>");
                        $("#data-name").prop("selectedIndex", -1);
                        $("#data-name option[value=" + emp_id + "]").prop("selected", true);
                    }
                },
            });
        } else if ($(this).data("task_type") == 2) {
            $("#selection-box").html('<input class="form-control" id="data-name" type="text" name="data" required="">');
            $("#data-name").val(emp_id);
        } else {
            //$("#selection-box").html('<input class="datepicker-here form-control" id="data-name" type="text" required="" name="due_date" data-language="en" />')
            $("#data-name").val(emp_id);
            $("#due_date").val(emp_id);
        }
        $("#exampleModalmdo").modal("show");
    });
</script>

<script type="text/javascript">
    $("#submit-modal").click(function () {
        var val = $("#data-name").val();
        var task_id = $("#task_id").val();
        var task_type = $("#task_type").val();
        var is_update = $("#is_update").val();
        var due_date = $("#due_date").val();
        var id = "{{$id}}";
        if (val == "") {
            $("#error-line").text("* Field cannot be empty");
        } else {
            $("#error-line").text("");
        }
        $.ajax({
            type: "post",
            dataType: "json",
            url: "{{route('task_form_submit')}}",
            data: { is_update: is_update, val: val, project_id: id, task_id: task_id, task_type: task_type, _token: "{{csrf_token()}}" },
            success: function (response) {
                if (response.status == 0) {
                    toastr.error(response.msg);
                } else {
                    $("#exampleModalmdo").modal("hide");
                    toastr.success(response.msg);
                    //$("#assigned_to").html(response.body);
                    $(".task-modal").hasAttribute("data-task_type").text(response.body);
                }
            },
        });
    });

    $(".view-comments").click(function () {
        $("#msgarea").html("");
        var task_id = $(this).data("task_id");
        var project_id = $(this).data("project_id");
        $("#myLargeModalLabel").text("Task ID: " + task_id);
        $("#comment_task_id").val(task_id);
        $("#comment_project_id").val(project_id);
        $.ajax({
            type: "post",
            dataType: "json",
            url: "{{route('fetch_comment_msg')}}",
            data: { task_id: task_id, project_id: project_id, _token: "{{csrf_token()}}" },
            success: function (response) {
                if (response.status == 1) {
                    $("#msgarea").html(response.body);
                } else {
                }
            },
        });

        $(".bd-example-modal-lg").modal("show");
        setTimeout(function () {
            $("#msgarea").animate({ scrollTop: $("#msgarea").prop("scrollHeight") }, 2000);
        }, 2000);
    });
</script>

@endsection
