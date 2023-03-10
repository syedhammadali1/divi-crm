@extends('layouts.main') @section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Client Lists</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('all_clients')}}">Clients</a></li>
                            <li class="breadcrumb-item active">clients List</li>
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
                                @can('add-client')
                                    <a class="btn btn-primary" href="{{route('createclient')}}"> <i data-feather="plus-square"> </i>Create New Client</a>
                                @endcan
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
                                        <th>Phone Number</th>
                                        <th>Active / In-Active</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

{{--                                        @if(Auth::user()->getRoles()->first() == 'admin' || Auth::user()->getRoles()->first() == 'hod sales and support')--}}
                                            @foreach($clients as $client)
                                            <tr>
                                                <td>{{$client->id}}</td>
                                                <td>{{$client->name}}</td>
                                                <td>{{$client->email}}</td>
                                                <td>{{$client->phonenumber}}</td>
{{--                                                <td>{{$client->is_active  == 1 ? "Active" : "Not Active"}}</td>--}}
                                                <td>
                                                    <div class="media-body d-inline-block text-end switch-lg icon-state">
                                                        <label class="switch">
                                                            <input data-id="{{$client->id}}" onchange="clientstatus({{ $client->id }})" {{ $client->is_active == '1' ? 'checked' : ''  }} id="clientswitch-{{$client->id}}" name="clientswitch" type="checkbox"><span class="switch-state bg-primary"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{route('client_task_profile',[$client->id])}}" class="btn btn-primary"><i class="fa fa-info-circle"></i> View</a>
                                                </td>
                                            </tr>
                                        @endforeach
{{--                                        @else--}}
{{--                                            @foreach($clients as $project)--}}
{{--                                                <tr>--}}
{{--                                                    <td>{{$project->client->id}}</td>--}}
{{--                                                    <td>{{$project->client->name}}</td>--}}
{{--                                                    <td>{{$project->client->email}}</td>--}}
{{--                                                    <td>{{$project->client->phonenumber}}</td>--}}
{{--                                                    --}}{{--                                                <td>{{$project->client->is_active  == 1 ? "Active" : "Not Active"}}</td>--}}
{{--                                                    <td>--}}
{{--                                                        <div class="media-body d-inline-block text-end switch-lg icon-state">--}}
{{--                                                            <label class="switch">--}}
{{--                                                                --}}{{--                                                            <input data-id="{{$project->client->id}}" {{ $project->client->is_active == '1' ? 'checked' : ''  }} data-toggle="toggle" data-on="Active" data-off="InActive" id="clientswitch" name="clientswitch" type="checkbox"><span class="switch-state bg-primary"></span>--}}
{{--                                                                <input data-id="{{$project->client->id}}" onchange="clientstatus({{ $project->client->id }})" {{ $project->client->is_active == '1' ? 'checked' : ''  }} id="clientswitch-{{$project->client->id}}" name="clientswitch" type="checkbox"><span class="switch-state bg-primary"></span>--}}
{{--                                                            </label>--}}
{{--                                                        </div>--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <a href="{{route('client_task_profile',[$project->client->id])}}" class="btn btn-primary"><i class="fa fa-info-circle"></i> View</a>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                            @endforeach--}}
{{--                                        @endif--}}
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

        function clientstatus(id) {
            var status = $('#clientswitch-'+id).prop('checked') == true ? 1 : 0;
            // console.log(id)
            // console.log(status)
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{!! url('user-active-inactive') !!}',
                data: {'id': id, 'status': status},
                success: function (data) {
                    console.log(data)
                }
            });
        }
    </script>

@endsection
