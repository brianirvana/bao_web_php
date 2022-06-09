<?php 

include ("config.php");
$db = mysql_connect($dbhost,$dbusername,$dbpass); 
mysql_select_db($dbname) or die($dberror);

$query = "SELECT * FROM noticias WHERE publicada = 1 ORDER BY id DESC"; // DESC;";

$caracteres = $textchars;	
$result = mysql_query($query);

echo "<div align='left'><table class='noticias' cellSpacing='0' cellPadding='0' width='400' border='0'>";
echo "<tr><td><b>Titulo:</b></td><td><b>Autor:</b></td><td><b>Fecha:</b></td></tr>";
echo "<tr><td>&nbsp;</td></tr>";

while ($r = mysql_fetch_array($result)) {
   echo "<td width='260'><a href='?id=".$r[id]."'>".$r[titulo]."</a></td>";
   echo "<td width='70'>".$r[usuario]."</td>";
   echo "<td width='70'>".$r[fecha]."</td></tr>";
}
echo "</table></div>";
?>