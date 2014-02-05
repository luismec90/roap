<?php

if (isset($_POST['radioBanner'])) {

    $ruta_archivo2 = '../../vista/config.cf';
    $gestor2 = fopen($ruta_archivo2, 'r');
    $a = (fgets($gestor2));
    $array = (explode(",", $a));
    $paleta = $array[0];
    fclose($gestor2);


    switch ($_POST['radioBanner']) {
        case "bDefault":
            $banner = "default";
            break;
        case "bAdmin":
            $archivo1 = $_FILES['archivos2']['name'][0];
            $extencion = explode(".", $archivo1);
            $extencion = end($extencion);
            $file = "../../vista/img/banner/banner.$extencion";
            copy($_FILES["archivos2"]['tmp_name'][0], $file);
            $banner = "banner.$extencion";
            break;
    }

    $gestor2 = fopen($ruta_archivo2, 'w');
    $contenido = $paleta . "," . $banner;
    fwrite($gestor2, $contenido);
    fclose($gestor2);
    header("location:../../vista/admin/admin.php");
}
?>