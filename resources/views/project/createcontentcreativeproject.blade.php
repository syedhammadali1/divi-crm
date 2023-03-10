@extends('layouts.main') @section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Create Content {{$content_type_creative ? 'Creative' :'Academic'}} Project</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}"> <i data-feather="home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('viewbrandproject')}}">Project</a></li>
                            <li class="breadcrumb-item active">Create Content {{$content_type_creative ? 'Creative' :'Academic'}} Project</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Sorry!</strong> There are some problems.<br/>
                                <br/>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        <br/>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="form theme-form">
                                <form method="POST" action="{{route('content_project_submit')}}" id="project-form"
                                      autocomplete="off">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="content_type" value="{{$content_type_creative ? 'CREATIVE' :'ACADEMIC'}}">
                                        <input type="hidden" name="projownertype" value="soleprop" id="projownertype">
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label>Project Title *</label>
                                                <input class="form-control @error('name') is-invalid @enderror"
                                                       value="{{ old('name') }}" name="name" type="text"
                                                       placeholder="Project Name"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="brands">Brands *</label>
                                                <select class="js-example-basic-multiple col-sm-12" id="brands" name="brands" required>
                                                    @if(Bouncer::is(Auth()->user())->A('admin','hod sales and support'))
                                                        @foreach($allBrands as $brand)
                                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                        @endforeach
                                                    @else
                                                        @foreach($allBrands as $brand)
                                                            <option
                                                                value="{{$brand->brandName->id}}">{{$brand->brandName->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="sourceaccount">Source Account *</label>
                                                <select class="js-example-basic-multiple col-sm-12" id="sourceaccount" name="sourceaccount" required>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Rephrasing / New *</label>
                                                <select class="js-example-basic-multiple col-sm-12" id="rephrasing_new_type"
                                                        name="rephrasing_new_type" required>
                                                    <option value="NEW" selected="">New Content</option>
                                                    <option value="REPHRASING">Rephrasing Content</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Deadline *</label>
                                                <input class="datepicker-here form-control digits" id="minMaxExample" readonly placeholder="Select Due Date" name="due_date" type="text" data-language="en"  data-position="bottom right" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 d-none">
                                            <div class="mb-3">
                                                <label>Project Owner Type *</label>
                                                <input type="hidden" name="projownertype" value="soleprop" id="projownertype">
{{--                                                <select class="js-example-basic-multiple col-sm-12" id="projownertype"--}}
{{--                                                        name="projownertype">--}}
{{--                                                    <option value="soleprop" selected>Sole Proprietor</option>--}}
{{--                                                    <option value="partner">Partnership</option>--}}
{{--                                                </select>--}}
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Paper Topic</label>
                                                <input class="form-control @error('paper_topic') is-invalid @enderror"
                                                       value="{{ old('paper_topic') }}" name="paper_topic" type="text"
                                                       placeholder="Paper Topic"/>
                                            </div>
                                        </div>

                                        @if($content_type_creative)
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Industry  *</label>
                                                <select class="js-example-basic-multiple col-sm-12"
                                                        name="industry" required>
                                                    @if($industries)
                                                        @foreach($industries as $industry)
                                                            <option value="{{$industry->id}}">{{$industry->name}} </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Keywords * </label>
                                                <input class="form-control @error('keywords') is-invalid @enderror"
                                                       value="{{ old('keywords') }}" name="keywords" type="text"
                                                       placeholder="Keywords 1 , keywords 2"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Website</label>
                                                <input class="form-control @error('website') is-invalid @enderror"
                                                       value="{{ old('website') }}" name="website" type="url"
                                                       placeholder="Ex: www.Example.com"/>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Academic Level *</label>
                                                <select class="js-example-basic-multiple col-sm-12"
                                                        name="academiclevel" required>
                                                    @if($academicLevels)
                                                        @foreach($academicLevels as $academicLevel)
                                                            <option value="{{$academicLevel->id}}">{{$academicLevel->level}} </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        @endif

                                        @if($content_type_creative)
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Content Project Types *</label>
                                                <select class="js-example-basic-multiple col-sm-12"
                                                        name="contentProjectTypes" required>
                                                    @if($contentProjectTypesCreative)
                                                        @foreach($contentProjectTypesCreative as $contentProjectType)
                                                            <option value="{{$contentProjectType->id}}">{{$contentProjectType->type}} </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Content Project Types *</label>
                                                <select class="js-example-basic-multiple col-sm-12"
                                                        name="contentProjectTypes" required>
                                                    @if($contentProjectTypesAcademic)
                                                        @foreach($contentProjectTypesAcademic as $contentProjectType)
                                                            <option value="{{$contentProjectType->id}}">{{$contentProjectType->type}} </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Referencing Style *</label>
                                                <select class="js-example-basic-multiple col-sm-12"
                                                        name="referencingStyle" required>
                                                    @if($referenceStyles)
                                                        @foreach($referenceStyles as $referenceStyle)
                                                            <option value="{{$referenceStyle->id}}">{{$referenceStyle->style}} </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Number Of Words *</label>
                                                <select class="js-example-basic-multiple col-sm-12"
                                                        name="numberOfWords" required>
                                                    @if($numberOfWords)
                                                        @foreach($numberOfWords as $numberOfWord)
                                                            <option value="{{$numberOfWord->id}}">{{$numberOfWord->words}} </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Standard Of Work *</label>
                                                <select class="js-example-basic-multiple col-sm-12" name="standardofwork" required>
                                                    <option value="PASS">PASS</option>
                                                    <option value="MERIT" selected="">MERIT</option>
                                                    <option value="DISTINCTION">DISTINCTION</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>No Of Slides</label>
                                                <input class="form-control @error('noofslides') is-invalid @enderror"
                                                       value="{{ old('noofslides') }}" name="noofslides" type="number"
                                                       placeholder="No Of Slides"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>No Of Refrences</label>
                                                <input class="form-control @error('noofRefrences') is-invalid @enderror"
                                                       value="{{ old('noofRefrences') }}" name="noofRefrences" type="number"
                                                       placeholder="No Of Refrences"/>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 d-none">
                                            <div class="mb-3">
                                                <label>Project Packages *</label>
                                                <select class="js-example-basic-multiple col-sm-12"
                                                        name="project_package[]" multiple="multiple" required>
                                                    @if($packages)
                                                        @foreach($packages as $package)
                                                            <option value="{{$package->id}}">{{$package->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Production Managers *</label>
                                                <select class="js-example-basic-multiple col-sm-12"
                                                        name="project_manager" required>
                                                    @if($managers)
                                                        @foreach($managers as $manager)
                                                            <option
                                                                value="{{$manager->emp_id}}">{{$manager->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Brand Managers *</label>
                                                <select class="js-example-basic-multiple col-sm-12" name="brand_manager"
                                                        required>
                                                    @if($brandmanagers)
                                                        @foreach($brandmanagers as $brandmanager)
                                                            <option
                                                                value="{{$brandmanager->emp_id}}">{{$brandmanager->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Paper Subject</label>
                                                <input class="form-control @error('papersubject') is-invalid @enderror"
                                                       value="{{ old('papersubject') }}" name="papersubject" type="text"
                                                       placeholder="Paper Subject"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 d-none">
                                            <div class="mb-3">
                                                <label>Support Person *</label>
                                                <select class="js-example-basic-multiple col-sm-12" name="supportperson">
                                                    @if($supportpersons)
                                                        @foreach($supportpersons as $supportperson)
                                                            <option
                                                                value="{{$supportperson->emp_id}}">{{$supportperson->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>currency *</label>
                                                <select class="js-example-basic-multiple col-sm-12" name="currency">
                                                    @foreach($currencies as $currency)
                                                        <option
{{--                                                            {{$developmentproj->currency_id == $currency->id ? 'selected' : ''}} value="{{$currency->id}}">{{ $currency->currency }}</option>--}}
                                                             value="{{$currency->id}}">{{ $currency->currency }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Project Amount *</label>
                                                <input type="number" value="{{ old('project_cost') }}"
                                                       class="form-control @error('project_cost') is-invalid @enderror"
                                                       id="project_cost" name="project_cost" min="0"
                                                       oninput="validity.valid||(value='');"
                                                       placeholder="Enter Project Amount"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Upfront Payment *</label>
                                                <input type="number" value="{{ old('paid_cost') }}"
                                                       class="form-control @error('paid_cost') is-invalid @enderror"
                                                       onkeyup="priceCheck()" id="paid_cost" name="paid_cost" min="0"
                                                       oninput="validity.valid||(value='');"
                                                       placeholder="Enter Upfront Payment"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Project Remaining Amount *</label>
                                                <input type="number" value="{{ old('remain_cost') }}"
                                                       class="form-control @error('remain_cost') is-invalid @enderror"
                                                       id="remain_cost" name="remain_cost" min="0" readonly
                                                       oninput="validity.valid||(value='');"
                                                       placeholder="Remaining Amount"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label>Client email</label>
                                                <input class="form-control @error('client_email') is-invalid @enderror"
                                                       value="{{ old('client_email') }}" list="client_email_list"
                                                       id="client_email" onfocusout="findClient()" name="client_email"
                                                       type="email" placeholder="Client Email" required/>
                                                <datalist id="client_email_list">
                                                    @if($clients)
                                                        @foreach($clients as $client)
                                                            <option value="{{$client->email}}">
                                                        @endforeach
                                                    @endif
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label>Client name</label>
                                                <input class="form-control @error('client_name') is-invalid @enderror"
                                                       value="{{ old('client_name') }}" id="client_name"
                                                       name="client_name" type="text" placeholder="Client name"
                                                       required/>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label>Client phone</label>
                                                <input class="form-control @error('client_phone') is-invalid @enderror"
                                                       value="{{ old('client_phone') }}" id="client_phone"
                                                       name="client_phone" type="number"
                                                       placeholder="Client Contact Number" required/>
                                            </div>
                                        </div>
                                    </div>
                                {{--       <div class="row partnerclient" style="display: none">
                                         <a class="btn btn-primary btn-sm right mb-3" href="javascript:void(0)"
                                            onclick="addmorepartners()" id="addpartner">Add Partner</a>
                                         <div class="row" id="partnerinfo">
                                             <div class="col-lg-4">
                                                 <div class="mb-3">
                                                     <label>Partner Email *</label>
                                                     <input class="form-control" value="{{ old('partner_email') }}"
                                                            id="partner_email" name="partner_email[]" type="email"
                                                            placeholder="Partner Email" required/>
                                                 </div>
                                             </div>
                                             <div class="col-lg-4">
                                                 <div class="mb-3">
                                                     <label>Partner Name *</label>
                                                     <input class="form-control" value="{{ old('partner_name') }}"
                                                            id="partner_name" name="partner_name[]" type="text"
                                                            placeholder="Partner Name" required/>
                                                 </div>
                                             </div>
                                             <div class="col-lg-4">
                                                 <div class="mb-3">
                                                     <label>Partner Phone *</label>
                                                     <input class="form-control" value="{{ old('partner_phone') }}"
                                                            id="partner_name" name="partner_phone[]" type="tel"
                                                            placeholder="Partner Phone" required/>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="row" id="newpartnerinfo">

                                       </div>
                                    </div>--}}
                                    <div class="row">

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Project Transition ID *</label>
                                                <input type="text" value="{{ old('trans_id') }}"
                                                       class="form-control @error('trans_id') is-invalid @enderror"
                                                       id="trans_id" name="trans_id" required
                                                       placeholder="Project Transition ID "/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Project Type</label>
                                                <select class="form-select" name="project_type">
                                                    <option value="Hourly">Hourly</option>
                                                    <option value="Fix price">Fix price</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Priority</label>
                                                <select class="form-select" name="project_priority">
                                                    <option value="Low">Low</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="High">High</option>
                                                    <option value="Urgent">Urgent</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    {{--
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label>Project Size</label>
                                                <select class="form-select">
                                                    <option>Small</option>
                                                    <option>Medium</option>
                                                    <option>Big</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label>Starting date</label>
                                                <input class="datepicker-here form-control" type="text" data-language="en" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label>Ending date</label>
                                                <input class="datepicker-here form-control" type="text" data-language="en" />
                                            </div>
                                        </div>
                                    </div>
                                    --}}
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Enter some Details</label>
                                                <div id="editor_container">
                                                    <textarea id="editable"
                                                              class="form-control @error('project_details') is-invalid @enderror"
                                                              name="project_details" name="project_details"
                                                              rows="3">{{ old('project_details') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                {{-- <label>Uploaded Images</label> --}}
                                                <div id="uploaded-images">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <input type="hidden" name="attachment_path_id[]" id="attachment_path"> -->
                                </form>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Upload project file</label>
                                            <form class="dropzone" id="multiFileUpload">
                                                @csrf
                                                <div class="dz-message needsclick">
                                                    <i class="icon-cloud-up"></i>
                                                    <h6>Drop files here or click to upload.</h6>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <a class="btn btn-danger" href="javascript:void(0)" id="project-form-reset">Reset</a>
                                    </div>
                                    <div class="col-6" style="text-align: right">
                                        <a class="btn btn-success me-3" id="project-submit" href="javascript:void(0)">Submit</a>
                                    </div>
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
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendors/dropzone.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendors/select2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendors/simple-mde.css')}}"/>
    <style type="text/css">
        #uploaded-images img {
            width: 15%;
            height: 15%;
            border-radius: 26px;
        }
    </style>

@endsection
@section('js')
    <script src="{{asset('js/editor/simple-mde/simplemde.min.js')}}"></script>
    <script src="{{asset('js/editor/simple-mde/simplemde.custom.js')}}"></script>
    <script src="{{asset('js/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('js/dropzone/dropzone-script.js')}}"></script>
    <script src="{{asset('js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('js/select2/select2-custom.js')}}"></script>
    <script type="text/javascript">
        $("#project-submit").click(function () {
            $("#project-form").submit();
        });
        $("#project-form-reset").click(function () {
            $("#project-form").trigger("reset");
        });

        $("#multiFileUpload").dropzone({
            url: "{{route('project_attachment')}}",
            maxFilesize: 3,
            addRemoveLinks: true,
            removedfile: function (file) {
                var fileName = file.name;
                removeElement(fileName);

                // $.ajax({
                //     type: 'POST',
                //     url: "{{route('project_attachment')}}",
                //     data: {file: fileName, request: 'delete'},
                //     success: function (data) {
                //         console.log('success: ' + data);
                //     }
                // });
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            },
            init: function () {
                this.on("success", function (file, response) {
                    var obj = jQuery.parseJSON(response)
                    let hashedFileName = file.name.hashCode();
                    var img = obj.filepath;
                    var url = $("#web_url").val();
                    if (url != "http://127.0.0.1:8000") {
                        url = url + '/public';
                    }

                    if (obj.filetype == "pdf") {
                        // $("#uploaded-images").append('<a download href="' + url + img + '"><i class="fa fa-file-pdf-o"></i> Download PDF File</a>');
                        $("#uploaded-images").append('<input type="hidden" name="attachment_path_id[]" value="' + img + '" id='+ hashedFileName +'>')
                    } else if (obj.filetype == "docx") {
                        // $("#uploaded-images").append('<a download href="' + url + img + '"><i class="fa fa-file-word-o" aria-hidden="true"></i> Download Word File</a>');
                        $("#uploaded-images").append('<input type="hidden" name="attachment_path_id[]" value="' + img + '" id='+ hashedFileName +'>')
                    } else {
                        // $("#uploaded-images").append('<img src="' + url + img + '">');
                        $("#uploaded-images").append('<input type="hidden" name="attachment_path_id[]" value="' + img + '" id='+ hashedFileName +'>')
                    }

                })
            }
        });

        function findClient() {
            var clientemail = $('#client_email').val();
            // console.log(clientemail);
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{!! url('client-by-email') !!}',
                data: {'clientemail': clientemail},
                success: function (data) {
                    // console.log(data);
                    $('#client_name').val(data.name);
                    $('#client_phone').val(data.phonenumber);
                },
                error: function () {
                    $('#client_name').val('');
                    $('#client_phone').val('');
                }
            });
        }

        function priceCheck() {
            var projectCost = $('#project_cost').val();
            var paidCost = $('#paid_cost').val();
            var remainCost = projectCost - paidCost;
            $('#remain_cost').val(remainCost);
        }

        $("#projownertype").change(function () {
            var packtype = $("#projownertype").val()

            if (packtype == 'partner') {
                $(".partnerclient").show();
            } else {
                $(".partnerclient").hide();
            }
        });

        function addmorepartners() {
            // $("#newpartnerinfo").append('<input type="hidden" name="attachment_path_id[]" value="'+img+'">');
            $("#newpartnerinfo").append('<div class="col-lg-4"> <div class="mb-3"> <label>Partner Email *</label><input class="form-control" value="" name="partner_email[]" type="email" placeholder="Partner Email" required/></div></div> <div class="col-lg-4"> <div class="mb-3"> <label>Partner Name *</label><input class="form-control" value="" name="partner_name[]" type="text" placeholder="Partner Name" required/></div></div> <div class="col-lg-4"> <div class="mb-3"> <label>Partner Phone *</label><input class="form-control" value="" name="partner_phone[]" type="tel" placeholder="Partner Phone" required/></div></div>');
        }

        {{--$("#package").change(function () {--}}
        {{--    var packtype = $("#package").val()--}}

        {{--    if($.inArray('wholeproj', packtype) > -1 && packtype.length >= 2){--}}
        {{--        // console.log(packtype);--}}
        {{--        alert("Please Un-Select the Complete Project or Packages in order to create new transition");--}}
        {{--    }else if($.inArray('wholeproj', packtype) > -1 && packtype.length >= 1){--}}
        {{--        $('#lastremainamount').attr("readonly", true);--}}
        {{--        $('#lastremainamount').val({{$project->remaining_cost}});--}}
        {{--    }--}}
        {{--    else {--}}
        {{--        // console.log(packtype);--}}
        {{--        $('#lastremainamount').attr("readonly", false);--}}
        {{--        $('#lastremainamount').val('0');--}}
        {{--    }--}}
        {{--});--}}


        function makeAjaxCall() {
            var id =  $("#brands").find(":selected").val();
            $.ajax({
                type: "post",
                dataType: "json",
                url: "{{route('getSourceAccountEmp')}}",
                data: {project_sources_id: id, _token: "{{csrf_token()}}"},
                success: function (response) {
                    // console.log(response);
                    if (response.status == 0) {
                        toastr.error("No data found");
                        $("#sourceaccount").html("");
                    } else {
                        $("#sourceaccount").html(response.body);
                    }
                },
            });
        }

        $("#brands").change(function (e) {
            e.preventDefault();
            makeAjaxCall();
        });
        makeAjaxCall();
    </script>
@endsection
