<?php

    session_start();
    include("includes/db_conn.php");
    $date = date("Y-m-d H:i:s");
    $day = date("Y-m-d");
    $errors = array();


    function ifSubscrierIdExists($code, $db){
        $code_query = "SELECT * FROM email_subscribers WHERE subscriber_id ='$code'";
        $result = mysqli_query($db, $code_query);
        $number = mysqli_num_rows($result);
        if($number >0){
            return true;
        }else{
            return false;
        }
    }

    if(isset($_POST['subscribe_now'])){
        $email = mysqli_real_escape_string($db_handle, $_POST['email']);
        if (empty($email)) { array_push($errors, "email is required"); }
        $user_check_query = "SELECT * FROM email_subscribers WHERE email='$email' LIMIT 1";
		$result = mysqli_query($db_handle, $user_check_query);
		$user = mysqli_fetch_assoc($result);
		if ($user) {
            array_push($errors, "email exists!");
        }

        if (count($errors) == 0) {
            $unique_number = uniqid(rand (), true);
            while(ifSubscrierIdExists($unique_number, $db_handle)) {
                $unique_number = uniqid(rand (), true);                                       
            }
            $subscriber_id = $unique_number;
            $register_query = "INSERT INTO email_subscribers (subscriber_id,	email,	date,	day	 ) 
                                                       VALUES('$subscriber_id', '$email', '$date',  '$day' )";
            if(mysqli_query($db_handle, $register_query)){
                // header("location: newsletter_success");
            }
        }
    }
?>



<!doctype html>
<html class="no-js" lang="en">

   <head>
      <meta charset="utf-8">
      <!--====== Title ======-->
      <title>About Us | Achieving Academy</title>
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
      <section class="page-banner">
         <div class="page-banner-bg bg_cover" style="background-image: url(assets/images/page-banner.jpg);">
            <div class="container">
               <div class="banner-content text-center">
                  <h2 class="title">About Us</h2>
               </div>
            </div>
         </div>
      </section>
      <!--====== Page Banner Ends ======-->
      <!--====== About Start ======-->
      <section class="about-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="about-content mt-40">
                     <h2 class="about-title">Email <span>Subscription</span> Successful!</h2>
                     <span class="line"></span>
                     <p>We're happy to inform you that your subscription to achieving academy newsletter was successful!</p>
                     <a href="home" class="main-btn">Back To Home</a>
                  </div>
               </div>
              
            </div>
         </div>
      </section>
      <!--====== About Ends ======-->

    

     
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