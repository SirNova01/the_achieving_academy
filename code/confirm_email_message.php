<!doctype html>


<?php

session_start();
include("includes/db_conn.php");
$date = date("Y-m-d H:i:s");
$day = date("Y-m-d");
$errors = array();

    $script_name = pathinfo(__FILE__, PATHINFO_FILENAME);

    $_SESSION['name'] = "Micheal";

?>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    
    <!--====== Title ======-->
    <title> Email Sent! </title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
    
        
    <link rel="stylesheet" href="assets/css/vendor/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    
</head>

<body>
    
    <!--====== Header Start ======-->

    <?php include("includes/header.php"); ?>

    <!--====== Header Ends ======-->
    
    <!--====== Page Banner Start ======-->

    <!-- <section class="page-banner">
        <div class="page-banner-bg bg_cover" style="background-image: url(assets/images/page-banner.jpg);">
            <div class="container">
                <div class="banner-content text-center">
                    <h2 class="title">Notice</h2>
                </div>
            </div>
        </div>
    </section> -->

    <!--====== Page Banner Ends ======-->

    <!--====== Notice Start ======-->

    <section style="margin-top:200px;" class="notice-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title-2">
                        <h2 class="title">Mail Sent!</h2>
                        <span class="line"></span>
                        <p> Hi, <?= $_SESSION['name'] ?> <br> we're happy you signed up @achieving academy, <br> to start exploring our courses please verify your email address..   </p>
                    </div>
                </div>

                <div class="col-lg-6">
                <div class="campus-image-col">
                    <div class="campus-image slick-initialized slick-slider">
                        <span class="prev slick-arrow slick-disabled" aria-disabled="true" style=""><i class="fal fa-chevron-left"></i>Prev</span>
                        <div class="slick-list draggable">
                            <div class="slick-track" style="opacity: 1; width: 1533px; transform: translate3d(0px, 0px, 0px);">
                                <div class="single-campus slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 511px;" tabindex="0">
                                    <img src="assets/images/email_sent.svg" alt="">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>



                





            </div>
            
        </div>
    </section>

    <!--====== Notice Ends ======-->
    
    <!--====== Newsletter Start ======-->


    <!--====== Newsletter Ends ======-->
    
    <!--====== Footer Start ======-->

    <?php include("includes/footer.php"); ?>

    <!--====== Footer Ends ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="fal fa-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->
    
    <!--====== Start ======-->

<!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-">
                    
                </div>
            </div>
        </div>
    </section>
-->

    <!--====== Ends ======-->




    <!--====== Jquery js ======-->
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
    
   <!--====== All Plugins js ======-->
    <!-- <script src="assets/js/plugins/popper.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/plugins/slick.min.js"></script>
    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/plugins/jquery.appear.min.js"></script>
    <script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/plugins/isotope.pkgd.min.js"></script>
    <script src="assets/js/plugins/wow.min.js"></script>
    <script src="assets/js/plugins/ajax-contact.js"></script> -->
    

    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->

    <script src="assets/js/plugin.min.js"></script>

    
    <!--====== Main Activation  js ======-->
    <script src="assets/js/main.js"></script>

    
</body>


</html>
