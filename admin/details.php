<!DOCTYPE html>
<html lang="en" data-theme="light">

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
      background-color: #80deea;
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
      background-color: #00695c;
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
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.11/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div class="container">
    <div class="bg-nav-color text-sm md:text-base">
      <div class='max-w-[2530px] mx-auto xl:px-20 md:px-10 sm:px-2 px-4'>
        <div class="flex justify-between items-center">
          <div><a href="index.php">
              <button class="cursor-pointer p-4 font-bold flex justify-center items-center text-yellow-500">
                <img src="https://i.ibb.co/6859944/LOGO-My-Earning-BD.png" width="50" alt="">
                <p> EarningBD</p>
              </button></a>
          </div>
          <div class="flex md:space-x-10 space-x-3 p-5 text-[10px] md:text-base">
            <button class="font-bold"><a href="index.php">Home</a></button>
          </div>
        </div>
      </div>
    </div>
    <?php
    require 'dbconnect.php';
    $email = "";

    if (isset($_REQUEST['e'])) {
      $email = $_REQUEST['e'];

      if (isset($_REQUEST['status'])) {
        $st = $_REQUEST['status'];
        $balance = $_REQUEST['balance'];
        $tw = $_REQUEST['total_with'];//total_withdraw
        $td = $_REQUEST['total_dip'];//total_diposit
        

        $sql = "UPDATE users SET balance = '$balance', status = '$st', t_withdrew = $tw, t_deposite = $td WHERE email = '$email'";
        $query = mysqli_query($conn, $sql);
        if ($query) { ?>

        <div class="success-msg">
          <center style="margin-top: 25px; padding-top: 10px;">
            <i class="fa fa-check"></i>
            Successfully Data inserted..
          </center>
        </div>
      <?php
        }
      }

      $sql = "SELECT * FROM users WHERE email = '$email'";
      $query = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($query);
      if($row == null) die("null");

      $id = $row['id'];
      $name = $row['name'];
      $time = $row['time'];
      $status = $row['status'];
      $my_ref = $row['my_ref_code'];
      $ot_ref = $row['ot_ref_code'];
      $balance = $row['balance'];
      $t_withdew = $row['t_withdrew'];
      $t_deposite = $row['t_deposite'];
      
      
    
      ?>



      <form method="get" action="">
        <div class="input-group">
          <label>Name:</label>
          <input value=" <?php echo $name; ?> " readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="input-group">
          <label>Email:</label>
          <input value=" <?php echo $email; ?> " readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          <input name="e" value="<?php echo $email; ?>" hidden>
        </div>



        <div class="input-group">
          <label>Status:</label>
          <select name="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <?php if ($status == 'Pending') {
              echo "<option value='Pending'>Pending</option><option value='Approved'>Approved</option>";
            } else {
              echo "<option value='Approved'>Approved</option><option value='Pending'>Pending</option>";
            } ?>
          </select>
        </div>

        <div class="input-group">
          <label>Update Balance:</label>
          <input type="number" name="balance" value="<?php echo $balance; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="input-group">
          <label>My Refer code:</label>
          <input value="<?php echo $my_ref; ?>" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="input-group">
          <label>Other Refer code:</label>
          <input value="<?php echo $ot_ref; ?>" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="input-group">
          <label>Refarence:</label>
          <input value="<?php echo $ot_ref; ?>" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="input-group">
          <label>Total withdraw:</label>
          <input name="total_with" value="<?php echo $t_withdew; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="input-group">
          <label>Total Deposit:</label>
          <input name="total_dip" value="<?php echo $t_deposite; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="input-group">
          <label>Join Date:</label>
          <input value="<?php echo $time; ?>" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <input type="submit" value="Update Data"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
      </form>
    </div>

 <?php   }
    ?>

</body>

</html>