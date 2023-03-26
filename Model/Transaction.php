<?php
$DataStudent = $con->query("SELECT * FROM students JOIN classrooms USING (classroom_id) JOIN majors USING (major_id) JOIN spp USING (spp_id) WHERE student_id = '$_SESSION[student_transaction]'");
$stdn = mysqli_fetch_assoc($DataStudent);

date_default_timezone_set("Asia/Jakarta");
if (isset($_POST['bayar_spp'])) {
    $id_siswa = $_POST['id'];
    $id_spp = $_POST['t_ajaran'];
    $id_bulan = $_POST['bulan'];
    $tgl_bayar = date("Y-m-d");
    $tahun_bayar = date("Y");
    $total = $_POST['total'];
    $created_at = date("Y-m-d H:i:s");
    // $bulan = [];
    // echo $bulan[] = $_POST['bulan'];
    $cekTransaksi = $con->query("SELECT * FROM transactions WHERE student_id = '$id_siswa' AND month_id = '$id_bulan' AND spp_id = '$id_spp'");
    $cek = mysqli_fetch_assoc($cekTransaksi);
    if ($cek) {
        setcookie('transaksi', 'sudah_ada', time() + 3);
        header("Location: index.php?page=bayar");
    } else {
        if ($total >= $_POST['nom']) :
            $query = $con->query("INSERT INTO transactions VALUES (NULL, '$_SESSION[admin_id]', '$id_siswa', '$id_spp', '$id_bulan', '$tgl_bayar', '$tahun_bayar', '$total', 'lunas', '$created_at')");
        else :
            $query = $con->query("INSERT INTO transactions VALUES (NULL, '$_SESSION[admin_id]', '$id_siswa', '$id_spp', '$id_bulan', '$tgl_bayar', '$tahun_bayar', '$total', 'belum_lunas', '$created_at')");
        endif;
        if ($query == true) {
            $_SESSION['pembayaran'] = 'berhasil';
            header("Location: index.php?page=daftar_siswa");
        }
    }
}
