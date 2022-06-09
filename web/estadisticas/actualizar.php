<?
$clave = $_GET['clave'];
$archivo = "Pjs/".$_GET['nick'].".txt";

$Clan = $_GET['a'];
$UsersM = $_GET['b'];
$CiudasM = $_GET['c'];
$CrimisM = $_GET['d'];
$Status = $_GET['e'];
$Faccion = $_GET['f'];
$Nivel = $_GET['g'];
$Porcentaje = $_GET['h'];
$Tiempo = $_GET['i'];
$Oro = $_GET['j'];
$Hora = $_GET['k'];
$Clase = $_GET['l'];
$Raza = $_GET['m'];
$HP = $_GET['n'];
$Log = $_GET['p'];

if($clave == 'b3d041') {
$abre = fopen($archivo, "w" );
fwrite($abre, $Clan.','.$UsersM.','.$CiudasM.','.$CrimisM.','.$Status.','.$Faccion.','.$Nivel.','.$Porcentaje.','.$Tiempo.','.$Oro.','.$Clase.','.$Raza.','.$HP.','.$Log.','.$Hora.'' );
fclose($abre);
echo 'PJ guardado';
}
?>
