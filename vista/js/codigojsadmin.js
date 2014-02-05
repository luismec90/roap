$(document).ready(function() {	

    $("#des1").click(function() {
			
        alert("Senor Administrador, por favor marque los campos que desea establecer como obligatorios en el formulario.");
        return false;
			
			
    });
    $(".pointer").hover(function() {
        $(this).css('cursor','pointer');
    });
    $(".submit").hover(function(){
        // .css('background-image', 'url(my_image.jpg)'
           
        $(this).css("background","url(../img/savefinal2.png)");  
    },
    function(){
        $(this).css("background","url(../img/savefinal.png)");
    }
    );
    $("#formularioadmin").submit(function(event) { 
        event.preventDefault(); 
        $.ajax({
            // el tipo de petici�n
            type:'POST',
            // que archivo vamos a pedir
            url:'../../control/establecercampos.php',
            // los datos que vamos a enviar         
            data:$(this).serialize(),
            // funcion que se ejecutar� antes de enviar la petici�n
            beforeSend: function(){
            //alg�n c�digo
            },
            // cuando la petici�n se hizo satisfactoriamente
            success:    function(result){
                alert("Capos obligatorios actulizados")
                    javascript:location.reload();
            }
        });
    });

});