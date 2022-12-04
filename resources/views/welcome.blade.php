<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/skote/layouts/crypto-ico-landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Feb 2021 08:01:45 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('pagetitle') | Employee | HRMS</title>
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/pace-progress/themes/black/pace-theme-minimal.css') }}">
    @yield('stylesheets')
</head>

    <body data-bs-spy="scroll" data-bs-target="#topnav-menu" data-bs-offset="60">

        <nav class="navbar navbar-expand-lg navigation fixed-top sticky">
            <div class="container">
                <a class="navbar-logo" href="index.html">
                <img src="{{ asset('admin/images/logo.png') }}" alt="" class="logo logo-light" height="39"  >
                </a>

                <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
              
                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav ms-auto" id="topnav-menu" >
                        <li class="nav-item">
                            <a class="nav-link active" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#features">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Centers">Centers</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#faqs">FAQs</a>
                        </li>

                    </ul>

                    <div class="my-2 ms-lg-2">
                    <div class="navbar-item">
                            
                            @if (Route::has('login'))
                            <div class="navbar-item">
                    @auth
                   <a id="#login-btn" href="{{ route('login') }}" class="btn btn-outline-success w-xs" > Login</a>
                    @else
                        <a id="#login-btn" href="{{ route('login') }}" class="btn btn-outline-success w-xs" > Login</a>

                        @if (Route::has('register'))
                            <a id="#signup-btn" href="{{ route('register') }}" class="btn btn-outline-success w-xs" >Signup</a>
                        @endif
                    @endauth
                </div>
            @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- hero section start -->
        <section class="section hero-section bg-ico-hero" id="home">
            <div class="bg-overlay bg-primary"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="text-white-50">
                            <h1 class="text-white font-weight-semibold mb-3 hero-title">TECHIN-Project portfolio Management </h1>
                            <p class="font-size-14">It will be as simple as occidental in fact to an English person, it will seem like simplified as a skeptical Cambridge</p>
                            
                            <div class="button-items mt-4">
                                <a href="#" class="btn btn-success">Get Whitepaper</a>
                                <a href="#" class="btn btn-light">How it work</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- hero section end -->

        <!-- currency price section end -->

     


        <!-- Footer start -->
        <footer class="landing-footer">
            <div class="container">

                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="mb-4 mb-lg-0">
                            <h5 class="mb-3 footer-list-title">Company</h5>
                            <ul class="list-unstyled footer-list-menu">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Team</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="mb-4 mb-lg-0">
                            <h5 class="mb-3 footer-list-title">Resources</h5>
                            <ul class="list-unstyled footer-list-menu">
                                <li><a href="#">Whitepaper</a></li>
                                <li><a href="#">Token sales</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="mb-4 mb-lg-0">
                            <h5 class="mb-3 footer-list-title">Links</h5>
                            <ul class="list-unstyled footer-list-menu">
                                <li><a href="#">Tokens</a></li>
                                <li><a href="#">Roadmap</a></li>
                                <li><a href="#">FAQs</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <!-- end row -->

                <hr class="footer-border my-5">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <img src="assets/images/logo-light.png" alt="" height="20">
                        </div>
    
                        <p class="mb-2"><script>document.write(new Date().getFullYear())</script> © Skote. Design & Develop by Themesbrand</p>
                        <p>It will be as simple as occidental in fact, it will be to an english person, it will seem like simplified English, as a skeptical</p>
                    </div>

                </div>
            </div>
            <!-- end container -->
        </footer>
        <!-- Footer end -->

        <!-- JAVASCRIPT -->
        
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('assets/plugins/pace-progress/pace.min.js') }}"></script>
    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/crypto-ico-landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Feb 2021 08:01:59 GMT -->
</html>
