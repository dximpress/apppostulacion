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

		$cedula = isset($_GET["i"]) ? $_GET["i"] : '';
		//	$id_programa = base64_decode($id_programa);

		//Actualizo el estado del usuario a 1, activo		
		$queryUpdateU = " UPDATE usuarios SET id_estado = '1' WHERE usuario = '$cedula' ";
		$result = mysqli_query($conexionmysqli, $queryUpdateU);

    //Actualizo el estado del usuario a 8, nuevo en la tabla prospectos   
    $queryUpdateP = " UPDATE prospectos SET id_estado = '8' WHERE cedula = '$cedula' ";
    $result = mysqli_query($conexionmysqli, $queryUpdateP);



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
              <img src="assets/media/logos/logo-unirep.png" alt="Image" class="logo-unirep" data-aos="fade-right">
              <h1 data-aos="fade-right" style="color: #0A57A3;">¡Felicidades!</h1>
              <h4>Tu registro se ha confirmado con éxito.</h4>
              <h4>Para continuar con el proceso de postulación <br><br> <a href="index.php" class="btn btn-primary">Clic aquí <i class="fa fa-link"></i></a> <br><br> Te recordamos que tu usuario es tu número de cédula.</h4>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->


  <!-- ======= Footer ======= 
  <footer class="footer" role="contentinfo">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-4 mb-md-0 text-center">
          <img src="landings/assets/img/Imagotipo-REP-blanco.png" alt="" class="img-fluid" style="width:  20%">
          <p style="color: #000;">La universidad online de educación</p>
          <p style="color: #000;">© REP - Red Ecuatoriana de Pedagogía 2022</p>
        </div>

      </div>


    </div>
  </footer>-->

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
</body>

</html>