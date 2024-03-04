<?php
session_start();
require 'dbconnect.php';
if (!isset($_SESSION['islogin'])) {
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.11/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script> -->
    
    <!-- ========================================================= -->
    <link href="../assets/full.min.css" rel="stylesheet" type="text/css" />
    <script src="../assets/script.js"></script>
    <!-- ========================================================= -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <!-- sidenav start for small device -->
    <div class="drawer z-10 sm:block lg:hidden">
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <label for="my-drawer" class=" drawer-button"><i class="fa-solid fa-bars text-xl ml-1 mt-1"></i></label>
        </div>
        <div class="drawer-side">
            <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
            <section class="w-[50%]  bg-slate-100 p-2 fixed overflow-y-auto ">
                <div class="font-bold mt-20">
                    <div class="text-center">
                        <img class="rounded-full w-[180px] mx-auto p-5" src="profile.png" alt="loading">
                        <h1 class=" text-center mb-3"><span class="bg-green-600 text-white p-1 rounded "> ADMIN </span>
                        </h1>

                    </div>

                    <div class="ml-5 mt-5 text-sm text-gray-500 space-y-5">
                        <hr>
                        <a href='dashboard.php?q=all'>
                            <h1>@- All Users</h1>
                        </a>
                        <a href='dashboard.php?q=active'>
                            <h1>@- Active Users</h1>
                        </a>
                        <a href='dashboard.php?q=pp'>
                            <h1>@- Pending Users</h1>
                        </a>
                        <hr>
                        <a href='dashboard.php?q=p_d'>
                            <h1>@- Pending Deposite</h1>
                        </a>
                        <a href='dashboard.php?q=s_d'>
                            <h1>@- Success deposite</h1>
                        </a>
                        <a href='dashboard.php?q=a_d'>
                            <h1>@- All Deposite</h1>
                        </a>
                        <hr>
                        <a href='dashboard.php?q=p_w'>
                            <h1>@- Pending Withdraw</h1>
                        </a>
                        <a href='dashboard.php?q=s_w'>
                            <h1>@- Success Withdraw</h1>
                        </a>
                        <a href='dashboard.php?q=a_w'>
                            <h1>@- All Withdraw</h1>
                        </a>
                        <hr>
                        <a href='counter.php'>
                            <h1>@- Counter</h1>
                        </a>
                        <hr>
                        <div>
                            <a href="logout.php"><button
                                    class="bg-gray-200 py-2 px-5 rounded text-lg font-semibold my-5"><i
                                        class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button></a>
                        </div>


                    </div>
                </div>

            </section>
        </div>
    </div>
    <!-- sidenav end for small device -->

    <!-- sidenav start for large  device -->

    <div class="flex">
        <section class="w-[25%] h-full hidden bg-slate-100 p-2 fixed overflow-y-auto sm:hidden md:hidden lg:block">
            <div class="text-center">
                <img class="rounded-full w-[180px] mx-auto p-5" src="profile.png" alt="loading">
                <h1 class=" text-center mb-3"><span class="bg-green-600 text-white p-1 rounded "> ADMIN </span></h1>

            </div>
            <div class="font-bold mt-20">

                <div class="ml-5 mt-5 text-gray-500 space-y-5">
                    <hr>
                    <a href='dashboard.php?q=all'>
                        <h1>@- All Users</h1>
                    </a>
                    <a href='dashboard.php?q=active'>
                        <h1>@- Active Users</h1>
                    </a>
                    <a href='dashboard.php?q=pp'>
                        <h1>@- Pending Users</h1>
                    </a>
                    <hr>
                    <a href='dashboard.php?q=p_d'>
                        <h1>@- Pending Deposite</h1>
                    </a>
                    <a href='dashboard.php?q=s_d'>
                        <h1>@- Success deposite</h1>
                    </a>
                    <a href='dashboard.php?q=a_d'>
                        <h1>@- All Deposite</h1>
                    </a>
                    <hr>
                    <a href='dashboard.php?q=p_w'>
                        <h1>@- Pending Withdraw</h1>
                    </a>
                    <a href='dashboard.php?q=s_w'>
                        <h1>@- Success Withdraw</h1>
                    </a>
                    <a href='dashboard.php?q=a_w'>
                        <h1>@- All Withdraw</h1>
                    </a>
                    <hr>
                    <a href='counter.php'>
                        <h1>@- Counter</h1>
                    </a>
                    <hr>
                    <div>
                        <a href="logout.php"><button class="bg-gray-200 py-2 px-5 rounded text-lg font-semibold my-5"><i
                                    class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button></a>
                    </div>


                </div>
            </div>

        </section>
        <!-- sidenav end for large device-->

        <!-- main content start -->
        <div class="sm:w-full sm:ml-auto sm:px-10 md:px-10 lg:flex-1 lg:ml-[25%] lg:px-10 pt-1">


            <!--all users 
            <section class="min-h-screen">
                <h1 class="text-xl text-center">All Users</h1>
                <div class="bg-orange-200 flex justify-around p-10 rounded-2xl">
                    <div>
                        <h1>Active</h1>
                        <h1>132</h1>
                    </div>
                    <div>
                        <input class="bg-white px-2 py-1 w-[70%]" placeholder="Search" type="text">
                        <button class="bg-blue-400 px-2 py-1 text-white">Search</button>
                    </div>
                    <select class="px-5 py-1" name="" id="">
                        <option value="all">All</option>
                    </select>
                </div>

                <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead>
                            <tr class="bg-blue-500  text-white">
                                <th class="p-7">648</th>
                                <th>Email</th>
                                <th>Details</th>
                                <th>Account Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-red-500  text-white">
                                <th>1</th>
                                <td>shaon1234@gmail.com</td>
                                <td><button class="bg-yellow-300 px-5 py-3 " style='color:black'>Edit</button></td>
                                <td><button>Approved</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            -->

            <?php
            $q = "";
            $title = "";
            $sql = "";
            $xx = 0;
            // a_w, p_w, s_w, count, a_d, p_d, s_d, active, all
            if (isset($_REQUEST['q'])) {
                $q = $_REQUEST['q'];
                if ($q == 'active') {
                    if (isset($_REQUEST['search'])) {
                        $xxx = $_REQUEST['search'];
                        $title = "Active User for $xxx";
                        $sql = "SELECT * FROM users WHERE status = 'Approved' AND email='$xxx'";
                    } else {
                        $title = "Active User";
                        $sql = "SELECT * FROM users WHERE status = 'Approved'";
                    }
                    $xx = 0;
                } else if ($q == 'pp') {
                    if (isset($_REQUEST['search'])) {
                        $xxx = $_REQUEST['search'];
                        $title = "Pending  for $xxx";
                        $sql = "SELECT * FROM users WHERE status = 'Pending' AND email='$xxx'";
                    } else {
                        $title = "Pending user";
                        $sql = "SELECT * FROM users WHERE status = 'Pending'";
                    }
                    $xx = 1;
                } else if ($q == 'a_w') {
                    if (isset($_REQUEST['search'])) {
                        $xxx = $_REQUEST['search'];
                        $title = "Withdrew  for $xxx";
                        $sql = "SELECT * FROM withdrew WHERE email='$xxx'";
                    } else {
                        $title = "All Withdrew";
                        $sql = "SELECT * FROM withdrew";
                    }
                    $xx = 1;
                } else if ($q == 'a_d') {
                    if (isset($_REQUEST['search'])) {
                        $xxx = $_REQUEST['search'];
                        $title = "Deposit for $xxx";
                        $sql = "SELECT * FROM deposit WHERE email='$xxx'";

                    } else {
                        $title = "All Deposit";
                        $sql = "SELECT * FROM deposit";
                    }
                    $xx = 2;
                } else if ($q == 'p_w') {
                    if (isset($_REQUEST['search'])) {
                        $xxx = $_REQUEST['search'];
                        $title = "Pending Withdrew for $xxx";
                        $sql = "SELECT * FROM withdrew  WHERE status = 'Pending' AND email='$xxx'";

                    } else {
                        $title = "Pending Withdrew";
                        $sql = "SELECT * FROM withdrew  WHERE status = 'Pending'";
                    }
                    $xx = 1;
                } else if ($q == 'p_d') {
                    if (isset($_REQUEST['search'])) {
                        $xxx = $_REQUEST['search'];
                        $title = "Pending Deposit for $xxx";
                        $sql = "SELECT * FROM deposit  WHERE status = 'Pending' AND email='$xxx'";

                    } else {
                        $title = "Pending Deposit";
                        $sql = "SELECT * FROM deposit  WHERE status = 'Pending'";
                    }
                    $xx = 2;
                } else if ($q == 's_w') {
                    if (isset($_REQUEST['search'])) {
                        $xxx = $_REQUEST['search'];
                        $title = "Success Withdrew for $xxx";
                        $sql = "SELECT * FROM withdrew WHERE status = 'Approved' AND email='$xxx'";

                    } else {
                        $title = "Success Withdrew";
                        $sql = "SELECT * FROM withdrew WHERE status = 'Approved'";
                    }
                    $xx = 1;
                } else if ($q == 's_d') {
                    if (isset($_REQUEST['search'])) {
                        $xxx = $_REQUEST['search'];
                        $title = "Success Deposit for $xxx";
                        $sql = "SELECT * FROM deposit WHERE status = 'Approved' AND email='$xxx'";

                    } else {
                        $title = "Success Deposit";
                        $sql = "SELECT * FROM deposit WHERE status = 'Approved'";
                    }
                    $xx = 2;
                } else { //all user
                    if (isset($_REQUEST['search'])) {
                        $xxx = $_REQUEST['search'];
                        $title = "$xxx User";
                        $sql = "SELECT * FROM users WHERE email='$xxx'";
                    }else if(isset($_REQUEST['ref_code'])){
                        $xxx = $_REQUEST['ref_code'];
                        $title = "user by $xxx";
                        $sql = "SELECT * FROM users WHERE ot_ref_code='$xxx'";
                    } else {
                        $title = "All User";
                        $sql = "SELECT * FROM users";
                    }
                    $xx = 0;
                }
            } else {
                $title = "All User";
                $sql = "SELECT * FROM users";
                $xx = 0;
            }


            echo "<h1 class='text-xl text-center'><b>$title</b></h1>";

            $query = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($query);
            show_html($xx, $q, $count, $query);

            ?>



            <!-- deposite 
            <section class="min-h-screen">
                <h1 class="text-xl text-center">Deposite</h1>
                <div class="bg-orange-200 flex justify-around p-10 rounded-2xl">
                    <div>
                        <h1>Active</h1>
                        <h1>132</h1>
                    </div>
                    <div>
                        <input class="bg-white px-2 py-1 w-[70%]" placeholder="Search" type="text">
                        <button class="bg-blue-400 px-2 py-1 text-white">Search</button>
                    </div>
                    <select class="px-5 py-1" name="" id="">
                        <option value="all">All</option>
                    </select>
                </div>

                <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead>
                            <tr class="bg-blue-500  text-white">
                                <th class="p-7">648</th>
                                <th>Email</th>
                                <th>Details</th>
                                <th>Account Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-green-500  text-white">
                                <th>1</th>
                                <td>shaon1234@gmail.com</td>
                                <td><button class="bg-yellow-300 px-5 py-3 ">Edit</button></td>
                                <td><button>Approved</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            -->
            <!-- withdraw 
            <section class="min-h-screen">
                <h1 class="text-xl text-center">withdraw</h1>
                <div class="bg-orange-200 flex justify-around p-10 rounded-2xl">
                    <div>
                        <h1>Active</h1>
                        <h1>132</h1>
                    </div>
                    <div>
                        <input class="bg-white px-2 py-1 w-[70%]" placeholder="Search" type="text">
                        <button class="bg-blue-400 px-2 py-1 text-white">Search</button>
                    </div>
                    <select class="px-5 py-1" name="" id="">
                        <option value="all">All</option>
                    </select>
                </div>

                <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead>
                            <tr class="bg-blue-500  text-white">
                                <th class="p-7">648</th>
                                <th>Email</th>
                                <th>Details</th>
                                <th>Account Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-green-500  text-white">
                                <th>1</th>
                                <td>shaon1234@gmail.com</td>
                                <td><button class="bg-yellow-300 px-5 py-3 ">Edit</button></td>
                                <td><button>Approved</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            -->
        </div>
    </div>


</body>

</html>


<?php
function show_html($par, $q, $count, $query)
{
    if ($par == 0) { //for users?>

        <section class="min-h-screen">
            <br>
            <div class="bg-orange-200 flex justify-around p-10 rounded-2xl">
                <h1 style="color:black">Count -
                    <?php echo $count; ?>
                </h1>
                <div>
                    <form method='get' action=''>
                        <input type="hidden" value="<?php echo $q; ?>" name="q">
                        <input class="bg-white px-2 py-1 w-[70%]" placeholder="Search by Email" type="email" name="search"
                            required>
                        <input type='submit' class="bg-blue-400 px-2 py-1 text-white">
                    </form>
                    <br>
                    <form method='get' action=''>
                        <input type="hidden" value="<?php echo $q; ?>" name="q">
                        <input class="bg-white px-2 py-1 w-[70%]" placeholder="Search by refer" type="number" name="ref_code"
                            required>
                        <input type='submit' class="bg-blue-400 px-2 py-1 text-white">
                    </form>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="table table-zebra">
                    <thead>
                        <tr class="bg-blue-500  text-white">
                            <th class="p-7">NO.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Details</th>
                        </tr>
                        <br>
                    </thead>
                    <?php
                    if ($count <= 0) {
                        echo "<h1 style='color:red'>No Data Found</h1> <br>";
                    } else {
                        $serial = 1;
                        while ($row = mysqli_fetch_assoc($query)) {
                            $ema = $row['email'];
                            $nam = $row['name'];
                            $sta = $row['status'];
                            ?>


                            <tbody>
                                <tr class="<?php if ($sta == 'Approved')
                                    echo 'bg-green-500';
                                else
                                    echo 'bg-red-500'; ?>  text-white">
                                    <th>
                                        <?php echo $serial; ?>
                                    </th>
                                    <td>
                                        <?php echo $nam; ?>
                                    </td>
                                    <td>
                                        <?php echo $ema; ?>
                                    </td>
                                    <td>
                                        <?php if ($sta == 'Approved') {
                                            echo "Approved";
                                        } else {
                                            echo "Pending";
                                        } ?>
                                    </td>
                                    <td><a href="details.php?e=<?php echo $ema; ?>"><button class="bg-yellow-300 px-5 py-3 "
                                                style='color:black'>Details</button></a></td>

                                </tr>
                            </tbody>


                            <?php
                            $serial++;
                        }
                    } ?>
                </table>
            </div>
        </section>

    <?php } else if ($par == 1) { //for withdrew?>


            <section class="min-h-screen">
                <br>
                <div class="bg-orange-200 flex justify-around p-10 rounded-2xl">
                    <h1 style="color:black">Count -
                    <?php echo $count; ?>
                    </h1>
                    <div>
                        <form method='get' action=''>
                            <input type="hidden" value="<?php echo $q; ?>" name="q">
                            <input class="bg-white px-2 py-1 w-[70%]" placeholder="Search by Email" type="email" name="search"
                                required>
                            <input type='submit' class="bg-blue-400 px-2 py-1 text-white">
                        </form>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead>
                            <tr class="bg-blue-500  text-white">
                                <th class="p-7">NO.</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Time</th>
                                <th>Details</th>
                            </tr>
                            <br>
                        </thead>
                        <?php
                        if ($count <= 0) {
                            echo "<h1 style='color:red'>No Data Found</h1> <br>";
                        } else {
                            $serial = 1;
                            while ($row = mysqli_fetch_assoc($query)) {
                                $id_w = $row['id'];
                                $ema = $row['email'];
                                $pho = $row['phone'];
                                $sta = $row['status'];
                                $time = $row['time'];
                                ?>


                                <tbody>
                                    <tr class="<?php if ($sta == 'Approved')
                                        echo 'bg-green-500';
                                    else
                                        echo 'bg-red-500'; ?>  text-white">
                                        <th>
                                        <?php echo $serial; ?>
                                        </th>
                                        <td>
                                        <?php echo $ema; ?>
                                        </td>
                                        <td>
                                        <?php echo $pho; ?>
                                        </td>
                                        <td>
                                        <?php if ($sta == 'Approved') {
                                            echo "Approved";
                                        } else {
                                            echo "Pending";
                                        } ?>

                                        </td>
                                        <td>
                                        <?php echo $time; ?>
                                        </td>
                                        <td><a href="details_with.php?id_w=<?php echo $id_w; ?>"><button class="bg-yellow-300 px-5 py-3 "
                                                    style='color:black'>Details</button></a></td>

                                    </tr>
                                </tbody>
                                <?php
                                $serial++;
                            }
                        } ?>



                    </table>
                </div>
            </section>


    <?php } else { //for deposite ?>

            <section class="min-h-screen">
                <br>
                <div class="bg-orange-200 flex justify-around p-10 rounded-2xl">
                    <h1 style="color:black">Count -
                    <?php echo $count; ?>
                    </h1>
                    <div>
                        <form method='get' action=''>
                            <input type="hidden" value="<?php echo $q; ?>" name="q">
                            <input class="bg-white px-2 py-1 w-[70%]" placeholder="Search by Email" type="email" name="search"
                                required>
                            <input type='submit' class="bg-blue-400 px-2 py-1 text-white">
                        </form>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead>
                            <tr class="bg-blue-500  text-white">
                                <th class="p-7">NO.</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>TRX ID</th>
                                <th>Status</th>
                                <th>Time</th>
                                <th>Details</th>
                            </tr>
                            <br>
                        </thead>
                        <?php
                        if ($count <= 0) {
                            echo "<h1 style='color:red'>No Data Found</h1> <br>";
                        } else {
                            $serial = 1;
                            while ($row = mysqli_fetch_assoc($query)) {
                                $ema = $row['email'];
                                $id_x = $row['id'];
                                $pho = $row['phone'];
                                $sta = $row['status'];
                                $time = $row['time'];
                                $trx = $row['trx_id'];
                                ?>


                                <tbody>
                                    <tr class="<?php if ($sta == 'Approved')
                                        echo 'bg-green-500';
                                    else
                                        echo 'bg-red-500'; ?>  text-white">
                                        <th>
                                        <?php echo $serial; ?>
                                        </th>
                                        <td>
                                        <?php echo $ema; ?>
                                        </td>
                                        <td>
                                        <?php echo $pho; ?>
                                        </td>
                                        <td>
                                        <?php echo $trx; ?>
                                        </td>
                                        <td>
                                        <?php if ($sta == 'Approved') {
                                            echo "Approved";
                                        } else {
                                            echo "Pending";
                                        } ?>

                                        </td>
                                        <td>
                                        <?php echo $time; ?>
                                        </td>
                                        <td><a href="details_dip.php?id_d=<?php echo $id_x; ?>"><button class="bg-yellow-300 px-5 py-3 "
                                                    style='color:black'>Details</button></a></td>

                                    </tr>
                                </tbody>
                                <?php
                                $serial++;
                            }
                        } ?>



                    </table>
                </div>
            </section>

    <?php }
}
?>