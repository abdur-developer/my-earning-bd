<?php
if(isset($_REQUEST['amount'])){
    //session_start();
    $email = $_SESSION['my_login_mail'];

    $amount = $_REQUEST['amount'];
    $method = $_REQUEST['method'];
    $number = $_REQUEST['number'];

    //for get total balance and withdrew
    $sql_q = "SELECT t_ref, balance, t_withdrew  FROM users WHERE email = '$email'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql_q));

    $total_refer = $row['t_ref'];
    $current_blance = $row['balance'];
    //echo $current_blance;echo "<br>";
    if($current_blance >= $amount){

        if($total_refer >= 2){
            //for insert in withdrew
            $sql = "INSERT INTO withdrew (email, phone, amount, method) VALUES ('$email', '$number', '$amount', '$method')";
            if(mysqli_query($conn, $sql)){
                
                $current_blance -= $amount;
                $amount += $row['t_withdrew'];
                //for update total balance and withdrew
                $sql = "UPDATE users SET t_withdrew = '$amount', balance = '$current_blance' WHERE email = '$email'";
                if(mysqli_query($conn, $sql)){
                    echo "<script>Swal.fire({
                        title: 'Congrass...!',
                        text: 'withdew success please wait few hour',
                        icon: 'success'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'dashboard.php';
                        }
                    });</script>";
                }
            }
        }else{
            echo "<script>Swal.fire({
                title: 'Opps...!',
                text: 'you must refer at least 2',
                icon: 'error'
            });</script>";
        }

    }else{
        echo "<script>Swal.fire({
            title: 'Opps...!',
            text: 'you have not enough balance',
            icon: 'error'
        });</script>";
    }
}
?>
<section>
    <div>
        <h2 class="text-2xl text-center font-bold">Withdraw</h2>
    </div>
    <div
        class="bg-blue-500  text-xl p-10 text-white shadow-[rgba(6,_24,_44,_0.4)_0px_0px_0px_2px,_rgba(6,_24,_44,_0.65)_0px_4px_6px_-1px,_rgba(255,_255,_255,_0.08)_0px_1px_0px_inset] rounded-lg mt-5">
        <p class="text-center">Balance</p>
        <h2 class="text-center font-bold">
            <?php echo $balance; ?>
        </h2>
    </div>
    <div
        class="bg-blue-500 shadow-[rgba(6,_24,_44,_0.4)_0px_0px_0px_2px,_rgba(6,_24,_44,_0.65)_0px_4px_6px_-1px,_rgba(255,_255,_255,_0.08)_0px_1px_0px_inset] text-sm p-10 text-white rounded-lg mt-5">
        আপনি যে নাম্বার এ টাকা নিবেন অবশ্যই সেটা বিকাশ অথবা নগদ personal number
        হতে হবে
    </div>

    <div>
        <div
            class="bg-gray-200 p-5 mt-5 rounded-xl shadow-[rgba(6,_24,_44,_0.4)_0px_0px_0px_2px,_rgba(6,_24,_44,_0.65)_0px_4px_6px_-1px,_rgba(255,_255,_255,_0.08)_0px_1px_0px_inset]">
            <form class="space-y-5" action="" method="post">
                <div class="text-sm">
                    <label htmlFor="" class="ml-2 text-blue-950 font-extrabold">
                        কত টাকা উত্তলন করবেন ?
                    </label>
                    <select name="amount" class="border w-full p-5" required>
                        <option value="200">৳200</option>
                        <option value="500">৳500</option>
                        <option value="1000">৳1000</option>
                    </select>
                </div>
                <div class="text-sm">
                    <label htmlFor="" class="ml-2 text-blue-950 font-extrabold">
                        টাকা কিসের মাধ্যমে নিবেন ?
                    </label>
                    <select name="method" class="border w-full p-5 text-sm" required>
                        <option value="বিকাশ">বিকাশ</option>
                        <option value="নগদ">নগদ</option>
                        <option value="রকেট">রকেট</option>
                    </select>
                </div>
                <div class="text-sm">
                    <label htmlFor="" class="ml-2 text-blue-950 font-extrabold">
                        আপনার নাম্বার দিন
                    </label>
                    <input type="number" name="number" class="border w-full p-5" profile="Enter Your Number" required />
                    <input value="<?php echo $ref_count; ?>" name="tr" hidden/>
                </div>

                <input type="submit" value="Withdraw" class="w-full p-5 text-white bg-blue-500 font-bold" />
            </form>
        </div>
    </div>
</section>