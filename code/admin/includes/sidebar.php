 
<?php
    // $script_name = pathinfo(__FILE__, PATHINFO_FILENAME);
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar"> 
    <ul class="nav">
        <li class="nav-item sidebar-category mt-4">
            <span style="color:black;">Hello <b><?$first_name?></b></span>
        </li>
        <li class="nav-item <?php if($script_name == "index"){echo("active");}?>">
            <a class="nav-link" href="home">
                <i class="mdi mdi-home-outline menu-icon"></i>
                <span class="menu-title">Home</span>
            </a>
        </li>
        <li class="nav-item <?php if($script_name == "courses"){echo("active");}?>">
            <a class="nav-link" href="courses">
                <i class="mdi mdi-apps menu-icon"></i>
                <span class="menu-title">Manage Programs</span>
            </a>
        </li>

        <li class="nav-item <?php if($script_name == "game"){echo("active");}?>">
            <a class="nav-link" href="game">
                <i class="mdi mdi-package menu-icon"></i>
                <span class="menu-title">Game</span>
            </a>
        </li>
       
        <li class="nav-item <?php if($script_name == "all_users"){echo("active");}?>">
            <a class="nav-link" href="all_users">
                <i class="mdi mdi-account-group menu-icon"></i>
                <span class="menu-title">All Users</span>
            </a>
        </li>

        <li class="nav-item <?php if($script_name == "events"){echo("active");}?>">
            <a class="nav-link" href="events">
                <i class="mdi mdi-calendar-multiple menu-icon"></i>
                <span class="menu-title">Events</span>
            </a>
        </li>

        <li class="nav-item <?php if($script_name == "blog"){echo("active");}?>">
            <a class="nav-link" href="blog">
                <i class="mdi mdi-desktop-mac menu-icon"></i>
                <span class="menu-title">Blog</span>
            </a>
        </li>

        
        <li class="nav-item <?php if($script_name == "notifications"){echo("active");}?>">
            <a class="nav-link" href="notifications">
                <i class="mdi mdi-bell-outline menu-icon"></i>
                <span class="menu-title">Notifications</span>
            </a>
        </li>
        <li class="nav-item <?php if($script_name == "logout"){echo("active");}?>">
            <a class="nav-link" href="logout">
                <i class="mdi mdi-logout menu-icon"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>          
    </ul>
</nav>