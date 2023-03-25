<?php
$title = 'Pembayaran SPP berbasis web';
include 'views/layout/meta.php';

$ProfileSiswa = $con->query("SELECT * FROM students WHERE student_id = '$_SESSION[student_id]'");
$s = mysqli_fetch_assoc($ProfileSiswa);
?>
<style>
    body {
        min-height: 100vh;
    }

    .welcome {
        /* background-image: url("public/img/cardwave.svg"); */
        background-color: #001220;
        background-size: cover;
    }

    @media only screen and (max-width: 320px) {
        .scrap {
            width: 100%;
        }

        h4 {
            font-size: medium;
        }

        .card-text span {
            font-size: small;
        }
    }

    @media only screen and (min-width: 922px) {
        .scrap {
            width: 80%;
        }

        .container.menu {
            width: 80%;
        }
    }
</style>

<body>
    <?php include 'views/layout/navbar.php'; ?>
    <section class="main mt-3 d-flex justify-content-center">
        <div class="container scrap">
            <div class="card welcome">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="fw-bold text-light">Selamat Datang <span style="color: #ffca0d"><?= $s['firstname'] . " " . $s['lastname'] ?></span></h4>
                    </div>
                    <div class="card-text">
                        <span class="text-light">Selamat datang di aplikasi SPP berbasis website</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="menu mt-5">
        <div class="container menu">
            <div class="row d-flex justify-content-center">
                <div class="col-md-3">
                    <div class="card profile p-3" style="box-shadow: 0 0 5px #001220;">
                        <div class="row">
                            <div class="col-md-2">
                                <span class="bi bi-person-circle rounded-circle p-2" style="background-color: #ffe68e; color:#b78d00;"></span>
                            </div>
                            <div class="col-md-10">
                                <span class="fw-bold" style="color: #001220;">Profile</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card profile p-3" style="box-shadow: 0 0 5px #001220;">
                        <div class="row">
                            <div class="col-md-2">
                                <span class="bi bi-receipt rounded-circle p-2" style="background-color: #80ff80; color:#009d00;"></span>
                            </div>
                            <div class="col-md-10">
                                <span class="fw-bold" style="color: #001220;">History Pembayaran</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<!-- <img src="public/img/bottomwave.svg" style="background-repeat:no-repeat; width:100%;"> -->