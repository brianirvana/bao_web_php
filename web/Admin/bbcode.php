<?php
function bbcode($texto) {
/*	$texto = nl2br(nls2p(htmlentities($texto)));
	$texto= stripslashes($texto);
	$texto = str_replace("[code]", "<table align=\"left\" cellpadding=\"0\" cellspacing=\"0\"><tr><td><div align=\"left\" style=\"padding:5px;margin:5px;\"><div style=\" background-color:#FFFFFF;border-color:#808080;border-style:solid;border-width:1px;font-size:11px;margin:0px;overflow:auto;padding:6px;text-align:left;width:330px;\">[code]", $texto);
	$texto = str_replace("[/code]", "[/code]<br /></div></div></td></tr></table>", $texto);
 	$texto = str_replace('&quot;','"',$texto);  */
    $simple_search = array('/\[quote\](.*?)\[\/quote\]/is','/\[b\](.*?)\[\/b\]/is','/\[i\](.*?)\[\/i\]/is','/\[u\](.*?)\[\/u\]/is','/\[a href\=(.*?)\](.*?)\[\/a\]/is','/\[img src\=(.*?)\]/','#\[code\](.*?)\[\/code\]#se'); 
    $simple_replace = array("<table align=\"left\" cellpadding=\"0\" cellspacing=\"0\"><tr><td><div align=\"left\" style=\"padding:5px;margin:5px;\"><div style=\" background-color:#EEEFDC;border-color:#808080;border-style:solid;border-width:1px;font-size:11px;margin:0px;overflow:auto;padding:6px;text-align:left;width:330px;\">$1<br /></div></div></td></tr></table>",'<strong>$1</strong>','<em>$1</em>','<u>$1</u>','<a href=$1>$2</a>','<img src=$1 alt=$1 />',"highlight_string(stripslashes(html_entity_decode(str_replace('<br />','','$1'))), true)");
    $texto = preg_replace ($simple_search, $simple_replace, $texto); 
    return $texto; 
} 
/*function nls2p($str){
  return str_replace('<p></p>', '', '<p>' 
        . preg_replace('#([\r\n]\s*?[\r\n]){2,}#', '</p>$0<p>', $str) 
        . '</p>');
}*/

?>