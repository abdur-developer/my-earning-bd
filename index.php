<?php require 'dbconnect.php';

$sql = "SELECT * FROM total WHERE id = 1";

$fatch = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($fatch);

$active = $row['t_active'] . "+";
$user = $row['t_user'] . "+";
$withdrew = $row['t_withdrew'] . "+";
$new_user = $row['t_new_user'] . "+";

session_start();

$is_login = false;

if (isset($_SESSION['my_login_mail'])) {
  $is_login = true;
}

?>
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My earningbd | make money online</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.14/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script> -->
  
  <!-- ========================================================= -->
  <link href="assets/full.min.css" rel="stylesheet" type="text/css" />
  <script src="assets/script.js"></script>
  <!-- ========================================================= -->
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="assets/style.css">
  <meta name="description"
    content="My earningbd | make money online | best earning platform in bangladesh | (f) refer and earn">
  <meta property="og:image" content="assets/images/favicon.png">
  <meta name="author" content="akram, shihab">
  <meta name="keywords" content="earn money, make money, refer and earn, online income">
</head>

<body>
  <!-- navbar -->
  <div class="bg-nav-color text-sm md:text-base">
    <div class="max-w-[2530px] mx-auto xl:px-20 md:px-10 sm:px-2 px-4">
      <div class="flex justify-between items-center">
        <div><a href="">
            <button class="cursor-pointer p-4 font-bold flex justify-center items-center text-yellow-500">
              <img src="assets/images/favicon.png" style="width: 45px; height: 30px;" alt="">
              <h1 class="font-bold text-xl">MY EarningBD</h1>
            </button></a>
        </div>
        <div class="flex md:space-x-10 space-x-3 p-5 text-[10px] md:text-base">

          <?php if ($is_login) { ?>

            <button class="font-bold"><a href="dashboard.php"> Dashboard</a></button>

            <button class="Sign-up-ex-c px-5 rounded-lg shadow font-bold"><a href="logout.php">
                LogOut</a>
            </button>

          <?php } else { ?>
            <div class="space-x-4">
              <button class="font-bold"><a href="login.php"> Login</a></button>
              <button class="Sign-up-ex-c px-2 rounded-lg shadow font-bold"><a href="signup.php">
                  Sign Up</a>
              </button>
            </div>
          <?php } ?>


          <!-- if user    
                 -->



        </div>
      </div>
    </div>
  </div>
  <!-- banner -->
  <div class="bg-[#FFFFFD] ">
    <div class="flex justify-between items-center ">
      <div class="px-3 ml-3">
        <div class="flex flex-col justify-center items-center">
          <h2 class="font-bold text-2xl md:text-5xl">১রেফারে</h2>
          <h2 class="text-[#FFBC27] text-2xl font-bold md:text-5xl">
            ৪০ টাকা
          </h2>
        </div>
        <p class="text-[10px] md:text-xl text-justify  py-5" style="font-size: 15px">
          ১০০ টাকা দিয়ে অ্যাকাউন্ট খুলে প্রতি রেফার করলে আপনি পাবেন ৪০ টাকা
        </p>
        <div class="text-[10px] md:text-xl flex gap-5 px-5 justify-center mt-5">
          <?php if ($is_login) { ?>

            <button class="Sign-up-ex-c px-2 mt-2 rounded-lg shadow font-bold"><a href="dashboard.php"> Dashboard</a></button>
            </button>

          <?php } else { ?>
            <div class="">
              <button class="Sign-up-ex-c px-2 mb-2 rounded-lg shadow font-bold col-6"><a href="login.php"> Login</a></button>
              <button class="Sign-up-ex-c px-2 mb-2 rounded-lg shadow font-bold col-6"><a href="signup.php">
                  Sign Up</a>
              </button>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="relative">
        <img src="assets/images/img2.png" class="md:w-100" alt="" />
      </div>
    </div>
  </div>
  <!-- banner bottom -->
  <div class="bg-black -mt-1 z-50">
    <div class="max-w-[2530px] mx-auto xl:px-20 md:px-10 sm:px-2 px-4">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-5 text-white justify-between items-center md:p-10 p-3">

        <div class="flex justify-center flex-col items-center md:text-xl">
          <i class="fa-regular fa-circle-user md:text-5xl text-xl text-[#FCB113]"></i>

          <div class="flex justify-center flex-col items-center text-sm">
            <p>
              <?php echo $user; ?>
            </p>
            <p>Total user</p>
          </div>
        </div>

        <div class="flex justify-center flex-col items-center text-xl">
          <i class="fa-regular fa-circle-user md:text-5xl text-xl text-[#FCB113]"></i>

          <div class="flex justify-center flex-col items-center text-sm">
            <p>
              <?php echo $withdrew; ?>
            </p>
            <p>total withdrawals</p>
          </div>
        </div>
        <div class="flex justify-center flex-col items-center text-xl">
          <i class="fa-regular fa-circle-user md:text-5xl text-xl text-[#FCB113]"></i>
          <div class="flex justify-center flex-col items-center text-sm">
            <p>
              <?php echo $active; ?>
            </p>
            <p>Active Users</p>
          </div>
        </div>
        <div class="flex justify-center flex-col items-center text-xl">
          <i class="fa-regular fa-circle-user md:text-5xl text-xl text-[#FCB113]"></i>
          <div class="flex justify-center flex-col items-center text-sm">
            <p>
              <?php echo $new_user; ?>
            </p>
            <p>New Users</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- latest withdraw -->
  <div>
    <div class="max-w-[2530px] mx-auto xl:px-20 md:px-10 sm:px-2 px-4">
      <div class="flex flex-col -mt-2">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <div>
                <div class="grid sm:grid-cols-2 grid-cols-1 md:grid-cols-3 gap-50 text-slate-600 mt-20 mb-20">
                  <div class="p-5">
                    <div class="border-b-2">
                      <h2 class="border-orange-500 border-b-2 w-28 text-slate-900 font-bold">
                        Get In Touch
                      </h2>
                    </div>
                    <div class="space-y-2 my-3">
                      <p>
                        <span class="font-bold">Address: </span>Ashulia,
                        Savar,Dhaka
                      </p>
                      <p>
                        <span class="font-bold">Phone: </span>01868224098
                      </p>
                      <p>
                        <span class="font-bold">Email : </span>
                        Myearningbdd@gmail.com
                      </p>
                      <p>
                        <span class="font-bold">Office Time : </span>
                        9:00 am - 12:00 pm
                      </p>
                    </div>
                  </div>
                  <div class="p-5">
                    <div class="border-b-2">
                      <h2 class="border-orange-500 border-b-2 w-28 text-slate-900 font-bold">
                        Usefull Links
                      </h2>
                    </div>
                    <div class="space-y-2 my-3">
                      <a href="about.html"><p>About Us</p></a>
                      <a href="privacy.html"><p>Privacy Policy</p></a>
                      <p>Terms & Service</p>
                      <p>Return Policy</p>
                      <p>How It Works</p>
                    </div>
                  </div>
                  <div class="p-5">
                    <div class="border-b-2">
                      <h2 class="border-orange-500 border-b-2 w-28 text-slate-900 font-bold">
                        Newsletter
                      </h2>
                    </div>
                    <div class="space-y-2 my-3">
                      <form action="subcribe.php">
                        <input type="email" name="email" class="border-2 py-3 w-full px-5"
                          placeholder="Enter Your Email " />
                        <input type="submit" value="Subscribe"
                          class="w-full rounded-md text-center text-white bg-orange-600 py-3" />
                      </form>
                      <p class="text-sm text-slate-400">Subscribe to our Newsletter to receive early discount offers,
                        latest news, sales and promo information.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- footer -->
  <div class="bg-black">
    <div class="max-w-[2530px] mx-auto xl:px-20 md:px-10 sm:px-2 px-4">
      <div class="">
        <div class="flex flex-col justify-center items-center  text-white py-10">
          <h2 class="text-2xl mb-5">MyEarningBD</h2>
          <div class="space-x-5 text-2xl">
            <a href="https://www.facebook.com/profile.php?id=61554386581165">
              <button class="text-blue-500">
                <i class="fa-brands fa-facebook"></i>
              </button>
            </a>
            <a href="https://t.me/myearningbd22">
              <button class="text-sky-500">
                <i class="fa-brands fa-telegram"></i>
              </button>
            </a>
            <a href="https://wa.me/8801948228789">
              <button class="text-green-500">
                <i class="fa-brands fa-whatsapp"></i>
              </button>
            </a>
          </div>
        </div>
        <div class="pb-5">
          <p class="text-white text-sm text-center">
            © 2023 Copyright: MyEarningBD
          </p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>