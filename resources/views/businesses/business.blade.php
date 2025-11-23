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
        {{-- <link href="{{ asset('libs\rickshaw\rickshaw.min.css')}}" rel="stylesheet" type="text/css"> --}}

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
                    <a href="{{route('dashboard')}}" class="logo text-center logo-dark">
                        <span class="logo-lg">

                            <img src="{{ asset('images\com.png')}}" alt="" height="18">
                            <!-- <span class="logo-lg-text-dark">Velonic</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">V</span> -->

                            <img src="{{ asset('images\com.png')}}" alt="" height="42">
                        </span>
                    </a>

                    <a href="{{route('dashboard')}}" class="logo text-center logo-light">
                        <span class="logo-lg">

                            <img src="{{ asset('images\com.png')}}" alt="" height="42">
                            <!-- <span class="logo-lg-text-dark">Velonic</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">V</span> -->
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
                                    <h4 class="page-title">Business Details</h4>

                                    <div class="clearfix"></div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->

                        <div class="row page-titles mx-0">
                            <div class="col-sm-6 p-md-0">
                                <div class="welcome-text">

                                    <p class="mb-0">{{ $business['business_name']}}</p>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="profile-statistics">
                                            <div class="text-center mt-4 border-bottom-1 pb-3">
                                                <div class="row">
                                                    <div class="col">
                                                        @if($business->business_logo)
                                                            <img width="160" height="160" src="{{ asset('uploads/'.$business->business_logo)}}" alt="" class="rounded-circle" alt="#">
                                                            @else
                                                            <img width="160" height="160" src="{{ asset('uploads/mn.png')}}" alt="" class="rounded-circle" alt="#">
                                                            @endif


                                                    </div>

                                                </div>

                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="profile-tab">

                                            <div class="media pt-3">
                                                <h5 class="mr-3"> Business Name :</h5>
                                                <div class="media-body">
                                                    <h5 class="m-b-5">{{ $business['business_name']}}</h5>
                                                </div>
                                            </div>


                                            <div class="media pt-3">
                                                <h5 class="mr-3"> Business Email :</h5>
                                                <div class="media-body">
                                                    <h5 class="m-b-5">{{ $business['business_email']}}</h5>
                                                </div>
                                            </div>


                                            <div class="media pt-3">
                                                <h5 class="mr-3"> Business Address :</h5>
                                                <div class="media-body">
                                                    <h5 class="m-b-5">{{ $business['business_address']}}</h5>
                                                </div>
                                            </div>



                                            <div class="media pt-3">
                                                <h5 class="mr-3"> Business Contact :</h5>
                                                <div class="media-body">
                                                    <h5 class="m-b-5">{{ $business['business_contact']}}</h5>
                                                </div>
                                            </div>


                                            <div class="media pt-3">
                                                <h5 class="mr-3">Admin Name :</h5>
                                                <div class="media-body">
                                                    <h5 class="m-b-5">{{ $business->businessrole?$business->businessrole->name:'-'}}</h5>
                                                </div>
                                            </div>


                                            <div class="media pt-3">
                                                <h5 class="mr-3"> Admin Email :</h5>
                                                <div class="media-body">
                                                    <h5 class="m-b-5">{{ $business->businessrole?$business->businessrole->email:'-'}}</h5>
                                                </div>
                                            </div>
                                            <a class="btn btn-primary mt-4" href="/business">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->



                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                2015 - 2023 &copy; Velonic theme by <a href="">Coderthemes</a>
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


        <!-- Vendor js -->
        {{-- <script src="assets\js\vendor.min.js"></script> --}}
        <script src="{{ asset('js\vendor.min.js') }}"></script>

        <!-- Ricksaw js-->

        {{-- <script src="{{ asset('libs\rickshaw\rickshaw.min.js') }}"></script> --}}


        <!-- flot chart -->
        <script src="{{ asset('libs\flot-charts\jquery.flot.js') }}"></script>
        {{-- <script src="{{ asset('libs\flot-charts\jquery.flot.min.js') }}"></script> --}}


        <script src="{{ asset('libs\flot-charts\jquery.flot.tooltip.min.js') }}"></script>


        <script src="{{ asset('libs\flot-charts\jquery.flot.resize.js') }}"></script>


        <!-- Sparkline charts -->

        <script src="{{ asset('libs\jquery-sparkline\jquery.sparkline.min.js') }}"></script>


        <!-- Dashboard init JS -->

        {{-- <script src="{{ asset('js\pages\dashboard2.init.js') }}"></script> --}}

        <!-- App js -->

        <script src="{{ asset('js\app.min.js') }}"></script>

    </body>

</html>
