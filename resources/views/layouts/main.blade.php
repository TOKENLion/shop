<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dashboard') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/dashboard/app.js') }}" defer></script>

    <!-- Fonts -->
    {{--<link rel="dns-prefetch" href="//fonts.gstatic.com">--}}

    <!-- Styles -->
    <link href="{{ asset('css/dashboard/app.css') }}" rel="stylesheet">
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{ route('home') }}" class="site_title">
                        <span>Dashboard</span>
                    </a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="https://via.placeholder.com/128x128.jpg" alt="" class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>John Doe</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>MENU</h3>
                        <ul class="nav side-menu">
                            <li class="{{ (Request::is('dashboard') ? 'active' : "") }}">
                                <a href="{{ route('dashboard') }}">
                                    <i class="fa fa-home"></i> Home
                                </a>
                            </li>

                            <li class="{{ (!empty($is_active) ? 'active' : "") }}">
                                <a>
                                    <i class="fa fa-sitemap"></i> Magazin <span class="fa fa-chevron-down"></span>
                                </a>
                                <ul class="nav child_menu">
                                    <li class="{{ (Request::is('dashboard.category') ? 'current-page' : "") }}">
                                        <a href="{{ route('dashboard.category') }}">
                                            Categoriile Produsului
                                        </a>
                                    </li>
                                    <li>
                                        <a>Produsul<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li class="sub_menu">
                                                <a href="#dddd">Listat de produse</a>
                                            </li>
                                            <li>
                                                <a href="#ddw1">Calendar</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            {{--<li>--}}
                                {{--<a>--}}
                                    {{--<i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span>--}}
                                {{--</a>--}}
                                {{--<ul class="nav child_menu">--}}
                                    {{--<li>--}}
                                        {{--<a href="#level1_1">--}}
                                            {{--Level One--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a>Level One<span class="fa fa-chevron-down"></span></a>--}}
                                        {{--<ul class="nav child_menu">--}}
                                            {{--<li class="sub_menu">--}}
                                                {{--<a href="level2.html">Level Two</a>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a href="#level2_1">Level Two</a>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a href="#level2_2">Level Two</a>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#level1_2">Level One</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="{{ route('dashboard.logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-left">
                @Create by <a href="https://www.linkedin.com/in/ion-boinitchi/" target="_blank">Boinitchi Ion</a>, {{ date('Y') }}
            </div>

            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
        </div>
    </div>
</body>
</html>