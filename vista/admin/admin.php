<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION["role"]) || $_SESSION["role"] != 2) {
    header("Location:../../main.php");
}
require '../../modelo/conexion.php';
require('../../control/multiLenguaje.php');
$c = conector_pg::getInstance();
?>


<?php
if (isset($_GET['option'])) {
    $option = $_GET['option'];
    if ($option == "true") {
        $c->realizarOperacion("UPDATE datafroac SET valided=1");
        $c->realizarOperacion("insert into loadlo (select idlo,1,now() from lo where idlo not in (select idlo from loadlo))");
        header("location:admin.php");
    } else {
        $c->realizarOperacion("DELETE FROM datafroac");
        header("location:admin.php");
    }
}
?>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>ROAp</title> 
        <link rel="shortcut icon" href="../img/ranaTab.png">
        <link rel="stylesheet" href="../css/global.css"/>
        <link rel="stylesheet" href="../css/admin.css"/>
        <link rel="stylesheet" href="../css/config.css?<?php echo date('l jS \of F Y h:i:s A'); ?>"/> <!--Evitar que la pagina se almacene en cache-->
        <link type="text/css" href="../../lib/css/smoothness/jquery-ui-1.8.23.custom.css" rel="stylesheet" />
        <script type="text/javascript" src="../../lib/js/jquery-1.8.0.min.js"></script>
        <script type="text/javascript" src="../../lib/js/jquery-ui-1.8.23.custom.min.js"></script>

        <?php
        $ruta_archivo2 = '../config.cf';
        $gestor = fopen($ruta_archivo2, 'r');
        $a = (fgets($gestor));
        $array = (explode(",", $a));
        $banner = end($array);
        fclose($gestor);
        if ($banner != "default") {
            echo "<style>
                .cabecera {
       background: url(../img/banner/$banner) repeat-x scroll 0 0 transparent;
        }
        </style>";
        }
        ?>
        <script>
            $(document).ready(function() {
                $("#dialogConfirmCambiarColeccion").hide();
            });
        </script>
    </head>
    <body>  
        <div class="cabecera2" id="inicio">
            <a class="logo" href="../../main.php">
                <span id="letraLogo"><span class="paletaColor1">ROAp</span></span>
                <span id="imagenLogo"></span>
                <span id="textoLogo2"><?= $learningObjectRepository ?></span>
            </a>
            <div id="nombre">
            </div>
            <div class="arealoggin" >
                <span> <?= $welcome ?> <?php echo $_SESSION["nombre_roap"] ?> </span>
                <a id="salir" class="link" href="../../main.php?action=Cerrar_Session"><?= $exit ?></a>
            </div> 
        </div>
        <div class="cabecera">

        </div>
        <div id="menuAdmin">
            <a class="item paletaColor5" href="admin.php" id="tab1" ><?= $general ?></a>
            <a class="item paletaColor5" href="admin.php?action=area2" id="tab2" > <?= $metaMetadata ?></a>
            <a class="item paletaColor5" href="admin.php?action=area3" id="tab3"> <?= $colections ?></a>
            <a class="item paletaColor5" href="admin.php?action=area4" id="tab4"><?= $users ?></a>
            <a class="item paletaColor5" href="admin.php?action=area5" id="tab5"> <?= $objectsReported ?></a>
            <a class="item paletaColor5" href="admin.php?action=area6" id="tab6"><?= $objectsDeleted ?></a>
            <a class="item paletaColor5" href="admin.php?action=area7" id="tab7"><?= $languageSettings ?></a>
        </div>
        <?php
        if (!isset($_GET["action"])) {
            echo "<script>$(document).ready(function() {	
                $('#tab1').addClass('activo'); 
                });
                </script>";

            $res = $c->realizarOperacion("SELECT name,lastName,password,email FROM users WHERE iduser=" . $_SESSION["iduser_roap"]);
            $row = pg_fetch_array($res);
            $ruta_archivo = '../config.cf';
            if (is_writable($ruta_archivo)) {
                if (!$gestor = fopen($ruta_archivo, 'r')) {
                    echo "No se puede abrir el archivo ($ruta_archivo)";
                } else {
                    $a = (fgets($gestor));
                    $array = (explode(",", $a));
                    fclose($gestor);
                    $radioPaleta = $array[0];
                    $radioBanner = $array[1];
                }
            }

            if (is_writable("../../vista/css/config.css")) {
                if (!$gestor = fopen("../../vista/css/config.css", 'r')) {
                    echo "No se puede abrir el archivo ($ruta_archivo)";
                } else {
                    $a = (fgets($gestor));

                    $arrayColores = (explode(",", $a));
                    //  echo var_dump($arrayColores);
                    fclose($gestor);
//                    $radioPaleta = $array[0];
//                    $radioBanner = $array[1];
                }
            }


            $conteo = $c->realizarOperacion("SELECT count(*) FROM datafroac");
            $conteo = pg_fetch_result($conteo, 0, 0);
            $errores = "";
            $estado = 0;
            if ($conteo > 0) {
                $estado = pg_fetch_result($c->realizarOperacion('SELECT min(valided) FROM datafroac'), 0, 0);
                $errores = $c->realizarOperacion("SELECT count(*) FROM loadlo");
                $errores = pg_fetch_result($errores, 0, 0);
            }
            require ('area1.php');
        } else {
            switch ($_GET["action"]) {

                case "area2";
                    echo "<script>$(document).ready(function() {	
                $('#tab2').addClass('activo'); 
                });
                </script>";

                    require ('area2.php');

                    break;
                case "area3";
                    echo "<script>$(document).ready(function() {	
                $('#tab3').addClass('activo'); 
                });
                </script>";
                    require ('area3.php');
                    break;
                case "area4";
                    echo "<script>$(document).ready(function() {	
                $('#tab4').addClass('activo');  
                });
                </script>";
                    require ('area4.php');
                    break;
                case "area5";
                    echo "<script>$(document).ready(function() {	
                $('#tab5').addClass('activo'); 
                });
                </script>";
                    require('area5.php');
                    break;
                case "area6";
                    echo "<script>$(document).ready(function() {	
                $('#tab6').addClass('activo'); 
                });
                </script>";
                    require('area6.php');
                    break;
                default:
                case "area7";
                    echo "<script>$(document).ready(function() {	
                $('#tab7').addClass('activo'); 
                });
                </script>";
                    require('area7.php');
                    break;
                default:
                    header("location:admin.php");
                    break;
            }
        }
        ?>
        <div id="dialogConfirmCambiarColeccion" title="<?= $changeCollection ?>">
            <b class="ancho"><?= $selectCollection ?>:</b><select id="selectDialogColeccion"><option>Seleccionar</option></select><br/><br/>
            <b class="ancho"><?= $selectSubcollection ?>:</b><select id="selectDialogSubcoleccion"></select><br/>
        </div>
    </body>
</html>
<?php
$c->close();
$tabAdmin=true;
require("../footer.html")
?>