<?php

/* -----
  $filePath = "files/importadorr.xml";
  $dir = fopen($filePath, "w+");
  fwrite($dir, "$value");
  fclose($dir);
  -------------- */

class importador {

    var $file;
    var $objeto;
    var $conexion;
    var $namespace;
    var $data;

    function __construct($file) {



        $this->file = $file;
        $this->conexion = new conector_pg();
        $this->namespace = "http://ltsc.ieee.org/xsd/LOM";
        $this->data = array();
        $this->loadData();
    }

    function loadData() {
        $this->data['general_structure']["atomic"] = 1;
        $this->data['general_structure']["collection"] = 2;
        $this->data['general_structure']["networked"] = 3;
        $this->data['general_structure']["hierarchical"] = 4;
        $this->data['general_structure']["linear"] = 5;

        $this->data['lifecycle_status']["draft"] = 1;
        $this->data['lifecycle_status']["final"] = 2;
        $this->data['lifecycle_status']["revised"] = 3;
        $this->data['lifecycle_status']["linear"] = 4;


        #check this value
        $this->data['lifecycle_role']["author"] = 1;
        $this->data['lifecycle_role']["publisher"] = 2;
        $this->data['lifecycle_role']["unknown"] = 3;
        $this->data['lifecycle_role']["initiator"] = 4;
        $this->data['lifecycle_role']["terminator"] = 5;
        $this->data['lifecycle_role']["validator"] = 6;
        $this->data['lifecycle_role']["editor"] = 7;
        $this->data['lifecycle_role']["graphical designer"] = 8;
        $this->data['lifecycle_role']["technical implementer"] = 9;
        $this->data['lifecycle_role']["content provider"] = 10;
        $this->data['lifecycle_role']["technical validator"] = 11;
        $this->data['lifecycle_role']["educational validator"] = 12;
        $this->data['lifecycle_role']["script writer"] = 13;
        $this->data['lifecycle_role']["instructional designer"] = 14;
        $this->data['lifecycle_role']["subject matter expert"] = 15;


        #check this value
        $this->data['metametadata_role']["creator"] = 1;
        $this->data['metametadata_role']['validator'] = 2;


        #check this value 
        $this->data['technical_type']['operating system'] = 1;
        $this->data['technical_type']['browser'] = 2;



        #check this value (importString2)
        $this->data['educational_learningResourceType']['exercise'] = 1;
        $this->data['educational_learningResourceType']['simulation'] = 2;
        $this->data['educational_learningResourceType']['questionnaire'] = 3;
        $this->data['educational_learningResourceType']['diagram'] = 4;
        $this->data['educational_learningResourceType']['figure'] = 5;
        $this->data['educational_learningResourceType']['graph'] = 6;
        $this->data['educational_learningResourceType']['index'] = 7;
        $this->data['educational_learningResourceType']['slide'] = 8;
        $this->data['educational_learningResourceType']['table'] = 9;
        $this->data['educational_learningResourceType']['narrative text'] = 10;
        $this->data['educational_learningResourceType']['exam'] = 11;
        $this->data['educational_learningResourceType']['experiment'] = 12;
        $this->data['educational_learningResourceType']['problem statement'] = 13;
        $this->data['educational_learningResourceType']['self assessment'] = 14;
        $this->data['educational_learningResourceType']['lecture'] = 15;


        $this->data['educational_interactivityLevel']['very low'] = 1;
        $this->data['educational_interactivityLevel']['low'] = 2;
        $this->data['educational_interactivityLevel']['medium'] = 3;
        $this->data['educational_interactivityLevel']['high'] = 4;
        $this->data['educational_interactivityLevel']['very high'] = 5;


        $this->data['educational_semanticDensity']['very low'] = 1;
        $this->data['educational_semanticDensity']['low'] = 2;
        $this->data['educational_semanticDensity']['medium'] = 3;
        $this->data['educational_semanticDensity']['high'] = 4;
        $this->data['educational_semanticDensity']['very high'] = 5;


        #check (importString2)
        $this->data['educational_intendedEndUserRole']['teacher'] = 1;
        $this->data['educational_intendedEndUserRole']['author'] = 2;
        $this->data['educational_intendedEndUserRole']['learner'] = 3;
        $this->data['educational_intendedEndUserRole']['manager'] = 4;

        #check (importString2)
        $this->data['educational_context']['school'] = 1;
        $this->data['educational_context']['higher education'] = 2;
        $this->data['educational_context']['training'] = 3;
        $this->data['educational_context']['other'] = 4;


        $this->data['educational_difficulty']['very easy'] = 1;
        $this->data['educational_difficulty']['easy'] = 2;
        $this->data['educational_difficulty']['medium'] = 3;
        $this->data['educational_difficulty']['difficult'] = 4;
        $this->data['educational_difficulty']['very difficult'] = 5;



        $this->data['rights_cost']['yes'] = 1;
        $this->data['rights_cost']['no'] = 2;


        $this->data['rights_copyRights']['yes'] = 1;
        $this->data['rights_copyRights']['no'] = 2;


        $this->data['relation_kind']['ispartof'] = 1;
        $this->data['relation_kind']['haspart'] = 2;
        $this->data['relation_kind']['isversionof'] = 3;
        $this->data['relation_kind']['hasversion'] = 4;
        $this->data['relation_kind']['isformatof'] = 5;
        $this->data['relation_kind']['hasformat'] = 6;
        $this->data['relation_kind']['references'] = 7;
        $this->data['relation_kind']['isreferencedby'] = 8;
        $this->data['relation_kind']['isbasedon'] = 9;
        $this->data['relation_kind']['isbasisfor'] = 10;
        $this->data['relation_kind']['requires'] = 11;
        $this->data['relation_kind']['isrequiredby'] = 12;


        $this->data['classification_purpose']['discipline'] = 1;
        $this->data['classification_purpose']['idea'] = 2;
        $this->data['classification_purpose']['prerequisite'] = 3;
        $this->data['classification_purpose']['educational objective'] = 4;
        $this->data['classification_purpose']['accessibility'] = 5;
        $this->data['classification_purpose']['restrictions'] = 6;
        $this->data['classification_purpose']['educational level'] = 7;
        $this->data['classification_purpose']['skill level'] = 8;
        $this->data['classification_purpose']['security level'] = 9;
        $this->data['classification_purpose']['competency'] = 10;
    }

    function match($field, $name) {
        return $this->data[$field][$name];
    }

    function import() {


        $this->generateID();
        $doc = new DOMDocument();
        $doc->load($this->file);
        $this->importTabs($doc);
        $this->createXML();
    }

    private function generateID() {
        $this->objeto = $this->conexion->lastValue("lo", "idlo");
        $this->conexion->insertar("lom", "idlo", $this->objeto);
    }

    private function createXML() {
        $exportador = new exportador($this->objeto);
        $exportador->addText($this->conexion->etiquetaInicial('lom:lom xmlns:lom="http://ltsc.ieee.org/xsd/LOM" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://ltsc.ieee.org/xsd/LOM http://ltsc.ieee.org/xsd/lomv1.0/lom.xsd"'));
        $exportador->getTabs();
        $exportador->addText($this->conexion->etiquetaFinal("lom:lom"));
        $exportador->guardar();
    }

    private function importTabs($doc) {

        $this->importGeneral($doc);
        $this->importLifeCycle($doc);
        $this->importMetaMetadata($doc);
        $this->importTechnical($doc);
        $this->importEducational($doc);
        $this->importRights($doc);
        $this->importRelation($doc);
        $this->importAnnotation($doc);
        $this->importClassification($doc);
    }

    private function importGeneral($doc) {
        $category = "general";
        $tagGeneral = $doc->getElementsByTagNameNS($this->namespace, $category);




        foreach ($tagGeneral as $tg) {
            //identifier
            $this->importIdentifiers($tg, "identifier", array("catalog", "entry"), "general_identifier");
            //title            
            $this->importString1($tg, "title", $category);
            //language
            $this->importString2($tg, "language", $category);
            //description
            $this->importString2($tg, "description", $category);
            //keywords
            $this->importString2($tg, "keyword", $category);
            //ambito coverage 
            $this->importString2($tg, "coverage", $category);
            //structure
            $this->importString1($tg, "structure", $category, "general_structure");
            //aggregationlevel
            $this->importString1($tg, "aggregationlevel", $category);
        }
    }

    private function importLifeCycle($doc) {
        $category = "lifecycle";
        $tagGeneral = $doc->getElementsByTagNameNS($this->namespace, $category);

        foreach ($tagGeneral as $tg) {
            $this->importString1($tg, "version", $category);
            $this->importString1($tg, "status", $category, "lifecycle_status");

            //contribute
            $tag1 = array("role", "date", "entity");
            $this->importContributes($tg, "contribute", $tag1, "LifeCycle_contribute", "idLifeCycleContribute", "LifeCycleContribute_entity");
        }
    }

    private function importMetaMetadata($doc) {
        $category = "metametadata";
        $tagGeneral = $doc->getElementsByTagNameNS($this->namespace, $category);

        foreach ($tagGeneral as $tg) {
            //identifier 
            $this->importIdentifiers($tg, "identifier", array("catalog", "entry"), " MetaMetadata_Identifier");
            //contribute
            $tag1 = array("role", "date", "entity");
            $this->importContributes($tg, "contribute", $tag1, "MetaMetadata_contribute", "idMetaMetadataContribute", "MetaMetadataContribute_entity");
            //metadataschema
            $this->importString2($tg, "metadataschema", $category);
            //  language 
            $this->importString1($tg, "language", $category);
        }
    }

    private function importTechnical($doc) {
        $category = "technical";
        $tagGeneral = $doc->getElementsByTagNameNS($this->namespace, $category);

        foreach ($tagGeneral as $tg) {
            //format
            $this->importString2($tg, "format", $category);
            //size
            $this->importString1($tg, "size", $category);
            //location
            $this->importString2($tg, "location", $category);
            //installationremarks
            $this->importString1($tg, "installationremarks", $category);
            //otherplatformrequirements
            $this->importString1($tg, "otherplatformrequirements", $category);  #check this value
            //duration
            $this->importString1($tg, "duration", $category);
        }
    }

    private function importEducational($doc) {
        $category = "educational";
        $tagGeneral = $doc->getElementsByTagNameNS($this->namespace, $category);

        foreach ($tagGeneral as $tg) {
            //interactivitytype
            $this->importString1($tg, "interactivitytype", $category);
            //learningresourcetype
            $this->importString2($tg, "learningresourcetype", $category);
            //interactivitylevel
            $this->importString1($tg, "interactivitylevel", $category, "educational_interactivityLevel");
            //semanticdensity
            $this->importString1($tg, "semanticdensity", $category, "educational_semanticDensity");
            // intendedenduserrole
            $this->importString2($tg, "intendedenduserrole", $category);
            //context
            $this->importString2($tg, "context", $category);
            //typicalagerange
            $this->importString2($tg, "typicalagerange", $category);
            //difficulty
            $this->importString1($tg, "difficulty", $category, "educational_difficulty");
            //typicallearningtime
            $this->importString1($tg, "typicallearningtime", $category);
            //description
            $this->importString2($tg, "description", $category);
            //language
            $this->importString2($tg, "language", $category);
        }
    }

    private function importRights($doc) {
        $category = "rights";
        $tagGeneral = $doc->getElementsByTagNameNS($this->namespace, $category);

        foreach ($tagGeneral as $tg) {
            $this->importString1($tg, "cost", $category, "rights_cost");
            $this->importString1($tg, "copyrightandotherrestrictions", $category, "rights_copyRights");
            $this->importString1($tg, "description", $category);
        }
    }

    private function importRelation($doc) {
        $category = "relation";
        $tagGeneral = $doc->getElementsByTagNameNS($this->namespace, $category);

        foreach ($tagGeneral as $tg) {
            //tipo
            $this->importString1($tg, "kind", $category, "relation_kind");
            //resource
            $tags = array("description", "catalog", "entry");
            $this->importRelationResource($tg, "resource", $tags, "Relation_resource", "idRelationResource", "Resource_description", "Resource_identifier");
        }
    }

    private function importAnnotation($doc) {
        $category = "annotation";
        $tagGeneral = $doc->getElementsByTagNameNS($this->namespace, $category);

        foreach ($tagGeneral as $tg) {
            $this->importString1($tg, "entity", $category);
            $this->importString1($tg, "date", $category);
            $this->importString1($tg, "description", $category);
        }
    }

    private function importClassification($doc) {
        $category = "classification";
        $tagGeneral = $doc->getElementsByTagNameNS($this->namespace, $category);

        foreach ($tagGeneral as $tg) {
            //purpose
            $this->importString1($tg, "purpose", $category, "classification_purpose");
            //taxon_path
            $tag1 = array("source", "entry", "id");
            $this->importTaxonPath($tg, "taxonpath", $tag1, "Classification_taxonPath", "idClassificationTaxonPath", "TaxonPath_taxon");
            //description
            $this->importString1($tg, "description", $category);
            //keyword
            $this->importString2($tg, "keyword", $category);
        }
    }

    private function importString1($result, $label, $category, $nomatch = "") {
        $data = $result->getElementsByTagNameNS($this->namespace, $label);
        $value = $data->item(0)->nodeValue;
        if ($nomatch == "")
            $this->conexion->actualizar("lom", $category . "_" . $label, $value, "idlo", $this->objeto);
        else {
            $this->conexion->actualizar("lom", $category . "_" . $label, $this->data[$nomatch][$value], "idlo", $this->objeto);
        }
    }

    private function importString2($result, $label, $category) {
        $data = $result->getElementsByTagNameNS($this->namespace, $label);
        for ($i = 0; $i < ($data->length); $i++) {
            $value = $data->item($i)->nodeValue;
            $this->conexion->realizarOperacion("INSERT INTO " . $category . "_" . $label . "(idlo,$label) VALUES (" . $this->objeto . ",'" . $value . "')");
            //  $this->conexion->actualizar("lom", $category . "_" . $label, $value, "idlo", $this->objeto);
        }
    }

    private function importIdentifiers($result, $label, $tags, $table) {
        $data = $result->getElementsByTagNameNS($this->namespace, $label);
        foreach ($data as $datas) {
            $d = $datas->getElementsByTagNameNS($this->namespace, $tags[0]);
            $catalog = $d->item(0)->nodeValue;
            $d = $datas->getElementsByTagNameNS($this->namespace, $tags[1]);
            $entry = $d->item(0)->nodeValue;
            $this->conexion->realizarOperacion("INSERT INTO $table(idlo,catalog,entry) VALUES(" . $this->objeto . ",'$catalog','$entry')");
        }
    }

    private function importContributes($result, $label, $tags, $t1, $pk1, $t2) {
        $data = $result->getElementsByTagNameNS($this->namespace, $label);
        foreach ($data as $datas) {
            $roles = $datas->getElementsByTagNameNS($this->namespace, $tags[0]);
            $role = $roles->item(0)->nodeValue;
            $dates = $datas->getElementsByTagNameNS($this->namespace, $tags[1]);
            $date = $dates->item(0)->nodeValue;
            $query = "INSERT INTO $t1(idlo,role,date) VALUES(" . $this->objeto . ",'$role','$date')";
            // echo ">>$query";
            $this->conexion->realizarOperacion($query);
            $last = $this->conexion->lastValue($t1, $pk1);
            $entities = $datas->getElementsByTagNameNS($this->namespace, $tags[2]);
            for ($i = 0; $i < ($entities->length); $i++) {
                $value = $entities->item($i)->nodeValue;
                $this->conexion->realizarOperacion("INSERT INTO $t2($pk1,$tags[2]) VALUES ($last,'" . $value . "')");
            }
        }
    }

    private function importTaxonPath($result, $label, $tags, $t1, $pk1, $t2) {
        $data = $result->getElementsByTagNameNS($this->namespace, $label);
        foreach ($data as $datas) {
            $sources = $datas->getElementsByTagNameNS($this->namespace, $tags[0]);
            $source = $sources->item(0)->nodeValue;
            $query = "INSERT INTO $t1(idlo,source) VALUES(" . $this->objeto . ",'$source')";
            $this->conexion->realizarOperacion($query);
            $last = $this->conexion->lastValue($t1, $pk1);
            $entities = $datas->getElementsByTagNameNS($this->namespace, $tags[1]);
            $ids = $datas->getElementsByTagNameNS($this->namespace, $tags[2]);
            for ($i = 0; $i < ($entities->length); $i++) {
                $value = $entities->item($i)->nodeValue;
                $id = $ids->item(0)->nodeValue;
                $this->conexion->realizarOperacion("INSERT INTO $t2($pk1,$tags[1],$tags[2]) VALUES ($last,'" . $value . "','" . $id . "')");
            }
        }
    }

    private function importRequirements($result, $label, $tags, $t1, $pk1, $t2) {
        $data = $result->getElementsByTagNameNS($this->namespace, $label);
        foreach ($data as $datas) {

            $sources = $datas->getElementsByTagNameNS($this->namespace, $tags[0]);
            $source = $sources->item(0)->nodeValue;
            $query = "INSERT INTO $t1(idlo,source) VALUES(" . $this->objeto . ",'$source')";
            $this->conexion->realizarOperacion($query);
            $last = $this->conexion->lastValue($t1, $pk1);
            $entities = $datas->getElementsByTagNameNS($this->namespace, $tags[1]);
            for ($i = 0; $i < ($entities->length); $i++) {
                $value = $entities->item($i)->nodeValue;
                $this->conexion->realizarOperacion("INSERT INTO $t2($pk1,$tags[1]) VALUES ($last,'" . $value . "')");
            }
        }
    }

    private function importRelationResource($result, $label, $tags, $t1, $pk1, $t2, $t3) {
        $data = $result->getElementsByTagNameNS($this->namespace, $label);
        foreach ($data as $datas) {
            $this->conexion->realizarOperacion("INSERT INTO $t1(idlo) VALUES(" . $this->objeto . ")");
            $last = $this->conexion->lastValue($t1, $pk1);
            $descriptions = $datas->getElementsByTagNameNS($this->namespace, $tags[0]);
            for ($i = 0; $i < ($descriptions->length); $i++) {
                $value = $descriptions->item($i)->nodeValue;
                $this->conexion->realizarOperacion("INSERT INTO $t2($pk1,$tags[0]) VALUES ($last,'" . $value . "')");
            }
        }
    }

}

?>
