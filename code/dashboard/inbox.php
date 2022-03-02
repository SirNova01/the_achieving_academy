<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <title>Inbox - Student Dashboard</title>
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
                                 <a href="compose" class="btn btn-primary btn-block">Compose</a>
                              </div>
                              <div class="mail-list mt-4">
                                 <a href="email-inbox.html" class="list-group-item active"><i
                                    class="fa fa-inbox font-18 align-middle mr-2"></i> Inbox <span
                                    class="badge badge-primary badge-sm float-right">198</span> </a>
                                 <a href="javascript:void()" class="list-group-item"><i
                                    class="fa fa-paper-plane font-18 align-middle mr-2"></i>Sent</a> <a href="javascript:void()" class="list-group-item"><i
                                    class="fa fa-star font-18 align-middle mr-2"></i>Important <span
                                    class="badge badge-danger text-white badge-sm float-right">47</span>
                                 </a>
                                 <a href="javascript:void()" class="list-group-item"><i
                                    class="mdi mdi-file-document-box font-18 align-middle mr-2"></i>Draft</a><a href="javascript:void()" class="list-group-item"><i
                                    class="fa fa-trash font-18 align-middle mr-2"></i>Trash</a>
                              </div>


                              
                              
                              
                              
                           </div>
                           <div class="email-right-box ml-0 ml-sm-4 ml-sm-0">
                              <div role="toolbar" class="toolbar ml-1 ml-sm-0">
                                 <div class="btn-group mb-1">
                                    <div class="custom-control custom-checkbox pl-2">
                                       <input type="checkbox" class="custom-control-input" id="checkbox1">
                                       <label class="custom-control-label" for="checkbox1"></label>
                                    </div>
                                 </div>
                                 <div class="btn-group mb-1">
                                    <button class="btn btn-primary light px-3" type="button"><i class="ti-reload"></i>
                                    </button>
                                 </div>
                                 <div class="btn-group mb-1">
                                    <button aria-expanded="false" data-toggle="dropdown" class="btn btn-primary px-3 light dropdown-toggle" type="button">More <span
                                       class="caret"></span>
                                    </button>
                                    <div class="dropdown-menu"> <a href="javascript: void(0);" class="dropdown-item">Mark as Unread</a> <a href="javascript: void(0);" class="dropdown-item">Add to Tasks</a>
                                       <a href="javascript: void(0);" class="dropdown-item">Add Star</a> <a href="javascript: void(0);" class="dropdown-item">Mute</a>
                                    </div>
                                 </div>
                              </div>
                              <div class="email-list mt-3">
                                 <div class="message">
                                    <div>
                                       <div class="d-flex message-single">
                                          <div class="pl-1 align-self-center">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="checkbox2">
                                                <label class="custom-control-label" for="checkbox2"></label>
                                             </div>
                                          </div>
                                          <div class="ml-2">
                                             <button class="border-0 bg-transparent align-middle p-0"><i
                                                class="fa fa-star" aria-hidden="true"></i></button>
                                          </div>
                                       </div>
                                       <a href="email-read.html" class="col-mail col-mail-2">
                                          <div class="subject">Ingredia Nutrisha, A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture</div>
                                          <div class="date">11:49 am</div>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="message">
                                    <div>
                                       <div class="d-flex message-single">
                                          <div class="pl-1 align-self-center">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="checkbox3">
                                                <label class="custom-control-label" for="checkbox3"></label>
                                             </div>
                                          </div>
                                          <div class="ml-2">
                                             <button class="border-0 bg-transparent align-middle p-0"><i
                                                class="fa fa-star" aria-hidden="true"></i></button>
                                          </div>
                                       </div>
                                       <a href="email-read.html" class="col-mail col-mail-2">
                                          <div class="subject">Almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</div>
                                          <div class="date">11:49 am</div>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="message">
                                    <div>
                                       <div class="d-flex message-single">
                                          <div class="pl-1 align-self-center">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="checkbox4">
                                                <label class="custom-control-label" for="checkbox4"></label>
                                             </div>
                                          </div>
                                          <div class="ml-2">
                                             <button class="border-0 bg-transparent align-middle p-0"><i
                                                class="fa fa-star" aria-hidden="true"></i></button>
                                          </div>
                                       </div>
                                       <a href="email-read.html" class="col-mail col-mail-2">
                                          <div class="subject">Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
                                          <div class="date">11:49 am</div>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="message">
                                    <div>
                                       <div class="d-flex message-single">
                                          <div class="pl-1 align-self-center">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="checkbox5">
                                                <label class="custom-control-label" for="checkbox5"></label>
                                             </div>
                                          </div>
                                          <div class="ml-2">
                                             <button class="border-0 bg-transparent align-middle p-0"><i
                                                class="fa fa-star" aria-hidden="true"></i></button>
                                          </div>
                                       </div>
                                       <a href="email-read.html" class="col-mail col-mail-2">
                                          <div class="subject">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
                                          <div class="date">11:49 am</div>
                                       </a>
                                    </div>
                                 </div>
                                
                                 <div class="message">
                                    <div>
                                       <div class="d-flex message-single">
                                          <div class="pl-1 align-self-center">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="checkbox21">
                                                <label class="custom-control-label" for="checkbox21"></label>
                                             </div>
                                          </div>
                                          <div class="ml-2">
                                             <button class="border-0 bg-transparent align-middle p-0"><i
                                                class="fa fa-star" aria-hidden="true"></i></button>
                                          </div>
                                       </div>
                                       <a href="email-read.html" class="col-mail col-mail-2">
                                          <div class="subject">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
                                          <div class="date">11:49 am</div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <!-- panel -->
                              <div class="row mt-4">
                                 <div class="col-12 pl-3">
                                    <nav>
                                       <ul class="pagination pagination-gutter pagination-primary pagination-sm no-bg">
                                          <li class="page-item page-indicator"><a class="page-link" href="javascript:void()"><i class="la la-angle-left"></i></a></li>
                                          <li class="page-item "><a class="page-link" href="javascript:void()">1</a></li>
                                          <li class="page-item active"><a class="page-link" href="javascript:void()">2</a></li>
                                          <li class="page-item"><a class="page-link" href="javascript:void()">3</a></li>
                                          <li class="page-item"><a class="page-link" href="javascript:void()">4</a></li>
                                          <li class="page-item page-indicator"><a class="page-link" href="javascript:void()"><i class="la la-angle-right"></i></a></li>
                                       </ul>
                                    </nav>
                                 </div>
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
   </body>
</html>