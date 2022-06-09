<?
    require("verificauser.php");
    $nivel_acceso=10; // Nivel de acceso para esta página.
    if ($nivel_acceso <= $_SESSION['usuario_nivel']){
    header ("Location: $redir?error_login=5");
    exit;
} ?>

<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        <meta http-equiv="Content-Language" content="es">
        
        <title>Menu de Opciones</title>
            <style type="text/css">
            <!--
             .botones {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9pt; color: #FFFFFF; background-color: #0099FF; border-color: #000000 ; border-top-width: 1pix; border-right-width: 1pix; border-bottom-width: 1pix; border-left-width: 1pix}
             .imputbox {  font-size: 10pt; color: #000099; background-color: #FFFFFF; font-family: Verdana, Arial, Helvetica, sans-serif; border: 1pix #000000 solid; border-color: #000000 solid; font-weight: normal}
             A:VISITED  { font-weight: normal; color: #0000CC; TEXT-DECORATION:none; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10pt}
             A:LINK     { font-weight: normal; color: #0000CC; TEXT-DECORATION:none; font-family: Verdana, Arial, Helvetica, sans-serif; border-color: #33FF33 #66FF66; clip:  rect(   ); font-size: 10pt}
             A:ACTIVE   { font-weight: normal; color: #FF3333; TEXT-DECORATION:none; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10pt}
             A:HOVER    { font-weight: normal; color: #0000CC; font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: normal; text-decoration: underline; font-size: 10pt}
             .notitext {
            	FONT-WEIGHT: bold; FONT-SIZE: 8pt; COLOR: #000000; LINE-HEIGHT: 130%; FONT-STYLE: normal; FONT-FAMILY: verdana, arial, helvetica, sans-serif
            }
            .acceso {
               font-size: 130%; letter-spacing: -1.2px;
               color: #17d717
            }
            .columna1 {
               background: #d7e1ec;
            }
            -->
            </style>
    </head>
    
    <body  link="#808080" vlink="#808080" alink="#808080" bgcolor="#d7e1ec">
    
    <div align="center">
      <center>
      <table class="notitext" border=0 width=50%>
        <tr>
          <td align=center class="acceso">Acceso autorizado: <? echo $_SESSION['usuario_login']; ?></td>
        </tr>
        <tr>
          <td align=center class="culumna1">Menu:</td>
        </tr>
    <?
    if ($_SESSION['usuario_nivel']<=2){
    echo "<tr>";
    echo "<td align='left'><a href='soporte.php'>Gestionar Soportes</a></td>";
    echo "</tr>";
    }
    
    if ($_SESSION['usuario_nivel']<=3){
    echo "<tr>";
    echo "<td align='left'><a href='../fotodenuncia/uploaded_files.php'>Gestionar Foto denuncias</a></td>";
    echo "</tr>";
    }
    
    if ($_SESSION['usuario_nivel']<=1){
    echo "<tr>";
    echo "<td align='left'><a href='noticias.php'>Gestionar Noticias</a></td>";
    echo "</tr>";
    }
    
    if ($_SESSION['usuario_nivel']==0){
    echo "<tr>";
    echo "<td align='left'><a href='gestionusuarios.php'>Gestionar Cuentas</a></td>";
    echo "</tr>";
    } 
    
    //echo "<tr>";
    //echo "<td align='left'><a href='ispadmin.php'>Ver Estadisticas ISP</a></td>";
    //echo "</tr>";
    
    if ($_SESSION['usuario_nivel']==0){
    echo "<tr>";
    echo "<td align='left'><a href='editar.php'>Editar Web</a></td>";
    echo "</tr>";
    } 
    
    //echo "<tr>";
    //echo "<td align='left'><a href='logs.php'>Ver logs</a></td>";
    //echo "</tr>";
    
    ?>
        <tr>
          <td align="left"> <a href="logout.php">Salir (LogOut)</a></td>
        </tr>
      </table>
      </center>
    </div>
    </body>

</html>
