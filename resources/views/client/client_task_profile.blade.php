@extends('layouts.main') @section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                	@if($type == "sales")
                    <h3>View Sales Profile</h3>
                    @elseif($type == "client")
                    <h3>View Profile</h3>
                    @endif
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{route('all_clients')}}">Profile</a></li>
                        <li class="breadcrumb-item active">View Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                @if($type != "sales")
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">My Profile</h4>
                            <div class="card-options">
                                <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('update_client_password')}}">
                            	@csrf
                    			<input type="hidden" name="client_id" value="{{$user->id}}">
                                <div class="row mb-2">
                                    <div class="profile-title">
                                        <div class="media">
                                            <img class="img-70 rounded-circle" alt="" src="{{asset(($user->profile_pic != '')?$user->profile_pic:'images/nopic.png')}}" />
                                            <div class="media-body">
                                                <h3 class="mb-1">{{ucwords($user->name)}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Bio</h6>
                                    <textarea class="form-control" disabled="" readonly="" rows="5" name="bio" placeholder="Tell us about yourself">{{$user->bio}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email-Address</label>
                                    <input class="form-control" disabled="" readonly="" required="" value="{{$user->email}}" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input class="form-control" type="password" placeholder="********" required="" name="password" />
                                </div>

                                <div class="form-footer">
                                    <button class="btn btn-primary btn-block" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <form class="card" method="POST" action="{{route('update_client_profile')}}">
                    	@csrf
                    	<input type="hidden" name="client_id" value="{{$user->id}}">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Edit Profile</h4>
                            <div class="card-options">
                                <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label class="form-label">Company</label>
                                        <input class="form-control" type="text" name="company" value="{{$user->company}}" placeholder="Company" />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input class="form-control" type="text" required="" name="username" value="{{$user->username}}" id="username" placeholder="Username" />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Email address</label>
                                        <input class="form-control" type="email" required="" disabled="" value="{{$user->email}}" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input class="form-control" type="text" required="" name="name" value="{{$user->name}}" placeholder="Full name" />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Contact Number</label>
                                        <input class="form-control" type="text" name="phonenumber" value="{{$user->phonenumber}}" placeholder="Last Name" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input class="form-control" name="residential_address" type="text" value="{{$user->residential_address}}" placeholder="Home Address" />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <input class="form-control" name="city" value="{{$user->city}}" type="text" placeholder="City" />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Postal Code</label>
                                        <input class="form-control" type="number" value="{{$user->postcode}}" name="postcode" placeholder="ZIP Code" />
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label class="form-label">Country</label>
                                        <select class="form-control btn-square" name="country">
                                            <option value="">--Select--</option>
                                            <option value="1">Germany</option>
                                            <option value="2">Canada</option>
                                            <option value="3">Usa</option>
                                            <option value="4">Aus</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div>
                                        <label class="form-label">About Me</label>
                                        <textarea class="form-control" rows="5" name="bio" placeholder="Enter About your description">{{$user->bio}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Update Profile</button>
                        </div>
                    </form>
                </div>
                @endif
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                        	@if($type == "sales")
                            	<h4 class="card-title mb-0">Sales Person Projects</h4>
                            @elseif($type == "client")
                            	<h4 class="card-title mb-0">Client Projects</h4>
                            @endif
                            <div class="card-options">
                                <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                            </div>
                        </div>
                        <div class="table-responsive add-project">
                            <table class="table card-table table-vcenter text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Project Name</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@if($projects)
                                	@foreach($projects as $project)
                                    <tr>
                                        <td><a class="text-inherit" href="#">{{$project->name}} </a></td>
                                        <td>{{date("d-M-Y" , strtotime($project->created_at))}}</td>
                                        <td><span class="status-icon bg-success"></span> {{$project->status}}</td>
                                        <td>${{$project->project_cost}}</td>
                                        <td class="text-end">
                                            <a class="icon" href="javascript:void(0)"></a><a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-eye"></i> View</a><a class="icon" href="javascript:void(0)"></a>
                                            {{--
                                            	<a class="btn btn-transparent btn-sm" href="javascript:void(0)"><i class="fa fa-link"></i> Update</a><a class="icon" href="javascript:void(0)"></a>
                                            	<a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>
                                            --}}
                                        </td>
                                    </tr>
                                   	@endforeach
                                   	@endif
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
@endsection
@section('css')
<style type="text/css"></style>
@endsection
@section('js')
<script type="text/javascript">
        $(function () {

		    jQuery('#username').on('input', function () {

		        $("#username").removeClass("is-invalid");
		        $("#username").removeClass("is-valid");

		        var username = $(this).val();
		        var isValid = /^[a-zA-Z0-9]*$/.test(username);
		        var length = username.length;
		        if (isValid && (length > 4) && (length < 20))
		            $("#username").addClass("is-valid");
		        else
		            $("#username").addClass("is-invalid");
		    });
		});
    </script>
@endsection
