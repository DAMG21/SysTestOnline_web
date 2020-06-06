 <!-- Content Wrapper. Contains page content -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header fuente_roboto">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cambiar contraseña</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('page/panel');?>">Panel de control</a></li>
              <li class="breadcrumb-item active">Validacion de contraseña</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 p-5">

            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link disabled" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Validar contraseña actual</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false" onclick="deshabilitar(this)">Nueva contraseña</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Contraseña actual</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" type="button" class="btn btn-info">Validar contraseña</button>
                    </div>
                  </div>


                  <div class="tab-pane fade active show" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

                  	 <form action="<?php echo site_url('page/update_password');?>" method="post" id="validation_password" role="form" accept-charset="utf-8">
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Nueva contraseña</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Nueva contraseña" required >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Repetir contraseña</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="repeat_password" name="repeat_password" placeholder="Nueva contraseña" required>
                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-info">Actualizar contraseña</button>
                      </div>
                    </form>
                  </div>

                </div>
              </div>
              <!-- /.card -->
            </div>


          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      V 1.0.0.0
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019-2020</strong> SysTestOnline 
  </footer>
  <!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/');?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/');?>dist/js/adminlte.min.js"></script>


<script type="text/javascript">
$('.disabled').click(function(e){
    e.preventDefault();
})
</script>

<script type="text/javascript">
$(document).on('submit', '#validation_password', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        if (data==1) {
          swal({
          title: 'Contraseña modificada correctamente',
            text: "Se cerrara la sesion",
            icon: "success",
            button: "Continuar",
            }).then(function(){
             window.location.href = "logout";
        })  
        }else{
          swal({
          title: 'Las contraseñas no coinciden',
            text: "Vuelve a cargar la página para ver los cambios",
            icon: "error",
            button: "Continuar",
            }).then(function() {
                location.reload();
             });
        }

      }
     });
});
</script>
  <style type="text/css">
    .fuente_roboto{
      font-family: 'Roboto', sans-serif;

    }
  </style>