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
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="MyTransactions">
                <thead style="background-color: #ffca0d;">
                    <tr>
                        <th>No.</th>
                        <th>Bulan</th>
                        <th>Tahun ajaran</th>
                        <th>Tanggal bayar</th>
                        <th>Petugas</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($StudentTransactions as $m) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $m['bulan'] ?></td>
                            <td><?= $m['tahun_ajaran'] ?></td>
                            <td>
                                <?php
                                $hari = date('d', strtotime($m['tgl_bayar']));
                                $bulan = date('m', strtotime($m['tgl_bayar']));
                                $tahun = date('y', strtotime($m['tgl_bayar']));
                                setlocale(LC_ALL, 'indonesian');

                                /* Output: vrijdag 22 december 1978 */
                                echo strftime("%A, %d %B %Y", mktime(0, 0, 0, $bulan, $hari, $tahun));
                                ?>
                            </td>
                            <td><?= $m['firstname'] ?></td>
                            <td>
                                <?php if ($m['status'] == 'lunas') { ?>
                                    <span class="badge bg-success">Lunas</span>
                                <?php } else if ($m['status'] == 'belum_lunas') { ?>
                                    <span class="badge bg-warning">Belum Lunas</span>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
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