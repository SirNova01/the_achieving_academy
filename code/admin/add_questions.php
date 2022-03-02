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
        $code_query = "SELECT * FROM question_bank WHERE question_id ='$code'";
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

      $quiz_id = '';
      $course_id = $_SESSION['course_id'];
      $module_id = $_SESSION['module_id'];

      if(isset($_GET['id'])  || isset($_SESSION['quiz_id'])){
        if(isset($_GET['id'])){
            $quiz_id = $_GET['id'];
            $_SESSION['quiz_id'] =$quiz_id;
        }else{
            $quiz_id = $_SESSION['quiz_id'];
        }
      }else{
          header("location: view_module");
      }

      if(isset($_POST['add_question'])){
        $question = mysqli_real_escape_string($db_handle, $_POST['question']);
        $option_1 = mysqli_real_escape_string($db_handle, $_POST['option_1']);
        $option_2 = mysqli_real_escape_string($db_handle, $_POST['option_2']); 
        $option_3 = mysqli_real_escape_string($db_handle, $_POST['option_3']); 
        $option_4 = mysqli_real_escape_string($db_handle, $_POST['option_4']);
        $answer = mysqli_real_escape_string($db_handle, $_POST['answer']); 
        $duration = mysqli_real_escape_string($db_handle, $_POST['duration']); 
        $points = mysqli_real_escape_string($db_handle, $_POST['points']); 
 
        if (empty($question)) { header("location: add_questions?msg_error=question is required!"); }
        if (empty($answer)) { header("location: add_questions?msg_error=answer is required!"); }
        if (empty($duration)) { header("location: add_questions?msg_error=Please set duration!"); }
        
        
        if(empty($_FILES['attachment'])){

        }else{
            $attachment_url = "../question_attachments/";
            $num_attachment = uniqid(rand (), true);
            $attachment_url  = $attachment_url.$num_attachment . basename( $_FILES['attachment']['name']);
      
            if(move_uploaded_file($_FILES['attachment']['tmp_name'], $attachment_url)) {
            }
        }

        $unique_number = uniqid(rand (), true);
        while(existInnDb($unique_number, $db_handle)) {
            $unique_number = uniqid(rand (), true);                                       
        }
        $question_id = $unique_number;
        $register_query = "INSERT INTO question_bank ( question_id,	   quiz_id,	 course_id,  	module_id,	  question,	     attachment,	attachment_type,	   option_1,	option_2,	   option_3,	option_4,	correct_option,    	duration,	  points,	date	) 
                                          VALUES('$question_id', '$quiz_id','$course_id', '$module_id', '$question', '',    '', '$option_1',  '$option_2',  '$option_3',  '$option_4',  '$answer',  '$duration',  '$points',  '$date' )";
        if(mysqli_query($db_handle, $register_query)){
            header("location: add_questions?msg_success=successfully added new question!");
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
                        <button type="button" data-toggle="modal" data-target="#exampleModal-add-questions" data-whatever="@fat" class="btn btn-outline-primary btn-fw">Add Questions</button>
                        
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-4 mt-4">
                <div class="btn-toolbar">
                    <div class="btn-group">
                        <a href="view_module?id=<?=$module_id?>"> <button type="button" class="btn btn-sm btn-outline-secondary"><i class="mdi mdi-reply text-primary"></i> Back To Module</button></a>
                        <a href="view_course?id=<?=$course_id?>"><button type="button" class="btn btn-sm btn-outline-secondary"><i class="mdi mdi-reply-all text-primary"></i>Jump To Program</button></a>
                    </div>
                  
                </div>
                </div>
            </div>


          <div class="row">

          <?php
            $quiz_counter = 1;
            $empty = TRUE;
            $quiz_result = $db_handle->query("SELECT * FROM question_bank where quiz_id='$quiz_id'");
            foreach ($quiz_result as $quiz_row): ?>
            <div class="col-lg-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Question <?=$quiz_counter?></h4>
                  <!-- <p class="card-description">Use class <code>.accordion-solid-header</code> for basic accordion</p> -->
                  <div class="mt-4">
                    <div class="accordion accordion-solid-header" id="accordion-<?=$quiz_row['question_id']?>" role="tablist">
                      <div class="card">
                        <div class="card-header" role="tab" id="heading-<?=$quiz_counter?>">
                          <h6 class="mb-0">
                            <a data-toggle="collapse" href="#collapse-<?=$quiz_counter?>" aria-expanded="true" aria-controls="collapse-<?=$quiz_counter?>" class="">
                              Question
                            </a>
                          </h6>
                        </div>
                        <div id="collapse-<?=$quiz_counter?>" class="collapse " role="tabpanel" aria-labelledby="heading-<?=$quiz_counter?>" data-parent="#accordion-<?=$quiz_row['question_id']?>" style="">
                          <div class="card-body">
                            <div class="row">
                              <?php if($quiz_row['attachment'] != ""){ ?>
                              <div class="col-3">
                                <img src="images/samples/300x300/10.jpg" class="mw-100" alt="image">                              
                              </div>
                              <?php } ?>
                              <div class="col-9">
                              <?=$quiz_row['question']?>                  
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="card">
                        <div class="card-header" role="tab" id="heading-<?=$quiz_counter + 1?>">
                          <h6 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapse-<?=$quiz_counter + 250?>" aria-expanded="false" aria-controls="collapse-<?=$quiz_counter + 250?>">
                              Options
                            </a>
                          </h6>
                        </div>
                        <div id="collapse-<?=$quiz_counter + 250?>" class="collapse" role="tabpanel" aria-labelledby="heading-<?=$quiz_counter?>" data-parent="#accordion-<?=$quiz_row['question_id']?>" style="">
                          <div class="card-body">
                              <ul class="bullet-line-list">
                                <li>
                                    <h6>Option 1</h6>
                                    <p class="mb-0"><?=$quiz_row['option_1']?></p>
                                </li>
                                <li>
                                    <h6>Option 2</h6>
                                    <p class="mb-0"><?=$quiz_row['option_2']?> </p>
                                </li>
                                <li>
                                    <h6>Option 3</h6>
                                    <p class="mb-0"><?=$quiz_row['option_3']?> </p>
                                </li>
                                <li>
                                    <h6>Option 4</h6>
                                    <p class="mb-0"><?=$quiz_row['option_4']?> </p>
                                </li>
                            </ul>
                            <br>
                            <h5>Answer</h5>
                            <p class="text-success">
                              <i class="mdi mdi-check-circle mr-2"></i>Option: <?=$quiz_row['correct_option']?>
                            </p>
                          </div>
                        </div>
                      </div>

                      
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php $empty = FALSE; $quiz_counter++; endforeach; unset($quiz_row); if ($empty == TRUE) echo "<h6 style='text-align: center; color: red'>...</h6>" ?>
                      
           
            
          </div>

            <div class="modal fade" id="exampleModal-add-questions" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Add new question</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <form  method="post" acton="add_questions" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Question </label>
                                <textarea name="question" class="form-control" id="message-text"></textarea>
                            </div>
                            
                            <div class="card-body">
                                <h4 class="card-title d-flex">Attachment image/pdf (optional)
                                </h4>
                                <div class="dropify-wrapper"><div class="dropify-message"><span class="file-icon"></span> <p>Drag and drop a file here or click</p><p class="dropify-error">Ooops, something wrong appended.</p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div>
                                <input name="attachment" type="file" class="dropify">
                                <button type="button" class="dropify-clear">Remove</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Options  </label>
                                <input required name="option_1" type="text" required  class="form-control" placeholder="Option 1" id="recipient-name">
                                <input required name="option_2" type="text" required class="form-control" placeholder="Option 2" id="recipient-name">
                                <input required name="option_3" type="text" required  class="form-control" placeholder="Option 3" id="recipient-name">
                                <input required name="option_4" type="text" required  class="form-control" placeholder="Option 4" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Answer</label>
                                <select name="answer" class="form-control form-control-lg" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Duration (in minutes)  </label>
                                <input required name="duration" type="number"  class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label"> Points </label>
                                <input required name="points" type="number" class="form-control" id="recipient-name">
                            </div>
                            <button name="add_question" type="submit" class="btn btn-lg btn-primary">Add Question</button>


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
  <!-- End custom js for this page-->
</body>


</html>
