<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <title>My Account | Student Dashboard</title>
      <!-- Favicon icon -->
      <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
      <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
   </head>
   <body>
      <!--*******************
         Preloader start
         ********************-->
      <div id="preloader">
         <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
         </div>
      </div>
      <!--*******************
         Preloader end
         ********************-->
      <!--**********************************
         Main wrapper start
         ***********************************-->
      <div id="main-wrapper">
         <!--**********************************
            Nav header start
            ***********************************-->
         <div class="nav-header">
            <a href="" class="brand-logo">
            <img class="logo-abbr" src="images/img/academy_logo.png" alt="">
            <img class="logo-compact" src="images/img/logo_text.png" alt="">
            <img class="brand-title" src="images/img/logo_text.png" alt="">
            </a>
            <div class="nav-control">
               <div class="hamburger">
                  <span class="line"></span><span class="line"></span><span class="line"></span>
               </div>
            </div>
         </div>
         <!--**********************************
            Nav header end
            ***********************************-->
         <!--**********************************
            Chat box start
            ***********************************-->
         <?php include("ui_inc/chat_box.php"); ?>
         <!--**********************************
            Chat box End
            ***********************************-->
         <!--**********************************
            Header start
            ***********************************-->
        <?php include("includes/header.php"); ?>
         <!--**********************************
            Header end ti-comment-alt
            ***********************************-->
         <!--**********************************
            Sidebar start
            ***********************************-->
         <?php include("includes/left_side_bar.php"); ?>
         <!--**********************************
            Sidebar end
            ***********************************-->
         <!--**********************************
            Content body start
            ***********************************-->
         <div class="content-body">
            <div class="container-fluid">
               <div class="row page-titles mx-0">
                  <div class="col-sm-6 p-md-0">
                     <div class="welcome-text">
                        <h4>My Account</h4>
                        <p class="mb-0">Your business dashboard template</p>
                     </div>
                  </div>
                  <!-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
                     </ol>
                  </div> -->
               </div>
               <!-- row -->
               <div class="row">
                  <div class="col-lg-12">
                     <div class="profile card card-body px-3 pt-3 pb-0">
                        <div class="profile-head">
                           <!-- <div class="photo-content">
                              <div class="cover-photo"></div>
                           </div> -->
                           <div class="profile-info">
                              <div class="profile-photo">
                                 <img src="images/profile/profile.png" class="img-fluid rounded-circle" alt="">
                              </div>
                              <div class="profile-details">
                                 <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">Mitchell C. Shay</h4>
                                    <p>UX / UI Designer</p>
                                 </div>
                                 <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">hello@email.com</h4>
                                    <p>Email</p>
                                 </div>
                                 <div class="dropdown ml-auto">
                                    <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true">
                                       <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                             <rect x="0" y="0" width="24" height="24"></rect>
                                             <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                             <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                             <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                          </g>
                                       </svg>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-169px, 30px, 0px);">
                                       <li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> <a href="account?settings=u"> Update profile</a></li>
                                       <!-- <li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to close friends</li>
                                       <li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to group</li>
                                       <li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li> -->
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>






               <?php if(isset($_GET['settings']) && $_GET['settings'] == "u"){ ?>

               <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control input-rounded" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control input-rounded" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control input-rounded" placeholder="Username">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Sign in</button>

                                    </form>
                                </div>
                            </div>
                        </div>
					      </div>

                     <div class="col-xl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control input-rounded" placeholder="Old Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control input-rounded" placeholder="New Password">
                                        </div>

                                        <button type="submit" class="btn btn-success">Update</button>

                                    </form>
                                </div>
                            </div>
                        </div>
					      </div>
					
               </div>

               <?php } ?>

               <div class="form-head d-flex mb-3 align-items-start">
                  <div class="mr-auto d-none d-lg-block">
                     <h2 class="text-black font-w600 mb-0">My Certificates</h2>
                     <p class="mb-0">View all certificates and awards</p>
                  </div>
                  
                  <div class="dropdown custom-dropdown">
                     <div class="btn btn-sm btn-primary light d-flex align-items-center svg-btn" data-toggle="dropdown">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M22.4281 2.856H21.8681V1.428C21.8681 0.56 21.2801 0 20.4401 0C19.6001 0 19.0121 0.56 19.0121 1.428V2.856H9.71606V1.428C9.71606 0.56 9.15606 0 8.28806 0C7.42006 0 6.86006 0.56 6.86006 1.428V2.856H5.57206C2.85606 2.856 0.560059 5.152 0.560059 7.868V23.016C0.560059 25.732 2.85606 28.028 5.57206 28.028H22.4281C25.1441 28.028 27.4401 25.732 27.4401 23.016V7.868C27.4401 5.152 25.1441 2.856 22.4281 2.856ZM5.57206 5.712H22.4281C23.5761 5.712 24.5841 6.72 24.5841 7.868V9.856H3.41606V7.868C3.41606 6.72 4.42406 5.712 5.57206 5.712ZM22.4281 25.144H5.57206C4.42406 25.144 3.41606 24.136 3.41606 22.988V12.712H24.5561V22.988C24.5841 24.136 23.5761 25.144 22.4281 25.144Z" fill="#2F4CDD"></path></g></svg>
                        <div class="text-left ml-3">
                           <span class="d-block fs-16">Filter by period</span>
                           <!-- <small class="d-block fs-13">4 June 2020 - 4 July 2020</small> -->
                        </div>
                        <i class="fa fa-angle-down scale5 ml-3"></i>
                     </div>
                     <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">This Year</a>
                        <a class="dropdown-item" href="#">All Time</a>
                     </div>
                  </div>
               </div>


               <div class="row">
                  <div class="col-xl-3 col-xxl-3 col-lg-4 col-md-12">
                     <div class="card bg-secondary" style="background-image:url(images/bg-icon.png); background-repeat:no-repeat; background-position:top right;">
                        <div class="card-body p-5 mt-3">
                           <!-- <svg width="44" height="44" viewBox="0 0 44 44" class="mb-3" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.9531 20.625H5.67188C2.54435 20.625 0 18.0806 0 14.9531V5.67188C0 2.54435 2.54435 0 5.67188 0H14.9531C18.0806 0 20.625 2.54435 20.625 5.67188V14.9531C20.625 18.0806 18.0806 20.625 14.9531 20.625ZM5.67188 2.75C4.06072 2.75 2.75 4.06072 2.75 5.67188V14.9531C2.75 16.5643 4.06072 17.875 5.67188 17.875H14.9531C16.5643 17.875 17.875 16.5643 17.875 14.9531V5.67188C17.875 4.06072 16.5643 2.75 14.9531 2.75H5.67188Z" fill="#fff"></path><path d="M38.3281 20.625H29.0469C25.9194 20.625 23.375 18.0806 23.375 14.9531V5.67188C23.375 2.54435 25.9194 0 29.0469 0H38.3281C41.4556 0 44 2.54435 44 5.67188V14.9531C44 18.0806 41.4556 20.625 38.3281 20.625ZM29.0469 2.75C27.4357 2.75 26.125 4.06072 26.125 5.67188V14.9531C26.125 16.5643 27.4357 17.875 29.0469 17.875H38.3281C39.9393 17.875 41.25 16.5643 41.25 14.9531V5.67188C41.25 4.06072 39.9393 2.75 38.3281 2.75H29.0469Z" fill="#fff"></path><path d="M33.6875 44C28.0012 44 23.375 39.3738 23.375 33.6875C23.375 28.0012 28.0012 23.375 33.6875 23.375C39.3738 23.375 44 28.0012 44 33.6875C44 39.3738 39.3738 44 33.6875 44ZM33.6875 26.125C29.5176 26.125 26.125 29.5176 26.125 33.6875C26.125 37.8574 29.5176 41.25 33.6875 41.25C37.8574 41.25 41.25 37.8574 41.25 33.6875C41.25 29.5176 37.8574 26.125 33.6875 26.125Z" fill="#fff"></path><path d="M14.9531 44H5.67188C2.54435 44 0 41.4556 0 38.3281V29.0469C0 25.9194 2.54435 23.375 5.67188 23.375H14.9531C18.0806 23.375 20.625 25.9194 20.625 29.0469V38.3281C20.625 41.4556 18.0806 44 14.9531 44ZM5.67188 26.125C4.06072 26.125 2.75 27.4357 2.75 29.0469V38.3281C2.75 39.9393 4.06072 41.25 5.67188 41.25H14.9531C16.5643 41.25 17.875 39.9393 17.875 38.3281V29.0469C17.875 27.4357 16.5643 26.125 14.9531 26.125H5.67188Z" fill="#fff"></path></svg> -->
                           <svg id="Capa_1" enable-background="new 0 0 512.012 512.012" height="55" viewBox="0 0 512.012 512.012" width="55" xmlns="http://www.w3.org/2000/svg"><g><path d="m.006 0h512v361h-512z" fill="#e1e6f0"/><path d="m256.006 0h256v361h-256z" fill="#c3cbd9"/><path d="m451.006 106v150h-15c-16.5 0-30 13.5-30 30v15h-300v-15c0-16.5-13.5-30-30-30h-15v-150h15c16.5 0 30-13.5 30-30v-15h300v15c0 16.5 13.5 30 30 30z" fill="#f3f5f9"/><path d="m451.006 106v150h-15c-16.5 0-30 13.5-30 30v15h-150v-240h150v15c0 16.5 13.5 30 30 30z" fill="#e1e6f0"/><g><path d="m181.006 121h150v30h-150z" fill="#e1e6f0"/></g><g><path d="m121.006 181h270v30h-270z" fill="#e1e6f0"/></g><g><path d="m256.006 400.858h-45v111.154l45-27.012 45 27.012v-111.154z" fill="#ff7f40"/><path d="m301.006 400.858h-45v84.142l45 27.012z" fill="#f25a3c"/><circle cx="256.006" cy="316" fill="#ffdf40" r="105"/><path d="m361.006 316c0-57.891-47.109-105-105-105v210c57.89 0 105-47.109 105-105z" fill="#ffbe40"/><circle cx="256.006" cy="316" fill="#ffbe40" r="45"/><path d="m301.006 316c0-24.814-20.186-45-45-45v90c24.814 0 45-20.186 45-45z" fill="#ff9f40"/></g><g fill="#c3cbd9"><path d="m256.006 121h75v30h-75z"/><path d="m256.006 181h135v30h-135z"/></g></g></svg>
                           <h4 class="text-white mb-3">Manage <br>Budgeting 101</h4>
                           <a href="../c/u/81729" class="d-flex text-light align-items-center justify-content-between">
                              <small>Certificate Url</small>
                              <i class="ti-arrow-right"></i>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>











            </div>
         </div>
         <!--**********************************
            Content body end
            ***********************************-->
         <!--**********************************
            Footer start
            ***********************************-->
         <?php include("includes/footer.php"); ?>
         <!--**********************************
            Footer end
            ***********************************-->
         <!--**********************************
            Support ticket button start
            ***********************************-->
         <!--**********************************
            Support ticket button end
            ***********************************-->
      </div>
      <!--**********************************
         Main wrapper end
         ***********************************-->
      <!--removeIf(production)-->
      <!--**********************************
         Scripts
         ***********************************-->
      <!-- Required vendors -->
      <script src="vendor/global/global.min.js"></script>
      <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
      <script src="vendor/chart.js/Chart.bundle.min.js"></script>
      <script src="js/custom.min.js"></script>
      <script src="js/deznav-init.js"></script>
      <!-- Apex Chart -->
      <script src="vendor/apexchart/apexchart.js"></script>

   </body>
</html>