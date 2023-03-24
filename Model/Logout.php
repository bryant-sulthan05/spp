<?php
if (isset($_SESSION['admin'])) {
    unset($_SESSION['admin']);
    unset($_SESSION['admin_id']);
    echo
    "<script>
            document.location.href = 'index.php?page=login';
        </script>";
} else if (isset($_SESSION['siswa'])) {
    unset($_SESSION['siswa']);
    unset($_SESSION['student_id']);
    echo
    "<script>
            document.location.href = 'index.php';
        </script>";
}
