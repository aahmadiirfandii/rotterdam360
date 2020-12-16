<!doctype html>
<html lang="en">

<head>
    <base href="../">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= templates() ?>assets/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= templates() ?>assets/css/my-style.css">
    <link rel="stylesheet" type="text/css" href="<?= templates() ?>assets/css/slider-img.css">
    <link href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" rel="stylesheet">
    <title>Rotterdam 360</title>
</head>

<body>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="<?= site_url('home') ?>">Home</a>
        <a href="<?= site_url('home') ?>#section02">About</a>
        <a href="<?= site_url('home') ?>#section03">Location</a>
        <a href="<?= site_url('siteplan') ?>">Siteplan</a>
        <a href="<?= site_url('buildings') ?>">Buildings</a>
    </div>
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
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
    <div class="container konten mb-5">
        <p class="nama-tempat">All Buildings</p>
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="<?= templates() ?>assets/js//popper.min.js"></script>
    <script src="<?= templates() ?>assets/js/bootstrap.min.js"></script>
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

        const clickx = document.getElementById('pencet');

        clickx.addEventListener('click', function() {
            clickx.classList.toggle('Diam');
        });
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