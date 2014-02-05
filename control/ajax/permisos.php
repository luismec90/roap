<?php

session_start();
require '../../modelo/conexion.php';
$c = conector_pg::getInstance();
$idlo = $_POST['idlo'];
$propietario = $c->realizarOperacion("select users.iduser from users natural join lo where lo.idlo=$idlo");
$propietario = pg_fetch_array($propietario);
$person = $_SESSION['iduser_roap'];



switch ($_POST['action']) {
    case "verificarPermisoCambiarColeccion":
        $rs = $c->realizarOperacion("select count(*) from grants where iduserto=$person and idlo=$idlo and type=9");
        $rs = pg_fetch_array($rs);
        $permisoSolicitado = $c->realizarOperacion("select count(*) from pending where iduserfrom=$person and idlo=$idlo and type=8");
        $permisoSolicitado = pg_fetch_array($permisoSolicitado);
        if ($propietario[0] == $_SESSION["iduser_roap"] || ($rs[0] > 0) || $_SESSION["role"] == 2 || $_SESSION["role"] == 3) { //Si el propietario es el que solicita la edicion o el que solicita el permiso ya lo tiene o el admin/revisor es el que solicita, entonces:
            echo "si";
        } else if ($permisoSolicitado[0] > 0) {
            echo "tramite";
        } else {
            echo "no";
        }
        break;

    case "solicitarPermisoCambiarColeccion":
        $c->realizarOperacion("insert into pending(idUserFrom,idLO,idUserTo,type)values($person,$idlo,$propietario[0],8)");
        break;
    case "verificarPermisoEdicion":
        $rs = $c->realizarOperacion("select count(*) from grants where iduserto=$person and idlo=$idlo and type=3");
        $rs = pg_fetch_array($rs);
        $permisoSolicitado = $c->realizarOperacion("select count(*) from pending where iduserfrom=$person and idlo=$idlo and type=1");
        $permisoSolicitado = pg_fetch_array($permisoSolicitado);
        if ($propietario[0] == $_SESSION["iduser_roap"] || ($rs[0] > 0) || $_SESSION["role"] == 2 || $_SESSION["role"] == 3) { //Si el propietario es el que solicita la edicion o el que solicita el permiso ya lo tiene o el admin/revisor es el que solicita, entonces:
            echo "si";
        } else if ($permisoSolicitado[0] > 0) {
            echo "tramite";
        } else {
            echo "no";
        }
        break;

    case "solicitarPermisoEdicion":
        $c->realizarOperacion("insert into pending(idUserFrom,idLO,idUserTo,type)values($person,$idlo,$propietario[0],1)");
        break;

    case "verificarPermisoEliminacion":
        $rs = $c->realizarOperacion("select count(*) from grants where iduserto=$person and idlo=$idlo and type=4");
        $rs = pg_fetch_array($rs);
        $permisoSolicitado = $c->realizarOperacion("select count(*) from pending where iduserfrom=$person and idlo=$idlo and type=2");
        $permisoSolicitado = pg_fetch_array($permisoSolicitado);
        if ($propietario[0] == $_SESSION["iduser_roap"] || ($rs[0] > 0) || $_SESSION["role"] == 2 || $_SESSION["role"] == 3) { //Si el propietario es el que solicita la edicion o el que solicita el permiso ya lo tiene o el admin/revisor es el que solicita, entonces:
            echo "si";
        } else if ($permisoSolicitado[0] > 0) {
            echo "tramite";
        } else {
            echo "no";
        }
        break;

    case "solicitarPermisoEliminacion":
        $c->realizarOperacion("insert into pending(idUserFrom,idUserTo,idLO,type)values($person,$propietario[0],$idlo,2)");
        break;

    case "EliminarOa";
        $ruta = "../../uploads/" . $c->getLocation($idlo);

        $iduserOwner = pg_fetch_array($c->realizaroperacion("select users.iduser from users,lo where users.iduser=lo.iduser and lo.idlo=$idlo"));
        $iduserOwner = $iduserOwner[0];
        
        $title=$c->getTitleLo($idlo);
        
        $c->realizarOperacion("insert into deletedlo values($idlo,'$iduserOwner','" . $_SESSION["iduser_roap"] . "','$title',now())");
        $c->realizarOperacion("delete from lo where idlo=$idlo");
        $c->realizarOperacion("insert into loadlo values($idlo,2,now())");
        
        
         //eliminamos de FROAC tambien

        $query = "SELECT * FROM dataFROAC";
        $result = $c->realizarOperacion($query);
        $repo = pg_fetch_array($result);
        $query = "SELECT * FROM loadlo order by insertionDate";
        $result = $c->realizarOperacion($query);
        while ($data = pg_fetch_array($result)) {
            $page = "http://$repo[2]?idlo=$data[0]&idrepository=$repo[1]&type=$data[1]";
            $response = $c->getText($page);
            if ($response == "OK") {
                $c->realizarOperacion("DELETE FROM loadlo WHERE idlo=$data[0] and type=$data[1]");
            }
        }
        
        
        if (file_exists($ruta)) {
            $a_eliminar = scandir($ruta);
            foreach ($a_eliminar as $elemento) {
                $path = pathinfo($elemento); // con esto obtengo el nombre del archivo sin extension.
                if ($path['filename'] == $idlo) {
                    $borrar = $ruta . $elemento;
                    if (unlink($borrar)) {
                        $response = "1";
                    } else {
                        $response = "No se puede borrar " . $elemento . ":hubo un fallo en el servidor. Por favor, vuelve atras y reintenta en unos segundos.";
                    }
                }
            }
        }
        break;
    case "EliminarReporteOa":
        $iduser = $_POST["iduser"];
        $query = "delete from report where iduser=$iduser AND idlo=$idlo";
        $c->realizarOperacion($query);
        break;
}



//if (isset($_POST['obtenerpermisoEditar'])) {
//
//    pg_query("insert into pending(idUserFrom,idLO,idUserTo,type)values($person,$idlo,$result[0],1)");
//} else if (isset($_POST['obtenerpermisoBorrar'])) {
//
//    pg_query("insert into pending(idUserFrom,idLO,idUserTo,type)values($person,$idlo,$result[0],2)");
//} else {
//    $rs = pg_query("select count(*) from grants where iduser=$person and idlo=$idlo and type=1");
//    $rs = pg_fetch_array($rs);
//    if ($result[0] != $_SESSION["iduser_roap"] && ($rs[0] == 0)) {
//        echo "no";
//    } else {
//        echo "si";
//    }
//}
?>