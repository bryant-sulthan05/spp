<?php
if (isset($_SESSION['admin'])) :
    header("Location: index.php?page=dashboard");
elseif (isset($_SESSION['siswa'])) :
    header("Location: index.php?page=home");
else :
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = hash('md5', $_POST['password']);
        $query = $con->query("SELECT * FROM admin WHERE email = '$email' OR password = '$password'");
        $row = mysqli_fetch_assoc($query);

        if (mysqli_num_rows($query) == 1) {
            if ($password == $row['password']) {
                $_SESSION['admin'] = true;
                $_SESSION['admin_id'] = $row['admin_id'];
                $_SESSION['login'] = 'success';
                echo "<script>
                        document.location.href = 'index.php?page=dashboard';
                    </script>";
            } else {
                echo "<script>
                alert('Email atau Password salah!');
                document.location.href = 'index.php?page=login';
            </script>";
            }
        } else {
            echo "<script>
                alert('Akun tidak terdaftar');
                document.location.href = 'index.php?page=login';
            </script>";
        }
    }
    if (isset($_POST['loginUser'])) {
        $username = $_POST['username'];
        $password = hash('md5', $_POST['password']);
        $query = $con->query("SELECT * FROM students WHERE username = '$username' OR password = '$password'");
        $row = mysqli_fetch_assoc($query);

        if (mysqli_num_rows($query) == 1) {
            if ($password == $row['password']) {
                $_SESSION['siswa'] = true;
                $_SESSION['student_id'] = $row['student_id'];
                $_SESSION['login'] = 'success';
                echo "<script>
                        document.location.href = 'index.php?page=home';
                    </script>";
            } else {
                echo "<script>
                alert('Username atau Password salah!');
                document.location.href = 'index.php';
            </script>";
            }
        } else {
            echo "<script>
                alert('Akun tidak terdaftar');
                document.location.href = 'index.php';
            </script>";
        }
    }
    if (isset($_GET['reg'])) :
        header("Location: index.php?page=register");
    endif;
endif;
