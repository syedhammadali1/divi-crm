@extends('layouts.main') @section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Permissions</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route("role.index")}}">Roles</a></li>
                            <li class="breadcrumb-item active">Permission</li>
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
                               <h6>Role : {{ ucwords($role->name) }}</h6>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-0 me-0"></div>
                                <a class="btn btn-primary" href="{{route('createPermissions')}}"> <i
                                        data-feather="plus-square"> </i>Create New Permission</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body animate-chk">
                            <form class="theme-form" method="POST" action="{{ route('save.role.permission') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" value="{{ $role->name }}" name="role">

                                        <ul class="permissions">
                                            <li d-block>
                                                <label>
                                                    <input id="chk-ani" type="checkbox" class="checkbox_animated permissions-all" />
                                                    <span class="h6">All</span>
                                                </label>
                                            </li>
                                            @foreach($permissions as $permission)
                                                <li class="{{ $permission->title }} d-block form-check">
                                                    <input
                                                        type="checkbox"
                                                        id="{{ $permission->name }}"
                                                        class="checkbox_animated permission"
                                                        name="permission[]"
                                                        value="{{ $permission->name }}"
                                                        {{ in_array($permission->name,$assigned_permissions) ? 'checked' : '' }}
                                                    />
                                                    <span>&nbsp;</span>
                                                    <label for="{{ $permission->name }}" class="h6">{{ $permission->title }}</label>
                                                </li>
                                            @endforeach

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
        <!-- Container-fluid Ends-->
    </div>


@endsection @section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendors/simple-mde.css')}}"/>
@endsection @section('js')
    <script src="{{asset('js/editor/simple-mde/simplemde.min.js')}}"></script>
    <script src="{{asset('js/editor/simple-mde/simplemde.custom.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.permissions-all').change(function(){
                if($(this).is(':checked')){
                    $('.permission').prop('checked',true).trigger('change');
                }else{
                    $('.permission').prop('checked',false).trigger('change');
                }
            })
        });
    </script>
@endsection
