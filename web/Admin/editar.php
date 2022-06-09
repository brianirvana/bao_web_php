<? require("verificauser.php"); // incluir motor de autentificación.
$nivel_acceso=0; // definir nivel de acceso para esta página.
if ($nivel_acceso < $_SESSION['usuario_nivel']){
header ("Location: $redir?error_login=5");
exit;
} ?>
<p align=center><a href="form.php">Inicio</a></p>
<?php
	include ("../include/config_admin.php");
	$contenido = $_POST['contenido'];

	$db = mysql_connect($sql_host,$sql_usuario,$sql_pass); 
	mysql_select_db($sql_db) or die($dberror);

	$result = mysql_query("SELECT DISTINCT * FROM solicitudes") or die("Error Consulta BD!");

	$op = $_GET['op'];
	if ($op == "")
	{
		echo '<p align=center>¿Que desea editar?</p>';
		echo '<form name="options" method="get" action="editar.php">';
      		echo '<p align=center><select name="op" class="text" id="op">';
		$numcampos = mysql_num_fields($result);
		for($i; $i < $numcampos; $i++) {
			echo '<option value="'.mysql_field_name($result, $i).'">'.mysql_field_name($result, $i).'</option>';
		}
		echo '</select></p>';
		echo '<p align=center><input type="submit" name="" value="Editar"></p>';
		echo '</form>';
		exit;
	}

	if ($contenido != "")
	{
 		mysql_query("UPDATE solicitudes SET ".$op."='$contenido'");
		$result = mysql_query("SELECT DISTINCT * FROM solicitudes") or die("Error Consulta BD!");
		$data = mysql_result($result, 0, $op);
	}
	else
	{
		$data = mysql_result($result, 0, $op);
	}
	echo 'Contenido: '.$op;
	echo '<iframe width="100%" src="../Solicitar.php?op='.$op.'" height="300" frameborder="1"></iframe>';
	echo '<br>';
	echo '<html>';
	echo '<form name="edit-web" method="post" action="editar.php?op='.$op.'">';
	echo '<P align=center><textarea name="contenido" id="contenido" cols="100" rows="20">'.$data.'</textarea></P>';
	echo '<P align=center><input type="submit" name="submit" value="Guardar y Actualizar"></P>';
	echo '</form>';
	echo '<form name="volver" method="post" action="editar.php"> ';
	echo '<P align=center><input type="submit" name="submit" value="Volver"></P>';
	echo '</form>';
	echo '</html>';
?>