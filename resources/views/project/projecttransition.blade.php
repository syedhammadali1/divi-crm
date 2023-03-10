@extends('layouts.main')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Project Transition Detail</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('viewbrandproject')}}">Project</a></li>
                            <li class="breadcrumb-item active">Project Transition Detail</li>
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
                                <h5>{{$project->name ?? ''}}</h5>
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
                                                                href="{{route('support_task_profile',[$project->support->emp_id])}}">{{$project->support->email}}</a>  </div></span>
                                                </div>

                                                <div class="col"><span>Project Manager<div
                                                            class="col text-primary">  <a
                                                                href="#">{{isset($project->manager->name) ? $project->manager->name : 'Not Asigne'}}</a>  </div></span>
                                                </div>

                                                <div class="col"><span>Brand <div class="col text-primary"> <a
                                                                @if(Bouncer::can('view-brands')) href="{{route('brand.show',['brand' => $project->brand->id ])}}"
                                                                @else href="#" @endif> {{$project->brand->name}} </a></div></span>
                                                </div>

                                                <div class="col"><span>Task <div class="col text-primary"> <a
                                                                @if(Bouncer::can('view-task')) href="{{route('projecttask',[$project->project_number])}}"
                                                                @else href="#" @endif> {{count($project->projectTasks)}} </a></div></span>
                                                </div>

                                                <div class="col"><span>Total Cost <div
                                                            class="col text-primary">{{$project->project_cost}}</div></span>
                                                </div>
                                                <div class="col"><span>Upfront Payment <div
                                                            class="col text-primary">{{$project->paid_cost}}</div></span>
                                                </div>
                                                <div class="col"><span>Remaining Cost <div
                                                            class="col text-primary">{{$project->remaining_cost}}</div></span>
                                                </div>

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
                                                <a class="btn btn-primary"
                                                   href="{{route('projectattachments.id',$project->id)}}"> <i
                                                        class="icofont icofont-eye-alt"> </i> Project Attachments</a>
                                                {{--                                                      @can('add-task')--}}
                                                {{--                                                          <a class="btn btn-primary" href="{{route('createtask',$project->project_number)}}"> <i class="icofont icofont-ui-add"> </i>Create New Task</a>--}}
                                                {{--                                                      @endcan--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Projects Transition History--}}
                        <h5>Project Transition History </h5>
                        <div class="card">
                            <div class="row pt-4">
                                <div class="col-sm-10"></div>
                                <div class="col-sm-2">
                                    @can('add-transition')
                                        <a href="{{route('createprojecttransitionhistory.id',$project->project_number)}}"
                                           class="btn btn-primary mb-2"><i class="fa fa-plus"></i> Add Transition </a>
                                    @endcan
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="display" id="advance-1">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Employee ID</th>
                                                <th>Transition ID</th>
{{--                                                <th>Package Type</th>--}}
                                                <th>Total Amount</th>
                                                <th>Up-front Amount</th>
                                                <th>Remaining Amount</th>
                                                <th>Paid At</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($project_transitions as $project_trans)
                                                <tr>
                                                    <td>{{$project_trans->id}}</td>
                                                    <td>{{$project_trans->emp_id}}</td>
                                                    <td>{{$project_trans->transition_id}}</td>
{{--                                                    <td>{{ $project_trans->package_id == '0' ? "Complete Project" : $project_trans->packagename->name}}</td>--}}
                                                    <td>${{$project_trans->total_cost}}</td>
                                                    <td>${{$project_trans->paid_cost}}</td>
                                                    <td>${{$project_trans->remain_cost}}</td>
                                                    <td>{{$project_trans->created_at}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

{{--                            <div class="card-body">--}}
{{--                                <h5>Project Up Sale Transition History </h5>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="table-responsive">--}}
{{--                                        <table class="display" id="advance-1-0">--}}
{{--                                            <thead>--}}
{{--                                            <tr>--}}
{{--                                                <th>ID</th>--}}
{{--                                                <th>Employee ID</th>--}}
{{--                                                <th>Transition ID</th>--}}
{{--                                                <th>Package Type</th>--}}
{{--                                                <th>Total Amount</th>--}}
{{--                                                <th>Up-front Amount</th>--}}
{{--                                                <th>Remaining Amount</th>--}}
{{--                                                <th>Paid At</th>--}}
{{--                                            </tr>--}}
{{--                                            </thead>--}}
{{--                                            <tbody>--}}
{{--                                            @foreach($project_upsale_transitions as $project_upsale_trans)--}}
{{--                                                @if($project_upsale_trans->parent_id == null && $project_upsale_trans->package_id != null)--}}
{{--                                                    <tr>--}}
{{--                                                        <td>{{$project_upsale_trans->id}}</td>--}}
{{--                                                        <td>{{$project_upsale_trans->emp_id}}</td>--}}
{{--                                                        <td>{{$project_upsale_trans->transition_id}}</td>--}}
{{--                                                        <td>{{ $project_upsale_trans->package_id == '0' ? "Complete Project" : $project_upsale_trans->packagename->name}}</td>--}}
{{--                                                        <td>${{$project_upsale_trans->total_cost}}</td>--}}
{{--                                                        <td>${{$project_upsale_trans->paid_cost}}</td>--}}
{{--                                                        <td>${{$project_upsale_trans->remain_cost}}</td>--}}
{{--                                                        <td>{{$project_upsale_trans->created_at}}</td>--}}
{{--                                                    </tr>--}}
{{--                                                @elseif($project_upsale_trans->parent_id == null && $project_upsale_trans->package_id == null)--}}
{{--                                                    <tr>--}}
{{--                                                        <td>{{$project_upsale_trans->id}}</td>--}}
{{--                                                        <td>{{$project_upsale_trans->emp_id}}</td>--}}
{{--                                                        <td>{{$project_upsale_trans->transition_id}}</td>--}}
{{--                                                        <td>--}}
{{--                                                            @foreach($project_upsale_trans->inner_package_name($project_upsale_trans->id) as $packageitem)--}}
{{--                                                                {{$packageitem->packagename->name }} <b>,</b>--}}
{{--                                                            @endforeach--}}
{{--                                                        </td>--}}
{{--                                                        <td>${{$project_upsale_trans->total_cost}}</td>--}}
{{--                                                        <td>${{$project_upsale_trans->paid_cost}}</td>--}}
{{--                                                        <td>${{$project_upsale_trans->remain_cost}}</td>--}}
{{--                                                        <td>{{$project_upsale_trans->created_at}}</td>--}}
{{--                                                    </tr>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
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
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendors/simple-mde.css')}}"/>
@endsection

@section('js')
    <script src="{{asset('js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection
