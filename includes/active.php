<?php
echo "<h1 class='text-4xl font-bold text-center'>Account Activition</h1>";
if (isset($_REQUEST["number"])) {
    $phone = $_REQUEST["number"];
    $trx = $_REQUEST["trx"];
    $method = $_REQUEST["method"];
    $amount = $_REQUEST["amount"];

    $sql = "INSERT INTO deposit ( email, phone, amount, method, trx_id ) VALUES ( '$email', '$phone', '$amount', '$method', '$trx' )";
    $query = mysqli_query($conn, $sql);
    if ($query) { ?>

        <div style='background: green;'>
            <center style="margin-top: 25px; padding-top: 10px;">
                <i class="fa fa-check"></i>
                Successfully Data inserted..
            </center>
        </div>
    <?php }
} else {
    ?>

    <section>
        <div class="bg-blue-500 p-5 rounded-xl">
            <h2 class="text-white text-center mb-5">
                নিচের নগদ নাম্বার টি কপি করে আপনার নগদ অ্যাপ থেকে পাশে উল্লেখিত ফি
                সেন্ড মানি করুন । আপনার পেমেন্ট এর পরিমাণঃ ১০০ টাকা
            </h2>
            <hr />
            <h2 class="text-white text-center mt-5">
                যে মাধ্যমে টাকা পাঠাবেনঃ
            </h2>
            <div class="flex justify-center items-center flex-col">
                <div class="flex gap-10 justify-center">
                    <div class="w-[25%]">
                        <img class="p-5 border rounded-lg mt-5" width={100}
                            src="https://play-lh.googleusercontent.com/Iks014Ul-atatMhWs8rLbtG7cIZLPfpeMDdkLtmq5o7D5_MlFNu5mmIqRHAY45aOhapp"
                            alt="" />
                        <p class="text-white mt-2 text-center">নগদ</p>
                    </div>
                    <div class="w-[25%]">
                        <img class="p-5 border rounded-lg mt-5" width={100}
                            src="https://play-lh.googleusercontent.com/1CRcUfmtwvWxT2g-xJF8s9_btha42TLi6Lo-qVkVomXBb_citzakZX9BbeY51iholWs"
                            alt="" />
                        <p class="text-white mt-2 text-center">বিকাশ</p>
                    </div>
                    <div class="w-[25%]">
                        <img class="p-5 border rounded-lg mt-5" width={100}
                            src="https://play-lh.googleusercontent.com/sDY6YSDobbm_rX-aozinIX5tVYBSea1nAyXYI4TJlije2_AF5_5aG3iAS7nlrgo0lk8"
                            alt="" />
                        <p class="text-white mt-2 text-center">রকেট</p>
                    </div>
                </div>
                <p class="text-white mt-2 text-center">
                    যে নাম্বারে টাকা পাঠাবেন (Send Money)
                <div class="bg-slate-900 text-center p-3 mt-5 flex justify-center items-center gap-2">
                    <p class="text-white">01981164074</p>

                    <button class="text-white">
                        <i class="fa-regular fa-copy"></i>
                    </button>
                </div>
                </p>

            </div>

            <div class="text-white text-center p-5 text-sm">
                <p>
                    উপরের নগদ নাম্বার এ উল্লখিত ফি সেন্ড মানি করার পর নিচের ২ টা খালি
                    ঘর পুরন করুন । ১ম খালি ঘরে আপনার নগদ নাম্বার টি দিন । ২য় ঘরে আপনি
                    ফি সেন্ড মানি করার পর সেন্ড মানি করা মেসেজের ট্রানজেকশন নাম্বার টি
                    কপি এখানে দিন এর পর ভেরিফাই এ ক্লিক করুন ।
                </p>
            </div>
        </div>

        <div
            class="flex justify-center items-center mt-10 bg-[#eee] p-10 rounded-lg shadow-[0_3px_10px_rgb(0,0,0,0.2)] border-blue-500 border">
            <form action="" method="get">
                <div class="text-sm">
                    <div>
                        <label htmlFor="" class="ml-2 text-blue-950 font-extrabold">
                            আপনি কোন মাধ্যমে টাকা পাঠিয়েছেন *
                        </label>
                        <select class="border w-full p-3 mt-2" name="method" id="">
                            <option value="bkash">বিকাশ</option>
                            <option value="nagat">নগদ</option>
                            <option value="rocket">রকেট</option>
                        </select>
                    </div>
                    <div class="mt-5">
                        <label htmlFor="" class="ml-2 text-blue-950 font-extrabold">
                            আপনি কোন নাম্বার থেকে টাকা পাঠিয়েছেন *
                        </label>
                        <input type="number" name="number" class="border w-full p-3 mt-2" profile="Enter Your Number"
                            required />

                        <input name="q" value="active" hidden>
                    </div>
                    <div class="mt-5">
                        <label htmlFor="" class="ml-2 text-blue-950 font-extrabold">
                            কত টাকা ডিপোজিট করেছেন *
                        </label>
                        <select name="amount" class="border w-full p-5" required>
                            <option value="100">৳100</option>
                            <option value="200">৳200</option>
                            <option value="400">৳400</option>
                            <option value="500">৳500</option>
                            <option value="1000">৳1000</option>
                        </select>
                    </div>
                    <div class="mt-5">
                        <label htmlFor="" class="ml-2 text-blue-950 font-extrabold">
                            ট্রানজেকশন নাম্বার টি দিন *
                        </label>
                        <input type="transaction" name="trx" class="border w-full p-3 mt-2" profile="Transaction number"
                            required />
                    </div>
                    <input type="submit"
                        class="border w-full p-5 bg-blue-500 text-white rounded-lg mt-5 font-bold cursor-pointer"
                        value="Request" />
                </div>
            </form>
        </div>
    </section>

    <?php
}
?>