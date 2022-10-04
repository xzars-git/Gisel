<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url() ?>/assets/img/manpro.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    MANPRO - 2022
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url() ?>/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
</head>
<body>
  <div class="wrapper">
    <div class="sidebar" data-color="danger" data-background-color="white" data-image="<?php echo base_url() ?>/assets/img/sidebar-1.jpg">
        <div class="logo">
            <a href="<?php echo base_url() ?>" class="simple-text logo-mini">>_</a>
            <a href="<?php echo base_url() ?>" class="simple-text logo-normal">MANPRO 2022</a>
        </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item <?php if ($menu == "Dashboard") echo "active"?>">
            <a class="nav-link" href="<?php echo base_url() ?>/dashboard">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <?php if($_SESSION['role']=="ketua") { ?>
          <li class="nav-item <?php if ($menu == "Penugasan") echo "active"?>">
            <a class="nav-link" href="<?php echo base_url() ?>/penugasan">
              <i class="material-icons">task_alt</i>
              <p>Penugasan</p>
            </a>
          </li>
          <?php } ?>
          <?php if($_SESSION['role']=="mentee") { ?>
          <li class="nav-item <?php if ($menu == "Tugas") echo "active"?>">
            <a class="nav-link" href="<?php echo base_url() ?>/tugas">
              <i class="material-icons">task_alt</i>
              <p>Cek Penugasan</p>
            </a>
          </li>
          <li class="nav-item <?php if ($menu == "Sektor") echo "active"?>">
            <a class="nav-link" href="<?php echo base_url() ?>/sektor">
              <i class="material-icons">groups</i>
              <p>Cek Sektor</p>
            </a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;"><?= $menu.' - '.$_SESSION['username']; ?></a>
            <p id="countdown"></p>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Akun
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="<?php echo base_url() ?>/account/logout">Keluar</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->