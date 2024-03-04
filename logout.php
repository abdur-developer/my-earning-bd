<?php
session_start();//session ব্যাবহার করলে এই ম্যাথডটি অবশ্যই লিখতে হবে...
session_destroy();
header("location: index.php");
?>