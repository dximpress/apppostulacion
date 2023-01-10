<?php
#Inicio de documento
include ('configuracion.php');

/*******************
*********** JSON DE MATRIULAS REGISTRADAS
*******************/
$jsondata = array();

//$id_estado 	  = trim(isset($_GET["id_estado"]) ? $_GET["id_estado"] : '1');
$id_programa = trim(isset($_GET["id_programa"]) ? $_GET["id_programa"] : '');
$where 		 = "";

if ($id_programa) {
	$where .= " AND p.id_programa = $id_programa ";
}else{
	$where .= "";
}

/*
<th>No</th>
<th>Fecha</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Provincia</th>
<th>Ciudad</th>
<th>Correo</th>
<th>Teléfono</th>
<th>Horario de Contacto</th>
<th>Contactar por Whatsapp</th>
<th>Inquietud</th>
<th>Mensaje</th>
<th>Llamada</th>
<th>Origen</th>
<th>Estado</th>
<th>Responsable</th>
<th>Observaciones</th>
*/

$SQLProspectos = " 
	SELECT
		DATE_FORMAT(fecha, '%a') as dia,
		COUNT(*) AS cant 
	FROM prospectos
	WHERE p.id_programa = '$id_programa'
	GROUP BY DATE_FORMAT(fecha, '%a')
	ORDER BY DATE_FORMAT(fecha, '%w')	
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