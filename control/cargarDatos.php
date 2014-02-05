<?php

require '../modelo/conexion.php';
require '../control/functionCargarDatos.php';
$idlo = $_GET['idlo'];
$c = conector_pg::getInstance();

$r=generar_json($c, $idlo);
echo json_encode($r);
$c->close();

?>
