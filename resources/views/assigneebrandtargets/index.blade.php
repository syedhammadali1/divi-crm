@extends('layouts.main') @section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Assigned Brand Targets List</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('brand-target.index')}}">Brand Targets</a></li>
                            <li class="breadcrumb-item active">Assignee Brand Targets List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row project-cards">
                <div class="col-md-12 project-list">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-0 me-0"></div>
                                @if($brandTargetValidity)
                                    @can('add-assignee-brand-target')
                                        <a class="btn btn-primary"
                                           href="{{route('assignee-brand-target.create',['brand_id' => $brandid,'brand_target_id' => $brand_target_id ])}}">
                                            <i data-feather="plus-square"> </i>Assignee Brand Target</a>
                                    @endcan
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="advance-1">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Brand Name</th>
                                        <th>Brand Target ID</th>
                                        <th>Assignee Type</th>
                                        <th>Assigner Name</th>
                                        <th>Target Amount</th>
                                        <th>Achieved Amount</th>
                                        <th>Target Month Year</th>
                                        <th>Create By</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody
                                    @foreach($assigneebrandtargets as $assigneebrandtarget)
                                        <tr>
                                            <td>{{$assigneebrandtarget->id}}</td>
                                            <td>{{$assigneebrandtarget->brandtarget->brandName->name}}</td>
                                            <td>{{$assigneebrandtarget->brand_target_id}}</td>

                                            <td>@if($assigneebrandtarget->assignee_type == 1) Sales Manager
                                                @elseif($assigneebrandtarget->assignee_type == 2) Support Manager
                                                @elseif($assigneebrandtarget->assignee_type == 3) Own @endif</td>

                                            <td>{{$assigneebrandtarget->brandTargetAssigner->name}}</td>
                                            <td>${{$assigneebrandtarget->target_amount}}</td>
                                            <td>${{$assigneebrandtarget->achieved_amount}}</td>
                                            <td>{{date('M Y' , strtotime($assigneebrandtarget->target_month))}}</td>
                                            <td>{{$assigneebrandtarget->brandTargetAssignerCreateBy->name}}</td>

                                            <td>
                                                @if($brandTargetValidity)
                                                    @can('edit-assignee-brand-target')
                                                        <a href="{{route('assignee-brand-target.edit',['assignee_brand_target' => $assigneebrandtarget->id ,'brand_id' => $assigneebrandtarget->brandTarget->brand_id,'brand_target_id' => $brand_target_id ])}}"
                                                           class="btn btn-primary"><i class="fa fa-info-circle"></i>
                                                            Edit</a>
                                                    @endcan

                                                    @can('delete-assignee-brand-target')
                                                        <a href="#"
                                                           onclick="deleteRecord({{ $assigneebrandtarget->id }})"
                                                           class=" btn btn-danger"><i class="fa fa-info-circle"></i>
                                                            Delete</a>
                                                    @endcan
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <form id="delete-form" method="POST" style="display:none">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>


@endsection @section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendors/simple-mde.css')}}"/>
@endsection @section('js')
    <script src="{{asset('js/editor/simple-mde/simplemde.min.js')}}"></script>
    <script src="{{asset('js/editor/simple-mde/simplemde.custom.js')}}"></script>
    <script src="{{asset('js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/datatable/datatables/datatable.custom.js')}}"></script>
    <script>

        function deleteRecord(id) {
            let confirmBox = confirm('Are You Really Want To Delete!');
            if (confirmBox) {
                let path = `{{ url('assignee-brand-target/${id}') }}`;
                $('#delete-form').attr('action', path);
                $('#delete-form').submit();
                }
        }
    </script>

@endsection
