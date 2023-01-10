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
					<h3 class="card-label">Solicitudes de Financiamiento
					<!--<span class="d-block text-muted pt-2 font-size-sm">Activos</span></h3>-->
					<input type="hidden" name="id_usuario_logueado" id="id_usuario_logueado" value="<?php echo"$id_usuario"; ?>">

				</div>

			
				<div class="card-toolbar">

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
					
				</div>

				
			</div>

			<div class="card-body">
				<!--begin: Datatable-->
				<table class="table table-bordered" id="dataTable_tablafinanciamiento">
					<thead>
						<tr>	
							<th class="text-center">No</th>
							<th class="text-center">Nombre</th>
							<th class="text-center">Programa</th>
							<th class="text-center">Correo</th>
							<th class="text-center">Teléfono</th>
							<th class="text-center">Ciudad</th>
							<th class="text-center">Fecha solicitud</th>
							<th class="text-center">Fecha vencimiento</th>
							<th class="text-center">Estado</th>
							<th class="text-center">Resultado cooperativa</th>
							<th class="text-center">Revisar documentación</th>
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

<?php 
	include_once('footer.php');
	/* Obtener los caracteres despues del punto
	$url = "2. 36015805.16923.jpg"; //23601580516923.jpg
	$id = substr($url, strrpos($url, '.') + 1);
	echo $id;
	*/
?>

<script type="text/javascript">
/********************************/
/**** Financiemientos, usuario cooperativa ****/
/********************************/
( function($) {
  $(document).ready(function() {
  	console.log('Financiemiento cooperativa JS');
  	cargarListadofinanciamiento();
  });
} ) ( jQuery );

function format ( d ) {
// `d` is the original data object for the row

	return '<table class="detalles-tabla table table-bordered" cellspacing="0" border="0" style="padding-left:25px;">'+
    		'<thead>'+
    			'<tr><th class="text-center">Cédula</th><th class="text-center">Rol de Pagos</th><th class="text-center">Planilla Servicio Básico</th><th class="text-center">Matrícula carro</th><th class="text-center">Predio casa</th><th class="text-center">Autorización Buró Crédito</th><th class="text-center">Carta de Aceptación</th></tr>'+
    		'</thead>'+
    		'<tbody>'+
    			'<tr><td class="text-center"><a href="uploads/'+d.fincedula+'" class="btn btn-sm btn-primary btndocumentacion" target="_blank">VER</a></td><td class="text-center"><a href="uploads/'+d.finroldepago+'" class="btn btn-sm btn-primary btndocumentacion" target="_blank">VER</a></td><td class="text-center"><a href="uploads/'+d.finplanillaserbasico+'" class="btn btn-sm btn-primary btndocumentacion" target="_blank">VER</a></td><td class="text-center"><a href="uploads/'+d.finmatriculacarro+'" class="btn btn-sm btn-primary btndocumentacion" target="_blank">VER</a></td><td class="text-center"><a href="uploads/'+d.finprediocasa+'" class="btn btn-sm btn-primary btndocumentacion" target="_blank">VER</a></td><td class="text-center"><a href="uploads/'+d.finautorburocredito+'" class="btn btn-sm btn-primary btndocumentacion" target="_blank">VER</a></td><td class="text-center"><a href="uploads/'+d.fincartaceptacion+'" class="btn btn-sm btn-primary btndocumentacion" target="_blank">VER</a></td></tr>'+
    		'</tbody>'+
    	'</table>'
	;
}

$(document).on("click", ".btndocumentacion", function (e) {
	e.preventDefault();
	var host = window.location;
	var urlHost = host.protocol + "//" + host.host + "/" + host.pathname.split('/')[1]+"/";
	var url = $(this).attr('href');
	var file = urlHost+url;
	// toastr.info('Click en btndocumentacion: '+urlHost+urlarchivo);
	comprobarUrl(file);
});

function comprobarUrl(urlArchivo){
  var xhr = new XMLHttpRequest();
  xhr.open('HEAD', urlArchivo, false);
  xhr.send();

  if (xhr.status == "404") {
    toastr.info('No se ha subido el archivo.');
    return false;
  } else {
    console.log("File exists");
    // window.location.href = urlArchivo;
    window.open(urlArchivo, '_blank');
    return true;
  }
}

var id_usuario = $('#id_usuario_logueado').val();
var cod_grupoUsua_logueado = $('#cod_grupoUsua_logueado').val();

function cargarListadofinanciamiento(){

	/****Data Tables****/
	var table = $('#dataTable_tablafinanciamiento').DataTable({
	  	"language": {
	        "url": "assets/js/Spanish.json"
	    },
	    "pagingType": "full_numbers",
	    "pageLength": 10,
	    "order": [[1, 'desc']],
	    "ajax": "solicitudesfinanciamientojson.php", //Listado en formato JSON
	    "deferRender": true,
      "columns": [
        { "data": "no" }, //0
        { "data": "nombre" }, //1
        { "data": "programa" }, //2
        { "data": "correo" }, //3
        { "data": "tcelular" }, //4
        { "data": "ciudad" }, //5
        { "data": "f_i_solicitud" }, //6
        { "data": "f_f_solicitud" }, //7
        { "data": "estado" }, //8
        { "data": "estadocop" }, //9

        {
          "className": 'otros-detalles',
          "orderable": false,
          "data": null,
          "defaultContent": '',
          "render": function () {
            return '<a href="#!" class="abrir" data-toggle="tooltip" data-original-title="Mostrar / Ocultar observaciones" data-placement="left"><i class="la la-plus-circle text-primary" aria-hidden="true"></i> </a> ';
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
	          			return 'Listado de Postulantes'
			    	},
	          	orientation: 'landscape',
            	pageSize: 'LEGAL',
            	exportOptions: {
	              columns: [ 0, 3, 4, 5, 6]
	            }
	        },
	        {
	          extend: 'pdfHtml5',
	          text: 'Exportar a PDF',
	          className: 'btn-exportacion btn-pdf',
		        title: function() {
	          		return 'Listado de Postulantes'
			    	},
	          orientation: 'landscape',
              pageSize: 'LEGAL',
              exportOptions: {
              columns: [ 0, 3, 4, 5, 6]
            }

	        },
	        {
	          extend: 'print',
	          text: 'Imprimir',
	          className: 'btn-exportacion btn-imp',
	          title: function() {
	          		return 'Listado de Postulantes'
			    	},
	          orientation: 'landscape',
              pageSize: 'LEGAL',
              exportOptions: {
            	columns: [ 0, 3, 4, 5, 6]
              }
	        }
        ],

	    "columnDefs": [ 
		    {
		    	//COLUMNAS NO SORTEABLES EN LA TABLA
		      "targets"  : [ 0, 5, 6 ],
		      "orderable": false,
		    },
           
        /*
        {
        	//COLUMNAS NO VISIBLES EN LA TABLA
          "targets": [ 1, 2, 11 ],
          "visible": false
        },
        */
        {
	       	"targets": [ 7 ], //FECHA FIN DE SOLICITUD, AMPLIAR PLAZO
	         	"render": function ( data, type, row, meta ) {
	         		if(data != '---'){
						    return data + '<span class="ml-3"><a href="#!" class="ampliarplazo" data-toggle="tooltip" data-original-title="Ampliar plazo" data-placement="left"><i class="la la-calendar text-primary" aria-hidden="true"></i> </a></span>';
	         		}else{
	         			return data;
	         		}
						}
	      },
        {
	       	"targets": [ 8 ], //ESTADO
	         	"render": function ( data, type, row, meta ) {
	         		if(row.id != null){
						    return '<div class="dropdown dropdown-inline" data-toggle="tooltip" data-original-title="Ver opciones" data-placement="left"><a href="javascript:;" class="text-link" data-toggle="dropdown" aria-expanded="false">'+data+'</a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="display: none;"><ul class="navi flex-column navi-hover py-2"><li class="navi-header font-weight-bolder text-uppercase font-size-xs text-dark pb-2">Estado:</li><li class="navi-item"><a href="#" class="navi-link select-estadofin" data-valor="15" data-id="'+row.idpostulacion+'"><span class="navi-icon"></span><span class="navi-text">Financiemiento aprobado</span></a></li><li class="navi-item"><a href="#" class="navi-link select-estadofin" data-valor="17" data-id="'+row.idpostulacion+'"><span class="navi-icon"></span><span class="navi-text">Financiamiento denegado</span></a></li></ul></div></div>';
	         		}else{
	         			return data;
	         		}
						}
	        }
	    ],

	    "rowCallback": function(row, data, index){
	    	//	console.log(data);

		  	//No han confirmado el correo
		  	if(data.estadofinanciamiento == '17'){
		    	$(row).css('background-color', 'lightcoral');
		    }
		  },
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
$('#dataTable_tablafinanciamiento').on('mouseover', 'tr', function () {
    $('[data-toggle="tooltip"]').tooltip({
      trigger: 'hover',
      html: true
    });
});

//***> Mostrar ocultar datos ocultos
$('#dataTable_tablafinanciamiento').on('click', 'td.otros-detalles a.abrir', function () {
    var tr = $(this).closest('tr');
    var tdi = tr.find("i.la");
    var row = $('#dataTable_tablafinanciamiento').DataTable().row( tr );
    var data = $('#dataTable_tablafinanciamiento').DataTable().row( $(this).parents('tr') ).data();
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
    }
});

//Cambiar estado
$(document).on("click", ".select-estadofin", function () {
    var id = $(this).data('id');
    var valor = $(this).data('valor');
  	
  	console.log('id: '+id+ ' valor:'+valor);
 
 	procesarFinanciamientorep(id,valor,'aprobadofinrep',id_usuario);

});

function procesarFinanciamientorep(i,v,c,u){
	var url = "jquery.php";
	var data = ("&recibePOST=procesarFinanciamientorep&i="+i+"&v="+v+"&c="+c+"&u="+u);
	$.post(url, data, function(result){
	  mostrarLoader();
	})
    //La consulta se ejecuto con exito
    .done(function(data, textStatus, jqXHR) {
      //Recargo la tabla
      $('#dataTable_tablafinanciamiento').DataTable().ajax.reload( null, false );
      setTimeout(ocultarLoader, 1000);
      toastr.info('Registro actualizado');
    });
};
</script>