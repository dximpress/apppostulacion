<?php 
	//Ruta del archivo
	$filename = dirname(__FILE__).'/data.txt';

	//Se almacena un nuevo mensaje en el archivo
	$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
	if ($msg != '') 
	{
		file_put_contents($filename, $msg);
		die();
	}

	//Bucle infinito hasta que el archivo de datos no se modifica
	$lastmodif = isset($_GET['timestamp']) ? $_GET['timestamp'] : 0;
	$currentmodif = filemtime($filename);

	while ($currentmodif <= $lastmodif) {
		usleep(10000); //Dormir 10 ms para descargar la CPU
		clearstatcache();
		//Si la fecha
		$currentmodif = filemtime($filename);
	}

	$response = array();
	$response['msg'] = file_get_contents($filename);
	$response['timestamp'] = $currentmodif;
	echo json_encode($response);
	flush(); //Vaciar el bufer de salida del sistema

?>