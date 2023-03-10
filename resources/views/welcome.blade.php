@extends('layouts.main')
@section('content')
<div class="page-body">
               <div class="container-fluid">
                  <div class="page-title">
                     <div class="row">
                        <div class="col-6">
                           <h3>Well come <span class="text-primary"> {{auth()->user()->name }} </span></h3>
                        </div>
                        <div class="col-6">
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                              <li class="breadcrumb-item">Dashboard</li>
                              <li class="breadcrumb-item active">{{auth()->user()->getRoles()->first()}}</li>
                           </ol>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Container-fluid starts-->
               <div class="container-fluid">
                  <div class="row second-chart-list third-news-update">

                     <div class="col-xl-6 col-lg-12 xl-50 morning-sec box-col-12">
                        <div class="card o-hidden profile-greeting">
                           <div class="card-body">
                              <div class="media">
                                 <div class="badge-groups w-100">
                                    <div class="badge f-12"><i class="me-1" data-feather="clock"></i><span id="txt"></span></div>
                                    <div class="badge f-12"><i class="fa fa-spin fa-cog f-14"></i></div>
                                 </div>
                              </div>
                              <div class="greeting-user text-center">
                                 <div class="profile-vector"><img class="img-fluid" style="width: 15% ; padding: 10px" src="{{asset(auth()->user()->profile_pic ??'images/dashboard/welcome.png')}}" alt=""></div>
                                 <h4 class="f-w-600"><span>{{auth()->user()->name }}</span> <span class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                                 <p><span> {{auth()->user()->email }}</span></p>
                                 <div class="whatsnew-btn"><a class="btn btn-primary" href="{{route('user_profile')}}">My Profile</a></div>
{{--                                 <div class="left-icon"><i class="fa fa-bell"> </i></div>--}}
                              </div>
                           </div>
                        </div>
                     </div>
                     {{--
                     <div class="col-xl-8 xl-100 dashboard-sec box-col-12">
                        <div class="card earning-card">
                           <div class="card-body p-0">
                              <div class="row m-0">
                                 <div class="col-xl-3 earning-content p-0">
                                    <div class="row m-0 chart-left">
                                       <div class="col-xl-12 p-0 left_side_earning">
                                          <h5 class="text-uppercase">{{auth()->user()->getRoles()->first()}} Profile</h5>
                                       </div>
                                       <div class="col-xl-12 p-0 left_side_earning">
                                          <h5>$4055.56 </h5>
                                          <p class="font-roboto">This Month Earning</p>
                                       </div>
                                       <div class="col-xl-12 p-0 left_side_earning">
                                          <h5>$1004.11</h5>
                                          <p class="font-roboto">This Month Profit</p>
                                       </div>
                                       <div class="col-xl-12 p-0 left_side_earning">
                                          <h5>90%</h5>
                                          <p class="font-roboto">This Month Sale</p>
                                       </div>
                                       <div class="col-xl-12 p-0 left-btn"><a class="btn btn-gradient">Summary</a></div>
                                    </div>
                                 </div>
                                 <div class="col-xl-9 p-0">
                                    <div class="chart-right">
                                       <div class="row m-0 p-tb">
                                          <div class="col-xl-8 col-md-8 col-sm-8 col-12 p-0">
                                             <div class="inner-top-left">
                                                <ul class="d-flex list-unstyled">
                                                   <li>Daily</li>
                                                   <li class="active">Weekly</li>
                                                   <li>Monthly</li>
                                                   <li>Yearly</li>
                                                </ul>
                                             </div>
                                          </div>
                                          <div class="col-xl-4 col-md-4 col-sm-4 col-12 p-0 justify-content-end">
                                             <div class="inner-top-right">
                                                <ul class="d-flex list-unstyled justify-content-end">
                                                   <li>Online</li>
                                                   <li>Store</li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-xl-12">
                                             <div class="card-body p-0">
                                                <div class="current-sale-container">
                                                   <div id="chart-currently"></div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row border-top m-0">
                                       <div class="col-xl-4 ps-0 col-md-6 col-sm-6">
                                          <div class="media p-0">
                                             <div class="media-left"><i class="icofont icofont-crown"></i></div>
                                             <div class="media-body">
                                                <h6>Referral Earning</h6>
                                                <p>$5,000.20</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-xl-4 col-md-6 col-sm-6">
                                          <div class="media p-0">
                                             <div class="media-left bg-secondary"><i class="icofont icofont-heart-alt"></i></div>
                                             <div class="media-body">
                                                <h6>Cash Balance</h6>
                                                <p>$2,657.21</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-xl-4 col-md-12 pe-0">
                                          <div class="media p-0">
                                             <div class="media-left"><i class="icofont icofont-cur-dollar"></i></div>
                                             <div class="media-body">
                                                <h6>Sales forcasting</h6>
                                                <p>$9,478.50     </p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     --}}

                      <div class="col-xl-6 col-lg-12 xl-50 calendar-sec box-col-6">
                          <div class="card gradient-primary o-hidden">
                              <div class="card-body">
                                  <div class="setting-dot">
                                      <div class="setting-bg-primary date-picker-setting position-set pull-right"><i class="fa fa-spin fa-cog"></i></div>
                                  </div>
                                  <div class="default-datepicker">
                                      <div class="datepicker-here" data-language="en"></div>
                                  </div>
                                  <span class="default-dots-stay overview-dots full-width-dots"><span class="dots-group"><span class="dots dots1"></span><span class="dots dots2 dot-small"></span><span class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span class="dots dots7 dot-small-semi"></span><span class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">                </span></span></span>
                              </div>
                          </div>
                      </div>

                      @if(Auth::user()->getRoles()->first() == "admin")
                      <div class="col-xl-12 col-lg-12 xl-50 calendar-sec box-col-6">
                          <div class="card gradient-primary o-hidden">
                              <div class="card-body" style="padding: 0 !important;">
                                  <div id="monthlyporjcost" style="width: 100%; height: 470px;"></div>
                              </div>
                          </div>
                      </div>
                      @endif



                      @if(Auth::user()->getRoles()->first() == "sales")
                          <div class="col-xl-12 xl-100 chart_data_left box-col-12">
                            <div class="card">
                           <div class="card-body p-0">
                              <div class="row m-0 chart-main">
                                 <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                    <div class="media align-items-center">
                                       <div class="hospital-small-chart">
                                          <div class="small-bar">
                                             <div class="small-chart flot-chart-container"></div>
                                          </div>
                                       </div>
                                       <div class="media-body">
                                          <div class="right-chart-content">
                                             <h4>{{ $data['projectsCount'] }}</h4>
                                             <span>Total Created Projects </span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                    <div class="media align-items-center">
                                       <div class="hospital-small-chart">
                                          <div class="small-bar">
                                             <div class="small-chart1 flot-chart-container"></div>
                                          </div>
                                       </div>
                                       <div class="media-body">
                                          <div class="right-chart-content">
                                             <h4>{{ $data['projectTasksCount'] }}</h4>
                                             <span>Total Tasks Created</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                    <div class="media align-items-center">
                                       <div class="hospital-small-chart">
                                          <div class="small-bar">
                                             <div class="small-chart2 flot-chart-container"></div>
                                          </div>
                                       </div>
                                       <div class="media-body">
                                          <div class="right-chart-content">
                                             <h4>{{ $data['projectTasksCompleteCount'] }}</h4>
                                             <span>Total Completed Tasks</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                    <div class="media border-none align-items-center">
                                       <div class="hospital-small-chart">
                                          <div class="small-bar">
                                             <div class="small-chart3 flot-chart-container"></div>
                                          </div>
                                       </div>
                                       <div class="media-body">
                                          <div class="right-chart-content">
                                             <h4>$ {{ $data['projectsCostCount'] }}</h4>
                                             <span>Total Project Creation Cost</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                    <div class="media border-none align-items-center">
                                       <div class="hospital-small-chart">
                                          <div class="small-bar">
                                             <div class="small-chart3 flot-chart-container"></div>
                                          </div>
                                       </div>
                                       <div class="media-body">
                                          <div class="right-chart-content">
                                             <h4>$ {{ $data['currentMonthTarget'] }}</h4>
                                             <span>Current Month Target</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                    <div class="media border-none align-items-center">
                                       <div class="hospital-small-chart">
                                          <div class="small-bar">
                                             <div class="small-chart3 flot-chart-container"></div>
                                          </div>
                                       </div>
                                       <div class="media-body">
                                          <div class="right-chart-content">
                                             <h4>$ {{ $data['currentMonthAchievedTarget'] }}</h4>
                                             <span>Achieved Current Month Target</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                          </div>
                      @elseif(Auth::user()->getRoles()->first() == "production manager")
                          <div class="col-xl-12 xl-100 chart_data_left box-col-12">
                              <div class="card">
                                  <div class="card-body p-0">
                                      <div class="row m-0 chart-main">
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['projectsCount'] }}</h4>
                                                          <span>Total Projects </span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart1 flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['projectTasksCount'] }}</h4>
                                                          <span>Total Tasks Created</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart2 flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['projectTasksCompleteCount'] }}</h4>
                                                          <span>Total Completed Tasks</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media border-none align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart3 flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['projectsCompleteCount'] }}</h4>
                                                          <span>Total Complete Projects Count</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      @elseif(Auth::user()->getRoles()->first() == "team lead")
                          <div class="col-xl-12 xl-100 chart_data_left box-col-12">
                              <div class="card">
                                  <div class="card-body p-0">
                                      <div class="row m-0 chart-main">
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['projectsCount'] }}</h4>
                                                          <span>Total Projects </span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart1 flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['projectTasksCount'] }}</h4>
                                                          <span>Total Tasks Created</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart2 flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['projectTasksCompleteCount'] }}</h4>
                                                          <span>Total Completed Tasks</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
{{--                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">--}}
{{--                                              <div class="media border-none align-items-center">--}}
{{--                                                  <div class="hospital-small-chart">--}}
{{--                                                      <div class="small-bar">--}}
{{--                                                          <div class="small-chart3 flot-chart-container"></div>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                                  <div class="media-body">--}}
{{--                                                      <div class="right-chart-content">--}}
{{--                                                          <h4>{{ $data['projectsCompleteCount'] }}</h4>--}}
{{--                                                          <span>Total Complete Projects Count</span>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                              </div>--}}
{{--                                          </div>--}}
                                      </div>
                                  </div>
                              </div>
                          </div>
                      @elseif(Auth::user()->getRoles()->first() == "developer")
                          <div class="col-xl-12 xl-100 chart_data_left box-col-12">
                              <div class="card">
                                  <div class="card-body p-0">
                                      <div class="row m-0 chart-main">
{{--                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">--}}
{{--                                              <div class="media align-items-center">--}}
{{--                                                  <div class="hospital-small-chart">--}}
{{--                                                      <div class="small-bar">--}}
{{--                                                          <div class="small-chart flot-chart-container"></div>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                                  <div class="media-body">--}}
{{--                                                      <div class="right-chart-content">--}}
{{--                                                          <h4>{{ $data['projectsCount'] }}</h4>--}}
{{--                                                          <span>Total Created Projects </span>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                              </div>--}}
{{--                                          </div>--}}
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart1 flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['projectTasksCount'] }}</h4>
                                                          <span>Total Tasks Count</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart2 flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['projectTasksCompleteCount'] }}</h4>
                                                          <span>Total Completed Tasks</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
{{--                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">--}}
{{--                                              <div class="media border-none align-items-center">--}}
{{--                                                  <div class="hospital-small-chart">--}}
{{--                                                      <div class="small-bar">--}}
{{--                                                          <div class="small-chart3 flot-chart-container"></div>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                                  <div class="media-body">--}}
{{--                                                      <div class="right-chart-content">--}}
{{--                                                          <h4>$ {{ $data['projectsCostCount'] }}</h4>--}}
{{--                                                          <span>Total Project Creation Cost</span>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                              </div>--}}
{{--                                          </div>--}}
                                      </div>
                                  </div>
                              </div>
                          </div>
                      @elseif(Auth::user()->getRoles()->first() == "client")
                          <div class="col-xl-12 xl-100 chart_data_left box-col-12">
                              <div class="card">
                                  <div class="card-body p-0">
                                      <div class="row m-0 chart-main">
{{--                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">--}}
{{--                                              <div class="media align-items-center">--}}
{{--                                                  <div class="hospital-small-chart">--}}
{{--                                                      <div class="small-bar">--}}
{{--                                                          <div class="small-chart flot-chart-container"></div>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                                  <div class="media-body">--}}
{{--                                                      <div class="right-chart-content">--}}
{{--                                                          <h4>{{ $data['projectsCount'] }}</h4>--}}
{{--                                                          <span>Total Created Projects </span>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                              </div>--}}
{{--                                          </div>--}}
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart1 flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['projectsCount'] }}</h4>
                                                          <span>Total Projects Count</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart2 flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['projectCompleteCount'] }}</h4>
                                                          <span>Total Completed Projects Count</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
{{--                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">--}}
{{--                                              <div class="media border-none align-items-center">--}}
{{--                                                  <div class="hospital-small-chart">--}}
{{--                                                      <div class="small-bar">--}}
{{--                                                          <div class="small-chart3 flot-chart-container"></div>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                                  <div class="media-body">--}}
{{--                                                      <div class="right-chart-content">--}}
{{--                                                          <h4>$ {{ $data['projectsCostCount'] }}</h4>--}}
{{--                                                          <span>Total Project Creation Cost</span>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                              </div>--}}
{{--                                          </div>--}}
                                      </div>
                                  </div>
                              </div>
                          </div>
                      @elseif(Auth::user()->getRoles()->first() == "admin")
                          <div class="col-xl-12 xl-100 chart_data_left box-col-12">
                              <div class="card">
                                  <div class="card-body p-0">
                                      <div class="row m-0 chart-main">
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['projectsCount'] }}</h4>
                                                          <span>Total Created Projects </span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart1 flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['projectTasksCount'] }}</h4>
                                                          <span>Total Tasks Created</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart2 flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['projectTasksCompleteCount'] }}</h4>
                                                          <span>Total Completed Tasks</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media border-none align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart3 flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>$ {{ $data['projectsCostCount'] }}</h4>
                                                          <span>Total Project Creation Cost</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="col-xl-12 xl-100 chart_data_left box-col-12">
                              <div class="card">
                                  <div class="card-body p-0">
                                      <div class="row m-0 chart-main">
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['totalEmployeeCount'] }}</h4>
                                                          <span>Total Employees Count </span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart1 flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['totalClientCount'] }}</h4>
                                                          <span>Total Clients Count</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart2 flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['totalBrandCount'] }}</h4>
                                                          <span>Total Brands Count</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media border-none align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart3 flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['totalBrandTargetsCount'] }}</h4>
                                                          <span>Total Brand Targets Count</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      @elseif(Auth::user()->getRoles()->first() == "hod sales and support")
                          <div class="col-xl-12 xl-100 chart_data_left box-col-12">
                              <div class="card">
                                  <div class="card-body p-0">
                                      <div class="row m-0 chart-main">
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['projectsCount'] }}</h4>
                                                          <span>Total Created Projects </span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart1 flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['projectTasksCount'] }}</h4>
                                                          <span>Total Tasks Created</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart2 flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['projectTasksCompleteCount'] }}</h4>
                                                          <span>Total Completed Tasks</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media border-none align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart3 flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>$ {{ $data['projectsCostCount'] }}</h4>
                                                          <span>Total Project Creation Cost</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="col-xl-12 xl-100 chart_data_left box-col-12">
                              <div class="card">
                                  <div class="card-body p-0">
                                      <div class="row m-0 chart-main">
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['totalBrandCount'] }}</h4>
                                                          <span>Total Brand Count </span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart1 flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['totalBrandTargetsCount'] }}</h4>
                                                          <span>Total Brand Targets Count</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart2 flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>{{ $data['projectTasksCompleteCount'] }}</h4>
                                                          <span>Total Completed Tasks</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                              <div class="media border-none align-items-center">
                                                  <div class="hospital-small-chart">
                                                      <div class="small-bar">
                                                          <div class="small-chart3 flot-chart-container"></div>
                                                      </div>
                                                  </div>
                                                  <div class="media-body">
                                                      <div class="right-chart-content">
                                                          <h4>$ {{ $data['projectsCostCount'] }}</h4>
                                                          <span>Total Project Creation Cost</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      @else
{{--                          <div class="col-xl-12 xl-100 chart_data_left box-col-12">--}}
{{--                              <div class="card">--}}
{{--                                  <div class="card-body p-0">--}}
{{--                                      <div class="row m-0 chart-main">--}}
{{--                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">--}}
{{--                                              <div class="media align-items-center">--}}
{{--                                                  <div class="hospital-small-chart">--}}
{{--                                                      <div class="small-bar">--}}
{{--                                                          <div class="small-chart flot-chart-container"></div>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                                  <div class="media-body">--}}
{{--                                                      <div class="right-chart-content">--}}
{{--                                                          <h4>100</h4>--}}
{{--                                                          <span>purchase </span>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                              </div>--}}
{{--                                          </div>--}}
{{--                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">--}}
{{--                                              <div class="media align-items-center">--}}
{{--                                                  <div class="hospital-small-chart">--}}
{{--                                                      <div class="small-bar">--}}
{{--                                                          <div class="small-chart1 flot-chart-container"></div>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                                  <div class="media-body">--}}
{{--                                                      <div class="right-chart-content">--}}
{{--                                                          <h4>100</h4>--}}
{{--                                                          <span>Sales</span>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                              </div>--}}
{{--                                          </div>--}}
{{--                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">--}}
{{--                                              <div class="media align-items-center">--}}
{{--                                                  <div class="hospital-small-chart">--}}
{{--                                                      <div class="small-bar">--}}
{{--                                                          <div class="small-chart2 flot-chart-container"></div>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                                  <div class="media-body">--}}
{{--                                                      <div class="right-chart-content">--}}
{{--                                                          <h4>100</h4>--}}
{{--                                                          <span>Sales return</span>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                              </div>--}}
{{--                                          </div>--}}
{{--                                          <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">--}}
{{--                                              <div class="media border-none align-items-center">--}}
{{--                                                  <div class="hospital-small-chart">--}}
{{--                                                      <div class="small-bar">--}}
{{--                                                          <div class="small-chart3 flot-chart-container"></div>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                                  <div class="media-body">--}}
{{--                                                      <div class="right-chart-content">--}}
{{--                                                          <h4>100</h4>--}}
{{--                                                          <span>Purchase ret</span>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                              </div>--}}
{{--                                          </div>--}}
{{--                                      </div>--}}
{{--                                  </div>--}}
{{--                              </div>--}}
{{--                          </div>--}}
                      @endif


                      @if(Auth::user()->getRoles()->first() == "admin")
                          {{--
                          <div class="col-xl-4 xl-50 news box-col-6">
                              <div class="card">
                                  <div class="card-header">
                                      <div class="header-top">
                                          <h5 class="m-0">News & Update</h5>
                                          <div class="card-header-right-icon">
                                              <select class="button btn btn-primary">
                                                  <option>Today</option>
                                                  <option>Tomorrow</option>
                                                  <option>Yesterday</option>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card-body p-0">
                                      <div class="news-update">
                                          <h6>36% off For pixel lights Couslations Types.</h6>
                                          <span>Lorem Ipsum is simply dummy...</span>
                                      </div>
                                      <div class="news-update">
                                          <h6>We are produce new product this</h6>
                                          <span> Lorem Ipsum is simply text of the printing... </span>
                                      </div>
                                      <div class="news-update">
                                          <h6>50% off For COVID Couslations Types.</h6>
                                          <span>Lorem Ipsum is simply dummy...</span>
                                      </div>
                                  </div>
                                  <div class="card-footer">
                                      <div class="bottom-btn"><a href="#">More...</a></div>
                                  </div>
                              </div>
                          </div>
                          --}}
                      @endif

                      {{--   Developer today , upcoming and due tasks lists--}}
                      @if(Auth::user()->getRoles()->first() == "developer")
                          <div class="col-xl-4 xl-50 appointment-sec box-col-6">
                              <div class="row">
                                  <div class="col-xl-12 appointment">
                                      <div class="card">
                                          <div class="card-header card-no-border">
                                              <div class="header-top">
                                                  <h5 class="m-0">Today Tasks</h5>
                                              </div>
                                          </div>
                                          <div class="card-body pt-0">
                                              <div class="appointment-table table-responsive">
                                                  <table class="table table-bordernone">
                                                      <tbody>
                                                      @php
                                                          $today = date('Y-m-d');
                                                      @endphp

                                                      @if(isset($data['project_tasks']))
                                                          @foreach($data['project_tasks'] as $task)
                                                              @if(date('Y-m-d' , strtotime($task->taskInfo->due_date)) == $today)
                                                                  <tr>
                                                                      <td class="img-content-box"><span
                                                                              class="d-block">{{$task->taskInfo->title}}</span><span
                                                                              class="font-roboto"><a
                                                                                  href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">{{$task->task_number}}</a></span>
                                                                      </td>
                                                                      <td>
                                                                          <p class="m-0 font-primary">{{date('m/d/Y' , strtotime($task->taskInfo->due_date))}}</p>
                                                                      </td>
                                                                      <td class="text-end">
                                                                          <a href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">
                                                                              <div class="button btn btn-primary">{{$task->taskInfo->status}}</div>
                                                                          </a>
                                                                      </td>
                                                                  </tr>
                                                              @endif
                                                          @endforeach
                                                      @else
                                                          <h6>No Task Today</h6>
                                                      @endif
                                                      @if(isset($data['project_tasks_main']))
                                                          @foreach($data['project_tasks_main'] as $task)
                                                              @if(date('Y-m-d' , strtotime($task->due_date)) == $today)
                                                                  <tr>
                                                                      <td class="img-content-box"><span
                                                                              class="d-block">{{$task->title}}</span><span
                                                                              class="font-roboto"><a
                                                                                  href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">{{$task->task_number}}</a></span>
                                                                      </td>
                                                                      <td>
                                                                          <p class="m-0 font-primary">{{date('m/d/Y' , strtotime($task->due_date))}}</p>
                                                                      </td>
                                                                      <td class="text-end">
                                                                          <a href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">
                                                                              <div class="button btn btn-primary">{{$task->status}}</div>
                                                                          </a>
                                                                      </td>
                                                                  </tr>
                                                              @endif
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

                          <div class="col-xl-4 xl-50 appointment-sec box-col-6">
                              <div class="row">
                                  <div class="col-xl-12 appointment">
                                      <div class="card">
                                          <div class="card-header card-no-border">
                                              <div class="header-top">
                                                  <h5 class="m-0">Upcoming Tasks</h5>
                                              </div>
                                          </div>
                                          <div class="card-body pt-0">
                                              <div class="appointment-table table-responsive">
                                                  <table class="table table-bordernone">
                                                      <tbody>
                                                      @php
                                                          $today = date('Y-m-d');
                                                      @endphp

                                                      @if(isset($data['project_tasks']))
                                                          @foreach($data['project_tasks'] as $task)

                                                              @if(date('Y-m-d' , strtotime($task->taskInfo->due_date)) > $today)
                                                                  <tr>
                                                                      <td class="img-content-box"><span
                                                                              class="d-block">{{$task->taskInfo->title}}</span><span
                                                                              class="font-roboto"><a
                                                                                  href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">{{$task->task_number}}</a></span>
                                                                      </td>
                                                                      <td>
                                                                          <p class="m-0 font-primary">{{date('m/d/Y' , strtotime($task->taskInfo->due_date))}}</p>
                                                                      </td>
                                                                      <td class="text-end">
                                                                          <a href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">
                                                                              <div class="button btn btn-primary">{{$task->taskInfo->status}}</div>
                                                                          </a>
                                                                      </td>
                                                                  </tr>
                                                              @endif
                                                          @endforeach
                                                      @else
                                                          <h6>No Upcoming Tasks</h6>
                                                      @endif
                                                      @if(isset($data['project_tasks_main']))
                                                          @foreach($data['project_tasks_main'] as $task)
                                                              @if(date('Y-m-d' , strtotime($task->due_date)) > $today)
                                                                  <tr>
                                                                      <td class="img-content-box"><span
                                                                              class="d-block">{{$task->title}}</span><span
                                                                              class="font-roboto"><a
                                                                                  href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">{{$task->task_number}}</a></span>
                                                                      </td>
                                                                      <td>
                                                                          <p class="m-0 font-primary">{{date('m/d/Y' , strtotime($task->due_date))}}</p>
                                                                      </td>
                                                                      <td class="text-end">
                                                                          <a href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">
                                                                              <div class="button btn btn-primary">{{$task->status}}</div>
                                                                          </a>
                                                                      </td>
                                                                  </tr>
                                                              @endif
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

                          <div class="col-xl-4 xl-50 appointment-sec box-col-6">
                              <div class="row">
                                  <div class="col-xl-12 appointment">
                                      <div class="card">
                                          <div class="card-header card-no-border">
                                              <div class="header-top">
                                                  <h5 class="m-0">Over Due Tasks</h5>
                                              </div>
                                          </div>
                                          <div class="card-body pt-0">
                                              <div class="appointment-table table-responsive">
                                                  <table class="table table-bordernone">
                                                      <tbody>
                                                      @php
                                                          $today = date('Y-m-d');
                                                      @endphp

                                                      @if(isset($data['project_tasks']))
                                                          @foreach($data['project_tasks'] as $task)
                                                              @if(date('Y-m-d' , strtotime($task->taskInfo->due_date)) < $today)
                                                                  @if($task->taskInfo->status == 'Completed')
                                                                    @continue
                                                                  @endif
                                                                  <tr>
                                                                      <td class="img-content-box"><span
                                                                              class="d-block">{{$task->taskInfo->title}}</span><span
                                                                              class="font-roboto"><a
                                                                                  href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">{{$task->task_number}}</a></span>
                                                                      </td>
                                                                      <td>
                                                                          <p class="m-0 font-primary">{{date('m/d/Y' , strtotime($task->taskInfo->due_date))}}</p>
                                                                      </td>
                                                                      <td class="text-end">
                                                                          <a href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">
                                                                              <div class="button btn btn-primary">{{$task->taskInfo->status}}</div>
                                                                          </a>
                                                                      </td>
                                                                  </tr>
                                                              @endif
                                                          @endforeach
                                                      @else
                                                          <h6>No Over Due Tasks</h6>
                                                      @endif
                                                      @if(isset($data['project_tasks_main']))
                                                          @foreach($data['project_tasks_main'] as $task)
                                                              @if(date('Y-m-d' , strtotime($task->due_date)) < $today)
                                                                  <tr>
                                                                      <td class="img-content-box"><span
                                                                              class="d-block">{{$task->title}}</span><span
                                                                              class="font-roboto"><a
                                                                                  href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">{{$task->task_number}}</a></span>
                                                                      </td>
                                                                      <td>
                                                                          <p class="m-0 font-primary">{{date('m/d/Y' , strtotime($task->due_date))}}</p>
                                                                      </td>
                                                                      <td class="text-end">
                                                                          <a href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">
                                                                              <div class="button btn btn-primary">{{$task->status}}</div>
                                                                          </a>
                                                                      </td>
                                                                  </tr>
                                                              @endif
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
                      @endif

                      {{--   Production Manager today , upcoming and due tasks lists--}}
                      @if(Auth::user()->getRoles()->first() == "production manager")
                          <div class="col-xl-4 xl-50 appointment-sec box-col-6">
                              <div class="row">
                                  <div class="col-xl-12 appointment">
                                      <div class="card">
                                          <div class="card-header card-no-border">
                                              <div class="header-top">
                                                  <h5 class="m-0">Today Tasks</h5>
                                              </div>
                                          </div>
                                          <div class="card-body pt-0">
                                              <div class="appointment-table table-responsive">
                                                  <table class="table table-bordernone">
                                                      <tbody>
                                                      @php
                                                          $today = date('Y-m-d');
                                                      @endphp

                                                      @if(isset($data['project_tasks']))
                                                          @foreach($data['project_tasks'] as $project)
                                                              @foreach($project->projectTasks as $task)
                                                                @if(date('Y-m-d' , strtotime($task->due_date)) == $today)
                                                                  <tr>
                                                                      <td class="img-content-box"><span
                                                                              class="d-block">{{$task->title}}</span><span
                                                                              class="font-roboto"><a
                                                                                  href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">{{$task->task_number}}</a></span>
                                                                      </td>
                                                                      <td>
                                                                          <p class="m-0 font-primary">{{date('m/d/Y' , strtotime($task->due_date))}}</p>
                                                                      </td>
                                                                      <td class="text-end">
                                                                          <a href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">
                                                                              <div class="button btn btn-primary">{{$task->status}}</div>
                                                                          </a>
                                                                      </td>
                                                                  </tr>
                                                              @endif
                                                              @endforeach
                                                          @endforeach
                                                      @else
                                                          <h6>No Task Today</h6>
                                                      @endif
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="col-xl-4 xl-50 appointment-sec box-col-6">
                              <div class="row">
                                  <div class="col-xl-12 appointment">
                                      <div class="card">
                                          <div class="card-header card-no-border">
                                              <div class="header-top">
                                                  <h5 class="m-0">Upcoming Tasks</h5>
                                              </div>
                                          </div>
                                          <div class="card-body pt-0">
                                              <div class="appointment-table table-responsive">
                                                  <table class="table table-bordernone">
                                                      <tbody>
                                                      @php
                                                          $today = date('Y-m-d');
                                                      @endphp

                                                      @if(isset($data['project_tasks']))
                                                          @foreach($data['project_tasks'] as $project)
                                                              @foreach($project->projectTasks as $task)
                                                                @if(date('Y-m-d' , strtotime($task->due_date)) > $today)
                                                                  <tr>
                                                                      <td class="img-content-box"><span
                                                                              class="d-block">{{$task->title}}</span><span
                                                                              class="font-roboto"><a
                                                                                  href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">{{$task->task_number}}</a></span>
                                                                      </td>
                                                                      <td>
                                                                          <p class="m-0 font-primary">{{date('m/d/Y' , strtotime($task->due_date))}}</p>
                                                                      </td>
                                                                      <td class="text-end">
                                                                          <a href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">
                                                                              <div class="button btn btn-primary">{{$task->status}}</div>
                                                                          </a>
                                                                      </td>
                                                                  </tr>
                                                              @endif
                                                              @endforeach
                                                          @endforeach
                                                      @else
                                                          <h6>No Upcoming Tasks</h6>
                                                      @endif
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="col-xl-4 xl-50 appointment-sec box-col-6">
                              <div class="row">
                                  <div class="col-xl-12 appointment">
                                      <div class="card">
                                          <div class="card-header card-no-border">
                                              <div class="header-top">
                                                  <h5 class="m-0">Over Due Tasks</h5>
                                              </div>
                                          </div>
                                          <div class="card-body pt-0">
                                              <div class="appointment-table table-responsive">
                                                  <table class="table table-bordernone">
                                                      <tbody>
                                                      @php
                                                          $today = date('Y-m-d');
                                                      @endphp

                                                      @if(isset($data['project_tasks']))
                                                          @foreach($data['project_tasks'] as $project)
                                                              @foreach($project->projectTasks as $task)
                                                                @if(date('Y-m-d' , strtotime($task->due_date)) < $today)

                                                                    @if($task->status == 'Completed')
                                                                        @continue
                                                                    @endif
                                                                  <tr>
                                                                      <td class="img-content-box"><span
                                                                              class="d-block">{{$task->title}}</span><span
                                                                              class="font-roboto"><a
                                                                                  href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">{{$task->task_number}}</a></span>
                                                                      </td>
                                                                      <td>
                                                                          <p class="m-0 font-primary">{{date('m/d/Y' , strtotime($task->due_date))}}</p>
                                                                      </td>
                                                                      <td class="text-end">
                                                                          <a href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">
                                                                              <div class="button btn btn-primary">{{$task->status}}</div>
                                                                          </a>
                                                                      </td>
                                                                  </tr>
                                                              @endif
                                                              @endforeach
                                                          @endforeach
                                                      @else
                                                          <h6>No Over Due Tasks</h6>
                                                      @endif
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      @endif

                      {{--   Team Lead today , upcoming and due tasks lists--}}
                      @if(Auth::user()->getRoles()->first() == "team lead")
                          <div class="col-xl-4 xl-50 appointment-sec box-col-6">
                              <div class="row">
                                  <div class="col-xl-12 appointment">
                                      <div class="card">
                                          <div class="card-header card-no-border">
                                              <div class="header-top">
                                                  <h5 class="m-0">Today Tasks</h5>
                                              </div>
                                          </div>
                                          <div class="card-body pt-0">
                                              <div class="appointment-table table-responsive">
                                                  <table class="table table-bordernone">
                                                      <tbody>
                                                      @php
                                                          $today = date('Y-m-d');
                                                      @endphp

                                                      @if(isset($data['project_tasks']))
                                                          @foreach($data['project_tasks'] as $task)
                                                                @if(date('Y-m-d' , strtotime($task->due_date)) == $today)
                                                                  <tr>
                                                                      <td class="img-content-box"><span
                                                                              class="d-block">{{$task->title}}</span><span
                                                                              class="font-roboto"><a
                                                                                  href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">{{$task->task_number}}</a></span>
                                                                      </td>
                                                                      <td>
                                                                          <p class="m-0 font-primary">{{date('m/d/Y' , strtotime($task->due_date))}}</p>
                                                                      </td>
                                                                      <td class="text-end">
                                                                          <a href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">
                                                                              <div class="button btn btn-primary">{{$task->status}}</div>
                                                                          </a>
                                                                      </td>
                                                                  </tr>
                                                              @endif
                                                          @endforeach
                                                      @else
                                                          <h6>No Task Today</h6>
                                                      @endif
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="col-xl-4 xl-50 appointment-sec box-col-6">
                              <div class="row">
                                  <div class="col-xl-12 appointment">
                                      <div class="card">
                                          <div class="card-header card-no-border">
                                              <div class="header-top">
                                                  <h5 class="m-0">Upcoming Tasks</h5>
                                              </div>
                                          </div>
                                          <div class="card-body pt-0">
                                              <div class="appointment-table table-responsive">
                                                  <table class="table table-bordernone">
                                                      <tbody>
                                                      @php
                                                          $today = date('Y-m-d');
                                                      @endphp

                                                      @if(isset($data['project_tasks']))
                                                          @foreach($data['project_tasks'] as $task)
                                                                @if(date('Y-m-d' , strtotime($task->due_date)) > $today)
                                                                  <tr>
                                                                      <td class="img-content-box"><span
                                                                              class="d-block">{{$task->title}}</span><span
                                                                              class="font-roboto"><a
                                                                                  href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">{{$task->task_number}}</a></span>
                                                                      </td>
                                                                      <td>
                                                                          <p class="m-0 font-primary">{{date('m/d/Y' , strtotime($task->due_date))}}</p>
                                                                      </td>
                                                                      <td class="text-end">
                                                                          <a href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">
                                                                              <div class="button btn btn-primary">{{$task->status}}</div>
                                                                          </a>
                                                                      </td>
                                                                  </tr>
                                                              @endif
                                                          @endforeach
                                                      @else
                                                          <h6>No Upcoming Tasks</h6>
                                                      @endif
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="col-xl-4 xl-50 appointment-sec box-col-6">
                              <div class="row">
                                  <div class="col-xl-12 appointment">
                                      <div class="card">
                                          <div class="card-header card-no-border">
                                              <div class="header-top">
                                                  <h5 class="m-0">Over Due Tasks</h5>
                                              </div>
                                          </div>
                                          <div class="card-body pt-0">
                                              <div class="appointment-table table-responsive">
                                                  <table class="table table-bordernone">
                                                      <tbody>
                                                      @php
                                                          $today = date('Y-m-d');
                                                      @endphp

                                                      @if(isset($data['project_tasks']))
                                                          @foreach($data['project_tasks'] as $task)
                                                                @if(date('Y-m-d' , strtotime($task->due_date)) < $today)

                                                                    @if($task->status == 'Completed')
                                                                        @continue
                                                                    @endif
                                                                  <tr>
                                                                      <td class="img-content-box"><span
                                                                              class="d-block">{{$task->title}}</span><span
                                                                              class="font-roboto"><a
                                                                                  href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">{{$task->task_number}}</a></span>
                                                                      </td>
                                                                      <td>
                                                                          <p class="m-0 font-primary">{{date('m/d/Y' , strtotime($task->due_date))}}</p>
                                                                      </td>
                                                                      <td class="text-end">
                                                                          <a href="{{route('projecttask',$task->project_id)}}#{{$task->task_number}}">
                                                                              <div class="button btn btn-primary">{{$task->status}}</div>
                                                                          </a>
                                                                      </td>
                                                                  </tr>
                                                              @endif
                                                          @endforeach
                                                      @else
                                                          <h6>No Over Due Tasks</h6>
                                                      @endif
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      @endif


                      {{--   Client's Projects list--}}
                      @if(Auth::user()->getRoles()->first() == "client")

                          <div class="col-xl-12 xl-50 appointment-sec box-col-6">
                              <div class="row">
                                  <div class="col-xl-12 appointment">
                                      <div class="card">
                                          <div class="card-header card-no-border">
                                              <div class="header-top">
                                                  <h5 class="m-0">My Projects</h5>
                                              </div>
                                          </div>
                                          <div class="card-body pt-0">
                                              <div class="appointment-table table-responsive">
                                                  <table class="table table-bordered">
                                                      <thead>
                                                      <tr>
                                                          <th>Title</th>
                                                          <th class="text-center">Date</th>
                                                          <th class="text-center">Status</th>
                                                      </tr>
                                                      </thead>
                                                      <tbody>
                                                      @if(isset($data['myProjects']))
                                                          @foreach($data['myProjects'] as $project)
                                                                  <tr>
                                                                      <td class="img-content-box">
                                                                          <span class="font-roboto"><a href="{{route('viewbrandproject.id',$project->brand->slug)}}#{{$project->project_number}}">{{$project->name}} | {{$project->project_number}}</a></span>
                                                                      </td>
                                                                      <td>
                                                                          <p class="mt-1 mb-1 font-primary text-center">{{date('m/d/Y' , strtotime($project->created_at))}}</p>
                                                                      </td>
                                                                      <td class="text-end text-center">
                                                                          <a href="{{route('viewbrandproject.id',$project->brand->slug)}}#{{$project->project_number}}">
                                                                              <div class="button btn btn-primary mt-1 mb-1">{{$project->status}}</div>
                                                                          </a>
                                                                      </td>
                                                                  </tr>
                                                          @endforeach
                                                      @else
                                                          <h6>No Projects</h6>
                                                      @endif
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                      @endif

                      @if(Auth::user()->getRoles()->first() == "admin")
                          {{--
                          <div class="col-xl-4 xl-50 appointment-sec box-col-6">
                              <div class="row">
                                  <div class="col-xl-12 appointment">
                                      <div class="card">
                                          <div class="card-header card-no-border">
                                              <div class="header-top">
                                                  <h5 class="m-0">appointment</h5>
                                                  <div class="card-header-right-icon">
                                                      <select class="button btn btn-primary">
                                                          <option>Today</option>
                                                          <option>Tomorrow</option>
                                                          <option>Yesterday</option>
                                                      </select>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="card-body pt-0">
                                              <div class="appointment-table table-responsive">
                                                  <table class="table table-bordernone">
                                                      <tbody>
                                                      <tr>
                                                          <td>
                                                              <img class="img-fluid img-40 rounded-circle mb-3" src="{{asset('images/appointment/app-ent.jpg')}}" alt="Image description">
                                                              <div class="status-circle bg-primary"></div>
                                                          </td>
                                                          <td class="img-content-box"><span class="d-block">Venter Loren</span><span class="font-roboto">Now</span></td>
                                                          <td>
                                                              <p class="m-0 font-primary">28 Sept</p>
                                                          </td>
                                                          <td class="text-end">
                                                              <div class="button btn btn-primary">Done<i class="fa fa-check-circle ms-2"></i></div>
                                                          </td>
                                                      </tr>
                                                      <tr>
                                                          <td>
                                                              <img class="img-fluid img-40 rounded-circle" src="{{asset('images/appointment/app-ent.jpg')}}" alt="Image description">
                                                              <div class="status-circle bg-primary"></div>
                                                          </td>
                                                          <td class="img-content-box"><span class="d-block">John Loren</span><span class="font-roboto">11:00</span></td>
                                                          <td>
                                                              <p class="m-0 font-primary">22 Sept</p>
                                                          </td>
                                                          <td class="text-end">
                                                              <div class="button btn btn-danger">Pending<i class="fa fa-check-circle ms-2"></i></div>
                                                          </td>
                                                      </tr>
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-xl-12 alert-sec">
                                      <div class="card bg-img">
                                          <div class="card-header">
                                              <div class="header-top">
                                                  <h5 class="m-0">Alert  </h5>
                                                  <div class="dot-right-icon"><i class="fa fa-ellipsis-h"></i></div>
                                              </div>
                                          </div>
                                          <div class="card-body">
                                              <div class="body-bottom">
                                                  <h6>  10% off For drama lights Couslations...</h6>
                                                  <span class="font-roboto">Lorem Ipsum is simply dummy...It is a long established fact that a reader will be distracted by  </span>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          --}}
                      @endif

                      @if(Auth::user()->getRoles()->first() == "admin")
                       {{--
                         <div class="col-xl-4 xl-50 notification box-col-6">
                            <div class="card">
                               <div class="card-header card-no-border">
                                  <div class="header-top">
                                     <h5 class="m-0">notification</h5>
                                     <div class="card-header-right-icon">
                                        <select class="button btn btn-primary">
                                           <option>Today</option>
                                           <option>Tomorrow</option>
                                           <option>Yesterday</option>
                                        </select>
                                     </div>
                                  </div>
                               </div>
                               <div class="card-body pt-0">
                                  <div class="media">
                                     <div class="media-body">
                                        <p>20-04-2020 <span>10:10</span></p>
                                        <h6>Updated Product<span class="dot-notification"></span></h6>
                                        <span>Quisque a consequat ante sit amet magna...</span>
                                     </div>
                                  </div>
                                  <div class="media">
                                     <div class="media-body">
                                        <p>20-04-2020<span class="ps-1">Today</span><span class="badge badge-secondary">New</span></p>
                                        <h6>Tello just like your product<span class="dot-notification"></span></h6>
                                        <span>Quisque a consequat ante sit amet magna... </span>
                                     </div>
                                  </div>
                                  <div class="media">
                                     <div class="media-body">
                                        <div class="d-flex mb-3">
                                           <div class="inner-img"><img class="img-fluid" src="{{asset('images/notification/1.jpg')}}" alt="Product-1"></div>
                                           <div class="inner-img"><img class="img-fluid" src="{{asset('images/notification/2.jpg')}}" alt="Product-2"></div>
                                        </div>
                                        <span class="mt-3">Quisque a consequat ante sit amet magna...</span>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="col-xl-4 xl-50 appointment box-col-6">
                            <div class="card">
                               <div class="card-header">
                                  <div class="header-top">
                                     <h5 class="m-0">Market Value</h5>
                                     <div class="card-header-right-icon">
                                        <select class="button btn btn-primary">
                                           <option>Year</option>
                                           <option>Month</option>
                                           <option>Day</option>
                                        </select>
                                     </div>
                                  </div>
                               </div>
                               <div class="card-Body">
                                  <div class="radar-chart">
                                     <div id="marketchart">       </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="col-xl-4 xl-100 chat-sec box-col-6">
                            <div class="card chat-default">
                               <div class="card-header card-no-border">
                                  <div class="media media-dashboard">
                                     <div class="media-body">
                                        <h5 class="mb-0">Live Chat</h5>
                                     </div>
                                     <div class="icon-box"><i class="fa fa-ellipsis-h"></i></div>
                                  </div>
                               </div>
                               <div class="card-body chat-box">
                                  <div class="chat">
                                     <div class="media left-side-chat">
                                        <div class="media-body d-flex">
                                           <div class="img-profile"> <img class="img-fluid" src="{{asset('images/user.jpg')}}" alt="Profile"></div>
                                           <div class="main-chat">
                                              <div class="message-main"><span class="mb-0">Hi deo, Please send me link.</span></div>
                                              <div class="sub-message message-main"><span class="mb-0">Right Now</span></div>
                                           </div>
                                        </div>
                                        <p class="f-w-400">7:28 PM</p>
                                     </div>
                                     <div class="media right-side-chat">
                                        <p class="f-w-400">7:28 PM</p>
                                        <div class="media-body text-end">
                                           <div class="message-main pull-right">
                                              <span class="mb-0 text-start">How can do for you</span>
                                              <div class="clearfix"></div>
                                           </div>
                                        </div>
                                     </div>
                                     <div class="media left-side-chat">
                                        <div class="media-body d-flex">
                                           <div class="img-profile"> <img class="img-fluid" src="{{asset('images/user.jpg')}}" alt="Profile"></div>
                                           <div class="main-chat">
                                              <div class="sub-message message-main mt-0"><span>It's argenty</span></div>
                                           </div>
                                        </div>
                                        <p class="f-w-400">7:28 PM</p>
                                     </div>
                                     <div class="media right-side-chat">
                                        <div class="media-body text-end">
                                           <div class="message-main pull-right"><span class="loader-span mb-0 text-start" id="wave"><span class="dot"></span><span class="dot"></span><span class="dot"></span></span></div>
                                        </div>
                                     </div>
                                     <div class="input-group">
                                        <input class="form-control" id="mail" type="text" placeholder="Type Your Message..." name="text">
                                        <div class="send-msg"><i data-feather="send"></i></div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="col-xl-4 col-lg-12 xl-50 calendar-sec box-col-6">
                        <div class="card gradient-primary o-hidden">
                           <div class="card-body">
                              <div class="setting-dot">
                                 <div class="setting-bg-primary date-picker-setting position-set pull-right"><i class="fa fa-spin fa-cog"></i></div>
                              </div>
                              <div class="default-datepicker">
                                 <div class="datepicker-here" data-language="en"></div>
                              </div>
                              <span class="default-dots-stay overview-dots full-width-dots"><span class="dots-group"><span class="dots dots1"></span><span class="dots dots2 dot-small"></span><span class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span class="dots dots7 dot-small-semi"></span><span class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">                </span></span></span>
                           </div>
                        </div>
                     </div>
                     --}}
                      @endif

                  </div>
               </div>
               <script type="text/javascript">
                  var session_layout = '';
               </script>
               <!-- Container-fluid Ends-->
            </div>
@endsection

@section('css')
@endsection

@section('js')
<script src="{{asset('js/dashboard/default.js')}}"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

@if(Auth::user()->getRoles()->first() == "admin")
    <script type="text/javascript">

        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(
                [['Month', 'Current'],
                    <?= $data['allCurrentYearProjectsData'] ?>
                ],
            );
            var options = {
                title: 'Yearly Project Costs',
                hAxis: {title: '', titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0}
            };

            var chart = new google.visualization.SteppedAreaChart(document.getElementById('monthlyporjcost'));
            chart.draw(data, options);
        }
    </script>
@endif
@endsection
