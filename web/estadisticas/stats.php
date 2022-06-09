<?php

include ("config.php");

$db = mysql_connect($dbhost,$dbusername,$dbpass); 
mysql_select_db($dbname) or die($dberror);



$name = $_GET['nick'];
$op = $_GET['op'];

switch ($op)
{
	case "reg":
		
		$result = mysql_query("SELECT * FROM estadisticas WHERE nick LIKE '$name'", $db); 
		
		$nick = $_GET['nick'];
		$clan = $_GET['clan'];
		$estatus = $_GET['estatus'];
		$faccion = $_GET['faccion'];
		$ciu = $_GET['ciu'];
		$cri = $_GET['cri'];
		$matados = $_GET['matados'];
		$nivel = $_GET['nivel'];
		$porcentaje = $_GET['porcentaje'];
		$online = $_GET['online'];
		$clase = $_GET['clase'];
		$raza = $_GET['raza'];
		$oro = $_GET['oro'];
		$promedio = $_GET['promedio'];
		$ban = $_GET['ban'];
		$npc = $_GET['npc'];
		$uptime = $_GET['uptime'];
		
		if ($row = mysql_fetch_array($result))
		{ 
				$sql = "UPDATE `benderao_web`.`estadisticas` SET ";
				$sql .= "`nick` = '$nick', ";
				$sql .= "`clan` = '$clan', ";
				$sql .= "`estatus` = '$estatus', ";
				$sql .= "`ciu` = '$ciu', ";
				$sql .= "`cri` = '$cri', ";
				$sql .= "`matados` = '$matados', ";
				$sql .= "`nivel` = '$nivel', ";
				$sql .= "`porcentaje` = '$porcentaje', ";
				$sql .= "`online` = '$online', ";
				$sql .= "`clase` = '$clase', ";
				$sql .= "`raza` = '$raza', ";
				$sql .= "`oro` = '$oro', ";
				$sql .= "`promedio` = '$promedio', ";
				$sql .= "`npc` = '$npc', ";
				$sql .= "`uptime` = '$uptime' ";
				$sql .= "WHERE nick LIKE '%$nick%' LIMIT 1";

				mysql_query($sql);
		}
		else
		{ 
			$sql = "INSERT INTO estadisticas (nick, clan, estatus, faccion, ciu, cri, matados, nivel, porcentaje, online, clase, raza, oro, promedio, ban, npc, uptime) ".
							"VALUES ('$nick', '$clan', '$estatus', '$faccion', '$ciu', '$cri', '$matados', '$nivel', '$porcentaje', '$online', '$clase', '$raza', '$oro', '$promedio', '$ban', '$npc', '$uptime')";
			mysql_query($sql);
		} 
		break;
	default:
		$result = mysql_query("SELECT ID,NAME,GUILD_INDEX,ELV,CLASS,RACE,GOLD,CITIZENS_KILLED,CRIMINALS_KILLED,USERS_KILLED, NPCS_KILLED,FACTION, LOGGED FROM sv_charfiles ORDER BY nivel DESC, porcentaje DESC", $db); 
		
		if ($row = mysql_fetch_array($result))
		{ 
			echo "<table border = '1'> \n"; 
			echo "<tr> \n"; 
			echo "<td>Nombre</td> \n"; 
			echo "<td>Clan</td> \n"; 
			echo "<td>Nivel</td> \n"; 
			echo "<td>Clase</td> \n"; 
			echo "<td>Raza</td> \n"; 
			echo "<td>Oro</td> \n"; 
			echo "<td>Ciudadanos</td> \n"; 
			echo "<td>Criminales</td> \n"; 
			echo "<td>Total Matados</td> \n"; 
			echo "<td>NPC's Matados</td> \n"; 
			echo "<td>Faccion</td> \n"; 
			echo "<td>Online</td> \n"; 
			echo "</tr> \n"; 
			//echo "</table> \n"; 
			
			//echo "<table border = '1'> \n"; 
			//Mostramos los nombres de las tablas 
			echo "<tr> \n"; 
			while ($field = mysql_fetch_field($result))
			{ 
					echo "<td>$field->name</td> \n"; 
			} 
			  echo "</tr> \n"; 
			do { 
					echo "<tr> \n"; 
					echo "<td>".$row["NAME"]."</td> \n"; 
					echo "<td>".$row["GUILD_INDEX"]."</td> \n"; 
					echo "<td>".$row["ELV"]."</td> \n"; 
					echo "<td>".$row["CLASS"]."</td> \n"; 
					echo "<td>".$row["RACE"]."</td> \n"; 
					echo "<td>".$row["GOLD"]."</td> \n"; 
					echo "<td>".$row["CRITIZENS_KILLED"]."</td> \n"; 
					echo "<td>".$row["CRIMINALS_KILLED"]."</td> \n"; 
					echo "<td>".$row["USERS_KILLED"]."</td> \n"; 
					echo "<td>".$row["NPCS_KILLED"]."</td> \n"; 
					echo "<td>".$row["FACTION"]."</td> \n"; 
					echo "<td>".$row["LOGGED"]."</td> \n"; 
					echo "</tr> \n"; 
			}
			
			while ($row = mysql_fetch_array($result)); 
					echo "</table> \n";
		}
		else
		{ 
			echo "No se ha encontrado ningun registro !"; 
		} 
		break;
}

	function SetInfo($namevalue)
	{
		$value = $_GET[$namevalue];
		if ($value != '')
		{
			return "`$namevalue` = '$value', ";
		}
	}

?>