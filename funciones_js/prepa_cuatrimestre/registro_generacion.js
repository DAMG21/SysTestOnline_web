$(document).on('submit', '#registro_generacion', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: data,
    	  text: "Vuelve a cargar la página para ver los cambios",
    	  icon: "success",
    	  button: "Continuar",
          }).then(function() {
              window.location = "preparacion_cuatrimestre";
          });
      }
     });
    });