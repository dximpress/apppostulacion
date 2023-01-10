<?php
include ('configuracion.php');
?>
<!-- ********************** HEADER - INICIO **************************** -->
<!DOCTYPE html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <!-- <base href="../../"> -->
    <meta charset="utf-8" />
    <title>Gestión Académica - REP</title>
    <meta name="description" content="Aside light theme example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/brand/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/aside/light.css" rel="stylesheet" type="text/css" />
    <!-- Toastr Notificaciones -->
    <link href="assets/css/custom.css?ver1.2" rel="stylesheet" type="text/css" />
    <!--Custom CSS -->

    <!-- Toastr -->
    <link href="assets/css/customs/toastr.min.css" rel="stylesheet" type="text/css" />

    <!-- Jquery Confirm -->
    <link href="assets/css/customs/jquery-confirm.css" rel="stylesheet" type="text/css" />

    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="assets/media/logos/logo-rep-32x32.png" />
    
    <script type="text/javascript">
      // Variables que permiten habilitar o deshabilitar opciones del sistema
      // 1 => Habilitado, 2 => deshabilitado
      var hab_f_asig = 1; // Habilitar el registro de actividades, incluso cuando el tiempo se haya agotado
      var disponible = 0;
    </script>

  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
  <div id="loading">
    <img id="loading-image" src="assets/media/spinners/1.gif" alt="Cargando..." />
  </div>
<!-- ********************** HEADER - FIN **************************** -->