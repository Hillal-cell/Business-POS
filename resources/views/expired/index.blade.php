<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title> Pos </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets\images\favicon.ico">

        <!-- App css -->
        <link href="{{ asset('css\bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">

        <link href="{{ asset('css\icons.min.css')}}" rel="stylesheet" type="text/css">

        <link href="{{ asset('css\app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet">

    </head>

    <body class="authentication-page">

        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">
                            <div class="card-header text-center p-4 bg-primary">
                                <h4 class="text-white mb-0 mt-0">{{$name->business_name}}</h4>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h1 class="text-error display-4 font-weight-bold">500</h1>
                                    <h3 class="text-uppercase font-weight-bold text-danger mt-4">Your License has Expired</h3>
                                    <p class="text-muted mt-4"> To renew your license!!! you can  contact our <a href="" class="text-primary"><b>Support</b></a></p>


                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="" class="btn btn-md btn-block btn-primary waves-effect waves-light mt-4"
                                        onclick="event.preventDefault();
                                      this.closest('form').submit();"
                                        >

                                        <span>Return to Login</span>
                                    </a>
                                    </form>
                                </div>

                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <!-- end row -->

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>
        </div>

        <!-- Vendor js -->
        <script src="{{ asset('js\vendor.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('js\app.min.js') }}"></script>

    </body>

</html>
