<?php

function generar_json($c, $idlo) {
    /* Almacenar resultadso en un array */
    $r = Array();
    /* cargar generalIdentifier */
    $result = $c->getGeneralIdentifier($idlo);
    $i = 0;
    while ($row = pg_fetch_row($result)) {
        if ($i == 0) {
            $generalIdentifier[] = array("generalCatalog" => $row[0], "generalEntry" => $row[1]);
        } else {
            $generalIdentifier[] = array("generalCatalog" . $i => $row[0], "generalEntry" . $i => $row[1]);
        } $i++;
    }
    if (isset($generalIdentifier)) {
        $r["generalIdentifier"] = $generalIdentifier;
    }



    /* cargar generalTitle */
    $result = $c->getGeneralTitle($idlo);

    while ($row = pg_fetch_row($result)) {
        $generalTitle[0] = $row[0];
    }
    if (isset($generalTitle) && $generalTitle[0] != null) {
        $r["generalTitle"] = $generalTitle;
    }



    /* cargar generalLanguage */
    $i = 0;
    $result = $c->getGeneralLanguage($idlo);
    while ($row = pg_fetch_row($result)) {
        if ($i == 0) {
            $generalLanguage[] = array("generalLanguage" => $row[0]);
        } else {
            $generalLanguage[] = array("generalLanguage" . $i => $row[0]);
        }$i++;
    }
    if (isset($generalLanguage)) {
        $r["generalLanguage"] = $generalLanguage;
    }



    /* cargar generalDescription */
    $i = 0;
    $result = $c->getGeneralDescription($idlo);
    while ($row = pg_fetch_row($result)) {
        if ($i == 0) {
            $generalDescription[] = array("generalDescription" => $row[0]);
        } else {
            $generalDescription[] = array("generalDescription" . $i => $row[0]);
        }$i++;
    }
    if (isset($generalDescription)) {
        $r["generalDescription"] = $generalDescription;
    }



    /* cargar generalKeyword */
    $i = 0;
    $result = $c->getGeneralKeyword($idlo);
    while ($row = pg_fetch_row($result)) {
        if ($i == 0) {
            $generalKeyword[] = array("generalKeyword" => $row[0]);
        } else {
            $generalKeyword[] = array("generalKeyword" . $i => $row[0]);
        }$i++;
    }
    if (isset($generalKeyword)) {
        $r["generalKeyword"] = $generalKeyword;
    }


    /* cargar generalCoverage */
    $i = 0;
    $result = $c->getGeneralCoverage($idlo);
    while ($row = pg_fetch_row($result)) {
        if ($i == 0) {
            $generalCoverage[] = array("generalCoverage" => $row[0]);
        } else {
            $generalCoverage[] = array("generalCoverage" . $i => $row[0]);
        }$i++;
    }
    if (isset($generalCoverage)) {
        $r["generalCoverage"] = $generalCoverage;
    }



    /* cargar generalStructure */
    $result = $c->getGeneralStructure($idlo);
    while ($row = pg_fetch_row($result)) {
        $generalStructure[] = $row[0];
    }
    if (isset($generalStructure) && ($generalStructure[0] != null)) {
        $r["generalStructure"] = $generalStructure;
    }



    /* cargar generalAggregationLevel */
    $result = $c->getGeneralAggregationLevel($idlo);
    while ($row = pg_fetch_row($result)) {
        $generalAggregationLevel[] = $row[0];
    }
    if (isset($generalAggregationLevel) && ($generalAggregationLevel[0] != null)) {
        $r["generalAggregationLevel"] = $generalAggregationLevel;
    }


    /* cargar  lifeCycleVersion */
    $result = $c->getLifeCycleVersion($idlo);
    while ($row = pg_fetch_row($result)) {
        $lifeCycleVersion[] = $row[0];
    }
    if (isset($lifeCycleVersion) && ($lifeCycleVersion[0] != null)) {
        $r["lifeCycleVersion"] = $lifeCycleVersion;
    }

    $result = $c->getLifeCycleStatus($idlo);
    while ($row = pg_fetch_row($result)) {
        $lifeCycleStatus[] = $row[0];
    }
    if (isset($lifeCycleStatus) && ($lifeCycleStatus[0] != null)) {
        $r["lifeCycleStatus"] = $lifeCycleStatus;
    }

    /* cargar lifeCycleContribute */

    $result = $c->getLifeCycleContribute($idlo);
    $i = 0;
    while ($row = pg_fetch_row($result)) {
        //   echo "por k entro ".$row[0];
        $result2 = $c->getLifeCycleContribute_Entity($row[0]);

        unset($aux);
        $j = 0;
        $aux = "";
        while ($row2 = pg_fetch_row($result2)) {

            //     echo "       por k entro2 ".$row2[0];
            if ($j == 0 && $i == 0) {
                $aux[] = array("lifeCycleEntity" => $row2[0]);
            } else {
                $aux[] = array("lifeCycleEntity" . $i . "_" . $j => $row2[0]);
            }
            $j++;
        }
        if ($i == 0) {
            $lifeCycleContribute[] = array("lifeCycleRole" => $row[1], "lifeCycleEntity" => $aux, "lifeCycleDate" => $row[2]);
        } else {
            $lifeCycleContribute[] = array("lifeCycleRole" . $i . "_0" => $row[1], "lifeCycleEntity" => $aux, "lifeCycleDate" . $i . "_0" => $row[2]);
        } $i++;
    }
    if (isset($lifeCycleContribute)) {
        $r["lifeCycleContribute"] = $lifeCycleContribute;
    }

    /* cargar MetaMetadataIdentifier */
    $result = $c->getMetaMetadataIdentifier($idlo);
    $i = 0;
    while ($row = pg_fetch_row($result)) {
        if ($i == 0) {
            $metaMetadataIdentifier[] = array("metaMetadataCatalog" => $row[0], "metaMetadataEntry" => $row[1]);
        } else {
            $metaMetadataIdentifier[] = array("metaMetadataCatalog" . $i => $row[0], "metaMetadataEntry" . $i => $row[1]);
        } $i++;
    }
    if (isset($metaMetadataIdentifier)) {
        $r["metaMetadataIdentifier"] = $metaMetadataIdentifier;
    }

    /* cargar MetaMetadataContribute */
    $result = $c->getmetaMetadataContribute($idlo);
    $i = 0;
    while ($row = pg_fetch_row($result)) {

        $result2 = $c->metaMetadataContribute_Entity($row[0]);

        unset($aux);
        $j = 0;

        $aux = "";
        while ($row2 = pg_fetch_row($result2)) {
//        echo $row2[0];

            if ($j == 0 && $i == 0) {

                $aux[] = array("metaMetadataEntity" => $row2[0]);
            } else {
                $aux[] = array("metaMetadataEntity" . $i . "_" . $j => $row2[0]);
            }
            $j++;
        }

        if ($i == 0) {
            $metaMetadataContribute[] = array("metaMetadataRole" => $row[1], "metaMetadataEntity" => $aux, "metaMetadataDate" => $row[2]);
        } else {
            $metaMetadataContribute[] = array("metaMetadataRole" . $i . "_0" => $row[1], "metaMetadataEntity" => $aux, "metaMetadataDate" . $i . "_0" => $row[2]);
        } $i++;
    }
    if (isset($metaMetadataContribute)) {
        $r["metaMetadataContribute"] = $metaMetadataContribute;
    }


    /* cargar metaMetadataMetadataSchema */
    $i = 0;
    $result = $c->getMetaMetadataSchema($idlo);
    while ($row = pg_fetch_row($result)) {
        if ($i == 0) {
            $metaMetadataMetadataSchema[] = array("metaMetadataMetadataSchema" => $row[0]);
        } else {
            $metaMetadataMetadataSchema[] = array("metaMetadataMetadataSchema" . $i => $row[0]);
        }$i++;
    }
    if (isset($metaMetadataMetadataSchema)) {
        $r["metaMetadataMetadataSchema"] = $metaMetadataMetadataSchema;
    }


    /* cargar metaMetadataLanguage */
    $result = $c->getMetaMetadataLanguage($idlo);

    while ($row = pg_fetch_row($result)) {
        $metaMetadataLanguage[0] = $row[0];
    }
    if (isset($metaMetadataLanguage) && $metaMetadataLanguage[0] != null) {
        $r["metaMetadataLanguage"] = $metaMetadataLanguage;
    }


    /* cargar technicalFormat */
    $i = 0;
    $result = $c->getTechnicalFormat($idlo);
    while ($row = pg_fetch_row($result)) {
        if ($i == 0) {
            $technicalFormat[] = array("technicalFormat" => $row[0]);
        } else {
            $technicalFormat[] = array("technicalFormat" . $i => $row[0]);
        }$i++;
    }
    if (isset($technicalFormat)) {
        $r["technicalFormat"] = $technicalFormat;
    }


    /* cargar technicalSize */
    $result = $c->getTechnicalSize($idlo);

    while ($row = pg_fetch_row($result)) {
        $technicalSize[0] = $row[0];
    }
    if (isset($technicalSize) && $technicalSize[0] != null) {
        $r["technicalSize"] = $technicalSize;
    }


    /* cargar technicalLocation */
    $i = 0;
    $result = $c->gettechnicalLocation($idlo);
    while ($row = pg_fetch_row($result)) {
        if ($i == 0) {
            $technicalLocation[] = array("technicalLocation" => $row[0]);
        } else {
            $technicalLocation[] = array("technicalLocation" . $i => $row[0]);
        }$i++;
    }
    if (isset($technicalLocation)) {
        $r["technicalLocation"] = $technicalLocation;
    }

    /* Requirement */
    /* cargar TechnicalRequirement */
    $result = $c->getTechnicalRequirements($idlo);
    $i = 0;
    while ($row = pg_fetch_row($result)) {
        $result2 = $c->getTecnicalRequirements_orComposite($row[0]);
        unset($aux);
        $j = 0;
        while ($row2 = pg_fetch_row($result2)) {
            if ($j == 0 && $i == 0) {
                $aux[] = array("technicalType" => $row2[0], "technicalName" => $row2[1], "technicalMinimumVersion" => $row2[2], "technicalMaximumVersion" => $row2[3]);
            } else {
                $aux[] = array("technicalType" . $i . "_" . $j => $row2[0], "technicalName" . $i . "_" . $j => $row2[1], "technicalMinimumVersion" . $i . "_" . $j => $row2[2], "technicalMaximumVersion" . $i . "_" . $j => $row2[3]);
                //   $aux[] = array("metaMetadataOrComposite".$i."_".$j=>$row2[0]);
            }
            $j++;
        }

        if ($i == 0) {
            $technicalRequirement[] = array("technicalOrComposite" => $aux);
        } else {
            $technicalRequirement[] = array("technicalOrComposite" => $aux);
            //  $metaMetadataContribute[] = array("metaMetadataRole" . $i."_0" => $row[1],"metaMetadataEntity"=>$aux, "metaMetadataDate" . $i."_0"  => $row[2]);
        } $i++;
    }
    if (isset($technicalRequirement)) {
        $r["technicalRequirement"] = $technicalRequirement;
    }


    /* cargar technicalInstallationRemarks */
    $result = $c->getTechnicalInstallationRemarks($idlo);

    while ($row = pg_fetch_row($result)) {
        $technicalInstallationRemarks[0] = $row[0];
    }
    if (isset($technicalInstallationRemarks) && $technicalInstallationRemarks[0] != null) {
        $r["technicalInstallationRemarks"] = $technicalInstallationRemarks;
    }


    /* cargar technicalOtherPlatformRequirements */
    $result = $c->getTechnicalOtherPlataformsRequirements($idlo);

    while ($row = pg_fetch_row($result)) {
        $technicalOtherPlatformRequirements[0] = $row[0];
    }
    if (isset($technicalOtherPlatformRequirements) && $technicalOtherPlatformRequirements[0] != null) {
        $r["technicalOtherPlatformRequirements"] = $technicalOtherPlatformRequirements;
    }


    /* cargar technicalDuration */
    $result = $c->getTechnicalDuration($idlo);

    while ($row = pg_fetch_row($result)) {
        $technicalDuration[0] = $row[0];
    }
    if (isset($technicalDuration) && $technicalDuration[0] != null) {
        $r["technicalDuration"] = $technicalDuration;
    }


    /* cargar educationalInteractivityType */
    $result = $c->getEducationalInteractivityType($idlo);

    while ($row = pg_fetch_row($result)) {
        $educationalInteractivityType[0] = $row[0];
    }
    if (isset($educationalInteractivityType) && $educationalInteractivityType[0] != null) {
        $r["educationalInteractivityType"] = $educationalInteractivityType;
    }


    /* cargar educationalLearningResourceType */
    $i = 0;
    $result = $c->getEducationalLearningResourceType($idlo);
    while ($row = pg_fetch_row($result)) {
        if ($i == 0) {
            $educationalLearningResourceType[] = array("educationalLearningResourceType" => $row[0]);
        } else {
            $educationalLearningResourceType[] = array("educationalLearningResourceType" . $i => $row[0]);
        }$i++;
    }
    if (isset($educationalLearningResourceType)) {
        $r["educationalLearningResourceType"] = $educationalLearningResourceType;
    }


    /* cargar educationalInteractivityLevel */
    $result = $c->getEducationalInteractivityLevel($idlo);

    while ($row = pg_fetch_row($result)) {
        $educationalInteractivityLevel[0] = $row[0];
    }
    if (isset($educationalInteractivityLevel) && $educationalInteractivityLevel[0] != null) {
        $r["educationalInteractivityLevel"] = $educationalInteractivityLevel;
    }


    /* cargar educationalSemanticDensity */
    $result = $c->getEducationalSemanticDensity($idlo);

    while ($row = pg_fetch_row($result)) {
        $educationalSemanticDensity[0] = $row[0];
    }
    if (isset($educationalSemanticDensity) && $educationalSemanticDensity[0] != null) {
        $r["educationalSemanticDensity"] = $educationalSemanticDensity;
    }


    /* cargar educationalIntendedEndUserRole */
    $i = 0;
    $result = $c->getEducationalIntendedEndUserRole($idlo);
    while ($row = pg_fetch_row($result)) {
        if ($i == 0) {
            $educationalIntendedEndUserRole[] = array("educationalIntendedEndUserRole" => $row[0]);
        } else {
            $educationalIntendedEndUserRole[] = array("educationalIntendedEndUserRole" . $i => $row[0]);
        }$i++;
    }
    if (isset($educationalIntendedEndUserRole)) {
        $r["educationalIntendedEndUserRole"] = $educationalIntendedEndUserRole;
    }



    /* cargar educationalContext */
    $i = 0;
    $result = $c->getEducationalContext($idlo);
    while ($row = pg_fetch_row($result)) {
        if ($i == 0) {
            $educationalContext[] = array("educationalContext" => $row[0]);
        } else {
            $educationalContext[] = array("educationalContext" . $i => $row[0]);
        }$i++;
    }
    if (isset($educationalContext)) {
        $r["educationalContext"] = $educationalContext;
    }



    /* cargar educationalTypicalAgeRange */
    $i = 0;
    $result = $c->getEducationalTypicalAgeRange($idlo);
    while ($row = pg_fetch_row($result)) {
        if ($i == 0) {
            $educationalTypicalAgeRange[] = array("educationalTypicalAgeRange" => $row[0]);
        } else {
            $educationalTypicalAgeRange[] = array("educationalTypicalAgeRange" . $i => $row[0]);
        }$i++;
    }
    if (isset($educationalTypicalAgeRange)) {
        $r["educationalTypicalAgeRange"] = $educationalTypicalAgeRange;
    }




    /* cargar educationalDifficulty */
    $result = $c->getEducationalDifficulty($idlo);

    while ($row = pg_fetch_row($result)) {
        $educationalDifficulty[0] = $row[0];
    }
    if (isset($educationalDifficulty) && $educationalDifficulty[0] != null) {
        $r["educationalDifficulty"] = $educationalDifficulty;
    }


    /* cargar educationalTypicalLearningTime */
    $result = $c->getEducationalTypicalLearningTime($idlo);

    while ($row = pg_fetch_row($result)) {
        $educationalTypicalLearningTime[0] = $row[0];
    }
    if (isset($educationalTypicalLearningTime) && $educationalTypicalLearningTime[0] != null) {
        $r["educationalTypicalLearningTime"] = $educationalTypicalLearningTime;
    }


    /* cargar educationalDescription */
    $i = 0;
    $result = $c->getEducationalDescription($idlo);
    while ($row = pg_fetch_row($result)) {
        if ($i == 0) {
            $educationalDescription[] = array("educationalDescription" => $row[0]);
        } else {
            $educationalDescription[] = array("educationalDescription" . $i => $row[0]);
        }$i++;
    }
    if (isset($educationalDescription)) {
        $r["educationalDescription"] = $educationalDescription;
    }

///* cargar educationalCognitiveInformation */
//       $i = 0;
//    $result = $c->getEducationalCognitiveInformation($idlo);
//    while ($row = pg_fetch_row($result)) {
//        if ($i == 0) {
//            $educationalCognitiveInformation[] = array("educationalCognitiveInformation" => $row[0]);
//        } 
//    }
    if (isset($educationalDescription)) {
        $r["educationalDescription"] = $educationalDescription;
    }



    /* cargar educationalLanguage */
    $i = 0;
    $result = $c->getEducationalLanguage($idlo);
    while ($row = pg_fetch_row($result)) {
        if ($i == 0) {
            $educationalLanguage[] = array("educationalLanguage" => $row[0]);
        } else {
            $educationalLanguage[] = array("educationalLanguage" . $i => $row[0]);
        }$i++;
    }
    if (isset($educationalLanguage)) {
        $r["educationalLanguage"] = $educationalLanguage;
    }


    /* cargar rightsCost */
    $result = $c->getrightsCost($idlo);

    while ($row = pg_fetch_row($result)) {
        $rightsCost[0] = $row[0];
    }
    if (isset($rightsCost) && $rightsCost[0] != null) {
        $r["rightsCost"] = $rightsCost;
    }


    /* cargar rightsCopyrightandOtherRestrictions */
    $result = $c->getRightsCopyRightsAndOtherRestrictions($idlo);

    while ($row = pg_fetch_row($result)) {
        $rightsCopyrightandOtherRestrictions[0] = $row[0];
    }
    if (isset($rightsCopyrightandOtherRestrictions) && $rightsCopyrightandOtherRestrictions[0] != null) {
        $r["rightsCopyrightandOtherRestrictions"] = $rightsCopyrightandOtherRestrictions;
    }


    /* cargar rightsDescription */
    $result = $c->getRightsDescription($idlo);

    while ($row = pg_fetch_row($result)) {
        $rightsDescription[0] = $row[0];
    }
    if (isset($rightsDescription) && $rightsDescription[0] != null) {
        $r["rightsDescription"] = $rightsDescription;
    }




    /* cargar relationKind */
    $result = $c->getRelationKind($idlo);

    while ($row = pg_fetch_row($result)) {
        $relationKind[0] = $row[0];
    }
    if (isset($relationKind) && $relationKind[0] != null) {
        $r["relationKind"] = $relationKind;
    }




    /* cargar relationIdentifier */
    $result = $c->getRelationResourceIdentifier($idlo);
    $i = 0;
    while ($row = pg_fetch_row($result)) {

        if ($i == 0) {
            $relationIdentifier[] = array("relationCatalog" => $row[0], "relationEntry" => $row[1]);
        } else {
            $relationIdentifier[] = array("relationCatalog" . $i => $row[0], "relationEntry" . $i => $row[1]);
        } $i++;
    }
    if (isset($relationIdentifier)) {
        $r["relationIdentifier"] = $relationIdentifier;
    }


    /* cargar relationDescription */
    $result = $c->getRelationResourceDescription($idlo);
    $i = 0;
    while ($row = pg_fetch_row($result)) {

        if ($i == 0) {
            $relationDescription[] = array("relationDescription" => $row[0]);
        } else {
            $relationDescription[] = array("relationDescription" . $i => $row[0]);
        } $i++;
    }
    if (isset($relationDescription)) {
        $r["relationDescription"] = $relationDescription;
    }



    /* cargar annotationEntity */
    $result = $c->getannotationEntity($idlo);

    while ($row = pg_fetch_row($result)) {
        $annotationEntity[0] = $row[0];
    }
    if (isset($annotationEntity) && $annotationEntity[0] != null) {
        $r["annotationEntity"] = $annotationEntity;
    }


    /* cargar annotationDate */
    $result = $c->getannotationDate($idlo);

    while ($row = pg_fetch_row($result)) {
        $annotationDate[0] = $row[0];
    }
    if (isset($annotationDate) && $annotationDate[0] != null) {
        $r["annotationDate"] = $annotationDate;
    }


    /* cargar annotationDescription */
    $result = $c->getannotationDescription($idlo);

    while ($row = pg_fetch_row($result)) {
        $annotationDescription[0] = $row[0];
    }
    if (isset($annotationDescription) && $annotationDescription[0] != null) {
        $r["annotationDescription"] = $annotationDescription;
    }











    /* cargar classificationPurpose */
    $result = $c->getClassificationPurpose($idlo);
    while ($row = pg_fetch_row($result)) {
        $classificationPurpose[] = array($row[0]);
    }
    if (isset($classificationPurpose)) {
        $r["classificationPurpose"] = $classificationPurpose;
    }




    /* cargar classificationTazonPath */
//    $result = $c->getClassificationTaxonPath($idlo);
//    while ($row = pg_fetch_row($result)) {
//        echo $row[0] . " " . $row[1] . "<br/>";
//        $classificationTaxonPath[] = array($row[0]);
//    }
//    if (isset($classificationTaxonPath)) {
//        $r["$classificationTaxonPath"] = $classificationTaxonPath;
//    }
//    
    $result = $c->getClassificationTaxonPath($idlo);
    $i = 0;
    while ($row = pg_fetch_row($result)) {


        $result2 = $c->getClassificationTaxonPath_Taxon($row[0]);

        unset($aux);
        $j = 0;

        $aux = "";
        while ($row2 = pg_fetch_row($result2)) {

            if ($j == 0 && $i == 0) {

                $aux[] = array("classificationEntry" => $row2[0]);
                $aux[] = array("classificationId" => $row2[1]);
            } else {
                $aux[] = array("classificationEntry" . $i . "_" . $j => $row2[0]);
                $aux[] = array("classificationId" . $i . "_" . $j => $row2[1]);
            }
            $j++;
        }

        if ($i == 0) {
            $classificationTaxonPath[] = array("classificationSource" => $row[1], "classificationEntry" => $aux);
        } else {
            $classificationTaxonPath[] = array("classificationSource" . $i . "_0" => $row[1], "classificationEntry" => $aux);
        } $i++;
    }


    if (isset($classificationTaxonPath)) {
        $r["classificationTaxonPath"] = $classificationTaxonPath;
    }





    /* cargar educationalDescription */
    $result = $c->getClassificationDescription($idlo);
    while ($row = pg_fetch_row($result)) {
        $classificationDescription[] = array($row[0]);
    }
    if (isset($classificationDescription)) {
        $r["classificationDescription"] = $classificationDescription;
    }



    /* cargar educationalKeyword */
    $i = 0;
    $result = $c->getClassificationKeyword($idlo);
    while ($row = pg_fetch_row($result)) {
        if ($i == 0) {
            $classificationKeyword[] = array("classificationKeyword" => $row[0]);
        } else {
            $classificationKeyword[] = array("classificationKeyword" . $i => $row[0]);
        }$i++;
    }
    if (isset($classificationKeyword)) {
        $r["classificationKeyword"] = $classificationKeyword;
    }
    if ($idlo != -1 && !isset($_GET['tipo'])) {
        // eliminarIdlo($idlo);
    }
    return $r;
}

?>
