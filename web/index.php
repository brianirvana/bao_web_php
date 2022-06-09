<?php
    header('Content-Type: text/html; charset=utf-8');
//error_reporting(E_ALL ^ E_NOTICE);
//error_reporting(E_ERROR);

  // No almacenar en el cache del navegador esta página.
		header("Expires: Mon, 26 Jul 2007 05:00:00 GMT");             		// Expira en fecha pasada
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");		// Siempre página modificada
		header("Cache-Control: no-cache, must-revalidate");           		// HTTP/1.1
		header("Pragma: no-cache");                                   		// HTTP/1.0

	include_once("analyticstracking.php");
	
    if(isset($_GET['op']))
        $op = $_GET['op'];
    else
        if(isset($_GET['id']))
            $id = $_GET['id'];
        else
            $op = "central";
?>

<html>
<head><meta charset="windows-1252">

<link rel="image_src" href="logo.jpg" />

<meta http-equiv="Content-Language" content="es">
<LINK href="images/bender.css" type=text/css rel=stylesheet>
<title>BenderAO MMRPG Web Oficial</title>
<link type="image/x-icon" href="favicon.ico" rel="icon" />
<link rel="image_src" href="/images/bendermanu.png">

<script language="JavaScript" type="text/javascript">
    //<![CDATA[
    var txt="                         .:: Web Oficial de BenderAO ::. -= Tu servidor preferido =-";
    var espera=100;
    var refresco=null;
    function rotulo_title() {
    document.title=txt;
    txt=txt.substring(1,txt.length)+txt.charAt(0);
    refresco=setTimeout("rotulo_title()",espera);}
    rotulo_title();
    //]]>
</script>

</head>

<?php

?>

<body background="images/back.gif">

<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" width="348">
    <tr>
      <td width="822" height="1">
        <table border="0" cellpadding="0" cellspacing="0" width="758" height="1">
          <tr>
            <td width="820" colspan="3" height="1"><img border="0" src="images/bannerborder_top.gif" width="820" height="25"></td>
          </tr>
          <TR>
          <TD height=1><IMG height=96 src="images/bannerborder_left.gif" 
            width=18></TD>
          <TD width=799 height=1>
            <P align=center><script language="JavaScript" type="text/javascript" src="include/embed.js"></script>
		<script type="text/javascript" language="javascript1.2"> 
		embedFlash("images/","encabezado",780,96); 
            </script></P></TD>
          <TD height=1><IMG height=96 
            src="images/bannerborder_right.gif" width=22></TD></TR>
        <TR>
            <td width="820" colspan="3"  colspan="3"><img src="images/bannerborder_down.gif"></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td width="818" height="338">
        <table border="0" cellpadding="0" cellspacing="0" width="820" height="204">
          <tr>
            <td width="190" background="images/left_bkgd.jpg" rowspan="3" height="204" valign="top">
              <div align="center">
		<?
			include ("menu.php");
		?>
              	<p><br>
		<script type="text/javascript"><!--
		google_ad_client = "pub-6794981739501828";
		/* 120x600, creado 29/06/11 */
		google_ad_slot = "9142948323";
		google_ad_width = 120;
		google_ad_height = 600;
		//-->
		</script>
		<script type="text/javascript"
		src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script></div>
              	<div align="center">
		<?
		include ("colizquierda.php");
		?>
              </div>
            </td>
            <td width="440" height="1"><img border="0" src="images/center_top_border.gif" width="440" height="70"></td>
            <td width="190" background="images/right_bkgd.jpg" rowspan="3" height="204" valign="top">
              <div align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="80%">
                  <tr>
                    <td width="100%">&nbsp;
                      <div align="center">
                        <table border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="26" height="27"><img border="0" src="images/m_sx.gif" width="26" height="27"></td>
                            <td class="titulo" background="images/m_sf1.gif">
                             Estado:</td>
                            <td width="26" height="27"><img border="0" src="images/m_dx.gif" width="26" height="27"></td>
                          </tr>
                          <tr>
                            <td width="26" background="images/lat_sx.gif">&nbsp;</td>
                            <td class="estado" background="images/m_fondo.gif">
				<div id="users">
				<? 
				
		include($_SERVER['DOCUMENT_ROOT']."/web/include/online.php");
		include($_SERVER['DOCUMENT_ROOT']."/web/include/onlineBD.php"); ?>
				</div>
                            </td>
                            <td width="26" background="images/lat_dx.gif">&nbsp;</td>
                          </tr>
                          <tr>
                            <td width="26" height="27"><img border="0" src="images/m_sx2.gif" width="26" height="27"></td>
                            <td background="images/m_sf2.gif"></td>
                            <td width="26" height="27"><img border="0" src="images/m_dx2.gif" width="26" height="27"></td>
                          </tr>
                        </table>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td width="100%">&nbsp;so
                      <div align="center">
                        <table border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="26" height="27"><img border="0" src="images/m_sx.gif" width="26" height="27"></td>
                            <td class="titulo" background="images/m_sf1.gif">
                             </td>
                            <td width="26" height="27"><img border="0" src="images/m_dx.gif" width="26" height="27"></td>
                          </tr>
                          <tr>
                            <td width="26" background="images/lat_sx.gif">&nbsp;</td>
                            <td class="estado" background="images/m_fondo.gif">
					<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:send href="http://www.bender-online.com.ar/" font="Morpheus" colorscheme="dark"></fb:send>

					<?='<div id="fb-root"></div><script src="http://connect.facebook.net/es_ES/all.js#appId=128897243865016&amp;xfbml=1"></script><fb:like href="http://bender-online.com.ar" send="false" layout="button_count" width="110" show_faces="false" font=""></fb:like>'?>
					<br>

					<div id="fb-root"></div>
					<script>(function(d, s, id) {
  					var js, fjs = d.getElementsByTagName(s)[0];
  					if (d.getElementById(id)) return;
  					js = d.createElement(s); js.id = id;
  					js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.0";
  					fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>
					<br>

					<a href="http://www.twitter.com/AoBender"><img src="http://twitter-badges.s3.amazonaws.com/twitter-a.png" alt="Seguir a AoBender en Twitter"/></a>
					<br>

					<a href="http://sourceforge.net/projects/benderao/" target="_blank"><img class="picture_border" src="images/sfnet.png"></a>
					<br>

					<a href="http://minehost.com.ar" target="_blank"><img class="picture_border" src="images/logominehost.png"></a>
					<br>

					<div id="fb-root"></div>
					<script>(function(d, s, id) {
  					var js, fjs = d.getElementsByTagName(s)[0];
  					if (d.getElementById(id)) {return;}
  						js = d.createElement(s); js.id = id;
  						js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>

    					</head>
    					<body>
       					<br>
       					<iframe src="http://www.facebook.com/plugins/like.php?href=http://bender-online.com.ar/"
        					scrolling="no" frameborder="2"
        					style="border:none; width:120px; height:150px"></iframe>
    					</body>
 					</html>

					<body>
   					<br>

					<script type="text/javascript"><!--
					google_ad_client = "pub-6794981739501828";
					/* peque */
					google_ad_slot = "7108184950";
					google_ad_width = 120;
					google_ad_height = 90;
					//-->
					</script>
					<script type="text/javascript"
					src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
					</script>
					</div>

                            </td>
                            <td width="26" background="images/lat_dx.gif">&nbsp;</td>
                          </tr>
                          <tr>
                            <td width="26" height="27"><img border="0" src="images/m_sx2.gif" width="26" height="27"></td>
                            <td background="images/m_sf2.gif"></td>
                            <td width="26" height="27"><img border="0" src="images/m_dx2.gif" width="26" height="27"></td>
                          </tr>
                        </table>
                      </div>
                    </td>
                  </tr>
				  <tr>
                    <td width="100%">&nbsp;
                      <div align="center">
                        <table border="0" cellpadding="0" cellspacing="0">
                          <tr>
						  <td>
						  </td>
						  </tr>
						</table>
					  </div>
					</td>
				  </tr>
				</table>


           </td>
          </tr>
          <tr>
            <td width="440" background="images/center_bkgd.gif" height="1300" valign="top">
              <div align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="80%">
                  <tr>
                    <td width="100%" valign="top">
                      
                  </tr>
                  <tr>
                    <td width="100%" valign="top">
                      &nbsp;</td>
                  </tr>
                  <tr>
                    <td width="100%" valign="top" align="center">
                      <p align="center"><span class="central">
							<?
							//$nojava = $_GET['nojava'];
							//if ($nojava == "")
							//{
							//}
							//else
							//{
							//if ($op != "central")
							//{
							@include ("include/".$op.".php");
							
							echo '<div id="resultado"></div>';

							//}
							//}
							?>
						</span></p>
                    </td>
                  </tr>
                </table>
              </div>
            </td>
          </tr>
          <tr>
            <td width="440" height="19"><img border="0" src="images/center_bottom_border.gif" width="440" height="70"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  </center>
</div>

<?
include ("piepagina.php");
?>

<script language="JavaScript">


var objeto = false;
var objetousers = false;
var webtitulo = document.title;
//leerDatos('central.php')
//leerUsers()

function DelDiv() {
	document.getElementById('resultado').innerHTML = "";
}
function crearObjeto() {
  // --- Crear el Objeto dependiendo los diferentes Navegadores y versiones ---
  try { objeto = new ActiveXObject("Msxml2.XMLHTTP");  }
  catch (e) {
  try { objeto = new ActiveXObject("Microsoft.XMLHTTP"); }
  catch (E) {
  objeto = false; }
  }
  // --- Si no se pudo crear... intentar este ultimo metodo ---
  if (!objeto && typeof XMLHttpRequest!='undefined') {
    objeto = new XMLHttpRequest();
  }
}

function crearObjetoUsers() {
  // --- Crear el Objeto dependiendo los diferentes Navegadores y versiones ---
  try { objetousers = new ActiveXObject("Msxml2.XMLHTTP");  }
  catch (e) {
  try { objetousers = new ActiveXObject("Microsoft.XMLHTTP"); }
  catch (E) {
  objetousers = false; }
  }
  // --- Si no se pudo crear... intentar este ultimo metodo ---
  if (!objetousers && typeof XMLHttpRequest!='undefined') {
    objetousers = new XMLHttpRequest();
  }
}
// ------------------------------

function leerDatos(valor) {
  crearObjeto();

  if (objeto.readyState != 0) {
    alert('Error al crear el objeto XML. El Navegador no soporta AJAX');
  } else {
    // Preparar donde va a recibir el Resultado
    objeto.onreadystatechange = procesaResultado;
    // Enviar la consulta
    objeto.open("GET", "include/" + valor, true);
    objeto.send(null);
  }
}

function leerUsers() {
  crearObjetoUsers();
  if (objetousers.readyState != 0) {
    alert('Error al crear el objeto XML. El Navegador no soporta AJAX');
  } else {
    // Preparar donde va a recibir el Resultado
    objetousers.onreadystatechange = procesaUsers;
    // Enviar la consulta
    objetousers.open("GET", "include/online.php", false);
    objetousers.send(null);
  }
}
function procesaUsers() {
// Si aun esta revisando los datos...
if (objetousers.readyState == 1) {
  //document.getElementById('resultado').innerHTML = "Cargando datos...";
}
// Si el estado es 4 significa que ya termino
if (objetousers.readyState == 4) {
  // objeto.responseText trae el Resultado que metemos al DIV de arriba
  document.getElementById('users').innerHTML = objetousers.responseText;
  //window.setTimeout(leerUsers, 1000)
}
}

// ------------------------------

function procesaResultado() {
// Si aun esta revisando los datos...
if (objeto.readyState == 1) {
	document.title = webtitulo + " - Cargando...";
  //document.getElementById('resultado').innerHTML = "Cargando datos...";
}
// Si el estado es 4 significa que ya termino
if (objeto.readyState == 4) {
  // objeto.responseText trae el Resultado que metemos al DIV de arriba
  //var cadena = unescape(objeto.responseText);
  //cadena = cadena.replace(/\+/gi,&#8221; ");
  document.title = webtitulo;
  document.getElementById('resultado').innerHTML = objeto.responseText;
}
}
</script>

<style type="text/css">
@import url(http://www.google.com.ar/cse/api/branding.css);
</style>
<div class="cse-branding-bottom" style="background-color:#000000;color:#FFFFFF">
  <div class="cse-branding-form">
    <form action="http://www.google.com.ar/cse" id="cse-search-box" target="_blank">
      <div>
        <input type="hidden" name="cx" value="partner-pub-6794981739501828:9312008754" />
        <input type="hidden" name="ie" value="UTF-8" />
        <input type="text" name="q" size="20" />
        <input type="submit" name="sa" value="Search" />
      </div>
    </form>
<script type="text/javascript" src="http://www.google.com.ar/jsapi"></script>
<script type="text/javascript">google.load("elements", "1", {packages: "transliteration"});</script>
<script type="text/javascript" src="http://www.google.com.ar/cse/t13n?form=cse-search-box&amp;t13n_langs=en"></script>
  </div>
  <div class="cse-branding-logo">
    <img src="http://www.google.com/images/poweredby_transparent/poweredby_000000.gif" alt="Google" />
  </div>
  <div class="cse-branding-text">
    Custom Search
  </div>
</div>

</body>

</html>