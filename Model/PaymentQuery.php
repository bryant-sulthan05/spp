<?php
$s_id = $_SESSION['student_history'];
$t_ajaran = date("Y");
$getStudent = $con->query("SELECT * FROM students JOIN classrooms USING (classroom_id) JOIN majors USING (major_id) JOIN spp USING (spp_id) WHERE students.student_id = '$s_id'");
$rowStudent = mysqli_fetch_assoc($getStudent);
$HistoryQuery = $con->query("SELECT * FROM transactions WHERE student_id = '$rowStudent[student_id]' AND thn_bayar = '$t_ajaran'");
$Hrow = mysqli_fetch_assoc($HistoryQuery);

// Update Transaksi
if (isset($_POST['lunas'])) {
    date_default_timezone_set("Asia/Jakarta");
    $updated_at = date("Y-m-d H:i:s");
    $id_transaksi = $_POST['t_id'];
    $total = $_POST['min-nom'] + $_POST['total'];
    if ($total >= $_POST['max-nom']) {
        $update = $con->query("UPDATE transactions SET total = '$total', status = 'lunas', created_at = '$updated_at' WHERE transaction_id = '$id_transaksi'");
    } else {
        $update = $con->query("UPDATE transactions SET total = '$total', created_at = '$updated_at' WHERE transaction_id = '$id_transaksi'");
    }
    if ($update == true) {
        $_SESSION['update'] = 'success';
        header("Location: index.php?page=daftar_siswa");
    }
}
