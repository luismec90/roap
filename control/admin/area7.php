<?php

require '../../modelo/conexion.php';
$c = conector_pg::getInstance();
switch ($_GET['action']) {
    case "save":
        $result2 = $c->realizarOperacion("SELECT * FROM idioma where activo=true");
        $result2 = pg_fetch_array($result2);
        
        if ($result2[1] == "Español") {
            $file = "spanish.txt";
        } else if ($result2[1] == "Português") {
            $file = "portuguese.txt";
        }
        $ruta = "../../lib/multiLenguaje/$file";
        $diccionario = fopen($ruta, "w") or exit("Unable to open file!");
        fwrite($diccionario, $_POST["texto"]);
        header("location:../../vista/admin/admin.php?action=area7");
        break;
    case "changeidiom":
        $result = $c->realizarOperacion("update idioma set activo=false");
        $result = $c->realizarOperacion("update idioma set activo=true where ididioma='{$_POST["idioma"]}'");
        header("location:../../vista/admin/admin.php?action=area7");
        break;
}