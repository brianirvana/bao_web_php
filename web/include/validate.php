<?php

$code=$_GET['c'];
$Email=$_GET['m'];

include("config_validateAccount.php");
$db = mysql_connect($dbhost,$dbusername,$dbpass); 
mysql_select_db($dbname) or die($dberror);

//if (!is_numeric($code) && $code != '') { exit; } // Evitamos el Blind Injection MySQL
if ($code == '') { exit; } // Evitamos el Blind Injection MySQL
if ($Email == '') { exit; } // Evitamos el Blind Injection MySQL
if (is_numeric($Email) && $Email!= '') { exit; } // Evitamos el Blind Injection MySQL

// chequear si se llama directo al script. Que no hay, pero por las dudas
//if ($_SERVER['HTTP_REFERER'] == ""){
//die ("Error code: 123 - Acceso incorrecto!");
//exit;}

    $link = mysql_connect($dbhost, $dbusername, $dbpass)
	or die('No se pudo conectar: ' .mysql_error());
        //echo 'Connected successfully';
        mysql_select_db('baodb') or die('No se pudo seleccionar la base de datos');
 
	// Realizar una consulta MySQL
	$query = 'SELECT * FROM sv_emails_verified';
	$query = "SELECT * FROM sv_emails_verified WHERE Email='$Email'";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	
	$row = mysql_fetch_assoc($result);
	
	if (strtoupper($row['Email']) == strtoupper($Email)){   
		// Realizar una consulta MySQL
		mysql_free_result($result);
		//$query = 'SELECT * FROM sv_emails_verified'; //Comente esta linea porque hace la consulta dos veces.
		$query = "SELECT * FROM sv_emails_verified WHERE CodeEmail='$code'";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		
		if (strtoupper($row['CodeEmail']) == strtoupper($code))
		{ 
			$query = "UPDATE sv_emails_verified SET CodeEmail='VALIDATE', Status=1 WHERE Email='$Email'";
			$result2 = mysql_query($query) or die('Location: /web/index.php?op=validar_error2' . mysql_error());
			header('Location: /web/index.php?op=validar_exito');
		} else {
			header('Location: /web/index.php?op=validar_error');
		}
	} else {
		// false
		//$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		echo 'Error Emails diferentes: ', strtoupper($Email),' - ', $row['Email'],' - ', $code;
		//header('Location:/web/index.php?op=validar_error2');
	}

	// Liberar resultados
	mysql_free_result($result);
	
	// Cerrar la conexion
	mysql_close($link);
?>