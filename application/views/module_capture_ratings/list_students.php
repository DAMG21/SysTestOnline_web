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
                      <?php if (is_null($students)) {?>
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
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $fecha=strftime( "%Y-%m-%d", time() );
                     echo ' <strong>Materia:</strong>' . $this->session->userdata('subject');
                    $cont=0;
                      foreach ($students->result() as $data_students)
                      {
                    ?>
                    
                    <tr>
                      <td><center><?php echo $cont=$cont+1; ?></center>
                      <td><center><?php echo $data_students->matricula;?></center></td>
                      <td><center><?php echo $data_students->nombre;?> <?php echo $data_students->ap_paterno;?> <?php echo $data_students->ap_materno;?></center>
                        </td>
                      <td style="width: 10px">
                        <center>
                          <?php 
                         if(($fecha>=$data_students->fecha_ipparcial)&&($fecha<=$data_students->fecha_fpparcial)){?>
                          <button type="button" data-toggle="modal" data-target="#cap_partial1" class="btn btn-sm btn-primary" data-period="<?php echo $data_students->refcuatri;?>" data-quarter="<?php echo $data_students->refnivel;?>" data-group="<?php echo $data_students->refgrupo;?>" data-subject="<?php echo $this->session->userdata('subject');?>" data-enrollment="<?php echo $data_students->matricula;?>" data-student="<?php echo  $data_students->nombre;?> <?php echo $data_students->ap_paterno;?> <?php echo $data_students->ap_materno;?>">
                            <ion-icon name="create"></ion-icon>
                         <?php  }else{
                          echo "<p class='text-danger'>Evaluación no disponible</p>";                         }

                          ?>
                          
                        </center>                         
                        </td>
                        <td style="width: 10px">
                          <center>
                            <?php 
                         if(($fecha>=$data_students->fecha_isparcial)&&($fecha<=$data_students->fecha_fsparcial)){?>
                          <button type="button" data-toggle="modal" data-target="#cap_partial2" class="btn btn-sm btn-primary" data-period="<?php echo $data_students->refcuatri;?>" data-quarter="<?php echo $data_students->refnivel;?>" data-group="<?php echo $data_students->refgrupo;?>" data-subject="<?php echo $this->session->userdata('subject');?>" data-enrollment="<?php echo $data_students->matricula;?>" data-student="<?php echo  $data_students->nombre;?> <?php echo $data_students->ap_paterno;?> <?php echo $data_students->ap_materno;?>"><ion-icon name="create"></ion-icon>
                             <?php  }else{
                          echo "<p class='text-danger'>Evaluación no disponible</p>";                         }

                          ?>
                        </center>                        
                        </td>
                         <td style="width: 10px">
                          <center>
                            <?php 
                         if(($fecha>=$data_students->fecha_itparcial)&&($fecha<=$data_students->fecha_ftparcial)){?>
                          <button type="button" data-toggle="modal" data-target="#cap_partial3" class="btn btn-sm btn-primary" data-period="<?php echo $data_students->refcuatri;?>" data-quarter="<?php echo $data_students->refnivel;?>" data-group="<?php echo $data_students->refgrupo;?>" data-subject="<?php echo $this->session->userdata('subject');?>" data-enrollment="<?php echo $data_students->matricula;?>" data-student="<?php echo  $data_students->nombre;?> <?php echo $data_students->ap_paterno;?> <?php echo $data_students->ap_materno;?>"><ion-icon name="create"></ion-icon>
                             <?php  }else{
                          echo "<p class='text-danger'>Evaluación no disponible</p>";                         }

                          ?>
                        </center>                        
                        </td>
                    </tr>
                    <?php 
                      }
                     ?>
                <?php echo ' <strong>Total de alumnos:</strong> ' . $students->num_rows();?>

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
<script src="<?php echo base_url('application/libraries/insert_ratings/message_insert.js');?>"></script>

<div class="modal fade" id="cap_partial1" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Confirmación</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="<?php echo site_url('page/cap_partial1');?>" role="form" accept-charset="utf-8" method="post" id="cap_partial1" > 
                <input type="hidden" id="period" name="period">
                <input type="hidden" id="quarter" name="quarter">
                <input type="hidden" id="group" name="group">
                <input type="hidden" id="subject" name="subject">
                <input type="hidden" id="enrollment" name="enrollment">
                <input type="hidden" id="student" name="student">
                <div class="form-group">
                    <label for="exampleInputEmail1">Periodo</label>
                    <input type="text" class="form-control" id="period" name="period" disabled>
                </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Nivel</label>
                    <input type="text" class="form-control" id="quarter" name="quarter" disabled>
              </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Grupo</label>
                    <input type="text" class="form-control" id="group" name="group" disabled>
              </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Materia</label>
                    <input type="text" class="form-control" id="subject" name="subject" disabled>
              </div> 
              <div class="form-group">
                    <label for="exampleInputEmail1">Matricula del alumno</label>
                    <input type="text" class="form-control" id="enrollment" name="enrollment" disabled>
              </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" id="student" name="student" disabled>
              </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Asignar calificacion</label>
                    <input type="number" step="any" class="form-control" id="qualification" name="qualification" required>
              </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Faltas</label>
                    <input type="number"  class="form-control" id="faults" name="faults" required>
              </div>         
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Capturar calificacion</button>
              </div>
            </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="cap_partial2" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Confirmación</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="<?php echo site_url('page/cap_partial2');?>" role="form" accept-charset="utf-8" method="post" id="cap_partial1"  readonly>
                <input type="hidden" id="period" name="period">
                <input type="hidden" id="quarter" name="quarter">
                <input type="hidden" id="group" name="group">
                <input type="hidden" id="subject" name="subject">
                <input type="hidden" id="enrollment" name="enrollment">
                <input type="hidden" id="student" name="student">
                <div class="form-group">
                    <label for="exampleInputEmail1">Periodo</label>
                    <input type="text" class="form-control" id="period" name="period" readonly >
                </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Nivel</label>
                    <input type="text" class="form-control" id="quarter" name="quarter"  readonly>
              </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Grupo</label>
                    <input type="text" class="form-control" id="group" name="group"  readonly>
              </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Materia</label>
                    <input type="text" class="form-control" id="subject" name="subject"  readonly>
              </div> 
              <div class="form-group">
                    <label for="exampleInputEmail1">Matricula del alumno</label>
                    <input type="text" class="form-control" id="enrollment" name="enrollment"   readonly>
              </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" id="student" name="student" readonly>
              </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Asignar calificacion</label>
                    <input type="number" step="any" class="form-control" id="qualification" name="qualification" required>
              </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Faltas</label>
                    <input type="number" class="form-control" id="faults" name="faults" required>
              </div>         
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Capturar calificacion</button>
              </div>
            </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="cap_partial3" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Confirmación</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="<?php echo site_url('page/cap_partial3');?>" role="form" accept-charset="utf-8" method="post" id="cap_partial1" >
                <input type="hidden" id="period" name="period">
                <input type="hidden" id="quarter" name="quarter">
                <input type="hidden" id="group" name="group">
                <input type="hidden" id="subject" name="subject">
                <input type="hidden" id="enrollment" name="enrollment">
                <input type="hidden" id="student" name="student">
                <div class="form-group">
                    <label for="exampleInputEmail1">Periodo</label>
                    <input type="text" class="form-control" id="period" name="period"  disabled>
                </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Nivel</label>
                    <input type="text" class="form-control" id="quarter" name="quarter"  disabled>
              </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Grupo</label>
                    <input type="text" class="form-control" id="group" name="group"  disabled>
              </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Materia</label>
                    <input type="text" class="form-control" id="subject" name="subject"  disabled>
              </div> 
              <div class="form-group">
                    <label for="exampleInputEmail1">Matricula del alumno</label>
                    <input type="text" class="form-control" id="enrollment" name="enrollment"   disabled>
              </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" id="student" name="student" disabled>
              </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Asignar calificacion</label>
                    <input type="number" step="any" class="form-control" id="qualification" name="qualification" required>
              </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Faltas</label>
                    <input type="number" class="form-control" id="faults" name="faults" required>
              </div>         
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Capturar calificacion</button>
              </div>
            </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
  $('#cap_partial1').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var period = button.data('period')
    var quarter = button.data('quarter')
    var group = button.data('group')
    var subject = button.data('subject') 
    var enrollment = button.data('enrollment') 
    var student = button.data('student') 
    var modal = $(this)
    modal.find('.modal-title').text('Capturar calificacion del primer parcial al alumno(a): '+ student)
    modal.find('.modal-body #period').val(period)
    modal.find('.modal-body #quarter').val(quarter)
    modal.find('.modal-body #group').val(group)
    modal.find('.modal-body #subject').val(subject)
    modal.find('.modal-body #enrollment').val(enrollment)
    modal.find('.modal-body #student').val(student)
  })
  $('#cap_partial2').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var period = button.data('period')
    var quarter = button.data('quarter')
    var group = button.data('group')
    var subject = button.data('subject') 
    var enrollment = button.data('enrollment') 
    var student = button.data('student') 
    var modal = $(this)
    modal.find('.modal-title').text('Capturar calificacion del segundo parcial al alumno(a): '+ student)
    modal.find('.modal-body #period').val(period)
    modal.find('.modal-body #quarter').val(quarter)
    modal.find('.modal-body #group').val(group)
    modal.find('.modal-body #subject').val(subject)
    modal.find('.modal-body #enrollment').val(enrollment)
    modal.find('.modal-body #student').val(student)
  })
  $('#cap_partial3').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var period = button.data('period')
    var quarter = button.data('quarter')
    var group = button.data('group')
    var subject = button.data('subject') 
    var enrollment = button.data('enrollment') 
    var student = button.data('student') 
    var modal = $(this)
    modal.find('.modal-title').text('Capturar calificacion del tercer parcial al alumno(a): '+ student)
    modal.find('.modal-body #period').val(period)
    modal.find('.modal-body #quarter').val(quarter)
    modal.find('.modal-body #group').val(group)
    modal.find('.modal-body #subject').val(subject)
    modal.find('.modal-body #enrollment').val(enrollment)
    modal.find('.modal-body #student').val(student)
  })
  </script>