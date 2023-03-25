<?php
$title = 'Histori Pembayaran';
include 'views/layout/meta.php';
include 'app/session.php';
include 'Model/PaymentQuery.php';
if (isset($_POST['back'])) :
    header("Location: index.php?page=daftar_siswa");
endif;
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include 'views/layout/sidebar.php'; ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-md-4" style="margin-bottom: 100px;">
                <form action="" method="post">
                    <button type="submit" name="back" id="back" class="btn btn-danger fw-bold"><span class="bi bi-backspace">&nbsp;Back</span></button>
                </form>
                <div class="card" style="box-shadow: 0 2.5px 5px #212529">
                    <div class="card-body">
                        <div class="card-title mb-3">
                            <?php if (isset($_POST['cari'])) { ?>
                                <h4 class="fw-bold">Histori pembayaran tahun <?= $_POST['tahun'] ?></h4>
                            <?php } else { ?>
                                <h4 class="fw-bold">Histori pembayaran tahun <?= date("Y") ?></h4>
                            <?php } ?>
                        </div>
                        <div class="card-content">
                            <table>
                                <tr>
                                    <td>Nama : </td>
                                    <td><?= $rowStudent['firstname'] . " " . $rowStudent['lastname'] ?></td>
                                </tr>
                                <tr>
                                    <td>Kelas : </td>
                                    <td><?= $rowStudent['classroom'] . " " . $rowStudent['major'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tahun ajaran : </td>
                                    <td><?= $rowStudent['tahun_ajaran'] ?></td>
                                </tr>
                            </table>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="d-flex">
                                            <?php if (isset($_POST['cari'])) { ?>
                                                <input type="text" name="tahun" id="tahun" class="form-control" placeholder="Cari tahun ajaran..." value="<?= $_POST['tahun'] ?>">
                                            <?php } else { ?>
                                                <input type="text" name="tahun" id="tahun" class="form-control" placeholder="Cari tahun ajaran...">
                                            <?php } ?>
                                            <button type="submit" name="cari" id="cari" class="btn btn-primary ms-3">Cari</button>
                                        </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Bulan</th>
                                                    <th>Tanggal bayar</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($_POST['cari'])) { ?>
                                                    <?php
                                                    $t = date("Y");
                                                    $year = mysqli_real_escape_string($con, $_POST['tahun']);
                                                    if ($year <= $t) {
                                                        $b = date("m");
                                                        if ($year != $t) {
                                                            $months = $con->query("SELECT * FROM months");
                                                        } else {
                                                            $months = $con->query("SELECT * FROM months WHERE month_id <= '$b'");
                                                        }
                                                        foreach ($months as $m) :
                                                            $StudentTransactions = $con->query("SELECT * FROM transactions JOIN spp USING (spp_id) WHERE month_id = '$m[month_id]' AND student_id = '$rowStudent[student_id]' AND spp.tahun_ajaran = '$year'");
                                                            $month = mysqli_fetch_assoc($StudentTransactions);
                                                    ?>
                                                            <tr>
                                                                <td><?= $m['bulan'] ?></td>
                                                                <td>
                                                                    <?php
                                                                    if (isset($month)) :
                                                                    ?>
                                                                        <?php
                                                                        $hari = date('d', strtotime($month['tgl_bayar']));
                                                                        $bulan = date('m', strtotime($month['tgl_bayar']));
                                                                        $tahun = date('y', strtotime($month['tgl_bayar']));
                                                                        setlocale(LC_ALL, 'indonesian');

                                                                        /* Output: vrijdag 22 december 1978 */
                                                                        echo strftime("%A, %d %B %Y", mktime(0, 0, 0, $bulan, $hari, $tahun));
                                                                        ?>
                                                                    <?php else : ?>
                                                                        ---
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    if (isset($month)) :
                                                                    ?>
                                                                        <?php if ($month['status'] == 'lunas') { ?>
                                                                            <span class="btn btn-success">Lunas</span>
                                                                        <?php } else if ($month['status'] == 'belum_lunas') { ?>
                                                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                                Belum lunas
                                                                            </button>
                                                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Form pelunasan</h1>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <form action="" method="post" enctype="multipart/form-data">
                                                                                            <div class="modal-body">
                                                                                                <div class="form-group mb-3">
                                                                                                    <label for="nis" class="fw-bold">Nis : </label>
                                                                                                    <span class="form-control" id="nis"><?= number_format($rowStudent['nis'], 0, ".", ".") ?></span>
                                                                                                </div>
                                                                                                <div class="form-group mb-3">
                                                                                                    <label for="name" class="fw-bold">Nama : </label>
                                                                                                    <span class="form-control" id="name"><?= $rowStudent['firstname'] . " " . $rowStudent['lastname'] ?></span>
                                                                                                </div>
                                                                                                <div class="form-group mb-3">
                                                                                                    <label for="class" class="fw-bold">Kelas : </label>
                                                                                                    <span class="form-control" id="class"><?= $rowStudent['classroom'] . " " . $rowStudent['major'] ?></span>
                                                                                                </div>
                                                                                                <div class="form-group mb-3">
                                                                                                    <label for="tahun" class="fw-bold">Tahun ajaran : </label>
                                                                                                    <span class="form-control" id="tahun"><?= $month['tahun_ajaran'] ?></span>
                                                                                                </div>
                                                                                                <div class="form-group mb-3">
                                                                                                    <label for="bulan" class="fw-bold">Bulan : </label>
                                                                                                    <span class="form-control" id="bulan"><?= $m['bulan'] ?></span>
                                                                                                </div>
                                                                                                <div class="form-group mb-3">
                                                                                                    <label for="min-nom" class="fw-bold">Cicilan : </label>
                                                                                                    <input type="text" name="min-nom" id="min-nom" class="form-control" value="<?= $month['total'] ?>" readonly>
                                                                                                </div>
                                                                                                <div class="form-group mb-3">
                                                                                                    <label for="total" class="fw-bold">Pembayaran maksimal : </label>
                                                                                                    <input type="text" name="max-nom" id="max-nom" class="form-control" value="<?= $month['nominal'] / 12 ?>" readonly>
                                                                                                </div>
                                                                                                <div class="form-group mb-3">
                                                                                                    <label for="total" class="fw-bold">Nominal pembayaran : </label>
                                                                                                    <input type="number" name="total" id="total" class="form-control" placeholder="Masukkan nominal pembayaran">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <input type="number" name="t_id" id="t_id" value="<?= $month['transaction_id'] ?>" class="d-none">
                                                                                                <button type="submit" name="lunas" id="lunas" class="btn btn-primary fw-bold">Lunasi</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php } ?>
                                                                    <?php else : ?>
                                                                        <span class="btn btn-danger">Belum Bayar</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php } else { ?>
                                                        <tr>
                                                            <th colspan="9" class="text-center">Data tidak ada</th>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <?php
                                                    $t = date("Y");
                                                    $b = date("m");
                                                    $months = $con->query("SELECT * FROM months WHERE month_id <= '$b'");
                                                    foreach ($months as $m) :
                                                        $StudentTransactions = $con->query("SELECT * FROM transactions JOIN spp USING (spp_id) WHERE month_id = '$m[month_id]' AND student_id = '$rowStudent[student_id]' AND thn_bayar = '$t'");
                                                        $month = mysqli_fetch_assoc($StudentTransactions);
                                                    ?>
                                                        <tr>
                                                            <td><?= $m['bulan'] ?></td>
                                                            <td>
                                                                <?php
                                                                if (isset($month)) :
                                                                ?>
                                                                    <?php
                                                                    $hari = date('d', strtotime($month['tgl_bayar']));
                                                                    $bulan = date('m', strtotime($month['tgl_bayar']));
                                                                    $tahun = date('y', strtotime($month['tgl_bayar']));
                                                                    setlocale(LC_ALL, 'indonesian');

                                                                    /* Output: vrijdag 22 december 1978 */
                                                                    echo strftime("%A, %d %B %Y", mktime(0, 0, 0, $bulan, $hari, $tahun));
                                                                    ?>
                                                                <?php else : ?>
                                                                    ---
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if (isset($month)) :
                                                                ?>
                                                                    <?php if ($month['status'] == 'lunas') { ?>
                                                                        <span class="btn btn-success">Lunas</span>
                                                                    <?php } else if ($month['status'] == 'belum_lunas') { ?>
                                                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                            Belum lunas
                                                                        </button>
                                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form pelunasan</h1>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <form action="" method="post" enctype="multipart/form-data">
                                                                                        <div class="modal-body">
                                                                                            <div class="form-group mb-3">
                                                                                                <label for="nis" class="fw-bold">Nis : </label>
                                                                                                <span class="form-control" id="nis"><?= number_format($rowStudent['nis'], 0, ".", ".") ?></span>
                                                                                            </div>
                                                                                            <div class="form-group mb-3">
                                                                                                <label for="name" class="fw-bold">Nama : </label>
                                                                                                <span class="form-control" id="name"><?= $rowStudent['firstname'] . " " . $rowStudent['lastname'] ?></span>
                                                                                            </div>
                                                                                            <div class="form-group mb-3">
                                                                                                <label for="class" class="fw-bold">Kelas : </label>
                                                                                                <span class="form-control" id="class"><?= $rowStudent['classroom'] . " " . $rowStudent['major'] ?></span>
                                                                                            </div>
                                                                                            <div class="form-group mb-3">
                                                                                                <label for="tahun" class="fw-bold">Tahun ajaran : </label>
                                                                                                <span class="form-control" id="tahun"><?= $month['tahun_ajaran'] ?></span>
                                                                                            </div>
                                                                                            <div class="form-group mb-3">
                                                                                                <label for="bulan" class="fw-bold">Bulan : </label>
                                                                                                <span class="form-control" id="bulan"><?= $m['bulan'] ?></span>
                                                                                            </div>
                                                                                            <div class="form-group mb-3">
                                                                                                <label for="min-nom" class="fw-bold">Cicilan : </label>
                                                                                                <input type="text" name="min-nom" id="min-nom" class="form-control" value="<?= $month['total'] ?>" readonly>
                                                                                            </div>
                                                                                            <div class="form-group mb-3">
                                                                                                <label for="total" class="fw-bold">Pembayaran maksimal : </label>
                                                                                                <input type="text" name="max-nom" id="max-nom" class="form-control" value="<?= $month['nominal'] / 12 ?>" readonly>
                                                                                            </div>
                                                                                            <div class="form-group mb-3">
                                                                                                <label for="total" class="fw-bold">Nominal pembayaran : </label>
                                                                                                <input type="number" name="total" id="total" class="form-control" placeholder="Masukkan nominal pembayaran">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <input type="number" name="t_id" id="t_id" value="<?= $month['transaction_id'] ?>" class="d-none">
                                                                                            <button type="submit" name="lunas" id="lunas" class="btn btn-primary fw-bold">Lunasi</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                <?php else : ?>
                                                                    <span class="btn btn-danger">Belum Bayar</span>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>