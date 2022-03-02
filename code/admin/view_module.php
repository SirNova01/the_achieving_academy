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
        $code_query = "SELECT * FROM module_videos WHERE video_id ='$code'";
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

      $module_id = '';
      $course_id = $_SESSION['course_id'];

      if(isset($_GET['id'])  || isset($_SESSION['module_id'])){
        if(isset($_GET['id'])){
            $module_id = $_GET['id'];
            $_SESSION['module_id'] =$module_id;
        }else{
            $module_id = $_SESSION['module_id'];
        }
      }else{
          header("location: modules");
      }

      
    
        
        $module_details_query = "SELECT * FROM modules WHERE module_id='$module_id' LIMIT 1";
        $module_details_result = mysqli_query($db_handle, $module_details_query);
        $module_details = mysqli_fetch_assoc($module_details_result);
        if ($module_details) {

            $module_name = $module_details['module_name'];
            $description = $module_details['description'];
            $course_id = $module_details['course_id'];
            $module_index = $module_details['module_index'];
            $completion_points = $module_details['completion_points'];
            $dp = $module_details['dp'];

            $creation_date = $module_details['date'];
            $creation_day = $module_details['day'];
        }





        if(isset($_POST['add_video'])){
            $title = mysqli_real_escape_string($db_handle, $_POST['title']);
            $note = mysqli_real_escape_string($db_handle, $_POST['note']);
            $module_id = mysqli_real_escape_string($db_handle, $_POST['module_id']);
            $course_id = mysqli_real_escape_string($db_handle, $_POST['course_id']);
    
            if (empty($title)) { header("location: view_module?msg_error=video title is required!"); }
            if(empty($_FILES['vid'])){ header("location: view_module?msg_error=please add a video file!"); }
    
              $vid_url = "../module_videos/";
              $num_vid = uniqid(rand (), true);
              $vid_url  = $vid_url.$num_vid . basename( $_FILES['vid']['name']);
        
              if(move_uploaded_file($_FILES['vid']['tmp_name'], $vid_url)) {
                $unique_number = uniqid(rand (), true);
                while(existInnDb($unique_number, $db_handle)) {
                    $unique_number = uniqid(rand (), true);                                       
                }
                $video_id = $unique_number;
                $register_query = "INSERT INTO module_videos (video_id,	   module_id,	course_id, title,	video_url,	  thumb,	note,	date,	day	) 
                                                       VALUES('$video_id', '$module_id','$course_id', '$title', '$vid_url', '',     '$note',  '$date',  '$day' )";
                if(mysqli_query($db_handle, $register_query)){
                    header("location: view_module?msg_success=successfully added new video!");
                }
    
              }else{header("location: view_module?msg_error=unable to upload video!");}
    
        }



        function fileExists($code, $db){
            $code_query = "SELECT * FROM module_printable_resources WHERE resource_id ='$code'";
            $result = mysqli_query($db, $code_query);
            $number = mysqli_num_rows($result);
            if($number >0){
                return true;
            }else{
                return false;
            }
        }


        if(isset($_POST['add_file'])){
            $title = mysqli_real_escape_string($db_handle, $_POST['title']);
            $note = mysqli_real_escape_string($db_handle, $_POST['note']);
            $module_id = mysqli_real_escape_string($db_handle, $_POST['module_id']);
            $course_id = mysqli_real_escape_string($db_handle, $_POST['course_id']);
    
            if (empty($title)) { header("location: view_module?msg_error=video title is required!"); }
            if(empty($_FILES['pfile'])){ header("location: view_module?msg_error=please add a printable file!"); }
    
              $file_url = "../module_printable_resources/";
              $num_file = uniqid(rand (), true);
              $file_url  = $file_url.$num_file . basename( $_FILES['pfile']['name']);
        
              if(move_uploaded_file($_FILES['pfile']['tmp_name'], $file_url)) {
                $unique_number = uniqid(rand (), true);
                while(fileExists($unique_number, $db_handle)) {
                    $unique_number = uniqid(rand (), true);                                       
                }
                $resource_id = $unique_number;
                $register_query = "INSERT INTO module_printable_resources (resource_id,	module_id,	course_id,      	title,	file_url,	   note,	date,	day		) 
                                                                    VALUES('$resource_id', '$module_id','$course_id', '$title', '$file_url',   '$note',  '$date',  '$day' )";
                if(mysqli_query($db_handle, $register_query)){
                    header("location: view_module?msg_success=successfully added new file!");
                }
    
              }else{header("location: view_module?msg_error=unable to upload file!");}
    
        }



        function quizExists($code, $db){
            $code_query = "SELECT * FROM quizzes WHERE quiz_id ='$code'";
            $result = mysqli_query($db, $code_query);
            $number = mysqli_num_rows($result);
            if($number >0){
                return true;
            }else{
                return false;
            }
        }


        if(isset($_POST['create_quiz'])){
            $title = mysqli_real_escape_string($db_handle, $_POST['title']);
            $question_duration = mysqli_real_escape_string($db_handle, $_POST['question_duration']);
            $module_id = mysqli_real_escape_string($db_handle, $_POST['module_id']);
            $course_id = mysqli_real_escape_string($db_handle, $_POST['course_id']);
    
            if (empty($title)) { header("location: view_module?msg_error=video title is required!"); }

                $unique_number = uniqid(rand (), true);
                while(quizExists($unique_number, $db_handle)) {
                    $unique_number = uniqid(rand (), true);                                       
                }
                $quiz_id = $unique_number;
                $register_query = "INSERT INTO quizzes (quiz_id,	module_id,	course_id,	 quiz_name,      question_duration,	date,	day	) 
                                                 VALUES('$quiz_id', '$module_id','$course_id', '$title',   '$question_duration',  '$date',  '$day' )";
                if(mysqli_query($db_handle, $register_query)){
                    header("location: view_module?msg_success=successfully created quiz!");
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
  <link rel="stylesheet" href="vendors/lightgallery/css/lightgallery.css">
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
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="view_course?id=<?=$course_id?>"> <button type="button" class="btn btn-sm btn-outline-secondary"><i class="mdi mdi-reply text-primary"></i> Back To Program</button></a>
                </div>
              
            </div>
            </div>
        </div>


          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <img class="card-img-top" src="<?=$dp?>" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><?=$module_name?></h4>
                        <p class="card-text"><?=$description ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card"> 
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div>
                                <h4 class="card-title mt-1">Module Details</h4>
                            </div>
                        
                        </div>
                        <div class="d-flex flex-column">
                            <div class="d-flex mb-3">
                                <div class="d-flex align-items-center justify-content-center mr-3">
                                <i class="mdi mdi-view-sequential text-hangouts social-icon-outline"></i>
                                </div>
                                <div class="d-flex flex-column ml-1">
                                <h6 class="font-weight-normal mt-2">Module Index</h6>
                                <p class="text-muted"><?= $module_index ?></p>
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
                                <i class="mdi mdi-star-four-points text-facebook social-icon-outline"></i>
                                </div>
                                <div class="d-flex flex-column ml-1">
                                <h6 class="font-weight-normal mt-2 mb-1">Total Points</h6>
                                <p class="text-muted"><?= $completion_points?></p>
                                </div>
                                
                            </div>
                           

                            
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php
            
                $quizzes_query = "SELECT * FROM quizzes WHERE module_id='$module_id' LIMIT 1";
                $quizzes_result = mysqli_query($db_handle, $quizzes_query);
                $quizzes = mysqli_fetch_assoc($quizzes_result);
                if ($quizzes) {
                    $qid = $quizzes['quiz_id'];
            ?>
            <div class="col-md-4 grid-margin stretch-card"> 
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div>
                                <h4 class="card-title mt-1">Module Quiz</h4>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="d-flex mb-3">
                                <div class="d-flex align-items-center justify-content-center mr-3">
                                <i class="mdi mdi-view-sequential text-hangouts social-icon-outline"></i>
                                </div>
                                <div class="d-flex flex-column ml-1">
                                <h6 class="font-weight-normal mt-2">Total Questions</h6>
                                <?php
                                    $total_questions_query = "SELECT * FROM question_bank WHERE quiz_id='$qid'";
                                    $total_questions_result = mysqli_query($db_handle, $total_questions_query);
                                    $tqrows = mysqli_num_rows($total_questions_result);
                                ?>
                                <p class="text-muted"><?=  $tqrows  ?></p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <div class="d-flex align-items-center justify-content-center mr-3">
                                <i class="mdi mdi-calendar-today text-dribbble social-icon-outline"></i>
                                </div>
                                <div class="d-flex flex-column ml-1">
                                <h6 class="font-weight-normal mt-2 mb-1"> Total Duration </h6>

                                <?php
                                
                                    $time_ctr = 0;
                                    $duration_result = $db_handle->query("SELECT * FROM question_bank WHERE quiz_id='$qid'");
                                    foreach ($duration_result as $dur_row){
                                        $time_ctr = $time_ctr + $dur_row['duration'];
                                    }
                                
                                ?>

                                <p class="text-muted"><?=$time_ctr?></p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <div class="d-flex align-items-center justify-content-center mr-3">
                                <i class="mdi mdi-star-four-points text-facebook social-icon-outline"></i>
                                </div>
                                <div class="d-flex flex-column ml-1">
                                <h6 class="font-weight-normal mt-2 mb-1">Question Duration</h6>
                                <?php
                                
                                    
                                
                                ?>
                                <p class="text-muted"><?=$quizzes['question_duration']?></p>
                                </div>
                            </div>
                        </div>
                        <a href="add_questions?id=<?=$qid?>"> <button type="button" class="btn btn-dark btn-lg btn-block"> Add Questions</button></a>
                    </div>
                </div>
            </div>

            <?php }else{ ?>
                <div class="col-md-4 grid-margin stretch-card"> 
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div>
                                    <h4 class="card-title mt-1">Module Quiz</h4>
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                               <code> No quiz found</code>
                            </div>
                            <button  type="button" data-toggle="modal" data-target="#exampleModal-create_quiz" data-whatever="@fat"  class="btn btn-dark btn-lg btn-block">  Create Quiz</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="card px-3">
                <div class="card-body">
                    <div class="template-demo d-flex justify-content-between flex-nowrap">
                        <h4 class="card-title">Video Resources</h4> 
                        <button type="button" data-toggle="modal" data-target="#exampleModal-add-video" data-whatever="@fat"  class="btn btn-dark btn-rounded btn-icon">
                            <i class="mdi mdi-plus"></i>
                        </button>
                    </div>
                  <div id="video-gallery" class="row lightGallery">
                    <?php
                        $report_counter = 1;
                        $empty = TRUE;
                        $vid_result = $db_handle->query("SELECT * FROM module_videos where module_id='$module_id'");
                        foreach ($vid_result as $vid_row): ?>
                        <a class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" target="_blank" href="<?=$vid_row['video_url']?>">
                            <img src="images/vid.png" alt="image">
                            <div class="demo-gallery-poster">
                                <img src="images/lightbox/play-button.png" alt="image">
                            </div>
                            <h6><?=$vid_row['title']?></h6>
                        </a>

                    <?php $empty = FALSE; $report_counter++; endforeach; unset($vid_row); if ($empty == TRUE) echo "<h6 style='text-align: center; color: red'>...</h6>" ?>
                      

                   
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-lg-12">
              <div class="card px-3">
                <div class="card-body">
                    <div class="template-demo d-flex justify-content-between flex-nowrap">
                        <h4 class="card-title">Printable Resources</h4> 
                        <button type="button" data-toggle="modal" data-target="#exampleModal-add-file" data-whatever="@fat"  class="btn btn-dark btn-rounded btn-icon">
                            <i class="mdi mdi-plus"></i>
                        </button>
                    </div>
                  <div id="video-gallery" class="row lightGallery">
                    <?php
                        $report_counter = 1;
                        $empty = TRUE;
                        $file_result = $db_handle->query("SELECT * FROM module_printable_resources where module_id='$module_id'");
                        foreach ($file_result as $file_row): ?>
                        <a class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" target="_blank" href="<?=$file_row['file_url']?>">
                            <img src="images/file.png" alt="image">
                            <div class="demo-gallery-poster">
                                <img src="images/lightbox/play-button.png" alt="image">
                            </div>
                            <h6><?=$file_row['title']?></h6>
                        </a>

                    <?php $empty = FALSE; $report_counter++; endforeach; unset($file_row); if ($empty == TRUE) echo "<h6 style='text-align: center; color: red'>...</h6>" ?>
                      

                   
                  </div>
                </div>
              </div>
            </div>
          </div>


        


            <div class="modal fade" id="exampleModal-add-video" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Add new video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <form  method="post" acton="view_module" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Video Title </label>
                                <input required name="title" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                            <label for="message-text" class="col-form-label">Add a note (Optional) </label>
                            <textarea name="note" class="form-control" id="message-text"></textarea>
                            </div>
                            <input type="hidden" name="module_id" value="<?=$module_id?>">
                            <input type="hidden" name="course_id" value="<?=$course_id?>">

                            <div class="card-body">
                                <h4 class="card-title d-flex">Video
                                </h4>
                                <div class="dropify-wrapper"><div class="dropify-message"><span class="file-icon"></span> <p>Drag and drop a video here or click</p><p class="dropify-error">Ooops, something wrong appended.</p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div>
                                <input name="vid" type="file" class="dropify">
                                <button type="button" class="dropify-clear">Remove</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div>
                            </div>

                            <button name="add_video" type="submit" class="btn btn-lg btn-info">Add Video</button>

                        </form>
                        </div>
                        <div class="modal-footer">
                        
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="modal fade" id="exampleModal-add-file" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Add new printable resource</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <form  method="post" acton="view_module" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">File Title </label>
                                <input required name="title" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                            <label for="message-text" class="col-form-label">Add a note (Optional) </label>
                            <textarea name="note" class="form-control" id="message-text"></textarea>
                            </div>
                            <input type="hidden" name="module_id" value="<?=$module_id?>">
                            <input type="hidden" name="course_id" value="<?=$course_id?>">

                            <div class="card-body">
                                <h4 class="card-title d-flex">File
                                </h4>
                                <div class="dropify-wrapper"><div class="dropify-message"><span class="file-icon"></span> <p>Drag and drop a File here or click</p><p class="dropify-error">Ooops, something wrong appended.</p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div>
                                <input name="pfile" type="file" class="dropify">
                                <button type="button" class="dropify-clear">Remove</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div>
                            </div>

                            <button name="add_file" type="submit" class="btn btn-lg btn-info">Add File</button>

                        </form>
                        </div>
                        <div class="modal-footer">
                        
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="exampleModal-create_quiz" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Create New Quiz</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <form  method="post" acton="view_module" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Quiz Title </label>
                                <input required name="title" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Questions Durations (minutes) </label>
                                <input required name="question_duration" type="number" class="form-control" id="recipient-name">
                            </div>
                            <input type="hidden" name="module_id" value="<?=$module_id?>">
                            <input type="hidden" name="course_id" value="<?=$course_id?>">

                          
                            <button name="create_quiz" type="submit" class="btn btn-lg btn-info">Create New Quiz</button>

                        </form>
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
  <script src="js/light-gallery.js"></script>
  <!-- End custom js for this page-->
</body>


</html>
