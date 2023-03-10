@extends('layouts.main')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3> Brand Target {{!$edit ? 'Create' : 'Edit'}}</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('brand-target.index')}}">Brand Targets</a></li>
                            <li class="breadcrumb-item active">Brand Target {{!$edit ? 'Create' : 'Edit'}}</li>
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
                                        <div class="mb-3">
                                            <label for="brand">Brands *</label>
                                            <select class="form-select digits" id="brand" name="brand" @if($edit) disabled  @endif required>
                                                @foreach($allBrands as $brand)
                                                    <option {{$brandtarget->brand_id == $brand->id ? 'selected' : ''}} value="{{$brand->id}}" >{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3 mb-3">
                                        <label class="col-form-label pt-0" for="targetamount">Target Amount *</label>
                                        <input class="form-control" id="targetamount" name="targetamount"
                                               value="{{ old('targetamount',$brandtarget->target_amount) }}" type="number" min="1"
                                               placeholder="Enter Target Amount" required>
                                        @error('targetamount')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label" for="monthyear">Select Month Year *</label>
                                            <input class="datepicker-here form-control digits" id="minMaxExample" readonly placeholder="Select Month Year" name="monthyear" value="{{ old('monthyear',date('M Y' , strtotime($brandtarget->target_month))) }}" type="text" data-language="en" data-min-view="months" data-view="months" data-position="bottom right" data-date-format="MM yyyy" required>
                                    </div>

                                    <div class="col-md-6 mb-3 mb-3">
                                        <div class="mb-3">
                                            <label for="brandmanager">Brand Manager *</label>
                                            <select class="form-select digits" id="brandmanager" name="brandmanager" required>
                                                <option value="">Select Manager</option>
                                                @foreach($brandManagers as $brandManager)
                                                    @if($brandManager->getRoles()->first() == 'brand manager')
                                                        <option {{$brandtarget->brand_manager_id == $brandManager->emp_id ? 'selected' : ''}} value="{{$brandManager->emp_id}}" >{{ $brandManager->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3 mb-3"></div>
                                    <div class="col-md-6 mb-3 mb-3">
                                        <ul class="" id="brandlist">
                                            <li>No Brand</li>
                                        </ul>
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
    <script type="text/javascript">
        // TODO Imp Info. If You Want To Exceed The Targets Years Simply Change The Year Below.
        $( "#minMaxExample" ).datepicker({
            maxDate: new Date('2025/12/01')
        });
        // TODO Imp Info. Call same function on Ajax Get Data When Create and Edit
        function makeAjaxCall() {
            var id = $('#brandmanager').find(":selected").val();
            $.ajax({
                type: "post",
                dataType: "json",
                url: "{{route('getBrandManagersBrands')}}",
                data: {emp_id: id, _token: "{{csrf_token()}}"},
                success: function (response) {
                    console.log(response);
                    if (response.status == 0) {
                        toastr.error("No data found");
                        $("#brandlist").html(response.body);
                    } else {
                        $("#brandlist").html(response.body);
                    }
                },
            });
        }
        $("#brandmanager").change(function (e) {
            e.preventDefault();
            makeAjaxCall();
        });
        makeAjaxCall();

    </script>
@endsection
