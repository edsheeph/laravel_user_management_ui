<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('sb-admin/css/carousel.css') }}" rel="stylesheet">

</head>

<body class="">
    <div class="carousel slide">
		<div class="carousel-inner">
			<div class="active item one"></div>
			<!--<div class="item two"></div>
			<div class="item three"></div>
			<div class="item four"></div>-->
		</div>
	</div>

    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-6 offset-lg-3">
                <div class="my-5 text-center">
                    <img class="" src="{{ asset('sb-admin/img/undraw_profile_2.svg') }}" alt="..." width="250px" height="250px">
                </div>
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            {{-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> --}}
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                    </div>

                                    @if(session()->has('notification'))
                                        <div class="alert alert-{{ session()->get('notification')['status'] }}">
                                            <div class="alert-body">
                                                {{ session()->get('notification')['message'] }}
                                            </div>
                                        </div>
                                    @endif

                                    <form class="user" action="{{ route('registerApi') }}" method="post" role="form" autocomplete="off">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="name" name="name"
                                                placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email" name="email"
                                                placeholder="Email Address">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password_confirmation" name="password_confirmation" placeholder="Repeat Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Register Account
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sb-admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sb-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sb-admin/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
