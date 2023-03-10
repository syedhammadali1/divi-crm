<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="{{url('/')}}"><img class="img-fluid for-light" src="{{asset('images/logo/logo.png')}}" alt=""><img
                    class="img-fluid for-dark" src="{{asset('images/logo/logo_dark.png')}}" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="../index.html"><img class="img-fluid"
                                                                    src="{{asset('images/logo/logo-icon.png')}}" alt=""></a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="{{url('/')}}"><img class="img-fluid" src="{{asset('images/logo/logo-icon.png')}}"
                                                    alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                                                              aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-list">
                        {{--                  <label class="badge badge-success">2</label>--}}
                        <a class="sidebar-link sidebar-title active" href="{{url('/')}}">
                            <i data-feather="home"></i><span class="lan-3">DashBoard</span>
                            <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                        </a>
                    </li>
                    @php
                        $menu = [
                                [  'icon' => 'fa fa-cubes' , 'label'  => 'Projects' , 'route' => '' , 'children' => [
                                            [  'icon' => '' , 'label'  => 'All Project List' , 'route' => 'allProjectsView' ],
                                            [  'icon' => '' , 'label'  => 'Project List' , 'route' => 'viewbrandproject' , 'permission' =>  'view-project'  ],
                                            [  'icon' => '' , 'label'  => 'Project Create' , 'route' => 'viewProjectCreate' , 'permission' =>  'add-project'  ],
                                    ], 'permission' => 'view-project' ],

                                    [  'icon' => 'fa fa-group' , 'label'  => 'Users' , 'route' => '' , 'children' => [
                                            [  'icon' => '' , 'label'  => 'Users List' , 'route' => 'tsc-user.index' , 'permission' =>  'view-users'  ],
                                            [  'icon' => '' , 'label'  => 'User Create' , 'route' => 'tsc-user.create' , 'permission' =>  'add-user'  ],
                                    ], 'permission' => 'view-users' ],

                                    [  'icon' => 'icofont icofont-business-man-alt-1' , 'label'  => 'Clients' , 'route' => '' , 'children' => [
                                         [  'icon' => '' , 'label'  => 'Clients List' , 'route' => 'all_clients' , 'permission' =>  'view-clients'  ],
                                         [  'icon' => '' , 'label'  => 'Client Create' , 'route' => 'createclient' , 'permission' =>  'add-client'  ],
                                    ], 'permission' => 'view-clients' ],

                                    [  'icon' => 'icofont icofont-checked' , 'label'  => 'Roles' , 'route' => '' , 'children' => [
                                            [  'icon' => '' , 'label'  => 'Roles List' , 'route' => 'role.index' , 'permission' =>  'view-roles'  ],
                                            [  'icon' => '' , 'label'  => 'Roles Create' , 'route' => 'role.create' , 'permission' =>  'add-role'  ],
                                    ], 'permission' => 'view-roles' ],

                                     [  'icon' => 'icofont icofont-clip-board' , 'label'  => 'My Tasks' , 'route' => 'myTaskslist' , 'children' => [
                                         [  'icon' => '' , 'label'  => 'My Tasks List' , 'route' => 'myTaskslist' , 'permission' =>  'view-my-tasks'  ],
                                    ], 'permission' => 'view-my-tasks' ],

                                    [  'icon' => 'icofont icofont-comment' , 'label'  => 'My Sticky Notes' , 'route' => 'my-sticky-note' , 'children' => [
                                         [  'icon' => '' , 'label'  => 'Sticky Note List' , 'route' => 'my-sticky-note.index' , 'permission' =>  'my-sticky-note'  ],
                                         [  'icon' => '' , 'label'  => 'Sticky Note Create' , 'route' => 'my-sticky-note.create' , 'permission' =>  'my-sticky-note'  ],
                                    ], 'permission' => 'my-sticky-note' ],

                                    [  'icon' => 'icofont icofont-cube' , 'label'  => 'Brands' , 'route' => '' , 'children' => [
                                         [  'icon' => '' , 'label'  => 'Brands List' , 'route' => 'brand.index' , 'permission' =>  'view-brands'  ],
                                         [  'icon' => '' , 'label'  => 'Brand Create' , 'route' => 'brand.create' , 'permission' =>  'add-brand'  ],
                                    ], 'permission' => 'view-brands' ],

                                   [  'icon' => 'icofont icofont-cube' , 'label'  => 'Source Account' , 'route' => '' , 'children' => [
                                         [  'icon' => '' , 'label'  => 'Source Account List' , 'route' => 'source-account.index' , 'permission' =>  'view-brands'  ],
                                         [  'icon' => '' , 'label'  => 'Source Account Create' , 'route' => 'source-account.create' , 'permission' =>  'add-brand'  ],
                                    ], 'permission' => 'view-brands' ],

                                    [  'icon' => 'fa fa-crosshairs' , 'label'  => 'Brand Targets' , 'route' => '' , 'children' => [
                                         [  'icon' => '' , 'label'  => 'Brand Targets List' , 'route' => 'brand-target.index' , 'permission' =>  'view-brand-targets'  ],
                                         [  'icon' => '' , 'label'  => 'Brand Target Create' , 'route' => 'brand-target.create' , 'permission' =>  'add-brand-target'  ],
                                    ], 'permission' => 'view-brand-targets' ],

                                    [  'icon' => 'fa fa-crosshairs' , 'label'  => 'Lead Forms' , 'route' => '' , 'children' => [
                                         [  'icon' => '' , 'label'  => 'Lead Forms List' , 'route' => 'lead-form.index' , 'permission' =>  'view-lead-form'  ],
                                    ], 'permission' => 'view-lead-form' ],


                               ];
                    @endphp

                    {{--   -----------------}}
                    @foreach($menu as $item)
                        @php
                            $route = count($item['children']) > 0 ? 'JavaScript:void(0)' : route($item['route']);
                            $li_class = (Route::current()->getName() == $item['route']) ? 'active' : '';
                            $anchor_class = $li_class == 'active' ? 'active' : '';
                            if($li_class == '' && count($item['children']) > 0)
                            {
                                $children_routes = array_column($item['children'],'route');
                                if(in_array(Route::current()->getName(),$children_routes)){
                                    $li_class = 'active';
                                }
                            }
                            $handler = '';
                            if(isset($item['handler'])){
                                $handler = "onclick=";
                                $handler .= $item['handler'];
                                $route = 'JavaScript:void(0)';
                            }
                        @endphp

                        @if(!isset($item['permission']) || (isset($item['permission']) && Bouncer::can($item['permission'])))
                            @if($item['label'] == "Projects" && Auth::user()->type == 1)

                            @else
                                <li class="sidebar-list {{ $li_class }}">
                                    <a class="{{ count($item['children']) > 0 ? 'collapsible-header' : '' }} sidebar-link sidebar-title {{ $anchor_class }}"
                                       href="{{ $route }}" {{ $handler }} >
                                        <i class="{{ $item['icon'] }}" style="font-size: 18px; padding-right: 5px;"></i><span>{{ $item['label'] }}</span>
                                        <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                                    </a>

                                    @if(count($item['children']) > 0)

                                        <ul class="sidebar-submenu" style="display: none;;">

                                            @foreach($item['children'] as $child)
                                                @php
                                                    $sub_li_class = (Route::current()->getName() == $child['route']) ? 'active' : '';
                                                @endphp

                                                @if(!isset($child['permission']) || (isset($child['permission']) && Bouncer::can($child['permission'])))
                                                    <li class="{{ $sub_li_class }}">
                                                        <a href="{{ route($child['route']) }}"
                                                           class="{{ $sub_li_class }}">{{ $child['label'] }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endif
                        @endif

                    @endforeach


                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
