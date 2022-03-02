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
        $code_query = "SELECT * FROM courses WHERE course_id ='$code'";
        $result = mysqli_query($db, $code_query);
        $number = mysqli_num_rows($result);
        if($number >0){
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




      if(isset($_POST['add_course'])){
        $course_name = mysqli_real_escape_string($db_handle, $_POST['course_name']);
        $description =  mysqli_real_escape_string($db_handle, $_POST['description']);
        $price = mysqli_real_escape_string($db_handle, $_POST['price']);
    
        if (empty($course_name)) { header("location: courses?msg_error=Course name is required!"); }
        if (empty($description)) { header("location: courses?msg_error=Course description is required!"); }
        if (empty($price)) { header("location: courses?msg_error=Course price is required!"); }
        if(empty($_FILES['display_pic'])){ header("location: courses?msg_error=empty file!"); }
    
    
        if (count($errors) == 0) {
    
          $identity_url = "../dp/";
          $num_identity =uniqid(rand (), true);
          $identity_url  = $identity_url.$num_identity . basename( $_FILES['display_pic']['name']);
    
          if(move_uploaded_file($_FILES['display_pic']['tmp_name'], $identity_url)) {
            
              $unique_number = uniqid(rand (), true);
              while(existInnDb($unique_number, $db_handle)) {
                  $unique_number = uniqid(rand (), true);                                       
              }
              $course_id = $unique_number;
              $email_verification_code = rand();
              $register_query = "INSERT INTO courses (course_id,	course_name,	description,	price,	dp,	           rating,	duration,	status,	date,	day	) 
                                               VALUES('$course_id', '$course_name','$description', '$price', '$identity_url','',    'Self Paced', 'not_published',  '$date',  '$day' )";
              if(mysqli_query($db_handle, $register_query)){
               
                header("location: courses?msg_success=New course successfully added!");
              
              }else{
                header("location: courses?msg_error=could not write!");
              }
    
                       
              
    
          }else{ header("location: courses?msg_error=unable to upload file!"); }
    
          
        }else{
            header("location: courses?msg_error=error!");
        }
    
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


          <div class="card">
            <div class="card-body">
                <div class="template-demo d-flex justify-content-between flex-nowrap">
                    <h4 class="card-title">All Programs</h4>
                    <button  type="button" data-toggle="modal" data-target="#exampleModal-4" data-whatever="@fat" class="btn btn-primary btn-rounded btn-icon">
                        <i class="mdi mdi-database-plus"></i>
                    </button>

                    <div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Add a new Program</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form  method="post" acton="schedules" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Program Name  </label>
                                    <input required name="course_name" type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                <label for="message-text" class="col-form-label">Program Description </label>
                                <textarea name="description" class="form-control" id="message-text"></textarea>
                                </div>

                                <div class="form-group">
                                <label for="recipient-name" class="col-form-label"> Price </label>
                                <input required name="price" type="number" class="form-control" id="recipient-name">
                                </div>

                                
                                <div class="card-body">
                                    <h4 class="card-title d-flex">Program Display Picture
                                    </h4>
                                    <div class="dropify-wrapper"><div class="dropify-message"><span class="file-icon"></span> <p>Drag and drop a file here or click</p><p class="dropify-error">Ooops, something wrong appended.</p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div>
                                    <input name="display_pic" type="file" class="dropify">
                                    <button type="button" class="dropify-clear">Remove</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div>
                                </div>



                                <button name="add_course" type="submit" class="btn btn-lg btn-success">Add Program</button>


                            </form>
                            </div>
                            <div class="modal-footer">
                            
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                    </div>
 
                </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Program Name</th>
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
                                      View Program
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
