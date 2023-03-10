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
                            <li class="breadcrumb-item"><a href="{{route('brand-target.index')}}">Brand Targets</a></li>
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
                                        <label for="assigneetype">Select Type *</label>
                                        <select class="js-example-basic-multiple" id="assigneetype" name="assigneetype" @if($edit) disabled @endif required>
                                            <option value="">Select Option</option>
                                            <option value="forsalesmanager" {{($assignedbrandtarget->assignee_type == 1 ? 'selected' : '')}}>For Sales Manager</option>
                                            <option value="forsupportmanager" {{($assignedbrandtarget->assignee_type == 2 ? 'selected' : '')}}>For Support Manager</option>
                                            <option value="forown" {{($assignedbrandtarget->assignee_type == 3 ? 'selected' : '')}}>For Own</option>
                                        </select>
                                        @if($edit) <input type="hidden"value="{{$assignedbrandtarget->assignee_type}}" name="assigneetype"> @endif
                                    </div>

                                    <div class="col-md-6 mb-3 mb-3">
                                        <div class="col-md-12 mb-3 boxx forsalesmanager">
                                            <div class="col-md-12 mb-3">
                                                <label for="salesmanager">Sales Managers *</label>
                                                <select class="js-example-basic-multiple" id="salesmanager"
                                                        name="salesmanager">
                                                    <option value="">Select Sales Manager</option>
                                                    @foreach($salesSupportUsers as $salesSupportUser)
                                                        @if($salesSupportUser->getRoles()->first() == 'sales manager')
                                                            <option
                                                                {{$assignedbrandtarget->assigner_emp_id ?? 0 == $salesSupportUser->emp_id ? 'selected' : ''}} value="{{$salesSupportUser->emp_id}}">{{ $salesSupportUser->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-12">
                                                <label class="col-form-label pt-0" for="salestargetamount">Target Amount
                                                    For Sales Manager * </label>
                                                <input class="form-control" id="salestargetamount"
                                                       name="salestargetamount"
                                                       value="{{ old('salestargetamount',$assignedbrandtarget->target_amount) }}"
                                                       type="number" min="1" placeholder="Enter Target Amount">
                                                @error('salestargetamount')
                                                <strong>{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3 boxx forsupportmanager">
                                            <div class="col-md-12 mb-3">
                                                <label for="supportmanager">Support Managers *</label>
                                                <select class="js-example-basic-multiple" id="supportmanager" name="supportmanager">
                                                    <option value="">Select Support Manager</option>
                                                    @foreach($salesSupportUsers as $salesSupportUser)
                                                        @if($salesSupportUser->getRoles()->first() == 'support manager')
                                                            <option {{$assignedbrandtarget->assigner_emp_id ?? 0 == $salesSupportUser->emp_id ? 'selected' : ''}} value="{{$salesSupportUser->emp_id}}" >{{ $salesSupportUser->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label class="col-form-label pt-0" for="supporttargetamount">Target Amount For Support Manager *</label>
                                                <input class="form-control" id="supporttargetamount" name="supporttargetamount"
                                                       value="{{ old('supporttargetamount',$assignedbrandtarget->target_amount) }}" type="number" min="1" placeholder="Enter Target Amount">
                                                @error('supporttargetamount')
                                                <strong>{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3 boxx forown">
                                            <label class="col-form-label pt-0" for="remainamount">Remain / Own Target Amount *</label>
                                            <input class="form-control" id="remainamount" name="remainamount"
                                                   value="{{ old('remainamount',$assignedbrandtarget->target_amount ?? '0') }}" type="number" min="0" placeholder="Remain Target Amount">
                                            @error('remainamount')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
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

    <script>
        $(document).ready(function(){
            $("#assigneetype").change(function(){
                $(this).find("option:selected").each(function(){
                    var optionValue = $(this).attr("value");
                    if(optionValue){
                        $(".boxx").not("." + optionValue).hide();
                        $("." + optionValue).show();

                    } else{
                        $(".boxx").hide();
                    }
                    if (optionValue == 'forsalesmanager'){
                        $(".forsalesmanager").find("#salestargetamount").prop('required',true);
                        $(".forsalesmanager").find("#salesmanager").prop('required',true);

                        $(".forsupportmanager").find("#supporttargetamount").prop('required',false);
                        $(".forsupportmanager").find("#supportmanager").prop('required',false);

                        $(".forown").find("#remainamount").prop('required',false);
                    }
                    if(optionValue == 'forsupportmanager'){
                        $(".forsalesmanager").find("#salestargetamount").prop('required',false);
                        $(".forsalesmanager").find("#salesmanager").prop('required',false);

                        $(".forsupportmanager").find("#supporttargetamount").prop('required',true);
                        $(".forsupportmanager").find("#supportmanager").prop('required',true);

                        $(".forown").find("#remainamount").prop('required',false);
                    }
                    if(optionValue == 'forown'){
                        $(".forsalesmanager").find("#salestargetamount").prop('required',false);
                        $(".forsalesmanager").find("#salesmanager").prop('required',false);

                        $(".forsupportmanager").find("#supporttargetamount").prop('required',false);
                        $(".forsupportmanager").find("#supportmanager").prop('required',false);

                        $(".forown").find("#remainamount").prop('required',true);
                    }

                });
            }).change();
        });
    </script>
@endsection
