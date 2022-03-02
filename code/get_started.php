<!doctype html>

<?php

   session_start();
   include("includes/db_conn.php");
   $date = date("Y-m-d H:i:s");
   $day = date("Y-m-d");
   $errors = array();

   $script_name = pathinfo(__FILE__, PATHINFO_FILENAME);


   function existInDb($code, $db){
      $code_query = "SELECT * FROM users WHERE user_id ='$code'";
      $result = mysqli_query($db, $code_query);
      $number = mysqli_num_rows($result);
      if($number >0){
          return true;
      }else{
          return false;
      }
    }






 



   if(isset($_POST['register_student'])){
      $username = mysqli_real_escape_string($db_handle, $_POST['username']);
      $first_name =  mysqli_real_escape_string($db_handle, $_POST['first_name']);
      $last_name =  mysqli_real_escape_string($db_handle, $_POST['last_name']);
      $email = mysqli_real_escape_string($db_handle, $_POST['email']);
      $password =  mysqli_real_escape_string($db_handle, $_POST['password']);
      $cpassword =  mysqli_real_escape_string($db_handle, $_POST['c_password']);

      $parent_full_name =  mysqli_real_escape_string($db_handle, $_POST['parent_full_name']);
      $parent_email =  mysqli_real_escape_string($db_handle, $_POST['parent_email']);


      

      if (empty($username)) { array_push($errors, "Username is required"); }
      if (empty($first_name)) { array_push($errors, "First Name is required"); }
      if (empty($last_name)) { array_push($errors, "Last Name is required"); }
      if (empty($email)) { array_push($errors, "Email is required"); }
      $user_email_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
      $email_result = mysqli_query($db_handle, $user_email_check_query);
      $email_user = mysqli_fetch_assoc($email_result);
      if ($email_user) { array_push($errors, "Email already exists"); }
      if (empty($password)) { array_push($errors, "Password is required"); }
      if (empty($cpassword)) { array_push($errors, "Password confirmation is required"); }
      if ($password != $cpassword) { array_push($errors, "Passwords do not match!"); }

      if (empty($parent_full_name)) { array_push($errors, "Parent Name is required"); }
      if (empty($parent_email)) { array_push($errors, "Parent Email is required"); }
      


      if (count($errors) == 0) {
         $enc_password = md5($password);

        

         
            $unique_number = uniqid(rand (), true);
            while(existInDb($unique_number, $db_handle)) {
               $unique_number = uniqid(rand (), true);                                       
            }
            $user_id = $unique_number;
            $email_verification_code = rand();
            $register_query = "INSERT INTO users (user_id,     username,   first_name, last_name,   email,       password,       account_type, account_status,    evs,          parent_fullname,        parent_email,  date,       day ) 
                                           VALUES('$user_id', '$username','$first_name', '$last_name','$email', '$enc_password',    'student', 'active',      'not_verified',   '$parent_full_name',     '$parent_email', '$date',  '$day' )";
            if(mysqli_query($db_handle, $register_query)){






               $email_query = "INSERT INTO email_confirmation ( email,	code,	date		) 
                                                        VALUES('$email', '$email_verification_code','$date'  )";
              if(mysqli_query($db_handle, $email_query)){
                  // $email_body = "
                  //         Click on the link below to confirm your FCSC account 
                  //         http://www.fcsc.com/email_confirmation_redirect.php?email=$email&&code=$email_verification_code
                  //     ";
                  // $email_subject = "FCSC Email Confirmation";
                  // $res = mail($email, $email_subject, $email_body, "From: NoReply@fcsc.com");
                  // if($res){
                  header("location: confirm_email_message");
                  // }
              }





              
            }



         
      }

   }


?>


<html class="no-js" lang="en">
   
   <head>
      <meta charset="utf-8">
      <!--====== Title ======-->
      <title>Get Started | Achieving Academy</title>
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
                  <h2 class="title">Register</h2>
               </div>
            </div>
         </div>
      </section>
      <!--====== Page Banner Ends ======-->
      <!--====== Login Start ======-->
      <section class="login-register">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-6">
                  <div class="login-register-content">
                     <h4 class="title">Student Information</h4>
                     <div class="login-register-form">
                        <form method="post" action="get_started">
                           <div class="single-form">  
                              <label> First Name *</label>
                              <input required name="first_name" type="text">
                           </div>
                           <div class="single-form">
                              <label> Last Name *</label>
                              <input required name="last_name" type="text">
                           </div>
                           <div class="single-form">
                              <label> Email Address *</label>
                              <input required name="email" type="email">
                           </div>
                           <div class="single-form">
                              <label>Username *</label>
                              <input required name="username" type="text">
                           </div>
                           <div class="single-form">
                              <label>Password</label>
                              <input required name="password" type="password">
                           </div>
                           <div class="single-form">
                              <label>Confirm Password</label>
                              <input required name="c_password" type="password">
                           </div>
                           <div class="single-form">
                              <div class="checkbox">
                              <h4 class="title">Parent Information</h4>
                                 
                              </div>
                           </div>
                           <div class="single-form">  
                              <label>Parent's Full Name *</label>
                              <input required name="parent_full_name" type="text">
                           </div>
                           <div class="single-form">  
                              <label>Parent's Email Address *</label>
                              <input required name="parent_email" type="text">
                           </div>
                           
                           <div class="single-form">
                              <button type="submit" name="register_student" class="main-btn btn-block">Register</button>
                           </div>
                           <div class="single-form">
                              <label>Already have an account?</label>
                              <a href="sign_in" class="main-btn main-btn-2 btn-block">Log in instead!</a>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--====== Login Ends ======-->
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