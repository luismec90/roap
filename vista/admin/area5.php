<script>          
    $( document ).ready( function() {
        $(".borrarOaimg").live("click",function(){
            if(confirm("¿Esta seguro de eliminar este Objeto de Aprendizaje permanentemente?.")){      
                var idlo=$(this).attr("idlo");
                $.ajax({
                    type:'POST',
                    url:'../../control/ajax/permisos.php',     
                    data:"action=EliminarOa&idlo="+idlo,
                    success:    function(result){
                        //                    alert(result);
                        javascript:location.reload();
                    }
                }); 
            }
        });
        /* Cambiar Coleccion OA*/
        $("#area5Lista .cambiarColeccionOA").live("click",function(){
            var idlo=$(this).attr("idlo");
            var idReport=$(this).attr("idReport");
            $.ajax({
                type:'POST',
                url:'../../control/ajax/permisos.php',   
                data:"action=verificarPermisoCambiarColeccion&idlo="+idlo,
                success:function(result){
                    if(result=="si"){
                        $("#selectDialogSubcoleccion").attr('disabled', true)
                        $.getJSON("../../control/ajax/cambiarColeccion.php?action=consultarColecciones",function(data){
                            var options="<option value='none'>Seleccionar</option>";
                            $.each(data,function(i,Coleccion) {
                                options=options+"<option value="+Coleccion["idcollection"]+">"+Coleccion["name"]+"</option>";
                            });
                            $("#selectDialogColeccion").html(options);
                            $("#selectDialogSubcoleccion").html("");
                            $("#dialogConfirmCambiarColeccion").dialog({
                                resizable: false,
                                height:"auto",
                                width:"auto",
                                modal: true,
                                buttons: {
                                    "Aceptar": function() {
                                        // $( this ).dialog( "close" );
                                        var idC=$("#selectDialogColeccion").val();
                                        var idSC=$("#selectDialogSubcoleccion").val();
                                        if(idC=="none"){
                                            alert("Por favor seleccione una colección");
                                            return false;
                                        }
                                        else if(idSC=="none"){
                                            alert("Por favor seleccione una Subcolección");
                                            return false;
                                        }
                                        $.ajax({
                                            type:'POST',
                                            url:'../../control/ajax/cambiarColeccion.php?action=establecerColeccion',       
                                            data:"idlo="+idlo+"&idsc="+idSC+"&idReport="+idReport,
                                            success:    function(result){
                                               // alert(result);
                                                $("#dialogConfirmCambiarColeccion").dialog( "close" );
                                                location.reload();
                                            }
                                        });
                            

                                    },
                                    "Cancelar": function() {
                                        $( this ).dialog( "close" );
                                    }
                                }
                            });
                        });

                    } else if(result=="tramite"){
                        alert("Usted no es el autor de este OA, pero ya tiene una la solicitud en tramite para cambiar la colección de este OA.");
                    }
                    else  if(result=="no"){
                        if(confirm("Usted no es el autor de este objeto, ¿desea solicitar permiso para cambiar la colección de este OA?.")){
                            $.ajax({
                                type:'POST',
                                url:'../../control/ajax/permisos.php',     
                                data:"action=solicitarPermisoCambiarColeccion&idlo="+idlo,
                                success:    function(result){
                                }
                            });
                        }
                    }
                }
            });

        });
        $("#selectDialogColeccion").change(function(){
            var idC=$(this).val();
            if(idC=="none"){
                $("#selectDialogSubcoleccion").attr('disabled', true);
                $("#selectDialogSubcoleccion").html("");
            }
            $.getJSON("../../control/ajax/cambiarColeccion.php?action=consultarSubColecciones&idC="+idC+"",function(data){
                var options="<option value='none'>Seleccionar</option>";
                $.each(data,function(i,SubColeccion) {
                    options=options+"<option value="+SubColeccion["idsubcollection"]+">"+SubColeccion["name"]+"</option>";

                });
                $("#selectDialogSubcoleccion").removeAttr('disabled');
                $("#selectDialogSubcoleccion").html(options);
            });
        });
        /*---------------*/
        
        $("#archivarReporteOA").live("click",function(){
            var idlo=$(this).attr("idlo");
            var iduser=$(this).attr("iduser");
            $.ajax({
                type:'POST',
                url:'../../control/ajax/permisos.php',     
                data:"action=EliminarReporteOa&idlo="+idlo+"&iduser="+iduser,
                success:    function(result){
                    javascript:location.reload();
                }
            }); 
        });
    });  
</script>
<div class="cabecera2 gradiente areas" id="area4">
    <?php
    //SELECT lom.general_title,users.logging,report.date,report.description,lo.idlo,report.iduser FROM report,lom,lo,users WHERE users.iduser=lo.iduser AND report.iduser=users.iduser AND report.idlo=lo.idlo AND lo.idlo=lom.idlo AND report.valided=false
    $result = $c->realizarOperacion("SELECT lom.general_title,users.logging,report.date,report.description,report.idlo,report.iduser,report.idreport FROM report,lom,users WHERE users.iduser=report.iduser AND report.iduser=users.iduser AND report.idlo=report.idlo AND report.idlo=lom.idlo AND report.valided=false");
    echo "<table id='area5Lista' border='1'>";
    echo "<tr id='firstArea5Lista'>
        <td>$name</td>
        <td>$userwhoReported</td>
        <td>$date</td>
        <td>$description</td>
        <td>$options</td>       
    </tr>";
    while ($row = pg_fetch_array($result)) {
        $row[2] = substr($row[2], 0, -4);
        $linkDescarga = $c->getTechnicalLocation($row[4], true);
        $linkDescarga = pg_fetch_array($linkDescarga);
        echo "<tr>
        <td>$row[0]</td>
        <td><a href='admin.php?action=area4#$row[1]'>$row[1]</a></td>
        <td>$row[2]</td>
        <td>$row[3]</td>
        <td> <a class='downloadOaimg' title='$download' href='" . $linkDescarga[0] . "'></a>
             <a class='exportarOaimg'  href='../../control/exportarOa/export.php?idlo=$row[4]' title='$export''></a>
             <a class='cambiarColeccionOA' idReport='$row[6]' nombreOA='" . $row[4] . "' idlo='" . $row[4] . "' title='$changeCollection'></a>
             <a class='editarOaimg'  href='../../main.php?action=Formulario_Editar&idlo=$row[4]&idReport=$row[6]' idlo='$row[4]' title='$edit'></a>
             <a class='borrarOaimg' idlo='" . $row[4] . "' title='$delete'></a> <input id='archivarReporteOA' idlo='$row[4]' iduser='$row[5]' value='$deleteReport' type='button'></td>       
    </tr>";
    }
    echo "</table>";
     $result = $c->realizarOperacion("SELECT lom.general_title,users.logging,report.date,report.description,report.idlo,report.iduser,report.idreport,report.dateaction,report.action FROM report,lom,users WHERE users.iduser=report.iduser AND report.iduser=users.iduser AND report.idlo=report.idlo AND report.idlo=lom.idlo AND report.valided=true");
    echo "<br/><br/><div id='marginHistorial'><h2>$historical</h2></div><table id='area5Lista' border='1'>";
    echo "<tr id='firstArea5Lista'>
        <td>$name</td>
      <td>$userwhoReported</td>
        <td>$reportingDate</td>
        <td>$description</td>
        <td>$dateOfRevision</td>
        <td>$action</td>       
    </tr>";
    while ($row = pg_fetch_array($result)) {
        $row[2] = substr($row[2], 0, -4);
        $row[7] = substr($row[7], 0, -4);
        $linkDescarga = $c->getTechnicalLocation($row[4], true);
        $linkDescarga = pg_fetch_array($linkDescarga);
        echo "<tr>
        <td>$row[0]</td>
        <td><a href='admin.php?action=area4#$row[1]'>$row[1]</a></td>
        <td>$row[2]</td>
        <td>$row[3]</td>
        <td> $row[7]</td>  
          <td>$row[8] </td> 
    </tr>";
    }
    echo "</table>";
    ?>
    
</div>
<style>
    .downloadOaimg{
        cursor:pointer;
        margin-left: 0.5em;
        margin-right: 0.5em;
        display: inline-block;
        width:16px;
        height:16px;
        background:url(../img/downloadOAimg.png) no-repeat !important;
        margin-bottom: -2px;
    }
    .exportarOaimg{
        cursor:pointer;
        margin-left: 0.5em;
        margin-right: 0.5em;
        display: inline-block;
        width:16px;
        height:16px;
        background:url(../img/exportarOAimg.gif) no-repeat !important;
        margin-bottom: -2px;
    }   
    .editarOaimg{
        cursor:pointer;
        margin-left: 0.5em;
        margin-right: 0.5em;
        display: inline-block;
        width:16px;
        height:16px;
        background:url(../img/editarOAimg.gif) no-repeat !important;
        margin-bottom: -2px;
    }

    .borrarOaimg{
        cursor:pointer;
        margin-left: 0.5em;
        display: inline-block;
        width:16px;
        height:16px;
        background:url(../img/borrarOAimg.png) no-repeat !important;
        margin-bottom: -2px;
    }
    .cambiarColeccionOA{
        cursor:pointer;
        margin-left:0.5em;
        margin-right: 0.5em;
        display: inline-block;
        width:16px;
        height:16px;
        background:url(../img/cambiarColeccionOA.gif) no-repeat !important;
        margin-bottom: -2px;
    }
    #marginHistorial{
        text-align: center;
        color:#CF4327;
    }
    
</style>