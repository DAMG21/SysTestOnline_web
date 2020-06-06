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

  <title>Panel de Control</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/');?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

<ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="<?php echo site_url('login/logout');?>">
          <i class="fas fa-sign-out-alt"></i> Cerrar Sesión 
        </a>
      </li>   
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary ">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('page/panel');?>" class="brand-link">
      <img src="<?php echo base_url('assets/');?>logo_institucional/Logo_plataforma.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-2 img-fluid">
      <span class="brand-text font-weight-light">SysTestOnline</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex fuente_roboto">
        <div class="image">
          <img src="<?php echo base_url('assets/');?>logo_plataforma/Logo_UTA.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-2">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('nombre');?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2 fuente_roboto">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">PRINCIPAL</li>
          <li class="nav-item">
            <a href="<?php echo site_url('page/panel');?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Panel de control
              </p>
            </a>
              <li class="nav-header">MODULOS</li>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('page/my_profile');?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Mi perfil
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('page/groups');?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Grupos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('page/list_examns');?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Examenes preparados
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('page/validation_password');?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Cambiar contraseña
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <style type="text/css">
    .fuente_roboto{
      font-family: 'Roboto', sans-serif;

    }
  </style>