$(document).on('submit', '#add_exam', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Examen guardado correctamente",
          text: "Vuelve a cargar la página para ver los cambios",
          icon: "success",
          button: "Continuar",
          }).then(function() {
              location.reload();
           });
      }
     });
});

$(document).on('submit', '#remove_exam', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Examen eliminado correctamente",
          text: "Vuelve a cargar la página para ver los cambios",
          icon: "success",
          button: "Continuar",
          }).then(function() {
              location.reload();
           });
      }
     });
});
$(document).on('submit', '#edit_exam', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Examen actualizado correctamente",
          text: "Vuelve a cargar la página para ver los cambios",
          icon: "success",
          button: "Continuar",
          }).then(function() {
              location.reload();
           });
      }
     });
});