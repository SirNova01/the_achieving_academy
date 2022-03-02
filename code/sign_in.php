<!doctype html>

<?php
  session_start();
  include("includes/db_conn.php");
  $day = date("Y-m-d");
  $date = date("Y-m-d H:i:s");
  $errors = array();
  $email ="";
  $password="";
 
  if(isset($_POST['sign_in'])){
    $email = mysqli_real_escape_string($db_handle, $_POST['email']);
    $password =  mysqli_real_escape_string($db_handle, $_POST['password']);
  
    if (empty($email)) { array_push($errors, "email is required"); }
    if (empty($password)) { array_push($errors, "password is required"); }

    if (count($errors) == 0) {
      $enc_password = md5($password);

      $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
		$result = mysqli_query($db_handle, $user_check_query);
		$user = mysqli_fetch_assoc($result);
		if ($user) { // if user exists
			if ($user['password'] === $enc_password) {

                $account_type = $user['account_type'];
                if($account_type == "admin"){

                    $_SESSION['status'] = "logged in";
                    $_SESSION['email'] = $email;
                    $_SESSION['account_type'] = $user['account_type'];
                    $_SESSION['user_id'] = $user['user_id'];
                    header("location: admin");
               }else{
                    $evs = $user['evs'];
                    if($evs == "verified"){
                        $acc_status = $user['account_status'];
                        if ($acc_status == "active"){

                            $_SESSION['status'] = "logged in";
                            $_SESSION['email'] = $email;
                            $_SESSION['account_type'] = $user['account_type'];
                            $_SESSION['user_id'] = $user['user_id'];
                            header("location: dashboard");
                                                    
                        }else{
                            
                            if($account_status == "suspended"){
                                array_push($errors, "Your account has been suspended, please contact support");
                                
                            }else{
                                array_push($errors, "Your account has been suspended, please contact support");         
                            }
                            
                        }
                    }else{
                        //resend email and redirect to email message
                        array_push($errors, "please verify your email address!");
                    }
                    
                }
                
                
                
            
            
            }else{
                array_push($errors, "Incorrect password");
            }
        }else{
            array_push($errors, "Email not registered");
        }

    }
    
  }
?>


<html class="no-js" lang="en">
  
   <head>
      <meta charset="utf-8">
      <!--====== Title ======-->
      <title>Sign In | Achieving Academy</title>
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


      <style>

        .errror {
        width: 100%; 
        margin: 0px auto; 
        padding: 10px; 
        border: 1px solid #a94442; 
        color: #a94442; 
        background: #f2dede; 
        border-radius: 5px; 
        text-align: left;
        }
        </style>


      <!--====== Page Banner Start ======-->
      <section class="page-banner">
         <div class="page-banner-bg bg_cover" style="background-image: url(assets/images/page-banner.jpg);">
            <div class="container">
               <div class="banner-content text-center">
                  <h2 class="title">Login</h2>
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
                     <h4 class="title">Login to Your Account</h4>
                     <div class="login-register-form">
                        <form action="sign_in" method="post">
                        <?php include('includes/errors.php'); ?>
                           <div class="single-form">
                              <label>Email address *</label>
                              <input required name="email" type="email">
                           </div>
                           <div class="single-form">
                              <label>Password</label>
                              <input required name="password" type="password">
                           </div>
                           <div class="single-form">
                              <button type="submit" name="sign_in" class="main-btn btn-block">Login</button>
                           </div>
                           <div class="single-form d-flex justify-content-between">
                              <div class="checkbox">
                                 <!-- <input type="checkbox" id="remember">
                                 <label for="remember"><span></span> Remember Me</label> -->
                              </div>
                              <div class="forget">
                                 <a href="password_reset">Lost Your Password?</a>
                              </div>
                           </div>
                           <div class="single-form">
                              <label>You don't have account ?</label>
                              <a href="get_started" class="main-btn main-btn-2 btn-block">Create Account Now</a>
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