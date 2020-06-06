<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register Teacher</title>
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
  <!-- register teacher JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Registrar</b>Docente</a>
  </div>
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Registrar nuevo docente</p>
    <form action="<?php echo site_url('new_count/data_new_count');?>" method="post" id="register_teacher" role="form" accept-charset="utf-8">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nombre..."  name="nombre" id="nombre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Apellido paterno..." name="ap_paterno" id="ap_paterno">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Apellido materno..." name="ap_materno" id="ap_materno">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Correo electronico..." name="email" id="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña..." name="pass1" id="pass1">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Repetir la contraseña..." name="pass2" id="pass2">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="hidden" placeholder="Retype password" name="verf">
        </div> 
        <div class="row">
          <!-- /.col -->
            <button type="submit" class="btn btn-primary btn-block mb-3">Registrar</button>
          <!-- /.col -->
        </div>
      </form>
      <a href="../login" class="text-center">Ya tengo una cuenta.</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
<!-- jQuery -->
<script src="<?php echo base_url('assets/');?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/');?>dist/js/adminlte.min.js"></script>

<script src="<?php echo base_url('application/libraries/new_count.js');?>"></script>
</body>
</html>
<style type="text/css">
</style>

<script type="text/javascript">
  $(document).ready(function(){
  //variables
  var pass1 = $('[name=pass1]');
  var pass2 = $('[name=pass2]');
  var verf = $('[name=verf]');
  var confirmacion = "Las contraseñas si coinciden";
  var longitud = "La contraseña debe estar formada entre 6-10 carácteres (ambos inclusive)";
  var negacion = "No coinciden las contraseñas";
  var vacio = "La contraseña no puede estar vacía";
  //oculto por defecto el elemento span
  var span = $('<div></div>').insertAfter(verf);
  span.hide();
  //función que comprueba las dos contraseñas
  function coincidePassword(){
  var valor1 = pass1.val();
  var valor2 = pass2.val();
  //muestro el span
  span.show().removeClass();
  //condiciones dentro de la función
  if(valor1 != valor2){
  span.text(negacion).addClass('negacion'); 
  }
  if(valor1.length==0 || valor1==""){
  span.text(vacio).addClass('negacion');  
  }
  if(valor1.length<6 || valor1.length>10){
  span.text(longitud).addClass('negacion');
  }
  if(valor1.length!=0 && valor1==valor2){
  span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
  }
  }
  //ejecuto la función al soltar la tecla
  pass2.keyup(function(){
  coincidePassword();
  });
});
</script>