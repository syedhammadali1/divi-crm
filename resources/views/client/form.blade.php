@extends('layouts.main')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3> Client {{!$edit ? 'Create' : 'Edit'}}</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('all_clients')}}">Clients</a></li>
                            <li class="breadcrumb-item active">Client {{!$edit ? 'Create' : 'Edit'}}</li>
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

                        <div class="card-body">
                            <form class="theme-form" method="POST" action="{{ $route }}">
                                @csrf @if($edit) @method('PUT') @endif

                                <div class="row">
                                    <div class="col-md-6 mb-3 mb-3">
                                        <label class="col-form-label pt-0" for="name">Name *</label>
                                        <input class="form-control" id="name" name="name"
                                               value="{{ old('name',$user->name) }}" type="name"
                                               placeholder="Enter Name" required>
                                        @error('name')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3 mb-3">
                                        <label class="col-form-label pt-0" for="email">Email *</label>
                                        <input class="form-control" id="email" name="email"
                                               value="{{ old('email',$user->email) }}" type="email"
                                               placeholder="Enter Email" required>
                                        @error('email')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3 mb-3">
                                            <label class="col-form-label pt-0" for="phone">Phone *</label>
                                            <input class="form-control" id="phone" name="phone"
                                                   value="{{ old('phone',$user->phone) }}" type="number"
                                                   placeholder="Enter Phone" required>
                                            @error('phone')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>

                                    <div class="col-md-6 mb-3 mb-3">
                                        <label class="col-form-label pt-0" for="password">Password *</label>
                                        <input class="form-control" id="password" name="password" type="password"
                                               placeholder="Enter password" @if(!$edit) required @endif  minlength="8" maxlength="32">
                                        @error('password')
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
