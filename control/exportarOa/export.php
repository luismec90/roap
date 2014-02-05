<?php
require '../../modelo/conexion.php';
$c = conector_pg::getInstance();
extract($_GET);
$buffer = $c->getXMLo($idlo);
//$buffer = $c->getXML($idlo);
$title=$c->getTitleLo($idlo);
$filePath="../../files/".$title . ".xml";
$dir = fopen($filePath,"w+");
echo $buffer;
fwrite($dir, $buffer);
fclose($dir);
$file=file($filePath);
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xml");
unlink($filePath);
?>
