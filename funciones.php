<?php 
$jsondata = array();
//Listado de personal Academico segun el grupo
function personal_academico($id_grupo){
	global $conexionmysqli;
	$SQLperesores = "
		SELECT 
			per.id_per AS id_per,
		    UPPER( CONCAT(per.pnombre, ' ', IF(per.snombre = '-', '', per.snombre), ' ', per.papellido, ' ', per.sapellido) ) AS nper,
		    gru.n_grupo AS rol
		FROM personal_academico AS per 
		INNER JOIN grupo AS gru ON gru.id_grupo = per.id_grupo
		WHERE per.id_grupo = '$id_grupo' AND per.activo = 1
	";
    $SQLconsultaperesores = $conexionmysqli->query($SQLperesores);
	$SQLconsultaperesores->data_seek(0);
	while($row = $SQLconsultaperesores->fetch_array(MYSQLI_ASSOC)) {
	    $jsondata[] = $row;
	}
	// $registros = $SQLconsultaperesores->fetch_assoc();
	$SQLconsultaperesores->close();
	//header('Content-type: application/json; charset=utf-8');
	echo "'" . json_encode($jsondata) . "'";

	//echo $registros;
}

?>