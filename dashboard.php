<?php
session_start();

$email = "";
$is_login = false;
$ref_count = "0";

if (isset($_SESSION["my_login_mail"])) {
    $email = $_SESSION["my_login_mail"];
    $is_login = true;
} else {
    header("location: login.php");
}
$q = "";
if (isset($_REQUEST["q"])) {
    $q = $_REQUEST["q"];
} else {
    $q = "home";
}
require "dbconnect.php";
$sql = "SELECT * FROM users WHERE email = '$email';";
$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
$name = $row["name"];
$status = $row["status"];
$other_ref = $row["ot_ref_code"];
$my_ref = $row["my_ref_code"];
$join_date = $row["time"];
$balance = $row["balance"];
$t_withdrew = $row["t_withdrew"];
$t_deposite = $row["t_deposite"];
$t_ref = $row["t_ref"];
$targetDate = $row["last_spin"];
$ref_count = $row["t_ref"];

$sql = "SELECT name FROM users WHERE my_ref_code = '$other_ref';";
$rowx = mysqli_fetch_assoc(mysqli_query($conn, $sql));
if ($rowx != null) {
    $x_name = $rowx["name"];
} else {
    $x_name = " ";
}

$referal = "$x_name (" . $other_ref . ")";

//name.name(1234)
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Earning bd | make money online | earning website app</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.8/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script> -->
    
    <!-- ========================================================= -->
    <link href="assets/full.min.css" rel="stylesheet" type="text/css" />
    <script src="assets/script.js"></script>
    <!-- ========================================================= -->
    
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <meta property="og:image" content="assets/images/favicon.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/style.css">
</head>

<body style="display: grid; grid-template-rows: 1fr auto; min-height: 100vh; margin: 0;">
    <main>

        <!-- sidenav start for small device -->
        <div class="drawer z-10 sm:block lg:hidden">
            <input id="my-drawer" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content" style="text-align: right; direction: rtl; margin-right:10px">
                <label for="my-drawer" class="drawer-button"><i class="fa-solid fa-bars text-xl ml-1 mt-1"></i></label>
            </div>
            <div class="drawer-side">
                <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                <section class="w-[75%] h-full  bg-slate-100 p-2 fixed overflow-y-auto sm:hidden md:hidden lg:block">
                    <div>
                        <img class="rounded-full w-[180px] mx-auto p-5" src="assets/images/profile.png" alt="">
                        <h1 class=" text-center mb-3"><span class="bg-green-500 p-1 rounded ">
                                <?php 
                                if($status == "Approved"){
                                    echo "Approved";
                                }else{
                                    echo "Pending";
                                }?>
                            </span></h1>
                    </div>
                    <div class="text-center">
                        <span class="font-bold items-center justify-center">
                            <form action="name.php" method="post">
                                <input name="nn" value='<?php echo $name; ?>' type="text"
                                    class="w-full border-2 border-green-300 rounded p-2 focus:border-blue-500">
                                <input type="submit" value="save"
                                    class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-full mt-1">
                            </form>
                        </span>
                        <h1>
                            <?php echo $email; ?>
                        </h1>
                        <h1><span class="font-semibold">Join date</span>-
                            <?php echo $join_date; ?>
                        </h1>
                        <h1 class="font-bold mt-2">Refered by-</h1>
                        <h1>
                            <?php echo $referal; ?>
                        </h1>
                    </div>
                    <div class="bg-gray-300 rounded-lg my-5">
                        <h1 class="bg-blue-500 text-center text-white rounded-lg p-2">Social Media</h1>
                        <div class="flex justify-around p-5">
                            <i class="fa-brands fa-youtube text-6xl" style="color:red;"></i>
                            <i class="fa-brands fa-telegram text-6xl" style="color: #47dcf0;"></i>
                        </div>

                    </div>
                    <div class="space-y-2 font-semibold">
                        <h1 class="bg-blue-500 text-center mt-5 text-white rounded-lg p-2"><a
                                href="dashboard.php">Dashboard</a></h1>
                        <?php if ($status != "Pending") { ?>
                            <div class="text-md space-y-5 font-normal leading-10" style="font-size: 5vw">
                                <a href="dashboard.php?q=spin">
                                    <h1><i class="fa-solid fa-atom"></i> Daily spin <span
                                            class="bg-green-500 text-xs px-6 rounded">new</span></h1>
                                </a>
                                <a href="launch/">
                                    <h1><i class="fa-solid fa-tag"></i> Lottery <span
                                            class="bg-red-600 text-white text-xs px-6 rounded">Upcoming</span></h1>
                                    <h1><i class="fa-solid fa-user-check"> </i> Pro account <span
                                            class="bg-red-600 text-white text-xs px-6 rounded">Upcoming</span></h1>
                                    <h1><i class="fa-solid fa-briefcase"></i> Micro Job <span
                                            class="bg-red-600 text-white text-xs px-6 rounded">Upcoming</span></h1>
                                    <h1><i class="fa-solid fa-coins"></i> Deliven Earn <span
                                            class="bg-red-600 text-white  text-xs px-6 rounded">Upcoming</span></h1>
                                    <!--============================-->
                                    <h1><i class="fa-solid fa-mug-saucer"></i> leadership <span
                                            class="bg-red-600 text-white  text-xs px-6 rounded">Upcoming</span></h1>
                                    <h1><i class="fa-solid fa-network-wired"></i> refer list <span
                                            class="bg-red-600 text-white  text-xs px-6 rounded">Upcoming</span></h1>
                                    <h1><i class="fa-solid fa-globe"></i> buy plan <span
                                            class="bg-red-600 text-white  text-xs px-6 rounded">Upcoming</span></h1>
                                    <h1><i class="fa-solid fa-landmark"></i> ad money <span
                                            class="bg-red-600 text-white  text-xs px-6 rounded">Upcoming</span></h1>
                                    <h1><i class="fa-solid fa-glasses"></i> help line <span
                                            class="bg-red-600 text-white  text-xs px-6 rounded">Upcoming</span></h1>
                                    <h1><i class="fa-solid fa-address-book"></i> members review <span
                                            class="bg-red-600 text-white  text-xs px-6 rounded">Upcoming</span></h1>
                                    <h1><i class="fa-solid fa-bars-staggered"></i> my bonus <span
                                            class="bg-red-600 text-white  text-xs px-6 rounded">Upcoming</span></h1>
                                    <h1><i class="fa-solid fa-info"></i> about <span
                                            class="bg-red-600 text-white  text-xs px-6 rounded">Upcoming</span></h1>
                                </a>
                                <div class="mt-2 space-y-2">
                                    <a href="dashboard.php?q=with">
                                        <h1><i class="fa-solid fa-coins"></i> Withdraw</h1>
                                    </a>
                                </div>
                                <div class="mt-2 space-y-2">
                                    <a href="dashboard.php?q=w_h">
                                        <h1><i class="fa-solid fa-list-check"></i> withdraw history</h1>
                                    </a>
                                </div>
                                <div class="mt-2 space-y-2">
                                    <a href="dashboard.php?q=d_h">
                                        <h1><i class="fa-solid fa-list-check"></i> deposit history</h1>
                                    </a>
                                </div>
                            </div>
                        <?php } else { ?>

                            <div class="text-lg">
                                <a href="dashboard.php?q=active">
                                    <h1><i class="fa-solid fa-user"></i> Activition </h1>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <div>
                        <a href="logout.php"><button class="bg-gray-200 py-2 px-5 rounded text-lg font-semibold my-5"><i
                                    class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button></a>
                    </div>
                </section>
            </div>
        </div>
        <!-- sidenav end for small device -->
        <!-- userPanel side navbar start -->
        <div class="flex">
            <section
                class="scrollbar-hidden w-[25%] h-full hidden bg-slate-100 p-2 fixed overflow-y-auto sm:hidden md:hidden lg:block">
                <div>
                    <img class="rounded-full w-[180px] mx-auto p-5" src="assets/images/profile.png" alt="">
                    <h1 class=" text-center mb-3"><span class="bg-green-600 text-white p-1 rounded ">
                        <?php 
                            if($status == "Approved"){
                                echo "Approved";
                            }else{
                                echo "Pending";
                            }
                        ?>
                        </span></h1>
                </div>
                <div class="text-center">
                    <span class="font-bold items-center justify-center">
                        <form action="name.php" method="post">
                            <input name="nn" value='<?php echo $name; ?>' type="text"
                                class="w-full border-2 border-green-300 rounded p-2 focus:border-blue-500">
                            <input type="submit" value="save"
                                class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-full mt-1">
                        </form>
                    </span>
                    <h1>
                        <?php echo $email; ?>
                    </h1>
                    <h1><span class="font-semibold">Join date</span>-
                        <?php echo $join_date; ?>
                    </h1>
                    <h1 class="font-bold mt-2">Refered by-</h1>
                    <h1>
                        <?php echo $referal; ?>
                    </h1>
                </div>
                <div class="bg-gray-300 rounded-lg my-5">
                    <h1 class="bg-blue-500 text-center text-white rounded-lg p-2">Social Media</h1>
                    <div class="flex justify-around p-5">
                        <i class="fa-brands fa-youtube text-6xl" style="color:red;"></i>
                        <i class="fa-brands fa-telegram text-6xl" style="color: #47dcf0;"></i>
                    </div>

                </div>
                <div class="space-y-2 font-semibold">
                    <h1 class="bg-blue-500 text-center mt-5 text-white rounded-lg p-2"><a
                            href="dashboard.php">Dashboard</a>
                    </h1>
                    <?php if ($status != "Pending") { ?>
                        <div class="text-lg">
                            <a href="dashboard.php?q=spin">
                                <h1><i class="fa-solid fa-atom"></i> Daily spin
                                    <span class=" bg-green-600 text-white text-xs px-6 rounded">new</span>
                                </h1>
                            </a>
                            <a href="launch/">
                                <h1><i class="fa-solid fa-tag"></i> Lottery
                                    <span class="bg-red-600 text-white text-xs px-6 rounded">Upcoming</span>
                                </h1>
                                <h1><i class="fa-solid fa-user-check"> </i>Pro account
                                    <span class=" bg-red-600 text-white text-xs px-6 rounded">Upcoming</span>
                                </h1>
                                <h1><i class="fa-solid fa-briefcase"></i> Micro Job
                                    <span class=" bg-red-600 text-white text-xs px-6 rounded">Upcoming</span>
                                </h1>
                                <h1><i class="fa-solid fa-coins"></i> Deliven Earn
                                    <span class=" bg-red-600 text-white text-xs px-6 rounded">Upcoming</span>
                                </h1>
                                <!-- ===================================================== -->
                                <h1><i class="fa-solid fa-mug-saucer"></i> leadership <span
                                        class="bg-red-600 text-white  text-xs px-6 rounded">Upcoming</span></h1>
                                <h1><i class="fa-solid fa-network-wired"></i> refer list <span
                                        class="bg-red-600 text-white  text-xs px-6 rounded">Upcoming</span></h1>
                                <h1><i class="fa-solid fa-globe"></i> buy plan <span
                                        class="bg-red-600 text-white  text-xs px-6 rounded">Upcoming</span></h1>
                                <h1><i class="fa-solid fa-landmark"></i> ad money <span
                                        class="bg-red-600 text-white  text-xs px-6 rounded">Upcoming</span></h1>
                                <h1><i class="fa-solid fa-glasses"></i> help line <span
                                        class="bg-red-600 text-white  text-xs px-6 rounded">Upcoming</span></h1>
                                <h1><i class="fa-solid fa-address-book"></i> members review <span
                                        class="bg-red-600 text-white  text-xs px-6 rounded">Upcoming</span></h1>
                                <h1><i class="fa-solid fa-bars-staggered"></i> my bonus <span
                                        class="bg-red-600 text-white  text-xs px-6 rounded">Upcoming</span></h1>
                                <h1><i class="fa-solid fa-info"></i> about <span
                                        class="bg-red-600 text-white  text-xs px-6 rounded">Upcoming</span></h1>
                            </a>
                            <div class="mt-2 space-y-2">
                                <a href="dashboard.php?q=with">
                                    <h1><i class="fa-solid fa-coins"></i>Withdraw</h1>
                                </a>
                            </div>
                            <div class="mt-2 space-y-2">
                                <a href="dashboard.php?q=w_h">
                                    <h1><i class="fa-solid fa-list-check"></i> withdraw history</h1>
                                </a>
                            </div>
                            <div class="mt-2 space-y-2">
                                <a href="dashboard.php?q=d_h">
                                    <h1><i class="fa-solid fa-list-check"></i> deposit history</h1>
                                </a>
                            </div>
                        </div>
                    <?php } else { ?>

                        <div class="text-lg">
                            <a href="dashboard.php?q=active">
                                <h1><i class="fa-solid fa-user"></i> Activition </h1>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div>
                    <a href="logout.php"> <button class="bg-gray-200 py-2 px-5 rounded text-lg font-semibold my-5"><i
                                class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button></a>
                </div>
            </section>
            <!-- userPanel side navbar end -->
            <div class="sm:w-full sm:ml-auto sm:px-10 md:px-10 lg:flex-1 lg:ml-[25%] lg:px-10 pt-1">

                <!-- dashBoard option wise main content start -->



                <?php
                if ($q == "with") {
                    include "includes/with.php";

                } elseif ($q == "spin") {
                    include "includes/spin.php";

                } elseif ($q == "active") {
                    include "includes/active.php";

                } elseif ($q == "w_h") {
                    include "includes/with_his.php";

                } elseif ($q == "d_h") {
                    include "includes/dip_his.php";

                } else {
                    include "includes/main.php";

                } ?>
                <!-- dashBoard option wise main content end -->

            </div>
        </div>

    </main>

    <footer>
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
                            <a href="https://t.me/+-dJ6ZCc4EyxhMWQ1">
                                <button class="text-sky-500">
                                    <i class="fa-brands fa-telegram"></i>
                                </button>
                            </a>
                            <a href="https://wa.me/message/KFX2AKXBM3KLA1">
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

    </footer>

</body>