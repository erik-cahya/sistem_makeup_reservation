<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8">

    <title>ProUI - Responsive Bootstrap Admin Template</title>

    <meta name="description"
        content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
    <link rel="apple-touch-icon" href="img/icon72.png" sizes="72x72">
    <link rel="apple-touch-icon" href="img/icon76.png" sizes="76x76">
    <link rel="apple-touch-icon" href="img/icon114.png" sizes="114x114">
    <link rel="apple-touch-icon" href="img/icon120.png" sizes="120x120">
    <link rel="apple-touch-icon" href="img/icon144.png" sizes="144x144">
    <link rel="apple-touch-icon" href="img/icon152.png" sizes="152x152">
    <link rel="apple-touch-icon" href="img/icon180.png" sizes="180x180">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Bootstrap is included in its original form, unaltered -->
    <link rel="stylesheet" href="{{ asset('vendor/admin') }}/css/bootstrap.min.css">

    <!-- Related styles of various icon packs and plugins -->
    <link rel="stylesheet" href="{{ asset('vendor/admin') }}/css/plugins.css">

    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="{{ asset('vendor/admin') }}/css/main.css">

    <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    <link rel="stylesheet" href="{{ asset('vendor/admin') }}/css/themes.css">
    <!-- END Stylesheets -->

    <!-- Modernizr (browser feature detection library) -->
    <script src="{{ asset('vendor/admin') }}/js/vendor/modernizr.min.js"></script>
</head>

<body>
    <!-- Login Alternative Row -->
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                <div id="login-alt-container">
                    <!-- Title -->
                    <h1 class="push-top-bottom">
                        <i class="gi gi-dress"></i> <strong>Komala Santika</strong> Makeup<br>
                        <small>Silahkan Login untuk Melakukan Booking...</small>
                    </h1>
                    <!-- END Title -->



                </div>
            </div>
            <div class="col-md-5">
                <!-- Login Container -->
                <div id="login-container">
                    <!-- Login Title -->
                    <div class="login-title text-center">
                        <h1><strong>Login</strong> or <strong>Register</strong></h1>
                    </div>
                    <!-- END Login Title -->

                    <!-- Login Block -->
                    <div class="block push-bit">
                        <!-- Login Form -->
                        <form action="{{ route('login') }}" method="post" id="form-login" class="form-horizontal">
                            @csrf

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                        <input type="text" id="email" name="email" value="{{ old('email') }}"
                                            class="form-control input-lg" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                        <input type="password" id="login-password" name="password"
                                            class="form-control input-lg" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-actions">
                                <div class="col-xs-4">
                                    <label class="switch switch-primary" data-toggle="tooltip" title="Remember Me?">
                                        <input type="checkbox" id="login-remember-me" name="login-remember-me" checked>
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <button type="submit" class="btn btn-sm btn-primary"><i
                                            class="fa fa-angle-right"></i> Login to Dashboard</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 text-center">
                                    <a href="javascript:void(0)" id="link-register-login"><small>Create a new
                                            account</small></a>
                                </div>
                            </div>
                        </form>
                        <!-- END Login Form -->

                        <!-- Reminder Form -->
                        <form action="login_alt.html#reminder" method="post" id="form-reminder"
                            class="form-horizontal display-none">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                        <input type="text" id="reminder-email" name="reminder-email"
                                            class="form-control input-lg" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-actions">
                                <div class="col-xs-12 text-right">
                                    <button type="submit" class="btn btn-sm btn-primary"><i
                                            class="fa fa-angle-right"></i> Reset Password</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 text-center">
                                    <small>Did you remember your password?</small> <a href="javascript:void(0)"
                                        id="link-reminder"><small>Login</small></a>
                                </div>
                            </div>
                        </form>



                        <!-- Register Form -->
                        <form action="{{ route('register') }}" method="post" id="form-register"
                            class="form-horizontal display-none">
                            @csrf

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                        <input type="text" id="name" name="name"
                                            class="form-control input-lg" placeholder="Name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                        <input type="text" id="email" name="email"
                                            class="form-control input-lg" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                        <input type="password" id="password" name="password"
                                            class="form-control input-lg" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                        <input type="password" id="password_confirmation"
                                            name="password_confirmation" class="form-control input-lg"
                                            placeholder="Verify Password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-actions">
                                <div class="col-xs-6">

                                </div>
                                <div class="col-xs-6 text-right">
                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>
                                        Register Account</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 text-center">
                                    <small>Do you have an account?</small> <a href="javascript:void(0)"
                                        id="link-register"><small>Login</small></a>
                                </div>
                            </div>
                        </form>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <!-- END Reminder Form -->

                        <!-- END Register Form -->
                    </div>
                    <!-- END Login Block -->
                </div>
                <!-- END Login Container -->
            </div>
        </div>
    </div>
    <!-- END Login Alternative Row -->

    <!-- Modal Terms -->
    <div id="modal-terms" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Terms &amp; Conditions</h4>
                </div>
                <div class="modal-body">
                    <h4>Title</h4>
                    <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum
                        lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis
                        ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et
                        facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at
                        lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum
                        lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis
                        ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et
                        facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at
                        lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <h4>Title</h4>
                    <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum
                        lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis
                        ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et
                        facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at
                        lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum
                        lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis
                        ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et
                        facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at
                        lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <h4>Title</h4>
                    <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum
                        lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis
                        ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et
                        facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at
                        lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum
                        lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis
                        ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et
                        facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at
                        lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Terms -->

    <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
    <script src="{{ asset('vendor/admin') }}/js/vendor/jquery.min.js"></script>
    <script src="{{ asset('vendor/admin') }}/js/vendor/bootstrap.min.js"></script>
    <script src="{{ asset('vendor/admin') }}/js/plugins.js"></script>
    <script src="{{ asset('vendor/admin') }}/js/app.js"></script>

    <!-- Load and execute javascript code used only in this page -->
    <script src="{{ asset('vendor/admin') }}/js/pages/login.js"></script>
    <script>
        $(function() {
            Login.init();
        });
    </script>
</body>

</html>
