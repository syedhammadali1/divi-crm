@extends('layouts.main') @section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Uesr Lists</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route("role.index")}}">Roles</a></li>
                            <li class="breadcrumb-item active">Roles List</li>
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
                                @can('add-role')
                                <a class="btn btn-primary" href="{{route('role.create')}}"> <i
                                        data-feather="plus-square"> </i>Create New Role</a>
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
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{$role->id}}</td>
                                            <td>{{$role->name}}</td>
                                            <td>{{$role->title}}</td>
                                            <td>
                                                @can('edit-role')
                                                <a href="{{route('role.edit',['role' => $role->id ])}}"
                                                   class="btn btn-primary"><i class="fa fa-info-circle"></i> Edit</a>

                                                <a href="{{route('role.permission',['id' => $role->id ])}}"
                                                   class="btn btn-info"><i class="fa fa-info-circle"></i> Permission</a>
                                                @endcan
{{--                                                <a href="#" onclick="deleteRecord({{ $role->id }})"--}}
{{--                                                   class=" btn btn-danger"><i class="fa fa-info-circle"></i> Delete</a>--}}
                                            </td>
                                        </tr>
                                    @endforeach
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
                let path = `{{ url('tsc-user/${id}') }}`;
                $('#delete-form').attr('action', path);
                $('#delete-form').submit();
            }
        }
    </script>

@endsection
