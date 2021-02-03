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
        <a href="<?= site_url('home') ?>">Home</a>
        <a href="<?= site_url('home') ?>#section02">About</a>
        <a href="<?= site_url('home') ?>#section03">Location</a>
        <a href="<?= site_url('siteplan') ?>">Siteplan</a>
        <a href="<?= site_url('buildings') ?>">Buildings</a>
        <a href="<?= site_url('virtual-tour') . '?scene=' . $setting->first_scene ?>">Virtual Tour</a>
    </div>
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <a href="<?= site_url('buildings') ?>" class="pl-3 pr-3 back-btn">&lsaquo;</a>
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2" style="margin-left: 5rem;">
            <img class="mr-2" src="<?= templates() ?>assets/img/logo-bi.png" height="55px">
            <img class="mr-3" src="<?= templates() ?>assets/img/logo-tutwuri.png" height="40px">
            <img class="" src="<?= templates() ?>assets/img/bpcb.png" width="40px">
        </div>
        <div class="mx-auto order-0">
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
                </li>
            </ul>
        </div>
    </nav>
    <main id="swup">
        <div class="container konten">
            <p class="nama-tempat"> <i class="fa fa-vihara mr-2"></i> <span id="namaTempat" name="namaTempat"><?= $scene->title ?></span></p>
            <div class="card no-border">
                <div class="card-body">
                    <div id="sliderWrap" class="ba-Slider mb-4" unselectable='on' onselectstart='return false;' onmousedown='return false;'>
                        <div id="before"><img src="<?= images('building') . $scene->present_photo ?>" id="slider1" /></div>
                        <div class="slider"></div>
                        <div id="after"><img src="<?= images('building') . $scene->past_photo ?>" id="slider2" /></div>
                    </div>
                    <div class="mb-2 px-4">
                        <h5>Deskripsi :</h5>
                        <label id="deskripsiFoto" name="deskripsiFoto" class="text-justify">
                            <?= $scene->description ?>
                        </label>
                    </div>
                    <?php if ($scene->type != 'none') : ?>
                        <div class="p-3 text-center">
                            <a href="<?= site_url('virtual-tour') . '?scene=' . $scene->scene_id ?>" class="btn btn-danger">Lihat Foto 360</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="<?= templates() ?>assets/js/popper.min.js"></script>
    <script src="<?= templates() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= assets() ?>swup/swup.js"></script>
    <script src="<?= assets() ?>swup/SwupSlideTheme.js"></script>
    <script src="<?= assets() ?>swup/script.js"></script>
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
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>

</html>