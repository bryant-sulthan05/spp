<?php
$title = 'Dashboard';
include 'views/layout/meta.php';
include 'app/session.php';
$Year = date("Y");
?>


<body>
    <div class="container-fluid">
        <div class="row">
            <?php include 'views/layout/sidebar.php'; ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-md-4" style="margin-bottom: 100px;">
                <div class="row">
                    <?php
                    $Majors = $con->query("SELECT * FROM majors");
                    foreach ($Majors as $m) {
                        $Students = $con->query("SELECT * FROM students WHERE major_id = '$m[major_id]'");
                        $Count = mysqli_num_rows($Students);
                    ?>
                        <div class="col-md-3">
                            <div class="card" style="height: 150px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="public/img/bg.jpg" width="100%">
                                        </div>
                                        <div class="col-md-6">
                                            <span class="fw-bold text-wrap"><?= $m['major'] ?></span><br>
                                            <span><?= $Count ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <?php
                        $b = date("m");
                        $chart = mysqli_query($con, "SELECT month as monthname, SUM(total) as jumlah FROM transactions JOIN months USING (month_id) WHERE thn_bayar = '$Year' AND month_id <= '$b' GROUP BY month_id");
                        foreach ($chart as $data) {
                            $month[] = $data['monthname'];
                            $jumlah[] = $data['jumlah'];
                        }
                        ?>
                        <style>
                            @media only screen and (max-width: 426px) {
                                .chart-section {
                                    padding: 0px;
                                    margin-top: 20px;
                                }
                            }

                            @media only screen and (min-width: 992px) {
                                .chart-section {
                                    padding: 50px;
                                    margin-top: 0px;
                                }
                            }
                        </style>
                        <div class="table-container">
                            <div class="container w-100 chart-section">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                        <script>
                            const labels = <?= json_encode($month) ?>;
                            const data = {
                                labels: labels,
                                datasets: [{
                                    label: 'Keuangan Tahunan',
                                    data: <?= json_encode($jumlah) ?>,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(255, 159, 64, 0.2)',
                                        'rgba(255, 205, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(201, 203, 207, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgb(255, 99, 132)',
                                        'rgb(255, 159, 64)',
                                        'rgb(255, 205, 86)',
                                        'rgb(75, 192, 192)',
                                        'rgb(54, 162, 235)',
                                        'rgb(153, 102, 255)',
                                        'rgb(201, 203, 207)'
                                    ],
                                    borderWidth: 1
                                }]
                            };
                            const config = {
                                type: 'bar',
                                data: data,
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                },
                            };

                            const myChart = new Chart(
                                document.getElementById('myChart'),
                                config
                            );
                        </script>
                    </div>
                </div>
                <?php if (isset($_SESSION['login']) == 'success') : ?>
                    <script>
                        toastr.success('Login berhasil');
                        toastr.options.progressBar = true;
                    </script>
                <?php
                    unset($_SESSION['login']);
                endif; ?>
            </main>
        </div>
    </div>
</body>