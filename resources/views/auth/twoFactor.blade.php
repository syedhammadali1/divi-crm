@extends('layouts.appmain')
@section('content')
    <div class="row justify-content-center ">
        <div class="col-md-7  mt-5">
            <div class="card-group mt-5">
                <div class="card p-4">
                    <div class="card-body">
                        @if(session()->has('message'))
                            <p class="alert alert-info">
                                {{ session()->get('message') }}
                            </p>
                        @endif
                        <form method="POST" action="{{ route('verify.store') }}">
                            {{ csrf_field() }}
                            <h1>Account Verification</h1>
                            <p class="text-muted">
                                You have received an email which contains two factor login code.
                                If you haven't received it, press <a href="{{ route('verify.resend') }}">here</a>.
                            </p>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock"></i>
                                </span>
                                </div>
                                <input name="two_factor_code" type="text" class="form-control{{ $errors->has('two_factor_code') ? ' is-invalid' : '' }}" required autofocus placeholder="Two Factor Code" value="{{Auth()->user()->two_factor_code}}">
                                @if($errors->has('two_factor_code'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('two_factor_code') }}
                                    </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-6 text-right">
                                    <a class="btn btn-danger px-4" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                        {{ trans('logout') }}
                                    </a>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary px-4">
                                        Verify
                                    </button>
                                    <p>Your  Code : {{Auth()->user()->two_factor_code}}</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@endsection
