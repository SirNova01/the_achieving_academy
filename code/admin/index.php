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
            <div class="col-md-4 grid-margin">
							<div class="card bg-facebook">
								<div class="card-body">
									<div class="d-flex flex-row align-items-top">
										<i class="mdi mdi-account text-white icon-md"></i>
										<div class="ml-3">
                      <?php
                        // $notifications_query = "SELECT * FROM notifications WHERE receiver_id='$user_id' OR receiver_id='admin' AND view_status = 'unseen'";
                        // $notifications_result = mysqli_query($db_handle, $notifications_query);
                        // $rows = mysqli_num_rows($notifications_result);
                      ?>
											<h6 style="margin-top:8px" class="text-white">20 Registered Students</h6>
										</div>
									</div>
								</div>

               
							</div>
						</div>


						<div class="col-md-4 grid-margin">
							<div class="card bg-linkedin">
								<div class="card-body">
									<div class="d-flex flex-row align-items-top">
										<i class="mdi mdi-apps text-white icon-md"></i>
										<div class="ml-3">
                      <?php
                        // $tasks_query = "SELECT * FROM tasks WHERE day_created='$day'";
                        // $tasks_result = mysqli_query($db_handle, $tasks_query);
                        // $tasks_rows = mysqli_num_rows($tasks_result);
                      ?>
											<h6 style="margin-top:8px" class="text-white">12 Total Courses</h6>
										</div>
                    
									</div>
								</div>

							</div>
						</div>
            

						<div class="col-md-4 grid-margin">
							<div class="card bg-twitter">
								<div class="card-body">
									<div class="d-flex flex-row align-items-top">
										<i class="mdi mdi-account-group text-white icon-md"></i>
										<div class="ml-3">
                     <?php
                        // $registered_users_query = "SELECT * FROM users WHERE reg_day='$day'";
                        // $registered_users_result = mysqli_query($db_handle, $registered_users_query);
                        // $registered_users_rows = mysqli_num_rows($registered_users_result);
                      ?>
											<h6 style="margin-top:8px;" class="text-white">12 Email Subscribers</h6>
										</div>
									</div>

              
								</div>
            
							</div>
						</div>
					</div>

          <div class="card">
            <div class="card-body">
                <div class="template-demo d-flex justify-content-between flex-nowrap">
                    <h4 class="card-title">Courses</h4>
                    <a href="courses"><button  type="button" class="btn btn-primary btn-rounded btn-icon">
                        <i class="mdi mdi-apps"></i>
                    </button></a>
                </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Course Name</th>
                            <th>Description</th>
                            <th> Price</th>
                            <th>Status</th>
                            <th>.</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $report_counter = 1;
                          $empty = TRUE;
                          $table_result = $db_handle->query("SELECT * FROM courses");
                          foreach ($table_result as $course_row): ?>
                            <tr>
                                <td><?= $report_counter ?></td>
                                <td><?= $course_row['course_name'] ?></td>
                                <td><?= $course_row['description'] ?></td>
                                <td><?= $course_row['price'] ?></td>
                                <td>
                                  <div class="badge badge-success badge-pill"><?= $course_row['status'] ?></div>
                                </td>
                                <td>
                                  <a href="view_course?id=<?= $course_row['course_id'] ?>">
                                    <button type="button" class="btn btn-info btn-icon-text">
                                    <i class="mdi mdi-eye btn-icon-prepend"></i>
                                      View Course
                                    </button>
                                  </a>
                                </td>
                               
                            </tr>
                        <?php $empty = FALSE; $report_counter++; endforeach; unset($course_row); if ($empty == TRUE) echo "<h6 style='text-align: center; color: red'>There are no new Tasks</h6>" ?>
                      
                      </tbody>
                     
                    </table>
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
</body>


</html>
