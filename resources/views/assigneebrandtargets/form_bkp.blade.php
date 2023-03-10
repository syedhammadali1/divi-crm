@extends('layouts.main')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3> {{!$edit ? 'Create' : 'Edit'}} Assigned Brand Target</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#"></a>Assigned Brand Target</li>
                            <li class="breadcrumb-item active">{{!$edit ? 'Create' : 'Edit'}} Assigned Brand Target</li>
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
                                        <div class="mb-3">
                                            <label for="brandtarget">Brand Target Name </label>
                                                <h5>{{ $getbrand->name }} | {{date('M Y' , strtotime($getbrandtarget->target_month)) }}</h5>
                                        </div>
                                    </div>

                                    <div class="col-md-6 pt-4 mb-3">
                                        <h5 class="targettag">Target Amount : ${{$getbrandtarget->target_amount}}</h5>
                                    </div>

                                    <div class="col-md-6 mb-3 mb-3">
                                        <div class="col-md-12 mb-3">
                                            <label for="salesmanager">Sales Managers</label>
                                            <select class="js-example-basic-multiple" id="salesmanager" name="salesmanager">
                                                <option value="">Select Sales Manager</option>
                                                @foreach($salesSupportUsers as $salesSupportUser)
                                                    @if($salesSupportUser->getRoles()->first() == 'sales manager')
                                                        <option {{$salesManagerResponse->assigner_emp_id == $salesSupportUser->emp_id ? 'selected' : ''}} value="{{$salesSupportUser->emp_id}}" >{{ $salesSupportUser->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="col-form-label pt-0" for="salestargetamount">Target Amount For Sales Manager </label>
                                            <input class="form-control" id="salestargetamount" name="salestargetamount"
                                                   value="{{ old('salestargetamount',$salesManagerResponse->target_amount) }}" type="number" min="0" placeholder="Enter Target Amount">
                                            @error('salestargetamount')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-6 mb-3 mb-3">
                                        <div class="col-md-12 mb-3">
                                            <label for="supportmanager">Support Managers</label>
                                            <select class="js-example-basic-multiple" id="supportmanager" name="supportmanager">
                                                <option value="">Select Support Manager</option>
                                                @foreach($salesSupportUsers as $salesSupportUser)
                                                    @if($salesSupportUser->getRoles()->first() == 'support manager')
                                                        <option {{$supportManagerResponse->assigner_emp_id == $salesSupportUser->emp_id ? 'selected' : ''}} value="{{$salesSupportUser->emp_id}}" >{{ $salesSupportUser->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="col-form-label pt-0" for="supporttargetamount">Target Amount For Support Manager </label>
                                            <input class="form-control" id="supporttargetamount" name="supporttargetamount"
                                                   value="{{ old('supporttargetamount',$supportManagerResponse->target_amount ?? '0') }}" type="number" min="0" placeholder="Enter Target Amount">
                                            @error('supporttargetamount')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label pt-0" for="remainamount">Remain / Own Target Amount</label>
                                        <input class="form-control" id="remainamount" name="remainamount"
                                               value="{{ old('remainamount',$ownResponse->target_amount ?? '0') }}" type="number" min="0" placeholder="Remain Target Amount">
                                        @error('remainamount')
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
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendors/select2.css')}}" />
@endsection

@section('js')
    <script src="{{asset('js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('js/select2/select2-custom.js')}}"></script>
@endsection
