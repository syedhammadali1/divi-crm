@extends('layouts.main')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3> Brand {{!$edit ? 'Create' : 'Edit'}}</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('brand.index')}}">Brands</a></li>
                            <li class="breadcrumb-item active">Brand {{!$edit ? 'Create' : 'Edit'}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- START: Card Data-->
        <div class="container-fluid">

{{--            for edit --}}
            @if($edit)
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
                                               value="{{ old('name',$brand->name) }}" type="name"
                                               placeholder="Enter Brand Name" required>
                                        @error('name')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3 mb-3">
                                        <label class="col-form-label pt-0" for="slug">Slug *</label>
                                        <input class="form-control" id="slug" name="slug"
                                               value="{{ old('slug',$brand->slug) }}" type="name"
                                               placeholder="Enter Slug" required readonly>
                                        @error('slug')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>

                                    <div class="card-footer">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                        <a href="{{route('getBrandTargetsByBrand.id',['id' => $brand->id ])}}" class="btn btn-primary">Goto Targets</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif

{{--            for create--}}
            @if(!$edit)
                <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="f1" method="POST" action="{{ $route }}">
                                @csrf
                                <div class="f1-steps">
                                    <div class="f1-progress">
                                        <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="2"></div>
                                    </div>
                                    <div class="f1-step active" style="width: 50% !important;">
                                        <div class="f1-step-icon"><i class="fa fa-globe"></i></div>
                                        <p>Make Brand</p>
                                    </div>
                                    <div class="f1-step" style="width: 50% !important;">
                                        <div class="f1-step-icon"><i class="fa fa-crosshairs"></i></div>
                                        <p>Set Brand Target</p>
                                    </div>
                                </div>
                                <fieldset>
                                    <div class="mb-3 mb-2">
                                        <label class="col-form-label pt-0" for="slug">Slug *</label>
                                        <input class="form-control" id="slug" name="slug"
                                               value="{{ old('slug') }}" type="name"
                                               placeholder="Enter Slug" required readonly>
                                        @error('slug')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mb-2">
                                        <label class="col-form-label pt-0" for="name">Name *</label>
                                        <input class="form-control" id="name" name="name"
                                               value="{{ old('name') }}" type="name"
                                               placeholder="Enter Brand Name" required>
                                        @error('name')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>

                                    <div class="f1-buttons">
                                        <button class="btn btn-primary btn-next" type="button">Next</button>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="mb-3 mb-2">
                                        <label class="col-form-label pt-0" for="targetamount">Target Amount *</label>
                                        <input class="form-control" id="targetamount" name="targetamount"
                                               value="{{ old('targetamount') }}" type="number" min="1"
                                               placeholder="Enter Target Amount" required>
                                        @error('targetamount')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mb-2">
                                        <label class="col-form-label" for="monthyear">Select Month Year *</label>
                                        <input class="datepicker-here form-control digits" id="minMaxExample" readonly placeholder="Select Month Year" name="monthyear" value="{{ old('monthyear')}}" type="text" data-language="en" data-min-view="months" data-view="months" data-position="bottom right" data-date-format="MM yyyy" required>
                                    </div>
                                    <div class="mb-3 mb-2">
                                        <label for="brandmanager">Brand Manager *</label>
                                        <select class="form-select digits" id="brandmanager" name="brandmanager" required>
                                            <option value="">Select Manager</option>
                                            @foreach($brandManagers as $brandManager)
                                                    <option value="{{$brandManager->emp_id}}" >{{ $brandManager->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="mt-3">
                                            <ul class="" id="brandlist">
                                                <li>No Brand</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="f1-buttons">
                                        <button class="btn btn-primary btn-previous" type="button">Previous</button>
                                        <button class="btn btn-primary btn-submit" type="submit">Submit</button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
        <!-- END: Card DATA-->
    </div>
    </div>
@endsection

@section('css')
@endsection

@section('js')
    <script>
        $("#name").keyup(function(){
            var slug= $("#slug").val(this.value)

            var mytext = $(slug).val().toLowerCase();
            var remove =mytext.replace(/-/g, "-").replace(/_/g, "-").replace(/ /g, "-");
            $(slug).val(remove);
        });
    </script>
    <script src="{{asset('js/form-wizard/form-wizard-three.js')}}"></script>
    <script src="{{asset('js/form-wizard/jquery.backstretch.min.js')}}"></script>
    <script src="{{asset('js/tooltip-init.js')}}"></script>
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
                        $("#brandlist").html("");
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
