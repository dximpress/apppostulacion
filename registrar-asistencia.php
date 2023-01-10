<?php 
	//HEADER
	include_once('headers.php'); 

	//HEADER MOVIL
	include_once('header-movil.php');

	$id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : "";
	$id_evento = isset($_GET['id_evento']) ? $_GET['id_evento'] : "";

	#Consulto la base de datos para listar las ofertas, al menos debe existir una registrada
	#de lo contrario muestro un mensaje de alerta que no existen registros
	$SQLconsultaUsuario = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario' AND id_evento = '$id_evento' ";
	$SQLconsultaUsuario = $conexionmysqli->query($SQLconsultaUsuario);
	$SQLconsultaUsuario->data_seek(0);
	$existeUsuario = mysqli_num_rows($SQLconsultaUsuario);
	$SQLconsultaUsuario->close();

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
					<h3 class="card-label">Registro de Asistencia</h3>
				</div>
			

			</div>

			<div class="card-body">
				<?php
				if ($existeUsuario) {
					
					$SQLDatosUsuario = " 
						SELECT 
							usua.id_usuario AS id_usuario,
							usua.usua_nombre AS usua_nombre, 
							usua.id_evento AS id_evento,
							eve.nevento AS nevento
						FROM usuarios AS usua 
						INNER JOIN eventos AS eve ON usua.id_evento = eve.id_evento
						WHERE usua.id_usuario = '$id_usuario' AND usua.id_evento = '$id_evento' 
					";
				    $SQLconsultaDatosUsuario = $conexionmysqli->query($SQLDatosUsuario);
				    $SQLconsultaDatosUsuario->data_seek(0);
				    $registro_DatosUsuario = $SQLconsultaDatosUsuario->fetch_assoc();
					$id_usuarioqr = $registro_DatosUsuario['id_usuario'];
					$id_eventoqr = $registro_DatosUsuario['id_evento'];
					$usua_nombre = $registro_DatosUsuario['usua_nombre'];
					$nevento = $registro_DatosUsuario['nevento'];
				    $SQLconsultaDatosUsuario->close();

					//Realizo el registro en la BD


					echo "<div class='alert alert-info'>Asistencia registrada</div> <strong>Evento:</strong> $nevento <br> <strong>Usuario:</strong> $usua_nombre ";

				}else{
					?>
					<div class="alert alert-danger" role="alert">
					  <p>No existen registros en nuestra Base de Datos que coincidan con los parámetros del enlace, contacte con soporte técnico.</p>
					</div>
					<?php
				}
				?>

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
	//include_once('footer.php');
	/* Obtener los caracteres despues del punto
	$url = "2. 36015805.16923.jpg"; //23601580516923.jpg
	$id = substr($url, strrpos($url, '.') + 1);
	echo $id;
	*/
?>

<script type="text/javascript">
$(document).ready(function() {
	//Oculto los menus
	$('.collapse').collapse('hide');
	/****Tooltips****/
  	$('[data-toggle="tooltip"]').tooltip();

});


</script>