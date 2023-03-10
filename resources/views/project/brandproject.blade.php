@extends('layouts.main') @section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Brand Project Lists</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('brand.index')}}">Brands</a></li>
                            <li class="breadcrumb-item active">Brands Project Lists</li>
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
                                    <a class="btn btn-primary" href="{{route('viewProjectCreate')}}"> <i data-feather="plus-square"> </i>Create New Brand Projects</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->getRoles()->first() == 'admin' || Auth::user()->getRoles()->first() == 'hod sales and support' )
                    @foreach($brands as $brand)
                        <div class="col-sm-4">
                            <div class="card">
                                <a href="{{route('viewBrandSourceAccountProject.id', $brand->id)}}">
                                    <div class="card-body text-center">
                                        <img class="brand-logo"
                                             src="{{isset($brand->image) ? asset($brand->image) : asset('images/logo/logo.png')}}"/>
                                        <h5 class="mt-3">{{$brand->name}}</h5>
                                        {{--                                    <p class="mt-3">( Total Projects {{count($brand->brandProjects)}} )</p>--}}
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach($brands as $brand)
                        <div class="col-sm-4">
                            <div class="card">
                                <a href="{{route('viewBrandSourceAccountProject.id', $brand->brand_id)}}">
                                    <div class="card-body text-center">
                                        <img class="brand-logo" src="{{isset($brand->brandName->image) ? asset($brand->brandName->image) : asset('images/logo/logo.png')}}"/>
                                        <h5 class="mt-3">{{$brand->brandName->name}}</h5>
                                        {{--                                    <p class="mt-3">( Total Projects {{count($brand->brandName->brandProjects)}} )</p>--}}
                                    </div>
                                </a>
                            </div>
                        </div>
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
