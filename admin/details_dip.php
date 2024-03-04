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
      background-color: #000;
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
    $id = "";
    $d_id = "";

    if (isset($_REQUEST['id_d'])) {
      $d_id = $_REQUEST['id_d'];

      $sql = "SELECT * FROM deposit WHERE id = '$d_id'";

      $query = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($query);

      $email = "null";
      $phone = "null";
      $time = "null";
      $amount = "null";
      $status = "null";
      $method = "null";

      if ($row != null) {
        $email = $row['email'];
        $phone = $row['phone'];
        $time = $row['time'];
        $amount = $row['amount'];
        $status = $row['status'];
        $method = $row['method'];
        $trx_id = $row['trx_id'];
        //get user id 
        $sqli = "SELECT * FROM users WHERE email = '$email'";
        $querypp = mysqli_query($conn, $sqli);
        $rowpp = mysqli_fetch_assoc($querypp);
        if (isset($rowpp['id']))
          $id = $rowpp['id'];
        else
          $id = "0";
      }

      $sql = "SELECT ot_ref_code FROM users WHERE email = '$email'";
      $query = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($query);
      if (isset($row['ot_ref_code'])) {
        $refence = $row['ot_ref_code'];
      } else {
        $refence = "12345";
      }
      //echo $refence;
      /*
      $sql = "SELECT balance FROM users WHERE my_ref_code = '$refence'";
      $query = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($query);
      if(isset($row['balance'])) $bl = $row['balance'];
      else $bl = "0";
      //echo $bl;
      $b = intval($bl);
      $c = intval($amount);
      $balance = $b + $c;
      */

      if (isset($_REQUEST['status'])) {
        $id = $_REQUEST['id'];
        $idx = $_REQUEST['idx'];
        $st = $_REQUEST['status'];
        $refence = $_REQUEST['ref'];

        if ($st == "Approved") {

          $sql = "SELECT * FROM ref_bonus"; //for bonuse tk check
          $query = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($query);
          $b = $row['taka'];
          $bonus = intval($b);



          //start ref bonus============================================
          $sql = "SELECT * FROM users WHERE my_ref_code = '$refence'";
          $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
          if (isset($row['balance'])) {
            $ppp = $row['balance'];
            $bonus += intval($ppp);
          }
          if (isset($row['t_ref'])) {
            $t_ref = $row['t_ref'] + 1;
          } else {
            $t_ref = 1;
          }
          mysqli_query($conn, $sql);


          $sql = "UPDATE users SET balance = '$bonus', t_ref = '$t_ref' WHERE my_ref_code = $refence";
          mysqli_query($conn, $sql);
          //end ref bonus============================================
    //UPDATE `users` SET `t_deposite` = '100' WHERE `users`.`id` = 6;
          $sql = "UPDATE users SET status ='$st' , t_deposite = '100' WHERE id = '$id'"; //for diposite
          mysqli_query($conn, $sql);

          $sql = "UPDATE deposit SET status = '$st' WHERE id = '$idx'";
          mysqli_query($conn, $sql);
          ?>
          <div class="success-msg">
            <center style="margin-top: 25px; padding-top: 10px;">
              <i class="fa fa-check"></i>
              Successfully Data inserted..
            </center>
          </div>
          <?php

        } else {
          $sql = "UPDATE users SET status = '$st' WHERE id = '$id'";
          mysqli_query($conn, $sql);

          $sql = "UPDATE deposit SET status = '$st' WHERE id = '$idx'";
          mysqli_query($conn, $sql);
          ?>
          <div class="success-msg">
            <center style="margin-top: 25px; padding-top: 10px;">
              <i class="fa fa-check"></i>
              Successfully Data inserted..
            </center>
          </div>
          <?php
        }

      }




      ?>

      <form method="get" action="">
        <div class="input-group">
          <label>Phone:</label>
          <input value=" <?php echo $phone; ?> " readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          <input name="id_d" value=" <?php echo $d_id; ?> " hidden>
        </div>

        <div class="input-group">
          <label>method:</label>
          <input value=" <?php echo $method; ?> " readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="input-group">
          <label>TRX ID:</label>
          <input value=" <?php echo $trx_id; ?> " readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="input-group">
          <label>Email:</label>
          <input value=" <?php echo $email; ?> " readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          <input name="id" value=" <?php echo $id; ?> " hidden>
          <input name="ref" value=" <?php echo $refence; ?> " hidden>
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
          <label>Amount:</label>
          <input name="amount" value="<?php echo $amount; ?>" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="input-group">
          <label>Deposit time:</label>
          <input value="<?php echo $time; ?>" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <input name="idx" value=" <?php echo $d_id; ?> " hidden>
        <input type="submit" value="Update Data" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
      </form>
    </div>
  <?php } ?>
</body>

</html>