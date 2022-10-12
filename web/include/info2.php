<?php
include("config.php");

$op = "";
$id = "";

if (isset($_GET['op'])) { $op = $_GET['op']; }
if (isset($_GET['id'])) { $id = $_GET['id']; }

if (!is_numeric($id) && $id != '') { exit; } // Evitamos el Blind Injection MySQL
	switch ($op)
	{		
		case "update":
			$code = $_GET['code'];
			if ($code == "asd")
			{
				$db = mysql_connect($dbhost,$dbusername,$dbpass); 
				mysql_select_db($dbname) or die($dberror);
				$US = '';
				if (isset($_GET['UP'])) { $UP = $_GET['UP']; }
				SetData('', $id);
				if ($UP >= 1)
				{
					SetData('2', $_GET['id2']);
				}
				if ($UP >= 2)
				{
					SetData('3', $_GET['id3']);
				}
				if ($UP >= 3)
				{
					SetData('4', $_GET['id4']);
				}
				if ($UP >= 4)
				{
					SetData('5', $_GET['id5']);
				}
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
				$data = $r['id'].'@';
				$data .= $r['name'].'@';
				$data .= Estado($r['LastUpdate']).'@';
				$data .= $r['IP'].'@';
				$data .= $r['Port'].'@';
				$data .= $r['users'].'@';
				$data .= $r['desc'].'@';
				$data .= $r['updates'];
				$data .= '|';
				echo $data;
			}
			break;
		}
	}
	
	function SetInfo($namevalue, $num)
	{
		$value = $_GET[$namevalue.$num];
		if ($value != '')
		{
			return "`$namevalue` = '$value', ";
		}
	}
	
	function Estado($time)
	{
		if (time() - $time < 30)
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
	function SetData($num, $id)
	{
		$data 		= SetInfo('name', $num);
		$gettime	= time();
		$data 		.= SetInfo('IP', $num);
		$data 		.= SetInfo('Port', '');
		$data		.= SetInfo('users', '');
		$data		.= SetInfo('enabled', '');
		$data		.= SetInfo('desc', '');
		if (isset($_GET['updates']))
		{
			if ($_GET['updates'] == '1')
			{
				$query 		= "SELECT * FROM server WHERE id='$id' And enabled='1'";
				$consulta	= mysql_query($query);
				$update 	= mysql_result($consulta, 0, "updates") + 1;
				$data 		.= "updates='$update', ";
			}
		}
		$data 		.= "LastUpdate='$gettime'";
		echo "UPDATE server SET $data WHERE id='$id'".'<br><br>';
		$query = "UPDATE `server` SET $data WHERE `server`.`id`='$id'";
		mysql_query($query) or die(mysql_error());
	}
	
?>