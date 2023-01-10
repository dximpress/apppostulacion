<?php
//error_reporting(0); //Control de Erres, habilitar para mostrar errores de codigo php
$_siglasApp = 'REP';
$_nombreApp = 'Postulaciones';
$_NombreEmpresa = 'Red Ecuatoriana de Pedagogía';
$_logo = 'logo-redp.png';
$_NombreEmpresa1 = 'DXIMPRESS';
$_Desarr1 = 'Ms.C. Dixander Carballo Buque';
$_emailDesarr1 = 'dixancarballo@gmail.com';
$_bdHost = 'localhost';
$_bdName = 'app_postulaciones'; //gestionacademica_rep
$_bdUser = 'root';
$_bdPass = '';
$_copy = 'Copyright &copy; 2022. Todos los derechos reservados';
$_ftp = '';
$_numeroaleatorio = rand(0000,9999);
$_numeroaleatoriodos = rand(0000,9999);
// $_urlApp = 'https://sistemas.unirep.edu.ec/app-postulaciones/confirmar-registro.php';
$_urlApp = 'http://localhost/app-postulaciones';

/*Generar Id Unico*/
function uniqidReal($lenght = 13) {
    if (function_exists("random_bytes")) {
        $bytes = random_bytes(ceil($lenght / 2));
    } elseif (function_exists("openssl_random_pseudo_bytes")) {
        $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
    } else {
        throw new Exception("No hay una función aleatoria criptográficamente segura disponible");
    }
    return substr(bin2hex($bytes), 0, $lenght);
}

/*Configuracion del correo*/
define("SMTP_CONF_HOST", "mail.redecuatorianadepedagogia.com");
define("SMTP_CONF_SMTP_PORT", 465);
define("SMTP_CONF_SMTP_SECURE", 'ssl');
define("SMTP_CONF_USERNAME", "asociaciones@redecuatorianadepedagogia.com");
define("SMTP_CONF_PASSWORD", "Pedagogiaenred2018");
define("SMTP_CONF_FROM", "asociaciones@redecuatorianadepedagogia.com");
define("SMTP_CONF_FROM_NAME", "Nuevo registro");
define("SMTP_CONF_REPLY_TO", "asociaciones@redecuatorianadepedagogia.com");
define("SMTP_CONF_CONTENT_TYPE", "text/html");
define("SMTP_CONF_SMTP_AUTH", true);

/* CODIGOS GENERALES */
$_perfil_superadmin = "10001";
$_perfil_administradores = "10002";
$_perfil_secretaria = "10003";
$_perfil_estudiantes = "10004";

/* PLANES
	1 - Básico
	2 - Avanzado
	3 - Profesional
	4 - Grupo
	5 - Institución
*/

/* Conexion a la base de datos con myqli */
$conexionmysqli = new mysqli($_bdHost, $_bdUser, $_bdPass, $_bdName);
if ($conexionmysqli->connect_errno) {
  echo "Falló la conexión a MySQL: (" . $conexionmysqli->connect_errno . ") " . $conexionmysqli->connect_error;
}
mysqli_set_charset($conexionmysqli,"utf8");
$conexionmysqli->query("SET lc_time_names = 'es_ES'");

setlocale(LC_ALL,"es_ES");
ini_set("date.timezone", "America/Guayaquil");

/*Meses en español*/
$meses = array(
    'January' => 'enero',
    'February' => 'febrero',
    'March' => 'marzo',
    'April' => 'abril',
    'May' => 'mayo',
    'June' => 'junio',
    'July' => 'julio',
    'August' => 'agosto',
    'September' => 'septiembre',
    'October' => 'octubre',
    'November' => 'noviembre',
    'December' => 'diciembre'
);

$fechaCompleta = date("Y-m-d H:i:s");
$fechaHoy 	   = date("Y-m-d");
$fechaHoy2 	   = date("d / m / Y");
$horaActual    = date("H:i:s");
$diaHoy 	   = date("d");
$mesHoy 	   = date("m");
$mesHoy_letra  = $meses[date("F")];
$annoHoy 	   = date("Y");

$dia_semana        = date("w",strtotime($fechaHoy)); //Sábado es 0
$primer_dia_semana = date("Y-m-d",strtotime($fechaHoy)-60*60*24*($dia_semana)+60*60*24*1);
$ultimo_dia_semana = date("Y-m-d",strtotime($primer_dia_semana)+60*60*24*5);
$primer_dia_semana = substr($primer_dia_semana, 8);
$ultimo_dia_semana = substr($ultimo_dia_semana, 8);

?>
