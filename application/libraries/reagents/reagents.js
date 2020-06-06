$(document).on('submit', '#add_reagent', function(e)
    {
      e.preventDefault();
      var parametros=new FormData($(this)[0]) //envia la imagen
     $.ajax({
      method:'post',
      url: this.action,
     data: parametros,
  contentType: false,
  processData: false,
      success:function(data)
      {
         swal({
      title: 'Reactivo creado correctamente',
    text: "Vuelve a cargar la página para ver los cambios",
    icon: "success",
    button: "Continuar",
      }).then(function() {
              location.reload();
      });
      }
     });
    });
$(document).on('submit', '#remove_reagent', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Reactivo eliminado correctamente del examen",
          text: "Vuelve a cargar la página para ver los cambios",
          icon: "success",
          button: "Continuar",
          }).then(function() {
              location.reload();
           });
      }
     });
    });
$(document).on('submit', '#edit_reagent', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Reactivo actualizado correctamente",
          text: "Vuelve a cargar la página para ver los cambios",
          icon: "success",
          button: "Continuar",
          }).then(function() {
              location.reload();
           });
      }
     });
    });
