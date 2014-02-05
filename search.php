<?php

require_once("lib/nuSOap/nusoap.php");

$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');

$server->register('buscar', // method name
        array('consulta' => 'xsd:string'), // input parameters
        array('return' => 'xsd:string')          // output parameter														// documentation
);

function buscar($condiciones) {
    require('control/functionCargarDatos.php');
    require('modelo/conexion.php');
    $c = new conector_pg();

    $query = $c->realizarOperacion("Select * from lom");
    $i = 0;
    while ($res = pg_fetch_array($query)) {
        $idlo = $res[0];
        $r = generar_json($c, $idlo);
        $answer[$i] = $r;
        $i++;
    }
    $c->close();
    return json_encode($answer);
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>
