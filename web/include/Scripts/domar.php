<div align=center>
<title>Consulta de Puntaje para Domar</title>
<P><b><u>Consulta de Puntaje para Domar</u></b></P>
<?php
$skills = $_POST['skills'];
$carisma = $_POST['carisma'];
$flauta = $_POST['flauta'];
if ($skills != '' || $carisma != '' || $flauta != '')
{
	if (!is_numeric($skills) || $skills < 0 || $skills > 100)
	{
		echo 'El valor de los skills es de 0 a 100.<BR>';
		$close = 1;
	}
	if (!is_numeric($carisma) || $carisma <= 10 || $carisma > 20)
	{
		echo 'El valor de carisma es entre 10 a 20.<BR>';
		$close = 1;
	}
	if ($flauta != 'Si' && $flauta != 'No')
	{
		echo 'Asigne si tiene o no flauta.<BR>';
		$close = 1;
	}
	if ($close == 1)
	{
		Imprimir();
		exit;
	}
	//$data = "Hormiga Marabunta:5|Hormiga:5|Pavo Real:30|Conejo:30|Gallo:30|Cuervo Salvaje:50|Pato:50|Cerdo:50|Vaca:70|Gran Águila:87|Tortuga de Mar:200|Jabalí Salvaje:250|Oso Pardo Domesticado:300|Tigre de Bengala:350|Hormiga Gigante:400|Gallo Salvaje:400|Serpiente:400|Murciélago:400|Guardia Real:400|Caravana:500|Rata Salvaje:600|Escorpión:600|Águila:600|Rata:600|Quark:800|Cuervo:800|Vaca Salvaje:1100|Hombre Lobo:1250|Lobo:1250|Goblin:1500|Osezno:1520|Duende:1700|Tarántula:1800|Orco Brujo:1820|Tortuga Gigante:2010|Jabalí Salvaje:2100|Tigre Salvaje:2100|Gorila Polar:2200|Oso Pardo:2200|Mago Malvado:2220|"

	echo '<b>Skills: </b><i>'.$skills.'</i>';
	echo '<br><b>Carisma: </b><i>'.$carisma.'</i>';
	echo '<br><b>Flauta: </b><i>'.$flauta.'</i>';
	$puntos = $skills * $carisma;
	if ($flauta == 'Si')
	{
		$puntos = $puntos + $puntos / 100 * 20;
	}
	echo '<br><b>Puntos: </b><i>'.$puntos.'</i>';
	echo '<br><br><b>Criaturas que puedes domar</b>: <i>';
	include ("criaturas-domables.php");
	$i = 0;
	while ($NPCDomar[$i] != 0) 
	{
		if ($NPCDomar[$i] > $puntos)
		{
			break;
		}
		$texto = $texto.$NPCName[$i].' ('.$NPCDomar[$i].'), ';
		$i++;
	}
	if ($texto == '')
	{
		$texto = 'Ninguna';
	}
	echo $texto;
	echo '</i><br>';
	Imprimir();
	exit;
}
function Imprimir()
{
	echo '<br><form name="volver" method="post" action="index.php?op=Scripts/domar"> ';
	echo '<input type="submit" name="submit" value="Nueva Consulta">';
	echo '</form>';
	echo '<div align=right>';
	echo '<P><i>By MaTeO</i></P>';
	echo '</div>';
}

?>
 <FORM action="index.php?op=Scripts/domar" method="post">
    <P>
    <LABEL for="skills">Skills: </LABEL>
              <INPUT type="text" name="skills" id="skills" value="0"><BR>
    <LABEL for="carisma">Carisma: </LABEL>
              <INPUT type="text" name="carisma" id="carisma" value="0"><BR>
    <INPUT type="radio" name="flauta" value="Si"> Con Flauta<BR>
    <INPUT type="radio" name="flauta" value="No"> Sin Flauta<BR>
    <INPUT type="submit" value="Consultar"> <INPUT type="reset">
    </P>
 </FORM>
 <FORM action="index.php?op=Scripts/index" method="post">
    <P>
    <INPUT type="submit" value="Volver al Índice">
    </P>
 </FORM>
</div>
<div align=right>
<P><i>By MaTeO</i></P>
</div>