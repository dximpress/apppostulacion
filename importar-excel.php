<?php 
	//HEADER
	include_once('header.php'); 

	//HEADER MOVIL
	include_once('header-movil.php');

	//SIDEBAR
	include_once('sidebar.php');

	//MENU TOP
	include_once('menu-top.php');

//	$id_personal = isset($id_personal) ? $id_personal : "999999999";
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
		<form name="formimportarexcel" id="formimportarexcel" autocomplete="off" action="" method="POST">
			<div class="card card-custom gutter-b">
				<div class="card-header flex-wrap py-3">
					<div class="card-title">
						<h3 class="card-label">Importar registros
						<!-- span class="d-block text-muted pt-2 font-size-sm">Programa: <span id="programa">---</span></span -->
					</h3>
					</div>

					<div class="card-toolbar">
						<label><strong>Progamas:</strong></label>
						<select name="id_programa" id="id_programa" class="form-control custom-select" required="required">
							<option value="">Seleccione</option>
							<?php
								$SQLProgramas = "SELECT * FROM programas WHERE activo = 1";
						    $SQLconsultaProgramas = $conexionmysqli->query($SQLProgramas);
						    $SQLconsultaProgramas->data_seek(0);
						    $x=0;
						    while ($registro_Programas = $SQLconsultaProgramas->fetch_assoc()) {
						    	$x++;
						   		$id = $registro_Programas['id'];
						   		$nombre = $registro_Programas['nombre'];

						   		echo"<option value='$id' data-nombre='$nombre'>$x - $nombre</option>";
						    }
						    $SQLconsultaProgramas->close();
							?>
						</select>
					</div>

				</div>

				<div class="card-body">
					
						<input type="hidden" name="random" value="<?php echo $_numeroaleatorio; ?>">
						<input type="hidden" name="recibePOST" value="importarRegistrosexcel">
						<div class="form-group filtros">
							
							<div class="row" style="margin-top: 5px;">
								<div class="col-md-8 offset-md-2" style="padding-top: 7px;">
									<div class="input-group">
										
										 <div class="input-group-prepend">
											<label class="btn btn-primary" for="excelreg"  style="margin-bottom: 0;">
											<input type="file" name="excelreg" id="excelreg" accept=".xls, .xlsx" style="display:none" 
											onchange="$('#archivoexcel').val(this.files[0].name)">
											SELECCIONAR ARCHIVO
											</label>
										</div>

										<input type="text" class="form-control" name="archivoexcel" id="archivoexcel" placeholder="No se seleccionó ningún archivo..." readonly="readonly" style="padding-left: 10px; padding-right: 10px; background-color: transparent;">

										<div class="input-group-append">
											<button class="btn btn-primary" type="submit">SUBIR</button>
										</div>

									</div>

									<input type="hidden" name="ingresado_por" value="<?php echo $id_usuario ?>">

								</div>
							</div>

						</div>
					
	          <hr>
	          <h3>Indicaciones:</h3>
	          <ol>
	          	<li>- Seleccione el programa en el menu "Programas".</li>
	          	<li>- Verifique que el arcihvo excel tenga solo una fila como cabecera.</li>
	          	<li>- Verifique que todos los campos esten correctos en el archivo Excel.</li>
	            <li>- Seleccione el archivo Excel haciendo clic en el botón "Seleccionar archivo".</li>
	            <li>- Clic en el botón subir para comenzar el proceso de importación de datos.</li>
	          </ol>
				</div>
			</div>
		</form>
		<!--end::Card-->
	</div>
	<!--end::Container-->
</div>
<!--end::Entry-->
</div>
<!-- ********************** CONTENIDO - FIN **************************** -->


<?php 
	include_once('footer.php');
?>


<script type="text/javascript">
//> Registrar Certificaciones
$("#formimportarexcel").submit(function (evt) {
  evt.preventDefault();
  evt.stopPropagation();
  console.log('entro aqui');
  var formData = new FormData($("form#formimportarexcel")[0]);
  var form = $("#formimportarexcel");
  var archivoexcel = $('#archivoexcel').val();
  if (archivoexcel == '') {
   	toastr.info('Seleccione un archivo Excel');
   }else{
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
      curSubmit.text('SUBIENDO');

     },
     success: function( respuesta ){
      //Mensajes de confirmacion
      setTimeout(ocultarLoader, 2000);
      form.trigger("reset");
      curSubmit.prop('disabled', false);
      curSubmit.text('SUBIR');
      if(respuesta.data.tipo == 1){
      	toastr.info(respuesta.data.mensaje);
      }else{
      	toastr.error(respuesta.data.mensaje);
      }
      
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
  }
});
</script>