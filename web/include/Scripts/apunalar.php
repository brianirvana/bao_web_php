<div align=center>
<P><b><u>Porcentaje al Apuñalar</u></b></P>
<?php
$skills = $_POST['skills'];
$clase = $_POST['clases'];
if ($clase != '' || $skills != '')
{
	if (!is_numeric($skills) || $skills < 0 || $skills > 100)
	{
		echo 'El valor de los skills es de 0 a 100.<BR>';
		$close = 1;
	}
	if ($close == 1)
	{
		Imprimir();
		exit;
	}
	include("clases.php");
	echo '<b>Skills: </b><i>'.$skills.'</i>';
	echo '<br><b>Clase: </b><i>'.$clases[$clase].'</i>';
	echo '<br>';
	switch ($clase)
	{
		case (3): // Asesino
		{
			$apunalar = ((0.00003 * $skills - 0.002) * $skills + 0.098) * $skills + 4.25;
			break;
		}
		case (1 || 8): // Paladin y Clerigo
		{
			$apunalar = ((0.000003 * $skills + 0.0006) * $skills + 0.0107) * $skills + 4.93;
			break;
		}
		case (5): // Bardo
		{
			$apunalar = ((0.000002 * $skills + 0.0002) * $skills + 0.032) * $skills + 4.81;
			break;
		}
		default: // Otras clases
		{
			$apunalar = 0.0361 * $skills + 4.39;
			break;
		}
	}
	if ($clase != 3 && $skills < 10)
	{
		$apunalar = 0;
	}
	echo '<br><b>Probabilidad de Apuñalar: </b><i>'.$apunalar.'%</i><br>';
	if ($apunalar == 0)
	{
		echo '<br><i>*Para que esta clase pueda apuñalar requiere +10 skills en el skill apuñalar.</i><br>';
	}
	Imprimir();
	break;
}
function Imprimir()
{
	echo '<br><form name="volver" method="post" action="index.php?op=Scripts/apunalar"> ';
	echo '<input type="submit" name="submit" value="Nueva Consulta">';
	echo '</form>';
	echo '<div align=right>';
	echo '<P><i>By MaTeO</i></P>';
	echo '</div>';
}
?>

<FORM action="index.php?op=Scripts/apunalar" method="post">
	<P>
	<LABEL for="skills">Skills: </LABEL>
	<INPUT type="text" name="skills" id="skills" value="0"><BR>
	<LABEL for="skills">Clase: </LABEL>
	<select class="text" name="clases" id="clases">
		<?php
			include("clases.php");
			$i = 0;
			while ($clases[$i] != '') 
			{
				echo '<option value='.$i.'>'.$clases[$i].'</option>';
				$i++;
			}
		?>
	</select>
	<BR><BR>
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