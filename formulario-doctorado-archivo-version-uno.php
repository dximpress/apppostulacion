<!-- DATOS ACADEMICOS -->
<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
	<h4 class="mb-10 font-weight-bold text-dark titulo-secc">Datos académicos</h4>

	<div class="form-group">
		<label>Estudios de tercer nivel: <span class="text-danger">*</span></label><br>
		<i class="bi bi-info-circle"></i> <span class="form-text text-muted" style="font-size: 14px !important;">Título, IES, registro Senescyt. <br> Ej: Licenciada en Ciencias de la Educación, Instituto Central de Ciencias Pedagógicas, 1789-07-5648907.</span>
		<textarea  class="form-control" name="estudiostercernivel" id="estudiostercernivel" cols="15" rows="25" placeholder="..." required="required">
			<?php echo "$estudiostercernivel"; ?>
		</textarea>
		<span class="pl-5 spaninfo">
			<span class="text-danger spanrequerido estudiostercernivel-reqspan">Campo requerido</span>
			<input type="hidden" class="requerido" name="estudiostercernivel-req" id="estudiostercernivel-req" value="<?php if($estudiostercernivel){ echo "1"; } ?>">
		</span>
	</div>


	<div class="form-group mt-15">
		<label>Estudios de cuarto nivel (maestría): <span class="text-danger">*</span></label><br>
		<i class="bi bi-info-circle"></i> <span class="form-text text-muted" style="font-size: 14px !important;">Título, IES, registro Senescyt.<br> Ej: Maestría en Educación Inicial, Instituto Central de Ciencias Pedagógicas, 1789-07-5648907.</span>
		<textarea  class="form-control" name="estudioscuartonivel" id="estudioscuartonivel" cols="15" rows="25" placeholder="..." required="required">
			<?php echo "$estudioscuartonivel"; ?>
		</textarea>
		<span class="pl-5 spaninfo">
			<span class="text-danger spanrequerido estudioscuartonivel-reqspan">Campo requerido</span>
			<input type="hidden" class="requerido" name="estudioscuartonivel-req" id="estudioscuartonivel-req" value="<?php if($estudioscuartonivel){ echo "1"; } ?>">
			
		</span>
	</div>

	<div class="form-group mt-15">
		<label>Idiomas:</label><br>
		<i class="bi bi-info-circle"></i> <span class="form-text text-muted" style="font-size: 14px !important;">Idioma, nivel de certificación, institución que otorga <br> Ej: Inglés, C1, Cambridge</span>
		<textarea  class="form-control" name="idiomas" id="idiomas" cols="15" rows="25" placeholder="...">
			<?php echo "$idiomas"; ?>
		</textarea>
		<span class="pl-5 spaninfo"></span>
	</div>
</div>

<!-- TRAYECTORIA LABORAL -->
<div class="pb-5" data-wizard-type="step-content">
	<h4 class="mb-10 font-weight-bold text-dark titulo-secc">Trayectoria laboral</h4>

	<div class="row">
		<div class="col-xl-12">
			<!--begin::Input-->
			<div class="form-group">
				<label>Institución que labora en la actualidad: <span class="text-danger">*</span></label>
				<input type="text" class="form-control requerido" name="institucion" id="institucion" placeholder="..." value="<?php echo "$institucion"; ?>" />
				<span class="text-danger spanrequerido institucionspan">Campo requerido</span>
				<!-- span class="form-text text-muted">Please enter your Address.</span -->
			</div>
			<!--end::Input-->
		</div>
	</div>
	<div class="row">
		<div class="col-xl-6">
			<!--begin::Input-->
			<div class="form-group">
				<label>Provincia: <span class="text-danger">*</span></label>
				<input type="text" class="form-control requerido" name="provinciaempresa" id="provinciaempresa" placeholder="..." value="<?php echo "$provinciaempresa"; ?>" />
				<span class="text-danger spanrequerido provinciaempresaspan">Campo requerido</span>
			</div>
			<!--end::Input-->
		</div>
		<div class="col-xl-6">
			<!--begin::Input-->
			<div class="form-group">
				<label>Ciudad: <span class="text-danger">*</span></label>
				<input type="text" class="form-control requerido" name="paisempresa" id="paisempresa" placeholder="..." value="<?php echo "$paisempresa"; ?>" />
				<span class="text-danger spanrequerido paisempresaspan">Campo requerido</span>
			</div>
			<!--end::Input-->
		</div>
	</div>
	<div class="row">
		<div class="col-xl-6">
			<div class="form-group">
				<label>Cargo: <span class="text-danger">*</span></label>
				<input type="text" class="form-control requerido" name="cargoempresa" id="cargoempresa" placeholder="..." value="<?php echo "$cargoempresa"; ?>" />
				<span class="text-danger spanrequerido cargoempresaspan">Campo requerido</span>
			</div>
		</div>
		<div class="col-xl-6">
			<div class="form-group">
				<label style="margin-bottom: 10px;">Tipo de Institución: <span class="text-danger">*</span></label><br>
				<div class="form-check form-check-inline">	
				  <input class="form-check-input" type="radio" name="tipoinstitucion" id="tipoinstitucion1" value="publica" <?php if($tipoinstitucion == 'publica'){echo "checked";} ?> >
				  <label class="form-check-label" for="tipoinstitucion1" style="margin-top: 0">Pública</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="tipoinstitucion" id="tipoinstitucion2" value="privada" <?php if($tipoinstitucion == 'privada'){echo "checked";} ?> >
				  <label class="form-check-label" for="tipoinstitucion2" style="margin-top: 0">Privada</label>
				</div>
				<input type="hidden" class="requerido" name="tipoinstitucion-req" id="tipoinstitucion-req" value="<?php if($tipoinstitucion){ echo "1"; } ?>">
				<span class="text-danger spanrequerido tipoinstitucion-reqspan">Campo requerido</span>
			</div>
		</div>
		
	</div>

	<div class="row">
		<div class="col-xl-3">
			<div class="form-group">
				<label>Años de trabajo:</label>
				<input type="number" class="form-control requerido" name="tiempotrabajo" id="tiempotrabajo" placeholder="..." value="<?php echo "$tiempotrabajo"; ?>" />
			</div>
		</div>

		<div class="col-xl-9" style="padding-top: 15px;">
			<label class="text-dark">Tipo de contrato:</label> <br>
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
		<div class="col-xl-12">
			<div class="form-group mt-15">
				<label>Experiencia laboral: </label><br>
				<i class="bi bi-info-circle"></i> <span class="form-text text-muted" style="font-size: 14px !important;">Institución, cargo, fecha de ingreso - fecha de salida.<br>Ej: Instituto Central de Ciencias Pedagógicas, docente, 04/01/2020 - 13/01/2021.</span>
				<textarea  class="form-control" name="experienciadocencia" id="experienciadocencia" cols="15" rows="25" placeholder="..." required="required">
					<?php echo "$experienciadocencia"; ?>
				</textarea>
				<span class="pl-5 spaninfo">
					<!-- input type="hidden" class="requerido" name="experienciadocencia-req" id="experienciadocencia-req" value="<?php // if($experienciadocencia){ echo "1"; } ?>" -->
				</span>
			</div>
		</div>
	</div>	
</div>

<!-- EXPERIENCIA INVESTIGATIVA -->
<div class="pb-5" data-wizard-type="step-content">
	<h4 class="mb-10 font-weight-bold text-dark titulo-secc">Experiencia investigativa</h4>

	<div class="row">
		<div class="col-xl-12">
			<div class="form-group mt-15">
				<label>Publicaciones en revistas indexadas:</label><br>
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
				<label>Libros o capítulos de libros:</label><br>
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

<!-- MOTIVACION -->
<div class="pb-5" data-wizard-type="step-content">
	<h4 class="mb-10 font-weight-bold text-dark titulo-secc">Motivación</h4>
	<div class="row">
		<div class="col-xl-12">
			<div class="form-group mt-15">
				<label>¿Qué te incentiva a postular a este programa? <span class="text-danger">*</span></label>
				<textarea  class="form-control" name="incentivopostulacion" id="incentivopostulacion" cols="15" rows="25" placeholder="..." required="required">
					<?php echo "$incentivopostulacion"; ?>
				</textarea>
				<input type="hidden" class="requerido" name="incentivopostulacion-req" id="incentivopostulacion-req" value="<?php if($incentivopostulacion){ echo "1"; } ?>">
				<span class="text-danger spanrequerido incentivopostulacion-reqspan">Campo requerido</span>
			</div>
		</div>

		<div class="col-xl-12">
			<div class="form-group mt-15">
				<label>¿Cómo proyectas tu carrera profesional en los próximos años? <span class="text-danger">*</span></label>
				<textarea  class="form-control" name="carreraprofesional" id="carreraprofesional" cols="15" rows="25" placeholder="..." required="required">
					<?php echo "$carreraprofesional"; ?>
				</textarea>
				<input type="hidden" class="requerido" name="carreraprofesional-req" id="carreraprofesional-req" value="<?php if($carreraprofesional){ echo "1"; } ?>">
				<span class="text-danger spanrequerido carreraprofesional-reqspan">Campo requerido</span>
			</div>
		</div>

		<div class="col-xl-12">
			<div class="form-group mt-15">
				<label>En caso de ser aceptado en el programa, ¿cuál crees que sería el impacto en tu carrera? <span class="text-danger">*</span></label>
				<textarea  class="form-control" name="impactocarrera" id="impactocarrera" cols="15" rows="25" placeholder="..." required="required">
					<?php echo "$impactocarrera"; ?>
				</textarea>
				<input type="hidden" class="requerido" name="impactocarrera-req" id="impactocarrera-req" value="<?php if($impactocarrera){ echo "1"; } ?>">
				<span class="text-danger spanrequerido impactocarrera-reqspan">Campo requerido</span>
			</div>
		</div>

	</div>
</div>

<!-- DOCUMENTACION -->
<div class="pb-5" data-wizard-type="step-content">
	<h4 class="mb-10 font-weight-bold text-dark titulo-secc">Documentación</h4>

	<div class="row" style="display: none;">
		<div class="col-xl-12">
			<form id="hojadevida" class="fileupload" action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<div class="row fileupload-buttonbar">
			          <div class="col-lg-12">
			          	<label class="fs-14">
			          		1- Hoja de vida <span class="text-danger">*</span> <br>
			          	</label>

			          	<p class="text-muted mt-3">
			          		Archivos permitidos: jpeg, png, pdf. <br>
			          		Tamaño máximo de cada archivo: 3 MB.
			          	</p>

			          	<input type="hidden" name="archivo[]" class="archivos required">
			          </div>
			          <div class="col-lg-12">
				            <!-- The fileinput-button span is used to style the file input field as button -->
				            
				            <span class="btn btn-primary btn-sm fileinput-button">
				              <i class="bi bi-plus"></i>
				              <span>AÑADIR ARCHIVO</span>
				              <input type="file" name="files[]" multiple />
				            </span>
				            
				        
					        <!--
					            <button type="button" class="btn btn-danger btn-sm delete">
					              <i class="bi bi-trash"></i>
					              <span>ELIMINAR SELECCIONADOS</span>
					            </button>
					        -->
				            <!--<input type="checkbox" class="toggle" />
				             The global file processing state -->
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
			        <table role="presentation" class="table table-bordered" id="tabla-hojadevida">
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
			          		if ($hojadevida) {
			          			echo "<tr><td>$hojadevida</td><td><a href='#!'><i class='bi bi-trash text-danger'></i></a> <a href='#!'><i class='bi bi-eye text-success'></i></a></td></tr>";
			          		}
			          	?>
			          </tbody>
			        </table>
			    </div>
			</form>
			<!-- input type="text" class="requerido" name="hojadevida-req" id="hojadevida-req" value="" -->
		</div>
	</div>


<!-- CEDULA -->
	<div class="row">
		<div class="col-xl-12">
			<form id="fotocopiacedula" class="fileupload" action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<div class="row fileupload-buttonbar">
			          <div class="col-lg-12">
			          	<div class="row">
			          		<div class="col-lg-5">
			          			<label class="fs-14">
					          		1 - Fotocopia de la cédula (ambos lados) o pasaporte (primera página donde se muestre la vigencia del mismo). <span class="text-danger">*</span> <br>
					          	</label>

					          	<p class="text-muted mt-3">
					          		Archivos permitidos: jpeg, png, pdf. <br>
					          		Tamaño máximo de cada archivo: 3 MB.
					          	</p>

					          	<input type="hidden" name="archivo[]" class="archivos required">
			          		</div>
			          		<div class="col-lg-7">
			          			<!-- img src="landings/assets/img/default-cedula.jpg" -->
			          			<div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
								  <div class="carousel-inner">
								    <div class="carousel-item active">
								      <img src="landings/assets/img/default-cedula-frente.png" alt="Primer slide">
								    </div>
								    <div class="carousel-item">
								      <img src="landings/assets/img/default-cedula-fondo.png" alt="Segundo slide">
								    </div>
								    <div class="carousel-item">
								      <img src="landings/assets/img/default-pasaporte.png" alt="Tercer slide">
								    </div>
								  </div>
								  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
								    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
								    <span class="sr-only">Ant</span>
								  </a>
								  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
								    <span class="carousel-control-next-icon" aria-hidden="true"></span>
								    <span class="sr-only">Sgte</span>
								  </a>
								</div>
			          		</div>
			          	</div>
			          	
			          </div>
			          <div class="col-lg-12">
				            <!-- The fileinput-button span is used to style the file input field as button -->
				            <?php 
				              $stylefotocopiacedula = 0;
				            	if($fotocopiacedula == ''){
				            		$stylefotocopiacedula = "display: initial";
				             	}else{
				             		$stylefotocopiacedula = "display: none";
				             	}; 
				            ?>
					            <span class="btn btn-primary btn-sm fileinput-button" id="fotocopiacedula" style="<?php echo $stylefotocopiacedula; ?>">
					              <i class="bi bi-plus"></i>
					              <span>AÑADIR ARCHIVO</span>
					              <input type="file" name="files[]" multiple />
					            </span>

				        
					        <!--
					            <button type="button" class="btn btn-danger btn-sm delete">
					              <i class="bi bi-trash"></i>
					              <span>ELIMINAR SELECCIONADOS</span>
					            </button>
					        -->
				            <!--<input type="checkbox" class="toggle" />
				             The global file processing state -->
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
			        <table role="presentation" class="table table-bordered" id="tabla-cedula" data-idp="<?php echo $id_postulacion ?>">
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
			          		if ($fotocopiacedula) {
			          			echo "<tr><td>$fotocopiacedula</td><td> <a href='$_urlApp/uploads/$fotocopiacedula' target='_blank' class='btn-ver-archivo' data-archivo='$fotocopiacedula'><i class='bi bi-eye text-success'></i></a> <a href='#!' data-id='$id_postulacion' data-archivo='$fotocopiacedula' class='btn-eliminar-archivo' data-campo='fotocopiacedula'><i class='bi bi-trash text-danger'></i></a> </td></tr>";
			          		}
			          	?>
			          </tbody>
			        </table>
			    </div>
			</form>
			<input type="hidden" class="requerido" name="fotocopiacedula-req" id="fotocopiacedula-req" value="<?php if($fotocopiacedula){ echo "1"; } ?>">
			<span class="text-danger spanrequerido fotocopiacedula-reqspan">Campo requerido</span>
		</div>
	</div>

<!-- TITULO DE 3ER NIVEL -->
	<div class="row">
		<div class="col-xl-12">
			<form id="copiatitulo" class="fileupload" action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<div class="row fileupload-buttonbar">
			          <div class="col-lg-12">
			          	<div class="row">
			          		<div class="col-lg-5">
			          			<label class="fs-14">
					          		2- Copia de títulos de tercer nivel de grado universitario. <span class="text-danger">*</span> <br>
					          	</label>

					          	<p class="text-muted mt-3">
					          		Archivos permitidos: jpeg, png, pdf. <br>
					          		Tamaño máximo de cada archivo: 3 MB.
					          	</p>

					          	<input type="hidden" name="archivo[]" class="archivos required">
			          		</div>
			          		<div class="col-lg-7">
			          			<img src="landings/assets/img/certificado-graduado.png">
			          		</div>
			          	</div>
			          	
			          </div>
			          <div class="col-lg-12">
				            <!-- The fileinput-button span is used to style the file input field as button -->
				            <?php 
				              $stylefotocopiatitulo = 0;
				            	if($copiatitulo == ''){
				            		$stylefotocopiatitulo = "display: initial";
				             	}else{
				             		$stylefotocopiatitulo = "display: none";
				             	}; 
				            ?>
					            <span class="btn btn-primary btn-sm fileinput-button" id="copiatitulo" style="<?php echo $stylefotocopiatitulo; ?>">
					              <i class="bi bi-plus"></i>
					              <span>AÑADIR ARCHIVO</span>
					              <input type="file" name="files[]" multiple />
					            </span>

				        
					        <!--
					            <button type="button" class="btn btn-danger btn-sm delete">
					              <i class="bi bi-trash"></i>
					              <span>ELIMINAR SELECCIONADOS</span>
					            </button>
					        -->
				            <!--<input type="checkbox" class="toggle" />
				             The global file processing state -->
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
			        <table role="presentation" class="table table-bordered" id="tabla-copiatitulo" data-idp="<?php echo $id_postulacion ?>">
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
			          		if ($copiatitulo) {
			          			echo "<tr><td>$copiatitulo</td><td> <a href='$_urlApp/uploads/$copiatitulo' target='_blank' class='btn-ver-archivo' data-archivo='$copiatitulo'><i class='bi bi-eye text-success'></i></a> <a href='#!' data-id='$id_postulacion' data-archivo='$copiatitulo' class='btn-eliminar-archivo' data-campo='copiatitulo'><i class='bi bi-trash text-danger'></i></a> </td></tr>";
			          		}
			          	?>
			          </tbody>
			        </table>
			    </div>
			</form>
			<input type="hidden" class="requerido" name="copiatitulo-req" id="copiatitulo-req" value="<?php if($copiatitulo){ echo "1"; } ?>">
			<span class="text-danger spanrequerido copiatitulo-reqspan">Campo requerido</span>
		</div>
	</div>

<!-- TITULO DE 4to NIVEL -->

	<div class="row">
		<div class="col-xl-12">
			<form id="copiatitulocuartonivel" class="fileupload" action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<div class="row fileupload-buttonbar">
			          <div class="col-lg-12">
			          	<div class="row">
			          		<div class="col-lg-5">
			          			<label class="fs-14">
					          		3- Copia de títulos de cuarto nivel de grado universitario. <span class="text-danger">*</span> <br>
					          	</label>

					          	<p class="text-muted mt-3">
					          		Archivos permitidos: jpeg, png, pdf. <br>
					          		Tamaño máximo de cada archivo: 3 MB.
					          	</p>

					          	<input type="hidden" name="archivo[]" class="archivos required">
			          		</div>
			          		<div class="col-lg-7">
			          			<img src="landings/assets/img/certificado-graduado.png">
			          		</div>
			          	</div>
			          	
			          </div>
			          <div class="col-lg-12">
				            <!-- The fileinput-button span is used to style the file input field as button -->
				            <?php 
				              $stylefotocopiacedula = 0;
				            	if($copiatitulocuartonivel == ''){
				            		$stylefotocopiacedula = "display: initial";
				             	}else{
				             		$stylefotocopiacedula = "display: none";
				             	}; 
				            ?>
					            <span class="btn btn-primary btn-sm fileinput-button" id="copiatitulocuartonivel" style="<?php echo $stylefotocopiacedula; ?>">
					              <i class="bi bi-plus"></i>
					              <span>AÑADIR ARCHIVO</span>
					              <input type="file" name="files[]" multiple />
					            </span>

				        
					        <!--
					            <button type="button" class="btn btn-danger btn-sm delete">
					              <i class="bi bi-trash"></i>
					              <span>ELIMINAR SELECCIONADOS</span>
					            </button>
					        -->
				            <!--<input type="checkbox" class="toggle" />
				             The global file processing state -->
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
			        <table role="presentation" class="table table-bordered" id="tabla-copiatitulocuartonivel" data-idp="<?php echo $id_postulacion ?>">
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
			          		if ($copiatitulocuartonivel) {
			          			echo "<tr><td>$copiatitulocuartonivel</td><td> <a href='$_urlApp/uploads/$copiatitulocuartonivel' target='_blank' class='btn-ver-archivo' data-archivo='$copiatitulocuartonivel'><i class='bi bi-eye text-success'></i></a> <a href='#!' data-id='$id_postulacion' data-archivo='$copiatitulocuartonivel' class='btn-eliminar-archivo' data-campo='copiatitulocuartonivel'><i class='bi bi-trash text-danger'></i></a> </td></tr>";
			          		}
			          	?>
			          </tbody>
			        </table>
			    </div>
			</form>
			<input type="hidden" class="requerido" name="copiatitulocuartonivel-req" id="copiatitulocuartonivel-req" value="<?php if($copiatitulocuartonivel){ echo "1"; } ?>">
			<span class="text-danger spanrequerido copiatitulocuartonivel-reqspan">Campo requerido</span>
		</div>
	</div>											

<!-- BECA -->
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
	
</div>