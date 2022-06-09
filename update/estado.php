<?
$ip="benderao.no-ip.org";
$port="7666";

error_reporting(E_ALL);
$fp = fsockopen($ip, $port,$errno,$errstr, 50);
 if (!$fp){
            echo '<font color="Red">Offline</font><br>';
} else {
echo '<font color="Green">Online</font><br>Ahora hay:'. file_get_contents('usuarios.txt') .'usuarios jugando BAO';
   } 
?>
