<!--begin: Wizard Step 1-->
<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
	<h4 class="mb-10 font-weight-bold text-dark">Datos académicos</h4>

	<!--
	TITULOS
	-->
	<div class="form-group">

		<div class="row">
			<div class="col-xl-12">
				<label class="text-dark"><strong>Estudios universitarios</strong></label>
					<div class="form-group">
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
									echo "<tr><td>$estudiostercernivel</td><td> <a href='$_urlApp/uploads/$estudiostercernivel' target='_blank' class='btn-ver-archivo' data-archivo='$estudiostercernivel'><i class='bi bi-eye text-success'></i></a> </td></tr>";
								}
							?>
						  </tbody>
						</table>
					</div>
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
				<div class="form-group">
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
								echo "<tr><td>$idiomas</td><td> <a href='$_urlApp/uploads/$idiomas' target='_blank' class='btn-ver-archivo' data-archivo='$idiomas'><i class='bi bi-eye text-success'></i></a></td></tr>";
							}
						?>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!--
	EXPERIENCIA INVESTIGATIVA
-->
<div class="pb-5" data-wizard-type="step-content">
	<h4 class="mb-10 font-weight-bold text-dark">Experiencia investigativa</h4>
	<div class="row">
		<div class="col-xl-12">
			<div class="form-group mt-15">
				<label>Publicaciones en revistas indexadas (opcional):</label><br>
				<div><?php echo "$publicacionesrevistas"; ?></div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xl-12">
			<div class="form-group mt-15">
				<label>Libros o capítulos de libros (opcional):</label><br>
				<div><?php echo "$libros"; ?></div>
			</div>
		</div>
	</div>
</div>

<!--
	CARTA DE MOTIVACIÓN 
-->
<div class="pb-0" data-wizard-type="step-content">
	<h4 class="mb-10 font-weight-bold text-dark">Carta de motivación</h4>
	<div class="row">

		<div class="col-xl-12">
			<div class="form-group">
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
		          			echo "<tr><td>$incentivopostulacion</td><td> <a href='$_urlApp/uploads/$incentivopostulacion' target='_blank' class='btn-ver-archivo' data-archivo='$incentivopostulacion'><i class='bi bi-eye text-success'></i></a> </td></tr>";
		          		}
		          	?>
		          </tbody>
		        </table>
		    </div>
		</div>
	</div>
</div>

<!--
	CARTA DE RECOMENDACION

<div class="pt-5 pb-5" data-wizard-type="step-content">
	<h4 class="mb-10 font-weight-bold text-dark">Carta de recomendación académica</h4>

	<div class="row">
		<div class="col-xl-12">
			<div class="form-group">
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
		          			echo "<tr><td>$cartarecomendacion</td><td> <a href='$_urlApp/uploads/$cartarecomendacion' target='_blank' class='btn-ver-archivo' data-archivo='$cartarecomendacion'><i class='bi bi-eye text-success'></i></a> </td></tr>";
		          		}
		          		*/
		          	?>
		          </tbody>
		        </table>
		    </div>
		</div>
	</div>
</div>
-->

<!--
	TRAYECTORIA LABORAL
-->										
<div class="mt-5" data-wizard-type="step-content">
	<h4 class="mb-10 font-weight-bold text-dark">Información laboral</h4>

	<div class="row">
		<div class="col-xl-12">
			<div class="form-group">
				<label>Institución que labora en la actualidad:</label><br>
				<p><?php echo "$institucion"; ?></p>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xl-6">
			<div class="form-group">
				<label>Cargo: </label><br>
				<p><?php echo "$cargoempresa"; ?></p>
			</div>
		</div>
		<div class="col-xl-6">
			<div class="form-group">
				<label style="margin-bottom: 10px;">Tipo de Institución: <span class="text-danger">*</span></label><br>
				
				<div class="form-check form-check-inline">	
				  <input class="form-check-input" type="radio" name="tipoinstitucion" id="tipoinstitucion1" value="publica" <?php if($tipoinstitucion == 'publica'){echo "checked";}else{ echo "disabled"; } ?> >
				  <label class="form-check-label" for="tipoinstitucion1" style="margin-top: 0">Pública</label>
				</div>
				
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="tipoinstitucion" id="tipoinstitucion2" value="privada" <?php if($tipoinstitucion == 'privada'){echo "checked";}else{ echo "disabled"; } ?> >
				  <label class="form-check-label" for="tipoinstitucion2" style="margin-top: 0">Privada</label>
				</div>

				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="tipoinstitucion" id="tipoinstitucion3" value="fiscomisional" <?php if($tipoinstitucion == 'fiscomisional'){echo "checked";}else{ echo "disabled"; } ?> >
				  <label class="form-check-label" for="tipoinstitucion3" style="margin-top: 0">Fiscomisional</label>
				</div>

				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="tipoinstitucion" id="tipoinstitucion4" value="municipal" <?php if($tipoinstitucion == 'municipal'){echo "checked";}else{ echo "disabled"; } ?> >
				  <label class="form-check-label" for="tipoinstitucion4" style="margin-top: 0">Municipal</label>
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
			<label class="text-dark">Tipo de nombramiento:</label> <br>
			<div class="form-group">
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="nombramiento" id="nombramiento1" value="definitivo" <?php if($nombramiento == 'definitivo'){echo "checked";}else{ echo "disabled"; } ?> >
				  <label class="form-check-label" for="nombramiento1" style="margin-top: 0">Nombramiento definitivo</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="nombramiento" id="nombramiento2" value="provisional" <?php if($nombramiento == 'provisional'){echo "checked";}else{ echo "disabled"; } ?> >
				  <label class="form-check-label" for="nombramiento2" style="margin-top: 0">Nombramiento provisional</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="nombramiento" id="nombramiento3" value="ocasional" <?php if($nombramiento == 'ocasional'){echo "checked";}else{ echo "disabled"; } ?> >
				  <label class="form-check-label" for="nombramiento3" style="margin-top: 0">Ocasional</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="nombramiento" id="nombramiento4" value="ocasional" <?php if($nombramiento == 'otros'){echo "checked";}else{ echo "disabled"; } ?> >
				  <label class="form-check-label" for="nombramiento4" style="margin-top: 0">Otro</label>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">

		<div class="col-xl-6">
			<div class="form-group">
				<label>Ciudad: </label> <br>
				<p><?php echo "$paisempresa"; ?></p>
			</div>
		</div>

		<div class="col-xl-6">
			<div class="form-group">
				<label>Provincia: </label> <br>
				<p><?php echo "$provinciaempresa"; ?></p>
			</div>
		</div>

	</div>
</div>

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