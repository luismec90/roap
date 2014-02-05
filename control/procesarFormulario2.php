<?php

session_start();
require('../modelo/conexion.php');
$c = conector_pg::getInstance();
$idlo = $_POST['idlo'];

//echo "INSERT INTO pending VALUES(" . $_SESSION['iduser_roap'] . "," . $_SESSION['iduser_roap'] . ",$idlo,7)";
$c->realizarOperacion("INSERT INTO pending VALUES(" . $_SESSION['iduser_roap'] . "," . $_SESSION['iduser_roap'] . ",$idlo,7)");
?>
