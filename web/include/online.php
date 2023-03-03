<?php
header('Content-Type: text/html; charset=utf8');
//error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR);
include ("config.php");
$conn = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$query = "SELECT * FROM server WHERE enabled=1";
$result = mysqli_query($conn, $query);

$total = '0';
$data = '';

while ($r = mysqli_fetch_array($result)) {
  $data .= '<u><font size=2 color=white>'.$r['name'].'</font></u><br>';
  $estado = Estado($r['LastUpdate']);
  $desc = $r['desc'];
  if ($desc != "")
  {
    $data .='<font size=2 color=white>Tipo: '.$r['desc'].'</font><br>';
  }
  if ($estado == "Online")
  {
    $data .= '<font size=2 color=white>Estado:</font><font size=2 color=green> '.Estado($r['LastUpdate']).'</font><br>';
    $data .= '<font size=2 color=white>Usuarios:</font><font size=2 color=green> '.$r['users'].'</font><br>';
    $total = $r['users'];
  }
  else
  {
    $data .= '<font size=2 color=white>Estado: </font><font size=2 color=red>'.Estado($r['LastUpdate']).'</font><br>';
  }
  $data .= '<br>';
}

mysqli_close($conn);

echo $data;
return $data;

function Estado($time)
{
  if (time() - $time < 60)
  {
    // Online
    return 'Online';
  }
  else
  {
    // Offline
    return 'Offline';
  }
}
?>