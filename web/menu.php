<?php

//error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR);

include ("include/config.php");
$db = mysql_connect($dbhost, $dbusername, $dbpass); 
mysql_select_db($dbname) or die($dberror);
$item = "menu";
$result = mysql_query("SELECT DISTINCT * FROM solicitudes") or die("Error Consulta BD!");
$data = mysql_result($result, 0, $item);
echo $data;
?>