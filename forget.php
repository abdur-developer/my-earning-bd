<?php $number = '01709409266' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
        
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    }
    body{
    min-height: 100vh;
    width: 100%;
    background: #dfdede;
    }
        .form-gap {
        padding-top: 70px;
    }
    </style>
</head>
<body>
<?php
if(isset($_REQUEST['key'])){
  $email = $_REQUEST['email'];
  $link = "https://wa.me/+88$number?text=forgot_password: ".$email;
  setcookie("forgot_mail",$email,time()+60);
  header("location: ".$link);
}
?>
<div class="form-gap"></div>
<div class="container">
	<div class="row bg-white p-3 rounded">
		<div class="col-12 col-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                  <?php if(isset($_COOKIE['forgot_mail'])){

                    echo "<h1 class='btn btn-sm btn-success btn-block'>please wait some minute for getting password on your mail box </h1>";
                  }else{ ?>
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="">
    
                      <div class="form-group  d-flex justify-content-center">
                        <div class="input-group" style="width: 60%; ">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control width 25%"  type="email" required>
                          <input name="key" value="forget" hidden>
                        </div>
                      </div>
                      <div class="form-group mt-3">
                        <input class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>
                    </form>
                  <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
</body>
</html>