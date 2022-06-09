<SCRIPT language=JavaScript>
function openScreen(URL) {
  var params = 'width=800,height=600,menubar=no,toolbar=no,location=no,directories=no,scrollbars=no,status=no,resizable=no';
 window.open(URL, 'uploader', params);
	}
</SCRIPT>
<div align="center">
  <center>
  <table border="0" cellpadding="4" cellspacing="4">
<?
	$count=1;
	$upload_dir = "screens/previa/";	
	$rep=opendir($upload_dir);
	while ($file = readdir($rep)) {
		if($file != '..' && $file !='.' && $file !=''){
	            if (!is_dir($file)){
			if($count==1) echo "<tr>";
			echo "<td>";
    		    	echo "<a href=\"javascript:openScreen('screens/$file')\"><img src='screens/previa/$file' class='picture_border'>";
			echo "</td>";
			$count++;
			if($count>2){
			   $count=1;
			   echo "</tr>";
			};
		    }
		}
	}
	closedir($rep);
	clearstatcache();
	if($count==1) echo "</tr>";
?>
  </table>
  </center>
</div>
