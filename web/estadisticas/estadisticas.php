<!--
.syntax0 {
color: #000000;
}
.syntax1 {
color: #cc0000;
}
.syntax2 {
color: #ff8400;
}
.syntax3 {
color: #6600cc;
}
.syntax4 {
color: #cc6600;
}
.syntax5 {
color: #ff0000;
}
.syntax6 {
color: #9966ff;
}
.syntax7 {
background: #ffffcc;
color: #ff0066;
}
.syntax8 {
color: #006699;
font-weight: bold;
}
.syntax9 {
color: #009966;
font-weight: bold;
}
.syntax10 {
color: #0099ff;
font-weight: bold;
}
.syntax11 {
color: #66ccff;
font-weight: bold;
}
.syntax12 {
color: #02b902;
}
.syntax13 {
color: #ff00cc;
}
.syntax14 {
color: #cc00cc;
}
.syntax15 {
color: #9900cc;
}
.syntax16 {
color: #6600cc;
}
.syntax17 {
color: #0000ff;
}
.syntax18 {
color: #000000;
font-weight: bold;
}
.gutter {
background: #dbdbdb;
color: #000000;
}
.gutterH {
background: #dbdbdb;
color: #990066;
}
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<html>
<head>
<title>BenderAO - Estadisticas de usuarios</title>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 <meta name="GENERATOR" content="Quanta Plus KDE">
</head>
<body text="black">

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<div class="postcontent">
<table style="border: 2px dotted gray;margin-right:auto;margin-left:auto;">
<?
$nombre = $_POST['nombre'];

if(!file_exists('Pjs/'.strtoupper($nombre).'.txt')){
echo('<script language="JavaScript" >');
echo('alert("No existe el personaje.");');
echo('location.replace("javascript:history.back(1)")');
echo('</script>');
}

//$lines = file('Pjs/'.strtoupper($_GET['user']).'.txt');
$lines = file('Pjs/'.strtoupper($nombre).'.txt');

?>

<tr style="text-align:center;background-color:#4a6890;color:#fff;">
<td>Estadistica</td>
<td>Valor</td>
</tr>

<?
foreach ($lines as $line_num => $line) {
        
        $datos = explode(",", $line);
?>      
        <tr>
        <td><center>
          <strong>Nombre</strong>
        </center></td>
        <td><strong><?= $nombre ?></strong></td>
        </tr>
        <tr>
        <td><center>
          <strong>Clan</strong>
        </center></td>
        <td><strong><?= $datos[0] ?></strong></td>
        </tr>
                <tr>
        <td><center>
          <strong>Nivel</strong>
        </center></td>
        <td><strong><?= $datos[6] ?> (<?= $datos[7] ?>%)</strong></td>
        </tr>
                <tr>
        <td><center>
          <strong>Clase</strong>
        </center></td>
        <td><strong><?= $datos[10] ?></strong></td>
        </tr>
                <tr>
        <td><center>
          <strong>Raza</strong>
        </center></td>
        <td><strong><?= $datos[11] ?></strong></td>
        </tr>
        <tr>
        <td><center>
          <strong>Usuarios Matados</strong>
        </center></td>
        <td><strong><?= $datos[1] ?></strong></td>
        </tr>
        <tr>
        <td><center>
          <strong>Ciudadanos</strong>
        </center></td>
        <td><strong><?= $datos[2] ?></strong></td>
        </tr>
        <tr>
        <td><center><strong>Criminales</strong></center></td>
        <td><strong><?= $datos[3] ?></strong></td>
        </tr>
        <tr>
        <td><center>
          <strong>Status</strong>
        </center></td>
        <td><strong><?= $datos[4] ?></strong></td>
        </tr>
                <tr>
        <td><center>
          <strong>Faccion</strong>
        </center></td>
        <td><strong><?= $datos[5] ?></strong></td>
        </tr>
                <tr>
        <td><center>
          <strong>Uptime</strong>
        </center></td>
        <td><strong><?= $datos[8] ?></strong></td>
        </tr>
                <tr>
        <td><center>
          <strong>Oro</strong>
        </center></td>
        <td><strong><?= $datos[9] ?></strong></td>
        </tr>
                <tr>
        <td><center>
          <strong>Promedio</strong>
        </center></td>
        <td><strong><?= $datos[12] ?></strong></td>
        </tr>
                <tr>
        <td><center>
          <strong>Estado</strong>
        </center></td>
        <td><strong><?= $datos[13] ?></strong></td>
        </tr>
                <tr>
        <td><center>
          <strong>Actualizado</strong>
        </center></td>
        <td><strong><?= $datos[14] ?></strong></td>
        </tr>
        </table>
<?      
        } //fin foreach
?>
</table><br>
</div>
<center><a href="index.php">Volver</a></center>
</body>
</html>