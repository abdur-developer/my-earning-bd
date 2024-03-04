<?php
session_start();
require 'dbconnect.php';
if(isset($_REQUEST['nn'])){
    $name = $_REQUEST['nn'];
    $email = $_SESSION['my_login_mail'];
    $sql = "UPDATE users SET name = '$name' WHERE email='$email'";
    $query = mysqli_query($conn, $sql);
    if($query) header("location: dashboard.php");
}
?>