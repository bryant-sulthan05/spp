<?php
$ProfileSiswa = $con->query("SELECT * FROM students WHERE student_id = '$_SESSION[student_id]'");
$s = mysqli_fetch_assoc($ProfileSiswa);

$Bulan = $con->query("SELECT * FROM months");
$b = mysqli_fetch_assoc($Bulan);
$Tagihan = $con->query("SELECT * FROM months WHERE month_id NOT IN (SELECT month_id FROM transactions WHERE student_id = '$s[student_id]')");
$hitungTagihan = mysqli_num_rows($Tagihan);
