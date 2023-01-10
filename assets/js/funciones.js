//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
/********************************/
/**** FUNCIONES GLOBALES ****/
/********************************/
( function($) {
  $(document).ready(function() {
  //  mostrarLoader();
  //  setTimeout(ocultarLoader, 2000);

    $('[data-toggle="tooltip"]').tooltip({
      trigger : 'hover'
    });

    Swal.fire({
      title: "¡Información!",
      html: "Cargando registros, por favor espere.",
      icon: "info",
      timer: 1500,
      timerProgressBar: true,
      timerProgressBar: true,
      allowOutsideClick: false,
      onOpen: function() {
        Swal.showLoading()
      }
    });

    //Cargar estadisticas en el panel principal
    estadisticasGenerales();

  });
} ) ( jQuery );

//>Mostrar Loader
function mostrarLoader(){
  $('#loading').css({
    display: 'block',
  });
}
//>Ocultar Loader
function ocultarLoader(){
  $('#loading').css({
    display: 'none',
  });
}

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

//Funcion para formatear una fecha
function formatearFecha(fecha) {
  var d = new Date(fecha),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear(),
    hour = d.getHours(),
    min = d.getMinutes(),
    sec = '00';

    if(min == '0'){
      min = '00';
    }

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

  return [year, month, day].join('-')+' '+hour+':'+min+':'+sec;
}

//Función para fechas
function dateToYMD(date) {
  var strArray=['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];
  var d = date.getDate();
  var m = strArray[date.getMonth()];
  var y = date.getFullYear();
  return '' + (d+1) + '-' + m + '-' + y;
}

//>Inicio Funciones para Añadir celdas a las tablas
var cont=3;
var abono=13;
var selec=0;
//>Agregar filas a la tabla seleccionada
function agregar(name){//name = nombre de la tabla que se le asigna al boton
  cont++;
  abono++;
  selec++;

  if(name=="tabla-pagos-registro"){
    //var fila='<tr><td class="text-success font-weight-bold">ABONO</td><td><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon2">$</span></div><input type="text" class="form-control" id="abono'+abono+'" name="abono'+abono+'" autocomplete="off" placeholder="00" aria-describedby="basic-addon2" required></div></td><td><input type="date" class="form-control" id="fechabono'+abono+'" name="fechabono'+abono+'" autocomplete="off" placeholder="dd / mm / aaaa" required></td><td>...<input type="hidden" class="form-control" id="recibo'+abono+'" name="recibo'+abono+'" autocomplete="off" placeholder="..."><input type="hidden" name="tipo'+abono+'" id="tipo'+abono+'" value="2"></td><td>...<input type="hidden" name="pagado'+abono+'" id="pagado'+abono+'" value="0"></td><td><a href="#!" class="text-danger" id="bt_del" name="tabla-pagos-registro" onclick="eliminar(this.name);"><i class="fa fa-trash"></i></a></td></tr>';
    var fila='<tr><td><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon2">$</span></div><input type="text" class="form-control" id="abono'+abono+'" name="abono'+abono+'" autocomplete="off" placeholder="0000" aria-describedby="basic-addon2" required></div></td><td><input type="date" class="form-control" id="fechabono'+abono+'" name="fechabono'+abono+'" autocomplete="off" placeholder="dd / mm / aaaa" required></td><td>...<input type="hidden" class="form-control" id="fechapagoreal'+abono+'" name="fechapagoreal'+abono+'" autocomplete="off" placeholder="dd / mm / aaaa" value="0000-00-00" required></td><td>...<input type="hidden" class="form-control" id="recibo'+abono+'" name="recibo'+abono+'" autocomplete="off" value="-" placeholder="..."><input type="hidden" class="form-control" id="recibopago'+abono+'" name="recibopago'+abono+'" autocomplete="off" placeholder="..." value="-"><input type="hidden" name="tipo'+abono+'" id="tipo'+abono+'" value="2"></td><td>...<input type="hidden" class="form-control" id="observacion'+abono+'" name="observacion'+abono+'" autocomplete="off" placeholder="..." value="-" required></td><td>...<input type="hidden" name="pagado'+abono+'" id="pagado'+abono+'" value="2"></td><td><a href="#!" class="text-danger" id="bt_del" name="tabla-pagos-registro" onclick="eliminar(this.name);"><i class="fa fa-trash"></i></a></td></tr>';
    $('#'+name).append(fila);
    $('#total'+name).val(cont);

  }
  reordenar(name);
}

//>Eliminar filas
function eliminar(name){
  $("#"+name).on('click','#bt_del',function(){
    $(this).closest('tr').remove();
    reordenar(name);
  });
}

//>Reordenar filas
function reordenar(name){
  var num=1;
  $('#'+name+' tbody tr').each(function(){
  //  $(this).find('td').eq(0).text(num);
    num++;
  });
  $('#total'+name).val(num-1);
}

//>Eliminar todas las filas de la tabla seleccionada
function eliminarTodasFilas(name){
  $('#'+name+' tbody tr').each(function(){
    $(this).remove();
  });
  $('#total'+name).val(null);
  reordenar(name);
}

//>Funcion para cambiar el estado de un input checkbox
function si_no(check){
  console.log(check.value);
  if(check.checked){
    check.value ="on";
  }else{
    check.value ="off";
  }
};

$.fn.toggleCheck  =function() {
  if(this.tagName === 'INPUT') {
    $(this).prop('checked', !($(this).is(':checked')));
  }
}

/********************************/
/**** FIN FUNCIONES GLOBALES ****/
/********************************/


/********************************/
/**** ULTIMO PROGRAMA SELECCIONADO ****/
/********************************/
$(document).on("change", "#id_programa_princ", function () {
  var p = $(this).val();
  var u = $('#id_Usua_logueado').val();
  ultimoProgramaUser(p,u);
});


function ultimoProgramaUser(p,u){
  //p => id_programa
  //u => id_usuario (logueado)
  $.post( "jquery.php", { "id_programa":p, "id_usuario":u, "recibePOST":"ultimoProgramaUser" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){
          console.log('ultimoProgramaUser actualizado');
           window.location.reload();
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
};

/********************************/
/**** BUSCADOR GENERAL ****/
/********************************/
//>buscador Principal
$("#buscadorPrincipal").submit(function (evt) {
  evt.preventDefault();
  evt.stopPropagation();
  //Consultas ajax para controlar las respuestas
  var form = $("#buscadorPrincipal");
  var cedula = $("#buscador_cedula").val();
  if (!cedula) {
    toastr.info('Seleccione un estudiante');
    $("#buscador").focus();
    return false;
  }
  //Muestro ventana modal
  $('#ModalConsultaEstudiante').modal('show');
  //cargar la pagina consultar-matricula
  $("#contenedor-principal-modal").load('consultar-matricula.php?cedula='+cedula+'&random='+new Date().getTime(), function(response, status, http){
    mostrarLoader();
    //Activo los tooltips en la pagina que va a cargar
    $('[data-tooltip="tooltip"]').tooltip();

    if(status == "success")
      setTimeout(ocultarLoader, 2000);
    if(status == "error")
      toastr.error("Ha ocurrido un error: " + http.status + ": " + http.statusText);
  });
});

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
/********************************/
/**** INICIO MODULO USUARIOS ****/
/********************************/
$(document).on("click", "a#btn_eliminar_usuario", function () {
  var id_usuario = $(this).data('id');
  var elemento = $(this).parents('tr');
  $.confirm({
    title: 'Confirmar eliminación',
    content: '¿Desea eliminar este registro?',
    type: 'blue',
    useBootstrap: true,
    animationBounce: 1.5,
    theme: 'bootstrap',

    buttons: {
      aceptar: {
        text: 'Si', // Some Non-Alphanumeric characters
        btnClass: 'btn-green',
        action: function(){
          $.alert('Registro eliminado');
          //Elimino el modulo
          var url = "jquery.php";
          var data = ("&recibePOST=eliminarUsuario&id_usuario="+id_usuario);
          $.post(url, data, function(result){
              elemento.html('Eliminando... <img src="img/loading_2.gif"/>');
            })
            //La consulta se ejecuto con exito
            .done(function(data, textStatus, jqXHR) {
              //Oculto el elemento
              elemento.fadeOut();
              //Habilito los tooltips
              $('[data-toggle="tooltip"]').tooltip({
                  trigger : 'hover'
                 });
            })
        }
      },
      cancelar: {
        text: 'No',
        btnClass: 'btn-red'
      }
    }
  });
});

//cambiar contraseña
function cambiarPass(usuario,pass) {
  var contra = $('#'+pass).val();
  // console.log('contra: '+contra+' usuario:'+ usuario);
  if (contra == '' || contra == null) {
    toastr.error('Escriba una contraseña');
    return false;
  }
  
  $.post( "jquery.php", { "id_usuario":usuario, "contra":contra, "recibePOST":"cambiarContrasenna" }, function(result){ mostrarLoader(); })
    .done(function( data, textStatus, jqXHR ) {
      setTimeout(ocultarLoader, 500);
        if ( console && console.log ) {
          toastr.success( "Contraseña actualizada", "Información" );
          //Oculto la ventana modal
          $('#ModalCambiarPass').modal('hide'); //Modal de usuario logueado
          $('#ModalCambiarPassUsuario').modal('hide'); //Modal de cambios de usuario si perdio la contraseña
          $('#'+pass).val('');
          $('.modal-backdrop').hide();
        }
    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
        if ( console && console.log ) {
          toastr.error( "La solicitud a fallado, intente nuevamente, si el problema persiste pongase en contacto con el equipo de desarrollo", "Información");
            console.log( "La solicitud a fallado: " +  textStatus, "Información");
        }
    });
    
}

/********************************/
/**** FIN MODULO USUARIOS ****/
/********************************/

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
/**********************************/
/**** INICIO MODULO MATRICULAS ****/
/**********************************/

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

//>Comprobar si el pasaporte Existe
function consultarPasaporte(input){
    var pasaporte = $(input).val();
    var existePasaporte = '';
    $.post( "jquery.php", { "pasaporte":pasaporte, "recibePOST":"consultarPasaporte" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){
        existePasaporte = data.data.pasaporte;
        if (existePasaporte) { //Ya esta registrada
          $(input).val('');
          toastr.error('Ese pasaporte ya está registrado, escriba otro por favor.');
        }  
      }

      if (pasaporte.length == '0') { //El campo esta vacio
        return false;
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

//>Comprobar si el correo existe
function consultarCorreoEst(input){
    var correo = $(input).val();
    var existeCorreo = '';
    $.post( "jquery.php", { "correo":correo, "recibePOST":"consultarCorreoEst" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){
        existeCorreo = data.data.correo;
        if (existeCorreo) {
          $(input).val('');
          toastr.error('Este correo ya esta registrado, escriba otro por favor.');
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

//>Comprobar si el correo existe
function consultarCorreoProfesor(input){
    var correo = $(input).val();
    var existeCorreo = '';
    $.post( "jquery.php", { "correo":correo, "recibePOST":"consultarCorreoProfesor" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){
        existeCorreo = data.data.correo;
        if (existeCorreo) {
          $(input).val('');
          toastr.error('Este correo ya esta registrado, escriba otro por favor.');
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

//>Comprobar si el recibo existe
function consultarRecibo(input){
  var recibo = $(input).val();
  var existeRecibo = '';
  $.post( "jquery.php", { "recibo":recibo, "recibePOST":"consultarRecibo" }, "json")
  .done(function( data, textStatus, jqXHR ) {
    if(data.data){
      cant = data.data.cant;
      if (cant == 1) {
        $(input).val('');
        toastr.error('Este recibo ya esta registrado, escriba otro por favor.');
        return 1;
      }else{
        return 0;
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

//>Registrar nueva matricula
$("#formRegistroMatricula").submit(function (evt) {
  evt.preventDefault();
  evt.stopPropagation();
  var formData = new FormData($("form#formRegistroMatricula")[0]);
  var form = $("#formRegistroMatricula");
  //Documento adjuntos
  var adjuncedulanombre = $('#adjuncedulanombre').val();
  var adjunpasaportenombre = $('#adjunpasaportenombre').val();
  var adjunhvidanombre = $('#adjunhvidanombre').val();
  var adjuntitulonombre = $('#adjuntitulonombre').val();

  //if (adjuncedulanombre == '' || adjunpasaportenombre == '' || adjunhvidanombre == '' || adjuntitulonombre == '') {
  //  toastr.error('Falta archivos adjuntos por seleccionar.');
  // }else{
    $.ajax({
     type: "POST",
     url: "jquery.php",
     data: formData,
     //necesario para subir archivos via ajax
     cache: false,
     contentType: false,
     processData: false,
     beforeSend: function(){
      mostrarLoader();
     //Cambiar boton guardar a enviando
      curSubmit = form.find(":submit");
      curSubmit.prop('disabled', true);
      curSubmit.text('Registrando');
     },
     success: function( respuesta ){
      //Mensajes de confirmacion
      setTimeout(ocultarLoader, 2000);
      form.trigger("reset");
      curSubmit.prop('disabled', false);
      curSubmit.text('Registrar');
      //Redirijo a la pagina de gracias
      //window.location.href = "registro-gracias.php";
      toastr.success("Matrícula registrada");

      //Limpio los divs de los documentos adjuntos
      $('#textocedula').text('');
      $('#textopasaporte').text('');
      $('#textohvida').text('');
      $('#textotitulo').text('');
     },
     error: function(jqXHR, textStatus, errorThrown){
      if ( console && console.log ) {
        toastr.error("La solicitud a fallado: " +  textStatus);
      }
      if(jqXHR.status == 500) {
        toastr.error('Ocurrio un error, recargue la pagina e intente nuevamente, si el error persiste pongase en contacto con el equipo de desarrollo');
      }
     }
    });
  // }
});

//>Editar matricula
$("#formEditarMatricula").submit(function (evt) {
  evt.preventDefault();
  evt.stopPropagation();
  var formData = new FormData($("form#formEditarMatricula")[0]);
  var form = $("#formEditarMatricula");
  //Documento adjuntos
  var adjuncedulanombre = form.find('#adjuncedulanombre').val();
  var adjunpasaportenombre = form.find('#adjunpasaportenombre').val();
  var adjunhvidanombre = form.find('#adjunhvidanombre').val();
  var adjuntitulonombre = form.find('#adjuntitulonombre').val();

  if (adjuncedulanombre == '' || adjunpasaportenombre == '' || adjunhvidanombre == '' || adjuntitulonombre == '') {
    toastr.error('Falta archivos adjuntos por seleccionar.');
  }else{
    $.ajax({
     type: "POST",
     url: "jquery.php",
     data: formData,
     //necesario para subir archivos via ajax
     cache: false,
     contentType: false,
     processData: false,
     beforeSend: function(){
      mostrarLoader();
     //Cambiar boton guardar a enviando
      curSubmit = form.find(":submit");
      curSubmit.prop('disabled', true);
      curSubmit.text('Actualizando');
     },
     success: function( respuesta ){
      //Mensajes de confirmacion
      setTimeout(ocultarLoader, 2000);
      curSubmit.prop('disabled', false);
      curSubmit.text('Actualizar');
      //Redirijo a la pagina de gracias
      //window.location.href = "registro-gracias.php";
      toastr.success("Matrícula actualizada");
     },
     error: function(jqXHR, textStatus, errorThrown){
      if ( console && console.log ) {
        toastr.error("La solicitud a fallado: " +  textStatus);
      }
      if(jqXHR.status == 500) {
        toastr.error('Ocurrio un error, recargue la pagina e intente nuevamente, si el error persiste pongase en contacto con el equipo de desarrollo');
      }
     }
    });
  }
});

//>******************* Funciones para mostrar modal para seleccionar Provincia
$(document).on("click", "a#btn-modal-provincia", function () {
 console.log('Seleccionar provincia');
 var id_pais = $('#id_pais').val();
 if (id_pais == '' || id_pais == null) {
  toastr.info('Seleccione un país');
 }else{
  $('#ModalSeleccionarProvincia').modal('show');
  cargarProvincias(id_pais);
 }
});

function cargarProvincias(id){
  /****Destruyo la tabla si ya esta creada****/
  $('#dataTable_listadoProvinciamodal').dataTable().fnDestroy();
  /****Data Tables****/
  var table = $('#dataTable_listadoProvinciamodal').DataTable({
    "language": {
      "url": "assets/js/Spanish.json"
    },
    "pagingType": "full_numbers",
    "pageLength": 5,
    "ajax": "provinciasjson.php?id_pais="+id, //Listado en formato JSON
    "deferRender": true,
      "columns": [
          { "data": "id_provincia" },
          { "data": "nprovincia" },
          {
              "className": 'seleccionarprov',
              "orderable": false,
              "data": null,
              "defaultContent": '',
              "render": function () {
                return '<a href="#!" class="text-info seleccionarprov"><i class="la la-check-circle-o" aria-hidden="true"></i> </a>';
               },
               width:"15px"
          }

      ],
      "order": [[1, 'asc']],
      "columnDefs": [
        {
          "targets": [ 0 ],
          "visible": false
        }
      ]
  }); 
}

$(document).on("click", "a.seleccionarprov", function () {
  var table = table = $('#dataTable_listadoProvinciamodal').DataTable();
  var data = table.row( $(this).parents('tr') ).data();
  var id_provincia = data.id_provincia;
  var nprovincia   = data.nprovincia;
  // console.log('id_pais: '+ id_pais + ' npais:'+ npais);
  $('#provincia').val(nprovincia);
  $('#id_provincia').val(id_provincia);
  $('#ModalSeleccionarProvincia').modal('hide');
});

//>******************* Funciones para mostrar modal para seleccionar Ciudad
$(document).on("click", "a#btn-modal-ciudad", function () {
 console.log('Seleccionar ciudad');
 var id_provincia = $('#id_provincia').val();
 if (id_provincia == '' || id_provincia == null) {
  toastr.info('Seleccione una provincia');
 }else{
  $('#ModalSeleccionarCiudad').modal('show');
  cargarCiudad(id_provincia);
 }
});

function cargarCiudad(id){
  /****Destruyo la tabla si ya esta creada****/
  $('#dataTable_listadoCiudadmodal').dataTable().fnDestroy();
  /****Data Tables****/
  var table = $('#dataTable_listadoCiudadmodal').DataTable({
    "language": {
      "url": "assets/js/Spanish.json"
    },
    "pagingType": "full_numbers",
    "pageLength": 5,
    "ajax": "ciudadesjson.php?id_provincia="+id, //Listado en formato JSON
    "deferRender": true,
      "columns": [
          { "data": "id_ciudad" },
          { "data": "nciudad" },
          {
              "className": 'seleccionarciud',
              "orderable": false,
              "data": null,
              "defaultContent": '',
              "render": function () {
                return '<a href="#!" class="text-info seleccionarciud"><i class="la la-check-circle-o" aria-hidden="true"></i> </a>';
               },
               width:"15px"
          }

      ],
      "order": [[1, 'asc']],
      "columnDefs": [
        {
          "targets"  : 'no-sort',
          "orderable": false,
        }, 
        {
          "targets": [ 0 ],
          "visible": false,
          "orderable": false,
          "searchable": false
        }
      ]
  });
  
}

$(document).on("click", "a.seleccionarciud", function () {
  var table = table = $('#dataTable_listadoCiudadmodal').DataTable();
  var data = table.row( $(this).parents('tr') ).data();
  var id_ciudad = data.id_ciudad;
  var nciudad   = data.nciudad;
  // console.log('id_pais: '+ id_pais + ' npais:'+ npais);
  $('#ciudad').val(nciudad);
  $('#id_ciudad').val(id_ciudad);
  $('#ModalSeleccionarCiudad').modal('hide');
});

/**************DOCUMENTOS ADJUNTOS REGISTRO DE MATRICULA**************/

//*************************************
//> Funcion para Cargar Cedula (IMAGEN/PDF)
//*************************************
$(document).on("change", "#adjuncedula", function (e) {

  var file = e.target.files[0];
  var tamPermitido = 1024;
  var tamImg = Math.round(file.size/1024);
  if (!file.type) {
    toastr.info('El tipo de archivo seleccionado no esta permitido.')
    return;
  }
  if (!file.type.match('image.*|application.pdf')) {
    toastr.info('El tipo de archivo seleccionado no esta permitido.');
    return;
  }
  if (tamImg > tamPermitido) {
   toastr.info('El archivo seleccionado no debe superar el tamaño de 1MB');
    return;
  }

  //Esribo el nombre de la imagen en el div texto y en el input
  $('#textocedula').text(file.name);
  $('#adjuncedulanombre').val(file.name);

});

//*************************************
//> Funcion para Cargar Pasaporte (IMAGEN/PDF)
//*************************************
$(document).on("change", "#adjunpasaporte", function (e) {

  var file = e.target.files[0];
  var tamPermitido = 1024;
  var tamImg = Math.round(file.size/1024);
  if (!file.type) {
    toastr.info('El tipo de archivo seleccionado no esta permitido.')
    return;
  }
  if (!file.type.match('image.*|application.pdf')) {
    toastr.info('El tipo de archivo seleccionado no esta permitido.');
    return;
  }
  if (tamImg > tamPermitido) {
   toastr.info('El archivo seleccionado no debe superar el tamaño de 1MB');
    return;
  }

  //Esribo el nombre de la imagen en el div texto y en el input
  $('#textopasaporte').text(file.name);
  $('#adjunpasaportenombre').val(file.name);

});

//*************************************
//> Funcion para Cargar Hoja de Vida (IMAGEN/PDF)
//*************************************
$(document).on("change", "#adjunhvida", function (e) {

  var file = e.target.files[0];
  var tamPermitido = 1024;
  var tamImg = Math.round(file.size/1024);
  if (!file.type) {
    toastr.info('El tipo de archivo seleccionado no esta permitido.')
    return;
  }
  if (!file.type.match('image.*|application.pdf')) {
    toastr.info('El tipo de archivo seleccionado no esta permitido.');
    return;
  }
  if (tamImg > tamPermitido) {
   toastr.info('El archivo seleccionado no debe superar el tamaño de 1MB');
    return;
  }

  //Esribo el nombre de la imagen en el div texto y en el input
  $('#textohvida').text(file.name);
  $('#adjunhvidanombre').val(file.name);

});

//*************************************
//> Funcion para Cargar Título Legalizado (IMAGEN/PDF)
//*************************************
$(document).on("change", "#adjuntitulo", function (e) {

  var file = e.target.files[0];
  var tamPermitido = 1024;
  var tamImg = Math.round(file.size/1024);
  if (!file.type) {
    toastr.info('El tipo de archivo seleccionado no esta permitido.')
    return;
  }
  if (!file.type.match('image.*|application.pdf')) {
    toastr.info('El tipo de archivo seleccionado no esta permitido.');
    return;
  }
  if (tamImg > tamPermitido) {
   toastr.info('El archivo seleccionado no debe superar el tamaño de 1MB');
    return;
  }

  //Esribo el nombre de la imagen en el div texto y en el input
  $('#textotitulo').text(file.name);
  $('#adjuntitulonombre').val(file.name);

});

//*************************************
//> Funcion para Cargar Modal de Asignaturas - Registro de período académico
//*************************************
$(document).on("click", ".btn-modal-asignatura", function (e) {
  var id_modulo = $(this).data('modulo');
  var nmodulo = $(this).data('nmodulo');
  $('.nmodulo-modal').text(nmodulo);
  $('#ModalConsultaAsignatura').modal('show');
});

//*************************************
//> Funcion para Cargar Asignaturas - Registro de período académico, se carga con la página
//*************************************
/*
$(document).on("click", ".profesores-select", function (e) {
  console.log('cargar profesores');
  cargarProfesores();
});
*/
//*************************************
//> Funcion para Cargar Profesores - Registro de período académico, se carga con la página
//*************************************
function cargarProfesores(){
  $.post( "jquery.php", { "recibePOST":"cargarListadoProfesores" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){
        console.log(data.data);
        //Cargo las opciones en el listado
        var select = $('.profesores-select');
        $.each(data.data,function(index, item){
          select.append('<option value="'+item.id_profesor+'">'+item.nprofesor+'</option>');
        });
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
//> Funcion para Cargar Profesores - Edición de período académico, se carga con la página
//*************************************
function cargarProfesoresE(id_profesor){
  $.post( "jquery.php", { "recibePOST":"cargarListadoProfesores"}, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){
        console.log(data.data);
        //Cargo las opciones en el listado
        var select = $('.profesores-select');
        $.each(data.data,function(index, item){
          if (id_profesor == item.id_profesor) {
            select.append('<option value="'+item.id_profesor+'" selected>'+item.nprofesor+'</option>');
          }else{
            select.append('<option value="'+item.id_profesor+'">'+item.nprofesor+'</option>');  
          }
          
        });
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

//*************************************
//> Funcion mostrar listado de facilitadores
//*************************************
function cargarFacilitadores(id_grupo){
  /****Destruyo la tabla si ya esta creada****/
  $('#dataTable_listadoFacilitadoresmodal').dataTable().fnDestroy();
  /****Data Tables****/
  var table = $('#dataTable_listadoFacilitadoresmodal').DataTable({
    "language": {
      "url": "assets/js/Spanish.json"
    },
    "pagingType": "full_numbers",
    "pageLength": 5,
    "ajax": "facilitadoresjson.php?id_grupo="+id_grupo, //Listado en formato JSON
    "deferRender": true,
      "columns": [
          { "data": "id_facilitador" },
          { "data": "nfacilitador" },
          {
              "className": 'seleccionarfacil',
              "orderable": false,
              "data": null,
              "defaultContent": '',
              "render": function () {
                return '<a href="#!" class="text-info seleccionar-f"><i class="la la-check-circle-o" aria-hidden="true"></i> </a>';
               },
               width:"15px"
          }

      ],
      "order": [[1, 'asc']],
      "columnDefs": [
        {
          "targets": [ 0 ],
          "visible": false
        }
      ]
  }); 
}

$(document).on("click", "a.seleccionar-f", function () {
  var table = table = $('#dataTable_listadoFacilitadoresmodal').DataTable();
  var data = table.row( $(this).parents('tr') ).data();
  var id_facilitador = data.id_facilitador;
  var id_matricula = $('#id_matricula_f').val();
  var id_grupo = $('#id_grupo_f').val();
  //Elimino el modulo
  var url = "jquery.php";
  var data = ("&recibePOST=asignarFacilitador&id_matricula="+id_matricula+"&id_facilitador="+id_facilitador+"&id_grupo="+id_grupo);
  $.post(url, data, function(result){
      mostrarLoader();
    })
    //La consulta se ejecuto con exito
    .done(function(data, textStatus, jqXHR) {
      $('#ModalAsignarFacilitador').modal('hide');
      //Recargo la tabla
      $('#dataTable_listadoEstudiantes').DataTable().ajax.reload( null, false );  
      setTimeout(ocultarLoader, 2000);
      toastr.info('Registro actualizado');
    });

});

//Comprobar asociacion con cedula
function comp_Asociacion(tipo, dato){
  // console.log('datos: '+ tipo + ' - ' + dato)
  if (tipo == "1") {
    if (dato == null || dato == '') {
      toastr.info('Escriba una cédula en el campo correspondiente.' );
    }else{
       check_Asociacion(tipo, dato);
      console.log('Comprobar con cédula: '+ dato);
    }
  }

  if (tipo == "2") {
    if (dato == null || dato == '') {
      toastr.info('Escriba un pasaporte en el campo correspondiente. ');
    }else{
       check_Asociacion(tipo, dato);
      console.log('Comprobar con pasaporte: '+ dato);
    }
  }

function check_Asociacion(tipo, dato){
  var nodocumento = 0;
  $.post( "https://redecuatorianadepedagogia.com/asociacion/consultarasociacion.php", { "tipo":tipo, "dato":dato, "recibePOST":"compAsociacion" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){

        console.log('Es socio');
        $('#socio_si').prop('checked', true);
        $('#socio_no').prop('checked', false);

      }else{
          console.log('No es socio');
          $('#socio_si').prop('checked', false);
          $('#socio_no').prop('checked', true);
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

};


//Funcion para probar correo
function enviarCorreotest(){
  var correo = $('#test-correo').val();
  if (correo == null || correo == '') {
    toastr.info('Escriba una dirección de correo');
  }else{
    // console.log('Correo test: ' + correo);
    $.post( "jquery.php", { "correo":correo, "recibePOST":"enviarCorreotest" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){
        if (data.data.error == 0) {
          toastr.info(data.data.mensaje);
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
}

//Consultar estadísticas generales
function estadisticasGenerales(){
  var tregistros = $('#tregistros');
  var tpostulaciones = $('#tpostulaciones');
  var tnopostulaciones = $('#tnopostulaciones');
  var tincompletos = $('#tincompletos');
  var tporconfirmar = $('#tporconfirmar');
  var tpendientes = $('#tpendientes');
  var thoy = $('#thoy');
  var tparaentrevista = $('#tparaentrevista');
  var treservacupo = $('#treservacupo');
  var p = $('#id_programa_princ');

  $.post( "jquery.php", { "p":p.val(), "recibePOST":"estadisticasGenerales" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      
      if(data.data){
       // console.log('Mostrar estadisticas: '+data.data.tregistros);
        tregistros.text(data.data.tregistros);
        tpostulaciones.text(data.data.tpostulaciones);
        tnopostulaciones.text(data.data.tnopostulaciones);
        tincompletos.text(data.data.tincompletos);
        tporconfirmar.text(data.data.tporconfirmar);
        tpendientes.text(data.data.tpendientes);
        thoy.text(data.data.thoy);
        tparaentrevista.text(data.data.tparaentrevista);
        treservacupo.text(data.data.treservacupo);
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

