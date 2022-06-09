<?php

$serial=$_GET['s'];
$date=$_GET['p'];

include("config_validateAccount.php");
$db = mysql_connect($dbhost,$dbusername,$dbpass); 
mysql_select_db($dbname) or die($dberror);

//if (!is_numeric(serial) && serial != '') { exit; } // Evitamos el Blind Injection MySQL
if ($serial == '') { exit; } // Evitamos el Blind Injection MySQL

if (is_numeric($date) && $date!= '') { exit; } // Evitamos el Blind Injection MySQL

    $link = mysql_connect($dbhost, $dbusername, $dbpass)
	or die('No se pudo conectar: ' .mysql_error());
        //echo 'Connected successfully';
        mysql_select_db('baodb') or die('No se pudo seleccionar la base de datos');
 
	// Realizar una consulta MySQL
	$query = 'SELECT SERIAL,DATE_INSTALLED FROM sv_serial_addresses';
	$query = "SELECT SERIAL,DATE_INSTALLED FROM sv_serial_addresses WHERE Serial='$serial'";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	
	$row = mysql_fetch_assoc($result);
	
	if (strtoupper($row['Serial']) == strtoupper($serial)){   
		// Realizar una consulta MySQL
		mysql_free_result($result);

		$query = "SELECT SERIAL,DATE_INSTALLED FROM sv_serial_addresses WHERE Serial='$serial'";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		
		    $query = "UPDATE sv_serial_addresses SET DATE_INSTALLED='$date' WHERE Serial='$serial'";
			$result2 = mysql_query($query) or die('Location: /web/index.php?op=validar_error2' . mysql_error());
			header('Location: /web/index.php?op=validar_exito');

	} else {
		// false
		//$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		echo 'Error seriales diferentes: ', strtoupper($serial),' - ', $row['Serial'],' - ', $date;
		//header('Location:/web/index.php?op=validar_error2');
	}

	// Liberar resultados
	mysql_free_result($result);
	
	// Cerrar la conexion
	mysql_close($link);
?>