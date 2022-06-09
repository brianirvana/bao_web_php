 <div align=center>
<P><b><u>Promedio de Vida</u></b></P>
<FORM action="index.php?op=Scripts/promedio" method="post">
	<P>
	<LABEL for="vida">Nivel: </LABEL>
	<?php 
		echo '	<INPUT type="text" name="nivel" id="nivel" value='.$_POST['nivel'].'><BR>';
	 ?>
	<LABEL for="vida">Vida: </LABEL>
	<?php
	echo '<INPUT type="text" name="vida" id="vida" value='.$_POST['vida'].'><BR>';
	?>
	<LABEL for="skills">Clase: </LABEL>
	<select class="text" name="clases" id="clases" tabindex=2>
		<?php
			include("clases.php");
			$clase = $_POST['clases'];
			$i = 0;
			while ($clases[$i] != '') 
			{
				if ($i == $clase)
				{
					$sele = " selected";
				}
				echo '<option value='.$i.$sele.'>'.$clases[$i].'</option>';
				$sele = '';
				$i++;
			}
		?>
	</select>
	<BR>
	<LABEL for="skills">Raza: </LABEL>
	<select class="text" name="razas" id="razas">
		<?php
			include("razas.php");
			$raza = $_POST['razas'];
			$i = 0;
			while ($razas[$i] != '') 
			{
				if ($i == $raza)
				{
					$sele = " selected";
				}
				echo '<option value='.$i.$sele.'>'.$razas[$i].'</option>';
				$sele = '';
				$i++;
			}
		?>
	</select>
	<BR><BR>
	<INPUT type="submit" value="Consultar" id="Consultar"> <INPUT type="reset">
	</P>
</FORM>
 <FORM action="index.php?op=scripts/index" method="post">
    <P>
    <INPUT type="submit" value="Volver al Índice">
    </P>
 </FORM>
<?php
$nivel = $_POST['nivel'];
$vida = $_POST['vida'];
$raza = $_POST['razas'];
$clase = $_POST['clases'];

if ($nivel != '' || $vida != '' || $raza != '' || $clase != '')
{
	if (!is_numeric($nivel))
	{
		echo 'El valor del nivel es incorrecto.<BR>';
		$close = 1;
	}
	if (!is_numeric($vida))
	{
		echo 'El valor de vida es incorrecto.<BR>';
		$close = 1;
	}
	if ($close == 1)
	{
		exit;
	}
	include("clases.php");
	include("razas.php");
	include("promedios.php");
	echo '<b>Nivel: </b><i>'.$nivel.'</i><br>';
	echo '<b>Vida: </b><i>'.$vida.'</i><br>';
	echo '<b>Clase: </b><i>'.$clases[$clase].'</i><br>';
	echo '<b>Raza: </b><i>'.$razas[$raza].'</i><br>';
	$promedio = $vida / $nivel;
	echo '<b>Tu promedio: </b><i>'.$promedio.'</i><br>';
	echo '<b>Promedio normal: </b><i>'.$promedios[$clase][$raza].'</i><br>';
	$up = $vida - $promedios[$clase][$raza] * $nivel;

	echo '<b>Vida Up: </b><i>'.$up.'</i><br>';	

	if ($promedio >= $promedios[$clase][$raza])
	{
		echo '<br><br><b>Tu vida es adecuada a tu nivel.</b>';
	}
	else
	{
		echo '<br><br><b>Tu vida no es la adecuada respecto a tu nivel. <br>¡Pero todavia hay posibilidad de tener una buena vida!</b>';
	}
}
?>
</div>
<div align=right>
<P><i>By MaTeO - Creado: 24/5/11 - Modificado: 21/9/12</i></P>
</div>