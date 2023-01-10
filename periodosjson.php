<?php
#Inicio de documento
include ('configuracion.php');

/*******************
*********** JSON DE MATRIULAS REGISTRADAS
*******************/
$jsondata = array();

/*
$id_pais 	  = trim(isset($_GET["id_pais"]) ? $_GET["id_pais"] : '');
$id_provincia = trim(isset($_GET["id_provincia"]) ? $_GET["id_provincia"] : '');
$id_ciudad 	  = trim(isset($_GET["id_ciudad"]) ? $_GET["id_ciudad"] : '');
$id_genero 	  = trim(isset($_GET["id_genero"]) ? $_GET["id_genero"] : '');
$id_tipodoc   = trim(isset($_GET["id_tipodoc"]) ? $_GET["id_tipodoc"] : '');
$fechainicio  = trim(isset($_GET["fechainicio"]) ? $_GET["fechainicio"] : '');
$fechafin 	  = trim(isset($_GET["fechafin"]) ? $_GET["fechafin"] : '');
$id_estado 	  = trim(isset($_GET["id_estado"]) ? $_GET["id_estado"] : '3');
$where 		  = "";

if ($id_pais) {#Filtro Pais
	$where = " AND matric.id_pais = '$id_pais' ";
}
if ($id_provincia) {#Filtro Provincia
	$where .= " AND matric.id_provincia = '$id_provincia' ";
}
if ($id_ciudad) {#Filtro Ciudad
	$where .= " AND matric.id_ciudad = '$id_ciudad' ";
}
if ($id_genero) {#Filtro Genero
	$where .= " AND matric.id_genero = '$id_genero' ";
}
if ($id_tipodoc) {#Filtro Tipo documento
	$where .= " AND matric.id_tipodoc = '$id_tipodoc' ";
}
if ($fechainicio && $fechafin) {#Filtro rango de fechas
	$where = " AND matric.fmatricula BETWEEN '$fechainicio' AND '$fechafin' ";
}else if ($fechainicio) {#Filtro fechainicio
	$where .= " AND matric.fmatricula >= '$fechainicio' ";
}else if ($fechafin) {#Filtro fechafin
	$fechafin .= " AND matric.fmatricula <= '$fechainicio' ";
}
if ($id_estado) {
	$where .= " AND usua.id_estado = $id_estado ";
}
*/

$SQLProgramas = " 
	SELECT 
		p.id AS id_periodo,
		p.nombre AS periodo,
		p.institucion AS institucion,
		p.url AS url,
		p.estado AS estado,
		IF(p.activo = '1', 'Si', 'No') AS activo
	FROM 
		programas AS p
	";
$SQLconsultaProgramas = $conexionmysqli->query($SQLProgramas);
$SQLconsultaProgramas->data_seek(0);
while($row = $SQLconsultaProgramas->fetch_array(MYSQLI_ASSOC)) {
    $jsondata["data"][] = $row;
}
$SQLconsultaProgramas->close();
header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata, JSON_PRETTY_PRINT);
// echo json_encode(mb_convert_encoding($jsondata, "HTML-ENTITIES", "ISO-8859-1"));
?>