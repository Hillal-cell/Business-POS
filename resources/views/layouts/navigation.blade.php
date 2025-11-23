
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>RecordBank</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">





        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('images\favicon.ico')}}">

        <!-- Plugins css-->
        <link href="{{ asset('libs\sweetalert2\sweetalert2.min.css')}}" rel="stylesheet" type="text/css">

        <!-- App css -->
        <link href="{{ asset('css\bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="{{ asset('css\icons.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css\app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet">
        <link href="{{ asset('css\choices\choices.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet">
        <link href="{{ asset('css\choices\theme.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet">


        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

        <script src="{{ asset('js\multiselect-dropdown.js')}}"></script>
        <script src="{{ asset('js\bootstrap-multiselect.js')}}"></script>
        <script src="{{ asset('js\bootstrap-select.js')}}"></script>
        <script src="{{ asset('js\bootstrap.bundle.js')}}"></script>
        <script src="{{ asset('js\bootstrap.bundle.min.js')}}"></script>
        <link href="{{ asset('css\bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css\bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <script src="{{ asset('js\choices\choices.min.js')}}"></script>

        <!-- third party css -->
        <link href="{{ asset('libs\datatables\dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('libs\datatables\buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('libs\datatables\responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('libs\datatables\select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">

       <!-- App css -->
       <link href="{{ asset('css\bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
       <link href="{{ asset('css\icons.min.css')}}" rel="stylesheet" type="text/css">
       <link href="{{ asset('css\app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet">
       <style>
        .center {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .center a {
        margin: 0 5px;
    }

    #detailsContainer {
        display: none;
        width: 300px;
        padding: 10px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
    }

    #moving-text {
position: relative;
animation: moveText 4s linear infinite;
font-weight: 700;
font-size: 18px;
margin-top: 20px;
color:#995845;
}

@keyframes moveText {
0% {
  left: 0;
}
50% {
  left: 200px;
}
100% {
  left: 0;
}
}
    </style>
    </head>
    <style>
        .center {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .center a {
        margin: 0 5px;
    }

    #detailsContainer {
        display: none;
        width: 300px;
        padding: 10px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
    }

    #moving-text {
position: relative;
animation: moveText 4s linear infinite;
font-weight: 700;
font-size: 18px;
margin-top: 20px;
color:#995845;
}

@keyframes moveText {
0% {
  left: 0;
}
50% {
  left: 200px;
}
100% {
  left: 0;
}
}
    </style>
    <body>

        <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">
                    <li class="dropdown notification-list" id="">
                        <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-bell-outline noti-icon"></i>

                            <span class="badge badge-pink rounded-circle noti-icon-badge">{{$notifications}}</span>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="font-16 m-0">
                                    <span class="float-right">

                                        <a href="{{url('clearmsg/' )}}" class="text-dark">



                                            <small>Clear All</small>
                                        </a>
                                    </span>Notification
                                </h5>
                            </div>

                            <div class="slimscroll noti-scroll">

                                <!-- item-->
                                @foreach($message as $messages)
                                <a href="{{url('save_task/'.$messages->id )}}" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <i class="mdi mdi-comment-account-outline text-info"></i>
                                    </div> <td>{{$messages->title}}</td>
                                    <p class="notify-details">
                                        <small class="noti-time">{{$messages->description}}</small>
                                        <small class="text-success">{{$messages->created_at->diffForHumans()}}</small>

                                    </p>
                                </a>
                               @endforeach

                            <!-- All-->




                            <a href="javascript:void(0);" class="dropdown-item text-center notify-item notify-all">
                                    See all notifications
                            </a>

                        </div>
                    </li>

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

                            <a href="{{ route('changepassword.index') }}" class="dropdown-item notify-item">
                                <i class="mdi mdi-pencil-outline"></i>
                                <span>Edit Password</span>
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
                            <img src="{{ asset('images\logo-dark.png')}}" alt="" height="18">
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">V</span> -->
                            <img src="{{ asset('images\logo-sm.png')}}" alt="" height="22">
                        </span>
                    </a>


                    <a href="" class="logo text-center logo-light">
                        <span class="logo-lg">

                            <img src="{{ asset('uploads/'.Auth::user()->business->business_logo)}}" alt="" height="44">
                            <!-- <span class="logo-lg-text-dark">Velonic</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">V</span> -->
                            <img src="{{ asset('images\logo-sm.png')}}" alt="" height="22">
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
                        <form class="app-search">
                            <div class="app-search-box">
                                <h4 class="page-title">
                                    {{Auth::user()->business->name}}
                                   </h4>
                            </div>
                        </form>
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
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="ion-md-speedometer"></i>
                        <span>  Dashboard  </span>

                    </a>

                </li>


                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion-md-basket"></i>
                        <span> Products </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                       @if(Auth::user()->role->view_product )
                        <li><a href="{{route('products.index')}}">Products</a></li>
                        @endif


                        @if(Auth::user()->role->view_productcategory )
                        <li><a href="{{route('productcategory.index')}}">Category</a></li>
                        @endif

                        @if(Auth::user()->role->view_unit )
                        <li><a href="{{route('unit.index')}}">Unit</a></li>
                        @endif



                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0)" class="waves-effect">
                        <i class="ion-ios-barcode"></i>
                        <span> Manage Barcode </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                    @if(Auth::user()->role->view_barcode )
                        <li ><a href="{{route('barcode.index')}}">Barcode</a></li>
                        @endif

                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0)" class="waves-effect">
                        <i class="ion-md-paper-plane"></i>
                        <span> Manage Supplier </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                    @if(Auth::user()->role->view_supplier )
                        <li><a href="{{route('supplier.index')}}">Supplier</a></li>
                        @endif

                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0)" class="waves-effect">
                        <i class="ion-ios-paper"></i>
                        <span> Manage Stock </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @if(Auth::user()->role->view_stockcart )
                        <li><a href="{{route('stockcart.index')}}">Stock</a></li>
                        @endif

                        @if(Auth::user()->role->view_stocklist )
                        <li><a href="{{route('stocklist.index')}}">Current Stock</a></li>
                        @endif

                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0)" class="waves-effect">
                        <i class="ion-md-cart"></i>
                        <span>Manage POS </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">


                    @if(Auth::user()->role->view_cart )
                        <li><a href="{{route('cart.index')}}">Cart</a></li>
                        @endif
                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0)" class="waves-effect">
                        <i class="ion-md-paper-plane"></i>
                        <span> Manage Core Product </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{route('coreproduct.index')}}">Core Product</a></li>


                    </ul>
                </li>




                <li>
                    <a href="javascript: void(0)" class="waves-effect">
                        <i class="ion-md-paper-plane"></i>
                        <span> Manage Purchase Cart </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{route('purchasecart.index')}}">Purchase Cart</a></li>


                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0)" class="waves-effect">
                        <i class="ion-ios-create"></i>
                        <span>Manage Batches </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('batch.index')}}">Batches</a></li>
                     </ul>
                </li>



                <li>
                    <a href="javascript: void(0)" class="waves-effect">
                        <i class="ion-ios-card"></i>
                        <span>Manage Expenses </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                    @if(Auth::user()->role->view_expense )
                        <li><a href="{{route('expense.index')}}">Expenses</a></li>
                        @endif


                        <li><a href="{{route('expensecategory.index')}}">Expense Category</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0)" class="waves-effect">
                        <i class="ion-ios-contact" ></i>
                        <span>Manage Staff </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @if(Auth::user()->role->view_staff )
                        <li><a href="{{route('staff.index')}}">Staff</a></li>
                        @endif
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0)" class="waves-effect">
                        <i class="ion-ios-briefcase"></i>
                        <span>Manage Reports </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                    @if(Auth::user()->role->view_salesreport )
                        <li><a href="{{route('salesreport.index')}}">Sales Reports</a></li>
                        @endif

                        @if(Auth::user()->role->view_stockreport )
                        <li><a href="{{route('stockreport.index')}}">Stocks Reports</a></li>
                        @endif

                        @if(Auth::user()->role->view_saleslist )
                        <li><a href="{{route('salelist.index')}}">Sales</a></li>
                        @endif
                        <li><a href="{{route('purchasereport.index')}}">Purchase Reports</a></li>
                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0)" class="waves-effect">
                        <i class="ion-ios-create"></i>
                        <span>Manage Audit Trails </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                    @if(Auth::user()->role->view_audits )
                        <li><a href="{{url('audits')}}">Audits</a></li>
                        @endif


                     </ul>
                </li>

                <li>
                    <a href="javascript: void(0)" class="waves-effect">
                        <i class="ion-md-key"></i>
                        <span>Manage Leaves </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{route('leavesummary.index')}}">Leave Summary</a></li>
                        <li><a href="{{route('leave.index')}}">Leaves</a></li>
                     </ul>
                </li>


                <li>
                    <a href="javascript: void(0)" class="waves-effect">
                        <i class="ion-md-key"></i>
                        <span>Manage Permissions </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{route('role.index')}}">Roles</a></li>


                        @if(Auth::user()->role->view_permissions )
                        <li><a href="{{route('userpermission.index')}}">Permissions</a></li>
                        @endif
                     </ul>
                </li>


                <li>
                    <a href="javascript: void(0)" class="waves-effect">
                        <i class="ion-ios-create"></i>
                        <span>Manage Toast </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('toasty.index')}}">Toast</a></li>
                     </ul>
                </li>


                <li>
                    <a href="javascript: void(0)" class="waves-effect">
                        <i class="ion-md-paper-plane"></i>
                        <span> Manage Task </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{route('save_task.index')}}">Task</a></li>


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
                    <div class="container-fluid mt-3" id="notifDiv">

                        @php
                        $expirationDate = \Carbon\Carbon::parse($license->business_enddate);
                    @endphp

                    @if($expirationDate->isPast())
                        <div id="moving-text">
                            Your license has already expired.
                        </div>
                    @elseif($expirationDate->diffInDays(now()) <= 7)
                        <div id="moving-text">
                            Your license is about to expire in less than 7 days. Please renew it.
                        </div>
                    @endif

                        @yield('content')

                        {{-- {{ Auth::user()->role}} --}}
                         @stack('javascript')
                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->



                <!-- Footer Start -->
                    <footer class="footer">
                        <div class="container-fluid">
                    <div class="row">
                    <div class="col-md-12">
                    Developed by
                    <a href="#" target="_blank" style="color:blue;">Alvin</a>

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
                        <img src="{{ asset('images\layouts\light.png')}}" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked="">
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('images\layouts\dark.png')}}" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsstyle="assets/css/bootstrap-dark.min.css" data-appstyle="assets/css/app-dark.min.css">
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('images\layouts\rtl.png')}}" class="img-fluid img-thumbnail" alt="">
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




        <script src="{{ asset('js\vendor.min.js') }}"></script>



        <!-- Required datatable js -->
        <script src="{{ asset('libs\datatables\jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('libs\datatables\dataTables.bootstrap4.min.js') }}"></script>

        <!-- Buttons examples -->
        <script src="{{ asset('libs\datatables\dataTables.buttons.min.js') }}"></script>

        <!-- Responsive examples -->
        <script src="{{ asset('libs\datatables\dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('libs\datatables\responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('libs\datatables\dataTables.keyTable.min.js') }}"></script>

        <script src="{{ asset('libs\datatables\dataTables.select.min.js') }}"></script>


        <!-- Datatables init -->
        <script src="{{ asset('js\pages\datatables.init.js') }}"></script>


        <!-- App js -->
        <script src="{{ asset('js\app.min.js') }}"></script>

        <script src="{{ asset('js\sweetalert.js')}}"></script>

        <?php
        if(session('messages')){
          ?>
        <script>
        swal({
            title: "Success",
            text: "@php echo session('messages') @endphp",
            icon: "success",
            button: "Ok",
        });
        </script>
        <?php
        }

        if(session('error')){
          ?>
        <script>
        swal({
            title: "Error",
            text: "@php echo session('error') @endphp",
            icon: "error",
            button: "Ok",
        });
        </script>
        <?php
        }
        ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const showDetailsButton = document.getElementById('showDetailsButton');
                const detailsContainer = document.getElementById('detailsContainer');

                showDetailsButton.addEventListener('click', function() {
                    if (detailsContainer.style.display === 'none') {
                        detailsContainer.style.display = 'block';
                    } else {
                        detailsContainer.style.display = 'none';
                    }
                });
            });
        </script>
    </body>
</html>
