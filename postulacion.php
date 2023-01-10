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

  <!--begin::Page Custom Styles(used by this page)-->
  <link href="assets/css/pages/wizard/wizard-2.css" rel="stylesheet" type="text/css" />

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
  	.wizard.wizard-2 .wizard-nav .wizard-steps, .wizard-body {
		    padding: 20px;
		}

  	.tox-statusbar__branding{
  		display: none;
  	}
  	p{
  		color: #000 !important;
  	}
  	.logo-unirep{
      width: 40%;
    }

    .logo-unirep-footer{
      width: 20%; 
    }

    label{
    	font-weight: 700 !important;
    }

    .form-check-label{
    	font-weight: 400 !important;	
    }

    .form-check-input:disabled, .form-check-input:disabled~.form-check-label, .form-check-input[disabled]~.form-check-label {
		  opacity: .9;
		}

		body{
			background: url(assets/media/bg/fondo_login.jpg);
			background-size: contain;
		}

    @media screen and (max-width: 992px){
      .logo-unirep{
        width: 100%;
      }

      .logo-unirep-footer{
        width: 80%; 
      }

      .hero-section, .hero-section>.container>.row {
          height: 90vh;
          min-height: 500px;
      }

      .hero-section .hero-text-image {
          margin-top: -4rem;
          padding: 0 30px;
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
		$archivo_version = 0;
		//	$id_programa = base64_decode($id_programa);

		//Consulto los datos del programa
		$SQLProgramas = "SELECT p.id AS id, UPPER(p.nombre) AS nombre, p.estado AS estado FROM programas AS p WHERE p.id = '$id_programa' ";
	  $SQLconsultaProgramas = $conexionmysqli->query($SQLProgramas);
	  $SQLconsultaProgramas->data_seek(0);
	  $registro_Programas = $SQLconsultaProgramas->fetch_assoc();
	   	$id = $registro_Programas['id'];
	   	$nombre = $registro_Programas['nombre'];
	   	$estado = $registro_Programas['estado'];
	  $SQLconsultaProgramas->close();

	    //Consulto los datos del postulante
	  $SQLDatospostulante = "SELECT u.id_usuario AS idu, UPPER(u.usua_nombre) AS usuan, DATE_FORMAT(u.f_registro, '%d - %m - %Y') AS fregistro FROM usuarios AS u WHERE u.id_usuario = '$id_usuario' ";
	  $SQLconsultaDatospostulante = $conexionmysqli->query($SQLDatospostulante);
	  $SQLconsultaDatospostulante->data_seek(0);
	  $registro_Datospostulante = $SQLconsultaDatospostulante->fetch_assoc();
	   	$idu = $registro_Datospostulante['idu'];
	   	$usuan = $registro_Datospostulante['usuan'];
	   	$fregistro = $registro_Datospostulante['fregistro'];
	  $SQLconsultaDatospostulante->close();

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
			$fecha_postulacion = $registro_RegPostulacion['fecha_postulacion']; // 36
			$modificado_por = $registro_RegPostulacion['modificado_por']; // 37}
			$fecha_ult_modificacion = $registro_RegPostulacion['fecha_ult_modificacion']; // 38
			$version_form = $registro_RegPostulacion['version_form']; // 39

	  $SQLconsultaRegPostulacion->close();



		/*
			Consulto si esta postulacion es con la nueva version, campo de la BD verion_form
			1 => Versión antigua
			2 => Nueva versión
		*/

		switch ($version_form) {
	    case 1:
	      $archivo_version = "postulacion-archivo-version-uno.php";
	      break;
	    case 2:
	      $archivo_version = "postulacion-archivo-version-dos.php";
	      break;
	    default:
	    	$archivo_version = "postulacion-archivo-version-uno.php"; //En caso que en la BD no este definido la version, carga la version 1 por defecto
		}


	?>

  <!-- ======= Hero Section ======= -->
   <!--  
    <div class="wave">

      <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
            <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z" id="Path"></path>
          </g>
        </g>
      </svg>

    </div>
  -->
  <!-- section class="hero-section" id="hero">

    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 hero-text-image">
          <div class="row">
            <div class="col-lg-12 text-center">
              <img src="assets/media/logos/logo-unirep.png" alt="Image" class="logo-unirep" class="phone-1" data-aos="fade-right">
              <h1 data-aos="fade-right" style="color: #0A57A3;"><?php echo $nombre; ?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section -->
  <!-- End Hero -->

  <main id="main">

    <!-- ======= Home Section ======= -->
    <section class="section" style="padding-top: 3.5rem !important">
      
    <!-- ======= Wizard Section ======= -->

      <!--begin::Container-->
		<div class="container">
			<div class="card card-custom">
				<div class="card-body p-0">

					<div class="container">

				        <div class="row justify-content-center text-center mb-5" id="comenzar">
				          <div class="col-md-12" data-aos="fade-down" style="padding-top: 40px">
				            
				            <h2 style="color: #0A57A3;">Postulación</h2>
				            <h2><?php echo $nombre; ?></h2>

				            <h3><?php echo $usuan; ?></h3>

				            <input type="hidden" name="p" id="p" value="<?php echo $id_programa; ?>"> <!-- id del programa -->
				            <input type="hidden" name="c" id="c" value="<?php echo $id_usuario; ?>"> <!-- id del usuario postulante -->
				            <input type="hidden" name="i" id="i" value="<?php echo $id_postulacion; ?>"> <!-- id de la postulación -->
				          </div>
				        </div>

				      </div>

					<!--begin: Wizard-->
					<div class="" id="kt_wizard_fomrulario_postulacion" data-wizard-state="step-first" data-wizard-clickable="false">

						<!--begin: Wizard Body-->
						<div class="wizard-body py-8 px-8 py-lg-20 px-lg-10">
							<!--begin: Wizard Form-->
							<div class="row">
								<div class="offset-xxl-1 col-xxl-10">
									<?php 
										include_once ($archivo_version);
									?>
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

</body>

</html>