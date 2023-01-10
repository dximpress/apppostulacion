<?php
#Inicio de documento
include ('configuracion.php');

/*******************
*********** JSON DE MATRIULAS REGISTRADAS
*******************/
$jsondata = array();

$filtro 	 = trim(isset($_GET["filtro"]) ? $_GET["filtro"] : '1');
$id_programa = trim(isset($_GET["id_programa"]) ? $_GET["id_programa"] : '');
$where 		 = "";

if ($filtro) {
	switch ($filtro) {
	    case "hoy": // Registros hoy
	        $filtro = " AND DATE(u.f_registro) = DATE(NOW()) ";
	        break;
	    case "todos": // Todos los registros
	        $filtro = "";
	        break;
	    case 1: //Postulaciones
	        $filtro = " AND post.completado = '1' ";
	        break;
	    case 3: //Pendientes
	        $filtro = " AND post.completado = '3' ";
	        break;
	    case 6: //No postularan
	        $filtro = " AND post.completado = '6' ";
	        break;
	    case 8: //Por confirmar
	        $filtro = " AND post.completado IS NULL ";
	        break;
	    case 10: //Incompletos
	        $filtro = " AND post.completado = '10' ";
	        break;
	    case 12: //Entrevistas
	        $filtro = " AND post.completado = '12' ";
	        break;
	    case 13: //Reserva de plaza
	        $filtro = " AND post.completado = '13' ";
	        break;
	    default:
        	$filtro = "";
	}
}

if ($id_programa) {
	$where = " AND post.id_programa = '$id_programa' $filtro ORDER BY post.id_postulacion DESC";
}else{
	$where = " $filtro ORDER BY post.id_postulacion DESC ";
}

$SQLProspectos = " 
	SELECT
		(@cnt := @cnt + 1) AS no,
		post.id_postulacion AS id,
		p.id_usuario AS id_usuario,
		post.id_programa AS id_programa,
		IF(post.id_programa IS NULL, 'No ha realizado postulación', CONCAT(prog.nombre, ' - ', prog.institucion)) AS programa,
		UPPER( IF(p.nombres = '', '...', p.nombres) ) AS nombres,
		UPPER( IF(p.apellidos = '', '...', p.apellidos) ) AS apellidos,
		IF(p.cedula = '', '...', p.cedula) AS cedula,
		DATE_FORMAT(p.fnacimiento, '%d - %m - %Y') AS fnacimiento,
		IF(p.correo = '', '...', p.correo) AS correo,
		IF(p.tconvencional = '', '...', p.tconvencional) AS tconvencional,
		IF(p.tcelular = '', '...', p.tcelular) AS tcelular,
		IF(e.valor IS NULL, 'Nuevo', e.valor) AS estadou,
		u.id_estado AS id_estadou,
		e.id AS estado_postulacion,
		UPPER( IF(p.provincia = '', '...', p.provincia) ) AS provincia,
		UPPER( IF(p.ciudad = '', '...', p.ciudad) ) AS ciudad,
		IF(p.direccion = '', '...', p.direccion) AS direccion,
		IF(post.fecha_postulacion IS NULL, DATE_FORMAT(p.fecha_reg, '%d - %m - %Y %H:%i:%s'), DATE_FORMAT(post.fecha_postulacion, '%d - %m - %Y %H:%i:%s')) AS fecha_reg,
		IF(post.fecha_postulacion IS NULL, unix_timestamp(p.fecha_reg), unix_timestamp(post.fecha_postulacion)) AS orden,
		post.modificado_por AS modificado_por,
		post.fecha_ult_modificacion AS fecha_ult_modificacion,
		prog.url AS url
	FROM
	    prospectos AS p
	LEFT JOIN usuarios AS u ON u.id_usuario = p.id_usuario
	LEFT JOIN postulaciones AS post ON post.id_usuario = p.id_usuario
	LEFT JOIN estado AS e ON e.id = post.completado
	LEFT JOIN programas AS prog ON prog.id = post.id_programa
	CROSS JOIN 
		(SELECT @cnt := 0) AS dummy
	WHERE p.id_usuario IS NOT NULL $where
";
$SQLconsultaProspectos = $conexionmysqli->query($SQLProspectos);
$SQLconsultaProspectos->data_seek(0);
$cant = mysqli_num_rows($SQLconsultaProspectos);
if ($cant > 0) {
	while($row = $SQLconsultaProspectos->fetch_array(MYSQLI_ASSOC)) {
	    $jsondata["data"][] = $row;
	}
}else{
	$jsondata["data"]["id_matricula"] = "9999999999999999";
}

$SQLconsultaProspectos->close();
header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata, JSON_PRETTY_PRINT);
// echo json_encode(mb_convert_encoding($jsondata, "HTML-ENTITIES", "ISO-8859-1"));
?>