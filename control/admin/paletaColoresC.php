<?php

$ruta_archivo = '../../vista/css/config.css';
echo $_POST['paleta'];
// Primero vamos a asegurarnos de que el archivo existe y es escribible.
if (is_writable($ruta_archivo)) {
    if (!$gestor = fopen($ruta_archivo, 'w')) {
        echo "No se puede abrir el archivo ($ruta_archivo)";
        exit;
    }


    $ruta_archivo2 = '../../vista/config.cf';
    $gestor2 = fopen($ruta_archivo2, 'r');
    $a = (fgets($gestor2));
    $array = (explode(",", $a));
    $banner = end($array);
    fclose($gestor2);

    $gestor2 = fopen($ruta_archivo2, 'w');
    $contenido = $_POST['paleta'] . "," . $banner;
    fwrite($gestor2, $contenido);
    fclose($gestor2);



    switch ($_POST['paleta']) {
        case "paleta2":
            $contenido = "
                         .paletaColor1{
                         color: black;;
                        }
                        .cabecera{
                            border-bottom: 2px solid black;;
                        }
                        .paletaColor1Fondo{
                        background:black;
                        }
                        
                        .link{
                            color: #006B00;
                        }
                        .link:hover{
                            color: #333;
                        }
                        
                        .defaultButton{
                        background:#E6E6B8;
                        }
                        .paletaColor4{
                            background: #1975FF;
                        }
                        .activo {
                      background: #1975FF !important;
                         }
                        .paletaColor5{
                            background: #F60;
                        }
                        html ul.tabs li.visitado a{
                        background: #F60;

                        }
                        
                        .cabecera{
                        background: url(../img/imgHead2.jpg) !important;
                        }

                        ";
            break;
        case "paleta3":
            $contenido = "
            .paletaColor1{
            color: #90C140;;
        }
        .cabecera{
            border-bottom: 2px solid #90C140;;
        }
        .paletaColor1Fondo{
        background:#90C140;
        }
        .link{
            color: #545453;
        }
        .defaultButton{
        background:grey;
        }

        .link:hover{
            color: #333;
        }
        .paletaColor4{
            background: #009900;
        }
        .activo {
        background: #009900 !important;
            }
            
        .paletaColor5{
            background: #996633;
        }
        html ul.tabs li.visitado a{
        background: #996633;

        }
        
        .cabecera{
        background: url(../img/imgHead3.jpg) !important;
        }
        ";
            break;
        case "coloresPersonalizados":
            $contenido = "/*,".$_POST["colorPicker1"].",".$_POST["colorPicker2"].",".$_POST["colorPicker3"].",".$_POST["colorPicker4"].",".$_POST["colorPicker5"].",*/
            .paletaColor1{
                color: #" . $_POST["colorPicker1"] . ";
            }
            .cabecera{
                border-bottom:2px solid #" . $_POST["colorPicker1"] . ";
            }
            .paletaColor1Fondo{
            background: #" . $_POST["colorPicker1"] . ";
            }
             .link{
                color: #" . $_POST["colorPicker2"] . ";
            }
            
            .defaultButton{
            background: #" . $_POST["colorPicker3"] . ";
            }

            .link:hover{
                color: #333;
            }
            .paletaColor4{
                background: #" . $_POST["colorPicker4"] . ";
            }
            .activo {
               background:  #" . $_POST["colorPicker4"] . " !important;
             }
            .paletaColor5{
                background: #" . $_POST["colorPicker5"] . ";
            }
            html ul.tabs li.visitado a{
            background: #" . $_POST["colorPicker5"] . ";

            }
            
                        ";
            echo $contenido;
            break;
        case "default":
            $contenido = "";
            break;
    }
    fwrite($gestor, $contenido);
    fclose($gestor);
}
header("Location:../../vista/admin/admin.php");
?>


