<?php
//Voy a crear un sistema de ClienteGM imposible de pasar y mas programable ya que tanto jodes puto (?

echo "Version 1.0.0<br>";

$nickname = $_GET['nickname'];
$password = $_GET['password'];
$validatecode = $_GET['validate'];
$accion = $_GET['accion'];


if ($validatecode != "contraseniamaestra")
{

	echo "¡Contraseña invalida!";
	exit;
}
echo "Procesando...<br>";
$usuarios_sesion="Staff";
$sql_host="localhost";
$sql_usuario="";
$sql_pass="";
$sql_db="";
$sql_tabla="ClienteGM";


$db_conexion= mysql_connect("$sql_host", "$sql_usuario", "$sql_pass") or die("No se pudo conectar a la Base de datos") or die(mysql_error());
mysql_select_db("$sql_db") or die(mysql_error());

switch(accion)
{
	case "registrar":
	{
		mysql_query("INSERT INTO $sql_tabla values('$nickname','$password')") or die(mysql_error());
		mysql_close();
		echo "¡Registrado!";
	}
}

//$usuario_consulta = mysql_query("SELECT * FROM $sql_tabla LIKE $nickname") or die("No se pudo realizar la consulta a la Base de datos");

//while($resultados = mysql_fetch_array($usuario_consulta)) {

/*Insert
mysql_query("INSERT INTO $sql_tabla values('','$usuario','$pass1','$nivel')") or die(mysql_error());
mysql_close();*/

?>