
<div id="contenedorOA">
<!--    <input id="oculto" type="text" value="" >-->
    <b> <?= $labelOrderBy ?>: </b><select id='criterioOrder'>
        <option <?php if ($order == 'author') echo "selected='selected'" ?> value='author'><?= $author ?></option>
        <option <?php if ($order == 'insertiondate') echo "selected='selected'" ?>value='insertiondate'><?= $date ?></option>
        <option <?php if ($order == 'title') echo "selected='selected'" ?>value='title'><?= $title2 ?></option>
        <option <?php if ($order == 'valoration') echo "selected='selected'" ?>value='valoration'><?= $rating ?></option>
    </select>
    <div id="areasubcategoria" class="categor paletaColor1Fondo">   <?php echo $path ?> <span id='totalOA'> <?php echo $totalOA ?></span></div>
    <table id='tablaOA'>
        <?php
        if ($objetos != "") {
            $i = 0;
            foreach ($objetos as $objeto => $datos) {
                $valoracion = "<span class='cursor' id='e$objeto'>";
                for ($j = 1; $j <= 10; $j++) {
                    $ispar = ($j % 2 == 0) ? 1 : 0;
                    if ($ispar == 1) {
                        if ($j <= $datos['valoracion']) {
                            $valoracion .= "<span class='star derP' n='$j' idlo='$objeto' ></span>";
                        } else {
                            $valoracion .= "<span class='star der' n='$j' idlo='$objeto' ></span>";
                        }
                    } else {
                        if ($j <= $datos['valoracion']) {
                            $valoracion .= "<span class='star izqP' n='$j' idlo='$objeto' ></span>";
                        } else {
                            $valoracion .= "<span class='star izq' n='$j' idlo='$objeto' ></span>";
                        }
                    }
                }

                $valoracion .= " <a href='main.php?action=rateComments&idOA=$objeto' class='contadorVotos link'>(" . $datos['totalVotos'] . " $votes) </a></span>";

                $informacionOculta = "";
                if ($datos["identificador"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>Catálogo - Entrada:</label>" . $datos['identificador'] . "</div>";
                }
                if ($datos["language"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>Idioma:</label>" . $datos['language'] . "</div>";
                }
                if ($datos["ambito"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>Ámbito:</label>" . $datos['ambito'] . "</div>";
                }
                if ($datos["estructura"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>Estructura:</label>" . $datos['estructura'] . "</div>";
                }
                if ($datos["aggregationLevel"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>Nivel de Agregación:</label>" . $datos['aggregationLevel'] . "</div>";
                }
                if ($datos["tamano"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>$size2:</label>" . $datos['tamano'] . "</div>";
                }
                if ($datos["location"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>$location2:</label>" . $datos['location'] . "</div>";
                }
                if ($datos["interactivityType"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>Tipo de Interactividad:</label>" . $datos['interactivityType'] . "</div>";
                }
                if ($datos["learningResourceType"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>Tipo de Recurso Educativo:</label>" . $datos['learningResourceType'] . "</div>";
                }
                if ($datos["educationalDescription"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label> Descripción del Uso Educativo:</label><ul>" . $datos['educationalDescription'] . "</ul></div>";
                }
                if ($datos["costo"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>Costo:</label>" . $datos['costo'] . "</div>";
                }
                if ($datos["derechosAutor"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>Derechos de Autor y otras Restricciones:</label>" . $datos['derechosAutor'] . "</div>";
                }
                if (isset($_SESSION["iduser_roap"])) {
                    $opciones = " <a class='downloadOaimg' idlo='$objeto'  title='$download' href='" . $datos["rutaAbsoluta"] . "'></a>
                                  <a class='exportarOaimg'  href='control/exportarOa/export.php?idlo=$objeto' title='$export'></a>
                                  <a class='cambiarColeccionOA' nombreOA='" . $datos['title'] . "' idlo='$objeto' title='$changeCollection'></a>
                                  <a  class='editarOaimg'  idlo='$objeto' title='$edit'></a>
                                  <a class='borrarOaimg' idlo='$objeto' title='$delete'></a>";
                } else {
                    $opciones = "<a class='downloadOaimg'  idlo='$objeto'  title='$download' href='" . $datos["rutaAbsoluta"] . "'></a>
                                 <a class='exportarOaimg' href='control/exportarOa/export.php?idlo=$objeto' title='$export'></a>
                                 <a class='cambiarColeccionOA'  nombreOA='" . $datos['title'] . "' idlo='$objeto' title='$changeCollection'></a>";
                }

                echo "<tr>
                      <td>
                     <div class='filaTabla'> <label>$title2:</label>   <a class='linkTitulo link' target='_blank' title='Descargar este Objeto de Aprendizaje' href='" . $datos["rutaAbsoluta"] . "' idlo='$objeto'>" . $datos['title'] . "</a> </div>";
                if ($datos['ubicacion'] != "") {
                    echo "<div class='filaTabla'> <label>$ubiety:</label>" . $datos['ubicacion'] . "</div>";
                }
                if ($datos['description'] != "") {
                    echo "<div class='filaTabla'> <label>Descripcion:</label><ul>" . $datos['description'] . "</ul> </div>";
                }
                if ($datos['keyword'] != "") {
                    echo "<div class='filaTabla'> <label>Palabras Clave:</label>" . $datos['keyword'] . "</div>";
                }
                if ($datos['format'] != "") {
                    echo "<div class='filaTabla'> <label>$format2:</label>" . $datos['format'] . "</div>";
                }
                echo "<input class='verInformacionOculta defaultButton floatRigth' type='button' i='$i' value='$seeMore'/>";
                if (isset($_SESSION["iduser_roap"])) {
                    echo "<label idlo='$objeto' class='reportarObjeto link'>[$reportOA]</label>";
                }
                if ($datos["completitud"] == -1) {
                    $anchoCompletitud = 0;
                    $datos["completitud"] = $notApply;
                } else {
                    $anchoCompletitud = $datos["completitud"];
                    $datos["completitud"] = $datos["completitud"] . "%";
                }
                if ($datos["consistencia"] == -1) {
                    $anchoConsistencia = 0;
                    $datos["consistencia"] = $notApply;
                } else {
                    $anchoConsistencia = $datos["consistencia"];
                    $datos["consistencia"] = $datos["consistencia"] . "%";
                }
                if ($datos["coherencia"] == -1) {
                    $anchoCoherencia = 0;
                    $datos["coherencia"] = $notApply;
                } else {
                    $anchoCoherencia = $datos["coherencia"];
                    $datos["coherencia"] = $datos["coherencia"] . "%";
                }
                echo "<div id='informacionOculta$i' class='informacionOculta'>$informacionOculta</div> 
                             </td>
                              <td class='columna2'>
                              <div class='filaTabla'> <label> $uploadedBy:</label>" . $datos['uploadBy'] . "</div>
                              <div class='filaTabla'> <label> $uploadedDate:</label>" . $datos['insertionDate'] . "</div>
                              <div class='filaTabla'><label> $rating:</label>$valoracion</div>
                              <div class='filaTabla'><label class='labelMetrica'> $metadataQuality:</label><div class='contenedorMetricas'><a title='$completeness: " . $datos["completitud"] . "' class='bordeMetricas bordeCompletitud' ><div  class='metricaCompletitud' style='width:" . $anchoCompletitud . "px;'></div></a> <a title='$consistence: " . $datos["consistencia"] . "' class='bordeMetricas bordeConsistencia' > <div  class='metricaConsistencia' style='width:" . $anchoConsistencia . "px;'></div></a>        <a title='$coherence: " . $datos["coherencia"] . "' class='bordeMetricas bordeCoherencia' >  <div  class='metricaCoherencia' style='width:" . $anchoCoherencia . "px;'></div></a></div></div>                              
                              <div class='filaTabla'><label>$options:</label> $opciones</div>
                              <div class='filaTabla'><label>$downloads:</label> <a href='main.php?action=downloadHistory&idOA=$objeto' class='link linkHistorialDescargas'>".$datos['cantidadDescargas']."</a></div>
                         </td>
                        </tr>";
                $i++;
            }
        }
        ?>
    </table>
    <div id="botonesNavegacion">
        <a id="primero" button="primero" title="<?= $first?>"></a>
        <a id="anteriores" button="anteriores" title="<?= $previous100 ?>"></a>
        <a id="anterior" button="anterior" title="<?= $previous ?>"></a>
        <span id="posicion" from="<?php echo $from ?>"  pos="<?php echo $pos ?>" totalOAHide="<?php echo $totalOAHide[0] ?>" order="<?php echo $order ?>" idc="<?php echo $idC; ?>" path="<?php echo $path; ?>"><?php
        $aux1 = $pos + 1;
        $aux2 = $pos + 10;
        echo "$aux1-$aux2"
        ?> </span>
        <a id="siguiente"  button="siguiente" title="<?= $next ?>"></a>
        <a id="siguientes" button="siguientes" title="<?= $next100 ?>"></a>
        <a id="ultimo" button="ultimo" title="<?= $last?>"></a>
    </div>
</div>
