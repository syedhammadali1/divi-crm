@extends('layouts.main') @section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>My Tasks List</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('myTaskslist')}}">My Tasks</a></li>
                            <li class="breadcrumb-item active">My Tasks List</li>
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
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="advance-1">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Project ID</th>
                                        <th>Task Number</th>
                                        <th>Task Title</th>
                                        <th>Task Details</th>
                                        <th>Task Priority</th>
                                        <th>Task Label</th>
                                        @if(Bouncer::is(Auth()->user())->A('developer','production manager','team lead'))
                                        @else
                                        <th>Assign Under</th>
                                        @endif
                                        <th>Due Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $today = date('Y-m-d');
                                    @endphp
                                    @if(isset($tasks) && Bouncer::is(Auth()->user())->A('developer'))
                                        {{-- @foreach($tasks as $task)
                                            <tr>
                                                <td>{{$task->id}}</td>
                                                <td>
                                                    <a href="{{route('viewbrandproject.id',$task->taskInfo->projectsById->brand->slug)}}#{{$task->project_id}}">{{$task->project_id}}</a>
                                                </td>
                                                <td>
                                                    <a href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">{{$task->task_number}}</a>
                                                </td>
                                                <td>{{$task->taskInfo->title}}</td>
                                                <td>{{$task->taskInfo->details}}</td>
                                                <td>{{$task->taskInfo->task_priority}}</td>
                                                <td>
                                                    @if($task->taskInfo->status == 'Completed')
                                                        <label class="badge badge-success">Completed</label>
                                                    @elseif($task->taskInfo->status == 'Closed')
                                                        <label class="badge badge-danger">Closed</label>
                                                    @else
                                                        @if( date('Y-m-d' , strtotime($task->taskInfo->due_date)) < $today)
                                                            <label class="badge badge-danger">Over Due</label>
                                                        @elseif( date('Y-m-d' , strtotime($task->taskInfo->due_date)) > $today)
                                                            <label class="badge badge-success">Up Coming</label>
                                                        @elseif( date('Y-m-d' , strtotime($task->taskInfo->due_date)) == $today)
                                                            <label class="badge badge-primary">Due</label>
                                                        @endif
                                                    @endif

                                                </td>
                                                <td>{{ date('Y-m-d' , strtotime($task->taskInfo->due_date))}}</td>
                                            </tr>
                                        @endforeach --}}

                                        {{-- -------------- --}}
                                        @foreach($tasks as $task)

                                         <tr>
                                            <td>{{$task->id}}</td>
                                            <td>
                                                <a href="{{route('viewbrandproject.id',$task->projectsById->brand->slug)}}#{{$task->project_id}}">{{$task->project_id}}</a>
                                            </td>
                                            <td>
                                                <a href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">{{$task->task_number}}</a>
                                            </td>
                                            <td>{{$task->title}}</td>
                                            <td>{{$task->details}}</td>
                                            <td>{{$task->task_priority}}</td>
                                            <td>
                                                @if($task->status == 'Completed')
                                                    <label class="badge badge-success">Completed</label>
                                                @elseif($task->status == 'Closed')
                                                    <label class="badge badge-danger">Closed</label>
                                                @else
                                                    @if( date('Y-m-d' , strtotime($task->due_date)) < $today)
                                                        <label class="badge badge-danger">Over Due</label>
                                                    @elseif( date('Y-m-d' , strtotime($task->due_date)) > $today)
                                                        <label class="badge badge-success">Up Coming</label>
                                                    @elseif( date('Y-m-d' , strtotime($task->due_date)) == $today)
                                                        <label class="badge badge-primary">Due</label>
                                                    @endif
                                                @endif

                                            </td>
                                            <td>{{ date('Y-m-d' , strtotime($task->due_date))}}</td>
                                         </tr>
                                    @endforeach
                                    @elseif(isset($tasks) && Bouncer::is(Auth()->user())->A('production manager'))
                                        @foreach($tasks as $project)
                                            @foreach($project->projectTasks as $projecttask)
                                                <tr>
                                                    <td>{{$projecttask->id}}</td>
                                                    <td>
                                                        <a href="{{route('viewbrandproject.id',$projecttask->projectsById->brand->slug)}}#{{$projecttask->project_id}}">{{$projecttask->project_id}}</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('projecttask',$projecttask->project_id)}}#{{$projecttask->task_number}}">{{$projecttask->task_number}}</a>
                                                    </td>
                                                    <td>{{$projecttask->title}}</td>
                                                    <td>{{$projecttask->details}}</td>
                                                    <td>{{$projecttask->task_priority}}</td>
                                                    <td>
                                                        @if($projecttask->status == 'Completed')
                                                            <label class="badge badge-success">Completed</label>
                                                        @elseif($projecttask->status == 'Closed')
                                                            <label class="badge badge-danger">Closed</label>
                                                        @else
                                                            @if( date('Y-m-d' , strtotime($projecttask->due_date)) < $today)
                                                                <label class="badge badge-danger">Over Due</label>
                                                            @elseif( date('Y-m-d' , strtotime($projecttask->due_date)) > $today)
                                                                <label class="badge badge-success">Up Coming</label>
                                                            @elseif( date('Y-m-d' , strtotime($projecttask->due_date)) == $today)
                                                                <label class="badge badge-primary">Due</label>
                                                            @endif
                                                        @endif

                                                    </td>
                                                    <td>{{ date('Y-m-d' , strtotime($projecttask->due_date))}}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    @elseif(isset($tasks) && Bouncer::is(Auth()->user())->A('team lead'))
                                        @foreach($tasks as $task)

                                            <tr>
                                                <td>{{$task->id}}</td>
                                                <td>
                                                    <a href="{{route('viewbrandproject.id',$task->projectsById->brand->slug)}}#{{$task->project_id}}">{{$task->project_id}}</a>
                                                </td>
                                                <td>
                                                    <a href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">{{$task->task_number}}</a>
                                                </td>
                                                <td>{{$task->title}}</td>
                                                <td>{{$task->details}}</td>
                                                <td>{{$task->task_priority}}</td>
                                                <td>
                                                    @if($task->status == 'Completed')
                                                        <label class="badge badge-success">Completed</label>
                                                    @elseif($task->status == 'Closed')
                                                        <label class="badge badge-danger">Closed</label>
                                                    @else
                                                        @if( date('Y-m-d' , strtotime($task->due_date)) < $today)
                                                            <label class="badge badge-danger">Over Due</label>
                                                        @elseif( date('Y-m-d' , strtotime($task->due_date)) > $today)
                                                            <label class="badge badge-success">Up Coming</label>
                                                        @elseif( date('Y-m-d' , strtotime($task->due_date)) == $today)
                                                            <label class="badge badge-primary">Due</label>
                                                        @endif
                                                    @endif

                                                </td>
                                                <td>{{ date('Y-m-d' , strtotime($task->due_date))}}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        @foreach($tasks as $task)
                                            <tr>
                                                <td>{{$task->id}}</td>
                                                <td>
                                                    <a href="{{route('viewbrandproject.id',$task->projectsById->brand->slug)}}#{{$task->project_id}}">{{$task->project_id}}</a>
                                                </td>
                                                <td>
                                                    <a href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">{{$task->task_number}}</a>
                                                </td>
                                                <td>{{$task->title}}</td>
                                                <td>{{$task->details}}</td>
                                                <td>{{$task->task_priority}}</td>
                                                <td>
                                                    @if($task->status == 'Completed')
                                                        <label class="badge badge-success">Completed</label>
                                                    @elseif($task->status == 'Closed')
                                                        <label class="badge badge-danger">Closed</label>
                                                    @else
                                                        @if( date('Y-m-d' , strtotime($task->due_date)) < $today)
                                                            <label class="badge badge-danger">Over Due</label>
                                                        @elseif( date('Y-m-d' , strtotime($task->due_date)) > $today)
                                                            <label class="badge badge-success">Up Coming</label>
                                                        @elseif( date('Y-m-d' , strtotime($task->due_date)) == $today)
                                                            <label class="badge badge-primary">Due</label>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>{{@$task->assign_under->name}}</td>
                                                <td>{{ date('Y-m-d' , strtotime($task->due_date))}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>


@endsection @section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendors/simple-mde.css')}}"/>
@endsection @section('js')
    <script src="{{asset('js/editor/simple-mde/simplemde.min.js')}}"></script>
    <script src="{{asset('js/editor/simple-mde/simplemde.custom.js')}}"></script>
    <script src="{{asset('js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/datatable/datatables/datatable.custom.js')}}"></script>
    <script>
@endsection
