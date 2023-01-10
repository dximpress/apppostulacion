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
					<h3 class="card-label">Estadísticas
						<!-- span class="d-block text-muted pt-2 font-size-sm">Activos</span -->
					</h3>
					<input type="hidden" name="id_personal_Usua_logueado" id="id_personal_Usua_logueado" value="<?php echo"$id_personal"; ?>">

				</div>

			
				<div class="card-toolbar">

				<!--	
					<div class="row" style="margin-right: 1px;">
						<div class="col-md-12" style="padding-top: 0px;">
							<select name="edicion" id="edicion" class="custom-select form-control" data-toggle="tooltip" data-title="Clic para seleccionar" data-placement="top">
								<option value="">Ediciones</option>
								<?php 
								/*
									$SQLEdiciones = "
			                  	 		SELECT 
											DISTINCT(per.id_periodo) AS id_edicion,
										    per.periodo AS n_edicion,
										    UPPER( CONCAT( DATE_FORMAT(per.f_iniciop, '%d - %b - %Y'), ' / ', DATE_FORMAT(per.f_finp, '%d - %b - %Y') ) ) as vigencia
										FROM periodo_academico AS per
										WHERE per.activo = '1'";
									$SQLconsultaEdiciones = $conexionmysqli->query($SQLEdiciones);
				                    $SQLconsultaEdiciones->data_seek(0);
				                      while ($registro_Ediciones = $SQLconsultaEdiciones->fetch_assoc()) {
				                        $id_edicion = $registro_Ediciones['id_edicion'];
				                        $edicion = $registro_Ediciones['n_edicion'];
				                        $vigencia = $registro_Ediciones['vigencia'];
				                        echo "<option value=\"".$id_edicion."\">$edicion => Vigencia: $vigencia</option>";
				                      }
				                    $SQLconsultaEdiciones->close();
				                    */
								?>
							</select>
						</div>
					</div>
				-->
			
					
				</div>

				
			</div>

			<div class="card-body">
				
				<div class="container">
				<!-- Por día de la semana -->	
					<div class="row">
						<div class="col-md-3">
							<table class="table table-bordered" id="dataTable_estadisticasDia">
								<thead>
									<tr>
										<th class="bg-secondary-o-50">Día de la semana</th>
										<th class="bg-secondary-o-50">Total</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="col-md-9" id="container_estadisticasDia" style="height: 400px">
							<div class="spinner"></div>
						</div>
					</div>

				<!-- Por origen -->
					<div class="row mt-25">
						<div class="col-md-3">
							<table class="table table-bordered" id="dataTable_estadisticasOrigen">
								<thead>
									<tr>
										<th class="bg-secondary-o-50">Origen</th>
										<th class="bg-secondary-o-50">Total</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="col-md-9" id="container_estadisticasOrigen" style="height: 400px">
							<div class="spinner"></div>
						</div>
					</div>

					<!-- Por llamada -->
					<div class="row mt-25">
						<div class="col-md-3">
							<table class="table table-bordered" id="dataTable_estadisticasLlamada">
								<thead>
									<tr>
										<th class="bg-secondary-o-50">Llamada</th>
										<th class="bg-secondary-o-50">Total</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="col-md-9" id="container_estadisticasLlamada" style="height: 400px">
							<div class="spinner"></div>
						</div>
					</div>

				<!-- Por origen -->
					<div class="row mt-25">
						<div class="col-md-3">
							<table class="table table-bordered" id="dataTable_estadisticasCorte">
								<thead>
									<tr>
										<th class="bg-secondary-o-50">Corte</th>
										<th class="bg-secondary-o-50">Total</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="col-md-9" id="container_estadisticasCorte" style="height: 400px">
							<div class="spinner"></div>
						</div>
					</div>

				<!-- Por estado -->
					<div class="row mt-25">
						<div class="col-md-3">
							<table class="table table-bordered" id="dataTable_estadisticasEstado">
								<thead>
									<tr>
										<th class="bg-secondary-o-50">Estado</th>
										<th class="bg-secondary-o-50">Total</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="col-md-9" id="container_estadisticasEstado" style="height: 400px">
							<div class="spinner"></div>
						</div>
					</div>


				</div>
				
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
	var id_personal = $('#id_personal_Usua_logueado').val();
	var cod_grupoUsua_logueado = $('#cod_grupoUsua_logueado').val();
	var tperiodo = 0;
	var tabla_estadisticas_dia = $('#dataTable_estadisticasDia');
	var tabla_estadisticas_origen = $('#dataTable_estadisticasOrigen');
	var tabla_estadisticas_corte = $('#dataTable_estadisticasCorte');
	var tabla_estadisticas_llamada = $('#dataTable_estadisticasLlamada');
	var tabla_estadisticas_estado = $('#dataTable_estadisticasEstado');


var id_programa = $('#id_programa_princ');
$(document).ready(function() {
	//console.log('entro a dataTable_listadoProspectos');
	//Oculto los menus
	$('.collapse').collapse('hide');
	/****Tooltips****/
  	$('[data-toggle="tooltip"]').tooltip();

  	cargarEstadisticasDia(id_programa.val());
  	cargarEstadisticasOrigen(id_programa.val());
  	cargarEstadisticasCorte(id_programa.val());
  	cargarEstadisticasLlamada(id_programa.val());
  	cargarEstadisticasEstado(id_programa.val());
});


//**********************  Consultar estadísticas del día
function cargarEstadisticasDia(p){
	$.post( "jquery.php", { "id_programa":p, "recibePOST":"cargarEstadisticasDia" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){
       // console.log('ultimoProgramaUser actualizado');
       // console.log(data.data);
       $.each(data.data,function(index, item){
       	if(item.dia == null){
          tabla_estadisticas_dia.append('<tr><td>Sin fecha</td><td>'+item.cant+'</td></tr>');
       	}else{
       	   tabla_estadisticas_dia.append('<tr><td>'+item.dia+'</td><td>'+item.cant+'</td></tr>');
       	}
        });
      }
        if ( console && console.log ) {
          console.log( "La solicitud se ha completado correctamente." );
        }

        graficoEstadisticasDia();

    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
      toastr.error('Ocurrio un error, intente nuevamente, si el error persiste pongase en contacto con el equipo de desarrollo');
      if ( console && console.log ) {
        console.log( "La solicitud a fallado: " +  textStatus);
      }
    });
};

//Grafica estadísticas del día
function graficoEstadisticasDia(){
	  //Grafico
    Highcharts.chart('container_estadisticasDia', {
	    data: {
	        table: 'dataTable_estadisticasDia'
	    },
	    chart: {
	        type: 'column'
	    },
	    title: {
	        text: 'Estadísticas por día de la semana'
	    },
	    yAxis: {
	        allowDecimals: false,
	        title: {
	            text: 'Escala'
	        }
	    },
	    colors: ['#0a57a2', '#000000', '#ffffff'],
	    tooltip: {
	        formatter: function () {
	            return '<b>' + this.series.name + '</b><br/>' +
	                this.point.y + ' ' + this.point.name.toLowerCase();
	        }
	    },
	    
	    /*
	    plotOptions: {
	        pie: {
	            allowPointSelect: true,
	            cursor: 'pointer',
	            dataLabels: {
	                enabled: true,
	                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
	            }
	        }
	    },
	    */
	});
};

/*********************************************/
//**********************  Consultar estadísticas del día
function cargarEstadisticasOrigen(p){
	$.post( "jquery.php", { "id_programa":p, "recibePOST":"cargarEstadisticasOrigen" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){
       // console.log('ultimoProgramaUser actualizado');
       // console.log(data.data);
       $.each(data.data,function(index, item){
       	if(item.origen == null){
          tabla_estadisticas_origen.append('<tr><td>Sin especificar</td><td>'+item.cant+'</td></tr>');
       	}else{
       	   tabla_estadisticas_origen.append('<tr><td>'+item.origen+'</td><td>'+item.cant+'</td></tr>');
       	}
        });
      }
        if ( console && console.log ) {
          console.log( "La solicitud se ha completado correctamente." );
        }

        graficoEstadisticasOrigen();

    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
      toastr.error('Ocurrio un error, intente nuevamente, si el error persiste pongase en contacto con el equipo de desarrollo');
      if ( console && console.log ) {
        console.log( "La solicitud a fallado: " +  textStatus);
      }
    });
};

//Grafica estadísticas del día
function graficoEstadisticasOrigen(){
	        //Grafico
    Highcharts.chart('container_estadisticasOrigen', {
	    data: {
	        table: 'dataTable_estadisticasOrigen'
	    },
	    chart: {
	        type: 'pie'
	    },
	    title: {
	        text: 'Estadísticas por origen'
	    },
	    yAxis: {
	        allowDecimals: false,
	        title: {
	            text: 'Escala'
	        }
	    },
	    /*
	    tooltip: {
	        formatter: function () {
	            return '<b>' + this.series.name + '</b><br/>' +
	                this.point.y + ' ' + this.point.name.toLowerCase();
	        }
	    },
	    */
	    
	    plotOptions: {
	        pie: {
	            allowPointSelect: true,
	            cursor: 'pointer',
	            dataLabels: {
	                enabled: true,
	                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
	            }
	        }
	    },
	    
	});
};

/*********************************************/
//**********************  Consultar estadísticas por llamada
function cargarEstadisticasLlamada(p){
	$.post( "jquery.php", { "id_programa":p, "recibePOST":"cargarEstadisticasLlamada" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){
       // console.log('ultimoProgramaUser actualizado');
       // console.log(data.data);
       $.each(data.data,function(index, item){
       	if(item.llamada == null){
          tabla_estadisticas_llamada.append('<tr><td>Sin especificar</td><td>'+item.cant+'</td></tr>');
       	}else{
       	   tabla_estadisticas_llamada.append('<tr><td>'+item.llamada+'</td><td>'+item.cant+'</td></tr>');
       	}
        });
      }
        if ( console && console.log ) {
          console.log( "La solicitud se ha completado correctamente." );
        }

        graficoEstadisticasLlamada();

    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
      toastr.error('Ocurrio un error, intente nuevamente, si el error persiste pongase en contacto con el equipo de desarrollo');
      if ( console && console.log ) {
        console.log( "La solicitud a fallado: " +  textStatus);
      }
    });
};

//Grafica estadísticas del día
function graficoEstadisticasLlamada(){
	        //Grafico
    Highcharts.chart('container_estadisticasLlamada', {
	    data: {
	        table: 'dataTable_estadisticasLlamada'
	    },
	    chart: {
	        type: 'bar'
	    },
	    title: {
	        text: 'Estadísticas por llamada'
	    },
	    yAxis: {
	        allowDecimals: false,
	        title: {
	            text: 'Escala'
	        }
	    },
	    colors: ['#0a57a2', '#000000', '#ffffff'],
	    tooltip: {
	        formatter: function () {
	            return '<b>' + this.series.name + '</b><br/>' +
	                this.point.y + ' ' + this.point.name.toLowerCase();
	        }
	    },
	    
	    /*
	    plotOptions: {
	        pie: {
	            allowPointSelect: true,
	            cursor: 'pointer',
	            dataLabels: {
	                enabled: true,
	                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
	            }
	        }
	    },
	    */
	});
};

/*********************************************/
//**********************  Consultar estadísticas por corte
function cargarEstadisticasCorte(p){
	$.post( "jquery.php", { "id_programa":p, "recibePOST":"cargarEstadisticasCorte" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){
       // console.log('ultimoProgramaUser actualizado');
       // console.log(data.data);
       $.each(data.data,function(index, item){
       	if(item.corte == null){
          tabla_estadisticas_corte.append('<tr><td>Sin especificar</td><td>'+item.cant+'</td></tr>');
       	}else{
       	   tabla_estadisticas_corte.append('<tr><td>'+item.corte+'</td><td>'+item.cant+'</td></tr>');
       	}
        });
      }
        if ( console && console.log ) {
          console.log( "La solicitud se ha completado correctamente." );
        }

        graficoEstadisticasCorte();

    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
      toastr.error('Ocurrio un error, intente nuevamente, si el error persiste pongase en contacto con el equipo de desarrollo');
      if ( console && console.log ) {
        console.log( "La solicitud a fallado: " +  textStatus);
      }
    });
};

//Grafica estadísticas del día
function graficoEstadisticasCorte(){
	        //Grafico
    Highcharts.chart('container_estadisticasCorte', {
	    data: {
	        table: 'dataTable_estadisticasCorte'
	    },
	    chart: {
	        type: 'pie'
	    },
	    title: {
	        text: 'Estadísticas por corte'
	    },
	    yAxis: {
	        allowDecimals: false,
	        title: {
	            text: 'Escala'
	        }
	    },
	    
	    /*
	    tooltip: {
	        formatter: function () {
	            return '<b>' + this.series.name + '</b><br/>' +
	                this.point.y + ' ' + this.point.name.toLowerCase();
	        }
	    },
	    */
	    
	    plotOptions: {
	        pie: {
	            allowPointSelect: true,
	            cursor: 'pointer',
	            dataLabels: {
	                enabled: true,
	                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
	            }
	        }
	    },
	    
	});
};

/*********************************************/
//**********************  Consultar estadísticas por corte
function cargarEstadisticasEstado(p){
	$.post( "jquery.php", { "id_programa":p, "recibePOST":"cargarEstadisticasEstado" }, "json")
    .done(function( data, textStatus, jqXHR ) {
      if(data.data){
       // console.log('ultimoProgramaUser actualizado');
       // console.log(data.data);
       $.each(data.data,function(index, item){
       	if(item.estado == null){
          tabla_estadisticas_estado.append('<tr><td>Sin especificar</td><td>'+item.cant+'</td></tr>');
       	}else{
       	   tabla_estadisticas_estado.append('<tr><td>'+item.estado+'</td><td>'+item.cant+'</td></tr>');
       	}
        });
      }
        if ( console && console.log ) {
          console.log( "La solicitud se ha completado correctamente." );
        }

        graficoEstadisticasEstado();

    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
      toastr.error('Ocurrio un error, intente nuevamente, si el error persiste pongase en contacto con el equipo de desarrollo');
      if ( console && console.log ) {
        console.log( "La solicitud a fallado: " +  textStatus);
      }
    });
};

//Grafica estadísticas del día
function graficoEstadisticasEstado(){
	        //Grafico
    Highcharts.chart('container_estadisticasEstado', {
	    data: {
	        table: 'dataTable_estadisticasEstado'
	    },
	    chart: {
	        type: 'pie'
	    },
	    title: {
	        text: 'Estadísticas por estado'
	    },
	    yAxis: {
	        allowDecimals: false,
	        title: {
	            text: 'Escala'
	        }
	    },
	    
	    /*
	    tooltip: {
	        formatter: function () {
	            return '<b>' + this.series.name + '</b><br/>' +
	                this.point.y + ' ' + this.point.name.toLowerCase();
	        }
	    },
	    */
	    
	    plotOptions: {
	        pie: {
	            allowPointSelect: true,
	            cursor: 'pointer',
	            dataLabels: {
	                enabled: true,
	                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
	            }
	        }
	    },
	    
	});
};

</script>