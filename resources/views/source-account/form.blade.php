@extends('layouts.main')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3> Source Account {{!$edit ? 'Create' : 'Edit'}}</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('my-sticky-note.index')}}"></a>Source Account</li>
                            <li class="breadcrumb-item active">{{!$edit ? 'Create' : 'Edit'}} Source Account</li>
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
                                    <div class="col-md-6">
                                        <label class="col-form-label pt-0" for="name">Name *</label>
                                        <input class="form-control" id="name" name="name" value="{{ $sourceAccount->name }}" required>
                                        @error('name')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label pt-0" for="email">Email *</label>
                                        <input class="form-control" id="email" name="email" value="{{ $sourceAccount->email }}" required>
                                        @error('email')
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
