<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <title> Compose Mail </title>
      <!-- Favicon icon -->
      <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
      <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
      <link href="vendor/dropzone/dist/dropzone.css" rel="stylesheet">
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
            <a href="index.html" class="brand-logo">
            <img class="logo-abbr" src="images/logo.png" alt="">
            <img class="logo-compact" src="images/logo-text.png" alt="">
            <img class="brand-title" src="images/logo-text.png" alt="">
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
                        <h4>Hi, welcome back!</h4>
                        <span>Email</span>
                     </div>
                  </div>
                 
               </div>
               <!-- row -->
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-body">
                           <div class="email-left-box px-0 mb-3">
                              <div class="p-0">
                                 <a href="email-compose.html" class="btn btn-primary btn-block">Compose</a>
                              </div>
                              <div class="mail-list mt-4">
                                 <a href="email-inbox.html" class="list-group-item active"><i
                                    class="fa fa-inbox font-18 align-middle mr-2"></i> Inbox <span
                                    class="badge badge-primary badge-sm float-right">198</span> </a>
                                 <a href="javascript:void()" class="list-group-item"><i
                                    class="fa fa-paper-plane font-18 align-middle mr-2"></i>Sent</a> <a href="javascript:void()" class="list-group-item"><i
                                    class="fa fa-star-o font-18 align-middle mr-2"></i>Important <span
                                    class="badge badge-danger text-white badge-sm float-right">47</span>
                                 </a>
                                 <a href="javascript:void()" class="list-group-item"><i
                                    class="mdi mdi-file-document-box font-18 align-middle mr-2"></i>Draft</a><a href="javascript:void()" class="list-group-item"><i
                                    class="fa fa-trash font-18 align-middle mr-2"></i>Trash</a>
                              </div>
                              
                           </div>
                           <div class="email-right-box ml-0 ml-sm-4 ml-sm-0">
                              <div class="toolbar mb-4" role="toolbar">
                                 <div class="btn-group mb-1">
                                    <button type="button" class="btn btn-primary light px-3"><i class="fa fa-archive"></i></button>
                                    <button type="button" class="btn btn-primary light px-3"><i class="fa fa-exclamation-circle"></i></button>
                                    <button type="button" class="btn btn-primary light px-3"><i class="fa fa-trash"></i></button>
                                 </div>
                                 <div class="btn-group mb-1">
                                    <button type="button" class="btn btn-primary light dropdown-toggle px-3" data-toggle="dropdown">
                                    <i class="fa fa-folder"></i> <b class="caret m-l-5"></b>
                                    </button>
                                    <div class="dropdown-menu"> 
                                       <a class="dropdown-item" href="javascript: void(0);">Social</a> 
                                       <a class="dropdown-item" href="javascript: void(0);">Promotions</a> 
                                       <a class="dropdown-item" href="javascript: void(0);">Updates</a>
                                       <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                                    </div>
                                 </div>
                                 <div class="btn-group mb-1">
                                    <button type="button" class="btn btn-primary light dropdown-toggle px-3" data-toggle="dropdown">
                                    <i class="fa fa-tag"></i> <b class="caret m-l-5"></b>
                                    </button>
                                    <div class="dropdown-menu"> 
                                       <a class="dropdown-item" href="javascript: void(0);">Updates</a> 
                                       <a class="dropdown-item" href="javascript: void(0);">Social</a> 
                                       <a class="dropdown-item" href="javascript: void(0);">Promotions</a>
                                       <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                                    </div>
                                 </div>
                                 <div class="btn-group mb-1">
                                    <button type="button" class="btn btn-primary light dropdown-toggle v" data-toggle="dropdown">More <span class="caret m-l-5"></span>
                                    </button>
                                    <div class="dropdown-menu"> <a class="dropdown-item" href="javascript: void(0);">Mark as Unread</a> <a class="dropdown-item" href="javascript: void(0);">Add to Tasks</a>
                                       <a class="dropdown-item" href="javascript: void(0);">Add Star</a> <a class="dropdown-item" href="javascript: void(0);">Mute</a>
                                    </div>
                                 </div>
                              </div>
                              <div class="compose-content">
                                 <form action="#">
                                    <div class="form-group">
                                       <input type="text" class="form-control bg-transparent" placeholder=" To:">
                                    </div>
                                    <div class="form-group">
                                       <input type="text" class="form-control bg-transparent" placeholder=" Subject:">
                                    </div>
                                    <div class="form-group">
                                       <textarea id="email-compose-editor" class="textarea_editor form-control bg-transparent" rows="15" placeholder="Enter text ..."></textarea>
                                    </div>
                                 </form>
                                 <h5 class="mb-4"><i class="fa fa-paperclip"></i> Attatchment</h5>
                                 <form action="#" class="dropzone">
                                    <div class="fallback">
                                       <input name="file" type="file" multiple />
                                    </div>
                                 </form>
                              </div>
                              <div class="text-left mt-4 mb-5">
                                 <button class="btn btn-primary btn-sl-sm mr-2" type="button"><span class="mr-2"><i class="fa fa-paper-plane"></i></span>Send</button>
                                 <button class="btn btn-danger light btn-sl-sm" type="button"><span class="mr-2"><i class="fa fa-times" aria-hidden="true"></i></span>Discard</button>
                              </div>
                           </div>
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
      <script src="vendor/dropzone/dist/dropzone.js"></script>
   </body>
</html>