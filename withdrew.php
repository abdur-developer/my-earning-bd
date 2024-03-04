<?php 
if(isset($_REQUEST['amount'])){
    require 'dbconnect.php';
    session_start();
    $email = $_SESSION['my_login_mail'];

    $amount = $_REQUEST['amount'];
    $method = $_REQUEST['method'];
    $number = $_REQUEST['number'];

    //for get total balance and withdrew
    $sql_q = "SELECT * FROM users WHERE email = '$email'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql_q));
    $current_blance = $row['balance'];
    //echo $current_blance;echo "<br>";
    if($current_blance > $amount){

        //for insert in withdrew
        $sql = "INSERT INTO withdrew (email, phone, amount, method) VALUES ('$email', '$number', '$amount', '$method')";
        if(mysqli_query($conn, $sql)){
            
            $current_blance -= $amount;
            $amount += $row['t_withdrew'];
            //for update total balance and withdrew
            $sql = "UPDATE users SET t_withdrew = '$amount', balance = '$current_blance' WHERE email = '$email'";
            if(mysqli_query($conn, $sql)){
                header("location: dashboard.php?q=with&success=withdew success please wait few hour");
                //echo $amount;
            }
        }

    }else{
        header("location: dashboard.php?q=with&error=you have not enough balance");
    }
}else{
    header("location: dashboard.php?q=with&error=somthing wrong");
}
?>