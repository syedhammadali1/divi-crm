@extends('layouts.main') @section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Brand Source Account Lists</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('brand.index')}}">Brands</a></li>
                            <li class="breadcrumb-item active">Brands Source Account Lists</li>
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
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-0 me-0"></div>
                                @can('add-project')
{{--                                    <a class="btn btn-primary" href="{{route('createproject')}}"> <i data-feather="plus-square"> </i>Create New Brand Projects</a>--}}
                                    <a class="btn btn-primary" href="{{route('viewProjectCreate')}}"> <i data-feather="plus-square"> </i>Create New Brand Projects</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->getRoles()->first() == 'admin' || Auth::user()->getRoles()->first() == 'hod sales and support' )
                    @foreach($brandEmployees as $brandEmployee)
                    <div class="col-sm-4">
                        <div class="card">
                            <a href="{{route('viewProjectCategories.brandid',[$brandEmployee->brandName->slug,$brandEmployee->source_account_id])}}">
                                <div class="card-body text-center">
{{--                                    <h5 class="mt-3">{{$brandEmployee->brandAssigneeTo->name}}</h5>--}}
                                    <h5 class="mt-3">{{$brandEmployee->sourceAccountAssigneeTo->name}}</h5>
{{--                                    <p class="mt-3">( Total Projects {{count($brand->brandProjects)}} )</p>--}}
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                @else
                    @foreach($brandEmployees as $brandEmployee)
{{--                        @if($brandEmployee->brandAssigneeTo->id == $user->id)--}}
                            <div class="col-sm-4">
                                <div class="card">
                                    <a href="{{route('viewProjectCategories.brandid',[$brandEmployee->brandName->slug,$brandEmployee->source_account_id])}}">
                                        <div class="card-body text-center">
                                        <h5 class="mt-3">{{$brandEmployee->sourceAccountAssigneeTo->name}}</h5>
    {{--                                    <p class="mt-3">( Total Projects {{count($brandEmployee->brandName->brandProjects)}} )</p>--}}
                                    </div>
                                    </a>
                                </div>
                            </div>
{{--                        @endif--}}
                    @endforeach
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
