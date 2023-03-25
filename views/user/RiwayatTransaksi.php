<?php
$title = 'Riwayat Transaksi';
include 'views/layout/meta.php';
include 'Model/TransactionList.php';
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
    <?php include 'views/layout/navbar.php' ?>
    <div class="container mt-5">
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
            <table class="table table-bordered table-hover" id="MyTransactions">
                <thead style="background-color: #ffca0d;">
                    <tr>
                        <th>Bulan</th>
                        <th>Tahun ajaran</th>
                        <th>Tanggal bayar</th>
                        <th>Petugas</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($_POST['cari'])) { ?>
                        <?php
                        $t = date("Y");
                        $year = mysqli_real_escape_string($con, $_POST['tahun']);
                        if ($year <= $t) {
                            $StudentTransactions = $con->query("SELECT * FROM transactions JOIN spp USING (spp_id) JOIN months USING (month_id) JOIN admin USING (admin_id) WHERE student_id = '$rowStudent[student_id]' AND spp.tahun_ajaran = '$year'");
                            // $month = mysqli_fetch_assoc($StudentTransactions);
                            foreach ($StudentTransactions as $m) :
                        ?>
                                <tr>
                                    <td><?= $m['bulan'] ?></td>
                                    <td><?= $m['tahun_ajaran'] ?></td>
                                    <td>
                                        <?php
                                        if (isset($m)) :
                                        ?>
                                            <?php
                                            $hari = date('d', strtotime($m['tgl_bayar']));
                                            $bulan = date('m', strtotime($m['tgl_bayar']));
                                            $tahun = date('y', strtotime($m['tgl_bayar']));
                                            setlocale(LC_ALL, 'indonesian');

                                            /* Output: vrijdag 22 december 1978 */
                                            echo strftime("%A, %d %B %Y", mktime(0, 0, 0, $bulan, $hari, $tahun));
                                            ?>
                                        <?php else : ?>
                                            ---
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $m['firstname'] ?></td>
                                    <td>
                                        <?php
                                        if (isset($m)) :
                                        ?>
                                            <?php if ($m['status'] == 'lunas') { ?>
                                                <span class="btn btn-success">Lunas</span>
                                            <?php } else if ($m['status'] == 'belum_lunas') { ?>
                                                <span class="btn btn-warning">Belum Lunas</span>
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
                        $StudentTransactions = $con->query("SELECT * FROM transactions JOIN spp USING (spp_id) JOIN months USING (month_id) JOIN admin USING (admin_id) WHERE student_id = '$rowStudent[student_id]' AND spp.tahun_ajaran = '$t'");
                        // $month = mysqli_fetch_assoc($StudentTransactions);
                        foreach ($StudentTransactions as $m) :
                        ?>
                            <tr>
                                <td><?= $m['bulan'] ?></td>
                                <td><?= $m['tahun_ajaran'] ?></td>
                                <td>
                                    <?php
                                    if (isset($m)) :
                                    ?>
                                        <?php
                                        $hari = date('d', strtotime($m['tgl_bayar']));
                                        $bulan = date('m', strtotime($m['tgl_bayar']));
                                        $tahun = date('y', strtotime($m['tgl_bayar']));
                                        setlocale(LC_ALL, 'indonesian');

                                        /* Output: vrijdag 22 december 1978 */
                                        echo strftime("%A, %d %B %Y", mktime(0, 0, 0, $bulan, $hari, $tahun));
                                        ?>
                                    <?php else : ?>
                                        ---
                                    <?php endif; ?>
                                </td>
                                <td><?= $m['firstname'] ?></td>
                                <td>
                                    <?php
                                    if (isset($m)) :
                                    ?>
                                        <?php if ($m['status'] == 'lunas') { ?>
                                            <span class="btn btn-success">Lunas</span>
                                        <?php } else if ($m['status'] == 'belum_lunas') { ?>
                                            <span class="btn btn-warning">Belum Lunas</span>
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
    <script>
        $(document).ready(function() {
            $('#MyTransactions').DataTable();
        });
    </script>
</body>