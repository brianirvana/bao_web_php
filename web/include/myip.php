<?php

if (defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4')){
   curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
}

error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR);

echo $_SERVER['REMOTE_ADDR']

?>
