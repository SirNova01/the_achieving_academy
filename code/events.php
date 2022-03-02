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
      <title>Events | Achieving Academy</title>
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
                  <h2 class="title">Events</h2>
               </div>
            </div>
         </div>
      </section>
      <!--====== Page Banner Ends ======-->

      <section style="padding-top:0px;" class="blog-area">
         <div class="container">
            <!-- <div class="row justify-content-center">
               <div class="col-lg-5 col-md-9">
                  
               </div>
            </div> -->
            <div class="blog-wrapper">
               <div class="row blog-active">


               <?php
                  $report_counter = 1;
                  $empty = TRUE;
                  $table_result = $db_handle->query("SELECT * FROM events");
                  foreach ($table_result as $event_row): ?>
                     <?php
                        $dt = $event_row['date'];
                        $date_formatted = date("F jS, Y", strtotime($dt));

                        $dp = $event_row['dp'];
                        $dp = substr($dp, 3);
                     ?>

                  <div class="col-lg-4">
                     <div class="single-blog mt-30">
                        <div class="blog-image">
                           <a href="event_details?id=<?= $event_row['event_id'] ?>">
                           <img src="<?=$dp?>" alt="<?=$dp?>">
                           </a>
                        </div>
                        <div class="blog-content">
                           <ul class="meta">
                              <li><a href=""><?= $date_formatted ?></a></li>
                              <li><a href=""><?= $event_row['time'] ?></a></li>
                              <li><a href="">  <?= $event_row['duration'] ?></a></li>
                           </ul>
                           <h4 class="blog-title"><a href="event_details?id=<?= $event_row['event_id'] ?>"><?= $event_row['title'] ?></a></h4>
                           <a href="event_details?id=<?= $event_row['event_id'] ?>" class="more">Read more <i class="fal fa-chevron-right"></i></a>
                        </div>
                     </div>
                  </div>

               <?php $empty = FALSE; $report_counter++; endforeach; unset($event_row); if ($empty == TRUE) echo "<h6 style='text-align: center; color: red'>There are no events yet</h6>" ?>
            
              







              
                  

               </div>
            </div>
         </div>
      </section>
      <!--====== Event Start ======-->
      <section class="event-page">
         <div class="container">
            <div class="row">


              
            </div>
            <ul class="pagination-items text-center">
               <!-- <li><a class="active" href="#">01</a></li>
               <li><a href="#">02</a></li>
               <li><a href="#">03</a></li>
               <li><a href="#">04</a></li>
               <li><a href="#">05</a></li> -->
            </ul>
         </div>
      </section>
      <!--====== Event Ends ======-->
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