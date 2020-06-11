 <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark fuente_roboto">Vista del examen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item fuente_roboto"><a href="<?php echo site_url('page/panel');?>">Principal</a></li>
              <li class="breadcrumb-item active fuente_roboto">Revisión de examen</li>
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
          <div class="col-md-12">
            <?php if (is_null($information)) {?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i>No se encontro descripcion del examen!</h5>
                  Sin detalle del examen.
                </div>                                      
            <?php  }else{ ?>

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-text-width"></i>
                  Detalle del examen
                </h3>
              </div>
              <!-- /.card-header -->
              <?php
                foreach ($information->result() as $information)
                      {
                    ?>
              <div class="row invoice-info mb-3 p-3">
                <div class="col-sm-3 invoice-col">
                  <address>
                    <strong>Nombre del examen</strong><br>
                    <?php echo $information->exam;?><br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-2 invoice-col">
                  <address>
                    <strong>Grado y grupo</strong><br>
                    <?php echo $information->detail_group;?><br>
                  </address>
                </div>

                <div class="col-sm-3 invoice-col">
                  <address>
                    <strong>Institución</strong><br>
                    <?php echo $information->institution;?><br>
                  </address>
                </div>
                <div class="col-sm-2 invoice-col">
                  <address>
                    <strong>Periodo</strong><br>
                    <?php echo $information->period;?><br>
                  </address>
                </div>
                <div class="col-sm-2 invoice-col">
                  <address>
                    <strong>Cuatrimestre</strong><br>
                    <?php echo $information->quarter;?><br>
                  </address>
                </div>
              </div>

              <div class="row invoice-info mb-3 p-3">
                <div class="col-sm-3 invoice-col">
                  <address>
                    <strong>Nombre del alumno</strong><br>
                    <?php echo $information->name_student.' '.$information->ap_paternal.' '.$information->ap_maternal;?><br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-2 invoice-col">
                  <address>
                    <strong>Respuestas correctas</strong><br>
                    <?php echo $information->correct_answers;?><br>
                  </address>
                </div>

                <div class="col-sm-2 invoice-col">
                  <address>
                    <strong>Respuestas Incorrectas</strong><br>
                     <?php $answer_incorrect = $information->total_questions - $information->correct_answers;
                     echo $answer_incorrect;
                     ?><br>
                  </address>
                </div>
                <div class="col-sm-3 invoice-col">
                  <address>
                    <strong>Total de preguntas</strong><br>
                    <?php echo $information->total_questions;?><br>
                  </address>
                </div>
                <div class="col-sm-2 invoice-col">
                  <address>
                    <strong>Calificacion final</strong><br>
                    <?php echo $information->qualification;?><br>
                  </address>
                </div>

              </div>
                      <?php 
                        }
                       ?>
              <!-- /.card-body -->
            </div>
          
                  <?php 
                      }
                     ?>

      <div class="col-lg-12">

          <?php
          $cont=0;

              foreach ($detail_exam->result() as $detail){
            ?>
          <div class="col-12">
            <!-- Default box -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Pregunta <?php echo $cont=$cont+1;?>: <strong><?php echo $detail->question;?></strong></h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>

              <div class="card-body" style="display: block;">
          <?php
          switch ($detail->type_question) {
              case "multiple_choice":
                  if ($detail->img_exercise === null ) {

                        switch ($detail->answer) {
                          case "1":
                              echo "<div class='alert alert-success alert-dismissible'>
                                      <h5><i class='icon fas fa-check'></i>Correcta</h5>
                                      Respuesta correcta: ".$detail->option_correct."
                                    </div>";
                              break;
                          case "2":
                              echo "<div class='alert alert-danger alert-dismissible'>
                                      <h5><i class='icon fas fa-ban'></i> Incorrecta</h5>
                                      La respuesta: ".$detail->option_incorrect2." es incorrecta, la respuesta correcta es: ".$detail->option_correct."
                                    </div>";
                              break;
                          case "3":
                              echo "<div class='alert alert-danger alert-dismissible'>
                                      <h5><i class='icon fas fa-ban'></i> Incorrecta</h5>
                                      La respuesta: ".$detail->option_incorrect3." es incorrecta, la respuesta correcta es: ".$detail->option_correct."
                                    </div>";
                              break;
                          case "4":
                              echo "<div class='alert alert-danger alert-dismissible'>
                                      <h5><i class='icon fas fa-ban'></i> Incorrecta</h5>
                                      La respuesta: ".$detail->option_incorrect1." es incorrecta, la respuesta correcta es: ".$detail->option_correct."
                                    </div>";
                              break;
                          }

                      } elseif ($detail->img_exercise == true) {
                               $extension = pathinfo($detail->img_exercise)['extension'];
                               if ($extension=="jpg" || $extension == "jpeg" || $extension == "png") {
                   echo '<img src="../'.$detail->ruta_exercise.'" border="1" alt="Ejercicio" width="500" height="300">';
                        switch ($detail->answer) {
                          case "1":
                              echo "<div class='alert alert-success alert-dismissible'>
                                      <h5><i class='icon fas fa-check'></i>Correcta</h5>
                                      Respuesta correcta: ".$detail->option_correct."
                                    </div>";
                              break;
                          case "2":
                              echo "<div class='alert alert-danger alert-dismissible'>
                                      <h5><i class='icon fas fa-ban'></i> Incorrecta</h5>
                                      La respuesta: ".$detail->option_incorrect2." es incorrecta, la respuesta correcta es: ".$detail->option_correct."
                                    </div>";
                              break;
                          case "3":
                              echo "<div class='alert alert-danger alert-dismissible'>
                                      <h5><i class='icon fas fa-ban'></i> Incorrecta</h5>
                                      La respuesta: ".$detail->option_incorrect3." es incorrecta, la respuesta correcta es: ".$detail->option_correct."
                                    </div>";
                              break;
                          case "4":
                              echo "<div class='alert alert-danger alert-dismissible'>
                                      <h5><i class='icon fas fa-ban'></i> Incorrecta</h5>
                                      La respuesta: ".$detail->option_incorrect1." es incorrecta, la respuesta correcta es: ".$detail->option_correct."
                                    </div>";
                              break;
                          }
                                           
                                  } else {

                      echo '<audio src="../'.$detail->ruta_exercise.'" controls="controls" type="audio/mpeg" preload="preload"></audio>';

                        switch ($detail->answer) {
                          case "1":
                              echo "<div class='alert alert-success alert-dismissible'>
                                      <h5><i class='icon fas fa-check'></i>Correcta</h5>
                                      Respuesta correcta: ".$detail->option_correct."
                                    </div>";
                              break;
                          case "2":
                              echo "<div class='alert alert-danger alert-dismissible'>
                                      <h5><i class='icon fas fa-ban'></i> Incorrecta</h5>
                                      La respuesta: ".$detail->option_incorrect2." es incorrecta, la respuesta correcta es: ".$detail->option_correct."
                                    </div>";
                              break;
                          case "3":
                              echo "<div class='alert alert-danger alert-dismissible'>
                                      <h5><i class='icon fas fa-ban'></i> Incorrecta</h5>
                                      La respuesta: ".$detail->option_incorrect3." es incorrecta, la respuesta correcta es: ".$detail->option_correct."
                                    </div>";
                              break;
                          case "4":
                              echo "<div class='alert alert-danger alert-dismissible'>
                                      <h5><i class='icon fas fa-ban'></i> Incorrecta</h5>
                                      La respuesta: ".$detail->option_incorrect1." es incorrecta, la respuesta correcta es: ".$detail->option_correct."
                                    </div>";
                              break;
                          }

                                  }
                      }
                  break;
              case "open_question":
              if ($detail->img_exercise === null ) {
                      if ($detail->flag==="1") {
                                          echo "<div class='alert alert-success alert-dismissible'>
                                                  <h5><i class='icon fas fa-check'></i>Correcta</h5>
                                                  Respuesta correcta
                                                </div>";
                                            }elseif ($detail->flag==="0") {
                                          echo "<div class='alert alert-danger alert-dismissible'>
                                                  <h5><i class='icon fas fa-times'></i>Incorrecta</h5>
                                                  Respuesta incorrecta
                                                </div>";
                                            }else{
                                            echo "<div class='alert alert-warning alert-dismissible'>
                                              <h5><i class='icon fas fa-exclamation-triangle'></i> Sin evaluar</h5>
                                              Pregunta aun sin evaluar.
                                            </div>";
                                          }

                                   echo "<h4> Respuesta contestada: ".$detail->answer."</h4> ";   
                                   echo "<button type='button' data-toggle='modal' data-target='#open_question_correct' data-id_answer='$detail->id_answer' data-id_student='$detail->id_student' data-id_exam='$detail->id_exam' class='btn btn-sm btn-success'><i class='fas fa-check'></i></button>

                                      <button type='button' data-toggle='modal' data-target='#open_question_incorrect' data-id_answer='$detail->id_answer' data-id_student='$detail->id_student' data-id_exam='$detail->id_exam' class='btn btn-sm btn-danger'><i class='fas fa-times'></i></button>";
 

                        }elseif($detail->img_exercise == true) {
                                  $extension = pathinfo($detail->img_exercise)['extension'];

                                  if ($extension=="jpg" || $extension == "jpeg" || $extension == "png") {

                                      if ($detail->flag==="1") {
                                              echo "<div class='alert alert-success alert-dismissible'>
                                                  <h5><i class='icon fas fa-check'></i>Correcta</h5>
                                                  Respuesta correcta
                                                </div>";
                                            }elseif ($detail->flag==="0") {
                                          echo "<div class='alert alert-danger alert-dismissible'>
                                                  <h5><i class='icon fas fa-times'></i>Incorrecta</h5>
                                                  Respuesta incorrecta
                                                </div>";
                                            }else{
                                            echo "<div class='alert alert-warning alert-dismissible'>
                                              <h5><i class='icon fas fa-exclamation-triangle'></i> Sin evaluar</h5>
                                              Pregunta aun sin evaluar.
                                            </div>";
                                          }
                                      echo '<img src="../'.$detail->ruta_exercise.'" border="1" alt="Ejercicio" width="500" height="300"> <br>';
                                      echo "<h4> Respuesta contestada: ".$detail->answer."</h4> ";   
                                      echo "<button type='button' data-toggle='modal' data-target='#open_question_correct' data-id_answer='$detail->id_answer' data-id_student='$detail->id_student' data-id_exam='$detail->id_exam' class='btn btn-sm btn-success'><i class='fas fa-check'></i></button>

                                      <button type='button' data-toggle='modal' data-target='#open_question_incorrect' data-id_answer='$detail->id_answer' data-id_student='$detail->id_student' data-id_exam='$detail->id_exam' class='btn btn-sm btn-danger'><i class='fas fa-times'></i></button>";
     
                                  } else {
                                     if ($detail->flag==="1") {
                                              echo "<div class='alert alert-success alert-dismissible'>
                                                  <h5><i class='icon fas fa-check'></i>Correcta</h5>
                                                  Respuesta correcta
                                                </div>";
                                            }elseif ($detail->flag==="0") {
                                          echo "<div class='alert alert-danger alert-dismissible'>
                                                  <h5><i class='icon fas fa-times'></i>Incorrecta</h5>
                                                  Respuesta incorrecta
                                                </div>";
                                            }else{
                                            echo "<div class='alert alert-warning alert-dismissible'>
                                              <h5><i class='icon fas fa-exclamation-triangle'></i> Sin evaluar</h5>
                                              Pregunta aun sin evaluar.
                                            </div>";
                                          }

                                     echo '<audio src="../'.$detail->ruta_exercise.'" controls="controls" type="audio/mpeg" preload="preload"></audio>';
                                     echo "<h4> Respuesta contestada: ".$detail->answer."</h4> "; 
                                       
                                   echo "<button type='button' data-toggle='modal' data-target='#open_question_correct' data-id_answer='$detail->id_answer' data-id_student='$detail->id_student' data-id_exam='$detail->id_exam' class='btn btn-sm btn-success'><i class='fas fa-check'></i></button>

                                      <button type='button' data-toggle='modal' data-target='#open_question_incorrect' data-id_answer='$detail->id_answer' data-id_student='$detail->id_student' data-id_exam='$detail->id_exam' class='btn btn-sm btn-danger'><i class='fas fa-times'></i></button>";    
                                  }
                         }
                  break;
              case "true_false":
              if ($detail->img_exercise === null ) {

                        switch ($detail->answer) {
                          case "1":
                              echo "<div class='alert alert-success alert-dismissible'>
                                      <h5><i class='icon fas fa-check'></i>Correcta</h5>
                                      Respuesta correcta: ".$detail->option_correct."
                                    </div>";
                              break;
                          case "2":
                              echo "<div class='alert alert-danger alert-dismissible'>
                                      <h5><i class='icon fas fa-ban'></i> Incorrecta</h5>
                                      La respuesta: ".$detail->option_incorrect1." es incorrecta, la respuesta correcta es: ".$detail->option_correct."
                                    </div>";
                              break;
                          
                          }
                      }elseif ($detail->img_exercise == true) {
                               $extension = pathinfo($detail->ruta_exercise)['extension'];
                               if ($extension=="jpg" || $extension == "jpeg" || $extension == "png") {
                    echo '
                      <img src="../'.$detail->ruta_exercise.'" border="1" alt="Este es el ejemplo de un texto alternativo" width="500" height="300">';

                        switch ($detail->answer) {
                          case "1":
                              echo "<div class='alert alert-success alert-dismissible'>
                                      <h5><i class='icon fas fa-check'></i>Correcta</h5>
                                      Respuesta correcta: ".$detail->option_correct."
                                    </div>";
                              break;
                          case "2":
                              echo "<div class='alert alert-danger alert-dismissible'>
                                      <h5><i class='icon fas fa-ban'></i> Incorrecta</h5>
                                      La respuesta: ".$detail->option_incorrect1." es incorrecta, la respuesta correcta es: ".$detail->option_correct."
                                    </div>";
                              break;
                          
                          }

                        }else{
    
                          echo '<audio src="../'.$detail->ruta_exercise.'" controls="controls" type="audio/mpeg" preload="preload"></audio>';

                        switch ($detail->answer) {
                          case "1":
                              echo "<div class='alert alert-success alert-dismissible'>
                                      <h5><i class='icon fas fa-check'></i>Correcta</h5>
                                      Respuesta correcta: ".$detail->option_correct."
                                    </div>";
                              break;
                          case "2":
                              echo "<div class='alert alert-danger alert-dismissible'>
                                      <h5><i class='icon fas fa-ban'></i> Incorrecta</h5>
                                      La respuesta: ".$detail->option_incorrect1." es incorrecta, la respuesta correcta es: ".$detail->option_correct."
                                    </div>";
                              break;
                          
                          }

                        }
                         }
                    

                  break;
                  }?>

              </div>

            </div>
            <!-- /.card -->

          </div>
          <?php 
            }
           ?>
        </div>
            
          <!-- /.col-md-6 -->
        </div>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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

<div class="modal fade" id="open_question_correct" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" style="font-family: 'Roboto', sans-serif;"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo site_url('page/open_question_correct');?>" role="form" accept-charset="utf-8" method="post" id="question_correct"> 
             <input type="hidden" name="id_answer" id="id_answer">
             <input type="hidden" name="id_exam" id="id_exam">
             <input type="hidden" name="id_student" id="id_student">
             <h2 style="font-family: 'Roboto', sans-serif;">¿Estas seguro de evaluar esta respuesta como: Correcta?</h2>
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
<div class="modal fade" id="open_question_incorrect" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" style="font-family: 'Roboto', sans-serif;"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo site_url('page/open_question_incorrect');?>" role="form" accept-charset="utf-8" method="post" id="question_incorrect"> 
             <input type="hidden" name="id_answer" id="id_answer">
             <input type="hidden" name="id_exam" id="id_exam">
             <input type="hidden" name="id_student" id="id_student">
             <h2 style="font-family: 'Roboto', sans-serif;">¿Estas seguro de evaluar esta respuesta como: Incorrecta?</h2>
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
  $('#open_question_correct').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id_answer = button.data('id_answer')
    var id_student = button.data('id_student')
    var id_exam = button.data('id_exam')
    var modal = $(this)
    modal.find('.modal-title').text('Confirmación')
    modal.find('.modal-body #id_answer').val(id_answer)
    modal.find('.modal-body #id_exam').val(id_exam)
    modal.find('.modal-body #id_student').val(id_student)
  })
  $('#open_question_incorrect').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id_answer = button.data('id_answer')
    var id_student = button.data('id_student')
    var id_exam = button.data('id_exam')
    var modal = $(this)
    modal.find('.modal-title').text('Confirmación')
    modal.find('.modal-body #id_answer').val(id_answer)
    modal.find('.modal-body #id_exam').val(id_exam)
    modal.find('.modal-body #id_student').val(id_student)
  })
     $(document).on('submit', '#question_correct', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Modificado a respuesta: Correcta",
        text: "Vuelve a cargar la página para ver los cambios",
        icon: "success",
        button: "Continuar",
          });
      }
     });
    });
  $(document).on('submit', '#question_incorrect', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Modificado a respuesta: Incorrecta",
        text: "Vuelve a cargar la página para ver los cambios",
        icon: "success",
        button: "Continuar",
          });
      }
     });
    });
</script>