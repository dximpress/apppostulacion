<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
	<h4 class="mb-10 font-weight-bold text-dark titulo-secc">Datos académicos</h4>
<!--
TITULOS
-->
	<div class="form-group">

		<div class="row">
			<div class="col-xl-12">
				<label class="text-dark"><strong>Estudios universitarios</strong></label>
				<form id="estudiostercernivel" class="fileupload" action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<div class="row fileupload-buttonbar">
						  <div class="col-lg-12">
							<div class="row">
								<div class="col-lg-7">
									<label class="fs-14">
										Cargar el certificado de registro de título de la Senescyt actualizado, donde conste su título de tercer nivel de grado universitario. <span class="text-danger">*</span> <br>
									</label>

									<p class="text-muted mt-3">
										Archivos permitidos: jpeg, png, pdf. <br>
										Tamaño máximo de cada archivo: 3 MB.
									</p>

									<input type="hidden" name="archivo[]" class="archivos required">
								</div>
								<div class="col-lg-5 text-center">
									<img src="landings/assets/img/icon-titulos.png" class="img-fluid-formulario">
								</div>
							</div>
							
						  </div>
						  <div class="col-lg-12 pt-4">
								<?php 
								  $styleestudiostercernivel = 0;
									if($estudiostercernivel == ''){
										$styleestudiostercernivel = "display: initial";
									}else{
										$styleestudiostercernivel = "display: none";
									}; 
								?>
									<span class="btn btn-primary btn-sm fileinput-button" id="estudiostercernivel" style="<?php echo $styleestudiostercernivel; ?>">
									  <i class="bi bi-plus"></i>
									  <span>AÑADIR ARCHIVO</span>
									  <input type="file" name="files[]" multiple />
									</span>

								<span class="fileupload-process"></span>
						  </div>

						  <div class="col-lg-7 fileupload-progress fade" style="margin-top: 5px;">

							<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
							  <div class="progress-bar progress-bar-success" style="width: 0%;"></div>
							</div>
						  
							<div class="progress-extended">&nbsp;</div>
						  </div>
						</div>

						<table role="presentation" class="table table-bordered" id="tabla-cedula" data-idp="<?php echo $id_postulacion ?>">
						  <thead>
							<tr>
								<!-- th></th -->
								<th colspan="2" style="border: 1px solid #cdcdcd;">Archivo</th>
							</tr>
						  </thead>
						  <tbody class="files">
							<?php 
								if ($estudiostercernivel) {
									echo "<tr><td>$estudiostercernivel</td><td> <a href='$_urlApp/uploads/$estudiostercernivel' target='_blank' class='btn-ver-archivo' data-archivo='$estudiostercernivel'><i class='bi bi-eye text-success'></i></a> <a href='#!' data-id='$id_postulacion' data-archivo='$estudiostercernivel' class='btn-eliminar-archivo' data-campo='estudiostercernivel'><i class='bi bi-trash text-danger'></i></a> </td></tr>";
								}
							?>
						  </tbody>
						</table>
					</div>
				</form>
				<input type="hidden" class="requerido" name="estudiostercernivel-req" id="estudiostercernivel-req" value="<?php if($estudiostercernivel){ echo "1"; } ?>">
				<span class="text-danger spanrequerido estudiostercernivel-reqspan">Campo requerido</span>
			</div>
		</div>
	</div>
<!--
IDIOMAS
-->
	<div class="form-group mt-15">

		<div class="row">
			<div class="col-xl-12">
				<label class="text-dark"><strong>Estudios en idiomas</strong></label>
				<form id="idiomas" class="fileupload" action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<div class="row fileupload-buttonbar">
						  <div class="col-lg-12">
							<div class="row">
								<div class="col-lg-7">
									<label class="fs-14">
										Cargar en un solo documento los certificados que validen el nivel de suficiencia en algún idioma extranjero (opcional): <br>
									</label>

									<p class="text-muted mt-3">
										Archivos permitidos: jpeg, png, pdf. <br>
										Tamaño máximo de cada archivo: 3 MB.
									</p>

									<input type="hidden" name="archivo[]" class="archivos required">
								</div>
								<div class="col-lg-5 text-center">
									<img src="landings/assets/img/icon-idiomas.png" class="img-fluid-formulario">
								</div>
							</div>
							
						  </div>
						  <div class="col-lg-12 pt-4">
								<?php 
								  $styleidiomas = 0;
									if($idiomas == ''){
										$styleidiomas = "display: initial";
									}else{
										$styleidiomas = "display: none";
									}; 
								?>
									<span class="btn btn-primary btn-sm fileinput-button" id="idiomas" style="<?php echo $styleidiomas; ?>">
									  <i class="bi bi-plus"></i>
									  <span>AÑADIR ARCHIVO</span>
									  <input type="file" name="files[]" multiple />
									</span>

								<span class="fileupload-process"></span>
						  </div>

						  <div class="col-lg-7 fileupload-progress fade" style="margin-top: 5px;">

							<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
							  <div class="progress-bar progress-bar-success" style="width: 0%;"></div>
							</div>
						  
							<div class="progress-extended">&nbsp;</div>
						  </div>
						</div>

						<table role="presentation" class="table table-bordered" id="tabla-cedula" data-idp="<?php echo $id_postulacion ?>">
						  <thead>
							<tr>
								<!-- th></th -->
								<th colspan="2" style="border: 1px solid #cdcdcd;">Archivo</th>
							</tr>
						  </thead>
						  <tbody class="files">
							<?php 
								if ($idiomas) {
									echo "<tr><td>$idiomas</td><td> <a href='$_urlApp/uploads/$idiomas' target='_blank' class='btn-ver-archivo' data-archivo='$idiomas'><i class='bi bi-eye text-success'></i></a> <a href='#!' data-id='$id_postulacion' data-archivo='$idiomas' class='btn-eliminar-archivo' data-campo='idiomas'><i class='bi bi-trash text-danger'></i></a> </td></tr>";
								}
							?>
						  </tbody>
						</table>
					</div>
				</form>
				<input type="hidden" class="" name="idiomas-req" id="idiomas-req" value="<?php if($idiomas){ echo "1"; } ?>">
				<span class="text-danger spanrequerido idiomas-reqspan">Campo requerido</span>
			</div>
		</div>
	</div>
</div>

<!--
EXPERIENCIA INVESTIGATIVA
-->
<div class="pb-5" data-wizard-type="step-content">
	<h4 class="mb-10 font-weight-bold text-dark titulo-secc">Experiencia investigativa</h4>
	<label class="fs-14 text-dark">Completar los campos con información de las investigaciones realizadas por el postulante.</label>
	<div class="row">
		<div class="col-xl-12">
			<div class="form-group mt-15">
				<label>Publicaciones en revistas indexadas (opcional):</label><br>
				<i class="bi bi-info-circle"></i> <span class="form-text text-muted" style="font-size: 14px !important;">Tema, año de publicación, medio, enlace. <br> Ej: Volcanes Activos - Ecuador, 2013, digital, https://scholar.google.es/scholar?hl=es&as_sdt=0,33&cluster=8611067274227917906.</span>
				<textarea  class="form-control" name="publicacionesrevistas" id="publicacionesrevistas" cols="15" rows="25" placeholder="..." required="required">
					<?php echo "$publicacionesrevistas"; ?>
				</textarea>
				<span class="pl-5 spaninfo">
					<!-- input type="hidden" class="requerido" name="publicacionesrevistas-req" id="publicacionesrevistas-req" value="<?php // if($publicacionesrevistas){ echo "1"; } ?>" -->
				</span>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xl-12">
			<div class="form-group mt-15">
				<label>Libros o capítulos de libros (opcional).</label><br>
				<i class="bi bi-info-circle"></i> <span class="form-text text-muted" style="font-size: 14px !important;">Tema, editorial, año de publicación, ISBN. <br> Ej: Pedagogía del oprimido, Editorial Planeta, 2008, 978-3-16-148410-0. </span>
				<textarea  class="form-control" name="libros" id="libros" cols="15" rows="25" placeholder="..." required="required">
					<?php echo "$libros"; ?>
				</textarea>
				<span class="pl-5 spaninfo">
					<!-- input type="hidden" class="requerido" name="libros-req" id="libros-req" value="<?php // if($libros){ echo "1"; } ?>" -->
				</span>
			</div>
		</div>
	</div>
</div>

<!--
CARTA DE MOTIVACIÓN 
-->
<div class="pb-0" data-wizard-type="step-content">
	<h4 class="mb-10 font-weight-bold text-dark titulo-secc">Carta de motivación.</h4>
	<div class="row">

		<div class="col-xl-12">
			<form id="incentivopostulacion" class="fileupload" action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<div class="row fileupload-buttonbar">
			          <div class="col-lg-12">
			          	<div class="row">
			          		<div class="col-lg-7">
			          			<label class="fs-14">Cargar un documento de entre 700 a 1000 palabras, en donde el postulante explique cuál es su motivación para formar parte de este programa. <span class="text-danger">*</span></label>

					          	<p class="text-muted mt-3">
					          		Archivos permitidos: jpeg, png, pdf. <br>
					          		Tamaño máximo de cada archivo: 3 MB.
					          	</p>

					          	<input type="hidden" name="archivo[]" class="archivos required">
			          		</div>
			          		<div class="col-lg-5 text-center">
			          			<img src="landings/assets/img/icon-carta-motivacion.png"  class="img-fluid-formulario">
			          		</div>
			          	</div>
			          	
			          </div>
			          <div class="col-lg-12 pt-4">
				            <!-- The fileinput-button span is used to style the file input field as button -->
				            <?php 
				              $stylemotivacion = 0;
				            	if($incentivopostulacion == ''){
				            		$stylemotivacion = "display: initial";
				             	}else{
				             		$stylemotivacion = "display: none";
				             	}; 
				            ?>
					            <span class="btn btn-primary btn-sm fileinput-button" id="incentivopostulacion" style="<?php echo $stylemotivacion; ?>">
					              <i class="bi bi-plus"></i>
					              <span>AÑADIR ARCHIVO</span>
					              <input type="file" name="files[]" multiple />
					            </span>
			            <span class="fileupload-process"></span>
			          </div>
			          <!-- The global progress state -->
			          <div class="col-lg-7 fileupload-progress fade" style="margin-top: 5px;">
			            
			            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
			              <div class="progress-bar progress-bar-success" style="width: 0%;"></div>
			            </div>
			          
			            <div class="progress-extended">&nbsp;</div>
			          </div>

			        </div>
			        <!-- The table listing the files available for upload/download -->
			        <table role="presentation" class="table table-bordered" id="tabla-motivacion" data-idp="<?php echo $id_postulacion ?>">
			          <thead>
			          	<tr>
			          		<!-- th></th -->
			          		<th colspan="2" style="border: 1px solid #cdcdcd;">Archivo</th>
			          		<!-- th style="border: 1px solid #cdcdcd;">Tamaño</th -->
			          		<!-- th style="border: 1px solid #cdcdcd;">Acciones</th -->
			          	</tr>
			          </thead>
			          <tbody class="files">
			          	<?php 
			          		if ($incentivopostulacion) {
			          			echo "<tr><td>$incentivopostulacion</td><td> <a href='$_urlApp/uploads/$incentivopostulacion' target='_blank' class='btn-ver-archivo' data-archivo='$incentivopostulacion'><i class='bi bi-eye text-success'></i></a> <a href='#!' data-id='$id_postulacion' data-archivo='$incentivopostulacion' class='btn-eliminar-archivo' data-campo='incentivopostulacion'><i class='bi bi-trash text-danger'></i></a> </td></tr>";
			          		}
			          	?>
			          </tbody>
			        </table>
			    </div>
			</form>
			<input type="hidden" class="requerido" name="incentivopostulacion-req" id="incentivopostulacion-req" value="<?php if($incentivopostulacion){ echo "1"; } ?>">
			<span class="text-danger spanrequerido incentivopostulacion-reqspan">Campo requerido</span>
		</div>
	</div>
</div>
<!--
CARTA DE RECOMENDACION
<div class="pt-5 pb-5" data-wizard-type="step-content">
	<h4 class="mb-10 font-weight-bold text-dark">Carta de recomendación académica</h4>

	<div class="row">
		<div class="col-xl-12">
			<form id="cartarecomendacion" class="fileupload" action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<div class="row fileupload-buttonbar">
			          <div class="col-lg-12">
			          	<div class="row">
			          		<div class="col-lg-7">
			          			<label class="fs-14">
					          		Cargar un documento en donde conste una recomendación académica. <span class="text-danger">*</span> <br>
					          	</label>

					          	<p class="text-muted mt-3">
					          		Archivos permitidos: jpeg, png, pdf. <br>
					          		Tamaño máximo de cada archivo: 3 MB.
					          	</p>

					          	<input type="hidden" name="archivo[]" class="archivos required">
			          		</div>
			          		<div class="col-lg-5 text-center">
			          			<img src="landings/assets/img/icon-carta-recomendacion.png" class="img-fluid-formulario">
			          		</div>
			          	</div>
			          	
			          </div>
			          <div class="col-lg-12 pt-4">
				            
				            <?php 
				              /*
				              $stylecartarecomendacion = 0;
				            	if($cartarecomendacion == ''){
				            		$stylecartarecomendacion = "display: initial";
				             	}else{
				             		$stylecartarecomendacion = "display: none";
				             	};
				             	*/
				            ?>
					            <span class="btn btn-primary btn-sm fileinput-button" id="cartarecomendacion" style="<?php // echo $stylecartarecomendacion; ?>">
					              <i class="bi bi-plus"></i>
					              <span>AÑADIR ARCHIVO</span>
					              <input type="file" name="files[]" multiple />
					            </span>

			            <span class="fileupload-process"></span>
			          </div>
			          
			          <div class="col-lg-7 fileupload-progress fade" style="margin-top: 5px;">
			            
			            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
			              <div class="progress-bar progress-bar-success" style="width: 0%;"></div>
			            </div>
			          
			            <div class="progress-extended">&nbsp;</div>
			          </div>

			        </div>
			        
			        <table role="presentation" class="table table-bordered" id="tabla-cedula" data-idp="<?php // echo $id_postulacion ?>">
			          <thead>
			          	<tr>
			          		<th colspan="2" style="border: 1px solid #cdcdcd;">Archivo</th>
			          	</tr>
			          </thead>
			          <tbody class="files">
			          	<?php
			          	/*
			          		if ($cartarecomendacion) {
			          			echo "<tr><td>$cartarecomendacion</td><td> <a href='$_urlApp/uploads/$cartarecomendacion' target='_blank' class='btn-ver-archivo' data-archivo='$cartarecomendacion'><i class='bi bi-eye text-success'></i></a> <a href='#!' data-id='$id_postulacion' data-archivo='$cartarecomendacion' class='btn-eliminar-archivo' data-campo='cartarecomendacion'><i class='bi bi-trash text-danger'></i></a> </td></tr>";
			          		}
			          	*/
			          	?>
			          </tbody>
			        </table>
			    </div>
			</form>
			<input type="hidden" class="requerido" name="cartarecomendacion-req" id="cartarecomendacion-req" value="<?php // if($cartarecomendacion){ echo "1"; } ?>">
			<span class="text-danger spanrequerido cartarecomendacion-reqspan">Campo requerido</span>
		</div>
	</div>
</div>
-->

<!--
TRAYECTORIA LABORAL
-->
<div class="mt-5 pb-5" data-wizard-type="step-content">
	<h4 class="mb-10 font-weight-bold text-dark titulo-secc">Información laboral</h4>

	<div class="row">
		<div class="col-xl-12">
			<!--begin::Input-->
			<div class="form-group">
				<label>Institución que labora en la actualidad. <span class="text-danger">*</span></label>
				<input type="text" class="form-control requerido" name="institucion" id="institucion" placeholder="..." value="<?php echo "$institucion"; ?>" />
				<span class="text-danger spanrequerido institucionspan">Campo requerido</span>
				<!-- span class="form-text text-muted">Please enter your Address.</span -->
			</div>
			<!--end::Input-->
		</div>
	</div>

	<div class="row">
		<div class="col-xl-6">
			<div class="form-group">
				<label>Cargo. <span class="text-danger">*</span></label>
				<input type="text" class="form-control requerido" name="cargoempresa" id="cargoempresa" placeholder="..." value="<?php echo "$cargoempresa"; ?>" />
				<span class="text-danger spanrequerido cargoempresaspan">Campo requerido</span>
			</div>
		</div>
		<div class="col-xl-6">
			<div class="form-group">
				<label style="margin-bottom: 10px;">Tipo de Institución. <span class="text-danger">*</span></label><br>
				
				<div class="form-check form-check-inline">	
				  <input class="form-check-input" type="radio" name="tipoinstitucion" id="tipoinstitucion1" value="publica" <?php if($tipoinstitucion == 'publica'){echo "checked";} ?> >
				  <label class="form-check-label" for="tipoinstitucion1" style="margin-top: 0">Pública</label>
				</div>
				
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="tipoinstitucion" id="tipoinstitucion2" value="privada" <?php if($tipoinstitucion == 'privada'){echo "checked";} ?> >
				  <label class="form-check-label" for="tipoinstitucion2" style="margin-top: 0">Privada</label>
				</div>

				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="tipoinstitucion" id="tipoinstitucion3" value="fiscomisional" <?php if($tipoinstitucion == 'fiscomisional'){echo "checked";} ?> >
				  <label class="form-check-label" for="tipoinstitucion3" style="margin-top: 0">Fiscomisional</label>
				</div>

				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="tipoinstitucion" id="tipoinstitucion4" value="municipal" <?php if($tipoinstitucion == 'municipal'){echo "checked";} ?> >
				  <label class="form-check-label" for="tipoinstitucion4" style="margin-top: 0">Municipal</label>
				</div>

				<input type="hidden" class="requerido" name="tipoinstitucion-req" id="tipoinstitucion-req" value="<?php if($tipoinstitucion){ echo "1"; } ?>">
				<span class="text-danger spanrequerido tipoinstitucion-reqspan">Campo requerido</span>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xl-3">
			<div class="form-group">
				<label>Años de trabajo.</label>
				<input type="number" class="form-control requerido" name="tiempotrabajo" id="tiempotrabajo" placeholder="..." value="<?php echo "$tiempotrabajo"; ?>" />
			</div>
		</div>

		<div class="col-xl-9" style="padding-top: 15px;">
			<label class="text-dark">Tipo de nombramiento:</label> <br>
			<div class="form-group">
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="nombramiento" id="nombramiento1" value="definitivo" <?php if($nombramiento == 'definitivo'){echo "checked";} ?> >
				  <label class="form-check-label" for="nombramiento1" style="margin-top: 0">Nombramiento definitivo</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="nombramiento" id="nombramiento2" value="provisional" <?php if($nombramiento == 'provisional'){echo "checked";} ?> >
				  <label class="form-check-label" for="nombramiento2" style="margin-top: 0">Nombramiento provisional</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="nombramiento" id="nombramiento3" value="ocasional" <?php if($nombramiento == 'ocasional'){echo "checked";} ?> >
				  <label class="form-check-label" for="nombramiento3" style="margin-top: 0">Ocasional</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="nombramiento" id="nombramiento4" value="ocasional" <?php if($nombramiento == 'otros'){echo "checked";} ?> >
				  <label class="form-check-label" for="nombramiento4" style="margin-top: 0">Otro</label>
				</div>
			</div>
			<input type="hidden" class="requerido" name="nombramiento-req" id="nombramiento-req" value="<?php if($nombramiento){ echo "1"; } ?>">
		</div>
	</div>
	
	<div class="row">

		<div class="col-xl-6">
			<div class="form-group">
				<label>Ciudad. <span class="text-danger">*</span></label>
				<input type="text" class="form-control requerido" name="paisempresa" id="paisempresa" placeholder="..." value="<?php echo "$paisempresa"; ?>" />
				<span class="text-danger spanrequerido paisempresaspan">Campo requerido</span>
			</div>
		</div>

		<div class="col-xl-6">
			<div class="form-group">
				<label>Provincia. <span class="text-danger">*</span></label>
				<input type="text" class="form-control requerido" name="provinciaempresa" id="provinciaempresa" placeholder="..." value="<?php echo "$provinciaempresa"; ?>" />
				<span class="text-danger spanrequerido provinciaempresaspan">Campo requerido</span>
			</div>
		</div>

	</div>
</div>

<!--
BECA
-->
<div class="pb-5" data-wizard-type="step-content" style="margin-top: 50px">
	<h4 class="mb-10 font-weight-bold text-dark titulo-secc">Aplicación a beca </h4>
	<div class="row">

		<div class="row" style="margin-top: 5px">

			<form id="archivobeca" class="fileupload" action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<div class="row fileupload-buttonbar">
			          <div class="col-lg-12">
			          	<div class="row">
			          		<div class="col-lg-7">
			          			<label class="fs-14">
					          		1. Revisa el documento de <i>Plan de becas</i> vigente haciendo clic <a href="https://unirep.edu.ec/archivospdf/archivosrep/Plan-de-becas-REP.pdf?ver1.2" target="_blank"><span class="text-primary"><strong>aquí</strong></span></a>.<br><br>
									2. Selecciona el plan de beca al que deseas postular. <br>
									<select name="selecbeca" id="selecbeca" class="form-control custom-select">
										<option value="">Clic para mostrar listado de becas</option>
										<option value="1" <?php if($selecbeca == '1'){ echo "selected";} ?>>Beca mujeres educadoras</option>
										<option value="2" <?php if($selecbeca == '2'){ echo "selected";} ?>>Beca académica</option>
										<option value="3" <?php if($selecbeca == '3'){ echo "selected";} ?>>Beca deportiva</option>
										<option value="4" <?php if($selecbeca == '4'){ echo "selected";} ?>>Beca cultural</option>
										<option value="5" <?php if($selecbeca == '5'){ echo "selected";} ?>>Beca de acción afirmativa</option>
									</select><br>
									3. Carga la documentación correspondiente. <br>
					          	</label>

					          	<p class="text-muted mt-3">
					          		Archivos permitidos: jpeg, png, pdf. <br>
					          		Tamaño máximo de cada archivo: 3 MB.
					          	</p>

					          	<input type="hidden" name="archivo[]" class="archivos required">
			          		</div>
			          		<div class="col-lg-5 text-center">
			          			<img src="landings/assets/img/icon-becas.png" class="img-fluid-formulario">
			          		</div>
			          	</div>
			          	
			          </div>
			          <div class="col-lg-12 pt-4">
				            <?php 
				            
				              $stylefotocopiacedula = 0;
				            	if($archivobeca == ''){
				            		$stylefotocopiacedula = "display: initial";
				             	}else{
				             		$stylefotocopiacedula = "display: none";
				             	}; 
				             
				            ?>
					            <span class="btn btn-primary btn-sm fileinput-button" id="archivobeca" style="<?php echo $stylefotocopiacedula; ?>">
					              <i class="bi bi-plus"></i>
					              <span>AÑADIR ARCHIVO</span>
					              <input type="file" name="files[]" multiple />
					            </span>
			            <span class="fileupload-process"></span>
			          </div>
			          <div class="col-lg-7 fileupload-progress fade" style="margin-top: 5px;">
			            
			            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
			              <div class="progress-bar progress-bar-success" style="width: 0%;"></div>
			            </div>
			          
			            <div class="progress-extended">&nbsp;</div>
			          </div>

			        </div>
			        <table role="presentation" class="table table-bordered" id="tabla-archivobeca" data-idp="<?php echo $id_postulacion ?>">
			          <thead>
			          	<tr>
			          		<th colspan="2" style="border: 1px solid #cdcdcd;">Archivo</th>
			          	</tr>
			          </thead>
			          <tbody class="files">
			          	<?php 
			          	
			          		if ($archivobeca) {
			          			echo "<tr><td>$archivobeca</td><td> <a href='$_urlApp/uploads/$archivobeca' target='_blank' class='btn-ver-archivo' data-archivo='$archivobeca'><i class='bi bi-eye text-success'></i></a> <a href='#!' data-id='$id_postulacion' data-archivo='$archivobeca' class='btn-eliminar-archivo' data-campo='archivobeca'><i class='bi bi-trash text-danger'></i></a> </td></tr>";
			          		}
			          	
			          	?>
			          </tbody>
			        </table>
			    </div>
			</form>
			<input type="hidden" class="" name="archivobeca-req" id="archivobeca-req" value="<?php if($archivobeca){ echo "1"; } ?>">
			<span class="text-danger spanrequerido archivobeca-reqspan">Campo requerido</span>
		</div>
	</div>											
</div>


