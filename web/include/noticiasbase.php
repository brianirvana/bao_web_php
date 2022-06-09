<?php

//error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR);

	include("config.php");
	$db = mysql_connect($dbhost,$dbusername,$dbpass); 
	mysql_select_db($dbname) or die($dberror);
	$id = $_GET['id'];
	if ($id != "") {
		$query = "SELECT * FROM noticias WHERE id = $id";
		$usuario = $id;
		$caracteres = 80000;
	} else {
		$query = "SELECT * FROM noticias WHERE publicada = 1 ORDER BY id DESC LIMIT $limitepp"; 
		$caracteres = $textchars;	
	}
	$result = mysql_query($query);
	while ($r = mysql_fetch_array($result)) {
		echo "$r[id]|$r[imagen]|$r[titulo]|$r[fecha]@";
	}
 ?>