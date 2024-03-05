<section>
    <div style="margin-left: 65px;">
        <h1 class="text-4xl font-bold text-center ">Daily spin</h1>
        <div class="flex justify-center items-center bg-cover bg-center ">
            <div class="mainbox" id="mainbox">
                <div class="box" id="box">

                    <div class="box1">
                        <span class="font span1">
                            <center>
                                <h5><b>Lucky</b></h5>
                            </center>
                        </span>
                        <span class="font span2">
                            <center>
                                <h5><b>Lucky</b></h5>
                            </center>
                        </span>
                        <span class="font span3">
                            <center>
                                <h5><b>Lucky</b></h5>
                            </center>
                        </span>
                        <span class="font span4">
                            <center>
                                <h5><b>Lucky</b></h5>
                            </center>
                        </span>
                        <span class="font span5">
                            <center>
                                <h5><b>Lucky</b></h5>
                            </center>
                        </span>
                    </div>
                    <div class="box2">
                        <span class="font span1">
                            <center>
                                <h5><b>Lucky</b></h5>
                            </center>
                        </span>
                        <span class="font span2">
                            <center>
                                <h5><b>Lucky</b></h5>
                            </center>
                        </span>
                        <span class="font span3">
                            <center>
                                <h5><b>Lucky</b></h5>
                            </center>
                        </span>
                        <span class="font span4">
                            <center>
                                <h5><b>Lucky</b></h5>
                            </center>
                        </span>
                        <span class="font span5">
                            <center>
                                <h5><b>Lucky</b></h5>
                            </center>
                        </span>
                    </div>
                    <button class="spin" onclick="spin()"><b>SPIN</b></button>

                </div>
            </div>
        </div>
        <audio class="hidden" controls="controls" id="hoory" src="assets/hoory.mp3" type="audio/mp3"></audio>
        <audio class="hidden" controls="controls" id="wheel" src="assets/wheel.mp3" type="audio/mp3"></audio>

        <center>
            <h1>Timer</h1>
            <p id="countdown"></p>
        </center>

    </div>

    <script>
        // লক্ষ্যমূলক সময় তৈরি
        const targetD = new Date(<?php echo json_encode($targetDate); ?>);

        var isAvailable = false;

        // ২৪ ঘণ্টা যোগ করা
        targetD.setHours(targetD.getHours() + 24);

        targetDate = targetD.getTime();


        // ইন্টারভাল নির্ধারণ
        const interval = 1000;

        // কাউন্টডাউন এর ফাংশন
        function updateCountdown() {
            const currentDate = new Date().getTime();
            const difference = targetDate - currentDate;

            if (difference <= 0) {
                // লক্ষ্যমূলক সময় এর পূর্ণ হয়ে গিয়েছে
                document.getElementById("countdown").innerHTML = "You can spin now..!";
                isAvailable = true;
            } else {
                // বাকি সময় ক্যালকুলেট করুন
                //const days = Math.floor(difference / (1000 * 60 * 60 * 24));
                const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((difference % (1000 * 60)) / 1000);

                // সময় প্রদর্শন করুন
                document.getElementById("countdown").innerHTML = `${hours} ঘণ্টা ${minutes} মিনিট ${seconds} সেকেন্ড বাকি আছে  !! `;
            }
        }

        // ইন্টারভাল এর সাহায্যে প্রতিস্থানে বা যে কোন পয়েন্টে count down আপডেট করুন
        setInterval(updateCountdown, interval);

        // পৃষ্ঠার লোড হলে ইউজারের তথ্য দেখানো
        updateCountdown();

        function spin() {
            if (isAvailable) {
                wheel.play();

                const box = document.getElementById("box");
                const element = document.getElementById("mainbox");

                box.style.setProperty("transition", "all ease 5s");
                box.style.transform = "rotate(5000deg)";
                element.classList.remove("animate");

                setTimeout(function () {
                    element.classList.add("animate");
                }, 5000);

                setTimeout(function () {		//alert
                    hoory.play();

                    var numbers = [7, 7, 7, 9, 9, 9, 8, 8, 11, 10, 6, 12];
                    // var numbers = [6, 7, 8, 8, 8, 8, 9, 10, 11, 12];
                    //7,6,5,6,5,6,5,6,5
                    //
                    var randomIndex = Math.floor(Math.random() * numbers.length);

                    //===========
                    Swal.fire({
                        title: "Congrass...!",
                        text: "you have won " + numbers[randomIndex] + " TAKA!",
                        icon: "success"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "spin.php?number=" + numbers[randomIndex];
                            hoory.pause();
                        }
                    });
                    //===========
                    wheel.pause();
                }, 5000);

                setTimeout(function () {
                    box.style.setProperty("transition", "initial");
                    box.style.transform = "rotate(90deg)";
                }, 5000);
            } else {
                Swal.fire({
                    title: "Not Available!",
                    text: "you have already spin one times , please wait some hours.. ",
                    icon: "error"
                })
            }

        }
    </script>
</section>