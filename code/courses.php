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
      <title>All Courses | Achieving Academy</title>
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
                  <h2 class="title">Our Courses</h2>
               </div>
            </div>
         </div>
      </section>
      <!--====== Page Banner Ends ======-->
      <!--====== Top Course Start ======-->
      <section class="top-courses-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-8">
                  <div class="section-title mt-40">
                     <h2 class="title">Here is our <br> Top Courses</h2>
                     <p>#Life Skills Training School <br> we believe that successful people never stop learning. </p>
                  </div>
               </div>
            </div>
            <div class="courses-wrapper">
               <div class="row">
                  <div class="col-lg-3 col-sm-6 courses-col">
                     <div class="single-courses-2 mt-30">
                        <div class="courses-image">
                           <a href="courses-details.html"><img src="assets/images/courses/courses-1.png" alt="courses"></a>
                        </div>
                        <div class="courses-content">
                           <!-- <a href="#" class="category">#Science</a> -->
                           <h4 class="courses-title"><a href="courses-details.html">Computer Science & Engineering</a></h4>
                           <div class="duration-rating">
                              <div class="duration-fee">
                                 <p class="duration">Duration: <span> 4 year</span></p>
                                 <p class="fee">Fee: <span> $540</span></p>
                              </div>
                              <div class="rating">
                                 <span>Rating: </span>
                                 <ul class="star">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                 </ul>
                              </div>
                           </div>
                           <div class="courses-link">
                              <a class="apply" href="#">Online Apply</a>
                              <a class="more" href="courses-details.html">Read more <i class="fal fa-chevron-right"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 courses-col">
                     <div class="single-courses-2 mt-30">
                        <div class="courses-image">
                           <a href="courses-details.html"><img src="assets/images/courses/courses-2.png" alt="courses"></a>
                        </div>
                        <div class="courses-content">
                           <!-- <a href="#" class="category">#Science</a> -->
                           <h4 class="courses-title"><a href="courses-details.html">Bachelor of Business Administration</a></h4>
                           <div class="duration-rating">
                              <div class="duration-fee">
                                 <p class="duration">Duration: <span> 4 year</span></p>
                                 <p class="fee">Fee: <span> $540</span></p>
                              </div>
                              <div class="rating">
                                 <span>Rating: </span>
                                 <ul class="star">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                 </ul>
                              </div>
                           </div>
                           <div class="courses-link">
                              <a class="apply" href="#">Online Apply</a>
                              <a class="more" href="courses-details.html">Read more <i class="fal fa-chevron-right"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 courses-col">
                     <div class="single-courses-2 mt-30">
                        <div class="courses-image">
                           <a href="courses-details.html"><img src="assets/images/courses/courses-3.png" alt="courses"></a>
                        </div>
                        <div class="courses-content">
                           <!-- <a href="#" class="category">#Science</a> -->
                           <h4 class="courses-title"><a href="courses-details.html">Social & Digital Marketing</a></h4>
                           <div class="duration-rating">
                              <div class="duration-fee">
                                 <p class="duration">Duration: <span> 4 year</span></p>
                                 <p class="fee">Fee: <span> $540</span></p>
                              </div>
                              <div class="rating">
                                 <span>Rating: </span>
                                 <ul class="star">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                 </ul>
                              </div>
                           </div>
                           <div class="courses-link">
                              <a class="apply" href="#">Online Apply</a>
                              <a class="more" href="courses-details.html">Read more <i class="fal fa-chevron-right"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 courses-col">
                     <div class="single-courses-2 mt-30">
                        <div class="courses-image">
                           <a href="courses-details.html"><img src="assets/images/courses/courses-4.png" alt="courses"></a>
                        </div>
                        <div class="courses-content">
                           <!-- <a href="#" class="category">#Science</a> -->
                           <h4 class="courses-title"><a href="courses-details.html">Bachelor of Applied Mathematics</a></h4>
                           <div class="duration-rating">
                              <div class="duration-fee">
                                 <p class="duration">Duration: <span> 4 year</span></p>
                                 <p class="fee">Fee: <span> $540</span></p>
                              </div>
                              <div class="rating">
                                 <span>Rating: </span>
                                 <ul class="star">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                 </ul>
                              </div>
                           </div>
                           <div class="courses-link">
                              <a class="apply" href="#">Online Apply</a>
                              <a class="more" href="courses-details.html">Read more <i class="fal fa-chevron-right"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   
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