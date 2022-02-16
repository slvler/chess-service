<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">





    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('format/login/css/bootstrap.min.css') }}">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('format/login/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('format/login/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('format/login/fonts/icomoon/style.css') }}">


    <title>Login #7</title>
</head>
<body>



<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('format/login/images/undraw_remotely_2j6y.svg') }}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <h3>Sign In</h3>

                            @if(Session::get('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if(Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif
                            <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
                        </div>
                        <form action="{{ route('user.save') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="form-group first">
                                <label for="username">Username</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="username">
                                <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="username">E - Mail</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="email">
                                <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                                <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                            </div>
                            <div class="form-group last mb-4">
                                <label for="password">Re-Password</label>
                                <input type="password" name="repassword" class="form-control" id="repassword">
                                <span class="text-danger">@error('repassword'){{ $message }} @enderror</span>
                            </div>

                            <input type="submit" value="Log In" class="btn btn-block btn-primary">
                            <span class="d-block text-left my-4 text-muted">&mdash; or login with &mdash;</span>

                            <a href="{{ route('user.login') }}"><span class="d-block text-left my-4 text-muted">&mdash; login page &mdash;</span></a>

                            <div class="social-login">
                                <a href="#" class="facebook">
                                    <span class="icon-facebook mr-3"></span>
                                </a>
                                <a href="#" class="twitter">
                                    <span class="icon-twitter mr-3"></span>
                                </a>
                                <a href="#" class="google">
                                    <span class="icon-google mr-3"></span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


<script src="{{ asset('format/login/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('format/login/js/popper.min.js') }}"></script>
<script src="{{ asset('format/login/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('format/login/js/main.js') }}"></script>

</body>
</html>
