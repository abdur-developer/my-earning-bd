<?php
// $username = "new_username";
// $password = "new_password";
// $dbname = "new_dbname";

$username = "root";
$password = "";
$dbname = "myearnin_gbd";

$servername = "localhost";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>