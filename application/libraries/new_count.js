$(document).on('submit', '#register_teacher', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Docente registrado correctamente",
        text: "Vuelve a cargar la página para ver los cambios",
        icon: "success",
        button: "Continuar",
          });
      }
     });
    });
