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
        $code_query = "SELECT * FROM game WHERE level_id ='$code'";
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

     

     

      if(isset($_POST['add_level'])){
        $intro_text = mysqli_real_escape_string($db_handle, $_POST['intro_text']);
        $name = mysqli_real_escape_string($db_handle, $_POST['name']); 
       
        if (empty($name)) { header("location: add_questions?msg_error=level name is required!"); }
        if (empty($intro_text)) { header("location: add_questions?msg_error=intro text is required!"); }
        
        $unique_number = uniqid(rand (), true);
        while(existInnDb($unique_number, $db_handle)) {
            $unique_number = uniqid(rand (), true);                                       
        }
        $level_id = $unique_number;
        $register_query = "INSERT INTO game (level_id,   	level_name,	intro_text,	date,	day	) 
                                      VALUES('$level_id',    '$name',  '$intro_text', '$date',  '$day' )";
        if(mysqli_query($db_handle, $register_query)){
            header("location: game?msg_success=successfully added new level!");
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
                    <div class="template-demo">
                        <button type="button" data-toggle="modal" data-target="#exampleModal-add-questions" data-whatever="@fat" class="btn btn-outline-primary btn-fw">New Level</button>
                        
                    </div>
                </div>
            </div>

          <div class="row">
            <?php
                $report_counter = 1;
                $empty = TRUE;
                $game_result = $db_handle->query("SELECT * FROM game");
                foreach ($game_result as $game_row): ?>
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
                                    <i class="mdi mdi-rename-box text-hangouts social-icon-outline"></i>
                                    </div>
                                    <div class="d-flex flex-column ml-1">
                                    <h6 class="font-weight-normal mt-2">Level Name</h6>
                                    <p class="text-muted"><?=$game_row['level_name']?></p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="d-flex align-items-center justify-content-center mr-3">
                                    <i class="mdi mdi-note text-dribbble social-icon-outline"></i>
                                    </div>
                                    <div class="d-flex flex-column ml-1">
                                    <h6 class="font-weight-normal mt-2 mb-1"> Intro Text </h6>
                                    <p class="text-muted"> <?=$game_row['intro_text']?> </p>
                                    </div>
                                </div>
                            
                            </div>
                            <a href="add_game_question?id=<?=$game_row['level_id']?>"> <button type="button" class="btn btn-primary btn-lg btn-block"> Add Questions</button></a>
                        </div>
                    </div>
                </div>
            <?php $empty = FALSE; $report_counter++; endforeach; unset($game_row); if ($empty == TRUE) echo "<h6 style='text-align: center; color: red'>...</h6>" ?>
                      
           
            
          </div>






          
          <div class="modal fade" id="exampleModal-add-questions" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Add new level</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <form  method="post" acton="game" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Level Name </label>
                                <input required name="name" type="text"  class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Intro Text </label>
                                <textarea name="intro_text" class="form-control" id="message-text"></textarea>
                            </div>
                            
                            <button name="add_level" type="submit" class="btn btn-lg btn-primary">Add Question</button>


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
