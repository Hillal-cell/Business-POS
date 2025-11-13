<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Pos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets\images\favicon.ico">

        <!-- Ricksaw Css-->
        {{-- <link href="assets\libs\rickshaw\rickshaw.min.css" rel="stylesheet" type="text/css"> --}}
        <link href="{{ asset('libs\rickshaw\rickshaw.min.css')}}" rel="stylesheet" type="text/css">

        <!-- App css -->
        {{-- <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet"> --}}
        <link href="{{ asset('css\bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">

        {{-- <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css"> --}}
        <link href="{{ asset('css\icons.min.css')}}" rel="stylesheet" type="text/css">

        {{-- <link href="assets\css\app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet"> --}}
        <link href="{{ asset('css\app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet">

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">


            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="pro-user-name ml-1">
                                {{ Auth::user()->name }}
                                   <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-outline"></i>
                                <span>Profile</span>
                            </a>

                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="" class="dropdown-item notify-item"
                                onclick="event.preventDefault();
                              this.closest('form').submit();"
                                >
                                <i class="mdi mdi-logout-variant"></i>
                                <span>Logout</span>
                            </a>
                            </form>


                        </div>
                    </li>


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="" class="logo text-center logo-dark">
                        <span class="logo-lg">
                            <img src="{{ asset('images\com.png')}}" alt="" height="42">

                        </span>
                        <span class="logo-sm">

                            <img src="{{ asset('images\com.png')}}" alt="" height="42">
                        </span>
                    </a>

                    <a href="" class="logo text-center logo-light">
                        <span class="logo-lg">
                            <img src="{{ asset('images\com.png')}}" alt="" height="42">

                        </span>
                        <span class="logo-sm">

                            <img src="{{ asset('images\com.png')}}" alt="" height="42">
                        </span>
                    </a>
                </div>

                <!-- LOGO -->


                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>

                    <li class="d-none d-lg-block">

                    </li>
                </ul>
            </div>
            <!-- end Topbar --> <!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion-md-speedometer"></i>
                        <span>  Admin Dashboard  </span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('dashboard')}}">Manage Dashboard</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion-md-basket"></i>
                        <span> Business </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{route('business.index')}}">Manage Business</a></li>

                    </ul>
                </li>


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">

                                    <div class="page-title-right">

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="tile-stats">
                                                    <div class="status">
                                                        <h4 class="mt-0">Businesses</h4>
                                                        <h4 class="mt-0">{{$business}}</h4>


                                                    </div>
                                                    <div class="chart-inline">
                                                        <span class="inlinesparkline"><canvas width="383" height="32"></canvas></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="tile-stats">
                                                    <div class="status">
                                                        <h4 class="mt-0">15</h4>
                                                        <p>Avg. Sales per day</p>
                                                    </div>
                                                    <span class="dynamicbar-big"><canvas width="205" height="32"></canvas></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="tile-stats">
                                                    <div class="status">
                                                        <h3 class="mt-0">-0.0102 <small class="float-right"><small>Stock Market</small></small></h3>
                                                    </div>
                                                    <span id="compositeline"><canvas width="383" height="32"></canvas></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="tile-stats">
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <div class="status">
                                                                <h4 class="mt-2">61.5%</h4>
                                                                <p class="mb-1">US Dollar Share</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 mt-3">
                                                            <span class="sparkpie-big"><canvas width="98" height="50"></canvas></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-xl-6">

                                <div class="card">
                                    <div class="card-header py-3 bg-transparent">
                                        <div class="card-widgets">
                                            <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                            <a data-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="false" aria-controls="cardCollpase1"><i class="mdi mdi-minus"></i></a>
                                            <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                        </div>
                                        <h5 class="header-title mb-2"> Live Visiters</h5>
                                    </div>
                                    <div id="cardCollpase1" class="collapse show">
                                        <div class="card-body">
                                            <div id="rickshaw9"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card-->

                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->


                        <!-- End row -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header py-3 bg-transparent">
                                        <div class="card-widgets">
                                            <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                            <a data-toggle="collapse" href="#cardCollpase3" role="button" aria-expanded="false" aria-controls="cardCollpase3"><i class="mdi mdi-minus"></i></a>
                                            <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                        </div>
                                        <h5 class="header-title mb-2"> Business</h5>
                                    </div>
                                    <div id="cardCollpase3" class="collapse show">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-nowrap mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Business Name</th>
                                                            <th>Business Address</th>
                                                            <th>User</th>
                                                            <th>Business Contact</th>
                                                            <th>Due Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($businesslist as $businesslists)
                                                        <tr>
                                                            <td> {{$loop->iteration}} </td>
                                                            <td>{{ $businesslists->business_name }}</td>
                                                            <td>{{ $businesslists->business_address }}</td>
                                                            <td>{{ $businesslists->businessrole->name }}</td>
                                                            <td>{{ $businesslists->business_contact }}</td>


                                                            <td><span class="badge badge-info">{{ $businesslists->business_enddate }}</span></td>

                                                        </tr>
                                                        @endforeach




                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card-->

                            </div>
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->



                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">

                                2015 - 2020 &copy; Velonic theme by <a href="">Coderthemes</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->


        <!-- Right Sidebar -->
        <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close"></i>
                </a>
                <h4 class="font-17 m-0 text-white">Theme Customizer</h4>
            </div>
            <div class="slimscroll-menu">

                <div class="p-4">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, layout, etc.
                    </div>
                    <div class="mb-2">
                        <img src="" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked="">
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsstyle="assets/css/bootstrap-dark.min.css" data-appstyle="assets/css/app-dark.min.css">
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appstyle="assets/css/app-rtl.min.css">
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                </div>
            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>


        <!-- Vendor js -->
        {{-- <script src="assets\js\vendor.min.js"></script> --}}
        <script src="{{ asset('js\vendor.min.js') }}"></script>

        <!-- D3 chart (required) in ricksaw charts (v3.5.17)-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js"></script>

        <!-- Ricksaw js-->
        {{-- <script src="assets\libs\rickshaw\rickshaw.min.js"></script> --}}
        <script src="{{ asset('libs\rickshaw\rickshaw.min.js') }}"></script>


        <!-- flot chart -->
        <script src="{{ asset('libs\flot-charts\jquery.flot.js') }}"></script>
        {{-- <script src="{{ asset('libs\flot-charts\jquery.flot.min.js') }}"></script> --}}


        <script src="{{ asset('libs\flot-charts\jquery.flot.tooltip.min.js') }}"></script>


        <script src="{{ asset('libs\flot-charts\jquery.flot.resize.js') }}"></script>


        <!-- Sparkline charts -->

        <script src="{{ asset('libs\jquery-sparkline\jquery.sparkline.min.js') }}"></script>


        <!-- Dashboard init JS -->

        <script src="{{ asset('js\pages\dashboard2.init.js') }}"></script>

        <!-- App js -->

        <script src="{{ asset('js\app.min.js') }}"></script>

    </body>

</html>
