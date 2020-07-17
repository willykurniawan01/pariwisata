<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="<?= base_url('assets/home/assets/img/logo.png') ?>">
    <title>Wisata - <?= $judul ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url('assets/home/assets/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/home/assets/') ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/home/assets/') ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url('assets/home/assets/') ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/home/assets/') ?>css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/home/assets/') ?>css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url('assets/home/assets/') ?>css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('assets/home/assets/') ?>css/gijgo.css">
    <link rel="stylesheet" href="<?= base_url('assets/home/assets/') ?>css/animate.css">
    <link rel="stylesheet" href="<?= base_url('assets/home/assets/') ?>css/slick.css">
    <link rel="stylesheet" href="<?= base_url('assets/home/assets/') ?>css/slicknav.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <link href="<?= base_url('assets/home/assets/') ?>vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?= base_url('assets/home/assets/') ?>vendor/ionicons/css/ionicons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/home/assets/') ?>css/style.css">

    <script src="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #mymap {
            z-index: 0;
        }
    </style>
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>