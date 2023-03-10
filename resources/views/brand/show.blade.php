@extends('layouts.main') @section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Brand Details</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('brand.index')}}">Brands</a></li>
                            <li class="breadcrumb-item active">Brand Details</li>
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
                            <div class="col-md-12">
                                    <h5>{{$brandDetails->name}}</h5>
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
                                        <th>Sales Person Name</th>
                                        <th>Created At</th>
                                        <th>Brand Assignee To</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>{{$brandDetails->id}}</td>
                                                <td>{{$brandDetails->name}}</td>
                                                <td>{{$brandDetails->brandSalesPerson->name}}</td>
                                                <td>{{date('d M Y' , strtotime($brandDetails->created_at))}}</td>
                                                <td>
                                                    @forelse($brandEmployees as $brandEmployee)
                                                        <small>{{$brandEmployee->brandAssigneeTo->name ?? ''}} , </small>
                                                    @empty
                                                        <small >Not Found!</small>
                                                    @endforelse
                                                </td>
                                            </tr>
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
    </div>
    <!-- Container-fluid Ends-->
    </div>


@endsection
@section('css')
@endsection
@section('js')
    <script src="{{asset('js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection
