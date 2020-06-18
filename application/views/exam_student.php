<html lang="en" style="height: auto;"><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>SystestOnline | Student</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/');?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="layout-top-nav" style="height: auto;">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="<?php echo base_url('assets/');?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SystestOnline</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
       
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->

      </ul>
    </div>
  </nav>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 511px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-12">

          <?php 
             foreach ($information_exam->result() as $info_exam)
             {
           ?>
          <center>
            <h1 class="m-0 text-dark"> <?php echo $info_exam->institution;?> <small><br>Materia: <?php echo $info_exam->exam;?> </small></small><small><br>Docente: <?php echo $info_exam->name_teacher;?> <?php echo $info_exam->ap_patern;?> <?php echo $info_exam->ap_matern;?> </small><small><br>Grado y Grupo: <?php echo $info_exam->detail_group;?> </small><small><br>Periodo: <?php echo $info_exam->period;?> </small><small><br>Total de preguntas: <?php echo $info_exam->show_reagents;?> </small></h1>
          </center>
            <center>
              <div class="container">
                    <div class="col-md-12 text-center">
                      <h3>Tiempo</h3>
                    </div>
                    <div class="col-md-12 text-center center-block">
                      <div id="tempo" class="btn btn-warning tamanho text">00:00</div>
                      
                    </div>
                    <div class="marginTop col-md-12 text-center center-block">
                       <button style="display:none" id="btn" onclick="cronometro(1)" type="button" class="col-md-2 col-md-offset-5 btn btn-success cargar">Iniciar examen</button>
                     </div>
                     <div class="marginTop col-md-12 text-center center-block">
                       <button style="display:none" id="btnPause" onclick="parar()" type="button" class="hide col-md-2 col-md-offset-5 btn btn-danger">Pause</button>
                     </div>
                      <div class="marginTop col-md-12 text-center center-block">
                       <button style="display:none" id="btnStop" onclick="stop()" type="button" class="hide col-md-2 col-md-offset-5 btn btn-primary" name="tiempo">Stop</button>
                     </div>
                     <div class="marginTop col-md-12 text-center center-block">
                       <div class="col-md-4 col-md-offset-4">
                          <div class="input-group">
                            <input type="hidden"  id="minutos" type="number" min="0" max="59" class="form-control" placeholder="Minutos" value="<?php echo $info_exam->min;?>">
                          </div>
                           <div class="input-group">
                           
                            <input type="hidden" id="segundos" type="number"  min="0" max="59" class="form-control" placeholder="Segundos" value="<?php echo $info_exam->seg;?>">
                            <input id="pause" type="hidden" value="0"  class="form-control">
                          </div>
                        </div>
                      </div>
                 </div>
                </center>
             <?php 
               }
              ?>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   
</head>

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
          <form action="<?php echo site_url('page_student/validation_exam');?>" name="" id="form1" method="post" id="register_teacher" role="form" accept-charset="utf-8">
        	<?php
        	$cont=0;
              foreach ($reagents_exam->result() as $detail_reagents){
            ?>
          <div class="col-12">
            <!-- Default box -->
            <div class="card card-primary card-outline">
              <div class="card-header">
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
							      echo '
                          <div class="form-group">
                            <div class="row">
                            <label>Seleccione la respuesta correcta:</label>
                              <select class="form-control" required name="'.$detail_reagents->id_reagents.'">
                                <option>Seleccionar..</option>
                                <option value="4">'.$detail_reagents->option_incorrect1.'</option>
                                <option value="2">'.$detail_reagents->option_incorrect2.'</option>
                                <option value="3">'.$detail_reagents->option_incorrect3.'</option>
                                <option value="1">'.$detail_reagents->option_correct.'</option>
                              </select>
                            </div>
                        </div>';
						          } elseif ($detail_reagents->img_exercise == true) {
                               $extension = pathinfo($detail_reagents->img_exercise)['extension'];
                               if ($extension=="jpg" || $extension == "jpeg" || $extension == "png") {
                   echo '<img src="../'.$detail_reagents->ruta_exercise.'" border="1" class="img-fluid" width="500" height="300">';
                    echo '
                          <div class="form-group">
                            <div class="row">
                            <label>Seleccione la respuesta correcta:</label>
                               <select class="form-control" required name="'.$detail_reagents->id_reagents.'">
                                <option>Seleccionar..</option>
                                <option value="4">'.$detail_reagents->option_incorrect1.'</option>
                                <option value="2">'.$detail_reagents->option_incorrect2.'</option>
                                <option value="3">'.$detail_reagents->option_incorrect3.'</option>
                                <option value="1">'.$detail_reagents->option_correct.'</option>
                              </select>
                            </div>
                        </div>';
                                           
                                  } else {
                      echo '<audio src="../'.$detail_reagents->ruta_exercise.'" controls="controls" type="audio/mpeg" preload="preload"></audio>';
                                          echo '
                          <div class="form-group">
                            <div class="row">
                            <label>Seleccione la respuesta correcta:</label>
                              <select class="form-control" required name="'.$detail_reagents->id_reagents.'">
                                <option>Seleccionar..</option>
                                <option value="4">'.$detail_reagents->option_incorrect1.'</option>
                                <option value="2">'.$detail_reagents->option_incorrect2.'</option>
                                <option value="3">'.$detail_reagents->option_incorrect3.'</option>
                                <option value="1">'.$detail_reagents->option_correct.'</option>
                              </select>
                            </div>
                        </div>';                                  
                                  }
                      }
					        break;
					    case "open_question":
					    if ($detail_reagents->img_exercise === null ) {
                              echo '<textarea class="form-control" rows="3" placeholder="Argumenta tu respuesta" style="margin-top: 0px; margin-bottom: 0px; height: 68px;" name="'.$detail_reagents->id_reagents.'"></textarea>';				
                  	    }elseif($detail_reagents->img_exercise == true) {
                                  $extension = pathinfo($detail_reagents->img_exercise)['extension'];

                                  if ($extension=="jpg" || $extension == "jpeg" || $extension == "png") {
                                      echo '<img src="../'.$detail_reagents->ruta_exercise.'" border="1" class="img-fluid" width="500" height="300">';
                                      echo '<textarea class="form-control" rows="3" placeholder="Argumenta tu respuesta" style="margin-top: 0px; margin-bottom: 0px; height: 68px;" required name="'.$detail_reagents->id_reagents.'"></textarea>';         
                                  } else {
                                     echo '<audio src="../'.$detail_reagents->ruta_exercise.'" controls="controls" type="audio/mpeg" preload="preload"></audio>';
                                     echo '<textarea class="form-control" rows="3" placeholder="Argumenta tu respuesta" style="margin-top: 0px; margin-bottom: 0px; height: 68px;" required name="'.$detail_reagents->id_reagents.'"></textarea>';         
                                  }
                         }
					        break;
					    case "true_false":
              if ($detail_reagents->img_exercise === null ) {
					          echo '
                          <div class="form-group">
                            <div class="row">
                              <label>Seleccione la respuesta correcta:</label>
                              <select class="form-control" required name="'.$detail_reagents->id_reagents.'">
                                <option>Seleccionar..</option>
                                <option value="2">'.$detail_reagents->option_incorrect1.'</option>
                                <option value="1">'.$detail_reagents->option_correct.'</option>
                              </select>
                            </div>
                        </div>';
                      }elseif ($detail_reagents->img_exercise == true) {
                               $extension = pathinfo($detail_reagents->ruta_exercise)['extension'];
                               if ($extension=="jpg" || $extension == "jpeg" || $extension == "png") {
                      echo '
                      <img src="../'.$detail_reagents->ruta_exercise.'" border="1" class="img-fluid" width="500" height="300">';
                    echo '
                          <div class="form-group">
                            <div class="row">
                              <label>Seleccione la respuesta correcta:</label>
                              <select class="form-control" required name="'.$detail_reagents->id_reagents.'">
                                <option>Seleccionar..</option>
                                <option value="2">'.$detail_reagents->option_incorrect1.'</option>
                                <option value="1">'.$detail_reagents->option_correct.'</option>
                              </select>
                            </div>
                        </div>';

                        }else{
                          echo '<audio src="../'.$detail_reagents->ruta_exercise.'" controls="controls" type="audio/mpeg" preload="preload"></audio>';
                          echo '
                          <div class="form-group">
                            <div class="row">
                              <label>Seleccione la respuesta correcta:</label>
                              <select class="form-control" required name="'.$detail_reagents->id_reagents.'">
                                <option>Seleccionar..</option>
                                <option value="2">'.$detail_reagents->option_incorrect1.'</option>
                                <option value="1">'.$detail_reagents->option_correct.'</option>
                              </select>
                            </div>
                        </div>';

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
          <button type="submit" type="button" class="btn btn-block bg-gradient-success">Enviar test</button>
          </form>
        </div>
            </div><!-- /.card -->
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright © 2019-2020 <a href="https://adminlte.io">SysTestOnline</a>.</strong> Todos lo derechos reservados.
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


</body></html>

    <script type="text/javascript">
      $(document).ready(function(){
   $(".cargar").click();
});
var minuto  = new Number();
var segundo = new Number();
var time  = new Number();

var pause = 0;
var x = 0;
function parar(){
  pause = parseInt($('#pause').val());
  if(pause === 0){
    x = 0;
  }
  
  if(x===0){
    $('#pause').val('1');
    $('#btnPause').html('Play');
    $('#btn').removeClass('disabled');
    x = 1;
  }else{
    $('#pause').val('0');
    $('#btnPause').html('Pause');

    x = 0;
    cronometro(2);
  }
}



function cronometro(aux){
  if(aux == 1){
    minuto = parseInt(($('#minutos').val() === '' ? 0 : $('#minutos').val()));
    segundo = parseInt(($('#segundos').val() === '' ? 0 : $('#segundos').val()));
    
    if(segundo != 0 || minuto != 0){
      segundo = segundo +1;
      $('#pause').val('0');
      $('#btn').addClass('disabled');
      $('#btnPause').html('Pause');
      $('#btnPause').removeClass('hide');
      $('#btnStop').removeClass('hide');
    }

    if(segundo >60 || minuto > 100 || segundo< 0 || minuto < 0){
      alert("Erro! Confira o registro informado!");
      stop();
    }
    
  }
  if(aux == 2){
    
    $('#btn').addClass('disabled');
  }
  
  if(minuto > 0 && segundo === 0){
    segundo = 60;
    minuto--;
  }
  if((segundo-1)>=0){
    segundo=segundo-1;
    if(segundo == 0 && minuto == 0){
      time="00:00";
      let timerInterval
      Swal.fire({
        title: 'Enviando examen!',
        html: 'Guardadando examen en <b></b> segundos.',
        timer: 2000,
        timerProgressBar: true,
        onBeforeOpen: () => {
          Swal.showLoading()
          timerInterval = setInterval(() => {
            const content = Swal.getContent()
            if (content) {
              const b = content.querySelector('b')
              if (b) {
                b.textContent = Swal.getTimerLeft()
              }
            }
          }, 100)
        },
        onClose: () => {
          clearInterval(timerInterval)
        }
      }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
                  var theForm = document.forms['form1'];
                 if (!theForm) {
                     theForm = document.form1;
                 }
                 theForm.submit();
        }
      })

      $('#btn').removeClass('disabled');
    }else if(segundo <10 && minuto === 0){
      time="0"+segundo;
    }else if (minuto >= 1){
      time=(minuto < 10 ? '0'+minuto : minuto)+":"+(segundo < 10 ? '0'+segundo : segundo);
    }else{
      time = segundo;
    }
    pause = parseInt($('#pause').val());
    if(pause === 0){
      tempo.innerText=time;
      setTimeout('cronometro();',1000);
    }
  }
}

function stop()
{
window.location="http://www.cristalab.com";
}
</script>


<script>

//Autor: rbedat,
//Este script permite deshabilitar:
// El boton derecho del mouse,
// El F5 y F11
// El Ctrl + F5
// El Ctrl + N y Ctrl + U
// El Ctrl + R
// El Ctrl + [<-] y el Ctrl + [->]
// El Backspace fuera de los formularios.
//  
//Tener en cuenta que utiliza los eventos: 
// onkeydown y onkeyup 

//begin desabilitar teclas

var controlprecionado = 0;
var altprecionado = 0;
function desactivarCrlAlt(teclaactual){
   //alert(teclaactual);
   var desactivar = false;
   //Ctrl + 
   if (controlprecionado==17){
      if (teclaactual==78 || teclaactual==85 ){
        //alert("Ctrl+N y Ctrl+U deshabilitado");
        desactivar=true;
      }         
      if (teclaactual==82){
        //alert("Ctrl+R deshabilitado");
        desactivar=true;
      }             
      if (teclaactual==116){
        //alert("Ctrl+F5 deshabilitado");
        desactivar=true;
      }          
      if (teclaactual==114){
        //alert("Ctrl+F3 deshabilitado");
        desactivar=true;
      }  
   }
   //Alt +
   if (altprecionado==18){
      if (teclaactual==37){
        //alert("Alt+ [<-] deshabilitado");
        desactivar=true;
      } 
      if (teclaactual==39){
        //alert("Alt+ [->] deshabilitado");
        desactivar=true;
      }     
   }
   if (teclaactual==17)controlprecionado=teclaactual;
   if (teclaactual==18)altprecionado=teclaactual;  
   return desactivar;
}
 
document.onkeyup = function(){ 
   if (window.event && window.event.keyCode==17){
 controlprecionado = 0;
   }
   if (window.event && window.event.keyCode==18){
 altprecionado = 0;
   }  
}

document.onkeydown = function(){ 
   //116->f5
   //122->f11
   //117->f6
   //114->f3
   //alert(window.event.keyCode);
   if (window.event && 
         desactivarCrlAlt(window.event.keyCode)){
     return false;
   }
   if (window.event && 
      (window.event.keyCode == 122 || 
       window.event.keyCode == 116 || 
       window.event.keyCode == 114 || 
       window.event.keyCode == 117)){
 //alert("lo siento!, no hay f5, f3, f6 ni f11 :P");
 window.event.keyCode = 505; 
   }
   if (window.event.keyCode == 505){ 
 return false; 
   } 
   if (window.event && (window.event.keyCode == 8)){
 valor = document.activeElement.value;
 if (valor==undefined) { 
    //Evita Back en página.
    //alert("lo siento!, no hay back :P");
    return false; 
 } 
 else{
    if (document.activeElement.getAttribute('type')
          =='select-one')
       { return false; } //Evita Back en select.
    if (document.activeElement.getAttribute('type')
          =='button')
       { return false; } //Evita Back en button.
    if (document.activeElement.getAttribute('type')
          =='radio')
       { return false; } //Evita Back en radio.
    if (document.activeElement.getAttribute('type')
          =='checkbox')
       { return false; } //Evita Back en checkbox.
    if (document.activeElement.getAttribute('type')
          =='file')
       { return false; } //Evita Back en file.
    if (document.activeElement.getAttribute('type')
          =='reset')
       { return false; } //Evita Back en reset.
    if (document.activeElement.getAttribute('type')
          =='submit')
       { return false; } //Evita Back en submit.
    else //Text, textarea o password
 {
 if (document.activeElement.value.length==0){ 
    //No realiza el backspace(largo igual a 0).
    return false; 
 } 
 else{ 
       //Realiza el backspace.
       document.activeElement.value.keyCode = 8; } 
     }
   }
 }
} 

</script>

<script type='text/javascript'>
$(function(){
    $(document).bind("contextmenu",function(e){
        return false;
    });
});
function my_onkeydown_handler( event ) {
    switch (event.keyCode) {
        case 116 : // 'F5'
            event.preventDefault();
            event.keyCode = 0;
            window.status = "F5 disabled";
            break;
    }
}
document.addEventListener("keydown", my_onkeydown_handler);
</script>