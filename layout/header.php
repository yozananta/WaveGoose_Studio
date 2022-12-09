<?php
include "config/app.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WVGS Studio</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg py-3 bg-dash-dark-2 border-bottom border-dash-dark-1 z-index-10">
            <div class="search-panel">
                <div class="search-inner d-flex align-items-center justify-content-center">
                    <div
                        class="close-btn d-flex align-items-center position-absolute top-0 end-0 me-4 mt-2 cursor-pointer">
                        <span>Close </span>
                        <svg class="svg-icon svg-icon-md svg-icon-heavy text-gray-700 mt-1">
                            <use xlink:href="#close-1"> </use>
                        </svg>
                    </div>

                </div>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-between py-1">
                <div class="navbar-header d-flex align-items-center"><a class="navbar-brand text-uppercase text-reset"
                        href="index.html">
                        <div class="brand-text brand-big"><strong class="text-primary">WVGS -</strong>
                            <strong>Studio</strong>
                        </div>
                        <div class="brand-text brand-sm"><strong class="text-primary">W</strong><strong>S</strong></div>
                    </a>
                    <button class="sidebar-toggle">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy transform-none">
                            <use xlink:href="#arrow-left-1"> </use>
                        </svg>
                    </button>
                </div>
                <ul class="list-inline mb-0">

                    <li class="list-inline-item px-lg-2">
                        <h5 class="d-none d-sm-inline-block"><small>Monday-Sunday : 08:00-22:00</small></h5>
                    </li>


                    <li class="list-inline-item logout px-lg-2"><a class="nav-link text-sm text-reset px-1 px-lg-0"
                            id="logout" href="logout.php"> <span class="d-none d-sm-inline-block">Logout </span>
                            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                <use xlink:href="#disable-1"> </use>
                            </svg></a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="sidebar-header d-flex align-items-center p-4"><img
                    class="avatar shadow-0 img-fluid rounded-circle" src="img/profil.png" alt="...">
                <div class="ms-3 title">
                    <h1 class="h5 mb-1"><?= $_SESSION['namanya']?></h1>
                    <p class="text-sm text-gray-700 mb-0 lh-1"><?= $_SESSION['level']?></p>
                </div>
            </div><span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">Main</span>
            <ul class="list-unstyled">
                <li class="sidebar-item"><a class="sidebar-link" href="index.php">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#real-estate-1"> </use>
                        </svg><span>Home </span></a></li>
                <?php if ($_SESSION['level'] == "customer") {?>
                <li class="sidebar-item"><a class="sidebar-link" href="history.php">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#envelope-1"> </use>
                        </svg><span>History Pemesanan </span></a></li>
                <?php } ?>
                <?php if ($_SESSION['level'] == "admin") {?>
                <li class="sidebar-item"><a class="sidebar-link" href="dashboard.php">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#imac-screen-1"> </use>
                        </svg><span>Dashboard </span></a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdown"
                        data-bs-toggle="collapse">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#portfolio-grid-1"> </use>
                        </svg><span>Data WVGS Studio </span></a>
                    <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                        <li><a class="sidebar-link" href="persewaan.php">Data Sewa Alat</a></li>
                        <li><a class="sidebar-link" href="sewastudio.php">Data Sewa Studio</a></li>
                        <li><a class="sidebar-link" href="alat.php">Data Alat</a></li>
                        <li><a class="sidebar-link" href="studio.php">Data Studio</a></li>
                        <li><a class="sidebar-link" href="user.php">Data User</a></li>
                    </ul>
                </li>
                <?php  } else if ($_SESSION['level'] == "petugas") {?>
                <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdown"
                        data-bs-toggle="collapse">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#portfolio-grid-1"> </use>
                        </svg><span>Data WVGS Studio </span></a>
                    <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                        <li><a class="sidebar-link" href="persewaan.php">Data Sewa Alat</a></li>
                        <li><a class="sidebar-link" href="sewastudio.php">Data Sewa Studio</a></li>
                        <li><a class="sidebar-link" href="alat.php">Data Alat</a></li>
                        <li><a class="sidebar-link" href="studio.php">Data Studio</a></li>
                        <li><a class="sidebar-link" href="user.php">Data User</a></li>
                    </ul>
                </li>


                <?php } ?>

                <li class="sidebar-item"><a class="sidebar-link" href="logout.php">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#disable-1"> </use>
                        </svg><span>Log Out</span></a></li>

        </nav>