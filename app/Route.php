<?php
$pages = isset($_GET['page']) ? $_GET['page'] : '';
switch ($pages) {
        // Admin
    case 'dashboard':
        include 'views/admin/Dashboard.php';
        break;
    case 'daftar_siswa':
        include 'views/admin/StudentsList.php';
        break;
    case 'laporan_transaksi':
        include 'views/admin/TransactionsReport.php';
        break;
    case 'profile':
        include 'views/admin/Profile.php';
        break;
    case 'register';
        include 'views/components/Register.php';
        break;
    case 'sign_out';
        include 'Model/Logout.php';
        break;
    case 'tambah_siswa';
        include 'views/admin/AddStudent.php';
        break;
    case "payment_history";
        include 'views/admin/PaymentHistory.php';
        break;
    case "bayar";
        include 'views/admin/Transaction.php';
        break;
    case "XII_rpl";
        include 'views/admin/StudentsofClass.php';
        break;
    case 'login':
        include 'views/components/Login.php';
        break;
        // User
    case 'home';
        include 'views/user/Home.php';
        break;
    default:
        include 'views/components/LogUser.php';
}
