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



      $level_id = '';
      if(isset($_GET['id'])  || isset($_SESSION['level_id'])){
        if(isset($_GET['id'])){
            $level_id = $_GET['id'];
            $_SESSION['level_id'] =$level_id;
        }else{
            $level_id = $_SESSION['level_id'];
        }
      }else{
          header("location: game");
      }
     

      // question  option_1  option_1_consequence option_1_penalty option_2 option_2_consequence option_2_penalty 
      //                       option_3 option_3_consequence option_3_penalty  answer reason credits

     

      if(isset($_POST['add_question'])){
        $question = mysqli_real_escape_string($db_handle, $_POST['question']);
        $option_1 = mysqli_real_escape_string($db_handle, $_POST['option_1']);
        $option_1_consequence = mysqli_real_escape_string($db_handle, $_POST['option_1_consequence']); 
        $option_1_penalty = mysqli_real_escape_string($db_handle, $_POST['option_1_penalty']); 
        $option_2 = mysqli_real_escape_string($db_handle, $_POST['option_2']);
        $option_2_consequence = mysqli_real_escape_string($db_handle, $_POST['option_2_consequence']); 
        $option_2_penalty = mysqli_real_escape_string($db_handle, $_POST['option_2_penalty']); 
        $option_3 = mysqli_real_escape_string($db_handle, $_POST['option_3']);
        $option_3_consequence = mysqli_real_escape_string($db_handle, $_POST['option_3_consequence']); 
        $option_3_penalty = mysqli_real_escape_string($db_handle, $_POST['option_3_penalty']); 

        $reason = mysqli_real_escape_string($db_handle, $_POST['reason']);
        $answer = mysqli_real_escape_string($db_handle, $_POST['answer']); 
        $credits = mysqli_real_escape_string($db_handle, $_POST['credits']); 
 
        if (empty($question)) { header("location: add_questions?msg_error=question is required!"); }
        if (empty($answer)) { header("location: add_questions?msg_error=answer is required!"); }
        if (empty($reason)) { header("location: add_questions?msg_error=Please set reason!"); }
        
        
        // if(empty($_FILES['attachment'])){

        // }else{
        //     $attachment_url = "../question_attachments/";
        //     $num_attachment = uniqid(rand (), true);
        //     $attachment_url  = $attachment_url.$num_attachment . basename( $_FILES['attachment']['name']);
      
        //     if(move_uploaded_file($_FILES['attachment']['tmp_name'], $attachment_url)) {
        //     }
        // }

        $unique_number = uniqid(rand (), true);
        while(existInnDb($unique_number, $db_handle)) {
            $unique_number = uniqid(rand (), true);                                       
        }
        $question_id = $unique_number;
        $register_query = "INSERT INTO game_question_bank ( question_id,	level_id,	question,	attachment,	option_1,	option_1_consequence,	option_1_penalty,	option_2,	option_2_consequence,	option_2_penalty,	option_3,	option_3_consequence,	option_3_penalty,	option_4,	option_4_consequence,	option_4_penalty,	answer,	reason,	credits		) 
                                                    VALUES('$question_id', '$quiz_id','$course_id', '$module_id', '$question', '',    '', '$option_1',  '$option_2',  '$option_3',  '$option_4',  '$answer',  '$duration',  '$points',  '$date' )";
        if(mysqli_query($db_handle, $register_query)){
            header("location: add_questions?msg_success=successfully added new question!");
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

          <div class="row">
            <div class="col-md-12 mb-4 mt-4">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="view_course?id=<?=$level_id?>"> <button type="button" class="btn btn-sm btn-outline-secondary"><i class="mdi mdi-reply text-primary"></i> Back To Game</button></a>
                </div>
              
            </div>
            </div>
          </div>

            <div class="row">
                <div class="col-md-12 mb-4 mt-4">
                    <div class="template-demo">
                        <button type="button" data-toggle="modal" data-target="#exampleModal-add-questions" data-whatever="@fat" class="btn btn-outline-primary btn-fw">Add Questions</button>
                        
                    </div>
                </div>
            </div>

          <div class="row">

                
           
            
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


                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Option 1  </label>
                                <textarea name="option_1" placeholder="Option 1" class="form-control" id="message-text"></textarea>
                                <input required name="option_1_consequence" type="text" placeholder="Consequence eg you got a parking ticket"  class="form-control" id="recipient-name">
                                <input required name="option_1_penalty" type="number" placeholder="Penalty (credits eg 30)"  class="form-control" id="recipient-name">
                            </div>


                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Option 2  </label>
                                <textarea name="option_2" placeholder="Option 2" class="form-control" id="message-text"></textarea>
                                <input required name="option_2_consequence" type="text" placeholder="Consequence "  class="form-control" id="recipient-name">
                                <input required name="option_2_penalty" type="number" placeholder="Penalty (credits)"  class="form-control" id="recipient-name">
                            </div>

                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Option 3  </label>
                                <textarea name="option_3" placeholder="Option 3" class="form-control" id="message-text"></textarea>
                                <input required name="option_3_consequence" type="text" placeholder="Consequence "  class="form-control" id="recipient-name">
                                <input required name="option_3_penalty" type="number" placeholder="Penalty (credits)"  class="form-control" id="recipient-name">
                            </div>
                          
                            


                            
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Answer</label>
                                <select name="answer" class="form-control form-control-lg" id="exampleFormControlSelect1">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                </select>
                                <input required name="reason" type="text" placeholder="why is it the right answer?"  class="form-control" id="recipient-name">
                            </div>

                            <!-- <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Duration (in minutes)  </label>
                                <input required name="duration" type="number"  class="form-control" id="recipient-name">
                            </div> -->
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label"> Reward (Credits) </label>
                                <input required name="credits" type="number" class="form-control" id="recipient-name">
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
