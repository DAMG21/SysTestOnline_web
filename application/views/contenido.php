  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark fuente_roboto">Panel de control</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item fuente_roboto"><a href="<?php echo site_url('page/panel');?>">Principal</a></li>
              <li class="breadcrumb-item active fuente_roboto">Panel de control</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content fuente_roboto">
      <div class="container-fluid">
        <div class="row">
          <div class="info-box m-2 col-sm-3"  onclick="location.href='<?php echo site_url('page/my_profile');?>';">
              <span class="info-box-icon bg-info"><i class="fas fa-user"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Mi perfil</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <div class="info-box m-2 col-sm-4" onclick="location.href='<?php echo site_url('page/groups');?>';">
              <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Grupos</span>
                
              </div>
              <!-- /.info-box-content -->
            </div>
            <div class="info-box m-2 col-sm-4" onclick="location.href='<?php echo site_url('page/list_examns');?>';">
              <span class="info-box-icon bg-info"><i class="fas fa-book-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Examenes preparados</span>
              </div>
              <!-- /.info-box-content -->
            </div>
           
            <div class="info-box m-2 col-sm-3" onclick="location.href='<?php echo site_url('page/validation_password');?>';">
              <span class="info-box-icon bg-info"><i class="fas fa-unlock-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cambiar contraseña</span>
                
              </div>
              <!-- /.info-box-content -->
            </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      V 1.0.0.0
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019-2020</strong> SysTestOnline
  </footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/');?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/');?>dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url('assets/');?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
</body>
</html>
  <style type="text/css">
    .fuente_roboto{
      font-family: 'Roboto', sans-serif;

    }
  </style>