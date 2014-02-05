<?php

session_start();
require '../../modelo/conexion.php';
$c = conector_pg::getInstance();
extract($_POST);
$iduser = $_SESSION["iduser_roap"];
switch ($_GET["action"]) {
    case "validarAccion":
        $query = "SELECT COUNT(*) FROM report where iduser='$iduser' AND idlo='$idlo' AND valided=false;";
        $result = $c->realizarOperacion($query);
        $result = pg_fetch_array($result);
        if ($result[0] == 0) {
            echo "siPuede";
        } else {
            echo "no";
        }
        break;
    case "reportar":
        $query = ("INSERT INTO REPORT(iduser,idlo,date,description,valided) VALUES($iduser,$idlo,now(),'$motivoReporte',false)");
        $c->realizarOperacion($query);
        break;
    case "oai":
        $option = $_POST['option'] == "true" ? "1" : "0";
        $file = @fopen("../admin/configoai.txt", "w");
        fwrite($file, $option);
        fclose($file);
        break;
}
?>
