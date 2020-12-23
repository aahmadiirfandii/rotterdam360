<div id="panorama"></div>
<div id="wrapDetailInformasi">
    <input type="button" id="btnInformasi" class="btn btn-primary" value="Deskripsi">
    <!-- <a href="<?= site_url('buildings') ?>" id="btnAll" class="btn btn-primary">
        <i class="fa fa-th" style="font-size: 1.4rem"></i>
    </a> -->
</div>
<div id="infoBox" class="overflow-auto" style="display: none">
    <h4 id="namaTempat" name="namaTempat"></h4>
    <p id="deskripsi" name="deskripsi" class="text-justify"></p>
    <p class="text-center" id="detail-btn-container" style="display: none;">
        <a id="detailButton" href="#" class="btn btn-sm btn-danger">Lihat Detail Lengkap</a>
    </p>
</div>
<div id="logo-wrap">
    <img src="<?= templates() ?>assets/img/logo-bi-putih.png" width="120">
</div>