<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta data -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="All Green Group">
    <meta name="keywords" content="cloud, file transfer">
    <meta name="description" content="Upload Easy - File Share and File Transfer Service">
    <!-- Title -->
    <title>Upload Easy - File Share and File Transfer Service</title>
    <!-- Animate -->
    <link href="assets/css/animated.css" rel="stylesheet"/>
    <!-- Bootstrap 5 -->
    <link href="assets/plugins/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons -->
    <link href="assets/css/icons.css" rel="stylesheet"/>

    <!-- All Styles -->
    <link href="assets/css/app.css" rel="stylesheet"/>
    <!--Custom User CSS File -->

<body class="app sidebar-mini frontend-body ">
<!-- Page -->
<div class="page">
    <div class="page-main">
        <section id="main-wrapper">
            <div class="relative flex items-top justify-center min-h-screen">
                <div class="container-fluid fixed-top" id="navbar-container">
                    <div class="container">
                        <div class="row">
                            <nav class="navbar navbar-expand-lg navbar-light w-100" id="navbar-responsive">
                                <a class="navbar-brand" href="index.html">
                                    <img id="brand-img" src="assets/img/brand/logo.png" alt="">
                                </a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse section-links" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link scroll active" href="#main-wrapper">Home <span
                                                    class="sr-only">(current)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link scroll" href="#pricing-wrapper">Pricing</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link scroll" href="#contact-wrapper">Contact Us</a>
                                        </li>
                                        @if(isset(Auth::user()->name))
                                            <li class="nav-item text-center frontend-buttons">
                                                <div>
                                                    <a href="{{route('dashboard')}}" class="action-button"
                                                       id="login-button">{{Auth::user()->name}}</a>
                                                </div>
                                            </li>
                                        @else
                                            <li class="nav-item text-center frontend-buttons">
                                                <div>
                                                    <a href="{{route('login')}}" class="action-button"
                                                       id="login-button">Login</a>
                                                    <a href="{{route('register')}}"
                                                       class="ml-2 action-button register-button pl-5 pr-5">Sign
                                                        Up</a>
                                                </div>
                                            </li>

                                        @endif
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- App-Content -->
        <div class="main-content">
            <div class="side-app">
                <section class="header">
                    <!--Content before waves-->
                    <div class="inner-header flex">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-12">
                                <h2 class="text-warning">Upload Easy</h2>
                                <h1 class="text-white">Transfer big files around the world</h1>
                                <h4>Secure, durable cloud solution for file transfering Unmatched durability and
                                    scalability</h4>
                            </div>
                        </div>
                        <img class="hederimg" src="assets/img/header.png" alt="">
                    </div>
                    <svg class="waves" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                        <defs>
                            <path id="gentle-wave"
                                  d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                        </defs>
                        <g class="parallax">
                            <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7"></use>
                            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)"></use>
                            <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)"></use>
                            <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff"></use>
                        </g>
                    </svg>
                    <!--Waves end-->
                </section>
                <section id="main-wrapper">
                    <div class="justify-center min-h-screen">
                        <div class="container-fluid">
                            <div class="central-banner">
                                <div class="m-auto mt-4 mb-4 col-lg-6 col-sm-12 mt-8 upload-responsive border-dashed">
                                    <form id="uploadForm" method="POST" enctype="multipart/form-data"> @csrf
                                        <input type="file" class="mt-5 mb-5 ml-0 action-button" name="file"
                                               id="fileInput">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 0%"
                                                 aria-valuenow="0"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <button type="submit" class="mt-5 mb-5 ml-0 action-button register-button "
                                                id="uploadButton">Transfer
                                        </button>
                                    </form>
                                    <p class="messages"></p>

                                    <form style="display: none;" class="email_send" method="POST" action="{{ route('send.email') }}">
                                        @csrf
                                        <label for="email">Recipient Email:</label>
                                        <input type="email" name="email" required>
                                        <br>
                                        <label for="message">Message:</label>
                                        <textarea class="linktext" name="message" rows="4" required></textarea>
                                        <br>
                                        <button type="submit">Send Email</button>
                                    </form>
                                    @if (session('message'))
                                        <div>
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- DOWNLOAD LINK MODAL -->
                    <div class="modal fade" id="linkResultModal" tabindex="-1" role="dialog"
                         aria-labelledby="projectModalLabel" aria-hidden="true" data-bs-backdrop="static"
                         data-bs-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content special-card">
                                <div class="modal-body pb-0 pl-6 pr-6 pt-6">
                                    <div class="input-box no-gutters">
                                        <div class="col-sm-12 text-center">
                          <span>
                            <i class='fa-solid fa-cloud-check fs-40 mb-4 text-primary'></i>
                          </span>
                                            <h4 class="font-weight-bold fs-22"> Download Links Created</h4>
                                            <p class="mb-4">File are successfully uploaded and download links are listed
                                                below</p>
                                            <div id="files-data"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center pb-3">
                                    <button type="button" class="btn btn-cancel mb-4" data-bs-dismiss="modal"
                                            onclick="resetData()">Transfer New File
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END DOWNLOAD LINK MODAL -->
                    <!-- EMAIL DOWNLOAD LINK MODAL -->
                    <div class="modal fade" id="emailResultModal" tabindex="-1" role="dialog"
                         aria-labelledby="projectModalLabel" aria-hidden="true" data-bs-backdrop="static"
                         data-bs-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-body pb-0 pl-6 pr-6 pt-6">
                                    <div class="input-box no-gutters">
                                        <div class="col-sm-12 text-center">
                          <span>
                            <i class='fa-solid fa-envelope-circle-check fs-40 mb-4 text-primary'></i>
                          </span>
                                            <h4 class="font-weight-bold fs-22"> Email Sent Successfully</h4>
                                            <p class="mb-4">File are successfully uploaded and email has been sent with
                                                download links listed below</p>
                                            <div id="email-files-data"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center pb-3">
                                    <button type="button" class="btn btn-cancel mb-4" data-bs-dismiss="modal"
                                            onclick="resetData()">Transfer New File
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END EMAIL DOWNLOAD LINK MODAL -->
                </section>
                <!-- SECTION - FEATURES
                    ========================================================-->
                <section id="features-wrapper">
                    <div class="container">
                        <div class="row text-center mt-8 mb-8">
                            <div class="col-md-12 title">
                                <h2>
                                    <b class="downborder">
                                        <span class="text-success">Upload Easy</span> Benefits </b>
                                </h2>
                                <p>Enjoy the full flexibility of the platform with ton of features</p>
                            </div>
                        </div>
                        <!-- LIST OF SOLUTIONS -->
                        <div class="row d-flex" id="solutions-list">
                            <div class="col-md-4 col-sm-12 text-end">
                                <!-- SOLUTION -->
                                <div class="col-sm-12 mb-6">
                                    <div class="solution" data-aos="zoom-in" data-aos-delay="1000" data-aos-once="true"
                                         data-aos-duration="1000">
                                        <div class="solution-content">
                                            <div class="solution-logo mb-3">
                                                <img src="assets/img/files/01.png" alt="">
                                            </div>
                                            <h5>Convenient</h5>
                                            <p>Share any type of file you like, with anyone, anywhere in the world.
                                                Generous data transfer rates and file size limits ensure even big files
                                                can be shared expeditiously.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SOLUTION -->
                                <!-- SOLUTION -->
                                <div class="col-sm-12 mb-6">
                                    <div class="solution" data-aos="zoom-in" data-aos-delay="1500" data-aos-once="true"
                                         data-aos-duration="1500">
                                        <div class="solution-content">
                                            <div class="solution-logo mb-3">
                                                <img src="assets/img/files/09.png" alt="">
                                            </div>
                                            <h5>Anonymous</h5>
                                            <p>We value privacy and we know that you do, too. Our focus is on providing
                                                a cool file sharing service, not aggregating or selling your personal
                                                data for profit.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SOLUTION -->
                                <!-- SOLUTION -->
                                <div class="col-sm-12 mb-6">
                                    <div class="solution" data-aos="zoom-in" data-aos-delay="2000" data-aos-once="true"
                                         data-aos-duration="2000">
                                        <div class="solution-content">
                                            <div class="solution-logo mb-3">
                                                <img src="assets/img/files/06.png" alt="">
                                            </div>
                                            <h5>Free</h5>
                                            <p>Upload Easy is free to use with no gotchas and no hidden fees. No account
                                                or credit card is required to get started. Simply upload your files and
                                                share the link. Your wallet will be none-the-lighter!</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SOLUTION -->
                            </div>
                            <div class="col-md-4 col-sm-12 d-flex text-center">
                                <div class="feature-text">
                                    <div>
                                        <h3>
                                            <b class="text-success me-2">Upload Easy</b>Provides the most durable
                                            solution in the world
                                        </h3>
                                    </div>
                                    <p>Give people simple tools, and they’ll do extraordinary things. Ultrafast file
                                        transfers, built-in customization, easier team collaboration. That’s the magic
                                        of Upload Easy</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <!-- SOLUTION -->
                                <div class="col-sm-12 mb-6">
                                    <div class="solution" data-aos="zoom-in" data-aos-delay="1000" data-aos-once="true"
                                         data-aos-duration="1000">
                                        <div class="solution-content">
                                            <div class="solution-logo mb-3">
                                                <img src="assets/img/files/05.png" alt="">
                                            </div>
                                            <h5>Faster Sharing</h5>
                                            <p>Use Upload Easy to move creative assets, large files, whole folders and
                                                entire projects all at the touch of a button.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SOLUTION -->
                                <!-- SOLUTION -->
                                <div class="col-sm-12 mb-6">
                                    <div class="solution" data-aos="zoom-in" data-aos-delay="1500" data-aos-once="true"
                                         data-aos-duration="1500">
                                        <div class="solution-content">
                                            <div class="solution-logo mb-3">
                                                <img src="assets/img/files/06.png" alt="">
                                            </div>
                                            <h5>Most Comprehensive Security</h5>
                                            <p>Your data is encrypted every step of the way. All communications to, from
                                                and among our servers including file uploads, file downloads and API
                                                requests is encrypted via HTTPS/TLS. In addition, as your uploaded file
                                                data is saved to our servers, it is re-secured using military-grade
                                                encryption.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SOLUTION -->
                                <!-- SOLUTION -->
                                <div class="col-sm-12 mb-6">
                                    <div class="solution" data-aos="zoom-in" data-aos-delay="2000" data-aos-once="true"
                                         data-aos-duration="2000">
                                        <div class="solution-content">
                                            <div class="solution-logo mb-3">
                                                <img src="assets/img/files/04.png" alt="">
                                            </div>
                                            <h5>High Availability</h5>
                                            <p>All Data is transfered securly and no chance of data loss.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SOLUTION -->
                            </div>
                        </div>
                        <!-- END LIST OF SOLUTIONS -->
                    </div>
                </section>
                <!-- SECTION - CUSTOMER FEEDBACKS
                    ========================================================-->
                <section id="pricing-wrapper" class="pt-3 pb-7">
                    <div class="container">
                        <div class="row text-center mb-3">
                            <div class="col-md-12 title">
                                <h2>
                                    <b class="downborder">
                                        <span class="text-success">Pricing</span>
                                    </b>
                                </h2>
                            </div>
                        </div>
                        <!-- LIST OF Pricing -->
                        <div class="row d-flex" id="pricing-list">
                            <div class="card-deck">
                                <div class="card text-center" data-aos="zoom-in" data-aos-delay="1000"
                                     data-aos-once="true" data-aos-duration="1000">
                                    <div class="price-icon">
                                        <i class="fa-sharp fa-solid fa-droplet"></i>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <span class="text-success">£0</span> /mo
                                        </h5>
                                        <strong class="card-text">Pro</strong>
                                        <p class="card-text m-0">Data Transfer Limit</p>
                                        <div class="mb-2">
                                            <strong class="text-warning">upto 10GB</strong>
                                        </div>
                                        <a href="register.html" class="btn">Sign Up</a>
                                    </div>
                                </div>
                                <div class="card active text-center" data-aos="zoom-in" data-aos-delay="1000"
                                     data-aos-once="true" data-aos-duration="1000">
                                    <div class="price-icon">
                                        <i class="fa-sharp fa-solid fa-megaphone fa-beat-fade"></i>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <span class="text-success">£4.99</span> /mo
                                        </h5>
                                        <strong class="card-text">PLUS</strong>
                                        <p class="card-text m-0">Data Transfer Limit</p>
                                        <div class="mb-2">
                                            <strong class="text-warning">upto 200GB</strong>
                                        </div>
                                        <a href="register.html" class="btn">Sign Up</a>
                                    </div>
                                </div>
                                <div class="card text-center" data-aos="zoom-in" data-aos-delay="1000"
                                     data-aos-once="true" data-aos-duration="1000">
                                    <div class="price-icon">
                                        <i class="fa-sharp fa-solid fa-fire"></i>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <span class="text-success">£9.99</span> /mo
                                        </h5>
                                        <strong class="card-text">PREMIUM</strong>
                                        <p class="card-text m-0">Data Transfer Limit</p>
                                        <div class="mb-2">
                                            <strong class="text-warning">UnLimited</strong>
                                        </div>
                                        <a href="{{route('register')}}" class="btn">Sign Up</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END LIST OF Pricing -->
                    </div>
            </div>
            </section>
            <!-- SECTION - BLOGS
              ========================================================-->
            <!-- SECTION - FAQ
              ========================================================-->
            <!-- SECTION - CONTACT US
              ========================================================-->
            <section id="contact-wrapper">
                <div class="container pt-9 pb-9">
                    <!-- SECTION TITLE -->
                    <div class="row text-center mb-2">
                        <div class="col-md-12 title">
                            <h2>
                                <b class="downborder">
                                    <span class="text-white">Contact US</span>
                                </b>
                            </h2>
                            <p>Reach out to us for additional information</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 contactmapdiv" data-aos="fade-left" data-aos-delay="300"
                             data-aos-once="true" data-aos-duration="700">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d79050.6176373153!2d-2.3090490547633395!3d51.745256023713715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48710c020e0597c7%3A0xb521e52fd9f14821!2sFive%20Valleys%20Shopping%20Centre!5e0!3m2!1sen!2suk!4v1686584304982!5m2!1sen!2suk"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="col-md-6 col-sm-12" data-aos="fade-right" data-aos-delay="300" data-aos-once="true"
                             data-aos-duration="700">
                            <form id="" action="https://uploadeasy.co/contact" method="POST"
                                  enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="mS1Mk1Sto3rAf13suSrCG4YMYV02HAfzAsAMPNsc">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="input-box mb-4">
                                            <input id="name" type="name" class="form-control " name="name" value=""
                                                   autocomplete="off" placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="input-box mb-4">
                                            <input id="lastname" type="text" class="form-control " name="lastname"
                                                   value="" autocomplete="off" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="input-box mb-4">
                                            <input id="email" type="email" class="form-control " name="email" value=""
                                                   autocomplete="off" placeholder="Email Address" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="input-box mb-4">
                                            <input id="phone" type="text" class="form-control " name="phone" value=""
                                                   autocomplete="off" placeholder="Phone Number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="input-box">
                                            <textarea class="form-control " name="message" rows="10" required
                                                      placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="recaptcha" id="recaptcha">
                                <div class="row justify-content-md-center text-center">
                                    <!-- ACTION BUTTON -->
                                    <div class="mt-2">
                                        <button type="submit" class="btn special-action-button">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- End Page -->
<!-- FOOTER SECTION
========================================================-->
<footer id="welcome-footer">
    <!-- FOOTER MAIN CONTENT -->
    <div id="footer" class="container text-center">
        <div class="row">
            <!-- FOOTER TITLE -->
            <div class="col-md-5 col-sm-12" id="footer-logo">
                <img src="assets/img/brand/logo-white.png" alt="Brand Logo">
                <p class="mb-0"></p>
                <div class="dropdown header-locale d-none" id="frontend-local">
                    <a class="nav-link icon" data-bs-toggle="dropdown">
                        <span class="fs-17 fa fa-globe pr-2"></span>
                        <span class="fs-12" style="vertical-align:middle">EN</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
                        <div class="local-menu">
                            <a href="index.html" class="dropdown-item d-flex">
                                <div class="text-info">
                                    <i class="flag flag-es mr-3"></i>
                                </div>
                                <div>
                                    <span class="font-weight-normal fs-12">Español</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END FOOTER TITLE & SOCIAL ICONS -->
            <!-- FOOTER LINKS -->
            <div class="col-md-7 col-sm-12" id="footer-links">
                <div class="row w-100">
                    <!-- INFORMATION LINKS -->
                    <div class="col-md-4 col-sm-12">
                        <h5>Information</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a href="index.html#pricing-wrapper" target="_blank">Pricing</a>
                            </li>
                        </ul>
                    </div>
                    <!-- END INFORMATION LINKS -->
                    <!-- SOLUTIONS LINKS -->
                    <div class="col-md-4 col-sm-12">
                        <h5>Useful Pages</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li>
                                <a href="register.html">Register</a>
                            </li>
                        </ul>
                    </div>
                    <!-- END SOLUTIONS LINKS -->
                    <!-- COMPANY LINKS -->
                    <div class="col-md-4 col-sm-12">
                        <h5>Reach Us</h5>
                        <ul class="address">
                            <li>
                                <i class="fa-solid fa-location-dot me-2"></i>Office C, Five valleys, Stroud, Gl5 1RR
                            </li>
                            <li>
                                <a href="mailto:support@uploadeasy.co">
                                    <i class="fa fa-envelope me-2"></i>support@uploadeasy.co </a>
                            </li>
                        </ul>
                    </div>
                    <!-- COMPANY LINKS -->
                    <!-- CONNECTION & NEWS LINKS -->
                    <div class="col-md-3 col-sm-12 footer-connect pr-0 d-none">
                        <h5>Social Media</h5>
                        <h6>Follow up on social media to find out the latest updates.</h6>
                        <ul id="footer-icons" class="list-inline">
                            <a href="https://linkedin.com/" target="_blank">
                                <li class="list-inline-item">
                                    <i class="footer-icon fa-brands fa-linkedin"></i>
                                </li>
                            </a>
                            <a href="https://twitter.com/" target="_blank">
                                <li class="list-inline-item">
                                    <i class="footer-icon fa-brands fa-twitter"></i>
                                </li>
                            </a>
                            <a href="https://instagram.com/" target="_blank">
                                <li class="list-inline-item">
                                    <i class="footer-icon fa-brands fa-instagram"></i>
                                </li>
                            </a>
                            <a href="https://facebook.com/" target="_blank">
                                <li class="list-inline-item">
                                    <i class="footer-icon fa-brands fa-facebook"></i>
                                </li>
                            </a>
                        </ul>
                        <!--	<h5 class="mt-6 mb-4">Get Started Today</h5><a href="https://uploadeasy.co/register" class="btn btn-primary pl-5 pr-5">Sign Up Now</a> -->
                    </div>
                    <!-- END CONNECTION & NEWS LINKS -->
                </div>
            </div>
            <!-- END FOOTER LINKS -->
        </div>
        <!-- END ROW -->
    </div>
    <!-- END CONTAINER-->
    <!-- COPYRIGHT INFORMATION -->
    <div id="copyright" class="container">
        <p class="copyright-left">Copyright © 2023 <a href="index.html">Upload Easy</a> All rights reserved </p>
        <div>
            <p class="copyright-right">
                <a href="terms-and-conditions.html" target="_blank">Terms &amp; Conditions</a>
            </p>
            <p class="copyright-right">
                <a href="privacy-policy.html" target="_blank">Privacy Policy</a>
                <span>|</span>
            </p>
        </div>
        <!-- SCROLL TO TOP -->
        <a href="#top" id="back-to-top">
            <i class="fa fa-angle-double-up"></i>
        </a>
    </div>
</footer>
<!-- END FOOTER -->
<!-- JQuery-->
<script src="assets/plugins/jquery/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 5-->
<script src="assets/plugins/bootstrap-5.0.2/js/bootstrap.bundle.min.js"></script>
<!-- Awselect JS -->
<script src="assets/plugins/awselect/awselect-custom.js"></script>
<script src="assets/js/awselect.js"></script>
<!-- Custom-->
<script src="assets/js/custom.js"></script>

<!-- Custom User JS File -->
</body>
</html>
