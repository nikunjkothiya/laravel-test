<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Signup | VTC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Viitor Cloud Testing" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/fav_icon-fade.png')}}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('css/app.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    <link href="{{ asset('css/custom.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <script src='https://www.hCaptcha.com/1/api.js' async defer></script>
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">

            @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible" id="emailmsg" role="alert">
                {{ Session::get('error') }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>
            </div>

            @endif
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-soft-primary" style="background-color: black !important;">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-light">Welcome User !</h5>
                                        <p class="text-light">Sign up to join to ViitorCloud.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{asset('images/profile-img.png')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="#">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{asset('images/logo-fade-main.png')}}" alt="Logo" class="rounded-circle">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="">
                                <form method="POST" action="{{ route('newuserregister') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="firstname" placeholder="Enter First Name" value="{{ old('first_name', null) }}" required>
                                    </div>
                                    @if($errors->has('first_name'))
                                    <span class="" role="alert" style="color: #ff0033;">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="lastname" placeholder="Enter Last Name" value="{{ old('last_name', null) }}" required>
                                    </div>

                                    @if($errors->has('last_name'))
                                    <span class="" role="alert" style="color: #ff0033;">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="useremail">Email</label>
                                        <input type="email" class="form-control" name="email" id="useremail" placeholder="Enter email" value="{{ old('email', null) }}" required>
                                    </div>
                                    @if($errors->has('email'))
                                    <span class="" role="alert" style="color: #ff0033;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password" required>
                                    </div>
                                    @if($errors->has('password'))
                                    <span class="" role="alert" style="color: #ff0033;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" class="form-control" name="dob" placeholder="Pick the dob" autocomplete="off" required>
                                    </div>
                                    @if($errors->has('dob'))
                                    <span class="" role="alert" style="color: #ff0033;">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                    @enderror

                                    <div class="form-group">
                                        <div class="h-captcha" data-sitekey="46b3c94f-d42e-42ae-9fde-cdd2b27e680c"></div>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit" style="background-color: #050505;">Log on</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>©
                            <script type="text/javascript">
                                var year = new Date();
                                document.write(year.getFullYear());
                            </script> ViitorCloud. Crafted with <i class="mdi mdi-heart text-danger"></i> by Nikunj
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('libs/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{ asset('libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ asset('libs/node-waves/waves.min.js')}}"></script>

    <!-- App js -->
    <script src="{{ asset('js/app.js')}}"></script>

</body>

</html>