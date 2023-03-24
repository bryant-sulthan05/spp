<?php
$title = 'Daftar Siswa';
include 'views/layout/meta.php';
include 'app/session.php';
include 'Model/StudentsQuery.php';
?>
<style>
    .add {
        background-color: #ffca0d;
        color: #212529;
    }

    .add:hover {
        background-color: #212529;
        color: #ffca0d;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include 'views/layout/sidebar.php'; ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-md-4" style="margin-bottom: 100px;">
                <a href="index.php?page=daftar_siswa" class="btn btn-dark fw-bold mb-3" style="color:#ffca0d;"><span class="bi bi-backspace">&nbsp;Kembali</span></a>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group mb-2">
                                        <label for="fname" class="fw-bold">Nama depan :</label>
                                        <input type="text" name="fname" id="fname" class="form-control" placeholder="Nama depan" required>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="lname" class="fw-bold">Nama belakang :</label>
                                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Nama belakang" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="classroom" class="fw-bold">Kelas :</label>
                                    <select class="form-select" name="classroom" id="classroom" required>
                                        <option value="">---</option>
                                        <?php
                                        foreach ($ClassroomsQuery as $cr) {
                                            if ($classroom == $cr['classroom_id']) {
                                                $selected = 'selected';
                                            } else {
                                                $selected = '';
                                            }
                                        ?>
                                            <option value="<?= $cr['classroom_id'] ?>" <?= $selected ?>> <?= $cr['classroom'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="major" class="fw-bold">Jurusan :</label>
                                    <select class="form-select" name="major" id="major" required>
                                        <option value="">---</option>
                                        <?php
                                        foreach ($MajorsQuery as $mj) {
                                            if ($major == $mj['major_id']) {
                                                $selected = 'selected';
                                            } else {
                                                $selected = '';
                                            }
                                        ?>
                                            <option value="<?= $mj['major_id'] ?>" <?= $selected ?>> <?= $mj['major'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <?php if ($Yearrow > 0) : ?>
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <label for="t_ajaran" class="fw-bold">Tahun ajaran :</label>
                                        <select class="form-select" name="t_ajaran" id="t_ajaran" required>
                                            <option value="">---</option>
                                            <?php
                                            foreach ($yearQuery as $y) {
                                                if ($t_ajaran == $y['spp_id']) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
                                            ?>
                                                <option value="<?= $y['spp_id'] ?>" <?= $selected ?>> <?= $y['tahun_ajaran'] . " " . "(Rp." . number_format($y['nominal'], 0, ".", ".") . ")" ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="t_ajaran" class="fw-bold">Tahun ajaran :</label>
                                        <input type="text" name="t_ajaran" id="t_ajaran" class="form-control" value="<?= $year ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="nominal" class="fw-bold">Nominal SPP tahun <?= $year ?>:</label>
                                        <input type="number" name="nominal" id="nominal" class="form-control" placeholder="Nominal SPP (Rp. ---.---.---)" required>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <button type="submit" name="add" id="add" class="btn fw-bold add">Tambah</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>