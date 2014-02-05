
<div class="cabecera2 gradiente areas" id="area2">
    <!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">-->
    <!--    <head>-->
    <script type="text/javascript" src="../js/codigojsadmin.js"></script>
    <link rel="stylesheet" href="../css/estiloadmin.css"/>
    <!--    </head>-->
    <!--    <body>-->

    <div id="encabezado"><div class="encabezado2">
            <?= $textRequiredFields ?>.<br/>
        </div></div>
    <form name="form1" id="formularioadmin" method="post" action="">
        <!--General-->
        <fieldset class="nivel categoria"><legend><?= $general ?></legend>
            <br/>
            <fieldset class="nivel"><legend><?= $identifier ?></legend>
                <span><?= $catalog ?>:
                    <input type="checkbox" name="checkbox1" id="generalCatalog"/>
                </span>
                <span><?= $entry ?>:
                    <input type="checkbox" name="checkbox2" id="generalEntry"/>
                </span>
            </fieldset>
            <span><?= $title2 ?>:
                <input type="checkbox" cheked="cheked" name="checkbox3" id="generalTitle" disabled/>
            </span>
            <span><?= $language ?>:
                <input type="checkbox" name="checkbox4" id="generalLanguage"/>
            </span>
            <span><?= $description ?>: 
                <input type="checkbox" name="checkbox5" id="generalDescription"/>
            </span>
            <span><?= $keywords ?>:
                <input type="checkbox" name="checkbox6" id="generalKeyword"/>
            </span>
            <span><?= $coverage ?>:
                <input type="checkbox" name="checkbox7" id="generalCoverage"/>
            </span>
            <span><?= $structure ?>:
                <input type="checkbox" name="checkbox8" id="generalStructure"/>
            </span>
            <span><?= $aggregationLevel ?>:
                <input type="checkbox" name="checkbox9" id="generalAggregationLevel"/>
            </span>
        </fieldset>

        <!--Life Cycle-->
        <fieldset class="nivel categoria"><legend><?= $lifeCycle ?></legend>
            <span><?= $version ?>:
                <input type="checkbox" name="checkbox10" id="lifeCycleVersion"/>
            </span>
            <span><?= $status ?>:
                <input type="checkbox" name="checkbox11" id="lifeCycleStatus"/>
            </span>
            <fieldset class="nivel"><legend><?= $contribution ?></legend>
                <span><?= $role ?>:
                    <input type="checkbox" name="checkbox12" id="lifeCycleRole"/>
                </span>
                <span><?= $entity ?>:
                    <input type="checkbox" name="checkbox13" id="lifeCycleEntity"/>
                </span>
                <span><?= $date ?>:
                    <input type="checkbox" name="checkbox14" id="lifeCycleDate"/>
                </span>
            </fieldset>
        </fieldset>

        <!--Meta-Metadata-->
        <fieldset class="nivel categoria"><legend><?= $metaMetadata ?></legend>
            <br/>
            <fieldset class="nivel"><legend><?= $identifier ?></legend>
                <span<?= $catalog ?>:
                    <input type="checkbox" name="checkbox15" id="metaMetadataCatalog"/>
                </span>
                <span><?= $entry ?>:
                    <input type="checkbox" name="checkbox16" id="metaMetadataEntry"/>
                </span>
            </fieldset>
            <fieldset class="nivel"><legend><?= $contribution ?></legend>
                <span><?= $role ?>:
                    <input type="checkbox" name="checkbox17" id="metaMetadataRole"/>
                </span>
                <span><?= $entity ?>:
                    <input type="checkbox" name="checkbox18" id="metaMetadataEntity"/>
                </span>
                <span><?= $date ?>:
                    <input type="checkbox" name="checkbox19" id="metaMetadataDate"/>
                </span>
            </fieldset>
            <span><?= $metadataSchema ?>:
                <input type="checkbox" name="checkbox20" id="metaMetadataMetadataSchema"/>
            </span>
            <span><?= $language ?>:
                <input type="checkbox" name="checkbox21" id="metaMetadataLanguage"/>
            </span>
        </fieldset>

        <!--Technical-->
        <fieldset class="nivel categoria"><legend><?= $technical ?></legend>
            <span><?= $format2 ?>:
                <input type="checkbox" name="checkbox22" id="technicalFormat"/>
            </span>
            <span><?= $size2 ?>:
                <input type="checkbox" name="checkbox23" id="technicalSize"/>
            </span>
            <span><?= $location2 ?>:
                <input type="checkbox" name="checkbox24" id="technicalLocation"/>
            </span>
            <fieldset class="nivel"><legend><?= $requirements ?></legend>
                <fieldset class="nivel"><legend><?= $composition ?></legend>
                    <span><?= $type ?>:
                        <input type="checkbox" name="checkbox25" id="technicalType"/>
                    </span>
                    <span><?= $name ?>:
                        <input type="checkbox" name="checkbox26" id="technicalName"/>
                    </span>
                    <span><?= $minimumVersion ?>:
                        <input type="checkbox" name="checkbox27" id="technicalMinimumVersion"/>
                    </span>
                    <span><?= $maximumVersion ?>:
                        <input type="checkbox" name="checkbox28" id="technicalMaximumVersion"/>
                    </span>
                </fieldset>
            </fieldset>
            <span><?= $installationRemarks ?>:
                <input type="checkbox" name="checkbox29" id="technicalInstallationRemarks"/>
            </span>
            <span><?= $otherPlatformRequirements ?>:
                <input type="checkbox" name="checkbox30" id="technicalOtherPlatformRequirements"/>
            </span>
            <span><?= $duration ?>:
                <input type="checkbox" name="checkbox31" id="technicalDuration"/>
            </span>                  
        </fieldset>

        <!--Educational-->
        <fieldset class="nivel categoria"><legend><?= $educational ?></legend>
            <span><?= $interactivityType ?>:
                <input type="checkbox" name="checkbox32" id="educationalInteractivityType"/>
            </span>
            <span><?= $learningResourceType ?>:
                <input type="checkbox" name="checkbox33" id="educationalLearningResourceType"/>
            </span>
            <span><?= $interactivityLevel ?>:
                <input type="checkbox" name="checkbox34" id="educationalInteractivityLevel"/>
            </span>
            <span><?= $semanticDensity ?>:
                <input type="checkbox" name="checkbox35" id="educationalSemanticDensity"/>
            </span>
            <span><?= $intendedEndUserRole ?>:
                <input type="checkbox" name="checkbox36" id="educationalIntendedEndUserRole"/>
            </span>
            <span><?= $context ?>:
                <input type="checkbox" name="checkbox37" id="educationalContext"/>
            </span>
            <span><?= $typicalAgeRange ?>:
                <input type="checkbox" name="checkbox38" id="educationalTypicalAgeRange"/>
            </span>
            <span><?= $difficulty ?>:
                <input type="checkbox" name="checkbox39" id="educationalDifficulty"/>
            </span>
            <span><?= $typicalLearningTime ?>:
                <input type="checkbox" name="checkbox40" id="educationalTypicalLearningTime"/>
            </span>
            <span><?= $description ?>:
                <input type="checkbox" name="checkbox41" id="educationalDescription"/>
            </span>
            <span><?= $language ?>:
                <input type="checkbox" name="checkbox42" id="educationalLanguage"/>
            </span>   
        </fieldset>

        <!--Rights-->
        <fieldset class="nivel categoria"><legend><?= $rights ?></legend>
            <span><?= $cost ?>:
                <input type="checkbox" name="checkbox43" id="rightsCost"/>
            </span>
            <span><?= $copyrightAndOtherRestrictions ?>:
                <input type="checkbox" name="checkbox44" id="rightsCopyrightandOtherRestrictions"/>
            </span>
            <span><?= $description ?>:
                <input type="checkbox" name="checkbox45" id="rightsDescription"/>
            </span>
        </fieldset>

        <!--Relation-->
        <fieldset class="nivel categoria"><legend>Relación</legend>
            <span><?= $kind ?>:
                <input type="checkbox" name="checkbox46" id="relationKind"/>
            </span>                 
            <fieldset class="nivel"><legend><?= $resource ?></legend>
                <fieldset class="nivel"><legend><?= $identifier ?></legend>
                    <span><?= $catalog ?>:
                        <input type="checkbox" name="checkbox47" id="relationCatalog"/>
                    </span>
                    <span><?= $entry ?>:
                        <input type="checkbox" name="checkbox48" id="relationEntry"/>
                    </span>

                </fieldset>
                <span><?= $description ?>:
                    <input type="checkbox" name="checkbox49" id="relationDescription"/>
                </span>
            </fieldset>               
        </fieldset>

        <!--Annotation-->
        <fieldset class="nivel categoria"><legend><?= $annotation ?></legend>
            <span><?= $entity ?>:
                <input type="checkbox" name="checkbox50" id="annotationEntity"/>
            </span>
            <span><?= $date ?>:
                <input type="checkbox" name="checkbox51" id="annotationDate"/>
            </span>
            <span><?= $description ?>:
                <input type="checkbox" name="checkbox52" id="annotationDescription"/>
            </span>
        </fieldset>

        <!--Classification-->
        <fieldset class="nivel categoria"><legend><?= $classification ?></legend>
            <span><?= $purpose ?>:
                <input type="checkbox" name="checkbox53" id="classificationPurpose"/>
            </span>
            <fieldset class="nivel"><legend><?= $taxonomicRoute ?></legend>
                <span><?= $source ?>:
                    <input type="checkbox" name="checkbox54" id="classificationSource"/>
                </span>
                <fieldset class="nivel"><legend>Taxón</legend>
                   <!-- <span>Taxon:
                        <input type="checkbox" name="checkbox55" id="classificationTaxon"/>
                    </span>
                    <span>Id:
                        <input type="checkbox" name="checkbox56" id="classificationId"/>
                    </span>-->
                    <span><?= $entry ?>:
                        <input type="checkbox" name="checkbox57" id="classificationEntry"/>
                    </span>
                </fieldset>
            </fieldset>  
            <span><?= $description ?>:
                <input type="checkbox" name="checkbox58" id="classificationDescription"/>
            </span>
            <span>Palabra Clave:
                <input type="checkbox" name="checkbox59" id="classificationKeyword"/>
            </span>
        </fieldset>
        <br/>
        <br/>
        <br/>
        <div id="save"> <!--botton enviar el formulario-->
            <input id="enviar" name="submit" title="<?= $save ?>" type="submit" class="submit pointer" value=""/>
        </div>
        <br/>
        <br/>	
    </form>
</div>
<!--    </body>
</html>-->

<!--Cargar lso campos o en la interfaz de administrador-->
<?php
$archivo = fopen('../campos.txt', 'r') or die('Error al abrir el archivo');
$x = 1;
$a = (fgets($archivo));
fclose($archivo);
$array = (explode(",", $a));
$limite = sizeof($array);

echo "
			<script type='text/javascript'>	
			$('input').removeAttr('checked');  
                        $('#generalTitle').attr('checked','checked');
			</script>";
if (isset($array[1])) {
    for ($j = 1; $j < $limite; $j++) {
        echo "
			<script type='text/javascript'>	
			$('#" . $array[$j] . "').attr('checked','checked');	
			</script>";
    }
}
?> 
