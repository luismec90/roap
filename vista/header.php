<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <title>ROAp</title> 
        <link rel="shortcut icon" href="vista/img/ranaTab.png">
        <link rel='stylesheet' href='vista/css/reset.css'/>
        <link rel="stylesheet" href="vista/css/global.css"/>
        <link rel="stylesheet" href="vista/css/config.css?<?php echo date('l jS \of F Y h:i:s A'); ?>"/> <!--Evitar que la pagina se almacene en cache-->
        <link type="text/css" href="lib/css/smoothness/jquery-ui-1.8.23.custom.css" rel="stylesheet" />
        <script type="text/javascript" src="lib/js/jquery-1.8.0.min.js"></script>
        <script type="text/javascript" src="lib/js/jquery-ui-1.8.23.custom.min.js"></script>
        <script type="text/javascript" src="vista/js/global.js"></script>
        <?php
        if (isset($_SESSION["iduser_roap"])) {
            echo "  <link rel='stylesheet' href='vista/css/in.css'/>
                        <script type = 'text/javascript' src = 'vista/js/in.js'></script>";
        }
        ?>
        <?php
        $ruta_archivo2 = 'vista/config.cf';
        $gestor = fopen($ruta_archivo2, 'r');
        $a = (fgets($gestor));
        $array = (explode(",", $a));
        $banner = end($array);
        fclose($gestor);
        if ($banner != "default") {
            echo " <style>
                      .cabecera {
                       background: url(vista/img/banner/$banner) repeat-x scroll 0 0 transparent !important;
                       }
                       </style>";
        }
        ?>
    </head>
    <body>
        <div id='borde'>
            <div class="cabecera2">
                <a class="logo" href="main.php">
                    <span id="letraLogo"><span class="paletaColor1">ROAp</span></span>
                    <span id="imagenLogo"></span>
                    <span id="textoLogo2"><?= $learningObjectRepository ?></span>
                </a>
<!--<img src="vista/img/logoROAp.png" width="200px" boder="0"/>-->
                <div id="nombre">
                    <!--                        <div id="nombre1">
                                            </div>-->
                </div>
                <?php
                if (isset($_SESSION["iduser_roap"])) {
                    $c = conector_pg::getInstance();
                    $result = $c->cantidadPendientes($_SESSION["iduser_roap"]);
                    $cantidadPendientes = pg_fetch_array($result);
                    if ($cantidadPendientes[0] > 0) {
                        $id = "hayPendientes";
                    } else {
                        $id = "sinPendientes";
                    }
                    echo "<div id='areaBienvenida'  class='paletaColor1'>
                              <a href='main.php?action=pendientes' id='$id' class='link'><span  >$notifications:</span> <span d='cantidadPendientes'>$cantidadPendientes[0]</span>
                              </a> $welcome " . $_SESSION['nombre_roap'] . "
                              <a href='main.php?action=editarPerfil' id='editarPerfil'></a>";
                    if ($_SESSION["role"] == 2) {
                        echo "<a href='vista/admin/admin.php' id='configurar'></a>";
                    }
                    echo " <a class='link' id='salir' href='main.php?action=Cerrar_Session'>$exit</a>
                              </div>";
                } else {
                    require 'vista/logging.html';
                }
                ?>
            </div>
            <div class="cabecera">

            </div>

            <style>
                body {   
                    font-family: "Lucida Grande", Arial, sans-serif, Helvetica;
                    font-size: 0.8em;
                    line-height: 18px;
                    color: #333333;
                    background: #FFFAF0;
                    background: #F1F1F1;
                }
                #borde{
                    min-width:1000px; 
                    min-height:720px;
                    background: #F1F1F1;

                }
                #textoLogo2 {
                    font-weight: bold;
                    font-size: 18px;
                    line-height:25px;
                    color: #555;
                    display: inline-block;
                    float: left;
                    width: 220px;
                    margin-top: 10px;
                }
                .cabecera{
                    height: 40px;
                    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
                    background: black;
                    line-height: 56px;
                    line-height: 56px;
                    margin-bottom: 5px;
                    border-top: none;
                    border-top: 1px solid #555;
                    background: url(vista/img/imgHead.jpg);
                }

                .cabecera2 {
                    max-width: 100%;
                    height: 70px;
                    margin-left: auto;
                    margin-right: auto;
                    padding: 10px;
                    background: white;
                    padding-bottom: 0;
                    background: rgb(246,248,249); /* Old browsers */
                    background: -moz-linear-gradient(top,  rgba(246,248,249,1) 0%, rgba(229,235,238,1) 100%, rgba(245,247,249,1) 100%); /* FF3.6+ */
                    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(246,248,249,1)), color-stop(100%,rgba(229,235,238,1)), color-stop(100%,rgba(245,247,249,1))); /* Chrome,Safari4+ */
                    background: -webkit-linear-gradient(top,  rgba(246,248,249,1) 0%,rgba(229,235,238,1) 100%,rgba(245,247,249,1) 100%); /* Chrome10+,Safari5.1+ */
                    background: -o-linear-gradient(top,  rgba(246,248,249,1) 0%,rgba(229,235,238,1) 100%,rgba(245,247,249,1) 100%); /* Opera 11.10+ */
                    background: -ms-linear-gradient(top,  rgba(246,248,249,1) 0%,rgba(229,235,238,1) 100%,rgba(245,247,249,1) 100%); /* IE10+ */
                    background: linear-gradient(to bottom,  rgba(246,248,249,1) 0%,rgba(229,235,238,1) 100%,rgba(245,247,249,1) 100%); /* W3C */
                    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f6f8f9', endColorstr='#f5f7f9',GradientType=0 ); /* IE6-9 */

                }

                #nombre{
                    float:left;
                }


                /*Cabecera user.php*/
                #areaBienvenida{
                    margin-top: 1em;
                    font-size:1.2em;
                    float:right;
                    color:#333;
                    font-weight: bold;
                }

                #logo{        
                    /*                   // background:url(vista/img/logo.png) no-repeat;*/
                    width: 206px;
                    height: 50px;
                    display: inline-block;
                    float:left;
                }
                #letraLogo{
                    margin-top: 0.3em;
                    width: 85px;
                    height: 50px;
                    display: inline-block;
                    font-size: 3em;
                    float:left;
                    font-weight: bold;


                }
                #imagenLogo{
                    margin-top: 0.4em;
                    background:url(vista/img/rana.png) no-repeat;
                    width: 90px;
                    height: 60px;
                    display: inline-block;
                    float:left;
                }
                #salir{
                    margin-left:1em;
                    font-weight: bold;
                    text-decoration: none;
                }
                #hayPendientes{
                    text-decoration: none;
                    margin-right: 1em;
                    font-size: 1.1em;
                }
                #sinPendientes{
                    text-decoration: none;
                    margin-right: 1em;
                }
                #cantidadPendientes{
                }
                #editarPerfil{
                    margin-left: 1em;
                    background:url(vista/img/editarPerfil.gif) no-repeat;
                    display: inline-block;
                    height: 16px;
                    width: 16px;
                }
                #configurar{
                    margin-left: 1em;
                    background:url(vista/img/configurar.png) no-repeat;
                    display: inline-block;
                    height: 16px;
                    width: 16px;
                }
                #contendorFormulario{
                    margin-top: 2em;
                    margin-left: auto;
                    margin-right: auto;
                }
                #contendorFormulario .ecol1{

                    float:left;
                    font-size: 1.2em;
                    font-weight: bold;
                    text-align: right;
                    width: 40%;
                    margin-right: 1em;
                }

                #contendorFormulario .eclear{
                    margin: 1em;
                }

            </style>