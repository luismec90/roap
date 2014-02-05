<?php

session_start();
require ('../modelo/conexion.php');
if (isset($_SESSION["iduser_roap"])) {
$c = conector_pg::getInstance();
    if (isset($_GET["action"])) {
        $from = $_GET["from"];
        $to = $_GET["to"];
        $idlo = $_GET["idlo"];
        $type = $_GET["type"];

        switch ($_GET["action"]) {
            case "concederEdicion";
              
                $c->realizarOperacion("insert into grants values($from, $to,$idlo,3)");
                $c->realizarOperacion("delete from pending where iduserfrom=$to and iduserto=$from and idlo=$idlo and type=$type");
                $c->realizarOperacion("insert into pending values($from,$to,$idlo,3)");
                break;
            case "concederEliminacion";
                $c->realizarOperacion("insert into grants values($from, $to,$idlo,4)");
                $c->realizarOperacion("delete from pending where iduserfrom=$to and iduserto=$from and idlo=$idlo and type=$type");
                $c->realizarOperacion("insert into pending values($from,$to,$idlo,4)");
                break;
             case "concederCambiarColeccion";
                $c->realizarOperacion("insert into grants values($from, $to,$idlo,9)");
                $c->realizarOperacion("delete from pending where iduserfrom=$to and iduserto=$from and idlo=$idlo and type=$type");
                $c->realizarOperacion("insert into pending values($from,$to,$idlo,9)");
                break;
            case "denegarEdicion";
                $c->realizarOperacion("delete from pending where iduserfrom=$to and iduserto=$from and idlo=$idlo and type=$type");
                $c->realizarOperacion("insert into pending values($from,$to,$idlo,5)");
                break;
            case "denegarEliminacion";
                $c->realizarOperacion("delete from pending where iduserfrom=$to and iduserto=$from and idlo=$idlo and type=$type");
                $c->realizarOperacion("insert into pending values($from,$to,$idlo,6)");
                break;
             case "denegarCambiarColeccion";
                $c->realizarOperacion("delete from pending where iduserfrom=$to and iduserto=$from and idlo=$idlo and type=$type");
                $c->realizarOperacion("insert into pending values($from,$to,$idlo,10)");
                break;
            case "ok";
                $c->realizarOperacion("delete from pending where iduserfrom=$to and iduserto=$from and idlo=$idlo and type=$type");
                break;
        }
    }
    header("location:../main.php?action=pendientes");
}
?>
