<?php
$s_id = $_SESSION['student_id'];
$t_ajaran = date("Y");
$getStudent = $con->query("SELECT * FROM students JOIN classrooms USING (classroom_id) JOIN majors USING (major_id) JOIN spp USING (spp_id) WHERE students.student_id = '$s_id'");
$rowStudent = mysqli_fetch_assoc($getStudent);
