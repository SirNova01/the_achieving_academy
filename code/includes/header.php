<header class="header-area">
         <div class="header-top">
            <div class="container">
               <div class="header-top-wrapper d-flex flex-wrap justify-content-sm-between">
                  <div class="header-top-left mt-10">
                     <ul class="header-meta">
                        <li><a href="mailto://info@achievingacademy.com">info@achievingacademy.com</a></li>
                     </ul>
                  </div>
                  <div class="header-top-right mt-10">
                     <div class="header-link">
                        <a class="notice" href="notice">Notice</a>
                        <a class="login" href="login">Login</a>
                        <a class="register" href="register">Register</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="navigation" class="navigation navigation-landscape">
            <div class="container position-relative">
               <div class="row align-items-center">
                  <div class="col-lg-3">
                     <div class="header-logo">
                        <a href="home"><img src="assets/images/academy_logo.png" alt=""></a>
                     </div>
                  </div>
                  <div class="col-lg-7 position-static">
                     <div class="nav-toggle"></div>
                     <nav class="nav-menus-wrapper">
                        <ul class="nav-menu">
                           <li>
                              <a class="<?php if( $script_name == "index" || $script_name == "home"){echo("active");}?>" href="home">Home</a>
                           </li>
                           <li>
                              <a class="<?php if( $script_name == "courses"){echo("active");}?>" href="courses">Courses</a>
                           </li>
                           <li>
                              <a class="<?php if( $script_name == "events"){echo("active");}?>" href="events">Events</a>
                           </li>
                           <li>
                              <a class="<?php if( $script_name == "blog"){echo("active");}?>" href="blog">Blog</a>
                           </li>
                           <li>
                              <a class="<?php if( $script_name == "about"){echo("active");}?>" href="about">About</a>
                           </li>
                           <!-- <li>
                              <a class="<?php if( $script_name == "contact"){echo("active");}?>" href="contact">Contact</a>
                           </li> -->
                           <li>
                              <a class="<?php if( $script_name == "sign_in"){echo("active");}?>" href="sign_in">Sign In</a>
                           </li>
                           <li>
                              <a class="<?php if( $script_name == "get_started"){echo("active");}?>" href="get_started">Get Started</a>
                           </li>
                           
                        </ul>
                     </nav>
                  </div>
                  <div class="col-lg-2 position-static">
                     <div class="header-search">
                        <form action="#">
                           <input type="text" placeholder="Search">
                           <button><i class="fas fa-search"></i></button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>