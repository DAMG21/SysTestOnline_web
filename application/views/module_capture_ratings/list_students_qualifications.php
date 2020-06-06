<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Lista de alumnos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Principal</a></li>
              <li class="breadcrumb-item active">Lista de alumnos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
         
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="box-body">
          <center>
                      <?php if (is_null($list_students)) {?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i>No nay calificaciones asignadas aun!</h5>
                  No se encontraron alumnos ni calificaciones asignadas.
                </div>                                      
              <?php  }else{?>
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px"><center>No.</center></th>
                      <th style="width: 10px"><center>Matricula</center></th>
                      <th style="width: 9px"><center>Nombre</center></th>
                      <th style="width: 10px"><center>Primer parcial</center></th>
                      <th style="width: 10px"><center>Segundo Parcial</center></th>
                      <th style="width: 10px"><center>Tercer Parcial</center></th>
                      <th style="width: 10px"><center>Promedio</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                    $cont=0;
                      foreach ($list_students->result() as $data_students)
                      {
                       
                    ?>
                    
                    <tr>
                      <td><center><?php echo $cont=$cont+1; ?></center>
                      <td><center><?php echo $data_students->matricula;?></center></td>
                      <td><center><?php echo $data_students->nombre;?> <?php echo $data_students->ap_paterno;?> <?php echo $data_students->ap_materno;?></center>
                        <td style="width: 10px">
                        <center>
                        <center><?php echo $data_students->parcial1;?>  
                        </center>                        
                        </td>
                        <td style="width: 10px">
                        <center>
                        <center><?php echo $data_students->parcial2;?>  
                        </center>                        
                        </td>
                        <td style="width: 10px">
                        <center>
                        <center><?php echo $data_students->parcial3;?>  
                        </center>                        
                        </td>
                        <td style="width: 10px">
                          <?php
                          $promedio = ($data_students->parcial1 +  $data_students->parcial2 + $data_students->parcial3)/3;
                      if ($promedio >=9.0) {
                              $color='success';
                            }elseif ($promedio <= 7.9) {
                              $color='danger';
                            }else{
                              $color='warning';
                              }
                          ?>
                        <center>
                           <span class="badge bg-<?php echo $color;?>"><?php echo number_format($promedio,1);?></span>
                        </center>                        
                        </td>
                    </tr>
                    <?php 
                      }
                     ?>
                <?php echo ' <strong>Total de alumnos:</strong> ' . $list_students->num_rows()
                ;?>


                    <?php } ?>
                  </tbody>
            </table>
            
          </center>
        </div>
          
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
    <strong>Copyright &copy; 2019-2020</strong> Centro de Desarrollo de Software
  </footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/');?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/');?>dist/js/adminlte.min.js"></script>