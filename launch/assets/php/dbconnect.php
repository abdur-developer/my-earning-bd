<?php
// $servername = "localhost";
// $username = "abdur";
// $password = "000000";
// $dbname = "myearningbd";

$servername = "localhost";
$username = "myearnin_gbd";
$password = "Fq4pn4eR~=NI";
$dbname = "myearnin_gbd";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>