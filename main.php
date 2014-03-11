<?php

//acá XD 
ob_start();
session_start();
require('modelo/conexion.php');
require('control/multiLenguaje.php');

//include('../exportarOa/exportador.php');
$c = conector_pg::getInstance();
require('control/verificarCookiesC.php');

if (isset($_GET['action'])) {
    require('vista/header.php');
    switch ($_GET['action']) {
        case "registrarse":
            require ('vista/areaRegistro.php');
            break;
        case "viewCollection";
            require('vista/listarColecciones.php');
            require('vista/busqueda.php');
            if (isset($_SESSION["iduser_roap"]) && isset($_GET["idC"])) {
                require 'vista/subirOA.php';
            }
            echo "<div id='contenedorResultados'>";
            require ('control/mostrarOAC.php');
            require ('vista/mostrarOA.php');
            echo "</div>";
            break;
        case "surf":
            require('vista/listarColecciones.php');
            require('vista/busqueda.php');
            if (isset($_SESSION["iduser_roap"]) && isset($_GET["idC"])) {
                require 'vista/subirOA.php';
            }
            echo "<div id='contenedorResultados'>";
            require ('control/mostrarOAC.php');
            require ('vista/mostrarOA.php');
            echo "</div>";
            break;
        case "search":
            require('vista/listarColecciones.php');
            require('vista/busqueda.php');

            require ('control/mostrarOAC.php');
            require ('vista/mostrarOA.php');
            break;
        case "Formulario_Ver":
            echo "<script type='text/javascript'>var ver='si';
                 var idlo='" . $_GET['idlo'] . "'
                 </script>";
            $extencion = "";
            $size = "";
            $ruta = "";
            require('vista/formulario.php');
            break;
        case "Formulario_Editar":
            if (!isset($_SESSION["iduser_roap"])) { //Si no esta logueado redirecionar al main.php sin action
                header("location:main.php");
            }
            $idlo = $_GET['idlo'];
            $propietario = $c->realizarOperacion("select users.iduser from users natural join lo where lo.idlo=$idlo");
            $propietario = pg_fetch_array($propietario);
            $person = $_SESSION['iduser_roap'];

            $rs = $c->realizarOperacion("select count(*) from grants where iduserto=$person and idlo=$idlo and type=3");
            $rs = pg_fetch_array($rs);
            $permisoSolicitado = $c->realizarOperacion("select count(*) from pending where iduserfrom=$person and idlo=$idlo and type=1");
            $permisoSolicitado = pg_fetch_array($permisoSolicitado);
            if ($propietario[0] == $_SESSION["iduser_roap"] || ($rs[0] > 0) || $_SESSION["role"] == 2 || $_SESSION["role"] == 3) { //Si el propietario es el que solicita la edicion o el que solicita el permiso ya lo tiene o el admin/revisor es el que solicita, entonces:
                $_SESSION["ubicacion"] = "editar";
                $extencion = "";
                $size = "";
                $ruta = "";
                echo "<script type='text/javascript'>var ver='no'; var idlo='" . $_GET['idlo'] . "' </script>";
                if (isset($_GET["idReport"])) { //Si existe el idReport es porque el admin va a atendr un reporte.
                    echo "<script type='text/javascript'>var idReport='" . $_GET['idReport'] . "' </script>";
                } else {
                    echo "<script type='text/javascript'>var idReport='-1' </script>";
                }
                require('vista/formulario.php');
            } else {
                header("location:main.php");
            }

            break;
        case "Formulario_Catalogar":



            if (!isset($_SESSION["iduser_roap"])) { //Si no esta logueado redirecionar al main.php sin action
                header("location:main.php");
            } require('control/subirarchivo.php');
            echo "<script type='text/javascript'>var ver='no';var idlo=-1</script>";
            if ($question == "Ingresar") {
                require('vista/formulario.php');
            } else if ($question == "Importar") {
                echo "<script>alert('OA importado correctamente');
                location.href='main.php';</script>";
            }
            break;
        case "pendientes":
            if (!isset($_SESSION["iduser_roap"])) { //Si no esta logueado redirecionar al main.php sin action
                header("location:main.php");
            }
            $notificaciones = $c->obtenerNotificaciones($_SESSION["iduser_roap"]);
            $r = $c->obtenerPendientes($_SESSION["iduser_roap"]);
            $historial = $c->obtenerHistorial($_SESSION["iduser_roap"]);
            require ('vista/zonaPermisos.php');
            break;
        case "recomendarOAs":
            if (!isset($_SESSION["iduser_roap"])) { //Si no esta logueado redirecionar al main.php sin action
                header("location:main.php");
            }
            require('vista/listarColecciones.php');
            echo "<div id='contenedorResultados'>";
            require ('control/busquedaC.php');
            echo "</div>";
            break;
        case "dRecomendarOAs":
            if (!$_GET["idlo"]) {
                header("location:main.php");
            }
            require('vista/listarColecciones.php');
            echo "<div id='contenedorResultados'>";
            require ('control/busquedaC.php');
            echo "</div>";
            break;
        case "rateComments":
            require ('vista/rateComments.php');
            break;
        case "downloadHistory":
            require ('vista/downloadHistory.php');
            break;
        case "editarPerfil":
            if (!isset($_SESSION["iduser_roap"])) { //Si no esta logueado redirecionar al main.php sin action
                header("location:main.php");
            }
            $res = $c->realizarOperacion("SELECT name,lastName,password,email FROM users WHERE iduser=" . $_SESSION['iduser_roap']);
            $row = pg_fetch_array($res);
            require ('vista/areaEditarPerfil.php');
            break;
        case "terminos":
            require('vista/terminosCondiciones.html');
            break;
        case "licencia":
            require('vista/licencia.html');
            break;
        case "reestablecerPass":
            require('vista/reestablecerPassword.php');
            break;
        case "cambiarPass":
            if (isset($_GET['key'])) {
                $email = $_GET['key'];
                require('vista/cambiarPass.php');
            }
            break;
        case "Cerrar_Session":
            session_unset();
            session_destroy();
            setcookie("usuario_roap_Cookie", "", time() - 3600, "/");
            setcookie("pass_roap_Cookie", "", time() - 3600, "/");
            header("location:main.php");
            break;
        default:
            header("location:main.php");
            break;
    }
} else {
    require('vista/header.php');
    require('vista/listarColecciones.php');
    require('vista/busqueda.php');
    echo "<div id='contenedorResultados'>";
    require ('control/mostrarOAC.php');
    require ('vista/mostrarOA.php');
    echo "</div>";
}

require('vista/footer.html');
$c->close();
ob_end_flush();
?>
