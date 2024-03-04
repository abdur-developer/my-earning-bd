<?php
session_start();

if(isset($_REQUEST['email'])){
    $email = $_REQUEST['email'];
    $_SESSION['my_login_mail'] = $email;
    header("location: dashboard.php");
}else{
    echo "কিছু সমস্যা হয়েছে...!";
}


?>