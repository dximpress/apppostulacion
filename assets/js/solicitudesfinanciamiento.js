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
	    "ajax": "listadofinanciamientojson.php", //Listado en formato JSON
	    "deferRender": true,
        "columns": [
            { "data": "no" }, //0
            { "data": "nombre" }, //2
            { "data": "correo" }, //3
            { "data": "tcelular" }, //4
            { "data": "ciudad" }, //5
            { "data": "estado" }, //6

            {
                "className": 'otros-detalles',
                "orderable": false,
                "data": null,
                "defaultContent": '',
                "render": function () {
                     return '<a href="#!" class="abrir" data-toggle="tooltip" data-original-title="Mostrar / Ocultar observaciones" data-placement="left"><i class="la la-plus-circle text-primary" aria-hidden="true"></i> </a> ';// 
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
	       	"targets": [ 5 ], //ESTADO
	         	"render": function ( data, type, row, meta ) {
	         		if(row.id != null){
						    return '<div class="dropdown dropdown-inline" data-toggle="tooltip" data-original-title="Ver opciones" data-placement="left"><a href="javascript:;" class="text-link" data-toggle="dropdown" aria-expanded="false">'+data+'</a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="display: none;"><ul class="navi flex-column navi-hover py-2"><li class="navi-header font-weight-bolder text-uppercase font-size-xs text-dark pb-2">Estado:</li><li class="navi-item"><a href="#" class="navi-link select-estadofincop" data-valor="15" data-id="'+row.idpostulacion+'"><span class="navi-icon"></span><span class="navi-text">Financiemiento aprobado</span></a></li><li class="navi-item"><a href="#" class="navi-link select-estadofincop" data-valor="16" data-id="'+row.idpostulacion+'"><span class="navi-icon"></span><span class="navi-text">Financiamiento aprobado con garante</span></a></li><li class="navi-item"><a href="#" class="navi-link select-estadofincop" data-valor="17" data-id="'+row.idpostulacion+'"><span class="navi-icon"></span><span class="navi-text">Financiamiento denegado</span></a></li></ul></div></div>';
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
$(document).on("click", ".select-estadofincop", function () {
    var id = $(this).data('id');
    var valor = $(this).data('valor');
  	
  	console.log('id: '+id+ ' valor:'+valor);
 
 	actualizarRegistroFinanciamiento(id,valor,'fincalificacion',id_usuario);

});

function actualizarRegistroFinanciamiento(i,v,c,u){
	var url = "jquery.php";
	var data = ("&recibePOST=actualizarRegistroFinanciamiento&i="+i+"&v="+v+"&c="+c+"&u="+u);
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