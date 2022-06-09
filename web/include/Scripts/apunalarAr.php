<div align=center>
<P><b><u>Porcentaje al Apu�alar</u></b></P>
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
			$apunalar = ((0.00001 * $skills - 0.001) * $skills + 0.098) * $skills + 4.25;
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

	echo '<br><b>Probabilidad de Apu�alar: </b><i>'.$apunalar.'%</i><br>';
	$maxda�o = CalcularDa�o($_POST['umax'], $_POST['amax'], $_POST['amax'], $_POST['modarma'], $_POST['fuerza']);
	$minda�o = CalcularDa�o($_POST['umin'], $_POST['amin'], $_POST['amax'], $_POST['modarma'], $_POST['fuerza']);

	echo '<br><br><b><u>Da�o Apartir del valor "Da�o"<u></b>';
	echo '<br>Da�o: ',$_POST['da�o'];
	echo '<br>Da�o con Apu: '.($_POST['da�o'] * $_POST['modapu']);
	echo '<br>Total: '.(($_POST['da�o'] * $_POST['modapu']) + $_POST['da�o']);
	
	echo '<br><br><b><u>Da�o Apartir del valor del Arma sin defensa<u></b>';
	echo '<br>MaxDa�o: ',$maxda�o;
	echo '<br>MinDa�o: ',$minda�o;
	echo '<br>MaxDa�o con Apu: '.($maxda�o * $_POST['modapu']);
	echo '<br>MinDa�o con Apu: '.($minda�o * $_POST['modapu']);
	echo '<br>Max Total: '.((($maxda�o) * $_POST['modapu']) + ($maxda�o));
	echo '<br>Min Total: '.((($minda�o) * $_POST['modapu']) + ($maxda�o));
	
	echo '<br><br><b><u>Da�o Apartir del valor del Arma con defensa<u></b>';
	echo '<br>MaxDa�o: ',($maxda�o - $_POST['def']);
	echo '<br>MinDa�o: ',($minda�o - $_POST['def']);
	echo '<br>MaxDa�o con Apu: '.(($maxda�o - $_POST['def']) * $_POST['modapu']);
	echo '<br>MinDa�o con Apu: '.(($minda�o - $_POST['def']) * $_POST['modapu']);
	echo '<br>Max Total: '.((($maxda�o - $_POST['def']) * $_POST['modapu']) + ($maxda�o - $_POST['def']));
	echo '<br>Min Total: '.((($minda�o - $_POST['def']) * $_POST['modapu']) + ($maxda�o - $_POST['def']));
	//Imprimir();
	//break;
}
function Imprimir()
{
	echo '<br><form name="volver" method="post" action="apunalarAr.php"> ';
	echo '<input type="submit" name="submit" value="Nueva Consulta">';
	echo '</form>';
	echo '<div align=right>';
	echo '<P><i>By MaTeO</i></P>';
	echo '</div>';
}
function CalcularDa�o($userhit, $hit, $maxhit, $modif, $fuerza)
{
	if ($fuerza - 15 < 0)
	{
		$fuerza = 0;
	}
	else
	{
		$fuerza = $fuerza - 15;
	}
	$da�o = ((3 * $hit) + (($maxhit / 5) * $fuerza) + $userhit) * $modif;
	return $da�o;
}
?>

<FORM action="apunalarAr.php" method="post">
	<P>
	<LABEL for="skills">Skills: </LABEL>
	<?
	echo '<INPUT type="text" name="skills" id="skills" value="'.Verificar('skills').'"><BR>';
	echo '<LABEL for="da�o">Da�o: </LABEL><INPUT type="text" name="da�o" value="'.Verificar('da�o').'"><BR>';
	echo '<LABEL for="amin">Arma Minimo: </LABEL><INPUT type="text" name="amin" value="'.Verificar('amin').'"><BR>';
	echo '<LABEL for="amax">Arma Maximo: </LABEL><INPUT type="text" name="amax" value="'.Verificar('amax').'"><BR>';
	echo '<LABEL for="umin">UserMinHit: </LABEL><INPUT type="text" name="umin" value="'.Verificar('umin').'"><BR>';
	echo '<LABEL for="umax">UserMaxHit: </LABEL><INPUT type="text" name="umax" value="'.Verificar('umax').'"><BR>';
	echo '<LABEL for="fuerza">Fuerza: </LABEL><INPUT type="text" name="fuerza" value="'.Verificar('fuerza').'"><BR>';
	echo '<LABEL for="modarma">ModicadorDa�oClaseArmas:</LABEL><INPUT type="text" name="modarma" value="'.Verificar('modarma').'"><BR>';
	echo '<LABEL for="def">Defensa Enemigo:</LABEL><INPUT type="text" name="def" value="'.Verificar('def').'"><BR>';
	echo '<LABEL for="modapu">Mod Apu:</LABEL><INPUT type="text" name="modapu" value="'.Verificar('modapu').'"><BR>';
	function Verificar($dato)
	{
		$dataS = $_POST[$dato];
		if ($dataS == '')
		{
			switch ($dato)
			{
				case ('fuerza'):
				{
					$datosr = '38';
					break;
				}
				case ('modapu'):
				{
					$datosr = '1.5';
					break;
				}
				case ('modarma'):
				{
					$datosr = '0.9';
					break;
				}
				default:
				{
					$datosr = '0';
					break;
				}
			}
		}
		else
		{
			$datosr = $dataS;
		}
		return $datosr;
	}
	?>
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
 <FORM action="apunalarAr.php" method="post">
    <P>
    <INPUT type="submit" value="Volver al �ndice">
    </P>
 </FORM>
</div>
<div align=right>
<P><i>By MaTeO</i></P>
</div>