<?php
session_start();
require '../modelo/conexion.php';
$c = conector_pg::getInstance();
extract($_GET);

$decode=base64_decode($key);
$n=$c->realizarOperacion("SELECT COUNT(*) FROM users WHERE email='$decode' AND valided=false");
$n=  pg_fetch_result($n, 0, 0);

if($n==1){ 
    $c->realizarOperacion("UPDATE users SET valided=true WHERE email='$decode'");
    $query = "select name,lastName,role,idUser,logging from users where email='$decode'";
    $result = $c->realizarOperacion($query);
    $array = pg_fetch_array($result);
    $_SESSION["nombre_roap"] = $array["name"];
    $_SESSION["apellido_roap"] = $array["lastname"];
    $_SESSION["rol_roap"] = $array["role"];
    $_SESSION["iduser_roap"] = $array["iduser"];
    $_SESSION["usuario_roap"] = $array["logging"];
    $_SESSION["role"] = $array["role"];
    
     echo "<script>
         alert('Se ha verificado su cuenta');
         location.href='../main.php';
         </script>";
}else{
    echo "<script>
         alert('código inválido');
         location.href='../main.php';
         </script>";
}

$c = conector_pg::getInstance();
$c->close();

?>
