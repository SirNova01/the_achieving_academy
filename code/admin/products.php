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
      function existInnDb($code, $db){
        $code_query = "SELECT * FROM products WHERE product_id ='$code'";
        $result = mysqli_query($db, $code_query);
        $number = mysqli_num_rows($result);
        if($number >0){
            return true;
        }else{
            return false;
        }
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





                                
                                

                                   










      if(isset($_POST['add_product'])){
        $product_name = mysqli_real_escape_string($db_handle, $_POST['product_name']);
        $description =  mysqli_real_escape_string($db_handle, $_POST['description']);
        $price = mysqli_real_escape_string($db_handle, $_POST['price']);
        $size =  mysqli_real_escape_string($db_handle, $_POST['size']);
        $category = mysqli_real_escape_string($db_handle, $_POST['category']);
    
        if (empty($product_name)) { array_push($errors, "Product name is required"); }
        if (empty($description)) { array_push($errors, "product description is required"); }
        if (empty($price)) { array_push($errors, "product price is required"); }
        if(empty($_FILES['display_pic'])){array_push($errors, "Please upload product display picture"); }
    
    
        if (count($errors) == 0) {
    
          $identity_url = "../dp/";
          $num_identity = rand();
          $identity_url  = $identity_url.$num_identity . basename( $_FILES['display_pic']['name']);
    
          if(move_uploaded_file($_FILES['display_pic']['tmp_name'], $identity_url)) {
            
              $unique_number = uniqid(rand (), true);
              while(existInnDb($unique_number, $db_handle)) {
                  $unique_number = uniqid(rand (), true);                                       
              }
              $product_id = $unique_number;
              $email_verification_code = rand();
              $register_query = "INSERT INTO products (product_id,	product_name,    	description,	status, 	rating,	price,  	size, category,	dp,	date,	day	 ) 
                                                VALUES('$product_id', '$product_name','$description', 'available',    '0', '$price',  '$size', '$category', '$identity_url','$date',  '$day' )";
              if(mysqli_query($db_handle, $register_query)){
               
                header("location: products?msg_success=New product successfully added!");
              
              }else{
                header("location: products?msg_error=could not write!");
              }
    
                       
              
    
          }else{array_push($errors, "Identity Upload Failed!");}
    
          
        }else{
            header("location: products?msg_error=error!");
        }
    
      }











?>


<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>User Dashboard</title>
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
              <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                    <div class="template-demo d-flex justify-content-between flex-nowrap">
                        <h4 class="card-title">Products</h4>
                        <button  type="button" data-toggle="modal" data-target="#exampleModal-4" data-whatever="@fat" class="btn btn-primary btn-rounded btn-icon">
                            <i class="mdi mdi-calendar-plus"></i>
                        </button>


                        <div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="ModalLabel">Add a new product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form  method="post" acton="schedules" enctype="multipart/form-data">
                                    <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Product Name  </label>
                                    <input required name="product_name" type="text" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                    <label for="message-text" class="col-form-label">Product Description </label>
                                    <textarea name="description" class="form-control" id="message-text"></textarea>
                                    </div>

                                    <div class="form-group">
                                    <label for="recipient-name" class="col-form-label"> Price </label>
                                    <input required name="price" type="number" class="form-control" id="recipient-name">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Size (optional)</label>
                                        <select name="size" class="form-control form-control-lg" id="exampleFormControlSelect1">
                                        <option>None</option>
                                        <option>XS</option>
                                        <option>S</option>
                                        <option>M</option>
                                        <option>L</option>
                                        <option>XL</option>
                                        <option>XXL</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Product Category</label>
                                        <select name="category" class="form-control form-control-lg" id="exampleFormControlSelect1">
                                          <?php
                                            $empty = TRUE;
                                            $table_result = $db_handle->query("SELECT * FROM product_categories");
                                            foreach ($table_result as $category_r): ?>
                                                <option value="<?= $category_r['category_id'] ?>" ><?= $category_r['category_name'] ?></option>
                                            <?php $empty = FALSE; endforeach; unset($category_r); if ($empty == TRUE) echo "<h6 style='text-align: center; color: red'>There are no categories</h6>" ?>
                                        
                                        </select>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title d-flex">Product Display Picture
                                        </h4>
                                        <div class="dropify-wrapper"><div class="dropify-message"><span class="file-icon"></span> <p>Drag and drop a file here or click</p><p class="dropify-error">Ooops, something wrong appended.</p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div>
                                        <input name="display_pic" type="file" class="dropify">
                                        <button type="button" class="dropify-clear">Remove</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div>
                                    </div>



                                    <button name="add_product" type="submit" class="btn btn-lg btn-primary">Add Product</button>


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
                                    <th>Product Name</th>
                                    <th>Availability</th>
                                    <th> Rating</th>
                                    <th>.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $report_counter = 1;
                                $empty = TRUE;
                                $table_result = $db_handle->query("SELECT * FROM products order by id desc");
                                foreach ($table_result as $product_row): ?>
                                    <tr>
                                        <td><?= $report_counter ?></td>
                                        <td><?= $product_row['product_name'] ?></td>
                                        <td><?= $product_row['status'] ?></td>
                                        <td><?= $product_row['rating'] ?></td>
                                        
                                        <td>
                                        <a href="view_product?id=<?= $product_row['product_id'] ?>">
                                            <button type="button" class="btn btn-primary btn-icon-text">
                                            <i class="mdi mdi-eye btn-icon-prepend"></i>
                                            View Product
                                            </button>
                                        </a>
                                        </td>
                                       
                                    
                                    </tr>
                                <?php $empty = FALSE; $report_counter++; endforeach; unset($product_row); if ($empty == TRUE) echo "<h6 style='text-align: center; color: red'>There are no new Products</h6>" ?>
                            
                            </tbody>
                            
                            </table>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
              </div>
              <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                      <div>
                        <h4 class="card-title mt-1">Product Categories</h4>
                      </div>
                        <button  type="button" data-toggle="modal" data-target="#exampleModal-5" data-whatever="@fat" class="btn btn-outline-secondary btn-rounded btn-sm btn-icon">
                            <span class="mdi mdi-folder-plus text-black text-muted"></span>
                        </button>


                        <div class="modal fade" id="exampleModal-5" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="ModalLabel">New Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form  method="post" acton="schedules" enctype="multipart/form-data">
                                    <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Category Name </label>
                                    <input required name="name" type="text" class="form-control" id="recipient-name">
                                    </div>

                                    <button name="create_category" type="submit" class="btn btn-lg btn-primary">Add Category</button>


                                </form>
                                </div>
                                <div class="modal-footer">
                                
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            </div>
                        </div>


                    </div>
                    <div class="d-flex flex-column">

                        <?php
                          $instructor_counter = 1;
                          $empty = TRUE;
                          $table_result = $db_handle->query("SELECT * FROM product_categories");
                          foreach ($table_result as $category_row): ?>
                              <div class="d-flex mb-3">
                                <div class="d-flex align-items-center justify-content-center mr-3">
                                    <i class="mdi mdi-folder text-dribbble social-icon-outline"></i>
                                </div>
                                <div class="d-flex flex-column ml-1">
                                <h6 class="font-weight-normal mt-2 mb-1"><?=$category_row['category_name']?></h6>
                                <!-- <p class="text-muted">$39053</p> -->
                                </div>
                                <div class="d-flex align-items-center justify-content-center ml-auto">
                                    <!-- <i class="mdi mdi-trash-can-outline text-black mr-2 icon-hover-red"></i> -->
                                </div>
                              </div>

                          <?php $empty = FALSE; $instructor_counter++; endforeach; unset($category_row); if ($empty == TRUE) echo "<h6 style='text-align: center; color: red'></h6>" ?>
                      
                      
                      

                      
                      
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
