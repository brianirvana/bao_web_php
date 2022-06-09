<?php

	include ("config.php");
	
	$db = mysql_connect($dbhost,$dbusername,$dbpass); 
	mysql_select_db($dbname) or die($dberror);
	$query = "SELECT * FROM server WHERE enabled=1";
	$result = mysql_query($query);
	$total = '0';
	while ($r = mysql_fetch_array($result)) {
		$data .= '<u>'.$r[name].'</u><br>';
		$estado = Estado($r[LastUpdate]);
		$desc = $r[desc];
		if ($desc != "")
		{
			$data .='Tipo: <font color=yellow>'.$r[desc].'</font><br>';
		}
		if ($estado == "Online")
		{
			$data .= 'Estado: </font><font color=green>'.Estado($r[LastUpdate]).'</font><br>';
			$data .= 'Usuarios: </font><font color=green>'.$r[users].'</font><br>';
			$total += $r[users];
		}
		else
		{
			$data .= 'Estado: </font><font color=red>'.Estado($r[LastUpdate]).'</font><br>';
		}
		$data .= '<br>';
	}
	echo "<b><font color=orange>Usuarios: $total</font></b><br><br>";
	
	echo $data;

mysql_close ($db);

	function Estado($time)
	{
		if (time() - $time < 60)
		{
			// Online
			return 'Online';
		}
		else
		{
			// Offline
			return 'Offline';
		}
	}
/*
echo "Servidor Oficial: "; 
echo "<p></p>";
echo "Version Oficial v0.5.0\n";
echo "<p></p>";*/
?>
