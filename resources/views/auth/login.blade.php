<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login MySPP</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="{{asset('Template/')}}/img/icon.png" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="{{asset('Template/')}}/plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('Template/')}}/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="{{asset('Template/')}}/plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="{{asset('Template/')}}/plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="{{asset('Template/')}}/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="{{asset('Template/')}}/dist/css/theme.min.css">
        <script src="{{asset('Template/')}}/src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" style="background-image: url('{{asset('Template/')}}/img/auth/login-bg.jpg')">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <h3>Login MySPP</h3>
                            <p>Happy to see you again!</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" placeholder="Masukkan Email" required="" >
                                    <i class="ik ik-user"></i>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password" name="password" class="form-control @error('email') is-invalid @enderror" placeholder="Password" required="" value="{{ old('password') }}">
                                    <i class="ik ik-lock"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                    </div>
                                <div class="sign-btn text-center">
                                    <button class="btn btn-theme" type="submit">Sign In</button>
                                </div>
                            </form>
                            <div class="register">
                                <p>Don't have an account? <a href="{{ route('register') }}">Create an account</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{asset('Template/')}}/src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="{{asset('Template/')}}/plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="{{asset('Template/')}}/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="{{asset('Template/')}}/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="{{asset('Template/')}}/plugins/screenfull/dist/screenfull.js"></script>
        <script src="{{asset('Template/')}}/dist/js/theme.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
