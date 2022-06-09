
<?php

 function getIP() 
 {
    if(getenv("HTTP_CLIENT_IP") and preg_match("/^[ 0-9 \ .]*?[ 0-9 \ .]+$/ is ", getenv(" HTTP_CLIENT_IP ")) and getenv(" HTTP_CLIENT_IP ") != '127.0.0.1 ') 
    {
        $Ip = getenv("HTTP_CLIENT_IP");
    } 
        Elseif(getenv("HTTP_X_FORWARDED_FOR") and preg_match("/^[ 0-9 \ .]*?[ 0-9 \ .]+$/ is ", getenv(" HTTP_X_FORWARDED_FOR ")) and getenv(" HTTP_X_FORWARDED_FOR " !) = '127.0.0.1 ') 
    {
        $Ip = getenv("HTTP_X_FORWARDED_FOR");
    } 
        Else 
    {
        $Ip = getenv("REMOTE_ADDR");
    }
    
    return $ip;
}
    
     $Ad_ip = getIP();
     $Ad_source = file("{$ad_dir} / {$ad_black_file}");
     $Ad_source = explode('', $ad_source [0]);
     
     if(in_array($ad_ip, $ad_source)) {die();
     }
     
     $Ad_source = file("{$ad_dir} / {$ad_white_file}");
     $Ad_source = explode('', $ad_source [0]);
     if(! in_array($ad_ip, $ad_source)) {
     
     $Ad_source = file("{$ad_dir} / {$ad_temp_file}");
     $Ad_source = explode('', $ad_source [0]);
     if(! in_array($ad_ip, $ad_source)) {
     $Ad_file = fopen("{$ad_dir} / {$ad_temp_file}", "a +");
     $Ad_string = $ad_ip. '  ';
     fputs($ad_file, "$ad_string");
     fclose($ad_fp);
 ?>
<!--
 
 The site is currently subject to DDOS attack, if you're not a machine, zombie attacking the site, click on the button, otherwise your IP(<?=$ad_ip?>) Will be blocked!
 <form method="post">
 <input type="submit" name="ad_white_ip" value="Knopka">
 </ Form>
-->
 
<?php
 die();
 }
 elseif($_POST ['ad_white_ip']) {
 $Ad_file = fopen("{$ad_dir} / {$ad_white_file}", "a +");
 $Ad_string = $ad_ip. '  ';
 fputs($ad_file, "$ad_string");
 fclose($ad_fp);
 }
 else {
 $Ad_file = fopen("{$ad_dir} / {$ad_black_file}", "a +");
 $Ad_string = $ad_ip. '  ';
 fputs($ad_file, "$ad_string");
 fclose($ad_fp);
 die();
 }
 }
 ?>