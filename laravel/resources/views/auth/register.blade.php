<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from d22roh5inpczgk.cloudfront.net/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2022 22:19:01 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:title" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:description" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:image" content="../../zenix.dexignzone.com/xhtml/social-image.png" />
    <meta name="format-detection" content="telephone=no">
    <title>Zenix -  Crypto Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">
    <link href="{{asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>
<body class="vh-100">
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <div class="text-center mb-3">
                                    <img src="images/logo-full.png" alt="">
                                </div>
                                <h4 class="text-center mb-4">Sign up your account</h4>

<center>

                                <!-- Validation Errors -->
        <x-auth-validation-errors class="alert-danger text-danger" :errors="$errors" />
</center>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label class="mb-1"><strong>Full-Name</strong></label>
                <input type="text" name="name" class="form-control" placeholder="Full-Name">
            </div>
            <div class="form-group">
                <label class="mb-1"><strong>Username</strong></label>
                <input type="text" name="username" class="form-control" placeholder="username">
            </div>
            <div class="form-group">
                <label class="mb-1"><strong>Email</strong></label>
                <input type="email" name="email" class="form-control" placeholder="hello@example.com">
            </div>
            <div class="form-group">
                <label class="mb-1"><strong>Phone-Number</strong></label>
                <input type="number" name="number" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label class="mb-1"><strong>Password</strong></label>
                <input type="password" name="password" class="form-control" value="Password">
            </div>
            <div class="form-group">
                <label class="mb-1"><strong>Confirm-Password</strong></label>
                <input type="password" name="password_confirmation" class="form-control" value="Confirm-Password">
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
            </div>
        </form>
                                <div class="new-account mt-3">
                                    <p>Already have an account? <a class="text-primary" href="{{route('login')}}">Sign in</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
