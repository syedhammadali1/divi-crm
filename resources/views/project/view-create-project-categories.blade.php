@extends('layouts.main') @section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Project Category Lists</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">Project Category Lists</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row project-cards">
                {{--                <div class="col-md-12 project-list">--}}
                {{--                    <div class="card">--}}
                {{--                        <div class="row">--}}
                {{--                            <div class="col-md-6">--}}
                {{--                            </div>--}}
                {{--                            <div class="col-md-6">--}}
                {{--                                <div class="form-group mb-0 me-0"></div>--}}
                {{--                                @can('add-project')--}}
                {{--                                    <a class="btn btn-primary" href="{{route('createproject')}}"> <i data-feather="plus-square"> </i>Create New Brand Projects</a>--}}
                {{--                                @endcan--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

                <div class="col-sm-4">
                    <div class="card">
                        <a href="{{route('createProjectForm.projtype','content-creative')}}">
                            <div class="card-body text-center">
                                <img class="proj-icon" alt="logo"
                                     src="{{ asset('images/project-icons/content-creative.png') }}"/>
                                <h5 class="mt-3">Content Writing (Creative)</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <a href="{{route('createProjectForm.projtype','content-academic')}}">
                            <div class="card-body text-center">
                                <img class="proj-icon" alt="logo"
                                     src="{{ asset('images/project-icons/content-academic.png') }}"/>
                                <h5 class="mt-3">Content Writing (Academic)</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <a href="{{route('createProjectForm.projtype','design')}}">
                            <div class="card-body text-center">
                                <img class="proj-icon" alt="logo"
                                     src="{{ asset('images/project-icons/design.png') }}"/>
                                <h5 class="mt-3">Design</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <a href="{{route('createProjectForm.projtype','development')}}">
                            <div class="card-body text-center">
                                <img class="proj-icon" alt="logo"
                                     src="{{ asset('images/project-icons/development.png') }}"/>
                                <h5 class="mt-3">Development</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <a href="{{route('createProjectForm.projtype','seo')}}">
                            <div class="card-body text-center">
                                <img class="proj-icon" alt="logo"
                                     src="{{ asset('images/project-icons/seo.png') }}"/>
                                <h5 class="mt-3">Seo</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <a href="{{route('createProjectForm.projtype','others')}}">
                            <div class="card-body text-center">
                                <img class="proj-icon" alt="logo"
                                     src="{{ asset('images/project-icons/others.png') }}"/>
                                <h5 class="mt-3">Others</h5>
                            </div>
                        </a>
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

@endsection
