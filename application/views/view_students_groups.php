<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper fuente_roboto">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de alumnos - <?php echo $this->session->userdata('subject') ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('page/panel');?>">Panel de control</a></li>
              <li class="breadcrumb-item"><a href="<?php echo site_url('page/groups');?>">Lista de grupos</a></li>
              <li class="breadcrumb-item active">Lista de alumnos</li>
            </ol>
          </div>
        </div>
            <center>
               <a class="btn btn-app" data-toggle="modal" data-target="#add_student">
                  <i class="fas fa-plus"></i> Agregar
                </a>
                <a class="btn btn-app" data-toggle="modal" data-target="#add_excel">
                  <i class="fas fa-arrow-up"></i> Subir lista de excel
               </a>
            </center>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
              <?php if (is_null($info_group)){?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i>No hay alumnos en este grupo!</h5>
                  No se encontraron alumnos.
                </div>                                      
              <?php }else{ ?>
        <div class="row">
          <div class="container-fluid">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><button type="button" onclick="window.print();" class="oculto-impresion"><i class="fas fa-print"></i></button> Lista de alumnos</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm">
                    <div class="input-group-append">
                      <button type="button" class="btn btn-block btn-default btn-sm oculto-impresion" data-toggle="modal" data-target="#all_active_tokens"><span style="color: #2ecc71;"><i class="fas fa-check"></i> Habilitar accesos</button>
                    </div>
                    <div class="input-group-append">
                      <button type="button" class="btn btn-block btn-default btn-sm oculto-impresion" data-toggle="modal" data-target="#all_deactivate_tokens"><span style="color: Tomato;"><i class="fas fa-times"></i> Deshabilitar accesos</button>
                    </div>
                    <div class="input-group-append">
                      <button type="button" class="btn btn-block btn-default btn-sm oculto-impresion" data-toggle="modal" data-target="#assign_exam_modal"><span style="color: #e67e22;"><i class="fas fa-file-export"></i> Asignar examen</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Matricula</th>
                      <th>Nombre</th>
                      <th>Correo Electronico</th>
                      <th>Token de acceso</th>
                      <th class="oculto-impresion">Estatus de acceso</th>
                      <th class="oculto-impresion">Modificar Alumno</th>
                      <th class="oculto-impresion">Eliminar Alumno</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $cont=0;
                    foreach ($info_group->result() as $group)
                     {
                      $hora = date('H:i');
                    ?>
                    <tr>
                      <td><?php echo $cont=$cont+1;?></td>
                      <td><?php echo $group->enrollment;?></td>
                      <td><?php echo $group->name_student;?> <?php echo $group->ap_paternal;?> <?php echo $group->ap_maternal;?></td>
                      <td><?php echo $group->email_student;?></td>
                      <td><?php echo $group->token_student;?></td>
                    <div class="oculto-impresion">
                      <td><?php $token = hash('crc32b', $hora.$group->enrollment.$this->session->userdata('id_group'));
                      if ($group->status == 0) { ?>
                      <button type="button" class="btn btn-block btn-default oculto-impresion" data-toggle="modal" data-target="#add_token" data-token="<?php echo $token ;?>" data-id_student="<?php echo $group->id_student;?>" data-id_group="<?php echo $group->id_group;?>" data-email="<?php echo $group->email_student;?>">Habilitar</button>
                      <?php  } else { ?>
                       <button type="button" class="btn btn-block btn-default oculto-impresion" data-toggle="modal" data-target="#remove_token" data-id_student="<?php echo $group->id_student;?>" data-id_group="<?php echo $group->id_group;?>">Deshabilitar</button>
                      <?php  }?>
                      </td>
                      <td><button type="button" class="btn btn-block btn-default oculto-impresion" data-toggle="modal" data-target="#edit_student" data-id_student="<?php echo $group->id_student;?>" data-name="<?php echo $group->name_student;?>" data-ap_paternal="<?php echo $group->ap_paternal;?>" data-ap_maternal="<?php echo $group->ap_maternal;?>" data-email="<?php echo $group->email_student;?>" data-enrollment="<?php echo $group->enrollment;?>"><i class="far fa-edit"></i></button>
                      </td>
                      <td><button type="button" class="btn btn-block btn-default oculto-impresion" data-id_student="<?php echo $group->id_student;?>" data-toggle="modal" data-target="#remove_student"><span style="color: Tomato;"><i class="far fa-trash-alt"></i></span></button>
                      </td>
                    </div>
                    </tr>
                    <?php 
                      }
                     ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
                    <?php 
                      }
                     ?>
    </div>
    </section>
    <!-- /.content -->
  </div>
 <footer class="main-footer oculto-impresion">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      V 1.0.0.0
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019-2020</strong> SysTestOnline 
  </footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <!-- jQuery -->
<script src="<?php echo base_url('assets/');?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/');?>dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url('application/libraries/insert_ratings/message_insert.js');?>"></script>
<script src="<?php echo base_url('application/libraries/students/tokens.js');?>"></script>
<script src="<?php echo base_url('application/libraries/students/students.js');?>"></script>

<div class="modal fade fuente_roboto" id="assign_exam_modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Asignación y configuración del examen</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">

         <div class="card-body">
            <h4>Opciones</h4>
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Asignar examen</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Configurar examen</a>
              </li>
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
              <div class="tab-pane fade active show" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
              
                <table class="table table-bordered">
                   <?php if (is_null($assign_exam)){?>
                        <?php if (is_null($detail_exam)){?>
                            <p>Sin examenes</p>  
                        <?php }else{ ?>
              <form action="<?php echo site_url('page/assign_exam');?>" role="form" accept-charset="utf-8" method="post" id="assign_exam">
               <input type="hidden" name="id_group" id="id_group" value="<?php echo $this->session->userdata('id_group');?>">
                      <div class="form-group">
                        <label>Selecciona el examen para asignar</label>
                        <select class="custom-select" id="id_exam" name="id_exam">
                          <?php
                          foreach ($detail_exam->result() as $exam_detail)
                           {
                          ?>
                    <option value="<?php echo $exam_detail->id_exam;?>"><?php echo $exam_detail->exam;?></option>
                          <?php 
                            }
                           ?>
                        </select>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Asignar examen</button>
                      </div>
                  </form>

                          <?php 
                            }
                          ?>
                        <?php }else{ ?>
                         <div class="alert alert-warning alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>
                          Ya hay un examen asignado para asignar otro examen elimine la asignación.
                        </div>
                  <thead>                  
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Examen</th>
                      <th>Eliminar asignación</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $cont=0;
                    foreach ($assign_exam->result() as $assign_detail)
                     {
                    ?>
                    <tr>
                      <td><?php echo $cont=$cont+1;?></td>
                      <td><?php echo $assign_detail->exam;?></td>
                      <td>
                          <button type="button" data-toggle="modal" data-target="#remove_assign" class="btn btn-block btn-danger" data-id_assign="<?php echo $assign_detail->id_assign;?>"><i class="far fa-trash-alt"></i></button>
                      </td>
                    </tr>
                    <?php 
                      }
                     ?>
                  </tbody>

                   <?php 
                      }
                     ?>
                </table>
              </div>
              <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                  <?php
                    foreach ($configuration_group->result() as $configuration)
                     {
                  ?>
                 <div class="card">
                   <div class="card-body">
                   <form action="<?php echo site_url('page/assign_configuration');?>" role="form" accept-charset="utf-8" method="post" id="configuration" >
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="font-family: 'Roboto', sans-serif;">Duración del examen - Minutos</label>
                        <input type="number"  class="form-control"  name="min" required placeholder="Ej. 50" value="<?php echo $configuration->min;?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="font-family: 'Roboto', sans-serif;">Duración del examen - Segundos</label>
                        <input type="number"  class="form-control"  name="seg" required placeholder="Ej. 10" value="<?php echo $configuration->seg;?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cuantos reactivos mostrar en el examen</label>
                        <input type="number"  class="form-control" min="1" name="show_reagents" required value="<?php echo $configuration->show_reagents;?>">
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
              </form>
                 </div>
               </div>

            <?php 
              }
              ?>
              </div>
              
            </div>


             </div>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<div class="modal fade fuente_roboto" id="add_token" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo site_url('page/add_token');?>" role="form" accept-charset="utf-8" method="post" id="add_token"> 
             <input type="hidden" name="token" id="token">
             <input type="hidden" name="id_student" id="id_student">
             <h2>¿Desea activar el token a este alumno y enviarlo al correo?</h2>
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
<div class="modal fade fuente_roboto" id="remove_token" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo site_url('page/remove_token');?>" role="form" accept-charset="utf-8" method="post" id="add_token"> 
             <input type="hidden" name="id_group" id="id_group">
             <input type="hidden" name="id_student" id="id_student">
             <h2>¿Desea desactivar el token a este alumno?</h2>
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
<div class="modal fade fuente_roboto" id="remove_assign" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo site_url('page/desassign_exam');?>" role="form" accept-charset="utf-8" method="post" id="desassign_exam">
             <input type="hidden" name="id_assign" id="id_assign">
             <h2>¿Desea eliminar esta asignacion?</h2>
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

<div class="modal fade fuente_roboto" id="remove_student" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo site_url('page/remove_student');?>" role="form" accept-charset="utf-8" method="post" id="remove_student"> 
             <input type="hidden" name="id_student" id="id_student">
             <h2>¿Desea eliminar este alumno de este grupo?</h2>
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

<div class="modal fade fuente_roboto" id="add_student" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar alumno al grupo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo site_url('page/add_student');?>" role="form" accept-charset="utf-8" method="post" id="add_student">
              <input type="hidden" name="id_group" id="id_group" value="<?php echo $this->session->userdata('id_group');?>">
              <div class="form-group">
                    <label for="exampleInputEmail1">Nombre del alumno</label>
                    <input type="text"  class="form-control" id="name_student" name="name_student" required  placeholder="Ej. Andres">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Apellido Paterno</label>
                    <input type="text"  class="form-control" id="ap_paternal" name="ap_paternal" required placeholder="Ej. Hernandez">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Apellido Materno</label>
                    <input type="text"  class="form-control" id="ap_maternal" name="ap_maternal" required placeholder="Ej. Perez">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Correo Electronico</label>
                    <input type="text"  class="form-control" id="email" name="email" required placeholder="Ej. andres.hernandez@gmail.com">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Matricula</label>
                    <input type="text"  class="form-control" id="enrollment" name="enrollment" required placeholder="Ej. 201704056">
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
<div class="modal fade fuente_roboto" id="add_excel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Subir una lista de alumnos desde Excel</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <div class="callout callout-warning">
                  <h5>Sigue estos pasos para poder subir un doc. de excel a SysTestOnline!</h5>

                  <p>1.- Crea un documento de Excel con extensión .CSV(delimitado por comas).</p>
                  <p>2.- Solo coloca el nombre, apellido paterno, apellido materno, correo electrónico y matricula como se muestra en el siguiente ejemplo.</p>
                  <li class="media my-2">
                    <img src="../ejercicios/ejemplo_excel.png" class="mr-3" alt="..." width="450" height="150">
                </div>
                <p>3.-Paramayor facilidad descargue nuestro ejemplo y solo sustituya la información  <a href="../ejercicios/ejemplo.csv">Descargar archivo csv</a>.</p>
              <form action="files.php" method="post" enctype="multipart/form-data" id="filesForm">
                  <div class="col-md-12">
                      <input type="hidden" name="group" id="group" value="<?php echo $this->session->userdata('id_group')?>">
                      <input class="form-control" type="file" name="fileContacts" required>
                      <button type="button" onclick="uploadContacts()" class="btn btn-primary form-control" >Cargar</button>
                  </div>
             </form>
               
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<div class="modal fade fuente_roboto" id="edit_student" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar alumno al grupo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo site_url('page/edit_student');?>" role="form" accept-charset="utf-8" method="post" id="edit_student">
              <input type="hidden" name="id_student" id="id_student">
              <div class="form-group">
                    <label for="exampleInputEmail1">Nombre del alumno</label>
                    <input type="text"  class="form-control" id="name_student" name="name_student" required  placeholder="Ej. Andres">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Apellido Paterno</label>
                    <input type="text"  class="form-control" id="ap_paternal" name="ap_paternal" required placeholder="Ej. Hernandez">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Apellido Materno</label>
                    <input type="text"  class="form-control" id="ap_maternal" name="ap_maternal" required placeholder="Ej. Perez">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Correo Electronico</label>
                    <input type="text"  class="form-control" id="email" name="email" required placeholder="Ej. andres.hernandez@gmail.com">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Matricula</label>
                    <input type="text"  class="form-control" id="enrollment" name="enrollment" required placeholder="Ej. 201704056">
                </div>
             <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Actualizar informacion</button>
             </div>
            </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<div class="modal fade fuente_roboto" id="all_active_tokens" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Confirmación</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo site_url('page/all_active_tokens');?>" role="form" accept-charset="utf-8" method="post" id="all_active_tokens"> 
             <input type="hidden" name="group" id="group" value="<?php echo $this->session->userdata('id_group')?>">
             <h2>¿Activar el accesos a todos los alumnos de este grupo?</h2>
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
<div class="modal fade fuente_roboto" id="all_deactivate_tokens" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Confirmación</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo site_url('page/all_deactivate_tokens');?>" role="form" accept-charset="utf-8" method="post" id="all_deactivate_tokens"> 
             <input type="hidden" name="group" id="group" value="<?php echo $this->session->userdata('id_group')?>">
             <h2>¿Cerrar los accesos a todos los alumnos de este grupo?</h2>
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
  $('#add_token').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id_student = button.data('id_student')
    var token = button.data('token')
    var email = button.data('email')
    var modal = $(this)
    modal.find('.modal-title').text('Confirmación')
    modal.find('.modal-body #id_student').val(id_student)
    modal.find('.modal-body #token').val(token)
    modal.find('.modal-body #email').val(email)
  })
  $('#remove_token').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id_student = button.data('id_student')
    var id_group = button.data('id_group')
    var modal = $(this)
    modal.find('.modal-title').text('Confirmación')
    modal.find('.modal-body #id_group').val(id_group)
    modal.find('.modal-body #id_student').val(id_student)

  })
  $('#remove_student').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id_student = button.data('id_student')
    var modal = $(this)
    modal.find('.modal-title').text('Confirmación')
    modal.find('.modal-body #id_student').val(id_student)
  })
    $('#remove_assign').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id_assign = button.data('id_assign')
    var modal = $(this)
    modal.find('.modal-title').text('Confirmación')
    modal.find('.modal-body #id_assign').val(id_assign)
  })
  $('#edit_student').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id_student = button.data('id_student')
    var name = button.data('name')
    var ap_paternal = button.data('ap_paternal')
    var ap_maternal = button.data('ap_maternal')
    var email = button.data('email')
    var enrollment = button.data('enrollment')
    var modal = $(this)
    modal.find('.modal-title').text('Editar alumno')
    modal.find('.modal-body #name_student').val(name)
    modal.find('.modal-body #id_student').val(id_student)
    modal.find('.modal-body #ap_paternal').val(ap_paternal)
    modal.find('.modal-body #ap_maternal').val(ap_maternal)
    modal.find('.modal-body #email').val(email)
    modal.find('.modal-body #enrollment').val(enrollment)
  })
</script>

<script type="text/javascript">
    function uploadContacts()
    {
        var Form = new FormData($('#filesForm')[0]);
        $.ajax({

            url: "../import.php",
            type: "post",
            data : Form,
            processData: false,
            contentType: false,
            success: function(data)
            {
                swal({
                title: "Registros subidos correctamente",
                  text: "Vuelve a cargar la página para ver los cambios",
                  icon: "success",
                  button: "Continuar",
                  }).then(function() {
                      location.reload();
                   });
            }
        });
    }
    function printDiv(nombreDiv) {
     var contenido= document.getElementById(nombreDiv).innerHTML;
     var contenidoOriginal= document.body.innerHTML;

     document.body.innerHTML = contenido;

     window.print();

     document.body.innerHTML = contenidoOriginal;
}

</script>

<style media="print">
@media print{
  .oculto-impresion, .oculto-impresion *{
    display: none !important;
  }
}
@page 
    {
        size:  auto;   /* auto es el valor inicial */
        margin: 0mm;  /* afecta el margen en la configuración de impresión */
    }

    body {
  font-size: 16px;
}
body:after {
  content: "SysTestOnline.com"; 
  font-size: 5em;  
  color: rgba(52, 166, 214, 0.4);
  z-index: 9999;
 
  display: flex;
  align-items: center;
  justify-content: center;
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
    
  -webkit-pointer-events: none;
  -moz-pointer-events: none;
  -ms-pointer-events: none;
  -o-pointer-events: none;
  pointer-events: none;

  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
}

</style>


  <style type="text/css">
    .fuente_roboto{
      font-family: 'Roboto', sans-serif;

    }
  </style>