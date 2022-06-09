<?
require("../include/verificauser.php"); // incluir motor de autentificación.
$nivel_acceso=0; // definir nivel de acceso para esta página.
if ($nivel_acceso < $_SESSION['usuario_nivel']){
header ("Location: $redir?error_login=5");
exit;
}

require ("../include/autconfig.php"); // incluir configuracion.
$pag=$_SERVER['PHP_SELF'];  // el nombre y ruta de esta misma página.

?>

<html>
<head>
<title>Bender AO - Visor de logs</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../images/bender.css" type=text/css rel=stylesheet>
</head>
<body bgcolor="#FFFFFF">

<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
var dDate = new Date();
var dCurMonth = dDate.getMonth();
var dCurDayOfMonth = dDate.getDate();
var dCurYear = dDate.getFullYear();
var objPrevElement = new Object();

function fToggleColor(myElement) {
var toggleColor = "#ff0000";
if (myElement.id == "calDateText") {
if (myElement.color == toggleColor) {
myElement.color = "";
} else {
myElement.color = toggleColor;
   }
} else if (myElement.id == "calCell") {
for (var i in myElement.children) {
if (myElement.children[i].id == "calDateText") {
if (myElement.children[i].color == toggleColor) {
myElement.children[i].color = "";
} else {
myElement.children[i].color = toggleColor;
            }
         }
      }
   }
}
function fSetSelectedDay(myElement){
if (myElement.id == "calCell") {
if (!isNaN(parseInt(myElement.children["calDateText"].innerText))) {
myElement.bgColor = "#c0c0c0";
objPrevElement.bgColor = "";
document.all.calSelectedDate.value = parseInt(myElement.children["calDateText"].innerText);
objPrevElement = myElement;
      }
   }
}
function fGetDaysInMonth(iMonth, iYear) {
var dPrevDate = new Date(iYear, iMonth, 0);
return dPrevDate.getDate();
}
function fBuildCal(iYear, iMonth, iDayStyle) {
var aMonth = new Array();
aMonth[0] = new Array(7);
aMonth[1] = new Array(7);
aMonth[2] = new Array(7);
aMonth[3] = new Array(7);
aMonth[4] = new Array(7);
aMonth[5] = new Array(7);
aMonth[6] = new Array(7);
var dCalDate = new Date(iYear, iMonth-1, 1);
var iDayOfFirst = dCalDate.getDay();
var iDaysInMonth = fGetDaysInMonth(iMonth, iYear);
var iVarDate = 1;
var i, d, w;
if (iDayStyle == 2) {
aMonth[0][0] = "Domingo";
aMonth[0][1] = "Lunes";
aMonth[0][2] = "Martes";
aMonth[0][3] = "Miércoles";
aMonth[0][4] = "Jueves";
aMonth[0][5] = "Viernes";
aMonth[0][6] = "Sábado";
} else if (iDayStyle == 1) {
aMonth[0][0] = "Dom";
aMonth[0][1] = "Lun";
aMonth[0][2] = "Mar";
aMonth[0][3] = "Mié";
aMonth[0][4] = "Jue";
aMonth[0][5] = "Vie";
aMonth[0][6] = "Sáb";
} else {
aMonth[0][0] = "Do";
aMonth[0][1] = "Lu";
aMonth[0][2] = "Ma";
aMonth[0][3] = "Mi";
aMonth[0][4] = "Ju";
aMonth[0][5] = "Vi";
aMonth[0][6] = "Sá";
}
for (d = iDayOfFirst; d < 7; d++) {
aMonth[1][d] = iVarDate;
iVarDate++;
}
for (w = 2; w < 7; w++) {
for (d = 0; d < 7; d++) {
if (iVarDate <= iDaysInMonth) {
aMonth[w][d] = iVarDate;
iVarDate++;
      }
   }
}
return aMonth;
}
function fDrawCal(iYear, iMonth, iCellWidth, iCellHeight, sDateTextSize, sDateTextWeight, iDayStyle) {
var myMonth;
myMonth = fBuildCal(iYear, iMonth, iDayStyle);
document.write("<table border='1' cellpadding=1 cellspacing=0>")
document.write("<tr>");
document.write("<td align='center' style='FONT-FAMILY:Arial;FONT-SIZE:12px;FONT-WEIGHT: bold'>" + myMonth[0][0] + "</td>");
document.write("<td align='center' style='FONT-FAMILY:Arial;FONT-SIZE:12px;FONT-WEIGHT: bold'>" + myMonth[0][1] + "</td>");
document.write("<td align='center' style='FONT-FAMILY:Arial;FONT-SIZE:12px;FONT-WEIGHT: bold'>" + myMonth[0][2] + "</td>");
document.write("<td align='center' style='FONT-FAMILY:Arial;FONT-SIZE:12px;FONT-WEIGHT: bold'>" + myMonth[0][3] + "</td>");
document.write("<td align='center' style='FONT-FAMILY:Arial;FONT-SIZE:12px;FONT-WEIGHT: bold'>" + myMonth[0][4] + "</td>");
document.write("<td align='center' style='FONT-FAMILY:Arial;FONT-SIZE:12px;FONT-WEIGHT: bold'>" + myMonth[0][5] + "</td>");
document.write("<td align='center' style='FONT-FAMILY:Arial;FONT-SIZE:12px;FONT-WEIGHT: bold'>" + myMonth[0][6] + "</td>");
document.write("</tr>");
for (w = 1; w < 7; w++) {
document.write("<tr>")
for (d = 0; d < 7; d++) {
document.write("<td align='left' valign='top' width='" + iCellWidth + "' height='" + iCellHeight + "' id=calCell style='CURSOR:Hand' onMouseOver='fToggleColor(this)' onMouseOut='fToggleColor(this)' onclick=fSetSelectedDay(this)>");
if (!isNaN(myMonth[w][d])) {
document.write("<font id=calDateText onMouseOver='fToggleColor(this)' style='CURSOR:Hand;FONT-FAMILY:Arial;FONT-SIZE:" + sDateTextSize + ";FONT-WEIGHT:" + sDateTextWeight + "' onMouseOut='fToggleColor(this)' onclick=fSetSelectedDay(this)>" + myMonth[w][d] + "</font>");
} else {
document.write("<font id=calDateText onMouseOver='fToggleColor(this)' style='CURSOR:Hand;FONT-FAMILY:Arial;FONT-SIZE:" + sDateTextSize + ";FONT-WEIGHT:" + sDateTextWeight + "' onMouseOut='fToggleColor(this)' onclick=fSetSelectedDay(this)> </font>");
}
document.write("</td>")
}
document.write("</tr>");
}
document.write("</table>")
}
function fUpdateCal(iYear, iMonth) {
myMonth = fBuildCal(iYear, iMonth);
objPrevElement.bgColor = "";
document.all.calSelectedDate.value = "";
for (w = 1; w < 7; w++) {
for (d = 0; d < 7; d++) {
if (!isNaN(myMonth[w][d])) {
calDateText[((7*w)+d)-7].innerText = myMonth[w][d];
} else {
calDateText[((7*w)+d)-7].innerText = " ";
         }
      }
   }
}
// End -->
</script>

<script language="JavaScript" for=window event=onload>
<!-- Begin
var dCurDate = new Date();
frmCalendarSample.tbSelMonth.options[dCurDate.getMonth()].selected = true;
for (i = 0; i < frmCalendarSample.tbSelYear.length; i++)
if (frmCalendarSample.tbSelYear.options[i].value == dCurDate.getFullYear())
frmCalendarSample.tbSelYear.options[i].selected = true;
//  End -->
</script>

<script>

// Obtener el log
function verlog()
{
var log;
var day = document.logs.calSelectedDate.value;
var month = document.logs.tbSelMonth.value;
var year = document.logs.tbSelYear.value;
log = 'gmlogs/' + year + month + '/' + document.logs.log.value + day + '.txt';
window.open(log);
}
</script>


<? $upload_dir = "gmlogs/". date("Ym") ."/";	
   $rep=opendir($upload_dir);
	$cont = 0;
	while ($file = readdir($rep)) {
		if($file != '..' && $file !='.' && $file !=''){
			if (!is_dir($file)){
				$esta = 0;
				$nombre=substr($file, 0, -6);
				For($size=0;$size<=$cont;$size++){
					if($gms[$size] == $nombre) $esta = 1;
				}
				if($esta == 0){
					$cont +=1;
					$gms[$cont] = $nombre;
				}
			}
		}
	}
	closedir($rep);
	clearstatcache();
?>



<div class="soporte">
<form name="logs" method="post" action="logs.php">

<input type="hidden" name="calSelectedDate" value="">

<table border="1" cellspacing=0 cellpadding=2>
<tr>
<td>
<select name="tbSelMonth" onchange='fUpdateCal(logs.tbSelYear.value, logs.tbSelMonth.value)'>
<option value="01">Enero</option>
<option value="02">Febrero</option>
<option value="03">Marzo</option>
<option value="04">Abril</option>
<option value="05">Mayo</option>
<option value="06">Junio</option>
<option value="07">Julio</option>
<option value="08">Agosto</option>
<option value="09">Septiembre</option>
<option value="10">Octubre</option>
<option value="11">Noviembre</option>
<option value="12">Diciembre</option>
</select>
  
<select name="tbSelYear" onchange='fUpdateCal(logs.tbSelYear.value, logs.tbSelMonth.value)'>
<? $upload_dir = "gmlogs/";	
   $rep=opendir($upload_dir);
	while ($file = readdir($rep)) {
		if($file != '..' && $file !='.' && $file !=''){
			$nombre = substr($file, 0, 4);
			echo "<option value='" . $nombre . "'>" . $nombre . "</option>";
		}
	}
	closedir($rep);
	clearstatcache();
?>
</select>
</td>
</tr>
<tr>
<td>
<script language="JavaScript">
var dCurDate = new Date();
fDrawCal(dCurDate.getFullYear(), dCurDate.getMonth()+1, 30, 30, "12px", "bold", 1);
</script>
&nbsp;</td>
</tr>
</table>

Log:<br />
<select name="log" class="text">
	<? For($size=0;$size<=$cont;$size++){
		$nombre = $gm[$size];
		echo "<option value='" . $gms[$size] . "'>" . $gms[$size] . "</option>";
	} ?>		
</select> <br />
<input type="button" name="ver" value="Ver" onClick="javascript: verlog()">
</form>
</div>
</body>
</html>