<?php
include ("include/config.php");
$db = mysql_connect($dbhost,$dbusername,$dbpass); 
mysql_select_db($dbname) or die($dberror);

$op = $_GET['op'];
$result = mysql_query("SELECT DISTINCT * FROM solicitudes") or die("Error Consulta BD!");
$data = mysql_result($result, 0, $op);
echo $data;
?>