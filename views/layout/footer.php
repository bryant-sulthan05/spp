<style>
    .scrollup {
        background-color: #ffca0d;
        color: #001220;
        border-radius: 100%;
        width: 50px;
        height: 50px;
        float: right;
        margin: 10px;
        border: 2px solid #001220;
    }

    .scrollup:hover {
        background-color: #001220;
        color: #ffca0d;
        border: #ffca0d 2px solid;
        border-radius: 100%;
        width: 50px;
        height: 50px;
        margin: 10px;
    }
</style>

<footer style="box-shadow: 0 0 10px #001220;">
    <button class="scrollup fixed-bottom ms-auto">
        <span class="fw-bold"><i class="bi bi-chevron-up"></i></span>
    </button>
    <div class="footer" style="background-color: #ffca0d; padding: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="fw-bold">User menu</h5>
                    <hr>
                    <span>Profile</span><br>
                    <span>Riwayat Transaksi</span><br>
                    <span>Tagihan</span><br>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold">User menu</h5>
                    <hr>
                    <span>Profile</span><br>
                    <span>Riwayat Transaksi</span><br>
                    <span>Tagihan</span><br>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold">User menu</h5>
                    <hr>
                    <span>Profile</span><br>
                    <span>Riwayat Transaksi</span><br>
                    <span>Tagihan</span><br>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright d-flex justify-content-center" style="background-color: #001220; padding: 20px;">
        <span class="fw-bold text-light">Copyright &copy; Bryant</span>
    </div>
</footer>
<script>
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
</script>