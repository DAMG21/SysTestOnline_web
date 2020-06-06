$(document).on('submit', '#registro_plantel', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      beforeSend:function(data)
      {
        window.swal({
              title: "Guardando...",
              text: "Please wait",
              showConfirmButton: false,
              allowOutsideClick: false
            });
      },
      success:function(data)
      {
        swal({
        title: data,
    	  text: "Vuelve a cargar la página para ver los cambios",
    	  icon: "success",
    	  button: "Continuar",
          }).then(function() {
              window.location = "registro";
          });
      }
     });
    });

$(document).on('submit', '#registro_modalidad', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      beforeSend:function(data)
      {
        window.swal({
              title: "Guardando...",
              text: "Please wait",
              showConfirmButton: false,
              allowOutsideClick: false
            });
      },
      success:function(data)
      {
        swal({
        title: data,
        text: "Vuelve a cargar la página para ver los cambios",
        icon: "success",
        button: "Continuar",
          }).then(function() {
              window.location = "registro";
          });
      }
     });
    });

$(document).on('submit', '#registro_carreras', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      beforeSend:function(data)
      {
        window.swal({
              title: "Guardando...",
              text: "Please wait",
              showConfirmButton: false,
              allowOutsideClick: false
            });
      },
      success:function(data)
      {
        swal({
        title: data,
        text: "Vuelve a cargar la página para ver los cambios",
        icon: "success",
        button: "Continuar",
          }).then(function() {
              window.location = "registro";
          });
      }
     });
    });

$(document).on('submit', '#registro_estudio', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      beforeSend:function(data)
      {
        window.swal({
              title: "Guardando...",
              text: "Please wait",
              showConfirmButton: false,
              allowOutsideClick: false
            });
      },
      success:function(data)
      {
        swal({
        title: data,
        text: "Vuelve a cargar la página para ver los cambios",
        icon: "success",
        button: "Continuar",
          }).then(function() {
              window.location = "registro";
          });
      }
     });
    });

$(document).on('submit', '#registro_materias', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      beforeSend:function(data)
      {
        window.swal({
              title: "Guardando...",
              text: "Please wait",
              showConfirmButton: false,
              allowOutsideClick: false
            });
      },
      success:function(data)
      {
        swal({
        title: data,
        text: "Vuelve a cargar la página para ver los cambios",
        icon: "success",
        button: "Continuar",
          }).then(function() {
              window.location = "registro";
          });
      }
     });
    });

$(document).on('submit', '#registro_bajas', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      beforeSend:function(data)
      {
        window.swal({
              title: "Guardando...",
              text: "Please wait",
              showConfirmButton: false,
              allowOutsideClick: false
            });
      },
      success:function(data)
      {
        swal({
        title: data,
        text: "Vuelve a cargar la página para ver los cambios",
        icon: "success",
        button: "Continuar",
          }).then(function() {
              window.location = "registro";
          });
      }
     });
    });
$(document).on('submit', '#estatus', function(e)
    {
     e.preventDefault();
     $.ajax({
      method:'post',
      url: this.action,
      data: $(this).serialize(),
      beforeSend:function(data)
      {
        window.swal({
              title: "Guardando...",
              text: "Please wait",
              showConfirmButton: false,
              allowOutsideClick: false
            });
      },
      success:function(data)
      {
        swal({
        title: data,
        text: "Vuelve a cargar la página para ver los cambios",
        icon: "success",
        button: "Continuar",
          }).then(function() {
              window.location = "registro";
          });
      }
     });
    });
