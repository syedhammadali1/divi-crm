 @extends('layouts.main')
@section('content')
<div class="page-body">
               <div class="container-fluid">
                  <div class="page-title">
                     <div class="row">
                        <div class="col-6">
                           <h3>Project Detail</h3>
                        </div>
                        <div class="col-6">
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                              <li class="breadcrumb-item"><a href="{{route('viewbrandproject')}}" >Project</a></li>
                              <li class="breadcrumb-item active">Project Detail</li>
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
                              <div class="col-md-12">
                                <h5>{{$project->name ?? ''}} | {{$project->project_number ?? ''}}</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                      <div class="col-sm-12">

                          @if($project)
                              <div class="card">
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="col-xxl-12 col-lg-12" id="{{$project->project_number}}">
                                              <div class="project-box">
                                                  <span class="badge badge-primary">{{$project->status}}</span>
                                                  <div class="media">
                                                      <img class="img-20 me-1 rounded-circle"
                                                           src="{{asset('images/user/3.jpg')}}" alt=""
                                                           data-original-title="" title="">
                                                      <div class="media-body">
                                                          @if($project->packages)

                                                              @foreach($project->packages as $val)
                                                                  <a href="#">{{$val->package->name}}</a>
                                                              @endforeach

                                                          @endif
                                                      </div>
                                                  </div>
                                                  <p>{{$project->project_details}}</p>
                                                  <div class="row details">
                                                      <div class="col"><span>Client Email <div class="col text-primary">  <a
                                                                      @if(Bouncer::is(Auth()->user())->A('admin','sales','client')) href="{{route('client_task_profile',[$project->client->id])}}"
                                                                      @else href="#" @endif>{{$project->client_email}}</a>  </div></span>
                                                      </div>

                                                      <div class="col"><span>Sale person Email <div
                                                                  class="col text-primary">  <a
                                                                      @if(Auth::user()->type == 2) href="{{route('support_task_profile',[$project->support->emp_id])}}" @endif>{{$project->support->email}}</a>  </div></span>
                                                      </div>
                                                    @if(Auth::user()->type == 2)
                                                      <div class="col"><span>Project Manager<div
                                                                  class="col text-primary">  <a
                                                                      href="#">{{isset($project->manager->name) ? $project->manager->name : 'Not Asigne'}}</a>  </div></span>
                                                      </div>
                                                    @endif
                                                      <div class="col"><span>Brand <div class="col text-primary"> <a
                                                                      @if(Bouncer::can('view-brands')) href="{{route('brand.show',['brand' => $project->brand->id ])}}"
                                                                      @else href="#" @endif> {{$project->brand->name}} </a></div></span>
                                                      </div>


{{--                                                      <div class="col"><span>Task <div class="col text-primary"> <a--}}
{{--                                                                      @if(Bouncer::can('view-task')) href="{{route('projecttask',[$project->project_number])}}"--}}
{{--                                                                      @else href="#" @endif> {{count($project->projectTasks)}} </a></div></span>--}}
{{--                                                      </div>--}}

{{--                                                      <div class="col"><span>Project Owner <div class="col text-primary">--}}
{{--                                                                  <a href="#"> {{$project->projownertype == 'soleprop' ? 'Sole Proprietor' : 'Partnership'}} </a></div></span>--}}
{{--                                                      </div>--}}

                                                      <div class="col"><span>Dead-line <div class="col text-primary">
                                                                  <a href="#"> {{date('M d-Y' , strtotime($project->deadline))}} </a></div></span>
                                                      </div>
                                                    @if(Auth::user()->type == 2)
                                                      <div class="col"><span>Task <div class="col text-primary"> <a
                                                                      @if(Bouncer::can('view-task')) href="{{route('projecttask',[$project->project_number])}}"
                                                                      @else href="#" @endif> {{count($project->projectTasks)}} </a></div></span>
                                                      </div>
                                                    @endif
                                                  </div>
                                                  <div class="row details pt-3 pb-3">
                                                      @if(Bouncer::is(Auth()->user())->A('admin','sales','support','hod sales and support'))
                                                      <div class="col"><span>Total Cost <div
                                                                  class="col text-primary">{{$project->project_cost}}</div></span>
                                                      </div>
                                                      <div class="col"><span>Upfront Payment <div
                                                                  class="col text-primary">{{$project->paid_cost}}</div></span>
                                                      </div>
                                                      <div class="col"><span>Remaining Cost <div
                                                                  class="col text-primary">{{$project->remaining_cost}}</div></span>
                                                      </div>
                                                      @endif
                                                      <div class="col"><span>Project Priority <div
                                                                  class="col text-primary">{{$project->project_priority}} </div></span>
                                                      </div>
                                                      <div class="col"><span>Created By <div
                                                                  class="col text-primary"> {{$project->support->name}}</div></span>
                                                      </div>
                                                      <div class="col"><span>Creation Date <div
                                                                  class="col text-primary">{{date('M d-Y' , strtotime($project->created_at))}} </div></span>
                                                      </div>
                                                  </div>

                                                  @if($project->project_category == "DEVELOPMENT")
                                                      <div class="row details pt-3 pb-3">
                                                      <div class="col"><span>Category<div
                                                                  class="col text-primary"> {{$project->devproject->category}}</div></span>
                                                      </div>
                                                      <div class="col"><span>Plat Form<div
                                                                  class="col text-primary"> {{$project->devproject->platform}}</div></span>
                                                      </div>
                                                      <div class="col"><span>Theme Color<div
                                                                  class="col text-primary"> {{$project->devproject->theme_color}}</div></span>
                                                      </div>
                                                      <div class="col"><span>Development Type<div
                                                                  class="col text-primary"> {{ strtolower($project->devproject->development_type)}}</div></span>
                                                      </div>
                                                      <div class="col"><span>Status<div
                                                                  class="col text-primary"> {{ strtolower($project->devproject->status)}}</div></span>
                                                      </div>
                                                      <div class="col"><span>Payment Status<div
                                                                  class="col text-primary"> {{ strtolower($project->devproject->payment_status)}}</div></span>
                                                      </div>
                                                  </div>
                                                  @elseif($project->project_category == "CONTENT")
                                                      <div class="row details pt-3 pb-3">
                                                          <div class="col"><span>Paper Topic<div
                                                                      class="col text-primary"> {{$project->contentproject->paper_topic}}</div></span>
                                                          </div>
                                                          <div class="col"><span>Paper Subject<div
                                                                      class="col text-primary"> {{$project->contentproject->paper_subject}}</div></span>
                                                          </div>
                                                          <div class="col"><span>Standard Of Work<div
                                                                      class="col text-primary"> {{$project->contentproject->standard_of_work}}</div></span>
                                                          </div>

                                                          <div class="col"><span>Rephrasing New<div
                                                                      class="col text-primary"> {{$project->contentproject->rephrasing_new}}</div></span>
                                                          </div>
                                                          @if(isset($project->contentproject->academic_level_id))
                                                              <div class="col"><span>Academic Level<div
                                                                          class="col text-primary"> {{$project->contentproject->academicLevelById->level}}</div></span>
                                                              </div>
                                                          @endif
                                                          <div class="col"><span>Number Of Words<div
                                                                      class="col text-primary"> {{$project->contentproject->numberOfWordsById->words}}</div></span>
                                                          </div>
                                                          <div class="col"><span>Reference Style<div
                                                                      class="col text-primary"> {{$project->contentproject->referenceStyleById->style}}</div></span>
                                                          </div>
                                                      </div>

                                                      <div class="row details pt-3 pb-3">
                                                          @isset($project->contentproject->industry_id)
                                                          <div class="col"><span>Industry<div
                                                                      class="col text-primary"> {{$project->contentproject->industryById->name}}</div></span>
                                                          </div>
                                                          @endisset
                                                          <div class="col"><span>Keywords<div
                                                                      class="col text-primary"> {{$project->contentproject->keywords ?? '---'}}</div></span>
                                                          </div>
                                                          <div class="col"><span>Website<div
                                                                      class="col text-primary"> {{$project->contentproject->website ?? '---'}}</div></span>
                                                          </div>

                                                          <div class="col"><span>Content Project Type<div
                                                                      class="col text-primary"> {{$project->contentproject->contentProjectType->type}}</div></span>
                                                          </div>
                                                          <div class="col"><span>Number Of Slides<div
                                                                      class="col text-primary"> {{strtolower($project->contentproject->number_of_slides)}}</div></span>
                                                          </div>
                                                          <div class="col"><span>Number Of References<div
                                                                      class="col text-primary"> {{strtolower($project->contentproject->number_of_references)}}</div></span>
                                                          </div>
                                                      </div>

                                                      <div class="row details pt-3 pb-3">
                                                          <div class="col"><span>Status<div
                                                                      class="col text-primary"> {{strtolower($project->contentproject->status)}}</div></span>
                                                          </div>
                                                          <div class="col"><span>Payment Status<div
                                                                      class="col text-primary"> {{strtolower($project->contentproject->payment_status)}}</div></span>
                                                          </div>
                                                      </div>


                                                  @elseif($project->project_category == "DESIGN")
                                                      <div class="row details pt-3 pb-3">
                                                          <div class="col"><span>Design Type<div
                                                                      class="col text-primary"> {{$project->designproject->design_type}}</div></span>
                                                          </div>
                                                          <div class="col"><span>Company Name<div
                                                                      class="col text-primary"> {{$project->designproject->company_name}}</div></span>
                                                          </div>
                                                          <div class="col"><span>Target Audience<div
                                                                      class="col text-primary"> {{$project->designproject->target_audience}}</div></span>
                                                          </div>

                                                          <div class="col"><span>Slogan<div
                                                                      class="col text-primary"> {{$project->designproject->slogan}}</div></span>
                                                          </div>
                                                          <div class="col"><span>Genre<div
                                                                      class="col text-primary"> {{$project->designproject->genre}}</div></span>
                                                          </div>
                                                          <div class="col"><span>Where To Use<div
                                                                      class="col text-primary"> {{$project->designproject->where_to_use}}</div></span>
                                                          </div>
                                                      </div>

                                                      <div class="row details pt-3 pb-3">
                                                          <div class="col"><span>Primary Color<div
                                                                      class="col text-primary"> {{$project->designproject->primary_color}}</div></span>
                                                          </div>
                                                          <div class="col"><span>Secondary Color<div
                                                                      class="col text-primary"> {{$project->designproject->secondary_color}}</div></span>
                                                          </div>
                                                          <div class="col"><span>New / Re Design<div
                                                                      class="col text-primary"> {{$project->designproject->new_re_design}}</div></span>
                                                          </div>

                                                          <div class="col"><span>Status<div
                                                                      class="col text-primary"> {{strtolower($project->designproject->status)}}</div></span>
                                                          </div>
                                                          <div class="col"><span>Payment Status<div
                                                                      class="col text-primary"> {{strtolower($project->designproject->payment_status)}}</div></span>
                                                          </div>
                                                          <div class="col"><span>Industry<div
                                                                      class="col text-primary"> {{strtolower($project->designproject->industryById->name)}}</div></span>
                                                          </div>
                                                      </div>
                                                  @elseif($project->project_category == "SEO")
                                                      <div class="row details pt-3 pb-3">
                                                          <div class="col"><span>Website Link<div
                                                                      class="col text-primary"> {{$project->seoproject->website}}</div></span>
                                                          </div>
                                                          <div class="col"><span>Competitor Website Link<div
                                                                      class="col text-primary"> {{$project->seoproject->website}}</div></span>
                                                          </div>
                                                          <div class="col"><span>Products Services Count<div
                                                                      class="col text-primary"> {{$project->seoproject->products_services_count ?? '0'}}</div></span>
                                                          </div>

                                                          <div class="col"><span>Region Name<div
                                                                      class="col text-primary"> {{$project->seoproject->regionById->name}}</div></span>
                                                          </div>
                                                          <div class="col"><span>Keywords<div
                                                                      class="col text-primary"> {{$project->seoproject->keywords}}</div></span>
                                                          </div>
                                                          <div class="col"><span>Status<div
                                                                      class="col text-primary"> {{strtolower($project->seoproject->status)}}</div></span>
                                                          </div>
                                                          <div class="col"><span>Payment Status<div
                                                                      class="col text-primary"> {{strtolower($project->seoproject->payment_status)}}</div></span>
                                                          </div>

                                                      </div>
                                                  @elseif($project->project_category == "OTHER")
                                                      <div class="row details pt-3 pb-3">
                                                          <div class="col"><span>Industry<div
                                                                      class="col text-primary"> {{$project->otherproject->industryById->name}}</div></span>
                                                          </div>
                                                          <div class="col"><span>Status<div
                                                                      class="col text-primary"> {{strtolower($project->otherproject->status)}}</div></span>
                                                          </div>
                                                          <div class="col"><span>Payment Status<div
                                                                      class="col text-primary"> {{strtolower($project->otherproject->payment_status)}}</div></span>
                                                          </div>

                                                      </div>
                                                  @endif

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
                                                          <p>{{$project->progress_bar}}% </p>
                                                          <div class="media-body text-end">
                                                              <span>{{$project->status}}</span></div>
                                                      </div>
                                                      <div class="progress" style="height: 5px">
                                                          <div
                                                              class="progress-bar-animated bg-primary progress-bar-striped"
                                                              role="progressbar"
                                                              style="width: {{$project->progress_bar}}%"
                                                              aria-valuenow="10" aria-valuemin="0"
                                                              aria-valuemax="100"></div>
                                                      </div>
                                                  </div>
                                                  <div class="pt-2">
{{--                                                      @can('view-task')--}}
{{--                                                          <a class="btn btn-primary create-task-btn"--}}
{{--                                                             href="{{route('projecttask',[$project->project_number])}}">--}}
{{--                                                              <i class="icofont icofont-eye-alt"> </i> View Task</a>--}}
{{--                                                      @endcan--}}
                                                      <a class="btn btn-primary" href="{{route('projectattachments.id',$project->id)}}"> <i class="icofont icofont-eye-alt"> </i> Project Attachments</a>
                                                      @can('add-task')
                                                          <a class="btn btn-primary" href="{{route('createtask',$project->project_number)}}"> <i class="icofont icofont-ui-add"> </i>Create New Task</a>
                                                      @endcan
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>

{{--                              Projects Task Starts Here--}}
                              <h5>Project Task </h5>
                              {{--  Todo imp info check empty array--}}
                              @if(count($project_tasks) > 0)
                                  @foreach($project_tasks as $task)
                                      <div class="card">
                                          <div class="card-body">
                                              <div class="row">
                                                  <div class="col-xxl-12 col-lg-12" id="{{$task->task_number}}">
                                                      <div class="project-box">
                                                          <span class="badge badge-primary">{{$task->status}}</span>
                                                          <h6>{{$task->title}} | {{$task->task_number}}</h6>
                                                          <div class="media">
                                                              <img class="img-20 me-1 rounded-circle"
                                                                   src="{{asset('images/user/3.jpg')}}" alt=""
                                                                   data-original-title="" title="">
                                                          </div>
                                                          <p>{{$task->details}}</p>
                                                          <div class="row details">
                                                              <div class="col">
                                                    <span>
                                                        Project Assigned Under
                                                        <div
                                                            class="col text-primary">{{$task->assign_under->name}}</div>
                                                    </span>
                                                              </div>

                                                              <div class="col">
                                                    <span>
                                                        Task Assign To
                                                        <div class="col text-primary">
                                                            <a
                                                                @if(Bouncer::is(Auth()->user())->A('admin','team lead','production manager'))
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
                                                                @if(Bouncer::is(Auth()->user())->A('admin','team lead','production manager'))
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
                                                                  <p>{{($task->status == 'Completed' || $task->status == 'Closed')?100:10}} %</p>
                                                                  <div class="media-body text-end">
                                                                      <span>{{$task->status}}</span></div>
                                                              </div>

                                                              <div class="progress" style="height: 5px;">
                                                                  <div
                                                                      class="progress-bar-animated bg-{{$style}} progress-bar-striped"
                                                                      role="progressbar"
                                                                      style="width: {{($task->status == 'Completed' || $task->status == 'Closed')?100:10}}%"
                                                                      aria-valuenow="10"
                                                                      aria-valuemin="0"
                                                                      aria-valuemax="100"
                                                                  ></div>
                                                              </div>
                                                              <div class="col-lg-12 pt-2">
{{--                                                                  @if($task->status != 'Completed' && $task->status != 'Closed')--}}
                                                                      @can('edit-task')
                                                                          <a class="btn btn-primary"
                                                                             href="{{route('edittask',$task->id)}}"> <i
                                                                                  class="icofont icofont-eye-alt"> </i>
                                                                              Edit Task</a>
                                                                      @endcan
{{--                                                                  @endif--}}
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
                                                                      <a class="btn btn-primary" href="{{route('projecttaskattachments.id',$task->id)}}"> <i class="icofont icofont-eye-alt"> </i> Tasks Attachments</a>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  @endforeach
                              @else
                                  <div class="card">
                                      <div class="card-body">
                                          <div class="row">
                                              <h4>Task Not Found!</h4>
                                          </div>
                                      </div>
                                  </div>
                              @endif
                          @else
                              <div class="card">
                                  <div class="card-body">
                                      <div class="row">
                                          <h4>Project Not Found!</h4>
                                      </div>
                                  </div>
                              </div>
                          @endif

                      </div>
                  </div>
               </div>
               <!-- Container-fluid Ends-->
            </div>
            @endsection

@section('css')
@endsection

@section('js')
@endsection
