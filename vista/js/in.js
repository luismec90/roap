$( document ).ready( function() {

     

    /*Sistema de Valoracion*/
    $(".star").live("mouseover",function(){
        var t=$(this).attr("n");
        var eidlo=$(this).attr("idlo");
        var aux="0";
        for(var i=1;i<=t;i++){
            aux=aux+" "+i;
            var ispar = i%2==0?true:false; 
            if(ispar){
                $('#e'+eidlo+' [n='+i+']').removeClass("der");
                $('#e'+eidlo+' [n='+i+']').addClass("derOn");
            }
            else{
                           
                $('#e'+eidlo+' [n='+i+']').removeClass("izq");
                $('#e'+eidlo+' [n='+i+']').addClass("izqOn");
            }
        }           
    });
    $(".star").live("mouseout",function(){
        var t=$(this).attr("n");
        var eidlo=$(this).attr("idlo");
        var aux="0";
        for(var i=1;i<=t;i++){
            aux=aux+" "+i;
            var ispar = i%2==0?true:false; 
            // alert(ispar);
            if(ispar){
                           
                $('#e'+eidlo+' [n='+i+']').removeClass("derOn");
                $('#e'+eidlo+' [n='+i+']').addClass("der");
            }
            else{
                $('#e'+eidlo+' [n='+i+']').removeClass("izqOn");
                $('#e'+eidlo+' [n='+i+']').addClass("izq");
            }
        }
    });
    $(".star").live("click",function(){
        var t=$(this).attr("n");
        var idlo=$(this).attr("idlo");
        $("#dialogComentarObjeto").dialog({
            resizable: false,
            height:"auto",
            width:"auto",
            modal: true,
            open: function() {
                $(this).parent().children().children("a.ui-dialog-titlebar-close").remove();
            },
            buttons: {
                "Enviar": function() {
                    if($("#comentarioValoracion").val()==""){
                        alert("Por favor escriba un comentario.");
                        return false;
                    }
                    var comentarioValoracion=$("#comentarioValoracion").val();
                    $.ajax({
                        type:'POST',
                        url:'control/ajax/ajaxRating.php',       
                        data:"calificacion="+t+"&idlo="+idlo+"&comentarioValoracion="+comentarioValoracion+"&anonimo="+$("#checkAnonimo").is(':checked'),
                        success:    function(result){
                            $("#comentarioValoracion").attr("value","");
                            $("#dialogComentarObjeto").dialog( "close" );
                            $("#e"+idlo+"").html(result);      
                        }
                    });

                },
                "Omitir": function() {
                    $.ajax({
                        type:'POST',
                        url:'control/ajax/ajaxRating.php',       
                        data:"calificacion="+t+"&idlo="+idlo,
                        success:    function(result){
                            $("#comentarioValoracion").attr("value","");
                            $("#dialogComentarObjeto").dialog( "close" );
                            $("#e"+idlo+"").html(result);      
                        }
                    });
                }
            }
        });
    });
});