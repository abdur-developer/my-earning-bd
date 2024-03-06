<?php 

  $total_balance = 0;
  $total_withdraw = 0;
  $total_diposite = 0;

  require 'dbconnect.php';
  $sql = "SELECT balance, t_withdrew, t_deposite FROM users";
  $query = mysqli_query($conn, $sql);
  if($query){
    while($row = mysqli_fetch_assoc($query)){
      $total_balance += $row['balance'];
      $total_withdraw += $row['t_withdrew'];
      $total_diposite += $row['t_deposite'];
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hisab | admin panel</title>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <style>
html,
body {
  height: 100%;
  font-family: "Josefin Sans", sans-serif;
  -webkit-font-smoothing: antialiased;
}

h2 {
  margin: 0;
  color: #111111;
  font-weight: 400;
  font-family: "Play", sans-serif;
  font-size: 36px;
}
p {
  font-size: 16px;
  font-family: "Josefin Sans", sans-serif;
  color: #adadad;
  font-weight: 400;
  line-height: 26px;
  margin: 0 0 15px 0;
}

img {
  max-width: 100%;
}

.text-white h2,
.text-white p {
  color: #fff;
}

.counter {
  background: #100028;
  height: 840px;
  padding-top: 380px;
  overflow: hidden;
}

.counter__content {
  padding: 0px 50px;
}

.counter__item {
  background: #1a083d;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
      transform: rotate(45deg);
  height: 255px;
  width: 255px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  text-align: center;
  position: relative;
  z-index: 1;
}
.counter__item::before {
  position: absolute;
  left: -1px;
  bottom: -2px;
  height: 636px;
  width: 636px;
  border-left: 1px solid #333333;
  border-top: 1px solid #333333;
  content: "";
  z-index: -1;
}
.counter__item.second__item {
  margin-top: -185px;
}
.counter__item.second__item:before {
  left: -316px;
  bottom: -65px;
  border-right: 1px solid #333333;
  border-bottom: 1px solid #333333;
  border-left: none;
  border-top: none;
}
.counter__item.four__item {
  margin-top: -185px;
}
.counter__item.four__item:before {
  left: -380px;
  bottom: -380px;
  border-right: 1px solid #333333;
  border-bottom: 1px solid #333333;
  border-left: none;
  border-top: none;
}
.counter__item.third__item:before {
  left: -65px;
  bottom: -317px;
}

.counter__item__text {
  -webkit-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
      transform: rotate(-45deg);
}
.counter__item__text h2 {
  font-size: 60px;
  color: #ffffff;
  font-weight: 700;
  margin-bottom: 6px;
  margin-top: 18px;
}
.counter__item__text p {
  color: #ffffff;
  margin-bottom: 0;
}
/* Wide Mobile = 480px */
@media only screen and (max-width: 767px) {
  .services__title {
    margin-bottom: 50px;
  }

  .counter__item {
    -webkit-transform: rotate(0);
    -ms-transform: rotate(0);
        transform: rotate(0);
    margin-bottom: 30px;
    width: auto;
  }

  .counter__item::before {
    display: none;
  }

  .counter__content {
    padding: 0;
  }

  .counter__item.second__item {
    margin-top: 0;
  }

  .counter__item.four__item {
    margin-top: 0;
  }

  .counter__item__text {
    -webkit-transform: rotate(0);
    -ms-transform: rotate(0);
        transform: rotate(0);
  }

  .counter {
    height: auto;
    padding-top: 100px;
    padding-bottom: 70px;
  }
}

    </style>
</head>
<body>
    <!-- Counter Section Begin -->
    <section class="counter">
        <div class="container">
            <div class="counter__content">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter__item">
                            <div class="counter__item__text">
                                <img src="img/icons/ci-1.png" alt="">
                                <h2 class="counter_num"><?= $total_balance ?></h2>
                                <p>Total Balance</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter__item second__item">
                            <div class="counter__item__text">
                                <img src="img/icons/ci-2.png" alt="">
                                <h2 class="counter_num"><?= $total_withdraw ?></h2>
                                <p>Total Withdraw</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter__item third__item">
                            <div class="counter__item__text">
                                <img src="img/icons/ci-3.png" alt="">
                                <h2 class="counter_num"><?= $total_diposite ?></h2>
                                <p>Total Diposite</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter__item four__item">
                            <div class="counter__item__text">
                                <img src="img/icons/ci-4.png" alt="">
                                <h2 class="counter_num"><?= $total_diposite - ($total_balance + $total_withdraw) ?></h2>
                                <p>Need Profit</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counter Section End -->
    <script src="../assets/jquery-3.3.1.min.js"></script>
    <script>
      'use strict';
      (function ($) {
        /*------------------
            Counter
        --------------------*/
        $('.counter_num').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
      })(jQuery);
    </script>
</body>
</html>