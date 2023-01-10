<!DOCTYPE html>
<html lang="en">

<head>
  <!-- base href="landings/" -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Postulación doctorado - REP</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons Dixander REP Ecuatoriana de Pedagogia-->
  <link rel="shortcut icon" href="assets/media/logos/logo-rep-32x32.png" />
  <link href="landings/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  
  <link href="landings/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="landings/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="landings/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="landings/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Toastr -->
   <link href="assets/css/customs/toastr.min.css" rel="stylesheet" type="text/css" />


  <!--begin::Global Theme Styles(used by all pages)-->
	<!-- link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" / -->

	  <!-- Juery Confirm -->
  <link href="assets/css/customs/jquery-confirm.css" rel="stylesheet" type="text/css" />

  <!--begin::Page Custom Styles(used by this page)
  <link href="assets/css/pages/wizard/wizard-2.css" rel="stylesheet" type="text/css" />-->

  <!-- FileUploads CSS -->
	<!-- blueimp Gallery styles -->
	<link rel="stylesheet" href="fileupload/css/blueimp-gallery.min.css" />
	<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
	<link rel="stylesheet" href="fileupload/css/jquery.fileupload.css" />
	<link rel="stylesheet" href="fileupload/css/jquery.fileupload-ui.css" />
	<!-- CSS adjustments for browsers with JavaScript disabled -->
	<noscript><link rel="stylesheet" href="fileupload/css/jquery.fileupload-noscript.css"/></noscript>
	<noscript><link rel="stylesheet" href="fileupload/css/jquery.fileupload-ui-noscript.css"/></noscript>


	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />


	<!-- Template Main CSS File -->
  <link href="landings/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: SoftLand - v4.8.0
  * Template URL: https://bootstrapmade.com/softland-bootstrap-app-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style type="text/css">
  	.tox-statusbar__branding{
  		display: none;
  	}
  	.logo-unirep{
      width: 32%;
    }

    .logo-unirep-footer{
      width: 20%; 
    }

    .spanrequerido{
    	display: none;
    }

    .swal2-popup{
    	background-size: cover !important;
    	padding-bottom: 50px !important;
    }

    @media screen and (max-width: 992px){
      .logo-unirep{
        width: 65%;
        padding-top: 50px;
      }

      .logo-unirep-footer{
        width: 80%; 
      }

      .hero-section, .hero-section>.container>.row {
        height: 30vh;
        min-height: 230px;
      }

      .hero-section .hero-text-image {
        margin-top: -4rem;
        padding: 0 30px;
      }

      .wizard-body {
			  padding: 15px;
			}

			.hero-section h1 {
			  font-size: 1.5rem;
			  margin-bottom: 0px;
			}

			.img-fluid-formulario{
				width: 40%;
			}

    }
  </style>
</head>

<body>

	<?php
		#Inicio de documento
		include ('configuracion.php');

		$id_programa = isset($_GET["p"]) ? $_GET["p"] : '';
		$id_usuario = isset($_GET["u"]) ? $_GET["u"] : '';
		$version_form = 2;
		//	$id_programa = base64_decode($id_programa);

		//Consulto si ya ha postulado o esta postulando para un programa

		//Consulto los datos del programa
		$SQLProgramas = "SELECT p.id AS id, p.nombre AS nombre, p.estado AS estado FROM programas AS p WHERE p.id = '$id_programa' ";
	  $SQLconsultaProgramas = $conexionmysqli->query($SQLProgramas);
	  $SQLconsultaProgramas->data_seek(0);
	  $registro_Programas = $SQLconsultaProgramas->fetch_assoc();
	   	$id = $registro_Programas['id'];
	   	$nombre = $registro_Programas['nombre'];
	   	$estado = $registro_Programas['estado'];
	  $SQLconsultaProgramas->close();

	    //Consulto los datos del postulante
	  $SQLDatospostulante = "SELECT u.id_usuario AS idu, u.usua_nombre AS usuan, DATE_FORMAT(u.f_registro, '%d - %m - %Y') AS fregistro FROM usuarios AS u WHERE u.id_usuario = '$id_usuario' ";
	  $SQLconsultaDatospostulante = $conexionmysqli->query($SQLDatospostulante);
	  $SQLconsultaDatospostulante->data_seek(0);
	  $registro_Datospostulante = $SQLconsultaDatospostulante->fetch_assoc();
	   	$idu = $registro_Datospostulante['idu'];
	   	$usuan = $registro_Datospostulante['usuan'];
	   	$fregistro = $registro_Datospostulante['fregistro'];
	  $SQLconsultaDatospostulante->close();

    /*
    	Consulto si este usuario ya ha postulado o esta postulando por este programa,
    	en caso que este postulando continua donde se quedó, en caso que sea una nueva postulación
    	se crea un nuevo registro en la base de datos,
    	un usuario no puede postular más de una vez a un mismo programa.
    */

	  $SQLconsultaPostulacion = " SELECT * FROM postulaciones AS p WHERE p.id_usuario = '$id_usuario' AND p.id_programa = '$id_programa' ";
		$SQLconsultaPostulacion = $conexionmysqli->query($SQLconsultaPostulacion);
		$SQLconsultaPostulacion->data_seek(0);
		$existePostulacion = mysqli_num_rows($SQLconsultaPostulacion);

		if ($existePostulacion > 0)
		{
			// echo "Continuar con la postulación.";
			// Recupero todos los datos de la postulación
			$SQLRegPostulacion = " SELECT * FROM postulaciones WHERE id_usuario = '$id_usuario' AND id_programa = '$id_programa' ";
		  $SQLconsultaRegPostulacion = $conexionmysqli->query($SQLRegPostulacion);
		  $SQLconsultaRegPostulacion->data_seek(0);
		  $registro_RegPostulacion = $SQLconsultaRegPostulacion->fetch_assoc();

				$id_postulacion = $registro_RegPostulacion['id_postulacion']; // 1
				$id_usuario = $registro_RegPostulacion['id_usuario']; // 2
				$id_programa = $registro_RegPostulacion['id_programa']; // 3
				$estudioscuartonivel = $registro_RegPostulacion['estudioscuartonivel']; // 4
				$otrosestudioscuartonivel = $registro_RegPostulacion['otrosestudioscuartonivel']; // 5
				$estudiostercernivel = $registro_RegPostulacion['estudiostercernivel']; // 6
				$idiomas = $registro_RegPostulacion['idiomas']; // 7
				$institucion = $registro_RegPostulacion['institucion']; // 8
				$direccionempresa = $registro_RegPostulacion['direccionempresa']; // 9
				$provinciaempresa = $registro_RegPostulacion['provinciaempresa']; // 10
				$paisempresa = $registro_RegPostulacion['paisempresa']; // 11
				$telefonoempresa = $registro_RegPostulacion['telefonoempresa']; // 12
				$tipoinstitucion = $registro_RegPostulacion['tipoinstitucion']; // 13
				$cargoempresa = $registro_RegPostulacion['cargoempresa']; // 14
				$laborempresa = $registro_RegPostulacion['laborempresa']; // 15
				$tiempotrabajo = $registro_RegPostulacion['tiempotrabajo']; // 16
				$nombramiento = $registro_RegPostulacion['nombramiento']; // 17
				$capacitaciones = $registro_RegPostulacion['capacitaciones']; // 18
				$experienciadocencia = $registro_RegPostulacion['experienciadocencia']; // 19
				$publicacionesrevistas = $registro_RegPostulacion['publicacionesrevistas']; // 20
				$libros = $registro_RegPostulacion['libros']; // 21
				$participacioneventos = $registro_RegPostulacion['participacioneventos']; // 22
				$incentivopostulacion = $registro_RegPostulacion['incentivopostulacion']; // 23
				$carreraprofesional = $registro_RegPostulacion['carreraprofesional']; // 24
				$impactocarrera = $registro_RegPostulacion['impactocarrera']; // 25
				$hojadevida = $registro_RegPostulacion['hojadevida']; // 26
				$fotocopiacedula = $registro_RegPostulacion['fotocopiacedula']; // 27
				$copiatitulo = $registro_RegPostulacion['copiatitulo']; // 28
				$copiatitulocuartonivel = $registro_RegPostulacion['copiatitulocuartonivel']; // 29
				$selecbeca = $registro_RegPostulacion['selecbeca']; // 30
				$archivobeca = $registro_RegPostulacion['archivobeca']; // 31
				$cartarecomendacion = $registro_RegPostulacion['cartarecomendacion']; // 32
				$comonosconocio = $registro_RegPostulacion['comonosconocio']; // 33
				$identificador = $registro_RegPostulacion['identificador']; // 34
				$completado = $registro_RegPostulacion['completado']; // 35
				
				$aplicafinanciamiento = $registro_RegPostulacion['aplicafinanciamiento']; //36
				$f_aplicafinanciamiento = $registro_RegPostulacion['f_aplicafinanciamiento'];
				$f = new DateTime($f_aplicafinanciamiento);
				$ff_inicio = $f->format('d-m-Y H:i:s');
				$f_dia = date("w",strtotime($f_aplicafinanciamiento));

				if ($f_dia == '5') {//Viernes
					$f_finan = date('Y-m-d H:i:s', strtotime($f_aplicafinanciamiento. ' + 3 days'));
					$f = new DateTime($f_finan);
					$ff_fin = $f->format('d-m-Y H:i:s');
					$f_dia = date("w",strtotime($f_aplicafinanciamiento));
				}else if ($f_dia == '6') {//Sábado
					$f_finan = date('Y-m-d H:i:s', strtotime($f_aplicafinanciamiento. ' + 2 days'));
					$f = new DateTime($f_finan);
					$ff_fin = $f->format('d-m-Y H:i:s');
					$f_dia = date("w",strtotime($f_aplicafinanciamiento));
				}else{
					$f_finan = date('Y-m-d H:i:s', strtotime($f_aplicafinanciamiento. ' + 1 days'));
					$f = new DateTime($f_finan);
					$ff_fin = $f->format('d-m-Y H:i:s');
					$f_dia = date("w",strtotime($f_aplicafinanciamiento));
				}

				$aprobadofinrep = $registro_RegPostulacion['aprobadofinrep']; //37
				$fincedula = $registro_RegPostulacion['fincedula']; //38
				$finestadocivil = $registro_RegPostulacion['finestadocivil']; //39
				$fincedulaconyuge = $registro_RegPostulacion['fincedulaconyuge']; //40
				$findisolucionconyugal = $registro_RegPostulacion['findisolucionconyugal']; //41
				$finroldepago = $registro_RegPostulacion['finroldepago']; //42
				$finplanillaserbasico = $registro_RegPostulacion['finplanillaserbasico']; //43
				$finmatriculacarro = $registro_RegPostulacion['finmatriculacarro']; //44
				$finprediocasa = $registro_RegPostulacion['finprediocasa']; //45
				$finautorburocredito = $registro_RegPostulacion['finautorburocredito']; //46
				$fincartaceptacion = $registro_RegPostulacion['fincartaceptacion']; //47
				$fincalificacion = $registro_RegPostulacion['fincalificacion']; //48

				$fecha_postulacion = $registro_RegPostulacion['fecha_postulacion']; // 49
				$modificado_por = $registro_RegPostulacion['modificado_por']; // 50
				$fecha_ult_modificacion = $registro_RegPostulacion['fecha_ult_modificacion']; // 51
				$version_form = $registro_RegPostulacion['version_form']; // 52

		  $SQLconsultaRegPostulacion->close();
		}
			else
		{
			echo "Página formulario de financiamiento, revisar porque si sale este mensaje se entro directamente.";
		}
		/*
			Consulto si esta postulacion es con la nueva version, campo de la BD verion_form
			1 => Versión antigua
			2 => Nueva versión
		*/

		switch ($version_form) {
	    case 1:
	      $archivo_version = "formulario-maestria-archivo-version-uno.php";
	      break;
	    case 2:
	      $archivo_version = "formulario-maestria-archivo-version-dos.php";
	      break;
	    default:
	    	$archivo_version = "formulario-maestria-archivo-version-dos.php"; //En caso que en la BD no este definido la version, carga la version 2 por defecto
		}


		/*
			Consulto si este postulante ya aplico para financiamiento
			aplicafinanciamiento
		*/
		$SQLAplicoFinanciamiento = " SELECT * FROM postulaciones WHERE id_usuario = '$id_usuario' AND aplicafinanciamiento = 1";
		$SQLconsultaAplicoFinanciamiento = $conexionmysqli->query($SQLAplicoFinanciamiento);
		$SQLconsultaAplicoFinanciamiento->data_seek(0);
		$cantFinanciamiento = mysqli_num_rows($SQLconsultaAplicoFinanciamiento);
		$SQLconsultaAplicoFinanciamiento->close();

		/*
			En caso que ya aplico a financiamiento
			consulto a que programa fue que aplico
		*/
		$id_programa_aplico_financiamiento = 0;

		if ($cantFinanciamiento > 0) {
			$SQLProgramaFinancmiento = " SELECT id_programa FROM postulaciones WHERE id_usuario = '$id_usuario' AND aplicafinanciamiento = 1 ";
			$SQLconsultaProgramaFinancmiento = $conexionmysqli->query($SQLProgramaFinancmiento);
			$SQLconsultaProgramaFinancmiento->data_seek(0);
			$registro_ProgramaFinancmiento = $SQLconsultaProgramaFinancmiento->fetch_assoc();
			$id_programa_aplico_financiamiento = $registro_ProgramaFinancmiento['id_programa'];
		  $SQLconsultaProgramaFinancmiento->close();
	 	}

	?>

  <!-- ======= Hero Section ======= -->
  <section class="hero-section" id="hero">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 hero-text-image">
          <div class="row">
            <div class="col-lg-12 text-center">
              <img src="assets/media/logos/Logo-rep-blanco.png" alt="Image" class="logo-unirep" class="phone-1" data-aos="fade-right">
              <h1 data-aos="fade-right" style="color: #FFFFFF;"><?php echo $nombre; ?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <main id="main">

    <!-- ======= Home Section ======= -->
    <section class="section" style="padding-top: 2.5rem !important">
      <div class="container">

        <div class="row justify-content-center text-center mb-5" id="comenzar">
          <div class="col-md-12" data-aos="fade-down">
            <h2  style="color: #0A57A3;">Formulario para solicitud de Crédito Educativo</h2>
            <span class="text-danger">* <span class="text-dark">Campos obligatorios.</span></span>
          
            <div class="alert alert-primary" style="margin-top: 25px; padding-top: 25px;">
            	<p>Estimado postulante, te informamos que aplicaste al Crédito Educativo el <?php echo "$ff_inicio"; ?> y tienes hasta el <?php echo"$ff_fin"; ?> para subir tu número de cédula y el buró de crédito para poder continuar con el proceso de aprobación del Crédito Educativo.</p><br>
            	<p>Día de la semana que aplicó: <?php echo"$f_dia"; ?></p>
            </div>

            <?php if($f_finan <= $fechaCompleta){ ?>
            	<div class="alert alert-danger" style="margin-top: 25px; padding-top: 25px;">
	            	<p>Su límte de tiempo ha finalizado, si desea ampliar el período comuniquese con un asesor de admisiones.</p>
	            </div>
            <?php } ?>
          
            
            <input type="hidden" name="p" id="p" value="<?php echo $id_programa; ?>"> <!-- id del programa -->
            <input type="hidden" name="c" id="c" value="<?php echo $id_usuario; ?>"> <!-- id del usuario postulante -->
            <input type="hidden" name="i" id="i" value="<?php echo $id_postulacion; ?>"> <!-- id de la postulación -->
          </div>
        </div>

      </div>

    <!--begin::Container-->
		<div class="container">
			<div class="card card-custom">
				<div class="card-body p-0">
					<?php if($f_finan > $fechaCompleta){ ?>
						<!--begin: Wizard-->
						<div class="" id="kt_wizard_fomrulario_postulacion" data-wizard-state="step-first" data-wizard-clickable="false">
							<!--begin: Wizard Body-->
							<div class="wizard-body py-8 px-8 py-lg-20 px-lg-10">
								<!--begin: Wizard Form-->
								<div class="row">
									<div class="offset-xxl-1 col-xxl-10">
										
										<form id="kt_form" class="form"></form>
											
											<!--
											FINANCIAMIENTO
											-->
											<?php if($cantFinanciamiento == 0 || $id_programa_aplico_financiamiento == $id_programa){ ?>
												<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
													<h4 class="mb-10 font-weight-bold text-dark titulo-secc">Crédito Educativo.</h4>
												
												<!--	
													<br>
													<p class="text-dark">Puedes aplicar a un crédito educativo con EDUCADORES Cooperativa. Selecciona la opción de tu interés.</p>

													<select name="aplicafinanciamiento" id="aplicafinanciamiento" class="form-control custom-select">
														<option value="">Seleccione</option>
														<option value="1" <?php // if($aplicafinanciamiento == 1){echo "selected";} ?> >Si</option>
														<option value="2" <?php // if($aplicafinanciamiento == 2){echo "selected";} ?> >No</option>
													</select>
												-->
													
													<?php 
														$display = "display: none";
														$req = "";
														
														if ($aplicafinanciamiento == 1) {
															$display = "display: block";
															$req = "requerido";
														}else{
															$display = "display: none";
															$req = "";
														}
													?>

													<div id="contenedorfinanciamiento" style="<?php echo $display; ?>">
														<!--
														CEDULA PERSONAL, CEDULA CONYUGE, DISOLUCION CONYUGAL
														-->
															<div class="form-group">
																
																<!-- CEDULA PERSONAL -->
																<div class="row">
																	<div class="col-xl-12">
																		<label class="text-dark"><strong>Cédula.</strong></label>
																		<form id="fincedula" class="fileupload" action="" method="POST" enctype="multipart/form-data">
																			<div class="form-group">
																				<div class="row fileupload-buttonbar">
																				  <div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-7">
																							<label class="fs-14">
																								Cargar en un documento una copia de tu cédula de identidad (Última expedida). <span class="text-danger">*</span> <br>
																							</label>

																							<p class="text-muted mt-3">
																								Archivos permitidos: jpeg, png, pdf. <br>
																								Tamaño máximo de cada archivo: 3 MB.
																							</p>

																							<input type="hidden" name="archivo[]" class="archivos required">
																						</div>
																						<div class="col-lg-5 text-center">
																							<img src="landings/assets/img/cedula-icono.png" class="img-fluid-formulario">
																						</div>
																					</div>
																					
																				  </div>
																				  <div class="col-lg-12 pt-4">
																						<?php 
																						  $stylefincedula = 0;
																							if($fincedula == ''){
																								$stylefincedula = "display: initial";
																							}else{
																								$stylefincedula = "display: none";
																							}; 
																						?>
																							<span class="btn btn-primary btn-sm fileinput-button" id="fincedula" style="<?php echo $stylefincedula; ?>">
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

																				<table role="presentation" class="table table-bordered" id="tabla-fincedula" data-idp="<?php echo $id_postulacion ?>">
																				  <thead>
																					<tr>
																						<!-- th></th -->
																						<th colspan="2" style="border: 1px solid #cdcdcd;">Archivo</th>
																					</tr>
																				  </thead>
																				  <tbody class="files">
																					<?php 
																						if ($fincedula) {
																							echo "<tr><td>$fincedula</td><td> <a href='$_urlApp/uploads/$fincedula' target='_blank' class='btn-ver-archivo' data-archivo='$fincedula'><i class='bi bi-eye text-success'></i></a> <a href='#!' data-id='$id_postulacion' data-archivo='$fincedula' class='btn-eliminar-archivo' data-campo='fincedula'><i class='bi bi-trash text-danger'></i></a> </td></tr>";
																						}
																					?>
																				  </tbody>
																				</table>
																			</div>
																		</form>
																		<input type="hidden" class="<?php echo "$req"; ?>" name="fincedula-req" id="fincedula-req" value="<?php if($fincedula){ echo "1"; } ?>">
																		<span class="text-danger spanrequerido fincedula-reqspan">Campo requerido</span>
																	</div>
																</div>

																<!-- ESTADO CIVIL -->
																<div class="row">
																	<div class="col-xl-12">
																		<label class="text-dark"><strong>Estado civil.</strong></label>
																		<select name="finestadocivil" id="finestadocivil" class="form-control custom-select">
																			<option value="">Seleccione</option>
																			<option value="1" <?php if($finestadocivil == "1"){echo "selected";} ?>>Soltero/a</option>
																			<option value="2" <?php if($finestadocivil == "2"){echo "selected";} ?>>Casado/a</option>
																			<option value="3" <?php if($finestadocivil == "3"){echo "selected";} ?>>Unión de hecho</option>
																			<option value="4" <?php if($finestadocivil == "4"){echo "selected";} ?>>Divorciado/a</option>
																			<option value="5" <?php if($finestadocivil == "5"){echo "selected";} ?>>Viudo/a</option>
																		</select>
																	</div>
																	
																	<?php

																		$reqcedulaconyuge = 0;
																		$spanreqcedulaconyuge = 0;

																		if($finestadocivil == 2) {
																			$reqcedulaconyuge = "requerido";
																			$reqdisolucionconyugal = "";
																		}else if($finestadocivil == 4){
																			$reqcedulaconyuge = "";
																			$reqdisolucionconyugal = "requerido";
																		}else{
																			$reqcedulaconyuge = "";
																			$reqdisolucionconyugal = "";
																		}

																	?>

																</div>

																<!-- CEDULA CONYUGE -->
																<div class="row">
																	<div class="col-xl-12">
																		<label class="text-dark"><strong>Cédula cónyuge.</strong></label>
																		<form id="fincedulaconyuge" class="fileupload" action="" method="POST" enctype="multipart/form-data">
																			<div class="form-group">
																				<div class="row fileupload-buttonbar">
																				  <div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-7">
																							<label class="fs-14">
																								Cargar en un documento una copia de tu cédula de identidad de tu cónyuge (Última expedida). <br>
																							</label>

																							<p class="text-muted mt-3">
																								Archivos permitidos: jpeg, png, pdf. <br>
																								Tamaño máximo de cada archivo: 3 MB.
																							</p>

																							<input type="hidden" name="archivo[]" class="archivos required">
																						</div>
																						<div class="col-lg-5 text-center">
																							<img src="landings/assets/img/cedula-icono.png" class="img-fluid-formulario">
																						</div>
																					</div>
																					
																				  </div>
																				  <div class="col-lg-12 pt-4">
																						<?php 
																						  $stylefincedulaconyuge = 0;
																							if($fincedulaconyuge == ''){
																								$stylefincedulaconyuge = "display: initial";
																							}else{
																								$stylefincedulaconyuge = "display: none";
																							}; 
																						?>
																							<span class="btn btn-primary btn-sm fileinput-button" id="fincedulaconyuge" style="<?php echo $stylefincedulaconyuge; ?>">
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

																				<table role="presentation" class="table table-bordered" id="tabla-fincedulaconyuge" data-idp="<?php echo $id_postulacion ?>">
																				  <thead>
																					<tr>
																						<!-- th></th -->
																						<th colspan="2" style="border: 1px solid #cdcdcd;">Archivo</th>
																					</tr>
																				  </thead>
																				  <tbody class="files">
																					<?php 
																						if ($fincedulaconyuge) {
																							echo "<tr><td>$fincedulaconyuge</td><td> <a href='$_urlApp/uploads/$fincedulaconyuge' target='_blank' class='btn-ver-archivo' data-archivo='$fincedulaconyuge'><i class='bi bi-eye text-success'></i></a> <a href='#!' data-id='$id_postulacion' data-archivo='$fincedulaconyuge' class='btn-eliminar-archivo' data-campo='fincedulaconyuge'><i class='bi bi-trash text-danger'></i></a> </td></tr>";
																						}
																					?>
																				  </tbody>
																				</table>
																			</div>
																		</form>
																		<input type="hidden" class="<?php echo"$reqcedulaconyuge"; ?>" name="fincedulaconyuge-req" id="fincedulaconyuge-req" value="<?php if($fincedulaconyuge){ echo "1"; } ?>">
																		<span class="text-danger spanrequerido fincedulaconyuge-reqspan">Campo requerido</span>
																	</div>
																</div>

																<!-- DISOLUCION CONYUGAL -->
																<div class="row">
																	<div class="col-xl-12">
																		<label class="text-dark"><strong>Disolución conyugal.</strong></label>
																		<form id="findisolucionconyugal" class="fileupload" action="" method="POST" enctype="multipart/form-data">
																			<div class="form-group">
																				<div class="row fileupload-buttonbar">
																				  <div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-7">
																							<label class="fs-14">
																								Cargar en un documento una copia de la disolución conyugal.<br>
																							</label>

																							<p class="text-muted mt-3">
																								Archivos permitidos: jpeg, png, pdf. <br>
																								Tamaño máximo de cada archivo: 3 MB.
																							</p>

																							<input type="hidden" name="archivo[]" class="archivos required">
																						</div>
																						<div class="col-lg-5 text-center">
																							<img src="landings/assets/img/disolucion-conyugal-icono.png" class="img-fluid-formulario">
																						</div>
																					</div>
																					
																				  </div>
																				  <div class="col-lg-12 pt-4">
																						<?php 
																						  $stylefindisolucionconyugal = 0;
																							if($findisolucionconyugal == ''){
																								$stylefindisolucionconyugal = "display: initial";
																							}else{
																								$stylefindisolucionconyugal = "display: none";
																							}; 
																						?>
																							<span class="btn btn-primary btn-sm fileinput-button" id="findisolucionconyugal" style="<?php echo $stylefindisolucionconyugal; ?>">
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

																				<table role="presentation" class="table table-bordered" id="tabla-findisolucionconyugal" data-idp="<?php echo $id_postulacion ?>">
																				  <thead>
																					<tr>
																						<!-- th></th -->
																						<th colspan="2" style="border: 1px solid #cdcdcd;">Archivo</th>
																					</tr>
																				  </thead>
																				  <tbody class="files">
																					<?php 
																						if ($findisolucionconyugal) {
																							echo "<tr><td>$findisolucionconyugal</td><td> <a href='$_urlApp/uploads/$findisolucionconyugal' target='_blank' class='btn-ver-archivo' data-archivo='$findisolucionconyugal'><i class='bi bi-eye text-success'></i></a> <a href='#!' data-id='$id_postulacion' data-archivo='$findisolucionconyugal' class='btn-eliminar-archivo' data-campo='findisolucionconyugal'><i class='bi bi-trash text-danger'></i></a> </td></tr>";
																						}
																					?>
																				  </tbody>
																				</table>
																			</div>
																		</form>
																		<input type="hidden" class="<?php echo "$reqdisolucionconyugal"; ?>" name="findisolucionconyugal-req" id="findisolucionconyugal-req" value="<?php if($findisolucionconyugal){ echo "1"; } ?>">
																		<span class="text-danger spanrequerido findisolucionconyugal-reqspan">Campo requerido</span>
																	</div>
																</div>									
															</div>

														<!--
														ROL DE PAGOS
														-->
															<div class="form-group">
																<div class="row">
																	<div class="col-xl-12">
																		<label class="text-dark"><strong>Rol de pagos.</strong></label>
																		<form id="finroldepago" class="fileupload" action="" method="POST" enctype="multipart/form-data">
																			<div class="form-group">
																				<div class="row fileupload-buttonbar">
																				  <div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-7">
																							<label class="fs-14">
																								Cargar en un documento una copia de tu último rol de pagos. <span class="text-danger">*</span> <br>
																							</label>

																							<p class="text-muted mt-3">
																								Archivos permitidos: jpeg, png, pdf. <br>
																								Tamaño máximo de cada archivo: 3 MB.
																							</p>

																							<input type="hidden" name="archivo[]" class="archivos required">
																						</div>
																						<div class="col-lg-5 text-center">
																							<img src="landings/assets/img/rol-de pagos-icono.png" class="img-fluid-formulario">
																						</div>
																					</div>
																					
																				  </div>
																				  <div class="col-lg-12 pt-4">
																						<?php 
																						  $stylefinroldepago = 0;
																							if($finroldepago == ''){
																								$stylefinroldepago = "display: initial";
																							}else{
																								$stylefinroldepago = "display: none";
																							}; 
																						?>
																							<span class="btn btn-primary btn-sm fileinput-button" id="finroldepago" style="<?php echo $stylefinroldepago; ?>">
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

																				<table role="presentation" class="table table-bordered" id="tabla-finroldepago" data-idp="<?php echo $id_postulacion ?>">
																				  <thead>
																					<tr>
																						<!-- th></th -->
																						<th colspan="2" style="border: 1px solid #cdcdcd;">Archivo</th>
																					</tr>
																				  </thead>
																				  <tbody class="files">
																					<?php 
																						if ($finroldepago) {
																							echo "<tr><td>$finroldepago</td><td> <a href='$_urlApp/uploads/$finroldepago' target='_blank' class='btn-ver-archivo' data-archivo='$finroldepago'><i class='bi bi-eye text-success'></i></a> <a href='#!' data-id='$id_postulacion' data-archivo='$finroldepago' class='btn-eliminar-archivo' data-campo='finroldepago'><i class='bi bi-trash text-danger'></i></a> </td></tr>";
																						}
																					?>
																				  </tbody>
																				</table>
																			</div>
																		</form>
																		<input type="hidden" class="<?php echo "$req"; ?>" name="finroldepago-req" id="finroldepago-req" value="<?php if($finroldepago){ echo "1"; } ?>">
																		<span class="text-danger spanrequerido finroldepago-reqspan">Campo requerido</span>
																	</div>
																</div>
															</div>

														<!--
														PLANILLA SERVICIO BASICO
														-->
															<div class="form-group">
																<div class="row">
																	<div class="col-xl-12">
																		<label class="text-dark"><strong>Planilla de servicio básico.</strong></label>
																		<form id="finplanillaserbasico" class="fileupload" action="" method="POST" enctype="multipart/form-data">
																			<div class="form-group">
																				<div class="row fileupload-buttonbar">
																				  <div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-7">
																							<label class="fs-14">
																								Cargar en un documento una copia de una planilla de servicio básico. <span class="text-danger">*</span> <br>
																							</label>

																							<p class="text-muted mt-3">
																								Archivos permitidos: jpeg, png, pdf. <br>
																								Tamaño máximo de cada archivo: 3 MB.
																							</p>

																							<input type="hidden" name="archivo[]" class="archivos required">
																						</div>
																						<div class="col-lg-5 text-center">
																							<img src="landings/assets/img/planilla-servicios-basicos-icono.png" class="img-fluid-formulario">
																						</div>
																					</div>
																					
																				  </div>
																				  <div class="col-lg-12 pt-4">
																						<?php 
																						  $stylefinplanillaserbasico = 0;
																							if($finplanillaserbasico == ''){
																								$stylefinplanillaserbasico = "display: initial";
																							}else{
																								$stylefinplanillaserbasico = "display: none";
																							}; 
																						?>
																							<span class="btn btn-primary btn-sm fileinput-button" id="finplanillaserbasico" style="<?php echo $stylefinplanillaserbasico; ?>">
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

																				<table role="presentation" class="table table-bordered" id="tabla-finplanillaserbasico " data-idp="<?php echo $id_postulacion ?>">
																				  <thead>
																					<tr>
																						<!-- th></th -->
																						<th colspan="2" style="border: 1px solid #cdcdcd;">Archivo</th>
																					</tr>
																				  </thead>
																				  <tbody class="files">
																					<?php 
																						if ($finplanillaserbasico) {
																							echo "<tr><td>$finplanillaserbasico</td><td> <a href='$_urlApp/uploads/$finplanillaserbasico' target='_blank' class='btn-ver-archivo' data-archivo='$finplanillaserbasico'><i class='bi bi-eye text-success'></i></a> <a href='#!' data-id='$id_postulacion' data-archivo='$finplanillaserbasico' class='btn-eliminar-archivo' data-campo='finplanillaserbasico'><i class='bi bi-trash text-danger'></i></a> </td></tr>";
																						}
																					?>
																				  </tbody>
																				</table>
																			</div>
																		</form>
																		<input type="hidden" class="<?php echo "$req"; ?>" name="finplanillaserbasico-req" id="finplanillaserbasico-req" value="<?php if($finplanillaserbasico){ echo "1"; } ?>">
																		<span class="text-danger spanrequerido finplanillaserbasico-reqspan">Campo requerido</span>
																	</div>
																</div>
															</div>

														<!--
														MATRICULA CARRO
														-->
															<div class="form-group mt-15">

																<div class="row">
																	<div class="col-xl-12">
																		<label class="text-dark"><strong>Matrícula carro.</strong></label>
																		<form id="finmatriculacarro" class="fileupload" action="" method="POST" enctype="multipart/form-data">
																			<div class="form-group">
																				<div class="row fileupload-buttonbar">
																				  <div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-7">
																							<label class="fs-14">
																								Cargar en un documento la matrícula del carro (opcional): <br>
																							</label>

																							<p class="text-muted mt-3">
																								Archivos permitidos: jpeg, png, pdf. <br>
																								Tamaño máximo de cada archivo: 3 MB.
																							</p>

																							<input type="hidden" name="archivo[]" class="archivos required">
																						</div>
																						<div class="col-lg-5 text-center">
																							<img src="landings/assets/img/matriicula-auto-icono.png" class="img-fluid-formulario">
																						</div>
																					</div>
																					
																				  </div>
																				  <div class="col-lg-12 pt-4">
																						<?php 
																						  $stylefinmatriculacarro = 0;
																							if($finmatriculacarro == ''){
																								$stylefinmatriculacarro = "display: initial";
																							}else{
																								$stylefinmatriculacarro = "display: none";
																							}; 
																						?>
																							<span class="btn btn-primary btn-sm fileinput-button" id="finmatriculacarro" style="<?php echo $stylefinmatriculacarro; ?>">
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

																				<table role="presentation" class="table table-bordered" id="tabla-finmatriculacarro" data-idp="<?php echo $id_postulacion ?>">
																				  <thead>
																					<tr>
																						<!-- th></th -->
																						<th colspan="2" style="border: 1px solid #cdcdcd;">Archivo</th>
																					</tr>
																				  </thead>
																				  <tbody class="files">
																					<?php 
																						if ($finmatriculacarro) {
																							echo "<tr><td>$finmatriculacarro</td><td> <a href='$_urlApp/uploads/$finmatriculacarro' target='_blank' class='btn-ver-archivo' data-archivo='$finmatriculacarro'><i class='bi bi-eye text-success'></i></a> <a href='#!' data-id='$id_postulacion' data-archivo='$finmatriculacarro' class='btn-eliminar-archivo' data-campo='finmatriculacarro'><i class='bi bi-trash text-danger'></i></a> </td></tr>";
																						}
																					?>
																				  </tbody>
																				</table>
																			</div>
																		</form>
																		<input type="hidden" class="" name="finmatriculacarro-req" id="finmatriculacarro-req" value="<?php if($idiomas){ echo "1"; } ?>">
																		<span class="text-danger spanrequerido finmatriculacarro-reqspan">Campo requerido</span>
																	</div>
																</div>
															</div>

														<!--
														PREDIO CASA
														-->
															<div class="form-group mt-15">

																<div class="row">
																	<div class="col-xl-12">
																		<label class="text-dark"><strong>Predio casa.</strong></label>
																		<form id="finprediocasa" class="fileupload" action="" method="POST" enctype="multipart/form-data">
																			<div class="form-group">
																				<div class="row fileupload-buttonbar">
																				  <div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-7">
																							<label class="fs-14">
																								Cargar en un documento el pago del impuesto predial (opcional). <br>
																							</label>

																							<p class="text-muted mt-3">
																								Archivos permitidos: jpeg, png, pdf. <br>
																								Tamaño máximo de cada archivo: 3 MB.
																							</p>

																							<input type="hidden" name="archivo[]" class="archivos required">
																						</div>
																						<div class="col-lg-5 text-center">
																							<img src="landings/assets/img/predio-icono.png" class="img-fluid-formulario">
																						</div>
																					</div>
																					
																				  </div>
																				  <div class="col-lg-12 pt-4">
																						<?php 
																						  $stylefinprediocasa = 0;
																							if($finprediocasa == ''){
																								$stylefinprediocasa = "display: initial";
																							}else{
																								$stylefinprediocasa = "display: none";
																							}; 
																						?>
																							<span class="btn btn-primary btn-sm fileinput-button" id="finprediocasa" style="<?php echo $stylefinprediocasa; ?>">
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

																				<table role="presentation" class="table table-bordered" id="tabla-finprediocasa" data-idp="<?php echo $id_postulacion ?>">
																				  <thead>
																					<tr>
																						<!-- th></th -->
																						<th colspan="2" style="border: 1px solid #cdcdcd;">Archivo</th>
																					</tr>
																				  </thead>
																				  <tbody class="files">
																					<?php 
																						if ($finprediocasa) {
																							echo "<tr><td>$finprediocasa</td><td> <a href='$_urlApp/uploads/$finprediocasa' target='_blank' class='btn-ver-archivo' data-archivo='$finprediocasa'><i class='bi bi-eye text-success'></i></a> <a href='#!' data-id='$id_postulacion' data-archivo='$finprediocasa' class='btn-eliminar-archivo' data-campo='finprediocasa'><i class='bi bi-trash text-danger'></i></a> </td></tr>";
																						}
																					?>
																				  </tbody>
																				</table>
																			</div>
																		</form>
																		<input type="hidden" class="" name="finprediocasa-req" id="finprediocasa-req" value="<?php if($idiomas){ echo "1"; } ?>">
																		<span class="text-danger spanrequerido finprediocasa-reqspan">Campo requerido</span>
																	</div>
																</div> 
															</div>

														<!--
														AUTORIZACION REVISION DE BURO DE CREDITO
														-->
															<div class="form-group">
																<div class="row">
																	<div class="col-xl-12">
																		<label class="text-dark"><strong>Autorización de revisión de buro de crédito.</strong></label>
																		<form id="finautorburocredito" class="fileupload" action="" method="POST" enctype="multipart/form-data">
																			<div class="form-group">
																				<div class="row fileupload-buttonbar">
																				  <div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-7">
																							<label class="fs-14">
																								Cargar en un documento la autorización de revisión de buro de crédito. <span class="text-danger">*</span> <br>
																							</label>

																							<p class="text-muted mt-3">
																								Archivos permitidos: jpeg, png, pdf. <br>
																								Tamaño máximo de cada archivo: 3 MB.
																							</p>

																							<input type="hidden" name="archivo[]" class="archivos required">
																						</div>
																						<div class="col-lg-5 text-center">
																							<img src="landings/assets/img/buro-crediticio-icono.png" class="img-fluid-formulario">
																						</div>
																					</div>
																					
																				  </div>
																				  <div class="col-lg-12 pt-4">
																						<?php 
																						  $stylefinautorburocredito = 0;
																							if($finautorburocredito == ''){
																								$stylefinautorburocredito = "display: initial";
																							}else{
																								$stylefinautorburocredito = "display: none";
																							}; 
																						?>
																							<span class="btn btn-primary btn-sm fileinput-button" id="finautorburocredito" style="<?php echo $stylefinautorburocredito; ?>">
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

																				<table role="presentation" class="table table-bordered" id="tabla-finautorburocredito " data-idp="<?php echo $id_postulacion ?>">
																				  <thead>
																					<tr>
																						<!-- th></th -->
																						<th colspan="2" style="border: 1px solid #cdcdcd;">Archivo</th>
																					</tr>
																				  </thead>
																				  <tbody class="files">
																					<?php 
																						if ($finautorburocredito) {
																							echo "<tr><td>$finautorburocredito</td><td> <a href='$_urlApp/uploads/$finautorburocredito' target='_blank' class='btn-ver-archivo' data-archivo='$finautorburocredito'><i class='bi bi-eye text-success'></i></a> <a href='#!' data-id='$id_postulacion' data-archivo='$finautorburocredito' class='btn-eliminar-archivo' data-campo='finautorburocredito'><i class='bi bi-trash text-danger'></i></a> </td></tr>";
																						}
																					?>
																				  </tbody>
																				</table>
																			</div>
																		</form>
																		<input type="hidden" class="<?php echo "$req"; ?>" name="finautorburocredito-req" id="finautorburocredito-req" value="<?php if($finautorburocredito){ echo "1"; } ?>">
																		<span class="text-danger spanrequerido finautorburocredito-reqspan">Campo requerido</span>
																	</div>
																</div>
															</div>

														<!--
														CARTA DE ACEPTACION
														-->
															<div class="form-group mt-15">

																<div class="row">
																	<div class="col-xl-12">
																		<label class="text-dark"><strong>Carta de aceptación.</strong></label>
																		<form id="fincartaceptacion" class="fileupload" action="" method="POST" enctype="multipart/form-data">
																			<div class="form-group">
																				<div class="row fileupload-buttonbar">
																				  <div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-7">
																							<label class="fs-14">
																								Cargar en un documento una carta de aceptación (opcional). <br>
																							</label>

																							<p class="text-muted mt-3">
																								Archivos permitidos: jpeg, png, pdf. <br>
																								Tamaño máximo de cada archivo: 3 MB.
																							</p>

																							<input type="hidden" name="archivo[]" class="archivos required">
																						</div>
																						<div class="col-lg-5 text-center">
																							<img src="landings/assets/img/carta-aceptacion-icono.png" class="img-fluid-formulario">
																						</div>
																					</div>
																					
																				  </div>
																				  <div class="col-lg-12 pt-4">
																						<?php 
																						  $stylefincartaceptacion = 0;
																							if($fincartaceptacion == ''){
																								$stylefincartaceptacion = "display: initial";
																							}else{
																								$stylefincartaceptacion = "display: none";
																							}; 
																						?>
																							<span class="btn btn-primary btn-sm fileinput-button" id="fincartaceptacion" style="<?php echo $stylefincartaceptacion; ?>">
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

																				<table role="presentation" class="table table-bordered" id="tabla-fincartaceptacion" data-idp="<?php echo $id_postulacion ?>">
																				  <thead>
																					<tr>
																						<!-- th></th -->
																						<th colspan="2" style="border: 1px solid #cdcdcd;">Archivo</th>
																					</tr>
																				  </thead>
																				  <tbody class="files">
																					<?php 
																						if ($fincartaceptacion) {
																							echo "<tr><td>$fincartaceptacion</td><td> <a href='$_urlApp/uploads/$fincartaceptacion' target='_blank' class='btn-ver-archivo' data-archivo='$fincartaceptacion'><i class='bi bi-eye text-success'></i></a> <a href='#!' data-id='$id_postulacion' data-archivo='$fincartaceptacion' class='btn-eliminar-archivo' data-campo='fincartaceptacion'><i class='bi bi-trash text-danger'></i></a> </td></tr>";
																						}
																					?>
																				  </tbody>
																				</table>
																			</div>
																		</form>
																		<input type="hidden" class="" name="fincartaceptacion-req" id="fincartaceptacion-req" value="<?php if($idiomas){ echo "1"; } ?>">
																		<span class="text-danger spanrequerido fincartaceptacion-reqspan">Campo requerido</span>
																	</div>
																</div> 
															</div>
													</div>

												</div>
											<?php } ?>

											<div class="d-flex justify-content-between border-top mt-5 pt-10" style="padding-top: 25px">
												<div>
													<button type="button" id="enviar" class="btn btn-primary font-weight-bolder text-uppercase px-9" data-wizard-type="action-submit">Enviar</button>
												</div>
											</div>									

									</div>
									<!--end: Wizard-->
								</div>
								<!--end: Wizard Form-->
							</div>
							<!--end: Wizard Body-->
						</div>
						<!--end: Wizard-->
					 <?php } ?>
				</div>
			</div>
		</div>
		<!--end::Container-->

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer class="footer" role="contentinfo">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-4 mb-md-0 text-center">
          <img src="assets/media/logos/Logo-rep-blanco.png" alt="" class="logo-unirep-footer">
          <p>Somos la red educativa de formación docente más grande de Ecuador</p>
          <p>© REP - Red Ecuatoriana de Pedagogía 2022</p>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Ventana modal visor IMAGEN -->
<div class="modal fade" id="ModalVisorImagen" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
          
        <div class="modal-header">
            <h4 class="modal-title">Archivo adunto</h4>
          <!--  
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
          -->
        </div>

        <div class="modal-body" id="contenedor-modal-visorimagen">
          <img src="" id="img-adjunto-modal">
        </div>
        
        <div class="modal-footer">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-lg-right">
                <a href="#!" class="btn btn-danger btn-sm" id="btn_cerrar_modal" data-dismiss="modal">Cerrar</a>
              </div>
            </div>
          </div>
        </div>
          
      </div>
  </div>
</div>

<!-- Ventana modal visor PDF -->
<div class="modal fade" id="ModalVisorPdf" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
          
        <div class="modal-header">
            <h4 class="modal-title">Archivo adunto</h4>
          <!--  
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
          -->
        </div>

        <div class="modal-body" id="contenedor-modal-visorpdf">
          <object id="cargarPdf" data="" type="application/pdf" style="width:100%; height:800px;"></object>
        </div>
        
        <div class="modal-footer">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-lg-right">
                <a href="#!" class="btn btn-light-danger btn-sm" id="btn_cerrar_modal" data-dismiss="modal">Cerrar</a>
              </div>
            </div>
          </div>
        </div>
          
      </div>
  </div>
</div>

  <!-- Vendor JS Files -->
  <script src="landings/assets/vendor/aos/aos.js"></script>
  <script src="landings/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="landings/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="landings/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="landings/assets/js/main.js"></script>

  <!-- Scripts de Metronic -->
  <!--begin::Global Config(global config for global JS scripts)-->
	<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
	<!--end::Global Config-->
	<!--begin::Global Theme Bundle(used by all pages)-->
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<!--end::Global Theme Bundle-->

	<!-- Jquery Confirm -->
	<script src="assets/plugins/custom/confirm/jquery-confirm.js"></script>

	<!--begin::Page Scripts(used by this page)-->
	<script src="assets/js/pages/custom/wizard/formulario-postulacion.js?ver1.5"></script>
		<!-- FileUpload JS -->
		<!-- The blueimp Gallery widget -->
	    <!-- The template to display files available for upload -->
	    <script id="template-upload" type="text/x-tmpl">
	      {% for (var i=0, file; file=o.files[i]; i++) { %}
	          <tr class="template-upload {%=o.options.loadImageFileTypes.test(file.type)?' image':''%}">
	              <!-- td>
	                  <span class="preview"></span>
	              </td -->
	              <td>
	                  <p class="name">{%=file.name%}</p>
	                  <strong class="error text-danger"></strong>
	              </td>
	              <td>
	                  <p class="size">Subiendo...</p>
	                  <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
	              </td>
	              <td style="text-align:center; padding-top: 5px;">
	                  {% if (!o.options.autoUpload && o.options.edit && o.options.loadImageFileTypes.test(file.type)) { %}
	                    <button class="btn btn-success btn-sm edit" data-index="{%=i%}" disabled>
	                        <i class="bi bi-pencil-square"></i>
	                        <!-- span>Editar</span -->
	                    </button>
	                  {% } %}
	                  {% if (!i && !o.options.autoUpload) { %}
	                      <button class="btn btn-primary btn-sm start" disabled>
	                          <i class="bi bi-upload"></i>
	                          <!-- span>Subir</span -->
	                      </button>
	                  {% } %}
	                  {% if (!i) { %}
	                      <button class="btn btn-warning btn-sm cancel">
	                          <i class="bi bi-x-circle"></i>
	                          <!-- span>Cancelar</span -->
	                      </button>
	                  {% } %}
	              </td>
	          </tr>
	      {% } %}
	    </script>
	    <!-- The template to display files available for download -->
	    <script id="template-download" type="text/x-tmpl">
	      {% for (var i=0, file; file=o.files[i]; i++) { %}
	          <tr class="template-download {%=file.thumbnailUrl?' image':''%}">
	              <!-- td>
	                  <span class="preview">
	                      {% if (file.thumbnailUrl) { %}
	                          <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
	                      {% } %}
	                  </span>
	              </td -->
	              <td>
	                  <p class="name">
	                      {% if (file.url) { %}
	                          <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
	                      {% } else { %}
	                          <span>{%=file.name%}</span>
	                      {% } %}
	                  </p>
	                  {% if (file.error) { %}
	                      <div><span class="label label-danger">Error</span> {%=file.error%}</div>
	                  {% } %}
	              </td>
	              <!-- td>
	                  <span class="size">{%=o.formatFileSize(file.size)%}</span>
	              </td -->
	              <td style="text-align:center; padding-top: 5px;">
	                  {% if (file.deleteUrl) { %}
	                      <button class="btn btn-link btn-sm delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
	                          <i class="bi bi-trash text-danger"></i>
	                          <!-- span>Eliminar</span -->
	                      </button>
	                      <!-- input type="checkbox" name="delete" value="1" class="toggle" -->
	                  {% } else { %}
	                      <button class="btn btn-warning btn-sm cancel">
	                          <i class="bi bi-x-circle"></i>
	                          <!-- span>Cancelar</span -->
	                      </button>
	                  {% } %}
	              </td>
	          </tr>
	      {% } %}
	    </script>

    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="fileupload/js/vendor/jquery.ui.widget.js"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="fileupload/js/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="fileupload/js/load-image.all.min.js"></script>
    
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="fileupload/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="fileupload/js/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin -->
    <script src="fileupload/js/jquery.fileupload-process.js"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="fileupload/js/jquery.fileupload-image.js"></script>
    <!-- The File Upload video preview plugin -->
    <script src="fileupload/js/jquery.fileupload-video.js"></script>	
    <!-- The File Upload validation plugin -->
    <script src="fileupload/js/jquery.fileupload-validate.js"></script>
    <!-- The File Upload user interface plugin -->
    <script src="fileupload/js/jquery.fileupload-ui.js"></script>
	<!-- The main application script -->
	<script src="fileupload/js/demo2.js"></script>

    <!-- TinyMCE -->
	<script src="assets/plugins/custom/tinymce/tinymce.bundle.js?v=7.2.9"></script>

	<!-- Toastr Notificaciones -->
	<script src="assets/plugins/custom/toastr/toastr.min.js"></script>

	<!--SweetAlert-->
	<script src="assets/js/pages/features/miscellaneous/sweetalert2.js"></script>

	<!-- Custom scripts para esta pagina -->
	<script src="assets/js/formulariofinanciamiento.js?ver1.0"></script>

	


</body>

</html>