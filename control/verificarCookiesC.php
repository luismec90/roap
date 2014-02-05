<?php

if ((!isset($_SESSION["iduser_roap"])) && isset($_COOKIE["usuario_roap_Cookie"]) && isset($_COOKIE["pass_roap_Cookie"])) {//Si estan definidos el usuario y el password en las cokies
    $usuario = $_COOKIE["usuario_roap_Cookie"];
    $pass = $_COOKIE["pass_roap_Cookie"];
    $query = "select name,lastName,role,idUser from users where logging='$usuario' and password='$pass'";
    $result = $c->realizarOperacion($query);
    if (pg_num_rows($result)) {

        $array = pg_fetch_array($result);

        $_SESSION["nombre_roap"] = $array["name"];
        $_SESSION["apellido_roap"] = $array["lastname"];
        $_SESSION["role"] = $array["role"];
        $_SESSION["iduser_roap"] = $array["iduser"];
        $_SESSION["usuario_roap"] = $usuario;
        if ($array["role"] == 2) {
            header("Location:vista/admin/admin.php");
        }
    }
}
?>