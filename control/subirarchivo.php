<?php

require 'control/importarOa/import.php';
require 'control/importarOa/importador.php';
require 'control/exportarOa/exportador.php';
extract($_POST);
//var_dump($question);
if (!isset($question)) {
    header("location:main.php");
} else if ($ubicacion == "subir") {
    $archivo1 = $_FILES['archivos']['name'][0];
    $extencion = explode(".", $archivo1);
    $extencion = end($extencion);
    if ($question == "Importar") {
        $c = conector_pg::getInstance();
        $c->insertLO($oculto, $_SESSION["iduser_roap"]);
        $file1 = "uploads/" . $c->getLocation($c->lastValue2("lo", "idlo")) . $c->lastValue2("lo", "idlo") . "." . $extencion;
        copy($_FILES['archivos']['tmp_name'][0], $file1);
        $archivo2 = $_FILES['archivos']['name'][1];
        $file2 = "files/" . $archivo2;
        copy($_FILES["archivos"]['tmp_name'][1], $file2);
        $importer = new importador($file2);                
        $importer->import();
        unlink($file2);
        $idlo = "X";
    } else if ($question == "Ingresar") {
        $file = "files/" . $_SESSION["iduser_roap"] . "." . $extencion;
        $_SESSION["extension_roap"] = $extencion;
        $_SESSION["source_roap"] = $file;
        $_SESSION["subcollection_roap"] = $oculto;
        $_SESSION["catalogar_roap"] = 1;
        move_uploaded_file($_FILES["archivos"]['tmp_name'][0], $file);
        $size = filesize($file);

        $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
        $ruta = dirname($url);
        $ruta = $ruta . "/control/download.php?id=X";
    }
} else if ($ubicacion == "referencia") {

    $_SESSION["subcollection_roap"] = $oculto;
    $extencion = "";
    $size = "";
    $ruta = $textReferencia;
    if (stristr($ruta, 'http') === FALSE) {
        $ruta = "http://" . $ruta;
    }
}
$_SESSION["ubicacion"] = $ubicacion;
?>
