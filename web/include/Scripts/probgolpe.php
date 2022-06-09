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

echo '<FORM action="index.php?op=Scripts/probgolpe" method="post">';
echo '<P>';
echo '<LABEL for="skills">Victima: </LABEL><BR>';
echo '<LABEL for="skills">Skills Tacticas de Combate Victima: </LABEL>';
echo '<INPUT type="text" name="skills_t" id="skills_t" value="'.$skills_tacticas.'"><BR>';
echo '<LABEL for="skills">Skills Defensa con Escudos Victima: </LABEL>';
echo '<INPUT type="text" name="skills_d" id="skills_d" value="'.$skills_defensa.'"><BR>';
echo '<LABEL for="skills">ModEvasion Victima: </LABEL>';
echo '<INPUT type="text" name="modevasion" id="modevasion" value="'.$modevasion.'"><BR>';
echo '<LABEL for="skills">ModEscudo Victima: </LABEL>';
echo '<INPUT type="text" name="modescudo" id="modescudo" value="'.$modescudo.'"><BR>';
echo '<LABEL for="skills">Agilidad Victima: </LABEL>';
echo '<INPUT type="text" name="agilidad_victim" id="agilidad_victim" value="'.$agilidad_victim.'"><BR>';
echo '<LABEL for="skills">Nivel Victima: </LABEL>';
echo '<INPUT type="text" name="nivel_victim" id="nivel_victim" value="'.$nivel_victim.'"><BR>';
echo '<BR>';

echo '<LABEL for="skills">Atacante: </LABEL><BR>';
echo '<LABEL for="skills">Skills Combate con Armas Atacante: </LABEL>';
echo '<INPUT type="text" name="skills_c" id="skills_c" value="'.$skills_combate.'"><BR>';
echo '<LABEL for="skills">ModAtaque Atacante: </LABEL>';
echo '<INPUT type="text" name="modataque" id="modataque" value="'.$modataque.'"><BR>';
echo '<LABEL for="skills">Agilidad Atacante: </LABEL>';
echo '<INPUT type="text" name="agilidad_attack" id="agilidad_attack" value="'.$agilidad_attack.'"><BR>';
echo '<LABEL for="skills">Nivel Atacante: </LABEL>';
echo '<INPUT type="text" name="nivel_attack" id="nivel_attack" value="'.$nivel_attack.'"><BR>';

echo '<BR><BR>';
echo '<INPUT type="submit" value="Consultar"> <INPUT type="reset">';
echo '</P>';
echo '</FORM>';

if ($skills_tacticas != '')
{
	echo '<b>Skills Tacticas en Combate Victima: </b><i>'.$skills_tacticas.'</i>';
	echo '<br><b>Skills Defensa en Escudos Victima:</b><i>'.$skills_defensa.'</i>';
	echo '<br><b>Skills Combate Con Armas Atacante: </b><i>'.$skills_combate.'</i>';
	echo '<br><b>ModAtaque Atacante: </b><i>'.$modataque.'</i>';
	echo '<br><b>ModEvasion Victima:</b><i>'.$modevasion.'</i>';
	echo '<br><b>ModEscudo Victima: </b><i>'.$modescudo.'</i>';
	echo '<br><b>Agilidad Atacante: </b><i>'.$agilidad_attack.'</i>';
	echo '<br><b>Agilidad Victima: </b><i>'.$agilidad_victim.'</i>';
	echo '<br><b>Nivel Atacante: </b><i>'.$nivel_attack.'</i>';
	echo '<br><b>Nivel Victima: </b><i>'.$nivel_victim.'</i>';
	echo '<br>';
	
	$PoderEvasion = (($skills_tacticas + ($skills_tacticas / 33 * $agilidad_victim)) * $modevasion) + (2.5 * ($nivel_victim - 12));
	$PoderEvasionEscudo = ($skills_defensa * $modescudo) / 2;
	$PoderEvasion = $PoderEvasion + $PoderEvasionEscudo;
	$PoderAtaque = (($skills_combate + (3 * $agilidad_attack)) * $modataque) + (2.5 * ($agilidad_attack - 12));
	$ProbExito = redondear(50 + (($PoderAtaque - $PoderEvasion) * 0.4));
	$ProbRechazoEscudo = redondear(100 * ($skills_defensa / ($skills_defensa + $skills_tacticas)));
	echo '<br><b>Probabilidad Exito: </b><i>'.$ProbExito.'</i>';
	echo '<br><b>Probabilidad Rechazo: </b><i>'.$ProbRechazoEscudo.'</i>';
	Imprimir();
}

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
 <FORM action="index.php?op=Scripts/index" method="post">
    <P>
    <INPUT type="submit" value="Volver al Índice">
    </P>
 </FORM>
</div>
<div align=right>
<P><i>By MaTeO</i></P>
</div>