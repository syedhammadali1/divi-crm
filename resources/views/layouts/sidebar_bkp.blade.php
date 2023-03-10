<div class="sidebar-wrapper">
   <div>
      <div class="logo-wrapper">
         <a href="{{url('/')}}"><img class="img-fluid for-light" src="{{asset('images/logo/logo.png')}}" alt=""><img class="img-fluid for-dark" src="{{asset('images/logo/logo_dark.png')}}" alt=""></a>
         <div class="back-btn"><i class="fa fa-angle-left"></i></div>
         <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
      </div>
      <div class="logo-icon-wrapper"><a href="../index.html"><img class="img-fluid" src="{{asset('images/logo/logo-icon.png')}}" alt=""></a></div>
      <nav class="sidebar-main">
         <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
         <div id="sidebar-menu">
            <ul class="sidebar-links" id="simple-bar">
               <li class="back-btn">
                  <a href="{{url('/')}}"><img class="img-fluid" src="{{asset('images/logo/logo-icon.png')}}" alt=""></a>
                  <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
               </li>
               <li class="sidebar-list">
{{--                  <label class="badge badge-success">2</label>--}}
                  <a class="sidebar-link sidebar-title active" href="{{url('/')}}">
                     <i data-feather="home"></i><span class="lan-3">DashBoard</span>
                     <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                  </a>
               </li>
               <li class="sidebar-main-title">
                  <div>
                     <h6 class="lan-8">Applications</h6>
                     <p class="lan-9">Ready to use Apps</p>
                  </div>
               </li>
               <li class="sidebar-list">
                  <label class="badge badge-danger">New</label>
                  <a class="sidebar-link sidebar-title " href="#">
                     <i data-feather="box"></i><span>Project </span>
                     <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                  </a>
                  <ul class="sidebar-submenu" style="display: none;">
                     <li><a href="{{route('viewbrandproject')}}" class="">Project List</a></li>
                     <li><a href="{{route('createproject')}}" class="">Create new</a></li>
                  </ul>
               </li>
               <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title " href="#">
                        <i data-feather="users"></i><span>Users</span>
                        <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                    </a>
                    <ul class="sidebar-submenu" style="display: none;;">
                        <li><a href="{{route('tsc-user.index')}}" class="">User Listing</a></li>
                        <li><a href="{{route('tsc-user.create')}}" class="">User Create</a></li>
                    </ul>
                </li>
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title " href="#">
                     <i data-feather="mail"></i><span>Roles</span>
                     <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                  </a>
                  <ul class="sidebar-submenu" style="display: none;;">
                     <li><a href="{{route('role.index')}}" class="">Roles Listing</a></li>
                     <li><a href="{{route('role.create')}}" class="">Role Create</a></li>
                  </ul>
               </li>
               <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title " href="#">
                        <i data-feather="mail"></i><span>Email</span>
                        <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                    </a>
                    <ul class="sidebar-submenu" style="display: none;;">
                        <li><a href="../email/email-application.html" class="">Email App</a></li>
                        <li><a href="../email/email-compose.html" class="">Email Compose</a></li>
                    </ul>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav  " href="../calendar-basic.html"><i data-feather="calendar"> </i><span>Calendar</span></a></li>
               <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav " href="../social-app.html"><i data-feather="zap"> </i><span>Social App</span></a></li>
               <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav " href="../to-do.html"><i data-feather="clock"> </i><span>To-Do</span></a></li>
               <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav " href="../search.html"><i data-feather="search"> </i><span>Search Result</span></a></li>
               <li class="sidebar-main-title">
                  <div>
                     <h6>Forms &amp; Table</h6>
                     <p>Ready to use froms &amp; tables</p>
                  </div>
               </li>
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title " href="#">
                     <i data-feather="file-text"></i><span>Forms</span>
                     <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                  </a>
                  <ul class="sidebar-submenu" style="display: none;">
                     <li>
                        <a class="submenu-title " href="#">
                           Form Controls
                           <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a>
                        <ul class="nav-sub-childmenu submenu-content" style="display: none;;">
                           <li><a href="../forms/form-validation.html" class="">Form Validation</a></li>
                           <li><a href="../forms/base-input.html" class="">Base Inputs</a></li>
                           <li><a href="../forms/radio-checkbox-control.html" class="">Checkbox & Radio</a></li>
                           <li><a href="../forms/input-group.html" class="">Input Groups</a></li>
                           <li><a href="../forms/megaoptions.html" class="">Mega Options</a></li>
                        </ul>
                     </li>
                     <li>
                        <a class="submenu-title " href="#">
                           Form Widgets
                           <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a>
                        <ul class="nav-sub-childmenu submenu-content" style="display: none;;">
                           <li><a href="../forms/datepicker.html" class="">Datepicker</a></li>
                           <li><a href="../forms/time-picker.html" class="">Timepicker</a></li>
                           <li><a href="../forms/datetimepicker.html" class="">Datetimepicker</a></li>
                           <li><a href="../forms/daterangepicker.html" class="">Daterangepicker</a></li>
                           <li><a href="../forms/touchspin.html" class="">Touchspin</a></li>
                           <li><a href="../forms/select2.html" class="">Select2</a></li>
                           <li><a href="../forms/switch.html" class="">Switch</a></li>
                           <li><a href="../forms/typeahead.html" class="">Typeahead</a></li>
                           <li><a href="../forms/clipboard.html" class="">Clipboard</a></li>
                        </ul>
                     </li>
                     <li>
                        <a class="submenu-title " href="#">
                           Form Layout
                           <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a>
                        <ul class="nav-sub-childmenu submenu-content" style="display: none;;">
                           <li><a href="../forms/default-form.html" class="">Default Forms</a></li>
                           <li><a href="../forms/form-wizard.html" class="">Form Wizard 1</a></li>
                           <li><a href="../forms/form-wizard-two.html" class="">Form Wizard 2</a></li>
                           <li><a href="../forms/form-wizard-three.html" class="">Form Wizard 3</a></li>
                        </ul>
                     </li>
                  </ul>
               </li>
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title " href="#">
                     <i data-feather="server"></i><span>Tables</span>
                     <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                  </a>
                  <ul class="sidebar-submenu" style="display: none;">
                     <li>
                        <a class="submenu-title  "  href="#">
                           Bootstrap Tables
                           <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a>
                        <ul class="nav-sub-childmenu submenu-content" style="display: none;;">
                           <li><a href="../tables/bootstrap-basic-table.html" class="">Basic Tables</a></li>
                           <li><a href="../tables/bootstrap-sizing-table.html" class="">Sizing Tables</a></li>
                           <li><a href="../tables/bootstrap-border-table.html" class="">Border Tables</a></li>
                           <li><a href="../tables/bootstrap-styling-table.html" class="">Styling Tables</a></li>
                           <li><a href="../tables/table-components.html" class="">Table components</a></li>
                        </ul>
                     </li>
                     <li>
                        <a class="submenu-title  " href="#">
                           Data Tables
                           <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a>
                        <ul class="nav-sub-childmenu submenu-content" style="display: none;;">
                           <li><a href="../tables/datatable-basic-init.html" class="">Basic Init</a></li>
                           <li><a href="../tables/datatable-advance.html" class="">Advance Init</a></li>
                           <li><a href="../tables/datatable-styling.html" class="">Styling</a></li>
                           <li><a href="../tables/datatable-ajax.html" class="">AJAX</a></li>
                           <li><a href="../tables/datatable-server-side.html" class="">Server Side</a></li>
                           <li><a href="../tables/datatable-plugin.html" class="">Plug-in</a></li>
                           <li><a href="../tables/datatable-api.html" class="">API</a></li>
                           <li><a href="../tables/datatable-data-source.html" class="">Data Sources</a></li>
                        </ul>
                     </li>
                     <li>
                        <a class="submenu-title " href="#">
                           Ex. Data Tables
                           <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a>
                        <ul class="nav-sub-childmenu submenu-content" style="display: none;;">
                           <li><a href="../tables/datatable-ext-autofill.html" class="">Auto Fill</a></li>
                           <li><a href="../tables/datatable-ext-basic-button.html" class="">Basic Button</a></li>
                           <li><a href="../tables/datatable-ext-col-reorder.html" class="">Column Reorder</a></li>
                           <li><a href="../tables/datatable-ext-fixed-header.html" class="">Fixed Header</a></li>
                           <li><a href="../tables/datatable-ext-html-5-data-export.html" class="">HTML 5 Export</a></li>
                           <li><a href="../tables/datatable-ext-key-table.html" class="">Key Table</a></li>
                           <li><a href="../tables/datatable-ext-responsive.html" class="">Responsive</a></li>
                           <li><a href="../tables/datatable-ext-row-reorder.html" class="">Row Reorder</a></li>
                           <li><a href="../tables/datatable-ext-scroller.html" class="">Scroller</a></li>
                        </ul>
                     </li>
                     <li><a href="../tables/jsgrid-table.html" class="">Js Grid Table </a></li>
                  </ul>
               </li>
               <li class="sidebar-main-title">
                  <div>
                     <h6>Components</h6>
                     <p>UI Components &amp; Elements</p>
                  </div>
               </li>
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title " href="#">
                     <i data-feather="box"></i><span>Ui Kits</span>
                     <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                  </a>
                  <ul class="sidebar-submenu" style="display: none;">
                     <li><a href="../ui-kits/state-color.html" class="">State color</a></li>
                     <li><a href="../ui-kits/typography.html" class="">Typography</a></li>
                     <li><a href="../ui-kits/avatars.html" class="">Avatars</a></li>
                     <li><a href="../ui-kits/helper-classes.html" class="">helper classes</a></li>
                     <li><a href="../ui-kits/grid.html" class="">Grid</a></li>
                     <li><a href="../ui-kits/tag-pills.html" class="">Tag & pills</a></li>
                     <li><a href="../ui-kits/progress-bar.html" class="">Progress</a></li>
                     <li><a href="../ui-kits/modal.html" class="">Modal</a></li>
                     <li><a href="../ui-kits/alert.html" class="">Alert</a></li>
                     <li><a href="../ui-kits/popover.html" class="">Popover</a></li>
                     <li><a href="../ui-kits/tooltip.html" class="">Tooltip</a></li>
                     <li><a href="../ui-kits/loader.html" class="">Spinners</a></li>
                     <li><a href="../ui-kits/dropdown.html" class="">Dropdown</a></li>
                     <li><a href="../ui-kits/accordion.html" class="">Accordion</a></li>
                     <li>
                        <a class="submenu-title " href="#">
                           Tabs
                           <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a>
                        <ul class="nav-sub-childmenu submenu-content" style="display: none;;">
                           <li><a href="../ui-kits/tab-bootstrap.html" class="">Bootstrap Tabs</a></li>
                           <li><a href="../ui-kits/tab-material.html" class="">Line Tabs</a></li>
                        </ul>
                     </li>
                     <li><a href="../ui-kits/box-shadow.html" class="">Shadow</a></li>
                     <li><a href="../ui-kits/list.html" class="">Lists</a></li>
                  </ul>
               </li>
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title " href="#">
                     <i data-feather="folder-plus"></i><span>Bonus Ui</span>
                     <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                  </a>
                  <ul class="sidebar-submenu" style="display: none;">
                     <li><a href="../bonus-ui/scrollable.html" class="">Scrollable</a></li>
                     <li><a href="../bonus-ui/tree.html" class="">Tree view</a></li>
                     <li><a href="../bonus-ui/bootstrap-notify.html" class="">Bootstrap Notify</a></li>
                     <li><a href="../bonus-ui/rating.html" class="">Rating</a></li>
                     <li><a href="../bonus-ui/dropzone.html" class="">dropzone</a></li>
                     <li><a href="../bonus-ui/tour.html" class="">Tour</a></li>
                     <li><a href="../bonus-ui/sweet-alert2.html" class="">SweetAlert2</a></li>
                     <li><a href="../bonus-ui/modal-animated.html" class="">Animated Modal</a></li>
                     <li><a href="../bonus-ui/owl-carousel.html" class="">Owl Carousel</a></li>
                     <li><a href="../bonus-ui/ribbons.html" class="">Ribbons</a></li>
                     <li><a href="../bonus-ui/pagination.html" class="">Pagination</a></li>
                     <li><a href="../bonus-ui/breadcrumb.html" class="">Breadcrumb</a></li>
                     <li><a href="../bonus-ui/range-slider.html" class="">Range Slider</a></li>
                     <li><a href="../bonus-ui/image-cropper.html" class="">Image cropper</a></li>
                     <li><a href="../bonus-ui/sticky.html" class="">Sticky</a></li>
                     <li><a href="../bonus-ui/basic-card.html" class="">Basic Card</a></li>
                     <li><a href="../bonus-ui/creative-card.html" class="">Creative Card</a></li>
                     <li><a href="../bonus-ui/tabbed-card.html" class="">Tabbed Card</a></li>
                     <li><a href="../bonus-ui/dragable-card.html" class="">Draggable Card</a></li>
                     <li>
                        <a class="submenu-title " href="#">
                           Timeline
                           <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a>
                        <ul class="nav-sub-childmenu submenu-content" style="display: none;;">
                           <li><a href="../bonus-ui/timeline-v-1.html" class="">Timeline 1</a></li>
                           <li><a href="../bonus-ui/timeline-v-2.html" class="">Timeline 2</a></li>
                        </ul>
                     </li>
                  </ul>
               </li>
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title " href="#">
                     <i data-feather="edit-3"></i><span>Builders</span>
                     <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                  </a>
                  <ul class="sidebar-submenu" style="display: none;">
                     <li><a href="../builders/form-builder-1.html" class=""> Form Builder 1</a></li>
                     <li><a href="../builders/form-builder-2.html" class=""> Form Builder 2</a></li>
                     <li><a href="../builders/pagebuild.html" class="">Page Builder</a></li>
                     <li><a href="../builders/button-builder.html" class="">Button Builder</a></li>
                  </ul>
               </li>
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title " href="#"><i data-feather="cloud-drizzle"></i><span>Animation</span></a>
                  <ul class="sidebar-submenu" style="display: none;">
                     <li><a href="../animation/animate.html" class="">Animate</a></li>
                     <li><a href="../animation/scroll-reval.html" class="">Scroll Reveal</a></li>
                     <li><a href="../animation/aos.html" class="">AOS animation</a></li>
                     <li><a href="../animation/tilt.html" class="">Tilt Animation</a></li>
                     <li><a href="../animation/wow.html" class="">Wow Animation</a></li>
                  </ul>
               </li>
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title " href="#">
                     <i data-feather="command"></i><span>Icons</span>
                     <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                  </a>
                  <ul class="sidebar-submenu" style="display: none;">
                     <li><a href="../icons/flag-icon.html" class="">Flag icon</a></li>
                     <li><a href="../icons/font-awesome.html" class="">Fontawesome Icon</a></li>
                     <li><a href="../icons/ico-icon.html" class="">Ico Icon</a></li>
                     <li><a href="../icons/themify-icon.html" class="">Thimify Icon</a></li>
                     <li><a href="../icons/feather-icon.html" class="">Feather icon</a></li>
                     <li><a href="../icons/whether-icon.html" class="">Whether Icon</a></li>
                     <li><a href="../icons/simple-line-icon.html" class="">Simple line Icon</a></li>
                     <li><a href="../icons/material-design-icon.html" class="">Material Design Icon</a></li>
                     <li><a href="../icons/pe7-icon.html" class="">pe7 icon</a></li>
                     <li><a href="../icons/typicons-icon.html" class="">Typicons icon</a></li>
                     <li><a href="../icons/ionic-icon.html" class="">Ionic icon</a></li>
                  </ul>
               </li>
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title " href="#">
                     <i data-feather="cloud"></i><span>Buttons</span>
                     <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                  </a>
                  <ul class="sidebar-submenu" style="display: none;">
                     <li><a href="../buttons/buttons.html" class="">Default Style</a></li>
                     <li><a href="../buttons/buttons-flat.html" class="">Flat Style</a></li>
                     <li><a href="../buttons/buttons-edge.html" class="">Edge Style</a></li>
                     <li><a href="../buttons/raised-button.html" class="">Raised Style</a></li>
                     <li><a href="../buttons/button-group.html" class="">Button Group</a></li>
                  </ul>
               </li>
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title " href="#">
                     <i data-feather="bar-chart"></i><span>Charts</span>
                     <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                  </a>
                  <ul class="sidebar-submenu" style="display: none;">
                     <li><a href="../charts/echarts.html" class="">Echarts</a></li>
                     <li><a href="../charts/chart-apex.html" class="">Apex Chart</a></li>
                     <li><a href="../charts/chart-google.html" class="">Google Chart</a></li>
                     <li><a href="../charts/chart-sparkline.html" class="">Sparkline chart</a></li>
                     <li><a href="../charts/chart-flot.html" class="">Flot Chart</a></li>
                     <li><a href="../charts/chart-knob.html" class="">Knob Chart</a></li>
                     <li><a href="../charts/chart-morris.html" class="">Morris Chart</a></li>
                     <li><a href="../charts/chartjs.html" class="">Chatjs Chart</a></li>
                     <li><a href="../charts/chartist.html" class="">Chartist Chart</a></li>
                     <li><a href="../charts/chart-peity.html" class="">Peity Chart </a></li>
                  </ul>
               </li>
               <li class="sidebar-main-title">
                  <div>
                     <h6>Pages</h6>
                     <p>All neccesory pages added</p>
                  </div>
               </li>
               <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav " href="../landing-page.html"><i data-feather="cast"> </i><span>Landing Page</span></a></li>
               <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav " href="../sample-page.html"><i data-feather="file-text"> </i><span>Sample page</span></a></li>
               <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav " href="../internationalization.html"><i data-feather="globe"> </i><span>Internationalization</span></a></li>
               <li class="mega-menu">
                  <a class="sidebar-link sidebar-title " href="#">
                     <i data-feather="layers"></i><span>Others</span>
                     <div class="according-menu other"><i class="fa fa-angle-right"></i></div>
                  </a>
                  <div class="mega-menu-container menu-content">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col mega-box">
                              <div class="link-section">
                                 <div class="submenu-title">
                                    <h5>Error Page</h5>
                                    <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                                 </div>
                                 <ul class="submenu-content opensubmegamenu" style="display: none;">
                                    <li><a href="../others/400.html" class="">Error 400</a></li>
                                    <li><a href="../others/401.html" class="">Error 401</a></li>
                                    <li><a href="../others/403.html" class="">Error 403</a></li>
                                    <li><a href="../others/404.html" class="">Error 404</a></li>
                                    <li><a href="../others/500.html" class="">Error 500</a></li>
                                    <li><a href="../others/503.html" class="">Error 503</a></li>
                                 </ul>
                              </div>
                           </div>
                           <div class="col mega-box">
                              <div class="link-section">
                                 <div class="submenu-title">
                                    <h5> Authentication</h5>
                                    <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                                 </div>
                                 <ul class="submenu-content opensubmegamenu" style="display: none;">
                                    <li><a href="../authentication/login.html" target="_blank">Login Simple</a></li>
                                    <li><a href="../authentication/login-one.html" target="_blank">Login with bg image</a></li>
                                    <li><a href="../authentication/login-two.html" target="_blank">Login with image two </a></li>
                                    <li><a href="../authentication/login-bs-validation.html" target="_blank">Login With validation</a></li>
                                    <li><a href="../authentication/login-bs-tt-validation.html" target="_blank">Login with tooltip</a></li>
                                    <li><a href="../authentication/login-sa-validation.html" target="_blank">Login with sweetalert</a></li>
                                    <li><a href="../authentication/sign-up.html" target="_blank">Register Simple</a></li>
                                    <li><a href="../authentication/sign-up-one.html" target="_blank">Register with Bg Image </a></li>
                                    <li><a href="../authentication/sign-up-two.html" target="_blank">Register with Bg video</a></li>
                                    <li><a href="../authentication/sign-up-wizard.html" target="_blank">Register wizard</a></li>
                                    <li><a href="../authentication/unlock.html">Unlock User</a></li>
                                    <li><a href="../authentication/forget-password.html">Forget Password</a></li>
                                    <li><a href="../authentication/reset-password.html">Reset Password</a></li>
                                    <li><a href="../authentication/maintenance.html">Maintenance</a></li>
                                 </ul>
                              </div>
                           </div>
                           <div class="col mega-box">
                              <div class="link-section">
                                 <div class="submenu-title">
                                    <h5>Coming Soon</h5>
                                    <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                                 </div>
                                 <ul class="submenu-content opensubmegamenu"  style="display: none;">
                                    <li><a href="../comingsoon.html" class="">Coming Simple</a></li>
                                    <li><a href="../comingsoon-bg-video.html" class="">Coming with Bg video</a></li>
                                    <li><a href="../comingsoon-bg-img.html" class="">Coming with Bg Image</a></li>
                                 </ul>
                              </div>
                           </div>
                           <div class="col mega-box">
                              <div class="link-section">
                                 <div class="submenu-title">
                                    <h5>Email templates</h5>
                                    <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                                 </div>
                                 <ul class="submenu-content opensubmegamenu" style="display: none;">
                                    <li><a href="../basic-template.html" class="">Basic Email</a></li>
                                    <li><a href="../email-header.html" class="">Basic With Header</a></li>
                                    <li><a href="../template-email.html" class="">Ecomerce Template</a></li>
                                    <li><a href="../template-email-2.html" class="">Email Template 2</a></li>
                                    <li><a href="../ecommerce-templates.html" class="">Ecommerce Email</a></li>
                                    <li><a href="../email-order-success.html" class="">Order Success</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="sidebar-main-title">
                  <div>
                     <h6>Miscellaneous</h6>
                     <p>Bouns pages &amp; apps</p>
                  </div>
               </li>
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title " href="#">
                     <i data-feather="image"></i><span>Gallery</span>
                     <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                  </a>
                  <ul class="sidebar-submenu" style="display: none;;">
                     <li><a href="../gallery.html" class="">Gallery Grid</a></li>
                     <li><a href="../gallery/gallery-with-description.html" class="">Gallery Grid Desc</a></li>
                     <li><a href="../gallery/gallery-masonry.html" class="">Masonry Gallery</a></li>
                     <li><a href="../gallery/masonry-gallery-with-disc.html" class="">Masonry with Desc</a></li>
                     <li><a href="../gallery/gallery-hover.html" class="">Hover Effects</a></li>
                  </ul>
               </li>
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title " href="#">
                     <i data-feather="film"></i><span>Blog</span>
                     <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                  </a>
                  <ul class="sidebar-submenu" style="display: none;;">
                     <li><a href="../blog.html" class="">Blog Details</a></li>
                     <li><a href="../blog/blog-single.html" class="">Blog Single</a></li>
                     <li><a href="../blog/add-post.html" class="">Add Post</a></li>
                  </ul>
               </li>
               <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav " href="../faq.html"><i data-feather="help-circle"> </i><span>FAQ</span></a></li>
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title " href="#">
                     <i data-feather="package"></i><span>Job Search</span>
                     <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                  </a>
                  <ul class="sidebar-submenu" style="display: none;;">
                     <li><a href="../job-search/job-cards-view.html" class="">Cards view</a></li>
                     <li><a href="../job-search/job-list-view.html" class="">List View</a></li>
                     <li><a href="../job-search/job-details.html" class="">Job Details</a></li>
                     <li><a href="../job-search/job-apply.html" class="">Apply</a></li>
                  </ul>
               </li>
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title " href="#">
                     <i data-feather="radio"></i><span>Learning</span>
                     <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                  </a>
                  <ul class="sidebar-submenu" style="display: none;;">
                     <li><a href="../learning/learning-list-view.html" class="">Learning List</a></li>
                     <li><a href="../learning/learning-detailed.html" class="">Detailed Course</a></li>
                  </ul>
               </li>
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title " href="#">
                     <i data-feather="map"></i><span>Maps</span>
                     <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                  </a>
                  <ul class="sidebar-submenu" style="display: none;;">
                     <li><a href="../maps/map-js.html" class="">Maps JS</a></li>
                     <li><a href="../maps/vector-map.html" class="">Vector Maps</a></li>
                  </ul>
               </li>
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title " href="#">
                     <i data-feather="edit"></i><span>Editors</span>
                     <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                  </a>
                  <ul class="sidebar-submenu" style="display: none;;">
                     <li><a href="../editors/summernote.html" class="">Summer Note</a></li>
                     <li><a href="../editors/ckeditor.html" class="">CK editor</a></li>
                     <li><a href="../editors/simple-mde.html" class="">MDE editor</a></li>
                     <li><a href="../editors/ace-code-editor.html" class="">ACE code editor</a></li>
                  </ul>
               </li>
               <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav " href="../knowledgebase.html"><i data-feather="sunrise"> </i><span>Knowledgebase</span></a></li>
               <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav " href="../support-ticket.html"><i data-feather="users"> </i><span>Support Ticket</span></a></li>
            </ul>
         </div>
         <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </nav>
   </div>
</div>
