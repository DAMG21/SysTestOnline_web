 <!-- Content Wrapper. Contains page content -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <div class="content-wrapper fuente_roboto">
  	 <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Examenes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('page/panel');?>">Panel de control</a></li>
              <li class="breadcrumb-item active">Examenes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <br>

    <!-- Main content -->
    <section class="content">
    	    <?php if (is_null($exams)) {?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i>No hay historial de examenes!</h5>
                  No se encontraron examenes.
                </div>                                      
            <?php  }else{?>
        <div class="container-fluid">
        	<div class="card">
              <div class="card-header">
                <h3 class="card-title">Historial de examenes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>                  
                    <tr>
                      <th><center>No.</center></th>
                      <th><center>Examen</center></th>
                      <th><center>Estado</center></th>
                      <th><center>Ver resultados</center></th>
                      <th><center>Eliminar</center></th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php
                  	$cont=0;
              	foreach ($exams->result() as $detail_exam)
                      {
                    ?>
                    <tr>
                      <td><center><?php echo $cont=$cont+1;?></center></td>
                      <td><center><?php echo $detail_exam->exam;?></center></td>
                       <td>
                        <center>
                          <?php   if ($detail_exam->active==1) {
                            echo '<i class="fas fa-check"></i> Activo';
                          } else {
                            echo '<i class="fas fa-times"></i> Inactivo';
                          }
                           ?>
                        </center>
                      </td>
                      <td>
                      	<center>
                          <button type="button" data-toggle="modal" data-target="#see_exam" class="btn btn-block btn-default" data-exam="<?php echo $detail_exam->exam;?>" data-id_exam="<?php echo $detail_exam->id_exam;?>" data-id_group="<?php echo $detail_exam->id_group;?>">
                          <i class="far fa-eye"></i>
                          </button>
                        </center>
                      </td>
                      <td>
                      	<center>
                      	  <button type="button" data-toggle="modal" data-target="#remove_exam" class="btn btn-block btn-default" data-id_assign="<?php echo $detail_exam->id_assign;?>">
                          <span style="color: Tomato;"><i class="far fa-trash-alt"></i></span>
                          </button>
                      	</center>
                      </td>
                    </tr>
                    <?php 
                      }
                     ?>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
       <?php 
        }
       ?>   
        </div>
    </section>
    <!-- /.content -->
 <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      
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
<script src="<?php echo base_url('application/libraries/exams/exams_message.js');?>"></script>

<div class="modal fade fuente_roboto" id="see_exam" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar nuevo examen</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo site_url('page/list_qualification');?>" role="form" accept-charset="utf-8" method="post" id="see_exam">
                <h2>¿Ver resultados de este examen?</h2>
                <input type="hidden" name="id_group" id="id_group">
                <input type="hidden" name="id_exam" id="id_exam">
                <input type="hidden" name="exam" id="exam">
             <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Aceptar y continuar</button>
             </div>
            </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>

<div class="modal fade fuente_roboto" id="remove_exam" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eliminar examen</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo site_url('page/remove_assign_exam');?>" role="form" accept-charset="utf-8" method="post" id="remove_exam"> 
             <input type="hidden" name="id_assign" id="id_assign">
             <h2>¿Estas seguro de eliminar este examen de tu lista?</h2>
             <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
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
  $('#remove_exam').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id_assign = button.data('id_assign')
    var modal = $(this)
    modal.find('.modal-title').text('Confirmación')
    modal.find('.modal-body #id_assign').val(id_assign)
  })
  $('#see_exam').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id_exam = button.data('id_exam')
    var id_group = button.data('id_group')
    var exam = button.data('exam')
    var modal = $(this)
    modal.find('.modal-title').text('Confirmación')
    modal.find('.modal-body #id_exam').val(id_exam)
    modal.find('.modal-body #id_group').val(id_group)
    modal.find('.modal-body #exam').val(exam)
  })



</script>
  <style type="text/css">
    .fuente_roboto{
      font-family: 'Roboto', sans-serif;

    }
  </style>