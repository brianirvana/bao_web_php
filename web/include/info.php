<?php
//error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR);

include("config.php"); //config.php
$op = $_GET['op'];

if ($_GET['id'] != '') {
    $id = $_GET['id'];
}

if (!is_numeric($id) && $id != '') {
    exit;
} // Evitamos el Blind Injection MySQL

switch ($op) {
    case "update":
        $code = $_GET['code'];
        if ($code == "token158684839843985983") {
            $db = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }

            $data = SetInfo('name');
            $gettime .= time();
            $data .= SetInfo('IP');
            $data .= SetInfo('Port');
            $data .= SetInfo('users');
            $data .= SetInfo('enabled');
            $data .= SetInfo('desc');

            if ($_GET['updates'] == '1') {
                $query = "SELECT * FROM server WHERE id='$id' And enabled='1'";
                $consulta = mysqli_query($db, $query);
                $update = mysqli_result($consulta, 0, "updates") + 1;
                $data .= "updates='$update', ";
            }

            $data .= "LastUpdate='$gettime'";

            echo "UPDATE server SET $data WHERE id='$id'" . '<br>';
            $query = "UPDATE `server` SET $data WHERE `server`.`id`='$id'";
            mysqli_query($db, $query) or die(mysqli_error($db));

            mysqli_close($db);
        }
        break;
    case "complete":
        {
            $db = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }

            // Formato: id@nombre@estado@IP@Puerto@Usuarios@Veces Actualizado|
            // El | es el marcador de servidor
            if ($id == '') {
                $query = "SELECT * FROM server WHERE enabled='1'";
            } else {
                $query = "SELECT * FROM server WHERE id='$id' And enabled='1'";
            }

            $result = mysqli_query($db, $query);

            while ($r = mysqli_fetch_array($result)) {
                $data = $r['id'] . '@';
                $data .= $r['name'] . '@';
                $data .= Estado($r['LastUpdate']) . '@';
                $data .= $r['IP'] . '@';
                $data .= $r['Port'] . '@';
                $data .= $r['users'] . '@';
                $data .= $r['desc'] . '@';
                $data .= $r['updates'];
                $data .= '|';
                echo $data;
            }

            mysqli_close($db);
            break;
        }
}

function SetInfo($namevalue)
{
    $value = $_GET[$namevalue];
    if ($value != '') {
        return "`$namevalue` = '$value', ";
    }
}

    function Estado($time)
    {
        if (time() - $time < 1000)
        {
            // Online
            Return 'Online';
        }
        Else
        {
            // Offline
            Return 'Offline';
        }
    }

//
//<?php
//
////error_reporting(E_ALL ^ E_NOTICE);
//error_reporting(E_ERROR);
//
//include("config.php"); //config.php
//$op = $_GET['op'];
//
//if ($_GET['id'] != //) {
//    $id = $_GET['id'];
//}
//
//if (!is_numeric($id) && $id != //) { exit; } // Evitamos el Blind Injection MySQL
//    switch ($op)
//    {
//        Case "update":
//            $code = $_GET['code'];
//            if ($code == "token158684839843985983")
//            {
//                $db = mysql_connect($dbhost,$dbusername,$dbpass);
//                mysql_select_db($dbname) or die($dberror);
//
//                $data       = SetInfo('name');
//                $gettime    .= time();
//                $data       .= SetInfo('IP');
//                $data       .= SetInfo('Port');
//                $data       .= SetInfo('users');
//                $data       .= SetInfo('enabled');
//                $data       .= SetInfo('desc');
//                if ($_GET['updates'] == '1') {
//                    $query      = "SELECT * FROM server WHERE id='$id' And enabled='1'";
//                    $consulta   = mysql_query($query);
//                    $update     = mysql_result($consulta, 0, "updates") + 1;
//                    $data       .= "updates='$update', ";
//                }
//
//                $data       .= "LastUpdate='$gettime'";
//                echo "UPDATE server SET $data WHERE id='$id'".'<br>';
//                $query = "UPDATE `server` SET $data WHERE `server`.`id`='$id'";
//                //$query = "UPDATE `server` SET `desc` = 'Test' WHERE `server`.`id` = $id";
//                mysql_query($query) or die(mysql_error());
//            }
//            break;
//        Case "complete":
//        {
//            $db = mysql_connect($dbhost,$dbusername,$dbpass);
//            mysql_select_db($dbname) or die($dberror);
//
//            // Formato: id@nombre@estado@IP@Puerto@Usuarios@Veces Actualizado|
//            // El | es el marcador de servidor
//            if ($id == //)
//            {
//                $query = "SELECT * FROM server WHERE enabled='1'";
//            }
//            Else
//            {
//                $query = "SELECT * FROM server WHERE id='$id' And enabled='1'";
//            }
//            $result = mysql_query($query);
//            while ($r = mysql_fetch_array($result)) {
//                $data = $r['id'].'@';
//                $data .= $r['name'].'@';
//                $data .= Estado($r['LastUpdate']).'@';
//                $data .= $r['IP'].'@';
//                $data .= $r['Port'].'@';
//                $data .= $r['users'].'@';
//                $data .= $r['desc'].'@';
//                $data .= $r['updates'];
//                $data .= '|';
//                echo $data;
//            }
//            break;
//        }
//    }
//
//    function SetInfo($namevalue)
//    {
//        $value = $_GET[$namevalue];
//        if ($value != //)
//        {
//            return "`$namevalue` = '$value', ";
//        }
//    }
//
//    function Estado($time)
//    {
//        if (time() - $time < 1000)
//        {
//            // Online
//            Return 'Online';
//        }
//        Else
//        {
//            // Offline
//            Return 'Offline';
//        }
//    }

?>