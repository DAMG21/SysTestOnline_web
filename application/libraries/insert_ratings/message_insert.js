$(document).on('submit', '#new_group', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Grupo registrado correctamente",
          text: "Vuelve a cargar la página para ver los cambios",
          icon: "success",
          button: "Continuar",
          }).then(function() {
              window.location = "groups";
          });
      }
     });
    });
$(document).on('submit', '#delete_group', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Grupo eliminado correctamente",
          text: "Vuelve a cargar la página para ver los cambios",
          icon: "success",
          button: "Continuar",
          }).then(function() {
              window.location = "groups";
          });
      }
     });
    });
$(document).on('submit', '#edit_group', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Grupo editado correctamente",
          text: "Vuelve a cargar la página para ver los cambios",
          icon: "success",
          button: "Continuar",
          }).then(function() {
              window.location = "groups";
          });
      }
     });
    });




