<?php

session_start();
require '../modelo/conexion.php';
$c = conector_pg::getInstance();
extract($_POST);
$decode = base64_decode(base64_decode(base64_decode($key)));
$query = "UPDATE users SET password='" . sha1($password) . "' WHERE email='$decode'";
$c->realizarOperacion($query);
$c = conector_pg::getInstance();
$c->close();
echo "<script>
         alert('Constrase\u00f1a cambiada correctamente');
         location.href='../main.php';
         </script>";
?>
