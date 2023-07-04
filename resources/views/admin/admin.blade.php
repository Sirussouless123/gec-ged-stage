<!DOCTYPE html>
<html lang="zxx">


<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin | @yield('title')</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap1.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendors/themefy_icon/themify-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendors/swiper_slider/css/swiper.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendors/niceselect/css/nice-select.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendors/owl_carousel/css/owl.carousel.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendors/gijgo/gijgo.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendors/font_awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/tagsinput/tagsinput.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendors/datatable/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatable/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatable/css/buttons.dataTables.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendors/text_editor/summernote-bs4.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendors/morris/morris.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/material_icon/material-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style1.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/colors/default.css') }}" id="colorSkinCSS">
</head>

<body class="crm_body_bg">

@php
      $infos = DB::table("users")->where('users.id',session('loginId'))->first();
@endphp

    <nav class="sidebar">
        <div class="logo bg-secondary d-flex justify-content-between">
            <a href="{{route('admin.home')}}" class="mx-4" style="text-decoration:none;">GED-GEC</a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li class="mm-active">
                <a class="has-arrow" href="#" aria-expanded="false">

                    <img src="{{ asset('assets/img/menu-icon/1.svg') }}" alt>
                    <span>Dashboard</span>
                </a>
                <ul>
                    <li><a class="active" href="{{route('admin.home')}}">Informations générales</a></li>

                </ul>
            </li>
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="{{ asset('assets/img/menu-icon/2.svg') }}" alt>
                    <span>Pages</span>
                </a>
                <ul>
                    <li><a href="{{route('admin.department.index')}}">Départements</a></li>
                    <li><a href="{{route('admin.service.index')}}">Services</a></li>
                    <li><a href="{{route('admin.category.index')}}">Catégories</a></li>
                </ul>
            </li>
            {{-- <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="img/menu-icon/3.svg" alt>
                    <span>Applications</span>
                </a>
                <ul>
                    <li><a href="mail_box.html">Mail Box</a></li>
                    <li><a href="chat.html">Chat</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                </ul>
            </li>
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="img/menu-icon/4.svg" alt>
                    <span>UI Component</span>
                </a>
                <ul>
                    <li><a href="#">Elements</a>
                        <ul>
                            <li><a href="buttons.html">Buttons</a></li>
                            <li><a href="dropdown.html">Dropdowns</a></li>
                            <li><a href="Badges.html">Badges</a></li>
                            <li><a href="Loading_Indicators.html">Loading Indicators</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Components</a>
                        <ul>
                            <li><a href="notification.html">Notifications</a></li>
                            <li><a href="progress.html">Progress Bar</a></li>
                            <li><a href="carousel.html">Carousel</a></li>
                            <li><a href="cards.html">cards</a></li>
                            <li><a href="Pagination.html">Pagination</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="img/menu-icon/5.svg" alt>
                    <span>Widgets</span>
                </a>
                <ul>
                    <li><a href="chart_box_1.html">Chart Boxes 1</a></li>
                    <li><a href="profilebox.html">Profile Box</a></li>
                </ul>
            </li>
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="img/menu-icon/6.svg" alt>
                    <span>Forms</span>
                </a>
                <ul>
                    <li><a href="#">Elements</a>
                        <ul>
                            <li><a href="data_table.html">Data Tables</a></li>
                            <li><a href="bootstrap_table.html">Grid Tables</a></li>
                            <li><a href="datepicker.html">Date Picker</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Widgets</a>
                        <ul>
                            <li><a href="Input_Selects.html">Input Selects</a></li>
                            <li><a href="Input_Mask.html">Input Mask</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="img/menu-icon/7.svg" alt>
                    <span>Charts</span>
                </a>
                <ul>
                    <li><a href="chartjs.html">ChartJS</a></li>
                    <li><a href="apex_chart.html">Apex Charts</a></li>
                    <li><a href="chart_sparkline.html">chart sparkline</a></li>
                </ul>
            </li> --}}
        </ul>
    </nav>

    <section class="main_content dashboard_part">

        <div class="container-fluid g-0">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="header_iner d-flex justify-content-end align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        {{-- <div class="serach_field-area">
                            <div class="search_inner">
                                <form action="#">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search here...">
                                    </div>
                                    <button type="submit"> <img src="{{asset('assets/img/icon/icon_search.svg')}}" alt> </button>
                                </form>
                            </div>
                        </div> --}}
                        {{-- <div class="header_right d-flex justify-content-between align-items-center">
                            <div class="header_notification_warp d-flex align-items-center">
                                <li>
                                    <a href="#"> <img src="img/icon/bell.svg" alt> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="img/icon/msg.svg" alt> </a>
                                </li>
                            </div> --}}
                            <div class="profile_info">
                                <img src="{{asset('assets/img/text-3.png')}}" alt="#">
                                <div class="profile_info_iner">
                                    <p>Welcome Admin!</p>
                                    <h5>{{ $infos->nom}} {{$infos->prenom}}</h5>
                                    <div class="profile_info_details">
                                        <a href="{{route('logout')}}">Log Out <i class="ti-shift-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main_content_iner ">
               @yield('content')
        </div>

        <div class="footer_part">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="footer_iner text-center">
                            <p>2023 © GED-GEC - Dashboard</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </div> --}}

    <script src="{{ asset('assets/js/jquery1-3.4.1.min.js') }}"></script>

    <script src="{{ asset('assets/js/popper1.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap1.min.js') }}"></script>

    <script src="{{ asset('assets/js/metisMenu.js') }}"></script>

    <script src="{{ asset('assets/vendors/count_up/jquery.waypoints.min.js') }}"></script>

    <script src="{{ asset('assets/vendors/chartlist/Chart.min.js') }}"></script>

    <script src="{{ asset('assets/vendors/count_up/jquery.counterup.min.js') }}"></script>

    <script src="{{ asset('assets/vendors/swiper_slider/js/swiper.min.js') }}"></script>

    <script src="{{ asset('assets/vendors/niceselect/js/jquery.nice-select.min.js') }}"></script>

    <script src="{{ asset('assets/vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('assets/vendors/gijgo/gijgo.min.js') }}"></script>

    <script src="{{ asset('assets/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart.min.js') }}"></script>

    <script src="{{ asset('assets/vendors/progressbar/jquery.barfiller.js') }}"></script>

    <script src="{{ asset('assets/vendors/tagsinput/tagsinput.js') }}"></script>

    <script src="{{ asset('assets/vendors/text_editor/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/vendors/apex_chart/apexcharts.js') }}"></script>

    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script src="{{ asset('assets/js/active_chart.js') }}"></script>
    <script src="{{ asset('assets/vendors/apex_chart/radial_active.js') }}"></script>
    <script src="{{ asset('assets/vendors/apex_chart/stackbar.js') }}"></script>
    <script src="{{ asset('assets/vendors/apex_chart/area_chart.js') }}"></script>

    <script src="{{ asset('assets/vendors/apex_chart/bar_active_1.js') }}"></script>
    <script src="{{ asset('assets/vendors/chartjs/chartjs_active.js') }}"></script>
</body>

</html>
