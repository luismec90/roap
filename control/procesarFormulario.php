<?php

session_start();

require ('../modelo/conexion.php');
require ('exportarOa/exportador.php');
extract($_POST);
$DEFAULT_VALUE = 'none';
$c = conector_pg::getInstance();
/////////////////////////////////
if ($_POST['idlo'] == -1) {
    $c->insertLO($_SESSION["subcollection_roap"], $_SESSION["iduser_roap"]);
    if ($_SESSION["ubicacion"] == "subir") {
        $file = "../uploads/" . $c->getLocation($c->lastValue2("lo", "idlo")) . $c->lastValue2("lo", "idlo") . "." . $_SESSION["extension_roap"];
        $source = "../" . $_SESSION["source_roap"];
        copy($source, $file);
        unlink($source);
    }
    $_SESSION["catalogar_roap"] = 0;
}
//////////////////////////////////
//insertLO( $_SESSION["idarea"], $_SESSION["iduser_roap"]);
/////////////////////// G E N E R A L ////////////////////////////////////////////////////////////
//IDLO
if ($_POST['idlo'] != -1) {
    $current = $idlo;
    $columnsLOM = "idlo,";
    $valuesLOM = "$current,";
    //borramos el actual;    
    $query = "DELETE FROM lom WHERE idlo=$current";
    $c->realizarOperacion($query);


    $query = "DELETE FROM pending WHERE idlo=$current AND iduserto='" . $_SESSION["iduser_roap"] . "' AND iduserfrom='" . $_SESSION["iduser_roap"] . "'";
    $c->realizarOperacion($query);
} else {
    $current = $c->lastValue("lo", "idLo");
    //$c->insertar("lom", "idLO", $current);
    //campos y valores de LOM
    $columnsLOM = "idlo,";
    $valuesLOM = "$current,";
}


//buscamos por todo lom
//LOM
if ($generalTitle != "") {
    $columnsLOM.="general_title,";
    $valuesLOM.="'" . addslashes($generalTitle) . "',";
}
if ($generalStructure != $DEFAULT_VALUE) {
    // $c->actualizar("lom", "general_structure", $generalStructure, "idLO", $current);
    $columnsLOM.="general_structure,";
    $valuesLOM.="'" . addslashes($generalStructure) . "',";
}
if ($generalAggregationLevel != $DEFAULT_VALUE) {
    // $c->actualizar("lom", "general_aggregationLevel", $generalAggregationLevel, "idLO", $current);
    $columnsLOM.="general_aggregationLevel,";
    $valuesLOM.="'" . addslashes($generalAggregationLevel) . "',";
}
if ($lifeCycleVersion != "") {
    //$c->actualizar("lom", "lifecycle_version", lifecycle_version, "idLO", $current);
    $columnsLOM.="lifecycle_version,";
    $valuesLOM.="'" . addslashes($lifeCycleVersion) . "',";
}
if ($lifeCycleStatus != "") {
    //$c->actualizar("lom", "lifecycle_status", $lifeCycleStatus, "idLO", $current);
    $columnsLOM.="lifecycle_status,";
    $valuesLOM.="'" . addslashes($lifeCycleStatus) . "',";
}

if ($metaMetadataLanguage != "") {
    //$c->actualizar("lom", "metametadata_language", $metaMetadataLanguage, "idLO", $current);
    $columnsLOM.="metametadata_language,";
    $valuesLOM.="'" . addslashes($metaMetadataLanguage) . "',";
}
if ($technicalSize != "") {
    //$c->actualizar("lom", "technical_size", $technicalSize, "idLO", $current);
    $columnsLOM.="technical_size,";
    $valuesLOM.="'" . addslashes($technicalSize) . "',";
}
if ($technicalInstallationRemarks != "") {
    // $c->actualizar("lom", "technical_installationRemarks", $technicalInstallationRemarks, "idLO", $current);
    $columnsLOM.="technical_installationRemarks,";
    $valuesLOM.="'" . addslashes($technicalInstallationRemarks) . "',";
}
if ($technicalOtherPlatformRequirements != "") {
    // $c->actualizar("lom", "technical_otherPlatformRequirements,", $technicalOtherPlatformRequirements, "idLO", $current);
    $columnsLOM.="technical_otherPlatformRequirements,";
    $valuesLOM.="'" . addslashes($technicalOtherPlatformRequirements) . "',";
}
if ($technicalDuration != "") {
    // $c->actualizar("lom", "technical_duration", $technicalDuration, "idLO", $current);
    $columnsLOM.="technical_duration,";
    $valuesLOM.="'" . addslashes($technicalDuration) . "',";
}
if ($educationalInteractivityType != "") {
    //$c->actualizar("lom", "educational_interactivityType", $educationalInteractivityType, "idLO", $current);
    $columnsLOM.="educational_interactivityType,";
    $valuesLOM.="'" . addslashes($educationalInteractivityType) . "',";
}
if ($educationalInteractivityLevel != "") {
    //$c->actualizar("lom", "educational_interactivityLevel", $educationalInteractivityLevel, "idLO", $current);
    $columnsLOM.="educational_interactivityLevel,";
    $valuesLOM.="'" . addslashes($educationalInteractivityLevel) . "',";
}
if ($educationalSemanticDensity != "") {
    //$c->actualizar("lom", "educational_semanticDensity", $educationalSemanticDensity, "idLO", $current);
    $columnsLOM.="educational_semanticDensity,";
    $valuesLOM.="'" . addslashes($educationalSemanticDensity) . "',";
}

if ($educationalDifficulty != "") {
    // $c->actualizar("lom", "educational_difficulty", $educationalDifficulty, "idLO", $current);
    $columnsLOM.="educational_difficulty,";
    $valuesLOM.="'" . addslashes($educationalDifficulty) . "',";
}
if ($educationalTypicalLearningTime != "") {
    // $c->actualizar("lom", "educational_typicalLearningTime", $educationalTypicalLearningTime, "idLO", $current);
    $columnsLOM.="educational_typicalLearningTime,";
    $valuesLOM.="'" . addslashes($educationalTypicalLearningTime) . "',";
}
if ($rightsCost != "") {
    //$c->actualizar("lom", "rights_cost", $rightsCost, "idLO", $current);
    $columnsLOM.="rights_cost,";
    $valuesLOM.="'" . addslashes($rightsCost) . "',";
}
if ($rightsCopyrightandOtherRestrictions != "") {
    // $c->actualizar("lom", "rights_copyRightAndOtherRestrictions", $rightsCopyrightandOtherRestrictions, "idLO", $current);
    $columnsLOM.="rights_copyRightAndOtherRestrictions,";
    $valuesLOM.="'" . addslashes($rightsCopyrightandOtherRestrictions) . "',";
}
if ($rightsDescription != "") {
    //$c->actualizar("lom", "rights_description", $rightsDescription, "idLO", $current);
    $columnsLOM.="rights_description,";
    $valuesLOM.="'" . addslashes($rightsDescription) . "',";
}
if ($relationKind != "") {
    // $c->actualizar("lom", "relation_kind", $relationKind, "idLO", $current);
    $columnsLOM.="relation_kind,";
    $valuesLOM.="'" . addslashes($relationKind) . "',";
}

if ($annotationEntity != "") {
    // $c->actualizar("lom", "annotation_entity", $annotationEntity, "idLO", $current);
    $columnsLOM.="annotation_entity,";
    $valuesLOM.="'" . addslashes($annotationEntity) . "',";
}
if ($annotationDate != "") {
    //$c->actualizar("lom", "annotation_date", $annotationDate, "idLO", $current);
    $columnsLOM.="annotation_date,";
    $valuesLOM.="'" . addslashes($annotationDate) . "',";
}
if ($annotationDescription != "") {
    // $c->actualizar("lom", "annotation_description", $annotationDescription, "idLO", $current);
    $columnsLOM.="annotation_description,";
    $valuesLOM.="'" . addslashes($annotationDescription) . "',";
}
if ($classificationPurpose != "") {
    //  $c->actualizar("lom", "classification_purpose", $classificationPurpose, "idLO", $current);
    $columnsLOM.="classification_purpose,";
    $valuesLOM.="'" . addslashes($classificationPurpose) . "',";
}
if ($classificationDescription != "") {
    // $c->actualizar("lom", "classification_description", $classificationDescription, "idLO", $current);
    $columnsLOM.="classification_description,";
    $valuesLOM.="'" . addslashes($classificationDescription) . "',";
}

//--------------------------->//insertamos en LOM
$QQ = "INSERT INTO LOM(" . substr($columnsLOM, 0, strlen($columnsLOM) - 1) . ") VALUES(" . substr($valuesLOM, 0, strlen($valuesLOM) - 1) . ")";
//echo $QQ;
$c->realizarOperacion($QQ);
$General_Identifier = "";
$General_language = "";
$General_description = "";
$General_keyword = "";
$General_coverage = "";
$LifeCycle_contribute = "";
$LifeCycleContribute_entity = "";
$MetaMetadata_Identifier = "";
$MetaMetadata_contribute = "";
$MetaMetadataContribute_entity = "";
$MetaMetadata_metaDataSchema = "";
$Technical_format = "";
$Technical_location = "";
$Technical_requirements = "";
$Requirements_orComposite = "";
$Educational_learningResourceType = "";
$Educational_intendedEndUserRole = "";
$Educational_context = "";
$Educational_typicalAgeRange = "";
$Educational_description = "";
$Educational_language = "";
$Relation_resource = "";
$Resource_description = "";
$Resource_identifier = "";
$Classification_taxonPath = "";
$TaxonPath_taxon = "";
$Classification_keyword = "";
$CognitiveInformation = "";




//TITLE
//$c->actualizar("lom", "general_title", $generalTitle, "idLO", $current);
//en lom

/* probamos!!
  $QUERY = "INSERT INTO LOM(" . substr($columnsLOM, 0, strlen($columnsLOM)-1) . ") VALUES(" . substr($valuesLOM, 0, strlen($valuesLOM)-1) . ")";
  echo $QUERY;
 */


//Obtengo el id del LO que se esta ingresando
//IDENTIFIER
$General_Identifier = $c->multiFields2($ngeneralIdentifier, $generalCatalog, $generalEntry, "General", "Identifier", "Catalog", "Entry", $current);
//LANGUAGE
$General_language = $c->multiFields($ngeneralLanguage, $generalLanguage, "General", "Language", $current);
//DESCRIPTION
$General_description = $c->multiFields($ngeneralDescription, $generalDescription, "General", "Description", $current);
//KEYWORD
$General_keyword = $c->multiFields($ngeneralKeyword, $generalKeyword, "General", "Keyword", $current);
//COVERAGE
$General_coverage = $c->multiFields($ngeneralCoverage, $generalCoverage, "General", "Coverage", $current);
//STRUCTURE
//en lom
//AGGREGATION_LEVEL
//en lom
//////////////////////// L I F E  - C Y C L E /////////////////////////////////////////////////////
//VERSION
//en lom
//STATUS
//CONTRIBUTE
//multiField3($nlifeCycleContribute, $lifeCycleRole, $lifeCycleEntity, $lifeCycleDate, "LifeCycle", "Contribute", "Role", "Entity", "Date", $current);

$v = explode(",", $auxvlifeCycleContribute);
$t = sizeof($v);
$c->eliminar("LifeCycle_contribute", $current);

for ($i = 0; $i < $t; $i++) {
    $something = false;
    $t2 = $v[$i];
    for ($j = 0; $j < $t2; $j++) {
        if (isset(${"lifeCycleEntity" . $i . "_" . $j})) {
            if (${"lifeCycleEntity" . $i . "_" . $j} != "") {
                $something = true;
            }
        }
    }
    if (!$something) {
        if (isset(${"lifeCycleRole" . $i . "_0"})) {
            if (${"lifeCycleRole" . $i . "_0"} != $DEFAULT_VALUE || ${"lifeCycleDate" . $i . "_0"} != "") {
                $something = true;
            }
        }
    }
//lifeCycleEntity0_0
    if ($something) {

        //$c->insertar("LifeCycle_contribute", "idlo", $current);
        // $contribute = $c->lastValue("LifeCycle_contribute", "idLifeCycleContribute");
        if (isset(${"lifeCycleRole" . $i . "_0"})) {
            if (${"lifeCycleRole" . $i . "_0"} != "" || ${"lifeCycleDate" . $i . "_0"} != "") {
                //$c->actualizar("LifeCycle_contribute", "role", ${"lifeCycleRole" . $i . "_0"}, "idLifeCycleContribute", $contribute);
                $query = "INSERT INTO LifeCycle_contribute(idlo,role,date) VALUES($current, '" . addslashes(${"lifeCycleRole" . $i . "_0"}) . "','" . addslashes(${"lifeCycleDate" . $i . "_0"}) . "')";
                $c->realizarOperacion($query);
            }
        }

        for ($j = 0; $j < $t2; $j++) {
            if (isset(${"lifeCycleEntity" . $i . "_" . $j})) {
                if (${"lifeCycleEntity" . $i . "_" . $j} != "") {
                    $idlcc = $c->lastValue("LifeCycle_contribute", "idLifeCycleContribute");
                    $query = "INSERT INTO LifeCycleContribute_entity(idLifeCycleContribute,entity) VALUES($idlcc ,'" . addslashes(${"lifeCycleEntity" . $i . "_" . $j}) . "')";
                    $c->realizarOperacion($query);
                }
            }
        }
    }
}


//////////////////////// M E T A  - M E T A D A T A /////////////////////////////////////////////////////
//INDENTIFIER
$MetaMetadata_Identifier = $c->multiFields2($nmetaMetadataIdentifier, $metaMetadataCatalog, $metaMetadataEntry, "MetaMetadata", "Identifier", "Catalog", "Entry", $current);
// CONTRIBUTE
//multiField3($nmetaMetadataContribute, $metaMetadataRole, $metaMetadataEntity, $metaMetadataDate, "MetaMetadata", "Contribute", "Role", "Entity", "Date", $current);
//METADATA - SCHEME
$MetaMetadata_metaDataSchema = $c->multiFields($nmetaMetadataMetadataSchema, $metaMetadataMetadataSchema, "MetaMetadata", "MetadataSchema", $current);
//LANGUAGE
//en lom
//CONTRIBUTE
//auxvmetaMetadataContribute
$v = explode(",", $auxvmetaMetadataContribute);
$t = sizeof($v);

$c->eliminar("MetaMetadata_contribute", $current);
$MetaMetadata_contribute = "";
$query = "";
for ($i = 0; $i < $t; $i++) {
    $something = false;
    $t2 = $v[$i];
    for ($j = 0; $j < $t2; $j++) {
        if (isset(${"metaMetadataEntity" . $i . "_" . $j})) {
            if (${"metaMetadataEntity" . $i . "_" . $j} != "") {
                $something = true;
            }
        }
    }

    if (!$something) {
        if (isset(${"metaMetadataRole" . $i . "_0"})) {
            if (${"metaMetadataRole" . $i . "_0"} != $DEFAULT_VALUE || ${"metaMetadataDate" . $i . "_0"} != "") {
                $something = true;
            }
        }
    }

//lifeCycleEntity0_0
    if ($something) {

        if (isset(${"metaMetadataRole" . $i . "_0"})) {
            // if (${"metaMetadataRole" . $i . "_0"} != $DEFAULT_VALUE || ${"metaMetadataDate" . $i . "_0"} != "") {
            $query = "INSERT INTO MetaMetadata_contribute(idlo,role,date) VALUES($current,'" . ${"metaMetadataRole" . $i . "_0"} . "','" . ${"metaMetadataDate" . $i . "_0"} . "')";
            $c->realizarOperacion($query);
            //}
        }

        $last = $c->lastValue("MetaMetadata_contribute", "idMetaMetadataContribute");
        for ($j = 0; $j < $t2; $j++) {
            if (isset(${"metaMetadataEntity" . $i . "_" . $j})) {
                if (${"metaMetadataEntity" . $i . "_" . $j} != "") {
                    $query = "INSERT INTO MetaMetadataContribute_entity(idMetaMetadataContribute,entity) VALUES(" . $last . ",'" . addslashes(${"metaMetadataEntity" . $i . "_" . $j}) . "')";
                    $c->realizarOperacion($query);
                }
            }
        }
    }
}

//////////////////////// T E C H N I C A L /////////////////////////////////////////////////////
//FORMAT
$Technical_format = $c->multiFields($ntechnicalFormat, $technicalFormat, "Technical", "Format", $current);
//SIZE
//en lom
//LOCATION
$Technical_location = $c->multiFields($ntechnicalLocation, $technicalLocation, "Technical", "Location", $current);
//REQUIREMENT
$v = explode(",", $auxvtechnicalRequirement);
$t = sizeof($v);
$c->eliminar("Technical_requirements", $current);

$Technical_requirements = "";
$query = "";
for ($i = 0; $i < $t; $i++) {
    $something = false;
    $t2 = $v[$i];
    for ($j = 0; $j < $t2; $j++) {
        if (isset(${"technicalName" . $i . "_" . $j})) {
            if (${"technicalType" . $i . "_" . $j} != $DEFAULT_VALUE || ${"technicalName" . $i . "_" . $j} != "" || ${"technicalMinimumVersion" . $i . "_" . $j} != "" || ${"technicalMaximumVersion" . $i . "_" . $j} != "") {
                $something = true;
            }
        }
    }
    if ($something) {
        //$c->insertar("Technical_requirements", "idlo", $current);
        $query = "INSERT INTO Technical_requirements(idlo) VALUES($current)";
        $c->realizarOperacion($query);
        $requisito = $c->lastValue("Technical_requirements", "idTechnicalRequirements");
        for ($j = 0; $j < $t2; $j++) {
            if (isset(${"technicalName" . $i . "_" . $j})) {
                if (${"technicalType" . $i . "_" . $j} != $DEFAULT_VALUE || ${"technicalName" . $i . "_" . $j} != "" || ${"technicalMinimumVersion" . $i . "_" . $j} != "" || ${"technicalMaximumVersion" . $i . "_" . $j} != "") {
                    $query = "INSERT INTO Requirements_orComposite(idTechnicalRequirements,type,name,minimumVersion,maximumVersion) VALUES(" . $requisito . ",'" . addslashes(${"technicalType" . $i . "_" . $j}) . "','" . addslashes(${"technicalName" . $i . "_" . $j}) . "','" . addslashes(${"technicalMinimumVersion" . $i . "_" . $j}) . "','" . addslashes(${"technicalMaximumVersion" . $i . "_" . $j}) . "')";
                    $c->realizarOperacion($query);
                }
            }
        }
    }
}

//INSTALATION  REMARKS
// en lom
//OTHER PLATAFORM REQUIREMENTS
//en lom
//DURATION
// en lom
//////////////////////// E D U C A T I O N A L /////////////////////////////////////////////////////
//INTERACTIVITY TYPE
//en lom
//LEARNING RESOURCE TYPE
$Educational_learningResourceType = $c->multiFields($neducationalLearningResourceType, $educationalLearningResourceType, "Educational", "LearningResourceType", $current);
//INTERACTIVITY LEVEL
// en lom
//SEMANTIC DENSITY
//en lom
//INTENDEN END USER ROLE
$Educational_intendedEndUserRole = $c->multiFields($neducationalIntendedEndUserRole, $educationalIntendedEndUserRole, "Educational", "IntendedEndUserRole", $current);

//CONTEXT
$Educational_context = $c->multiFields($neducationalContext, $educationalContext, "Educational", "Context", $current);
//TYPICAL AGE RANGE
$Educational_typicalAgeRange = $c->multiFields($neducationalTypicalAgeRange, $educationalTypicalAgeRange, "Educational", "TypicalAgeRange", $current);
//DIFFICULTY
//en lom
//TYPICAL LEARNING TIME
// en lom
//DESCRIPTION
$Educational_description = $c->multiFields($neducationalDescription, $educationalDescription, "Educational", "Description", $current);
//COGNITIVE INFORMATION
$c->realizarOperacion("DELETE FROM CognitiveInformation WHERE idlo=$current");

for ($i = 0; $i <= $neducationalDescription; $i++) {
    if (isset(${"fslsmR" . $i . "_1L"})) {
        for ($j = 1; $j <= 5; $j++) {
            $value = ${"fslsmR" . $i . "_" . $j . "L"};
            $num = "";
            if (strlen($value) == 2) {
                $num = substr($value, 0, 1);
            } else if (strlen($value) == 3) {
                $num = substr($value, 0, 2);
            } else {
                $num = substr($value, 0, 3);
            }

            $ci = "INSERT INTO CognitiveInformation VALUES($current,1,$j,$num)";
            //echo "<br/> X-->" . $ci;
            $c->realizarOperacion($ci);
        }
    } else if (isset(${"varkR" . $i . "_1"})) {
        for ($j = 1; $j <= 4; $j++) {
            $value = ${"varkR" . $i . "_" . $j};
            $num = "";
            if (strlen($value) == 2) {
                $num = substr($value, 0, 1);
            } else if (strlen($value) == 3) {
                $num = substr($value, 0, 2);
            } else {
                $num = substr($value, 0, 3);
            }
            $ci = "INSERT INTO CognitiveInformation VALUES($current,2,$j,$num)";
            // echo "<br/> X-->" . $ci;
            $c->realizarOperacion($ci);
        }
    }
}



//COGNITIVE INFORMATION
//$cognitiveInformation = $c->getCognitiveInformation($neducationalDescription, 1, $current);
//$cognitiveInformation.=$c->getCognitiveInformation($neducationalDescription, 2, $current);
//echo "-o->$cognitiveInformation";
//insertamos de una
/* $cinformation = explode("¥", $cognitiveInformation);
  for ($i = 0; $i < sizeof($cinformation); $i++) {
  if ($cinformation[$i] != "") {
  echo "--> $cinformation[$i]  <br/>";
  $c->realizarOperacion($cinformation[$i]);
  }
  } */





//LANGUAGE
$Educational_language = $c->multiFields($neducationalLanguage, $educationalLanguage, "Educational", "Language", $current);


//////////////////////// R I G H T S  /////////////////////////////////////////////////////
//COST
// en lom
//COPY RIGHTS AND OTHER RESTRICTIONS
// en lom
//DESCRIPTION
// en lom
//////////////////////// R E L A T I O N  /////////////////////////////////////////////////////
//KIND
//en lom
//RESOURCE

$Relation_resource = "";
$query = "";
$something1 = false;
$c->eliminar("Relation_resource", $current);
//hay algo en los indentificadores?
for ($i = 0; $i <= $nrelationIdentifier; $i++) {
    if ($i == 0) {
        if ($relationCatalog != "" || $relationEntry != "") {
            $something1 = true;
            break;
        }
    } else {
        if (${"relationCatalog" . $i} != "" || ${"relationEntry" . $i} != "") {
            $something1 = true;
            break;
        }
    }
}
$something2 = false;
if (!$something1) {
    for ($i = 0; $i <= $nrelationDescription; $i++) {
        if ($i == 0) {
            if ($relationDescription != "") {
                $something2 = true;
                break;
            }
        } else {
            if (${"relationDescription" . $i} != "") {
                $something2 = true;
                break;
            }
        }
    }
}

if ($something1 || $something2) {
    $query = "INSERT INTO Relation_resource(idlo) VALUES($current)";
    $c->realizarOperacion($query);
    $resource = $c->lastValue("Relation_resource", "idRelationResource");
    for ($i = 0; $i <= $nrelationIdentifier; $i++) {
        if ($i == 0) {
            if ($relationCatalog != "" || $relationEntry != "") {
                $query = "INSERT INTO Resource_identifier(idRelationResource,catalog,entry) VALUES($resource,'" . addslashes($relationCatalog) . "','" . addslashes($relationEntry) . "')";
                $c->realizarOperacion($query);
            }
        } else {
            if (isset(${"relationCatalog" . $i})) {
                if (${"relationCatalog" . $i} != "" || ${"relationEntry" . $i} != "") {
                    $query = "INSERT INTO Resource_identifier(idRelationResource,catalog,entry) VALUES($resource,'" . addslashes(${"relationCatalog" . $i}) . "','" . addslashes(${"relationEntry" . $i}) . "')";
                    $c->realizarOperacion($query);
                }
            }
        }
    }
    //insertar las descripciones de las relaciones
    for ($i = 0; $i <= $nrelationDescription; $i++) {
        if ($i == 0) {
            if ($relationDescription != "") {
                $query = "INSERT INTO Resource_description(idRelationResource,description) VALUES($resource,'" . addslashes($relationDescription) . "')";
                $c->realizarOperacion($query);
            }
        } else {
            if (isset(${"relationDescription" . $i})) {
                if (${"relationDescription" . $i} != "") {
                    $query = "INSERT INTO Resource_description(idRelationResource,description) VALUES($resource,'" . addslashes(${"relationDescription" . $i}) . "')";
                    $c->realizarOperacion($query);
                }
            }
        }
    }
}


//////////////////////// A N N O T A T I O N /////////////////////////////////////////////////////
//ENTITY
// en lom
//DATE
// en lom
//DESCRIPTION
//en lom
//////////////////////// C L A S S I F I C A T I O N //////////////////////////////////////////////
//PURPOSE
// en lom
////DESCRIPTION
// en lom
//KEYWORD
$Classification_keyword = $c->multiFields($nclassificationKeyword, $classificationKeyword, "Classification", "Keyword", $current);
//TAXON PATH
//auxvclassificationTaxonPath

$v = explode(",", $auxvclassificationTaxonPath);
$t = sizeof($v);
$c->eliminar("Classification_taxonPath", $current);

$Classification_taxonPath = "";
$query = "";
for ($i = 0; $i < $t; $i++) {
    $something = false;
    $t2 = $v[$i];
    for ($j = 0; $j < $t2; $j++) {
        if (isset(${"classificationEntry" . $i . "_" . $j})) {
            if (${"classificationEntry" . $i . "_" . $j} != "") {
                $something = true;
            }
        }
    }
    if (!$something) {
        if (isset(${"classificationSource" . $i . "_0"})) {
            if (${"classificationSource" . $i . "_0"} != "") {
                $something = true;
            }
        }
    }
//lifeCycleEntity0_0
    if ($something) {
        if (${"classificationSource" . $i . "_0"} != "") {
            $query = "INSERT INTO Classification_taxonPath(idlo,source) VALUES($current,'" . addslashes(${"classificationSource" . $i . "_0"}) . "')";
            $c->realizarOperacion($query);
        }
        $taxon = $c->lastValue("Classification_taxonPath", "idClassificationTaxonPath");
        for ($j = 0; $j < $t2; $j++) {
            if (isset(${"classificationEntry" . $i . "_" . $j})) {
                if (${"classificationEntry" . $i . "_" . $j} != "" || ${"classificationId" . $i . "_0"} != "") {
                    $query = "INSERT INTO TaxonPath_taxon(idClassificationTaxonPath,entry,id) VALUES($taxon,'" . addslashes(${"classificationEntry" . $i . "_" . $j}) . "','" . addslashes(${"classificationId" . $i . "_0"}) . "')";
                    $c->realizarOperacion($query);
                }
            }
        }
    }
}


//Insertamos en loadlo para que se cargue en FROAC
$c->realizarOperacion("DELETE FROM loadlo WHERE idlo='$current' AND type=1");
$c->realizarOperacion("INSERT INTO loadlo VALUES($current,1,now())");
loadInFROAC();




$list[0] = $General_Identifier;
$list[1] = $General_language;
$list[2] = $General_description;
$list[3] = $General_keyword;
$list[4] = $General_coverage;
$list[5] = $MetaMetadata_Identifier;
$list[6] = $MetaMetadata_metaDataSchema;
$list[7] = $Technical_format;
$list[8] = $Technical_location;
$list[9] = $Requirements_orComposite;
$list[10] = $Educational_learningResourceType;
$list[11] = $Educational_intendedEndUserRole;
$list[12] = $Educational_context;
$list[13] = $Educational_typicalAgeRange;
$list[14] = $Educational_description;
$list[15] = $Educational_language;
$list[16] = $Classification_keyword;
//$list[26] = $CognitiveInformation;


for ($i = 0; $i < sizeof($list); $i++) {
    $value = explode("¥", $list[$i]);
    for ($j = 0; $j < sizeof($value); $j++) {
        //  echo "<br/>-------->$value[$j] <br/>";
        if ($value[$j] != "") {
            $c->realizarOperacion($value[$j]);
        }
    }
}


//esto es lo de xmlo (BRASIL)
$exportador = new exportador($current);
$exportador->addText($c->etiquetaInicial('lom:lom xmlns:lom="http://ltsc.ieee.org/xsd/LOM" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://ltsc.ieee.org/xsd/LOM http://ltsc.ieee.org/xsd/lomv1.0/lom.xsd"',0,false));
$exportador->getTabs();
$exportador->addText($c->etiquetaFinal("lom:lom"));
$exportador->guardar();


if ($_SESSION["rol_roap"] == "2") {
    if ($idReport != -1) {
        $c->realizarOperacion("update report set valided=true, action='Editado', dateaction=now() where idreport=$idReport");
        // echo "update report set valided=true, action='Editado', dateaction=now() where idreport=$idReport ->";
    }
}

require("calcularMetrica.php");
$c->close();

echo $current;

function loadInFROAC() {
    $c = new conector_pg();
    $query = "SELECT * FROM dataFROAC";
    $result = $c->realizarOperacion($query);
    $repo = pg_fetch_array($result);
    $query = "SELECT * FROM loadlo ORDER BY insertionDate";
    $result = $c->realizarOperacion($query);
    try {
        while ($data = pg_fetch_array($result)) {
            $page = "http://$repo[2]?idlo=$data[0]&idrepository=$repo[1]&type=$data[1]";
            $response = $c->getText($page);
            if ($response == "OK") {
                $c->realizarOperacion("DELETE FROM loadlo WHERE idlo=$data[0] AND type=$data[1]");
            }
        }
    } catch (Exception $e) {
        $e->getMessage();
    }
}

?>
