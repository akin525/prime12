<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from d22roh5inpczgk.cloudfront.net/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2022 22:17:50 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Buy Data, Airtime, Pay TV, Pay Electricity Conveniently!" />
    <meta property="og:title" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:description" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:image" content="../../zenix.dexignzone.com/xhtml/social-image.png" />
    <meta name="format-detection" content="telephone=no">
    <title>{{ Auth::user()->name }} Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/log.png')}}">
    <link rel="stylesheet" href="{{asset('vendor/chartist/css/chartist.min.css')}}">
    <link href="{{asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="v{{asset('endor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">


</head>
<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->

<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <a href="{{route('dashboard')}}" class="brand-logo">
            <img width="50" src="{{asset('images/log.png')}}">
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="input-group search-area right d-lg-inline-flex d-none">
                            <input type="text" class="form-control" placeholder="Find something here...">
                            <div class="input-group-append">
									<span class="input-group-text">
										<a href="javascript:void(0)">
											<i class="flaticon-381-search-2"></i>
										</a>
									</span>
                            </div>
                        </div>
                    </div>
                    <ul class="navbar-nav header-right main-notification">
                        <li class="nav-item dropdown notification_dropdown">
                            <a class="nav-link bell dz-theme-mode" href="#">
                                <i id="icon-light" class="fa fa-sun-o"></i>
                                <i id="icon-dark" class="fa fa-moon-o"></i>
                            </a>
                        </li>


                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                <img src="{{asset('images/avater.jpg')}}" width="20" alt=""/>
                                <div class="header-info">
                                    <span>{{ Auth::user()->name }}</span>
                                    <small>Customer</small>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <form  action="{{route('logout')}}" method="POST" class="dropdown-item ai-icon">
                                    @csrf
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                    <button type="submit" class="ml-2">Logout </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="sub-header">
                <div class="d-flex align-items-center flex-wrap mr-auto">
                    <h5 class="dashboard_bar">Dashboard</h5>
                </div>
                <div class="d-flex align-items-center">
                    <a href="javascript:void(0);" class="btn btn-xs btn-primary light mr-1">Today</a>
                    <a href="javascript:void(0);" class="btn btn-xs btn-primary light mr-1">Month</a>
                    <a href="javascript:void(0);" class="btn btn-xs btn-primary light">Year</a>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="deznav">
        <div class="deznav-scroll">
            <div class="main-profile">
                <div class="image-bx">
                    <img src="{{asset('images/avater.jpg')}}" alt="">
                    <a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
                </div>
                <h5 class="name"><span class="font-w400">Hello,</span> {{ Auth::user()->username }}</h5>
                <p class="email">{{ Auth::user()->email }}</p>
            </div>
            <ul class="metismenu" >
                <li><a href="{{route('dashboard')}}" class="ai-icon">
                        <i class="flaticon-144-layout"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li><a class="ai-icon" href="{{route('fund')}}" aria-expanded="false">
                        <i class="flaticon-008-credit-card"></i>
                        <span class="nav-text">Fund Wallet</span>
                    </a>
                </li>
                <li class="nav-label">Products</li>
                <li><a class="ai-icon" href="{{route('airtime')}}" aria-expanded="false">
                        <i class="flaticon-136-phone-call"></i>
                        <span class="nav-text">Buy Airtime</span>
                    </a>

                </li>
                <li><a class="ai-icon" href="{{route('select')}}" aria-expanded="false">
                        <i class="flaticon-381-network"></i>
                        <span class="nav-text">Buy Data</span>
                    </a>

                </li>
                <li><a class="ai-icon" href="{{route('tv')}}" aria-expanded="false">
                        <i class="flaticon-381-television"></i>
                        <span class="nav-text">Pay TV</span>
                    </a>

                </li>
                <li><a class="ai-icon" href="{{route('elect')}}" aria-expanded="false">
                        <i class="flaticon-111-power-button"></i>
                        <span class="nav-text">Pay Electricity</span>
                    </a>

                </li>
                <li><a href="{{route('invoice')}}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-book"></i>
                        <span class="nav-text">Invoice</span>
                    </a>
                </li>
            </ul>
            <div class="copyright">
                <p><strong>AWM Customer Dashboard</strong> © 2022 All Rights Reserved</p>
                <p class="fs-12">Design<span class="heart"></span> by Primedata</p>
            </div>
        </div>
    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->









































    <script src="{{asset('vendor/global/global.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{asset('vendor/peity/jquery.peity.min.js')}}"></script>

    <!-- Apex Chart -->
    <script src="{{asset('vendor/apexchart/apexchart.j')}}s"></script>

    <!-- Dashboard 1 -->
    <script src="{{asset('js/dashboard/dashboard-1.js')}}"></script>

    <script src="{{asset('vendor/owl-carousel/owl.carousel.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('js/deznav-init.js')}}"></script>
    <script src="{{asset('js/demo.js')}}"></script>
    <script src="{{asset('js/styleSwitcher.js')}}"></script>
    <!-- Datatable -->
    <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('js/deznav-init.js')}}"></script>
    <script src="{{asset('js/demo.j')}}s"></script>
    <script src="{{asset('js/styleSwitcher.js')}}"></script>
</body>

<!-- Mirrored from d22roh5inpczgk.cloudfront.net/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2022 22:18:44 GMT -->
</html>
