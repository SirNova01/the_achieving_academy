

<?php
  session_start();
  include("includes/db_conn.php");
  $day = date("Y-m-d");
  $date = date("Y-m-d H:i:s");


  //  link sample:   http://www.ichonia.com/email_confirm?email=$email&&code=$email_verification_code
  // localhost/academy/email_confirm?email=endowed555@gmail.com&&code=2065106363


  if(isset($_GET['email']) && isset($_GET['code'])){

    $email = $_GET['email'];
    $code = $_GET['code'];

    $user_check_query = "SELECT * FROM email_confirmation WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db_handle, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    if ($user) { // if user exists
        if ($user['code'] === $code) {




            $date1 =$user['date'];
            $date2 = $date;;
            $seconds = strtotime($date2) - strtotime($date1);
            $hr = $seconds /60 /  60;

            if($hr >1){


                //resend email
                $email_verification_code = rand();

                $user_update_query = "UPDATE email_confirmation SET  code = '$email_verification_code', date='$date' WHERE email='$email'";
                if (mysqli_query($db_handle, $user_update_query)) {
                // $email_body = "
                //         Click on the link below to confirm your account 
                //         http://www.ichonia.com/email_confirm?email=$email&&code=$email_verification_code
                //     ";
                // $email_subject = "FCSC Email Confirmation";
                // $res = mail($email, $email_subject, $email_body, "From: NoReply@fcsc.imetrics.tech");
                // if($res){
                    header("location: email_submit_message");
                    // }

                }


            }else{
                $_SESSION['email'] = $email;
                
                $account_details_query= "UPDATE users SET evs='verified',  account_status = 'active' WHERE email='$email'";
                if (mysqli_query($db_handle, $account_details_query)) {
                    
                    $acc_query= "UPDATE email_confirmation SET   code = '0' WHERE email='$email'";
                    if (mysqli_query($db_handle, $acc_query)) {
                        header("location: email_verified_message");
                    }
                }

            }


            
            
            


        }else{
            header("location: home");
        }
    }else{
        header("location: home");
    }
      
  }else{
      header("location: home");
  }


?>