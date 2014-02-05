<div class="cabecera2 gradiente areas" id="area3">
    <script>
        $(document).ready( function() {
            $(".nombresubcolecion").hide();
            $("#nombrecolecion").hide();
            
            $(".agregarSubColecion").live("click",function(){
                $("#nombresubcolecion"+$(this).attr("idColecion")+"").slideToggle("fast");
                $("#nombresubcolecion"+$(this).attr("idColecion")+" input").focus();
            });
            
            $("#agregarColecion").live("click",function(){
                $("#nombrecolecion").slideToggle("fast");
                $("#nombrecolecion input").focus();
        
            });

            $(".imgenviarSubColecion").live("click",function(){
                var idcolecion=$(this).attr("idcolecion");
                var nombreNuveaSubColecion=$("#"+idcolecion+"").val()
                 if(nombreNuveaSubColecion==""){
                    alert("El nombre de la subcolección no puede estar vacio.")
                    return false;
                }
                $.ajax({
                    type:'GET',
                    url:'../../control/ajax/ajaxAgregarColeciones.php',       
                    data:"&nombre="+nombreNuveaSubColecion+"&idcolecion="+idcolecion,
                    success:    function(result){
                        location.reload();
                    }
                });
            });
            $("#imgenviarColecion").live("click",function(){
                var nombreNuevaColeccion=$("#enviarnombrecolecion").val();
                if(nombreNuevaColeccion==""){
                    alert("El nombre de la colección no puede estar vacio.")
                    return false;
                }
                $.ajax({
                    type:'GET',
                    url:'../../control/ajax/ajaxAgregarColeciones.php',      
                    data:"&nombre="+nombreNuevaColeccion,
                    success:  function(result){
                        location.reload();
                    }
                });    
            });
            ////////////Editar Coleccion///////////////////
            $(".imgeditarColecion").click(function(event){
                var idC=$(this).attr("idC");
                $("#inputCollection"+idC+"").removeAttr('disabled');
                $("#inputCollection"+idC+"").focus();
                $(".enviarNuevoNombreCollection").css({
                    display: "none"
                });
                $(".enviarNuevoNombreSubCollection").css({
                    display: "none"
                });
                $("#enviarNuevoNombreCollection"+idC+"").css({
                    display: "inline-block"
                });
            });
            $(".enviarNuevoNombreCollection").click(function(event){
                var idC=$(this).attr("idC");
                var nombreC=$("#inputCollection"+idC+"").val();     
                $(this).attr("href","../../control/admin/editarCategorias.php?action=C&idC="+idC+"&nombreC="+nombreC+"");
            });
            ///////////////////////////////
            
            ////////////////Editar SubColeccion //////////////////
            $(".imgeditarSubColecion").click(function(event){
                var idSC=$(this).attr("idSC");
                $("#inputSubCollection"+idSC+"").removeAttr('disabled');
                $("#inputSubCollection"+idSC+"").focus();
                
                $(".enviarNuevoNombreCollection").css({
                    display: "none"
                });
                $(".enviarNuevoNombreSubCollection").css({
                    display: "none"
                });
                $("#enviarNuevoNombreSubCollection"+idSC+"").css({
                    display: "inline-block"
                });
            });
            $(".enviarNuevoNombreSubCollection").click(function(event){
                var idSC=$(this).attr("idSC");
                var nombreSC=$("#inputSubCollection"+idSC+"").val();     
                $(this).attr("href","../../control/admin/editarCategorias.php?action=SC&idSC="+idSC+"&nombreSC="+nombreSC+"");
            });
            ///////////////////////////////
            
            //////////////////////Borrar Coleccion///////////////////
            $(".imgborrarColecion").click(function(event){
                var idC=$(this).attr("idC");
                $.ajax({
                    type:'GET',
                    url:'../../control/admin/editarCategorias.php',       
                    data:"action=cantidadOACollection&"+"idC="+idC,
                    success:    function(result){
                        if(confirm("Esta coleción tiene "+result+" Objetos de Aprendizaje, ¿Esta seguro de eliminarla?.")){
                            $.ajax({
                                type:'GET',
                                url:'../../control/admin/editarCategorias.php',       
                                data:"action=eliminarOACollection&"+"idC="+idC,
                                success:    function(result){
                                    location.href='admin.php?action=area3';
                                },
                                error:      function(geterror){
                                    alert(geterror);
                                }
                            });
                        }
                       
    
                    },
                    error:      function(geterror){
                        alert(geterror);
                    }
                });
            }); 
            ////////////////////////////////////////////////////
            
            //////////////////////Borrar SubColeccion///////////////////
            $(".imgborrarSubColecion").click(function(event){
                var idSC=$(this).attr("idSC");
                $.ajax({
                    type:'GET',
                    url:'../../control/admin/editarCategorias.php',       
                    data:"action=cantidadOASubCollection&"+"idSC="+idSC,
                    success:    function(result){
                        if(confirm("Esta subcoleción tiene "+result+" Objetos de Aprendizaje, ¿Esta seguro de eliminarla?.")){
                            $.ajax({
                                type:'GET',
                                url:'../../control/admin/editarCategorias.php',       
                                data:"action=eliminarOASubCollection&"+"idSC="+idSC,
                                success:    function(result){
                                    location.href='admin.php?action=area3';
                                },
                                error:      function(geterror){
                                    alert(geterror);
                                }
                            });
                        }
                     
                   
                 
                    },
                    error:      function(geterror){
                        alert(geterror);
                    }
                });
            }); 
            ////////////////////////////////////////////////////
        });
    </script>
    <?php
    echo "<fieldset>";
    $result = $c->getAllCollections();
    while ($row = pg_fetch_array($result)) {
        echo "<div class='paletaColor4 collection'><input type='text' class='inputCollection paletaColor4' id='inputCollection$row[0]' disabled='disabled' idC='$row[0]' value='$row[1]'/>  <a idC='$row[0]' href='' id='enviarNuevoNombreCollection$row[0]' class='enviarNuevoNombreCollection'></a><a idC=$row[0] class='imgborrarColecion'></a><a idC=$row[0] class='imgeditarColecion'></a></div>";
        $result2 = $c->getAllSubCollections($row[0]);
        while ($row2 = pg_fetch_array($result2)) {
            if ($row2[1] != $row[1])
                echo "<div class='subcollection'><input type='text' class='inputSubCollection' id='inputSubCollection$row2[0]' disabled='disabled' idSC='$row2[0]' value='$row2[1]'/>   <a idSC='$row2[0]' href='' id='enviarNuevoNombreSubCollection$row2[0]' class='enviarNuevoNombreSubCollection'></a> <a idSC=$row2[0] class='imgborrarSubColecion'></a><a idSC='$row2[0]' class='imgeditarSubColecion'></a></div>";
        }
        echo "<div class='agregarSubColecion' idColecion='$row[0]'><span class='imgSubColecion'></span>$addSubcollection</div>";
        echo "<div class='nombresubcolecion' id='nombresubcolecion$row[0]'>$name: <input type='text' id='$row[0]'/><span class='imgenviarSubColecion' idColecion='$row[0]'></span> </div>";
    }
    echo "<br/><br/><div id='agregarColecion'><span class='imgSubColecion'></span>$addCollection</div>";
    echo "<div id='nombrecolecion'>$name:<input type='text' id='enviarnombrecolecion'/><span id='imgenviarColecion'></span>  </div>";
    echo "<br/></fieldset>";
    ?>
</div>
<style>

</style>