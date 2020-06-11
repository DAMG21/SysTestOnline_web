<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SysTest Online</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>
<body class="login-page" style="min-height: 512.391px;">
<div class="login-box">

  <div class="login-logo">
    <a href="#"><b>SysTest</b>Online</a><b>Teacher</b>
  </div>
    
  <center><img src="<?php echo base_url('assets/logo_plataforma/');?>logo-SysTest.png" width="200" height="200"></center>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">No compartas contraseña con terceros</p>
      <form action="<?php echo site_url('login/auth');?>" method="post">
        <p style="color: red"><?php echo $this->session->flashdata('msg');?></p> 
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recordarme
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Acceder</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
<!-- 
      <p class="mb-1">
        <a href="#">Olvide mi contraseña</a>
      </p>
      -->
      <p class="mb-1">
        <a href="<?php echo site_url('new_count/register_teacher');?>">Registrar nueva cuenta</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>

</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/');?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/');?>dist/js/adminlte.min.js"></script>
</body></html>

