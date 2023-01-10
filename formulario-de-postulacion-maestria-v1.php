<!DOCTYPE html>
<html lang="en">

<head>
  <!-- base href="landings/" -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Postulación doctorado - REP</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
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
        min-height: 350px;
      }

      .hero-section .hero-text-image {
        margin-top: -2rem;
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
		$SQLProgramas = "SELECT 
			p.id AS id, 
			p.nombre AS nombre, 
			p.institucion AS institucion, 
			p.estado AS estado 
		FROM programas AS p WHERE p.id = '$id_programa' ";
	  $SQLconsultaProgramas = $conexionmysqli->query($SQLProgramas);
	  $SQLconsultaProgramas->data_seek(0);
	  $registro_Programas = $SQLconsultaProgramas->fetch_assoc();
	   	$id = $registro_Programas['id'];
	   	$nombre = $registro_Programas['nombre'];
	   	$institucionp = $registro_Programas['institucion'];
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
			// echo "Postulación nueva, agregar un nuevo registro.";
			// Registro una nueva postulación
			$identificador = strtotime($fechaCompleta);
			#Inserto los registros en la BD
			$queryInsert = "INSERT INTO postulaciones(id_usuario, id_programa, identificador, version_form)VALUES ('$id_usuario', '$id_programa', '$identificador', '$version_form')";
			$resultInsert = mysqli_query($conexionmysqli, $queryInsert);

			#Recupero el id_usuario e id_evento del usuario recien creado, genero el codigo QR y actualizo el registro
			$SQLDatosUsuario = " SELECT * FROM postulaciones WHERE id_usuario = '$id_usuario' AND id_programa = '$id_programa' AND identificador = '$identificador' ";
		  $SQLconsultaDatosUsuario = $conexionmysqli->query($SQLDatosUsuario);
		  $SQLconsultaDatosUsuario->data_seek(0);
		  $registro_DatosUsuario = $SQLconsultaDatosUsuario->fetch_assoc();
				
				$id_postulacion = $registro_DatosUsuario['id_postulacion']; // 1
				$id_usuario = $registro_DatosUsuario['id_usuario']; // 2
				$id_programa = $registro_DatosUsuario['id_programa']; // 3
				$estudioscuartonivel = $registro_DatosUsuario['estudioscuartonivel']; // 4
				$otrosestudioscuartonivel = $registro_DatosUsuario['otrosestudioscuartonivel']; // 5
				$estudiostercernivel = $registro_DatosUsuario['estudiostercernivel']; // 6
				$idiomas = $registro_DatosUsuario['idiomas']; // 7
				$institucion = $registro_DatosUsuario['institucion']; // 8
				$direccionempresa = $registro_DatosUsuario['direccionempresa']; // 9
				$provinciaempresa = $registro_DatosUsuario['provinciaempresa']; // 10
				$paisempresa = $registro_DatosUsuario['paisempresa']; // 11
				$telefonoempresa = $registro_DatosUsuario['telefonoempresa']; // 12
				$tipoinstitucion = $registro_DatosUsuario['tipoinstitucion']; // 13
				$cargoempresa = $registro_DatosUsuario['cargoempresa']; // 14
				$laborempresa = $registro_DatosUsuario['laborempresa']; // 15
				$tiempotrabajo = $registro_DatosUsuario['tiempotrabajo']; // 16
				$nombramiento = $registro_DatosUsuario['nombramiento']; // 17
				$capacitaciones = $registro_DatosUsuario['capacitaciones']; // 18
				$experienciadocencia = $registro_DatosUsuario['experienciadocencia']; // 19
				$publicacionesrevistas = $registro_DatosUsuario['publicacionesrevistas']; // 20
				$libros = $registro_DatosUsuario['libros']; // 21
				$participacioneventos = $registro_DatosUsuario['participacioneventos']; // 22
				$incentivopostulacion = $registro_DatosUsuario['incentivopostulacion']; // 23
				$carreraprofesional = $registro_DatosUsuario['carreraprofesional']; // 24
				$impactocarrera = $registro_DatosUsuario['impactocarrera']; // 25
				$hojadevida = $registro_DatosUsuario['hojadevida']; // 26
				$fotocopiacedula = $registro_DatosUsuario['fotocopiacedula']; // 27
				$copiatitulo = $registro_DatosUsuario['copiatitulo']; // 28
				$copiatitulocuartonivel = $registro_DatosUsuario['copiatitulocuartonivel']; // 29
				$selecbeca = $registro_DatosUsuario['selecbeca']; // 30
				$archivobeca = $registro_DatosUsuario['archivobeca']; // 31
				$cartarecomendacion = $registro_DatosUsuario['cartarecomendacion']; // 32
				$comonosconocio = $registro_DatosUsuario['comonosconocio']; // 33
				$identificador = $registro_DatosUsuario['identificador']; // 34
				$completado = $registro_DatosUsuario['completado']; // 35
				
				$aplicafinanciamiento = $registro_DatosUsuario['aplicafinanciamiento']; //36
				$aprobadofinrep = $registro_DatosUsuario['aprobadofinrep']; //37
				$fincedula = $registro_DatosUsuario['fincedula']; //38
				$finestadocivil = $registro_DatosUsuario['finestadocivil']; //39
				$fincedulaconyuge = $registro_DatosUsuario['fincedulaconyuge']; //40
				$findisolucionconyugal = $registro_DatosUsuario['findisolucionconyugal']; //41
				$finroldepago = $registro_DatosUsuario['finroldepago']; //42
				$finplanillaserbasico = $registro_DatosUsuario['finplanillaserbasico']; //43
				$finmatriculacarro = $registro_DatosUsuario['finmatriculacarro']; //44
				$finprediocasa = $registro_DatosUsuario['finprediocasa']; //45
				$finautorburocredito = $registro_DatosUsuario['finautorburocredito']; //46
				$fincartaceptacion = $registro_DatosUsuario['fincartaceptacion']; //47
				$fincalificacion = $registro_DatosUsuario['fincalificacion']; //48

				$fecha_postulacion = $registro_DatosUsuario['fecha_postulacion']; // 49
				$modificado_por = $registro_DatosUsuario['modificado_por']; // 50
				$fecha_ult_modificacion = $registro_DatosUsuario['fecha_ult_modificacion']; // 51
				$version_form = $registro_DatosUsuario['version_form']; // 52
		  
		  $SQLconsultaDatosUsuario->close();
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
            <!--
              <br>
              <h2 data-aos="fade-right" style="color: #FFFFFF;"><?php // echo $institucionp; ?></h2>
             -->
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
            <h2  style="color: #0A57A3;">Formulario de postulación</h2>
            <span class="text-danger">* <span class="text-dark">Campos obligatorios.</span></span>

            <div class="alert alert-primary" style="margin-top: 25px; padding-top: 25px;">
            	<p>Estimado postulante, te informamos que los datos que ingreses en el formulario se guardarán automáticamente. En caso de que no logres completar todos los campos, podrás retomar tu proceso de postulación desde el último campo que ingresaste.</p>
            </div>
            
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
					<!--begin: Wizard-->
					<div class="" id="kt_wizard_fomrulario_postulacion" data-wizard-state="step-first" data-wizard-clickable="false">
						<!--begin: Wizard Body-->
						<div class="wizard-body py-8 px-8 py-lg-20 px-lg-10">
							<!--begin: Wizard Form-->
							<div class="row">
								<div class="offset-xxl-1 col-xxl-10">
									
									<form id="kt_form" class="form"></form>
										
										<?php 
											include_once ($archivo_version);
										?>

										<div class="pb-5" data-wizard-type="step-content">
											<h4 class="mb-10 font-weight-bold text-dark titulo-secc">Enviar postulación</h4>
											<h6 class="font-weight-bolder mt-5 mb-3">¡Estás a un paso de lograrlo! <br> </h6>
											<div class="text-dark line-height-lg">
												<div>La Red Ecuatoriana de Pedagogía agradece tu interés por postular al programa: <b><?php echo $nombre; ?></b>. <br><br> Termina el proceso y dale clic en el botón postular.</div>
											</div>
											<div class="separator separator-dashed my-5"></div>
											
										</div>

										<div class="d-flex justify-content-between border-top mt-5 pt-10" style="padding-top: 25px">
											<div>
												<button type="button" id="enviar" class="btn btn-primary font-weight-bolder text-uppercase px-9" data-wizard-type="action-submit">Postular</button>
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
	<script src="assets/js/formulario.js?ver1.15"></script>

	


</body>

</html>