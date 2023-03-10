<?php  
$project_open = App\Models\attributes::where('attribute' , 'project')->where('is_active' ,1)->get();
?>
<div class="modal fade" id="exampleModaltooltip2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle2" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle2">Switch to</h5>
                                    
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        @if($project_open)
                                            @foreach($project_open as $project)
                                                <a href="{{route('switch_project' , [$project->id])}}">
                                                <div class="col-12 col-md-12 col-lg-12 mt-12 role-assign-modal" data-role_id="{{$project->id}}" data-rolename='{{$project->role}}' style="cursor: pointer;">
                                                    <div class="card border-bottom-0">
                                                        <div class="card-content border-bottom border-primary border-w-5" style="border-color: {{$project->color}} !important;">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="circle-50 outline-badge-primary" style="color: {{$project->color}};border: 1px solid {{$project->color}};"><span class="cf card-liner-icon cf-xsn mt-2"></span></div>
                                                                    <div class="media-body align-self-center pl-3">
                                                                        <span class="mb-0 h6 font-w-600">{{$project->name}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>