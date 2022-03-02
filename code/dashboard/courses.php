<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <title>My Courses | Student Dashboard</title>
      <!-- Favicon icon -->
      <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
      <link href="vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
      <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href="../../cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
      <link href="vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
   </head>
   <body>
      <!--*******************
         Preloader start
         ********************-->
      <div id="preloader">
         <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
         </div>
      </div>
      <!--*******************
         Preloader end
         ********************-->
      <!--**********************************
         Main wrapper start
         ***********************************-->
      <div id="main-wrapper">
         <!--**********************************
            Nav header start
            ***********************************-->
         <div class="nav-header">
            <a href="" class="brand-logo">
            <img class="logo-abbr" src="images/img/academy_logo.png" alt="">
            <img class="logo-compact" src="images/img/logo_text.png" alt="">
            <img class="brand-title" src="images/img/logo_text.png" alt="">
            </a>
            <div class="nav-control">
               <div class="hamburger">
                  <span class="line"></span><span class="line"></span><span class="line"></span>
               </div>
            </div>
         </div>
         <!--**********************************
            Nav header end
            ***********************************-->
         <!--**********************************
            Chat box start
            ***********************************-->
         <?php include("ui_inc/chat_box.php"); ?>
         <!--**********************************
            Chat box End
            ***********************************-->
         <!--**********************************
            Header start
            ***********************************-->
         <?php include("includes/header.php"); ?>
         <!--**********************************
            Header end ti-comment-alt
            ***********************************-->
         <!--**********************************
            Sidebar start
            ***********************************-->
         <?php include("includes/left_side_bar.php"); ?>
         <!--**********************************
            Sidebar end
            ***********************************-->
         <!--**********************************
            Content body start
            ***********************************-->
         <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
               <div class="form-head d-flex mb-3 mb-md-4 align-items-start">
                  <div class="mr-auto d-none d-lg-block">
                     <h2 class="text-black font-w600 mb-1">Reviews</h2>
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-primary">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Customer Reviews</a></li>
                     </ol>
                  </div>
                  <div class="dropdown custom-dropdown">
                     <div class="btn btn-sm btn-primary light d-flex align-items-center svg-btn" data-toggle="dropdown">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <g>
                              <path d="M22.4281 2.856H21.8681V1.428C21.8681 0.56 21.2801 0 20.4401 0C19.6001 0 19.0121 0.56 19.0121 1.428V2.856H9.71606V1.428C9.71606 0.56 9.15606 0 8.28806 0C7.42006 0 6.86006 0.56 6.86006 1.428V2.856H5.57206C2.85606 2.856 0.560059 5.152 0.560059 7.868V23.016C0.560059 25.732 2.85606 28.028 5.57206 28.028H22.4281C25.1441 28.028 27.4401 25.732 27.4401 23.016V7.868C27.4401 5.152 25.1441 2.856 22.4281 2.856ZM5.57206 5.712H22.4281C23.5761 5.712 24.5841 6.72 24.5841 7.868V9.856H3.41606V7.868C3.41606 6.72 4.42406 5.712 5.57206 5.712ZM22.4281 25.144H5.57206C4.42406 25.144 3.41606 24.136 3.41606 22.988V12.712H24.5561V22.988C24.5841 24.136 23.5761 25.144 22.4281 25.144Z" fill="#2F4CDD"></path>
                           </g>
                        </svg>
                        <div class="text-left ml-3">
                           <span class="d-block fs-16">Filter Periode</span>
                           <small class="d-block fs-13">4 June 2020 - 4 July 2020</small>
                        </div>
                        <i class="fa fa-angle-down scale5 ml-3"></i>
                     </div>
                     <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">4 June 2020 - 4 July 2020</a>
                        <a class="dropdown-item" href="#">5 july 2020 - 4 Aug 2020</a>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="widget-carousel owl-carousel">
                        <div class="items">
                           <div class="bootstrap-media card p-4">
                              <div class="media mb-4 align-items-center">
                                 <a href="ecom-product-detail.html"><img class="mr-3 img-fluid rounded-xl" width="94" src="images/dish/pic1.jpg" alt="DexignZone"></a>
                                 <div class="media-body">
                                    <h5 class="mt-0 mb-3"><a class="text-black" href="ecom-product-detail.html">Tuna soup spinach with himalaya salt</a></h5>
                                    <small class="mb-0"><a class="text-primary" href="javascript:void(0);">BURGER</a></small>
                                 </div>
                              </div>
                              <p class="fs-18 text-black mb-4">A very fine addition to the not over plentiful supply of good restaurants in this part of west London.</p>
                              <div class="reviewer-box">
                                 <div class="media align-items-center">
                                    <img class="mr-3 img-fluid rounded" width="55" src="images/avatar/1.jpg" alt="DexignZone">
                                    <div class="media-body">
                                       <h4 class="mt-0 mb-1 text-white">Roberto Jr.</h4>
                                       <small class="mb-0 text-light">Head Marketing</small>
                                    </div>
                                    <div class="star-review">
                                       <i class="fa fa-star text-orange"></i>
                                       <span class="ml-2">4.2</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="items">
                           <div class="bootstrap-media card p-4">
                              <div class="media mb-4 align-items-center">
                                 <a href="ecom-product-detail.html"><img class="mr-3 img-fluid rounded-xl" width="94" src="images/dish/pic2.jpg" alt="DexignZone"></a>
                                 <div class="media-body">
                                    <h5 class="mt-0 mb-3"><a class="text-black" href="ecom-product-detail.html">Chicken curry special with cucumber</a></h5>
                                    <small class="mb-0"><a class="text-primary" href="javascript:void(0);">PIZZA</a></small>
                                 </div>
                              </div>
                              <p class="fs-18 text-black mb-4">Fast, professional and friendly service, we ordered the six course tasting menu and every dish was spectacular</p>
                              <div class="reviewer-box">
                                 <div class="media align-items-center">
                                    <img class="mr-3 img-fluid rounded" width="55" src="images/avatar/2.jpg" alt="DexignZone">
                                    <div class="media-body">
                                       <h4 class="mt-0 mb-1 text-white">Jubaedah</h4>
                                       <small class="mb-0 text-light">Food Vlogger</small>
                                    </div>
                                    <div class="star-review">
                                       <i class="fa fa-star text-orange"></i>
                                       <span class="ml-2">5.0</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="items">
                           <div class="bootstrap-media card p-4">
                              <div class="media mb-4 align-items-center">
                                 <a href="ecom-product-detail.html"><img class="mr-3 img-fluid rounded-xl" width="94" src="images/dish/pic3.jpg" alt="DexignZone"></a>
                                 <div class="media-body">
                                    <h5 class="mt-0 mb-3"><a class="text-black" href="ecom-product-detail.html">Tuna soup spinach with himalaya salt</a></h5>
                                    <small class="mb-0"><a class="text-primary" href="javascript:void(0);">JUICE</a></small>
                                 </div>
                              </div>
                              <p class="fs-18 text-black mb-4">A very fine addition to the not over plentiful supply of good restaurants in this part of west London.</p>
                              <div class="reviewer-box">
                                 <div class="media align-items-center">
                                    <img class="mr-3 img-fluid rounded" width="55" src="images/avatar/3.jpg" alt="DexignZone">
                                    <div class="media-body">
                                       <h4 class="mt-0 mb-1 text-white">Steve Henry</h4>
                                       <small class="mb-0 text-light">Internship Students</small>
                                    </div>
                                    <div class="star-review">
                                       <i class="fa fa-star text-orange"></i>
                                       <span class="ml-2">3.5</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="items">
                           <div class="bootstrap-media card p-4">
                              <div class="media mb-4 align-items-center">
                                 <a href="ecom-product-detail.html"><img class="mr-3 img-fluid rounded-xl" width="94" src="images/dish/pic4.jpg" alt="DexignZone"></a>
                                 <div class="media-body">
                                    <h5 class="mt-0 mb-3"><a class="text-black" href="ecom-product-detail.html">Meidum Spicy Spagethi Italiano</a></h5>
                                    <small class="mb-0"><a class="text-primary" href="javascript:void(0);">BURGER</a></small>
                                 </div>
                              </div>
                              <p class="fs-18 text-black mb-4">A very fine addition to the not over plentiful supply of good restaurants in this part of west London.</p>
                              <div class="reviewer-box">
                                 <div class="media align-items-center">
                                    <img class="mr-3 img-fluid rounded" width="55" src="images/avatar/4.jpg" alt="DexignZone">
                                    <div class="media-body">
                                       <h4 class="mt-0 mb-1 text-white">Willy Wonca</h4>
                                       <small class="mb-0 text-light">Sales Marketing</small>
                                    </div>
                                    <div class="star-review">
                                       <i class="fa fa-star text-orange"></i>
                                       <span class="ml-2">4.2</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="items">
                           <div class="bootstrap-media card p-4">
                              <div class="media mb-4 align-items-center">
                                 <a href="ecom-product-detail.html"><img class="mr-3 img-fluid rounded-xl" width="94" src="images/dish/pic5.jpg" alt="DexignZone"></a>
                                 <div class="media-body">
                                    <h5 class="mt-0 mb-3"><a class="text-black" href="ecom-product-detail.html">Tuna soup spinach with himalaya salt</a></h5>
                                    <small class="mb-0"><a class="text-primary" href="javascript:void(0);">PIZZA</a></small>
                                 </div>
                              </div>
                              <p class="fs-18 text-black mb-4">A very fine addition to the not over plentiful supply of good restaurants in this part of west London.</p>
                              <div class="reviewer-box">
                                 <div class="media align-items-center">
                                    <img class="mr-3 img-fluid rounded" width="55" src="images/avatar/5.jpg" alt="DexignZone">
                                    <div class="media-body">
                                       <h4 class="mt-0 mb-1 text-white">Roberto Jr.</h4>
                                       <small class="mb-0 text-light">Head Marketing</small>
                                    </div>
                                    <div class="star-review">
                                       <i class="fa fa-star text-orange"></i>
                                       <span class="ml-2">4.2</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                 
               </div>
            </div>
         </div>
         <!--**********************************
            Content body end
            ***********************************-->
         <!--**********************************
            Footer start
            ***********************************-->
         <?php include("includes/footer.php"); ?>
         <!--**********************************
            Footer end
            ***********************************-->
         <!--**********************************
            Support ticket button start
            ***********************************-->
         <!--**********************************
            Support ticket button end
            ***********************************-->
      </div>
      <!--**********************************
         Main wrapper end
         ***********************************-->
      <!--**********************************
         Scripts
         ***********************************-->
      <!-- Required vendors -->
      <script src="vendor/global/global.min.js"></script>
      <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
      <script src="js/custom.min.js"></script>
      <script src="js/deznav-init.js"></script>
      <script src="vendor/owl-carousel/owl.carousel.js"></script>
      <script>
         function widgetCarousel()
         {
         
         	/*  testimonial one function by = owl.carousel.js */
         	jQuery('.widget-carousel').owlCarousel({
         		loop:false,
         		margin:30,
         		nav:true,
         		autoplay:true,
         		autoplaySpeed: 3000,
         		navSpeed: 3000,
         		paginationSpeed: 3000,
         		slideSpeed: 3000,
         		smartSpeed: 3000,
         		dots: false,
         		navText: ['<i class="fa fa-caret-left"></i>', '<i class="fa fa-caret-right"></i>'],
         		responsive:{
         			0:{
         				items:1
         			},
         			
         			480:{
         				items:1,
         				stagePadding: 100
         			},			
         			767:{
         				items:2,
         			},			
         			
         			1200:{
         				items:3
         			},
         			1750:{
         				items:4
         			}
         		}
         	})
         }
         function carouselReview(){
         	/*  testimonial one function by = owl.carousel.js */
         	jQuery('.testimonial-one').owlCarousel({
         		loop:true,
         		autoplay:true,
         		margin:0,
         		nav:false,
         		dots: false,
         		navText: [''],
         		responsive:{
         			0:{
         				items:1
         			},
         			
         			480:{
         				items:1
         			},			
         			
         			767:{
         				items:1
         			},
         			1000:{
         				items:1
         			}
         		}
         	})		
         	/*Custom Navigation work*/
         	jQuery('#next-slide').on('click', function(){
         	   $('.testimonial-one').trigger('next.owl.carousel');
         	});
         
         	jQuery('#prev-slide').on('click', function(){
         	   $('.testimonial-one').trigger('prev.owl.carousel');
         	});
         	/*Custom Navigation work*/
         }
         
         jQuery(window).on('load',function(){
         	setTimeout(function(){
         		widgetCarousel();
         		carouselReview();
         	}, 1000); 
         });
      </script>
   </body>
</html>