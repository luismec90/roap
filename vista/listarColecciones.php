<div id="listarColecciones">
    <?php
    $c = conector_pg::getInstance();
    $result = $c->realizarOperacion("select idCollection,name from collection order by name");
    echo " <br/><label id='tituloListarColecciones'>$collectionsTree</label><br/><br/>";
    echo "<table id='tablaListarColecciones'>";
    while ($row = pg_fetch_array($result)) {
        $howmany = $c->realizarOperacion("select count(*) from (select * from collection c, subcollection s , lo l where c.idcollection=s.idcollection and s.idsubcollection=l.idsubcollection and c.idCollection=" . $row[0] . " and idlo not in(select idlo from pending where type=7))t");
        $rower = pg_fetch_array($howmany);
        //el count de la categoria
        // $howmany1 = $c->realizarOperacion("select count(*) from (select * from collection c, subcollection s , lo l where c.idcollection=s.idcollection and s.idsubcollection=l.idsubcollection and c.idCollection=" . $row[0] . " and  s.name='$row[1]' AND l.idlo not in(select idlo from pending where type=7))t");
        //$rower1 = pg_fetch_array($howmany1);
        //--
        $r3 = $c->realizarOperacion("select idsubcollection from subcollection where name= '$row[1]'");
        $rower3 = pg_fetch_array($r3);
        $result2 = $c->realizarOperacion("select idSubcollection,name from subcollection where idCollection= $row[0] order by name");

        echo "<tr class='marginTop'><td><span id='$rower3[0]' idC='$rower3[0]' class='triangulo trianguloDown'></span></td><td><a id='c$rower3[0]' href='main.php?action=viewCollection&idC=$rower3[0]&path=$row[1]&aC=$rower3[0]' title='$row[1]' class='categorias link' val='$rower3[0]' value='$row[1]'>$row[1]<label class='info'>($rower[0])</label> </a></td></tr>";

        while ($r = pg_fetch_array($result2)) {
            $howmany2 = $c->realizarOperacion("select count(*) from (select * from subcollection s , lo l where s.idsubcollection=l.idsubcollection and s.idCollection=" . $row[0] . " and l.idsubcollection=$r[0] and idlo not in(select idlo from pending where type=7))t");
            while ($rower2 = pg_fetch_array($howmany2)) {
                echo "<tr class='lsubcolecciones l$rower3[0]'><td></td>";
                if ($row[1] != $r[1])
                    echo "<td class='sinEspacios'><a class='subcategorias link' title='$r[1]' href='main.php?action=viewCollection&idC=$r[0]&path=$row[1]/$r[1]&aC=$rower3[0]' val='$r[0]' colection='$row[1]' value='$r[1]'><label class='naranja'>- </label>" . $r[1] . "<label class='info'>($rower2[0])</label></a></td>";
                echo "</tr>";
            }
        }
        echo "</td></tr><tr class='espacioEntreColecciones'><td></td><td></td></tr>";
    }
    echo "</table>";
    ?>
</div>
<?php
$totalOA = $c->realizarOperacion("select count(*) from lo where idlo not in (select idlo from pending where type=7)");
$totalOA = pg_fetch_array($totalOA);
$totalUsuarios = $c->realizarOperacion("select count(*) from users");
$totalUsuarios = pg_fetch_array($totalUsuarios);
?>
<div id="cantidad_OA_Usuarios">
    <div><label><b><?= $generalInformation ?></b></label></div>
    <div><label><?= $indexedObjects ?>:</label><span><?php echo $totalOA[0]; ?></span></div>
    <div><label><?= $registeredUsers ?>:</label><span><?php echo $totalUsuarios[0]; ?></span></div>
</div>
<style>

    /*    Panel Izquerdo*/
    #tituloListarColecciones{
        font-weight: bold;
        margin-left: auto;
        margin-right: auto;
        color: #333;
        font-size: 16px;
        font-weight: bold;
        text-shadow: 0 -1px rgba(0, 0, 0, 0.2);
        padding: 0.5em;

    }

    #listarColecciones{ 
        float:left;
        width:200px;  
        height: 450px;
        background: #FFFFEA;
        border-radius: 5px 5px 5px 5px;
        box-shadow: 0 1px 0 rgba(255, 255, 255, 0.4) inset, 0 -3px 0 rgba(0, 0, 0, 0.3) inset, 0 0 10px rgba(255, 255, 255, 0.3) inset, 0 2px 4px rgba(0, 0, 0, 0.2);
        overflow:auto;
        padding-bottom: 1em;
    } /*
    #filaColecciones{
        clear:both;
        margin-top: 0.5em;
        overflow: hidden;
    }
/*    .lsubcolecciones{
        clear:both;
    }
    */    #listarColecciones a{ 
        text-decoration: none;
    }/*
    #listarColecciones,body,html{
        margin:0px;
        height:80%;
    }*/
    #listarColecciones .categorias{
        cursor:pointer;
        font-weight: bold;
        font: 1.2em Tahoma, sans-serif;
        width: 180px;
        font-weight: bold;

    }
    #listarColecciones .triangulo:hover{
        cursor:pointer;
        opacity: .8;
        -moz-opacity: .8;
        filter:alpha(opacity=70);

    } 
    #listarColecciones .trianguloRigth{
        float:left;
        width: 0;
        height: 0;
        border-top: 5px solid transparent;
        border-left: 10px solid #333;
        border-bottom: 5px solid transparent;
        margin: 0 .4em 0 0.2em; 
    }


    #listarColecciones .trianguloDown{
        float:left;
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 10px solid #333;
        margin: 0 .4em 0 0.2em; 
    }
    #tablaListarColecciones{

        border-spacing: 0;
    } 
    #tablaListarColecciones .marginTop{
        padding:2em !important;
        /*       background: yellow;*/
    }
    #tablaListarColecciones .espacioEntreColecciones{
        height: 7px;
    }

    #listarColecciones .naranja{
        display: block;
        float:left;
        margin-left: -0.5em;
    }
    #listarColecciones .subcategorias{
        cursor:pointer;
        font: 1em;
        display: block;
        float:left;
        vertical-align: top;
        padding-left:0.5em;
    }
    #listarColecciones .sinEspacios{
        border-left: 1px solid #333;
    }

    #listarColecciones .subcategorias:hover, #listarColecciones .categorias:hover {
        color:black;
    }
    /*
    #listarColecciones .espacioentrecolecciones{
        clear:both; 
        height: 10px;
    }
    #listarColecciones .espacioentresubcolecciones{
        clear:both; 

    }
    */
    #listarColecciones .info {
        margin-left: 0.3em;
        color: #333;
          font-weight: normal;
    }

    #cantidad_OA_Usuarios{
        margin-top: 1em;
        float:left;
        width:198px;  
        background: #FFFFEA;
        background: url("vista/img/se2.png") no-repeat scroll center bottom #FFFCE4;
        border-radius: 5px 5px 5px 5px;
        box-shadow: 0 1px 0 rgba(255, 255, 255, 0.4) inset, 0 -3px 0 rgba(0, 0, 0, 0.3) inset, 0 0 10px rgba(255, 255, 255, 0.3) inset, 0 2px 4px rgba(0, 0, 0, 0.2);
        overflow:auto;
        clear:both;
        height: 70px;
        margin-left: 0.1em;
    }
    #cantidad_OA_Usuarios div{
        /*        font-weight: bold;
                margin-left: auto;
                margin-right: auto;
                color: #0072A3;
                font-size: 14px;
                font-weight: bold;
                padding: 11px 0 14px;
                text-shadow: 0 -1px rgba(0, 0, 0, 0.2);
                padding: 1em;*/
        padding:0.2em 0 0 1em;
    }
    #cantidad_OA_Usuarios span{
        color: #222;
        margin-left:0.5em;
    }

</style>