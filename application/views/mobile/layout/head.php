<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Mobile</title>
  <?php
    $asset = function($url){
      return base_url("assets/mobile/".$url);
    };
  ?>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= $asset('plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= $asset('dist/css/adminlte.min.css') ?>">
  <link rel="stylesheet" href="<?= $asset('plugins/pickadate/lib/themes/default.css') ?>">
  <link rel="stylesheet" href="<?= $asset('plugins/pickadate/lib/themes/default.date.css') ?>">
  <link rel="stylesheet" href="<?= $asset('plugins/pickadate/lib/themes/default.time.css') ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="<?= $asset('plugins/jquery/jquery.min.js') ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= $asset('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= $asset('dist/js/adminlte.min.js') ?>"></script>
  <script src="<?= $asset('plugins/pickadate/lib/picker.js') ?>"></script>
  <script src="<?= $asset('plugins/pickadate/lib/picker.time.js') ?>"></script>
  <script src="<?= $asset('plugins/pickadate/lib/picker.date.js') ?>"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="<?= base_url("mobile/view") ?>" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Mobil
              </p>
            </a>
            <a href="<?= base_url("mobile/booking") ?>" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Pesanan Saya
              </p>
            </a>
            <a href="<?= base_url("mobile/verifikasi") ?>" class="nav-link">
              <i class="nav-icon fas fa-check"></i>
              <p>
                Verifikasi Identitas
              </p>
            </a>
            <a href="<?= base_url("mobile/logout.html") ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">

    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
