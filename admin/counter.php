<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    @import url('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    .input-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }

    .button {
      background-color: #4caf50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .button:hover {
      background-color: #45a049;
    }
    .success-msg {
      color: #270;
      background-color: #DFF2BF;
      height: 40px;
    }
  </style>
</head>
<body>
<div class="container">
  <?php
  require 'dbconnect.php';
  if(isset($_REQUEST['submit'])){
    $newx = $_REQUEST['new'];
    $withx = $_REQUEST['with'];
    $userx = $_REQUEST['user'];
    $activex = $_REQUEST['active'];
    $sql = "UPDATE total SET t_user = '$newx', t_new_user = '$withx', t_withdrew = '$userx', t_active = '$activex' WHERE id = 1 ";
    $query = mysqli_query($conn, $sql);
    if($query){ ?>
          
          <div class="success-msg">
            <center style="margin-top: 25px; padding-top: 10px;">
            <i class="fa fa-check"></i>
            Successfully Data inserted..
            </center>
          </div>
    <?php }
  }
  $sql = "SELECT * FROM total";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($query);
  $new = $row['t_new_user'];
  $with = $row['t_withdrew'];
  $user = $row['t_user'];
  $active = $row['t_active'];

  ?>



  <form method="post" action="">
  <div class="input-group">
    <label>Total user:</label>
    <input type="number" name="user" placeholder="Enter total user" value="<?php echo $user; ?>" required>
  </div>

  <div class="input-group">
    <label>Total withdrawals:</label>
    <input type="number" name="with" placeholder="Enter total withdrawals" value="<?php echo $with; ?>"  required>
  </div>

  <div class="input-group">
    <label>New Users:</label>
    <input type="number" name="new" placeholder="Enter total new user" value="<?php echo $new; ?>" required>
  </div>

  <div class="input-group">
    <label>Active Users:</label>
    <input type="number" name="active" placeholder="Enter total active user" value="<?php echo $active; ?>" required>
  </div>

  <input type="submit" name="submit" value="Update Data" class ="button">
  </form>
</div>

</body>
</html>

