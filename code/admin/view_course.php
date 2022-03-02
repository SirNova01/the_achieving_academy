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
        $code_query = "SELECT * FROM modules WHERE module_id ='$code'";
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

      $course_id = '';

      if(isset($_GET['id'])  || isset($_SESSION['course_id'])){
        if(isset($_GET['id'])){
            $course_id = $_GET['id'];
            $_SESSION['course_id'] =$course_id;
        }else{
            $course_id = $_SESSION['course_id'];
        }
      }else{
          header("location: courses");
      }

      
      if(isset($_POST['add_module'])){
        $module_name = mysqli_real_escape_string($db_handle, $_POST['module_name']);
        $description = mysqli_real_escape_string($db_handle, $_POST['description']);
        $module_index = mysqli_real_escape_string($db_handle, $_POST['module_index']); 
        $completion_points = mysqli_real_escape_string($db_handle, $_POST['completion_points']); 

        if (empty($module_name)) { header("location: view_course?msg_error=Module name is required!"); }
        if (empty($description)) { header("location: view_course?msg_error=Module description is required!"); }
        if (empty($module_index)) { header("location: view_course?msg_error=Please select index!"); }
        if(empty($_FILES['mdp'])){ header("location: view_course?msg_error=empty file!"); }

        $mdp_url = "../dp/";
          $num_mdp = uniqid(rand (), true);
          $mdp_url  = $mdp_url.$num_mdp . basename( $_FILES['mdp']['name']);
    
          if(move_uploaded_file($_FILES['mdp']['tmp_name'], $mdp_url)) {
            $unique_number = uniqid(rand (), true);
            while(existInnDb($unique_number, $db_handle)) {
                $unique_number = uniqid(rand (), true);                                       
            }
            $module_id = $unique_number;
            $register_query = "INSERT INTO modules (module_id,   	course_id,	module_index,	module_name,	description,	dp,            completion_points,	date,	day	) 
                                             VALUES('$module_id', '$course_id','$module_index', '$module_name', '$description', '$mdp_url',    '$completion_points', '$date',  '$day' )";
            if(mysqli_query($db_handle, $register_query)){
                header("location: view_course?msg_success=successfully added new module!");
            }

          }else{header("location: view_course?msg_error=unable to upload file!");}

      }

      if(isset($_POST['edit_course'])){
        $course_name = mysqli_real_escape_string($db_handle, $_POST['course_name']);
        $description =  mysqli_real_escape_string($db_handle, $_POST['description']);
        $price = mysqli_real_escape_string($db_handle, $_POST['price']);
    
        if (empty($course_name)) { header("location: view_course?msg_error=Course name is required!"); }
        if (empty($description)) { header("location: view_course?msg_error=Course description is required!"); }
        if (empty($price)) { header("location: view_course?msg_error=Course price is required!"); }
        if(empty($_FILES['display_pic'])){
            // update course

            $sql = "UPDATE courses SET course_name  = '$course_name', description='$description', price='$price' WHERE course_id='$course_id'";
            if(mysqli_query($db_handle, $sql)){
                header("location: view_course?msg_success=Program Successfully Updated!");
            }

        }else{

            if (count($errors) == 0) {
                $identity_url = "../dp/";
                $num_identity = uniqid(rand (), true);
                $identity_url  = $identity_url.$num_identity . basename( $_FILES['display_pic']['name']);
                if(move_uploaded_file($_FILES['display_pic']['tmp_name'], $identity_url)) {
                    // update course
                    $sql = "UPDATE courses SET course_name  = '$course_name', description='$description', price='$price', dp='$identity_url' WHERE course_id='$course_id'";
                    if(mysqli_query($db_handle, $sql)){
                        header("location: view_course?msg_success=Program Successfully Updated!");
                    }
                }
    
            }
            
        }

        

      }

        
        $event_details_query = "SELECT * FROM courses WHERE course_id='$course_id' LIMIT 1";
        $event_details_result = mysqli_query($db_handle, $event_details_query);
        $event_details = mysqli_fetch_assoc($event_details_result);
        if ($event_details) {

            $course_name = $event_details['course_name'];
            $description = $event_details['description'];
            $price = $event_details['price'];
            $rating = $event_details['rating'];
            $duration = $event_details['duration'];
            $status = $event_details['status'];
            $dp = $event_details['dp'];

            $creation_date = $event_details['date'];
            $creation_day = $event_details['day'];
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
                <div class="col-md-12 mb-4 mt-4">
                    <div class="template-demo">
                        <button type="button" data-toggle="modal" data-target="#exampleModal-edit-program" data-whatever="@fat" class="btn btn-outline-primary btn-fw">Edit Program</button>
                        <button type="button" data-toggle="modal" data-target="#exampleModal-del" data-whatever="@fat" class="btn btn-outline-danger btn-fw">Delete Program</button>
                        <button   type="button" data-toggle="modal" data-target="#exampleModal-new-module" data-whatever="@fat"  class="btn btn-outline-info btn-fw">Add New Modules</button>
                        
                        
                    </div>
                </div>
            </div>


          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <img class="card-img-top" src="<?=$dp?>" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><?=$course_name?></h4>
                        <p class="card-text"><?=$description ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card"> 
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div>
                                <h4 class="card-title mt-1">Program Details</h4>
                            </div>
                        
                        </div>
                        <div class="d-flex flex-column">
                            <div class="d-flex mb-3">
                                <div class="d-flex align-items-center justify-content-center mr-3">
                                <i class="mdi mdi-cash-usd text-hangouts social-icon-outline"></i>
                                </div>
                                <div class="d-flex flex-column ml-1">
                                <h6 class="font-weight-normal mt-2">Course Price</h6>
                                <p class="text-muted"><?= $price ?></p>
                                </div>
                            
                            </div>
                            <div class="d-flex mb-3">
                                <div class="d-flex align-items-center justify-content-center mr-3">
                                <i class="mdi mdi-calendar-today text-dribbble social-icon-outline"></i>
                                </div>
                                <div class="d-flex flex-column ml-1">
                                <h6 class="font-weight-normal mt-2 mb-1"> Date Created</h6>
                                <p class="text-muted"><?php
                                    $cd = time_elapsed_string($creation_date, $full = false);
                                    echo $cd;
                                ?></p>
                                </div>
                                
                            </div>
                            <div class="d-flex mb-3">
                                <div class="d-flex align-items-center justify-content-center mr-3">
                                <i class="mdi mdi-clock text-facebook social-icon-outline"></i>
                                </div>
                                <div class="d-flex flex-column ml-1">
                                <h6 class="font-weight-normal mt-2 mb-1">Course Status</h6>
                                <p class="text-muted"><?= $status?></p>
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
            <div class="col-md-4 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Program Modules</h4>
                        <ul class="bullet-line-list">

                        <?php
                          $report_counter = 1;
                          $empty = TRUE;
                          $module_result = $db_handle->query("SELECT * FROM modules where course_id='$course_id'");
                          foreach ($module_result as $module_row): ?>

                            <li> <a href="view_module?id=<?=$module_row['module_id']?>">
                                <h6><?= $module_row['module_name'] ?></h6>
                                <p class="mb-0"><?= $module_row['description'] ?> </p>
                                <p class="text-muted">
                                    <i class="mdi mdi-clock-outline"></i>
                                    <?php
                                        $m_date_created = $module_row['date'];
                                    ?>
                                    <?php
                                        $tm_ago = time_elapsed_string($m_date_created, $full = false);
                                        echo $tm_ago;
                                    ?>
                                </p>
                            </li>
                            </a>
                            
                        <?php $empty = FALSE; $report_counter++; endforeach; unset($module_row); if ($empty == TRUE) echo "<h6 style='text-align: center; color: red'>...</h6>" ?>
                      

                        </ul>
                    </div>
                </div>
            </div>
            
          </div>

            <div class="modal fade" id="exampleModal-edit-program" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Edit This Program</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <form  method="post" acton="view_course" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Program Name  </label>
                                <input required name="course_name" type="text" value="<?=$course_name?>" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                            <label for="message-text" class="col-form-label">Program Description </label>
                            <textarea name="description" value="<?=$description?>" class="form-control" id="message-text"></textarea>
                            </div>

                            <div class="form-group">
                            <label for="recipient-name" class="col-form-label"> Price </label>
                            <input required name="price" value="<?=$price?>" type="number" class="form-control" id="recipient-name">
                            </div>

                            
                            <div class="card-body">
                                <h4 class="card-title d-flex">Program Display Picture
                                </h4>
                                <div class="dropify-wrapper"><div class="dropify-message"><span class="file-icon"></span> <p>Drag and drop a file here or click</p><p class="dropify-error">Ooops, something wrong appended.</p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div>
                                <input name="display_pic" type="file" class="dropify">
                                <button type="button" class="dropify-clear">Remove</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div>
                            </div>



                            <button name="edit_course" type="submit" class="btn btn-lg btn-primary">Update Program</button>


                        </form>
                        </div>
                        <div class="modal-footer">
                        
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal-new-module" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Add a new module</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <form  method="post" acton="view_course" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Module Name  </label>
                                <input required name="module_name" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                            <label for="message-text" class="col-form-label">Module Description </label>
                            <textarea name="description" class="form-control" id="message-text"></textarea>
                            </div>
                            <input type="hidden" name="course_id" value="<?=$course_id?>">

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Large select</label>
                                <select name="module_index" class="form-control form-control-lg" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                                <option>17</option>
                                <option>18</option>
                                <option>19</option>
                                <option>20</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Completion Points  </label>
                                <input required name="completion_points" type="number" class="form-control" id="recipient-name">
                            </div>

                            <div class="card-body">
                                <h4 class="card-title d-flex">Module Display Picture
                                </h4>
                                <div class="dropify-wrapper"><div class="dropify-message"><span class="file-icon"></span> <p>Drag and drop a file here or click</p><p class="dropify-error">Ooops, something wrong appended.</p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div>
                                <input name="mdp" type="file" class="dropify">
                                <button type="button" class="dropify-clear">Remove</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div>
                            </div>



                            <button name="add_module" type="submit" class="btn btn-lg btn-info">Add Module</button>


                        </form>
                        </div>
                        <div class="modal-footer">
                        
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal-del" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Delete Program</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <p>Are you sure you want to delete this program?</p>
                        <p>you won't be able to undo this action</p>
                        <button type="button" class="btn btn-danger btn-fw">Delete Program</button>
                        </div>
                        <div class="modal-footer">
                        
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
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
