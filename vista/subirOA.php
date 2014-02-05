<script>
    $(document).ready(function() {

        $("#desplegable").hide();

        function ValidaURL(url) {
            var regex = /^(ht|f)tps?:\/\/\w+([\.\-\w]+)?\.([a-z]{2,3}|info|mobi|aero|asia|name)(:\d{2,5})?(\/)?((\/).+)?$/i;
            return regex.test(url);
        }
        $("#flip").click(function() { //Agregar Objetos de Aprendizaje
            $("#desplegable").slideToggle("slow");
        });
        $("#archivo1").change(function(event) {
            $("#subirArchivoFisico").attr("checked", "checked");
        });
        $("#textReferencia").change(function(event) {
            $("#refernciarArchivo").attr("checked", "checked");
        });
        $("#subirArchivo").click(function(event) {

            if (!$("#subirArchivoFisico").attr('checked') && !$("#refernciarArchivo").attr('checked')) {
                alert("Por favor marque una opcion");
                return false;
            } else if ($("#subirArchivoFisico").attr('checked') && $("#archivo1").val() == "") {
                alert("Por favor seleccione un archivo");
                return false;
            } else if ($("#refernciarArchivo").attr('checked') && $("#textReferencia").val() == "") {
                alert("Por favor indique la direccion web en la cual se puede descargar el archivo");
                return false;
            } else if ((!$("#importar").attr('checked')) && (!$("#catalogar").attr('checked'))) {
                alert("Por favor marque una opcion");
                return false;
            } else if ($("#importar").attr('checked') && $("#archivo2").val() == "") {
                alert("Por favor seleccione el xml que desea importar");
                return false;
            } else if ($("#importar").attr('checked') && $("#archivo2").val() != "") {
                var ruta = $("#archivo2").val();
                var n = ruta.split(".");
                if (n[n.length - 1] != "xml") {
                    alert("El archivo a exportar debe tener extension .xml")
                    return false;
                }
            }
            else if (!$("#acpetoTerminos").is(":checked")) {
                alert("Antes de continuar debe aceptar los Términos y Condiciones de Uso.");
                return false;
            }
            //            if($("#refernciarArchivo").attr('checked')&& $("#textReferencia").val()!=""){
            //               if(ValidaURL($("#textReferencia").val())==false){
            //                   alert("Por favor ingrese una url válida");
            //                   return false;
            //               }      
            //            }
            $("#coverDisplay").css({
                "opacity": "1",
                "width": "100%",
                "height": "100%"
            });

        });
    });
</script>
<div id="contenedorSubirOA"><div id="flip">   <div class="agregarOA link"> <span class="agregarOAimgCatalogar"></span> <b><?= $titleAddOA ?></b></div>
    </div>
    <div id="desplegable">  
        <form id="formulario2" method="post" action="main.php?action=Formulario_Catalogar" enctype="multipart/form-data">
            <div class="archivo"><b><?= $file ?>:</b><br/><br/>
                <input type="radio"  id="subirArchivoFisico" name="ubicacion" checked="checked" value="subir"/> <?= $uploadFile ?>: <input id="archivo1" type="file" name="archivos[]"/></div><br/>     
            <input type="radio"  id="refernciarArchivo" name="ubicacion" value="referencia"/> <?= $fileReferencing ?> <input id="textReferencia" type="text" name="textReferencia"/><br/><br/>
            <div><b><?= $lomMetadata ?>:</b></div><br/>
            <div class="ingresar"><input type="radio" id="catalogar" name="question" checked="checked" value="Ingresar"/><?= $enteringData ?></div><br/>
            <div class="importar"><input type="radio" id="importar" name="question" value="Importar"/><?= $XMLimport ?>: <input id="archivo2" type="file" name="archivos[]" accept=".xml"/></div><br/>
            <input type="checkbox" name="acpetoTerminos" id="acpetoTerminos"> <b style="color:black;"><?= $terms1 ?> <a class="link" target="_blank" href="main.php?action=terminos" id="linkTerminosCondicioes"><?= $terms2 ?> </a> <?= $terms3 ?> .</b>
            <br /> <br />
            <div class="boton"><input id="subirArchivo" class="defaultButton color1bg" type="submit" name="entrar"  value="<?= $accept ?>"/></div>
            <input id="oculto" name="oculto" type="text" style="visibility:hidden" value="<?php echo $_GET["idC"]; ?>"/>
        </form>
    </div>
</div>
<style>
    #contenedorSubirOA{
        margin-left: 200px;
        padding: 0.5em;
    }
    #contenedorSubirOA b{
    }

    #flip{
        margin-left: 1.5em;
        margin-right: 1.5em;
        background:#FFFFEA;
        border:solid 1px #c3c3c3;
        font-weight: bold;
        font-size: 1em;
        padding:0.5em 3em;
    }

    #flip:hover{
        cursor: pointer;
    }

    .agregarOA{
        cursor:pointer;
        font: 1.2em sans-serif,Tahoma;
    }
    .agregarOAimgCatalogar{
        display: inline-block;
        width:16px;
        height:16px;
        background:url(vista/img/anadirOa.png) no-repeat;
        margin-bottom: -2px;

    }
    .agregarOA:hover{
        color:black;
    }
    #desplegable{
        margin-left: 1.5em;
        margin-right: 1.5em;
        background:#FFFFEA;
        border:solid 1px #c3c3c3;
        font-weight: bold;
        border-top: none;
        font-size: 1em;
        padding:1em 5em 0em 5em;
    }
    #linkTerminosCondicioes{
        cursor: pointer;
        text-decoration: none;
    }

</style>