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

<style type="text/css">
	td.row{
		margin-right: 0;
		margin-left: 0;
	}
</style>
<!-- ********************** CONTENIDO - INICIO **************************** -->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container">
		<!--begin::Dashboard-->
		<!--begin::Row-->
		<div class="row">
		<?php if($cod_grupo == "10001" || $cod_grupo == "10002"){ ?>
			<!-- Administradores y Super Administrador -->
			<div class="col-lg-12 col-xxl-12">
				
				<div class="card card-custom card-stretch gutter-b">
					
					<div class="card-body pt-4">
						
						<div class="row">
							<div class="col-lg-7 col-md-7 col-sm-12">
								<span class="font-weight-bolder text-dark">Administrador</span><br>
								<span class="text-muted mt-3 font-weight-bold font-size-sm">
									Sistema Web para postulaciones
								</span>
							</div>
							<div class="col-lg-5 col-md-5 col-sm-12">
				              <label> Probar correo:</label>
				              <div class="input-group custom-group">    
				                <input type="text" name="test-correo" id="test-correo" class="form-control" placeholder="correo@test.com">
				                <a href="#!" class="btn btn-success" id="btnenviarCorreotest" onclick="enviarCorreotest()">
				                  ENVIAR
				                </a>
				              </div>
				            </div>
			            </div>

					</div>
				</div>
			</div>
		<?php } ?>


		<?php if($cod_grupo == "10001" || $cod_grupo == "10002" || $cod_grupo == "10003" || $cod_grupo == "10005" || $cod_grupo == "10006" || $cod_grupo == "10007" || $cod_grupo == "10008" || $cod_grupo == "10009"){ ?>
			<!-- Administradores y Super Administrador -->
			<div class="col-lg-12 col-xxl-12">
				<!--begin::List Widget 9-->
				<div class="card card-custom card-stretch gutter-b">
					<!--begin::Header-->
					<div class="card-header align-items-center border-0 mt-4">
						<h3 class="card-title align-items-start flex-column">
							<span class="font-weight-bolder text-dark">Estadísticas</span>
							<span class="text-muted mt-3 font-weight-bold font-size-sm">
								Seleccione un programa para filtrar resultados
							</span>
						</h3>
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body pt-4">
						<?php include_once('estadisticashome.php'); ?>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if($cod_grupo == "10004"){ //POSTULANTES ?>
			
			<div class="col-lg-12 col-xxl-12 text-center pb-5">
				
			</div>

			<div class="col-lg-12 col-xxl-12 text-center pb-5 d-none">
				<span class="text-dark-50 font-weight-bold font-size-base mr-1">Hola,</span>
				<span class="text-dark-50 font-weight-bolder font-size-base mr-3"><?php echo "$usua_nombre"; ?></span>
			</div>

			<!-- Administradores y Super Administrador -->
			<div class="col-lg-12 col-xxl-12">
				<!--begin::List Widget 9-->
				<div class="card card-stretch gutter-b">
					<!--begin::Header-->
					
					<!-- Se muestra en PC -->
					<img  src="assets/media/logos/Encabezado.jpg" class="d-none d-md-block" style="width: 100%" />

					<!-- Se muestra en MOVIL -->
					<img  src="assets/media/logos/Encabezado-movil.jpg" class="d-block d-sm-none" style="width: 100%" />

				<!--
					<div class="card-header border-0 py-5 text-center">
					    <div class="card-title">
							<span class="card-icon">
					          	<div class="symbol symbol-50 mr-3">
						        	<div class="symbol-label" style="background-image: url('assets/media/new/datos-estudiante-b.png');"></div>
						    	</div>
							</span>
							<h3 class="card-title text-center flex-column">
								<span class="card-label font-weight-bolder text-white">Convocatorias vigentes</span>
								<span class="text-muted mt-3 font-weight-bold font-size-sm">
									Seleccione un programa para postular
								</span>
							</h3>
							
						</div>
					</div>
				-->

					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body d-flex flex-column p-0">
						<div class="card-spacer bg-white card-rounded-top flex-grow-1">
							<div class="tab-content">
								<table class="table table-bordered table-responsive">
									<thead>
										<tr>	
											<th class="text-center">No</th>
											<th class="text-center">Programa</th>
											<th class="text-center">Institución</th>
											<th class="text-center">Estado de convocatoria</th>
											<th class="text-center">Acciones</th>
										</tr>
									</thead>
									
									<tbody>
										<?php
											//Listado de programas
											$SQLProgramas = "
												SELECT 
													p.id AS id, 
													p.nombre AS nombre,
													p.institucion AS institucion,
													p.logo AS logo,
													p.url AS url,
													p.estado AS estado 
												FROM programas AS p 
												WHERE activo = 1
												ORDER BY p.orden ASC
											";
										    $SQLconsultaProgramas = $conexionmysqli->query($SQLProgramas);
										    $SQLconsultaProgramas->data_seek(0);
										    $x=0;
										    while ($registro_Programas = $SQLconsultaProgramas->fetch_assoc()) {
										    	$x++;
										   		$id = $registro_Programas['id'];
										   	//	$ide = base64_encode($id);
										   		$nombre = $registro_Programas['nombre'];
										   		$institucion = $registro_Programas['institucion'];
										   		$logo = $registro_Programas['logo'];
										   		$url = $registro_Programas['url'];
										   		$estado = $registro_Programas['estado'];

										   		//Consulto si de los programas activos ya ha postulado a alguno
										   		$SQLProgreso = "
										   			SELECT 
										   				IF(p.completado IS NULL, '0', p.completado) AS completado,
										   				IF(p.aplicafinanciamiento IS NULL, '-', p.aplicafinanciamiento) AS financiamiento
										   			FROM postulaciones as p 
										   			WHERE p.id_programa = '$id' AND p.id_usuario = '$id_usuario' ";
												$SQLconsultaProgreso = $conexionmysqli->query($SQLProgreso);
												$SQLconsultaProgreso->data_seek(0);
												$registro_Progreso = $SQLconsultaProgreso->fetch_assoc();
													@$completado = $registro_Progreso['completado'];
													@$financiamiento = $registro_Progreso['financiamiento'];
												$SQLconsultaProgreso->close();

												// Condiciono la url en depende del estado
												// Si ya tiene el estado de: Postulo => 1, Postulara => 2, Pendiente => 3, No postulará => 6, Incompleto => 10, Entrevista => 12, Reserva de Plaza => 13, Rechaza cupo => 14

												$f = null;
												if($financiamiento == '1'){
													//Se autoriza a aplicar al financiamiento
													$f = "<a href='aplicarfinanciamiento.php?p=$id&u=$id_usuario' class='btn btn-danger btn-sm' target='_blank'>Financiamiento</a>";
												}

												if ($completado == '1' || $completado == '2' || $completado == '3' || $completado == '6' || $completado == '12' || $completado == '13' || $completado == '14') {
													echo "<tr><td>$x</td><td>$nombre</td><td class='row'><div class='col-md-2'><img src='assets/media/logos/$logo' class='logos-colabo'></div> <div class='col-md-10'>$institucion</div></td><td>$estado</td><td><a href='$_urlApp/postulacion.php?p=$id&u=$id_usuario' target='_blank' class='btn btn-success btn-sm'>Ver postulación</a> $f</td></tr>";
												}else if ($completado == '10'){
													echo "<tr><td>$x</td><td>$nombre</td><td class='row'><div class='col-md-2'><img src='assets/media/logos/$logo' class='logos-colabo'></div> <div class='col-md-10'>$institucion</div></td><td>$estado</td><td><a href='$_urlApp/$url?p=$id&u=$id_usuario' target='_blank' class='btn btn-warning btn-sm'>Continuar postulación</a> $f</td></tr>";
												}else{
													if ($estado == "Abierta") {
														echo "<tr><td>$x</td><td>$nombre</td><td class='row'><div class='col-md-2'><img src='assets/media/logos/$logo' class='logos-colabo'></div> <div class='col-md-10'>$institucion</div></td><td>$estado</td><td><a href='$_urlApp/$url?p=$id&u=$id_usuario' target='_blank' class='btn btn-primary btn-sm'>Postular</a> $f</td></tr>";
													}else{
														echo "<tr><td>$x</td><td>$nombre</td><td class='row'><div class='col-md-2'><img src='assets/media/logos/$logo' class='logos-colabo'></div> <div class='col-md-10'>$institucion</div></td><td>$estado</td><td>-</td></tr>";	
													}
													
												}

										    }
										    $SQLconsultaProgramas->close();
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
		<?php } ?>

		<?php if($cod_grupo == "10010"){ //COOPERATIVA ?>

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
			<div class="d-flex flex-column-fluid">
				<div class="container">
					<div class="card card-custom gutter-b">
						<div class="card-header flex-wrap py-3">
							<div class="card-title">
								<h3 class="card-label">Solicitudes de Financiamiento
								<!--<span class="d-block text-muted pt-2 font-size-sm">Activos</span>-->
								</h3>
								<input type="hidden" name="id_usuario_logueado" id="id_usuario_logueado" value="<?php echo"$id_usuario"; ?>">

							</div>

						
							<div class="card-toolbar" style="display: none;">

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
						<div class="card-body d-flex flex-column p-0">
							<div class="card-spacer bg-white card-rounded-top flex-grow-1">
								<div class="tab-content">
									<table class="table table-bordered" id="dataTable_tablafinanciamiento">
										<thead>
											<tr>	
												<th class="text-center">No</th>
												<th class="text-center">Nombre</th>
												<th class="text-center">Correo</th>
												<th class="text-center">Teléfono</th>
												<th class="text-center">Ciudad</th>
												<th class="text-center">Estado</th>
												<th class="text-center">Revisar documentación</th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php } ?>


		</div>
		<!--end::Row-->
		<!--end::Dashboard-->
	</div>
	<!--end::Container-->
</div>
<!--end::Entry-->
</div>
<!-- ********************** CONTENIDO - FIN **************************** -->


<?php 
	include_once('footer.php');
?>


