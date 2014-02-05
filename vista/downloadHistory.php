<div id="aresRAteComments"> 
    <?php
    if (!empty($_GET["idOA"])) {
        $hoy = date('Y-m-d');
        if (!empty($_GET["desde"])) {

            switch ($_GET["desde"]) {
                case "10":
                    $desde = "10";
                    $nuevafecha = strtotime('-10 day', strtotime($hoy));
                    break;
                case "30":
                    $desde = "30";
                    $nuevafecha = strtotime('-30 day', strtotime($hoy));
                    break;
                case "90":
                    $desde = "90";
                    $nuevafecha = strtotime('-90 day', strtotime($hoy));
                    break;
                case "siempre":
                    $desde = "siempre";
                    break;
                default:
                    $desde = "10";
                    $nuevafecha = strtotime('-10 day', strtotime($hoy));
                    break;
            }
        } else {
            $desde = "10";
            $nuevafecha = strtotime('-10 day', strtotime($hoy));
        }

        if ($desde == "siempre") {
            $desde = "siempre";
            $fecha = "";
        } else {
            $fecha = date('Y-m-j', $nuevafecha);
            $fecha = "AND date > '" . $fecha . " 00:00:00.000-05'";
        }


        $idlo = $_GET["idOA"];
        //echo "SELECT * FROM download WHERE idlo='$idlo' $fecha";
        $res = $c->realizarOperacion("SELECT * FROM download WHERE idlo='$idlo' $fecha");
        $cantidadDescargas = pg_fetch_array($c->contarDownload($idlo, $fecha));
        $cantidadDescargas = $cantidadDescargas[0];
        $n = pg_num_rows($res);
        if ($n > 0) {
            $titulo = pg_fetch_array($c->getGeneralTitle($_GET["idOA"]));
            echo "<div id='commentNombreOA'><label>$learningObject:</label> <a id='commentLinkOA' href='control/download.php?id=$idlo'>$titulo[0]</a></div>";
            $history = $c->historyDownload($idlo,$fecha);
            ?>
            <div id="contenedorHistorial">

                <b> <?= $from ?>: </b><select id='fechaOrderDownload' data-oa="<?php echo $_GET["idOA"]; ?>">
                    <option <?php if ($desde == "10") echo "selected='selected'" ?> value='10'>10 <?= $days ?></option>
                    <option <?php if ($desde == "30") echo "selected='selected'" ?>value='30'>30 <?= $days ?></option>
                    <option <?php if ($desde == "90") echo "selected='selected'" ?>value='90'>90 <?= $days ?></option>
                    <option <?php if ($desde == "siempre") echo "selected='selected'" ?>value='siempre'><?= $always ?></option>
                </select>
                <br><br>

                <div id="headerTabla" class="paletaColor1Fondo"><span class="pais"><b><?= $country ?></b></span> <span class="descarga"><b><?= $graphPercent ?></b></span><span class="cantidadDescarga"> <b><?= $amount ?></b></span></div>
                <?php
                while ($row = pg_fetch_array($history)) {
                    $porcentaje = round(($row[0] / $cantidadDescargas) * 100, 1);
                    $porcentajePixeles = round(($row[0] / $cantidadDescargas) * 400);
                    ?> 
                    <div class="registro"><span class="pais"><a title="<?php echo $row[1] ?>"><?php echo $row[1] ?></a></span><span class="descarga"><a title="<?php echo $porcentaje ?>%"class="barraDescarga" style="width:<?php echo $porcentajePixeles ?>px"></a></span><span class="cantidadDescarga"><?php echo $row[0] ?></span> </div>
                <?php } ?>
                <div class="registro"><span class="pais"><b></b></span> <span id="totalText"class="descarga"><b><?= $numberOfDownloads ?>:</b></span><span class="cantidadDescarga"><b><?php echo $cantidadDescargas ?></b></span></div>
            </div> <?php
        } else {
            echo "<div id='noHaveDownloads'>Este obejeto de aprendizaje aún no ha sido descargado.";
        }
    } else {
        
    }
    ?>


</div>
<style>
    #commentNombreOA {
        text-align: center;
        font-size: 1.7em;
    }
    #commentLinkOA{
        color: #0A6380;
        text-decoration: none;
    }
    #commentLinkOA:hover{
        color:black;
    }
    #aresRAteComments{
        width: 80%;
        background: #EBEBEB;
        margin-left: auto;
        margin-right: auto;
        min-height:90%;
        padding: 1em;
        min-height: 400px;
        color: #333;
        -webkit-box-shadow: 0 0 5px 1px #C7C7C7;
        -moz-box-shadow: 0 0 5px 1px #c7c7c7;
        box-shadow: 0 0 5px 1px #C7C7C7;
        background: white;
    }
    #contenedorHistorial{
        margin-top: 1em;
        width: 700px;
        margin-left: auto;
        margin-right: auto;

    }
    #totalText{
        text-align: right;
    }
    #contenedorHistorial>div.registro {
        font-size: 14px;
        line-height: 42px;
        padding-left: 20px;
        border-bottom: 1px solid #ebebeb;
        border-top: 1px solid #fff;
        text-shadow: 1px 1px rgba(255,255,255,0.3);
        border-left:1px solid #f6f6f6;
        border-right:1px solid #f6f6f6;
    }
    #contenedorHistorial div.registro:nth-child(odd) {
        background: #f6f6f6;
        border-left:1px solid #f6f6f6;
        border-right:1px solid #f6f6f6;
    }
    #contenedorHistorial .pais{
        width: 150px;
        display: inline-block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        float:left;
    }
    #contenedorHistorial .cantidadDescarga{
        display: inline-block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-left: 1em;
   float:left;
    }

    #headerTabla{

        font-size: 14px;
        line-height: 42px;
        padding-left: 20px;
        -moz-border-radius: 6px 6px  0 0;
        -webkit-border-radius:  6px 6px  0 0;
        border-radius:  6px 6px  0 0;
        color:white;
        overflow: hidden;
    }
    #contenedorHistorial .descarga{
        width: 400px;
        display:inline-block;
        margin-left: 1em;
         float:left;
    }

    #contenedorHistorial .barraDescarga {
        display: inline-block;
        height: 20px;
        margin-bottom: -4px;
        background-color: #5eb95e;
        background-image: -moz-linear-gradient(top, #62c462, #57a957);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#62c462), to(#57a957));
        background-image: -webkit-linear-gradient(top, #62c462, #57a957);
        background-image: -o-linear-gradient(top, #62c462, #57a957);
        background-image: linear-gradient(to bottom, #62c462, #57a957);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff62c462', endColorstr='#ff57a957', GradientType=0);
        -moz-border-radius: 3px 3px;
        -webkit-border-radius:  3px 3px;
        border-radius: 3px 3px;
    }

    #noHaveDownloads{
        text-align: center;
        font-size: 1.7em;
        color:#1769FF;
    }
</style>