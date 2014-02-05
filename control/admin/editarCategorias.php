<?php

require '../../modelo/conexion.php';
$c = conector_pg::getInstance();
switch ($_GET['action']) {
    case "C":
        $idC = $_GET['idC'];
        $nombreC = $_GET['nombreC'];
        $nameV = $c->realizarOperacion("select name from collection where idcollection=$idC");
        $nameV = pg_fetch_array($nameV);
        $c->realizarOperacion("UPDATE collection set name='$nombreC' where idcollection=$idC");
        $c->realizarOperacion("UPDATE subcollection set name='$nombreC' WHERE idcollection=$idC AND name='$nameV[0]'");
       header("location:../../vista/admin/admin.php?action=area3");
        break;

    case "SC":
        $idSC = $_GET['idSC'];
        $nombreSC = $_GET['nombreSC'];
        $c->realizarOperacion("UPDATE subcollection set name='$nombreSC' where idsubcollection=$idSC");
         header("location:../../vista/admin/admin.php?action=area3");
        break;

    case "cantidadOACollection":
        $idC = $_GET['idC'];
        $r = $c->realizarOperacion("select count(*) from (select * from collection c, subcollection s , lo l where c.idcollection=s.idcollection and s.idsubcollection=l.idsubcollection and c.idCollection=" . $idC . " and idlo not in(select idlo from pending where type=7))t");
        $r2 = pg_fetch_array($r);
        echo $r2[0];
        break;

    case "cantidadOASubCollection":
        $idSC = $_GET['idSC'];
        $r = $c->realizarOperacion("select idcollection from subcollection where idsubcollection=$idSC");
        $idC = pg_fetch_array($r);
        $idC = $idC[0];
        $r = $c->realizarOperacion("select count(*) from (select * from subcollection s , lo l where s.idsubcollection=l.idsubcollection and s.idCollection=" . $idC . " and l.idsubcollection=$idSC and idlo not in(select idlo from pending where type=7))t");
        $r2 = pg_fetch_array($r);
        echo $r2[0];
        break;

    case "eliminarOACollection":

        $idC = $_GET['idC'];
        $ruta = "../../uploads/$idC";
        $c->realizarOperacion("delete from collection where idcollection=$idC");

        function borrar_directorio($dir, $borrarme) {
            if (!$dh = @opendir($dir))
                return;
            while (false !== ($obj = readdir($dh))) {
                if ($obj == '.' || $obj == '..')
                    continue;
                if (!@unlink($dir . '/' . $obj))
                    borrar_directorio($dir . '/' . $obj, true);
            }
            closedir($dh);
            if ($borrarme) {
                @rmdir($dir);
            }
        }

        echo borrar_directorio($ruta, true);

        break;

    case "eliminarOASubCollection":
        $idSC = $_GET['idSC'];
        $r = $c->realizarOperacion("select idcollection from subcollection where idsubcollection=$idSC");
         $c->realizarOperacion("delete from subcollection where idsubcollection=$idSC");
        $r2 = pg_fetch_array($r);
        $idC = $r2[0];
        $ruta = "../../uploads/$idC/$idSC";
        echo $ruta;

        function borrar_directorio2($dir, $borrarme) {
            if (!$dh = @opendir($dir))
                return;
            while (false !== ($obj = readdir($dh))) {
                if ($obj == '.' || $obj == '..')
                    continue;
                if (!@unlink($dir . '/' . $obj))
                    borrar_directorio($dir . '/' . $obj, true);
            }
            closedir($dh);
            if ($borrarme) {
                @rmdir($dir);
            }
        }

       echo  borrar_directorio2($ruta, true);

        break;

    default:
        break;
}

$c->close();



//
//header("location:../../vista/admin/admin.php?action=area3")
?>