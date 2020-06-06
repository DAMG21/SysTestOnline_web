 <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Grupos Asignados</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Principal</a></li>
              <li class="breadcrumb-item active">Grupos Asignados</li>
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
         
                  <?php if (is_null($subjects)) {?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> No se encontraron materias asignadas!</h5>
                  No se encontraron materias asignadas.
                </div>   
              <?php  }else{?>
          <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th><center>Nivel</center></th>
                      <th><center>Carrera</center></th>
                      <th><center>Cuatrimestre</center></th>
                      <th><center>Materia</center></th>
                      <th><center>Grupo</center></th>
                      <th><center>Capturar cal.</center></th>
                      <th><center>Consultar calificaciones</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      foreach ($subjects->result() as $list)
                      {
                    ?>
                    <tr>
                      <td><center><?php echo $list->ref_modalidad;?></center></td>
                      <td><center><?php echo $list->refcarrera;?></center></td>
                      <td><center><?php echo $list->refnivel;?></center></td>
                      <td><center><?php echo $list->refmateria;?></center></td>
                      <td><center><?php echo $list->refgrupo;?></center></td>
                      <td>
                        <center>
                        <button type="button" data-toggle="modal" data-target="#capture_ratings" class="btn btn-sm btn-primary" 
                        data-career="<?php echo $list->refcarrera;?>" data-subject="<?php echo $list->refmateria;?>"
                        data-group="<?php echo $list->refgrupo;?>" data-level="<?php echo $list->refnivel;?>">
                        <ion-icon name="create"></ion-icon></button>             
                        </center>
                      </td>
                      <td>
                        <center>
                        <button type="button" data-toggle="modal" data-target="#partial_qualifications" class="btn btn-sm btn-primary" 
                        data-career="<?php echo $list->refcarrera;?>" data-subject="<?php echo $list->refmateria;?>"
                        data-group="<?php echo $list->refgrupo;?>" data-level="<?php echo $list->refnivel;?>">
                        <ion-icon name="eye"></ion-icon></button>             
                        </center>
                      </td>
                    </tr>
                    <?php 
                      }
                     ?>
                <?php echo 'Total de materias a impartir: ' . $subjects->num_rows();?>
                  </tbody>
            </table>
            <?php }?>



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


<div class="modal fade" id="capture_ratings" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Confirmación</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
              <form action="<?php echo site_url('page/student_list_capture');?>" role="form" accept-charset="utf-8" method="post" > 
               <input type="hidden" id="career" name="career">
               <input type="hidden" id="group" name="group">
               <input type="hidden" id="level" name="level">
               <input type="hidden" id="subject" name="subject">
               <h3>¿Desea capturar calificaciones?</h3>
                <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Aceptar y continuar</button>
                </div>
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="partial_qualifications" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Confirmación</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
              <form action="<?php echo site_url('page/partial_qualifications');?>" role="form" accept-charset="utf-8" method="post" > 
               <input type="hidden" id="career" name="career">
               <input type="hidden" id="group" name="group">
               <input type="hidden" id="level" name="level">
               <input type="hidden" id="subject" name="subject">
               <h3>¿Desea consultar calificaciones?</h3>
                <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Aceptar y continuar</button>
                </div>
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
 $('#capture_ratings').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var career = button.data('career')
    var group = button.data('group')
    var level = button.data('level')
    var subject = button.data('subject') 
    var modal = $(this)
    modal.find('#career').val(career)
    modal.find('#group').val(group)
    modal.find('#level').val(level)
    modal.find('#subject').val(subject)
  })
 $('#partial_qualifications').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var career = button.data('career')
    var group = button.data('group')
    var level = button.data('level')
    var subject = button.data('subject') 
    var modal = $(this)
    modal.find('#career').val(career)
    modal.find('#group').val(group)
    modal.find('#level').val(level)
    modal.find('#subject').val(subject)
  })
</script>