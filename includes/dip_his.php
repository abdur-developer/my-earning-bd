<?php
$sql = "SELECT * FROM deposit WHERE email = '$email'";
$query = mysqli_query($conn, $sql);
$count = mysqli_num_rows($query);
if ($count <= 0) {
    echo "<center><h1 style='color:red'>No Data Found</h1> </center>";
} else {
    ?>

    <section class="min-h-screen mt-10">
        <h1 class="my-2 text-2xl text-center font-bold">Withdraw History</h1>
        <div class="bg-blue-200 flex justify-around p-10 rounded-2xl">
            <h1>Your Email :
                <?php echo $email; ?>
            </h1>
        </div>

        <div class="overflow-x-auto">
            <table class="table table-zebra">
                <thead>
                    <tr class="bg-cyan-500  text-white">
                        <th>phone</th>
                        <th>amount</th>
                        <th>method</th>
                        <th>trx id</th>
                        <th>Status</th>
                        <th>time</th>
                    </tr>
                </thead>
                <tbody>

                    <?php while ($row = mysqli_fetch_assoc($query)) {

                        $phone = $row["phone"];
                        $amount = $row["amount"];
                        $method = $row["method"];
                        $trx_id = $row["trx_id"];
                        $status = $row["status"];
                        $time = $row["time"];
                        ?>

                        <tr class="bg-green-500  text-white">
                            <th>
                                <?php $phone; ?>
                            </th>
                            <th>
                                <?php $amount; ?>
                            </th>
                            <th>
                                <?php $method; ?>
                            </th>
                            <th>
                                <?php $trx_id; ?>
                            </th>
                            <th>
                                <?php $status; ?>
                            </th>
                            <th>
                                <?php $time; ?>
                            </th>
                        </tr>
                        <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </section>
    <?php
}
?>