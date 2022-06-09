<?
// Cargamos variables
require ("../include/config_admin.php");
// le damos un mobre a la sesion (por si quisieramos identificarla)
session_name($usuarios_sesion);
// iniciamos sesiones
session_start();
// destruimos la session de usuarios.
session_destroy();
header ("Location: ../?");
?>
