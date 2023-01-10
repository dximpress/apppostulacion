<?php 
	//HEADER
	include_once('header.php'); 

	//HEADER MOVIL
	include_once('header-movil.php');

	//SIDEBAR
	include_once('sidebar.php');

	//MENU TOP
	include_once('menu-top.php');

	$id_personal = isset($id_personal) ? $id_personal : "999999999";
?>

<style type="text/css">
	.dt-buttons{
		display: none;
	}

	.dataTables_wrapper .dataTable td, .dataTables_wrapper .dataTable th {
		padding: 0.5rem;
	}

	@media (min-width: 992px){
		.aside-minimize:not(.aside-minimize-hover) .aside {
		    width: 70px;
		}
	}
	

	@media (min-width: 1200px){
		.container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
		    max-width: 1500px;
		}
	}
/*
	@media (min-width: 1400px){
		.container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
		    max-width: 1800px;
		}
	}
*/

.select2-container--default .select2-selection--single .select2-selection__rendered {
  width: 250px;
}

</style>



<!-- ********************** CONTENIDO - INICIO **************************** -->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container">
		<!--begin::Card-->
		<div class="card card-custom gutter-b">
			<div class="card-header flex-wrap py-3">
				<div class="card-title">
					<h3 class="card-label">Calendario de reuniones
					<span class="d-block text-muted pt-2 font-size-sm">Programadas por zoom</span>
					<!--
						<br> 
							<small>
								Semana del <span id="inicio_semana_horario"><?php echo $primer_dia_semana; ?></span> al <span id="fin_semana_horario"><?php echo $ultimo_dia_semana; ?></span> de <span id="mes_semana_horario"><?php echo $mesHoy_letra; ?></span> del <span id="anio_semana_horario"><?php echo $annoHoy; ?></span>
							</small>
					-->
					</h3>
					<input type="hidden" name="id_usuario_logueado" id="id_usuario_logueado" value="<?php echo"$id_usuario"; ?>">

				</div>

			
				<div class="card-toolbar">
				
				<?php if($cod_grupo == "10001" || $cod_grupo == "10002"){ ?>
					<a href="javascript:void(0);" class="btn btn-light-primary font-weight-bolder" id="btn-agendar-reunion" data-toggle="tooltip" data-original-title="Agendar reunión por Zoom" data-placement="left">
						<span class="svg-icon svg-icon-md" style="margin-right: 0;">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					        <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
					        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1"/>
					    </g>
							</svg>
						</span>
					</a>

				<?php } ?>
					
				</div>

				
			</div>

			<div class="card-body">
				<div id="kt_calendar"></div>
			</div>

		</div>
		<!--end::Card-->
	</div>
	<!--end::Container-->
</div>
<!--end::Entry-->
</div>

<!-- Ventana modal para registrar observaciones -->
<div class="modal fade" id="ModalAgendarReunion" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title"><i class="la la-laptop text-primary"></i> Agendar reunión</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  <span class="sr-only">Close</span>
              </button>
          </div>
          <div class="modal-body">
            <form name="registroagendarReunion" id="registroagendarReunion" enctype="multipart/form-data" autocomplete="off" noform-control form-control-sm>
              <div class="form-group">                
                <div class="row">  
                  <div class="col-md-12">
                  	<div class="form-group">
                    	<label for="postulante">Postulante: <span class="text-danger">*</span></label>
                    	<select name="postulante" id="postulante" class="form-control custom-select" required="required">
                    		<option value="">...</option>
                    		<?php 
												
													$SQLProspectos = "
							              SELECT 
															p.id AS id,
															UPPER(CONCAT(p.nombres, ' ', p.apellidos)) AS nombre
														FROM prospectos AS p
													";
													$SQLconsultaProspectos = $conexionmysqli->query($SQLProspectos);
				                    $SQLconsultaProspectos->data_seek(0);
				                      while ($registro_Prospectos = $SQLconsultaProspectos->fetch_assoc()) {
				                        $id = $registro_Prospectos['id'];
				                        $nombre = $registro_Prospectos['nombre'];
				                        echo "<option value=\"".$id."\">$nombre</option>";
				                      }
				                  $SQLconsultaProspectos->close();
								                    
												?>
                    	</select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  
                  <div class="col-md-3">
                  	<div class="form-group">
                    	<label for="fechagenda">Cuándo: <span class="text-danger">*</span></label>
                    	<input type="date" name="fechagenda" id="fechagenda" class="form-control" required="required">
                    </div>
                  </div>
                  
                  <div class="col-md-3">
                  	<div class="form-group">
                    	<label for="horagenda">Hora de inicio<span class="text-danger">*</span></label>
                    	<select name="horagenda" id="horagenda" class="form-control custom-select" required="required">
                    		<option value="09:00">09:00</option>
                    		<option value="09:30">09:30</option>
                    		<option value="10:00">10:00</option>
                    		<option value="10:30">10:30</option>
                    		<option value="11:00">11:00</option>
                    		<option value="11:30">11:30</option>
                    		<option value="12:00">12:00</option>
                    		<option value="12:30">12:30</option>
                    		<option value="13:00">13:00</option>
                    		<option value="13:30">13:30</option>
                    		<option value="14:00">14:00</option>
                    		<option value="14:30">14:30</option>
                    		<option value="15:00">15:00</option>
                    		<option value="15:30">15:30</option>
                    		<option value="16:00">16:00</option>
                    		<option value="16:30">16:30</option>
                    		<option value="17:00">17:00</option>
                    		<option value="17:30">17:30</option>
                    		<option value="18:00">18:00</option>
                    		<option value="18:30">18:30</option>
                    		<option value="19:00">19:00</option>
                    	</select>
                    </div>
                  </div>

                  <div class="col-md-3">
                  	<div class="form-group">
                    	<label for="horagendafin">Hora fin<span class="text-danger">*</span></label>
                    	<select name="horagendafin" id="horagendafin" class="form-control custom-select" required="required">
                    		<option value="09:00">09:00</option>
                    		<option value="09:30">09:30</option>
                    		<option value="10:00">10:00</option>
                    		<option value="10:30">10:30</option>
                    		<option value="11:00">11:00</option>
                    		<option value="11:30">11:30</option>
                    		<option value="12:00">12:00</option>
                    		<option value="12:30">12:30</option>
                    		<option value="13:00">13:00</option>
                    		<option value="13:30">13:30</option>
                    		<option value="14:00">14:00</option>
                    		<option value="14:30">14:30</option>
                    		<option value="15:00">15:00</option>
                    		<option value="15:30">15:30</option>
                    		<option value="16:00">16:00</option>
                    		<option value="16:30">16:30</option>
                    		<option value="17:00">17:00</option>
                    		<option value="17:30">17:30</option>
                    		<option value="18:00">18:00</option>
                    		<option value="18:30">18:30</option>
                    		<option value="19:00">19:00</option>
                    	</select>
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                    	<label for="observacionagenda">Observación: <span class="text-danger">*</span></label>
                    	<textarea  class="form-control" name="observacionagenda" id="observacionagenda" cols="15" rows="2" placeholder="..." required="required"></textarea>
                    	<br>
                    	<input type="hidden" name="recibePOST" value="registrarAgendarReunion">
                			<input type="hidden" name="idusuarioAgendarReunion" id="idusuarioAgendarReunion" value="<?php echo $id_usuario ?>">
                    	<button type="submit" class="btn btn-primary btn-sm">Registrar</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <a href="#!" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</a>
          </div>
      </div>
  </div>
</div>

<!-- Ventana modal para registrar observaciones -->
<div class="modal fade" id="ModalModificarReunion" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title"><i class="la la-laptop text-primary"></i> Modificar reunión</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  <span class="sr-only">Close</span>
              </button>
          </div>
          <div class="modal-body">
            <form name="formModificarReunion" id="formModificarReunion" enctype="multipart/form-data" autocomplete="off" noform-control form-control-sm>
              <div class="form-group">                
                <div class="row">  
                  <div class="col-md-12">
                  	<div class="form-group">
                    	<label for="postulantemod">Postulante: <span class="text-danger">*</span></label>
                    	<input type="text" name="postulantemod" id="postulantemod" class="form-control" readonly="readonly" value="">
                    </div>
                  </div>
                </div>

                <div class="row">
                  
                  <div class="col-md-3">
                  	<div class="form-group">
                    	<label for="fechagendamod">Cuándo: <span class="text-danger">*</span></label>
                    	<input type="date" name="fechagendamod" id="fechagendamod" class="form-control" required="required">
                    </div>
                  </div>
                  
                  <div class="col-md-3">
                  	<div class="form-group">
                    	<label for="horagendamod">Hora de inicio<span class="text-danger">*</span></label>
                    	<select name="horagendamod" id="horagendamod" class="form-control custom-select" required="required">
                    		<option value="09:00">09:00</option>
                    		<option value="09:30">09:30</option>
                    		<option value="10:00">10:00</option>
                    		<option value="10:30">10:30</option>
                    		<option value="11:00">11:00</option>
                    		<option value="11:30">11:30</option>
                    		<option value="12:00">12:00</option>
                    		<option value="12:30">12:30</option>
                    		<option value="13:00">13:00</option>
                    		<option value="13:30">13:30</option>
                    		<option value="14:00">14:00</option>
                    		<option value="14:30">14:30</option>
                    		<option value="15:00">15:00</option>
                    		<option value="15:30">15:30</option>
                    		<option value="16:00">16:00</option>
                    		<option value="16:30">16:30</option>
                    		<option value="17:00">17:00</option>
                    		<option value="17:30">17:30</option>
                    		<option value="18:00">18:00</option>
                    		<option value="18:30">18:30</option>
                    		<option value="19:00">19:00</option>
                    	</select>
                    </div>
                  </div>

                  <div class="col-md-3">
                  	<div class="form-group">
                    	<label for="horagendafinmod">Hora fin<span class="text-danger">*</span></label>
                    	<select name="horagendafinmod" id="horagendafinmod" class="form-control custom-select" required="required">
                    		<option value="09:00">09:00</option>
                    		<option value="09:30">09:30</option>
                    		<option value="10:00">10:00</option>
                    		<option value="10:30">10:30</option>
                    		<option value="11:00">11:00</option>
                    		<option value="11:30">11:30</option>
                    		<option value="12:00">12:00</option>
                    		<option value="12:30">12:30</option>
                    		<option value="13:00">13:00</option>
                    		<option value="13:30">13:30</option>
                    		<option value="14:00">14:00</option>
                    		<option value="14:30">14:30</option>
                    		<option value="15:00">15:00</option>
                    		<option value="15:30">15:30</option>
                    		<option value="16:00">16:00</option>
                    		<option value="16:30">16:30</option>
                    		<option value="17:00">17:00</option>
                    		<option value="17:30">17:30</option>
                    		<option value="18:00">18:00</option>
                    		<option value="18:30">18:30</option>
                    		<option value="19:00">19:00</option>
                    	</select>
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                    	<label for="observacionagendamod">Observación: <span class="text-danger">*</span></label>
                    	<textarea  class="form-control" name="observacionagendamod" id="observacionagendamod" cols="15" rows="2" placeholder="..." required="required"></textarea>
                    	<br>
                    	<input type="hidden" name="recibePOST" value="modificarReunion">
                			<input type="hidden" name="idusuarioModificaReunion" id="idusuarioModificaReunion" value="<?php echo $id_usuario ?>">
                			<input type="hidden" name="idreunionmod" id="idreunionmod">
                    	<button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                    	<a href="javascript:void(0);" class="btn btn-warning btn-sm ml-5" id="btn_eliminar_reunion">Eliminar</a>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <a href="#!" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</a>
          </div>
      </div>
  </div>
</div>

<!-- ********************** CONTENIDO - FIN **************************** -->

<?php 
	include_once('footer.php');
?>

<!--begin::Page Vendors(used by this page)-->
<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="assets/js/pages/features/calendar/basic.js"></script>
<!-- FullCalendar - Idiomas -->
<script src="assets/plugins/custom/fullcalendar/locales/es.js"></script>

<script type="text/javascript">

var id_usuario = $('#id_usuario_logueado').val();
var cod_grupoUsua_logueado = $('#cod_grupoUsua_logueado').val();
var tperiodo = 0;
var id_programa = $('#id_programa_princ');

$(document).ready(function() {
  $('#postulante').select2();
});

$('#btn-agendar-reunion').on( 'click', function () {
  $('#ModalAgendarReunion').modal('show');
});

//>Agendar reunion
$("#registroagendarReunion").submit(function (evt) {
  evt.preventDefault();
  evt.stopPropagation();
  var formData = new FormData($("form#registroagendarReunion")[0]);
  var form = $("#registroagendarReunion");
    $.ajax({
     type: "POST",
     url: "jquery.php",
     data: formData,
     dataType: 'json',
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
      toastr.success("Registro guardado");

      //Oculto la ventana modal
      $('#ModalAgendarReunion').modal('hide');

      //Regresco el calendario
      window.location.reload();

      // KTCalendarBasic.init('refetchEvents');
      // KTCalendarBasic.refetchEvents();
      // calendar.refetchEvents();
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

//>Modificar reunion
$("#formModificarReunion").submit(function (evt) {
  evt.preventDefault();
  evt.stopPropagation();
  var formData = new FormData($("form#formModificarReunion")[0]);
  var form = $("#formModificarReunion");
    $.ajax({
     type: "POST",
     url: "jquery.php",
     data: formData,
     dataType: 'json',
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
      form.trigger("reset");
      curSubmit.prop('disabled', false);
      curSubmit.text('Actualizar');
      toastr.success("Registro actualizado");

      //Oculto la ventana modal
      $('#ModalModificarReunion').modal('hide');

      //Refresco el calendario
      window.location.reload();

      // KTCalendarBasic.init('refetchEvents');
      // KTCalendarBasic.refetchEvents();
      // calendar.refetchEvents();

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

//Funcion para actualizar evento desde las funcional del calendar
//Ej. arrastrar
function actualizarEvento(id,fi,ff){
	// console.log('Registro actualizado: id- '+id+' fi- '+fi+' ff- '+ff);
	
	var id_u = $('#id_grupoUsua_logueado').val();

	$.post( "jquery.php", { "id":id, "fi":fi, "ff":ff, "id_u":id_u, "recibePOST":"actualizarEvento" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){
      	console.log('Registro actualizado');
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

//Eliminar reunion
//btn_eliminar_reunion
$(document).on("click", "a#btn_eliminar_reunion", function () {
	var id = $('#idreunionmod').val();
	// console.log('Eliminar reunion: '+id);
		
		Swal.fire({
	    title: '¿Estás seguro de realizar este cambio?',
	    icon: 'warning',
	    showCancelButton: true,
	    confirmButtonColor: '#3085d6',
	    cancelButtonColor: '#d33',
	    confirmButtonText: 'Si',
	    cancelButtonText: 'No'
	  }).then((result) => {
	    if (result.isConfirmed) {
	      Swal.fire(
	        'Listo',
	        'Registro eliminado.',
	        'success'
	      );

	      //Actualizar evento
	      eliminarEvento(id);

	    }else{
	      info.revert();
	    }
	  })

});

function eliminarEvento(i){
	$.post( "jquery.php", { "id":i, "recibePOST":"eliminarEvento" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){
      	console.log('Registro eliminado');
      	//Oculto la ventana modal
     		$('#ModalModificarReunion').modal('hide');

     		//Refresco el calendario
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
}

</script>