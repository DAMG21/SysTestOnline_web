$(document).on('submit', '#all_active_tokens', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Accesos generado correctamente",
          text: "Vuelve a cargar la página para ver los cambios",
          icon: "success",
          button: "Continuar",
          }).then(function() {
              location.reload();
           });
      }
     });
    });
$(document).on('submit', '#all_deactivate_tokens', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Accesos cerrados correctamente",
          text: "Vuelve a cargar la página para ver los cambios",
          icon: "success",
          button: "Continuar",
          }).then(function() {
              location.reload();
           });
      }
     });
    });

$(document).on('submit', '#add_token', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Token habilitado correctamente",
          text: "Vuelve a cargar la página para ver los cambios",
          icon: "success",
          button: "Continuar",
          }).then(function() {
              location.reload();
           });
      }
     });
    });
$(document).on('submit', '#remove_token', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Token deshabilitado correctamente",
          text: "Vuelve a cargar la página para ver los cambios",
          icon: "success",
          button: "Continuar",
          }).then(function() {
              location.reload();
           });
      }
     });
    });

$(document).on('submit', '#assign_exam', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Examen asignado correctamente",
          text: "Vuelve a cargar la página para ver los cambios",
          icon: "success",
          button: "Continuar",
          }).then(function() {
              location.reload();
           });
      }
     });
    });
$(document).on('submit', '#configuration', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Configuracion guardada correctamente",
          text: "Vuelve a cargar la página para ver los cambios",
          icon: "success",
          button: "Continuar",
          }).then(function() {
              location.reload();
           });
      }
     });
    });
$(document).on('submit', '#desassign_exam', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      success:function(data)
      {
        swal({
        title: "Examen desasignado correctamente",
          text: "Vuelve a cargar la página para ver los cambios",
          icon: "success",
          button: "Continuar",
          }).then(function() {
              location.reload();
           });
      }
     });
    });