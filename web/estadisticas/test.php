<?php
// Crear una imagen de 300x150
$im = imagecreatetruecolor(300, 150);
$negro = imagecolorallocate($im, 0, 0, 0);
$blanco = imagecolorallocate($im, 255, 255, 255);

// Establecer el fondo a blanco
imagefilledrectangle($im, 0, 0, 299, 299, $blanco);

// Ruta de nuestro archivo de fuente
$fuente = './arial.ttf';

// Primero creamos nuestra caja circundante para nuestro primer texto
$bbox = imagettfbbox(10, 45, $fuente, 'Powered by PHP ' . phpversion());

// Estas son nuestras coordenadas para X e Y
$x = $bbox[0] + (imagesx($im) / 2) - ($bbox[4] / 2) - 25;
$y = $bbox[1] + (imagesy($im) / 2) - ($bbox[5] / 2) - 5;

// Escribirlo
imagettftext($im, 10, 45, $x, $y, $negro, $fuente, 'Powered by PHP ' . phpversion());

// Crear la siguiente caja circundante para el segundo texto
$bbox = imagettfbbox(10, 45, $fuente, 'and Zend Engine ' . zend_version());

// Establecer las coordenadas para que esté a continuación del primer texto
$x = $bbox[0] + (imagesx($im) / 2) - ($bbox[4] / 2) + 10;
$y = $bbox[1] + (imagesy($im) / 2) - ($bbox[5] / 2) - 5;

// Escribirlo
imagettftext($im, 10, 45, $x, $y, $negro, $fuente, 'and Zend Engine ' . zend_version());

// Imprimir al navegador
header('Content-Type: image/png');

imagepng($im);
imagedestroy($im);
?>