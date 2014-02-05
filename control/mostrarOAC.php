<?php

$pos = (isset($_GET["pos"])) ? $_GET["pos"] : "0";

$order = (isset($_GET["order"])) ? $_GET["order"] : "insertiondate";

$idC = (isset($_GET["idC"])) ? $_GET["idC"] : -1;
$path = (isset($_GET["path"])) ? $_GET["path"] : -1;

if (!isset($_GET["action"])) {//Si el action no esta definido, estoy en la pagina de inicio
    $order = "insertiondate";
    $from = "main";
} else if ($_GET["action"] == "viewCollection") {
    $from = "collection";
} else if ($_GET["action"] == "surf") {//Si el action esta definido, estoy en una categoria o en busqueda 
    $from = $_GET["from"];
} else if ($_GET["action"] == "search") {
    
}


$pos2 = 10;
if ($order == "insertiondate") {
    $order2 = "ORDER BY min(lo.insertionDate) DESC, COALESCE(avg(rating.valoration),0) DESC, MAX(lom.general_title) ASC, MAX(users.name) ASC";
} else if ($order == "author") {
    $order2 = "ORDER BY MAX(users.name) ASC, COALESCE(avg(rating.valoration),0) DESC, min(lo.insertionDate) DESC,  MAX(lom.general_title) ASC ";
} else if ($order == "valoration") {
    $order2 = "ORDER BY COALESCE(avg(rating.valoration),0) DESC,min(lo.insertionDate) DESC,  MAX(lom.general_title) ASC, MAX(users.name) ASC";
} else if ($order == "title") {
    $order2 = "ORDER BY MAX(lom.general_title) ASC, COALESCE(avg(rating.valoration),0) DESC,MIN(lo.insertionDate) DESC,   MAX(users.name) ASC";
}
if (isset($_GET["idC"])) {
    $idC = $_GET["idC"];
    $query = "SELECT lo.idlo
             FROM users natural join lo left outer join 
             lom on (lom.idlo=lo.idlo) left outer join rating on(lo.idlo=rating.idlo) WHERE idsubcollection='$idC' AND lo.idlo not in (select idlo from pending where iduserfrom=iduserto)
             GROUP BY lo.idlo $order2 LIMIT $pos2 OFFSET $pos";


    $idlos = $c->realizarOperacion($query);
    $path = $_GET["path"];
    $querytotalOAHide = "select count(*) from lo where idsubcollection='$idC' and idlo not in(select idlo from pending where type=7)";
    $totalOAHide = $c->realizarOperacion($querytotalOAHide);
    $totalOAHide = pg_fetch_array($totalOAHide);
} else if (isset($_GET["action"]) && ($_GET["action"] == "search")) {
    $from = "search";
    if ($order == "insertiondate") {
        $order2 = "ORDER BY min(lo.insertionDate) DESC, COALESCE(avg(rating.valoration),0) DESC, MAX(lom.general_title) ASC, MAX(users.name) ASC";
    } else if ($order == "author") {
        $order2 = "ORDER BY MAX(users.name) ASC, COALESCE(avg(rating.valoration),0) DESC, min(lo.insertionDate) DESC,  MAX(lom.general_title) ASC ";
    } else if ($order == "valoration") {
        $order2 = "ORDER BY COALESCE(avg(rating.valoration),0) DESC,min(lo.insertionDate) DESC,  MAX(lom.general_title) ASC, MAX(users.name) ASC";
    } else if ($order == "title") {
        $order2 = "ORDER BY MAX(lom.general_title) ASC, COALESCE(avg(rating.valoration),0) DESC,min(lo.insertionDate) DESC,   MAX(users.name) ASC";
    }

    $search = trim(($_POST['inputbusquedasimple1']));

    $query = "SELECT lo.idlo
FROM users natural join lo left outer join lom on (lo.idlo=lom.idlo) left outer join general_keyword on (lo.idlo=general_keyword.idlo) left outer join technical_format on (lom.idlo=technical_format.idlo) left outer join rating on(lom.idlo=rating.idlo) WHERE lom.general_title like '%$search%' or 
users.name like '%$search%' or general_keyword.keyword like '%$search%' or technical_format.format like '%$search%' group by lo.idlo $order2 LIMIT $pos2 OFFSET $pos";
    $idlos = $c->realizarOperacion($query);
    $path = "Resultados de la Búsqueda";
    $totalOA = "";
    $querytotalOAHide = pg_num_rows($idlos);
    $totalOAHide[0] = $querytotalOAHide;
} else {
    $idlos = $c->TopNOrdenados("2", $order2, $pos, $pos2);
    $path = $lastIndexedLearningObjects;
    $totalOA = "";
    $querytotalOAHide = "select count(*) from lo where idlo not in (select idlo from pending where type=7)";
    $totalOAHide = $c->realizarOperacion($querytotalOAHide);
    $totalOAHide = pg_fetch_array($totalOAHide);
}


$totalOA = "(" . $totalOAHide[0] . " $objectsFound)";
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
            if (isset($arrayNBC["$row[1]"])) {
                $row[1] = $arrayNBC["$row[1]"];
            }
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