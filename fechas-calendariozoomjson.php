
<?php
	#Inicio de documento
	include ('configuracion.php');

	/*******************
	*********** JSON DE FECHAS DE CALENDARIO DEL ZOOM
	*******************/
	$jsondata = array();

//	$id_curso = mysqli_real_escape_string($conexionmysqli, trim( isset($_GET["id_curso"]) ? $_GET["id_curso"] : 1));

	//> Fechas
	$SQLCalendario = " 	
		SELECT 
			c.id AS id,
			# c.title AS title,
			UPPER(CONCAT(p.nombres, ' ',p.apellidos)) AS title,
			# from_unixtime(c.start,'%Y-%m-%d') AS start,
			c.inicio AS start,
		    c.fin AS end,
		    c.description AS description
		FROM calendario_zoom AS c
		INNER JOIN prospectos AS p ON c.title = p.id
		
	";

	//WHERE t.course IN ($idsm)

	$SQLconsultaCalendario = $conexionmysqli->query($SQLCalendario);
	$SQLconsultaCalendario->data_seek(0);
	while($row = $SQLconsultaCalendario->fetch_array(MYSQLI_ASSOC)) {
	    $jsondata[] = $row;
	}
	$SQLconsultaCalendario->close();

	header('Content-type: application/json; charset=utf-8');
	echo json_encode($jsondata, JSON_PRETTY_PRINT);
?>