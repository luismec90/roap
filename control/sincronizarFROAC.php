<?php

echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";

session_start();
require('../modelo/conexion.php');
extract($_POST);
$c = conector_pg::getInstance();
//verificar   
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "admin";

            $n1 = $c->realizarOperacion("SELECT count(*) FROM loadlo");
            $query = "SELECT * FROM dataFROAC";
            $result = $c->realizarOperacion($query);
            $repo = pg_fetch_array($result);
            $query = "SELECT * FROM loadlo order by insertionDate";
            $result = $c->realizarOperacion($query);
            try {
                while ($data = pg_fetch_array($result)) {
                    $page = "http://$repo[2]?idlo=$data[0]&idrepository=$repo[1]&type=$data[1]";
                    $response = $c->getText($page);
                    if ($response == "OK") {
                        $c->realizarOperacion("DELETE FROM loadlo WHERE idlo=$data[0] and type=$data[1]");
                    }
                }
            } catch (Exception $e) {
                
            }
            $n2 = $c->realizarOperacion("SELECT count(*) FROM loadlo"); // volvemos a hacer el conteo

            $n1 = pg_fetch_result($n1, 0, 0);
            $n2 = pg_fetch_result($n2, 0, 0);
            $n = $n1 - $n2;

            if ($n == 0) {
                echo "<script>
                   alert('No se pudieron sincronizar los objetos, por favor revise la información de conexión con FROAC');
                     
                   location.href='../vista/admin/admin.php';
                   
                   </script>";
            } else {
                echo "<script>
                   alert('Se sincronizaron $n objetos');
                location.href='../vista/admin/admin.php';
                   </script>";
            }


            break;
    }
}
?>