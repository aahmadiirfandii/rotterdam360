<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>

    <link href="<?= templates('assets') ?>css/bootstrap.min.css" crossorigin="anonymous" rel="stylesheet">
    <link href="<?= templates('assets') ?>css/my-style.css" type="text/css" rel="stylesheet">
    <link href="<?= templates('assets') ?>css/slider-img.css" type="text/css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?= templates('assets') ?>img/favicon.png"/>
    <?php if ($style) $this->load->view($style); ?>

</head>
