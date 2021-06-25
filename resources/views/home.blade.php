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
        <h1>WELCOME TO HERE! YOU ARE SUCCESSFULLY LOGGED IN AS {{auth()->user()->name}}</h1>
    </div>



</body>

</html>