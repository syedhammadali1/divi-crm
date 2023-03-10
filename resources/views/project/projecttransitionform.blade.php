@extends('layouts.main')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3> {{!$edit ? 'Create' : 'Edit'}} Project Transition </h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('viewbrandproject')}}">Brand Projects</a></li>
                            <li class="breadcrumb-item active"> {{!$edit ? 'Create' : 'Edit'}} Project Transition
                                History
                            </li>
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
                            <h5 class="d-inline">{{$project->name}} | </h5><h6 class="d-inline">Project Cost : $ {{$project->project_cost}} </h6>
                        </div>
                        <div class="card-body">
                            <form class="theme-form" method="POST" action="{{ $route }}">
                                @csrf @if($edit) @method('PUT') @endif
                                <div class="row">
                                    <input type="hidden" name="project_id" value="{{$project->id}}"/>
                                    <div class="col-md-6 mb-3">
                                        <label for="package">Select Package *</label>
                                        <select class="js-example-basic-multiple col-sm-12" id="package" multiple="multiple" name="package[]" required>
                                            <option value="wholeproj">Complete Project</option>
                                            @foreach($projectpackages as $projectpackage)
                                                    <option value="{{$projectpackage->id}}" >{{$projectpackage->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <input type="hidden" id="projectid" name="projectnum" value="{{$project->project_number}}">
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label pt-0" for="transid">Transition ID *</label>
                                        <input class="form-control" id="transid" name="transid"
                                               value="{{ old('transid') }}" type="text"
                                               placeholder="Enter Transition ID" required>
                                        @error('transid')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="col-form-label pt-0" for="lastremainamount">Last Remaining Amount *</label>
                                        <input class="form-control" id="lastremainamount" name="lastremainamount"
                                               readonly
                                               value="{{ old('lastremainamount',$project->remaining_cost) }}"
                                               type="number" min="0"
                                               placeholder="Enter Last Remaining Amount" required>
                                        @error('lastremainamount')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="col-form-label pt-0" for="upfrontamount">Up-Front Amount *</label>
                                        <input class="form-control" id="upfrontamount" name="upfrontamount"
                                               value="{{ old('upfrontamount') }}" type="number" min="1" onkeyup=" priceCheck()" placeholder="Enter Up-Front Amount" required>
                                        @error('upfrontamount')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="col-form-label pt-0" for="remainamount">Remaining Amount *</label>
                                        <input class="form-control" id="remainamount" name="remainamount"
                                               value="{{ old('remainamount') }}" type="number" min="0"
                                               placeholder="Enter Remaining Amount" required readonly>
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
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendors/select2.css')}}"/>
@endsection

@section('js')
    <script src="{{asset('js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('js/select2/select2-custom.js')}}"></script>

    <script>
        function priceCheck() {
            var projectCost = $('#lastremainamount').val();
            var paidCost = $('#upfrontamount').val();
            var remainCost = projectCost - paidCost;
            $('#remainamount').val(remainCost);
        }

        $("#package").change(function () {
            var packtype = $("#package").val()

            if($.inArray('wholeproj', packtype) > -1 && packtype.length >= 2){
                // console.log(packtype);
                alert("Please Un-Select the Complete Project or Packages in order to create new transition");
            }else if($.inArray('wholeproj', packtype) > -1 && packtype.length >= 1){
                $('#lastremainamount').attr("readonly", true);
                $('#lastremainamount').val({{$project->remaining_cost}});
            }
            else {
                // console.log(packtype);
                $('#lastremainamount').attr("readonly", false);
                $('#lastremainamount').val('0');
            }
        });
    </script>
@endsection
