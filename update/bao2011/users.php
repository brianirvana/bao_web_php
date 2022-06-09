<?
$clave = $_GET['clave'];
$users = $_GET['num'];
if($clave == 'a41asza2') {
	$archivo = "usuarios.txt";
	$abre = fopen($archivo, "w" );
	fwrite($abre, $users);
	fclose($abre);
	$archivo = "usersweb.html";
	$abre = fopen($archivo, "w" );
	fwrite($abre, '<b><font color=orange>'.$users.'</font></b>');
	fclose($abre);
}
?>
