<?php

$c = conector_pg::getInstance();
$result2 = $c->realizarOperacion("SELECT * FROM idioma where activo=true");
$result2 = pg_fetch_array($result2);
if ($result2[1] == "Español") {
    $file = "spanish.txt";
} else if ($result2[1] == "Português") {
    $file = "portuguese.txt";
}
if (file_exists("lib/multiLenguaje/$file")) {
    $ruta = "lib/multiLenguaje/$file";
} else if (file_exists("../lib/multiLenguaje/$file")) {
    $ruta = "../lib/multiLenguaje/$file";
} else if (file_exists("../../lib/multiLenguaje/$file")) {
    $ruta = "../../lib/multiLenguaje/$file";
}
$diccionario = fopen($ruta, "r") or exit("Unable to open file!");
while (!feof($diccionario)) {
    $line = explode("=", fgets($diccionario));
    ${$line[0]} = trim($line[1], " \t\n\r");
}
fclose($diccionario);
