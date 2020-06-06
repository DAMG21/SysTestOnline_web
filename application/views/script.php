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

<section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-6 container-fluid">
          		<div class="callout callout-warning">
                  <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">!Recuerda!</font></font></h5>

                  <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preguntas con respuestas abiertas el docente las evaluara, copia del examen te sera enviado a tu correo electronico.</font></font></p>
                </div>
          </div>
        </div>
      </div>

    </section>
           <center><img src="https://img.icons8.com/clouds/400/000000/test-passed.png">
    		<button onclick="window.close();" type="button" class="btn btn-block btn-info btn-lg col-6"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Regresar al Inicio de sesion</font></font></button></center>



  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Examenes en linea
    </div>
    <!-- Default to the left -->
    <strong>Copyright © 2019-2020 <a href="https://adminlte.io">SysTestOnline</a>.</strong> Todos lo derechos reservados.
  </footer>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/');?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/');?>dist/js/adminlte.min.js"></script>


</body></html>


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

