<?php
$title = 'Daftar Siswa';
include 'views/layout/meta.php';
include 'app/session.php';
$t_id = 0;
$t_a = "";
$tahun_a = $con->query("SELECT * FROM spp");

$buln = date("m");
$month = $con->query("SELECT * FROM months");
foreach ($month as $mn) {
    $TagihanSiswa = $con->query("SELECT * FROM students JOIN classrooms USING (classroom_id) JOIN majors USING (major_id) JOIN spp USING (spp_id) WHERE student_id NOT IN (SELECT student_id FROM transactions WHERE month_id = '$mn[month_id]') ORDER BY firstname ASC");
}
?>
<style>
    #payment_history {
        background-color: #ffca0d;
        color: #212529;
    }

    .dropdown-item:hover {
        background-color: #d0d5d9;
    }

    @media print {
        .print {
            display: none;
        }
    }
</style>
<script>
    function toggle() {
        window.print()
    }
</script>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include 'views/layout/sidebar.php'; ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-md-4" style="margin-bottom: 100px;">
                <form action="" method="post" enctype="multipart/form-data" class="col-md-4">
                    <div class="form-group">
                        <div class="d-flex justify-content-between mb-3 mt-3">
                            <select name="tahun" id="tahun" class="form-control">
                                <option value="">Pilih tahun ajaran</option>
                                <?php
                                foreach ($tahun_a as $a) {
                                    if ($t_a == $a['spp_id']) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                ?>
                                    <option value="<?= $a['spp_id'] ?>" <?= $selected ?>> <?= $a['tahun_ajaran'] ?></option>
                                <?php } ?>
                            </select>
                            <button type="submit" name="cek" id="cek" class="badge bg-secondary ms-3" style="width: 300px;">Cari</button>
                        </div>
                        <div class="print">
                            <a href="#" class="btn btn-outline-primary" aria-hidden="true" onclick="toggle()"><span class="bi bi-printer">&nbsp;Print</span></a>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="DataStudents">
                        <thead style="background-color: #ffca0d;">
                            <tr>
                                <th>No.</th>
                                <th>Nis</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th class="text-center">Tahun Ajaran</th>
                                <th class="text-center">Tagihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($TagihanSiswa as $ts) :
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= number_format($ts['nis'], 0, ".", ".") ?></td>
                                    <td>
                                        <?php if ($ts['photo'] == NULL) : ?>
                                            <img src="public/img/profile.svg" width="50">
                                        <?php else : ?>
                                            <img src="/public/uploaded_img/<?= $ts['photo'] ?>" width="50">
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $ts['firstname'] . " " . $ts['lastname'] ?></td>
                                    <td><?= $ts['classroom'] . " " . $ts['major'] ?></td>
                                    <td class="text-center"><?= $ts['tahun_ajaran'] ?></td>
                                    <td>
                                        <?php
                                        if (isset($_POST['cek'])) {
                                            $bln = $con->query("SELECT * FROM months WHERE month_id NOT IN (SELECT month_id FROM transactions WHERE student_id = '$ts[student_id]' AND spp_id = '$_POST[tahun]')");
                                        } else {
                                            $bln = $con->query("SELECT * FROM months WHERE month_id NOT IN (SELECT month_id FROM transactions WHERE student_id = '$ts[student_id]')");
                                        }
                                        foreach ($bln as $b) : ?>
                                            <span class="badge bg-danger"><?= $b['bulan'] ?></span>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#DataStudents').DataTable();
        });
    </script>
</body>