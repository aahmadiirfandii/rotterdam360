<body>
    <div class="layer">
    </div>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="<?= site_url('home') ?>">Home</a>
        <a href="<?= site_url('home') ?>#section02">About</a>
        <a href="<?= site_url('home') ?>#section03">Location</a>
        <a href="<?= site_url('siteplan') ?>">Siteplan</a>
        <a href="<?= site_url('buildings') ?>">Buildings</a>
        <a href="<?= site_url('virtual-tour') . '?scene=' . $setting->first_scene ?>">Virtual Tour</a>
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
                    <span style="font-size:30px;cursor:pointer;color: #fff" onclick="openNav()">&#9776;</span>
                </li>
            </ul>
        </div>
    </nav>