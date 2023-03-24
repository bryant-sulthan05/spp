<?php
$title = 'Register';
include 'views/layout/meta.php';
include 'Model/Register.php';
?>
<!-- <link rel="stylesheet" href="views/style/register.css"> -->
<style>
    * {
        box-sizing: border-box;
    }

    @media only screen and (min-width: 922px) {
        .register {
            margin-top: 40px;
        }

        .log {
            margin-top: 15px;
        }

        .login {
            display: none;
        }

        .reg {
            margin: 0px 50%;
        }
    }

    @media only screen and (max-width: 320px) {

        .card-img-overlay {
            display: none;
        }

        .log {
            margin-top: 30px;
        }

        .log {
            margin-top: 10px;
        }

        .login {
            display: flex;
            justify-content: space-between;
        }

        .box {
            margin-top: 50%;
            margin-bottom: 20%;
        }
    }

    body {
        background: #f6f5f7;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 100vh;
        margin: -50px 0 50px;
    }

    .reg-btn {
        width: 200px;
        background-color: #ffca0d;
        color: #212529;
    }

    .reg-btn:hover {
        width: 200px;
        background-color: #212529;
        color: #ffca0d;
    }

    .card-img-overlay {
        background-color: #ffca0d;
        border-radius: 0 5px 5px 0;
    }

    .login-btn {
        background-color: #212529;
        color: #ffca0d;
        width: 100px;
        height: 40px;
    }

    .login-btn:hover {
        background-color: #fff;
        color: #212529;
        border: #212529 2px solid;
        width: 100px;
        height: 40px;
    }
</style>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 box">
                <div class="card register">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 float-start card-img-overlay img" style="z-index: 0;">
                                <div class="overlay-panel" style="margin-top: 50%;">
                                    <h1 class="text-center">Hello, Welcome!</h1>
                                    <p class="text-center">Enter your personal details and start journey with us</p>
                                    <form action="" method="get">
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold mt-2 ms-auto">Sudah punya akun?</p>
                                            <button type="submit" name="login" id="login" class="btn login-btn me-auto ms-2 fw-bold">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6 reg" style="z-index: 1;">
                                <div class="card-title">
                                    <h4 class="fw-bold text-center">Register</h4>
                                </div>
                                <div class="card-content mt-3">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group mb-2">
                                            <label for="fname" class="fw-bold">Nama depan :</label>
                                            <input type="text" name="fname" id="fname" class="form-control" placeholder="Nama depan">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="lname" class="fw-bold">Nama belakang :</label>
                                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Nama belakang">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="email" class="fw-bold">Email :</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="password" class="fw-bold">Password :</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                            <span style="font-size: smaller; margin-left: 5px;">*note : password harus memiliki 8 karakter atau lebih</span>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="tlp" class="fw-bold">No Tlp :</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">+62</span>
                                                <input type="number" name="tlp" id="tlp" class="form-control" placeholder="No Tlp (8123456789)">
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="address" class="fw-bold">Alamat :</label>
                                            <input type="text" name="address" id="address" class="form-control" placeholder="Alamat">
                                        </div>
                                        <div class="form-group d-flex justify-content-center log">
                                            <button type="submit" name="reg" id="reg" class="btn reg-btn fw-bold">Register</button>
                                        </div>
                                    </form>
                                    <form action="" method="get">
                                        <div class="form-group login mt-3">
                                            <p class="fw-bold mt-2 ms-auto">Sudah punya akun?</p>
                                            <button type="submit" name="login" id="login" class="btn login-btn me-auto ms-2 fw-bold">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var state = false;

        function toggle() {
            if (state) {
                document.getElementById("password").setAttribute("type", "password");
                document.getElementById("show");
                state = false;
            } else {
                document.getElementById("password").setAttribute("type", "text");
                document.getElementById("show");
                state = true;
            }
        }
    </script>
</body>