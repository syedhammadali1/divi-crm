 @extends('layouts.main')
@section('content')

<div class="page-body">
               <div class="container-fluid">
                  <div class="page-title">
                     <div class="row">
                        <div class="col-6">
                           <h3>Project Attachments</h3>
                        </div>
                        <div class="col-6">
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                              <li class="breadcrumb-item"><a href="{{route('viewbrandproject')}}" >Project</a></li>
                              <li class="breadcrumb-item active">Project Attachments</li>
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
                                <h5>{{$projectinfo->name ?? 'No Project Found!'}}</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                      <div class="col-sm-12">
                          <div class="file-content">
                              <div class="card">
                                  <div class="card-body file-manager">
                                      <ul class="files">
                                          @if(count($projectattachments) > 0)
                                              <h5 class="mt-4 mb-3">Project Attachments</h5>
                                              @foreach($projectattachments as $projectattachment)
                                                  <a href="{{url($projectattachment->path)}}" download="">
                                                      <li class="file-box">
                                                        <div class="file-top">

                                                            @if ($projectattachment->attachment_type == 'image')
                                                            <img src="{{ asset($projectattachment->path) }}" height="100px" width="100%" alt="" style="object-fit: contain">
                                                            @else
                                                            <i
                                                                  class="fa fa-file-text-o txt-info"></i><i
                                                                  class="fa fa-ellipsis-v f-14 ellips"></i>
                                                            @endif
                                                        </div>
                                                          <div class="file-bottom">
                                                              <h6 class="text-center mb-1 mt-3">{{pathinfo(url($projectattachment->path))['filename']}}</h6>
                                                              <p class="text-center mb-1 mt-3"><b>Upload At : </b>{{$projectattachment->created_at}}</p>
                                                          </div>
                                                      </li>
                                                  </a>
                                              @endforeach

                                          @else
                                              <h6 class="mt-4 mb-3">No Project Attachments Found!</h6>
                                          @endif
                                      </ul>

                                      <ul class="files">
                                          @if(count($projecttaskattachments) > 0)
                                              <h5 class="mt-4 mb-3">Project Task Attachments</h5>
                                              @foreach($projecttaskattachments as $projecttaskattachment)
                                                  <a href="{{url($projecttaskattachment->path)}}" download="">
                                                      <li class="file-box">
                                                          <div class="file-top">
                                                            @if ($projecttaskattachment->attachment_type == 'image')
                                                            <img src="{{ asset($projecttaskattachment->path) }}" height="100px" width="100%" alt="" style="object-fit: contain">
                                                            @else
                                                            <i class="fa fa-file-text-o txt-info"></i>
                                                            <i class="fa fa-ellipsis-v f-14 ellips"></i>
                                                            @endif
                                                                </div>
                                                          <div class="file-bottom">
                                                              <h6 class="text-center mb-1 mt-3">{{pathinfo(url($projecttaskattachment->path))['filename']}}</h6>
                                                              <p class="text-center mb-1 mt-3"><b>Upload At : </b>{{$projecttaskattachment->created_at}}</p>
                                                          </div>
                                                      </li>
                                                  </a>


                                              @endforeach
                                          @else
                                              <h6 class="mt-4 mb-3">No Project Task Attachments Found!</h6>
                                          @endif
                                      </ul>

                                      <ul class="files">
                                          <div class="row">
                                              <div class="col-lg-6">
                                                  <h5 class="mt-4 mb-3">Project Delivery Files</h5>
                                              </div>
                                              <div class="col-lg-6">
                                                  <span>Upload Delivery Files</span>
                                                  <form method="POST" action="{{route('content.upLoad-project-final-file')}}" enctype="multipart/form-data">
                                                      @csrf
                                                      <input type="hidden" value="{{ $projectinfo->id }}" name="project_id"/>
                                                      <input type="file" accept="image/*" required multiple  name="deliveryfiles[]">
                                                      <button type="submit" >Submit</button>
                                                  </form>
                                              </div>
                                          </div>
                                          @if(count($projectfinalattachments) > 0)
                                            @foreach($projectfinalattachments as $projectfinalattachment)
                                        @if ($projectfinalattachment->attachment_type == 'image')

                                             <li class="file-box">
                                                <a href="{{url($projectfinalattachment->path)}}" download="{{$projectfinalattachment->attachment_name}}">

                                                    <img src="{{ asset($projectfinalattachment->path) }}" height="100px" width="100%" alt="" style="object-fit: contain">
                                                </a>
                                                <div class="file-bottom">
                                                    <h6 class="word-overflow-hidden"> <b>LastUpdateBy : </b> {{@$projectfinalattachment->statusUpdatedBy->username}} </h6>
                                                    <h6 class="word-overflow-hidden"> <b>Title : </b> {{$projectfinalattachment->attachment_title}} </h6>
                                                    {{-- <h6 class="text-center mb-1 mt-3">{{$projectfinalattachment->attachment_name}}</h6> --}}
                                                    <p class="text-center mb-1 mt-3"><b>Upload At : </b>{{$projectfinalattachment->created_at}}</p>
                                                    <p class="word-overflow-hidden"> <b>Details : </b> {{$projectfinalattachment->attachment_description}} </p>
                                                    <div class="d-flex justify-content-center">
                                                        <span data-file-id="{{$projectfinalattachment->id}}" class=" ms-3 badge file_status_badge pill-badge-primary @if($projectfinalattachment->status == 'None') pill-badge-primary @elseif($projectfinalattachment->status == 'Pending') pill-badge-info @elseif($projectfinalattachment->status == 'Approved') pill-badge-success @elseif($projectfinalattachment->status == 'Reject') pill-badge-danger @endif">{{ ucfirst( $projectfinalattachment->status)}}</span>
                                                        <span class="ms-3 badge pill-badge-info create-description" data-attachment-id="{{$projectfinalattachment->id}}" data-attachment-description="{{$projectfinalattachment->attachment_description}}" data-attachment-title="{{$projectfinalattachment->attachment_title}}">Description</span>

                                                    </div>
                                                </div>
                                            </li>
                                        @else

                                             <li class="file-box">
                                                <a href="{{url($projectfinalattachment->path)}}" download="{{$projectfinalattachment->attachment_name}}">
                                                    <div class="file-top"><i
                                                            class="fa fa-file-text-o txt-info"></i><i
                                                            class="fa fa-ellipsis-v f-14 ellips"></i>
                                                    </div>
                                                </a>
                                                <div class="file-bottom">
                                                    <h6 class="word-overflow-hidden"> <b>LastUpdateBy : </b> {{@$projectfinalattachment->statusUpdatedBy->username}} </h6>
                                                    <h6 class="word-overflow-hidden"> <b>Title : </b> {{$projectfinalattachment->attachment_title}} </h6>
                                                    {{-- <h6 class="text-center mb-1 mt-3">{{$projectfinalattachment->attachment_name}}</h6> --}}
                                                    <p class="text-center mb-1 mt-3"><b>Upload At : </b>{{$projectfinalattachment->created_at}}</p>
                                                    <p class="word-overflow-hidden"> <b>Details : </b> {{$projectfinalattachment->attachment_description}} </p>

{{--                                                              <span data-file-id="{{$projectfinalattachment->id}}" class=" ms-3 badge {{$userRole == 'admin' ? 'file_status_badge' : ''}} pill-badge-primary @if($projectfinalattachment->status == 'none') pill-badge-secondary @elseif($projectfinalattachment->status == 'pending') pill-badge-info @elseif($projectfinalattachment->status == 'approved') pill-badge-success @elseif($projectfinalattachment->status == 'reject') pill-badge-danger @endif">{{ $projectfinalattachment->status}}</span>--}}
                                                    <div class="d-flex justify-content-center">
                                                        <span data-file-id="{{$projectfinalattachment->id}}"  class=" ms-3 badge file_status_badge pill-badge-primary @if($projectfinalattachment->status == 'None') pill-badge-primary @elseif($projectfinalattachment->status == 'Pending') pill-badge-info @elseif($projectfinalattachment->status == 'Approved') pill-badge-success @elseif($projectfinalattachment->status == 'Reject') pill-badge-danger @endif">{{ucfirst( $projectfinalattachment->status) }}</span>
                                                        <span class="ms-3 badge pill-badge-info create-description" data-attachment-id="{{$projectfinalattachment->id}}" data-attachment-description="{{$projectfinalattachment->attachment_description}}" data-attachment-title="{{$projectfinalattachment->attachment_title}}">Description</span>
                                                    </div>
                                                </div>
                                            </li>

                                        @endif
                                              @endforeach
                                          @else
                                              <h6 class="mt-4 mb-3">No Project Delivery Files Found!</h6>
                                          @endif
                                      </ul>
                                  </div>
                              </div>

                              <div class="modal fade" id="status-final-file-modal" tabindex="-1" aria-labelledby="status-final-file-modal" style="padding-right: 17px;" aria-modal="true" role="dialog">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">File Status</h5>
                                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                                          </div>
                                          <div class="modal-body">
                                              <form method="POST" class="final-delete-path" action="{{route('react-project-final-file-status')}}">
                                                  @csrf
                                                  <div class="modal-body">
                                                      <input type="hidden" id="modal_status_file_id" name="modal_file_id" value="">
                                                      <select class="form-control" name="file_status">
                                                          <option value="{{ Config::get('constants.ProjectAttachmentStatus.None') }}">None</option>
                                                          <option value="{{ Config::get('constants.ProjectAttachmentStatus.Pending') }}" selected>Pending</option>
                                                          <option value="{{ Config::get('constants.ProjectAttachmentStatus.QA') }}" selected>Q.A</option>
                                                          <option value="{{ Config::get('constants.ProjectAttachmentStatus.UnApproved') }}" selected>UnApproved</option>
                                                          <option value="{{ Config::get('constants.ProjectAttachmentStatus.Approved') }}">Approved</option>
                                                          <option value="{{ Config::get('constants.ProjectAttachmentStatus.Completed') }}" selected>Completed</option>
                                                          <option value="{{ Config::get('constants.ProjectAttachmentStatus.Reject') }}">Reject</option>
                                                      </select>
                                                  </div>
                                                  <div class="modal-footer">
                                                      <button class="btn btn-primary" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">Close</button>
                                                      <button class="btn btn-secondary" type="submit" data-bs-original-title="" title="">Save changes</button>
                                                  </div>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>


                              {{-- description modal --}}

                              <div class="modal fade" id="description-modal" tabindex="-1" aria-labelledby="description-modal" style="padding-right: 17px;" aria-modal="true" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Write Details</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" class="final-delete-path"  action="{{route('content.upLoad-project-final-file')}}">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" id="attachment_id" name="attachment_id" value="">
                                                    <div class="form-group">
                                                        <label for="attachment_title">Title</label>
                                                        <input type="text" class="form-control" id="attachment_title" aria-describedby="emailHelp" placeholder="Enter Title" name="attachment_title">
                                                      </div>
                                                    <div class="form-group mt-2">
                                                        <label for="">Description</label>
                                                       <textarea name="attachment_description" id="attachment_description" cols="15" rows="10" class="w-100 form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">Close</button>
                                                    <button class="btn btn-secondary" type="submit" data-bs-original-title="" title="">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            {{-- end description modal --}}
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
    <script>
        $(".file_status_badge").click(function(){
            let fileid = $(this).data('file-id');
            $('#modal_status_file_id').val(fileid);
            {{--$('.final-delete-path').attr("action",'{{url('/project/react/delete-project-final-file')}}/'+fileid);--}}
            $('#status-final-file-modal').modal('show');
        });

        $(".create-description").click(function(){
            let attachment_id = $(this).data('attachment-id');
            let attachment_description = $(this).data('attachment-description');
            let attachment_title = $(this).data('attachment-title');
            $('#attachment_id').val(attachment_id);
            $('#attachment_description').val(attachment_description);
            $('#attachment_title').val(attachment_title);
            $('#description-modal').modal('show');
        });
    </script>
@endsection
