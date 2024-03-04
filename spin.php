<?php 
require 'dbconnect.php';
session_start();
$email = $_SESSION['my_login_mail'];



 if(isset($_REQUEST['number'])){
    $number = $_REQUEST['number'];
    //============================
    $sql = "SELECT balance FROM users WHERE email = '$email'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $number += $row['balance'];
    //echo $number;
    if(mysqli_query($conn, $sql)){
        $sql = "UPDATE users SET balance = '$number', last_spin = NOW() WHERE email = '$email'";
        if(mysqli_query($conn, $sql)){
            header("location: dashboard.php?q=spin");
            //echo $email;
        }
    }
    
 }
?>