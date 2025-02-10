<?php
include 'db.php';
session_start();
if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true) {
    $user_id = $_SESSION['user_data']['id']; // Get user ID from session

}else{
    // header("Location: sing_in.php");
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Prolend - Product Landing Page | Default</title>

    <!-- Favicon  -->
    <link rel="icon" href="assets/img/favicon.png">

    <!-- ***** All CSS Files ***** -->

    <!-- Style css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Responsive css -->
    <link rel="stylesheet" href="assets/css/responsive.css">

    <style>
        .ptb_100 {
            padding: 111px 0 !important;
        }
        .nav-item .nav-link.login, .nav-item .nav-link.create-profile {
            background-color: white;
            color: red !important;
            border-radius: 25px;
            padding: 4px 12px !important;
            transition: all 0.3s ease-in-out;
        }
        .nav-item:has(.nav-link.login), .nav-item:has(.nav-link.create-profile) {
            align-items: center;
            padding: 11px;
            color: red;

            display: flex;
        }

        .navbar .navbar-nav .nav-link {
                padding-right: 0.25rem ;

            }
        .custom_bg{
            background: linear-gradient(-47deg, #f55171 0%, #f55171 100%);
            
        }
        a#navbarDropdownMenuLink {
            color: white;
            font-size: 17px;
        }
        .navbar-dark.navbar-sticky-on .navbar-nav .nav-link {
            color: white;

        }
        .navbar-nav .nav-link {
            color: #fff;
            font-size: 17px;
            text-transform: uppercase;

        }
        .intro-slide {
                height: 100vh;
            }
            .Our {
                background: #f55171;
                margin-top: 90px;
                padding: 60px 0px;
            }
            .titlepage {
                text-align: center;
                padding-bottom: 60px;
            }
            .Our .titlepage h2 {
                color: #fff;
                margin-bottom: 20px;
                padding-bottom: 10px;
            }
            .Our .titlepage span {
                
                color: #fff;
            }

            .Our_box {
                text-align: center;
            }

            .Our_box i {
                border: #fff solid 4px;
                width: 160px;
                height: 160px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto;
                border-radius: 85px;
                transition: ease-in all 0.1s;
                cursor: pointer;
            }

            .Our_box h4 {
                color: #fff;
                text-transform: uppercase;
                font-size: 30px;
                line-height: 30px;
                font-weight: 400;
                padding: 0;
                padding-top: 35px;
            }

            .Our_box p {
                color: #fff;
                font-size: 17px;
                line-height: 28px;
                padding: 25px 0;
            }
            .Our_box i:hover {
                width: 140px;
                height: 140px;
                transition: ease-in all 0.2s;
            }
            .Our .read_more {
                margin: 0 auto;
                display: block;
            }
            .read_more {
                font-size: 17px;
                background-color: #fff;
                color: #000;
                padding: 13px 0px;
                width: 100%;
                max-width: 190px;
                text-align: center;
                display: inline-block;
                transition: ease-in all 0.5s;
            }

            .weare {
                background: #fff;
                padding-top: 90px;
            }

            .weare .titlepage h2 {
                margin-bottom: 20px;
            }
            .weare .titlepage h2::after {
                border-bottom: #f55171 solid 1px;
                content: "";
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                width: 100%;
                max-width: 259px;
                margin: 0 auto;
            }
            .weare .weare_box {
                text-align: center;
            }
            .weare .weare_box p {
                color: #000;
                font-size: 17px;
                line-height: 28px;
                padding: 35px 0px;
            }
            .weare .weare_box .read_more {
                background: #000;
                color: #fff;
            }
            .weare .weare_box figure img {
                border-radius: 190px;
                background: #f55171;
                padding: 15px;
            }
            .read_more {
                font-size: 17px;
                background-color: #fff;
                color: #000;
                padding: 13px 0px;
                width: 100%;
                max-width: 190px;
                text-align: center;
                display: inline-block;
                transition: ease-in all 0.5s;
            }

    </style>
</head>

<body>
    <!--====== Preloader Area Start ======-->
    <div class="preloader-main">
        <div class="preloader-wapper">
            <svg class="preloader" xmlns="http://www.w3.org/2000/svg" version="1.1" width="600" height="200">
                <defs>
                    <filter id="goo" x="-40%" y="-40%" height="200%" width="400%">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                        <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -8" result="goo" />
                    </filter>
                </defs>
                <g filter="url(#goo)">
                    <circle class="dot" cx="50" cy="50" r="25" fill="#F74B54" />
                    <circle class="dot" cx="50" cy="50" r="25" fill="#F74B54" />
                </g>
            </svg>
            <div>
                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>
            </div>
        </div>
    </div>

    <!--====== Scroll To Top Area Start ======-->
    <div id="scrollUp" title="Scroll To Top">
        <i class="fas fa-arrow-up"></i>
    </div>
    <!--====== Scroll To Top Area End ======-->

    <div class="main">
        <!-- ***** Header Start ***** -->
        <header class="navbar navbar-sticky navbar-expand-lg navbar-dark custom_bg">
            <div class="container position-relative">
                <a class="navbar-brand" href="index.html">
                    <img class="navbar-brand-regular" src="assets/img/logo/logo2.png" style="width: 100px;" alt="brand-logo">
                    <img class="navbar-brand-sticky" src="assets/img/logo/logo2.png"  style="    width: 100px;"  alt="sticky brand-logo">
                </a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-inner">
                    <!--  Mobile Menu Toggler -->
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <nav>
                        <ul class="navbar-nav" id="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link scroll" href="#home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link scroll" href="#about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link scroll" href="#contact">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link scroll" href="#service">Service</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link scroll" href="#gallery">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link scroll" href="#experience">Experience</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link scroll" href="#stories">Stories</a>
                            </li>
                            <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login'] == true){ ?>
                                <li class="nav-item">
                                    <div>
                                        <a class="nav-link login" href="logout.php">Logout</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div>
                                        <a class="nav-link  create-profile" href="my_profile.php">My Profile</a>
                                    </div>
                                </li>
                            <?php }else{ ?>
                                <li class="nav-item">
                                    <div>
                                        <a class="nav-link login" href="sing_in.php">Login</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div>
                                        <a class="nav-link create-profile" href="sing_up.php">Create Profile</a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                        

      
                        </ul>
                    </nav>
                    <!-- _____ -->

                    <!-- _____ -->
                </div>
            </div>
        </header>
        <!-- ***** Header End ***** -->