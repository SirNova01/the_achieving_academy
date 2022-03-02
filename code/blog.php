<!doctype html>


<?php

session_start();
include("includes/db_conn.php");
$date = date("Y-m-d H:i:s");
$day = date("Y-m-d");
$errors = array();

    $script_name = pathinfo(__FILE__, PATHINFO_FILENAME);

?>



<html class="no-js" lang="en">
  
   <head>
      <meta charset="utf-8">
      <!--====== Title ======-->
      <title> Blog | Achieving Academy </title>
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
                  <h2 class="title">Our Blog</h2>
               </div>
            </div>
         </div>
      </section>
      <!--====== Page Banner Ends ======-->
      <!--====== Blog Start ======-->
      <section class="blog-page">
         <div class="container">
            <div class="row flex-row-reverse">
               <div class="col-lg-8">
                  <div class="row">
                     
                  <?php
                    $report_counter = 1;
                    $empty = TRUE;
                    $table_result = $db_handle->query("SELECT * FROM articles order by id desc");
                    foreach ($table_result as $article_row): ?>

                    <?php
                        $cover_pic = $article_row['cover_pic'];
                        $cover_pic = substr($cover_pic, 3);

                        $dt = $article_row['date'];
                        $date_formatted = date("F jS, Y", strtotime($dt));

                    ?>


                        <div class="col-md-6">
                            <div class="single-blog mt-30">
                            <div class="blog-image">
                                <a href="blog_details">
                                <img src="<?= $cover_pic ?>" alt="blog">
                                </a>
                            </div>
                            <div class="blog-content">
                                <ul class="meta">
                                    <li><a href="#"><?=$date_formatted?></a></li>
                                    <!-- <li><a href="#">By: Alex</a></li>
                                    <li><a href="#">12 Comments</a></li> -->
                                </ul>
                                <h4 class="blog-title"><a href="blog_details"><?= $article_row['title'] ?></a></h4>
                                <a href="blog_details" class="more">Read more <i class="fal fa-chevron-right"></i></a>
                            </div>
                            </div>
                        </div>


                     
                <?php $empty = FALSE; $report_counter++; endforeach; unset($article_row); if ($empty == TRUE) echo "<h6 style='text-align: center; color: red'>There are no new Products</h6>" ?>
            




                  </div>
                  <!-- <ul class="pagination-items text-center">
                     <li><a class="active" href="#">01</a></li>
                     <li><a href="#">02</a></li>
                     <li><a href="#">03</a></li>
                     <li><a href="#">04</a></li>
                     <li><a href="#">05</a></li>
                  </ul> -->
               </div>
               <div class="col-lg-4">
                  <div class="blog-sidebar">
                     <div class="blog-sidebar-category mt-30">
                        <div class="sidebar-title">
                           <h4 class="title">Categories</h4>
                        </div>
                        <ul class="category-items">

                        <?php
                            $report_counter = 1;
                            $empty = TRUE;
                            $table_result = $db_handle->query("SELECT * FROM blog_categories");
                            foreach ($table_result as $article_row): ?>

                            <li>
                              <div class="form-radio">
                                 <!-- <input type="radio" name="categoryRadio" id="categoryRadio1"> -->
                                 <label for="categoryRadio1"> <span></span> <?= $article_row['category_name'] ?> <!-- <strong>(25)</strong> --> </label>
                              </div>
                           </li>



                            
                        <?php $empty = FALSE; $report_counter++; endforeach; unset($article_row); if ($empty == TRUE) echo "<h6 style='text-align: center; color: red'>There are no categories yet!</h6>" ?>
            

                        </ul>
                     </div>
                     <!-- <div class="blog-sidebar-post mt-30">
                        <div class="sidebar-title">
                           <h4 class="title">Recent Post</h4>
                        </div>
                        <ul class="post-items">
                           <li>
                              <div class="single-post">
                                 <div class="post-thumb">
                                    <a href="blog-details.html"><img src="assets/images/post-1.jpg" alt=""></a>
                                 </div>
                                 <div class="post-content">
                                    <h4 class="post-title"><a href="blog-details.html">Guest Interview will Occur in English</a></h4>
                                    <a href="blog-details.html" class="more">Read more <i class="fal fa-chevron-right"></i></a>
                                 </div>
                              </div>
                           </li>
                           <li>
                              <div class="single-post">
                                 <div class="post-thumb">
                                    <a href="blog-details.html"><img src="assets/images/post-2.jpg" alt=""></a>
                                 </div>
                                 <div class="post-content">
                                    <h4 class="post-title"><a href="blog-details.html">Online Courses are available now</a></h4>
                                    <a href="blog-details.html" class="more">Read more <i class="fal fa-chevron-right"></i></a>
                                 </div>
                              </div>
                           </li>
                           <li>
                              <div class="single-post">
                                 <div class="post-thumb">
                                    <a href="blog-details.html"><img src="assets/images/post-3.jpg" alt=""></a>
                                 </div>
                                 <div class="post-content">
                                    <h4 class="post-title"><a href="blog-details.html">Workshop on English native Language</a></h4>
                                    <a href="blog-details.html" class="more">Read more <i class="fal fa-chevron-right"></i></a>
                                 </div>
                              </div>
                           </li>
                           <li>
                              <div class="single-post">
                                 <div class="post-thumb">
                                    <a href="blog-details.html"><img src="assets/images/post-4.jpg" alt=""></a>
                                 </div>
                                 <div class="post-content">
                                    <h4 class="post-title"><a href="blog-details.html">How to find resources for Laravel Language </a></h4>
                                    <a href="blog-details.html" class="more">Read more <i class="fal fa-chevron-right"></i></a>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </div> -->
                    
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--====== Blog Ends ======-->
      <!--====== Newsletter Start ======-->
      <section class="newsletter-area-2">
         <div class="container">
            <div class="newsletter-wrapper bg_cover" style="background-image: url(assets/images/newsletter-bg-1.jpg);">
               <div class="row align-items-center">
                  <div class="col-lg-5">
                     <div class="section-title-2 mt-25">
                        <h2 class="title">Subscribe our Newsletter</h2>
                        <span class="line"></span>
                        <p>Even slightly believable. If you are going use a passage of Lorem Ipsum need some</p>
                     </div>
                  </div>
                  <div class="col-lg-7">
                     <div class="newsletter-form mt-30">
                        <form action="#">
                           <input type="text" placeholder="Enter your email here">
                           <button class="main-btn main-btn-2">Subscribe now</button>
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