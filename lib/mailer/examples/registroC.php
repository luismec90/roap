<?php

session_start();
require '../../../modelo/conexion.php';
$c = conector_pg::getInstance();
if (isset($_GET['verificarUsuario'])) {

    $logging = $_GET['verificarUsuario'];
    $r = $c->realizarOperacion("SELECT count(*) as  logging FROM users WHERE logging = '$logging'");
    $r2 = pg_fetch_array($r);
    if ($r2[0] != 0) {
        echo"invalido";
    }
} else if (isset($_GET['verificarEmail'])) {
    $email = $_GET['verificarEmail'];
    $r = $c->realizarOperacion("SELECT count(*) as email FROM users WHERE email = '$email'");
    $r2 = pg_fetch_array($r);
    if ($r2[0] != 0) {
        echo "invalido";
    }
} else if (isset($_GET['registrarse'])) {
    extract($_POST);
    $to = $email;
    $asunto = "Registro ROAp";
    $mensaje = "Para confirmar su cuenta por favor haga click en el siguiente enlace... <br/>";
    $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    $ruta = dirname($url);
    $ruta = str_replace("/lib/mailer/examples", "", $ruta);
    $mensaje.= $ruta . "/control/validarCuenta.php?key=" . base64_encode($email);

//    if (is_dir("../../../../roap")) {
//        $mensaje.="http://" . $_SERVER['HTTP_HOST'] . "/roap/control/validarCuenta.php?key=" . base64_encode($email);
//    } else {
//        $mensaje.="http://" . $_SERVER['HTTP_HOST'] . "/control/validarCuenta.php?key=" . base64_encode($email);
//    }
    //texto a enviar;
    $texto = '<body style="margin: 10px;">
    <div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;">
        <div align="center"><img src="images/logo.png" style="height: 90px; width: 340px"></div><br>
        <br/>
        <h1>Bienvenido a ROAP.</h1><br/>
        USUARIO: ' . $logging . ' <br/>      
        PASSWORD: ' . $password . '<br/>
       ' . $mensaje . '
    </div>
</body>';
    $data['mode']='registro';
    require('test_smtp_advanced.php');
} else if (isset($_GET['reestablecer'])) {
     extract($_POST);
    //verificamos que exista el e-mail 
    $r = $c->realizarOperacion("SELECT count(*) email FROM users WHERE email = '$email'");
    $r2 = pg_fetch_array($r);
    if ($r2[0] == 0) {
        echo "false";
    } else {       
        $to = $email;
        $asunto = utf8_decode("Cambio de contraseña ROAp");
        $mensaje = "Para cambiar su contrase&ntilde;a por favor haga click en el siguiente enlace... <br/>";
        $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
        $ruta = dirname($url);
        $ruta = str_replace("/lib/mailer/examples", "", $ruta);
        $mensaje.= $ruta . "/main.php?action=cambiarPass&key=" . base64_encode(base64_encode(base64_encode($email)));     
        

//    if (is_dir("../../../../roap")) {
//        $mensaje.="http://" . $_SERVER['HTTP_HOST'] . "/roap/control/validarCuenta.php?key=" . base64_encode($email);
//    } else {
//        $mensaje.="http://" . $_SERVER['HTTP_HOST'] . "/control/validarCuenta.php?key=" . base64_encode($email);
//    }
        //texto a enviar;
        $texto = '<body style="margin: 10px;">
    <div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;">
        <div align="center"><img src="images/logo.png" style="height: 50px; width: 250px"></div><br>
        <br/>
       ' . $mensaje . '
    </div>
</body>';
        $data['mode']='reestablecimiento';
        require('test_smtp_advanced.php');
    }
}
$c->close();
?>


