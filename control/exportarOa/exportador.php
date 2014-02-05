<?php

class exportador {

    var $conexion;
    var $objeto;
    var $xmlo;
    var $data;

    function __construct($idobjeto) {
        $this->objeto = $idobjeto;
        $this->conexion = new conector_pg();
        $this->xmlo = "";
        $this->data = array();
        $this->loadData();
    }

    function loadData() {
        $this->data['general_structure'][1] = "atomic";
        $this->data['general_structure'][2] = "collection";
        $this->data['general_structure'][3] = "networked";
        $this->data['general_structure'][4] = "hierarchical";
        $this->data['general_structure'][5] = "linear";

        $this->data['lifecycle_status'][1] = "draft";
        $this->data['lifecycle_status'][2] = "final";
        $this->data['lifecycle_status'][3] = "revised";
        $this->data['lifecycle_status'][4] = "unavailable";


        $this->data['lifecycle_role'][1] = "author";
        $this->data['lifecycle_role'][2] = "publisher";
        $this->data['lifecycle_role'][3] = "unknown";
        $this->data['lifecycle_role'][4] = "initiator";
        $this->data['lifecycle_role'][5] = "terminator";
        $this->data['lifecycle_role'][6] = "validator";
        $this->data['lifecycle_role'][7] = "editor";
        $this->data['lifecycle_role'][8] = "graphical designer";
        $this->data['lifecycle_role'][9] = "technical implementer";
        $this->data['lifecycle_role'][10] = "content provider";
        $this->data['lifecycle_role'][11] = "technical validator";
        $this->data['lifecycle_role'][12] = "educational validator";
        $this->data['lifecycle_role'][13] = "script writer";
        $this->data['lifecycle_role'][14] = "instructional designer";
        $this->data['lifecycle_role'][15] = "subject matter expert";




        $this->data['metametadata_role'][1] = "creator";
        $this->data['metametadata_role'][2] = "validator";




        $this->data['technical_type'][1] = "operating system";
        $this->data['technical_type'][2] = "browser";

        $this->data['educational_learningResourceType'][1] = "exercise";
        $this->data['educational_learningResourceType'][2] = "simulation";
        $this->data['educational_learningResourceType'][3] = "questionnaire";
        $this->data['educational_learningResourceType'][4] = "diagram";
        $this->data['educational_learningResourceType'][5] = "figure";
        $this->data['educational_learningResourceType'][6] = "graph";
        $this->data['educational_learningResourceType'][7] = "index";
        $this->data['educational_learningResourceType'][8] = "slide";
        $this->data['educational_learningResourceType'][9] = "table";
        $this->data['educational_learningResourceType'][10] = "narrative text";
        $this->data['educational_learningResourceType'][11] = "exam";
        $this->data['educational_learningResourceType'][12] = "experiment";
        $this->data['educational_learningResourceType'][13] = "problem statement";
        $this->data['educational_learningResourceType'][14] = "self assessment";
        $this->data['educational_learningResourceType'][15] = "lecture";


        $this->data['educational_interactivityLevel'][1] = "very low";
        $this->data['educational_interactivityLevel'][2] = "low";
        $this->data['educational_interactivityLevel'][3] = "medium";
        $this->data['educational_interactivityLevel'][4] = "high";
        $this->data['educational_interactivityLevel'][5] = "very high";


        $this->data['educational_semanticDensity'][1] = "very low";
        $this->data['educational_semanticDensity'][2] = "low";
        $this->data['educational_semanticDensity'][3] = "medium";
        $this->data['educational_semanticDensity'][4] = "high";
        $this->data['educational_semanticDensity'][5] = "very high";


        $this->data['educational_intendedEndUserRole'][1] = "teacher";
        $this->data['educational_intendedEndUserRole'][2] = "author";
        $this->data['educational_intendedEndUserRole'][3] = "learner";
        $this->data['educational_intendedEndUserRole'][4] = "manager";


        $this->data['educational_context'][1] = "school";
        $this->data['educational_context'][2] = "higher education";
        $this->data['educational_context'][3] = "training";
        $this->data['educational_context'][4] = "other";


        $this->data['educational_difficulty'][1] = "very easy";
        $this->data['educational_difficulty'][2] = "easy";
        $this->data['educational_difficulty'][3] = "medium";
        $this->data['educational_difficulty'][4] = "difficult";
        $this->data['educational_difficulty'][5] = "very difficult";


        $this->data['rights_cost'][1] = "yes";
        $this->data['rights_cost'][2] = "no";


        $this->data['rights_copyRights'][1] = "yes";
        $this->data['rights_copyRights'][2] = "no";


        $this->data['relation_kind'][1] = "ispartof";
        $this->data['relation_kind'][2] = "haspart";
        $this->data['relation_kind'][3] = "isversionof";
        $this->data['relation_kind'][4] = "hasversion";
        $this->data['relation_kind'][5] = "isformatof";
        $this->data['relation_kind'][6] = "hasformat";
        $this->data['relation_kind'][7] = "references";
        $this->data['relation_kind'][8] = "isreferencedby";
        $this->data['relation_kind'][9] = "isbasedon";
        $this->data['relation_kind'][10] = "isbasisfor";
        $this->data['relation_kind'][11] = "requires";
        $this->data['relation_kind'][12] = "isrequiredby";


        $this->data['classification_purpose'][1] = "discipline";
        $this->data['classification_purpose'][2] = "idea";
        $this->data['classification_purpose'][3] = "prerequisite";
        $this->data['classification_purpose'][4] = "educational objective";
        $this->data['classification_purpose'][5] = "accessibility";
        $this->data['classification_purpose'][6] = "restrictions";
        $this->data['classification_purpose'][7] = "educational level";
        $this->data['classification_purpose'][8] = "skill level";
        $this->data['classification_purpose'][9] = "security level";
        $this->data['classification_purpose'][10] = "competency";
    }

    function match($field, $number) {
        return $number == 'none' || $number == "" || $number == null? "" : $this->data[$field][$number];
    }

    function addText($text) {
        $this->xmlo.=$text;
    }

    function getxml() {
        return $this->xmlo;
    }

    function getTabs() {
        $this->addText("\n" . $this->getXMLGeneral() . "\n");
        $this->addText("\n" . $this->getXMLlifeCycle() . "\n");
        $this->addText("\n" . $this->getXMLmetaMetaData() . "\n");
        $this->addText("\n" . $this->getXMLtechnical() . "\n");
        $this->addText("\n" . $this->getXMLeducational() . "\n");
        $this->addText("\n" . $this->getXMLrights() . "\n");
        $this->addText("\n" . $this->getXMLrelation() . "\n");
        $this->addText("\n" . $this->getXMLannotation() . "\n");
        $this->addText("\n" . $this->getXMLclassification() . "\n");
    }

    function guardar() {
        // echo "___UPDATE lo SET xmlo='" . $this->xmlo . "'" . "___<br/>";
        $this->conexion->realizarOperacion("UPDATE lo SET xmlo='" . $this->xmlo . "' WHERE idlo=$this->objeto");
    }

    private function getXMLGeneral() {
        $general = $this->conexion->etiquetaInicial("lom:general") . "\n";
        //identifier
        $arr = array("catalog", "entry");
        $general.=$this->getLabels($this->conexion->getGeneralIdentifier($this->objeto), $arr, 2, "identifier");
        //titulo
        $general.= $this->conexion->encerrar("lom:title", $this->getValue($this->conexion->getGeneralTitle($this->objeto)));
        //language        
        $general.= $this->getLabels($this->conexion->getGeneralLanguage($this->objeto), "language");
        //description
        $general.= $this->getLabels($this->conexion->getGeneralDescription($this->objeto), "description");
        //palabras clave        
        $general.= $this->getLabels($this->conexion->getGeneralKeyword($this->objeto), "keyword");
        //ambito
        $general.= $this->getLabels($this->conexion->getGeneralCoverage($this->objeto), "coverage");
        //structure
        $general.= $this->conexion->encerrar("lom:structure", $this->match("general_structure", $this->getValue($this->conexion->getGeneralStructure($this->objeto))));
        //nivel de agregacion
        $general.= $this->conexion->encerrar("lom:aggregationLevel", $this->getValue($this->conexion->getGeneralAggregationLevel($this->objeto)));

        $general.= $this->conexion->etiquetaFinal("lom:general");

        return $general;
    }

    private function getXMLlifeCycle() {
        $ciclodevida = $this->conexion->etiquetaInicial("lom:lifeCycle") . "\n";
        //version
        $ciclodevida.= $this->conexion->encerrar("lom:version", $this->getValue($this->conexion->getLifeCycleVersion($this->objeto)));
        //status
        $ciclodevida.= $this->conexion->encerrar("lom:status", $this->match("lifecycle_status", $this->getValue($this->conexion->getLifeCycleStatus($this->objeto))));
        //contribute
        $arr = array("role", "date", "entity", "lifecycle_role");
        $ciclodevida.= $this->getContributes("contribute", $this->conexion->getLifeCycleContribute($this->objeto), $arr);

        $ciclodevida.= $this->conexion->etiquetaFinal("lom:lifeCycle");

        return $ciclodevida;
    }

    private function getXMLmetaMetaData() {
        $meta = $this->conexion->etiquetaInicial("lom:metaMetaData") . "\n";

        //Identifier
        $arr = array("catalog", "entry");
        $meta.=$this->getLabels($this->conexion->getMetaMetadataIdentifier($this->objeto), $arr, 2, "identifier");

        //contribute
        $arr = array("role", "date", "entity", "metametadata_role");
        $meta.= $this->getContributes("contribute", $this->conexion->getMetaMetadataContribute($this->objeto), $arr, 2);

        //metadataSchema
        $meta.= $this->getLabels($this->conexion->getMetaMetadataSchema($this->objeto), "metaDataSchema");
        //language
        $meta.= $this->conexion->encerrar("lom:language", $this->getValue($this->conexion->getMetaMetadataLanguage($this->objeto)));


        $meta.= $this->conexion->etiquetaFinal("lom:metaMetaData");

        return $meta;
    }

    private function getXMLtechnical() {
        $technical = $this->conexion->etiquetaInicial("lom:technical") . "\n";

        //formato
        $technical.= $this->getLabels($this->conexion->getTechnicalFormat($this->objeto), "format");
        //tamaño
        $technical.= $this->conexion->encerrar("lom:size", $this->getValue($this->conexion->getTechnicalSize($this->objeto)));
        //localización
        $technical.= $this->getLabels($this->conexion->getTechnicalLocation($this->objeto), "location");
        //pautas de instalacion
        $technical.= $this->conexion->encerrar("lom:installationRemarks", $this->getValue($this->conexion->getTechnicalInstallationRemarks($this->objeto)));
        //requsitos de plataforma
        $technical.= $this->conexion->encerrar("lom:otherPlatformRequirements", $this->getValue($this->conexion->getTechnicalOtherPlataformsRequirements($this->objeto)));
        //duracion
        $technical.= $this->conexion->encerrar("lom:duration", $this->getValue($this->conexion->getTechnicalDuration($this->objeto)));

        $arr = array("type", "name", "minimumversion", "maximumversion", "technical_type");
        $technical.= $this->getRequirements("requirements", $this->conexion->getTechnicalRequirements($this->objeto), $arr);
        //

        $technical.= $this->conexion->etiquetaFinal("lom:technical");
        return $technical;
    }

    private function getXMLeducational() {
        $educational = $this->conexion->etiquetaInicial("lom:educational") . "\n";
        //tipo de interactividad
        $educational.= $this->conexion->encerrar("lom:interactivityType", $this->getValue($this->conexion->getEducationalInteractivityType($this->objeto)));
        ///tipo de recurso
        $label['name'] = "learningResourceType";
        $label['match'] = true;
        $label['data'] = "educational_learningResourceType";
        $educational.= $this->getLabels($this->conexion->getEducationalLearningResourceType($this->objeto), $label);
        unset($label);

        //nivel de interactividad
        $educational.= $this->conexion->encerrar("lom:interactivityLevel", $this->match("educational_interactivityLevel", $this->getValue($this->conexion->getEducationalInteractivityLevel($this->objeto))));
        //densidad semantica
        $educational.= $this->conexion->encerrar("lom:semanticDensity", $this->match("educational_semanticDensity", $this->getValue($this->conexion->getEducationalSemanticDensity($this->objeto))));
        ////destinatario        
        $label['name'] = "intendedEndUserRole";
        $label['match'] = true;
        $label['data'] = "educational_intendedEndUserRole";
        $educational.= $this->getLabels($this->conexion->getEducationalIntendedEndUserRole($this->objeto), $label);
        unset($label);
        //contexto
        $label['name'] = "context";
        $label['match'] = true;
        $label['data'] = "educational_context";
        $educational.= $this->getLabels($this->conexion->getEducationalContext($this->objeto), $label);
        unset($label);
        //rango tipico de edad
        $educational.= $this->getLabels($this->conexion->getEducationalTypicalAgeRange($this->objeto), "typicalAgeRange");

        //dificultad
        $educational.= $this->conexion->encerrar("lom:difficulty", $this->match("educational_difficulty", $this->getValue($this->conexion->getEducationalDifficulty($this->objeto))));
        //tiempo tipico de aprendizaje
        $educational.= $this->conexion->encerrar("lom:typicalLearningTime", $this->getValue($this->conexion->getEducationalTypicalLearningTime($this->objeto)));
        //descripcion
        $educational.= $this->getLabels($this->conexion->getEducationalDescription($this->objeto), "description");
        //idioma
        $educational.= $this->getLabels($this->conexion->getEducationalLanguage($this->objeto), "language");

        $educational.=$this->conexion->etiquetaFinal("lom:educational");

        return $educational;
    }

    private function getXMLrights() {
        $rights = $this->conexion->etiquetaInicial("lom:rights") . "\n";
        //coste
        $rights.= $this->conexion->encerrar("lom:cost", $this->match("rights_cost", $this->getValue($this->conexion->getRightsCost($this->objeto))));
        //derechos de autor
        $rights.= $this->conexion->encerrar("lom:copyRightAndOtherRestrictions", $this->match("rights_copyRights", $this->getValue($this->conexion->getRightsCopyRightsAndOtherRestrictions($this->objeto))));
        //description
        $rights.= $this->conexion->encerrar("lom:description", $this->getValue($this->conexion->getRightsDescription($this->objeto)));

        $rights.= $this->conexion->etiquetaFinal("lom:rights");

        return $rights;
    }

    private function getXMLrelation() {
        $relation = $this->conexion->etiquetaInicial("lom:relation") . "\n";

        //tipo
        $relation.= $this->conexion->encerrar("lom:kind", $this->match("relation_kind", $this->getValue($this->conexion->getRelationKind($this->objeto))));

        //resource
        $arr = array("description", "catalog", "entry");
        $relation.=$this->getResource("resource", $this->conexion->getRelationResource($this->objeto), $arr, $this->objeto);
        //$relation.= $this->conexion->encerrar("lom:description", $this->getValue($this->conexion->getrelat($this->objeto)));

        $relation.= $this->conexion->etiquetaFinal("lom:relation");

        return $relation;
    }

    private function getXMLannotation() {
        $annotation = $this->conexion->etiquetaInicial("lom:annotation") . "\n";
        //entidad
        $annotation.= $this->conexion->encerrar("lom:entity", $this->getValue($this->conexion->getAnnotationEntity($this->objeto)));
        //fecha
        $annotation.= $this->conexion->encerrar("lom:date", $this->getValue($this->conexion->getAnnotationDate($this->objeto)));
        //descripcion
        $annotation.= $this->conexion->encerrar("lom:description", $this->getValue($this->conexion->getAnnotationDescription($this->objeto)));

        $annotation.= $this->conexion->etiquetaFinal("lom:annotation");

        return $annotation;
    }

    function getXMLclassification() {
        $classification = $this->conexion->etiquetaInicial("lom:classification") . "\n";
        //proposito
        $classification.= $this->conexion->encerrar("lom:purpose", $this->match("classification_purpose", $this->getValue($this->conexion->getClassificationPurpose($this->objeto))));
        //description
        $classification.= $this->conexion->encerrar("lom:description", $this->getValue($this->conexion->getClassificationDescription($this->objeto)));
        //palabras clave
        $classification.= $this->getLabels($this->conexion->getClassificationKeyword($this->objeto), "keyword");

        $arr = array("source", "entry", "id");
        $classification.= $this->getTaxonPath("taxonpath", $this->conexion->getClassificationTaxonPath($this->objeto), $arr);
        $classification.= $this->conexion->etiquetaFinal("lom:classification");

        return $classification;
    }

    private function getValue($result) {
        return pg_fetch_result($result, 0, 0);
    }

    private function getLabels($result, $label, $tipo = 1, $label2 = "") {
        if ($tipo == 1) {
            $values = "";
            if (sizeof($label) > 1) { // si tiene un select
                while ($data = pg_fetch_array($result)) {
                    $values.= $this->conexion->encerrar("lom:{$label['name']}", $this->match($label['data'], $data[0]), 1);
                }
            } else {
                while ($data = pg_fetch_array($result)) {
                    $values.= $this->conexion->encerrar("lom:$label", $data[0], 1);
                }
            }
        } else if ($tipo == 2) {
            $values = "";
            while ($data = pg_fetch_array($result)) {
                $str = $this->conexion->encerrar("lom:$label[0]", $data[0], 2);
                $str.=$this->conexion->encerrar("lom:$label[1]", $data[1], 2);
                $values.=$this->conexion->encerrar("lom:$label2", "\n" . $str, 1, 2);
            }
        }
        return $values;
    }

    /*
     *  $arr = array("role", "date", "entity");
      $ciclodevida.= $this->getContributes("contribute", $this->conexion->getLifeCycleContribute($this->objeto), $arr);

     */

    private function getContributes($label, $result, $labels, $tipo = 1) {
        $values = "";
        while ($data = pg_fetch_array($result)) {
            $str = $this->conexion->etiquetaInicial("lom:$label", 1) . "\n";
            $str.=$this->conexion->encerrar("lom:$labels[0]", $this->match($labels[3], $data[1]), 2);
            $str.=$this->conexion->encerrar("lom:$labels[1]", $data[2], 2);
            $rslt = "";
            if ($tipo == 1)
                $rslt = $this->conexion->getLifeCycleContribute_entity($data[0]);
            else if ($tipo == 2)
                $rslt = $this->conexion->MetaMetadataContribute_entity($data[0]);
            while ($da = pg_fetch_array($rslt)) {
                $str.=$this->conexion->encerrar("lom:$labels[2]", $da[0], 2);
            }
            $str.=$this->conexion->etiquetaFinal("lom:$label", 1);
            $values.=$str . "\n";
        }
        return $values;
    }

    private function getRequirements($label, $result, $labels) {
        $values = "";
        while ($data = pg_fetch_array($result)) {
            $str = $this->conexion->etiquetaInicial("lom:$label", 1) . "\n";
            $rs = $this->conexion->getTecnicalRequirements_orComposite($data[0]);
            while ($row = pg_fetch_array($rs)) {
                $str.=$this->conexion->encerrar("lom:$labels[0]", $this->match($labels[4], $row[0]), 2);
                $str.=$this->conexion->encerrar("lom:$labels[1]", $row[1], 2);
                $str.=$this->conexion->encerrar("lom:$labels[2]", $row[2], 2);
                $str.=$this->conexion->encerrar("lom:$labels[3]", $row[3], 2);
            }
            $str.=$this->conexion->etiquetaFinal("lom:$label", 1);
            $values.=$str . "\n";
        }
        return $values;
    }

    private function getTaxonPath($label, $result, $labels) {
        $values = "";
        while ($data = pg_fetch_array($result)) {
            $str = $this->conexion->etiquetaInicial("lom:$label", 1) . "\n";

            $str .= $this->conexion->encerrar("lom:$labels[0]", $data[1], 2);
            $rs = $this->conexion->getClassificationTaxonPath_Taxon($data[0]);
            while ($row = pg_fetch_array($rs)) {
                $str.=$this->conexion->etiquetaInicial("lom:taxon", 2) . "\n";
                $str.=$this->conexion->encerrar("lom:$labels[1]", trim($row[0]), 3, 1);
                $str.=$this->conexion->encerrar("lom:$labels[2]", trim($row[1]), 3, 1);
                $str.=$this->conexion->etiquetaFinal("lom:taxon", 2) . "\n";
            }
//            $rs = $this->conexion->getClassificationTaxonPath_Taxon($data[0]);
//            while ($row = pg_fetch_array($rs)) {
//                $str.=$this->conexion->encerrar("lom:$labels[2]", trim($row[1]), 2, 1);
//            }
            $str.=$this->conexion->etiquetaFinal("lom:$label", 1);
            $values.=$str . "\n";
        }

        return $values;
    }

    private function getResource($label, $result, $labels, $objeto) {
        $values = "";
        while ($data = pg_fetch_array($result)) {
            $str = $this->conexion->etiquetaInicial("lom:$label", 1) . "\n";
            $rs = $this->conexion->getRelationResourceDescription($objeto);
            while ($row = pg_fetch_array($rs)) {
                $str.=$this->conexion->encerrar("lom:$labels[0]", trim($row[0]), 2);
            }
            $rs = $this->conexion->getRelationResourceIdentifier($objeto);
            $rs = $this->conexion->getRelationResourceDescription($objeto);
            while ($row = pg_fetch_array($rs)) {
                $str.=$this->conexion->encerrar("lom:$labels[1]", trim($row[0]), 2);
                $str.=$this->conexion->encerrar("lom:$labels[2]", trim($row[0]), 2);
            }
            $str.=$this->conexion->etiquetaFinal("lom:$label", 1);
            $values.=$str . "\n";
        }
        return $values;
    }

}

?>
