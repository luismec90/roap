<?php

session_start();
require '../modelo/conexion.php';
$c = conector_pg::getInstance();
$id = $_GET['id'];
$dir = "../uploads/" . $c->getLocation($id);
if (isset($_SESSION["iduser_roap"])) {
    $user = $_SESSION["iduser_roap"];
} else {
    $user = "null";
}
$ip = getIp();
$c->guardarDownload($id, $user, $ip, getCountry($ip));
if (file_exists($dir)) {
    $directorio = opendir($dir);
    while ($archivo = readdir($directorio)) {

        $miarray = explode(".", $archivo);
        $extension = end($miarray);
        if ($miarray[0] == $id) {
            $f = $id . "." . $extension;
            $enlace = "../uploads/" . $c->getLocation($id) . $id . "." . $extension;
            $enlace2 = $enlace;
            $extension = strtolower($extension);
            $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
            $ruta = dirname($url);
            $ruta = str_replace("/control", "", $ruta);
            $ruta2 = $ruta;
            $enlace = str_replace("..", "", $enlace);
            $ruta = $ruta . $enlace;

            if (isset($_GET["forcedownload"])) {
                header("Content-Disposition: attachment; filename=" . $f);
                header("Content-Type: application/octet-stream");
                header("Content-Length: " . filesize($enlace2));
                readfile($enlace2);
            } else if ($extension == "pdf" || $extension == "jpg" || $extension == "png" || $extension == "txt" || $extension == "xml") {
                header("location:$enlace2");
            } else if ($extension == "doc" || $extension == "docx" || $extension == "ppt" || $extension == "pptx" || $extension == "xls" || $extension == "xlsx" || $extension == "zip") {

                header("Location:https://docs.google.com/viewer?url=$ruta");
                exit();
            } else if ($extension == "mp4") {
                echo "<html><body style='background:#222;'><br><br><br><center><video controls><source src='$ruta' type='video/mp4'>Your browser does not support the video tag.</video> <center></body></html>";
            } else if ($extension == "webm") {
                  echo "<html><body style='background:#222;'><br><br><br><center><video controls><source src='$ruta' type='video/webm'>Your browser does not support the video tag.</video> <center></body></html>";
            } else if ($extension == "rar") {
                vaciarFiles();
                $carpeta = date('Y-m-s H:i:s');
                $rar_file = rar_open("../" . $enlace);
                $entries = rar_list($rar_file);
                $nombreCarpeta = $entries[0]->getName();
                $nombreCarpeta = split("/", $nombreCarpeta);
                $nombreCarpeta = $nombreCarpeta[0];
                mkdir('../files/' . $carpeta, 0777, true);
                foreach ($entries as $entry) {
                    $entry->extract("../files/$carpeta");
                }
                rar_close($rar_file);
                echo "<br>" . $nombreCarpeta . "<br>";
                if (is_dir("../files/".$carpeta)) {
                    $ruta2 = $ruta2 . "/files/$carpeta/$nombreCarpeta";
                } else {
                    $ruta2 = $ruta2 . "/files/$carpeta";
                }
                header("Location:$ruta2");
            } else {
                header("Content-Disposition: attachment; filename=" . $f);
                header("Content-Type: application/octet-stream");
                header("Content-Length: " . filesize($enlace2));
                readfile($enlace2);
            }
            //   header("Location:uploads/" . getLocation($id) . $id . "." . end($miarray));
        }
    }
    exit();
    closedir($directorio);
    if (isset($_SESSION["iduser_roap"])) {
        $user = $_SESSION["iduser_roap"];
    } else {
        $user = "null";
    }

    /* $c->realizarOperacion("Select idlo,(uno.descargas + ln(dos.cantidadValoraciones)+ dos.promedio) as calificacion from (select idlo as OA,count(idlo) as descargas from download where idlo<>1 AND iduser in (select iduser from download where idlo=1) group by idlo) as uno,
      (select idlo, count(idlo) as cantidadValoraciones,avg(valoration) as promedio from rating where idlo<>1 and iduser in (select iduser from download where idlo=1)  group by idlo) as dos
      Order by calificacion desc"); */
} else {
    echo "Archivo no disponible";
}

function getIp() {
    $client = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote = $_SERVER['REMOTE_ADDR'];
    $result = "Unknown";
    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } else if (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }
    return $ip;
}

function getCountry($ip) {
    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
    if ($ip_data && $ip_data->geoplugin_countryName != null) {
        $result = $ip_data->geoplugin_countryName;
        return $result;
    } else {
        return "Desconocido";
    }
}

function vaciarFiles() {
 //   $dir = "../files/";
 //   exec("find $dir . -mmin +30 -delete");
}

?>