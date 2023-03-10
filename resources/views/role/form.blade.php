@extends('layouts.main')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3> Role {{!$edit ? 'Create' : 'Edit'}}</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route("role.index")}}">Roles</a></li>
                            <li class="breadcrumb-item active">Role {{!$edit ? 'Create' : 'Edit'}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- START: Card Data-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        {{--                            <div class="card-header">--}}
                        {{--                                <h5>Sub heading</h5>--}}
                        {{--                            </div>--}}
                        <div class="card-body">
                            <form class="theme-form" method="POST" action="{{ $route }}">
                                @csrf @if($edit) @method('PUT') @endif

                                <div class="row">
                                    <div class="col-md-6 mb-3 mb-3">
                                        <label class="col-form-label pt-0" for="name">Name *</label>
                                        <input class="form-control" id="name" name="name"
                                               value="{{ old('name',$role->name) }}" type="name"
                                               placeholder="Enter Name" required @if($edit) readonly @endif>
                                        @error('name')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3 mb-3">
                                        <label class="col-form-label pt-0" for="title">Title *</label>
                                        <input class="form-control" id="title" name="title"
                                               value="{{ old('name',$role->title) }}" type="name"
                                               placeholder="Enter Title" required>
                                        @error('name')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>

                                    <div class="card-footer">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Card DATA-->
    </div>
    </div>
@endsection

@section('css')
@endsection

@section('js')
@endsection
