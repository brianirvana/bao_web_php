<?php
// Cargar Configuracion

error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR);

$conf = include("config.php");
$db = mysqli_connect($dbhost,$dbusername,$dbpass,$dbname) or die("Could not connect");
$timestamp = time();
$timeout = $timestamp - 400;

// 1.Insertamos
$insert = mysqli_query($db, "INSERT INTO $tabla_online (timestamp, ip) VALUES('$timestamp','".$_SERVER['REMOTE_ADDR']."')") or die("Error Insertando en BD tabla_online!");

// 2.Borramos
$borrar = mysqli_query($db, "DELETE FROM $tabla_online WHERE timestamp<$timeout") or die("Error Borrando en BD!");
//3. Mostramos
$result = mysqli_query($db, "SELECT DISTINCT ip FROM tabla_online") or die("Error Consulta BD!");
$usuarios = mysqli_num_rows($result);
echo "Onlines Web: " . $usuarios ."\n";
//Obtenemos la fecha
$arr = getdate();
$dia_actual = $arr["mday"];
$mes_actual = $arr["mon"];
$anio_actual = $arr["year"];

//Insertamos el usuario
$result = mysqli_query($db, "SELECT timestamp FROM $tabla_visitas where ip='".$_SERVER['REMOTE_ADDR']."' order by timestamp desc limit 1") or die("Error en la consulta!1");
$r=mysqli_fetch_array($result);
$estado=$r["timestamp"];
if($timestamp > $estado+300)
   $insert2 = mysqli_query($db, "INSERT INTO $tabla_visitas (dia,mes,anio,ip,timestamp) VALUES('$dia_actual','$mes_actual','$anio_actual','".      $_SERVER['REMOTE_ADDR']."','$timestamp')") or die("Error insertando en tabla_visitas!");

$result = mysqli_query($db, "SELECT * from $tabla_visitas where dia=$dia_actual") or die("Error en la consulta!2");
$users = mysqli_num_rows($result);
$dia_ayer=$dia_actual-1; 
if($dia_ayer==0)
 { 
    if($mes_actual%2==0)
      $dia_actual=31;
	  else  $dia_actual=30;
	 if($mes_actual==9)  $dia_actual=31;
	 if($mes_actual==2) $dia_actual=28;
}
$result = mysqli_query($db, "SELECT * FROM $tabla_visitas where dia=$dia_actual-1") or die("Error en la consulta!3");
$ayer = mysqli_num_rows($result);

//Mostrar visitas hoy
echo "<p></p>";
echo "Web Hoy:  <font color=blue>$users</br> </font>";
//Mostrar visitas Ayer
echo "Web Ayer:  <font color=blue>$ayer</br> </font>";

mysqli_close ($db);
?>
