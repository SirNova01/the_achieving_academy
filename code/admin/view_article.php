<!DOCTYPE html>
<?php
      session_start();
      include("../includes/db_conn.php");
      $errors = array();
  
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

      $user_details_query = "SELECT * FROM users WHERE user_id='$user_id' LIMIT 1";
      $user_details_result = mysqli_query($db_handle, $user_details_query);
      $user_details = mysqli_fetch_assoc($user_details_result);
      if ($user_details) {
        $first_name = $user_details['first_name'];
        $last_name = $user_details['last_name'];
        $email = $user_details['email'];
        $account_type = $user_details['account_type'];
      }





      function existInDb($code, $db){
        $code_query = "SELECT * FROM image_resource WHERE img_id ='$code'";
        $result = mysqli_query($db, $code_query);
        $number = mysqli_num_rows($result);
        if($number >0){
            return true;
        }else{
            return false;
        }
      }
 

                                   
      $article_id = "";
      if(isset($_GET['id'])){
          $article_id  = $_GET['id'];
          $_SESSION['article_id'] = $article_id;
      }else if(isset($_SESSION['article_id'])){
        $article_id  = $_SESSION['article_id'];
      }else{
          header("location: blog");
      }

    
      
      $article_details_query = "SELECT * FROM articles WHERE article_id='$article_id' LIMIT 1";
      $article_details_result = mysqli_query($db_handle, $article_details_query);
      $article_details = mysqli_fetch_assoc($article_details_result);
      if ($article_details) {
        $title = $article_details['title'];
        $body = $article_details['body'];
        $cover_pic = $article_details['cover_pic'];
        $category_id = $article_details['category'];
        
      }

      $category_details_query = "SELECT * FROM blog_categories WHERE category_id='$category_id' LIMIT 1";
      $category_details_result = mysqli_query($db_handle, $category_details_query);
      $category_details = mysqli_fetch_assoc($category_details_result);
      if ($category_details) {
        $category = $category_details['category_name'];
      }




      
      if(isset($_POST['add_image'])){
      
        if(empty($_FILES['display_pic'])){array_push($errors, "Please upload product display picture"); }
    
    
        if (count($errors) == 0) {
    
          $identity_url = "../img_resource/";
          $num_identity = rand();
          $identity_url  = $identity_url.$num_identity . basename( $_FILES['display_pic']['name']);
    
          if(move_uploaded_file($_FILES['display_pic']['tmp_name'], $identity_url)) {
            
              $unique_number = uniqid(rand (), true);
              while(existInDb($unique_number, $db_handle)) {
                  $unique_number = uniqid(rand (), true);                                       
              }
              $img_id = $unique_number;
              $email_verification_code = rand();
              $register_query = "INSERT INTO image_resource (img_id,	product_id,	dp,	date,	day	 ) 
                                                VALUES('$img_id', '$product_id', '$identity_url','$date',  '$day' )";
              if(mysqli_query($db_handle, $register_query)){
               
                header("location: view_product?msg_success=New image successfully added!");
              
              }else{
                header("location: view_product?msg_error=could not write!");
              }
    
                       
              
    
          }else{array_push($errors, "Identity Upload Failed!");}
    
          
        }else{
            header("location: view_product?msg_error=error!");
        }
    
      }




?>



<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>User Profile</title>
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

  <link rel="stylesheet" href="vendors/lightgallery/css/lightgallery.css">



</head>

<body>
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
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row justify-content-center">
                    <div class="col-lg-8">
                      <div class="border-bottom text-center pb-4">
                        <img src="<?=$cover_pic?>" alt="profile" class="img-lg rounded-circle mb-3"/>
                        <h4><?=$title?></h4>
                        <p><?=$body?></p>
                        <div class="d-flex justify-content-between">
                        

                          <button  type="button" data-toggle="modal" data-target="#exampleModal-5" data-whatever="@fat"  class="btn btn-danger">Delete Article</button>


                          <div class="modal fade" id="exampleModal-5" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="ModalLabel">Delete This Article?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                  

                                    <a href="delete_article?id=<?=$article_id?>"><button  type="button" class="btn btn-lg btn-danger">Delete Article</button></a>


                                </div>
                                <div class="modal-footer">
                                
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            </div>
                          </div>


                        </div>
                      </div>

                      
                
                      <div class="d-flex mb-3">
                          <div class="progress progress-md flex-grow">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="100" style="width: 100%" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>
                      <!-- <button class="btn btn-primary btn-block">Preview</button> -->
                    </div>
                  </div>
                </div>
              </div>
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
  <script src="js/profile-demo.js"></script>
  <!-- End custom js for this page-->

  <script src="js/owl-carousel.js"></script>

  <script src="js/light-gallery.js"></script>




</body>


</html>
