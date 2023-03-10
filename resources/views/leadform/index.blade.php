@extends('layouts.main') @section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Lead Form Lists</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('lead-form.index')}}">Lead Form</a></li>
                            <li class="breadcrumb-item active">Lead Form List</li>
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
{{--                                @can('add-lead-form')--}}
{{--                                    <a class="btn btn-primary" href="{{route('lead-form.create')}}"> <i data-feather="plus-square"> </i>Create New Lead Form</a>--}}
{{--                                @endcan--}}
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Country</th>
                                        <th>Brand ID</th>
                                        <th>Brand Name</th>
                                        <th>Interested In</th>
                                        <th>Budget</th>
                                        <th>Package Price</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($leadforms as $leadform)
                                        <tr>
                                            <td>{{$leadform->id}}</td>
                                            <td>{{$leadform->name}}</td>
                                            <td>{{$leadform->email}}</td>
                                            <td>{{$leadform->phone}}</td>
                                            <td>{{$leadform->country ?? '---' }}</td>
                                            <td>{{$leadform->brand_id}}</td>
                                            <td>{{$leadform->brand_name}}</td>
                                            <td>{{$leadform->interested_in ?? '---' }}</td>
                                            <td>{{$leadform->budget ?? '---' }}</td>
                                            <td>{{$leadform->package_price ?? '---' }}</td>
                                            <td>{{$leadform->created_at}}</td>
                                            <td>
                                                @can('assignee-lead-form')
                                                <a href="{{route('lead-form.edit',['lead_form' => $leadform->id ])}}"
                                                   class="btn btn-primary mb-2"><i class="fa fa-info-circle"></i> Assignee Lead-form</a>
                                                @endcan
                                                <a href="{{route('lead-form.show',['lead_form' => $leadform->id ])}}"
                                                   class="btn btn-primary mb-2"><i class="fa fa-info-circle"></i> Details</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
@endsection
