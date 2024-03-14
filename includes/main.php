<section>
    <Marquee class="bg-blue-500 text-white p-3 mt-3">
        আচ্ছালামুয়ালাইকুম - আপনারা My Earning BD প্লাটফর্ম থেকে প্রতি দিন
        ৩০০/৫০০ টাকা ইনকাম করতে পারবেন।
    </Marquee>
    <div class="flex justify-center items-center mt-5">
        <div class="carousel md:w-96 lg:w-[600px] h-[300px] ">
            <div id="slider">
                <div class="slides">
                    <img src="assets/images/s1.png" width="100%" />
                </div>

                <div class="slides">
                    <img src="assets/images/s2.png" width="100%" />
                </div>

                <div class="slides">
                    <img src="assets/images/s3.jpg" width="100%" />
                </div>

                <div class="slides">
                    <img src="assets/images/s2.png" width="100%" />
                </div>

                <div class="slides">
                    <img src="assets/images/s3.jpg" width="100%" />
                </div>

                <div id="dot">
                    <span class="dot"></span><span class="dot"></span><span class="dot"></span><span
                        class="dot"></span><span class="dot"></span>
                </div>
            </div>

            <script type="text/javascript">
                var index = 0;
                var slides = document.querySelectorAll(".slides");
                var dot = document.querySelectorAll(".dot");

                function changeSlide() {
                    if (index < 0) {
                        index = slides.length - 1;
                    }

                    if (index > slides.length - 1) {
                        index = 0;
                    }

                    for (let i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                        dot[i].classList.remove("active");
                    }

                    slides[index].style.display = "block";
                    dot[index].classList.add("active");

                    index++;

                    setTimeout(changeSlide, 2000);
                }

                changeSlide();
            </script>
        </div>
    </div>
    <!-- <div class="bg-green-200 text-green-600 p-10 text-center mt-5">
        <h1>
            200/100 টি রেফার কমপ্লিট হলে আপনার পুরস্কার টি বুঝে নিতে এডমিন
            এর সাথে যোগাযোগ করুন ধন্যবাদ
        </h1>
    </div> -->
    <div class="flex justify-center items-center py-5 text-xl">
        <h2>
            <span>Welcome </span>
            <span class="font-bold text-xl text-blue-500">
                <span>
                    <?php echo $name; ?>
                </span>
            </span>
        </h2>
    </div>
    <?php if ($status != "Pending") { ?>
        <div class="grid md:grid-cols-3 gap-2 text-sm p-20">
            <div class="bg-yellow-500 p-2 border-2 rounded-lg flex justify-between items-center text-white px-10 py-10">
                <div c="flex justify-center items-center gap-1 ">
                    <GiTreeGrowth></GiTreeGrowth>
                    <p class="md:text-xl font-bold">Total Refer:</p>
                </div>
                <h2 class="md:text-xl font-bold text-xl">
                    <?php echo $t_ref; ?>
                </h2>
            </div>
            <div class="bg-blue-500 py-10 flex justify-between items-center rounded-lg px-10 text-white">
                <p class="md:text-xl font-bold">Total Balance:</p>
                <h2 class="md:text-xl font-bold space-x-2">
                    <span class="text-xl">
                        <?php echo $balance; ?> &#2547;
                    </span>
                </h2>
            </div>
            <div class="bg-yellow-500 py-10 text-white rounded-lg flex justify-between items-center px-10">
                <p class="md:text-xl font-bold ">Total Withdraw:</p>

                <div>
                    <h2 class="md:text-xl font-bold space-x-2">
                        <span class="text-xl">
                            <?php echo $t_withdrew; ?> &#2547;
                        </span>
                    </h2>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="bg-[#DCEAF5] pt-10 mt-5 rounded-lg">

        <div class="p-10">
            <?php if ($status != "Pending") { ?>
                <div>
                    <h2 class="text-green-500 text-center text-sm font-extrabold">
                        আপনার নিচে দেয়া রেফার কোড দিয়ে রেফার করলে
                        <span class="text-yellow-700">৪০</span> টাকা রেফার বোনাস
                        পাবেন ।
                    </h2>
                    <p class="text-center mt-3 text-red-500 font-bold">
                        আপনার রেফার কোড ও রেফার লিংক
                    </p>
                    <p class="text-center mt-3 text-red-500 font-bold" id="textToRef">
                        <?php echo $my_ref; ?>
                    </p>
                    <div class="flex justify-center items-center mt-5 gap-5">
                        <button class="bg-orange-500 text-white py-3 px-7" onclick="copyRef()">
                            Copy
                        </button>
                    </div>
                    <p id="textToLink" class="text-center mt-3 text-black-500 font-bold">
                        <?php echo "https://myebd.com/signup.php?ref=" . $my_ref; ?>
                    </p>
                    <div class="flex justify-center items-center mt-5 gap-5">
                        <button class="bg-orange-500 text-white py-3 px-7" onclick="copyText()">
                            Copy
                        </button>
                    </div>

                    <script>

                        function copyText() {
                            // স্ট্রিং সিলেক্ট করুন
                            const textToCopy = document.getElementById("textToLink");
                            const textRange = document.createRange();
                            textRange.selectNode(textToCopy);

                            // ক্লিপবোর্ডে কপি করুন
                            const selection = window.getSelection();
                            selection.removeAllRanges();
                            selection.addRange(textRange);
                            document.execCommand("copy");

                            // সিলেক্টন রিমুভ করুন
                            selection.removeAllRanges();

                            // কপি হয়েছে মেসেজ দেখানো
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Text has been copied!",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                        function copyRef() {
                            // স্ট্রিং সিলেক্ট করুন
                            const textToCopy = document.getElementById("textToRef");
                            const textRange = document.createRange();
                            textRange.selectNode(textToCopy);

                            // ক্লিপবোর্ডে কপি করুন
                            const selection = window.getSelection();
                            selection.removeAllRanges();
                            selection.addRange(textRange);
                            document.execCommand("copy");

                            // সিলেক্টন রিমুভ করুন
                            selection.removeAllRanges();

                            // কপি হয়েছে মেসেজ দেখানো
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Text has been copied!",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    </script>
                </div>
            <?php } else { ?>
                <p class="text-center mt-3 text-red-500 font-bold">
                    আপনার একাউন্ট টি একটিভ নয়। একাউন্ট একটিভ করতে নিচের বাটনে ক্লিক করুন।
                </p>


                <div class="flex justify-center items-center mt-5 gap-5">
                    <button class="bg-orange-500 text-white py-3 px-7">
                        <a href="dashboard.php?q=active">
                            অ্যাকাউন্ট অ্যাক্টিভ করুন
                        </a>
                    </button>
                </div>
            <?php } ?>
            <div>
                <div class="flex justify-center items-center flex-col mt-10 border-2 border-green-500 p-10 rounded-lg">
                    <p class="text-center text-green-500 text-sm font-bold">
                        আমাদের সাথে যোগাযোগ করতে নিচের দেয়া Join এ ক্লিক করুন
                    </p>
                    <p class="text-6xl text-green-500 mt-3">
                        <i class="fa-brands fa-whatsapp" style="color: #56f060;"></i>
                    </p>
                    <a href="https://wa.me/8801948228789">
                        <button class="bg-green-500 text-white py-3 px-7 mt-2">
                            Join Now
                        </button>
                    </a>
                </div>

                <div class="border-2 border-sky-500 mt-5 rounded-lg">
                    <div class="flex flex-col justify-center items-center pb-10 mt-10">
                        <p class="text-center text-sky-500 text-sm font-bold">
                            আমাদের সাথে অফিসিয়াল গ্রুপ এ যোগ দিতে নিচের দেয়া Join এ
                            ক্লিক করুন
                        </p>
                        <p class="mt-5 mb-5 text-6xl text-sky-500">
                            <i class="fa-brands fa-telegram" style="color: #5cc0ff;"></i>
                        </p>
                        <a href="https://t.me/myearningbd22">
                            <button class="bg-sky-500 text-white p-3 px-7">
                                Join Now
                            </button>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>