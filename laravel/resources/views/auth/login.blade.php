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
    <title>AWM Login in</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/dlog.jpeg')}}">
    <link href="{{asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <style>

        * {
            padding: 0;
            margin: 0
        }


        button {
            padding: 20px 30px;
            font-size: 1.5em;
            /*width:200px;*/
            cursor: pointer;
            border: 0px;
            position: relative;
            margin: 20px;
            transition: all .25s ease;
            background: rgba(116, 23, 231, 1);
            color: #fff;
            overflow: hidden;
            border-radius: 10px
        }

        .load {
            position: absolute;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            background: inherit;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: inherit
        }

        .load::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            border: 3px solid #fff;
            width: 30px;
            height: 30px;
            border-left: 3px solid transparent;
            border-bottom: 3px solid transparent;
            animation: loading1 1s ease infinite;
            z-index: 10
        }

        .load::before {
            content: '';
            position: absolute;
            border-radius: 50%;
            border: 3px dashed #fff;
            width: 30px;
            height: 30px;
            border-left: 3px solid transparent;
            border-bottom: 3px solid transparent;
            animation: loading1 2s linear infinite;
            z-index: 5
        }

        @keyframes loading1 {
            0% {
                transform: rotate(0deg)
            }

            100% {
                transform: rotate(360deg)
            }
        }

        button.active {
            transform: scale(.85)
        }

        button.activeLoading .loading {
            visibility: visible;
            opacity: 1
        }

        button .loading {
            opacity: 0;
            visibility: hidden
        }
    </style>

</head>

<body class="vh-100">
@include('sweetalert::alert')
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <div class="text-center mb-3">
                                    <img width="100" src="{{asset('images/dlog.jpeg')}}" alt="">
                                </div>
<center>
                                <!-- Session Status -->
        <x-auth-session-status class="alert-danger text-danger" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="alert-danger text-danger" :errors="$errors" />
</center>
                                <h4 class="text-center mb-4">Sign in your account</h4>

        <form method="POST" action="{{ route('login') }}">
            @csrf
                <div class="form-group">
                    <label class="mb-1"><strong>Email</strong></label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label class="mb-1"><strong>Password</strong></label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="password" required>
                </div>
                <div class="form-row d-flex justify-content-between mt-4 mb-2">
                    <!-- Remember Me -->
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>


            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block">Sign Me In
                            <span class="load loading"></span>
                        </button>
                    </div>
                    <script>
                        const btns = document.querySelectorAll('button');
                        btns.forEach((items)=>{
                            items.addEventListener('click',(evt)=>{
                                evt.target.classList.add('activeLoading');
                            })
                        })
                    </script>

            </div>
        </form>
                                <div class="new-account mt-3">
                                    <p>Don't have an account? <a class="text-primary" href="{{route('register')}}">Sign up</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{asset('vendor/global/global.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('js/custom.min.js')}}"></script>
<script src="{{asset('js/deznav-init.js')}}"></script>
<script src="{{asset('js/demo.js')}}"></script>
<script src="{{asset('js/styleSwitcher.js')}}"></script>
</body>

<!-- Mirrored from d22roh5inpczgk.cloudfront.net/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2022 22:19:02 GMT -->
</html>
