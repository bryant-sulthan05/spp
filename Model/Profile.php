<?php
$Profile = $con->query("SELECT * FROM students JOIN classrooms USING (classroom_id) JOIN majors USING (major_id) JOIN spp USING (spp_id) WHERE student_id = '$_SESSION[student_id]'");
$p = mysqli_fetch_assoc($Profile);

if (isset($_POST['simpan'])) {
    $s_id = $_POST['s_id'];
    $username = $_POST['username'];
    $p_pass = $_POST['password'];
    $pass = hash('md5', $_POST['password']);
    $email = $_POST['email'];
    $tlp = $_POST['tlp'];
    $alamat = $_POST['alamat'];
    $pict = $_FILES['pict']['name'];
    $source = $_FILES['pict']['tmp_name'];
    $folder = 'public/uploaded_img/';

    $upload = move_uploaded_file($source, $folder . $pict);
    if ($pict == '') {
        $Update = $con->query("UPDATE students SET username = '$username', password = '$pass', pass = '$p_pass', email = '$email', tlp = '$tlp', address = '$alamat' WHERE student_id = '$s_id'");
    } else {
        $Update = $con->query("UPDATE students SET username = '$username', password = '$pass', pass = '$p_pass', email = '$email', tlp = '$tlp', address = '$alamat', photo = '$pict' WHERE student_id = '$s_id'");
    }

    if ($Update == true) {
        $_SESSION['updateProfile'] = 'success';
        header("Location: index.php?page=profile");
    }
}
