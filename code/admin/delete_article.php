<?php

session_start();
include("../includes/db_conn.php");
//   $user_id = $_SESSION['user_id'];
$date = date("Y-m-d H:i:s");
$day = date("Y-m-d");
$script_name = pathinfo(__FILE__, PATHINFO_FILENAME);
$errors = array();

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $report_update_query= "DELETE FROM articles  WHERE article_id='$id'";
    if (mysqli_query($db_handle, $report_update_query)) {
        header("location: blog?msg_success=article deleted!");
    }

}else{
    header("location: home");
}



?> 