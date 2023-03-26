<?php
$title = 'Profile';
include 'views/layout/meta.php';
include 'Model/Profile.php';
?>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        min-height: 100vh;
    }

    .profile {
        box-shadow: 0 0 5px #001220;
    }

    #choose {
        background-color: #ffca0d;
        color: #001220;
        width: 150px;
        border-radius: 15px;
    }

    #choose:hover {
        background-color: #001220;
        color: #ffca0d;
        width: 150px;
        border-radius: 15px;
    }

    #simpan {
        background-color: #001220;
        color: #ffca0d;
        width: 150px;
        border-radius: 15px;
    }

    #simpan:hover {
        background-color: #ffca0d;
        color: #001220;
        width: 150px;
        border-radius: 15px;
    }
</style>

<body>
    <?php include 'views/layout/navbar.php'; ?>
    <div class="container mt-5">
        <div class="row justify-content-center pb-5">
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card profile">
                        <div class="card-body">
                            <div class="card-title mt-3 mb-3">
                                <div class="d-flex justify-content-center">
                                    <h3 class="fw-bold text-center">Profile</h3>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <!-- Menampilkan gambar yang dipilih -->
                                    <?php if ($p['photo'] == NULL) { ?>
                                        <img id="pict" src="public/img/profile.svg" style="height: 150px;" class="rounded-circle" width="150" />
                                    <?php } else { ?>
                                        <img id="pict" src="public/uploaded_img/<?= $p['photo'] ?>" style="height: 150px;" class="rounded-circle" width="150" />
                                    <?php } ?>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <!-- Pilih gambar -->
                                    <?php if ($p['photo'] == NULL) { ?>
                                        <input type="file" name="pict" id="image-input" onchange="readURL(this);" class="d-none" accept="image/jpeg, image/png, image/jpg" value="public/img/profile.svg" />
                                    <?php } else { ?>
                                        <input type="file" name="pict" id="image-input" onchange="readURL(this);" class="d-none" accept="image/jpeg, image/png, image/jpg" value="" />
                                    <?php } ?>
                                    <label for="image-input" id="choose" class="d-flex justify-content-center btn fw-bold"><span class="bi bi-upload">&nbsp;&nbsp;Pilih Gambar</span></label>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <span class="fw-bold"><?= number_format($p['nis'], 0, ".", ".") ?></span>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="fw-bold"><?= $p['firstname'] . " " . $p['lastname'] ?></span>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="fw-bold"><?= $p['classroom'] . " " . $p['major'] ?></span>
                                </div>
                            </div>
                            <div class="card-text p-3">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="fw-bold" for="username">Username :</label>
                                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?= $p['username'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="fw-bold" for="password">Password :</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?= $p['pass'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="fw-bold" for="email">Email :</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?= $p['email'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="fw-bold" for="tlp">No. tlp :</label>
                                            <input type="text" name="tlp" id="tlp" class="form-control" placeholder="tlp" value="<?= $p['tlp'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="fw-bold" for="alamat">Alamat :</label>
                                            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="alamat" value="<?= $p['address'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mt-5">
                                        <input type="text" name="s_id" id="s_id" class="d-none" value="<?= $p['student_id'] ?>">
                                        <button type="submit" name="simpan" id="simpan" class="btn fw-bold">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php if (isset($_SESSION['updateProfile']) == 'success') : ?>
                    <script>
                        toastr.success('Update profile berhasil');
                        toastr.options.progressBar = true;
                    </script>
                <?php
                    unset($_SESSION['updateProfile']);
                endif; ?>
            </div>
        </div>
    </div>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#pict').attr('src', e.target.result).width(150).height(150);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>