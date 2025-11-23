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
                                    <h4 class="page-title">Business</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb p-0 m-0">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModaly" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Business</i></button>

                                        </ol>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                        </div>

                        <div class="modal fade" id="exampleModaly" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">New Business</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="{{ route('business.store')}}" method='post' enctype="multipart/form-data">
                                    <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />



                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Business Name</label>
                                        <input type="text" class="form-control" id="" name="business_name" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Email</label>
                                        <input type="text" class="form-control" id="" name="business_email" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Location</label>
                                        <input type="text" class="form-control" id="" name="business_address" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Contact</label>
                                        <input type="number" class="form-control" id="" name="business_contact" pattern="[0-9]{10}" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Logo</label>
                                        <input type="file" class="form-control" id="" name="business_logo" required>
                                    </div>



                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Admin Name</label>
                                        <input type="text" class="form-control"  name="name" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Admin Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Admin Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" style="font-weight:bolder;">End Date</label>
                                        <input type="date" class="form-control"  name="business_enddate" required>
                                    </div>

                                    <div class="modal-footer">
                                  <button type="reset" class="btn btn-secondary" data-dismiss="modal"  value="Reset" onclick="clearText()">Close</button>
                                  <button type="submit" class="btn btn-primary" id="btn">Add Business</button>
                                </div>
                                  </form>
                                </div>

                              </div>
                            </div>
                          </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header py-3 bg-transparent">
                                        <div class="card-widgets">
                                            <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                            <a data-toggle="collapse" href="#cardCollpase3" role="button" aria-expanded="false" aria-controls="cardCollpase3"><i class="mdi mdi-minus"></i></a>
                                            <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                        </div>
                                        <h5 class="header-title mb-2"> Businesses</h5>
                                    </div>
                                    <div id="cardCollpase3" class="collapse show">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-nowrap mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Business Name</th>
                                                            <th>Email</th>
                                                            <th>Location</th>
                                                            <th>Contact</th>
                                                            <th>Logo</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($business as $businesses)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$businesses->business_name}}</td>
                                                            <td>{{$businesses->business_email}}</td>
                                                            <td>{{$businesses->business_address}}</td>
                                                            <td>{{$businesses->business_contact}}</td>
                                                            <td>
                                                                @if($businesses->business_logo)
                                                                <img src="{{ asset('uploads/'.$businesses->business_logo)}}" style="height: 50px; width:50px;"  alt="Avatar">
                                                                @else
                                                                <img src="{{ asset('uploads/mn.png')}}" alt="" style="height: 50px; width:50px;" alt="Avatar">
                                                                @endif
                                                                </td>
                                                            <td>
                                                                <div style="display:flex;">

                                                                    <a href="{{url('business/'.$businesses->id )}}">  <button class="btn btn-success"><i class="fa fa-eye" style='color: #f3da35;'></i></button></a>




                                                                    <button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModal{{ $businesses->id }}" style="margin-left: 5px;"><i class='fa fa-edit'>
                                                                    </i>
                                                                    </button>



                                                                    <div class="modal fade" id="exampleModal{{ $businesses->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                          <div class="modal-content">
                                                                            <div class="modal-header">
                                                                              <h5 class="modal-title" id="exampleModalLabel">Edit {{ $businesses->business_name }}</h5>
                                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                              </button>
                                                                            </div>

                                                                            <div class="modal-body">
                                                                              <form action="{{ route('business.update', [$businesses->id])}}" method='post'>

                                                                                @method('PUT')
                                                                                         <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                                                                                <div class="form-group">
                                                                                  <label for="recipient-name" class="col-form-label">Business Name</label>
                                                                                  <input type="text" class="form-control"  name="business_name" required value="{{$businesses->business_name}}">

                                                                                </div>


                                                                                <div class="form-group">
                                                                                    <label for="recipient-name" class="col-form-label">Email</label>
                                                                                    <input type="email" class="form-control"  name="business_email" required value="{{$businesses->business_email}}">
                                                                                  </div>


                                                                                  <div class="form-group">
                                                                                    <label for="recipient-name" class="col-form-label">Address</label>
                                                                                    <input type="text" class="form-control"  name="business_address" required value="{{$businesses->business_address}}">
                                                                                  </div>

                                                                                  <div class="form-group">
                                                                                    <label for="recipient-name" class="col-form-label">Contact</label>
                                                                                    <input type="text" class="form-control"  name="business_contact" required value="{{$businesses->business_contact}}">
                                                                                  </div>



                           




                                                                                    <div class="form-group">
                                                                                        <label for="exampleFormControlTextarea1" style="font-weight:bolder;">License Date</label>
                                                                                        <input type="date" class="form-control" name="business_enddate" required value="{{ $businesses->business_enddate }}">
                                                                                    </div>



                                                                                <div class="modal-footer">
                                                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                              <button type="submit" class="btn btn-primary">Update Record</button>
                                                                            </div>
                                                                              </form>

                                                                            </div>

                                                                          </div>

                                                                        </div>
                                                                      </div>



                                                             <form action="{{route('business.destroy', $businesses->id)}}" method="post">
                                                                {{csrf_field()}}
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                <button class="btn btn-danger"  onclick="return confirm('Are you sure?')" style="margin-left: 5px;"><i class="fa fa-trash"></i></button>
                                                                </form>



                                                                    </div>
                                                            </td>
                                                            {{-- <td><span class="badge badge-info">{{$businesses->business_contact}}</span></td> --}}

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
        {{-- <script src="assets\libs\rickshaw\rickshaw.min.js"></script> --}}
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
