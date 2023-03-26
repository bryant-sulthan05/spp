<?php
$Bulan = $con->query("SELECT * FROM months");
$Siswa = $con->query("SELECT * FROM students JOIN spp USING (spp_id) WHERE student_id = '$_SESSION[student_id]'");
$s = mysqli_fetch_assoc($Siswa);
foreach ($Bulan as $b) {
    if (isset($_POST['cari'])) {
        $DaftarTagihan = $con->query("SELECT * FROM months WHERE month_id NOT IN (SELECT month_id FROM transactions WHERE student_id = '$s[student_id]' AND spp_id = '$_POST[tahun]')");
    } else {
        $DaftarTagihan = $con->query("SELECT * FROM months WHERE month_id NOT IN (SELECT month_id FROM transactions WHERE student_id = '$s[student_id]' AND spp_id = '$s[spp_id]')");
    }
}
