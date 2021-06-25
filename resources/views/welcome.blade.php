<!doctype html>
<html lang="en">

<head>
    <title>Login/Register Modal by Creative Tim</title>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


    <style>
        body {
            padding-top: 60px;
        }
    </style>

    <link href="{{asset('theme/assets/css/bootstrap.css')}}" rel="stylesheet" />

    <link href="{{asset('theme/assets/css/login-register.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

    <script src="{{asset('theme/assets/js/jquery-1.10.2.js')}}" type="text/javascript"></script>
    <script src="{{asset('theme/assets/js/bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('theme/assets/js/login-register.js')}}" type="text/javascript"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <a class="btn big-login" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Log
                    in</a>
                <a class="btn big-register" data-toggle="modal" href="javascript:void(0)"
                    onclick="openRegisterModal();">Register</a>
            </div>
            <div class="col-sm-4"></div>
        </div>


        <div class="modal fade login" id="loginModal">
            <div class="modal-dialog login animated">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Login with</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box">
                            <div class="content">
                                <div class="social">
                                    <a class="circle github" href="#">
                                        <i class="fa fa-github fa-fw"></i>
                                    </a>
                                    <a id="google_login" class="circle google" href="#">
                                        <i class="fa fa-google-plus fa-fw"></i>
                                    </a>
                                    <a id="facebook_login" class="circle facebook" href="#">
                                        <i class="fa fa-facebook fa-fw"></i>
                                    </a>
                                </div>
                                <div class="division">
                                    <div class="line l"></div>
                                    <span>or</span>
                                    <div class="line r"></div>
                                </div>
                                <div class="error"></div>
                                <div class="form loginBox">
                                    <span id="loginerror" class="error text-danger"></span>
                                    <form id="loginForm">
                                        @csrf
                                        <input id="lemail" class="form-control" type="text" placeholder="Email"
                                            name="lemail">
                                        <input id="lpassword" class="form-control" type="password"
                                            placeholder="Password" name="lpassword">
                                        <input class="btn btn-default btn-login" type="submit" value="Login">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="content registerBox" style="display:none;">
                                <div class="form">
                                    <span id="registered" class=" text-success "></span>
                                    <form id="registerForm" method="post">
                                        @csrf
                                        <input id="name" class="form-control" type="text" placeholder="Name"
                                            name="name" />
                                        <input id="email" class="form-control" type="email" placeholder="Email"
                                            name="email" />
                                        <input id="password" class="form-control" type="password" placeholder="Password"
                                            name="password" />
                                        <input id="password_confirmation" class="form-control" type="password"
                                            placeholder="Repeat Password" name="password_confirmation">
                                        <span id="notmatch" class="error text-danger"></span>
                                        <input class="btn btn-default btn-register" type="submit"
                                            value="Create account">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>Looking to
                                <a href="javascript: showRegisterForm();">create an account</a>
                                ?</span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                            <span>Already have an account?</span>
                            <a href="javascript: showLoginForm();">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            openLoginModal();
            $('#registerForm').submit(function(e) {
                e.preventDefault();
                var token = $('input[name="_token"').val();
                var name = $('#name').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var password_confirmation = $('#password_confirmation').val();



                $.ajax({
                    url: '{{route("register")}}',
                    type: 'post',
                    data: {
                        '_token': token,
                        'name': name,
                        'email': email,
                        'password': password,
                        'passconfirm': password_confirmation

                    },
                    success: function(res) {
                        if (res.error) {
                            $('#notmatch').text(res.error)
                        }
                        if (res.success) {
                            $('#registered').text(res.success);
                            openLoginModal();
                        }
                    }
                })
            })


            //Login Functionality
            $('#loginForm').submit(function(e) {
                e.preventDefault();
                var email = $('#lemail').val();
                var password = $('#lpassword').val();
                var token = $('input[name="_token"').val();

                $.ajax({
                    url: '{{route("login")}}',
                    type: "post",
                    data: {
                        '_token': token,
                        'email': email,
                        'password': password
                    },
                    success: function(res) {
                        console.log(res)
                        if (res.error) {
                            $('#loginerror').text(res.error)
                        }
                        if (res.success) {
                            window.location.href = '/home';
                        }
                    }
                })
            })
        });
    </script>


</body>

</html>