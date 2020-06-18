<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Resultados de la Evaluación - <?php echo $this->session->userdata('exam'); ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Panel de control</a></li>
              <li class="breadcrumb-item active">Lista de calificaciones</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <?php if (is_null($information_exam)) {?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i>No se encontro resultados de esta evaluación!</h5>
                  Sin detalle del examen.
                </div>                                      
            <?php  }else{ ?>

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-text-width"></i>
                  Descripción del examen
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="row invoice-info mb-3 p-3">
                <?php
                foreach ($information_exam->result() as $information)
                      {
                    ?>
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
                    <?php 
                      }
                     ?>
              </div>
              <!-- /.card-body -->
            </div>
                    
              <!-- /.card-header -->
            <?php if (is_null($list_students)) {?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i>No se encontaron calificaciones!</h5>
                  No se encontraron alumnos ni calificaciones.
                </div>                                      
            <?php  }else{ ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list-ol"></i> Lista de Alumnos</h3>

                <div class="card-tools">
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Matricula</th>
                      <th>Nombre</th>
                      <th>Correo electronico</th>
                      <th>Respuestas correctas</th>
                      <th>Total de preguntas</th>
                      <th>Calificación</th>
                      <th>Ver examen</th>
                      <th>Eliminar evaluación</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $cont=0;
                foreach ($list_students->result() as $student)
                      {
                    ?>
                    <tr>
                      <td><?php echo $cont=$cont+1;?></td>
                      <td><?php echo $student->enrollment;?></td>
                      <td><?php echo $student->name_student.' '.$student->ap_paternal.' '.$student->ap_maternal;?></td>
                      <td><?php echo $student->email_student;?></td>
                      <td>
                        <center>
                          <span class="badge bg-primary"><?php echo $student->correct_answers;?></span>
                        </center>
                      </td>
                      <td>
                        <center>
                          <span class="badge bg-primary"><?php echo $student->total_questions;?></span>
                        </center>
                      </td>
                      <td><?php
                        if ($student->qualification < '8.0') {
                          $badge = 'danger';
                        } else {
                          $badge = 'success';
                        }
                      ?>
                        <center>
                          <span class="badge bg-<?php echo $badge;?>"><?php echo $student->qualification;?></span>
                        </center>
                      </td>
                      <td>
                        <center>
                          <button type="button" class="btn btn-sm btn-default"  data-toggle="modal" data-target="#see_exam" data-id_exam="<?php echo $student->id_exam;?>" data-id_student="<?php echo $student->id_student;?>"><i class="far fa-eye"></i></button>
                        </center>
                      </td>
                      <td>
                        <center>
                          <button type="button" class="btn btn-sm btn-default"  data-toggle="modal" data-target="#delete_evaluation" data-id_exam="<?php echo $student->id_exam;?>" data-id_student="<?php echo $student->id_student;?>" data-id_detail="<?php echo $student->id_detail;?>"><span style="color: Tomato;"><i class="far fa-trash-alt"></i></button>
                        </center>
                      </td>
                    </tr>
                    <?php 
                      }
                     ?>
                  </tbody>
                </table>
              </div>
              

              <!-- /.card-body -->
            </div>
      <?php
        $conexion = new mysqli();
        $conexion->connect('localhost','root','programacion','bd_systesto');

        if($conexion->connect_error)
        {
         die("No hubo conexion: ".$conexion->connect_error);
        }

          $id_group = $this->session->userdata('id_group');
          $id_exam = $this->session->userdata('id_exam');
          $sql1 = "SELECT * FROM evaluation_detail e, students s, exams m WHERE e.id_student = s.id_student AND e.id_group=s.id_group AND e.id_exam=m.id_exam and e.id_group='$id_group' AND e.id_exam='$id_exam'";
          $res1 = $conexion->query($sql1);
         ?>
        <?php
          $id_group = $this->session->userdata('id_group');
          $sql2 = "SELECT * FROM evaluation_detail e, students s, exams m WHERE e.id_student = s.id_student AND e.id_group=s.id_group AND e.id_exam=m.id_exam and e.id_group='$id_group' AND e.id_exam='$id_exam'";
          $res2 = $conexion->query($sql2);
        ?>
        <?php
          $id_group = $this->session->userdata('id_group');
          $sql3 = "SELECT COUNT(e.id_group) as conteo, SUM(e.qualification) as suma, AVG(e.qualification) as promedio_grupo, TRUNCATE(qualification,1) as promedio, g.detail_group, g.subject FROM evaluation_detail e, groups g where e.id_group=g.id_group and e.id_group='$id_group' AND e.id_exam='$id_exam'";
          $res3 = $conexion->query($sql3);
          ?>
          <div class="card card-primary table-responsive">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-chart-bar"></i> Estadisticas del examen</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">

                  <center>

                      <?php
                              while($fila3 = $res3->fetch_assoc()){
                               // echo "['".$fila3["detail_group"]." ".$fila3["subject"]."',".$fila3["promedio"]."],";
                      ?>  
                <div class="row">    

                  <div class="col-lg-6 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3><?php echo $fila3["conteo"]?></h3>

                        <p>Total de alumnos que realizaron la prueba</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-check"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3><?php echo $fila3["promedio"]?></h3>

                        <p>Promedio del grupo</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-award"></i>
                      </div>
                    </div>
                  </div>

            </div>
                <?php }?>
              </center>
              <br>
                <center><h3>Calificaciones de cada alumno representada en grafica de barra</h3></center>

                    <center>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                          google.charts.load('current', {'packages':['bar']});
                          google.charts.setOnLoadCallback(drawStuff);

                          function drawStuff() {
                         var data = google.visualization.arrayToDataTable([
                            ['Alumnos', 'Calificación'],
                            <?php
                              while($fila2 = $res2->fetch_assoc()){
                                echo "['".$fila2["name_student"]."',".$fila2["qualification"]."],";
                          }
                           
                            ?>
                          ]);

                            var options = {
                              title: 'Calificaciones de cada alumno',
                              width: 800,
                              legend: { position: 'none' },
                              chart: { title: '' },
                              bars: 'vertical', // Required for Material Bar Charts.
                              axes: {
                                x: {
                                  0: { side: 'top', label: 'Calificación'} // Top x-axis.
                                }
                              },
                              bar: { groupWidth: "100%" }
                            };

                            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                            chart.draw(data, options);
                          };
                        </script>
                        <div id="top_x_div" style="width: 900px; height: 500px;"></div>
                 </center>
                  <br>
                  <br>

              

              </div>
               <?php 
                      }
                     ?>
              <?php 
                      }
                     ?>
              <!-- /.card-body -->
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
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019-2020</strong> SysTestOnline 
  </footer>
  <!-- jQuery -->
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/');?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/');?>dist/js/adminlte.min.js"></script>

<!-- 
codigo sql que da de resultado el total de preguntas incorrectas de cada examen

SELECT DISTINCT r.question,r.type_question  FROM answers a, reagents_exam r, groups g where a.id_group=g.id_group and a.id_exam=r.id_exam and a.id_group=9 and a.id_exam=4 and a.answer<>1 and a.id_question=r.id_reagents ORDER BY r.question DESC LIMIT 0 , 5  -->
<div class="modal fade" id="see_exam" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo site_url('page/view_exam_student');?>" role="form" accept-charset="utf-8" method="post" id="see_exam">
               <input type="hidden" name="id_exam" id="id_exam">
               <input type="hidden" name="id_student" id="id_student">
               <h2>¿Ver examen de este alumno?</h2>
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
<div class="modal fade" id="delete_evaluation" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo site_url('page/delete_evaluation');?>" role="form" accept-charset="utf-8" method="post" id="delete_register">
               <input type="hidden" name="id_exam" id="id_exam">
               <input type="hidden" name="id_student" id="id_student">
               <input type="hidden" name="id_detail" id="id_detail">
               <h2>¿Eliminar evaluación de este alumno?</h2>
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
    $('#see_exam').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id_exam = button.data('id_exam')
    var id_student = button.data('id_student')
    var modal = $(this)
    modal.find('.modal-title').text('Confirmación')
    modal.find('.modal-body #id_exam').val(id_exam)
    modal.find('.modal-body #id_student').val(id_student)
  })
   $('#delete_evaluation').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id_exam = button.data('id_exam')
    var id_student = button.data('id_student')
    var id_detail = button.data('id_detail')
    var modal = $(this)
    modal.find('.modal-title').text('Confirmación')
    modal.find('.modal-body #id_exam').val(id_exam)
    modal.find('.modal-body #id_student').val(id_student)
    modal.find('.modal-body #id_detail').val(id_detail)
  })
   $(document).on('submit', '#delete_register', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Evaluación eliminada correctamente",
        text: "Vuelve a cargar la página para ver los cambios",
        icon: "success",
        button: "Continuar",
          }).then(function() {
              window.location = "groups";
          });
      }
     });
    });
</script>