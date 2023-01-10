<?php
#Inicio de documento
include ('configuracion.php');
$tipo = isset($_GET["tipo"]) ? $_GET["tipo"] : "";
$where = "";
$inner = "";



/*******************
*********** JSON DE MATRIULAS REGISTRADAS
*******************/
$jsondata = array();


$SQLUsuarios = " 
	SELECT 
		usua.id_usuario AS id, 
		UPPER(usua.usua_nombre) AS nombre, 
		usua.usuario AS usuario, 
		IF(usua.id_estado = 1, 'Activo', 'Inactivo') AS estado, 
		grup.n_grupo AS grupo 
	FROM usuarios AS usua 
	INNER JOIN grupo AS grup ON usua.cod_grupo = grup.cod_grupo 
	WHERE usua.cod_grupo IN ('10002', '10003', '10005', '10006', '10007', '10008', '10009')
	GROUP BY usua.id_usuario
";
$SQLconsultaUsuarios = $conexionmysqli->query($SQLUsuarios);
$SQLconsultaUsuarios->data_seek(0);
while($row = $SQLconsultaUsuarios->fetch_array(MYSQLI_ASSOC)) {
    $jsondata["data"][] = $row;
}
$SQLconsultaUsuarios->close();
header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata, JSON_PRETTY_PRINT);
// echo json_encode(mb_convert_encoding($jsondata, "HTML-ENTITIES", "ISO-8859-1"));
?>
