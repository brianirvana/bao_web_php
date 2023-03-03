<?php
//error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR);

include("include/config.php");
$conn = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$item = "menu";
$result = mysqli_query($conn, "SELECT DISTINCT * FROM solicitudes") or die("Error Consulta BD!");
$data = mysqli_fetch_assoc($result)[$item];
echo $data;

mysqli_close($conn);
?>