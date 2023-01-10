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
		p.id_usuario AS id,
		f.id_postulacion AS idpostulacion,
		CONCAT(p.nombres, ' ', p.apellidos) AS nombre,
		p.correo AS correo,
		p.tcelular AS tcelular,
		p.provincia AS provincia,
		p.ciudad AS ciudad,
		f.fincalificacion AS estadofinanciamiento,
	    IF(f.fincalificacion IS NULL, 'Por revisar', e.valor) AS estado,
	    IF(f.fincalificacion IS NULL, 'Por revisar', e.valor) AS estado,
	    IF(f.fincedula IS NULL, '---', f.fincedula) AS fincedula,
		IF(f.finroldepago IS NULL, '---', f.finroldepago) AS finroldepago,
		IF(f.finplanillaserbasico IS NULL, '---', f.finplanillaserbasico) AS finplanillaserbasico,
		IF(f.finmatriculacarro IS NULL, '---', f.finmatriculacarro) AS finmatriculacarro,
		IF(f.finprediocasa IS NULL, '---', f.finprediocasa) AS finprediocasa,
		IF(f.finautorburocredito IS NULL, '---', f.finautorburocredito) AS finautorburocredito,
		IF(f.fincartaceptacion IS NULL, '---', f.fincartaceptacion) AS fincartaceptacion
	FROM prospectos AS p
	LEFT JOIN postulaciones AS f ON p.id_usuario = f.id_usuario
	LEFT JOIN estado AS e ON f.fincalificacion = e.id
	CROSS JOIN (SELECT @cnt:=0) AS dummy
	WHERE aprobadofinrep = 15
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