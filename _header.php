<?php
require_once "_config/config.php";
require "_assets/vendor/autoload.php";
if(!isset($_SESSION['user'])){
    echo "<script>window.location='".base_url('auth/login.php')."'</script>";
}
$nip = $_SESSION['nip'];
$query_pegawai = mysqli_query($con, "SELECT * FROM pegawai WHERE nip = '$nip' ") or die(mysqli_error($con));
$data_pegawai = mysqli_fetch_array($query_pegawai);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POSYANDU | CIBATU</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url('_assets/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('_assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('_assets/plugins/iCheck/all.css')?>">
  <link rel="stylesheet" href="<?=base_url('_assets/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('_assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('_assets/dist/css/AdminLTE.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('_assets/dist/css/skins/_all-skins.min.css')?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic')">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header" >

    <!-- Logo -->
    <a href="<?=base_url('_assets/index2.html')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>PSY</b></span>
      <span class="logo-lg"><b>Posyandu</b>CIBATU</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top "  >
      <!-- Sidebar toggle button-->
      <a href="" class="sidebar-toggle" data-toggle="push-menu" role="button"></a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="<?=base_url('auth/logout.php')?>">
              <b>KELUAR &emsp; <i class="glyphicon glyphicon-share"></i></b>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img style="height: 48px; " src="<?=base_url()?>/uploads/img/posyandu.png"  alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
            <small><?=$data_pegawai['nama']?></small><br>
            <small><?=$data_pegawai['nip']?></small><br>
            <small style="color:gray;"><?=$_SESSION['level']?></small>
          </p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">M E N U</li>
        <li>
          <a href="<?=base_url('dashboard')?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
        </li>
        <?php if($_SESSION['level'] ==  'Admin' ) { ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Master</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?=base_url('vitamin')?>"><i class="fa fa-circle-o"></i> Vitamin</a></li>
              <li><a href="<?=base_url('pegawai')?>"><i class="fa fa-circle-o"></i> Pegawai</a></li>
              <li><a href="<?=base_url('pengguna')?>"><i class="fa fa-circle-o"></i> Pengguna</a></li>
            </ul>
          </li>
        <?php } ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if($_SESSION['level'] ==  'User' || $_SESSION['level']  == 'Admin' ) { ?>
              <li><a href="<?=base_url('ibu')?>"><i class="fa fa-circle-o"></i> Ibu</a></li>
              <li><a href="<?=base_url('anak')?>"><i class="fa fa-circle-o"></i> Anak</a></li>
              <li><a href="<?=base_url('imunisasi')?>"><i class="fa fa-circle-o"></i> Imunisasi</a></li>
            <?php } ?>
          </ul>
        </li>
        <?php if($_SESSION['level'] ==  'Admin') {?>
          <li>
            <a href="#">
              <i class="fa fa-calendar"></i> <span>Laporan</span>
            </a>
          </li>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
