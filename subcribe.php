<?php
require 'dbconnect.php';

if(isset($_REQUEST['email'])){
    $email = $_REQUEST['email'];

    $sql = "INSERT INTO subscriber (email) VALUES ('$email')" ;

    if(mysqli_query($conn, $sql)){
        header("location: index.php");
    }else{
        echo "কিছু সমস্যা হয়েছে...!";
    }
}

?>