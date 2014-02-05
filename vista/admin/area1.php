<script>
    $(document).ready(function() {
        /*    function colorToHex(color) {
         if (color.substr(0, 1) === '#') {
         return color;
         }
         var digits = (/(.*?)rgb\((\d+), (\d+), (\d+)\)/).exec(color);
         alert(digits);
         var red = parseInt(digits[2]);
         var green = parseInt(digits[3]);
         var blue = parseInt(digits[4]);
         
         var rgb = blue | (green << 8) | (red << 16);
         return digits[1] + '#' + rgb.toString(16);
         };
         
         var color1= $("#colorPicker1").css("background");
         var color2= $("#colorPicker2").css("background");
         var color3= $("#colorPicker3").css("background");
         var color4= $("#colorPicker4").css("background");
         var color5= $("#colorPicker5").css("background");
         alert(color1);
         //alert(colorToHex(color1));
         //        
         //        $("#colorPicker1").val(colorToHex(color1)).css({"color":"transparent"});
         //        $("#colorPicker2").val(colorToHex(color1)).css({"color":"transparent"});
         //        $("#colorPicker3").val(colorToHex(color1)).css({"color":"transparent"});
         //        $("#colorPicker4").val(colorToHex(color1)).css({"color":"transparent"});
         //        $("#colorPicker5").val(colorToHex(color1)).css({"color":"transparent"});
         */
        $("#eEnviarFormulario").click(function() {
            function ValidaMail(mail) {
                var exr = /^[0-9a-z_\-\.]+@[0-9a-z\-\.]+\.[a-z]{2,4}$/i;
                return exr.test(mail);
            }
            if ($("#eCambiarPassword").val() != $("#eCambiarVerificarPassword").val()) {
                alert("Las contraseñas no coinciden");
                return false;
            }
            if (!ValidaMail($("#eCambiarEmail").val())) {
                alert("La dirección de EMail es incorrecta!");
                return false;
            }
            $("#contendorFormulario").submit();
        });
        $('#colorPicker1, #colorPicker2,#colorPicker3, #colorPicker4, #colorPicker5').ColorPicker({
            onSubmit: function(hsb, hex, rgb, el) {
                $(el).val(hex);
                $(el).css({
                    "color": "transparent",
                    "background-color": "#" + hex
                });
                $(el).ColorPickerHide();
            },
            onBeforeShow: function() {
                $(this).ColorPickerSetColor(this.value);
            }
        })
                .bind('keyup', function() {
            $(this).ColorPickerSetColor(this.value);
        });
    });

</script>
<link rel="stylesheet" href="../../lib/colorPicker/css/colorpicker.css" type="text/css" />
<!--<link rel="stylesheet" media="screen" type="text/css" href="../../lib/colorPicker/css/layout.css" />-->
<script type="text/javascript" src="../../lib/colorPicker/js/jquery.js"></script>
<script type="text/javascript" src="../../lib/colorPicker/js/colorpicker.js"></script>
<script type="text/javascript" src="../../lib/colorPicker/js/eye.js"></script>
<script type="text/javascript" src="../../lib/colorPicker/js/utils.js"></script>
<script type="text/javascript" src="../../lib/colorPicker/js/layout.js?ver=1.0.2"></script>
<div class="cabecera2 gradiente areas" id="area1">            
<!--    <fieldset class="fset"><legend class="titulo"><?= $language ?></legend>
        <label class="alinear"><?= $selectALanguage ?></label>
        <select  class="alinear" id="seleccionarIdioma"  name="seleccionarIdioma">
            <option value="1">Español</option> </select>
    </fieldset>-->
    <fieldset class="fset"><legend class="titulo"><?= $graphicOptions ?></legend>
        <b><h2> <?= $colorPalette ?></h2></b>
        <form id="formularioPaletas" action="../../control/admin/paletaColoresC.php" method="post">

            <div class="separador">
                <div class="colors" >
                    <span class="swatch_3d_32" style="background-color:#016BDC;" title="#016BDC"></span>
                    <span class="swatch_3d_32" style="background-color:#CF4327;" title="#CF4327"></span>
                    <span class="swatch_3d_32" style="background-color:#5BB75B;" title="#5BB75B"></span>
                    <span class="swatch_3d_32" style="background-color:#F30;" title="#F30"></span>
                    <span class="swatch_3d_32" style="background-color:#8D8D77;" title="#8D8D77"></span>
                </div>
                <input type="radio" class="radioPaleta" id="default" name="paleta" value="default" <?php
                if ($radioPaleta == "default") {
                    echo "checked='checked'";
                }
                ?>/> 
                <br/><br/>
            </div>

            <div class="separador">
                <div class="colors" >
                    <span class="swatch_3d_32" style="background-color:#000000;" title="#000000"></span>
                    <span class="swatch_3d_32" style="background-color:#006B00;" title="#006B00"></span>
                    <span class="swatch_3d_32" style="background-color:#E6E6B8;" title="#E6E6B8"></span>
                    <span class="swatch_3d_32" style="background-color:#1975FF;" title="#1975FF"></span>
                    <span class="swatch_3d_32" style="background-color:#FF6600;" title="#FF6600"></span>
                </div>
                <input type="radio" class="radioPaleta"  name="paleta" value="paleta2" <?php
                if ($radioPaleta == "paleta2") {
                    echo "checked='checked'";
                }
                ?>/>  
            </div>

            <div class="separador">
                <div class="colors" >
                    <span class="swatch_3d_32" style="background-color:#90C140;" title="#90C140"></span>
                    <span class="swatch_3d_32" style="background-color:#545453;" title="#545453"></span>
                    <span class="swatch_3d_32" style="background-color:grey;" title="grey"></span>
                    <span class="swatch_3d_32" style="background-color:#009900;" title="#009900"></span>
                    <span class="swatch_3d_32" style="background-color:#996633;" title="#996633"></span>
                </div>
                <input type="radio" class="radioPaleta" id="paleta2" name="paleta" value="paleta3" <?php
                if ($radioPaleta == "paleta3") {
                    echo "checked='checked'";
                }
                ?>/>  
            </div>


            <div id="coloresPersonalizados"class="separador">
                <b><?= $customColors ?>:</b>
                <br>
                <input <?php if (isset($arrayColores[1])) {
                           echo "style='background:#$arrayColores[1]; color:transparent;' value='$arrayColores[1]'";
                       } ?> id="colorPicker1" name="colorPicker1" readonly="readonly" type="text">
                <input <?php if (isset($arrayColores[2])) {
                           echo "style='background:#$arrayColores[2]; color:transparent;' value='$arrayColores[2]'";
                       } ?> id="colorPicker2" name="colorPicker2" readonly="readonly" type="text">
                <input <?php if (isset($arrayColores[3])) {
                           echo "style='background:#$arrayColores[3]; color:transparent;' value='$arrayColores[3]'";
                       } ?> id="colorPicker3" name="colorPicker3" readonly="readonly" type="text"> 
                <input <?php if (isset($arrayColores[4])) {
                    echo "style='background:#$arrayColores[4]; color:transparent;' value='$arrayColores[4]'";
                } ?> id="colorPicker4" name="colorPicker4" readonly="readonly" type="text">
                <input <?php if (isset($arrayColores[5])) {
                    echo "style='background:#$arrayColores[5]; color:transparent;' value='$arrayColores[5]'";
                } ?> id="colorPicker5" name="colorPicker5" readonly="readonly" type="text">
                <input type="radio" class="radioPaleta" id="paleta2" name="paleta" value="coloresPersonalizados" <?php
                if ($radioPaleta == "coloresPersonalizados") {
                    echo "checked='checked'";
                }
                ?>/>  

            </div>
            <div class="separador">
                <br>
                <input type="submit" name="establecerPaleta" value="<?= $set ?>" class="defaultButton"/>
            </div>
        </form>
        <b><h2> <?= $mainBanner ?></h2></b>  

        <form id="formularioBanner" method="post" action="../../control/admin/cambiarBanner.php" enctype="multipart/form-data">
            <input type="radio" class="radioPaleta" id="bDefault" name="radioBanner" value="bDefault"/<?php
                                        if ($radioBanner == "default") {
                                            echo "checked='checked'";
                                        }
                                        ?>> <?= $defaultBanner ?> <img src="../img/headerRoapM.png" alt="toro"> 

            <br/><br/>
            <div class="archivo"><input type="radio" class="radioPaleta" id="bAdmin" name="radioBanner" value="bAdmin"  <?php
                                        if ($radioBanner != "default") {
                                            echo "checked='checked'";
                                        }
                                        ?>/> <input id="archivo1" type="file" name="archivos2[]" accept="image/*"/><b> <?= $textNoteSetBanner ?></b><br/><br/> <input class="defaultButton" type="submit" value="<?= $load ?>"></div><br/>     
        </form>

    </fieldset>
    <fieldset class="fset"><legend class="titulo"><?= $sendingMail ?></legend>
        <br/>
        <!--        <form id="cambiar" action="" method="post">
                    <div class="fleft">
                        <div id="espacio1"> <label class="alinear">Nueva contraseña:</label></div>
                        <label class="alinear">Confirme la contraseña:</label>
                    </div>
                    <div class="fleft">
                        <div id="espacio2">  <input type="text" id="cambiarpsw" name="cambiarpsw"/></div>
                        <input type="text" id="confCambiarpsw" name="confCambiarpsw"/>
                    </div>
                </form>-->
        <div id="areaEditarPerfil"> 

        
            <?php  $conn = new conector_pg();
            
                    $smtp  = $conn->get_info_smtp();
            ?>
            
            <form id="contendorFormulario" method="POST" action="../../control/areaEditarPerfilC.php?action=admin" autocomplete="off">                
                <div class="eclear"><div class="ecol1"><?= $serverSMTP ?>:</div><input required id="eCambiarEmail" value="<?php echo $smtp['smtp'] ?>" name="smtp" type="text"/></div>
                <div class="eclear"><div class="ecol1"><?= $port ?>:</div><input required id="eCambiarEmail" value="<?php echo $smtp['puerto'] ?>" name="puerto" type="text"/></div>
                <div class="eclear"><div class="ecol1"><?= $sender ?>:</div><input required id="eCambiarEmail" value="<?php echo $smtp['remitente'] ?>" name="remitente" type="text"/></div>
                <div class="eclear"><div class="ecol1"><?= $email ?>:</div><input required id="eCambiarEmail" value="<?php echo $smtp['email'] ?>" name="email" type="email"/></div>
                <div class="eclear"><div class="ecol1"><?= $password ?>:</div><input required id="eCambiarEmail" value="<?php echo $smtp['password'] ?>" name="password" type="text"/></div>
                <div class="eclear"><div class="ecol1"><br/><input  class="defaultButton" type="submit" value="<?= $submit ?>"/></div></div>
            </form>



        </div>
    </fieldset>

    <fieldset class="fset"><legend class="titulo"><?= $connectingToFRAC ?> </legend>
        <br/>

        <div id="areaConexionFROAC"> 
            <?php
            if ($conteo == 0) {
                echo "<li>$textFroacConnection1</li>";
            } else if ($estado == 0) {
                echo "<p>FROAC se ha intentado conectar con ROAP</p>";
                echo "<button onClick='location.href=\"admin.php?option=true\";'>Validar conexión</button><br>";
                echo "<button onClick='location.href=\"admin.php?option=false\";'>Denegar conexión</button>";
            } else if ($estado == 1) {
                if ($errores == 0) {
                    echo "<li>$textFroacConnection2</li>";
                } else {
                    echo "<li>Usted se encuentra conectado con FROAC</li><br/>";
                    echo "<ul><li>Existen ($errores) objetos que no han sido sincronizados</li></ul><br/>";
                    echo "<form action='../../control/sincronizarFROAC.php?action=admin' method='POST'>
                                <input type='submit' value='Sincronizar'/>
                        </form>";
                }
            }
            ?>


        </div>
    </fieldset>


    <fieldset class="fset"><legend class="titulo"><?= $connectingViaOAIPMH ?></legend>
        <br/>
<?php
$file = @fopen("../../control/admin/configoai.txt", "r");
$line = fgets($file);
@fclose($file);

$line = ($line == "1") ? "checked" : "";
?>

        <div id="areaConexionFROAC"> 
            <p><input id="oai" <?php echo $line ?> type="checkbox" ><?= $allowBeConsultedByOAIPMH ?></p>
        </div>
    </fieldset>



</div>

<script>
    $(document).ready(function() {
        $("#oai").change(function() {
            result = $.ajax({
                type: "POST",
                url: "../../control/ajax/reportarOA.php?action=oai",
                data: {
                    option: $("#oai").is(':checked')
                },
                async: false
            }).responseText;
            //   alert(result);

        });
    });
</script>   