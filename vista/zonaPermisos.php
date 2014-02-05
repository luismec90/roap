<div id="areaPermiso"> 



    <fieldset><legend><?= $news ?></legend><ul>

            <?php
            $coleccionARecomendar = pg_fetch_array($c->coleccionARecomendar($_SESSION["iduser_roap"]));

            if ($coleccionARecomendar[1] != "") {
                if($_SESSION["lastloging"]=="")
                {$_SESSION["lastloging"]="now()";}
              
                $hayOAs = pg_fetch_array($c->hayOAs($coleccionARecomendar[1], $_SESSION["iduser_roap"], $_SESSION["lastloging"])); //Hay Objetos desde su ultimo acceso?
                if ($hayOAs[0] > 0) {
                    ?>
                    <br>
                   <?= $textRecommendOA ?> <br> <br><a id="bontonRecomendar" class="defaultButton" href="main.php?action=recomendarOAs"><?= $seeOAs ?></a>
                    <br>    <br>
                    <?php
                }
            }
            while ($r2 = pg_fetch_array($notificaciones)) {
                echo "<li class='solicitud'>";
                $nameUserfrom = pg_fetch_array($c->obtenerDatosUsuario("name", $r2[0]));
                $tituloOA = pg_fetch_array($c->getGeneralTitle($r2[2]));
                switch ($r2[3]) {
                    case "11";
                        echo "<label class='anchoNotificaciones'>$nameUserfrom[0] $OAValored <a class='estiloLinkOA'  title='$seeOA' href='main.php?action=rateComments&idOA=$r2[2]'> $tituloOA[0]</a></label> <a class='defaultButton'  href='control/guardarPermisosC.php?action=ok&from=$r2[1]&to=$r2[0]&idlo=$r2[2]&type=$r2[3]'>$ok</a>";
                        break;
                }
                echo "</li>";
            }
            ?></ul>
    </fieldset>
    <br>
    <fieldset><legend><?= $requests ?></legend><ul>
            <?php
            while ($r2 = pg_fetch_array($r)) {
                echo "<li class='solicitud'>";
                $nameUserfrom = pg_fetch_array($c->obtenerDatosUsuario("name", $r2[0]));
                $tituloOA = pg_fetch_array($c->getGeneralTitle($r2[2]));
                switch ($r2[3]) {

                    case "1"; //Edicion
                        echo "<label class='anchoNotificaciones'>$nameUserfrom[0] $requestEditOA <a class='estiloLinkOA'  title='$seeOA' href='main.php?action=Formulario_Ver&idlo=$r2[2]'> $tituloOA[0]</a></label> <a href='control/guardarPermisosC.php?action=concederEdicion&from=$r2[1]&to=$r2[0]&idlo=$r2[2]&type=$r2[3]' class='defaultButton'>$grant</a><a href='control/guardarPermisosC.php?action=denegarEdicion&from=$r2[1]&to=$r2[0]&idlo=$r2[2]&type=$r2[3]' class='defaultButton'>$deny</a>";
                        break;

                    case "2"; //Eliminacion
                        echo "<label class='anchoNotificaciones'>$nameUserfrom[0] $requestDeleteOA <a class='estiloLinkOA'  title='$seeOA' href='main.php?action=Formulario_Ver&idlo=$r2[2]'> $tituloOA[0]</a></label> <a href='control/guardarPermisosC.php?action=concederEliminacion&from=$r2[1]&to=$r2[0]&idlo=$r2[2]&type=$r2[3]' class='defaultButton'>$grant</a><a href='control/guardarPermisosC.php?action=denegarEliminacion&from=$r2[1]&to=$r2[0]&idlo=$r2[2]&type=$r2[3]' class='defaultButton'>$deny</a>";
                        break;

                    case "3";
                        echo "<label class='anchoNotificaciones'>$nameUserfrom[0] $requestEditAccepted <a class='estiloLinkOA'  title='$seeOA' href='main.php?action=Formulario_Ver&idlo=$r2[2]'> $tituloOA[0]</a></label> <a class='defaultButton'  href='control/guardarPermisosC.php?action=ok&from=$r2[1]&to=$r2[0]&idlo=$r2[2]&type=$r2[3]'>$ok</a>";
                        break;

                    case "4";
                        echo "<label class='anchoNotificaciones'>$nameUserfrom[0] $requestDeleteAccepted <a class='estiloLinkOA'  title='$seeOA' href='main.php?action=Formulario_Ver&idlo=$r2[2]'> $tituloOA[0]</a></label>  <a class='defaultButton'  href='control/guardarPermisosC.php?action=ok&from=$r2[1]&to=$r2[0]&idlo=$r2[2]&type=$r2[3]'>$ok</a>";
                        break;
                    case "5";
                        echo "<label class='anchoNotificaciones'>$nameUserfrom[0] $requestEditDeny <a class='estiloLinkOA'  title='$seeOA' href='main.php?action=Formulario_Ver&idlo=$r2[2]'> $tituloOA[0]</a></label>  <a class='defaultButton'  href='control/guardarPermisosC.php?action=ok&from=$r2[1]&to=$r2[0]&idlo=$r2[2]&type=$r2[3]'>$ok</a>";
                        break;
                    case "6";
                        echo "<label class='anchoNotificaciones'>$nameUserfrom[0] $requestDeleteDeny <a class='estiloLinkOA'  title='$seeOA' href='main.php?action=Formulario_Ver&idlo=$r2[2]'> $tituloOA[0]</a>  <a class='defaultButton'  href='control/guardarPermisosC.php?action=ok&from=$r2[1]&to=$r2[0]&idlo=$r2[2]&type=$r2[3]'>$ok</a>";
                        break;
                    case "7";
                        echo "<label class='anchoNotificaciones'>El OA <a class='estiloLinkOA'  title='Continuar Catalogacion' href='main.php?action=Formulario_Editar&idlo=$r2[2]'> $tituloOA[0]</a> $OASavedPartial</label>";
                        break;
                    case "8";
                        echo "<label class='anchoNotificaciones'>$nameUserfrom[0] $requestChangeCollection <a class='estiloLinkOA'  title='$seeOA' href='main.php?action=Formulario_Ver&idlo=$r2[2]'> $tituloOA[0]</a></label> <a href='control/guardarPermisosC.php?action=concederCambiarColeccion&from=$r2[1]&to=$r2[0]&idlo=$r2[2]&type=$r2[3]' class='defaultButton'>$grant</a><a href='control/guardarPermisosC.php?action=denegarCambiarColeccion&from=$r2[1]&to=$r2[0]&idlo=$r2[2]&type=$r2[3]' class='defaultButton'>$deny</a>";
                        break;
                    case "9";
                        echo "<label class='anchoNotificaciones'>$nameUserfrom[0] $requestGrantAccepted <a class='estiloLinkOA'  title='$seeOA' href='main.php?action=Formulario_Ver&idlo=$r2[2]'> $tituloOA[0]</a></label>  <a class='defaultButton'  href='control/guardarPermisosC.php?action=ok&from=$r2[1]&to=$r2[0]&idlo=$r2[2]&type=$r2[3]'>$ok</a>";
                        break;
                    case "10";
                        echo "<label class='anchoNotificaciones'>$nameUserfrom[0] $requestGrantDeny <a class='estiloLinkOA'  title='$seeOA' href='main.php?action=Formulario_Ver&idlo=$r2[2]'> $tituloOA[0]</a></label>  <a class='defaultButton'  href='control/guardarPermisosC.php?action=ok&from=$r2[1]&to=$r2[0]&idlo=$r2[2]&type=$r2[3]'>$ok</a>";
                        break;
                }
                echo "</li>";
            }
            ?></ul>
    </fieldset>
    <br/>
    <fieldset><legend><?= $historical ?></legend><ul>
            <?php
            while ($h = pg_fetch_array($historial)) {
                echo "<li class='solicitud'>";
                $tOA = pg_fetch_array($c->getGeneralTitle($h[2]));
                switch ($h[3]) {
                    case "3"; //Edicion
                        echo "<label class='anchoNotificaciones'> $haveEditingPermission <a class='estiloLinkOA'  title='$seeOA' href='main.php?action=Formulario_Editar&idlo=$h[2]'> $tOA[0]</a></label>";
                        break;
                    case "4"; //eliminacion
                        echo "<label class='anchoNotificaciones'> $haveDeletingPermission <a class='estiloLinkOA'  title='$seeOA' href='main.php?action=Formulario_Ver&idlo=$h[2]'> $tOA[0]</a></label>";
                        break;
                    case "9"; //eliminacion
                        echo "<label class='anchoNotificaciones'> $haveChangeCollectionPermission <a class='estiloLinkOA'  title='$seeOA' href='main.php?action=Formulario_Ver&idlo=$h[2]'> $tOA[0]</a></label>";
                        break;
                }
                echo "</li>";
            }
            ?>
    </fieldset>
</div>
<style>


    /*Area Permisos*/
    #linkPendientes{
        color:blue;
        cursor:pointer;
        font-size: 1.1em;
        margin-right: 1em;
        text-decoration: none;
    }
    #areaPermiso{
        width: 80%;
        background: #EBEBEB;
        margin-left: auto;
        margin-right: auto;
        min-height:90%;
        padding: 1em;
        min-height: 400px;
    }

    #areaPermiso fieldset{
        border:1px solid black;
        padding-left: 1em;
    }

    #areaPermiso legend{
        padding:0 0.5em 0 0.5em;
        margin:0 0.5em 0 0.5em;
        padding-left: 0.5em;
        margin-left: 0.5em;
        font-size: 16px;
        font-weight: bold;
    }

    .solicitud{
        padding:1em 0.5em;
        font-size: 15px;
        font-size: 16px;
    }


    #areaPermiso ul {
        font-variant: normal;
        font-weight: normal;
        list-style-type: circle;
        margin: 0;
        padding: 0 5px 5px 15px;
        text-decoration: none;
        text-indent: 0;
        text-transform: none;
    }
    #areaPermiso .defaultButton{
        margin-left: 1em;
        text-decoration: none;
        line-height: 24px; /* Para centrar*/ 
    }
    #bontonRecomendar{
        width: 75px;
        margin-left:0 !important;
    }
    #areaPermiso .estiloLinkOA{
        color: #0072A3;
        text-decoration: none;
    }
    #areaPermiso .estiloLinkOA:hover{
        color: #003952;
    }
    #areaPermiso .anchoNotificaciones{
        display:inline-block;
        width: 550px;
    }

</style>