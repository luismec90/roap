<?php

$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$file = dirname($url);
$r = str_replace("/control", "", $file);
echo "<br>$r";
?>