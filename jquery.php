<?php
#Inicio de documento
include ('configuracion.php');

/**********************************************************************
************ CONFIGURACION DEL CORREO CON PHPMAILER *******************
**********************************************************************/
// PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Correo de quien envia
$sender = 'asociaciones@unirep.edu.ec';
$senderName = 'UNIREP';
// Nombre de usuario
$usernameSmtp = 'asociaciones@unirep.edu.ec';
// Contraseña del usuario
$passwordSmtp = 'Pedagogiaenred2018';
//Host SMTP
$host = 'mail.unirep.edu.ec';
//Puerto
$port = 465;
// Set de configuración para la cabecera del correo
// $configurationSet = 'ConfigSet';

//General para TODOS los formularios
$recibePOST = mysqli_real_escape_string($conexionmysqli, isset($_POST["recibePOST"]) ? $_POST["recibePOST"] : "");
$recibeGET 	= mysqli_real_escape_string($conexionmysqli, isset($_GET["recibeGET"]) ? $_GET["recibeGET"] : "");
$jsondata = array();

/*******************
*********** USUARIOS
*******************/
//>Consultar nombre de usuario
if ($recibePOST=="consultarNombreusuario") {
	$usuario  = mysqli_real_escape_string($conexionmysqli, isset($_POST["usuario"]) ? $_POST["usuario"] : '');
	
	$SQLUsuario = "SELECT usuario FROM usuarios WHERE usuario = '$usuario'";
    $SQLconsultaUsuario = $conexionmysqli->query($SQLUsuario);
    $SQLconsultaUsuario->data_seek(0);
    $registro_Usuario = $SQLconsultaUsuario->fetch_assoc();
    $jsondata["data"]["usuario"] = $registro_Usuario['usuario'];
    $SQLconsultaUsuario->close();
	header('Content-type: application/json; charset=utf-8');
  	echo json_encode($jsondata, JSON_FORCE_OBJECT);
}
//>Consultar usuario
if ($recibePOST=="verUsuario") {
	$id_usuario  = mysqli_real_escape_string($conexionmysqli, isset($_POST["id_usuario"]) ? $_POST["id_usuario"] : '');
	
	$SQLUsuario = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'";
    $SQLconsultaUsuario = $conexionmysqli->query($SQLUsuario);
    $SQLconsultaUsuario->data_seek(0);
    while ($registro_Usuario = $SQLconsultaUsuario->fetch_assoc()) {
    	$jsondata["data"]["id_usuario"] = $registro_Usuario['id_usuario'];
    	$jsondata["data"]["nombre_e"] = $registro_Usuario['usua_nombre'];
    	$jsondata["data"]["usuario_e"] = $registro_Usuario['usuario'];
    	$jsondata["data"]["cod_grupo_e"] = $registro_Usuario['cod_grupo'];
    	$jsondata["data"]["habilitado_e"] = $registro_Usuario['id_estado'];
    }
    $SQLconsultaUsuario->close();
	header('Content-type: application/json; charset=utf-8');
  	echo json_encode($jsondata, JSON_FORCE_OBJECT);
}

//>Resgistro nuevo usuario
if ($recibePOST=="nuevoUsuario") {
	$nombre     = mysqli_real_escape_string($conexionmysqli, isset($_POST["nombre"]) ? $_POST["nombre"] : '');
	$apellidos  = mysqli_real_escape_string($conexionmysqli, isset($_POST["apellidos"]) ? $_POST["apellidos"] : '');
	$usua_nombre = $nombre." ".$apellidos;
	$usuario  	= mysqli_real_escape_string($conexionmysqli, isset($_POST["usuario"]) ? $_POST["usuario"] : '');
	$cod_grupo  = mysqli_real_escape_string($conexionmysqli, isset($_POST["cod_grupo"]) ? $_POST["cod_grupo"] : '');
	// $habilitado = isset($_POST["habilitado"]) ? $_POST["habilitado"] : '';
	$contra 	 = "a"; // isset($_POST["contrasenna"]) ? $_POST["contrasenna"] : ''
	$contrasenna = md5($contra);

	#Inserto los registros en la BD
	mysqli_query( $conexionmysqli, "INSERT INTO usuarios(usua_nombre, usuario, cod_grupo, id_estado, pass, f_registro)VALUES ('$usua_nombre', '$usuario', '$cod_grupo', '1', '$contrasenna', '$fechaCompleta')" );

}

//>Actualizar usuario
if ($recibePOST=="actualizarUsuario") {
	$id_usuario  = mysqli_real_escape_string($conexionmysqli, isset($_POST["id_usuario"]) ? $_POST["id_usuario"] : '');
	$nombre      = mysqli_real_escape_string($conexionmysqli, isset($_POST["nombre_e"]) ? $_POST["nombre_e"] : '');
	$usuario  	 = mysqli_real_escape_string($conexionmysqli, isset($_POST["usuario_e"]) ? $_POST["usuario_e"] : '');
	$cod_grupo   = mysqli_real_escape_string($conexionmysqli, isset($_POST["cod_grupo_e"]) ? $_POST["cod_grupo_e"] : '');
	$habilitado  = mysqli_real_escape_string($conexionmysqli, isset($_POST["habilitado_e"]) ? $_POST["habilitado_e"] : '');
	$contra 	 = mysqli_real_escape_string($conexionmysqli, isset($_POST["contrasenna_e"]) ? $_POST["contrasenna_e"] : '');
	$contrasenna = md5($contra);
	if ($contra == '' || $contra == null || $contra == "...") {
			//Viene sin contraseña
			mysqli_query($conexionmysqli, "UPDATE usuarios SET
										usua_nombre = '$nombre',
										usuario     = '$usuario',
										cod_grupo   = '$cod_grupo',
										id_estado  = '$habilitado'
									   WHERE id_usuario = '$id_usuario'"
									);
		}else{
			// Viene con contraseña
			$contrasenna = md5($contra);
			mysqli_query($conexionmysqli, "UPDATE usuarios SET
										usua_nombre = '$nombre',
										usuario     = '$usuario',
										cod_grupo   = '$cod_grupo',
										id_estado  = '$habilitado',
										pass        = '$contrasenna'
									   WHERE id_usuario = '$id_usuario'"
									);
	}
}

//>Eliminar usuario
if ($recibePOST=="eliminarUsuario") {
	$id_usuario = mysqli_real_escape_string($conexionmysqli, isset($_POST["id_usuario"]) ? $_POST["id_usuario"] : '');
	mysqli_query($conexionmysqli, "DELETE FROM usuarios WHERE id_usuario='$id_usuario'");
}

//>Eliminar usuario
if ($recibePOST=="anularUsuario") {
	//echo "Llego a anularUsuario";
	$id_usuario = mysqli_real_escape_string($conexionmysqli, isset($_POST["id_usuario"]) ? $_POST["id_usuario"] : '');
	mysqli_query($conexionmysqli, "UPDATE usuarios SET id_estado = '2' WHERE id_usuario = '$id_usuario'");
}

//>Cambiar contraseña
if ($recibePOST=="cambiarContrasenna") {
	$id_usuario  = mysqli_real_escape_string($conexionmysqli, isset($_POST["id_usuario"]) ? $_POST["id_usuario"] : '');
	$contra 	 = mysqli_real_escape_string($conexionmysqli, isset($_POST["contra"]) ? $_POST["contra"] : '');
	$contrasenna = md5($contra);

	mysqli_query($conexionmysqli, "UPDATE usuarios SET pass = '$contrasenna' WHERE id_usuario = '$id_usuario'");
}

//>Recuperar contraseña
if ($recibePOST=="recuperarContrasenna") {
	
	$usuario  = mysqli_real_escape_string($conexionmysqli, isset($_POST["correo"]) ? $_POST["correo"] : '');
	// Verifico que el correo este en la Base de Datos
	// Caso contrario envio un mensaje que no existe
	$SQLconsultaCorreo = " SELECT * FROM usuarios WHERE usuario = '$usuario' ";
	$SQLconsultaCorreo = $conexionmysqli->query($SQLconsultaCorreo);
	$SQLconsultaCorreo->data_seek(0);
	$existeCorreo = mysqli_num_rows($SQLconsultaCorreo);
	
	if ($existeCorreo) {
		$registro_Correo = $SQLconsultaCorreo->fetch_assoc();

		$jsondata["data"]["tipo"] = "info";
		$jsondata["data"]["mensaje"] = "Revise su correo y siga las instucciones enviadas.";
	}else{
		$jsondata["data"]["tipo"] = "error";
		$jsondata["data"]["mensaje"] = "Este correo no existe en nuestra base de datos.";
	}
	$SQLconsultaCorreo->close();

	header('Content-type: application/json; charset=utf-8');
  	echo json_encode($jsondata, JSON_FORCE_OBJECT);
}

//>Cambiar contraseña desde Recuperar Contraseña
if ($recibePOST=="cambiarContrasennados") {
	$id_usuario  = base64_decode(isset($_POST["id"]) ? $_POST["id"] : '');
	$usuario  	 = base64_decode(isset($_POST["e"]) ? $_POST["e"] : '');
	$contra 	 = mysqli_real_escape_string($conexionmysqli, isset($_POST["contrasena"]) ? $_POST["contrasena"] : '');
	$contrasenna = md5($contra);

	mysqli_query($conexionmysqli, "UPDATE usuarios SET pass = '$contrasenna' WHERE id_usuario = '$id_usuario' AND usuario = '$usuario' ");
}

//>Consultar cedula al Registrar
if ($recibePOST=="consultarCedula") {
	$cedula = mysqli_real_escape_string($conexionmysqli, isset($_POST["cedula"]) ? $_POST["cedula"] : '');
	
	$SQLCedula = "SELECT usuario FROM usuarios WHERE usuario = '$cedula'"; //AND cod_grupo = '10005' 
    $SQLconsultaCedula = $conexionmysqli->query($SQLCedula);
    $SQLconsultaCedula->data_seek(0);
    while ($registro_Cedula = $SQLconsultaCedula->fetch_assoc()) {
   		$jsondata["data"]["cedula"] = $registro_Cedula['usuario'];
    }
    $SQLconsultaCedula->close();
	header('Content-type: application/json; charset=utf-8');
  	echo json_encode($jsondata, JSON_FORCE_OBJECT);
}


//>Cambiar contraseña desde Recuperar Contraseña
if ($recibePOST=="registrarAsistencia") {
	$id_usuario  = mysqli_real_escape_string($conexionmysqli, isset($_POST["id_usuario"]) ? $_POST["id_usuario"] : '');
	$id_evento   = mysqli_real_escape_string($conexionmysqli, isset($_POST["id_evento"]) ? $_POST["id_evento"] : '');
	
	#Inserto los registros en la BD
	mysqli_query( $conexionmysqli, "INSERT INTO asistencia(id_usuario, fecha, id_evento)VALUES ('$id_usuario', '$fechaCompleta', '$id_evento')" );
}

//>Guardar la selección del ultimo programa que seleccionó el usuario
if ($recibePOST=="ultimoProgramaUser") {
	
	$id_programa = mysqli_real_escape_string($conexionmysqli, isset($_POST["id_programa"]) ? $_POST["id_programa"] : '');
	$id_usuario = mysqli_real_escape_string($conexionmysqli, isset($_POST["id_usuario"]) ? $_POST["id_usuario"] : '');

	//Verifico si ya este usuario tiene registro en la BD
	$SQLCheck = " SELECT * FROM ultimo_programa_user WHERE id_usuario = '$id_usuario' ";
	@$SQLconsultaCheck = $conexionmysqli->query($SQLCheck);
	@$SQLconsultaCheck->data_seek(0);
	@$cant = mysqli_num_rows($SQLconsultaCheck);
	$SQLconsultaCheck->close();

	if ($cant > 0) {
		// Actualizo
		$query = "UPDATE ultimo_programa_user SET id_programa = '$id_programa' WHERE id_usuario = '$id_usuario'";
		$resultado = mysqli_query($conexionmysqli, $query);
		 $jsondata["data"]["mensaje"] = "Actualización";
	}else{
		// Registro
		$query = "INSERT INTO ultimo_programa_user( id_programa, id_usuario ) VALUES ( '$id_programa', '$id_usuario' )";
		$resultado = mysqli_query($conexionmysqli, $query);
		 $jsondata["data"]["mensaje"] = "Registro";
	}

	header('Content-type: application/json; charset=utf-8');
  	echo json_encode($jsondata, JSON_FORCE_OBJECT);
}


/**********************************************
 * 	REGISTRO DE NUEVO USUARIO (POSTULANTE)
**********************************************/
if ($recibePOST=="registroNuevoUsuario") {
	
	$nombres = mysqli_real_escape_string($conexionmysqli, isset($_POST["nombre"]) ? $_POST["nombre"] : "");
	$apellidos = mysqli_real_escape_string($conexionmysqli, isset($_POST["apellidos"]) ? $_POST["apellidos"] : "");
	$cedula = mysqli_real_escape_string($conexionmysqli, isset($_POST["cedula"]) ? $_POST["cedula"] : "");
	$fnacimiento = mysqli_real_escape_string($conexionmysqli, isset($_POST["fnacimiento"]) ? $_POST["fnacimiento"] : "");
	$correo = mysqli_real_escape_string($conexionmysqli, isset($_POST["correo"]) ? $_POST["correo"] : "");
	$tconvencional = mysqli_real_escape_string($conexionmysqli, isset($_POST["tconvencional"]) ? $_POST["tconvencional"] : "");
	$tcelular = mysqli_real_escape_string($conexionmysqli, isset($_POST["tcelular"]) ? $_POST["tcelular"] : "");
	$provincia = mysqli_real_escape_string($conexionmysqli, isset($_POST["provincia"]) ? $_POST["provincia"] : "");
	$ciudad = mysqli_real_escape_string($conexionmysqli, isset($_POST["ciudad"]) ? $_POST["ciudad"] : "");
	$direccion = mysqli_real_escape_string($conexionmysqli, isset($_POST["direccion"]) ? $_POST["direccion"] : "");
	$comonosconocio = mysqli_real_escape_string($conexionmysqli, isset($_POST["comonosconocio"]) ? $_POST["comonosconocio"] : "");
	$pass = md5($cedula); //ok

	$jsondata["data"]["mensaje"] = "Registro satisfactorio";

	//REGISTRO EN LA BD EL USUARIO NUEVO
	$usua_nombre = $nombres.' '.$apellidos;
	mysqli_query($conexionmysqli, " INSERT INTO usuarios(usua_nombre, usuario, pass, cod_grupo, id_estado, f_registro) VALUES ('$usua_nombre', '$cedula', '$pass', '10004', 2, '$fechaCompleta') ");

	/*******************************
	 ENVIAR CORREO DE BIENVENIDA
	*******************************/
	$correosoporte = "dcarballo@unirep.edu.ec";
	// Asunto
	$subject = "Registro de nuevo usuario";
	// Cuerpo del mensaje
	$bodyHtml = "<p>Registro de nuevo usuario al sistema de postulacion.<br><br>";
	$bodyHtml .= "<b>Usuario, $usua_nombre, $cedula</b><br><br>";
	$bodyHtml .= "</p>";
	$bodyHtml .= "<p>";
	$bodyHtml .= "Atentamente. <br>";
	$bodyHtml .= "Red Ecuatoriana de Pedagog&iacute;a.";
	$bodyHtml .= "</p>";
	$mail = new PHPMailer(true);

	try {
		// Specify the SMTP settings.
	    $mail->isSMTP();
	    $mail->setFrom($sender, $senderName);
	    $mail->Username   = $usernameSmtp;
	    $mail->Password   = $passwordSmtp;
	    $mail->Host       = $host;
	    $mail->Port       = $port;
	    $mail->SMTPAuth   = true;
	    $mail->SMTPSecure = 'ssl';
	    $mail->CharSet    = 'UTF-8';

	    // Specify the message recipients.
	    $mail->addAddress($correosoporte);

	    // Specify the content of the message.
	    $mail->isHTML(true);
	    $mail->Subject    = $subject;
	    $mail->Body       = $bodyHtml;
		//  $mail->AltBody    = $bodyText;
	    $mail->Send();
	  
		$jsondata["data"]["error"] = 0;
		$jsondata["data"]["mensaje"] = "Correo enviado.";

	} catch (phpmailerException $e) {

	    $jsondata["data"]["error"] = 1;
	  	$jsondata["data"]["mensaje"] = $e->errorMessage();
	
	} catch (Exception $e) {

	  $jsondata["data"]["error"] = 2;
	  $jsondata["data"]["mensaje"] = $mail->ErrorInfo;

	}


	//SELECCIONO EL USUARIO REGISTRADO ANTERIOMENTE
	$SQLUltimousuario = " SELECT MAX(id_usuario) AS id_usuario FROM usuarios WHERE usua_nombre = '$usua_nombre' AND usuario = '$cedula' AND cod_grupo = '10004' "; //  AND id_estado = 2
	$SQLconsultaUltimousuario = $conexionmysqli->query($SQLUltimousuario);
	$SQLconsultaUltimousuario->data_seek(0);
	$registro_Ultimousuario   = $SQLconsultaUltimousuario->fetch_assoc();
	$id_usuario 	 		  = "".$registro_Ultimousuario['id_usuario']."";
	$SQLconsultaUltimousuario->close();

	//REGISTRO LOS DEMAS DATOS DEL USUARIO
	mysqli_query($conexionmysqli, " INSERT INTO prospectos(	id_usuario, nombres, apellidos, cedula, fnacimiento, correo, tconvencional, tcelular, provincia, ciudad, direccion, comonosconocio, fecha_reg ) VALUES ('$id_usuario', '$nombres', '$apellidos', '$cedula', '$fnacimiento', '$correo', '$tconvencional', '$tcelular', '$provincia', '$ciudad', '$direccion', '$comonosconocio', '$fechaCompleta') ");

	/*******************************
	 ENVIAR CORREO DE BIENVENIDA
	*******************************/
	// Asunto
	$subject = "Registro de nuevo usuario";
	// Cuerpo del mensaje
	$bodyHtml = "<img src='https://sistemas.unirep.edu.ec/postulaciones/assets/media/Mailer.png'> <br><br>";
	$bodyHtml .= "<p>";
	$bodyHtml .= "<b>Hola, $nombres</b><br><br>";
	$bodyHtml .= "Bienvenido/a al Sistema de Postulaci&oacute;n del Instituto Central de Ciencias Pedagógicas de Cuba y de la Red Ecuatoriana de Pedagog&iacute;a. <br><br>";
	$bodyHtml .= "Te recordamos que el n&uacute;mero de c&eacute;dula es tu usuario para acceder a la plataforma. <br><br>";
	$bodyHtml .= "Para activar tu cuenta da clic en el siguiente bot&oacute;n: <br><br>";
	$bodyHtml .= "<a href='$_urlApp/confirmar-registro.php?i=$cedula' target='_blank'><b>Ingresa aqu&iacute;</b></a><br><br>"; //<img src='https://sistemas.unirep.edu.ec/postulaciones/assets/media/Boton.png'>
	$bodyHtml .= "<strong>Nota:</strong> Si no ha solicitado el registro ignore este mensaje.";
	$bodyHtml .= "</p>";
	$bodyHtml .= "<p>";
	$bodyHtml .= "Atentamente. <br>";
	$bodyHtml .= "Red Ecuatoriana de Pedagog&iacute;a.";
	$bodyHtml .= "</p>";
	$mail = new PHPMailer(true);

	try {
		// Specify the SMTP settings.
	    $mail->isSMTP();
	    $mail->setFrom($sender, $senderName);
	    $mail->Username   = $usernameSmtp;
	    $mail->Password   = $passwordSmtp;
	    $mail->Host       = $host;
	    $mail->Port       = $port;
	    $mail->SMTPAuth   = true;
	    $mail->SMTPSecure = 'ssl';
	    $mail->CharSet    = 'UTF-8';

	    // Specify the message recipients.
	    $mail->addAddress($correo);

	    // Specify the content of the message.
	    $mail->isHTML(true);
	    $mail->Subject    = $subject;
	    $mail->Body       = $bodyHtml;
		//  $mail->AltBody    = $bodyText;
	    $mail->Send();
	  
		$jsondata["data"]["error"] = 0;
		$jsondata["data"]["mensaje"] = "Correo enviado.";

	} catch (phpmailerException $e) {

	    $jsondata["data"]["error"] = 1;
	  	$jsondata["data"]["mensaje"] = $e->errorMessage();
	
	} catch (Exception $e) {

	  $jsondata["data"]["error"] = 2;
	  $jsondata["data"]["mensaje"] = $mail->ErrorInfo;

	}

	header('Content-type: application/json; charset=utf-8');
	echo json_encode($jsondata, JSON_PRETTY_PRINT);	
}


//>Importar registros desde archivo Excel
if ($recibePOST=="importarRegistrosexcel") {

	$id_programa = mysqli_real_escape_string($conexionmysqli, isset($_POST["id_programa"]) ? $_POST["id_programa"] : '');
	$ingresado_por = mysqli_real_escape_string($conexionmysqli, isset($_POST["ingresado_por"]) ? $_POST["ingresado_por"] : '');

	//>Dependencias Excel Reader
	require_once('vendor/php-excel-reader/excel_reader2.php');
	require_once('vendor/SpreadsheetReader.php');
	
	//>GUARDO EL DOCUMENTO EXCEL
	$archivoexcel	   	= $_FILES['excelreg']['name'];
	$tipoarchivoexcel	= $_FILES['excelreg']['type'];
	$pesoarchivoexcel	= $_FILES['excelreg']['size'];
	$nombrearchivoexcel = $_numeroaleatoriodos.$archivoexcel;

		if ($_FILES['excelreg']['error'] > 0){
		  
		  $jsondata["data"]["tipo"] = 2;
		  $jsondata["data"]["mensaje"] = "Ocurrio un error. Intentelo de nuevo, si el error persiste contacte con Soporte";

		}else{

			$permitidos = array('application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			$limite_kb = 100000;

			if (in_array($tipoarchivoexcel, $permitidos) && $pesoarchivoexcel <= $limite_kb * 1024){

			  	$ruta = "uploads/" . $nombrearchivoexcel;

			      	$resultado = @move_uploaded_file($_FILES['excelreg']['tmp_name'], $ruta);
			      	$x = 0;

				      if ($resultado){
				      	
				      	
				      	$Reader = new SpreadsheetReader($ruta);
				      	$sheetCount = count($Reader->sheets());
				      	
				      	// $data = new Spreadsheet_Excel_Reader($ruta); 
				      	// $cantColumm =  $data->colcount(); // Cantidad de columnas que tiene el excel

				        for($i=0;$i<$sheetCount;$i++)
				        {
				            
				            $Reader->ChangeSheet($i);
				            
				            foreach ($Reader as $Row)
				            {
				       			$x++;
				                
				                $fecha = "";
				                if(isset($Row[0])) {
				                    $fecha = mysqli_real_escape_string($conexionmysqli,$Row[0]);
				                }

				                $nombres = "";
				                if(isset($Row[1])) {
				                    $nombres = mysqli_real_escape_string($conexionmysqli,$Row[1]);
				                }

				                $apellidos = "";
				                if(isset($Row[2])) {
				                    $apellidos = mysqli_real_escape_string($conexionmysqli,$Row[2]);
				                }

				                $provincia = "";
				                if(isset($Row[3])) {
				                    $provincia = mysqli_real_escape_string($conexionmysqli,$Row[3]);
				                }

				                $ciudad = "";
				                if(isset($Row[4])) {
				                    $ciudad = mysqli_real_escape_string($conexionmysqli,$Row[4]);
				                }

				                $correo = "";
				                if(isset($Row[5])) {
				                    $correo = mysqli_real_escape_string($conexionmysqli,$Row[5]);
				                }

				                $telefono = "";
				                if(isset($Row[6])) {
				                    $telefono = mysqli_real_escape_string($conexionmysqli,$Row[6]);
				                }

				                $horario_contacto = "";
				                if(isset($Row[7])) {
				                    $horario_contacto = mysqli_real_escape_string($conexionmysqli,$Row[7]);
				                }

				                $contactar_whats = "";
				                if(isset($Row[8])) {
				                    $contactar_whats = mysqli_real_escape_string($conexionmysqli,$Row[8]);
				                }

				                $inquietud = "";
				                if(isset($Row[9])) {
				                    $inquietud = mysqli_real_escape_string($conexionmysqli,$Row[9]);
				                }

				                $mensaje = "";
				                if(isset($Row[10])) {
				                    $mensaje = mysqli_real_escape_string($conexionmysqli,$Row[10]);
				                }

				                $origen = "";
				                if(isset($Row[11])) {
				                    $origen = mysqli_real_escape_string($conexionmysqli,$Row[11]);
				                }

				                $llamada = "";
				                if(isset($Row[12])) {
				                    $llamada = mysqli_real_escape_string($conexionmysqli,$Row[12]);
				                }

				                $estado = "";
				                if(isset($Row[13])) {
				                    $estado = mysqli_real_escape_string($conexionmysqli,$Row[13]);
				                }

				                $responsable = "";
				                if(isset($Row[14])) {
				                    $responsable = mysqli_real_escape_string($conexionmysqli,$Row[14]);
				                }

				                $corte = "";
				                if(isset($Row[15])) {
				                    $corte = mysqli_real_escape_string($conexionmysqli,$Row[15]);
				                }

				                $observacion = "";
				                if(isset($Row[16])) {
				                    $observacion = mysqli_real_escape_string($conexionmysqli,$Row[16]);
				                }

			                    
			                    if($x > 1){ //Comienza a importar registros a partir de la segunda fila del archivo excel

			                    	//Verifico que ese registro no este en la BD
			                    	$SQLCheck = " SELECT * FROM prospectos WHERE nombres = '$nombres' AND apellidos = '$apellidos' AND provincia = '$provincia' AND ciudad = '$ciudad' AND correo = '$correo' AND telefono = '$telefono' AND id_programa = '$id_programa' ";
									@$SQLconsultaCheck = $conexionmysqli->query($SQLCheck);
									@$SQLconsultaCheck->data_seek(0);
									@$cant = mysqli_num_rows($SQLconsultaCheck);
									$SQLconsultaCheck->close();

									if ($cant == 0) {
										if ($nombres != '') {
											$query = "INSERT INTO prospectos( fecha, nombres, apellidos, provincia, ciudad, correo, telefono, horario_contacto, contactar_whats, inquietud, mensaje, origen, llamada, estado, responsable, corte, observacion, id_programa, fecha_reg ) VALUES ( '$fecha', '$nombres', '$apellidos', '$provincia', '$ciudad', '$correo', '$telefono', '$horario_contacto', '$contactar_whats', '$inquietud', '$mensaje', '$origen', '$llamada', '$estado', '$responsable', '$corte', '$observacion', '$id_programa', '$fechaCompleta' )";
											$resultados = mysqli_query($conexionmysqli, $query);
											$jsondata["data"]["registrados"][] = $nombres ." ". $apellidos;
										}else{
											$jsondata["data"]["noregistrados"][] = $nombres;
										}
									}else{
										$jsondata["data"]["yaexisten"][] = $nombres ." ". $apellidos;
									}
			                    }
				            }
				        }

				        $jsondata["data"]["tipo"] = 1;
				        $jsondata["data"]["mensaje"] = "Excel importado correctamente";

				      }else{
				      	$jsondata["data"]["tipo"] = 2;
				        $jsondata["data"]["mensaje"] = "Ocurrio un error al mover el archivo";
				    }
				      
			      }else{
			      	$jsondata["data"]["tipo"] = 2;
			        $jsondata["data"]["mensaje"] = "Archivo no permitido. <strong>(Permitidos solo con extensiones: xls, xlsx)</strong> o excede el tama&ntilde;o de $limite_kb KB.";
			    }
			}

	header('Content-type: application/json; charset=utf-8');
	echo json_encode($jsondata, JSON_PRETTY_PRINT);	
}

//>Subir Certificaciones
if ($recibePOST=="actualizarRegistro") {

	$i = mysqli_real_escape_string($conexionmysqli, isset($_POST["i"]) ? $_POST["i"] : ''); // id del registro
	$v = mysqli_real_escape_string($conexionmysqli, isset($_POST["v"]) ? $_POST["v"] : ''); // valor nuevo a actualizar
	$c = mysqli_real_escape_string($conexionmysqli, isset($_POST["c"]) ? $_POST["c"] : ''); // campo a actualizar
	$u = mysqli_real_escape_string($conexionmysqli, isset($_POST["u"]) ? $_POST["u"] : ''); // id usuario realizo ultima actualización

	$queryUpdate = " UPDATE postulaciones SET completado = '$v', modificado_por = '$u', fecha_ult_modificacion = '$fechaCompleta' WHERE id_postulacion = '$i' ";
	$result = mysqli_query($conexionmysqli, $queryUpdate);
	$jsondata["data"]["mensaje"] = "Registro actualizado";

	header('Content-type: application/json; charset=utf-8');
	echo json_encode($jsondata, JSON_PRETTY_PRINT);	
}

//>Aprobar financimiento - REP (Desde el listado de prospectos)
if ($recibePOST=="aprobarFinanciamiento") {

	$i = mysqli_real_escape_string($conexionmysqli, isset($_POST["i"]) ? $_POST["i"] : ''); // id del registro
	$u = mysqli_real_escape_string($conexionmysqli, isset($_POST["u"]) ? $_POST["u"] : ''); // id usuario realizo ultima actualización

	$queryUpdate = " UPDATE postulaciones SET aplicafinanciamiento = '1', f_aplicafinanciamiento = '$fechaCompleta', modificado_por = '$u', fecha_ult_modificacion = '$fechaCompleta' WHERE id_postulacion = '$i' ";
	$result = mysqli_query($conexionmysqli, $queryUpdate);
	$jsondata["data"]["mensaje"] = "Registro actualizado";

	// Se envia notificación al correo del postulante que se ha habilitado la opción en el listado de programas para que aplique al financiamiento
	// Se envia una copia al Asesor Académico a cargo del proceso
	$SQLPostulante = "
		SELECT 
			CONCAT( pro.nombres, ' ',pro.apellidos) AS nombres,
			pro.correo AS correopostulante,
			post.modificado_por AS id_asesor,
			ase.correo AS correoasesor,
			post.id_programa AS id_programa,
			prog.nombre AS programa
		FROM postulaciones AS post 
		INNER JOIN prospectos AS pro ON post.id_usuario = pro.id_usuario
		INNER JOIN usuarios AS ase ON post.modificado_por = ase.id_usuario
		INNER JOIN programas AS prog ON post.id_programa = prog.id
		WHERE post.id_postulacion = '$i'
	";
    $SQLconsultaPostulante = $conexionmysqli->query($SQLPostulante);
    $SQLconsultaPostulante->data_seek(0);
    $registro_Postulante = $SQLconsultaPostulante->fetch_assoc();
    $nombres = $registro_Postulante['nombres'];
    $correopostulante = $registro_Postulante['correopostulante'];
    $correoasesor = $registro_Postulante['correoasesor'];
    $programa = $registro_Postulante['programa'];
    $SQLconsultaPostulante->close();
	
	/*******************************
	 ENVIAR CORREO DE NOTIFICACIÓN
	*******************************/
	// Asunto
	$subject = "Solicitud de Financiamiento";
	// Cuerpo del mensaje
	$bodyHtml = "<img src='https://sistemas.unirep.edu.ec/postulaciones/assets/media/Mailer.png'> <br><br>";
	$bodyHtml .= "<p>";
	$bodyHtml .= "<b>Hola, $nombres</b><br><br>";
	$bodyHtml .= "Tu solicitd de Financiamiento al $programa ha sido aprobada. <br><br>";
	$bodyHtml .= "A partir de $fechaHoy2 a las $horaActual tienes 24h para subir los documentos de la c&eacute;dula y la carta de autorizací&oacute;n para obtenci&oacute;n del bur&oacute; de cr&eacute;dito. <br><br>";
	$bodyHtml .= "Al acceder a tu cuenta tendr&aacute;s habilitado del bot&oacute;n de financimiento. <br><br>";
	$bodyHtml .= "</p>";
	$bodyHtml .= "<p>";
	$bodyHtml .= "Atentamente. <br>";
	$bodyHtml .= "Red Ecuatoriana de Pedagog&iacute;a.";
	$bodyHtml .= "</p>";
	$mail = new PHPMailer(true);

	try {
		// Specify the SMTP settings.
	    $mail->isSMTP();
	    $mail->setFrom($sender, $senderName);
	    $mail->Username   = $usernameSmtp;
	    $mail->Password   = $passwordSmtp;
	    $mail->Host       = $host;
	    $mail->Port       = $port;
	    $mail->SMTPAuth   = true;
	    $mail->SMTPSecure = 'ssl';
	    $mail->CharSet    = 'UTF-8';

	    // Correo del postulante.
	    $mail->addAddress($correopostulante);
	    // Correo del asesor a cargo de este postulante.
	    $mail->addBcc($correoasesor);

	    // Specify the content of the message.
	    $mail->isHTML(true);
	    $mail->Subject = $subject;
	    $mail->Body    = $bodyHtml;
	    $mail->Send();

	    //Escribo en el campo observación
	    $query = "INSERT INTO observaciones( observ, id_postulacion, fecha, id_usuario ) VALUES ( 'Notificación de financiamiento, se habilita el botón para acceder al formulario de financiamiento.', '$i', '$fechaCompleta', '$u' )";
	  	$resultados = mysqli_query($conexionmysqli, $query);
	  
		$jsondata["data"]["error"] = 0;
		$jsondata["data"]["mensaje"] = "Correo enviado.";

	} catch (phpmailerException $e) {

	    $jsondata["data"]["error"] = 1;
	  	$jsondata["data"]["mensaje"] = $e->errorMessage();
	
	} catch (Exception $e) {

	  $jsondata["data"]["error"] = 2;
	  $jsondata["data"]["mensaje"] = $mail->ErrorInfo;

	}

	header('Content-type: application/json; charset=utf-8');
	echo json_encode($jsondata, JSON_PRETTY_PRINT);	
}

//>Actualizar estado de financiamiento - REP (Desde el listado de financiamiento)
if ($recibePOST=="procesarFinanciamientorep") {

	$i = mysqli_real_escape_string($conexionmysqli, isset($_POST["i"]) ? $_POST["i"] : ''); // id del registro
	$v = mysqli_real_escape_string($conexionmysqli, isset($_POST["v"]) ? $_POST["v"] : ''); // valor nuevo a actualizar
	$c = mysqli_real_escape_string($conexionmysqli, isset($_POST["c"]) ? $_POST["c"] : ''); // campo a actualizar
	$u = mysqli_real_escape_string($conexionmysqli, isset($_POST["u"]) ? $_POST["u"] : ''); // id usuario realizo ultima actualización

	$queryUpdate = " UPDATE postulaciones SET aprobadofinrep = '$v', modificado_por = '$u', fecha_ult_modificacion = '$fechaCompleta' WHERE id_postulacion = '$i' ";
	$result = mysqli_query($conexionmysqli, $queryUpdate);
	$jsondata["data"]["mensaje"] = "Registro actualizado";

	header('Content-type: application/json; charset=utf-8');
	echo json_encode($jsondata, JSON_PRETTY_PRINT);	
}


//>Actualizar estado de financiamiento - Cooperativa (Desde el listado de financiamiento)
if ($recibePOST=="actualizarRegistroFinanciamiento") {

	$i = mysqli_real_escape_string($conexionmysqli, isset($_POST["i"]) ? $_POST["i"] : ''); // id del registro
	$v = mysqli_real_escape_string($conexionmysqli, isset($_POST["v"]) ? $_POST["v"] : ''); // valor nuevo a actualizar
	$c = mysqli_real_escape_string($conexionmysqli, isset($_POST["c"]) ? $_POST["c"] : ''); // campo a actualizar
	$u = mysqli_real_escape_string($conexionmysqli, isset($_POST["u"]) ? $_POST["u"] : ''); // id usuario realizo ultima actualización

	$queryUpdate = " UPDATE postulaciones SET fincalificacion = '$v', modificado_por = '$u', fecha_ult_modificacion = '$fechaCompleta' WHERE id_postulacion = '$i' ";
	$result = mysqli_query($conexionmysqli, $queryUpdate);
	$jsondata["data"]["mensaje"] = "Registro actualizado";

	header('Content-type: application/json; charset=utf-8');
	echo json_encode($jsondata, JSON_PRETTY_PRINT);	
}

//>Consultar estadísticas diarias
if ($recibePOST=="cargarEstadisticasDia") {

	$id_programa = isset($_POST["id_programa"]) ? $_POST["id_programa"] : '';

	$SQLProspectos = " 
		SELECT
			CONCAT(UCASE(LEFT(DATE_FORMAT(p.fecha, '%a'), 1)), LCASE(SUBSTRING(DATE_FORMAT(p.fecha, '%a'), 2))) AS dia,
			COUNT(*) AS cant 
		FROM prospectos AS p
		WHERE p.id_programa = '$id_programa'
		GROUP BY DATE_FORMAT(p.fecha, '%a')
		ORDER BY DATE_FORMAT(p.fecha, '%w')	
	";
	$SQLconsultaProspectos = $conexionmysqli->query($SQLProspectos);
	$SQLconsultaProspectos->data_seek(0);
	$cant = mysqli_num_rows($SQLconsultaProspectos);
	if ($cant > 0) {
		while($row = $SQLconsultaProspectos->fetch_array(MYSQLI_ASSOC)) {
		    $jsondata["data"][] = $row;
		}
	}else{
		$jsondata["data"]["dia"] = "9999999999999999";
	}

	$SQLconsultaProspectos->close();


	header('Content-type: application/json; charset=utf-8');
	echo json_encode($jsondata, JSON_PRETTY_PRINT);	
}

//>Consultar estadísticas por origen
if ($recibePOST=="cargarEstadisticasOrigen") {

	$id_programa = mysqli_real_escape_string($conexionmysqli, isset($_POST["id_programa"]) ? $_POST["id_programa"] : '');

	$SQLProspectos = " 
		SELECT
		    IF(p.origen = '', 'No especificado', p.origen) AS origen,
			COUNT(*) AS cant 
		FROM prospectos AS p
		WHERE p.id_programa = '$id_programa'
		GROUP BY p.origen	
	";
	$SQLconsultaProspectos = $conexionmysqli->query($SQLProspectos);
	$SQLconsultaProspectos->data_seek(0);
	$cant = mysqli_num_rows($SQLconsultaProspectos);
	if ($cant > 0) {
		while($row = $SQLconsultaProspectos->fetch_array(MYSQLI_ASSOC)) {
		    $jsondata["data"][] = $row;
		}
	}else{
		$jsondata["data"]["dia"] = "9999999999999999";
	}

	$SQLconsultaProspectos->close();


	header('Content-type: application/json; charset=utf-8');
	echo json_encode($jsondata, JSON_PRETTY_PRINT);	
}

//>Consultar estadísticas por corte
if ($recibePOST=="cargarEstadisticasCorte") {

	$id_programa = mysqli_real_escape_string($conexionmysqli, isset($_POST["id_programa"]) ? $_POST["id_programa"] : '');

	$SQLProspectos = " 
		SELECT
		    IF(p.corte = '', 'No especificado', p.corte) AS corte,
			COUNT(*) AS cant 
		FROM prospectos AS p
		WHERE p.id_programa = '$id_programa'
		GROUP BY p.corte
	";
	$SQLconsultaProspectos = $conexionmysqli->query($SQLProspectos);
	$SQLconsultaProspectos->data_seek(0);
	$cant = mysqli_num_rows($SQLconsultaProspectos);
	if ($cant > 0) {
		while($row = $SQLconsultaProspectos->fetch_array(MYSQLI_ASSOC)) {
		    $jsondata["data"][] = $row;
		}
	}else{
		$jsondata["data"]["dia"] = "9999999999999999";
	}

	$SQLconsultaProspectos->close();


	header('Content-type: application/json; charset=utf-8');
	echo json_encode($jsondata, JSON_PRETTY_PRINT);	
}

//>Consultar estadísticas por llamada
if ($recibePOST=="cargarEstadisticasLlamada") {

	$id_programa = mysqli_real_escape_string($conexionmysqli, isset($_POST["id_programa"]) ? $_POST["id_programa"] : '');

	$SQLProspectos = " 
		SELECT
		    IF(p.llamada = 1, 'Si', 'No') AS llamada,
			COUNT(*) AS cant 
		FROM prospectos AS p
		WHERE p.id_programa = '$id_programa'
		GROUP BY p.llamada
	";
	$SQLconsultaProspectos = $conexionmysqli->query($SQLProspectos);
	$SQLconsultaProspectos->data_seek(0);
	$cant = mysqli_num_rows($SQLconsultaProspectos);
	if ($cant > 0) {
		while($row = $SQLconsultaProspectos->fetch_array(MYSQLI_ASSOC)) {
		    $jsondata["data"][] = $row;
		}
	}else{
		$jsondata["data"]["dia"] = "9999999999999999";
	}

	$SQLconsultaProspectos->close();


	header('Content-type: application/json; charset=utf-8');
	echo json_encode($jsondata, JSON_PRETTY_PRINT);	
}

//>Consultar estadísticas por llamada
if ($recibePOST=="cargarEstadisticasEstado") {

	$id_programa = mysqli_real_escape_string($conexionmysqli, isset($_POST["id_programa"]) ? $_POST["id_programa"] : '');

	$SQLProspectos = " 
		SELECT
		    IF(p.estado = '', 'No especificado', p.estado) AS estado,
			COUNT(*) AS cant 
		FROM prospectos AS p
		WHERE p.id_programa = '$id_programa'
		GROUP BY p.estado
	";
	$SQLconsultaProspectos = $conexionmysqli->query($SQLProspectos);
	$SQLconsultaProspectos->data_seek(0);
	$cant = mysqli_num_rows($SQLconsultaProspectos);
	if ($cant > 0) {
		while($row = $SQLconsultaProspectos->fetch_array(MYSQLI_ASSOC)) {
		    $jsondata["data"][] = $row;
		}
	}else{
		$jsondata["data"]["dia"] = "9999999999999999";
	}

	$SQLconsultaProspectos->close();


	header('Content-type: application/json; charset=utf-8');
	echo json_encode($jsondata, JSON_PRETTY_PRINT);	
}

//>Consultar estadísticas por llamada
if ($recibePOST=="actualizarDatospostulacion") {

	$campo = mysqli_real_escape_string($conexionmysqli, isset($_POST["campo"]) ? $_POST["campo"] : ''); // campo que se va a actualizar
	$p = mysqli_real_escape_string($conexionmysqli, isset($_POST["p"]) ? $_POST["p"] : ''); // id del programa
	$c = mysqli_real_escape_string($conexionmysqli, isset($_POST["c"]) ? $_POST["c"] : ''); // id del postulante
	$cont = mysqli_real_escape_string($conexionmysqli, isset($_POST["cont"]) ? $_POST["cont"] : ''); // contenido del campo que se va a actualizar
	$i = mysqli_real_escape_string($conexionmysqli, isset($_POST["i"]) ? $_POST["i"] : ''); // id de la postulacion

	try {

	  if ($campo == "fotocopiacedula" || $campo == "copiatitulo" || $campo == "copiatitulocuartonivel") {
	  	//verifico que el nombre del archivo este en el formato correcto
        $parts = explode('.', $cont);
        if (count($parts) > 2) {
            $ext = array_pop($parts);
            $cont = implode('-', $parts).'.'.$ext;
        }
        if (!$cont) {
            $cont = str_replace('.', '-', microtime(true));
        }
	  }

/*	  if ($campo == "copiatitulo" || $campo == "copiatitulocuartonivel") {

	  	$query = "INSERT INTO titulos( archivo, id_postulacion, tipo ) VALUES ( '$cont', '$i', 1 )";
	  	$resultados = mysqli_query($conexionmysqli, $query);

	  	// Chequeo cuantos archivos tiene registrado el postulante
		$SQLCantTitulos = " SELECT * FROM titulos WHERE id_postulacion = '$i' ";
		$SQLconsultaCantTitulos = $conexionmysqli->query($SQLCantTitulos);
		$SQLconsultaCantTitulos->data_seek(0);
		$cantTitulos = mysqli_num_rows($SQLconsultaCantTitulos);
		$SQLconsultaCantTitulos->close();

		// En caso que sean 3, oculto el boton de subir archivo
		if ($cantTitulos > '0') {
			$jsondata["data"]["cant"] = "$cantTitulos";

			$sqlUpdate = " UPDATE postulaciones SET copiatitulo = 'si' WHERE id_postulacion = '$i' ";
	  		mysqli_query($conexionmysqli, $sqlUpdate);

		}else{
			$jsondata["data"]["cant"] = "$cantTitulos";

			$sqlUpdate = " UPDATE postulaciones SET copiatitulo = NULL WHERE id_postulacion = '$i' ";
	  		mysqli_query($conexionmysqli, $sqlUpdate);
		}

	  }

	  else if ($campo == "copiatitulocuartonivel") {

	  	$query = "INSERT INTO titulos( archivo, id_postulacion, tipo ) VALUES ( '$cont', '$i', 2 )";
	  	$resultados = mysqli_query($conexionmysqli, $query);

	  	// Chequeo cuantos archivos tiene registrado el postulante
		$SQLCantTitulos = " SELECT * FROM titulos WHERE id_postulacion = '$i' ";
		$SQLconsultaCantTitulos = $conexionmysqli->query($SQLCantTitulos);
		$SQLconsultaCantTitulos->data_seek(0);
		$cantTitulos = mysqli_num_rows($SQLconsultaCantTitulos);
		$SQLconsultaCantTitulos->close();

		// En caso que sean 3, oculto el boton de subir archivo
		if ($cantTitulos > '0') {
			$jsondata["data"]["cant"] = "$cantTitulos";

			$sqlUpdate = " UPDATE postulaciones SET copiatitulocuartonivel = 'si' WHERE id_postulacion = '$i' ";
	  		mysqli_query($conexionmysqli, $sqlUpdate);

		}else{
			$jsondata["data"]["cant"] = "$cantTitulos";

			$sqlUpdate = " UPDATE postulaciones SET copiatitulocuartonivel = NULL WHERE id_postulacion = '$i' ";
	  		mysqli_query($conexionmysqli, $sqlUpdate);
		}

	  }

	  else{
	  	
	  	$sqlUpdate = " UPDATE postulaciones SET $campo = '$cont' WHERE id_postulacion = '$i' ";
	  	mysqli_query($conexionmysqli, $sqlUpdate);

	  	$jsondata["data"]["cant"] = 0;

	  }
*/

	  $sqlUpdate = " UPDATE postulaciones SET $campo = '$cont' WHERE id_postulacion = '$i' ";
	  mysqli_query($conexionmysqli, $sqlUpdate);

	  $jsondata["data"]["cant"] = 0;

	  //Consulto si ya esta completada
	  $SQLEstadoPost = "SELECT completado FROM postulaciones WHERE id_postulacion = '$i' ";
	  $SQLconsultaEstadoPost = $conexionmysqli->query($SQLEstadoPost);
	  $SQLconsultaEstadoPost->data_seek(0);
	  $registro_EstadoPost = $SQLconsultaEstadoPost->fetch_assoc();
	  $estc = $registro_EstadoPost['completado'];
	  $SQLconsultaEstadoPost->close();

	  if ($estc != '1') {
	  	//Actualizo el estado del postulante
		$query = "UPDATE postulaciones SET completado = '10' WHERE id_postulacion = '$i'";
		$resultado = mysqli_query($conexionmysqli, $query);
	  }

	  
	  $jsondata["data"]["error"] = 0;
	  $jsondata["data"]["mensaje"] = "Registro actualizado";
	} catch (Exception $e) {
	  $jsondata["data"]["cant"] = 0;
	  $jsondata["data"]["error"] = 1;
	  $jsondata["data"]["mensaje"] = $e->getMessage();
	}


	header('Content-type: application/json; charset=utf-8');
	echo json_encode($jsondata, JSON_PRETTY_PRINT);	
}

//>Enviar correo Test
if ($recibePOST=="enviarCorreotest") {
	$nombres = "Jesús Martínez";
	$cedula = "1757903479";
	$correo = mysqli_real_escape_string($conexionmysqli, isset($_POST["correo"]) ? $_POST["correo"] : '');
	
	/*******************************
	 ENVIAR CORREO DE PRUEBA
	*******************************/
	// Asunto
	$subject = "Registro de nuevo usuario";
	// Cuerpo del mensaje
	$bodyHtml = "<img src='https://sistemas.unirep.edu.ec/postulaciones/assets/media/Mailer.png'> <br><br>";
	$bodyHtml .= "<p>";
	$bodyHtml .= "<b>Hola, $nombres</b><br><br>";
	$bodyHtml .= "Te damos la bienvenida al sistema de postulaci&oacute;n de la Red Ecuatoriana de Pedagog&iacute;a. <br><br>";
	$bodyHtml .= "Te recordamos que el n&uacute;mero de c&eacute;dula es el &uacute;nico requerimiento para ingresar a la plataforma. <br><br>";
	$bodyHtml .= "Para finalizar la activaci&oacute;n de tu cuenta dale clic en el siguiente bot&oacute;n: <br><br>";
	$bodyHtml .= "<a href='$_urlApp/confirmar-registro.php?i=$cedula' target='_blank'><img src='https://sistemas.unirep.edu.ec/postulaciones/assets/media/Boton.png'></a><br><br>";
	$bodyHtml .= "<strong>Nota:</strong> Si no ha solicitado el registro ignore este mensaje.";
	$bodyHtml .= "</p>";
	$bodyHtml .= "<p>";
	$bodyHtml .= "Atentamente. <br>";
	$bodyHtml .= "Red Ecuatoriana de Pedagog&iacute;a.";
	$bodyHtml .= "</p>";
	$mail = new PHPMailer(true);

	try {
		// Specify the SMTP settings.
	    $mail->isSMTP();
	    $mail->setFrom($sender, $senderName);
	    $mail->Username   = $usernameSmtp;
	    $mail->Password   = $passwordSmtp;
	    $mail->Host       = $host;
	    $mail->Port       = $port;
	    $mail->SMTPAuth   = true;
	    $mail->SMTPSecure = 'ssl';
	    $mail->CharSet    = 'UTF-8';

	    // $mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);

	    // Specify the message recipients.
	    $mail->addAddress($correo);
	    // You can also add CC, BCC, and additional To recipients here.

	    // Specify the content of the message.
	    $mail->isHTML(true);
	    $mail->Subject    = $subject;
	    $mail->Body       = $bodyHtml;
	   //  $mail->AltBody    = $bodyText;
	    $mail->Send();
	  
		$jsondata["data"]["error"] = 0;
		$jsondata["data"]["mensaje"] = "Correo enviado.";

	} catch (phpmailerException $e) {

	    $jsondata["data"]["error"] = 1;
	  	$jsondata["data"]["mensaje"] = $e->errorMessage();
	
	} catch (Exception $e) {

	  $jsondata["data"]["error"] = 2;
	  $jsondata["data"]["mensaje"] = $mail->ErrorInfo;

	}

	
	header('Content-type: application/json; charset=utf-8');
  	echo json_encode($jsondata, JSON_FORCE_OBJECT);
}

//>ELiminar archivo copia de la cedula
if ($recibePOST=="eliminarArchivo") {
	
	$id = mysqli_real_escape_string($conexionmysqli, isset($_POST["id"]) ? $_POST["id"] : '');
	$campo = mysqli_real_escape_string($conexionmysqli, isset($_POST["campo"]) ? $_POST["campo"] : '');

	$query = "UPDATE postulaciones SET $campo = NULL WHERE id_postulacion = '$id'";
	$resultado = mysqli_query($conexionmysqli, $query);		
	
	
	$jsondata["data"]["mensaje"] = "Registro actualizado";
	
	header('Content-type: application/json; charset=utf-8');
  	echo json_encode($jsondata, JSON_FORCE_OBJECT);
}

//>ELiminar archivo titulo
if ($recibePOST=="eliminarArchivoTitulo") {
	
	$id = mysqli_real_escape_string($conexionmysqli, isset($_POST["id"]) ? $_POST["id"] : ''); //id_postulacion
	$campo = mysqli_real_escape_string($conexionmysqli, isset($_POST["campo"]) ? $_POST["campo"] : '');
	$idarchivo = mysqli_real_escape_string($conexionmysqli, isset($_POST["idarchivo"]) ? $_POST["idarchivo"] : '');

	//Elimino el archivo de la tabla titulos
	mysqli_query($conexionmysqli, "DELETE FROM titulos WHERE id_titulo = '$idarchivo'");

	// Chequeo cuantos archivos tiene registrado el postulante
	$SQLCantTitulos = " SELECT * FROM titulos WHERE id_postulacion = '$id' ";
	$SQLconsultaCantTitulos = $conexionmysqli->query($SQLCantTitulos);
	$SQLconsultaCantTitulos->data_seek(0);
	$cantTitulos = mysqli_num_rows($SQLconsultaCantTitulos);
	$SQLconsultaCantTitulos->close();

	// En caso que sean 3, oculto el boton de subir archivo
	if ($cantTitulos != '0') {
		$jsondata["data"]["cant"] = "1";
	}else{
		$jsondata["data"]["cant"] = "0";

		$query = "UPDATE postulaciones SET $campo = NULL WHERE id_postulacion = '$id'";
		$resultado = mysqli_query($conexionmysqli, $query);		
	}

	// En caso que no tenga ninguno entonces muestro el boton y actualizo en postulaciones

	// $query = "UPDATE postulaciones SET $campo = NULL WHERE id_postulacion = '$id'";
	// $resultado = mysqli_query($conexionmysqli, $query);		
	
	$jsondata["data"]["mensaje"] = "Registro actualizado";
	
	header('Content-type: application/json; charset=utf-8');
  	echo json_encode($jsondata, JSON_FORCE_OBJECT);
}

//>Postulación completada
if ($recibePOST=="postulacionCompletada") {
	
	$idp = mysqli_real_escape_string($conexionmysqli, isset($_POST["idp"]) ? $_POST["idp"] : '');

	$query = "UPDATE postulaciones SET completado = '1' WHERE id_postulacion = '$idp'";
	$resultado = mysqli_query($conexionmysqli, $query);	
	
	$jsondata["data"]["mensaje"] = "Registro actualizado";
	
	header('Content-type: application/json; charset=utf-8');
  	echo json_encode($jsondata, JSON_FORCE_OBJECT);
}


//>Registrar observación de postulación
if ($recibePOST=="registrarObservacionesPostulacion") {
	
	$id_postulacion = mysqli_real_escape_string($conexionmysqli, isset($_POST["idpostulacionObserv"]) ? $_POST["idpostulacionObserv"] : '');
	$observ = mysqli_real_escape_string($conexionmysqli, isset($_POST["nuevaobservacionPost"]) ? $_POST["nuevaobservacionPost"] : '');
	$id_usuario = mysqli_real_escape_string($conexionmysqli, isset($_POST["idusuariopostulacionObserv"]) ? $_POST["idusuariopostulacionObserv"] : '');

	try {

	  $query = "INSERT INTO observaciones( observ, id_postulacion, fecha, id_usuario ) VALUES ( '$observ', '$id_postulacion', '$fechaCompleta', '$id_usuario' )";
	  $resultados = mysqli_query($conexionmysqli, $query);	
	  $jsondata["data"]["cant"] = 0;
	  $jsondata["data"]["error"] = 0;
	  $jsondata["data"]["mensaje"] = "Observación registrada";

	} catch (Exception $e) {

	  $jsondata["data"]["cant"] = 0;
	  $jsondata["data"]["error"] = 1;
	  $jsondata["data"]["mensaje"] = $e->getMessage();

	}	
	
	header('Content-type: application/json; charset=utf-8');
  	echo json_encode($jsondata, JSON_FORCE_OBJECT);
}


//>Cargar observaciones
if ($recibePOST=="cargarObservaciones") {
	
	$id_postulacion = mysqli_real_escape_string($conexionmysqli, isset($_POST["id"]) ? $_POST["id"] : '');

	try {

	  	$SQLObservaciones = " 
			SELECT
				o.id AS id,
				o.observ AS observacion,
				o.id_postulacion AS id_postulacion,
				DATE_FORMAT(o.fecha, '%d - %m - %Y a las %H : %i : %s') AS fecha,
				u.usua_nombre AS usuario
			FROM observaciones AS o
			INNER JOIN usuarios AS u ON o.id_usuario = u.id_usuario
			WHERE o.id_postulacion = '$id_postulacion'
		";
		$SQLconsultaObservaciones = $conexionmysqli->query($SQLObservaciones);
		$SQLconsultaObservaciones->data_seek(0);
		$cant = mysqli_num_rows($SQLconsultaObservaciones);
		if ($cant > 0) {
			while($row = $SQLconsultaObservaciones->fetch_array(MYSQLI_ASSOC)) {
			    $jsondata["data"][] = $row;
			}
		}else{
			$jsondata["data"][]["id"] = "sinregistros";
		}

		$SQLconsultaObservaciones->close();

	} catch (Exception $e) {

	  $jsondata["data"]["cant"] = 0;
	  $jsondata["data"]["error"] = 1;
	  $jsondata["data"]["mensaje"] = $e->getMessage();

	}	
	
	header('Content-type: application/json; charset=utf-8');
  	echo json_encode($jsondata, JSON_FORCE_OBJECT);
}

//>Consultar postulaciones
if ($recibePOST=="consultarPostulaciones") {
	
	$id_usuario = mysqli_real_escape_string($conexionmysqli, isset($_POST["id"]) ? $_POST["id"] : '');

	try {

	  	$SQLObservaciones = " 
			SELECT
				post.id_postulacion AS id,
				p.id_usuario AS id_usuario,
				IF(post.id_programa IS NULL, 'No ha realizado postulación', prog.nombre) AS programa,
				IF(e.valor IS NULL, 'Nuevo', e.valor) AS estadou,
				IF(post.fecha_postulacion IS NULL, DATE_FORMAT(p.fecha_reg, '%d - %m - %Y %H:%i:%s'), DATE_FORMAT(post.fecha_postulacion, '%d - %m - %Y %H:%i:%s')) AS fecha_reg
			FROM
			    prospectos AS p
			LEFT JOIN usuarios AS u ON u.id_usuario = p.id_usuario
			LEFT JOIN postulaciones AS post ON post.id_usuario = p.id_usuario
			LEFT JOIN estado AS e ON e.id = post.completado
			LEFT JOIN programas AS prog ON prog.id = post.id_programa
		    WHERE p.id_usuario = '$id_usuario'
		";
		$SQLconsultaObservaciones = $conexionmysqli->query($SQLObservaciones);
		$SQLconsultaObservaciones->data_seek(0);
		$cant = mysqli_num_rows($SQLconsultaObservaciones);
		if ($cant > 0) {
			while($row = $SQLconsultaObservaciones->fetch_array(MYSQLI_ASSOC)) {
			    $jsondata["data"][] = $row;
			}
		}else{
			$jsondata["data"][]["id"] = "sinregistros";
		}

		$SQLconsultaObservaciones->close();

	} catch (Exception $e) {

	  $jsondata["data"]["cant"] = 0;
	  $jsondata["data"]["error"] = 1;
	  $jsondata["data"]["mensaje"] = $e->getMessage();

	}	
	
	header('Content-type: application/json; charset=utf-8');
  	echo json_encode($jsondata, JSON_FORCE_OBJECT);
}

//>Agendar zoom
if ($recibePOST=="registrarAgendarReunion") {
	
	$idusuario = mysqli_real_escape_string($conexionmysqli, isset($_POST["idusuarioAgendarReunion"]) ? $_POST["idusuarioAgendarReunion"] : '');
	$postulante = mysqli_real_escape_string($conexionmysqli, isset($_POST["postulante"]) ? $_POST["postulante"] : '');
	$fechagenda = mysqli_real_escape_string($conexionmysqli, isset($_POST["fechagenda"]) ? $_POST["fechagenda"] : '');
	$horagenda = mysqli_real_escape_string($conexionmysqli, isset($_POST["horagenda"]) ? $_POST["horagenda"] : '');
	$horagendafin = mysqli_real_escape_string($conexionmysqli, isset($_POST["horagendafin"]) ? $_POST["horagendafin"] : '');
	$observacion = mysqli_real_escape_string($conexionmysqli, isset($_POST["observacionagenda"]) ? $_POST["observacionagenda"] : '');

	//Fecha y hora de inicio
	$inicio = $fechagenda.' '.$horagenda;

	//Fecha y hora fin
	$fin = $fechagenda.' '.$horagendafin;

	try {

		$query = "INSERT INTO calendario_zoom( title, description, inicio, fin, ingresado_por, fecha_reg ) VALUES ( '$postulante', '$observacion', '$inicio', '$fin', '$idusuario', '$fechaCompleta' )";
		$resultados = mysqli_query($conexionmysqli, $query);

	  	$jsondata["data"][]["mensaje"] = "Registro guardado"; // - registrarAgendarReunion - $inicio - $fin

	} catch (Exception $e) {

	  $jsondata["data"]["cant"] = 0;
	  $jsondata["data"]["error"] = 1;
	  $jsondata["data"]["mensaje"] = $e->getMessage();

	}	
	
	header('Content-type: application/json; charset=utf-8');
  	echo json_encode($jsondata, JSON_FORCE_OBJECT);
}

//>Modificar reunion zoom
if ($recibePOST=="modificarReunion") {
	
	$id = mysqli_real_escape_string($conexionmysqli, isset($_POST["idreunionmod"]) ? $_POST["idreunionmod"] : '');
	$idusuario = mysqli_real_escape_string($conexionmysqli, isset($_POST["idusuarioModificaReunion"]) ? $_POST["idusuarioModificaReunion"] : '');
	$fechagenda = mysqli_real_escape_string($conexionmysqli, isset($_POST["fechagendamod"]) ? $_POST["fechagendamod"] : '');
	$horagenda = mysqli_real_escape_string($conexionmysqli, isset($_POST["horagendamod"]) ? $_POST["horagendamod"] : '');
	$horagendafin = mysqli_real_escape_string($conexionmysqli, isset($_POST["horagendafinmod"]) ? $_POST["horagendafinmod"] : '');
	$observacion = mysqli_real_escape_string($conexionmysqli, isset($_POST["observacionagendamod"]) ? $_POST["observacionagendamod"] : '');

	//Fecha y hora de inicio
	$inicio = $fechagenda.' '.$horagenda;

	//Fecha y hora fin
	$fin = $fechagenda.' '.$horagendafin;

	try {	

	  	$query = "UPDATE calendario_zoom SET inicio = '$inicio', fin = '$fin', description = '$observacion', modificado_por = '$idusuario' WHERE id = '$id'";
		$resultado = mysqli_query($conexionmysqli, $query);

		$jsondata["data"][]["mensaje"] = "Registro modificado";

	} catch (Exception $e) {

	  $jsondata["data"]["cant"] = 0;
	  $jsondata["data"]["error"] = 1;
	  $jsondata["data"]["mensaje"] = $e->getMessage();

	}	
	
	header('Content-type: application/json; charset=utf-8');
  	echo json_encode($jsondata, JSON_FORCE_OBJECT);
}

//>Actualizar evento
if ($recibePOST=="actualizarEvento") {
	
	$id = mysqli_real_escape_string($conexionmysqli, isset($_POST["id"]) ? $_POST["id"] : '');
	$inicio = mysqli_real_escape_string($conexionmysqli, isset($_POST["fi"]) ? $_POST["fi"] : '');
	$fin = mysqli_real_escape_string($conexionmysqli, isset($_POST["ff"]) ? $_POST["ff"] : '');
	$id_u = mysqli_real_escape_string($conexionmysqli, isset($_POST["id_u"]) ? $_POST["id_u"] : '');

	try {

		$query = "UPDATE calendario_zoom SET inicio = '$inicio', fin = '$fin', modificado_por = '$id_u' WHERE id = '$id'";
		$resultado = mysqli_query($conexionmysqli, $query);

	  	$jsondata["data"][]["mensaje"] = "Registro actualizado"; // - registrarAgendarReunion - $inicio - $fin

	} catch (Exception $e) {

	  $jsondata["data"]["cant"] = 0;
	  $jsondata["data"]["error"] = 1;
	  $jsondata["data"]["mensaje"] = $e->getMessage();

	}	
	
	header('Content-type: application/json; charset=utf-8');
  	echo json_encode($jsondata, JSON_FORCE_OBJECT);
}

//>Eliminar evento
if ($recibePOST=="eliminarEvento") {
	
	$id = mysqli_real_escape_string($conexionmysqli, isset($_POST["id"]) ? $_POST["id"] : '');

	try {

		$query = "DELETE FROM calendario_zoom WHERE id = '$id'";
		$resultado = mysqli_query($conexionmysqli, $query);

	  	$jsondata["data"][]["mensaje"] = "Registro eliminado";

	} catch (Exception $e) {

	  $jsondata["data"]["cant"] = 0;
	  $jsondata["data"]["error"] = 1;
	  $jsondata["data"]["mensaje"] = $e->getMessage();

	}	
	
	header('Content-type: application/json; charset=utf-8');
  	echo json_encode($jsondata, JSON_FORCE_OBJECT);
}


//>Registrar periodo academico
if ($recibePOST=="registrarPeriodo") {
	$jsondata = array();

	$programa_r = mysqli_real_escape_string($conexionmysqli, isset($_POST["programa_r"]) ? $_POST["programa_r"] : '');
	$institucion_r = mysqli_real_escape_string($conexionmysqli, isset($_POST["institucion_r"]) ? $_POST["institucion_r"] : '');
	$url_r = mysqli_real_escape_string($conexionmysqli, isset($_POST["url_r"]) ? $_POST["url_r"] : '');
	$estado_r = mysqli_real_escape_string($conexionmysqli, isset($_POST["estado_r"]) ? $_POST["estado_r"] : '');

	mysqli_query($conexionmysqli, " INSERT INTO programas( nombre, institucion, url, estado, activo ) VALUES ( '$programa_r', '$institucion_r', '$url_r', '$estado_r', 1 ) " );

	$jsondata["data"]["cant"] = 0;
	
	header('Content-type: application/json; charset=utf-8');
	echo json_encode($jsondata, JSON_PRETTY_PRINT);
}

//>Editar periodo academico
if ($recibePOST=="editarPeriodo") {
	$jsondata = array();
	
	$id_periodo = mysqli_real_escape_string($conexionmysqli, isset($_POST["idperiodo_e"]) ? $_POST["idperiodo_e"] : '');
	$programa_e = mysqli_real_escape_string($conexionmysqli, isset($_POST["programa_e"]) ? $_POST["programa_e"] : '');
	$institucion_e = mysqli_real_escape_string($conexionmysqli, isset($_POST["institucion_e"]) ? $_POST["institucion_e"] : '');
	$url_e = mysqli_real_escape_string($conexionmysqli, isset($_POST["url_e"]) ? $_POST["url_e"] : '');
	$estado_e = mysqli_real_escape_string($conexionmysqli, isset($_POST["estado_e"]) ? $_POST["estado_e"] : '');

	mysqli_query($conexionmysqli, " UPDATE programas SET nombre = '$programa_e', institucion = '$institucion_e', url = '$url_e', estado = '$estado_e' WHERE id = '$id_periodo' ");
	$jsondata["data"]["cant"] = 0;
	
	header('Content-type: application/json; charset=utf-8');
	echo json_encode($jsondata, JSON_PRETTY_PRINT);
}

//>Editar periodo academico
if ($recibePOST=="estadisticasGenerales") {
	$jsondata = array();

	$programa = mysqli_real_escape_string($conexionmysqli, isset($_POST["p"]) ? $_POST["p"] : '');
	$where = "";
	if ($programa) {
		$where .= "AND post.id_programa = '$programa'";
	}

	//Total registros
	$SQLconsultaTotalRegistros = " 
		SELECT * FROM prospectos AS p
		LEFT JOIN usuarios AS u ON u.id_usuario = p.id_usuario
		LEFT JOIN postulaciones AS post ON post.id_usuario = p.id_usuario
		LEFT JOIN estado AS e ON e.id = post.completado
		LEFT JOIN programas AS prog ON prog.id = post.id_programa
		WHERE u.id_usuario IS NOT NULL $where
	";
	$SQLconsultaTotalRegistros = $conexionmysqli->query($SQLconsultaTotalRegistros);
	$SQLconsultaTotalRegistros->data_seek(0);
	$totalRegistros = mysqli_num_rows($SQLconsultaTotalRegistros);
	$SQLconsultaTotalRegistros->close();
	$jsondata["data"]["tregistros"] = $totalRegistros;

	//Total postulaciones
	$SQLconsultaTotalPostulaciones = " 
		SELECT * FROM prospectos AS p
		LEFT JOIN usuarios AS u ON u.id_usuario = p.id_usuario
		LEFT JOIN postulaciones AS post ON post.id_usuario = p.id_usuario
		LEFT JOIN estado AS e ON e.id = post.completado
		LEFT JOIN programas AS prog ON prog.id = post.id_programa
		WHERE post.completado = '1' $where
	";
	$SQLconsultaTotalPostulaciones = $conexionmysqli->query($SQLconsultaTotalPostulaciones);
	$SQLconsultaTotalPostulaciones->data_seek(0);
	$totalPostulaciones = mysqli_num_rows($SQLconsultaTotalPostulaciones);
	$SQLconsultaTotalPostulaciones->close();
	$jsondata["data"]["tpostulaciones"] = $totalPostulaciones;

	//Total no postularan
	$SQLconsultaTotalNopostularan = " 
		SELECT * FROM prospectos AS p
		LEFT JOIN usuarios AS u ON u.id_usuario = p.id_usuario
		LEFT JOIN postulaciones AS post ON post.id_usuario = p.id_usuario
		LEFT JOIN estado AS e ON e.id = post.completado
		LEFT JOIN programas AS prog ON prog.id = post.id_programa
		WHERE post.completado = '6' $where
	";
	$SQLconsultaTotalNopostularan = $conexionmysqli->query($SQLconsultaTotalNopostularan);
	$SQLconsultaTotalNopostularan->data_seek(0);
	$totalNopostularan = mysqli_num_rows($SQLconsultaTotalNopostularan);
	$SQLconsultaTotalNopostularan->close();
	$jsondata["data"]["tnopostulaciones"] = $totalNopostularan;

	// Total incompletos
	$SQLconsultaTotalIncompletos = " 
		SELECT * FROM prospectos AS p
		LEFT JOIN usuarios AS u ON u.id_usuario = p.id_usuario
		LEFT JOIN postulaciones AS post ON post.id_usuario = p.id_usuario
		LEFT JOIN estado AS e ON e.id = post.completado
		LEFT JOIN programas AS prog ON prog.id = post.id_programa
		WHERE post.completado = '10' $where
	";
	$SQLconsultaTotalIncompletos = $conexionmysqli->query($SQLconsultaTotalIncompletos);
	$SQLconsultaTotalIncompletos->data_seek(0);
	$totalIncompletos = mysqli_num_rows($SQLconsultaTotalIncompletos);
	$SQLconsultaTotalIncompletos->close();
	$jsondata["data"]["tincompletos"] = $totalIncompletos;
	
	// Total pendientes
	$SQLconsultaTotalPendientes = " 
		SELECT * FROM prospectos AS p
		LEFT JOIN usuarios AS u ON u.id_usuario = p.id_usuario
		LEFT JOIN postulaciones AS post ON post.id_usuario = p.id_usuario
		LEFT JOIN estado AS e ON e.id = post.completado
		LEFT JOIN programas AS prog ON prog.id = post.id_programa
		WHERE post.completado = '3' $where
	";
	$SQLconsultaTotalPendientes = $conexionmysqli->query($SQLconsultaTotalPendientes);
	$SQLconsultaTotalPendientes->data_seek(0); 
	$totalPendientes = mysqli_num_rows($SQLconsultaTotalPendientes);
	$SQLconsultaTotalPendientes->close();
	$jsondata["data"]["tpendientes"] = $totalPendientes;

	// Total por confirmar
	$SQLconsultaTotalPorconfirmar = " 
		SELECT * FROM prospectos AS p
		LEFT JOIN usuarios AS u ON u.id_usuario = p.id_usuario
		LEFT JOIN postulaciones AS post ON post.id_usuario = p.id_usuario
		LEFT JOIN estado AS e ON e.id = post.completado
		LEFT JOIN programas AS prog ON prog.id = post.id_programa
		WHERE post.completado IS NULL $where
	";
	$SQLconsultaTotalPorconfirmar = $conexionmysqli->query($SQLconsultaTotalPorconfirmar);
	$SQLconsultaTotalPorconfirmar->data_seek(0);
	$totalPorconfirmar = mysqli_num_rows($SQLconsultaTotalPorconfirmar);
	$SQLconsultaTotalPorconfirmar->close();
	$jsondata["data"]["tporconfirmar"] = $totalPorconfirmar;

	// Total para entrevista
	$SQLconsultaTotalParaentrevista = " 
		SELECT * FROM prospectos AS p
		LEFT JOIN usuarios AS u ON u.id_usuario = p.id_usuario
		LEFT JOIN postulaciones AS post ON post.id_usuario = p.id_usuario
		LEFT JOIN estado AS e ON e.id = post.completado
		LEFT JOIN programas AS prog ON prog.id = post.id_programa
		WHERE post.completado = '12' $where
	";
	$SQLconsultaTotalParaentrevista = $conexionmysqli->query($SQLconsultaTotalParaentrevista);
	$SQLconsultaTotalParaentrevista->data_seek(0);
	$totalParaentrevista = mysqli_num_rows($SQLconsultaTotalParaentrevista);
	$SQLconsultaTotalParaentrevista->close();
	$jsondata["data"]["tparaentrevista"] = $totalParaentrevista;

	// Total para reserva de cupo
	$SQLconsultaTotalParareservadecupo = " 
		SELECT * FROM prospectos AS p
		LEFT JOIN usuarios AS u ON u.id_usuario = p.id_usuario
		LEFT JOIN postulaciones AS post ON post.id_usuario = p.id_usuario
		LEFT JOIN estado AS e ON e.id = post.completado
		LEFT JOIN programas AS prog ON prog.id = post.id_programa
		WHERE post.completado = '13' $where
	";
	$SQLconsultaTotalParareservadecupo = $conexionmysqli->query($SQLconsultaTotalParareservadecupo);
	$SQLconsultaTotalParareservadecupo->data_seek(0);
	$totalParareservadecupo = mysqli_num_rows($SQLconsultaTotalParareservadecupo);
	$SQLconsultaTotalParareservadecupo->close();
	$jsondata["data"]["treservacupo"] = $totalParareservadecupo;

	// Total hoy
	$SQLconsultaTotalHoy = " 
		SELECT * FROM prospectos AS p
		LEFT JOIN usuarios AS u ON u.id_usuario = p.id_usuario
		LEFT JOIN postulaciones AS post ON post.id_usuario = p.id_usuario
		LEFT JOIN estado AS e ON e.id = post.completado
		LEFT JOIN programas AS prog ON prog.id = post.id_programa
		WHERE DATE(u.f_registro) = DATE(NOW()) $where
	";
	$SQLconsultaTotalHoy = $conexionmysqli->query($SQLconsultaTotalHoy);
	$SQLconsultaTotalHoy->data_seek(0);
	$totalHoy = mysqli_num_rows($SQLconsultaTotalHoy);
	$SQLconsultaTotalHoy->close();
	$jsondata["data"]["thoy"] = $totalHoy;
	
	header('Content-type: application/json; charset=utf-8');
	echo json_encode($jsondata, JSON_PRETTY_PRINT);
}

?>