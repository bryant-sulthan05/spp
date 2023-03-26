<?php
if (!isset($_SESSION['siswa'])) :
    $_SESSION['login'] = 'failed';
    header("Location: index.php");
endif;
?>
<style>
    @media only screen and (min-width: 320px) {
        .navbar-nav .nav-link.active {
            color: #ffca0d;
        }
    }

    @media only screen and (min-width: 992px) {

        .navbar-nav .nav-link.active {
            color: #001220;
            border-bottom: #ffca0d solid;
            margin-right: 5px;
            margin-left: 5px;
            font-weight: bold;
        }

        .navbar-nav .nav-link:hover {
            color: #001220;
            border-bottom: #ffca0d solid;
        }
    }
</style>
<nav class="navbar navbar-expand-lg" style="background-color: #fff; box-shadow: 0 0 5px #001220;">
    <div class="container">
        <a class="navbar-brand fw-bold" style="color:#ffca0d;" href="index.php?page=home">SPP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link <?= $pages == 'home' ? 'active' : '' ?>" href="index.php?page=home">Home</a>
                <a class="nav-link <?= $pages == 'histori_pembayaran' ? 'active' : '' ?>" href="index.php?page=histori_pembayaran">History Pembayaran</a>
                <a class="nav-link <?= $pages == 'tagihan' ? 'active' : '' ?>" href="index.php?page=tagihan">Tagihan</a>
                <a class="nav-link px-3 btn fw-bold ms-2" style="background-color: #ffca0d; color: #001220;" href="index.php?page=sign_out">Sign out</a>
            </div>
        </div>
    </div>
</nav>