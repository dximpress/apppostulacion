<!--begin: Wizard Step 1-->
<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
	<h4 class="mb-10 font-weight-bold text-dark">Datos académicos</h4>

	<div class="form-group">
		<label>Estudios de tercer nivel:</label><br>
		<i class="bi bi-info-circle"></i> <span class="form-text text-muted" style="font-size: 14px !important;">Título, IES y registro de Senescyt. <br> Ej: Licenciada en Ciencias de la Educación, Instituto Central de Ciencias Pedagógicas, 1789-07-5648907.</span>
		<p><?php echo "$estudiostercernivel"; ?></p>
		
	</div>

	<div class="form-group mt-15">
		<label>Estudios de cuarto nivel (maestría):</label><br>
		<i class="bi bi-info-circle"></i> <span class="form-text text-muted" style="font-size: 14px !important;">Título, IES y registro de Senescyt.<br> Ej: Maestría en Educación Inicial, Instituto Central de Ciencias Pedagógicas, 1789-07-5648907.</span>
		<p><?php echo "$estudioscuartonivel"; ?></p>
	</div>

	<div class="form-group mt-15">
		<label>Idiomas:</label><br>
		<i class="bi bi-info-circle"></i> <span class="form-text text-muted" style="font-size: 14px !important;">Idioma, nivel de certificación, institución que otorga <br> Ej: Inglés, C1, Cambridge.</span>
		<p><?php echo "$idiomas"; ?></p>
	</div>
</div>
<!--end: Wizard Step 1-->

<!--begin: Wizard Step 2-->
<div class="pb-5" data-wizard-type="step-content">
	<h4 class="mb-10 font-weight-bold text-dark">Trayectoria laboral</h4>

	<div class="row">
		<div class="col-xl-12">
			<!--begin::Input-->
			<div class="form-group">
				<label>Institución que labora en la actualidad: </label>
				<p><?php echo "$institucion"; ?></p>
			</div>
			<!--end::Input-->
		</div>
	</div>

	<div class="row">
		<div class="col-xl-6">
			<!--begin::Input-->
			<div class="form-group">
				<label>Provincia: </label>
				<p><?php echo "$provinciaempresa"; ?></p>
			</div>
			<!--end::Input-->
		</div>

		<div class="col-xl-6">
			<!--begin::Input-->
			<div class="form-group">
				<label>Ciudad: </label>
				<p><?php echo "$paisempresa"; ?></p>
			</div>
			<!--end::Input-->
		</div>
	</div>
	<div class="row">

		<div class="col-xl-6">
			<div class="form-group">
				<label>Cargo: </label>
				<p><?php echo "$cargoempresa"; ?></p>
			</div>
		</div>

		<div class="col-xl-6">
			<div class="form-group">
				<label style="margin-bottom: 10px;">Tipo de Institución: </label><br>
				<div class="form-check form-check-inline">	
				  <input class="form-check-input" type="radio" name="tipoinstitucion" id="tipoinstitucion1" value="publica" <?php if($tipoinstitucion == 'publica'){echo "checked";} ?> disabled="disabled">
				  <label class="form-check-label" for="tipoinstitucion1" style="margin-top: 0">Pública</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="tipoinstitucion" id="tipoinstitucion2" value="privada" <?php if($tipoinstitucion == 'privada'){echo "checked";} ?> disabled="disabled">
				  <label class="form-check-label" for="tipoinstitucion2" style="margin-top: 0">Privada</label>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xl-3">
			<div class="form-group">
				<label>Años de trabajo:</label>
				<p><?php echo "$tiempotrabajo"; ?></p>
			</div>
		</div>

		<div class="col-xl-9" style="padding-top: 15px;">
			<label class="text-dark">Tipo de contrato:</label> <br>
			<div class="form-group">
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="nombramiento" id="nombramiento1" value="definitivo" <?php if($nombramiento == 'definitivo'){echo "checked";} ?> disabled="disabled">
				  <label class="form-check-label" for="nombramiento1" style="margin-top: 0">Nombramiento definitivo</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="nombramiento" id="nombramiento2" value="provisional" <?php if($nombramiento == 'provisional'){echo "checked";} ?> disabled="disabled">
				  <label class="form-check-label" for="nombramiento2" style="margin-top: 0">Nombramiento provisional</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="nombramiento" id="nombramiento3" value="ocasional" <?php if($nombramiento == 'ocasional'){echo "checked";} ?> disabled="disabled">
				  <label class="form-check-label" for="nombramiento3" style="margin-top: 0">Ocasional</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="nombramiento" id="nombramiento4" value="otros" <?php if($nombramiento == 'otros'){echo "checked";} ?> disabled="disabled">
				  <label class="form-check-label" for="nombramiento3" style="margin-top: 0">Otros</label>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xl-12">
			<div class="form-group mt-15">
				<label>Experiencia laboral:</label><br>
				<i class="bi bi-info-circle"></i> <span class="form-text text-muted" style="font-size: 14px !important;">Institución, cargo, fecha de ingreso y fecha de salida.<br>Ej: Instituto Central de Ciencias Pedagógicas, docente, 04/01/2020 - 13/01/2021.</span>
				<p><?php echo "$experienciadocencia"; ?></p>
			</div>
		</div>
	</div>	
</div>
<!--end: Wizard Step 2-->

<!--begin: Wizard Step 3-->
<div class="pb-5" data-wizard-type="step-content">
	<h4 class="mb-10 font-weight-bold text-dark">Experiencia investigativa</h4>

	<div class="row">
		<div class="col-xl-12">
			<div class="form-group mt-15">
				<label>Publicaciones en revistas indexadas:</label><br>
				<i class="bi bi-info-circle"></i> <span class="form-text text-muted" style="font-size: 14px !important;">Tema, año de publicación, medio y enlaces. <br> Ej: Volcanes Activos - Ecuador, 2013, digital, https://scholar.google.es/scholar?hl=es&as_sdt=0,33&cluster=8611067274227917906.</span>
				<p><?php echo "$publicacionesrevistas"; ?></p>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xl-12">
			<div class="form-group mt-15">
				<label>Libros o capítulos de libros:</label><br>
				<i class="bi bi-info-circle"></i> <span class="form-text text-muted" style="font-size: 14px !important;">Tema, editorial, año de publicación, ISBN. <br> Ej: Pedagogía del oprimido, Editorial Planeta, 2008, 978-3-16-148410-0. </span>
				<p><?php echo "$libros"; ?></p>
			</div>
		</div>
	</div>
</div>
<!--end: Wizard Step 3-->

<!--begin: Wizard Step 4-->
<div class="pb-5" data-wizard-type="step-content">
	<h4 class="mb-10 font-weight-bold text-dark">Motivación</h4>
	
	<?php 
		// $incentivopostulacion
	  $rest = substr($incentivopostulacion, 0, 1);
	?>

	<?php if($rest == '<'){ ?>
		
		<div class="row">
			<div class="col-xl-12">
				<div class="form-group mt-15">
					<label>¿Qué te incentiva a postular a este programa? </label>
					<p><?php echo "$incentivopostulacion"; ?></p>
				</div>
			</div>

			<div class="col-xl-12">
				<div class="form-group mt-15">
					<label>¿Cómo proyectas tu carrera profesional en los próximos años? </label>
					<p><?php echo "$carreraprofesional"; ?></p>
				</div>
			</div>

			<div class="col-xl-12">
				<div class="form-group mt-15">
					<label>En caso de ser aceptado en el programa, ¿cuál crees que sería el impacto en tu carrera? </label>
					<p><?php echo "$impactocarrera"; ?></p>
				</div>
			</div>
		</div>

  <?php }else{ ?>

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
  		if ($incentivopostulacion) {
  			echo "<tr><td>$incentivopostulacion</td><td> <a href='$_urlApp/uploads/$incentivopostulacion' target='_blank' class='btn-ver-archivo' data-archivo='999'><i class='bi bi-eye text-success'></i></a> </td></tr>";
  		}else{
  			echo "<tr><td>No se enviaron archivos</td></tr>";
  		}
  	?>
  </tbody>
</table>

  <?php } ?>

</div>
<!--end: Wizard Step 4-->

<!--begin: Wizard Step 5-->
<div class="pb-5" data-wizard-type="step-content">
	<h4 class="mb-10 font-weight-bold text-dark">Documentación</h4>

	<div class="row" style="display: none;">
		<div class="col-xl-12">
			<form id="hojadevida" class="fileupload" action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<div class="row fileupload-buttonbar">
			          <div class="col-lg-12">
			          	<label class="fs-14">
			          		1- Hoja de vida  <br>
			          	</label>

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
			          		<th style="border: 1px solid #cdcdcd;">Archivo</th>
			          		<!-- th style="border: 1px solid #cdcdcd;">Tamaño</th -->
			          		<th style="border: 1px solid #cdcdcd;">Acciones</th>
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

	<div class="row">
		<div class="col-xl-12">
			<form id="fotocopiacedula" class="fileupload" action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<div class="row fileupload-buttonbar">
			          <div class="col-lg-12">
			          	<div class="row">
			          		<div class="col-lg-12">
			          			<label class="fs-14">
					          		1 - Fotocopia de la cédula (ambos lados) o pasaporte (primera página donde se muestre la vigencia del mismo).  <br>
					          	</label>
					          	<input type="hidden" name="archivo[]" class="archivos required">
			          		</div>
			          	</div>
			          	
			          </div>
			          <div class="col-lg-12" style="display: none;">
			            <span class="fileupload-process"></span>
			          </div>
			          <!-- The global progress state -->
			          <div class="col-lg-7 fileupload-progress fade" style="margin-top: 5px; display: none;">
			            
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
			          			echo "<tr><td>$fotocopiacedula</td><td> <a href='$_urlApp/uploads/$fotocopiacedula' target='_blank' class='btn-ver-archivo' data-archivo='999'><i class='bi bi-eye text-success'></i></a> </td></tr>";
			          		}else{
			          			echo "<tr><td>No se enviaron archivos</td></tr>";
			          		}
			          	?>
			          </tbody>
			        </table>
			    </div>
			</form>
			<input type="hidden" class="requerido" name="fotocopiacedula-req" id="fotocopiacedula-req" value="<?php if($fotocopiacedula){ echo "1"; } ?>">
		</div>
	</div>

	<div class="row mt-40">
		<div class="col-xl-12">
			<form id="copiatitulo" class="fileupload" action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<div class="row fileupload-buttonbar">
			          <div class="col-lg-12">
			          	<div class="row">
			          		<div class="col-lg-12">
			          			<label class="fs-14">
					          		2- Copia de títulos de tercer nivel de grado universitario. <br>
					          	</label>
					          	<input type="hidden" name="archivo[]" class="archivos required">
			          		</div>

			          	</div>
			          	
			          </div>

			        </div>
			        <!-- The table listing the files available for upload/download -->
			        <table role="presentation" class="table table-bordered" id="tabla-titulo" data-idp="<?php echo $id_postulacion ?>">
			          <thead>
			          	<tr>
			          		<!-- th></th -->
			          		<th colspan="2" style="border: 1px solid #cdcdcd;">Archivo</th>
			          		
			          		<!-- th style="border: 1px solid #cdcdcd;">Acciones</th -->
			          	</tr>
			          </thead>
			          <tbody class="files">
			          	<?php 
			          	/*
			          		if ($copiatitulo == 'si') {
			          			//Consulto los archivos en la BD
			          			$SQLTitulos = " SELECT * FROM titulos WHERE id_postulacion = '$id_postulacion' AND tipo = 1";
										  $SQLconsultaTitulos = $conexionmysqli->query($SQLTitulos);
										  $SQLconsultaTitulos->data_seek(0);
										  $x=0;
										    while ($registro_Titulos = $SQLconsultaTitulos->fetch_assoc()) {
										    	
										    	$x++;
										    	$id_archivo = $registro_Titulos['id_titulo'];
										   		$archivo = $registro_Titulos['archivo'];

										   		echo "<tr><td>$archivo</td><td> <a href='$_urlApp/uploads/$archivo' target='_blank' class='btn-ver-archivo' data-archivo='$archivo'><i class='bi bi-eye text-success'></i></a> </td></tr>";

									    }
									    $SQLconsultaTitulos->close();
									  
			          		} 
			          	*/
			          	?>
			          	<?php 
			          		if ($copiatitulo) {
			          			echo "<tr><td>$copiatitulo</td><td> <a href='$_urlApp/uploads/$copiatitulo' target='_blank' class='btn-ver-archivo' data-archivo='999'><i class='bi bi-eye text-success'></i></a> </td></tr>";
			          		}else{
			          			echo "<tr><td>No se enviaron archivos</td></tr>";
			          		}
			          	?>
			          </tbody>
			        </table>
			    </div>
			</form>
			<input type="hidden" class="requerido" name="copiatitulo-req" id="copiatitulo-req" value="<?php if($copiatitulo){ echo "1"; }?> ">
		</div>
	</div>

	<div class="row mt-40">
		<div class="col-xl-12">
			<form id="copiatitulocuartonivel" class="fileupload" action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<div class="row fileupload-buttonbar">
			          <div class="col-lg-12">
			          	<div class="row">
			          		<div class="col-lg-12">
			          			<label class="fs-14">
					          		3- Copia de títulos de cuarto nivel de grado universitario. <br>
					          	</label>
			          		</div>

			          	</div>
			          	
			          </div>


			        </div>

			        <table role="presentation" class="table table-bordered" id="tabla-titulo" data-idp="<?php echo $id_postulacion ?>">
			          <thead>
			          	<tr>
			          		<th colspan="2" style="border: 1px solid #cdcdcd;">Archivo</th>
			          	</tr>
			          </thead>
			          <tbody class="files">
			          	<?php 
			          	/*
			          		if ($copiatitulocuartonivel == 'si') {
			          			//Consulto los archivos en la BD
			          			$SQLTitulos = " SELECT * FROM titulos WHERE id_postulacion = '$id_postulacion' AND tipo = 2";
										  $SQLconsultaTitulos = $conexionmysqli->query($SQLTitulos);
										  $SQLconsultaTitulos->data_seek(0);
										  $x=0;
										    while ($registro_Titulos = $SQLconsultaTitulos->fetch_assoc()) {
										    	
										    	$x++;
										    	$id_archivo = $registro_Titulos['id_titulo'];
										   		$archivo = $registro_Titulos['archivo'];

										   		echo "<tr><td>$archivo</td><td> <a href='$_urlApp/uploads/$archivo' target='_blank' class='btn-ver-archivo' data-archivo='$archivo'><i class='bi bi-eye text-success'></i></a> </td></tr>";

									    }
									    $SQLconsultaTitulos->close();
			          		}
			          	*/
			          	?>
			          	<?php 
			          		if ($copiatitulocuartonivel) {
			          			echo "<tr><td>$copiatitulocuartonivel</td><td> <a href='$_urlApp/uploads/$copiatitulocuartonivel' target='_blank' class='btn-ver-archivo' data-archivo='999'><i class='bi bi-eye text-success'></i></a> </td></tr>";
			          		}else{
			          			echo "<tr><td>No se enviaron archivos</td></tr>";
			          		}
			          	?>
			          </tbody>
			        </table>
			    </div>
			</form>
			<input type="hidden" class="requerido" name="copiatitulocuartonivel-req" id="copiatitulocuartonivel-req" value="<?php if($copiatitulocuartonivel){ echo "1"; }?> ">
		</div>
	</div>


<?php if ($id_programa == '2' || $id_programa == '3' || $id_programa == '4' || $id_programa == '5') { ?>
<!-- 
	CARTA DE RECOMENDACION
-->
<div class="pb-0" data-wizard-type="step-content" style="margin-top: 50px">
	<h4 class="mb-10 font-weight-bold text-dark">Carta de Recomendación</h4>

	<div class="row" style="margin-top: 25px">

					<div class="form-group">											        
				        <table role="presentation" class="table table-bordered" id="tabla-cartarecomendacion" data-idp="<?php echo $id_postulacion ?>">
				          <thead>
				          	<tr>
				          		<th colspan="2" style="border: 1px solid #cdcdcd;">Archivo</th>
				          	</tr>
				          </thead>
				          <tbody class="files">
				          	<?php 
				          		if ($cartarecomendacion) {
				          			echo "<tr><td>$cartarecomendacion</td><td> <a href='$_urlApp/uploads/$cartarecomendacion' target='_blank' class='btn-ver-archivo' data-archivo='$cartarecomendacion'><i class='bi bi-eye text-success'></i></a> </td></tr>";
				          		}else{
				          			echo "<tr><td>No se enviaron archivos</td></tr>";
				          		}
				          		
				          	?>
				          </tbody>
				        </table>
				    </div>
	</div>										
</div>
<?php } ?>

<?php if ($id_programa == '5') { ?><p>&nbsp;</p><?php } ?>
<!--
	BECA
-->
<div class="pb-0" data-wizard-type="step-content" style="margin-top: 50px">
	<h4 class="mb-10 font-weight-bold text-dark">Aplicación a beca </h4>
	<div class="row">
		
		<div class="col-xl-6">
			<ul class="list-group">
				<li class="list-group-item" style="display: <?php if($selecbeca == "1"){echo "block";}else{echo "none";} ?>" >Beca mujeres educadoras</li>
				<li class="list-group-item" style="display: <?php if($selecbeca == "2"){echo "block";}else{echo "none";} ?>" >Beca académica</li>
				<li class="list-group-item" style="display: <?php if($selecbeca == "3"){echo "block";}else{echo "none";} ?>" >Beca deportiva</li>
				<li class="list-group-item" style="display: <?php if($selecbeca == "4"){echo "block";}else{echo "none";} ?>" >Beca cultural</li>
				<li class="list-group-item" style="display: <?php if($selecbeca == "5"){echo "block";}else{echo "none";} ?>" >Beca de acción afirmativa</li>
			</ul>
		</div>

		<div class="row" style="margin-top: 25px">

			<form id="archivobeca" class="fileupload" action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">											        
			        <table role="presentation" class="table table-bordered" id="tabla-archivobeca" data-idp="<?php echo $id_postulacion ?>">
			          <thead>
			          	<tr>
			          		<th colspan="2" style="border: 1px solid #cdcdcd;">Archivo</th>
			          	</tr>
			          </thead>
			          <tbody class="files">
			          	<?php 
			          		if ($archivobeca) {
			          			echo "<tr><td>$archivobeca</td><td> <a href='$_urlApp/uploads/$archivobeca' target='_blank' class='btn-ver-archivo' data-archivo='$archivobeca'><i class='bi bi-eye text-success'></i></a> </td></tr>";
			          		}else{
			          			echo "<tr><td>No se enviaron archivos</td></tr>";
			          		}
			          	?>
			          </tbody>
			        </table>
			    </div>
			</form>
		</div>
	</div>
</div>

</div>
<!--end: Wizard Step 5-->	