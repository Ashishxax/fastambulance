<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Fast Ambulance Admin Panel</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans|Francois+One:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #fff;
            background: #9e9e9e;
            font-family: 'ui-sans-serif';
        }

        .form-control {
            min-height: 41px;
            background: #fff;
            border-color: #e3e3e3;
            box-shadow: none !important;
            border-radius: 4px;
        }

        .form-control:focus {
            border-color: #70c5c0;
        }

        .login-form {
            width: 310px;
            margin: 0 auto;
            padding: 100px 0 30px;
        }

        .login-form form {
            color: #999;
            border-radius: 10px;
            margin-bottom: 5px;
            margin-top: 84px;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
            position: relative;
        }

        .login-form h2 {
            font-size: 24px;
            color: #454959;
            margin: 45px 0 25px;
            font-family: 'ui-sans-serif';
        }

        .login-form .avatar {
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: -50px;
            width: 95px;
            height: 95px;
            border-radius: 50%;
            z-index: 9;
            background: #70c5c0;
            padding: 15px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        }

        .login-form .avatar img {
            width: 100%;
        }

        .login-form .btn {
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            border: none;
        }

        .login-btn {
            font-size: 16px;
            font-weight: bold;
            background: #70c5c0;
            margin-bottom: 20px;
        }

        .login-btn:hover,
        .login-btn:active {
            background: #70c5c0 !important;
        }

        .social-btn {
            padding-bottom: 15px;
        }

        .social-btn .btn {
            margin-bottom: 10px;
            font-size: 14px;
            text-align: left;
        }

        .social-btn .btn:hover {
            opacity: 0.8;
            text-decoration: none;
        }

        .social-btn .btn-primary {
            background: #507cc0;
        }

        .social-btn .btn-info {
            background: #64ccf1;
        }

        .social-btn .btn-danger {
            background: #df4930;
        }

        .social-btn .btn i {
            float: left;
            margin: 1px 10px 0 5px;
            min-width: 20px;
            font-size: 18px;
        }

        .or-seperator {
            height: 0;
            margin: 0 auto 20px;
            text-align: center;
            border-top: 1px solid #e0e0e0;
            width: 30%;
        }

        .or-seperator i {
            padding: 0 10px;
            font-size: 15px;
            text-align: center;
            background: #fff;
            display: inline-block;
            position: relative;
            top: -13px;
            z-index: 1;
        }

        .login-form a {
            color: #fff;
            text-decoration: underline;
        }

        .login-form form a {
            color: #999;
            text-decoration: none;
        }

        .login-form a:hover,
        .login-form form a:hover {
            text-decoration: none;
        }

        .login-form form a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-form" {{-- style='background-image: url("/img/ambulance_image/ambulance.webp");' --}}>
        <form action="{{route('admin-login')}}" method="post">
            @csrf
            <div class="avatar">
                <img src="{{asset('assets/img/arkinglogo.png')}}" alt="Avatar" />
            </div>
            <h2 class="text-center">Arking Admin Panel</h2>

            <div class="or-seperator"><i>or</i></div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Sign in</button>
            </div>
            <p class="text-center small"><a href="#">Forgot Password?</a></p>
        </form>
        <p class="text-center small">Don't have an account? <a href="#">Sign up here!</a></p>
    </div>
</body>

</html>