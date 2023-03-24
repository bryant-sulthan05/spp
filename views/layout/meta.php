<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $title ?></title>
<!-- CSS -->
<link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="public/assets/toast/build/toastr.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<style>
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css");

    * {
        font-family: 'Ubuntu', sans-serif;
    }
</style>
<style>
    .toastjs-container {
        position: absolute;
        position: fixed;
        bottom: 30px;
        left: 30px;
        width: calc(100% - 60px);
        max-width: 400px;
        transform: translateX(-150%);
        transition: transform 1s;
        z-index: 100
    }

    .toastjs-container[aria-hidden=false] {
        transform: translateX(0)
    }

    .toastjs {
        background: #fff;
        padding: 10px 15px 0;
        border-left-style: solid;
        border-left-width: 5px;
        border-radius: 4px;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .2)
    }

    .toastjs.default {
        border-left-color: #AAA
    }

    .toastjs.success {
        border-left-color: #2ECC40
    }

    .toastjs.warning {
        border-left-color: #FF851B
    }

    .toastjs.danger {
        border-left-color: #FF4136
    }

    .toastjs-btn {
        background: #f0f0f0;
        padding: 5px 10px;
        border: 0;
        border-radius: 4px;
        font-family: 'Source Sans Pro', sans-serif;
        font-size: 14px;
        display: inline-block;
        margin-right: 10px;
        margin-bottom: 10px;
        cursor: pointer
    }

    .toastjs-btn--custom {
        background: #323232;
        color: #fff
    }

    .toastjs-btn:focus,
    .toastjs-btn:hover {
        outline: 0;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .2)
    }
</style>
<!-- JS -->
<script src="public/assets/js/bootstrap.bundle.min.js"></script>
<script src="public/assets/jquery/jquery-3.6.1.min.js"></script>
<script src="public/assets/js/sweetalert2.all.min.js"></script>
<script src="public/assets/toast/build/toastr.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>