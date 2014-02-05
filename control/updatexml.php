<?php

require '../modelo/conexion.php';
require './exportarOa/exportador.php';


$c = new conector_pg();

$query = "SELECT idlo
        FROM lo";
$result = $c->realizarOperacion($query);
//var_dump($result);


while ($data = pg_fetch_array($result)) {
    echo "<br/> $data[0]";
    $exportador = new exportador($data[0]);
    $exportador->addText($c->etiquetaInicial('lom:lom xmlns:lom="http://ltsc.ieee.org/xsd/LOM" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://ltsc.ieee.org/xsd/LOM http://ltsc.ieee.org/xsd/lomv1.0/lom.xsd"', 0, false));
    $exportador->getTabs();
    $exportador->addText($c->etiquetaFinal("lom:lom"));
    $exportador->guardar();
}

