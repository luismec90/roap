<div id="areaRegistro"> 
    <script>
        /*
        $(document).ready(function() {	
            $("#registroBotonenviar").click(function(){
                
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
                var t=$("#username").val();
                if($("#username").val() == ''){ alert("Ingrese un Usuario:");return false;}
                else if(!validarLetrasNumeros($("#username").val())){ 
                    alert("Solo se permiten letras y números en el nombre de usuario"); 
                    return false;
                } else if(t.length<=3){
                    alert("El nonmbre de usuario debe tener mínimo 4 caracteres");
                    return false;
                }
                var t=$("#password").val();
                if ($("#password").val()==''){
                    alert('Ingrese una contraseña');
                    return false;
                }
                
                if ($("#vPassword").val()==''){
                    alert('Verifique su contraseña');
                    return false;
                }
                else if($("#password").val()!=$("#vPassword").val()){
                    alert("Las contraseñas no coinciden");
                    return false;
                } else if(t.length<=3){
                    alert("La contraseña debe tener mínimo 4 caracteres");
                    return false;
                }
                
                if (!validarLetrasNumeros($("#password").val())){
                    alert('Solo se permiten letras y números en el contraseña');
                    return false;
                }

                if($("#email").val() == ''){ alert("Ingrese un email"); return false;}
                else if(!validarEmail($("#email").val())){
                    alert("El email no es valido");
                    return false;}
                
           
                if(!$("#acpetoTerminos").is(":checked")){
                    alert("Antes de continuar debe aceptar los Términos y Condiciones de Uso.");
                    return false;
                }
                
                
                $.ajax({
                    type:'POST',
                    url:'lib/mailer/examples/registroC.php?verificarUsuario='+$("#username").val(),   
                    data:"",
                    success:function(result){
                        result = result.replace(/[\r\n]/g, "");
                        if(result!=""){
                            alert("El nombre de usuario ya está en uso");      
                        }
                        else{
                            $.ajax({
                                type:'POST',
                                url:'lib/mailer/examples/registroC.php?verificarEmail='+$("#email").val(),   
                                data:"",
                                success:    function(result){
                                    result = result.replace(/[\r\n]/g, "");
                                    if(!result==""){
                                        alert("El email ya está en uso");
                                    }
                                    else{
                                        $("#formRegistro").submit();
                                    }
                                },
                                error:      function(geterror){
                                    alert("Vuelva a intentarlo");
                                }
                            });  
                        }
                    }
                });
            });
            $("#formRegistro").submit(function(event){
                event.preventDefault(); 
                $.ajax({
                    type:'POST',
                    url:'lib/mailer/examples/registroC.php?registrarse',   
                    data:$(this).serialize(),
                    beforeSend:  function(){
                        $.blockUI({
                            message: '<h1><img src="vista/img/busy.gif" /></h1>'
                        });  
                    },
                    success:    function(result){
                        // alert(result);
                        $.unblockUI();
                        alert("Se ha enviado un e-mail de confirmación a: "+$("#email").val());
                        location.href='main.php';
                    },
                    error:      function(geterror){
                        alert(geterror);
                    }
                });  
            });
        });
         */

        $(document).ready(function(){
            $("#formRegistro").submit(function(){
                pass1=$("#password").val();
                pass2=$("#vPassword").val();
                if(pass1.length<=3){
                    alert('la contraseña debe tener al menos 4 caracteres');
                    return false;
                }else if(pass1!=pass2){
                    alert('la contraseñas deben coincidir');
                    $("#password").focus();
                    return false; 
                }
                return true;
            });
        });
        
        




    </script>

    <fieldset id="registrousuario">
        <form id="formRegistro" action="control/reestablecerPass.php" method="post">
            <legend>Cambiar contraseña</legend>            
            <label for="pass">Contraseña:</label>
            <input class="texto styleInput" id="password" name="password" type="password" size="20" maxlength="20"/>
            <label for="pass">Verificar Contraseña:</label>
            <input class="texto styleInput" id="vPassword" name="vPassword" type="password" size="20" maxlength="20"/>
            <input type="hidden" name="key" value="<?php echo $email ?>" >
            <br><br>
            <input  id="registroBotonenviar" class="defaultButton" name="insert" type="submit" value="Cambiar"/> 
        </form> 
    </fieldset>
    <div id="asd"></div>
</div>
<style>
    #areaRegistro{
        width: 80%;
        background: #EBEBEB;
        margin-left: auto;
        margin-right: auto;
        min-height:90%;
        padding: 1em;

    }


    #registrousuario {

        border:medium none;
        color:#333333;
        height:550px;
        padding:0 0 0 50px;
        width:515px;
        margin:auto;
    }

    #registrousuario legend {
        color:#333333;
        font-family:arial;
        font-size:21px;
        letter-spacing:-1px;
        padding-bottom:20px;
        padding-top:8px;
        
    }

    #registrousuario input.texto {
        background:#FFFFFF;
        border:medium none !important;
        color:#222;
        font-size:14px;
        height:24px;
        padding-bottom:0;
        padding-left:5px;
        padding-top:5px;
        width:454px;
        background: white url(vista/img/input-bg.gif) repeat-x;
    }

    #registrousuario textarea.areadetexto {
        background: #ffffff;
        width: 454px;
        height: 212px;
        border:none !important;
        padding-bottom:0;
        padding-left:5px;
        padding-top:5px;
        color:#666666;
        font-size:12px;
        font-family:arial,sans-serif;
    }

    #registrousuario label {
        display:block;
        font-family:arial,sans-serif;
        font-size:14px;
        padding:10px 0 3px;
    }



    #registrousuario .styleInput {
        background: white url(vista/img/input-bg.gif) repeat-x;
        color: #5A5A5A;
        padding: 0 7px;
        height: 25px;
        border: 1px solid silver;
        width: 150px;
        margin: 0;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        border-radius: 5px;
        -webkit-box-shadow: #B2B2B2 0 0 5px;
        box-shadow: #B2B2B2 0 0 5px;
    }

    #linkTerminosCondicioes{
        cursor: pointer;
        text-decoration: none;
    }
</style>