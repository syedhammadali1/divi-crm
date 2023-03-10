@extends('layouts.main')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3> User {{!$edit ? 'Create' : 'Edit'}}</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('tsc-user.index')}}">Users</a></li>
                            <li class="breadcrumb-item active">User {{!$edit ? 'Create' : 'Edit'}}</li>
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
                                        <label class="col-form-label pt-0" for="name">Name *</label>
                                        <input class="form-control" id="name" name="name"
                                               value="{{ old('name',$user->name) }}" type="text"
                                               placeholder="Enter Name" required>
                                        @error('name')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3 mb-3">
                                        <label class="col-form-label pt-0" for="email">Email *</label>
                                        <input class="form-control" id="email" name="email"
                                               value="{{ old('email',$user->email) }}" type="email"
                                               placeholder="Enter Email" required>
                                        @error('email')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3 mb-3">
                                        <label class="col-form-label pt-0" for="username">User Name *</label>
                                        <input class="form-control" id="username" name="username"
                                               value="{{ old('username',$user->username) }}" type="text"
                                               placeholder="Enter User Name" required>
                                        @error('username')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3 mb-3">
                                        <label class="col-form-label pt-0" for="password">Password *</label>
                                        <input class="form-control" id="password" name="password" type="password"
                                               placeholder="Enter password" @if(!$edit) required @endif  minlength="8" maxlength="32">
                                        @error('password')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3 mb-3">
                                        <label class="col-form-label pt-0" for="emp_id">Employee ID *</label>
                                        <input class="form-control" id="emp_id" name="emp_id"
                                               value="{{ old('emp_id',$user->emp_id) }}" type="text"
                                               onkeyup="empIdCheck()"
                                               placeholder="Enter Employee ID" @if($edit) readonly @endif required>
                                        @error('emp_id')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>

{{--                                    <div class="col-md-6 mb-3 mb-3">--}}
{{--                                        <label class="col-form-label pt-0" for="salary">Salary *</label>--}}
{{--                                        <input class="form-control" id="salary" name="salary" type="number"--}}
{{--                                               placeholder="Enter Salary" required value="{{ old('salary',$user->salary) }}" min="0" >--}}
{{--                                        @error('salary')--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}

                                    <div class="col-md-6 mb-3 mb-3">
                                        <div class="mb-3">
                                            <label for="role">Role</label>
                                            <select class="js-example-basic-multiple col-sm-12" id="role" name="roles" required>
                                                @foreach($roles as $role)
                                                    @if ($role->name == 'client')
                                                        @continue
                                                    @endif
                                                    <option {{$user->getRoles()->first() == $role->name ? 'selected' : ''}} value="{{$role->id}}" >{{ $role->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3 mb-3">
                                        <div class="mb-3">
                                            <label for="department">Department</label>
                                            <select class="js-example-basic-multiple col-sm-12" id="department" name="department" required>
                                                @foreach($departments as $department)
                                                    <option {{$user->department == $department->id ? 'selected' : ''}} value="{{$department->id}}" >{{ $department->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3 mb-3">
                                        <div class="mb-3">
                                            <label for="reportingmanager">Reporting Manager</label>
                                            <select class="js-example-basic-multiple col-sm-12" id="reportingmanager" name="reportingmanager" required>
                                                <option value="self">--Self--</option>
                                                @foreach($reportingmanagers as $reportingmanager)
                                                    <option {{$user->reporting_line == $reportingmanager->email ? 'selected' : ''}} value="{{$reportingmanager->email}}" >{{ $reportingmanager->name }} / {{ $reportingmanager->email }}</option>
                                                @endforeach
                                            </select>
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
    <script type="text/javascript">

        function empIdCheck() {
            var emp_id = $('#emp_id').val();
            // console.log(emp_id);
            if (emp_id == 0 || emp_id == "") {
                $('#emp_id').css('border', '2px solid red');
            } else {
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{!! url('check-available-empId') !!}',
                    data: {'emp_id': emp_id},
                    success: function (data) {
                        // console.log(data);
                        if (data == 1) {
                            $('#emp_id').css('border', '2px solid green');
                        } else {
                            $('#emp_id').css('border', '2px solid red');
                        }
                    }
                });
            }
        }

        $("#username").keyup(function () {
            var username = $("#username").val()
            var remove = username.replace(/-/g, "-").replace(/_/g, "-").replace(/ /g, "-");
            $("#username").val(remove);
        });
    </script>
@endsection
