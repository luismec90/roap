<?php

require '../../modelo/conexion.php';
$c = new conector_pg();
if (isset($_GET["idcolecion"])){
    $idCollection=$_GET['idcolecion'];
    $c->realizarOperacion("insert into subcollection(idcollection,name) values(" . $_GET['idcolecion'] . ",'" . $_GET['nombre'] . "')");
    $r3=$c->lastvalue("subcollection","idsubcollection");
    
//    $r = "select name from collection where idcollection=" . $_GET['idcolecion'];
//    $res =  $c->realizarOperacion($r);
//    $name = "";
//    while ($row = pg_fetch_array($res)) {
//        $name = $row[0];
//    }
    $path = "../../uploads/$idCollection/$r3";
    if (!is_dir($path)) {
        mkdir($path,0777);
    } else {
        echo "ya existe";
    }
} else {
     $c->realizarOperacion("insert into collection(name) values('" . $_GET['nombre'] . "')");
     $r2=$c->lastvalue("collection","idcollection");
    $path = "../../uploads/$r2";
    if (!is_dir($path)) {
          mkdir($path,0777);
    } else {
        echo "ya existe";
    }
      $c->realizarOperacion("insert into subcollection(idcollection,name) values(" . $c->lastValue("collection", "idcollection"). ",'" . $_GET['nombre'] . "')");
    $r3=$c->lastvalue("subcollection","idsubcollection");
//     $r = "select name from collection where idcollection=" .  $c->lastValue("collection", "idcollection");
//    $res =  $c->realizarOperacion($r);
//    $name = "";
//    while ($row = pg_fetch_array($res)) {
//        $name = $row[0];
//    }
    $path = "../../uploads/$r2/$r3";
    if (!is_dir($path)) {
          mkdir($path,0777);
    } else {
        echo "ya existe";
    }
}
$c->close();
?>