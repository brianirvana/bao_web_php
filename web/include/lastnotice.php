<?php
	include("config.php");
	include("bbcode.php");
  		$db = mysql_connect($dbhost,$dbusername,$dbpass); 
  		mysql_select_db($dbname) or die($dberror);
		$query = "SELECT * FROM noticias WHERE publicada = 1 ORDER BY id DESC LIMIT 5"; 
		$caracteres = $textchars;	
		$result = mysql_query($query);
  		while ($r = mysql_fetch_array($result))
		{
			echo '<t>'.$r[titulo].'</t>';
			echo '<f>'.$r[fecha].'</f>';
			echo '<c>'.bbcode(stripslashes($r[contenido])).'</c>';
			echo '<u>'.$r[usuario].'</u>';
		}
?>