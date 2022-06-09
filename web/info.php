<?php
$dbhost = "localhost";
$dbname = "web";
$dbusername = "root";
$dbpass = "localhost";
$op = $_GET['op'];
$id = $_GET['id'];

if (!is_numeric($id) && $id != '') { exit; } // Evitamos el Blind Injection MySQL
	switch ($op)
	{		
		case "update":
			$code = $_GET['code'];
			if ($code == "jfk41sdajfioq2341as31")
			{
				$db = mysql_connect($dbhost,$dbusername,$dbpass); 
				mysql_select_db($dbname) or die($dberror);
				$data 		= SetInfo('name');
				$gettime	.= time();
				$data 		.= SetInfo('IP');
				$data 		.= SetInfo('Port');
				$data		.= SetInfo('users');
				$data		.= SetInfo('enabled');
				$data		.= SetInfo('desc');
				if ($_GET['updates'] == '1')
				{
					$query 		= "SELECT * FROM server WHERE id='$id' And enabled='1'";
					$consulta	= mysql_query($query);
					$update 	= mysql_result($consulta, 0, "updates") + 1;
					$data 		.= "updates='$update', ";
				}
				
				$data 		.= "LastUpdate='$gettime'";
				echo "UPDATE server SET $data WHERE id='$id'".'<br>';
				$query = "UPDATE `server` SET $data WHERE `server`.`id`='$id'";
				//$query = "UPDATE `server` SET `desc` = 'Test' WHERE `server`.`id` = $id";
				mysql_query($query) or die(mysql_error());
			}
			break;
		case "complete":
		{
			$db = mysql_connect($dbhost,$dbusername,$dbpass); 
			mysql_select_db($dbname) or die($dberror);
			
			// Formato: id@nombre@estado@IP@Puerto@Usuarios@Veces Actualizado|
			// El | es el marcador de servidor
			if ($id == '')
			{
				$query = "SELECT * FROM server WHERE enabled='1'";
			}
			else
			{
				$query = "SELECT * FROM server WHERE id='$id' And enabled='1'";
			}
			$result = mysql_query($query);
			while ($r = mysql_fetch_array($result)) {
				$data = $r[id].'@';
				$data .= $r[name].'@';
				$data .= Estado($r[LastUpdate]).'@';
				$data .= $r[IP].'@';
				$data .= $r[Port].'@';
				$data .= $r[users].'@';
				$data .= $r[desc].'@';
				$data .= $r[updates];
				$data .= '|';
				echo $data;
			}
			break;
		}
	}
	
	function SetInfo($namevalue)
	{
		$value = $_GET[$namevalue];
		if ($value != '')
		{
			return "`$namevalue` = '$value', ";
		}
	}
	
	function Estado($time)
	{
		if (time() - $time < 10)
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
?>