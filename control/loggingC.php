<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <title>ROAp</title> 
    </head>
    <?php
    session_start();
    
    require('../modelo/conexion.php');
    require('multiLenguaje.php');
    $c = conector_pg::getInstance();
    $user = $_POST['user'];
    $contrasena = sha1(addslashes($_POST['psw']));
    $query = "select name,lastName,role,idUser,lastloging from users where logging='$user' AND password='$contrasena' AND valided=true";
    $result = $c->realizarOperacion($query);
    $usuario = $user;
    $pass = $contrasena;
    if (pg_num_rows($result)) {

        if (isset($_POST["chk_rec"])) {

            setcookie('usuario_roap_Cookie', $usuario, time() + 31536000, "/");
            setcookie('pass_roap_Cookie', $pass, time() + 31536000, "/");
        }
        $array = pg_fetch_array($result);


        $_SESSION["nombre_roap"] = $array["name"];
        $_SESSION["apellido_roap"] = $array["lastname"];
        $_SESSION["rol_roap"] = $array["role"];
        $_SESSION["iduser_roap"] = $array["iduser"];
        $_SESSION["usuario_roap"] = $usuario;
        $_SESSION["role"] = $array["role"];
        $_SESSION["lastloging"] = $array["lastloging"];
        $query = "UPDATE users SET lastloging=now() where idUser='{$_SESSION["iduser_roap"]}'";
        $c->realizarOperacion($query);
        // echo $query;
        //   header("Location:../main.php");
        if ($array["role"] == 1 || $array["role"] == 3) {
            header("Location:../main.php");
        } else if ($array["role"] == 2) {
            header("Location:../vista/admin/admin.php");
        }
    } else {
        echo "<script type='text/javascript'>	
			alert('$userOrPasswordWrong');
                        location.href='../main.php';
			</script>";
 
    }
    ?>
</html>