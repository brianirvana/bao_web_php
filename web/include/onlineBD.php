<?
// Cargar Configuracion

error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR);

$conf = include("config.php");
$db = mysql_connect($dbhost,$dbusername,$dbpass) or die("Could not connect");
mysql_select_db($dbname);

$timestamp = time();
$timeout = $timestamp - 400;

// 1.Insertamos
$insert = mysql_query("INSERT INTO $tabla_online (timestamp, ip) VALUES('$timestamp','".$_SERVER['REMOTE_ADDR']."')") or die("Error Insertando en BD tabla_online!");

// 2.Borramos
$borrar = mysql_query("DELETE FROM $tabla_online WHERE timestamp<$timeout") or die("Error Borrando en BD!");
//3. Mostramos
$result = mysql_query("SELECT DISTINCT ip FROM tabla_online") or die("Error Consulta BD!");
$usuarios = mysql_num_rows($result);
echo "Onlines Web: " . $usuarios ."\n";
//Obtenemos la fecha
$arr = getdate();
$dia_actual = $arr["mday"];
$mes_actual = $arr["mon"];
$anio_actual = $arr["year"];

//Insertamos el usuario
$result = mysql_query("SELECT timestamp FROM $tabla_visitas where ip='".$_SERVER['REMOTE_ADDR']."' order by timestamp desc limit 1") or die("Error en la consulta!1");
$r=mysql_fetch_array($result);
$estado=$r["timestamp"];
if($timestamp > $estado+300)
   $insert2 = mysql_query("INSERT INTO $tabla_visitas (dia,mes,anio,ip,timestamp) VALUES('$dia_actual','$mes_actual','$anio_actual','".      $_SERVER['REMOTE_ADDR']."','$timestamp')") or die("Error insertando en tabla_visitas!");

$result = mysql_query("SELECT * from $tabla_visitas where dia=$dia_actual") or die("Error en la consulta!2");
$users = mysql_num_rows($result);
$dia_ayer=$dia_actual-1; 
if($dia_ayer==0)
 { 
    if($mes_actual%2==0)
      $dia_actual=31;
	  else  $dia_actual=30;
	 if($mes_actual==9)  $dia_actual=31;
	 if($mes_Actual==2) $dia_actual=28;
}
$result = mysql_query("SELECT * FROM $tabla_visitas where dia=$dia_actual-1") or die("Error en la consulta!3");
$ayer = mysql_num_rows($result);

//Mostrar visitas hoy
echo "<p></p>";
echo "Web Hoy:  <font color=blue>$users</br> </font>";
//Mostrar visitas Ayer
echo "Web Ayer:  <font color=blue>$ayer</br> </font>";


mysql_close ($db);

?>