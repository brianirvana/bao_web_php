<?php
include("config_secure_open.php");
$serial = $_GET['sr'];

$conn = mysqli_connect($dbhost,$dbusername,$dbpass,$dbname);
if(mysqli_connect_errno()) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$query = "SELECT db_usr, db_pwd, db_host, db_name, info, db_enabled, port FROM sv_security WHERE db_serial='$serial' And db_enabled='1'";
$result = mysqli_query($conn, $query);
while ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $data = $r['db_usr'].'@';
    $data .= $r['db_pwd'].'@';
    $data .= $r['db_host'].'@';
    $data .= $r['db_name'].'@';
    $data .= $r['info'].'@';
    $data .= $r['db_enabled'].'@';
    $data .= $r['port'];
    echo $data;
}

mysqli_close($conn);
?>

//<?php
//include("config_secure_open.php");
//$serial = $_GET['sr'];

//$db = mysql_connect($dbhost,$dbusername,$dbpass); 
//mysql_select_db($dbname) or die($dberror);

//$query = "SELECT db_usr, db_pwd, db_host, db_name, info, db_enabled, port FROM sv_security WHERE db_serial='$serial' And db_enabled='1'";
//$result = mysql_query($query);
//while ($r = mysql_fetch_array($result)) {
//	$data = $r['db_usr'].'@';
//	$data .= $r['db_pwd'].'@';
//	$data .= $r['db_host'].'@';
//	$data .= $r['db_name'].'@';
//	$data .= $r['info'].'@';
//	$data .= $r['db_enabled'].'@';
//	$data .= $r['port'];
//	echo $data;
//}
//?>