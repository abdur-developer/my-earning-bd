<?php
session_start();
if (isset($_SESSION['islogin'])) {
  header("location: dashboard.php");
}
?>
<!DOCTYPE html>

<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>My earning bd | make money online</title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="style.css">
  <style>
    /* Import Google font - Poppins */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      min-height: 100vh;
      width: 100%;
      background: #009579;
    }

    .container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      max-width: 430px;
      width: 100%;
      background: #fff;
      border-radius: 7px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
    }

    .container .form {
      padding: 2rem;
    }

    .form header {
      font-size: 2rem;
      font-weight: 500;
      text-align: center;
      margin-bottom: 1.5rem;
    }

    .form input {
      height: 60px;
      width: 100%;
      padding: 0 15px;
      font-size: 17px;
      margin-bottom: 1.3rem;
      border: 1px solid #ddd;
      border-radius: 6px;
      outline: none;
    }

    .form input:focus {
      box-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
    }

    .form a {
      font-size: 16px;
      color: #009579;
      text-decoration: none;
    }

    .form a:hover {
      text-decoration: underline;
    }

    .form input.button {
      color: #fff;
      background: #009579;
      font-size: 1.2rem;
      font-weight: 500;
      letter-spacing: 1px;
      margin-top: 1.7rem;
      cursor: pointer;
      transition: 0.4s;
    }

    .form input.button:hover {
      background: #006653;
    }

    .signup {
      font-size: 17px;
      text-align: center;
    }

    .signup label {
      color: #009579;
      cursor: pointer;
    }

    .signup label:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="container">

    <?php
    if (isset($_REQUEST['u'])) {
      $u = $_REQUEST['u'];
      $p = $_REQUEST['p'];

      $user = '$2y$10$Mo57MOH4IK80l6GG6G5jQenweQSLM61KVGlJpYDhBB7GYw..od.qq';
      $pass = '$2y$10$DG/Y138BZbudhN7KipSnMehapD0bV3D3SZWY3Nc8wL9d0ijl3JC6W';

      if (password_verify($u, $user) && password_verify($p, $pass)) {
        $_SESSION['islogin'] = "admin";
        header("location: dashboard.php");
      } else {
        echo "<h1 style='color:red;'>username or password wrong..!</h1>";
      }
    }
    ?>
    <div class="login form">
      <header>Login</header>
      <form action="" method="post">
        <input type="text" placeholder="Enter your username" name="u" required>
        <input type="password" placeholder="Enter your password" name="p" required>
        <input type="submit" class="button" value="Login">
      </form>
    </div>


  </div>
</body>

</html>