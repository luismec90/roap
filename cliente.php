<?php
if (isset($_GET['enviar'])) {
    require_once("lib/nuSOap/nusoap.php");
    $client = new nusoap_client('http://roap.medellin.unal.edu.co/unalmed/search.php?wsdl', 'wsdl');
    $err = $client->getError();
    if ($err) {
        echo '<h2>Error en el Constructor</h2><pre>' . $err . '</pre>';
    }


    $result = $client->call('buscar');

    if ($client->fault) {
        echo '<h2>Fault</h2><pre>';
        print_r($result);
        echo '</pre>';
    } else {

        $err = $client->getError();
        if ($err) {// Hay errores?
            echo '<h2>Error</h2><pre>' . $err . '</pre>'; // mostrar error
        } else {
            echo $result;
            $r = json_decode($result); //$r contiene todos los OAs con sus respectivos metadatos
           // var_dump($r);
        }
    }

//echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';  //Debug
}
?>


<form action="" method="get">
    <input name="enviar" value="Consultar OAs" type="submit" />
</form>