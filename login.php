<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="https://i.ibb.co/6859944/LOGO-My-Earning-BD.png">
    <title>Login | my earning bd</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.11/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script> -->
    
    <!-- ========================================================= -->
    <link href="assets/full.min.css" rel="stylesheet" type="text/css" />
    <script src="assets/script.js"></script>
    <!-- ========================================================= -->
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php
    if(isset($_REQUEST['email'])){
        $email = $_REQUEST['email'];
        $pass =$_REQUEST['password'];

        require 'dbconnect.php';
        $sql = "SELECT COUNT(*) as count FROM users WHERE email = '$email'";
        $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        $count = $row['count'];
        if ($count > 0) {
            $sql = "SELECT id, email , password FROM users WHERE email = '$email'";
            $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            $id = $row['id'];
            $has_pass = $row['password'];

            if(password_verify($pass, $has_pass)){
                header("location: loginS.php?email=$email");
            }else{
                echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'password wrong..try again/forget password ..!'
                });</script>";
            }
        }else{
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Email not found on our database..!'
                });</script>";
        }
    }
    ?>
    <div>
        <div class="bg-nav-color text-sm md:text-base">
            <div class='max-w-[2530px] mx-auto xl:px-20 md:px-10 sm:px-2 px-4'>
                <div class="flex justify-between items-center">
                    <div><a href="index.php">
                        <button class="cursor-pointer p-4 font-bold flex justify-center items-center text-yellow-500">
                          <img src="https://i.ibb.co/6859944/LOGO-My-Earning-BD.png" width="50" alt="">
                          <p> EarningBD</p></button></a>
                      </div>
                    <div class="flex md:space-x-10 space-x-3 p-5 text-[10px] md:text-base">
                        <button class="font-bold"><a href="index.php">Home</a></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="class='max-w-[2530px] mx-auto xl:px-20 md:px-10 sm:px-2 px-4'">
            <div class="p-4">
                <h2 class="text-center font-bold mt-5 text-2xl">
                    Welcome Back! Login
                </h2>
                <p class="text-center mb-10">
                    <Link>
                    <span class="text-blue-500 border-b-2 border-b-blue-500">
                    </span>
                    </Link>
                </p>

                <form action="" method="post">
                    <input name="email" placeholder="Enter Your Email" type="email" class="border-2 w-full p-5 mb-5"/>

                    <br />
                    <input name="password" placeholder="Enter Your Password" type="password" class="border-2 w-full p-5 mb-5"/>
                    <br />

                    <span class="mb-5 border-b text-blue-500 border-b-blue-600">
                        <a href="forget.php"> Forget Password</a>
                    </span>

                    
                    <p class="text-center mb-10">
                        You Don't have an account? Please
                        <a href="signup.php">
                            <span class="text-blue-500 border-b-2 border-b-blue-500">
                                SignUp
                            </span>
                        </a>
                    </p>

                    <input type="submit" 
                        class="bg-[#FFD248] bg-gradient-to-r from-[#ffd248] to-[#f5ba62] px-5 py-5 rounded-lg shadow font-bold w-full cursor-pointer" value="Login"/>
                </form>
            </div>
        </div>
    </div>

</body>

</html>