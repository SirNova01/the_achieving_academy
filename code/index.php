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
      <title>Home | Achieving Academy </title>
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
      <!--====== Slider Start ======-->
      <section class="slider-area slider-active">
         <div class="single-slider d-flex align-items-center bg_cover" style="background-image: url(assets/images/slider-1.jpg);">
            <div class="container">
               <div class="slider-content">
                  <h2 class="title" data-animation="fadeInLeft" data-delay="0.2s">Real World Life Skills</h2>
                  <ul class="slider-btn">
                     <li><a data-animation="fadeInUp" data-delay="0.6s" class="main-btn main-btn-2" href="courses">View Courses</a></li>
                     <li><a data-animation="fadeInUp" data-delay="1s" class="main-btn" href="about">Learn more</a></li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="single-slider d-flex align-items-center bg_cover" style="background-image: url(assets/images/slider-2.jpg);">
            <div class="container">
               <div class="slider-content">
                  <h2 class="title" data-animation="fadeInLeft" data-delay="0.2s">Teaching Fundamental Life Skills</h2>
                  <ul class="slider-btn">
                     <li><a data-animation="fadeInUp" data-delay="0.6s" class="main-btn main-btn-2" href="courses">View Courses</a></li>
                     <li><a data-animation="fadeInUp" data-delay="1s" class="main-btn" href="about">Learn more</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </section>
      <!--====== Slider Ends ======-->
      <!--====== Features Start ======-->
      <section class="about-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="about-content mt-40">
                        <h2 class="about-title">Real <span>World</span> Life Skills</h2>
                        <span class="line"></span>
                        <p>Teaching fundamental life skills to help individuals transition from high school or college into the real world and become responsible & independent young adults.</p>
                        <a href="#" class="main-btn">Explore</a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="about-image mt-50">
                        <div class="single-image image-1">
                            <img src="assets/images/about/about-1.jpg" alt="">
                        </div>
                        <div class="single-image image-2">
                            <img src="assets/images/about/about-2.jpg" alt="">
                        </div>
                        <div class="single-image image-3">
                            <img src="assets/images/about/about-3.jpg" alt="">
                        </div>
                        <div class="single-image image-4">
                            <img src="assets/images/about/about-4.jpg" alt="">
                        </div>

                        <div class="about-icon icon-1">
                            <img src="assets/images/about/icon/icon-1.png" alt="">
                        </div>
                        <div class="about-icon icon-2">
                            <img src="assets/images/about/icon/icon-2.png" alt="">
                        </div>
                        <div class="about-icon icon-3">
                            <img src="assets/images/about/icon/icon-3.png" alt="">
                        </div>
                        <div class="about-icon icon-4">
                            <img src="assets/images/about/icon/icon-4.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
      <!--====== Features Ends ======-->
      <!--====== Top Courses Start ======-->
      <section class="top-courses-area">
        <div class="container">            
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title mt-40">
                        <h2 class="title">Our Program</h2>
                        <p>#Life Skills Training School we believe that successful people never stop learning.</p>
                    </div>
                </div>
            </div>

            
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="features-image-2">
                        <img class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s" src="assets/images/features-2.png" alt="Features" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInLeft;">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="features-items">
                        <div class="features-items-wrapper">
                            <div class="single-features-item d-flex align-items-center wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInUpBig;">
                                <div class="item-icon">
                                    <img src="assets/images/icon/icon-2-1.png" alt="Icon">
                                </div>
                                <div class="item-content media-body">
                                    <p>250+ <br> Courses</p>
                                </div>
                            </div>
                            <div class="single-features-item d-flex align-items-center wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.4s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.4s; animation-name: fadeInUpBig;">
                                <div class="item-icon">
                                    <img src="assets/images/icon/icon-2-2.png" alt="Icon">
                                </div>
                                <div class="item-content media-body">
                                    <p>Skill Based  <br> Scholarships</p>
                                </div>
                            </div>
                            <div class="single-features-item d-flex align-items-center wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.6s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: fadeInUpBig;">
                                <div class="item-icon">
                                    <img src="assets/images/icon/icon-2-3.png" alt="Icon">
                                </div>
                                <div class="item-content media-body">
                                    <p>Online <br> Education</p>
                                </div>
                            </div>
                        </div>

                        <div class="features-items-wrapper">
                            <div class="single-features-item d-flex align-items-center wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInUpBig;">
                                <div class="item-icon">
                                    <img src="assets/images/icon/icon-2-4.png" alt="Icon">
                                </div>
                                <div class="item-content media-body">
                                    <p>Expert <br> Teachers</p>
                                </div>
                            </div>
                            <div class="single-features-item d-flex align-items-center wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.4s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.4s; animation-name: fadeInUpBig;">
                                <div class="item-icon">
                                    <img src="assets/images/icon/icon-2-5.png" alt="Icon">
                                </div>
                                <div class="item-content media-body">
                                    <p>After Course <br> Certification</p>
                                </div>
                            </div>
                            <div class="single-features-item d-flex align-items-center wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.6s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: fadeInUpBig;">
                                <div class="item-icon">
                                    <img src="assets/images/icon/icon-2-6.png" alt="Icon">
                                </div>
                                <div class="item-content media-body">
                                    <p>Download <br> Prospectus</p>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
      </section>
      <!--====== Top Courses Ends ======-->
      <!--====== Specialty Start ======-->
 
      <!--====== Specialty Ends ======-->
      <!--====== Campus Visit Start ======-->
      <section class="campus-visit-area">
         <div class="container">
            <div class="campus-visit-wrapper">
               <div class="campus-image-col">
                  <div class="campus-image">
                     <div class=" single-campus">
                        <img src="assets/images/gallery/17ba67_c20c8fb50cc243b79a5291e9d0ac8103_mv2.jpg" alt="">
                     </div>
                     <div class="single-campus">
                        <img src="assets/images/gallery/gallery_image.webp" alt="">
                     </div>
                  </div>
               </div>
               <div class="campus-content-col">
                  <div class="campus-content">
                     <h2 class="campus-title">Visit our image gallery</h2>
                     <span class="line"></span>
                     <p>Even slightly believable. If you are going use a passage of Lorem Ipsum need</p>
                     <h3 class="video-title">or watch video</h3>
                     <a class="play video-popup" href="https://www.youtube.com/watch?v=7ptZBk9Zc8U"><i class="fas fa-play"></i> <span>Play now</span></a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--====== Campus Visit Ends ======-->
      <!--====== Event Start ======-->
      <section class="event-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="event-image mt-50">
                        <img src="assets/images/award.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="event-title mt-40">
                        <div class="section-title-2">
                            <h2 class="title">Upcoming <br> Events</h2>
                            <span class="line"></span>
                            <!-- <p>Even slightly believable. If you are going use a passage of Lorem Ipsum need obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure </p> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="event-wrapper-2">
                        <div class="single-event-2  wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.2s">
                            <div class="event-date">
                                <span class="date">Sep 12 2020</span>
                            </div>
                            <div class="event-content">
                                <h4 class="event-title-2"><a href="event-details.html">2020 YACO Awards</a></h4>
                                <p class="place">Place: Azul Reception Hall, 6909 Hillcroft Ave #2B4A, Houston, TX 77081, USA </p>
                                <span class="time">3:00 PM to 6:00 PM</span>
                                <a href="event-details.html" class="more">Read more <i class="fal fa-chevron-right"></i></a>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="event-wrapper-2 ml-lg-auto">
                        <div class="single-event-2  wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.2s">
                            <div class="event-date">
                                <span class="date">Mar 28 2020</span>
                            </div>
                            <div class="event-content">
                                <h4 class="event-title-2"><a href="event-details.html">Life Skills Workshop</a></h4>
                                <p class="place">Place: The Ranch Office, 1220 Blalock Rd #300, Houston, TX 77055, USA  </p>
                                <span class="time">10:00 AM to 1:00 PM</span>
                                <a href="event-details.html" class="more">Read more <i class="fal fa-chevron-right"></i></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
      </section>
      <!--====== Event Ends ======-->
      <!--====== Testimonials Start ======-->
     
     
      <!--====== Blog Start ======-->
      <section class="blog-area">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-5 col-md-9">
                  <div class="section-title-2 text-center">
                     <h2 class="title">Latest Blog Post</h2>
                     <span class="line"></span>
                     <!-- <p>Even slightly believable. If you are going use a passage of Lorem Ipsum need some</p> -->
                  </div>
               </div>
            </div>
            <div class="blog-wrapper">
               <div class="row blog-active">
                <?php
                    $report_counter = 1;
                    $empty = TRUE;
                    $table_result = $db_handle->query("SELECT * FROM articles order by id desc LIMIT 3");
                    foreach ($table_result as $article_row): ?>

                    <?php
                        $cover_pic = $article_row['cover_pic'];
                        $cover_pic = substr($cover_pic, 3);

                        $dt = $article_row['date'];
                        $date_formatted = date("F jS, Y", strtotime($dt));

                    ?>
                        
                        <div class="col-lg-4">
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

               <a href="blog" class="main-btn">More...</a>

            </div>
         </div>
      </section>
      <!--====== Blog Ends ======-->
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