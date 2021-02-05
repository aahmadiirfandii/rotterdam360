<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="<?= templates() ?>assets/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= templates() ?>assets/css/my-style.css">
    <link rel="stylesheet" type="text/css" href="<?= templates() ?>assets/css/slider-img.css">
    <link href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?= templates('assets') ?>img/favicon.png" />
    <style>
        body {
            background-image: url('<?= templates() ?>assets/img/pattern-3.png');
        }

        .back-btn {
            font-size: 3.2em;
            text-decoration: none;
            line-height: 1;
            color: inherit;
            position: fixed;
            top: 5px;
        }

        .back-btn:hover {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="<?= site_url('home') ?>"> <i class="fa fa-home mr-2"></i> Home</a>
        <a href="<?= site_url('home') ?>#section02"> <i class="fa fa-book mr-2"></i> About</a>
        <a href="<?= site_url('home') ?>#section03"> <i class="fa fa-map-marker-alt mr-2"></i> Location</a>
        <a href="<?= site_url('siteplan') ?>"> <i class="fa fa-arrows-alt mr-2"></i> Siteplan</a>
        <a href="<?= site_url('buildings') ?>"> <i class="fa fa-vihara mr-2"> </i> Buildings</a>
        <a href="<?= site_url('virtual-tour') . '?scene=' . $setting->first_scene ?>"> <i class="fa fa-cube mr-2"></i> Virtual Tour</a>
        <div class="logo-wrap">
            <img src="<?= templates('assets') ?>img/logo-bi.png" height="50px">
            <img class="ml-1" src="<?= templates('assets') ?>img/logo-tutwuri.png" height="40px">
            <img class="ml-3" src="<?= templates('assets') ?>img/bpcb.png" height="40px">
        </div>
    </div>

    <nav id="navbar-full" class="navbar navbar-expand-md navbar-light bg-light background-nav fixed-top">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <a href="<?= site_url('buildings') ?>" class="pl-3 pr-3 back-btn">&lsaquo;</a>
        </div>
        <div class="mx-auto order-0">
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span id="burgerMenu" class="pr-3 burger-menu" style="" onclick="openNav()">&#9776;</span>
                </li>
            </ul>
        </div>
        <div class="informasi-gedung" style="width: 100%">
            <div class="row text-center">
                <div class="col-12">
                    <h5 style="color: white">Gedung di</h5>
                    <h1 style="color: white">Fort Rotterdam</h1>
                </div>
            </div>
        </div>
    </nav>

    <nav id="navbar-half" class="navbar navbar-expand-md navbar-light bg-dark fixed-top background-nav-half" style="display: none; height: 50px">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <a href="<?= site_url('buildings') ?>" class="pl-3 pr-3 back-btn back-btn-half">&lsaquo;</a>
        </div>
        <div class="mx-auto order-0">
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span id="burgerMenuHalf" class="pr-3 burger-menu burger-menu-half" style="" onclick="openNav()">&#9776;</span>
                </li>
            </ul>
        </div>
        <div class="">
            <div class="row text-center justify-content-center">
                <div class="col-8" style="margin-top: 0rem;">
                    <h4 style="color: white">Fort Rotterdam</h4>
                </div>
            </div>
        </div>
    </nav>

    <main id="swup">
        <div class="container konten mb-2">
            <!-- <p class="nama-tempat">All Buildings</p> -->
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <?php foreach ($scenes as $scene) { ?>
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <img src="<?= images('building') . $scene->present_photo ?>" class="card-img-top" alt="<?= $scene->title ?>" height="200">
                                    <div class="card-body des-body">
                                        <h5 class="card-title" id="namaGedung" name="namaGedung"><?= $scene->title ?></h5>
                                        <p class="card-text" id="deskripsiGedung" name="deskripsi"><?= truncateWord($scene->description, 100) ?></p>
                                        <a href="<?= site_url('buildings/detail/') . $scene->scene_id ?>" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="footer-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <h2 class="clr-white">Fort Rotterdam</h2>
                        <span class="clr-white">©Fort Rotterdam 2021 - Makassar, Indonesia</span>
                        <div id="logo-wrap-footer" class="mt-3">
                            <img src="<?= templates('assets') ?>img/logo-bi-putih.png" height="50px">
                            <img class="ml-1" src="<?= templates('assets') ?>img/logo-tutwuri.png" height="40px">
                            <img class="ml-3" src="<?= templates('assets') ?>img/bpcb putih.png" height="40px">
                        </div>
                    </div>
                    <div class="col-4">
                        <h3 class="clr-white">Kunjungi Kami</h3>
                        <span class="clr-white">Jl. Ujung Pandang Nomor 1, Kelurahan Bulogading, Kecamatan Ujung Pandang, Kota Makasar, Sulawesi Selatan.</span>
                    </div>
                    <div class="col-4">
                        <h3 class="clr-white">Website</h3>
                        <div class="row">
                            <div class="col-6">
                                <a href="<?= site_url('home') ?>">
                                    <span class="clr-white">Home</span>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="<?= site_url('home') ?>#section02">
                                    <span class="clr-white">About</span>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="<?= site_url('home') ?>#section03">
                                    <span class="clr-white">Location</span>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="<?= site_url('siteplan') ?>">
                                    <span class="clr-white">Siteplan</span>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="<?= site_url('buildings') ?>">
                                    <span class="clr-white">Buildings</span>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="<?= site_url('virtual-tour') . '?scene=' . $setting->first_scene ?>">
                                    <span class="clr-white">Virtual Tour</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 text-center py-2 bg-black">
            <span class="clr-white">Design with ♡ by Upana Studio</span>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="<?= templates() ?>assets/js/popper.min.js"></script>
    <script src="<?= templates() ?>assets/js/bootstrap.min.js"></script>
    <!--     <script src="<?= assets() ?>swup/swup.js"></script>
    <script src="<?= assets() ?>swup/SwupSlideTheme.js"></script>
    <script src="<?= assets() ?>swup/script.js"></script> -->
    <script>
        var moveSlider = false;
        $(document).ready(function() {
            $(".ba-Slider").each(function(i) {
                $(this).children(".slider").mousedown(function() {
                    moveSlider = true;
                    $(this).parent().children("#before").removeClass("ease");
                    $(this).removeClass("ease");
                });
                $(this).children(".slider").mouseup(function() {
                    moveSlider = false;
                    $(this).parent().children("#before").addClass("ease");
                    $(this).addClass("ease");
                    var minmax = $(this).parent().width() / 8;
                    if ($(this).parent().children("#before").width() > $(this).parent().width() - minmax) {
                        $(this).parent().children("#before").width("100%");
                        var sOffset = $(this).parent().width() - 16.5;
                        $(this).css("left", sOffset);
                    } else if ($(this).parent().children("#before").width() < minmax) {
                        $(this).parent().children("#before").width(0);
                        var sOffset = -16.5;
                        $(this).css("left", sOffset);
                    }

                });

                $(this).mouseup(function() {
                    moveSlider = false;
                    $(this).children("#before").addClass("ease");
                    $(this).children(".slider").addClass("ease");
                    var minmax = $(this).width() / 8;
                    if ($(this).children("#before").width() > $(this).width() - minmax) {
                        $(this).children("#before").width("100%");
                        var sOffset = $(this).width() - 16.5;
                        $(this).children(".slider").css("left", sOffset);
                    } else if ($(this).children("#before").width() < minmax) {
                        $(this).children("#before").width(0);
                        var sOffset = -16.5;
                        $(this).children(".slider").css("left", sOffset);
                    }


                });
                $(this).mousemove(function(e) {
                    if (moveSlider == true) {
                        var pOffset = $(this).offset();
                        var mouseX = e.pageX - pOffset.left;
                        $(this).children("#before").width(mouseX - 0.5);
                        var sOffset = mouseX - 16.5;
                        $(this).children(".slider").css("left", sOffset);
                    }

                });
            });
        });
    </script>
    <script>
        function toogleMenu() {
            var x = document.getElementById("sideMenu");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "280px";
            document.getElementById("burgerMenu").style.display = "none";
            document.getElementById("burgerMenuHalf").style.display = "none";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("burgerMenu").style.display = "inline-block";
            document.getElementById("burgerMenuHalf").style.display = "inline-block";
        }
    </script>
    <script>
        $(window).scroll(function(event) {
            var scroll = $(window).scrollTop();
            if (scroll > 150) {
                document.getElementById("navbar-full").style.display = "none";
                document.getElementById("navbar-half").style.display = "block";
            } else if (scroll < 150) {
                document.getElementById("navbar-full").style.display = "block";
                document.getElementById("navbar-half").style.display = "none";
            }
        });
    </script>
</body>

</html>