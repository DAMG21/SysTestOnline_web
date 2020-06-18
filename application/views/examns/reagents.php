 <!-- Content Wrapper. Contains page content -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <div class="content-wrapper fuente_roboto">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reactivos - <?php echo $this->session->userdata('exam') ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('page/panel');?>">Panel de control</a></li>
              <li class="breadcrumb-item active">Reactivos de examen</li>
            </ol>
          </div>
        </div>
            <center>
               <a class="btn btn-app" data-toggle="modal" data-target="#add_reagent">
                  <i class="fas fa-plus"></i> Agregar reactivo
                </a>
            </center>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    	 <?php if (is_null($reagents)) {?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i>¡No hay reactivos creados!</h5>
                  No se encontraron reactivos.
                </div>                                      
            <?php  }else{?>
      <div class="container-fluid">
      <div class="alert alert-info alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <h5><i class="icon fas fa-info"></i>  Información!</h5>
         Los reactivos están seleccionados en la respuesta correcta, las preguntas de respuesta abierta son a criterio del docente que califica.
      </div>
        <div class="row">
        	<?php
        	$cont=0;
              foreach ($reagents->result() as $detail_reagents){
            ?>
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header bg-primary">
                <h3 class="card-title">Pregunta <?php echo $cont=$cont+1;?>: <strong><?php echo $detail_reagents->question;?></strong></h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>

              <div class="card-body" style="display: block;">
			    <?php
					switch ($detail_reagents->type_question) {
					    case "multiple_choice":
				          if ($detail_reagents->img_exercise === null ) {
							  echo '<div class="form-group">
										<div class="row">
											<div class="col-sm-3">
						                        <div class="custom-control custom-radio">
						                          <input class="custom-control-input" type="radio" id="1" name="customRadio">
						                          <label for="1" class="custom-control-label text-danger"><font style="horizontal-align: inherit;"><font style="horizontal-align: inherit; ">'.$detail_reagents->option_incorrect1.'</font></font></label>
						                        </div>
						                    </div>
						                    <div class="col-sm-3">
						                        <div class="custom-control custom-radio">
						                          <input class="custom-control-input" type="radio" id="2" name="customRadio">
						                          <label for="2" class="custom-control-label text-danger"><font style="horizontal-align: inherit;"><font style="horizontal-align: inherit;">'.$detail_reagents->option_incorrect2.'</font></font></label>
						                        </div>
						                    </div>
						                    <div class="col-sm-3">
						                        <div class="custom-control custom-radio">
						                          <input class="custom-control-input" type="radio" id="3" name="customRadio" checked="" checked>
						                          <label for="3" class="custom-control-label text-success" checked><font style="horizontal-align: inherit;"><font style="horizontal-align: inherit;">'.$detail_reagents->option_correct.'</font></font></label>
						                        </div>
						                    </div>
						                    <div class="col-sm-3">
						                        <div class="custom-control custom-radio">
						                          <input class="custom-control-input" type="radio" id="4" name="customRadio">
						                          <label for="4" class="custom-control-label text-danger"><font style="horizontal-align: inherit;"><font style="horizontal-align: inherit;">'.$detail_reagents->option_incorrect3.'</font></font></label>
						                        </div>
						                    </div>
						                </div>
						            </div>';
						          } elseif ($detail_reagents->img_exercise == true) {
                               $extension = pathinfo($detail_reagents->img_exercise)['extension'];
                               if ($extension=="jpg" || $extension == "jpeg" || $extension == "png") {
                    echo '<img src="../'.$detail_reagents->ruta_exercise.'" border="1" alt="Ejercicio" width="500" height="300" class="img-fluid" alt="Responsive image">';
                    echo '
                          <div class="form-group">
                            <div class="row">

                               <div class="col-sm-3">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="1" name="customRadio">
                                      <label for="1" class="custom-control-label text-danger"><font style="horizontal-align: inherit;"><font style="horizontal-align: inherit; ">'.$detail_reagents->option_incorrect1.'</font></font></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="2" name="customRadio">
                                      <label for="2" class="custom-control-label text-danger"><font style="horizontal-align: inherit;"><font style="horizontal-align: inherit;">'.$detail_reagents->option_incorrect2.'</font></font></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="3" name="customRadio" checked="" checked>
                                      <label for="3" class="custom-control-label text-success" checked><font style="horizontal-align: inherit;"><font style="horizontal-align: inherit;">'.$detail_reagents->option_correct.'</font></font></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="4" name="customRadio">
                                      <label for="4" class="custom-control-label text-danger"><font style="horizontal-align: inherit;"><font style="horizontal-align: inherit;">'.$detail_reagents->option_incorrect3.'</font></font></label>
                                    </div>
                                </div>

                            </div>
                        </div>';
                                           
                                  } else {
                      echo '<audio src="../'.$detail_reagents->ruta_exercise.'" controls="controls" type="audio/mpeg" preload="preload"></audio>';
                      echo '
                            <div class="form-group">
                              <div class="row">

                                 <div class="col-sm-3">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="1" name="customRadio">
                                      <label for="1" class="custom-control-label text-danger"><font style="horizontal-align: inherit;"><font style="horizontal-align: inherit; ">'.$detail_reagents->option_incorrect1.'</font></font></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="2" name="customRadio">
                                      <label for="2" class="custom-control-label text-danger"><font style="horizontal-align: inherit;"><font style="horizontal-align: inherit;">'.$detail_reagents->option_incorrect2.'</font></font></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="3" name="customRadio" checked="" checked>
                                      <label for="3" class="custom-control-label text-success" checked><font style="horizontal-align: inherit;"><font style="horizontal-align: inherit;">'.$detail_reagents->option_correct.'</font></font></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="4" name="customRadio">
                                      <label for="4" class="custom-control-label text-danger"><font style="horizontal-align: inherit;"><font style="horizontal-align: inherit;">'.$detail_reagents->option_incorrect3.'</font></font></label>
                                    </div>
                                </div>

                            </div>
                        </div>';                                            
                                  }
                      }
					        break;
					    case "open_question":
					    if ($detail_reagents->img_exercise === null ) {
                              echo '<textarea class="form-control" rows="3" placeholder="Argumenta tu respuesta" style="margin-top: 0px; margin-bottom: 0px; height: 68px;"></textarea>';				
                  	    }elseif($detail_reagents->img_exercise == true) {
                                  $extension = pathinfo($detail_reagents->img_exercise)['extension'];

                                  if ($extension=="jpg" || $extension == "jpeg" || $extension == "png") {
                                      echo '<img src="../'.$detail_reagents->ruta_exercise.'" border="1" class="img-fluid" alt="Ejercicio" width="500" height="300">';
                                      echo '<textarea class="form-control" rows="3" placeholder="Argumenta tu respuesta" style="margin-top: 0px; margin-bottom: 0px; height: 68px;"></textarea>';         
                                  } else {
                                     echo '<audio src="../'.$detail_reagents->ruta_exercise.'" controls="controls" type="audio/mpeg" preload="preload"></audio>';
                                     echo '<textarea class="form-control" rows="3" placeholder="Argumenta tu respuesta" style="margin-top: 0px; margin-bottom: 0px; height: 68px;"></textarea>';         
                                  }
                         }
					        break;
					    case "true_false":
              if ($detail_reagents->img_exercise === null ) {
					         echo  '<div class="form-group">
                             <div class="row">

                                 <div class="col-sm-3">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="1" name="customRadio" checked="" checked>
                                      <label for="1" class="custom-control-label text-success"><font style="horizontal-align: inherit;"><font style="horizontal-align: inherit; ">'.$detail_reagents->option_correct.'</font></font></label>
                                    </div>
                                </div>
                              <div class="col-sm-3">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="2" name="customRadio">
                                      <label for="2" class="custom-control-label text-danger"><font style="horizontal-align: inherit;"><font style="horizontal-align: inherit; ">'.$detail_reagents->option_incorrect1.'</font></font></label>
                                    </div>
                                </div>
                              
                               
                            </div>
                        </div>';
                      } elseif ($detail_reagents->img_exercise == true) {
                               $extension = pathinfo($detail_reagents->ruta_exercise)['extension'];
                               if ($extension=="jpg" || $extension == "jpeg" || $extension == "png") {
                      echo '<img src="../'.$detail_reagents->ruta_exercise.'" border="1" class="img-fluid" alt="Responsive image" width="500" height="300">';
                      echo '
                          <div class="form-group">
                              <div class="row">

                                <div class="col-sm-3">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="1" name="customRadio" checked="" checked>
                                      <label for="2" class="custom-control-label text-success"><font style="horizontal-align: inherit;"><font style="horizontal-align: inherit; ">'.$detail_reagents->option_correct.'</font></font></label>
                                    </div>
                                  </div>
                                <div class="col-sm-3">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="3" name="customRadio">
                                      <label for="3" class="custom-control-label text-danger"><font style="horizontal-align: inherit;"><font style="horizontal-align: inherit; ">'.$detail_reagents->option_incorrect1.'</font></font></label>
                                    </div>
                                </div>
                             
                            </div>
                        </div>';
                        }else{
                        echo '<audio src="../'.$detail_reagents->ruta_exercise.'" controls="controls" type="audio/mpeg" preload="preload"></audio>';
                        echo '
                          <div class="form-group">
                              <div class="row">

                                <div class="col-sm-3">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="1" name="customRadio" checked="" checked>
                                      <label for="2" class="custom-control-label text-success"><font style="horizontal-align: inherit;"><font style="horizontal-align: inherit; ">'.$detail_reagents->option_correct.'</font></font></label>
                                    </div>
                                  </div>
                                <div class="col-sm-3">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="3" name="customRadio">
                                      <label for="3" class="custom-control-label text-danger"><font style="horizontal-align: inherit;"><font style="horizontal-align: inherit; ">'.$detail_reagents->option_incorrect1.'</font></font></label>
                                    </div>
                                </div>
                             
                            </div>
                        </div>';
                        }
                    }
					        break;
				          }?>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">

                <button type="button" class="btn btn-sm btn-default" data-id_reagents="<?php echo $detail_reagents->id_reagents;?>" data-rute_exercise="<?php echo $detail_reagents->ruta_exercise;?>" data-toggle="modal" data-target="#remove_reagent"><span style="color: Tomato;"><i class="far fa-trash-alt"></i>  Eliminar reactivo</span></button>

                <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#edit_reagent" data-id_reagents="<?php echo $detail_reagents->id_reagents;?>"
                  data-type_question="<?php echo $detail_reagents->type_question;?>" data-react="<?php echo $detail_reagents->question;?>" data-option_correct="<?php echo $detail_reagents->option_correct;?>" data-option_incorrect1="<?php echo $detail_reagents->option_incorrect1;?>" data-option_incorrect2="<?php echo $detail_reagents->option_incorrect2;?>" data-option_incorrect3="<?php echo $detail_reagents->option_incorrect3;?>"><i class="far fa-edit"></i> Actualizar reactivo</button>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
          <?php 
            }
           ?>
        </div>
      </div><!-- /.container-fluid -->
      <?php 
       }
       ?>
    </section>
    <!-- /.content -->
  </div>
 <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019-2020</strong> SysTestOnline 
  </footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- jQuery -->
<script src="<?php echo base_url('assets/');?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('assets/');?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/');?>dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url('application/libraries/reagents/reagents.js');?>"></script>

<div class="modal fade fuente_roboto" id="add_reagent" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar nuevo reactivo al examen</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo site_url('page/add_reagent');?>" enctype="multipart/form-data" role="form" accept-charset="utf-8" method="post" id="add_reagent">
              <div class="form-group">
                    <label for="exampleInputEmail1">Tipo de pregunta</label>
                    <select class="form-control" id="type_question" name="type_question">
                          <option value="open_question">Respuesta abierta</option>
                          <option value="multiple_choice" selected="">Opcion Multiple</option>
                          <option value="true_false">Verdadero o falso</option>
                        </select>
               </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Descripción del reactivo</label>
                    <input type="text"  class="form-control" id="react" name="react" placeholder="Ej. Cuales de los siguientes es una metodologia Agil">
               </div>
                <h3>Puede subir una imagen o audio</h3>
               <div class="form-group">
                        <input type="file"  id="imagen_ejercicio" name="imagen_ejercicio" accept="image/gif,image/jpeg,image/jpg,image/png">
                   </div>
                    <br>
                    <br>
               <div class="form-group">
                    <label for="exampleInputEmail1">Definir la respuesta correcta</label>
                    <input type="text"  class="form-control is-valid" id="question_correct" name="question_correct"  placeholder="Ej. Metodologia SCRUM"  required>
               </div>
               <div class="form-group">
                    <label for="exampleInputEmail1">Definir una respuesta incorrecta</label>
                    <input type="text"  class="form-control is-invalid" id="question_incorrect1" name="question_incorrect1"  placeholder="Ej. Cascada" required>
               </div>
               <div class="form-group">
                    <label for="exampleInputEmail1">Definir una respuesta incorrecta</label>
                    <input type="text"  class="form-control is-invalid" id="question_incorrect2" name="question_incorrect2"  placeholder="Ej. Cascada" required>
               </div>
               <div class="form-group">
                    <label for="exampleInputEmail1">Definir una respuesta incorrecta</label>
                    <input type="text"  class="form-control is-invalid" id="question_incorrect3" name="question_incorrect3"  placeholder="Ej. Cascada" required>
               </div>
             <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Añadir</button>
             </div>
            </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<div class="modal fade fuente_roboto" id="remove_reagent" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eliminar reactivo del examen</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo site_url('page/remove_reagent');?>" role="form" accept-charset="utf-8" method="post" id="remove_reagent"> 
             <input type="hidden" name="id_reagents" id="id_reagents">
             <input type="hidden" name="rute_exercise" id="rute_exercise">
             <h2>¿Estas seguro de eliminar este reactivo del examen?</h2>
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
<div class="modal fade fuente_roboto" id="edit_reagent" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo site_url('page/edit_reagent');?>" enctype="multipart/form-data" role="form" accept-charset="utf-8" method="post" id="edit_reagent">
              <input type="hidden" name="id_reagents" id="id_reagents">
              <div class="form-group">
                    <label for="exampleInputEmail1">Tipo de pregunta</label>
                    <select class="form-control" id="type_question2" name="type_question2">
                      <option value="open_question">Respuesta abierta</option>
                      <option value="multiple_choice" selected="">Opcion Multiple</option>
                      <option value="true_false">Verdadero o falso</option>
                    </select>
               </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Descripción del reactivo</label>
                    <input type="text"  class="form-control" id="react" name="react" placeholder="Ej. Cuales de los siguientes es una metodologia Agil">
               </div>
                <h3>Puede subir una imagen o audio</h3>
                   <div class="form-group">
                        <input type="file"  id="imagen_ejercicio" name="imagen_ejercicio">
                   </div>
                    <br>
               <div class="form-group">
                    <label for="exampleInputEmail1">Definir la respuesta correcta</label>
                    <input type="text"  class="form-control is-valid" id="option_correct" name="option_correct"  placeholder="Ej. Metodologia SCRUM"  required>
               </div>
               <div class="form-group">
                    <label for="exampleInputEmail1">Definir una respuesta incorrecta</label>
                    <input type="text"  class="form-control is-invalid" id="option_incorrect1" name="option_incorrect1"  placeholder="Ej. Cascada" required>
               </div>
               <div class="form-group">
                    <label for="exampleInputEmail1">Definir una respuesta incorrecta</label>
                    <input type="text"  class="form-control is-invalid" id="option_incorrect2" name="option_incorrect2"  placeholder="Ej. Cascada" required>
               </div>
               <div class="form-group">
                    <label for="exampleInputEmail1">Definir una respuesta incorrecta</label>
                    <input type="text"  class="form-control is-invalid" id="option_incorrect3" name="option_incorrect3"  placeholder="Ej. Cascada" required>
               </div>
             <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Actualizar reactivo</button>
             </div>
            </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
	$( function() {
    $("#type_question").change( function() {
       if ($(this).val() === "true_false") {
            $("#question_incorrect2").prop("disabled", true);
            $("#question_incorrect3").prop("disabled", true);
        }
        else if ($(this).val() === "open_question") {
            $("#question_correct").prop("disabled", true);
            $("#question_incorrect1").prop("disabled", true);
            $("#question_incorrect2").prop("disabled", true);
            $("#question_incorrect3").prop("disabled", true);
        } else if ($(this).val() === "multiple_choice") {
            $("#question_correct").prop("disabled", false);
            $("#question_incorrect1").prop("disabled", false);
            $("#question_incorrect2").prop("disabled", false);
            $("#question_incorrect3").prop("disabled", false);
        } 
    });
});
</script>

<script type="text/javascript">
  $( function() {
    $("#type_question2").change( function() {
         if ($(this).val() === "true_false") {
            $("#question_incorrect2").prop("disabled", true);
            $("#question_incorrect3").prop("disabled", true);
        }
        else if ($(this).val() === "open_question") {
            $("#question_correct").prop("disabled", true);
            $("#question_incorrect1").prop("disabled", true);
            $("#question_incorrect2").prop("disabled", true);
            $("#question_incorrect3").prop("disabled", true);
        } else if ($(this).val() === "multiple_choice") {
            $("#question_correct").prop("disabled", false);
            $("#question_incorrect1").prop("disabled", false);
            $("#question_incorrect2").prop("disabled", false);
            $("#question_incorrect3").prop("disabled", false);
        } 
    });
});
</script>
<script type="text/javascript">
  $('#remove_reagent').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id_reagents = button.data('id_reagents')
    var rute_exercise = button.data('rute_exercise')
    var modal = $(this)
    modal.find('.modal-title').text('Confirmación')
    modal.find('.modal-body #id_reagents').val(id_reagents)
    modal.find('.modal-body #rute_exercise').val(rute_exercise)
  })
  $('#react_exam').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id_exam = button.data('id_exam')
    var modal = $(this)
    modal.find('.modal-title').text('Confirmación')
    modal.find('.modal-body #id_exam').val(id_exam)
  })
  $('#edit_exam').on('show.bs.modal', function (event){
    var button = $(event.relatedTarget) 
    var id_exam = button.data('id_exam')
    var exam = button.data('name_exam')
    var modal = $(this)
    modal.find('.modal-title').text('Editar examen')
    modal.find('.modal-body #id_exam').val(id_exam)
    modal.find('.modal-body #exam').val(exam)
  })
  $('#edit_reagent').on('show.bs.modal', function (event){
    var button = $(event.relatedTarget) 
    var id_reagents = button.data('id_reagents')
    var type_question = button.data('type_question')
    var react = button.data('react')
    var option_correct = button.data('option_correct')
    var option_incorrect1 = button.data('option_incorrect1')
    var option_incorrect2 = button.data('option_incorrect2')
    var option_incorrect3 = button.data('option_incorrect3')

    var modal = $(this)
    modal.find('.modal-title').text('Editar reactivo')
    modal.find('.modal-body #id_reagents').val(id_reagents)
    modal.find('.modal-body #type_question2').val(type_question)
    modal.find('.modal-body #react').val(react)
    modal.find('.modal-body #option_correct').val(option_correct)
    modal.find('.modal-body #option_incorrect1').val(option_incorrect1)
    modal.find('.modal-body #option_incorrect2').val(option_incorrect2)
    modal.find('.modal-body #option_incorrect3').val(option_incorrect3)

  })
</script>
  <style type="text/css">
    .fuente_roboto{
      font-family: 'Roboto', sans-serif;

    }
  </style>

  <script type="text/javascript">
    $(document).on('change','input[type="file"]',function(){
  // this.files[0].size recupera el tamaño del archivo
  // alert(this.files[0].size);
  
  var fileName = this.files[0].name;
  var fileSize = this.files[0].size;

  if(fileSize > 10000000){
    swal({
        title: "Tamaño de imagen o audio superado",
          text: "El tamaño maximo debe ser de 10 MB",
          icon: "error",
          button: "Continuar",
          });
    this.value = '';
    this.files[0].name = '';
  }else{
    // recuperamos la extensión del archivo
    var ext = fileName.split('.').pop();
    
    // Convertimos en minúscula porque 
    // la extensión del archivo puede estar en mayúscula
    ext = ext.toLowerCase();
    
    // console.log(ext);
    switch (ext) {
      case 'jpg':
      case 'jpeg':
      case 'png':
      case 'mp3': break;
      default:
        swal({
        title: "Archivo o documento desconocido",
          text: "Solo se acepta mp3 , imagenes Jpg y jpeg e imagenes png",
          icon: "error",
          button: "Continuar",
          });
        this.value = ''; // reset del valor
        this.files[0].name = '';
    }
  }
});
  </script>