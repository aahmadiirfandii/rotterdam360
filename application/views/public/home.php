<!doctype html>
<html lang="en">

<head>
    <!-- <base href="../"> -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= templates('assets') ?>css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= templates('assets') ?>css/my-style.css">
    <link href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" rel="stylesheet">
    <title><?= $title ?></title>
</head>

<body>
    <section id="section01" class="demo">
        <div class="container">
            <img src="<?= templates('assets') ?>img/logo-bi.png" width="120px">
            <img class="ml-1" src="<?= templates('assets') ?>img/logo-tutwuri.png" width="52px">
            <img class="ml-3" src="<?= templates('assets') ?>img/bpcb.png" width="52px">
            <div class="judul-wrapper">
                <p class="judulx">Fort Rotterdam</p>
                <p class="des-judulx">Benteng Ujung Pandang</p>
            </div>
            <div class="card-wrapper">
                <div class="info">
                    <h4></h4>
                    <label>Fort Rotterdam is a 17th-century fort in Makassar on the island of Sulawesi in Indonesia. It is a Dutch fort built on top of an existing fort of the Gowa Kingdom.</label>
                </div>
                <div class="icon icon-hover">
                    <a href="#section02">
                        <img src="<?= templates('assets') ?>icon/about.svg" width="40%">
                        <p class="mt-2">About</p>
                    </a>
                </div>
                <div class="icon icon-hover">
                    <a href="#section03">
                        <img src="<?= templates('assets') ?>icon/location.svg" width="40%">
                        <p class="mt-2">Location</p>
                    </a>
                </div>
                <div class="icon icon-hover">
                    <a href="<?= site_url('siteplan') ?>">
                        <img src="<?= templates('assets') ?>icon/virtual-tour.svg" width="40%">
                        <p class="mt-2">Virtual Tour</p>
                    </a>
                </div>
            </div>
            <div class="page-wrapper">
                <p>
                    <a href="#section01" id="btnPage01" class="button-page active">
                        <i class="fa fa-circle"></i>
                    </a>
                </p>
                <p>
                    <a href="#section02" id="btnPage02" class="button-page">
                        <i class="fa fa-circle"></i>
                    </a>
                </p>
                <p>
                    <a href="#section03" id="btnPage03" class="button-page">
                        <i class="fa fa-circle"></i>
                    </a>
                </p>
            </div>
        </div>
        <!-- <a href="#section02"><span></span>Scroll</a> -->
    </section>
    <section id="section02" class="demo">
        <div class="container">
            <img src="<?= templates('assets') ?>img/logo-bi.png" width="120px">
            <img class="ml-1" src="<?= templates('assets') ?>img/logo-tutwuri.png" width="52px">
            <img class="ml-3" src="<?= templates('assets') ?>img/bpcb.png" width="52px">
            <div class="judul-wrapper">
                <p class="judulx" style="font-size: 2.5rem">About</p>
                <p class="judulx">Fort Rotterdam</p>
            </div>
            <div class="card-wrapper">
                <div class="icon">
                    <img src="<?= templates('assets') ?>icon/luas.svg" width="30%">
                    <p class="mt-2">Luas Lahan</p>
                    <p class="jum-info-icon" id="luasLahan" name="luasLahan">12,41 ha</p>
                </div>
                <div class="icon">
                    <img src="<?= templates('assets') ?>icon/luas-bangunan.svg" width="30%">
                    <p class="mt-2">Luas Bangunan</p>
                    <p class="jum-info-icon" id="luasLahan" name="luasLahan">12,41 ha</p>
                </div>
                <div class="icon">
                    <img src="<?= templates('assets') ?>icon/tahun-dibangun.svg" width="30%">
                    <p class="mt-2">Tahun Dibangun</p>
                    <p class="jum-info-icon" id="tahunDibangun" name="tahunDibangun">1550</p>
                </div>
                <div class="icon">
                    <img src="<?= templates('assets') ?>icon/jumlah-bangunan.svg" width="30%">
                    <p class="mt-2">Jumlah Bangunan</p>
                    <p class="jum-info-icon" id="jumlahBangunan" name="jumlahBangunan">1550</p>
                </div>
                <div class="icon">
                    <img src="<?= templates('assets') ?>icon/jumlah-koleksi.svg" width="30%">
                    <p class="mt-2">Jumlah Koleksi</p>
                    <p class="jum-info-icon" id="jumlahKoleksi" name="jumlahKoleksi">1550</p>
                </div>
            </div>
        </div>
    </section>
    <section id="section03" class="demo">
        <div class="d-flex" style="height: 100%">
            <div class="img-peta-wrap" style="height: 100%">
                <div class="mapouter">
                    <div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=fort%20rotterdam&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div>
                    <style>
                        .mapouter {
                            position: relative;
                            text-align: right;
                            height: 100%;
                            width: 100%;
                        }

                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            height: 100%;
                            width: 100%;
                        }
                    </style>
                </div>
            </div>
        </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="<?= templates('assets') ?>js//popper.min.js"></script>
    <script src="<?= templates('assets') ?>js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $('a[href*=#]').on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: $($(this).attr('href')).offset().top
                }, 500, 'linear');
            });
        });
    </script>
    <script>
        $(window).scroll(function(e) {
            console.log($(this).scrollTop());
            if ($(window).scrollTop() < 450) {
                $('#btnPage01').addClass("active");
                $('#btnPage02').removeClass("active");
                $('#btnPage03').removeClass("active");
            } else if (($(window).scrollTop() > 450) && ($(window).scrollTop() < 1050)) {
                $('#btnPage02').addClass("active");
                $('#btnPage01').removeClass("active");
                $('#btnPage03').removeClass("active");
            } else if ($(window).scrollTop() > 1050) {
                $('#btnPage03').addClass("active");
                $('#btnPage01').removeClass("active");
                $('#btnPage02').removeClass("active");
            }

        });
    </script>
</body>

</html>