<? require("../include/verificauser.php"); // incluir motor de autentificación.
$nivel_acceso=1; // definir nivel de acceso para esta página.
if ($nivel_acceso < $_SESSION['usuario_nivel']){
header ("Location: $redir?error_login=5");
exit;
} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>ISP Admin</title>
	<meta http-equiv="Content-Type" content="text/html;charset=<? echo $charset; ?>">
	<style type="text/css">
	<!--
	body {font-family: Arial; font-size: 70%; }
	a { color: #5B85B4; font-weight: normal; }
	a:hover { color: #6998CC;}
	#he { background: #5E85B5; padding: 3px; color: #FFF; }
	#menu {float: right; width: 280px; padding: 5px; text-align: right; margin: 0 0 5px 0; }
	#menu a { color: #D7E1EC; }
	.logo { font-size: 170%; letter-spacing: -1.2px; }
	#hmenu {margin: 0 0 5px 0; padding: 5px; color: #808080; background: #7899BD; }
	#hmenu a {margin-left: 5px; margin-right: 5px; color: #FFF; text-decoration: none; font-weight: bold;}
	#hmenu a:hover {text-decoration: underline;}
	#left {float: left; width: 18%; padding: 0;}
	#left h7 {display: block; background: #5E85B5; color: #FFF; font-weight: bold; padding: 3px 0 3px 5px; } 
	#left ul {list-style: none; margin: 0; padding: 0;}
	#left li {margin: 1px; padding: 2px;}
	#left a {display: block; width: 94%; margin: 1px; padding: 2px; border-bottom: solid 1px #eee; text-decoration: none;}
	#content {margin-left: 19%; padding: 3px; background: #D7E1EC;}
	#content h5 {margin: 0; padding: 5px; font-size: 150%; color: #FFF; }
	#content p {margin: 5px; color: #5B85B4;}
	#content .table {margin: 5px 5px 15px 5px; padding: 0px; background: #FFF; }
	#content .table h3 {display: block; margin: 0; padding: 1px; color: #ffffff; background: #B5C7DB;}
	#content .table h3 a { color: #FFF; text-decoration: none; font-weight: bold; }
	-->
	</style>
	<script src="bbcode.js"></script>
</head>

<body onload="init('contenido')">
	<div id="he">
		<div id="menu">
			<a href="ispadmin.php">Actualizar</a> | <a href="form.php">Menu Admin</a> | <a href="logout.php">Logout</a>
		</div>
		<span class="logo">ISP Test Admin - Usuario: <?echo $_SESSION['usuario_login'];?></span>
	</div>
<?php
	include ("../include/config.php");
	$db = mysql_connect($dbhost,$dbusername,$dbpass); 
	mysql_select_db($dbname) or die($dberror);
	$op = $_GET['op'];
	$tip = $_GET['tip'];
	$ip = $_GET['ip'];
	if ($ip != '')
	{
		$url=file_get_contents("http://whatismyipaddress.com/ip/$ip");

		preg_match_all('/<th>(.*?)<\/th><td>(.*?)<\/td>/s',$url,$output,PREG_SET_ORDER);
		$isp=$output[1][2];
		$city=$output[9][2];
		$state=$output[8][2];
		$zipcode=$output[12][2];
		$country=$output[7][2];
		if ($zipcode == "") { $zipcode = "-";}
		echo '<br><div align=center>';
		echo '<table border="1" cellpadding="0" cellspacing="0" width="80%">';
		echo '<tr><td>IP </td><td>'.$ip.'</td></tr>';
		echo '<tr><td>ISP: </td><td>'.$isp.'</td></tr>';
		echo '<tr><td>Ciudad: </td><td>'.$city.'</td></tr>';
		echo '<tr><td>Estado: </td><td>'.$state.'</td></tr>';
		echo '<tr><td>Codigo Postal: </td><td>'.$zipcode.'</td></tr>';
		echo '<tr><td>Pais: </td><td>'.$country.'</td></tr>';
		echo '<tr><td><a href=http://geo.flagfox.net/?ip='.$ip.'>Mas detalles</a></td></tr>';
		echo '</table></div>';
	}
	else
	{
		if ($op != '')
		{
			if ($tip == "ASC")
			{
				$tip = 'DESC';
			}
			else
			{
				$tip = 'ASC';
			}
			$Order = "ORDER BY $op $tip";
		}
	}
	$query = "SELECT * FROM isptest WHERE Nombre<>'' $Order";
	$result = mysql_query($query);
	$data = '<div align=center>';
	$data .= '<table border="1" cellpadding="0" cellspacing="0" width="80%">';
	$data .= '<tr>';
	$data .= '<td><a href=ispadmin.php?op=Nombre&tip='.$tip.'>Nombre</a></td>';
	$data .= '<td><a href=ispadmin.php?op=Min&tip='.$tip.'>Min</a></td>';
	$data .= '<td><a href=ispadmin.php?op=Max&tip='.$tip.'>Max</a></td>';
	$data .= '<td><a href=ispadmin.php?op=Media&tip='.$tip.'>Media</a></td>';
	$data .= '<td><a href=ispadmin.php?op=Loss&tip='.$tip.'>Loss</a></td>';
	$data .= '<td><a href=ispadmin.php?op=IP&tip='.$tip.'>IP</a></td>';
	$data .= '</tr>';
	
	while ($r = mysql_fetch_array($result)) {
		$data .= '<tr>';
		$data .= '<td>'.$r[Nombre].'</td>';
		$data .= '<td>'.$r[Min].'</td>';
		$data .= '<td>'.$r[Max].'</td>';
		$data .= '<td>'.$r[Media].'</td>';
		$data .= '<td>'.$r[Loss].'</td>';
		$data .= '<td><a href=ispadmin.php?op='.$op.'&tip='.$tip.'&ip='.$r[IP].'>'.$r[IP].'</td>';
		$data .= '</tr>';
		$i = NumberHost($r[Nombre]);
		if ($Min[$i] == '') { $Min[$i] = '2000'; }
		if ($Max[$i] == '') { $Max[$i] = '0'; }
		$Nombre[$i] = $r[Nombre];
		$MediaC[$i]++;
		$MediaT[$i] += $r[Media];
		$Loss[$i] += $r[Loss];
		if ($Min[$i] > $r[Min] && $r[Min] <> "0")
		{
			$Min[$i] = $r[Min];
		}
		$Maximo = $r[Max];

		if ($Max[$i] < $Maximo)
		{
			$Max[$i] = $Maximo;
		}
	}
	$data .= '</table>';
	$data .= '</div>';
	
	$dataB = '<div align=center>';
	$dataB .= '<table border="1" cellpadding="0" cellspacing="0" width="80%">';
	$dataB .= '<tr>';
	$dataB .= '<td><b>Nombre</b></td>';
	$dataB .= '<td><b>Min</b></td>';
	$dataB .= '<td><b>Max</b></td>';
	$dataB .= '<td><b>Media</b></td>';
	$dataB .= '<td><b>Loss</b></td>';
	$dataB .= '</tr>';
	for ($i = 1; $i <= 6; $i++)
	{
		$dataB .= '<tr>';
		$dataB .= '<td>'.$Nombre[$i].'</td>';
		$dataB .= '<td>'.$Min[$i].'</td>';
		$dataB .= '<td>'.$Max[$i].'</td>';
		$Media[$i] = round($MediaT[$i] / $MediaC[$i]);
		$dataB .= '<td>'.$Media[$i].'</td>';
		$dataB .= '<td>'.$Loss[$i].'</td>';
		$dataB .= '</tr>';
	}
	$dataB .= '</table>';
	$dataB .= '</div>';
	
	echo '<br>';
	echo $dataB;
	echo '<br>';
	echo $data;
	echo '<br>';
	function NumberHost($name)
	{
		switch ($name)
		{
			case "Fibertel":
			{
				return "1";
				break;
			}
			case "Dattatec":
			{
				return "2";
				break;
			}
			case "Patan":
			{
				return "3";
				break;
			}
			case "G2KHosting":
			{
				return "4";
				break;
			}
			case "LocalStrike":
			{
				return "5";
				break;
			}
			case "Networkhosting":
			{
				return "6";
				break;
			}
		}
	}
?>
<br>
</body>