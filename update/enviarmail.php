<?php
$clave = $_GET['clave'];
$mail = $_GET["mail"];
$titulo = $_GET["titulo"];
$mensaje = wordwrap(str_replace("%0D","\r",$_GET["mensaje"]),170);
$nombre = $_GET["nombre"];
$de = $_GET["de"];
if($clave == 'a41aa91za2') {
	print "$mail $titulo $mensaje";
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "From: $nombre <$de>\r\n";

	mail($mail, $titulo, $mensaje, $headers);
}
?>
