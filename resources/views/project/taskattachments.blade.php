 @extends('layouts.main')
@section('content')
<div class="page-body">
               <div class="container-fluid">
                  <div class="page-title">
                     <div class="row">
                        <div class="col-6">
                           <h3>Project Task Attachments</h3>
                        </div>
                        <div class="col-6">
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                              <li class="breadcrumb-item"><a href="{{route('viewbrandproject')}}" >Project</a></li>
                              <li class="breadcrumb-item active">Project Task Attachments</li>
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
                                <h5>{{$taskinfo->title ?? ''}}</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                      <div class="col-sm-12">
                          <div class="file-content">
                              <div class="card">
                                  <div class="card-body file-manager">
                                      <ul class="files">
                                          @if(count($taskattachments) > 0)

                                              @foreach($taskattachments as $taskattachment)
                                                  <a href="{{url($taskattachment->path)}}" download="">
                                                      <li class="file-box">
                                                          <div class="file-top"><i
                                                                  class="fa fa-file-text-o txt-info"></i><i
                                                                  class="fa fa-ellipsis-v f-14 ellips"></i></div>
                                                          <div class="file-bottom">
                                                              <h6 class="text-center mb-1 mt-3">{{pathinfo(url($taskattachment->path))['filename']}}</h6>
                                                              <p class="text-center mb-1 mt-3"><b>Upload At
                                                                      : </b>{{$taskattachment->created_at}}</p>
                                                          </div>
                                                      </li>
                                                  </a>
                                              @endforeach

                                          @else
                                              <h6>No Attachments Found!</h6>
                                          @endif
                                      </ul>
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
@endsection
