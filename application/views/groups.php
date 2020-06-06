 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	 <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="font-family: 'Roboto', sans-serif;">Grupos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right" style="font-family: 'Roboto', sans-serif;">
              <li class="breadcrumb-item"><a href="<?php echo site_url('page/panel');?>">Panel de control</a></li>
              <li class="breadcrumb-item active">Grupos</li>
            </ol>
          </div>
        </div>
        <center><button type="button" style="font-family: 'Roboto', sans-serif;" data-toggle="modal" data-target="#nuevo_grupo" class="btn btn-block btn-outline-primary btn-sm col-sm-2"><i class="fas fa-plus"></i> Agregar grupo</button></center>
      </div><!-- /.container-fluid -->
    </section>
    <br>

    <!-- Main content -->
    <section class="content">
    	    <?php if (is_null($detail_group)) {?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i>No hay grupos registrados aun!</h5>
                  No se encontraron grupos.
                </div>                                      
          <?php  }else{?>
      <div class="container-fluid">
        <div class="row">
            	<?php
              	foreach ($detail_group->result() as $group)
                      {
                    ?>
				      <div class="col-md-4">
				        <div class="card bg-default">
					        <div class="card-header bg-primary">
					          <h1 class="card-title" style="font-family: 'Roboto', sans-serif;"><?php echo $group->detail_group;?> - <?php echo $group->subject;?></h1>
					          <div class="card-tools">
					            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
					            </button>
					          </div>
					        </div>
					        <div class="card-body" style="display: block; font-family: 'Roboto', sans-serif;">
					          Materia: <?php echo $group->subject;?><br>
					          Institucion: <?php echo $group->institution;?><br>
					          Cuatrimestre: <?php echo $group->quarter;?><br>
					          Periodo: <?php echo $group->period;?><br>
                    Tiempo: <?php echo $group->min;?> Minutos con: <?php echo $group->seg;?> Segundos <br>
                    <br>
					          <button type="button" class="btn btn-block btn-default" data-id_group="<?php echo $group->id_group;?>"  data-subject="<?php echo $group->subject;?>" data-toggle="modal" data-target="#view_group"><i class="far fa-eye"></i> Ver Grupo</button>

					          <button type="button" class="btn btn-block btn-default" data-id_group="<?php echo $group->id_group;?>" data-group="<?php echo $group->detail_group;?>" data-insti="<?php echo $group->institution;?>" data-subject="<?php echo $group->subject;?>" data-quarter="<?php echo $group->quarter;?>" data-period="<?php echo $group->period;?>" data-min="<?php echo $group->min;?>" data-seg="<?php echo $group->seg;?>" data-toggle="modal" data-target="#edit_group"><i class="fas fa-pencil-alt"></i> Modificar grupo</button>

                    <button type="button" class="btn btn-block btn-default"  data-id_group="<?php echo $group->id_group;?>" data-toggle="modal" data-target="#view_results"><i class="fas fa-poll"></i> Ver calificaciones</button>

					          <button type="button" class="btn btn-block btn-default" data-id_group="<?php echo $group->id_group;?>" data-toggle="modal" data-target="#delete_group"><span style="color: Tomato;"><i class="far fa-trash-alt"></i>  Eliminar grupo</span></button>


					        </div>
					    </div>
			          </div>
          			<?php 
                      }
                     ?>
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
<script src="<?php echo base_url('application/libraries/insert_ratings/message_insert.js');?>"></script>

<div class="modal fade" id="nuevo_grupo" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" style="font-family: 'Roboto', sans-serif;">Nuevo grupo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo site_url('page/new_group');?>" role="form" accept-charset="utf-8" method="post" id="new_group"> 
             	<div class="form-group">
                    <label for="exampleInputEmail1"  style="font-family: 'Roboto', sans-serif;">Grupo</label>
                    <input type="text"  class="form-control" id="group" name="group" required  placeholder="Ej. 7-A">
              	</div>
              	<div class="form-group">
                    <label for="exampleInputEmail1" style="font-family: 'Roboto', sans-serif;">Institución</label>
                    <input type="text"  class="form-control" id="insti" name="insti" required placeholder="Ej. Universidad Tecnologica de Acapulco">
              	</div>
              	<div class="form-group">
                    <label for="exampleInputEmail1" style="font-family: 'Roboto', sans-serif;">Materia</label>
                    <input type="text"  class="form-control" id="subject" name="subject" required placeholder="Ej. Matematicas II">
              	</div>
              	<div class="form-group">
                    <label for="exampleInputEmail1" style="font-family: 'Roboto', sans-serif;">Cuatrimestre</label>
                    <input type="text"  class="form-control" id="quarter" name="quarter" required placeholder="Ej. III2019">
              	</div>
              	<div class="form-group">
                    <label for="exampleInputEmail1" style="font-family: 'Roboto', sans-serif;">Periodo</label>
                    <input type="text"  class="form-control" id="period" name="period" required placeholder="Ej. Enero-Abril">
              	</div>
             <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar grupo</button>
             </div>
            </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="delete_group" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" style="font-family: 'Roboto', sans-serif;">Nuevo grupo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo site_url('page/remove_group');?>" role="form" accept-charset="utf-8" method="post" id="delete_group"> 
             <input type="hidden" name="id_group" id="id_group">
             <h2 style="font-family: 'Roboto', sans-serif;">¿Estas seguro de eliminar este grupo de tu lista?</h2>
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

<div class="modal fade" id="view_results" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" style="font-family: 'Roboto', sans-serif;"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo site_url('page/list_exams_group');?>" role="form" accept-charset="utf-8" method="post"> 
             <input type="hidden" name="id_group" id="id_group">
             <h2 style="font-family: 'Roboto', sans-serif;">¿Ver las calificaciones de este grupo?</h2>
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

<div class="modal fade" id="edit_group" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" style="font-family: 'Roboto', sans-serif;"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo site_url('page/edit_group');?>" role="form" accept-charset="utf-8" method="post" id="edit_group">
             	<input type="hidden" name="id_group" id="id_group">
             	<div class="form-group">
                    <label for="exampleInputEmail1" style="font-family: 'Roboto', sans-serif;">Grupo</label>
                    <input type="text"  class="form-control" id="group" name="group" required  placeholder="Ej. 7-A">
              	</div>
              	<div class="form-group">
                    <label for="exampleInputEmail1" style="font-family: 'Roboto', sans-serif;">Institucion</label>
                    <input type="text"  class="form-control" id="insti" name="insti" required placeholder="Ej. Universidad Tecnologica de Acapulco">
              	</div>
              	<div class="form-group">
                    <label for="exampleInputEmail1" style="font-family: 'Roboto', sans-serif;">Materia</label>
                    <input type="text"  class="form-control" id="subject" name="subject" required placeholder="Ej. Matematicas II">
              	</div>
              	<div class="form-group">
                    <label for="exampleInputEmail1" style="font-family: 'Roboto', sans-serif;">Cuatrimestre</label>
                    <input type="text"  class="form-control" id="quarter" name="quarter" required placeholder="Ej. III2019">
              	</div>
              	<div class="form-group">
                    <label for="exampleInputEmail1" style="font-family: 'Roboto', sans-serif;">Periodo</label>
                    <input type="text"  class="form-control" id="period" name="period" required placeholder="Ej. Enero-Abril">
              	</div>
             <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar grupo</button>
             </div>
            </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="view_group" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" style="font-family: 'Roboto', sans-serif;"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
	             <form action="<?php echo site_url('page/view_group');?>" role="form" accept-charset="utf-8" method="post" id=""> 
	             <input type="hidden" name="id_group" id="id_group">
               <input type="hidden" name="subject" id="subject">
	             <h2 style="font-family: 'Roboto', sans-serif;">¿Estas seguro de ver este grupo?</h2>
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
  $('#delete_group').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id_group = button.data('id_group')
    var modal = $(this)
    modal.find('.modal-title').text('Confirmación')
    modal.find('.modal-body #id_group').val(id_group)
  })
    $('#view_results').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id_group = button.data('id_group')
    var modal = $(this)
    modal.find('.modal-title').text('Confirmación')
    modal.find('.modal-body #id_group').val(id_group)
  })
    $('#view_group').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id_group = button.data('id_group')
    var subject = button.data('subject')
    var modal = $(this)
    modal.find('.modal-title').text('Confirmación')
    modal.find('.modal-body #subject').val(subject)
    modal.find('.modal-body #id_group').val(id_group)
  })
  $('#edit_group').on('show.bs.modal', function (event){
    var button = $(event.relatedTarget) 
    var id_group = button.data('id_group')
    var group = button.data('group')
    var insti = button.data('insti')
    var subject = button.data('subject')
    var quarter = button.data('quarter')
    var period = button.data('period')
    var min = button.data('min')
    var seg = button.data('seg')

    var modal = $(this)
    modal.find('.modal-title').text('Editar grupo')
    modal.find('.modal-body #id_group').val(id_group)
    modal.find('.modal-body #group').val(group)
    modal.find('.modal-body #insti').val(insti)
    modal.find('.modal-body #subject').val(subject)
    modal.find('.modal-body #quarter').val(quarter)
    modal.find('.modal-body #period').val(period)
    modal.find('.modal-body #min').val(min)
    modal.find('.modal-body #seg').val(seg)

  })
</script>