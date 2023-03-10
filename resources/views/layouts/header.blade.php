<div class="page-header">
                <div class="header-wrapper row m-0">

{{--                    For project and task search start --}}

                @include('layouts.projectntasksearchform')

{{--                    For project and task search end--}}


                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="header-logo-wrapper col-auto p-0">
                        <div class="logo-wrapper">
                            <a href="{{url('/')}}"><img class="img-fluid cube-icon logo-style" src="{{asset('images/logo/logo.png')}}" alt="logo "/></a>
                        </div>
                        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
                    </div>
                    <div class="left-header col horizontal-wrapper ps-0">
                    </div>
                    <div class="nav-right col-8 pull-right right-header p-0">
                        <ul class="nav-menus">
                            {{--
                            <li class="language-nav">
                                <div class="translate_wrapper">
                                    <div class="current_lang">
                                        <div class="lang"><i class="flag-icon flag-icon-us"></i><span class="lang-txt">en </span></div>
                                    </div>
                                    <div class="more_lang">
                                        <a href="index.html" class="active">
                                            <div class="lang selected" data-value="en"><i class="flag-icon flag-icon-us"></i> <span class="lang-txt">English</span><span> (US)</span></div>
                                        </a>
                                        <a href="index.html" class=" ">
                                            <div class="lang" data-value="de"><i class="flag-icon flag-icon-de"></i> <span class="lang-txt">Deutsch</span></div>
                                        </a>
                                        <a href="index.html" class="active">
                                            <div class="lang" data-value="es"><i class="flag-icon flag-icon-es"></i> <span class="lang-txt">Español</span></div>
                                        </a>
                                        <a href="index.html" class="">
                                            <div class="lang" data-value="fr"><i class="flag-icon flag-icon-fr"></i> <span class="lang-txt">Français</span></div>
                                        </a>
                                        <a href="index.html" class="">
                                            <div class="lang" data-value="pt"><i class="flag-icon flag-icon-pt"></i> <span class="lang-txt">Português</span><span> (BR)</span></div>
                                        </a>
                                        <a href="index.html" class="">
                                            <div class="lang" data-value="cn"><i class="flag-icon flag-icon-cn"></i> <span class="lang-txt">简体中文</span></div>
                                        </a>
                                        <a href="index.html" class="">
                                            <div class="lang" data-value="en"><i class="flag-icon flag-icon-ae"></i> <span class="lang-txt">لعربية</span> <span> (ae)</span></div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            --}}
                            <li>
                                <span class="header-search"><i data-feather="search"></i></span>
                            </li>
                            @php
                                if(Auth::user()->type == 2){
                                    $notifications = App\Models\notifications::where("receiver", Auth::user()->emp_id)->get();
                                    $notify_id = App\Models\notifications::where("receiver", Auth::user()->emp_id)->where("is_read" , 0)->pluck("id")->toArray();
                                }else{
                                    $notifications = App\Models\notifications::where("receiver", Auth::user()->id)->get();
                                    $notify_id = App\Models\notifications::where("receiver", Auth::user()->id)->where("is_read" , 0)->pluck("id")->toArray();
                                }

                            @endphp
                            <li class="onhover-dropdown" id="my_bellicon">
                                <div class="notification-box" ><i data-feather="bell"> </i><span class="badge rounded-pill badge-secondary" data-serial="{{isset($notify_id) ?implode(',',$notify_id): 0}}" id="header-notification-count">{{isset($notify_id) ? count($notify_id) : 0}}</span></div>


                                <ul class="notification-dropdown onhover-show-div notify-scroll" id="header-notification">

                                    <li class="notification-li">
                                        <i data-feather="bell"></i>
                                        <h6 class="f-18 mb-0">Notitications</h6>
                                    </li>
                                    {{--
                                    <li>
                                        <p><i class="fa fa-circle-o me-3 font-primary"> </i>Delivery processing <span class="pull-right">10 min.</span></p>
                                    </li>
                                    <li>
                                        <p><i class="fa fa-circle-o me-3 font-success"></i>Order Complete<span class="pull-right">1 hr</span></p>
                                    </li>
                                    <li>
                                        <p><i class="fa fa-circle-o me-3 font-info"></i>Tickets Generated<span class="pull-right">3 hr</span></p>
                                    </li>
                                    <li>
                                        <p><i class="fa fa-circle-o me-3 font-danger"></i>Delivery Complete<span class="pull-right">6 hr</span></p>
                                    </li>
                                    --}}

                                    @if($notifications)
                                        @foreach($notifications as $notification)
                                            <li>
                                                <p><i class="fa fa-circle-o me-3 font-primary"> </i>{{$notification->msg}} <span class="pull-right">{{$notification->created_at->diffForHumans()}}</span></p>
                                            </li>
                                        @endforeach
                                    @endif
                                    <li><a class="btn btn-primary" href="#">Check all notification</a></li>
                                </ul>
                            </li>
                            {{--
                            <li class="onhover-dropdown">
                                <div class="notification-box"><i data-feather="star"></i></div>
                                <div class="onhover-show-div bookmark-flip">
                                    <div class="flip-card">
                                        <div class="flip-card-inner">
                                            <div class="front">
                                                <ul class="droplet-dropdown bookmark-dropdown">
                                                    <li class="gradient-primary">
                                                        <i data-feather="star"></i>
                                                        <h6 class="f-18 mb-0">Bookmark</h6>
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-4 text-center"><i data-feather="file-text"></i></div>
                                                            <div class="col-4 text-center"><i data-feather="activity"></i></div>
                                                            <div class="col-4 text-center"><i data-feather="users"></i></div>
                                                            <div class="col-4 text-center"><i data-feather="clipboard"></i></div>
                                                            <div class="col-4 text-center"><i data-feather="anchor"></i></div>
                                                            <div class="col-4 text-center"><i data-feather="settings"></i></div>
                                                        </div>
                                                    </li>
                                                    <li class="text-center">
                                                        <button class="flip-btn" id="flip-btn">Add New Bookmark</button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="back">
                                                <ul>
                                                    <li>
                                                        <div class="droplet-dropdown bookmark-dropdown flip-back-content">
                                                            <input type="text" placeholder="search..." />
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <button class="d-block flip-back" id="flip-back">Back</button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            --}}
                            <li>
                                <div class="mode"><i class="fa fa-moon-o"></i></div>
                            </li>
                            {{--
                            <li class="cart-nav onhover-dropdown">
                                <div class="cart-box"><i data-feather="shopping-cart"></i><span class="badge rounded-pill badge-primary">2</span></div>
                                <ul class="cart-dropdown onhover-show-div">
                                    <li>
                                        <h6 class="mb-0 f-20">Shoping Bag</h6>
                                        <i data-feather="shopping-cart"></i>
                                    </li>
                                    <li class="mt-0">
                                        <div class="media">
                                            <img class="img-fluid rounded-circle me-3 img-60" src="{{asset('images/ecommerce/01.jpg')}}" alt="" />
                                            <div class="media-body">
                                                <span>V-Neck Shawl Collar Woman's Solid T-Shirt</span>
                                                <p>Yellow(#fcb102)</p>
                                                <div class="qty-box">
                                                    <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <button class="btn quantity-left-minus" type="button" data-type="minus" data-field=""><i data-feather="minus"></i></button>
                                                        </span>
                                                        <input class="form-control input-number" type="text" name="quantity" value="1" />
                                                        <span class="input-group-prepend">
                                                            <button class="btn quantity-right-plus" type="button" data-type="plus" data-field=""><i data-feather="plus"></i></button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <h6 class="text-end text-muted">$299.00</h6>
                                            </div>
                                            <div class="close-circle">
                                                <a href="#"><i data-feather="x"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mt-0">
                                        <div class="media">
                                            <img class="img-fluid rounded-circle me-3 img-60" src="{{asset('images/ecommerce/03.jpg')}}" alt="" />
                                            <div class="media-body">
                                                <span>V-Neck Shawl Collar Woman's Solid T-Shirt</span>
                                                <p>Yellow(#fcb102)</p>
                                                <div class="qty-box">
                                                    <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <button class="btn quantity-left-minus" type="button" data-type="minus" data-field=""><i data-feather="minus"></i></button>
                                                        </span>
                                                        <input class="form-control input-number" type="text" name="quantity" value="1" />
                                                        <span class="input-group-prepend">
                                                            <button class="btn quantity-right-plus" type="button" data-type="plus" data-field=""><i data-feather="plus"></i></button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <h6 class="text-end text-muted">$299.00</h6>
                                            </div>
                                            <div class="close-circle">
                                                <a href="#"><i data-feather="x"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="total">
                                            <h6 class="mb-2 mt-0 text-muted">Order Total : <span class="f-right f-20">$598.00</span></h6>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="btn btn-block w-100 mb-2 btn-primary view-cart" href="../ecommerce/cart.html">Go to shoping bag</a>
                                        <a class="btn btn-block w-100 btn-secondary view-cart" href="../ecommerce/checkout.html">Checkout</a>
                                    </li>
                                </ul>
                            </li>


                            <li class="onhover-dropdown">
                                <i data-feather="message-square"></i>
                                <ul class="chat-dropdown onhover-show-div">
                                    <li>
                                        <i data-feather="message-square"></i>
                                        <h6 class="f-18 mb-0">Message Box</h6>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="img-fluid rounded-circle me-3" src="{{asset('images/user/1.jpg')}}" alt="" />
                                            <div class="status-circle online"></div>
                                            <div class="media-body">
                                                <span>Erica Hughes</span>
                                                <p>Lorem Ipsum is simply dummy...</p>
                                            </div>
                                            <p class="f-12 font-success">58 mins ago</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="img-fluid rounded-circle me-3" src="{{asset('images/user/2.jpg')}}" alt="" />
                                            <div class="status-circle online"></div>
                                            <div class="media-body">
                                                <span>Kori Thomas</span>
                                                <p>Lorem Ipsum is simply dummy...</p>
                                            </div>
                                            <p class="f-12 font-success">1 hr ago</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="img-fluid rounded-circle me-3" src="{{asset('images/user/4.jpg')}}" alt="" />
                                            <div class="status-circle offline"></div>
                                            <div class="media-body">
                                                <span>Ain Chavez</span>
                                                <p>Lorem Ipsum is simply dummy...</p>
                                            </div>
                                            <p class="f-12 font-danger">32 mins ago</p>
                                        </div>
                                    </li>
                                    <li class="text-center"><a class="btn btn-primary" href="#">View All </a></li>
                                </ul>
                            </li>
                            --}}
                            <li class="maximize">
                                <a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a>
                            </li>
                            <li class="profile-nav onhover-dropdown p-0 me-0">
                                <div class="media profile-media">
                                    <img class="b-r-10" style="width: 37px " src="{{ asset(auth()->user()->profile_pic ?? asset('uploads/avatar/demo-user-icon.png'))}}" alt="" />
                                    <div class="media-body">
                                        <span>{{Auth::user()->name}}</span>
                                        <p class="mb-0 font-roboto">{{ucwords(Auth::user()->getRoles()->first())}} <i class="middle fa fa-angle-down"></i></p>
                                    </div>
                                </div>
                                <ul class="profile-dropdown onhover-show-div">
                                    <li>
                                        <a href="{{route('user_profile')}}"><i data-feather="user"></i><span>Account </span></a>
                                    </li>
{{--                                    <li>--}}
{{--                                        <a href="#"><i data-feather="mail"></i><span>Inbox</span></a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#"><i data-feather="file-text"></i><span>Taskboard</span></a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#"><i data-feather="settings"></i><span>Settings</span></a>--}}
{{--                                    </li>--}}
                                    <li>
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit(); " ><i data-feather="log-in"> </i><span>Log out</span></a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
