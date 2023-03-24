<?php
$title = 'Login';
include 'views/layout/meta.php';
include 'Model/Auth.php';
?>
<?php if (isset($_SESSION['info']) == 'failed') : ?>
    <script>
        const information = $("#notif", function() {
            Swal.fire({
                title: "Login terlebih dahulu",
                icon: "warning"
            });
        });
    </script>
    <div class="notif" id="notif" data-infodata="info"></div>
<?php
    unset($_SESSION['info']);
endif; ?>
<link rel="stylesheet" href="views/style/login.css">

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card login">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6" style="z-index: 1;">
                                <div class="card-title">
                                    <h4 class="fw-bold text-center">Login</h4>
                                </div>
                                <div class="card-content mt-5">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="username" class="fw-bold">Username :</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-vcard"></i></span>
                                                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <span class="fw-bold">Password :</span>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill"></i></span>
                                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                                <input type="radio" class="btn-check" name="show" id="show" autocomplete="off" aria-hidden="true" onclick="toggle()">
                                                <label class="btn btn-outline-secondary text-dark" for="show" style="font-size: 25px;"><span class="bi bi-eye"></span></label>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex justify-content-center log">
                                            <button type="submit" name="loginUser" class="btn login-btn fw-bold">Login</button>
                                        </div>
                                        <div class="form-group d-flex justify-content-center forgot-password">
                                            <a href="index.php?page=forgot" class="text-decoration-none" style="color: #212529">Forgot Password?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6 float-end card-img-overlay img" style="margin: 0px 50%; z-index: 0;">
                                <div class="overlay-panel" style="margin-top: 25%;">
                                    <h1 class="text-center">Welcome Back!</h1>
                                    <p class="text-center">To keep connected with us please login with your personal info</p>
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