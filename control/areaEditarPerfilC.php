<?php

session_start();
require('../modelo/conexion.php');
extract($_POST);
$c = conector_pg::getInstance();
//verificar   
if (isset($eCambiarPassword))
    $eCambiarPassword = sha1($eCambiarPassword);

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "user";
            $c->realizarOperacion("UPDATE users SET name='$eCambiarNombre' , lastName='$eCambiarApellido' , password='$eCambiarPassword' , email='$eCambiarEmail' WHERE iduser=" . $_SESSION['iduser_roap']);
//datos actualizados
            $_SESSION['nombre_roap'] = $eCambiarNombre;
            header("Location:../main.php");
            break;
        case "admin";


          //  var_dump($_POST);
            // exit;

            $c->realizarOperacion("UPDATE envio_email SET smtp='$smtp' , puerto='$puerto' , remitente='$remitente' , email='$email' , password = '$password'");
//datos actualizados
            //   $_SESSION['nombre_roap'] = $eCambiarNombre;
            header("Location:../vista/admin/admin.php");
            break;
    }
}
?>
