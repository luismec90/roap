<?php

extract($_POST);
require('control/importarOa/import_functions.php');
$idlo = "X";

function importar($file) {
    $doc = new DOMDocument('1.0', 'utf-8');
    $doc->load($file);
    importGeneral($doc);
    importLifeCycle($doc);
    importMetaMetaData($doc);
    importTechnical($doc);
    importEducational($doc);
    importRights($doc);
    importRelation($doc);
    importAnnotation($doc);
    importClassification($doc);
}

///////////////////// G E N E R A L /////////////
function importGeneral($doc) {
    global $c;
    $tagGeneral = $doc->getElementsByTagName("general");
    $c->insertar("lom", "idlo", $c->lastValue("lo", "idlo"));
    foreach ($tagGeneral as $general) {
        importGeneralTitle($general);
        importIdentifiers($general, "General", "Identifier");
        importCharacterString2($general, "General", "Language");
        importLangString2($general, "General", "Description");
        importLangString2($general, "General", "Keyword");
        importLangString2($general, "General", "Coverage");
        importVocabulary1($general, "General", "Structure");
        importVocabulary1($general, "General", "AggregationLevel");
    }
}

function importGeneralTitle($general) {
    global $c;
    $tagTitle = $general->getElementsByTagName("title");
    $var = "";
    foreach ($tagTitle as $tag) {
        $t = $tag->getElementsByTagName("string");
        $var = $t->item(0)->nodeValue;
    }

    global $idlo;
    $idlo = $c->lastValue("lom", "idlo");
    $c->actualizar("lom", "general_title", $var, "idlo", $idlo);

    //insertar("lom", "general_title", $var);
}

/////////////// L I F E - C Y C L E /////////////////////

function importLifeCycle($doc) {
    $tagLifeCycle = $doc->getElementsByTagName("lifecycle");
    foreach ($tagLifeCycle as $lifeCycle) {
        importLangString1($lifeCycle, "LifeCycle", "Version");
        importVocabulary1($lifeCycle, "LifeCycle", "Status");
        importLifeCycleContribution($lifeCycle,"LifeCycle","Contribute");
    }
}

///////////////// M E T A  - M E T A D A T A /////////////////
function importMetaMetaData($doc) {
    $tagMetaMetaData = $doc->getElementsByTagName("metametadata");
    foreach ($tagMetaMetaData as $metaMetaData) {
        importIdentifiers($metaMetaData, "MetaMetadata", "Identifier");
        importMetaMetadataContribution($metaMetaData,"MetaMetadata","Contribute");//Esta en prueba
        importCharacterString2($metaMetaData, "MetaMetadata", "MetaDataSchema");
        importCharacterString1($metaMetaData, "MetaMetadata", "Language");
    }
}

///////////////// T E C H N I C A L ////////////////////////
function importTechnical($doc) {
    $tagTechnical = $doc->getElementsByTagName("technical");
    foreach ($tagTechnical as $technical) {
        importCharacterString2($technical, "Technical", "Format");
        importCharacterString1($technical, "Technical", "Size");
        importCharacterString2($technical, "Technical", "Location");
        //importTechnicalRequirement($technical,"Technical","Requirement");
        importLangString1($technical, "Technical", "InstallationRemarks");
        importLangString1($technical, "Technical", "OtherPlataformsRequirements");
        importCharacterString1($technical, "Technical", "Duration");
    }
}

//////////////// E D U C A T I O N A L ///////////////
function importEducational($doc) {
    $tagEducational = $doc->getElementsByTagName("educational");
    foreach ($tagEducational as $educational) {

        importVocabulary1($educational, "Educational", "InteractivityType");
        importVocabulary2($educational, "Educational", "LearningResourceType");
        importVocabulary1($educational, "Educational", "InteractivityLevel");
        importVocabulary1($educational, "Educational", "SemanticDensity");
        importVocabulary2($educational, "Educational", "IntendedEndUserRole");
        importVocabulary2($educational, "Educational", "Context");
        importLangString2($educational, "Educational", "TypicalAgeRange");
        importVocabulary1($educational, "Educational", "Difficulty");
        importCharacterString1($educational, "Educational", "TypicalLearningTime");
        importLangString2($educational, "Educational", "Description");
        importCharacterString2($educational, "Educational", "Language");
    }
}

///////////////// R I G H T S //////////////////////
function importRights($doc) {
    $tagRights = $doc->getElementsByTagName("rights");
    foreach ($tagRights as $rights) {
        importVocabulary1($rights, "Rights", "Cost");
        importVocabulary1($rights, "Rights", "CopyrightandOtherRestrictions");
        importLangString1($rights, "Rights", "Description");
    }
}

///////////////////// R E L A T I O N //////////////
function importRelation($doc) {
    $tagRelation = $doc->getElementsByTagName("relation");
    foreach ($tagRelation as $relation) {
        importVocabulary1($relation, "Relation", "Kind");
        //falta resource;
    }
}

///////////////////// A N N O T A T I O N //////////////
function importAnnotation($doc) {
    $tagAnnotation = $doc->getElementsByTagName("annotation");
    foreach ($tagAnnotation as $annotation) {
        importCharacterString1($annotation, "Annotation", "Entity");
        importDateTime1($annotation, "Annotation", "Date");
        importLangString1($annotation, "Annotation", "Description");
    }
}

////////////////////// C L A S S I F I C A T I O N ////////////////
function importClassification($doc) {
    $tagClassification = $doc->getElementsByTagName("classification");
    foreach ($tagClassification as $classification) {
        //falta taxonPath
        importVocabulary1($classification, "Classification", "Purpose");
        importLangString1($classification, "Classification", "Description");
        importLangString2($classification, "Classification", "Keyword");
    }
}

?>
