$(document).ready(function() {
  mensajeInicio()
});

//>Funcion para valir solo numeros en un campo de texto
function valida(e){
  tecla = (document.all) ? e.keyCode : e.which;
  //Tecla de retroceso para borrar, siempre la permite
  if (tecla==8){
    return true;
  }
  // Patron de entrada, en este caso solo acepta numeros
  patron =/[0-9-./ ]/;
  tecla_final = String.fromCharCode(tecla);
  return patron.test(tecla_final);
}

//Registro de nuevo usuario
$("#registroNuevoUsuario").submit(function (evt) {
  evt.preventDefault();
  evt.stopPropagation();
  
  var formData = new FormData($("form#registroNuevoUsuario")[0]);
  var form = $("#registroNuevoUsuario");

    $.ajax({
     type: "POST",
     url: "jquery.php",
     data: formData,
     dataType: "json",
     //necesario para subir archivos via ajax
     cache: false,
     contentType: false,
     processData: false,
     beforeSend: function(){
      // mostrarLoader();
     //Cambiar boton guardar a enviando
     curSubmit = form.find(":submit");
     curSubmit.prop('disabled', true);
     curSubmit.text('ENVIANDO');

     },
     success: function( respuesta ){
    	var mensaje = respuesta.data.mensaje;
    	form.trigger("reset");
    	//Cierro la ventana modal
    	$('#modalRegistro').modal('hide');

    	//Envio un mensaje de que puede acceder al sistema
    	// toastr.info("Muchas gracias por su registro, ya puede acceder al sistema.");
    	swal.fire({
				icon: "success",
		        title: "Información",
		        text: 'Para activar su cuenta, revise el mensaje de validación que enviamos a su correo. Recuerde revisar en la bandeja de spam y  correos "no deseados".',
		        background: '#fff url(assets/media/bg/bg-12.jpg)',
		        buttonsStyling: false,
		        confirmButtonText: "Entendido",
		        customClass: {
					confirmButton: "btn font-weight-bold btn-light-primary"
				}
	    }).then(function() {
			KTUtil.scrollTop();
		});
     },
     error: function(jqXHR, textStatus, errorThrown){	
      if ( console && console.log ) {
        toastr.error("La solicitud a fallado: " +  textStatus);
      }
      if(jqXHR.status == 500) {
        toastr.error('Ocurrio un error, intente nuevamente, si el error persiste pongase en contacto con el equipo de desarrollo');
      }
     }
    });
});

//>Comprobar si la cedula existe
function consultarCedula(input){
    var cedula = $(input).val();
    var existeCedula = '';
    $.post( "jquery.php", { "cedula":cedula, "recibePOST":"consultarCedula" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){
        existeCedula = data.data.cedula;
        if (existeCedula) { //Ya esta registrada
          $(input).val('');
          toastr.error('Esta cédula ya está registrada, escriba otra por favor.');
        }  
      }

      if (cedula.length == '0') { //El campo esta vacio
        return false;
      }

      if (!isNaN(cedula)) {
        if (cedula.length != '10') { //No cumple con la longitud de 10 caracteres
          $(input).val(''); 
          toastr.error('La cédula escrita no tiene la longitud correcta, 10 caracteres.');
        }
      }
      

        if ( console && console.log ) {
          console.log( "La solicitud se ha completado correctamente." );
        }
    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
      toastr.error('Ocurrio un error, intente nuevamente, si el error persiste pongase en contacto con el equipo de desarrollo');
      if ( console && console.log ) {
        console.log( "La solicitud a fallado: " +  textStatus);
      }
    });
}

function mensajeInicio(){
	swal.fire({
		    // icon: "info",
        imageUrl: 'assets/media/logos/logo-redp-II.png',
        title: "Importante",
        html: 'La Red Ecuatoriana de Pedagogía te da la bienvenida al sistema de postulación de formación y posgrado. <br><br> Si aún no te has registrado, puedes hacerlo cerrando esta ventana. No olvides darle clic en el botón CREAR CUENTA.',
        background: '#fff url(assets/media/bg/bg-12.jpg)',
        buttonsStyling: false,
        confirmButtonText: "Entendido",
        customClass: {
			 confirmButton: "btn font-weight-bold btn-light-primary"
		}
    }).then(function() {
		KTUtil.scrollTop();
	});
}