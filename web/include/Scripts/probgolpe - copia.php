<div align=center>
<P><b><u>Probabilidad de Golpe, Evasion y Rechazo</u></b></P>
<?php
$skills_tacticas = $_POST['skills_t'];
$skills_defensa = $_POST['skills_d'];
$skills_combate = $_POST['skills_c'];
$modataque = $_POST['modataque'];
$modevasion = $_POST['modevasion'];
$modescudo = $_POST['modescudo'];
$agilidad_attack = $_POST['agilidad_attack'];
$agilidad_victim = $_POST['agilidad_victim'];
$nivel_attack = $_POST['nivel_attack'];
$nivel_victim = $_POST['nivel_victim'];

	echo '<b>Skills Tacticas en Combate Victima: </b><i>'.$skills_tacticas.'</i>';
	echo '<b>Skills Defensa en Escudos Victima:</b><i>'.$skills_defensa.'</i>';
	echo '<b>Skills Combate Con Armas Atacante: </b><i>'.$skills_combate.'</i>';
	echo '<b>ModAtaque Atacante: </b><i>'.$modataque.'</i>';
	echo '<b>ModEvasion Victima:</b><i>'.$modevasion.'</i>';
	echo '<b>ModEscudo Victima: </b><i>'.$modescudo.'</i>';
	echo '<b>Agilidad Atacante: </b><i>'.$agilidad_attack.'</i>';
	echo '<b>Agilidad Victima: </b><i>'.$agilidad_victim.'</i>';
	echo '<b>Nivel Atacante: </b><i>'.$nivel_attack.'</i>';
	echo '<b>Nivel Victima: </b><i>'.$nivel_victim.'</i>';
	echo '<br>';
	
	$PoderEvasion = ($skills_tacticas + ($skills_tacticas / 33 * $agilidad_victim)) * $modevasion) + (2.5 * ($nivel_victim - 12)
	$PoderEvasionEscudo = ($skills_defensa * $modescudo) / 2
	$PoderEvasion = $PoderEvasion + $PoderEvasionEscudo
	$PoderAtaque = (($skills_combate + (3 * $agilidad_attack)) * $modataque) + 2,5 * ($agilidad_attack - 12)
	$ProbExito = redondear(50 + (($PoderAtaque - $PoderEvasion) * 0.4))
	$ProbRechazoEscudo = redondear(100 * ($skills_defensa / ($skills_defensa + $skills_tacticas)))
	echo '<br><b>Probabilidad Exito: </b><i>'.$ProbExito.'</i>';
	echo '<br><b>Probabilidad Rechazo: </b><i>'.$ProbRechazoEscudo.'</i>';
	Imprimir();
	break;

function redondear($val)
{
	if ($val > 90)
	{
		return 90;
	}
	if ($val < 10)
	{
		return 10;
	}
	return $val;
}
function Imprimir()
{
	echo '<br><form name="volver" method="post" action="index.php?op=Scripts/probgolpe"> ';
	echo '<input type="submit" name="submit" value="Nueva Consulta">';
	echo '</form>';
	echo '<div align=right>';
	echo '<P><i>By MaTeO</i></P>';
	echo '</div>';
}
?>

<FORM action="index.php?op=Scripts/probgolpe" method="post">
	<P>
	<LABEL for="skills">Victima: </LABEL><BR>
	<LABEL for="skills">Skills Tacticas de Combate Victima: </LABEL>
	<INPUT type="text" name="skills_t" id="skills_t" value="0"><BR>
	<LABEL for="skills">Skills Defensa con Escudos Victima: </LABEL>
	<INPUT type="text" name="skills_d" id="skills_d" value="0"><BR>
	<LABEL for="skills">ModEvasion Victima: </LABEL>
	<INPUT type="text" name="modevasion" id="modevasion" value="0"><BR>
	<LABEL for="skills">ModEscudo Victima: </LABEL>
	<INPUT type="text" name="modescudo" id="modescudo" value="0"><BR>
	<LABEL for="skills">Agilidad Victima: </LABEL>
	<INPUT type="text" name="agilidad_victim" id="agilidad_victim" value="0"><BR>
	<LABEL for="skills">Nivel Victima: </LABEL>
	<INPUT type="text" name="nivel_victim" id="nivel_victim" value="0"><BR>
	<BR>

	<LABEL for="skills">Atacante: </LABEL><BR>
	<LABEL for="skills">Skills Combate con Armas Atacante: </LABEL>
	<INPUT type="text" name="skills_c" id="skills_c" value="0"><BR>
	<LABEL for="skills">Agilidad Atacante: </LABEL>
	<INPUT type="text" name="nivel_victim" id="agilidad_attack" value="0"><BR>
	<LABEL for="skills">Nivel Atacante: </LABEL>
	<INPUT type="text" name="nivel_victim" id="nivel_attack" value="0"><BR>

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