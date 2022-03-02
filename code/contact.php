<?php

   session_start();
   include("includes/db_conn.php");
   $date = date("Y-m-d H:i:s");
   $day = date("Y-m-d");
   $errors = array();

    $script_name = pathinfo(__FILE__, PATHINFO_FILENAME);

?>

<!doctype html>
<html class="no-js" lang="en">

   <head>
      <meta charset="utf-8">
      <!--====== Title ======-->
      <title>Contact | Achieving Academy</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--====== Favicon Icon ======-->
      <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
      <!-- CSS
         ============================================ -->
      <!--===== Vendor CSS (Bootstrap & Icon Font) =====-->
      <!-- <link rel="stylesheet" href="assets/css/plugins/bootstrap.min.css">
         <link rel="stylesheet" href="assets/css/plugins/fontawesome.min.css">
         <link rel="stylesheet" href="assets/css/plugins/default.css"> -->
      <!--===== Plugins CSS (All Plugins Files) =====-->
      <!-- <link rel="stylesheet" href="assets/css/plugins/animate.css">
         <link rel="stylesheet" href="assets/css/plugins/slick.css">
         <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css"> -->
      <!--====== Main Style CSS ======-->
      <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
      <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
      <link rel="stylesheet" href="assets/css/vendor/plugins.min.css">
      <link rel="stylesheet" href="assets/css/style.min.css">
   </head>
   <body>
      <!--====== Header Start ======-->
      <?php include("includes/header.php"); ?>
      <!--====== Header Ends ======-->
      <!--====== Page Banner Start ======-->
      <section class="page-banner">
         <div class="page-banner-bg bg_cover" style="background-image: url(assets/images/page-banner.jpg);">
            <div class="container">
               <div class="banner-content text-center">
                  <h2 class="title">Contact Us</h2>
               </div>
            </div>
         </div>
      </section>
      <!--====== Page Banner Ends ======-->
      <!--====== Contact Start ======-->
      <section class="contact-area">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <div class="single-contact-info mt-30">
                     <div class="info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                     </div>
                     <div class="info-content">
                        <h5 class="title">Address</h5>
                        <p>1220 Blalock Rd, Suite 300 Houston, TX 77055</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="single-contact-info mt-30">
                     <div class="info-icon">
                        <i class="fas fa-phone"></i>
                     </div>
                     <div class="info-content">
                        <h5 class="title">Phone</h5>
                        <p><a href="tel:+62548254658">832-779-2555</a></p>
                        <!-- <p><a href="tel:+99875587478">+99875 587 478</a></p> -->
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="single-contact-info mt-30">
                     <div class="info-icon">
                        <i class="far fa-globe"></i>
                     </div>
                     <div class="info-content">
                        <h5 class="title">Web</h5>
                        <p><a href="mailto://info@achievingacademy.com">info@achievingacademy.com</a></p>
                        <p><a href="home">www.achievingacademy.com</a></p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="contact-form">
               <div class="row justify-content-center">
                  <div class="col-lg-8">
                     <div class="contact-title text-center">
                        <h3 class="title">Leave a message here</h3>
                        <p>We’d love to hear from you! Reach out today with any questions, or simply to learn more about our life skills program.</p>
                     </div>
                  </div>
               </div>
               <div class="row justify-content-center">
                  <div class="col-lg-8">
                     <div class="contact-form-wrapper">
                        <form id="contact-form" action="" method="post">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="single-form">
                                    <input type="text" name="name" placeholder="Name">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="single-form">
                                    <input type="email" name="email" placeholder="Email">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="single-form">
                                    <input type="text" name="phone" placeholder="Phone">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="single-form">
                                    <input type="text" name="subject" placeholder="Subject">
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="single-form">
                                    <textarea name="message" placeholder="Write here..."></textarea>
                                 </div>
                              </div>
                              <p class="form-message"></p>
                              <div class="col-md-12">
                                 <div class="single-form text-center">
                                    <button class="main-btn">Submit now</button>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--====== Contact Ends ======-->
      <!--====== Newsletter Start ======-->
      <section class="newsletter-area">
            <div class="container">
            <div class="newsletter-wrapper bg_cover wow zoomIn" data-wow-duration="1s" data-wow-delay="0.2s" style="background-image: url(assets/images/newsletter-bg-1.jpg);">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="section-title-2 mt-25">
                        <h2 class="title">Subscribe our Newsletter</h2>
                        <span class="line"></span>
                        <!-- <p>Even slightly believable. If you are going use a passage of Lorem Ipsum need some</p> -->
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="newsletter-form mt-30">
                        <form action="newsletter" method="post">
                            <input type="text" name="email" placeholder="Enter your email here">
                            <button name="subscribe_now" class="main-btn main-btn-2">Subscribe now</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
      <!--====== Newsletter Ends ======-->
      <!--====== Footer Start ======-->
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