@extends('layouts.main') @section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Search Result</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row project-cards">

                @if($projects->count() > 0)
                    <h4>Projects Lists</h4>
                    @foreach($projects as $project)
                        <div class="col-sm-4">
                            <div class="card">
                                <a href="{{route('projectdetail.id',[$project->project_number])}}">
                                    <div class="card-body text-center">
                                        <h5 class="mt-3">{{$project->name}}</h5>
                                        <h6 class="mt-3">{{$project->project_number}}</h6>
                                        <p class="mt-3">{{$project->brand->name}}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <h4>Project Not Found!</h4>
                            </div>
                        </div>
                    </div>
                @endif
                <hr>

                @if(Bouncer::is(Auth()->user())->notA('client'))
                    @if($projecttasks->count() > 0)
                        <h4>Project Tasks Lists</h4>
                            @if(Bouncer::is(Auth()->user())->A('developer'))
                                @foreach($projecttasks as $projecttask)
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <a href="{{route('projectdetail.id',[$projecttask->taskInfo->projectsById->project_number])}}#{{$projecttask->taskInfo->task_number}}">
                                                    <div class="card-body text-center">
                                                        <h5 class="mt-3">{{$projecttask->taskInfo->title}}</h5>
                                                        <h6 class="mt-3">{{$projecttask->taskInfo->task_number}}</h6>
                                                        <p class="mt-3">Project : {{$projecttask->taskInfo->projectsById->name}}</p>
                                                        <p class="mt-3">Brand : {{$projecttask->taskInfo->projectsById->brand->name}}</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                @endforeach
                            @elseif(Bouncer::is(Auth()->user())->A('admin', 'team lead'))
                                @foreach($projecttasks as $projecttask)
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <a href="{{route('projectdetail.id',[$projecttask->projectsById->project_number])}}#{{$projecttask->task_number}}">
                                                <div class="card-body text-center">
                                                    <h5 class="mt-3">{{$projecttask->title}}</h5>
                                                    <h6 class="mt-3">{{$projecttask->task_number}}</h6>
                                                    <p class="mt-3">Project : {{$projecttask->projectsById->name}}</p>
                                                    <p class="mt-3">Brand : {{$projecttask->projectsById->brand->name}}</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @elseif(Bouncer::is(Auth()->user())->A('production manager'))
                                @foreach($projecttasks as $projecttask)
                                    @foreach($projecttask->projectTasks as $item)
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <a href="{{route('projectdetail.id',[$item->projectsById->project_number])}}#{{$item->task_number}}">
                                                    <div class="card-body text-center">
                                                        <h5 class="mt-3">{{$item->title}}</h5>
                                                        <h6 class="mt-3">{{$item->task_number}}</h6>
                                                        <p class="mt-3">Project : {{$item->projectsById->name}}</p>
                                                        <p class="mt-3">Brand : {{$item->projectsById->brand->name}}</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            @else
                            @endif
                    @else
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h4>Project Tasks Not Found!</h4>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>


@endsection @section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendors/simple-mde.css')}}"/>
@endsection @section('js')
    <script src="{{asset('js/editor/simple-mde/simplemde.min.js')}}"></script>
    <script src="{{asset('js/editor/simple-mde/simplemde.custom.js')}}"></script>

@endsection
