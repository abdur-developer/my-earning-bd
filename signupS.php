<?php 
require 'dbconnect.php';
if(isset($_REQUEST['name'])){
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['pass'];
    $has_pass = password_hash($pass, PASSWORD_DEFAULT);
    $ot_ref = $_REQUEST['ref'];

    $my_ref = rand(100000, 999999);

    $sql = "INSERT INTO users (name, email, password, my_ref_code, ot_ref_code, last_spin) 
    VALUES ('$name', '$email', '$has_pass', '$my_ref', '$ot_ref', '2024-01-07 21:57:26');";

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['my_login_mail'] = $email;
        header("location: dashboard.php");
    }else{
        echo "কিছু সমস্যা হয়েছে...!";
    }

}else{
    echo "কিছু সমস্যা হয়েছে...!";
}
?>