$(document).on('submit', '#add_student', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Alumno añadido correctamente",
          text: "Vuelve a cargar la página para ver los cambios",
          icon: "success",
          button: "Continuar",
          }).then(function() {
              location.reload();
           });
      }
     });
    });

$(document).on('submit', '#remove_student', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Alumno eliminado correctamente",
          text: "Vuelve a cargar la página para ver los cambios",
          icon: "success",
          button: "Continuar",
          }).then(function() {
              location.reload();
           });
      }
     });
    });

$(document).on('submit', '#edit_student', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Alumno actualizado correctamente",
          text: "Vuelve a cargar la página para ver los cambios",
          icon: "success",
          button: "Continuar",
          }).then(function() {
              location.reload();
           });
      }
     });
    });