<?php 
	//HEADER
	include_once('header.php'); 

	//HEADER MOVIL
	include_once('header-movil.php');

	//SIDEBAR
	include_once('sidebar.php');

	//MENU TOP
	include_once('menu-top.php');
?>


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
					<h3 class="card-label">Programas
					<span class="d-block text-muted pt-2 font-size-sm">Listados de programas para configuración</span></h3>
				</div>
			
				<div class="card-toolbar">
					
					<div class="dropdown dropdown-inline mr-2">
						<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="svg-icon svg-icon-md">
							
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24" />
									<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
									<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
								</g>
							</svg>
					
						</span>Exportar</button>
					
						<div class="dropdown-menu dropdown-menu-sm dropdown-menu-left">
					
							<ul class="navi flex-column navi-hover py-2">
								<!-- <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Opciones:</li> -->
								<li class="navi-item">
									<a href="#" class="navi-link">
										<span class="navi-icon">
											<i class="la la-print"></i>
										</span>
										<span class="navi-text">Imprimir</span>
									</a>
								</li>
								<li class="navi-item">
									<a href="#" class="navi-link">
										<span class="navi-icon">
											<i class="la la-file-excel-o"></i>
										</span>
										<span class="navi-text">Excel</span>
									</a>
								</li>
								<li class="navi-item">
									<a href="#" class="navi-link">
										<span class="navi-icon">
											<i class="la la-file-pdf-o"></i>
										</span>
										<span class="navi-text">PDF</span>
									</a>
								</li>
							</ul>
							
						</div>
					
					</div>
				<!--
					<a href="#!" class="btn btn-light-primary font-weight-bolder  mr-2">
						<span class="svg-icon svg-icon-md">
						
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <rect x="0" y="0" width="24" height="24"/>
							        <path d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z" fill="#000000"/>
							    </g>
							</svg>
						
						</span>
						Filtros
					</a>
				-->
				
					<a href="#!" class="btn btn-light-primary font-weight-bolder" data-toggle="modal" data-target="#ModalRegistrarPeriodo">
						<span class="svg-icon svg-icon-md">
						
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24" />
									<circle fill="#000000" cx="9" cy="15" r="6" />
									<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
								</g>
							</svg>
						
						</span>
						Registrar edición
					</a>
					
				</div>
			
			</div>
			<div class="card-body">
				<!--begin: Datatable-->
				<table class="table table-bordered" id="dataTable_listadoPeriodos">
					<thead>
						<tr>
							<th>ID</th>
							<th>Programa</th>
							<th>Institución</th>
							<th>Estado</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
				<!--end: Datatable-->
			</div>
		</div>
		<!--end::Card-->
	</div>
	<!--end::Container-->
</div>
<!--end::Entry-->
</div>
<!-- ********************** CONTENIDO - FIN **************************** -->


<!-- Ventana modal para registrar periodo -->
<div class="modal fade" id="ModalRegistrarPeriodo" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <form name="formRegistrarPeriodo" id="formRegistrarPeriodo" class="form" accept-charset="UTF-8" noform-control>
          
          <div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-calendar"></i> Registrar programa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  <span class="sr-only">Close</span>
              </button>
          </div>
          <div class="modal-body" id="contenedor-modal-editarperiodo">
            <div class="container">
              <div class="form-group row">
                <div class="col-lg-12">
                  <label>Programa: <span class="text-danger">*</span></label>
                  <input type="text" name="programa_r" id="programa_r" class="form-control" placeholder="..." required="required" />
                </div>
              </div>

              <div class="form-group row">
               <div class="col-lg-12">
                  <label>Institución: <span class="text-danger">*</span></label>
                  <input type="text" name="institucion_r" id="institucion_r" class="form-control" placeholder="..." required="required" />
               </div>
             </div>

             <div class="form-group row">
               <div class="col-lg-8">
                  <label>URL: <span class="text-danger">*</span></label>
                  <input type="text" name="url_r" id="url_r" class="form-control" placeholder="..." required="required" />
               </div>
               <div class="col-lg-4">
                  <label>Estado: <span class="text-danger">*</span></label>
                  <select name="estado_r" id="estado_r" class="form-control" required="required">
                    <option value="Abierta">Abierta</option>
                    <option value="Cerrada">Cerrada</option>
                  </select>
               </div>
             </div>

            </div>
          </div>
          
          <div class="modal-footer">

            <div class="container">
              <div class="row">
                <div class="col-lg-6">
                  <input type="hidden" name="recibePOST" value="registrarPeriodo">
                  <button type="submit" class="btn btn-light-primary btn-sm mr-2">Registrar</button>
                </div>
                <div class="col-lg-6 text-lg-right">
                  <a href="#!" class="btn btn-light-danger btn-sm" id="btn_cerrar_modal" data-dismiss="modal">Cancelar</a>
                </div>
              </div>
            </div>
            
          </div>
        </form>

      </div>
  </div>
</div>

<!-- Ventana modal para editar periodo -->
<div class="modal fade" id="ModalEditarPeriodo" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <form name="formEditarPeriodo" id="formEditarPeriodo" class="form" accept-charset="UTF-8" noform-control>
          
          <div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-calendar"></i> Editar programa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  <span class="sr-only">Close</span>
              </button>
          </div>
          
           <div class="modal-body" id="contenedor-modal-editarperiodo">
            <div class="container">
              <div class="form-group row">
                <div class="col-lg-12">
                  <label>Programa: <span class="text-danger">*</span></label>
                  <input type="text" name="programa_e" id="programa_e" class="form-control" placeholder="..." required="required" />
                </div>
              </div>

              <div class="form-group row">
               <div class="col-lg-12">
                  <label>Institución: <span class="text-danger">*</span></label>
                  <input type="text" name="institucion_e" id="institucion_e" class="form-control" placeholder="..." required="required" />
               </div>
             </div>

             <div class="form-group row">
               <div class="col-lg-8">
                  <label>URL: <span class="text-danger">*</span></label>
                  <input type="text" name="url_e" id="url_e" class="form-control" placeholder="..." required="required" />
               </div>
               <div class="col-lg-4">
                  <label>Estado: <span class="text-danger">*</span></label>
                  <select name="estado_e" id="estado_e" class="form-control" required="required">
                    <option value="Abierta">Abierta</option>
                    <option value="Cerrada">Cerrada</option>
                  </select>
               </div>
             </div>

            </div>
          </div>
          
          <div class="modal-footer">

            <div class="container">
              <div class="row">
                <div class="col-lg-6">
                  <input type="hidden" name="idperiodo_e" id="idperiodo_e">
                  <input type="hidden" name="recibePOST" value="editarPeriodo">
                  <button type="submit" class="btn btn-light-primary btn-sm mr-2">Actualizar</button>
                </div>
                <div class="col-lg-6 text-lg-right">
                  <a href="#!" class="btn btn-light-danger btn-sm" id="btn_cerrar_modal" data-dismiss="modal">Cancelar</a>
                </div>
              </div>
            </div>
            
          </div>
        </form>

      </div>
  </div>
</div>

<!-- Ventana modal para eliminar periodo -->
<div class="modal fade" id="ModalEliminarPeriodo" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <form name="formEliminarPeriodo" id="formEliminarPeriodo" class="form" accept-charset="UTF-8" noform-control>
          
          <div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-calendar"></i> Eliminar programa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  <span class="sr-only">Close</span>
              </button>
          </div>
          <div class="modal-body" id="contenedor-modal-editarperiodo">
            <div class="container">
              <div class="form-group row">
                <div class="col-lg-12">
                  <h2>Período: <span id="tperiodo_modal_elim"></span></h2>
                </div>
              </div>
              <div class="form-group row">
               <div class="col-lg-12">
                 <h3>Fecha Inicio: <span id="f_iniciop_modal_elim"></span> <br> Fecha Fin: <span id="f_finp_modal_elim"></span> <br> Activo: <span id="activo_pmodal_elim"></span></h3>
               </div>
               <div class="col-lg-12">
                 <div id="mensajeElim_modal"></div>
               </div>
             </div>
            </div>
          </div>
          
          <div class="modal-footer">

            <div class="container">
              <div class="row">
                <div class="col-lg-6">
                  <input type="hidden" name="id_periodo_modal_elim" id="id_periodo_modal_elim">
                  <input type="hidden" name="recibePOST" value="checkEliminarPeriodo">
                  <button type="submit" class="btn btn-light-primary btn-sm mr-2">Eliminar</button>
                </div>
                <div class="col-lg-6 text-lg-right">
                  <a href="#!" class="btn btn-light-danger btn-sm" id="btn_cerrar_modal_elim_periodo">Cancelar</a>
                </div>
              </div>
            </div>
            
          </div>
        </form>

      </div>
  </div>
</div>


<?php 
	include_once('footer.php');
?>

<script type="text/javascript">

$(document).ready(function() {
	// console.log('entro a dataTable_listadoPeriodos');
	//Oculto los menus
	$('.collapse').collapse('hide');
	/****Tooltips****/
  	$('[data-toggle="tooltip"]').tooltip();
	/****Data Tables****/
	var table = $('#dataTable_listadoPeriodos').DataTable({ // $('#dataTable_listadoPeriodos').DataTable.clear().draw();
	  	"language": {
	        "url": "assets/js/Spanish.json"
	    },
	    "pagingType": "full_numbers",
	    "pageLength": 10,
	    "order": [[0, 'asc']],
	    "ajax": "periodosjson.php", //Listado en formato JSON
	    "deferRender": true,
        "columns": [
            { "data": "id_periodo" },
            { "data": "periodo" },
            { "data": "institucion" },
            { "data": "estado" },
            {
                "className": 'otros-detalles',
                "orderable": false,
                "data": null,
                "defaultContent": '',
                "render": function () {
                    return '<a href="#!" class="editar" data-toggle="tooltip" data-original-title="Habilitar / Deshabilitar" data-placement="left"><i class="las la-edit text-primary"></i> </a> ';
                 },
                 width:"15px"
            }

        ],
	    "columnDefs": [ 
		    {
		      "targets"  : 'no-sort',
		      "orderable": false,
		    },
            {
                "targets": [ 0 ],
                "visible": false
            }
	    ]

	  });

	//***> Habilitar los tooltips	
	$('#dataTable_listadoPeriodos tbody').on('mouseover', 'tr', function () {
	    $('[data-toggle="tooltip"]').tooltip({
	        trigger: 'hover',
	        html: true
	    });
	});

	//***> Editar
    $('#dataTable_listadoPeriodos tbody').on('click', 'td.otros-detalles a.editar', function () {
      var data = table.row( $(this).parents('tr') ).data();
      var id_periodo = data.id_periodo;
      var programa_e = data.periodo;
			var institucion_e = data.institucion;
			var url_e = data.url;
			var estado_e = data.estado;

	 		//ModalEditarPeriodo
	 		$('#programa_e').val(programa_e);
	 		$('#institucion_e').val(institucion_e);
			$('#url_e').val(url_e);
			$('#estado_e').val(estado_e);
			$('#idperiodo_e').val(id_periodo);
	 		$('#ModalEditarPeriodo').modal('show');
    });

    //***> Eliminar
    $('#dataTable_listadoPeriodos tbody').on('click', 'td.otros-detalles a.eliminar', function () {
      var data = table.row( $(this).parents('tr') ).data();
      var id_periodo = data.id_periodo;
      var periodo    = data.periodo;
      var f_inicio   = data.f_iniciop;
 			var f_fin      = data.f_finp;
 			var activo     = data.activon;
 			var tactivo	   = '';

 		if (activo == 1) {
 			tactivo = 'Si';
 		}else{
 			tactivo = 'No';
 		}

 		$('#tperiodo_modal_elim').text(periodo);
		$('#f_iniciop_modal_elim').text(f_inicio);
		$('#f_finp_modal_elim').text(f_fin);
		$('#activo_pmodal_elim').text(tactivo);
		$('#id_periodo_modal_elim').val(id_periodo);

 		//ModalEliminarPeriodo
 		$('#ModalEliminarPeriodo').modal('show');
 
       // console.log('Editar: '+ id_periodo);
    });

    //***> Ver detalles
    $('#dataTable_listadoPeriodos tbody').on('click', 'td.otros-detalles a.detalles', function () {
        var data = table.row( $(this).parents('tr') ).data();
        var id_periodo = data.id_periodo;
 		//
 		window.location.href = "detalles-editar-periodo.php?menu=config&submenu=listaperiodos&id_edicion="+id_periodo;
      //  console.log('Ver detalles: '+ id_periodo);
    });

});

//>Registrar editar periodo
$("#formRegistrarPeriodo").submit(function (evt) {
  evt.preventDefault();
  evt.stopPropagation();
  var formData = new FormData($("form#formRegistrarPeriodo")[0]);
  var form = $("#formRegistrarPeriodo");
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
	  toastr.success("Período actualizado");
	  $('#ModalRegistrarPeriodo').modal('hide');
	  //Recargo la tabla
		$('#dataTable_listadoPeriodos').DataTable().ajax.reload( null, false );

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
});

//>Registrar editar periodo
$("#formEditarPeriodo").submit(function (evt) {
  evt.preventDefault();
  evt.stopPropagation();
  var formData = new FormData($("form#formEditarPeriodo")[0]);
  var form = $("#formEditarPeriodo");
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
    mostrarLoader();
   //Cambiar boton guardar a enviando
    curSubmit = form.find(":submit");
    curSubmit.prop('disabled', true);
    curSubmit.text('Actualizando');
   },
   success: function( respuesta ){
    var valor = respuesta.data.cant;
    if (valor == 1) {
    	setTimeout(ocultarLoader, 2000);
    	curSubmit.prop('disabled', false);
	    curSubmit.text('Actualizar');
	    toastr.info("Solo puede haber un período activo, revise el listado y desactive cualquier período activo antes de activar un nuevo período.");
    	return false;
    }else{
    	//Mensajes de confirmacion
	    setTimeout(ocultarLoader, 2000);
	    form.trigger("reset");
	    curSubmit.prop('disabled', false);
	    curSubmit.text('Actualizar');
	    toastr.success("Período actualizado");
	    $('#ModalEditarPeriodo').modal('hide');
	    //Recargo la tabla
		$('#dataTable_listadoPeriodos').DataTable().ajax.reload( null, false );
    }

    //console.log(respuesta.data[0].cant);
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
});

//>Eliminar periodo
$("#formEliminarPeriodo").submit(function (evt) {
  evt.preventDefault();
  evt.stopPropagation();
  var formData = new FormData($("form#formEliminarPeriodo")[0]);
  var form = $("#formEliminarPeriodo");
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
    mostrarLoader();
   //Cambiar boton guardar a enviando
    curSubmit = form.find(":submit");
    curSubmit.prop('disabled', true);
    curSubmit.text('Eliminando');
   },
   success: function( respuesta ){
    var cant = respuesta.data.cant;
    var error = respuesta.data.error;
	var mensaje = respuesta.data.mensaje;

    if (cant == 1) {
    	setTimeout(ocultarLoader, 2000);
    	curSubmit.prop('disabled', false);
	    curSubmit.text('Eliminar');
	    $('#mensajeElim_modal').html("<div class='alert alert-custom alert-outline-2x alert-outline-primary fade show mb-5' role='alert'><div class='alert-icon'><i class='flaticon-warning'></i></div><div class='alert-text'>Este período ya tiene registros de configuración vinculados, si continua, estos registros también serán eliminados. ¿Desea continuar? <a href='#!' class='btn btn-link btn-light-primary' id='btnElimsi'>Si</a> <a href='#!' class='btn btn-link btn-light-danger' id='btnElimno'>No</a></div></div>");
    	return false;   	
    }else{
    	if (error == 0) {
    		//Mensajes de confirmacion
		    setTimeout(ocultarLoader, 2000);
		    form.trigger("reset");
		    curSubmit.prop('disabled', false);
		    curSubmit.text('Eliminar');
		    toastr.success(mensaje);
		    $('#ModalEliminarPeriodo').modal('hide');
		    //Recargo la tabla
			$('#dataTable_listadoPeriodos').DataTable().ajax.reload( null, false );	
    	}else{
    		//Mensajes de confirmacion
		    setTimeout(ocultarLoader, 2000);
		    form.trigger("reset");
		    curSubmit.prop('disabled', false);
		    curSubmit.text('Eliminar');
		    toastr.error(mensaje);
		    $('#ModalEliminarPeriodo').modal('hide');
		    //Recargo la tabla
			$('#dataTable_listadoPeriodos').DataTable().ajax.reload( null, false );	
    	}
    	
    }

    //console.log(respuesta.data[0].cant);
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
});

// Boton Eliminar Si, ventana Modal
$(document).on("click", "#btnElimsi", function (e) {
	var id_periodo = $('#id_periodo_modal_elim').val();
	var form = $("#formEliminarPeriodo");

	$.post( "jquery.php", { "id_periodo":id_periodo, "recibePOST":"eliminarPeriodo" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){	
	      var error   = data.data.error;
	      var mensaje = data.data.mensaje;
	      if (error == 0) {
	      	toastr.success(mensaje);
	      	//Mensajes de confirmacion
		    setTimeout(ocultarLoader, 2000);
		    form.trigger("reset");
		    curSubmit.prop('disabled', false);
		    curSubmit.text('Eliminar');
		    toastr.error(mensaje);
		    $('#ModalEliminarPeriodo').modal('hide');
		    //Recargo la tabla
			$('#dataTable_listadoPeriodos').DataTable().ajax.reload( null, false );	
	      }else{
	      	toastr.error(mensaje);
	      	//Mensajes de confirmacion
		    setTimeout(ocultarLoader, 2000);
		    form.trigger("reset");
		    curSubmit.prop('disabled', false);
		    curSubmit.text('Eliminar');
		    toastr.error(mensaje);
		    $('#ModalEliminarPeriodo').modal('hide');
		    //Recargo la tabla
			$('#dataTable_listadoPeriodos').DataTable().ajax.reload( null, false );	
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
});

//Boton eliminar No, ventana Modal
$(document).on("click", "#btnElimno", function (e) {
	$('#ModalEliminarPeriodo').modal('hide');
	$('#mensajeElim_modal').html("");
});

//Boton Cancelar Ventana Modal Eliminar Periodo
$(document).on("click", "#btn_cerrar_modal_elim_periodo", function (e) {
	$('#ModalEliminarPeriodo').modal('hide');
	$('#mensajeElim_modal').html("");
});

</script>