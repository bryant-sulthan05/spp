<?php
$title = 'Transaksi';
include 'views/layout/meta.php';
include 'app/session.php';
include 'Model/Transaction.php';

?>
<style>
    #payment_history {
        background-color: #ffca0d;
        color: #212529;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include 'views/layout/sidebar.php'; ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-md-4" style="margin-bottom: 100px;">
                <div class="row justify-content-center mt-3">
                    <div class="col-md-6">
                        <a href="index.php?page=daftar_siswa" class="btn fw-bold mb-3" style="background-color: #ffca0d; color:#212529;"><span class="bi bi-backspace">&nbsp;Kembali</span></a>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex justify-content-center">
                                        <h4 class="fw-bold">Bayar</h4>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="nis" class="fw-bold">NIS :</label>
                                        <input type="text" name="nis" id="nis" class="form-control" value="<?= number_format($stdn['nis'], 0, ".", ".") ?>" readonly>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="nama" class="fw-bold">Nama :</label>
                                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $stdn['firstname'] . " " . $stdn['lastname'] ?>" readonly>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="kelas" class="fw-bold">Kelas :</label>
                                        <input type="text" name="kelas" id="kelas" class="form-control" value="<?= $stdn['classroom'] . " " . $stdn['major'] ?>" readonly>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="t_ajaran" class="fw-bold">Tahun ajaran :</label>
                                        <select name="t_ajaran" id="t_ajaran" class="form-control">
                                            <option value="">pilih tahun ajaran</option>
                                            <?php
                                            $spp_id = 0;
                                            $t_ajaran = "";
                                            $nominal = "";
                                            $_tahun = $con->query("SELECT * FROM spp");
                                            foreach ($_tahun as $_t) {
                                                if ($bulan == $_t['spp_id']) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
                                            ?>
                                                <option value="<?= $_t['spp_id'] ?>" <?= $selected ?>> <?= $_t['tahun_ajaran'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="bulan" class="fw-bold">Bulan :</label>
                                        <select name="bulan" id="bulan" class="form-control" required>
                                            <option value="">pilih bulan</option>
                                            <?php
                                            $y = date("Y");
                                            $d = date("m");
                                            $id_bulan = 0;
                                            $bulan = "";
                                            $Months = $con->query("SELECT * FROM months WHERE month_id NOT IN (SELECT month_id FROM transactions WHERE student_id = '$stdn[student_id]' AND spp_id = '$_POST[t_ajaran]')");
                                            foreach ($Months as $m) {
                                                if ($bulan == $m['month_id']) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
                                            ?>
                                                <option value="<?= $m['month_id'] ?>" <?= $selected ?>> <?= $m['bulan'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="nominal" class="fw-bold">Biaya perbulan :</label>
                                        <span name="nominal" id="nominal" class="form-control">Rp.0</span>
                                        <input type="hidden" name="nom" id="nom">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="total" class="fw-bold">Biaya transaksi :</label>
                                        <input type="number" name="total" id="total" class="form-control" placeholder="Masukkan biaya transaksi" required>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <input type="text" name="id" id="id" value="<?= $stdn['student_id'] ?>" class="d-none">
                                        <button type="submit" name="bayar_spp" id="bayar_spp" class="btn btn-success fw-bold">Bayar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $("#t_ajaran").click(function() {
                            $.ajax({
                                url: 'views/admin/spp.php',
                                type: 'post',
                                data: {
                                    spp_id: $("#t_ajaran").val()
                                },
                                dataType: "JSON",
                                success: function(data) {
                                    $(".form-group").show();
                                    $("#nominal").text(data.nominal);
                                    let nominal = parseInt($('span[name="nominal"]').html())
                                    let total = nominal

                                    $('#nominal').html(total)
                                    document.querySelector('#nom').value = total
                                }
                            });
                        });
                    });
                </script>
            </main>
        </div>
    </div>
</body>