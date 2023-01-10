//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
/********************************/
/**** FUNCIONES GLOBALES ****/
/********************************/

$(document).ready(function() {
  
});

var p = $('#p').val(); //id del programa
var c = $('#c').val(); // id del postulante
var i = $('#i').val(); // id de la postulacion

//Recorro todos los inputs tipo text para guardar el valor
$(document).on("change", "input[type=text]", function (e) {
  actualizarDatos(this.id, p, c, $(this).val());
});

//Recorro todos los inputs tipo number para guardar el valor
$(document).on("change", "input[type=number]", function (e) {
  actualizarDatos(this.id, p, c, $(this).val());
});

//Recorro los radio button
$(document).on("click", "input[type=radio]", function (e) {
  actualizarDatos(this.name, p, c, $(this).val());
   $('#'+this.name+'-req').val('1');
});

//Recorro los select
$(document).on("change", "select", function (e) {
  actualizarDatos(this.name, p, c, $(this).val());
   $('#'+this.name+'-req').val('1');
});

//Se ejecuta cuando se da click en el boton enviar
/*
  $('.fileupload').bind('fileuploadsubmit', function (e, data) {
    var f = this.id;
    var arch = 0;
    $.each(data.files, function (index, file) {
      arch = file.name;
      arch = arch.replace(/ /g,"-");
      console.log('entro a fileuploadsubmit: '+arch+ ' - '+f);
     actualizarDatos(f, p, c, file.name);
      $('#'+f+'-req').val('1');
    });
  });
*/

//Archivos, fileuploads
$('.fileupload').bind('fileuploaddone', function (e, data) {
  var f = this.id;
  var arch = 0;
  var btn = $('span#'+f);

  // console.log(data);
  // console.log('data.files:' +data.files);
  // console.log(data.result);
  
  $.each(data.result.files, function (index, file) {

    if (f == 'copiatitulo') {
      actualizarDatosTitulo(f, p, c, file.name);
    }else{
     actualizarDatos(f, p, c, file.name);
     $('#'+f+'-req').val('1');
     btn.hide(); 
    }
    
  });

  /*
    $.each(data.files, function (index, file) {
      if (f == 'copiatitulo') {
        actualizarDatosTitulo(f, p, c, file.name);
      }else{
       actualizarDatos(f, p, c, file.name);
       $('#'+f+'-req').val('1');
       btn.hide(); 
      }
    });
  */
});

//Eliminar archivo fileupload
$(document).on("click", ".delete", function (e) {
  //  console.log('delete del fileupload');
  var tableid = $(this).parents('table').data('idp');
  var fcampo = $(this).parents('form').attr('id');
  var btn = $('span#'+fcampo);

  /*
  if (fcampo == 'copiatitulo' || fcampo == 'copiatitulocuartonivel') {
      // actualizarDatosTitulo(fcampo, p, c, null);
      eliminarArchivoTitulo(i,fcampo,null);
    }else{
 */     
      // actualizarDatos(fcampo, p, c, null);
      eliminarArchivo(i,fcampo)
      $('#'+fcampo+'-req').val('');
      btn.show(); 
 // }
  
});

function actualizarDatos(campo, p, c, cont){
  
  console.log('actualizarDatos: '+campo+' - '+p+' - '+c+' - '+cont);

  $.post( "jquery.php", { "campo":campo, "p":p, "c":c, "cont":cont, "i":i, "recibePOST":"actualizarDatospostulacion" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){
        console.log(data.data);
        if (data.data.error == 0) {
          toastr.success(data.data.mensaje);
        }else{
          toastr.error(data.data.mensaje);
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

function actualizarDatosTitulo(campo, p, c, cont){

  console.log('actualizarDatosTitulo: '+campo+' - '+p+' - '+c+' - '+cont);
  
  var btn = $('span#'+campo);

  $.post( "jquery.php", { "campo":campo, "p":p, "c":c, "cont":cont, "i":i, "recibePOST":"actualizarDatospostulacion" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){
        console.log('actualizarDatosTitulo:' +data.data.cant);
        
        $('#'+campo+'-req').val('1');

        if (data.data.cant < 6) {
          btn.show();
          // $('#'+campo+'-req').val('');
        }else{
          btn.hide();
        }

        if (data.data.error == 0) {
          toastr.success(data.data.mensaje);
        }else{
          toastr.error(data.data.mensaje);
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

//Compronar que todos los campos esten con valor y enviar el formulario
$(document).on("click", "#enviar", function (e) {
  console.log('Comprobar todos los campos requeridos');

  var x = 0;
  var id = 0;
  var s= 0;
    $('.requerido').each(function(){
      id = $(this).attr("id");
      // console.log('id: '+id);
      // s = $('.'+id+'span');
      if(this.value.length > 0 ){
       x++;
      }else{
        // console.log('Campo requerido');
        $('.'+id+'span').show();
      };
    });

  var long = $('.requerido').length;


  console.log('long:'+long+ ' x:'+x);

  
  if (long != x) {
    Swal.fire({
        text: "Por favor, complete todos los campos obligatorios.",
        icon: "info",
        background: '#fff url(assets/media/bg/bg-12.jpg)',
        buttonsStyling: false,
        confirmButtonText: "Ok",
        customClass: {
          confirmButton: "btn font-weight-bold btn-primary",
        }
      });

    return false;
  }else{
    Swal.fire({
      text: "Formulario enviado.",
      icon: "info",
      background: '#fff url(assets/media/bg/bg-12.jpg)',
      buttonsStyling: false,
      confirmButtonText: "Ok",
      customClass: {
        confirmButton: "btn font-weight-bold btn-primary",
      }
    });

     postulacionCompletada();

    setTimeout(function(){
      window.location.href = "gracias-postulacion.php";
    }, 2000);

    
  }
});

function postulacionCompletada(){
  var idp = $('#i').val(); 
  $.post( "jquery.php", { "idp":idp,  "recibePOST":"postulacionCompletada" }, "json")
      .done(function( data, textStatus, jqXHR ) {

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

$(document).on("click", ".btn-eliminar-archivo", function (e) {
  
  var id = $(this).data('id');
  var archivo = $(this).data('archivo');
  var campo = $(this).data('campo');
  var btn = $('span#'+campo);

  var td = $(this).parents('tr');

  Swal.fire({
    title: '¿Desea eliminar este archivo?',
    text: "Esta acción es irreversible",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si',
    cancelButtonText: 'No'
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Eliminado',
        'El archivo ha sido eliminado.',
        'success'
      );

      td.hide();

      eliminarArchivo(id,campo);

      $('#'+campo+'-req').val('');

      btn.show();

      // console.log('id: '+id+ ' archivo:'+ archivo);
    }
  })

});

function eliminarArchivo(a,b){
  $.post( "jquery.php", { "id":a, "campo":b, "recibePOST":"eliminarArchivo" }, "json")
      .done(function( data, textStatus, jqXHR ) {
        if(data.data){
          toastr.info('Archivo eliminado');
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

// Solo para el caso del titulo de grado

$(document).on("click", ".btn-eliminar-archivo-titulo", function (e) {
  
  var id = $(this).data('id');
  var idarchivo = $(this).data('idarchivo');
  var archivo = $(this).data('archivo');
  var campo = $(this).data('campo');

  var td = $(this).parents('tr');

  Swal.fire({
    title: '¿Desea eliminar este archivo?',
    text: "Esta acción es irreversible",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si',
    cancelButtonText: 'No'
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Eliminado',
        'El archivo ha sido eliminado.',
        'success'
      );

      td.hide();

      eliminarArchivoTitulo(id,campo,idarchivo);

    }
  })

});

function eliminarArchivoTitulo(a,b,c){
  /*
    a => id_postulacion
    b => campo
    c => idarchivo
  */
  var btn = $('span#'+b);
  $.post( "jquery.php", { "id":a, "campo":b, "idarchivo":c, "recibePOST":"eliminarArchivoTitulo" }, "json")
      .done(function( data, textStatus, jqXHR ) {
        if(data.data){

          if(data.data.cant > 0){
            btn.show();
          }else{
            btn.hide();
            $('#'+b+'-req').val('');
          }
          // toastr.info('Archivo eliminado');
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

//*************************************
//> Funcion mostrar documentos adjuntos
//*************************************
function adjuntoModal(ext, adjunto){
  if (ext == "jpg" || ext == "jpeg" || ext == "png") {//Visor de imagen
    $("#img-adjunto-modal").css("background","transparent url('assets/media/spinners/1.gif') center no-repeat");
    $("#img-adjunto-modal").css("width","100%");
    $("#img-adjunto-modal").attr("src", "uploads/"+adjunto);
    $("#ModalVisorImagen").modal("show");
  }else if(ext == "pdf"){//Visor de pdf
    // console.log('datos: '+pdf);
      var object = document.getElementById('cargarPdf');
      object.setAttribute('data', 'uploads/'+adjunto);

      var clone  = object.cloneNode(true);
      var parent = object.parentNode;

      parent.removeChild(object); //Elimino el object
      parent.appendChild(clone);  //Creo uno nuevo a partir del original (Clonado)
      $("#ModalVisorPdf").modal("show");
  }else{//Cambiaron la extension por base de datos porque el sistema no permite otro tipo de archivo
    toastr.error('Hay un error con el archivo: '+adjunto+ ' contactar a soporte técnico.');
  }
}

//Funcion mostrar u ocultar financiamiento -> contenedorfinanciamiento
$(document).on("change", "#aplicafinanciamiento", function (e) {
  var v = $(this).val();
  var c = $('#contenedorfinanciamiento');

  var fincedula = $('#fincedula-req');
  var finroldepago = $('#finroldepago-req');
  var finplanillaserbasico = $('#finplanillaserbasico-req');
  var finautorburocredito = $('#finautorburocredito-req');

 // console.log('financiamiento: '+v);
  if (v == 1) {
    c.show();
    fincedula.addClass('requerido');
    finroldepago.addClass('requerido');
    finplanillaserbasico.addClass('requerido');
    finautorburocredito.addClass('requerido');
  }else{
    c.hide();
    fincedula.removeClass('requerido');
    finroldepago.removeClass('requerido');
    finplanillaserbasico.removeClass('requerido');
    finautorburocredito.removeClass('requerido');
  }
});

//Funcion para activar la opcion de requerido en las secciones de cedula del conyuge y disolucion conyugal
$(document).on("change", "#finestadocivil", function (e) {
  var v = $(this).val();
   console.log('valor: '+v);
  var fincedulaconyuge = $('#fincedulaconyuge-req');
  var findisolucionconyugal = $('#findisolucionconyugal-req');

  if (v == 2) { //Casado
    fincedulaconyuge.addClass('requerido');
    findisolucionconyugal.removeClass('requerido');
  }else if(v == 4){ //Divorciado
    fincedulaconyuge.removeClass('requerido');
    findisolucionconyugal.addClass('requerido');
  }else{
    fincedulaconyuge.removeClass('requerido');
    findisolucionconyugal.removeClass('requerido');
  }

});
