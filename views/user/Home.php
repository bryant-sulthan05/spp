<?php
$title = 'Pembayaran SPP berbasis web';
include 'views/layout/meta.php';
include 'Model/Home.php';
?>
<style>
    body {
        min-height: 100vh;
    }

    .welcome {
        /* background-image: url("public/img/cardwave.svg"); */
        background-color: #001220;
        background-size: cover;
    }

    @media only screen and (max-width: 320px) {
        .scrap {
            width: 100%;
        }

        h4 {
            font-size: medium;
        }

        .card-text span {
            font-size: small;
        }

        .list-menu {
            margin-bottom: 30px;
        }

        section.menu {
            margin-top: 20px;
        }
    }

    @media only screen and (min-width: 922px) {
        .scrap {
            width: 80%;
        }

        .container.menu {
            width: 80%;
        }

        section.menu {
            margin-top: 30px;
        }
    }
</style>

<body>
    <?php include 'views/layout/navbar.php'; ?>
    <section class="main mt-3 d-flex justify-content-center">
        <div class="container scrap">
            <div class="card welcome">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="fw-bold text-light">Selamat Datang <span style="color: #ffca0d"><?= $s['firstname'] . " " . $s['lastname'] ?></span></h4>
                    </div>
                    <div class="card-text">
                        <span class="text-light">Selamat datang di aplikasi SPP berbasis website</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="menu">
        <div class="container menu">
            <h4 class="fw-bold"><span class="bi bi-house-door">&nbsp;Home</span></h4>
            <hr>
            <div class="row d-flex justify-content-center">
                <div class="col-md-4 list-menu">
                    <a href="index.php?page=profile" style="text-decoration: none;">
                        <div class="card profile p-3" style="box-shadow: 0 0 5px #001220;">
                            <div class="d-flex justify-content-between">
                                <span class="bi bi-person-circle rounded-circle p-2" style="background-color: #ffe68e; color:#b78d00;"></span>
                                <span class="fw-bold me-auto ms-4 mt-1" style="color: #001220;">Profile</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 list-menu">
                    <a href="index.php?page=histori_pembayaran" style="text-decoration: none;">
                        <div class="card profile p-3" style="box-shadow: 0 0 5px #001220;">
                            <div class="d-flex justify-content-between">
                                <span class="bi bi-receipt rounded-circle p-2" style="background-color: #80ff80; color:#009d00;"></span>
                                <span class="fw-bold me-auto ms-4 mt-1" style="color: #001220;">History Pembayaran</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 list-menu">
                    <a href="index.php?page=tagihan" style="text-decoration: none;">
                        <div class="card profile p-3" style="box-shadow: 0 0 5px #001220;">
                            <div class="d-flex justify-content-between">
                                <span class="bi bi-receipt rounded-circle p-2" style="background-color: #ff8080; color:#ce0000;"></span>
                                <span class="fw-bold me-auto ms-4 mt-1" style="color: #001220;">Tagihan</span>
                                <span class="fw-bold text-center mb-2" style="background-color: #ff8080; color: #ce0000; text-decoration: none; width: 20px; border-radius: 100%;"><?= $hitungTagihan ?></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffca0d" fill-opacity="1" d="M0,32L21.8,48C43.6,64,87,96,131,138.7C174.5,181,218,235,262,224C305.5,213,349,139,393,128C436.4,117,480,171,524,176C567.3,181,611,139,655,154.7C698.2,171,742,245,785,256C829.1,267,873,213,916,165.3C960,117,1004,75,1047,64C1090.9,53,1135,75,1178,96C1221.8,117,1265,139,1309,138.7C1352.7,139,1396,117,1418,106.7L1440,96L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path>
    </svg>
    <section class="about p-3" style="background-color: #ffca0d;">
        <div class="container about">
            <h4 class="fw-bold text-center" style="color: #001220;">About application</h4>
            <hr>
            <span style="color: #fff;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem recusandae aspernatur deserunt ex ipsa. Nam facere non quas cumque ad, natus fugit possimus sint culpa in sapiente quasi explicabo rem quam doloremque perferendis quos omnis laboriosam? Accusantium perferendis quasi quia hic tempora et illum sequi porro sit ut unde voluptatibus ratione corporis non totam a eos, officia, voluptates nostrum. Consequuntur est veritatis, ratione sed sequi delectus ullam laborum optio fugit deserunt dolorum vero assumenda nulla eligendi. Dolorem alias excepturi perferendis quidem ratione reiciendis accusamus non consequuntur, nesciunt iure asperiores, culpa, corporis quis nostrum? Aspernatur sit cupiditate quam iusto cumque obcaecati illo in dolor voluptates non maxime, inventore laudantium commodi explicabo facere corporis accusamus quaerat dolorum, deserunt reprehenderit alias, nisi neque ut suscipit. Voluptate tempore architecto dolorum est consequuntur quia quo rem sed dicta dolore odio sequi, consequatur voluptatum quisquam, minima nemo et beatae sit molestias eveniet nam recusandae iste. Sapiente itaque aperiam corporis dolorum magnam eos atque quae officia vero provident. Odit officiis eveniet iure quam eos velit. Sint ut voluptates quia, iusto adipisci officia deleniti itaque cumque corporis repudiandae debitis, voluptas sequi odio minima illum? Minus laborum vitae eum, rerum adipisci, temporibus porro natus, molestias dolores et consequuntur nemo?</span>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffca0d" fill-opacity="1" d="M0,128L18.5,112C36.9,96,74,64,111,64C147.7,64,185,96,222,128C258.5,160,295,192,332,186.7C369.2,181,406,139,443,117.3C480,96,517,96,554,106.7C590.8,117,628,139,665,160C701.5,181,738,203,775,192C812.3,181,849,139,886,106.7C923.1,75,960,53,997,69.3C1033.8,85,1071,139,1108,165.3C1144.6,192,1182,192,1218,170.7C1255.4,149,1292,107,1329,112C1366.2,117,1403,171,1422,197.3L1440,224L1440,0L1421.5,0C1403.1,0,1366,0,1329,0C1292.3,0,1255,0,1218,0C1181.5,0,1145,0,1108,0C1070.8,0,1034,0,997,0C960,0,923,0,886,0C849.2,0,812,0,775,0C738.5,0,702,0,665,0C627.7,0,591,0,554,0C516.9,0,480,0,443,0C406.2,0,369,0,332,0C295.4,0,258,0,222,0C184.6,0,148,0,111,0C73.8,0,37,0,18,0L0,0Z"></path>
    </svg>
    <?php if (isset($_SESSION['login']) == 'success') : ?>
        <script>
            toastr.success('Login berhasil');
            toastr.options.progressBar = true;
        </script>
    <?php
        unset($_SESSION['login']);
    endif; ?>
    <?php include 'views/layout/footer.php'; ?>
</body>
<!-- <img src="public/img/bottomwave.svg" style="background-repeat:no-repeat; width:100%;"> -->