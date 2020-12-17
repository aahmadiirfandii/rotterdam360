<?php
// Proteksi halaman
$this->admin_login->cek_login();

// Gabung layout jadi satu
require_once 'head.php';
require_once 'header.php';
require_once 'nav.php';
require_once 'content.php';
require_once 'footer.php';
