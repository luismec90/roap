<?php

//$connection = pg_connect("user=postgres password=123 port=5432 dbname=ROAC host=localhost");
class conector_pg {

    private static $instance;
    var $host;
    var $bd;
    var $usuario;
    var $password;
    var $link;

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new conector_pg();
        }
        return self::$instance;
    }

    function __construct() {
        $this->host = 'localhost';
        $this->bd = 'roap';
        $this->usuario = 'postgres';
        $this->password = '123';
        $link = pg_connect("host='$this->host' dbname='$this->bd' user='$this->usuario' password='$this->password'");
        $this->link = $link;
    }

//    function __construct() {
//        $this->host = 'localhost';
//        $this->bd = 'roap';
//        $this->usuario = 'postgres';
//        $this->password = '123';
//        $link = pg_connect("host='$this->host' dbname='$this->bd' user='$this->usuario' password='$this->password' port=5433");
//        $this->link = $link;
//    }

    function obtenerDatosUsuario($campo, $iduser) {
        $query = "SELECT $campo FROM users WHERE iduser= $iduser";
        $result = pg_query($this->link, $query);
        return $result;
    }

    function realizarOperacion($query) {
        $resultado = pg_query($this->link, $query);
        return $resultado;
    }

    ////////Eliminar Objeto//////
    function eliminarOa($idlo) {
        $query = "delete from lo where idlo=$idlo";
        $resultado = pg_query($this->link, $query);
        return $resultado;
    }

    //Obtenr los Objetos de aprendizaje pertenecientesa una coleccion ///////
    function obtenerObjetosDeColeccion($idlo) {
        $query = "select idlo from lo natural join lom where idsubcollection='$idlo' and idlo not in (select idlo from pending)";
        $resultado = pg_query($this->link, $query);
        return $resultado;
    }

    function obtenerObjetosDeColeccionOrdenados($idlo, $order) {
        $query = "select idlo from lo natural join lom where idsubcollection='$idlo' and idlo not in (select idlo from pending) ORDER BY $order";
        $resultado = pg_query($this->link, $query);
        return $resultado;
    }

///////////////// O T H E R S  /////////////

    function getAllLo() {
        $query = "SELECT idlo,general_title FROM lom where idlo not in (select idlo from pending)";
        $result = pg_query($this->link, $query);
        return $result;
    }

/////////////////// G E N E R A L /////////////////////////////////////////////////////
    function getGeneralIdentifier($idlo) {

        $query = "SELECT catalog,entry FROM lom  NATURAL JOIN General_identifier WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getGeneralTitle($idlo) {

        $query = "SELECT general_title FROM lom WHERE idlo=$idlo order by general_title";
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getGeneralLanguage($idlo) {

        $query = "SELECT language FROM lom  NATURAL JOIN General_language WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getGeneralDescription($idlo) {

        $query = "SELECT description FROM lom  NATURAL JOIN General_description WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getGeneralKeyword($idlo) {

        $query = "SELECT keyword FROM lom  NATURAL JOIN General_keyword WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getGeneralCoverage($idlo) {

        $query = "SELECT coverage FROM lom  NATURAL JOIN General_coverage WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getGeneralStructure($idlo) {

        $query = "SELECT general_structure FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getGeneralAggregationLevel($idlo) {

        $query = "SELECT general_aggregationLevel FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

/////////////////// L I F E  -  C Y C L E /////////////////////////////////////////////////////


    function getLifeCycleVersion($idlo) {

        $query = "SELECT lifecycle_version FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getLifeCycleStatus($idlo) {

        $query = "SELECT lifecycle_status FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getLifeCycleContribute($idlo) {

        $query = "SELECT idLifeCycleContribute,role,date FROM lom NATURAL JOIN LifeCycle_Contribute WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getLifeCycleContribute_entity($id) {

        $query = "SELECT entity FROM LifeCycle_contribute NATURAL JOIN LifeCycleContribute_entity WHERE idLifeCycleContribute=" . $id;
        $result = pg_query($this->link, $query);
        return $result;
    }

/////////////////// M E T A  -  M E T A D A T A  /////////////////////////////////////////////////////
    function getMetaMetadataIdentifier($idlo) {

        $query = "SELECT catalog,entry FROM lom NATURAL JOIN MetaMetadata_Identifier WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getMetaMetadataContribute($idlo) {

        $query = "SELECT idMetaMetadataContribute,role,date FROM lom NATURAL JOIN MetaMetadata_contribute WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function MetaMetadataContribute_entity($id) {

        $query = "SELECT entity FROM MetaMetadata_contribute NATURAL JOIN MetaMetadataContribute_entity WHERE idMetaMetadataContribute=" . $id;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getMetaMetadataSchema($idlo) {

        $query = "SELECT metadataschema FROM lom NATURAL JOIN MetaMetadata_metadataschema WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getMetaMetadataLanguage($idlo) {

        $query = "SELECT metametadata_language FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

/////////////////// T E C H N I C A L  /////////////////////////////////////////////////////

    function getTechnicalFormat($idlo) {

        $query = "SELECT format FROM lom NATURAL JOIN Technical_format WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getTechnicalSize($idlo) {

        $query = "SELECT technical_size FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getTechnicalLocation($idlo, $first = false) {

        if ($first)
            $query = "SELECT location FROM lom NATURAL JOIN Technical_location WHERE idlo=" . $idlo . " ORDER BY idtechnicallocation LIMIT 1";
        else
            $query = "SELECT location FROM lom NATURAL JOIN Technical_location WHERE idlo=" . $idlo;

        $result = pg_query($this->link, $query);
        return $result;
    }

    function getTechnicalRequirements($idlo) {

        $query = "SELECT idTechnicalRequirements FROM lom NATURAL JOIN Technical_requirements WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getTecnicalRequirements_orComposite($id) {

        $query = "SELECT type,name,minimumVersion,maximumVersion FROM Technical_requirements NATURAL JOIN Requirements_orComposite WHERE idTechnicalRequirements=" . $id;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getTechnicalInstallationRemarks($idlo) {

        $query = "SELECT technical_installationRemarks FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getTechnicalOtherPlataformsRequirements($idlo) {

        $query = "SELECT technical_otherPlatformRequirements FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getTechnicalDuration($idlo) {

        $query = "SELECT technical_duration FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

/////////////////// E D U C A T I O N A L  /////////////////////////////////////////////////////



    function getEducationalInteractivityType($idlo) {

        $query = "SELECT educational_interactivityType FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getEducationalLearningResourceType($idlo) {

        $query = "SELECT LearningResourceType FROM lom NATURAL JOIN Educational_learningResourceType WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getEducationalInteractivityLevel($idlo) {

        $query = "SELECT educational_interactivityLevel FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getEducationalSemanticDensity($idlo) {

        $query = "SELECT educational_semanticDensity FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

//ojo
    function getEducationalIntendedEndUserRole($idlo) {

        $query = "SELECT intendedEndUserRole FROM lom NATURAL JOIN Educational_intendedEndUserRole WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getEducationalContext($idlo) {

        $query = "SELECT context FROM lom NATURAL JOIN Educational_context WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getEducationalTypicalAgeRange($idlo) {

        $query = "SELECT typicalAgeRange FROM lom NATURAL JOIN Educational_typicalAgeRange WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getEducationalDifficulty($idlo) {

        $query = "SELECT educational_difficulty FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getEducationalTypicalLearningTime($idlo) {

        $query = "SELECT educational_typicalLearningTime FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getEducationalDescription($idlo) {

        $query = "SELECT description FROM lom NATURAL JOIN Educational_description WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getEducationalLanguage($idlo) {

        $query = "SELECT language FROM lom NATURAL JOIN Educational_language WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

/////////////////// R I G H T S  /////////////////////////////////////////////////////
    function getRightsCost($idlo) {

        $query = "SELECT rights_cost FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getRightsCopyRightsAndOtherRestrictions($idlo) {

        $query = "SELECT rights_copyRightAndOtherRestrictions FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getRightsDescription($idlo) {

        $query = "SELECT rights_description FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

/////////////////// R E L A T I O N  /////////////////////////////////////////////////////

    function getRelationKind($idlo) {

        $query = "SELECT relation_kind FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getRelationResource($idlo) {

        $query = "SELECT idRelationResource FROM lom NATURAL JOIN Relation_resource WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getRelationResourceDescription($id) {

        $query = "SELECT description FROM Relation_resource NATURAL JOIN Resource_description WHERE idlo=" . $id;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getRelationResourceIdentifier($id) {

        $query = "SELECT catalog,entry FROM Relation_resource NATURAL JOIN Resource_identifier WHERE idlo=" . $id;
        $result = pg_query($this->link, $query);
        return $result;
    }

/////////////////// A N N O T A T I O N  /////////////////////////////////////////////////////

    function getAnnotationEntity($idlo) {

        $query = "SELECT annotation_entity FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getAnnotationDate($idlo) {

        $query = "SELECT annotation_date FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getAnnotationDescription($idlo) {

        $query = "SELECT annotation_description FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

/////////////////// C L A S S I F I C A T I O N  /////////////////////////////////////////////////////


    function getClassificationPurpose($idlo) {

        $query = "SELECT classification_purpose FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getClassificationTaxonPath($idlo) {

        $query = "SELECT idClassificationTaxonPath,source FROM lom NATURAL JOIN Classification_taxonPath WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getClassificationTaxonPath_Taxon($id) {

        $query = "SELECT entry,id FROM TaxonPath_taxon NATURAL JOIN Classification_taxonPath WHERE idClassificationTaxonPath=" . $id;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getClassificationDescription($idlo) {

        $query = "SELECT classification_description FROM lom WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getClassificationKeyword($idlo) {

        $query = "SELECT keyword FROM lom NATURAL JOIN Classification_keyword WHERE idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getPendientLo($idlo) {

        $query = "SELECT idlo,general_title FROM lom WHERE idlo in (select idlo from partialsave where iduser=" . $idlo . ")";
        $result = pg_query($this->link, $query);
        return $result;
    }

    function eliminarIdlo($idlo) {

        $query = "delete from lom where idlo=" . $idlo;
        $result = pg_query($this->link, $query);
        return $result;
    }

    function insertLO($col, $u) {

        $query = "insert into lo(iduser,insertionDate,idSubcollection) values($u,current_date,$col)";
        pg_query($this->link, $query);
    }

    function getAllCollections() {

        $query = "SELECT idCollection,name FROM Collection order by name";
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getAllSubCollections($idc) {

        $query = "SELECT s.idSubcollection,s.name FROM Subcollection s where idcollection=$idc order by s.name";
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getCountSubCollections($idc) {

        $query = "SELECT s.idSubcollection,s.name FROM Subcollection s where idcollection=$idc order by s.name";
        $result = pg_query($this->link, $query);
        return $result;
    }

    function lastValue2($table, $column) {

        $query = "select max($column) from $table";
        $result = pg_query($this->link, $query);
        while ($data = pg_fetch_array($result)) {
            return $data[0];
        }
    }

    function getLocation($id) {

        $query = "SELECT c.idcollection || '/' || sc.idsubcollection || '/' AS location FROM lo l, collection c, subCollection sc WHERE l.idlo=$id AND l.idSubCollection = sc.idSubCollection AND sc.idCollection = c.idCollection";
        $result = pg_query($this->link, $query);
        while ($data = pg_fetch_array($result)) {
            return $data[0];
        }
    }

//Estas se agregaron!

    function TopN($n) {

        $query = "SELECT idlo FROM lo where idlo not in (select idlo from pending where iduserfrom=iduserto) order by insertionDate desc limit $n";
        $result = pg_query($this->link, $query);
        return $result;
    }

    function TopNOrdenados($n, $order, $pos, $pos2) {

        //$query = "SELECT idlo FROM lo natural join lom where idlo not in (select idlo from pending where iduserfrom=iduserto) $order ";
        $query = "SELECT lo.idlo
             FROM users natural join lo left outer join 
             lom on (lom.idlo=lo.idlo) left outer join rating on(lo.idlo=rating.idlo) WHERE lo.idlo not in (select idlo from pending where iduserfrom=iduserto)
             GROUP BY lo.idlo 
            $order LIMIT $pos2 OFFSET $pos";
        $result = pg_query($this->link, $query);
//        echo "<script>
//                alert($query);
//               <script> ";
//        echo "-->>" . $query;
        return $result;
    }

    function getUploadBy($id) {

        $query = "SELECT name,lastname from Users natural join lo where idlo=$id";
        $result = pg_query($this->link, $query);
        while ($data = pg_fetch_array($result)) {
            $nombre = "$data[0] $data[1]";
            return $nombre;
        }
    }

    function ejecutarSELECT($query) {

        $result = pg_query($this->link, $query);
        return $result;
    }

    function ejecutarDML($query) {

        pg_query($this->link, $query);
    }

    function getLoInsertionDate($id) {

        $query = "select insertionDate from lo where idlo=$id";
        $result = pg_query($this->link, $query);
        while ($data = pg_fetch_array($result)) {
            return $data[0];
        }
    }

    function cantidadPendientes($iduser) {
        $query = "select count(*) from pending where iduserto= $iduser ";
        $result = pg_query($this->link, $query);
        return $result;
    }

    function obtenerPendientes($iduser) {
        $query = "select * from pending where iduserto= $iduser AND type <> 11";
        $result = pg_query($this->link, $query);
        return $result;
    }

    function obtenerNotificaciones($iduser) {
        $query = "select * from pending where iduserto='$iduser' and type='11'";
        $result = pg_query($this->link, $query);
        return $result;
    }

    function obtenerHistorial($iduser) {
        $query = "select * from grants where iduserto= $iduser";
        $result = pg_query($this->link, $query);
        return $result;
    }

    function obtenerRating($idlo) {
        $query = "select avg(valoration) from rating where idlo=$idlo";
        $result = pg_query($this->link, $query);
        return $result;
    }

    function contarVotos($idlo) {
        $query = "select count(*) from rating where idlo=$idlo";
        $result = pg_query($this->link, $query);
        return $result;
    }

//--------------------------------------
//   Funciones para Exportar OA a XML
//--------------------------------------


    function getLOXML($idlo) {

        $query = "SELECT xmlo FROM lo WHERE idlo=$idlo";
        $result = pg_query($this->link, $query);
        return $result;
    }

    function getXMLo($idlo) {
        return $xmlo = pg_fetch_result($this->getLOXML($idlo), 0, 0);
    }

    function etiquetar($etiqueta, $text) {
        return "<" . strtolower($etiqueta) . ">" . strtolower($text) . "</" . strtolower($etiqueta) . ">";
    }

    function etiquetaInicial($etiqueta, $ns = 0, $lower = true) {
        $spc = "";
        for ($i = 0; $i < $ns; $i++)
            $spc.="\t";
        if ($lower)
            return $spc . "<" . strtolower($etiqueta) . ">";
        else {
            return $spc . "<" . $etiqueta . ">";
        }
    }

    function etiquetaFinal($etiqueta, $ns = 0) {
        $spc = "";
        for ($i = 0; $i < $ns; $i++)
            $spc.="\t";
        return $spc . "</" . strtolower($etiqueta) . ">";
    }

    function etiquetarLangString($etiqueta, $texto, $idlo) {
        $language = pg_fetch_result($this->getMetaMetadataLanguage($idlo), 0, 0);
        $str = "";
        if ($language == null) {
            $str.="<string>" . $texto . "</string>" . "\n";
        } else {
            $str.="<string language='$language'>" . $texto . "</string>\n";
        }
        return $this->encerrar($etiqueta, $str);
    }

    function etiquetarDateTime($etiqueta, $texto, $idlo) {
        $str = "<dateTime uniqueElementName='dateTime'>" . $texto . "</dateTime>\n";
        //$str.=$this->etiquetarLangstring("description");
        return $this->encerrar($etiqueta, $str);
    }

    function etiquetarVocabulary($etiqueta, $texto) {
        $str = "<source uniqueElementName='source'>LOM-ESv1.0</source>\n";
        $str.="<value uniqueElementName='value'>" . $texto . "</value>\n";
        return $this->encerrar($etiqueta, $str);
    }

    function encerrar($etiqueta, $texto, $ns = 1, $tipo = 1) {
        if ($tipo == 1) { // horizontal
            $spc = "";
            for ($i = 0; $i < $ns; $i++)
                $spc.="\t";
            $str = $this->etiquetaInicial($etiqueta);
            $str.=($texto == "") ? " " : $texto;
            //$str.=$texto;
            $str.=$this->etiquetaFinal($etiqueta);
            return $spc . $str . "\n";
        } else if ($tipo == 2) {  //vertical
            $spc = "";
            for ($i = 0; $i < $ns; $i++)
                $spc.="\t";
            $str = $spc . $this->etiquetaInicial($etiqueta);
            $str.=($texto == "") ? " " : $texto;
            //$str.=$texto;
            $str.=$spc . $this->etiquetaFinal($etiqueta);
            return $str . "\n";
        }
    }

    function getTitleLo($idlo) {
        return $title = pg_fetch_result($this->getGeneralTitle($idlo), 0, 0);
    }

    function getXML($idlo) {
        $str = $this->getGeneral($idlo) . "\n";
        $str.=$this->getLifeCycle($idlo) . "\n"; //listo
        $str.=$this->getMetaMetaData($idlo) . "\n";
        $str.=$this->getTechnical($idlo) . "\n";
        $str.=$this->getEducational($idlo) . "\n";
        $str.=$this->getRights($idlo) . "\n";
        $str.=$this->getRelation($idlo) . "\n";
        $str.=$this->getAnnotation($idlo) . "\n";
        $str.=$this->getClassification($idlo) . "\n";
        $contenido = $this->encerrar("LOM", $str);
        $contenido = $this->Formatear($contenido);
        return $this->getHeader() . "\n" . $contenido;
    }

///////////  C A B E C E R A ///////////

    function getHeader() {
        return "<?xml version='1.0' encoding='UTF-8'?>";
    }

    function Formatear($contenido) {

        $contenido = preg_replace("[á]", "a", $contenido);
        $contenido = preg_replace("[é]", "e", $contenido);
        $contenido = preg_replace("[í]", "i", $contenido);
        $contenido = preg_replace("[ó]", "o", $contenido);
        $contenido = preg_replace("[ú]", "u", $contenido);
        $contenido = preg_replace("[�?]", "A", $contenido);
        $contenido = preg_replace("[É]", "E", $contenido);
        $contenido = preg_replace("[�?]", "I", $contenido);
        $contenido = preg_replace("[Ó]", "O", $contenido);
        $contenido = preg_replace("[Ú]", "U", $contenido);
        $contenido = preg_replace("[Ñ]", "NI", $contenido);
        $contenido = preg_replace("[ñ]", "ni", $contenido);

        return $contenido;
    }

////////////// G E N E R A L  ////////////////////////////
    function getGeneral($idlo) {

        $str = $this->getIdentifiersGeneral($idlo) . "\n";
        $str.=$this->getTitleGeneral($idlo) . "\n";
        $str.=$this->getLanguageGeneral($idlo) . "\n";
        $str.=$this->getDescriptionGeneral($idlo) . "\n";
        $str.=$this->getKeywordsGeneral($idlo) . "\n";
        $str.=$this->getCoveragesGeneral($idlo) . "\n";
        $str.=$this->getStructureGeneral($idlo) . "\n";
        $str.=$this->getAggregationLevelGeneral($idlo) . "\n";

        return $this->encerrar("general", $str) . "\n";
    }

    function getIdentifiersGeneral($idlo) {
        $result = $this->getGeneralIdentifier($idlo);

        $identifiers = "";
        while ($data = pg_fetch_array($result)) {
            $str = $this->etiquetar("catalog", $data[0]) . "\n";
            $str.=$this->etiquetar("entry", $data[1]) . "\n";
            $identifiers.=$this->encerrar("identifier", $str) . "\n";
        }
        return $identifiers;
    }

    function getTitleGeneral($idlo) {
        $title = pg_fetch_result($this->getGeneralTitle($idlo), 0, 0);
        return $this->etiquetarLangString("title", $title, $idlo) . "\n";
    }

    function getLanguageGeneral($idlo) {
        $result = $this->getGeneralLanguage($idlo);
        $str = "";
        while ($data = pg_fetch_array($result)) {
            $str .= $this->etiquetar("language", $data[0]) . "\n";
        }
        return $str . "\n";
    }

////OJO VERIFICAR
    function getDescriptionGeneral($idlo) {
        $result = $this->getGeneralDescription($idlo);
        $str = "";
        while ($data = pg_fetch_array($result)) {
            $str .= $this->etiquetarLangString("description", $data[0], $idlo) . "\n";
        }
        return $str . "\n";
    }

    function getKeywordsGeneral($idlo) {
        $result = $this->getGeneralKeyword($idlo);
        $str = "";
        while ($data = pg_fetch_array($result)) {
            $str .= $this->etiquetarLangString("keyword", $data[0], $idlo) . "\n";
        }
        return $str . "\n";
    }

    function getCoveragesGeneral($idlo) {
        $result = $this->getGeneralCoverage($idlo);
        $str = "";
        while ($data = pg_fetch_array($result)) {
            $str .= $this->etiquetarLangString("coverage", $data[0], $idlo) . "\n";
        }
        return $str . "\n";
    }

    function getStructureGeneral($idlo) {
        $structure = pg_fetch_result($this->getGeneralStructure($idlo), 0, 0);
        return $this->etiquetarVocabulary("structure", $structure) . "\n";
    }

    function getAggregationLevelGeneral($idlo) {
        $aggregationLevel = pg_fetch_result($this->getGeneralAggregationLevel($idlo), 0, 0);
        return $this->etiquetarVocabulary("aggregationLevel", $aggregationLevel);
    }

//////////////// L I F E  -  C Y C L E ///////////////////


    function getLifeCycle($idlo) {
        $str = $this->getVersionLifeCycle($idlo) . "\n"; //listo
        $str.=$this->getStatusLifeCycle($idlo) . "\n";
        $str.=$this->getContributeLifeCycle($idlo);

        return $this->encerrar("lifeCycle", $str) . "\n";
    }

    function getVersionLifeCycle($idlo) {
        $version = pg_fetch_result($this->getLifeCycleVersion($idlo), 0, 0);
        return $this->etiquetarLangString("version", $version, $idlo) . "\n";
    }

    function getStatusLifeCycle($idlo) {
        $status = pg_fetch_result($this->getLifeCycleStatus($idlo), 0, 0);
        return $this->etiquetarVocabulary("status", $status) . "\n";
    }

    function getContributeLifeCycle($idlo) {
        $result = $this->getLifeCycleContribute($idlo);
        $str = "";
        while ($data = pg_fetch_array($result)) {
            $cont = $this->etiquetarVocabulary("role", $data[1]) . "\n";
            $cont.=$this->etiquetarDateTime("date", $data[2], $idlo);
            $result1 = $this->getLifeCycleContribute_entity($data[0]);
            $entities = "";
            while ($data1 = pg_fetch_array($result1)) {
                $entities.=$this->etiquetar("entity", $data1[0]) . "\n";
            }
            $cont.="\n" . $entities;

            $str.=$this->encerrar("contribute", $cont) . "\n\n";
        }

        return $str;
    }

/////////////// M E T A  M E T A D A T A ////////////////

    function getMetaMetaData($idlo) {
        $str = $this->getIdentifiersMetaMetadata($idlo) . "\n";
        $str.=$this->getContributeMetaMetadata($idlo) . "\n";
        $str.=$this->getSchemaMetaMetadata($idlo) . "\n";
        $str.=$this->getLanguageMetaMetadata($idlo) . "\n";

        return $this->encerrar("metaMetaData", $str) . "\n";
    }

    function getIdentifiersMetaMetadata($idlo) {
        $result = $this->getMetaMetadataIdentifier($idlo);
        $identifiers = "";
        while ($data = pg_fetch_array($result)) {
            $str = $this->etiquetar("catalog", $data[0]) . "\n";
            $str.=$this->etiquetar("entry", $data[1]) . "\n";
            $identifiers.=$this->encerrar("identifier", $str) . "\n";
        }
        return $identifiers;
    }

    function getContributeMetaMetadata($idlo) {
        $result = $this->getMetaMetadataContribute($idlo);
        $str = "";
        while ($data = pg_fetch_array($result)) {
            $cont = $this->etiquetarVocabulary("role", $data[1]) . "\n";
            $cont.=$this->etiquetarDateTime("date", $data[2], $idlo);
            $result1 = $this->MetaMetadataContribute_entity($data[0]);
            $entities = "";
            while ($data1 = pg_fetch_array($result1)) {
                $entities.=$this->etiquetar("entity", $data1[0]) . "\n";
            }
            $cont.="\n" . $entities;

            $str.=$this->encerrar("contribute", $cont) . "\n\n";
        }

        return $str;
    }

    function getSchemaMetaMetadata($idlo) {
        $result = $this->getMetaMetadataSchema($idlo);
        $schema = "";
        while ($data = pg_fetch_array($result)) {
            $schema.= $this->etiquetar("metadataschema", $data[0]) . "\n";
        }
        return $schema;
    }

    function getLanguageMetaMetadata($idlo) {
        $language = pg_fetch_result($this->getMetaMetadataLanguage($idlo), 0, 0);
        return $this->etiquetar("language", $language) . "\n";
    }

/////////////// T E C H N I C A L ////////////////
    function getTechnical($idlo) {
        $str = $this->getFormatTechnical($idlo) . "\n";
        $str .=$this->getSizeTechnical($idlo) . "\n";
        $str.=$this->getLocationTechnical($idlo) . "\n";
        $str.=$this->getRequirementsTechnical($idlo) . "\n";
        $str.=$this->getInstallationRemarksTechnical($idlo) . "\n";
        $str.=$this->getOtherPlataformsRequirementsTechnical($idlo) . "\n";
        $str.=$this->getDurationTechnical($idlo) . "\n";

        return $this->encerrar("technical", $str) . "\n";
    }

    function getFormatTechnical($idlo) {
        $result = $this->getTechnicalFormat($idlo);
        $formats = "";
        while ($data = pg_fetch_array($result)) {
            $formats.=$this->etiquetar("format", $data[0]) . "\n";
        }
        return $formats;
    }

    function getSizeTechnical($idlo) {
        $size = pg_fetch_result($this->getTechnicalSize($idlo), 0, 0);
        return $this->etiquetar("size", $size) . "\n";
    }

    function getLocationTechnical($idlo) {
        $result = $this->getTechnicalLocation($idlo);
        $locations = "";
        while ($data = pg_fetch_array($result)) {
            $locations.= $this->etiquetar("location", $data[0]) . "\n";
        }
        return $locations;
    }

    function getRequirementsTechnical($idlo) {
        $result = $this->getTechnicalRequirements($idlo);
        $str = "";
        while ($data = pg_fetch_array($result)) {
            $orcompo = "";
            $result1 = $this->getTecnicalRequirements_orComposite($data[0]);

            while ($data1 = pg_fetch_array($result1)) {
                $vals = $this->etiquetarVocabulary("type", $data1[0]) . "\n";
                $vals.=$this->etiquetarVocabulary("name", $data1[1]) . "\n";
                $vals.=$this->etiquetar("minimumVersion", $data1[2]) . "\n";
                $vals.=$this->etiquetar("maximumVersion", $data1[3]) . "\n";
                $orcompo.=$this->encerrar("orComposite", $vals);
            }

            $str.=$this->encerrar("requirement", $orcompo) . "\n\n";
        }
        return $str;
    }

    function getInstallationRemarksTechnical($idlo) {
        $InstallationRemarks = pg_fetch_result($this->getTechnicalInstallationRemarks($idlo), 0, 0);
        return $this->etiquetarLangString("installationRemarks", $InstallationRemarks, $idlo) . "\n";
    }

    function getOtherPlataformsRequirementsTechnical($idlo) {
        $OtherPlataformsRequirementsTechnical = pg_fetch_result($this->getTechnicalOtherPlataformsRequirements($idlo), 0, 0);
        return $this->etiquetarLangString("otherPlataformsRequirements", $OtherPlataformsRequirementsTechnical, $idlo) . "\n";
    }

//ojo
    function getDurationTechnical($idlo) {
        $duration = pg_fetch_result($this->getTechnicalDuration($idlo), 0, 0);
        return $this->etiquetar("duration", $duration) . "\n";
    }

///////////////// E D U C A T I O N A L ////////////////////

    function getEducational($idlo) {
        $str = $this->getInteractivityTypeEducational($idlo) . "\n";
        $str.=$this->getLearningResourceTypeEducational($idlo) . "\n";
        $str.=$this->getInteractivityLevelEducational($idlo) . "\n";
        $str.=$this->getSemanticDensityEducational($idlo) . "\n";
        $str.=$this->getIntendedEndUserRoleEducational($idlo) . "\n";
        $str.=$this->getContextEducational($idlo) . "\n";
        $str.=$this->getTypicalAgeRangeEducational($idlo) . "\n";
        $str.=$this->getDifficultyEducational($idlo) . "\n";
        $str.=$this->getTypicalLearningTimeEducational($idlo) . "\n";
        $str.=$this->getDescriptionEducational($idlo) . "\n";
        $str.=$this->getLanguageEducational($idlo) . "\n";

        return $this->encerrar("educational", $str) . "\n";
    }

    function getInteractivityTypeEducational($idlo) {
        $interactivityType = pg_fetch_result($this->getEducationalInteractivityType($idlo), 0, 0);
        return $this->etiquetarVocabulary("interactivityType", $interactivityType, $idlo) . "\n";
    }

    function getLearningResourceTypeEducational($idlo) {
        $result = $this->getEducationalLearningResourceType($idlo);
        $types = "";
        while ($data = pg_fetch_array($result)) {
            $types.= $this->etiquetarVocabulary("learningResourceType", $data[0], $idlo) . "\n";
        }
        return $types;
    }

    function getInteractivityLevelEducational($idlo) {
        $InteractivityLevel = pg_fetch_result($this->getEducationalInteractivityLevel($idlo), 0, 0);
        return $this->etiquetarVocabulary("interactivityTypeLevel", $InteractivityLevel, $idlo) . "\n";
    }

    function getSemanticDensityEducational($idlo) {
        $semanticDensity = pg_fetch_result($this->getEducationalSemanticDensity($idlo), 0, 0);
        return $this->etiquetarVocabulary("semanticDensity", $semanticDensity, $idlo) . "\n";
    }

    function getIntendedEndUserRoleEducational($idlo) {
        $result = $this->getEducationalIntendedEndUserRole($idlo);
        $user = "";
        while ($data = pg_fetch_array($result)) {
            $user.= $this->etiquetarVocabulary("intendedEndUserRole", $data[0], $idlo) . "\n";
        }
        return $user;
    }

    function getContextEducational($idlo) {
        $result = $this->getEducationalContext($idlo);
        $context = "";
        while ($data = pg_fetch_array($result)) {
            $context.= $this->etiquetarVocabulary("context", $data[0], $idlo) . "\n";
        }
        return $context;
    }

    function getTypicalAgeRangeEducational($idlo) {
        $result = $this->getEducationalTypicalAgeRange($idlo);
        $age = "";
        while ($data = pg_fetch_array($result)) {
            $age.= $this->etiquetarLangString("typicalAgeRange", $data[0], $idlo) . "\n";
        }
        return $age;
    }

    function getDifficultyEducational($idlo) {
        $difficulty = pg_fetch_result($this->getEducationalDifficulty($idlo), 0, 0);
        return $this->etiquetarVocabulary("difficulty", $difficulty, $idlo) . "\n";
    }

    function getTypicalLearningTimeEducational($idlo) {
        $typicalLearningTime = pg_fetch_result($this->getEducationalTypicalLearningTime($idlo), 0, 0);
        return $this->etiquetar("typicalLearningTime", $typicalLearningTime) . "\n";
    }

    function getDescriptionEducational($idlo) {
        $result = $this->getEducationalDescription($idlo);
        $description = "";
        while ($data = pg_fetch_array($result)) {
            $description.= $this->etiquetarLangString("description", $data[0], $idlo) . "\n";
        }
        return $description;
    }

    function getLanguageEducational($idlo) {
        $result = $this->getEducationalLanguage($idlo);
        $language = "";
        while ($data = pg_fetch_array($result)) {
            $language.= $this->etiquetar("language", $data[0]) . "\n";
        }
        return $language;
    }

/////////// R I G T H S ///////////
    function getRights($idlo) {
        $str = $this->getCostRights($idlo) . "\n";
        $str.=$this->getCopyrightandOtherRestrictionsRights($idlo) . "\n";
        $str.=$this->getDescriptionRights($idlo) . "\n";
        return $this->encerrar("rights", $str) . "\n";
    }

    function getCostRights($idlo) {
        $cost = pg_fetch_result($this->getRightsCost($idlo), 0, 0);
        return $this->etiquetarVocabulary("cost", $cost) . "\n";
    }

    function getCopyrightandOtherRestrictionsRights($idlo) {
        $copyRightsAndOtherRestrictions = pg_fetch_result($this->getRightsCopyRightsAndOtherRestrictions($idlo), 0, 0);
        return $this->etiquetarVocabulary("CopyRightAndOtherRestrictions", $copyRightsAndOtherRestrictions) . "\n";
    }

    function getDescriptionRights($idlo) {
        $description = pg_fetch_result($this->getRightsDescription($idlo), 0, 0);
        return $this->etiquetarLangString("description", $description, $idlo) . "\n";
    }

/////////////// R E L A T I O N //////////////////

    function getRelation($idlo) {
        $str = $this->getKindRelation($idlo) . "\n";
        $str.=$this->getResourceRelation($idlo);
        return $this->encerrar("relation", $str) . "\n";
    }

    function getKindRelation($idlo) {
        $kind = pg_fetch_result($this->getRelationKind($idlo), 0, 0);
        return $this->etiquetarVocabulary("kind", $kind) . "\n";
    }

    function getResourceRelation($idlo) {
        $result = $this->getRelationResource($idlo);
        $str = "";
        while ($data = pg_fetch_array($result)) {
            $resource = "";
            $result1 = $this->getRelationResourceDescription($idlo);
            $vals1 = "";
            while ($data1 = pg_fetch_array($result1)) {
                $vals1.=$this->etiquetarLangString("description", $data1[0], $idlo) . "\n";
            }
            $result2 = $this->getRelationResourceIdentifier($idlo);
            $vals3 = "";
            while ($data1 = pg_fetch_array($result2)) {
                $vals2 = $this->etiquetar("catalog", $data1[0]) . "\n";
                $vals2.=$this->etiquetar("entry", $data1[1]) . "\n";
                $vals3.=$this->encerrar("identifier", $vals2) . "\n";
            }

            $resource.=$vals3 . $vals1;
            $str.=$this->encerrar("resource", $resource) . "\n\n";
        }
        return $str;
    }

    /*
      function getDescriptionRelation($idlo){
      $result = $this->getRelationDescription($idlo);
      $description = "";
      while ($data = pg_fetch_array($result)) {
      $description.= $this->etiquetarLangString("description", $data[0], $idlo) . "\n";
      }
      return $description;
      } */

//////////////// A N N O T A T I O N ///////////////////

    function getAnnotation($idlo) {
        $str = $this->getEntityAnnotation($idlo) . "\n";
        $str.=$this->getDateAnnotation($idlo) . "\n";
        $str.=$this->getDescriptionAnnotation($idlo) . "\n";
        return $this->encerrar("annotation", $str) . "\n";
    }

    function getEntityAnnotation($idlo) {
        $entity = pg_fetch_result($this->getAnnotationEntity($idlo), 0, 0);
        return $this->etiquetar("entity", $entity) . "\n";
    }

    function getDateAnnotation($idlo) {
        $date = pg_fetch_result($this->getAnnotationDate($idlo), 0, 0);
        return $this->etiquetarDateTime("date", $date, $idlo) . "\n";
    }

    function getDescriptionAnnotation($idlo) {
        $description = pg_fetch_result($this->getAnnotationDescription($idlo), 0, 0);
        return $this->etiquetarLangString("description", $description, $idlo) . "\n";
    }

////////////////// C L A S S I F I C A T I O N ////////////////////

    function getClassification($idlo) {
        $str = $this->getPurposeClassification($idlo) . "\n";
        $str .=$this->getTaxonPathClassification($idlo) . "\n";
        $str.=$this->getDescriptionClassification($idlo) . "\n";
        $str.=$this->getKeywordClassification($idlo) . "\n";
        return $this->encerrar("classification", $str) . "\n";
    }

    function getPurposeClassification($idlo) {
        $purpose = pg_fetch_result($this->getClassificationPurpose($idlo), 0, 0);
        return $this->etiquetarVocabulary("purpose", $purpose) . "\n";
    }

    function getTaxonPathClassification($idlo) {
        $result = $this->getClassificationTaxonPath($idlo);
        $str = "";
        while ($data = pg_fetch_array($result)) {
            $taxon = $this->etiquetarLangString("source", $data[1], $idlo);
            $result1 = $this->getClassificationTaxonPath_Taxon($data[0]);
            $vals2 = "";
            while ($data1 = pg_fetch_array($result1)) {
                $vals = $this->etiquetar("id", $data1[0]) . "\n";
                $vals.=$this->etiquetarLangString("entry", $data1[1], $idlo) . "\n";
                $vals2.=$this->encerrar("taxon", $vals);
            }
            $taxon.="\n" . $vals2;
            $taxon = $this->encerrar("taxonPath", $taxon);
            $str.=$taxon . "\n\n";
        }
        return $str;
    }

    function getDescriptionClassification($idlo) {
        $description = pg_fetch_result($this->getClassificationPurpose($idlo), 0, 0);
        return $this->etiquetarLangString("description", $description, $idlo) . "\n";
    }

    function getKeywordClassification($idlo) {
        $result = $this->getClassificationKeyword($idlo);
        $keywords = "";
        while ($data = pg_fetch_array($result)) {
            $keywords.= $this->etiquetarLangString("keyword", $data[0], $idlo) . "\n";
        }
        return $keywords;
    }

//-----------------------------
//-----------------------------
//Save_Functions
//-----------------------------
    //metaMetadataMetadataSchema1
//Funcion que se encarga de insertar los datos de los campos que son unicos y pueden ser varios.
    function multiFields($n, $variable, $metadato, $attribute, $current) {
        $variable = addslashes($variable);
        $this->eliminar(ucfirst($metadato) . "_" . strtolower($attribute), $current);
        $query = "";
        for ($i = 0; $i <= $n; $i++) {
            if ($i == 0) {
                if ($variable != "" && $variable != 'none') {
                    if ($metadato == "Technical" && $attribute == "Location") {
                        $variableAux = substr($variable, strlen($variable) - 1, strlen($variable));
                        if ($variableAux == "X") {

                            $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
                            $ruta = dirname($url);
                            $ruta = str_replace("/modelo", "", $ruta);
                            $variable = $ruta . "/download.php?id=" . $this->lastValue("lom", "idlo");
//                            if (is_dir("../../roap")) {
//                                $variable = "http://" . $_SERVER['HTTP_HOST'] . "/roap/control/download.php?id=" . $this->lastValue("lom", "idlo");
//                            } else {
//                                $variable = "http://" . $_SERVER['HTTP_HOST'] . "/control/download.php?id=" . $this->lastValue("lom", "idlo");
//                            }
                        }
                    }
                    $query.="INSERT INTO " . ucfirst($metadato) . "_" . strtolower($attribute) . "(idlo,$attribute) VALUES($current,'$variable')¥";
                }
            } else {
                if (isset($_POST[lcfirst($metadato) . ucfirst($attribute) . $i])) {
                    $var = $_POST[lcfirst($metadato) . ucfirst($attribute) . $i];
                    $var = addslashes($var);
                    if ($var != "" && $var != 'none') {
                        $query.="INSERT INTO " . ucfirst($metadato) . "_" . strtolower($attribute) . "(idlo,$attribute) VALUES($current,'$var')¥";
                    }
                }
            }
        }
        return $query;
    }

    function getCognitiveInformation($n, $type, $current) {
        $query = "";
        if ($type == "FSLSM") {
//            echo "pasa $n";
            for ($i = 0; $i <= $n; $i++) {
                for ($j = 1; $j <= 5; $j++) {
                    // echo 'fslsmRe' . $i . "_" . $j;
                    if (isset($_POST['fslsmRe' . $i . "_" . $j]) && $_POST['fslsmRe' . $i . "_" . $j] != "") {
                        $var = $_POST['fslsmRe' . $i . "_" . $j];
                        $query .= "INSERT INTO cognitiveInformation(idlo,idmodel,iddimension,value) VALUES($current,1,$j," . substr($var, 0, strpos($var, "%")) . "),";
                    }
                }
            }
        } else {
//            echo "XXXXXXXXXXXXXXXXX $n";
            for ($i = 0; $i <= $n; $i++) {
                $query .=$i + "_-------------------";
                for ($j = 1; $j <= 4; $j++) {

                    if (isset($_POST['varkRe' . $i . "_" . $j]) && $_POST['varkRe' . $i . "_" . $j] != "") {
                        echo "dasd pp  ";
                        $var = $_POST['varkRe' . $i . "_" . $j];
                        $query .= "INSERT INTO cognitiveInformation(idlo,idmodel,iddimension,value) VALUES($current,2,$j," . substr($var, 0, strpos($var, "%")) . "),";
                    }
                }
            }
        }
        return $query;
    }

    function multiFields2($n, $var1, $var2, $metadato, $attribute, $name1, $name2, $current) {
        $var1 = addslashes($var1);
        $var2 = addslashes($var2);
        $this->eliminar(ucfirst($metadato) . "_" . strtolower($attribute), $current);
        $query = "";
        for ($i = 0; $i <= $n; $i++) {
            if ($i == 0) {
                if ($var1 != "" || $var2 != "") {
                    $query.="INSERT INTO " . $metadato . "_" . $attribute . "(idlo,$name1,$name2) VALUES($current,'$var1','$var2')¥";
                }
            } else {
                if (isset($_POST[lcfirst($metadato) . ucfirst($name1) . $i]) && isset($_POST[lcfirst($metadato) . ucfirst($name2) . $i])) {
                    $gc = $_POST[lcfirst($metadato) . ucfirst($name1) . $i];
                    $ge = $_POST[lcfirst($metadato) . ucfirst($name2) . $i];
                    if ($gc != "" || $ge != "") {
                        $query.="INSERT INTO " . $metadato . "_" . $attribute . "(idlo,$name1,$name2) VALUES($current,'$gc','$ge')¥";
                    }
                }
            }
        }
        return $query;
    }

    function multiField3($n, $var1, $var2, $var3, $metadato, $attribute, $name1, $name2, $name3, $current) {
        $var1 = addslashes($var1);
        $var2 = addslashes($var2);
        $var3 = addslashes($var3);
        $this->eliminar(ucfirst($metadato) . "_" . strtolower($attribute), $current);
        $query = "";
        for ($i = 0; $i <= $n; $i++) {
            if ($i == 0) {
                if ($var1 != "" || $var2 != "" || $var3 != "") {
                    $query.="INSERT INTO " . ucfirst($metadato) . "_" . strtolower($attribute) . "($name1,$name2,$name3) VALUES('$var1','$var2','$var3')¥";
                }
            } else {
                if (isset($_POST[lcfirst($metadato) . ucfirst($name1) . $i]) && isset($_POST[lcfirst($metadato) . ucfirst($name2) . $i]) && isset($_POST[lcfirst($metadato) . ucfirst($name3) . $i])) {
                    $gc = addslashes($_POST[lcfirst($metadato) . ucfirst($name1) . $i]);
                    $ge = addslashes($_POST[lcfirst($metadato) . ucfirst($name2) . $i]);
                    $gd = addslashes($_POST[lcfirst($metadato) . ucfirst($name3) . $i]);
                    $query.="INSERT INTO " . ucfirst($metadato) . "_" . strtolower($attribute) . "($name1,$name2,$name3) VALUES('$gc','$ge','$gd')¥";
                }
            }
        }
    }

//funcion para insertar en una tabla
    function insertar($table, $field, $value) {
        $value = addslashes($value);
        $query = "insert into $table($field) values(";
        if (is_numeric($value)) {
            $query.= $value . ")";
        } else {
            $query.= "'$value')";
        }
        //echo $query;
        pg_query($this->link, $query);
    }

//funcion que retorna el  valor mas grande de una columna de una tabla
    function lastValue($table, $column) {
        $query = "select max($column) from $table";
        $result = pg_query($this->link, $query);
        while ($data = pg_fetch_array($result)) {
            return $data[0];
        }
    }

    function actualizar($table, $field, $value, $fieldRestriction, $valueRestriction) {
        $query = "update $table set $field=";
        if (is_numeric($value)) {
            $query.=$value;
        } else {
            $query.="'$value'";
        }
        $query.=" where $fieldRestriction=";

        if (is_numeric($valueRestriction)) {
            $query.=$valueRestriction;
        } else {
            $query.="'$valueRestriction'";
        }
        //echo $query;
        pg_query($this->link, $query);
    }

    function eliminar($table, $idlo) {
        $query = "delete from $table where idlo=$idlo";
        pg_query($this->link, $query);
    }

//---------------------------
//--------------------------- 
//    Import Functions
//---------------------------
//////////////// O T H E R S /////////////////
    function importIdentifiers($categoria, $metadato, $etiqueta) {
        $label = $categoria->getElementsByTagName(strtolower($etiqueta));
        $table = ucfirst($metadato) . "_" . lcfirst($etiqueta);
        $rfield = ucfirst($metadato) . lcfirst($etiqueta);
        foreach ($label as $tag) {
            $this->insertar($table, "idlo", $GLOBALS['idlo']);
            $t = $tag->getElementsByTagName("catalog");
            $w = $tag->getElementsByTagName("entry");
            $var1 = $t->item(0)->nodeValue;
            $var2 = $w->item(0)->nodeValue;
            $last = $this->lastValue($table, "id" . $rfield);
            $this->actualizar($table, "catalog", $var1, "id" . $rfield, $last);
            $this->actualizar($table, "entry", $var2, "id" . $rfield, $last);
        }
    }

    function importCharacterString1($categoria, $metadato, $etiqueta) {
        $label = $categoria->getElementsByTagName(strtolower($etiqueta));
        $field = ucfirst($metadato) . "_" . lcfirst($etiqueta);
        $rfield = ucfirst($metadato) . lcfirst($etiqueta);
        $var = $label->item(0)->nodeValue;
        $this->actualizar("lom", $field, $var, "idlo", $GLOBALS['idlo']);
    }

    function importCharacterString2($categoria, $metadato, $etiqueta) {
        $label = $categoria->getElementsByTagName(strtolower($etiqueta));
        $table = ucfirst($metadato) . "_" . lcfirst($etiqueta);
        $rfield = ucfirst($metadato) . ucfirst($etiqueta);
        for ($i = 0; $i < ($label->length); $i++) {
            $this->insertar($table, "idlo", $GLOBALS['idlo']);
            $value = $label->item($i)->nodeValue;
            $last = lastvalue($table, "id" . $rfield);
            $this->actualizar($table, $etiqueta, $value, "id" . $rfield, $last);
        }
    }

    function importLangString1($categoria, $metadato, $etiqueta) {
        $label = $categoria->getElementsByTagName(strtolower($etiqueta));
        $field = ucfirst($metadato) . "_" . lcfirst($etiqueta);
        $rfield = ucfirst($metadato) . lcfirst($etiqueta);
        foreach ($label as $tag) {
            $t = $tag->getElementsByTagName("string");
            $var = $t->item(0)->nodeValue;
            $this->actualizar("lom", $field, $var, "idlo", $GLOBALS['idlo']);
        }
    }

    function importLangString2($categoria, $metadato, $etiqueta) {
        $label = $categoria->getElementsByTagName(strtolower($etiqueta));
        $table = ucfirst($metadato) . "_" . lcfirst($etiqueta);
        $rfield = ucfirst($metadato) . lcfirst($etiqueta);
        foreach ($label as $tag) {
            $this->insertar($table, "idlo", $GLOBALS['idlo']);
            $t = $tag->getElementsByTagName("string");
            $var = $t->item(0)->nodeValue;
            $last = $this->lastValue($table, "id" . $rfield);
            $this->actualizar($table, $etiqueta, $var, "id" . $rfield, $last);
        }
    }

    function importVocabulary1($categoria, $metadato, $etiqueta) {
        $label = $categoria->getElementsByTagName(strtolower($etiqueta));
        $field = ucfirst($metadato) . "_" . lcfirst($etiqueta);
        $rfield = ucfirst($metadato) . ucfirst($etiqueta);
        foreach ($label as $tag) {
            $t = $tag->getElementsByTagName("value");
            $var = $t->item(0)->nodeValue;
            $this->actualizar("lom", $field, $var, "idlo", $GLOBALS['idlo']);
        }
    }

    function importVocabulary2($categoria, $metadato, $etiqueta) {
        $label = $categoria->getElementsByTagName(strtolower($etiqueta));
        $table = ucfirst($metadato) . "_" . lcfirst($etiqueta);
        $rfield = ucfirst($metadato) . lcfirst($etiqueta);
        foreach ($label as $tag) {
            $this->insertar($table, "idlo", $GLOBALS['idlo']);
            $t = $tag->getElementsByTagName("value");
            $var = $t->item(0)->nodeValue;
            $last = $this->lastValue($table, "id" . $rfield);
            $this->actualizar($table, $etiqueta, $var, "id" . $rfield, $last);
        }
    }

    function importDateTime1($categoria, $metadato, $etiqueta) {
        $label = $categoria->getElementsByTagName(strtolower($etiqueta));
        $field = ucfirst($metadato) . "_" . lcfirst($etiqueta);
        $rfield = ucfirst($metadato) . lcfirst($etiqueta);
        foreach ($label as $tag) {
            $t = $tag->getElementsByTagName("dateTime");
            $var = $t->item(0)->nodeValue;
            $this->actualizar("lom", $field, $var, "idlo", $GLOBALS['idlo']);
        }
    }

    //funcion que retorna el texto de $page
    function getText($page) {
        try {
            $url = @fopen($page, "r");
            if ($url) {
                $texto = "";
                while (!feof($url)) {
                    $texto.=fgets($url, 255);
                }
                return $texto;
            }
        } catch (Exception $e) {
            throw new Exception("Error al abrir");
        }
    }

    function guardarMetrica($current, $metricaCompletitud, $metricaConsistencia, $metricaCoherencia) {
        $query = "INSERT INTO metadataquality (idlo,completeness,consistence,coherence) values('$current', '$metricaCompletitud', '$metricaConsistencia', '$metricaCoherencia')";
        pg_query($this->link, $query);
    }

    function obtenerMetricas($idlo) {
        $query = "Select * from metadataquality where idlo='$idlo'";
        $result = pg_query($this->link, $query);
        return $result;
    }

    function guardarDownload($idlo, $iduser, $ip, $pais) {
        $query = "INSERT INTO download (idlo,iduser,date,ip,pais) values('$idlo',$iduser,now(),'$ip','$pais')";
        pg_query($this->link, $query);
    }

    function contarDownload($idlo, $fecha = "") {
        $query = "select count(*) from download where idlo= $idlo $fecha ";
        $result = pg_query($this->link, $query);
        return $result;
    }

    function historyDownload($idlo, $fecha) {
        $query = "select count(*),pais from download where idlo='$idlo' $fecha GROUP BY pais order by count desc";
        $result = pg_query($this->link, $query);
        return $result;
    }

    function coleccionARecomendar($iduser) {
        $query = "select count(*) as contador, idsubcollection from lo where iduser='$iduser' group by idsubcollection order by contador desc";
        $result = pg_query($this->link, $query);
        return $result;
    }

    function hayOAs($idSubCollection, $iduser, $lastloging) {
        $query = "SELECT count(*) from lo where idsubcollection='$idSubCollection' 
            AND iduser <> '$iduser'  AND lastmodified > '{$_SESSION["lastloging"]}'";
        $result = pg_query($this->link, $query);
        return $result;
    }

    function close() {
        pg_close($this->link);
    }

    function get_info_smtp() {
        $query = 'SELECT * FROM envio_email LIMIT 1';
        $result = pg_query($this->link, $query);
        return pg_fetch_array($result);
    }

}

function escapar(&$data) {
    foreach ($data as $key => $value) {
        if (!is_array($value)) {
            $data[$key] = trim(addslashes($value));
        }
    }
}

escapar($_POST);
escapar($_GET);
?>
