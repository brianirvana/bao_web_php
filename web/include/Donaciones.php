<?php
  // No almacenar en el cache del navegador esta página.
		header("Expires: Mon, 26 Jul 2018 05:00:00 GMT");             		// Expira en fecha pasada
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");		// Siempre página modificada
		header("Cache-Control: no-cache, must-revalidate");           		// HTTP/1.1
		header("Pragma: no-cache");                                   		// HTTP/1.0
?>

<html>

<head><meta charset="windows-1252">
<meta http-equiv="Content-Language" content="es">

</head>

<?php
	include_once("analyticstracking.php");
	if (!isset($sRetry))
?>

<link type="image/x-icon" href="favicon.ico" rel="icon" />

<p align="left">


<b>      IMPORTANTE: Recuerda que el e-mail que debes registrar al imprimir la boleta, debe ser el e-mail de tu cuenta, ya que si no, no podras canjear los puntos en tu cuenta una vez acreditada tu donacion.       </b><br><p>

<br>
<a mp-mode="dftl" href="https://www.mercadopago.com/mla/checkout/start?pref_id=143182271-823265f3-771d-43e7-8f2b-20fc70b5b9f5" name="MP-payButton" class='grey-ar-l-sq-none'>Donar $50</a>
<script type="text/javascript">
(function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
</script>
<br>
<a mp-mode="dftl" href="https://www.mercadopago.com/mla/checkout/start?pref_id=143182271-a418f819-e705-4828-ba61-cab0710d85d4" name="MP-payButton" class='grey-ar-l-sq-none'>Donar $100</a>
<script type="text/javascript">
(function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
</script>
<br>
<a mp-mode="dftl" href="https://www.mercadopago.com/mla/checkout/start?pref_id=143182271-a0056a0b-a8c2-4c20-ade5-186251ee3bc2" name="MP-payButton" class='grey-ar-l-sq-none'>Donar $200</a>
<script type="text/javascript">
(function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
</script>
<br>
<a mp-mode="dftl" href="https://www.mercadopago.com/mla/checkout/start?pref_id=143182271-0190bf35-cac1-40bc-890f-fcc91648e253" name="MP-payButton" class='grey-ar-l-sq-none'>Donar $500</a>
<script type="text/javascript">
(function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
</script>

<br>
<a mp-mode="dftl" href="https://www.mercadopago.com.ar/checkout/v1/redirect?pref_id=143182271-e1a5e56b-9c7d-4d4d-bed3-c4e85372cce6" name="MP-payButton" class='grey-ar-l-sq-none'>Donar $1000</a>
<script type="text/javascript">
(function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
</script>
<br>
<a mp-mode="dftl" href="https://www.mercadopago.com.ar/checkout/v1/redirect?pref_id=143182271-e1a5e56b-9c7d-4d4d-bed3-c4e85372cce6" name="MP-payButton" class='grey-ar-l-sq-none'>Donar $2000</a>
<script type="text/javascript">
(function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
</script>
<br>

<font color="#00FFFF"><a href="http://www.e-pagofacil.com/espanol/site/donde_pago.php" target="_new">Para ver su Pago Fácil mas cercano.</a> <br>
<a href="http://www.rapipago.com.ar/SiteController.php?action=ViewPage&amp;shortname=SUCURSALES_MAPA_ARGENTINA" target="_blank">Para ver su Rapi Pago mas cercano <br>
<a href="http://www.bapropagos.com.ar/dondepuedopagar.asp?" target="_blank">Para ver su Bapro mas cercano <br>
<a href="http://www.cobroexpress.com.ar/op/cobrar.asp?" target="_blank">Para ver su Cobro Express mas cercano <br>
<a href="https://www.pagoexpress.com.py/v2/index.php/portal/donde_pago?" target="_blank">Para ver su Cobro Express mas cercano <br>
<a href="http://www.ripsa.com.ar/sucursales.html?" target="_blank">Para ver su RIPSA mas cercano <br></font>
<br>


//<A HREF="http://bender-online.com.ar/images/donaciones.jpg"></A>

<?php
//print '<IMG SRC="http://bender-online.com.ar/images/donaciones.jpg" WIDTH="430" HEIGHT="900" BORDER="0"ALT="">';
?>


<p align="left"><b>INFORMACIÓN ESPECIAL:<br>
- Los amuletos de experiencia, no pueden ser usados durante los Happy Hours.<br>
- Los amuletos de experiencia, por obvias razones, tampoco tienen efecto sobre los Gran Dragón Negro, en ninguno de sus distintos tipos.<br>
- Ninguno de los objetos que tiene durabilidad limitada por tiempo, puede ser vendido. Una vez que se compra un objeto con duración de tiempo en minutos, no se puede vender. <br>
- Los objetos de donante sin límite de duración, pueden ser vendidos y al hacerlo recibirán el 33% del valor de cada objeto.<br>
</p></b>

<p align="left"><b>Para realizar Donaciones, haz clic 
en los&nbsp; botones que dicen: &quot;Donar&quot; más abajo.<br>
Cada uno de ellos sirve para generar automáticamente una boleta de pago. Debajo 
de cada botón, dice los distintos medios de pagos posibles. Abajo de todo, puedes buscar tu RapiPago más cercano.</b></p>

<b>El Staff de BenderAO no se hace responsable por la pérdida, robo, intercambio, desaparición por rollback o caídas inesperadas del servidor, o uso indebido de cualquiera de los ítems del juego, sean itemes canjeados por puntos o no (salvo excepcionales casos de errores de programación comprobables, casos cuyo accionar del Staff se remitirá a devolver los objetos únicamente en estos casos).
La seguridad de los personajes y sus objetos, corre exclusivamente por cuenta de los usuarios, que aceptan de manerea consciente el reglamento del juego (de obligación conocimiento) y los terminos de uso de instalación del software.
Quedando debidamente avisados, todos los usuarios, aceptan la responsabilidad que les corresponde, eximiendo al Staff de BenderAO de toda responsabilidad</b></p>

<a href="" onclick="window.scrollTo(0,0); return false">
(ir arriba)</a><font color="#008000"> </font>
</p>
</p>