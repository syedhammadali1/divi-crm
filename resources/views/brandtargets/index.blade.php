@extends('layouts.main') @section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Brand Target Lists</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('brand-target.index')}}">Brand Targets</a></li>
                            <li class="breadcrumb-item active">Brand Targets List</li>
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
                                @can('add-brand-target')
                                    <a class="btn btn-primary" href="{{route('brand-target.create')}}"> <i
                                            data-feather="plus-square"> </i>Set New Brand Target</a>
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
                                        <th>Brand Name</th>
                                        <th>Target Set By</th>
                                        <th>Brand Manager Name</th>
                                        <th>Target Month Year</th>
                                        <th>Target Amount</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($brandtargets as $brandtarget)
                                        <tr>
                                            <td>{{$brandtarget->id}}</td>
                                            <td>{{$brandtarget->brandName->name ?? '---'}}</td>
                                            <td>{{$brandtarget->brandTargetCreateBY->name ?? 'None'}}</td>
                                            <td>{{$brandtarget->brandTargetManager->name}}</td>
                                            <td>{{date('M Y' , strtotime($brandtarget->target_month))}}</td>
                                            <td>${{$brandtarget->target_amount}}</td>
                                            <td>
                                                @can('edit-brand-target')
                                                    <a href="{{route('brand-target.edit',['brand_target' => $brandtarget->id ])}}"
                                                       class="btn btn-primary"><i class="fa fa-info-circle"></i>
                                                        Edit</a>
                                                @endcan

                                                @can('delete-brand-target')
                                                    <a href="#" onclick="deleteRecord({{ $brandtarget->id }})"
                                                       class=" btn btn-danger"><i class="fa fa-info-circle"></i> Delete</a>
                                                @endcan

{{--                                                @can('add-assignee-brand-target')--}} {{--todo Temporary Comment Out --}}
                                                    <a href="{{route('showabt.id.brandid',['id' => $brandtarget->id ,'brandid' => $brandtarget->brand_id ])}}"
                                                       class="btn btn-info"><i class="fa fa-info-circle"></i>Assignee Brand Target</a>
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
                let path = `{{ url('brand-target/${id}') }}`;
                $('#delete-form').attr('action', path);
                $('#delete-form').submit();
            }
        }
    </script>

@endsection
