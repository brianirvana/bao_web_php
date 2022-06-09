<?php

function mysqli_result($result,$row,$field=0) {
    if ($result===false) return false;
    if ($row>=mysqli_num_rows($result)) return false;
    if (is_string($field) && !(strpos($field,".")===false)) {
        $t_field=explode(".",$field);
        $field=-1;
        $t_fields=mysqli_fetch_fields($result);
        for ($id=0;$id<mysqli_num_fields($result);$id++) {
            if ($t_fields[$id]->table==$t_field[0] && $t_fields[$id]->name==$t_field[1]) {
                $field=$id;
                break;
            }
        }
        if ($field==-1) return false;
    }
    mysqli_data_seek($result,$row);
    $line=mysqli_fetch_array($result);
    return isset($line[$field])?$line[$field]:false;
}

include("include/config.php");

$link = mysqli_connect($dbhost,$dbusername,$dbpass,$dbname);

/* comprueba la conexión */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//mysql_select_db($dbname) or die($dberror);

$item = "colizquierda";
//$result = mysql_query("SELECT DISTINCT * FROM solicitudes") or die("Error Consulta BD!");

/* devuelve el nombre de la base de datos actualmente seleccionada */
if ($result = mysqli_query($link, "SELECT DISTINCT * FROM solicitudes")) {
    $data = mysqli_result($result, 0, $item);
    echo $data;
    mysqli_free_result($result);
}

mysqli_close($link);

?>