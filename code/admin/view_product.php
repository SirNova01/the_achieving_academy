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
        $username = $user_details['username'];
        $email = $user_details['email'];
        $account_type = $user_details['account_type'];
      }





      function existInDb($code, $db){
        $code_query = "SELECT * FROM product_categories WHERE category_id ='$code'";
        $result = mysqli_query($db, $code_query);
        $number = mysqli_num_rows($result);
        if($number >0){
            return true;
        }else{
            return false;
        }
      }
 


      
     





                                
                                

                                   
      $product_id = "";
      if(isset($_GET['id'])){
          $product_id  = $_GET['id'];
          $_SESSION['product_id'] = $product_id;
      }else if(isset($_SESSION['product_id'])){
        $product_id  = $_SESSION['product_id'];
      }else{
          header("location: products");
      }


      
      $product_details_query = "SELECT * FROM products WHERE product_id='$product_id' LIMIT 1";
      $product_details_result = mysqli_query($db_handle, $product_details_query);
      $product_details = mysqli_fetch_assoc($product_details_result);
      if ($product_details) {
        $product_name = $product_details['product_name'];
        $description = $product_details['description'];
        $status = $product_details['status'];
        $rating = $product_details['rating'];
        $price = $product_details['price'];
        $size = $product_details['size'];

        $category_id = $product_details['category'];
        $dp = $product_details['dp'];
        $c_date = $product_details['date'];
        $c_day = $product_details['day'];
      }

      $category_details_query = "SELECT * FROM product_categories WHERE category_id='$category_id' LIMIT 1";
      $category_details_result = mysqli_query($db_handle, $category_details_query);
      $category_details = mysqli_fetch_assoc($category_details_result);
      if ($category_details) {
        $category = $category_details['category_name'];
      }



      if(isset($_POST['create_category'])){
        $name =  mysqli_real_escape_string($db_handle, $_POST['name']);
       
    
          
            $unique_number = uniqid(rand (), true);
            while(existInDb($unique_number, $db_handle)) {
                $unique_number = uniqid(rand (), true);                                       
            }
            $category_id = $unique_number;
            $register_query = "INSERT INTO product_categories (category_id,	category_name ) 
                                                      VALUES('$category_id', '$name' )";
            if(mysqli_query($db_handle, $register_query)){
              
              header("location: products?msg_success=New category successfully added!");
            
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
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row justify-content-center">
                    <div class="col-lg-8">
                      <div class="border-bottom text-center pb-4">
                        <img src="<?=$dp?>" alt="profile" class="img-lg rounded-circle mb-3"/>
                        <h4><?=$product_name?></h4>
                        <p><?=$description?></p>
                        <div class="d-flex justify-content-between">
                          <button class="btn btn-danger">Delete Product</button>
                          <button class="btn btn-info">Add Images</button>
                        </div>
                      </div>

                      
                      
                      <div class="border-bottom py-4">
                        <div class="d-flex mb-3">
                          <div class="progress progress-md flex-grow">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="100" style="width: 100%" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                      <div class="py-4">
                        <p class="clearfix">
                          <span class="float-left">
                            Status
                          </span>
                          <span class="float-right text-muted">
                            <?=$status?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Public Rating
                          </span>
                          <span class="float-right text-muted">
                          <?=$rating?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Price
                          </span>
                          <span class="float-right text-muted">
                          <?=$price?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Size
                          </span>
                          <span class="float-right text-muted">
                            <a style="color:blue;"><?=$size?></a>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Category
                          </span>
                          <span class="float-right text-muted">
                            <a style="color:blue;"><?=$category?></a>
                          </span>
                        </p>
                        
                      </div>
                      <div class="d-flex mb-3">
                          <div class="progress progress-md flex-grow">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="100" style="width: 100%" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>
                      <!-- <button class="btn btn-primary btn-block">Preview</button> -->
                    </div>

                    <div class="row">
						<div class="col-md-4 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<div class="d-flex flex-row flex-wrap">
										<img src="images/faces/face11.jpg" class="img-lg rounded" alt="profile image">
										
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<div class="d-flex flex-row flex-wrap">
										<img src="images/faces/face9.jpg" class="img-lg rounded" alt="profile image">
										
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<div class="d-flex flex-row flex-wrap">
										<img src="images/faces/face12.jpg" class="img-lg rounded" alt="profile image">
										
									</div>
								</div>
							</div>
						</div>
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
</body>


</html>
