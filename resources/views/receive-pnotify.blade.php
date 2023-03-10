@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Notification') }}</div>

                    <div class="card-body">
                        <h1>
                            I am Here To Receive Notification .
                        </h1>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
