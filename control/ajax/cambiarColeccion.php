<?php
session_start();
require '../../modelo/conexion.php';
$c = conector_pg::getInstance();
switch ($_GET["action"]) {
    case "verificarPermisoCambiarColeccion":
        $idlo = $_GET["idlo"];
        $propietario = $c->realizarOperacion("select users.iduser from users natural join lo where lo.idlo=$idlo");
        $propietario = pg_fetch_array($propietario);
        $rs = $c->realizarOperacion("select count(*) from grants where iduserto=$person and idlo=$idlo and type=3");
        $rs = pg_fetch_array($rs);
        $permisoSolicitado = $c->realizarOperacion("select count(*) from pending where iduserfrom=$person and idlo=$idlo and type=1");
        $permisoSolicitado = pg_fetch_array($permisoSolicitado);
        if ($propietario[0] == $_SESSION["iduser_roap"] || ($rs[0] > 0)) { //Si el propietario es el que solicita la edicion o el que solicita el permiso ya lo tiene, entonces:
            echo "si";
        } else if ($permisoSolicitado[0] > 0) {
            echo "tramite";
        } else {
            echo "no";
        }
        break;
    case "consultarColecciones":
        $r = $c->realizarOperacion("select idcollection,name from collection order by name");
        $result = pg_fetch_all($r);
        $result = json_encode($result);
        echo $result;
        break;
    case "consultarSubColecciones":
        $idC = $_GET["idC"];
        $r = $c->realizarOperacion("select idsubcollection,name from subcollection where idcollection=$idC order by name");
        $result = pg_fetch_all($r);
        $result = json_encode($result);
        echo $result;
        break;
    case "establecerColeccion":
        extract($_POST);
        $SC2 = "select idsubcollection from lo where idlo=$idlo";
        $SC2 = pg_fetch_array($c->realizarOperacion($SC2));
        if ($SC2[0] != $idsc) {
            $dir = "../../uploads/" . $c->getLocation($idlo);
            $directorio = opendir($dir);
            $archivo = "";
            while ($i = readdir($directorio)) {
                $miarray = explode(".", $i);
                if ($miarray[0] == $idlo) {
                    $archivo = $idlo . "." . end($miarray);
                }
            }
            $oldDir = $dir . $archivo;
            $query = "UPDATE lo set idsubcollection=$idsc where idlo=$idlo";
            $c->realizarOperacion($query);
            $newDir = "../../uploads/" . $c->getLocation($idlo) . $archivo;
//            echo $oldDir . "  ---- " . $newDir;
            copy($oldDir, $newDir);
            unlink($oldDir);
            if ($_SESSION["rol_roap"] == "2") {
                if (isset($idReport) && $idReport != -1) {
                    $c->realizarOperacion("update report set valided=true, action='Cambio de Colección', dateaction=now() where idreport=$idReport");
                }
            }
        }
        break;
}
?>
