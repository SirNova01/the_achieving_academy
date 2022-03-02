<!DOCTYPE html>
<?php
      session_start();
      include("../includes/db_conn.php");
  
      if (isset($_SESSION['account_type']) && $_SESSION['account_type']=="admin") {          
      }else{
        header('location: logout');
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


      function existInnDb($code, $db){
        $code_query = "SELECT * FROM events WHERE event_id ='$code'";
        $result = mysqli_query($db, $code_query);
        $number = mysqli_num_rows($result);
        if($number >0){
            return true;
        }else{
            return false;
        }
      }

      function checkValid($database_date){
        if( strtotime($database_date) > strtotime('now') ) {
            return true;
        }else{
            return false;
        }
      }
    


      $user_id = $_SESSION['user_id'];
      $date = date("Y-m-d H:i:s");
      $day = date("Y-m-d");

      $first_name = '';
      $user_details_query = "SELECT * FROM users WHERE user_id='$user_id' LIMIT 1";
      $user_details_result = mysqli_query($db_handle, $user_details_query);
      $user_details = mysqli_fetch_assoc($user_details_result);
      if ($user_details) {
        $first_name = $user_details['first_name'];
        $last_name = $user_details['last_name'];
        $email = $user_details['email'];
        $account_type = $user_details['account_type'];
      }


      
      if(isset($_POST['add_event'])){
        $title = mysqli_real_escape_string($db_handle, $_POST['event_name']);
        $description =  mysqli_real_escape_string($db_handle, $_POST['description']);
        $event_date = mysqli_real_escape_string($db_handle, $_POST['date']);
        $event_time = mysqli_real_escape_string($db_handle, $_POST['time']);
        $duration =  mysqli_real_escape_string($db_handle, $_POST['duration']);
        $venue = mysqli_real_escape_string($db_handle, $_POST['venue']);
    
        if (empty($title)) { header("location: events?msg_error=Event name is required!"); }
        if (empty($description)) { header("location: events?msg_error=Event description is required!"); }
        if (empty($event_date)) { header("location: events?msg_error=Event date is required!"); }
        if (empty($event_time)) { header("location: events?msg_error=Event time is required!"); }
        if (empty($duration)) { header("location: events?msg_error=Event duration is required!"); }
        if (empty($venue)) { header("location: events?msg_error=Event venue is required!"); }
        if(empty($_FILES['display_pic'])){ header("location: events?msg_error=empty file!"); }
    
        // 01/25/2021	
        $yr = substr($event_date,6 );
        $mn = substr($event_date,3,2 );
        $dy = substr($event_date,0,2);
        $dt = $yr."-".$dy."-".$mn;
    
        if (count($errors) == 0) {
    
          $identity_url = "../events_dp/";
          $num_identity = rand();
          $identity_url  = $identity_url.$num_identity . basename( $_FILES['display_pic']['name']);
    
          if(move_uploaded_file($_FILES['display_pic']['tmp_name'], $identity_url)) {
            
              $unique_number = uniqid(rand (), true);
              while(existInnDb($unique_number, $db_handle)) {
                  $unique_number = uniqid(rand (), true);                                       
              }
              $event_id = $unique_number;
              $email_verification_code = rand();
              $register_query = "INSERT INTO events ( event_id,	title,	description,	date,       	time,    	   duration,	venue,	dp,	date_created,	day_created	) 
                                               VALUES('$event_id', '$title','$description', '$dt', '$event_time',  '$duration', '$venue', '$identity_url',  '$date',  '$day' )";
              if(mysqli_query($db_handle, $register_query)){
               
                header("location: events?msg_success=New event successfully added!");
              
              }else{
                header("location: events?msg_error=could not write!");
              }
    
                       
              
    
          }else{ header("location: events?msg_error=unable to upload file!"); }
    
          
        }else{
            header("location: events?msg_error=error!");
        }
    
      }



      if(isset($_GET['id'])){

        $event_id = $_GET['id'];
        $event_details_query = "SELECT * FROM events WHERE event_id='$event_id' LIMIT 1";
        $event_details_result = mysqli_query($db_handle, $event_details_query);
        $event_details = mysqli_fetch_assoc($event_details_result);
        if ($event_details) {

            



            $title = $event_details['title'];
            $description = $event_details['description'];
            $event_date = $event_details['date'];
            $time = $event_details['time'];

            $duration = $event_details['duration'];
            $venue = $event_details['venue'];
            $dp = $event_details['dp'];
        }


      }else{
          header("location: events");
      }


?>


<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/font/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include("includes/header.php");?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      
      <!-- partial:partials/_sidebar.html -->
      <?php include("includes/sidebar.php");?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <?php if(isset($_GET['msg_success'])){ ?>
            <div class="alert alert-success" role="alert">
                  <?= $_GET['msg_success'] ?>
            </div>
          <?php } ?>

          <?php if(isset($_GET['msg_error'])){ ?>
            <div class="alert alert-danger" role="alert">
                  <?= $_GET['msg_error'] ?>
            </div>
          <?php } ?>



    
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <img class="card-img-top" src="<?=$dp?>" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><?=$title?></h4>
                        <p class="card-text"><?=$description ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">




            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div>
                            <h4 class="card-title mt-1">Event Details</h4>
                        </div>
                       
                    </div>
                    <div class="d-flex flex-column">
                        <div class="d-flex mb-3">
                            <div class="d-flex align-items-center justify-content-center mr-3">
                            <i class="mdi mdi-pin text-hangouts social-icon-outline"></i>
                            </div>
                            <div class="d-flex flex-column ml-1">
                            <h6 class="font-weight-normal mt-2">Venue</h6>
                            <p class="text-muted"><?= $venue ?></p>
                            </div>
                           
                        </div>
                        <div class="d-flex mb-3">
                            <div class="d-flex align-items-center justify-content-center mr-3">
                            <i class="mdi mdi-calendar-today text-dribbble social-icon-outline"></i>
                            </div>
                            <div class="d-flex flex-column ml-1">
                            <h6 class="font-weight-normal mt-2 mb-1"> Date </h6>
                            <p class="text-muted"><?= $event_date ?></p>
                            </div>
                            
                        </div>
                        <div class="d-flex mb-3">
                            <div class="d-flex align-items-center justify-content-center mr-3">
                            <i class="mdi mdi-clock text-facebook social-icon-outline"></i>
                            </div>
                            <div class="d-flex flex-column ml-1">
                            <h6 class="font-weight-normal mt-2 mb-1">Time</h6>
                            <p class="text-muted"><?= $time?></p>
                            </div>
                            
                        </div>
                        <div class="d-flex mb-3">
                            <div class="d-flex align-items-center justify-content-center mr-3">
                            <i class="mdi mdi-clock text-behance social-icon-outline"></i>
                            </div>
                            <div class="d-flex flex-column ml-1">
                            <h6 class="font-weight-normal mt-2 mb-1">Duration</h6>
                            <p class="text-muted"><?= $duration?></p>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>



            </div>
          </div>





          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
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
  <script src="js/data-table.js"></script>
  <!-- End custom js for this page-->

  <script src="js/formpickers.js"></script>
</body>


</html>
