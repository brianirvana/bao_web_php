<title>BenderAO</title>
<body>
<form id="Consulta" name="Consulta" method="post" action="consulta.php">
<label>
<center>
<strong><span style="font-size: 15px; line-height: normal"><font color="black">Nick:</font></span></strong>
<input name="nombre" type="text" id="nombre" value="<? echo $_POST['nombre']; ?>" />
</center>
</label>
<center><input type="submit" name="ofi" value="Buscar Firma" /></center>
</label>
</form>
<div align=center>
<?php
$name = strtoupper($_POST['nombre']);
$url = "http://www.bender-online.com.ar/estadisticas/Pjs/$name.png";
$localurl = "../estadisticas/Pjs/$name.png";
if (file_exists($localurl))
{
	echo '<b><u><font size=5>Oficial</font></u></b>';
	echo '<br><b>(Solo se muestran personajes mayores a nivel 40)</b><br>';
	echo '<img src="'.$url.'"></img>';
	echo '<br>';
	echo 'URL: <a href="'.$url.'">'.$url.'</a>';
	echo '<br>';
	echo '<br>';
}
else
{
	echo "<b>En la Oficial este personaje no existe o es menor a 40.</b><br><br>";
}

$url = "http://www.bender-online.com.ar/estadisticas/Pjs/$name.png";
$localurl = "../estadisticas/Pjs/$name.png";

if (file_exists($localurl))
{
	echo '<b><u><font size=5>Version de Testeo</font></u></b>';
	echo '<br>';
	echo '<img src="'.$url.'"></img>';
	echo '<br>';
	echo 'URL: <a href="'.$url.'">'.$url.'</a>';
}
else
{
	echo "<b>En la version de Testeo este personaje no existe.<b>";
}

echo "<br><br><b>Recuerda que cada ves que loguees/desloguees esta firma se actualizara.<b>";
?>
</div>
<p align=right><blink>By MaTeO</blink></p>
</body>