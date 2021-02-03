<body>
    <div class="layer">
    </div>
<!--     <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="<?= site_url('home') ?>">Homex</a>
        <a href="<?= site_url('home') ?>#section02">About</a>
        <a href="<?= site_url('home') ?>#section03">Location</a>
        <a href="<?= site_url('siteplan') ?>">Siteplan</a>
        <a href="<?= site_url('buildings') ?>">Buildings</a>
        <a href="<?= site_url('virtual-tour') . '?scene=' . $setting->first_scene ?>">Virtual Tour</a>
    </div> -->
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

    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top navbar-bg-none">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <p class="judulx ml-4" style="font-size: 2rem;color: #fff">Virtual Tour</p>
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
    </nav>
