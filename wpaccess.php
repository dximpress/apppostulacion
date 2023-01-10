<?php
include ('configuracion.php');
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}
if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=$_POST['contrasena'];
  $password2=md5($password);
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "panel.php";
  $MM_redirectLoginFailed = "wpaccess.php";
  $MM_redirecttoReferrer = false;

  $LoginRS = sprintf("SELECT usuario, pass FROM usuarios WHERE usuario='$loginUsername' AND pass='$password2' AND cod_grupo IN ('10001', '10002', '10003', '10005', '10006', '10007', '10008', '10009', '10010')", //AND id_estado IN (1,8) 
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password2 : addslashes($password2));
  $consulta_LoginRS = $conexionmysqli->query($LoginRS);
  $consulta_LoginRS->data_seek(0);
  #Compruebo que al menos exista una direccion en la BD
  $loginFoundUser = mysqli_num_rows($consulta_LoginRS);

  if ($loginFoundUser) {
     $loginStrGroup = "";
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;
   if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
		<!-- <base href="../../../../"> -->
		<meta charset="utf-8" />
		<title><?php echo "$_nombreApp - $_siglasApp" ?></title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="assets/css/pages/login/classic/login-4.css" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />

		<link href="assets/css/custom.css" rel="stylesheet" type="text/css" />

		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="assets/media/logos/logo-rep-32x32.png" />
		<style type="text/css">
			.login.login-4 .login-form {
			    width: 100%;
			    max-width: 650px;
			}
		</style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">

			<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/fondo_login.jpg');">
					<div class="login-form text-center p-7 position-relative overflow-hidden">
						<div class="row">
							<div class="col-lg-6 offset-md-3">
								<!--begin::Login Header-->
								<div class=" flex-center text-center mb-15">
									<img src="assets/media/logos/logo-redp-II.png" class="" alt=""  style="width: 100%" />
									<br>
									<h4>Sistema de postulaciones <br> Administración</h4>
								</div>
								<!--end::Login Header-->
							
								
								<!--begin::Login Sign in form-->
								<div class="login-signin">
									<form role="form" id="login" name="form_ingreso" method="post" action="<?php echo $loginFormAction; ?>">
										<div class="form-group mb-5">
											<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Usuario" name="usuario" id="login_username" autocomplete="off" />
										</div>
										<div class="form-group mb-5">
											<input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Contraseña" name="contrasena" id="login_password" />
										</div>
										<div class="form-group text-center">
										</div>
										<button type="submit" class="btn btn-primary btn-sm font-weight-bold">INGRESAR</button>
									</form>
								</div>
								<!--end::Login Sign in form-->
							</div>
						</div>

					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>


		<!--end::Main-->
		<!-- <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script> -->
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)--
	</body>
	<!--end::Body-->
</html>