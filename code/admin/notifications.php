<!DOCTYPE html>
<?php
      session_start();
      include("../includes/db_conn.php");
  
      if (isset($_SESSION['status']) && $_SESSION['status'] == "logged in" ) {
      }else{
        header('location: ../home');
      }
  
      $script_name = pathinfo(__FILE__, PATHINFO_FILENAME);
      

      function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
      }


      $user_id = $_SESSION['user_id'];
      $date = date("Y-m-d H:i:s");
      $day = date("Y-m-d");

      $user_details_query = "SELECT * FROM users WHERE user_id='$user_id' LIMIT 1";
      $user_details_result = mysqli_query($db_handle, $user_details_query);
      $user_details = mysqli_fetch_assoc($user_details_result);
      if ($user_details) {
        $first_name = $user_details['first_name'];
        $last_name = $user_details['last_name'];
        $email = $user_details['email'];
      }



      


?>

<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Notifications | Admin Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/font/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body class="sidebar-icon-only sidebar-fixed">
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php include("includes/header.php");?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      
      <?php include("includes/sidebar.php");?>
      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="email-wrapper wrapper">
            <div class="row align-items-stretch">
              <div class="mail-sidebar d-none d-lg-block col-md-4 pt-3 bg-white">
                <div class="menu-bar">
                  <ul class="menu-items">
                    <!-- <li class="compose mb-3"><button class="btn btn-primary btn-block">Compose</button></li> -->
                    <?php
                        $unseen_reports_query = "SELECT * FROM notifications WHERE receiver_id='admin' AND status ='unseen'";
                        $unseen_reports_result = mysqli_query($db_handle, $unseen_reports_query);
                        $inbox = mysqli_num_rows($unseen_reports_result);
                      ?>
                    <li class="active"><a href="#"><i class="mdi mdi-email-outline"></i> Inbox</a><span class="badge badge-pill badge-success"><?=$inbox?></span></li>
                  </ul>
                  <div class="wrapper">
                    <div class="online-status d-flex justify-content-between align-items-center">
                    <p class="chat">Users</p> </div>
                  </div>
                  <ul class="profile-list">

                        <?php
                          $studio_counter = 1;
                          $empty = TRUE;
                          $table_result = $db_handle->query("SELECT * FROM users WHERE account_status ='verified' ORDER BY id desc");
                          foreach ($table_result as $user_row): ?>

                          <?php if($user_row['account_type'] != "admin"){ ?>

                          <?php
                            $first_name = $user_row['first_name'];
                            $last_name = $user_row['last_name'];
                            $email = $user_row['email'];
                            $account_type = $user_row['account_type'];
                            $pic = $user_row['pic'];
                            $picture = "";
                            $fullname = "";
                            if($account_type =="user"){
                              $picture = "../dashboard/".$pic;
                              $fullname = $first_name;
                            }else if($account_type =="partner"){
                              $picture = "../partner-dashboard/".$pic;
                              $fullname =  $user_row['business_name'];
                            }
                          ?>

                          <li class="profile-list-item"> <a href="message_user?id=<?=$user_row['user_id'] ?>"> <span class="pro-pic"><img src="<?=$picture ?>" alt=""></span><div class="user"><p class="u-name"><?=$fullname?></p><p class="u-designation"><?=$account_type?></p></div> </a></li>
                        <?php } ?>
                        <?php $empty = FALSE; $studio_counter++; endforeach; unset($user_row); if ($empty == TRUE) echo "<h6 style='text-align: center; color: red'></h6>" ?>

                  </ul>
                </div>
              </div>
              <!-- <div class="mail-list-container col-md-3 pt-4 pb-4 border-right bg-white">
                <div class="border-bottom pb-4 mb-3 px-3">
                  <button class="btn btn-primary btn-block">Compose</button>
                </div>
                <div class="mail-list new_mail">
                  <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input"> </label></div>
                  <div class="content">
                    <p class="sender-name">David Moore</p>
                    <p class="message_text">Hi Emily, Please be informed that the new project presentation is due Monday.</p>
                  </div>
                  <div class="details">
                    <i class="mdi mdi-star-outline"></i>
                  </div>
                </div>
                <div class="mail-list new_mail">
                  <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked> </label></div>
                  <div class="content">
                    <p class="sender-name">Microsoft Account Password Change</p>
                    <p class="message_text">Change the password for your Microsoft Account using the security code 35525</p>
                  </div>
                  <div class="details">
                    <i class="mdi mdi-star favorite"></i>
                  </div>
                </div>
                <div class="mail-list">
                  <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input"> </label></div>
                  <div class="content">
                    <p class="sender-name">Sophia Lara</p>
                    <p class="message_text">Hello, last date for registering for the annual music event is closing in</p>
                  </div>
                  <div class="details">
                    <i class="mdi mdi-star-outline"></i>
                  </div>
                </div>
                <div class="mail-list">
                  <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input"> </label></div>
                  <div class="content">
                    <p class="sender-name">Stella Davidson</p>
                    <p class="message_text">Hey there, can you send me this year’s holiday calendar?</p>
                  </div>
                  <div class="details">
                    <i class="mdi mdi-star favorite"></i>
                  </div>
                </div>
                <div class="mail-list">
                  <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input"> </label></div>
                  <div class="content">
                    <p class="sender-name">David Moore</p>
                    <p class="message_text">FYI</p>
                  </div>
                  <div class="details">
                    <i class="mdi mdi-star favorite"></i>
                  </div>
                </div>
                <div class="mail-list">
                  <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input"> </label></div>
                  <div class="content">
                    <p class="sender-name">Daniel Russel</p>
                    <p class="message_text">Hi, Please find this week’s update..</p>
                  </div>
                  <div class="details">
                    <i class="mdi mdi-star-outline"></i>
                  </div>
                </div>
                
              </div>
              <div class="mail-view d-none d-md-block col-md-9 col-lg-7 bg-white">
                <div class="row">
                  <div class="col-md-12 mb-4 mt-4">
                    <div class="btn-toolbar">
                      
                      
                    </div>
                  </div>
                </div>
                <div class="message-body">
                  <div class="sender-details">
                    <img class="img-sm rounded-circle mr-3" src="images/faces/face11.jpg" alt="">
                    <div class="details">
                      <p class="msg-subject">
                        Weekly Update - Week 19 (May 8, 2017 - May 14, 2017)
                      </p>
                      <p class="sender-email">
                        Sarah Graves
                        <a href="#">itsmesarah268@gmail.com</a>
                        &nbsp;<i class="mdi mdi-account-multiple-plus"></i>
                      </p>
                    </div>
                  </div>
                  <div class="message-content">
                    <p>Hi Emily,</p>
                    <p>This week has been a great week and the team is right on schedule with the set deadline. The team has made great progress and achievements this week. At the current rate we will be able to deliver the product right on time and meet the quality that is expected of us. Attached are the seminar report held this week by our team and the final product design that needs your approval at the earliest.</p>
                    <p>For the coming week the highest priority is given to the development for once the design is approved and necessary improvements are made.</p>
                    <p><br><br>Regards,<br>Sarah Graves</p>
                  </div>
                 
                </div>
              </div> -->
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php include("includes/footer.php");?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>


</html>
