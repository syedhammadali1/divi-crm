@extends('layouts.main') @section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>User Lists</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('tsc-user.index')}}">Users</a></li>
                            <li class="breadcrumb-item active">User List</li>
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
                                @can('add-user')
                                    <a class="btn btn-primary" href="{{route('tsc-user.create')}}"> <i data-feather="plus-square"> </i>Create New User</a>
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
{{--                                        <th>User Name</th>--}}
                                        <th>Email</th>
{{--                                        <th>Employee ID</th>--}}
                                        <th>Active / In-Active</th>
                                        <th>Status</th>
{{--                                        <th>Salary</th>--}}
                                        <th>User Role</th>
{{--                                        <th>User department</th>--}}
{{--                                        <th>Gender</th>--}}
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
{{--                                            <td>{{$user->username}}</td>--}}
                                            <td>{{$user->email}}</td>
{{--                                            <td>{{$user->emp_id}}</td>--}}
                                            <td>
                                                <div class="media-body d-inline-block text-end switch-lg icon-state">
                                                    <label class="switch">
                                                        <input data-id="{{$user->id}}" @can('edit-user')  onchange="clientstatus({{ $user->id }})" @endcan {{ $user->is_active == '1' ? 'checked' : ''  }} id="clientswitch-{{$user->id}}" name="clientswitch" type="checkbox"><span class="switch-state bg-primary"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                @if($user->isUserOnline())
                                                    <b><p class="text-success">On-Line</p></b>
                                                @else
                                                   <b><p class="text-danger">Off-Line</p></b>
                                                @endif
                                            </td>
{{--                                            <td>{{$user->salary}}</td>--}}

                                            <td>
                                                @if($user->getRoles()->first() == 'developer')
                                                    User
                                                @else
                                                    {{$user->getRoles()->first() != null ? ucfirst($user->getRoles()->first()) : 'Not Assignee' }} </td>
                                                @endif
{{--                                                {{@$user->roles->title != null ? @$user->roles->title : 'Not Assignee' }} </td>--}}
{{--                                            <td>{{$user->emp_department->name ?? 'Not Assignee' }}</td>--}}
{{--                                            <td>{{$user->gender}}</td>--}}
                                            <td>
                                                @can('edit-user')
                                                <a href="{{route('tsc-user.edit',['tsc_user' => $user->id ])}}"
                                                   class="btn btn-primary mb-2"><i class="fa fa-info-circle"></i> Edit</a>
                                                @endcan

                                                @can('delete-user')
                                                <a href="#" onclick="deleteRecord({{ $user->id }})"
                                                   class=" btn btn-danger mb-2"><i class="fa fa-times-circle"></i> Delete</a>
                                                @endcan
{{--                                                @can('show-assignee-user')--}}
                                                    <a href="{{route('assigneeUnderEmp.id', $user->id)}}"
                                                       class="btn btn-primary mb-2"><i class="fa fa-eye"></i> Assignee Employee</a>
{{--                                                @endcan--}}
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
                let path = `{{ url('tsc-user/${id}') }}`;
                $('#delete-form').attr('action', path);
                $('#delete-form').submit();
            }
        }
    </script>
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
