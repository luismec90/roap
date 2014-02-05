
<div class="cabecera2 gradiente areas" id="area4">
    <?php
    $result = $c->realizarOperacion("SELECT * FROM deletedLo order by date desc");
    echo "<table id='area6Lista' border='1'>";
    echo "<tr id='firstArea6Lista'>
        <td>$name</td>
        <td>$owner</td>
        <td>$deletedUser</td>
        <td>$date</td>     
    </tr>";
    while ($row = pg_fetch_array($result)) {         
        $userOwner = pg_fetch_array($c->obtenerDatosUsuario("logging", $row[1]));
        $userOwner = $userOwner[0];
        
        $userDeleted = pg_fetch_array($c->obtenerDatosUsuario("logging", $row[2]));
        $userDeleted = $userDeleted[0];
       
        
        echo "<tr>
        <td>$row[3]</td>
        <td><a href='admin.php?action=area4#$userOwner'>$userOwner</a></td>
        <td><a href='admin.php?action=area4#$userDeleted'>$userDeleted</a></td>
        <td>$row[4]</td>
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
</style>