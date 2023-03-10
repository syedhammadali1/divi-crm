@extends('layouts.main')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3> Assignee Brand</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('brand.index')}}">Brands</a></li>
                            <li class="breadcrumb-item active">Assignee Brand</li>
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
                        <div class="card-header">
                            <h5>{{$brand->name}}</h5>
                        </div>

                        <div class="card-body">
                            <form class="theme-form" method="POST" action="{{ $route }}">
                                @csrf @if($edit) @method('PUT') @endif
                                <div class="row">
                                    <input type="hidden" name="brand_id" value="{{$brand->id}}"/>
                                    <div class="col-md-12 mb-3 mb-3">
                                        <div class="col-form-label">Select Employees</div>
                                        <select class="js-example-placeholder-multiple col-sm-12" id="employees" name="employees[]" multiple="multiple" required>
                                            @foreach($employees as $employee)
                                                <option value="{{$employee->emp_id}}"  {{in_array($employee->emp_id, $selectedEmployees) ? 'selected' : ''}}>{{$employee->name}}</option>
                                            @endforeach
                                        </select>
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
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendors/select2.css')}}">
@endsection

@section('js')
    <script src="{{asset('js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('js/select2/select2-custom.js')}}"></script>
    <script>
        $("#employees").select2({
            placeholder: "Select Employees"
        });
    </script>
@endsection
