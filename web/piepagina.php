<?php
include ("include/config.php");
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);
$db = mysql_connect($dbhost,$dbusername,$dbpass); 
	mysql_select_db($dbname) or die($dberror);

	$item = "piepagina";
	$result = mysql_query("SELECT DISTINCT * FROM solicitudes") or die("Error Consulta BD!");
	$data = mysql_result($result, 0, $item);
	echo $data;
?>
