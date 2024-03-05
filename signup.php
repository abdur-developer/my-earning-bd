<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:image" content="assets/images/favicon.png">
  <title>Sign up | my earning bd</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.12/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script> -->

    <!-- ========================================================= -->
    <link href="assets/full.min.css" rel="stylesheet" type="text/css" />
    <script src="assets/script.js"></script>
    <!-- ========================================================= -->
    
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="style.css">
  
  <meta name="description" content="My earningbd | make money online | best earning platform in bangladesh | (f) refer and earn">
  <meta property="og:image" content="assets/images/favicon.png">
  <meta name="author" content="akram, shihab">
  <meta name="keywords" content="earn money, make money, refer and earn, online income">

</head>

<body>
  <div class="mb-32">
    <div class="bg-nav-color text-sm md:text-base">
      <div class='max-w-[2530px] mx-auto xl:px-20 md:px-10 sm:px-2 px-4'>
        <div class="flex justify-between items-center">
          <div><a href="index.php">
              <button class="cursor-pointer p-4 font-bold flex justify-center items-center text-yellow-500">
                <img src="assets/images/favicon.png" width="50" alt="">
                <p> EarningBD</p>
              </button></a>
          </div>
          <div class="flex md:space-x-10 space-x-3 p-5 text-[10px] md:text-base">
            <Link to="/">
            <button class="font-bold">Home</button>
            </Link>
          </div>
        </div>
      </div>
    </div>

    <div class="max-w-[2530px] mx-auto xl:px-20 md:px-10 sm:px-2 px-4">
      <div>
        <div>
          <h2 class="text-center font-bold mt-5 text-2xl">
            Create A New Account
          </h2>
          <p class="text-center mb-10">
            <Link>
            <span class="text-blue-500 border-b-2 border-b-blue-500">
            </span>
            </Link>
          </p>
        </div>

        <div>
          <form class="space-y-5" name="Form">
            <input type="text" name="name" class="border w-full p-5" placeholder="Enter Your Full Name" required />
            <input type="email" name="email" class="border w-full p-5" placeholder="Enter Your Email" required />
            <input id="password" type="password" name="password" class="border w-full p-5"
              placeholder="Enter Your Password" required />
            <input id="confirm_pass" type="password" name="confirmPassword" class="border w-full p-5"
              placeholder="Confirm Your Password" required onkeyup="validate_password()" />
            <?php
            if (isset($_REQUEST['ref'])) {
              $ref = $_REQUEST['ref'];
              echo "<input
                  type='number'
                  name='referNumber'
                  class='border w-full p-5'
                  value='$ref' readonly />";
            } else { ?>
              <input type='number' name='referNumber' class='border w-full p-5' placeholder='Enter Your Referral Code' />
            <?php } ?>


            <p class="text-center mb-10">
              Already Registered? Please
              <a href="login.php">
                <span class="text-blue-500 border-b-2 border-b-blue-500">
                  Login
                </span>
              </a>
            </p>
            <span id="wrong_pass_alert"></span>
            <button type="button" id="register" name="register" type="submit"
              class="border w-full p-5 bg-[#FFD248] bg-gradient-to-r from-[#ffd248] to-[#f5ba62]  font-bold cursor-pointer"
              value="SignUp"> Register Now</button>
          </form>
        </div>
      </div>
      </Container>
    </div>



    <script>
      function validate_password() {

        var pass = document.getElementById('password').value;
        var confirm_pass = document.getElementById('confirm_pass').value;
        if (pass != confirm_pass) {
          document.getElementById('wrong_pass_alert').style.color = 'red';
          document.getElementById('wrong_pass_alert').innerHTML
            = '☒ একই পাসওয়ার্ড ব্যাবহার করুন';
          document.getElementById('register').disabled = true;
          document.getElementById('register').style.opacity = (0.4);
        } else {
          document.getElementById('wrong_pass_alert').style.color = 'green';
          document.getElementById('wrong_pass_alert').innerHTML =
            '🗹 পাসওয়ার্ড মিলেছে';
          document.getElementById('register').disabled = false;
          document.getElementById('register').style.opacity = (1);
        }
      }
    </script>
    <script type="module">
      

      //----- New Registration code start	  
      document.getElementById("register").addEventListener("click", function () {
        //validing
        var a = document.forms["Form"]["name"].value;
        var b = document.forms["Form"]["email"].value;
        var c = document.forms["Form"]["password"].value;
        var d = document.forms["Form"]["confirmPassword"].value;
        var e = document.forms["Form"]["referNumber"].value;
        if ((a == null || a == "") || (b == null || b == "") || (c == null || c == "") || (d == null || d == "")) {
          Swal.fire({
            icon: "error", title: "Oops...",
            text: "Please Fill In All Required Fields...!"
          });
        } else if (c.length < 6) {
          Swal.fire({
            icon: "error", title: "Oops...",
            text: "please enter at least 6 characters...!"
          });
        } else {
          //======================================================
          //For new registration
          
              location.href = 'signupS.php?name=' + a + '&email=' + b + '&pass=' + c + "&ref=" + e;
            
          //=============================================================================
        }

      });
      //----- End
    </script>


</body>

</html>