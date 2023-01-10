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
  <link href="landings/assets/img/favicon.png" rel="icon">
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
		$id_usuario = isset($_GET["c"]) ? $_GET["c"] : '';
		//	$id_programa = base64_decode($id_programa);

		//Consulto los datos del programa
		$SQLProgramas = "SELECT p.id AS id, p.nombre AS nombre, DATE_FORMAT(p.finicio, '%d - %m - %Y') AS finicio FROM programas AS p WHERE p.id = '$id_programa' ";
	  $SQLconsultaProgramas = $conexionmysqli->query($SQLProgramas);
	  $SQLconsultaProgramas->data_seek(0);
	  $registro_Programas = $SQLconsultaProgramas->fetch_assoc();
	   	$id = $registro_Programas['id'];
	   	$nombre = $registro_Programas['nombre'];
	   	$finicio = $registro_Programas['finicio'];
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

				$id_postulacion = $registro_RegPostulacion['id_postulacion'];
				$id_usuario = $registro_RegPostulacion['id_usuario'];
				$id_programa = $registro_RegPostulacion['id_programa'];
				$estudioscuartonivel = $registro_RegPostulacion['estudioscuartonivel'];
				$otrosestudioscuartonivel = $registro_RegPostulacion['otrosestudioscuartonivel'];
				$estudiostercernivel = $registro_RegPostulacion['estudiostercernivel'];
				$idiomas = $registro_RegPostulacion['idiomas'];
				$institucion = $registro_RegPostulacion['institucion'];
				$direccionempresa = $registro_RegPostulacion['direccionempresa'];
				$provinciaempresa = $registro_RegPostulacion['provinciaempresa'];
				$paisempresa = $registro_RegPostulacion['paisempresa'];
				$telefonoempresa = $registro_RegPostulacion['telefonoempresa'];
				$tipoinstitucion = $registro_RegPostulacion['tipoinstitucion'];
				$cargoempresa = $registro_RegPostulacion['cargoempresa'];
				$laborempresa = $registro_RegPostulacion['laborempresa'];
				$tiempotrabajo = $registro_RegPostulacion['tiempotrabajo'];
				$nombramiento = $registro_RegPostulacion['nombramiento'];
				$capacitaciones = $registro_RegPostulacion['capacitaciones'];
				$experienciadocencia = $registro_RegPostulacion['experienciadocencia'];
				$publicacionesrevistas = $registro_RegPostulacion['publicacionesrevistas'];
				$libros = $registro_RegPostulacion['libros'];
				$participacioneventos = $registro_RegPostulacion['participacioneventos'];
				$incentivopostulacion = $registro_RegPostulacion['incentivopostulacion'];
				$carreraprofesional = $registro_RegPostulacion['carreraprofesional'];
				$impactocarrera = $registro_RegPostulacion['impactocarrera'];
				$hojadevida = $registro_RegPostulacion['hojadevida'];
				$fotocopiacedula = $registro_RegPostulacion['fotocopiacedula'];
				$copiatitulo = $registro_RegPostulacion['copiatitulo'];
				$comonosconocio = $registro_RegPostulacion['comonosconocio'];
				$identificador = $registro_RegPostulacion['identificador'];

		  $SQLconsultaRegPostulacion->close();
		}
			else
		{
			// echo "Postulación nueva, agregar un nuevo registro.";
			// Registro una nueva postulación
			$identificador = strtotime($fechaCompleta);
			#Inserto los registros en la BD
			$queryInsert = "INSERT INTO postulaciones(id_usuario, id_programa, identificador)VALUES ('$id_usuario', '$id_programa', '$identificador')";
			$resultInsert = mysqli_query($conexionmysqli, $queryInsert);

			#Recupero el id_usuario e id_evento del usuario recien creado, genero el codigo QR y actualizo el registro
			$SQLDatosUsuario = " SELECT * FROM postulaciones WHERE id_usuario = '$id_usuario' AND id_programa = '$id_programa' AND identificador = '$identificador' ";
		  $SQLconsultaDatosUsuario = $conexionmysqli->query($SQLDatosUsuario);
		  $SQLconsultaDatosUsuario->data_seek(0);
		  $registro_DatosUsuario = $SQLconsultaDatosUsuario->fetch_assoc();
				
				$id_postulacion = $registro_DatosUsuario['id_postulacion'];
				$id_usuario = $registro_DatosUsuario['id_usuario'];
				$id_programa = $registro_DatosUsuario['id_programa'];
				$estudioscuartonivel = $registro_DatosUsuario['estudioscuartonivel'];
				$otrosestudioscuartonivel = $registro_DatosUsuario['otrosestudioscuartonivel'];
				$estudiostercernivel = $registro_DatosUsuario['estudiostercernivel'];
				$idiomas = $registro_DatosUsuario['idiomas'];
				$institucion = $registro_DatosUsuario['institucion'];
				$direccionempresa = $registro_DatosUsuario['direccionempresa'];
				$provinciaempresa = $registro_DatosUsuario['provinciaempresa'];
				$paisempresa = $registro_DatosUsuario['paisempresa'];
				$telefonoempresa = $registro_DatosUsuario['telefonoempresa'];
				$tipoinstitucion = $registro_DatosUsuario['tipoinstitucion'];
				$cargoempresa = $registro_DatosUsuario['cargoempresa'];
				$laborempresa = $registro_DatosUsuario['laborempresa'];
				$tiempotrabajo = $registro_DatosUsuario['tiempotrabajo'];
				$nombramiento = $registro_DatosUsuario['nombramiento'];
				$capacitaciones = $registro_DatosUsuario['capacitaciones'];
				$experienciadocencia = $registro_DatosUsuario['experienciadocencia'];
				$publicacionesrevistas = $registro_DatosUsuario['publicacionesrevistas'];
				$libros = $registro_DatosUsuario['libros'];
				$participacioneventos = $registro_DatosUsuario['participacioneventos'];
				$incentivopostulacion = $registro_DatosUsuario['incentivopostulacion'];
				$carreraprofesional = $registro_DatosUsuario['carreraprofesional'];
				$impactocarrera = $registro_DatosUsuario['impactocarrera'];
				$hojadevida = $registro_DatosUsuario['hojadevida'];
				$fotocopiacedula = $registro_DatosUsuario['fotocopiacedula'];
				$copiatitulo = $registro_DatosUsuario['copiatitulo'];
				$comonosconocio = $registro_DatosUsuario['comonosconocio'];
				$identificador = $registro_DatosUsuario['identificador'];
		  
		  $SQLconsultaDatosUsuario->close();

			//Recupero esa ultima id de postulación
		}

	?>

  <!-- ======= Hero Section ======= -->
  <section class="hero-section" id="hero">

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

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Home Section ======= -->
    <section class="section" style="padding-top: 3.5rem !important">
      <div class="container">

        <div class="row justify-content-center text-center mb-5" id="comenzar">
          <div class="col-md-12" data-aos="fade-down">
            <h2 style="color: #0A57A3;">Postulación</h2 -->
            <input type="hidden" name="p" id="p" value="<?php echo $id_programa; ?>"> <!-- id del programa -->
            <input type="hidden" name="c" id="c" value="<?php echo $id_usuario; ?>"> <!-- id del usuario postulante -->
            <input type="hidden" name="i" id="i" value="<?php echo $id_postulacion; ?>"> <!-- id de la postulación -->
          </div>
        </div>

      </div>
    <!-- ======= Wizard Section ======= -->

      <!--begin::Container-->
		<div class="container">
			<div class="card card-custom">
				<div class="card-body p-0">
					<!--begin: Wizard-->
					<div class="wizard wizard-2" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="false">
						<!--begin: Wizard Nav-->
						<div class="wizard-nav border-right py-8 px-8 py-lg-20 px-lg-10">
							<!--begin::Wizard Step 1 Nav-->
							<div class="wizard-steps">
								<div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
									<div class="wizard-wrapper">
										<div class="wizard-icon">
											<span class="svg-icon svg-icon-2x">
												<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
														<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
										<div class="wizard-label">
											<h3 class="wizard-title">Datos académicos</h3>
											<!-- div class="wizard-desc">Estudios</div -->
										</div>
									</div>
								</div>
								<!--end::Wizard Step 1 Nav-->

								<!--begin::Wizard Step 2 Nav-->
								<div class="wizard-step" data-wizard-type="step">
									<div class="wizard-wrapper">
										<div class="wizard-icon">
											<span class="svg-icon svg-icon-2x">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Map/Compass.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M12,21 C7.02943725,21 3,16.9705627 3,12 C3,7.02943725 7.02943725,3 12,3 C16.9705627,3 21,7.02943725 21,12 C21,16.9705627 16.9705627,21 12,21 Z M14.1654881,7.35483745 L9.61055177,10.3622525 C9.47921741,10.4489666 9.39637436,10.592455 9.38694497,10.7495509 L9.05991526,16.197949 C9.04337012,16.4735952 9.25341309,16.7104632 9.52905936,16.7270083 C9.63705011,16.7334903 9.74423017,16.7047714 9.83451193,16.6451626 L14.3894482,13.6377475 C14.5207826,13.5510334 14.6036256,13.407545 14.613055,13.2504491 L14.9400847,7.80205104 C14.9566299,7.52640477 14.7465869,7.28953682 14.4709406,7.27299168 C14.3629499,7.26650974 14.2557698,7.29522855 14.1654881,7.35483745 Z" fill="#000000" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
										<div class="wizard-label">
											<h3 class="wizard-title">Experiencia profesional</h3>
										</div>
									</div>
								</div>
								<!--end::Wizard Step 2 Nav-->

								<!--begin::Wizard Step 2 Nav-->
								<div class="wizard-step" data-wizard-type="step">
									<div class="wizard-wrapper">
										<div class="wizard-icon">
											<span class="svg-icon svg-icon-2x">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Map/Compass.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M12,21 C7.02943725,21 3,16.9705627 3,12 C3,7.02943725 7.02943725,3 12,3 C16.9705627,3 21,7.02943725 21,12 C21,16.9705627 16.9705627,21 12,21 Z M14.1654881,7.35483745 L9.61055177,10.3622525 C9.47921741,10.4489666 9.39637436,10.592455 9.38694497,10.7495509 L9.05991526,16.197949 C9.04337012,16.4735952 9.25341309,16.7104632 9.52905936,16.7270083 C9.63705011,16.7334903 9.74423017,16.7047714 9.83451193,16.6451626 L14.3894482,13.6377475 C14.5207826,13.5510334 14.6036256,13.407545 14.613055,13.2504491 L14.9400847,7.80205104 C14.9566299,7.52640477 14.7465869,7.28953682 14.4709406,7.27299168 C14.3629499,7.26650974 14.2557698,7.29522855 14.1654881,7.35483745 Z" fill="#000000" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
										<div class="wizard-label">
											<h3 class="wizard-title">Experiencia investigativa</h3>
										</div>
									</div>
								</div>
								<!--end::Wizard Step 3 Nav-->

								<!--begin::Wizard Step 4 Nav-->
								<div class="wizard-step" data-wizard-type="step">
									<div class="wizard-wrapper">
										<div class="wizard-icon">
											<span class="svg-icon svg-icon-2x">
												<!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z" fill="#000000" />
														<path d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z" fill="#000000" opacity="0.3" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
										<div class="wizard-label">
											<h3 class="wizard-title">Motivación</h3>
										</div>
									</div>
								</div>
								<!--end::Wizard Step 4 Nav-->

								<!--begin::Wizard Step 5 Nav-->
								<div class="wizard-step" data-wizard-type="step">
									<div class="wizard-wrapper">
										<div class="wizard-icon">
											<span class="svg-icon svg-icon-2x">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Credit-card.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2" />
														<rect fill="#000000" x="2" y="8" width="20" height="3" />
														<rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
										<div class="wizard-label">
											<h3 class="wizard-title">Documentación</h3>
										</div>
									</div>
								</div>
								<!--end::Wizard Step 5 Nav-->

								<!--begin::Wizard Step 6 Nav-->
								<div class="wizard-step" data-wizard-type="step">
									<div class="wizard-wrapper">
										<div class="wizard-icon">
											<span class="svg-icon svg-icon-2x">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Map/Position.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M19,11 L21,11 C21.5522847,11 22,11.4477153 22,12 C22,12.5522847 21.5522847,13 21,13 L19,13 C18.4477153,13 18,12.5522847 18,12 C18,11.4477153 18.4477153,11 19,11 Z M3,11 L5,11 C5.55228475,11 6,11.4477153 6,12 C6,12.5522847 5.55228475,13 5,13 L3,13 C2.44771525,13 2,12.5522847 2,12 C2,11.4477153 2.44771525,11 3,11 Z M12,2 C12.5522847,2 13,2.44771525 13,3 L13,5 C13,5.55228475 12.5522847,6 12,6 C11.4477153,6 11,5.55228475 11,5 L11,3 C11,2.44771525 11.4477153,2 12,2 Z M12,18 C12.5522847,18 13,18.4477153 13,19 L13,21 C13,21.5522847 12.5522847,22 12,22 C11.4477153,22 11,21.5522847 11,21 L11,19 C11,18.4477153 11.4477153,18 12,18 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
														<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="2" />
														<path d="M12,17 C14.7614237,17 17,14.7614237 17,12 C17,9.23857625 14.7614237,7 12,7 C9.23857625,7 7,9.23857625 7,12 C7,14.7614237 9.23857625,17 12,17 Z M12,19 C8.13400675,19 5,15.8659932 5,12 C5,8.13400675 8.13400675,5 12,5 C15.8659932,5 19,8.13400675 19,12 C19,15.8659932 15.8659932,19 12,19 Z" fill="#000000" fill-rule="nonzero" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
										<div class="wizard-label">
											<h3 class="wizard-title">Informativo</h3>
										</div>
									</div>
								</div>
								<!--end::Wizard Step 6 Nav-->


								<!--begin::Wizard Step 7 Nav-->
								<!-- div class="wizard-step" data-wizard-type="step">
									<div class="wizard-wrapper">
										<div class="wizard-icon">
											<span class="svg-icon svg-icon-2x">
												
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M9,10 L9,19 L10.1525987,19.3841996 C11.3761964,19.7920655 12.6575468,20 13.9473319,20 L17.5405883,20 C18.9706314,20 20.2018758,18.990621 20.4823303,17.5883484 L21.231529,13.8423552 C21.5564648,12.217676 20.5028146,10.6372006 18.8781353,10.3122648 C18.6189212,10.260422 18.353992,10.2430672 18.0902299,10.2606513 L14.5,10.5 L14.8641964,6.49383981 C14.9326895,5.74041495 14.3774427,5.07411874 13.6240179,5.00562558 C13.5827848,5.00187712 13.5414031,5 13.5,5 L13.5,5 C12.5694044,5 11.7070439,5.48826024 11.2282564,6.28623939 L9,10 Z" fill="#000000" />
														<rect fill="#000000" opacity="0.3" x="2" y="9" width="5" height="11" rx="1" />
													</g>
												</svg>
												
											</span>
										</div>
										<div class="wizard-label">
											<h3 class="wizard-title">Completado!</h3>
										</div>
									</div>
								</div -->
								<!--end::Wizard Step 7 Nav-->
							</div>
						</div>
						<!--end: Wizard Nav-->
						<!--begin: Wizard Body-->
						<div class="wizard-body py-8 px-8 py-lg-20 px-lg-10">
							<!--begin: Wizard Form-->
							<div class="row">
								<div class="offset-xxl-1 col-xxl-10">
									
									<form id="kt_form" class="form"></form>
										
										<!--begin: Wizard Step 1-->
										<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
											<h4 class="mb-10 font-weight-bold text-dark">Datos académicos</h4>

											<div class="form-group">
												<label>Estudios de cuarto nivel (maestría):</label>
												<p><?php echo "$estudioscuartonivel"; ?></p>
												
											</div>

											<div class="form-group mt-15">
												<label>Otros estudios de cuarto nivel (diplomados, especializaciones):</label>
												<p><?php echo "$otrosestudioscuartonivel"; ?></p>
											</div>

											<div class="form-group mt-15">
												<label>Estudios de tercer nivel: </label>
												<p><?php echo "$estudiostercernivel"; ?></p>
											</div>

											<div class="form-group mt-15">
												<label>Idiomas: </label>
												<p><?php echo "$idiomas"; ?></p>
											</div>
										</div>
										<!--end: Wizard Step 1-->
										
										<!--begin: Wizard Step 2-->
										<div class="pb-5" data-wizard-type="step-content">
											<h4 class="mb-10 font-weight-bold text-dark">Experiencia profesional</h4>

											<div class="row">
												<div class="col-xl-12">
													<h5>En la actualidad</h5>
												</div>
											</div>
											<div class="row">
												<div class="col-xl-12">
													<!--begin::Input-->
													<div class="form-group">
														<label>Institución o Empresa: </label>
														<p><?php echo "$institucion"; ?></p>
													</div>
													<!--end::Input-->
												</div>
											</div>
											<div class="row">
												<div class="col-xl-12">
													<!--begin::Input-->
													<div class="form-group">
														<label>Dirección: </label>
														<p><?php echo "$direccionempresa"; ?></p>
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
														<label>País: </label>
														<p><?php echo "$paisempresa"; ?></p>
													</div>
													<!--end::Input-->
												</div>
											</div>
											<div class="row">
												<div class="col-xl-6">
													<div class="form-group">
														<label>Teléfono: </label>
														<p><?php echo "$telefonoempresa"; ?></p>
													</div>
												</div>
												<div class="col-xl-6">
													<div class="form-group">
														<label style="margin-bottom: 10px;">Tipo de Institución o Empresa: </label><br>
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
												<div class="col-xl-12">
													<div class="form-group">
														<label>Cargo: </label>
														<p><?php echo "$cargoempresa"; ?></p>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-xl-12">
													<div class="form-group mt-15">
														<label>Descripción de la labor que desempeña: </label>
														<p><?php echo "$laborempresa"; ?></p>
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
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-xl-12">
													<div class="form-group mt-15">
														<label>Capacitaciones (últimos 5 años): </label>
														<p><?php echo "$capacitaciones"; ?></p>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-xl-12">
													<div class="form-group mt-15">
														<label>Experiencia en docencia: </label>
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
														<label>Publicaciones en revistas: </label>
														<p><?php echo "$publicacionesrevistas"; ?></p>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-xl-12">
													<div class="form-group mt-15">
														<label>Libros o capítulos de libros: </label>
														<p><?php echo "$libros"; ?></p>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-xl-12">
													<div class="form-group mt-15">
														<label>Participación como ponente o conferencista en eventos académicos: </label>
														<p><?php echo "$participacioneventos"; ?></p>
													</div>
												</div>
											</div>
	
										</div>
										<!--end: Wizard Step 3-->

										<!--begin: Wizard Step 4-->
										<div class="pb-5" data-wizard-type="step-content">
											<h4 class="mb-10 font-weight-bold text-dark">Motivación</h4>
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

													          	<p class="text-muted mt-3">
													          		Archivos permitidos: gif, jpeg, png, pdf. <br>
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
													          		<div class="col-lg-5">
													          			<label class="fs-14">
															          		1 - Fotocopia de la cédula (ambos lados) o pasaporte (primera página donde se muestre la vigencia del mismo).  <br>
															          	</label>

															          	<p class="text-muted mt-3">
															          		Archivos permitidos: gif, jpeg, png, pdf. <br>
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
														            <!-- span class="btn btn-primary btn-sm fileinput-button">
														              <i class="bi bi-plus"></i>
														              <span>AÑADIR ARCHIVO</span>
														              <input type="file" name="files[]" multiple />
														            </span -->
														        
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
													          		<th style="border: 1px solid #cdcdcd;">Archivo</th>
													          		<!-- th style="border: 1px solid #cdcdcd;">Tamaño</th -->
													          		<th style="border: 1px solid #cdcdcd;">Acciones</th>
													          	</tr>
													          </thead>
													          <tbody class="files">
													          	<?php 
													          		if ($fotocopiacedula) {
													          			echo "<tr><td>$fotocopiacedula</td><td> <a href='$_urlApp/uploads/$fotocopiacedula' target='_blank' class='btn-ver-archivo' data-archivo='999'><i class='bi bi-eye text-success'></i></a> </td></tr>";
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
													          		<div class="col-lg-5">
													          			<label class="fs-14">
															          		2- Copia de título de grado.  <br>
															          	</label>

															          	<p class="text-muted mt-3">
															          		Archivos permitidos: gif, jpeg, png, pdf. <br>
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
														            <!-- span class="btn btn-primary btn-sm fileinput-button">
														              <i class="bi bi-plus"></i>
														              <span>AÑADIR ARCHIVO</span>
														              <input type="file" name="files[]" multiple />
														            </span -->
														        
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
													        <table role="presentation" class="table table-bordered" id="tabla-titulo" data-idp="<?php echo $id_postulacion ?>">
													          <thead>
													          	<tr>
													          		<!-- th></th -->
													          		<th style="border: 1px solid #cdcdcd;">Archivo</th>
													          		
													          		<th style="border: 1px solid #cdcdcd;">Acciones</th>
													          	</tr>
													          </thead>
													          <tbody class="files">
													          	<?php 
													          		if ($copiatitulo) {
													          			echo "<tr><td>$copiatitulo</td><td> <a href='$_urlApp/uploads/$copiatitulo' target='_blank' class='btn-ver-archivo' data-archivo='999'><i class='bi bi-eye text-success'></i></a> </td></tr>";
													          		}
													          	?>
													          </tbody>
													        </table>
													    </div>
													</form>
													<input type="hidden" class="requerido" name="copiatitulo-req" id="copiatitulo-req" value="<?php if($copiatitulo){ echo "1"; }?> ">
												</div>
											</div>

										</div>
										<!--end: Wizard Step 5-->

										<!--begin: Wizard Step 6-->
										<div class="pb-5" data-wizard-type="step-content">
											<h4 class="mb-10 font-weight-bold text-dark">Informativo</h4>
											<div class="row">
												<div class="col-xl-12" style="padding-top: 15px">
													<label class="text-dark" style="margin-bottom: 10px;">¿Cómo te enteraste de nuestra oferta académica?</label>
												</div>
												<div class="col-xl-12" style="padding-top: 5px">
													<div class="form-group">
														<div class="form-check form-check-inline">
														  <input class="form-check-input" type="radio" name="comonosconocio" id="comonosconocio1" value="correo" <?php if($comonosconocio == 'correo'){echo "checked";} ?> disabled="disabled">
														  <label class="form-check-label" for="comonosconocio1" style="margin-top: 0">Correo electrónico</label>
														</div>
														<div class="form-check form-check-inline">
														  <input class="form-check-input" type="radio" name="comonosconocio" id="comonosconocio2" value="redes" <?php if($comonosconocio == 'redes'){echo "checked";} ?> disabled="disabled">
														  <label class="form-check-label" for="comonosconocio2" style="margin-top: 0">Redes sociales</label>
														</div>
														<div class="form-check form-check-inline">
														  <input class="form-check-input" type="radio" name="comonosconocio" id="comonosconocio3" value="sitioweb" <?php if($comonosconocio == 'sitioweb'){echo "checked";} ?> disabled="disabled">
														  <label class="form-check-label" for="comonosconocio3" style="margin-top: 0">Sitio web: Red Ecuatoriana de Pedagogía</label>
														</div>
														<div class="form-check form-check-inline">
														  <input class="form-check-input" type="radio" name="comonosconocio" id="comonosconocio4" value="referencia" <?php if($comonosconocio == 'referencia'){echo "checked";} ?> disabled="disabled">
														  <label class="form-check-label" for="comonosconocio4" style="margin-top: 0">Referencia personal</label>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--end: Wizard Step 6-->

										<!--begin: Wizard Step 7-->
										<div class="pb-5" data-wizard-type="step-content">
											<!--begin::Section-->
											<h4 class="mb-10 font-weight-bold text-dark">Completado</h4>
											<h6 class="font-weight-bolder mt-5 mb-3">¡Un último paso más!. Clic en el botón postular para terminar el proceso</h6>
											<div class="text-dark-50 line-height-lg">
												<div>Recuerda que un asesor se comunicará contigo para continuar con el proceso respectivo. Gracias por ser parte de la mejor universidad online de educación.</div>
											</div>
											<div class="separator separator-dashed my-5"></div>
											<!--end::Section-->
											
										</div>
										<!--end: Wizard Step 7-->

										<!--begin: Wizard Actions-->
										<div class="d-flex justify-content-between border-top mt-5 pt-10" style="padding-top: 25px">
											<div class="mr-2">
												<button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9" data-wizard-type="action-prev">Anterior</button>
											</div>
											<div>
												<!-- button type="button" id="enviar" class="btn btn-success font-weight-bolder text-uppercase px-9" data-wizard-type="action-submit">Postular</button -->
												<button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9" data-wizard-type="action-next">Siguiente</button>
											</div>
										</div>
										<!--end: Wizard Actions-->
									

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
          
          <img src="landings/assets/img/Imagotipo-REP-blanco.png" alt="" class="img-fluid" style="width:  20%">
          <p>La universidad online de educación</p>
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

	<!--begin::Page Scripts(used by this page)-->
	<script src="assets/js/pages/custom/wizard/wizard-2.js"></script>
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
	<script src="assets/js/formulario.js"></script>

	


</body>

</html>