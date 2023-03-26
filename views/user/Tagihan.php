<?php
$title = 'Tagihan';
include 'views/layout/meta.php';
include 'Model/Tagihan.php';

$s_id = 0;
$tahun = "";
$tahun_a = $con->query("SELECT * FROM spp");
?>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        min-height: 100vh;
    }
</style>

<body>
    <?php include 'views/layout/navbar.php'; ?>
    <div class="container mt-5">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="d-flex">
                <select name="tahun" id="tahun">
                    <option value="">Pilih tahun ajaran</option>
                    <?php
                    foreach ($tahun_a as $t) {
                        if ($tahun == $t['spp_id']) {
                            $selected = 'selected';
                        } else {
                            $selected = '';
                        }
                    ?>
                        <option value="<?= $t['spp_id'] ?>" <?= $selected ?>><?= $t['tahun_ajaran'] ?></option>
                    <?php } ?>
                </select>
                <button type="submit" name="cari" id="cari" class="btn btn-primary ms-3">Cari</button>
            </div>
        </form>
        <div class="table-container">
            <table class="table table-bordered table-hover" id="DaftarTagihan">
                <thead style="background-color: #ffca0d;" class="fw-bold">
                    <tr>
                        <td>No.</td>
                        <td>Bulan</td>
                        <td>Tahun ajaran</td>
                        <td>Nominal</td>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($_POST['cari'])) : ?>
                        <?php
                        $no = 1;
                        $t_a = $con->query("SELECT * FROM spp WHERE spp_id = '$_POST[tahun]'");
                        $ta = mysqli_fetch_assoc($t_a);
                        foreach ($DaftarTagihan as $dt) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dt['bulan'] ?></td>
                                <td><?= $ta['tahun_ajaran'] ?></td>
                                <td>Rp.<?= number_format($ta['nominal'] / 12, 0, ".", ".") ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <?php
                        $no = 1;
                        foreach ($DaftarTagihan as $dt) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dt['bulan'] ?></td>
                                <td><?= $s['tahun_ajaran'] ?></td>
                                <td>Rp.<?= number_format($s['nominal'] / 12, 0, ".", ".") ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#DaftarTagihan').DataTable();
        });
    </script>
</body>