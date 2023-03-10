@extends('layouts.main') @section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Brand Lists</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('brand.index')}}">Brands</a></li>
                            <li class="breadcrumb-item active">brand List</li>
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
                                @can('add-brand')
                                    <a class="btn btn-primary" href="{{route('brand.create')}}"> <i
                                            data-feather="plus-square"> </i>Create New brand</a>
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
                                        <th>Create By</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(Auth::user()->getRoles()->first() != 'admin' && Auth::user()->getRoles()->first() != 'hod sales and support')
                                        @foreach($brands as $brand)
                                            <tr>
                                                <td>{{$brand->brandName->id}}</td>
                                                <td>{{$brand->brandName->name}}</td>
                                                <td>{{$brand->brandName->brandSalesPerson->name ?? 'None'}}</td>
                                                <td>{{$brand->brandName->created_at}}</td>
                                                <td>
                                                    @can('edit-brand')
                                                        <a href="{{route('brand.edit',['brand' => $brand->brandName->id ])}}"
                                                           class="btn btn-primary"><i class="fa fa-info-circle"></i>
                                                            Edit</a>
                                                    @endcan

                                                    @can('delete-brand')
                                                        <a href="#" onclick="deleteRecord({{ $brand->brandName->id }})"
                                                           class=" btn btn-danger"><i class="fa fa-info-circle"></i>
                                                            Delete</a>
                                                    @endcan

                                                    @can('edit-brand')
                                                        <a href="{{route('assigneeBrand.employee',['id' => $brand->brandName->id ])}}"
                                                           class="btn btn-primary"><i class="fa fa-info-circle"></i>
                                                            Assignee Brand</a> <br>
                                                    @endcan
                                                    @can('edit-brand')
                                                        <a href="{{route('assigneeSourceAccount.id',['id' => $brand->brandName->id ])}}"
                                                           class="btn btn-primary mt-3"><i class="fa fa-info-circle"></i>
                                                            Assignee Source Account</a>
                                                    @endcan

                                                    @can('edit-brand')
                                                        <a href="{{route('brand.show',['brand' => $brand->brandName->id ])}}"
                                                           class="btn btn-primary mt-3"><i class="fa fa-info-circle"></i>
                                                            Show</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        @foreach($brands as $brand)
                                            <tr>
                                                <td>{{$brand->id}}</td>
                                                <td>{{$brand->name}}</td>
                                                <td>{{$brand->brandSalesPerson->name}}</td>
                                                <td>{{$brand->created_at}}</td>
                                                <td>
                                                    @can('edit-brand')
                                                        <a href="{{route('brand.edit',['brand' => $brand->id ])}}"
                                                           class="btn btn-primary"><i class="fa fa-info-circle"></i>
                                                            Edit</a>
                                                    @endcan

                                                    @can('delete-brand')
                                                        <a href="#" onclick="deleteRecord({{ $brand->id }})"
                                                           class=" btn btn-danger"><i class="fa fa-info-circle"></i>
                                                            Delete</a>
                                                    @endcan

                                                    @can('edit-brand')
                                                        <a href="{{route('assigneeBrand.employee',['id' => $brand->id ])}}"
                                                           class="btn btn-primary"><i class="fa fa-info-circle"></i>
                                                            Assign Users</a> <br>
                                                    @endcan
                                                    @can('edit-brand')
                                                        <a href="{{route('assigneeSourceAccount.id',['id' => $brand->id ])}}"
                                                           class="btn btn-primary mt-3"><i class="fa fa-info-circle"></i>
                                                            Assignee Source Account</a>
                                                    @endcan

                                                    @can('edit-brand')
                                                        <a href="{{route('brand.show',['brand' => $brand->id ])}}"
                                                           class="btn btn-primary mt-3"><i class="fa fa-info-circle"></i>
                                                            Show</a>
                                                    @endcan

                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
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
                let path = `{{ url('brand/${id}') }}`;
                $('#delete-form').attr('action', path);
                $('#delete-form').submit();
            }
        }
    </script>

@endsection
