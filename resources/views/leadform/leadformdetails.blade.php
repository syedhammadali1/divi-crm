@extends('layouts.main')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Lead Form Detail</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('lead-form.index')}}">Lead Form</a></li>
                            <li class="breadcrumb-item active">Lead Form Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row project-cards">
                <div class="col-sm-12">

                    @if($leadform)
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <h3>ID : {{$leadform->id}} | {{$leadform->brand_name}}</h3>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label pt-0" for="name">Name</label>
                                        <input class="form-control" id="name" value="{{$leadform->name}}" type="text" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label pt-0" for="email">Email</label>
                                        <input class="form-control" id="email" value="{{$leadform->email}}" type="email" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label pt-0" for="name">Phone</label>
                                        <input class="form-control" id="phone" value="{{$leadform->phone}}" type="text" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label pt-0" for="name">Country</label>
                                        <input class="form-control" id="country" value="{{$leadform->country ?? '---'}}" type="text" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label pt-0" for="brand_name">Brand Name</label>
                                        <input class="form-control" id="brand_name" value="{{$leadform->brand_name}}" type="text" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label pt-0" for="page_url">Page URL</label>
                                        <input class="form-control" id="page_url" value="{{$leadform->page_url ?? '---'}}" type="text" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label pt-0" for="interested_in">Interested In</label>
                                        <input class="form-control" id="interested_in" value="{{$leadform->interested_in ?? '---'}}" type="text" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label pt-0" for="budget">Budget</label>
                                        <input class="form-control" id="budget" value="{{$leadform->budget ?? '---'}}" type="text" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label pt-0" for="package">Package</label>
                                        <input class="form-control" id="package" value="{{$leadform->package ?? '---'}}" type="text" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label pt-0" for="package_price">Package Price</label>
                                        <input class="form-control" id="package_price" value="{{$leadform->package_price ?? '---'}}" type="text" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label pt-0" for="message">Message</label>
                                        <textarea class="form-control" id="message" readonly>{{$leadform->message}}</textarea>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label pt-0" for="business_description">Business Description</label>
                                        <textarea class="form-control" id="business_description" readonly>{{$leadform->business_description ?? '---'}}</textarea>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label pt-0" for="design_perception">Design Perception</label>
                                        <textarea class="form-control" id="design_perception" readonly>{{$leadform->design_perception ?? '---'}}</textarea>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label pt-0" for="additional_comments">Additional Comments</label>
                                        <textarea class="form-control" id="additional_comments" readonly>{{$leadform->additional_comments ?? '---'}}</textarea>
                                    </div>

                                        {{--                                    -------}}
                                    <hr/>
                                    <div class="col-md-12 mb-3">
                                        <form class="theme-form" method="POST" action="{{ $route }}">
                                            @csrf @method('PUT')
                                            <div class="col-md-6 mb-3">
                                                <input type="hidden" name="leadform_id" value="{{$leadform->id}}"/>
                                                <div class="mb-3">
                                                    <label for="department">Feed Back</label>
                                                    <select class="js-example-basic-multiple col-sm-12" id="feedback" name="feedback" required>
                                                        <option value="1" {{$leadform->feedback_option == 1 ? 'checked' : ''}}>Lead Success</option>
                                                        <option value="2" {{$leadform->feedback_option == 2 ? 'checked' : ''}}>Not Interested</option>
                                                        <option value="3" {{$leadform->feedback_option == 3 ? 'checked' : ''}}>Call Not Received</option>
                                                        <option value="4" {{$leadform->feedback_option == 4 ? 'checked' : ''}}>Call Later</option>
                                                        <option value="5" {{$leadform->feedback_option == 5 ? 'checked' : ''}}>Other</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label class="pt-0" for="feed_back_message">Feed Back Message</label>
{{--                                                <textarea class="form-control" id="feed_back_message" name="feed_back_message" required="">{{$leadform->feedback_message ?? ''}}</textarea>--}}
                                                <div id="editor_container">
                                                    <textarea  id="editable" class="form-control @error('feed_back_message') is-invalid @enderror" name="feed_back_message" rows="3">{{ old('feed_back_message',$leadform->feedback_message ?? '') }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h4>Lead Form Not Found!</h4>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendors/select2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendors/simple-mde.css')}}" />
@endsection

@section('js')
    <script src="{{asset('js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('js/select2/select2-custom.js')}}"></script>
    <script src="{{asset('js/editor/simple-mde/simplemde.min.js')}}"></script>
    <script src="{{asset('js/editor/simple-mde/simplemde.custom.js')}}"></script>
@endsection
