<?php
// SELECT * FROM students WHERE students.student_id IN (SELECT students.student_id FROM transactions WHERE transactions.month BETWEEN '2023-01-15' AND '2023-03-10')

$tahun_ajaran = date("Y");

// Ambil data siswa
$AllStudentsList = $con->query("SELECT * FROM students JOIN classrooms USING (classroom_id) JOIN majors USING (major_id) JOIN spp USING (spp_id) ORDER BY firstname ASC");

// Ambil data kelas, jurusan dan tahun ajaran
$id = 0;
$classroom = ''; #Ambil data kelas
$major = ''; #Ambil data jurusan
$t_ajaran = ''; #Ambil data tahun ajaran
$year = date('Y'); #Ambil data tahun ini
$ClassroomsQuery = $con->query("SELECT * FROM classrooms"); #Ambil semua data kelas
$MajorsQuery = $con->query("SELECT * FROM majors"); #Ambil semua data jurusan
$yearQuery = $con->query("SELECT * FROM spp"); #Ambil semua data spp
$YearQuery = $con->query("SELECT * FROM spp WHERE tahun_ajaran = '$year'"); #Ambil data spp berdasarkan tahun sekarang
$Yearrow = mysqli_num_rows($YearQuery); #mengecek data spp dalam database dalam bentuk nomor

// Menambah murid
if (isset($_POST['add'])) :
    $nis = rand(100000000, 200000000);
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = strtolower($_POST['fname'] . rand(100, 15000));
    $password = hash('md5', $username);
    $pass = $username;
    $classroom = $_POST['classroom'];
    $major = $_POST['major'];
    $t_ajaran = $_POST['t_ajaran'];
    $nominal = $_POST['nominal'];
    if ($Yearrow > 0) :
        $AddStudent = $con->query("INSERT INTO students VALUES (NULL, '$classroom', '$major', '$t_ajaran', '$nis', '$fname', '$lname', '$username', '$password', '$pass', NULL, NULL, NULL, NULL)");
    else :
        $AddSpp = $con->query("INSERT INTO spp VALUES (NULL, '$t_ajaran', '$nominal')");
        $newId = $con->insert_id;
        $AddStudent = $con->query("INSERT INTO students VALUES (NULL, '$classroom', '$major', '$newId', '$nis', '$fname', '$lname', '$username', '$password', '$pass', NULL, NULL, NULL, NULL)");
    endif;
    if ($AddStudent == true) :
        $_SESSION['addStudent'] = 'success';
        header("Location: index.php?page=daftar_siswa");
    else :
        $_SESSION['addStudent'] = 'failed';
        header("Location: index.php?page=tambah_siswa");
    endif;
elseif (isset($_POST['update'])) :
    $s_id = $_POST['student_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = hash('md5', $_POST['password']);
    $pass = $_POST['password'];
    $classroom = $_POST['classroom'];
    $major = $_POST['major'];
    $t_ajaran = $_POST['t_ajaran'];
    $nominal = $_POST['nominal'];
    if ($Yearrow > 0) :
        $editStudent = $con->query("UPDATE students SET classroom_id = '$classroom', major_id = '$major', spp_id = '$t_ajaran', firstname = '$fname', lastname = '$lname', username = '$username', password = '$password', pass = '$pass' WHERE student_id = '$s_id'");
    else :
        $AddSpp = $con->query("INSERT INTO spp VALUES (NULL, '$t_ajaran', '$nominal')");
        $newId = $con->insert_id;
        $editStudent = $con->query("UPDATE students SET classroom_id = '$classroom', major_id = '$major', spp_id = '$newId', firstname = '$fname', lastname = '$lname', username = '$username', password = '$password', pass = '$pass' WHERE student_id = '$s_id'");
    endif;
    if ($editStudent == true) :
        $_SESSION['editStudent'] = 'success';
        header("Location: index.php?page=daftar_siswa");
    else :
        $_SESSION['editStudent'] = 'failed';
        header("Location: index.php?page=daftar_siswa");
    endif;
elseif (isset($_POST['remove'])) :
    $DeleteStudent = $con->query("DELETE FROM students WHERE student_id = '$_POST[student_id]'");
    if ($DeleteStudent == true) :
        $_SESSION['deleteStudent'] = 'success';
        header("Location: index.php?page=daftar_siswa");
    else :
        $_SESSION['deleteStudent'] = 'failed';
        header("Location: index.php?page=daftar_siswa");
    endif;
elseif (isset($_POST['payment_history'])) :
    $_SESSION['student_history'] = $_POST['student_id'];
    header("Location: index.php?page=payment_history");
elseif (isset($_POST['bayar'])) :
    $_SESSION['student_transaction'] = $_POST['student_id'];
    header("Location: index.php?page=bayar");
endif;
