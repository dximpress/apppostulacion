<?php
include ('configuracion.php');

// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

if(!isset($_SESSION['first_run'])){
  $_SESSION['first_run'] = 1;
  $acceso = "Acceso correcto";
}else{
  $acceso = "Ya accedio";
}

// Inicio el documento
$time = round(microtime(), 2);
// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  
  $_SESSION['first_run'] = NULL;
  unset($_SESSION['first_run']);

  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);

  session_unset();
  
  $logoutGoTo = "panel.php";
  if ($logoutGoTo) {

    header("Location: $logoutGoTo");
    exit;
  }
}

$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";
// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) {
  // For security, start by assuming the visitor is NOT authorized.
  $isValid = False;

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username.
  // Therefore, we know that a user is NOT logged in if that Session variable is blank.
  if (!empty($UserName)) {
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login.
    // Parse the strings into arrays.
    $arrUsers = Explode(",", $strUsers);
    $arrGroups = Explode(",", $strGroups);
    if (in_array($UserName, $arrUsers)) {
      $isValid = true;
    }
    // Or, you may restrict access to only certain users based on their username.
    if (in_array($UserGroup, $arrGroups)) {
      $isValid = true;
    }
    if (($strUsers == "") && true) {
      $isValid = true;
    }
  }
  return $isValid;
}
$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0)
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo);
  exit;
}
$colname_consulta_usuario = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_consulta_usuario = (get_magic_quotes_gpc()) ? $_SESSION['MM_Username'] : addslashes($_SESSION['MM_Username']);
}

  $SQLconsultaUsuario = sprintf("
  SELECT 
    usua.id_usuario AS id_usuario, 
    UPPER(usua.usua_nombre) AS usua_nombre, 
    usua.cod_grupo AS cod_grupo,
    grup.id_grupo AS id_grupo,
    usua.id_estado AS id_estado,
    grup.n_grupo AS ngrupo,
    usua.usuario AS usuario
  FROM usuarios AS usua 
  LEFT JOIN grupo AS grup ON usua.cod_grupo = grup.cod_grupo
  WHERE usua.usuario = '%s'", $colname_consulta_usuario);
  $SQLconsultaUsuario = $conexionmysqli->query($SQLconsultaUsuario);
  $SQLconsultaUsuario->data_seek(0);
  $row_consulta_usuario = $SQLconsultaUsuario->fetch_assoc();
  $SQLconsultaUsuario->close(); // Liberar memoria usada por consulta.
  
  $id_usuario     = "".$row_consulta_usuario['id_usuario']."";
  $cod_grupo      = "".$row_consulta_usuario['cod_grupo']."";
  $id_grupo       = "".$row_consulta_usuario['id_grupo']."";
  $usua_nombre    = "".$row_consulta_usuario['usua_nombre']."";
  $usua_id_estado = "".$row_consulta_usuario['id_estado']."";
  $usua_ngrupo    = "".$row_consulta_usuario['ngrupo']."";
  $usuario        =  $_SESSION['MM_Username'];
  #FIN - Login de accesso

/********VARIABLES*******/
// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
date_default_timezone_set('America/Guayaquil');
$hora = date("H:i:s");
$fecha = date("Y-m-d");
$fechaCompleta = date("Y-m-d H:i:s");

// Variables que estan la BD y permiten habilitar o deshabilitar opciones del sistema

/*
$jsonpropiedades = array();
$SQLconsultaConfig = " SELECT * FROM config ";
$SQLconsultaConfig = $conexionmysqli->query($SQLconsultaConfig);
$SQLconsultaConfig->data_seek(0);
while ($row_consulta_Config = $SQLconsultaConfig->fetch_assoc()) {
  $jsonpropiedades["data"][] = $row_consulta_Config;
}
$SQLconsultaConfig->close();

foreach ($jsonpropiedades as $key => $value){  
  echo "key[$key] => $value";
} 
*/

?>
<!-- ********************** HEADER - INICIO **************************** -->
<!DOCTYPE html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <!-- <base href="../../"> -->
    <meta charset="utf-8" />
    <title>Gestión de Prospectos - REP</title>
    <meta name="description" content="Aside light theme example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css?ver=1.1" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/brand/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/aside/light.css" rel="stylesheet" type="text/css" />
    <!-- Toastr Notificaciones -->
    <link href="assets/css/custom.css?ver1.8" rel="stylesheet" type="text/css" />
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

    <?php if($cod_grupo == "10004"){ ?>
      <style type="text/css">
        .aside, #kt_aside_mobile_toggle, #kt_header_mobile_topbar_toggle, #logo-movil{
          display: none !important;
        }
        .wrapper{
          padding-left: 0px !important;
        }
        .header.header-fixed{
          left: 0px !important;
        }
        #kt_content {
          padding-top: 10px;
        }
      </style>
    <?php } ?>

  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
  <div id="loading">
    <img id="loading-image" src="assets/media/spinners/1.gif" alt="Cargando..." />
  </div>
<!-- ********************** HEADER - FIN **************************** -->