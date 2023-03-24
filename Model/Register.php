<?php
if (isset($_POST['reg'])) :
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = hash('md5', $_POST['password']);
    $pass = $_POST['password'];
    $tlp = $_POST['tlp'];
    $address = $_POST['address'];

    $Query = $con->query("INSERT INTO admin VALUES (NULL, '$fname', '$lname', '$email', '$password', '$pass', '$tlp', '$address', NULL)");
    if ($Query == true) :
        $_SESSION['reg'] = true;
        header("Location: index.php?page=login");
    endif;
elseif (isset($_GET['login'])) :
    header("Location: index.php?page=login");
endif;
