<script>
    $( document ).ready( function() {
        $("#eEnviarFormulario").click(function(){
            function validarEmail(valor)
            {
                // creamos nuestra regla con expresiones regulares.
                var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
                // utilizamos test para comprobar si el parametro valor cumple la regla
                if(filter.test(valor))
                    return true;
                else
                    return false;
            }
            
            function validarLetrasNumeros(valor)
            {
                // creamos nuestra regla con expresiones regulares.
                var filter = /^[a-zA-Z0-9]*$/;
                // utilizamos test para comprobar si el parametro valor cumple la regla
                if(filter.test(valor))
                    return true;
                else
                    return false;
            }
            if ($("#firstname").val()==''){
                alert('Ingrese sus nombres');
                return false;
            }
            if ($("#lastname").val()==''){
                alert('Ingrese sus apellidos');
                return false;
            }
            
            var t=$("#eCambiarPassword").val();
            if ($("#eCambiarPassword").val()==''){
                alert('Ingrese una contraseña');
                return false;
            }
                
            if ($("#eCambiarVerificarPassword").val()==''){
                alert('Verifique su contraseña');
                return false;
            }
            else if($("#eCambiarPassword").val()!=$("#eCambiarVerificarPassword").val()){
                alert("Las contraseñas no coinciden");
                return false;
            } else if(t.length<=3){
                alert("La contraseña debe tener mínimo 4 caracteres");
                return false;
            }
                
            if (!validarLetrasNumeros($("#eCambiarPassword").val())){
                alert('Solo se permiten letras y números en el contraseña');
                return false;
            }

            if($("#email").val() == ''){ alert("Ingrese un email"); return false;}
            else if(!validarEmail($("#eCambiarEmail").val())){
                alert("El email no es valido");
                return false;}
            
            if($("#eCambiarPassword").val()!=$("#eCambiarVerificarPassword").val()){
                alert("Las contraseñas no coinciden");
                return false;
            }

            $("#contendorFormulario").submit();     
        });
    });
    
</script>
<div id="areaEditarPerfil"> 

    <form id="contendorFormulario" method="POST" action="control/areaEditarPerfilC.php?action=user" autocomplete="off">
        <div class="eclear"><div class="ecol1"><?= $changeNames ?>:</div><input  id="firstname" value="<?php echo $row[0] ?>" maxlength="30" name="eCambiarNombre" type="text"/></div>
        <div class="eclear"><div class="ecol1"><?= $changeLastName ?>:</div><input  id="lastname"  value="<?php echo $row[1] ?>" maxlength="30" name="eCambiarApellido" type="text"/></div>
        <div class="eclear"><div class="ecol1"><?= $changePassword ?>:</div><input   id="eCambiarPassword" value="" maxlength="20" name="eCambiarPassword" type="password"/></div>
        <div class="eclear"> <div class="ecol1"><?= $verifyPassword ?>:</div><input    id="eCambiarVerificarPassword" value="" maxlength="20" name="eCambiarVerificarPassword" type="password"/></div>
        <div class="eclear"><div class="ecol1"><?= $changeEmail ?>:</div><input id="eCambiarEmail" value="<?php echo $row[3] ?>" name="eCambiarEmail" maxlength="50" type="text"/></div>
        <div class="eclear"><div class="ecol1"><input  id="eEnviarFormulario" class="defaultButton" type="button" value="<?= $submit ?>"/></div></div>
    </form>




</div>

<style>
    #areaEditarPerfil{
        width: 80%;
        background: #EBEBEB;
        margin-left: auto;
        margin-right: auto;
        min-height:90%;
        padding: 1em;
        min-height: 400px;
    }
</style>