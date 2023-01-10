//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
/********************************/
/**** FUNCIONES PARA LOS MENSAJES ****/
/********************************/
var pos_mensaje = $('#pos_mensaje').val();
var id_usuario  = $('#id_Usua_logueado').val();
var cod_grupo   = $('#cod_grupoUsua_logueado').val();
var elem 		    = $('#timeline-mensajes');
var color 		  = '';
$(document).ready(function() {
	// console.log('Entro a las funciones para los mensajes');
	cargarMensajes(id_usuario, cod_grupo, pos_mensaje);

});

function cargarMensajes(id_usuario, cod_grupo, posicion){
	$.post( "jquery.php", { "id_usuario":id_usuario, "cod_grupo":cod_grupo, "posicion":posicion, "recibePOST":"cargarMensajes" }, "json")
    .done(function( data, textStatus, jqXHR ) {

      if(data.data){
        if (data.data.mensaje == 'No tiene mensajes') {
          toastr.info(data.data.mensaje);
          elem.append(' <div class="alert alert-primary">'+data.data.mensaje+'</div> ');
        }else{
          // console.log(data.data.mensajes);
          $.each(data.data.mensajes,function(index, item){
            if (item.n_grupo == 'Secretaria') {
            	color = 'text-danger';
            }else if(item.n_grupo == 'Profesor'){
            	color = 'text-info';
            }else if(item.n_grupo == 'Mentor'){
            	color = 'text-primary';
            }else if(item.n_grupo == 'Tutor'){
            	color = 'text-success';
            }else if(item.n_grupo == 'Estudiante'){
              color = 'text-warning';
            }
            //select.append('<option value="'+item.id_profesor+'">'+item.nprofesor+'</option>');
            elem.append('<div class="timeline-item align-items-start">'+
      			'<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg label-medium">'+item.fecha+'</div>'+
      			'<div class="timeline-badge">'+
      				'<i class="fa fa-genderless '+color+' icon-xl"></i>'+
      			'</div>'+
      			'<div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3"> <a href="javascript:void(0);" class="btn-ver-mensaje" onclick="verMensaje('+item.id_mensaje+')">'+item.asunto+'</a> </div>'+
      			'<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg label-large">'+item.n_grupo+'</div>'+
      			'</div>');
          });
        }
        $('#cant_mensajes').text(data.data.cant);
        
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


//Boton ver mensajes
//fecha, quien_envia, asunto, mensaje
function verMensaje(id_mensaje){
  // console.log('Modalmensaje: '+id_mensaje);

  /*
  $('#mensaje-fecha').text(fecha);
  $('#mensaje-de').text(quien_envia);
  $('#mensaje-asunto').text(asunto);
  $('#mensaje-contenido').text(mensaje);
  */
  
  $.post( "jquery.php", { "id_mensaje":id_mensaje, "recibePOST":"verMensaje" }, "json")
    .done(function( data, textStatus, jqXHR ) {

      if(data.data){
        // console.log(data.data.mensajes);
        $.each(data.data.contenido,function(index, item){

          $('#mens-fecha').text(item.fecha_hora);
          $('#mens-de').text(item.quien_envio +' - '+item.n_grupo);
          $('#mens-asunto').text(item.asunto);
          $('#mens-contenido').text(item.mensaje);

        });

        $('#Modalmensaje').modal('show');
        
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


  //Botones atras y adelante para los mensajes
$('.btn-ante-mensaje, .btn-sgte-mensaje').on('click', function() {
  var cant = $('#pos_mensaje'),
  pos = parseInt(cant.val()),
  isAdd = $(this).hasClass('btn-sgte-mensaje');
  !isNaN(pos) && cant.val( isAdd ? ++pos : (pos > 0 ? --pos : pos) );

  //console.log(pos);
  elem.text('');
  cargarMensajes(id_usuario, cod_grupo, pos);
});
