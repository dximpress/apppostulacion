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

	.btns-filtro{
		cursor:pointer;
	}

	.card.card-custom > .card-header .card-title {
	  margin: 0.5rem !important;
	}
/*
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

	@media (min-width: 1400px){
		.container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
		    max-width: 1800px;
		}
	}
*/

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
					<h3 class="card-label">Listado de Prospectos
					<span class="d-block text-muted pt-2 font-size-sm">Activos</span></h3>
					<input type="hidden" name="id_usuario_logueado" id="id_usuario_logueado" value="<?php echo"$id_usuario"; ?>">

				</div>

			
				<div class="card-toolbar">					

					<div class="btn btn-icon btn-clean btn-lg mr-1 pulse pulse-primary" id="btn_leyenda">
						<span class="svg-icon svg-icon-xl svg-icon-primary">

							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						        <rect x="0" y="0" width="24" height="24"/>
						        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
						        <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"/>
						        <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"/>
						    </g>
							</svg>

						</span>
						<span class="pulse-ring"></span>
					</div>

					<div class="dropdown dropdown-inline mr-2" data-toggle="tooltip" data-original-title="Opciones de exportación" data-placement="top">
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
									<a href="#" class="navi-link" id="btn-exp-imp">
										<span class="navi-icon">
											<i class="la la-print"></i>
										</span>
										<span class="navi-text">Imprimir</span>
									</a>
								</li>
								<li class="navi-item">
									<a href="#" class="navi-link" id="btn-exp-excel">
										<span class="navi-icon">
											<i class="la la-file-excel-o"></i>
										</span>
										<span class="navi-text">Excel</span>
									</a>
								</li>
								<li class="navi-item">
									<a href="#" class="navi-link" id="btn-exp-pdf">
										<span class="navi-icon">
											<i class="la la-file-pdf-o"></i>
										</span>
										<span class="navi-text">PDF</span>
									</a>
								</li>
							</ul>
							
						</div>
					
					</div>
				
				<?php if($cod_grupo == "100011111111" || $cod_grupo == "10002222222222"){ ?>
					<a href="registro-matricula.php?menu=matriculas&submenu=registromatricula" class="btn btn-light-primary font-weight-bolder" data-toggle="tooltip" data-original-title="Registrar prospecto" data-placement="top">
						<span class="svg-icon svg-icon-md">
						
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24" />
									<circle fill="#000000" cx="9" cy="15" r="6" />
									<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
								</g>
							</svg>
						</span>
						Nuevo registro
					</a>
				<?php } ?>
					
				</div>

				
			</div>

			<div class="card-body">
				<div class="alert alert-secondary" id="mensaje">Seleccione un programa para cargar registros.</div>
				<div id="filtros"></div>

				<?php include_once('estadisticashome.php'); ?>

				<hr>

				<!--begin: Datatable-->
				<table class="table table-bordered table-responsive table-checkable" id="dataTable_listadoProspectos">
					<thead>
						<tr>
							<th></th>
							<th>no</th>
							<th>orden</th>
							<th>Fecha Reg.</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Cédula</th>
							<th>Ciudad</th>
							<th>Correo</th>
							<th>Teléfono Celular</th>
							<th>Estado</th>
							<th>Estado</th> <!-- Estado para imprimir -->
							<th>Programa</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				<!--
					<tfoot>
						<tr>
							<th></th>
							<th>no</th>
							<th>orden</th>
							<th>Fecha Reg.</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Cédula</th>
							<th>Ciudad</th>
							<th>Correo</th>
							<th>Teléfono Celular</th>
							<th>Estado</th>
							<th>Estado</th>
							<th>Programa</th>
							<th></th>
						</tr>
					</tfoot>
				-->
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

<!-- Ventana modal para registrar observaciones -->
<div class="modal fade" id="ModalObservacionesPostulacion" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title"><i class="la la-comment text-primary"></i> Registrar observación</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  <span class="sr-only">Close</span>
              </button>
          </div>
          <div class="modal-body">
            <form name="registrobservacionPostulacion" id="registrobservacionPostulacion" enctype="multipart/form-data" autocomplete="off" noform-control form-control-sm>
              <div class="form-group">
                <input type="hidden" name="recibePOST" value="registrarObservacionesPostulacion">
                <input type="hidden" name="idpostulacionObserv" id="idpostulacionObserv">
                <input type="hidden" name="idusuariopostulacionObserv" id="idusuariopostulacionObserv" value="<?php echo $id_usuario ?>">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                    	<label for="nuevaobservacionPost">Observación: <span class="text-danger">*</span></label>
                    	<textarea  class="form-control" name="nuevaobservacionPost" id="nuevaobservacionPost" cols="15" rows="10" placeholder="..." required="required"></textarea>
                    	<br>
                    	<button type="submit" class="btn btn-primary btn-sm">Registrar</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <a href="#!" class="btn btn-danger btn-sm" id="btn_cerrar_modalObservacion" data-dismiss="modal">Cerrar</a>
          </div>
      </div>
  </div>
</div>

<!-- Ventana modal para leyenda -->
<div class="modal fade" id="ModalLeyendaPostulaciones" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title"><i class="la la-info-circle text-primary"></i> Leyenda</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  <span class="sr-only">Close</span>
              </button>
          </div>
          <div class="modal-body">

          	<ul class="list-group">
          		<li class="list-group-item"><span style="background-color: lightblue; color: lightblue; font-weight: bold; margin-left: 10px; margin-right: 10px;">---</span> Postulante que realizó el proceso de postulación con todos los datos obligatorios.</li>
          		<li class="list-group-item"><span style="background-color: lightcoral; color: lightcoral; font-weight: bold; margin-left: 10px; margin-right: 10px;">---</span> Postulante que se registró pero no confirmó el registro desde el correo.</li>
          	</ul>

          	<br>
          	<p>Estados:</p>

          	<ul class="list-group">
          		<li class="list-group-item"><b>Postuló:</b> Postulante que realizó el proceso de postulación con todos los datos obligatorios.</li>
          		<li class="list-group-item"><b>Incompleto:</b> Postulante que se comenzó el proceso de postulación pero no ha terminado aún.</li>
          		<li class="list-group-item"><b>Nuevo (color azul):</b> Postulante que comenzó el proceso de postulación pero no ha llenado nigún campo.</li>
          		<li class="list-group-item"><b>Pustulará:</b> Postulante que a criterio del asesor va a continuar con el proceso de postulación.</li>
          		<li class="list-group-item"><b>Pendiente:</b> Postulante que por un motivo y otro esta pendiente de continuar con el proceso de postulación.</li>
          		<li class="list-group-item"><b>Entrevista:</b> Postulante que ha sido agendado para la entrevista.</li>
          		<li class="list-group-item"><b>Reserva de plaza:</b> Postulante que ya realizó el pago de la reserva de plaza.</li>
          	</ul>

          </div>
          <div class="modal-footer">
            <a href="#!" class="btn btn-danger btn-sm" id="btn_cerrar_modalLeyendaPostulaciones" data-dismiss="modal">Cerrar</a>
          </div>
      </div>
  </div>
</div>


<!-- Ventana modal para consultar postulaciones -->
<div class="modal fade" id="ModalConsultaPostulaciones" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title"><i class="la la-info-circle text-primary"></i> Postulaciones</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  <span class="sr-only">Close</span>
              </button>
          </div>
          <div class="modal-body">
          	<span id="npostulante"></span><br>
          	<ul id="listpostulaciones">
          		<li><img src="assets/media/spinners/loading_2.gif"></li>
          	</ul>
          </div>
          <div class="modal-footer">
            <a href="#!" class="btn btn-danger btn-sm" id="btn_cerrar_modalLeyendaPostulaciones" data-dismiss="modal">Cerrar</a>
          </div>
      </div>
  </div>
</div>

<!-- ********************** CONTENIDO - FIN **************************** -->

<?php 
	include_once('footer.php');
	/* Obtener los caracteres despues del punto
	$url = "2. 36015805.16923.jpg"; //23601580516923.jpg
	$id = substr($url, strrpos($url, '.') + 1);
	echo $id;
	*/
?>

<script type="text/javascript">
	//var tperiodo = $('#id_edicion').find(':selected').data('titulo');
	/* Funcion para añadir campos ocultos a cada ROW de la tabla */
	function format ( d ) {
	    // `d` is the original data object for the row
	    if(d.id != null){
			  return '<table class="detalles-tabla table table-bordered" cellspacing="0" border="0" style="padding-left:25px;">'+
			    		'<thead>'+
			    			'<tr><th>Provincia</th><th>Dirección</th><th>Télefono convencional</th></tr>'+
			    		'</thead>'+
			    		'<tbody>'+
			    		'<tr><td>'+d.provincia+'</td><td>'+d.direccion+'</td><td>'+d.tconvencional+'</td></tr>'+
			    		'</tbody>'+
			    	'</table>'+
			    	'<table class="detalles-tabla table table-bordered" cellspacing="0" border="0" style="padding-left:25px;" id="tabla-observacion-'+d.id+'" data-carga="0">'+
			    		'<thead>'+
				    		'<tr><th colspan="3" class="text-center bg-light-primary">Observaciones</th></tr>'+
				    		'<tr><th>Fecha</th><th>Observación</th><th>Registrado por</th></tr>'+
			    		'</thead>'+
			    		'<tfoot>'+
			    			'<tr><td colspan="3"><a href="javascript:void(0)" class="btn btn-primary btn-sm btn-registrar-observacion" data-post="'+d.id+'"> <span class="spantext">Añadir observación</span> <i class="la la-plus-circle text-white"></i> </a></td></tr>'+
			    		'</tfoot>'+
			    		'<tbody id="observaciones'+d.id+'">'+
						  	/*
						  	'<tr>'+
						        '<td>.</td><td>.</td><td>.</td>'+
							'</tr>'+
							*/
						'</tbody>'+
				    '</table>'
				;
			}else{
				return '<table class="detalles-tabla table table-bordered" cellspacing="0" border="0" style="padding-left:25px;">'+
			    		'<thead>'+
			    			'<tr><th>Provincia</th><th>Dirección</th><th>Télefono convencional</th></tr>'+
			    		'</thead>'+
			    		'<tbody>'+
			    		'<tr><td>'+d.provincia+'</td><td>'+d.direccion+'</td><td>'+d.tconvencional+'</td></tr>'+
			    		'</tbody>'+
			    	'</table>'
				;
			}
	}

var id_usuario = $('#id_usuario_logueado').val();
var cod_grupoUsua_logueado = $('#cod_grupoUsua_logueado').val();
var tperiodo = 0;
var id_programa = $('#id_programa_princ');
$(document).ready(function() {
	
	//Oculto los menus
	$('.collapse').collapse('hide');
	
	/****Tooltips****/
  $('[data-toggle="tooltip"]').tooltip();

  cargarDatos(id_programa.val(), null);
  
  $('#mensaje').hide();

});


function cargarDatos(p, f){

	/****Data Tables****/
	var table = $('#dataTable_listadoProspectos').DataTable({
	  	"language": {
	        "url": "assets/js/Spanish.json"
	    },
	    "pagingType": "full_numbers",
	    "pageLength": 10,
	    "order": [[1, 'desc']],
	    "ajax": "prospectosjson.php?id_programa="+p+"&filtro="+f, //Listado en formato JSON
	    "deferRender": true,
        "columns": [
            { "data": "no" }, //0
            { "data": "orden" }, //1
            { "data": "id_usuario" }, //2
            { "data": "fecha_reg" }, //3
            { "data": "nombres" }, //4
						{ "data": "apellidos" }, //4
						{ "data": "cedula" }, //6
						{ "data": "ciudad" }, //7
						{ "data": "correo" }, //8
						{ "data": "tcelular" }, //9
						{ "data": "estadou" }, //10
						{ "data": "estadou" }, //11
						{ "data": "programa" }, //12
            {
                "className": 'otros-detalles',
                "orderable": false,
                "data": null,
                "defaultContent": '',
                "render": function () {
                     return '<a href="#!" class="abrir" data-toggle="tooltip" data-original-title="Mostrar / Ocultar observaciones" data-placement="left"><i class="la la-plus-circle text-primary" aria-hidden="true"></i> </a> <a href="#!" class="verpostulacion" data-toggle="tooltip" data-original-title="Ver postulación" data-placement="left"><i class="la la-eye text-primary" aria-hidden="true"></i> </a> <a href="#!" class="editar" data-toggle="tooltip" data-original-title="Editar" data-placement="left"><i class="la la-edit text-primary" aria-hidden="true"></i> </a> <a href="#!" class="consularpostulaciones" data-toggle="tooltip" data-original-title="Consultar postulaciones" data-placement="left"><i class="la la-check-circle text-primary" aria-hidden="true"></i> </a> <a href="#!" class="aprobarfinanciamiento" data-toggle="tooltip" data-original-title="Aprobar financiamiento" data-placement="left"><i class="la la-dollar text-primary" aria-hidden="true"></i> </a>';// 
                 },
                 width:"15px"
            }

        ],

        "dom": 'Blfrtip',
        "buttons": [
	        {
	        	extend: 'excelHtml5',
	          text: 'Exportar a Excel',
	          className: 'btn-exportacion btn-excel',
	          title: function() {
	          //	if ($('#id_programa_princ').val() != null) {
	          			return 'Listado de Postulantes'
	          //	}else{
	          //			return $('option:selected','#id_programa_princ').data("nombre")
	          //	}
	          	// return $('#id_programa_princ').val() != '' ? 'Listado' : $('option:selected','#id_programa_princ').data("nombre")
			      	// return $('option:selected','#id_programa_princ').data("nombre")
			    	},
			    	// message: 'Listado de Postulantes',
	          orientation: 'landscape',
            pageSize: 'LEGAL',
            exportOptions: {
              columns: [ 0, 3, 4, 5, 6, 7, 8, 9, 12, 11 ]
            }
	        },
	        {
	          extend: 'pdfHtml5',
	          text: 'Exportar a PDF',
	          className: 'btn-exportacion btn-pdf',
		        title: function() {
			      //	if ($('#id_programa_princ').val() != null) {
	          			return 'Listado de Postulantes'
	          //	}else{
	          //			return $('option:selected','#id_programa_princ').data("nombre")
	          //	}
			    	},
			    	// message: 'Listado de Postulantes',
	          orientation: 'landscape',
            pageSize: 'LEGAL',
            exportOptions: {
            	columns: [ 0, 3, 4, 5, 6, 7, 8, 9, 12, 11 ]
            }

	        },
	        {
	          extend: 'print',
	          text: 'Imprimir',
	          className: 'btn-exportacion btn-imp',
	          title: function() {
			      //	if ($('#id_programa_princ').val() != null) {
	          			return 'Listado de Postulantes'
	          //	}else{
	          //			return $('option:selected','#id_programa_princ').data("nombre")
	          //	}
			    	},
			    	// message: 'Listado de Postulantes',
	          orientation: 'landscape',
            pageSize: 'LEGAL',
            exportOptions: {
            	columns: [ 0, 3, 4, 5, 6, 7, 8, 9, 12, 11 ]
            }
	        }
        ],

	    "columnDefs": [ 
		    {
		    	//COLUMNAS NO SORTEABLES EN LA TABLA
		      "targets"  : [ 0, 1, 2, 3 ],
		      "orderable": false,
		    },
           
        {
        	//COLUMNAS NO VISIBLES EN LA TABLA
          "targets": [ 1, 2, 11 ],
          "visible": false
        },
        {
	       	"targets": [ 10 ], //ESTADO
	         	"render": function ( data, type, row, meta ) {
	         		if(row.id != null){
						    return '<div class="dropdown dropdown-inline" data-toggle="tooltip" data-original-title="Ver opciones" data-placement="left"><a href="javascript:;" class="text-link" data-toggle="dropdown" aria-expanded="false">'+data+'</a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="display: none;"><ul class="navi flex-column navi-hover py-2"><li class="navi-header font-weight-bolder text-uppercase font-size-xs text-dark pb-2">Estado:</li><li class="navi-item"><a href="#" class="navi-link select-estado" data-valor="8" data-id="'+row.id+'"><span class="navi-icon"></span><span class="navi-text">Nuevo</span></a></li><li class="navi-item"><a href="#" class="navi-link select-estado" data-valor="1" data-id="'+row.id+'"><span class="navi-icon"></span><span class="navi-text">Postuló</span></a></li><li class="navi-item"><a href="#" class="navi-link select-estado" data-valor="2" data-id="'+row.id+'"><span class="navi-icon"></span><span class="navi-text">Postulará</span></a></li><li class="navi-item"><a href="#" class="navi-link select-estado" data-valor="3" data-id="'+row.id+'"><span class="navi-icon"></span><span class="navi-text">Pendiente</span></a></li><li class="navi-item"><a href="#" class="navi-link select-estado" data-valor="10" data-id="'+row.id+'"><span class="navi-icon"></span><span class="navi-text">Incompleto</span></a></li><li class="navi-item"><a href="#" class="navi-link select-estado" data-valor="12" data-id="'+row.id+'"><span class="navi-icon"></span><span class="navi-text">Entrevista</span></a></li><li class="navi-item"><a href="#" class="navi-link select-estado" data-valor="13" data-id="'+row.id+'"><span class="navi-icon"></span><span class="navi-text">Reserva de plaza</span></a></li><li class="navi-item"><a href="#" class="navi-link select-estado" data-valor="6" data-id="'+row.id+'"><span class="navi-icon"></span><span class="navi-text">No postulará</span></a></li><li class="navi-item"><a href="#" class="navi-link select-estado" data-valor="14" data-id="'+row.id+'"><span class="navi-icon"></span><span class="navi-text">Rechaza cupo</span></a></li></ul></div></div>';
	         		}else{
	         			return data;
	         		}
						}
	        }
	    ],

	    "rowCallback": function(row, data, index){
	    //	console.log('entro a rowCallback: '+data.id_estado);
	    	
		  	//No han confirmado el correo
		  	if(data.id_estadou == '2'){
		    	$(row).css('background-color', 'lightcoral');
		    }

		    //Estado postulación => Postulo
		    if(data.estado_postulacion == '1'){
		    	$(row).css('background-color', 'lightblue');
		    }

		  },

	    "initComplete": function(settings, json) {
	    	//Quitar opciones en dependencia del grupo del usuario logueado
        	if(cod_grupoUsua_logueado == '10003'){
						$('.otros-detalles .editar').remove();
						$('.otros-detalles .anular').remove();
					}
	    }
	});


	table.on('order.dt search.dt', function () {
        let i = 1;
 
        table.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
            this.data(i++);
        });
    }).draw();

	//new $.fn.dataTable.FixedColumns( table );

	table.on("user-select", function (e, dt, type, cell, originalEvent) {
	     if ($(cell.node()).hasClass("otros-detalles")) {
	         e.preventDefault();
	     }
    });

};

//***> Habilitar los tooltips	
$('#dataTable_listadoProspectos').on('mouseover', 'tr', function () {
    $('[data-toggle="tooltip"]').tooltip({
        trigger: 'hover',
        html: true
    });
});

//***> Mostrar ocultar datos ocultos
$('#dataTable_listadoProspectos').on('click', 'td.otros-detalles a.abrir', function () {
    var tr = $(this).closest('tr');
    var tdi = tr.find("i.la");
    var row = $('#dataTable_listadoProspectos').DataTable().row( tr );
    var data = $('#dataTable_listadoProspectos').DataTable().row( $(this).parents('tr') ).data();
    var idt = data.id;

    if ( row.child.isShown() ) {
        // This row is already open - close it
        row.child.hide();
        tr.removeClass('shown');
        tdi.first().removeClass('fa-minus-circle');
        tdi.first().addClass('fa-plus-circle');
    // console.log('A');
    }
    else {
        // Open this row
        row.child( format(row.data()) ).show();
        tr.addClass('shown');
        tdi.first().removeClass('fa-plus-circle');
        tdi.first().addClass('fa-minus-circle');
    // console.log('B');
    // Cargar observaciones
    	cargarObservaciones(idt);
    }
});

//***> Consultar postulacion
$('#dataTable_listadoProspectos').on('click', 'td.otros-detalles a.verpostulacion', function () {
    var data = $('#dataTable_listadoProspectos').DataTable().row( $(this).parents('tr') ).data();
    var id_usuario = data.id_usuario;
    var id_programa = data.id_programa;
    // console.log('id_programa: '+id_programa);
    if(id_programa == null || id_programa == '0' || id_programa == ''){
    	toastr.info('Este postulante aun no ha realizado el proceso de postulación.');
    }else{
    	//toastr.info('Mostrar ventana.');
    	window.open("postulacion.php?p="+id_programa+"&u="+id_usuario,"_blank");
    }
});

//***> Editar postulacion
$('#dataTable_listadoProspectos').on('click', 'td.otros-detalles a.editar', function () {
    var data = $('#dataTable_listadoProspectos').DataTable().row( $(this).parents('tr') ).data();
    var id_usuario = data.id_usuario;
    var id_programa = data.id_programa;
    var id_postulacion = data.id;
    var url = data.url;
    
    // console.log('Editar postulación: url: '+url);
    
	  if(id_programa == null || id_programa == '0' || id_programa == ''){
	  	toastr.info('Este postulante aun no ha realizado el proceso de postulación.');
	  }else{
	  	window.open(url+"?p="+id_programa+"&u="+id_usuario,"_blank");
	  }
    
});

//***> Consultar postulaciones
$('#dataTable_listadoProspectos').on('click', 'td.otros-detalles a.consularpostulaciones', function () {
  var data = $('#dataTable_listadoProspectos').DataTable().row( $(this).parents('tr') ).data();
  var id_usuario = data.id_usuario;
  var nombres = data.nombres +' '+data.apellidos;
  
  console.log('Consulta postulaciones: '+id_usuario);

  //ModalConsultaPostulaciones
  $('#npostulante').text(nombres);
  //listpostulaciones
  consultarPostulaciones(id_usuario);
  $('#ModalConsultaPostulaciones').modal('show');    
});

//***> Aprobar Financiamiento
$('#dataTable_listadoProspectos').on('click', 'td.otros-detalles a.aprobarfinanciamiento', function () {
  var data = $('#dataTable_listadoProspectos').DataTable().row( $(this).parents('tr') ).data();
  var id_postulacion = data.id;
  var nombres = data.nombres +' '+data.apellidos;
  var programa = data.programa;
  // console.log('Aprobar financiamiento: '+id_postulacion);

  if (id_postulacion == null || id_postulacion == '') {
  	toastr.info('Este postulante aun no ha realizado postulación');
  }else{
   	//Mensaje de confirmación
  	
  	Swal.fire({
		  title: 'Aprobar financiamiento',
		  html: "Desea aprobar el financiamiento para <strong>"+nombres+"</strong> que está postulando al programa de <strong>"+programa+"</strong>",
		  icon: 'info',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Si',
		  cancelButtonText: 'No'
		}).then((result) => {
		  if (result.isConfirmed) {
		  	aprobarFinanciamiento(id_postulacion, id_usuario);
		  }
		})

  }
});

// ***> Funcion para aprbar financiamiento
// i => id_postulacion
// u => usuario logueado
function aprobarFinanciamiento(i,u){
	// console.log('aprobarFinanciamiento: '+i+' -'+u);

	$.post( "jquery.php", { "i":i, "u":u, "recibePOST":"aprobarFinanciamiento" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){
          Swal.fire(
				    'Información',
				    'Financiamiento aprobado',
				    'success'
				  );
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


//Cambiar origen
$(document).on("click", ".btn-registrar-observacion", function () {
    var id_postulacion = $(this).data('post');
    $('#ModalObservacionesPostulacion').modal('show');
    $('#idpostulacionObserv').val(id_postulacion);
});

//Leyenda
$(document).on("click", "#btn_leyenda", function () {
  $('#ModalLeyendaPostulaciones').modal('show');
});

//Cambiar origen
$(document).on("click", ".select-origen", function () {
    var id = $(this).data('id');
    var valor = $(this).data('valor');
    actualizarRegistro(id,valor,'origen',id_usuario);
});

//Cambiar estado
$(document).on("click", ".select-estado", function () {
    var id = $(this).data('id');
    var valor = $(this).data('valor');
  //console.log('id: '+id+ ' valor:'+valor);
    actualizarRegistro(id,valor,'estado',id_usuario);
    estadisticasGenerales();
});

//Cambiar corte
$(document).on("click", ".select-corte", function () {
    var id = $(this).data('id');
    var valor = $(this).data('valor');
    actualizarRegistro(id,valor,'corte',id_usuario);
});

//***> Adjunto cedula
$('#dataTable_listadoProspectos').on('click', '.contenido-extra a.btn-cedula', function () {
    var adjunto = $(this).data('adjunto');
    var ext = adjunto.split('.').pop();
    adjuntoModal(ext, adjunto);
    //console.log('adjunto: '+ adjunto + ' ext: '+ext);
});

//***> Adjunto pasaporte
$('#dataTable_listadoProspectos').on('click', '.contenido-extra a.btn-pasaporte', function () {
    var adjunto = $(this).data('adjunto');
    var ext = adjunto.split('.').pop();
    adjuntoModal(ext, adjunto);
    //console.log('adjunto: '+ adjunto + ' ext: '+ext);
});

//***> Adjunto titulo
$('#dataTable_listadoProspectos').on('click', '.contenido-extra a.btn-titulo', function () {
    var adjunto = $(this).data('adjunto');
    var ext = adjunto.split('.').pop();
    adjuntoModal(ext, adjunto);
    //console.log('adjunto: '+ adjunto + ' ext: '+ext);
});

//***> Adjunto hoja de vida
$('#dataTable_listadoProspectos').on('click', '.contenido-extra a.btn-hvida', function () {
    var adjunto = $(this).data('adjunto');
    var ext = adjunto.split('.').pop();
    adjuntoModal(ext, adjunto);
    //console.log('adjunto: '+ adjunto + ' ext: '+ext);
});


//>Registrar Observacion
var idObs = $('#idpostulacionObserv');
$("#registrobservacionPostulacion").submit(function (evt) {
  evt.preventDefault();
  evt.stopPropagation();
  var formData = new FormData($("form#registrobservacionPostulacion")[0]);
  var form = $("#registrobservacionPostulacion");
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
    curSubmit.text('Registrando');
   },
   success: function( respuesta ){
    var valor = respuesta.data.cant;
    var mensaje = respuesta.data.mensaje;
    if (valor == 1) {
    	setTimeout(ocultarLoader, 2000);
    	curSubmit.prop('disabled', false);
	    curSubmit.text('Anular');
	    toastr.info(mensaje);
    	return false;
    }else{
    	//Mensajes de confirmacion
	    setTimeout(ocultarLoader, 2000);
	    cargarObservaciones(idObs.val());
	    form.trigger("reset");
	    curSubmit.prop('disabled', false);
	    curSubmit.text('Registrar');
	    toastr.success(mensaje);
	    $('#ModalObservacionesPostulacion').modal('hide');
	    
    }
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

function actualizarRegistro(i,v,c,u){
	var url = "jquery.php";
	var data = ("&recibePOST=actualizarRegistro&i="+i+"&v="+v+"&c="+c+"&u="+u);
	$.post(url, data, function(result){
	  mostrarLoader();
	})
    //La consulta se ejecuto con exito
    .done(function(data, textStatus, jqXHR) {
      //Recargo la tabla
      $('#dataTable_listadoProspectos').DataTable().ajax.reload( null, false );
      setTimeout(ocultarLoader, 1000);
      toastr.info('Registro actualizado');
    });
};

function cargarObservaciones(id){

	var tabla = $('#tabla-observacion-'+id);
	var tablaBody = $('#tabla-observacion-'+id+' tbody');
	var carga = tabla.data('carga');

	tablaBody.empty();
	// tabla.data('carga','1');
	// console.log('id: '+id+ ' carga: '+carga);

	$.post( "jquery.php", { "id":id, "recibePOST":"cargarObservaciones" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){
      //  console.log(data.data);
        //Cargo las opciones en el listado

        $.each(data.data,function(index, item){
          // console.log(item.id);
          // tabla.append('<option value="'+item.id_profesor+'">'+item.nprofesor+'</option>');
          if (item.id == 'sinregistros') {
          	tabla.append('<tr><td colspan="3">No hay observaciones registradas.</td></tr>');
          }else{
          	tabla.append('<tr><td>'+item.fecha+'</td><td>'+item.observacion+'</td><td>'+item.usuario+'</td></tr>');
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
};

function consultarPostulaciones(id){

	var ul = $('#listpostulaciones');

	
	// ul.empty();
	// ul.append('<li><img src="assets/media/spinners/loading_2.gif"></li>');
	// ul.empty();
	// tabla.data('carga','1');
	// console.log('id: '+id+ ' carga: '+carga);

	$.post( "jquery.php", { "id":id, "recibePOST":"consultarPostulaciones" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){
      
      	setTimeout(() => {
	        ul.empty();
	      }, 0);
	      setTimeout(() => {
	        ul.append('<li><img src="assets/media/spinners/loading_2.gif"></li>');
	      }, 1000);
	      setTimeout(() => {
        	ul.empty();
	      }, 1500);
	      setTimeout(() => {
        	$.each(data.data,function(index, item){
	          // console.log(item.id);
	          if (item.id == 'sinregistros') {
	          	ul.append('<li>No hay observaciones registradas.</li>');
	          }else{
	          	ul.append('<li>'+item.programa+'</li>');
	          }
	        });
	      }, 2000);

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

//btns-filtro
$(document).on("click", "span.btns-filtro", function () {
  var filtro = $(this).data('filtro');
  // console.log('Filtro: '+filtro);
  
   $('span.btns-filtro.filtro-activo').removeClass('filtro-activo');
   $(this).addClass('filtro-activo');

  //tabla.DataTable().destroy();
  $('#dataTable_listadoProspectos').DataTable().destroy();

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

  cargarDatos(id_programa.val(), filtro);
});

//Botones de exportacion
//Imprimir
$('#btn-exp-imp').on( 'click', function () {
    $(".btn-imp").trigger("click");
});

//Excel
$('#btn-exp-excel').on( 'click', function () {
    $(".btn-excel").trigger("click");
});

//Pdf
$('#btn-exp-pdf').on( 'click', function () {
    $(".btn-pdf").trigger( "click" );
});

</script>