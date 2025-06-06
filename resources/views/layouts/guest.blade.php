<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>The Real World University Platform</title>
    <!-- FAVICON LINK -->
    <link rel="shortcut icon" href="/backend/images/app-logo.png" height="10" width="20" type="image/x-icon" />
    <!-- STYLESHEETS -->
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" type="text/css" href="/frontend/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/frontend/css/vendor/bootstrap-theme.min.css" />
    <!-- FONT AWESOME -->
    <link rel="stylesheet" type="text/css" href="/frontend/css/vendor/font-awesome/css/font-awesome.min.css" />
    <!-- MAGNIFIC LIGHT BOX -->
    <link rel="stylesheet" type="text/css" href="/frontend/css/vendor/magnific/magnific-popup.css" />
    <!-- CAROUSEL STYLE LINK -->
    <link rel="stylesheet" type="text/css" href="/frontend/css/vendor/owl-carousel/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="/frontend/css/vendor/owl-carousel/owl.theme.css" />
    <link rel="stylesheet" type="text/css" href="/frontend/css/vendor/owl-carousel/carousel.css" />
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" type="text/css" href="/frontend/css/custom/style.css" />


</head>

<body data-spy="scroll" data-target=".navbar-fixed-top" data-offset="100">
    <!--================================= NAVIGATION START ==========================================-->
    <header>
        <nav class="topbar navbar navbar-default navbar-fixed-top clearfix" id="top-nav">
            <div class="container">
                <div class="logo-image">
                    <a href="#"><img src="/backend/images/app-logo.png" height="50" width="50"
                            alt="150x50" /></a>
                </div>
                <div class="navbar-right nav">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav" id="menu_1">
                                <li class="menu">
                                    <a href="#home" class="pagescroll"> Home </a>
                                </li>
                                <li class="menu">
                                    <a href="#services" class="pagescroll"> Services </a>
                                </li>
                                <li class="menu">
                                    <a href="#testimonial" class="pagescroll"> Testimonial </a>
                                </li>
                                <li class="menu">
                                    <a href="#news" class="pagescroll"> News </a>
                                </li>
                                <li class="menu">
                                    <a href="#contact" class="pagescroll"> Contact </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>
    </header>
    <!--================================= NAVIGATION END ==========================================-->
    <!--=================================  HEADER-1 START ==========================================-->
    <header>
        <div class="header-bgimage-1 bgimage-property  mt-0 clearfix" id="home">
            <div class="container">
                <div class="col-sm-12 header-div-1 header-padding text-center">
                    <h1>The Real World University Platform</h1>
                    <p class="second-para">Learn and Earn with us</p>
                    <div class="header-btn">
                        <a href="{{ route('register') }}" class="btn btn-1">Create Free Account</a>
                    </div> <br>
                    <!-- Vimeo Video Embed -->
                    <div class="video-wrapper"
                        style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%;">
                        <iframe title="vimeo-player" src="https://player.vimeo.com/video/872376280?h=2747630af7"
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" frameborder="0"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
    </header>
    <!--================================= HEADER-1 ENDS ============================================-->

    {{ $slot }}
    <!--================================= COPYRIGHT-1 START ==========================================-->
    <footer class="copyright-bg">
        <div class="container copyright text-center">
            <p>2022 &copy; All Rights Reserved</p>
        </div>
    </footer>
    <!--================================= COPYRIGHT-1 END ==========================================-->
    <!-- JQUERY LIBRARY -->
    <script type="text/javascript" src="/frontend/js/vendor/jquery.min.js"></script>
    <!-- BOOTSTRAP -->
    <script type="text/javascript" src="/frontend/js/vendor/bootstrap.min.js"></script>
    <!-- SLIDER JS FILES -->
    <script type="text/javascript" src="/frontend/js/vendor/slider/owl.carousel.min.js"></script>
    <script type="text/javascript" src="/frontend/js/vendor/slider/owl-slider.js"></script>
    <!-- COUNTER JS FILES -->
    <script type="text/javascript" src="/frontend/js/vendor/counter/counter-lib.js"></script>
    <script type="text/javascript" src="/frontend/js/vendor/counter/jquery.counterup.min.js"></script>
    <!-- MAGNIFIC LIGHT BOX -->
    <script type="text/javascript" src="/frontend/js/vendor/magnific/jquery.magnific-popup.js"></script>
    <!-- SUBSCRIBE MAILCHIMP -->
    <script type="text/javascript" src="/frontend/js/vendor/subscribe/subscribe_validate.js"></script>
    <!-- FORM VALIDATION -->
    <script type="text/javascript" src="/frontend/js/vendor/validate/jquery.validate.min.js"></script>
    <!-- SHUFFLE JS FILES -->
    <script type="text/javascript" src="/frontend/js/vendor/shuffle/modernizr.custom.min.js"></script>
    <script type="text/javascript" src="/frontend/js/vendor/shuffle/jquery.shuffle.js"></script>
    <script type="text/javascript" src="/frontend/js/vendor/shuffle/page.js"></script>
    <script type="text/javascript" src="/frontend/js/vendor/shuffle/evenheights.js"></script>
    <script type="text/javascript" src="/frontend/js/vendor/shuffle/homepage.js"></script>
    <!-- NUMBER VALIDATION JS FILES -->
    <script type="text/javascript" src="/frontend/js/vendor/number.js"></script>
    <!-- THEME JS -->
    <script type="text/javascript" src="/frontend/js/custom/custom.js"></script>

    <!-- Telegram Customer Service Button Floating at Bottom-Left -->
    <div class="telegram-customer-service-container">
        <a href="https://t.me/sylvianoha" class="telegram-customer-service-button" target="_blank">
            <svg class="telegram-customer-service-icon" viewBox="0 0 24 24">
                <path
                    d="M9.78 18.65l.28-4.23 7.68-6.92c.34-.31-.07-.46-.52-.19L7.74 13.3 3.64 12c-.88-.25-.89-.86.2-1.3l15.97-6.16c.73-.33 1.43.18 1.15 1.3l-2.72 12.81c-.19.91-.74 1.13-1.5.71L12.6 16.3l-2.82 2.35z" />
            </svg>
            <small>Customer Service</small>
        </a>
        <style>
            /* Scoped inline CSS to avoid conflicts */
            .telegram-customer-service-container {
                position: fixed;
                bottom: 20px;
                left: 20px;
                z-index: 1000;
                /* Ensure button is above other content */
            }

            .telegram-customer-service-container .telegram-customer-service-button {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background-color: #0088cc;
                color: white;
                padding: 10px 20px;
                border-radius: 25px;
                text-decoration: none;
                font-size: 16px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
                transition: background-color 0.3s;
                font-family: Arial, sans-serif;
            }

            .telegram-customer-service-container .telegram-customer-service-button:hover {
                background-color: #0077b3;
            }

            .telegram-customer-service-container .telegram-customer-service-icon {
                width: 20px;
                height: 20px;
                fill: white;
            }
        </style>
    </div>
</body>


</html>
