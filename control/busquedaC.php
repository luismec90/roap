<?php
if(!isset($_SESSION)){session_start();}
require 'modelo/conexion.php';
$c = conector_pg::getInstance();
require('multiLenguaje.php');
extract($_POST);

if (isset($_GET["action"]) && $_GET["action"] == "recomendarOAs") {

    $order = 'min(lo.insertiondate)';
    $pos2 = 100;
    $pos = 0;
    $coleccionARecomendar = pg_fetch_array($c->coleccionARecomendar($_SESSION["iduser_roap"]));
    if ($coleccionARecomendar[1] == "")
        exit();
    $iduser = $_SESSION["iduser_roap"];
    $QUERY = "SELECT idlo from lo where idsubcollection='$coleccionARecomendar[1]' 
            AND iduser <> '$iduser' AND lastmodified > '{$_SESSION["lastloging"]}' order by lastmodified desc";
    // echo "<br>$QUERY";
} else if (isset($_GET["action"]) && $_GET["action"] == "dRecomendarOAs") {
    $pos2 = 20;
    $pos = 0;
    $QUERY = "Select idlo,(ln(uno.descargas) + ln(dos.cantidadValoraciones)*dos.promedio) as calificacion from (select idlo as OA,count(idlo) as descargas from download where idlo<>'" . $_GET["idlo"] . "' AND iduser in (select iduser from download where idlo={$_GET["idlo"]}) group by idlo) as uno,
      (select idlo, count(idlo) as cantidadValoraciones,avg(valoration) as promedio from rating where idlo<>'" . $_GET["idlo"] . "' and iduser in (select iduser from download where idlo='" . $_GET["idlo"] . "')  group by idlo) as dos
      Order by calificacion desc";
} else {

    require 'creadorConsulta.php';
    $pos = (isset($_GET["pos"])) ? $_GET["pos"] : "0";
    $pos2 = 10;
    $order = "min(lom.general_title)";
    $groupby = "lom.idlo";
    if ($orderBy == "author") {
        $order = "min(users.name)";
    } else if ($orderBy == "insertiondate") {
        $order = "min(lo.insertiondate)";
    } else if ($orderBy == "valoration") {
        $groupby = "lom.idlo";
        $order = "coalesce(avg(rating.valoration),0) desc";
    }
}




if ($_GET["action"] == "simple") {//Si action es igual a simple entonces la búsqueda es simple de lo contrario es avanzada.
    $search = strtolower($inputbusquedasimple);


    if (isset($cidsc)) {//Si cidsc esta defindo entonces voy a buscar en una colección de lo contrario la búsqueda es global.
        if ($search == "") {
            $QUERY = "SELECT lom.idlo
                    FROM users LEFT OUTER JOIN lo ON(users.iduser=lo.iduser) NATURAL JOIN lom LEFT OUTER JOIN general_keyword ON(lom.idlo=general_keyword.idlo) LEFT OUTER JOIN subcollection ON(lo.idsubcollection=subcollection.idsubcollection)LEFT OUTER JOIN technical_format ON(lom.idlo=technical_format.idlo) LEFT OUTER JOIN rating ON(users.iduser=rating.iduser)
                    WHERE  subcollection.idsubcollection=$cidsc AND lom.idlo NOT IN (SELECT idlo FROM pending)
                    GROUP BY $groupby
                    ORDER BY $order";
        } else {
            $QUERY = "SELECT lom.idlo
                    FROM users LEFT OUTER JOIN lo ON(users.iduser=lo.iduser) NATURAL JOIN lom LEFT OUTER JOIN general_keyword ON(lom.idlo=general_keyword.idlo) LEFT OUTER JOIN subcollection ON(lo.idsubcollection=subcollection.idsubcollection)LEFT OUTER JOIN technical_format ON(lom.idlo=technical_format.idlo) LEFT OUTER JOIN rating ON( rating.idlo=lom.idlo)
                    WHERE (lower(lom.general_title) LIKE '%$search%' OR lower(users.name) LIKE '%$search%' OR lower(general_keyword.keyword) LIKE '%$search%' OR lower(technical_format.format) LIKE '%$search%') AND subcollection.idsubcollection=$cidsc AND lom.idlo NOT IN (SELECT idlo FROM pending)
                    GROUP BY $groupby
                    ORDER BY $order";
        }
    } else {
        if ($search == "") {
            $QUERY = "SELECT lom.idlo
                  FROM users LEFT OUTER JOIN lo ON(users.iduser=lo.iduser) NATURAL JOIN lom LEFT OUTER JOIN general_keyword ON(lom.idlo=general_keyword.idlo) LEFT OUTER JOIN technical_format ON(lom.idlo=technical_format.idlo) LEFT OUTER JOIN rating ON(rating.idlo=lom.idlo)
                  WHERE lom.idlo NOT IN (SELECT idlo FROM pending)
                  GROUP BY $groupby
                  ORDER BY $order";
        } else {
            $QUERY = "SELECT lom.idlo
                    FROM users LEFT OUTER JOIN lo ON(users.iduser=lo.iduser) NATURAL JOIN lom LEFT OUTER JOIN general_keyword ON(lom.idlo=general_keyword.idlo) LEFT OUTER JOIN technical_format ON(lom.idlo=technical_format.idlo) LEFT OUTER JOIN rating ON(rating.idlo=lom.idlo)
                    WHERE lower(lom.general_title) LIKE '%$search%' OR lower(users.name) LIKE '%$search%' OR lower(general_keyword.keyword) LIKE '%$search%' OR lower(technical_format.format) LIKE '%$search%' AND lom.idlo NOT IN (SELECT lom.idlo FROM pending)
                    GROUP BY $groupby
                    ORDER BY $order";
        }
    }
} else if ($_GET["action"] == "avanzada") {
    //definimos las variables
    $table;
    $restriction;
    $integrity;
    $ii = $jj = $kk = 0;
    $foundUser = false;
    $foundSubcollection = false;


    //OPERADORES
    $operador["igual"] = "=";
    $operador["menor"] = "<";
    $operador["mayor"] = ">";
    $operador["menoroigual"] = "<=";
    $operador["mayoroigual"] = ">=";
    $operador["diferente"] = "<>";
    $operador["sigual"] = "LIKE";
    $operador["sdiferente"] = "NOT LIKE";


    if (isset($cidsc)) {
        checkCategory();
    }  //busqueda Avanzda
    //BUSCAMOS EN CUALES CAMPOS SE ESCRIBIO ALGO
//-->GENERAL
    $category = "General";

    checkMultipleLOM($category, "General_Identifier", "Catalog");
    checkMultipleLOM($category, "General_Identifier", "Entry");
    checkSingleLOM($category, "Title");
    checkMultipleLOM($category, "General_Language", "Language", 2);
    checkMultipleLOM($category, "General_Description", "Description");
    checkMultipleLOM($category, "General_Keyword", "Keyword");
    checkMultipleLOM($category, "General_Coverage", "Coverage");
    checkSingleLOM($category, "Structure", 2);
    checkSingleLOM($category, "AggregationLevel", 2);

//-->LIFECYCLE
    $category = "LifeCycle";
    checkSingleLOM($category, "Version", 2);
    checkSingleLOM($category, "Status", 2);
    checkMultipleLOM($category, "LifeCycle_Contribute", "Role", 2);
    checkMultipleLOM($category, "LifeCycle_Contribute", "Date", 3);
    checkExtern($category, "LifeCycle_contribute", "LifeCycleContribute_entity", "Entity");
//-->METAMETADATA
    $category = "MetaMetadata";
    checkMultipleLOM($category, "MetaMetadata_Identifier", "Catalog");
    checkMultipleLOM($category, "MetaMetadata_Identifier", "Entry");
    checkMultipleLOM($category, "MetaMetadata_Contribute", "Role", 2);
    checkMultipleLOM($category, "MetaMetadata_Contribute", "Date", 3);
    checkExtern($category, "MetaMetadata_contribute", "MetaMetadataContribute_entity", "Entity");
    checkMultipleLOM($category, "MetaMetadata_metaDataSchema", "MetadataSchema", 2);
    checkSingleLOM($category, "Language", 2);



//-->TECHNICAL
    $category = "Technical";
    checkMultipleLOM($category, "Technical_Format", "Format");
    checkSingleLOM($category, "Size", 2);
    checkMultipleLOM($category, "Technical_Location", "Location");
    checkExtern($category, "Technical_requirements", "Requirements_orComposite", "Type");
    checkExtern($category, "Technical_requirements", "Requirements_orComposite", "Name");
    checkExtern($category, "Technical_requirements", "Requirements_orComposite", "MinimumVersion");
    checkExtern($category, "Technical_requirements", "Requirements_orComposite", "MaximumVersion");
    checkSingleLOM($category, "InstallationRemarks");
    //  checkSingleLOM($category, "OtherPlatformRequirements");
    checkSingleLOM($category, "Duration", 2);


//-->EDUCATIONAL
    $category = "Educational";

    checkSingleLOM($category, "InteractivityType", 2);
    checkMultipleLOM($category, "Educational_learningResourceType", "LearningResourceType", 2);
    checkSingleLOM($category, "InteractivityLevel", 2);
    checkSingleLOM($category, "SemanticDensity", 2);
    checkMultipleLOM($category, "Educational_IntendedEndUserRole", "IntendedEndUserRole", 2);
    checkMultipleLOM($category, "Educational_Context", "Context", 2);
    checkMultipleLOM($category, "Educational_TypicalAgeRange", "TypicalAgeRange");
    checkSingleLOM($category, "Difficulty", 2);
    checkSingleLOM($category, "TypicalLearningTime");
    checkMultipleLOM($category, "Educational_Description", "Description");
    checkMultipleLOM($category, "Educational_Language", "Language", 2);


//-->RIGHTS
    $category = "Rights";
    checkSingleLOM($category, "Cost", 2);
    checkSingleLOM($category, "CopyrightandOtherRestrictions", 2);
    checkSingleLOM($category, "Description");


//-->RELATION
    $category = "Relation";
    checkSingleLOM($category, "Kind", 2);
    checkExtern($category, "Relation_resource", "Resource_identifier", "Catalog");
    checkExtern($category, "Relation_resource", "Resource_identifier", "Entry");
    checkExtern($category, "Relation_resource", "Resource_identifier", "Entry");
    checkExtern($category, "Relation_resource", "Resource_description", "Description");

//-->ANNOTATION
    $category = "Annotation";
    checkSingleLOM($category, "Entity");
    checkSingleLOM($category, "Date", 3);
    checkSingleLOM($category, "Description");

//-->CLASSIFICATION
    $category = "Classification";
    checkSingleLOM($category, "Purpose", 2);
    checkMultipleLOM($category, "Classification_taxonPath", "Source");
    checkExtern($category, "Classification_taxonPath", "TaxonPath_taxon", "Entry");
    checkSingleLOM($category, "Description");
    checkMultipleLOM($category, "Classification_keyword", "Keyword");
//-->USER
    checkUser("Users", "Users");

    $QUERY = createQuery($table, $restriction, $integrity, $order);
}
?>

<?php

//----------------- F U N C I O N E S ---------------------
function checkSingleLOM($category, $attribute, $type = 1) {
    global $operador, $jj, $restriction;
    $name = $category . $attribute;
    if (isset($_POST["s" . $name])) {
        $value = $_POST["s" . $name];
        if ($value != "" && $value != "none") {
            if ($type == 1) {
                $r = "(coalesce(lower(lom." . $category . "_" . $attribute . "),'--')";
                $op = strtolower($operador["s" . $_POST["op" . $name]]);
                $put = ($op == "like") ? setFormat("lom.$category" . "_" . $attribute, strtolower($value)) : setFormat("lom.$category" . "_" . $attribute, strtolower($value), true);
                $r.=$op . " " . $put;
            } else if ($type == 2) {
                $r = "(coalesce(lom." . $category . "_" . $attribute . ",'--')";
                $op = $operador[$_POST["op" . $name]];
                $put = ($op == "=") ? setFormat("lom.$category" . "_" . $attribute, strtolower($value), false, 2) : setFormat("lom.$category" . "_" . $attribute, strtolower($value), true, 2);
                $r.=$op . " " . $put;
            } else if ($type == 3) {
                $r = "(coalesce(lom." . $category . "_" . $attribute . ",'01-01-0000') ";
                $op = $operador[$_POST["op" . $name]];
                $put = ($op == "=") ? setFormat("lom.$category" . "_" . $attribute, strtolower($value), false, 2) : setFormat("lom.$category" . "_" . $attribute, strtolower($value), true, 2);
                $r.=$op . " " . $put;
            }
            $restriction[$jj++] = "$r)";
        }
    }
}

function checkMultipleLOM($category, $tablex, $attribute, $type = 1) {
    global $operador, $integrity, $table, $restriction, $ii, $jj, $kk;
    $name = $category . $attribute;
    if (isset($_POST["s" . $name])) {
        $value = trim($_POST["s" . $name]);
        if ($value != "" && $value != "none") {
            if ($type == 1) {
                $r = "coalesce(lower(" . $tablex . "." . $attribute . "),'--') ";
                $op = strtolower($operador["s" . $_POST["op" . $name]]);
                $put = ($op == "like") ? setFormat($tablex . "." . $attribute, strtolower($value)) : setFormat($tablex . "." . $attribute, strtolower($value), true);
                $r.=$op . " " . $put;
            } else if ($type == 2) {
                $r = "coalesce(lower(" . $tablex . "." . $attribute . "),'--') ";
                $op = $operador[$_POST["op" . $name]];
                $put = ($op == "=") ? setFormat($tablex . "." . $attribute, strtolower($value), false, 2) : setFormat($tablex . "." . $attribute, strtolower($value), true, 2);
                $r.=$op . " " . $put;
            } else if ($type == 3) {
                $r = "coalesce(" . $tablex . "." . $attribute . ",'01-01-0000') ";
                $op = $operador[$_POST["op" . $name]];
                $put = ($op == "=") ? setFormat($tablex . "." . $attribute, strtolower($value), false, 2) : setFormat($tablex . "." . $attribute, strtolower($value), true, 2);
                $r.=$op . " " . $put;
            }
            //$table[$ii++] = $tablex;
            $restriction[$jj++] = $r;
            $integrity[$kk++] = "LEFT OUTER JOIN $tablex ON (lom.idlo=$tablex.idlo)";
        }
    }
}

function setFormat($column, $str, $negado = false, $operador = 1) {
    $values = explode(",", $str);
    $str = "";
    if ($operador == 1) {
        $ss = ($negado) ? "AND lower($column) NOT LIKE " : " OR lower($column) LIKE ";
        for ($i = 0; $i < sizeof($values); $i++) {
            if ($values[$i] != "")
                $str.="'%" . strtolower(trim($values[$i])) . "%' " . $ss;
        }
        $index = ($negado) ? strrpos($str, "AND") : strrpos($str, "OR");
        return substr($str, 0, $index);
    }else if ($operador == 2) {
        $ss = ($negado) ? "AND lower($column) <> " : " OR lower($column) = ";
        for ($i = 0; $i < sizeof($values); $i++) {
            if ($values[$i] != "")
                $str.="'" . strtolower(trim($values[$i])) . "' " . $ss;
        }
        $index = ($negado) ? strrpos($str, "AND") : strrpos($str, "OR");
        return substr($str, 0, $index);
    }
}

function getValuesRestrictions() {
    global $restriction;
    $k = 0;
    $restrict = array();
    for ($i = 0; $i < sizeof($restriction); $i++) {
        $found = false;
        for ($j = 0; $j < sizeof($restrict); $j++) {
            if ($restriction[$i] == $restrict[$j]) {
                $found = true;
            }
        }
        if (!$found) {
            $restrict[$k++] = $restriction[$i];
        }
    }
    $str = "(";
    for ($i = 0; $i < sizeof($restrict); $i++) {
        $str.= $restrict[$i] . " AND ";
    }

    return $str . " TRUE)";
}

function getIntegrityRestrictions() {
    global $integrity;
    $k = 0;
    $restrict = array();

    for ($i = 0; $i < sizeof($integrity); $i++) {
        $found = false;
        for ($j = 0; $j < sizeof($restrict); $j++) {
            if ($integrity[$i] == $restrict[$j]) {
                $found = true;
            }
        }
        if (!$found) {
            $var = $integrity[$i];
            $restrict[$k++] = $var;
        }
    }

    $str = "users NATURAL JOIN lo LEFT OUTER JOIN subcollection ON(lo.idsubcollection=subcollection.idsubcollection) LEFT OUTER JOIN rating ON (users.iduser=rating.iduser AND lo.idlo=rating.idlo) LEFT OUTER JOIN lom ON(lom.idlo=lo.idlo) ";
    for ($i = 0; $i < sizeof($restrict); $i++) {
        $str.= $restrict[$i] . " ";
    }
    return $str;
}

function checkExtern($category, $table1, $table2, $attribute) {
    global $table, $integrity, $restriction, $ii, $jj, $kk, $operador;
    $name = "$category$attribute";

    if (isset($_POST["s" . $name])) {
        $value = (trim($_POST["s" . $name]));
        if ($value != "" && $value != "none") {
            $table[$ii++] = $table1;
            $table[$ii++] = $table2;
            $var = preg_replace("[_]", "", $table1);
            $integrity[$kk++] = "LEFT OUTER JOIN $table1 ON(lom.idlo=$table1.idlo) LEFT OUTER JOIN $table2 ON($table1.id$var=$table2.id$var)";

            // $integrity[$kk++] = "$table1.id$var=$table2.id$var";
            $restriction[$jj++] = "coalesce(lower($table2.$attribute),'--') " . $operador["s" . $_POST["op" . $name]] . " " . setFormat("$table2.$attribute", strtolower($value));
        }
    }
}

function checkUser($tablex, $attribute) {
    global $operador, $table, $restriction, $ii, $jj, $kk;
    $name = $tablex . $attribute;
    if (isset($_POST["s" . $name])) {
        $value = trim($_POST["s" . $name]);
        if ($value != "" && $value != "none") {
            $restriction[$jj++] = "lower(users.name) " . $operador["s" . $_POST["op" . $name]] . " " . setFormat("$tablex.$attribute", strtolower($value));
        }
    }
}

function checkCategory() {
    global $restriction, $jj;
    if (isset($_POST['cidsc'])) {
        $value = $_POST['cidsc'];
        $restriction[$jj++] = "subcollection.idsubcollection=$value";
    }
}

function createQuery($table, $restriction, $integrity, $order) {
    $QUERY = "SELECT lom.idlo
        FROM " . getIntegrityRestrictions($integrity) .
            " WHERE " . getValuesRestrictions($restriction) . " AND lom.idlo NOT IN(SELECT idlo from pending) 
       GROUP BY lom.idlo
       ORDER BY $order";
    return $QUERY;
}
?>




<?php
//echo $QUERY . " LIMIT $pos2 OFFSET $pos";




$idlos = $c->realizarOperacion($QUERY . " LIMIT $pos2 OFFSET $pos");
$totalOAHide = $c->realizarOperacion($QUERY);
$totalOAHide = pg_num_rows($totalOAHide);

$idC = (isset($_GET["idC"])) ? $_GET["idC"] : -1;
if (isset($_GET["action"]) && $_GET["action"] != "recomendarOAs" && $_GET["action"] != "dRecomendarOAs") {
    $path = "Resultados de Búsqueda";
    $totalOA = "(" . $totalOAHide . " $objectsFound)";
} else {
    $path = $customRecommendedOA;
    if ($totalOAHide > 50) {
        $totalOAHide2 = 50;
    } else {
        $totalOAHide2 = $totalOAHide;
    }
    $totalOA = "(" . $totalOAHide2 . " $objectsFound)";
}
$from = "search";
$objetos = "";
$datos;
while ($data = pg_fetch_array($idlos)) {


    $titulo = pg_fetch_array($c->getGeneralTitle($data[0]));
    $title = $titulo[0];

    $cantidadDescargas = pg_fetch_array($c->contarDownload($data[0]));
    $cantidadDescargas = $cantidadDescargas[0];

    $ubicacionq = "SELECT C.name, s.name FROM lo l,collection c,subcollection s where c.idcollection=s.idcollection and s.idsubcollection=l.idsubcollection and l.idlo=$data[0]";
    $ubicacionr = $c->realizarOperacion($ubicacionq);
    $ubicacionr = pg_fetch_array($ubicacionr);
    if ($ubicacionr[0] != $ubicacionr[1]) {
        $ubicacion = "$ubicacionr[0]/$ubicacionr[1]";
    } else {
        $ubicacion = $ubicacionr[0];
    }

    $description = "";
    $rdescription = $c->getGeneralDescription($data[0]);
    while ($row = pg_fetch_array($rdescription)) {
        $description.="<li class='listas'> " . $row[0] . "</li>";
    }
//    if ($description == "") {
//        $description = "--";
//    }

    $keyWords = $c->getGeneralKeyword($data[0]);

    $formats = $c->getTechnicalFormat($data[0]);

    $uploadBy = $c->getUploadBy($data[0]);

    $insertionDate = $c->getLoInsertionDate($data[0]);

    $keys = "";
    $i = 0;
    while ($row = pg_fetch_array($keyWords)) {
        if ($i == 3)
            break;
        $i++;
        $keys.="$row[0], ";
    }
    $keys = substr($keys, 0, sizeof($keys) - 3);
//    if ($keys == "") {
//        $keys = "--";
//    }
    $format = "";
    $i = 0;
    while ($row = pg_fetch_array($formats)) {
        if ($i == 3)
            break;
        $i++;
        $format.="$row[0], ";
    }
    $format = substr($format, 0, sizeof($format) - 3);
//    if ($format == "") {
//        $format = "--";
//    }

    /* Lenguaje */
    $rlanguage = $c->getGeneralLanguage($data[0]);
    $language = "";
    $i = 0;
    $arraylanguage = array("es" => "Spanish", "en" => "English", "pt" => "Portuguese", "fr" => "French", "ru" => "Russian", "ja" => "Japanese", "la" => "Latin", "aa" => "Afar", "ab" => "Abkhazian", "af" => "Afrikaans", "am" => "Amharic", "ar" => "Arabic", "as" => "Assamese", "ay" => "Aymara", "az" => "Azerbaijani", "ba" => "Bashkir", "be" => "Byelorussian", "bg" => "Bulgarian", "bh" => "Bihari", "bi" => "Bislama", "bn" => "Bengali;Bangla", "bo" => "Tibetan", "br" => "Breton", "ca" => "Catalan", "co" => "Corsican", "cs" => "Czech", "cy" => "Welsh", "da" => "Danish", "de" => "German", "dz" => "Bhutani", "el" => "Greek", "eo" => "Esperanto", "et" => "Estonian", "eu" => "Basque", "fa" => "Persian", "fi" => "Finnish", "fj" => "Fiji", "fo" => "Faeroese", "fy" => "Frisian", "ga" => "Irish", "gd" => "Scots", "gl" => "Galician", "gn" => "Guarani", "gu" => "Gujarati", "ha" => "Hausa", "hi" => "Hindi", "hr" => "Croatian", "hu" => "Hungarian", "hy" => "Armenian", "ia" => "Interlingua", "ie" => "Interlingue", "ik" => "Inupiak", "in" => "Indonesian", "is" => "Icelandic", "it" => "Italian", "iw" => "Hebrew", "ji" => "Yiddish", "jw" => "Javanese", "ka" => "Georgian", "kk" => "Kazakh", "kl" => "Greenlandic", "km" => "Cambodian", "kn" => "Kannada", "ko" => "Korean", "ks" => "Kashmiri", "ku" => "Kurdish", "ky" => "Kirghiz", "ln" => "Lingala", "lo" => "Laothian", "lt" => "Lithuanian", "lv" => "Latvian,Lettish", "mg" => "Malagasy", "mi" => "Maori", "mk" => "Macedonian", "ml" => "Malayalam", "mn" => "Mongolian", "mo" => "Moldavian", "mr" => "Marathi", "ms" => "Malay", "mt" => "Maltese", "my" => "Burmese", "na" => "Nauru", "ne" => "Nepali", "nl" => "Dutch", "no" => "Norwegian", "oc" => "Occitan", "om" => "(Afan)Oromo", "or" => "Oriya", "pa" => "Punjabi", "pl" => "Polish", "ps" => "Pashto,Pushto", "qu" => "Quechua", "rm" => "Rhaeto-Romance", "rn" => "Kirundi", "ro" => "Romanian", "rw" => "Kinyarwanda", "sa" => "Sanskrit", "sd" => "Sindhi", "sg" => "Sangro", "sh" => "Serbo-Croatian", "si" => "Singhalese", "sk" => "Slovak", "sl" => "Slovenian", "sm" => "Samoan", "sn" => "Shona", "so" => "Somali", "sq" => "Albanian", "sr" => "Serbian", "ss" => "Siswati", "st" => "Sesotho", "su" => "Sundanese", "sv" => "Swedish", "sw" => "Swahili", "ta" => "Tamil", "te" => "Tegulu", "tg" => "Tajik", "th" => "Thai", "ti" => "Tigrinya", "tk" => "Turkmen", "tl" => "Tagalog", "tn" => "Setswana", "to" => "Tonga", "tr" => "Turkish", "ts" => "Tsonga", "tt" => "Tatar", "tw" => "Twi", "uk" => "Ukrainian", "ur" => "Urdu", "uz" => "Uzbek", "vi" => "Vietnamese", "vo" => "Volapuk", "wo" => "Wolof", "xh" => "Xhosa", "yo" => "Yoruba", "zh" => "Chinese", "zu" => "Zulu");

    while ($row = pg_fetch_array($rlanguage)) {
        $i++;
        $language.=$arraylanguage[$row[0]] . ", ";
    }
    $language = substr($language, 0, sizeof($language) - 3);
    /* ------ */

    /* Identificador */
    $identificador = "";
    $ridentificador = $c->getGeneralIdentifier($data[0]);
    while ($row = pg_fetch_array($ridentificador)) {
        if (strtolower($row[0]) == "nbc") {
            $arrayNBC = array('01.00' => 'Agronomía, Veterinaria y afines',
                '02.00' => 'Bellas Artes',
                '03.00 ' => 'Ciencias de la Educación',
                '04.00 ' => 'Ciencias de la Salud',
                '05.00 ' => 'Ciencias Sociales y Humanas',
                '06.00 ' => 'Economía, Administración, Contaduría y afines',
                '07.00 ' => 'Ingeniería, Arquitectura, Urbanismo y afines',
                '08.00 ' => 'Matemáticas y Ciencias Naturales ',
                '01.01' => 'Agronomía, Veterinaria y afines\Agronomía',
                '01.02' => 'Agronomía, Veterinaria y afines\Medicina Veterinaria',
                '01.03' => 'Agronomía, Veterinaria y afines\Zootecnia',
                '02.01' => 'Bellas Artes\Artes Plásticas\Visuales y afines',
                '02.02' => 'Bellas Artes\Artes Representativas',
                '02.03.00 ' => 'Bellas Artes\Diseño',
                '02.04' => 'Bellas Artes\Música',
                '02.05' => 'Bellas Artes\Otros programas asociados a Bellas Artes',
                '02.06' => 'Bellas Artes\Publicidad y afines',
                '03.01.00 ' => 'Ciencias de la Educación\Educación',
                '04.01' => 'Ciencias de la Salud\Bacteriología',
                '04.02' => 'Ciencias de la Salud\Enfermería',
                '04.03' => 'Ciencias de la Salud\Instrumentación quirúrgica',
                '04.04.00 ' => 'Ciencias de la Salud\Medicina',
                '04.05' => 'Ciencias de la Salud\Nutrición y Dietética',
                '04.06.00 ' => 'Ciencias de la Salud\Odontología',
                '04.07.00 ' => 'Ciencias de la Salud\Optometría\otros programas de Ciencias de la Salud',
                '04.08.00 ' => 'Ciencias de la Salud\Salud Pública',
                '04.09.00 ' => 'Ciencias de la Salud\Terapias',
                '05.01.00 ' => 'Ciencias Sociales y Humanas\Antropología, Artes Liberales',
                '05.02.00 ' => 'Ciencias Sociales y Humanas\Bibliotecología, otros de Ciencias Sociales y Humanas',
                '05.03' => 'Ciencias Sociales y Humanas\Ciencia Política, Relaciones Internacionales',
                '05.04.00 ' => 'Ciencias Sociales y Humanas\Comunicación Social, Periodismo y afines',
                '05.05' => 'Ciencias Sociales y Humanas\Deportes, Educación Física y Recreación',
                '05.06.00 ' => 'Ciencias Sociales y Humanas\Derecho y afines',
                '05.07.00 ' => 'Ciencias Sociales y Humanas\Filosofía, Teología y afines',
                '05.09.00 ' => 'Ciencias Sociales y Humanas\Geografía e Historia',
                '05.10.00 ' => 'Ciencias Sociales y Humanas\Lenguas Modernas, Literatura, Lingüística y afines',
                '05.11' => 'Ciencias Sociales y Humanas\Psicología',
                '05.12.00 ' => 'Ciencias Sociales y Humanas\Sociología, Trabajo Social y afines',
                '06.01.00 ' => 'Economía, Administración, Contaduría y afines\Administración',
                '06.02.00 ' => 'Economía, Administración, Contaduría y afines\Contaduría Pública',
                '06.03.00 ' => 'Economía, Administración, Contaduría y afines\Economía',
                '07.01' => 'Ingeniería, Arquitectura, Urbanismo y afines\Arquitectura y afines',
                '07.02' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería Administrativa y afines',
                '07.03.00 ' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería Agrícola, Forestal y afines',
                '07.04.00 ' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería Agroindustrial, Alimentos y afines',
                '07.05.00 ' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería Agronómica, Pecuaria y afines',
                '07.06.00 ' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería Ambiental, Sanitaria y afines',
                '07.07' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería Biomédica y afines',
                '07.08' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería Civil y afines',
                '07.09' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería De Minas, Metalurgia y afines',
                '07.10.00 ' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería De Sistemas, Telemática y afines',
                '07.11' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería Eléctrica y afines',
                '07.12.00 ' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería Electrónica, Telecomunicaciones y afines',
                '07.13.00 ' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería Industrial y afines',
                '07.15' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería Química y afines',
                '07.16.00 ' => 'Ingeniería, Arquitectura, Urbanismo y afines\Otras Ingenierías',
                '08.01.00 ' => 'Matemáticas y Ciencias Naturales \Biología, Microbiología y afines',
                '08.02' => 'Matemáticas y Ciencias Naturales \Física',
                '08.03.00 ' => 'Matemáticas y Ciencias Naturales \Geología, otros programas de Ciencias Naturales',
                '08.04.00 ' => 'Matemáticas y Ciencias Naturales \Matemáticas, Estadística y afines',
                '08.05.00 ' => 'Matemáticas y Ciencias Naturales \Química y afines',
                '02.03.01' => 'Bellas Artes\Diseño\Gráfico',
                '02.03.02' => 'Bellas Artes\Diseño\Industrial',
                '02.03.03' => 'Bellas Artes\Diseño\Joyas',
                '02.03.04' => 'Bellas Artes\Diseño\Moda',
                '02.03.05' => 'Bellas Artes\Diseño\Textil',
                '03.01.01' => 'Ciencias de la Educación\Educación\Ciencias naturales, matemáticas, tecnología e informática',
                '03.01.02' => 'Ciencias de la Educación\Educación\Ciencias sociales, humanas, religiosas y afines',
                '03.01.03' => 'Ciencias de la Educación\Educación\Educación artística y educación física, recreación y deporte',
                '03.01.04' => 'Ciencias de la Educación\Educación\Educación básica',
                '03.01.05' => 'Ciencias de la Educación\Educación\Educación básica y media',
                '03.01.06' => 'Ciencias de la Educación\Educación\Educación media',
                '03.01.07' => 'Ciencias de la Educación\Educación\Educación para otras modalidades',
                '03.01.08' => 'Ciencias de la Educación\Educación\Educación preescolar',
                '03.01.09' => 'Ciencias de la Educación\Educación\Educación técnica',
                '03.01.10' => 'Ciencias de la Educación\Educación\Formación para la educación',
                '04.04.01' => 'Ciencias de la Salud\Medicina\Alergología',
                '04.04.02' => 'Ciencias de la Salud\Medicina\Anestesia ',
                '04.04.03' => 'Ciencias de la Salud\Medicina\Cabeza y cuello ',
                '04.04.04' => 'Ciencias de la Salud\Medicina\Cardiología ',
                '04.04.05' => 'Ciencias de la Salud\Medicina\Cardiotoráxica ',
                '04.04.06' => 'Ciencias de la Salud\Medicina\Cardiovascular ',
                '04.04.07' => 'Ciencias de la Salud\Medicina\Cirugía ',
                '04.04.08' => 'Ciencias de la Salud\Medicina\Coloproctología ',
                '04.04.09' => 'Ciencias de la Salud\Medicina\Columna ',
                '04.04.10' => 'Ciencias de la Salud\Medicina\Córnea ',
                '04.04.11' => 'Ciencias de la Salud\Medicina\Cuidados intensivos ',
                '04.04.12' => 'Ciencias de la Salud\Medicina\Dermatología ',
                '04.04.13' => 'Ciencias de la Salud\Medicina\Dolor ',
                '04.04.14' => 'Ciencias de la Salud\Medicina\Ecocardiología ',
                '04.04.15' => 'Ciencias de la Salud\Medicina\Endocrinología',
                '04.04.16' => 'Ciencias de la Salud\Medicina\Fisiatría ',
                '04.04.17' => 'Ciencias de la Salud\Medicina\Fisiología ',
                '04.04.18' => 'Ciencias de la Salud\Medicina\Gastroenterología ',
                '04.04.19' => 'Ciencias de la Salud\Medicina\Gastrointestinal ',
                '04.04.20' => 'Ciencias de la Salud\Medicina\Genética ',
                '04.04.21' => 'Ciencias de la Salud\Medicina\Geriatría ',
                '04.04.22' => 'Ciencias de la Salud\Medicina\Ginecobstetricia ',
                '04.04.23' => 'Ciencias de la Salud\Medicina\Glaucoma ',
                '04.04.24' => 'Ciencias de la Salud\Medicina\Hematología ',
                '04.04.25' => 'Ciencias de la Salud\Medicina\Hemodinamia ',
                '04.04.26' => 'Ciencias de la Salud\Medicina\Imagen Corporal ',
                '04.04.27' => 'Ciencias de la Salud\Medicina\Imagenología ',
                '04.04.28' => 'Ciencias de la Salud\Medicina\Infectología ',
                '04.04.29' => 'Ciencias de la Salud\Medicina\Intervencionista',
                '04.04.30' => 'Ciencias de la Salud\Medicina\Laboratorio Clínico',
                '04.04.31' => 'Ciencias de la Salud\Medicina\Laparoscópica',
                '04.04.32' => 'Ciencias de la Salud\Medicina\Mama ',
                '04.04.33' => 'Ciencias de la Salud\Medicina\Mano ',
                '04.04.34' => 'Ciencias de la Salud\Medicina\Medicina Aereoespacial ',
                '04.04.35' => 'Ciencias de la Salud\Medicina\Medicina de Urgencias',
                '04.04.36' => 'Ciencias de la Salud\Medicina\Medicina del Deporte ',
                '04.04.37' => 'Ciencias de la Salud\Medicina\Medicina del Trabajo ',
                '04.04.38' => 'Ciencias de la Salud\Medicina\Medicina Estética',
                '04.04.39' => 'Ciencias de la Salud\Medicina\Medicina Familiar ',
                '04.04.40' => 'Ciencias de la Salud\Medicina\Medicina Forense ',
                '04.04.41' => 'Ciencias de la Salud\Medicina\Medicina Interna',
                '04.04.42' => 'Ciencias de la Salud\Medicina\Medicina Nuclear ',
                '04.04.43' => 'Ciencias de la Salud\Medicina\Nefrología ',
                '04.04.44' => 'Ciencias de la Salud\Medicina\Neonatología ',
                '04.04.45' => 'Ciencias de la Salud\Medicina\Neumología ',
                '04.04.46' => 'Ciencias de la Salud\Medicina\Neurocirugía',
                '04.04.47' => 'Ciencias de la Salud\Medicina\Neurofisiología',
                '04.04.48' => 'Ciencias de la Salud\Medicina\Neurología ',
                '04.04.49' => 'Ciencias de la Salud\Medicina\Oftalmología ',
                '04.04.50' => 'Ciencias de la Salud\Medicina\Oncología ',
                '04.04.51' => 'Ciencias de la Salud\Medicina\Oncología - Hematología ',
                '04.04.52' => 'Ciencias de la Salud\Medicina\Ortopedia ',
                '04.04.53' => 'Ciencias de la Salud\Medicina\Otología ',
                '04.04.54' => 'Ciencias de la Salud\Medicina\Otorrinolaringología ',
                '04.04.55' => 'Ciencias de la Salud\Medicina\Patología ',
                '04.04.56' => 'Ciencias de la Salud\Medicina\Pediatría ',
                '04.04.57' => 'Ciencias de la Salud\Medicina\Plástica ',
                '04.04.58' => 'Ciencias de la Salud\Medicina\Psiquiatría',
                '04.04.59' => 'Ciencias de la Salud\Medicina\Psiquiatría de Enlace ',
                '04.04.60' => 'Ciencias de la Salud\Medicina\Radioterapia ',
                '04.04.61' => 'Ciencias de la Salud\Medicina\Reproducción Humana ',
                '04.04.62' => 'Ciencias de la Salud\Medicina\Reumatología ',
                '04.04.63' => 'Ciencias de la Salud\Medicina\Rodilla ',
                '04.04.64' => 'Ciencias de la Salud\Medicina\Tórax ',
                '04.04.65' => 'Ciencias de la Salud\Medicina\Toxicología ',
                '04.04.66' => 'Ciencias de la Salud\Medicina\Trasplantes ',
                '04.04.67' => 'Ciencias de la Salud\Medicina\Urología ',
                '04.04.68' => 'Ciencias de la Salud\Medicina\Vascular',
                '04.06.01' => 'Ciencias de la Salud\Odontología\Cirugía Oral\Maxilofacial ',
                '04.06.02' => 'Ciencias de la Salud\Odontología\Endodoncia ',
                '04.06.03' => 'Ciencias de la Salud\Odontología\Estomatología\Patología Oral y afines ',
                '04.06.04' => 'Ciencias de la Salud\Odontología\Implantología ',
                '04.06.05' => 'Ciencias de la Salud\Odontología\Laboratorio Dental ',
                '04.06.06' => 'Ciencias de la Salud\Odontología\Odontopediatría ',
                '04.06.07' => 'Ciencias de la Salud\Odontología\Ortodoncia ',
                '04.06.08' => 'Ciencias de la Salud\Odontología\Periodoncia ',
                '04.06.09' => 'Ciencias de la Salud\Odontología\Prostodoncia ',
                '04.06.10' => 'Ciencias de la Salud\Odontología\Rehabilitación Oral',
                '04.07.01' => 'Ciencias de la Salud\Optometría\otros programas de Ciencias de la Salud\Optometría ',
                '04.07.02' => 'Ciencias de la Salud\Optometría\otros programas de Ciencias de la Salud\Otros programas de Ciencias de la Salud ',
                '04.09.01' => 'Ciencias de la Salud\Terapias\Fisioterapia',
                '04.09.02' => 'Ciencias de la Salud\Terapias\Fonoaudiología',
                '04.09.03' => 'Ciencias de la Salud\Terapias\Terapia ocupacional',
                '04.09.04' => 'Ciencias de la Salud\Terapias\Terapia respiratoria',
                '05.01.01' => 'Ciencias Sociales y Humanas\Antropología, Artes Liberales\Antropología ',
                '05.01.02' => 'Ciencias Sociales y Humanas\Antropología, Artes Liberales\Artes Liberales',
                '05.02.01' => 'Ciencias Sociales y Humanas\Bibliotecología, otros de Ciencias Sociales y Humanas\Bibliotecología ',
                '05.02.02' => 'Ciencias Sociales y Humanas\Bibliotecología, otros de Ciencias Sociales y Humanas\Otros de Ciencias Sociales y Humanas',
                '05.04.01' => 'Ciencias Sociales y Humanas\Comunicación Social, Periodismo y afines\Periodismo ',
                '05.06.02' => 'Ciencias Sociales y Humanas\Derecho y afines\Seguros',
                '05.07.01' => 'Ciencias Sociales y Humanas\Filosofía, Teología y afines\Filosofía ',
                '05.07.02' => 'Ciencias Sociales y Humanas\Filosofía, Teología y afines\Teología y afines',
                '05.09.01' => 'Ciencias Sociales y Humanas\Geografía e Historia\Geografía ',
                '05.09.02' => 'Ciencias Sociales y Humanas\Geografía e Historia\Historia',
                '05.10.01' => 'Ciencias Sociales y Humanas\Lenguas Modernas, Literatura, Lingüística y afines\Lenguas Modernas ',
                '05.10.02' => 'Ciencias Sociales y Humanas\Lenguas Modernas, Literatura, Lingüística y afines\Literatura\Lingüística y afines',
                '05.12.01' => 'Ciencias Sociales y Humanas\Sociología, Trabajo Social y afines\Familia ',
                '05.12.02' => 'Ciencias Sociales y Humanas\Sociología, Trabajo Social y afines\Gerontología',
                '05.12.03' => 'Ciencias Sociales y Humanas\Sociología, Trabajo Social y afines\Sociología ',
                '05.12.04' => 'Ciencias Sociales y Humanas\Sociología, Trabajo Social y afines\Trabajo Social',
                '06.01.01' => 'Economía, Administración, Contaduría y afines\Administración\Control Interno',
                '06.01.02' => 'Economía, Administración, Contaduría y afines\Administración\Finanzas',
                '06.01.03' => 'Economía, Administración, Contaduría y afines\Administración\Formulación, Evaluación y Gestión de Proyectos ',
                '06.01.04' => 'Economía, Administración, Contaduría y afines\Administración\Mercados',
                '06.01.05' => 'Economía, Administración, Contaduría y afines\Administración\Negocios Internacionales',
                '06.01.06' => 'Economía, Administración, Contaduría y afines\Administración\Recursos Humanos',
                '06.01.07' => 'Economía, Administración, Contaduría y afines\Administración\Sector Público',
                '06.01.08' => 'Economía, Administración, Contaduría y afines\Administración\Sector Turismo',
                '06.02.01' => 'Economía, Administración, Contaduría y afines\Contaduría Pública\Auditoría de Sistemas',
                '06.02.02' => 'Economía, Administración, Contaduría y afines\Contaduría Pública\Auditoría en Salud',
                '06.03.01' => 'Economía, Administración, Contaduría y afines\Economía\Comercio Exterior',
                '06.03.02' => 'Economía, Administración, Contaduría y afines\Economía\Formulación, Evaluación y Gestión de Proyectos',
                '07.03.01' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería Agrícola, Forestal y afines\Ingeniería Agrícola ',
                '07.03.02' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería Agrícola, Forestal y afines\Ingeniería Forestal',
                '07.04.01' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería Agroindustrial, Alimentos y afines\Alimentos',
                '07.05.01' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería Agronómica, Pecuaria y afines\Ingeniería Agronómica ',
                '07.05.02' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería Agronómica, Pecuaria y afines\Ingeniería Pecuaria',
                '07.06.01' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería Ambiental, Sanitaria y afines\Administración Ambiental',
                '07.10.01' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería De Sistemas\Telemática y afines\Administración de Sistemas de Información',
                '07.12.01' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería Electrónica\Telecomunicaciones y afines\Ingeniería en Telecomunicaciones',
                '07.13.01' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería Industrial y afines\Calidad ',
                '07.13.02' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería Industrial y afines\Higiene y Seguridad Industrial ',
                '07.13.03' => 'Ingeniería, Arquitectura, Urbanismo y afines\Ingeniería Industrial y afines\Logística',
                '07.16.01' => 'Ingeniería, Arquitectura, Urbanismo y afines\Otras Ingenierías\Sistemas de Información Geográfica',
                '08.01.01' => 'Matemáticas y Ciencias Naturales \Biología, Microbiología y afines\Biología y afines ',
                '08.01.02' => 'Matemáticas y Ciencias Naturales \Biología, Microbiología y afines\Microbiología y afines',
                '08.03.01' => 'Matemáticas y Ciencias Naturales \Geología, otros programas de Ciencias Naturales\Geología ',
                '08.03.02' => 'Matemáticas y Ciencias Naturales \Geología, otros programas de Ciencias Naturales\Otros programas de Ciencias Naturales',
                '08.04.01' => 'Matemáticas y Ciencias Naturales \Matemáticas, Estadística y afines\Estadística ',
                '08.04.02' => 'Matemáticas y Ciencias Naturales \Matemáticas, Estadística y afines\Matemáticas',
                '08.05.01' => 'Matemáticas y Ciencias Naturales \Química y afines\Farmacia ');
            $row[1] = $arrayNBC["$row[1]"];
        }
        $identificador.=" $row[0] - $row[1], ";
    }
    $identificador = substr($identificador, 0, sizeof($identificador) - 3);

    /* ------------------- */

    /* Ambito */
    $ambito = "";
    $rambito = $c->getGeneralCoverage($data[0]);
    while ($row = pg_fetch_array($rambito)) {
        $ambito.="$row[0], ";
    }
    $ambito = substr($ambito, 0, sizeof($ambito) - 3);

    /* ------------------- */

    /* Estructura */
    $arraygeneralStructure = array("" => "", "1" => "atómica", "2" => "colección", "3" => "en red", "4" => "jerárquica", "5" => "lineal");
    $estructura = "";
    $restructura = $c->getGeneralStructure($data[0]);
    $row = pg_fetch_array($restructura);
    $estructura = $arraygeneralStructure[$row[0]];

    /* ------------------- */

    /* Nivel de Agregacion */
    $raggregationLevel = pg_fetch_array($c->getGeneralAggregationLevel($data[0]));
    $aggregationLevel = $raggregationLevel[0];
    if ($aggregationLevel == "none") {
        $aggregationLevel = "";
    }
    /* -------------- */

    /* Tamaño */

    $tamano = "";
    $rtamano = $c->getTechnicalSize($data[0]);
    $row = pg_fetch_array($rtamano);
    $tamano = $row[0];
    if ($tamano < 1024) {
        $tamano = $tamano . "Bytes";
    } else if ($tamano < 1048576) {
        $tamano = $tamano / 1000;
        $tamano = round($tamano);
        $tamano = $tamano . " KB";
    } else {
        $tamano = $tamano / 1000000;
        $tamano = round($tamano);
        $tamano = $tamano . " MB";
    }

    /* ------------------- */

    /* Localizacion */
    $rlocation = $c->getTechnicalLocation($data[0]);
    $location = "";
    $i = 0;
    $rutaAbsoluta = "";
    while ($row = pg_fetch_array($rlocation)) {
        $rutaAbsoluta = $row[0]; //es la ruta pero si ninguna etiqueta;
        $i++;
        $location.="<a class='link' href='$row[0]' style='text-decoration:none' target='_blank'>$row[0]</a>, ";
    }
    $location = substr($location, 0, sizeof($location) - 3);
    /* ------------------- */

    /* Tipo de Interactividad  */
    $rinteractivityType = $c->getEducationalInteractivityType($data[0]);
    $interactivityType = "";
    $arrayinteractivityType = array("" => "", "none" => "", "1" => "activo", "2" => "expositivo", "3" => "combinado");
    while ($row = pg_fetch_array($rinteractivityType)) {
        $interactivityType.=$arrayinteractivityType[$row[0]] . ", ";
    }
    $interactivityType = substr($interactivityType, 0, sizeof($interactivityType) - 3);
    /* ------------------------ */

    /* Tipo de Recurso Educativo: */
    $rlearningResourceType = $c->getEducationalLearningResourceType($data[0]);
    $learningResourceType = "";
    $i = 0;
    $arraylearningResourceType = array("none" => "", "1" => "ejercicio", "2" => "simulación", "3" => "cuestionario", "4" => "diagrama", "5" => "figura", "6" => "gráfico", "7" => "índice", "8" => "diapositiva", "9" => "tabla", "10" => "texto narrativo", "11" => "examen", "12" => "experimento", "13" => "planteamiento de problema ", "14" => "autoevaluación ", "15" => "conferencia");
    while ($row = pg_fetch_array($rlearningResourceType)) {
        $i++;
        $learningResourceType.=$arraylearningResourceType[$row[0]] . ", ";
    }
    $learningResourceType = substr($learningResourceType, 0, sizeof($learningResourceType) - 3);
    /* ----------------------- */

    /* Uso Educativo, Descripcion */

    $educationalDescription = "";
    $reducationalDescription = $c->getEducationalDescription($data[0]);
    while ($row = pg_fetch_array($reducationalDescription)) {
        $educationalDescription.="<li class='listas'> " . $row[0] . "</li>";
    }
    /* ------ */

    /* Costo */
    $arraytechnicalCost = array("" => "", "none" => "", "1" => "si", "2" => "no");
    $costo = "";
    $rcosto = $c->getRightsCost($data[0]);
    $row = pg_fetch_array($rcosto);
    $costo = $arraytechnicalCost[$row[0]];
    /* ------------------- */

    /* Derechos de Autor y otras Restriccione */
    $arrayRightsCos = array("" => "", "none" => "", "1" => "si", "2" => "no");
    $derechosAutor = "";
    $rderechosAutor = $c->getRightsCost($data[0]);
    $row = pg_fetch_array($rderechosAutor);
    $derechosAutor = $arrayRightsCos[$row[0]];
    /* ------------------- */

    $result2 = $c->obtenerRating($data[0]);
    $valoracion = pg_fetch_array($result2);
    $valoracion = round($valoracion[0]);
    $totalVotos = $c->contarVotos($data[0]);
    $totalVotos = pg_fetch_array($totalVotos);
    $metricas = $c->obtenerMetricas($data[0]);
    $metricas = pg_fetch_array($metricas);
    $completitud = $metricas["completeness"];
    $consistencia = $metricas["consistence"];
    $coherencia = $metricas["coherence"];

    $datos["title"] = $title;
    $datos["cantidadDescargas"] = $cantidadDescargas;
    $datos["ubicacion"] = $ubicacion;
    $datos["description"] = $description;
    $datos["keyword"] = $keys;
    $datos["format"] = $format;
    $datos["uploadBy"] = $uploadBy;
    $datos["insertionDate"] = $insertionDate;
    $datos["valoracion"] = $valoracion;
    $datos["totalVotos"] = $totalVotos[0];
    $datos["completitud"] = $completitud;
    $datos["consistencia"] = $consistencia;
    $datos["coherencia"] = $coherencia;
    $datos["identificador"] = $identificador;
    $datos["language"] = $language;
    $datos["ambito"] = $ambito;
    $datos["estructura"] = $estructura;
    $datos["aggregationLevel"] = $aggregationLevel;
    $datos["tamano"] = $tamano;
    $datos["location"] = $location;
    $datos["rutaAbsoluta"] = $rutaAbsoluta;
    $datos["learningResourceType"] = $learningResourceType;
    $datos["interactivityType"] = $interactivityType;
    $datos["educationalDescription"] = $educationalDescription;
    $datos["costo"] = $costo;
    $datos["derechosAutor"] = $derechosAutor;

    $objetos[$data['0']] = $datos;
}
?>
<script>
    $(document).ready(function() {
        $("#tablaOA .informacionOculta").hide();
        $("#botonesNavegacion a").click(function() {
            var pos = "";
            var order = $("#posicion").attr("order");
            var totalOAHide = $("#posicion").attr("totalOAHide");
            var posInicial = parseInt($("#posicion").attr("pos"));
            var flag = false;
            switch ($(this).attr("id")) {
                case "primero":
                    if (posInicial >= 10) {
                        pos = 0;
                        flag = true;
                    }
                    break;
                case "anteriores":
                    if (posInicial >= 100) {
                        pos = posInicial - 100;
                        flag = true;
                    }
                    break;
                case"anterior":
                    if (posInicial >= 10) {
                        pos = posInicial - 10;
                        flag = true;
                    }
                    break;
                case "siguiente":
                    if (posInicial + 10 < totalOAHide) {
                        pos = posInicial + 10;
                        flag = true;
                    }
                    break;
                case "siguientes":
                    if (posInicial + 100 < totalOAHide) {
                        pos = posInicial + 100;
                        flag = true;
                    }
                    break;
                case "ultimo":
                    if (posInicial + 10 < totalOAHide) {
                        var modulo = totalOAHide % 10;
                        if (modulo == 0) {
                            pos = totalOAHide - 10;
                        }
                        else {
                            pos = totalOAHide - (totalOAHide % 10);
                        }
                        flag = true;
                    }
                    break;
            }

            if (flag) {
                $("#orderBy").attr("value", order);
                if ($('#busquedaSimple').is(':visible')) {
                    $.ajax({
                        type: 'POST',
                        url: "control/busquedaC.php?action=simple" + "&pos=" + pos,
                        data: $("#busquedaSimple").serialize(),
                        success: function(result) {
                            $("#contenedorResultados").html(result);
                        }
                    });
                } else if ($('#busquedaAvanzada').is(':visible')) {
                    $.ajax({
                        type: 'POST',
                        url: "control/busquedaC.php?action=avanzada" + "&pos=" + pos,
                        data: $("#busquedaAvanzada").serialize(),
                        success: function(result) {
                            $("#contenedorResultados").html(result);
                        }
                    });
                }



                //                    $.ajax({
                //                        type:'POST',
                //                        url:"control/busquedaC.php?action=simple"+"&pos="+pos,       
                //                        data:$("#busquedaSimple").serialize(),
                //                        success:    function(result){
                //                            $("#contenedorResultados").html(result);
                //                        }
                //                    });
            }



        });

        $("#criterioOrder").change(function() {
            $("#orderBy").attr("value", $(this).val());
            if ($('#busquedaSimple').is(':visible')) {
                $.ajax({
                    type: 'POST',
                    url: "control/busquedaC.php?action=simple",
                    data: $("#busquedaSimple").serialize(),
                    success: function(result) {
                        $("#contenedorResultados").html(result);
                    }
                });
            } else if ($('#busquedaAvanzada').is(':visible')) {
                $("#orderByAvanzada").attr("value", $(this).val());
                $.ajax({
                    type: 'POST',
                    url: "control/busquedaC.php?action=avanzada",
                    data: $("#busquedaAvanzada").serialize(),
                    success: function(result) {
                        $("#contenedorResultados").html(result);
                    }
                });
            }
        });
        $("#tablaOA .informacionOculta").hide();
        ///Información Oculta////////
        $("#tablaOA .verInformacionOculta").toggle(
                function() {
                    var i = $(this).attr("i");
                    $("#informacionOculta" + i).show("normal");
                    $(this).attr("value", seeLess);
                },
                function() {
                    var i = $(this).attr("i");
                    $("#informacionOculta" + i).hide("normal");
                    $(this).attr("value", "Ver más");
                });
    });
</script>

<div id="contenedorOA">
<!--    <input id="oculto" type="text" value="" >-->

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

                $valoracion .= " <a href='main.php?action=rateComments&idOA=$objeto' class='contadorVotos link'>(" . $datos['totalVotos'] . " Votos) </a></span>";

                $informacionOculta = "";
                if ($datos["identificador"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>$catalog - $entry:</label>" . $datos['identificador'] . "</div>";
                }
                if ($datos["language"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>$language:</label>" . $datos['language'] . "</div>";
                }
                if ($datos["ambito"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>$coverage:</label>" . $datos['ambito'] . "</div>";
                }
                if ($datos["estructura"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>$structure:</label>" . $datos['estructura'] . "</div>";
                }
                if ($datos["aggregationLevel"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>$aggregationLevel:</label>" . $datos['aggregationLevel'] . "</div>";
                }
                if ($datos["tamano"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>$size2:</label>" . $datos['tamano'] . " </div>";
                }
                if ($datos["location"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>$location2:</label>" . $datos['location'] . "</div>";
                }
                if ($datos["interactivityType"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>$interactivityType:</label>" . $datos['interactivityType'] . "</div>";
                }
                if ($datos["learningResourceType"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>$learningResourceType:</label>" . $datos['learningResourceType'] . "</div>";
                }
                if ($datos["educationalDescription"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label> $educationalDescription:</label><ul>" . $datos['educationalDescription'] . "</ul></div>";
                }
                if ($datos["costo"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>$cost:</label>" . $datos['costo'] . "</div>";
                }
                if ($datos["derechosAutor"] != "") {
                    $informacionOculta.="<div class='filaTabla'> <label>$copyrightAndOtherRestrictions:</label>" . $datos['derechosAutor'] . "</div>";
                }
                if (isset($_SESSION["iduser_roap"])) {
                    $opciones = " <a class='downloadOaimg' idlo='$objeto' title='Descargar' href='" . $datos["rutaAbsoluta"] . "'></a>
                                  <a class='exportarOaimg'  href='control/exportarOa/export.php?idlo=$objeto' title='Exportar'></a>
                                  <a class='cambiarColeccionOA' nombreOA='" . $datos['title'] . "' idlo='$objeto' title='$changeCollection'></a>
                                  <a  class='editarOaimg'  idlo='$objeto' title='$edit'></a>
                                  <a class='borrarOaimg' idlo='$objeto' title='$delete'></a>";
                } else {
                    $opciones = "<a class='downloadOaimg' idlo='$objeto'  title='Descargar' href='" . $datos["rutaAbsoluta"] . "'></a>
                                 <a class='exportarOaimg' href='control/exportarOa/export.php?idlo=$objeto' title='Exportar'></a>
                                 <a class='cambiarColeccionOA'  nombreOA='" . $datos['title'] . "' idlo='$objeto' title='$changeCollection'></a>";
                }

                echo "<tr>
                      <td>
                     <div class='filaTabla'> <label>$title2:</label>   <a class='linkTitulo link'  target='_blank' title='Descargar este Objeto de Aprendizaje' href='" . $datos["rutaAbsoluta"] . "' idlo='$objeto'>" . $datos['title'] . "</a> </div>";
                if ($datos['ubicacion'] != "") {
                    echo "<div class='filaTabla'> <label>$ubiety:</label>" . $datos['ubicacion'] . "</div>";
                }
                if ($datos['description'] != "") {
                    echo "<div class='filaTabla'> <label>$description:</label><ul>" . $datos['description'] . "</ul> </div>";
                }
                if ($datos['keyword'] != "") {
                    echo "<div class='filaTabla'> <label>$keywords:</label>" . $datos['keyword'] . "</div>";
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
                             <div class='filaTabla'> <label>$uploadedBy:</label>" . $datos['uploadBy'] . "</div>
                             <div class='filaTabla'> <label> $uploadedDate:</label>" . $datos['insertionDate'] . "</div>
                              <div class='filaTabla'><label> $rating:</label>$valoracion</div>
                             <div class='filaTabla'><label class='labelMetrica'> $metadataQuality:</label><div class='contenedorMetricas'><a title='Completitud: " . $datos["completitud"] . "' class='bordeMetricas bordeCompletitud' ><div  class='metricaCompletitud' style='width:" . $anchoCompletitud . "px;'></div></a> <a title='Consistencia: " . $datos["consistencia"] . "' class='bordeMetricas bordeConsistencia' > <div  class='metricaConsistencia' style='width:" . $anchoConsistencia . "px;'></div></a>        <a title='Coherencia: " . $datos["coherencia"] . "' class='bordeMetricas bordeCoherencia' >  <div  class='metricaCoherencia' style='width:" . $anchoCoherencia . "px;'></div></a></div></div>                              
                            <div class='filaTabla'><label>$options:</label> $opciones</div>
                             <div class='filaTabla'><label>$downloads:</label> <a href='main.php?action=downloadHistory&idOA=$objeto' class='link linkHistorialDescargas'>" . $datos['cantidadDescargas'] . "</a></div>
                         </td>
                        </tr>";
                $i++;
            }
        }
        ?>
    </table>
    <?php if (isset($_GET["action"]) && $_GET["action"] != "recomendarOAs" && $_GET["action"] != "dRecomendarOAs") { ?>
        <div id="botonesNavegacion">
            <a id="primero" button="primero" title="Primero"></a>
            <a id="anteriores" button="anteriores" title="100 anteriores"></a>
            <a id="anterior" button="anterior" title="Anterior"></a>
            <span id="posicion" pos="<?php echo $pos ?>" totalOAHide="<?php echo $totalOAHide ?>" order="<?php echo $orderBy ?>"><?php
                $aux1 = $pos + 1;
                $aux2 = $pos + 10;
                echo "$aux1-$aux2"
                ?> </span>
            <a id="siguiente"  button="siguiente" title="Siguiente"></a>
            <a id="siguientes" button="siguientes" title="100 Siguientes"></a>
            <a id="ultimo" button="ultimo" title="Último"></a>
        </div>
    <?php } ?>
</div>

