<?php

//////////////// O T H E R S /////////////////

function importIdentifiers($categoria, $metadato, $etiqueta) {
    global $c;
    $label = $categoria->getElementsByTagName(strtolower($etiqueta));
    $table = ucfirst($metadato) . "_" . lcfirst($etiqueta);
    $rfield = ucfirst($metadato) . lcfirst($etiqueta);
    foreach ($label as $tag) {
        $c->insertar($table, "idlo", $GLOBALS['idlo']);
        $t = $tag->getElementsByTagName("catalog");
        $w = $tag->getElementsByTagName("entry");
        $var1 = $t->item(0)->nodeValue;
        $var2 = $w->item(0)->nodeValue;
        $last = $c->lastValue($table, "id" . $rfield);
        $c->actualizar($table, "catalog", $var1, "id" . $rfield, $last);
        $c->actualizar($table, "entry", $var2, "id" . $rfield, $last);
    }
}

function importCharacterString1($categoria, $metadato, $etiqueta) {
    global $c;
    $label = $categoria->getElementsByTagName(strtolower($etiqueta));
    $field = ucfirst($metadato) . "_" . lcfirst($etiqueta);
    $rfield = ucfirst($metadato) . lcfirst($etiqueta);
    $var = $label->item(0)->nodeValue;
    $c->actualizar("lom", $field, $var, "idlo", $GLOBALS['idlo']);


    /*
      foreach ($label as $tag) {
      $t = $tag->getElementsByTagName("string");
      $var = $t->item(0)->nodeValue;
      actualizar("lo", $field, $var, "idlo", $GLOBALS['idlo']);
      } */
}

function importCharacterString2($categoria, $metadato, $etiqueta) {
    global $c;
    $label = $categoria->getElementsByTagName(strtolower($etiqueta));
    $table = ucfirst($metadato) . "_" . lcfirst($etiqueta);
    $rfield = ucfirst($metadato) . ucfirst($etiqueta);
    for ($i = 0; $i < ($label->length); $i++) {
        $c->insertar($table, "idlo", $GLOBALS['idlo']);
        $value = $label->item($i)->nodeValue;
        $last = $c->lastvalue($table, "id" . $rfield);
        $c->actualizar($table, $etiqueta, $value, "id" . $rfield, $last);
    }
}

function importLangString1($categoria, $metadato, $etiqueta) {
    global $c;
    $label = $categoria->getElementsByTagName(strtolower($etiqueta));
    $field = ucfirst($metadato) . "_" . lcfirst($etiqueta);
    $rfield = ucfirst($metadato) . lcfirst($etiqueta);
    foreach ($label as $tag) {
        $t = $tag->getElementsByTagName("string");
        $var = $t->item(0)->nodeValue;
        $c->actualizar("lom", $field, $var, "idlo", $GLOBALS['idlo']);
    }
}

function importLangString2($categoria, $metadato, $etiqueta) {
    global $c;
    $label = $categoria->getElementsByTagName(strtolower($etiqueta));
    $table = ucfirst($metadato) . "_" . lcfirst($etiqueta);
    $rfield = ucfirst($metadato) . lcfirst($etiqueta);
    foreach ($label as $tag) {
        $c->insertar($table, "idlo", $GLOBALS['idlo']);
        $t = $tag->getElementsByTagName("string");
        $var = $t->item(0)->nodeValue;
        $last = $c->lastValue($table, "id" . $rfield);
        $c->actualizar($table, $etiqueta, $var, "id" . $rfield, $last);
    }
}

function importVocabulary1($categoria, $metadato, $etiqueta) {
    global $c;
    $label = $categoria->getElementsByTagName(strtolower($etiqueta));
    $field = ucfirst($metadato) . "_" . lcfirst($etiqueta);
    $rfield = ucfirst($metadato) . ucfirst($etiqueta);
    foreach ($label as $tag) {
        $t = $tag->getElementsByTagName("value");
        $var = $t->item(0)->nodeValue;
        $c->actualizar("lom", $field, $var, "idlo", $GLOBALS['idlo']);
    }
}

function importVocabulary2($categoria, $metadato, $etiqueta) {
    global $c;
    $label = $categoria->getElementsByTagName(strtolower($etiqueta));
    $table = ucfirst($metadato) . "_" . lcfirst($etiqueta);
    $rfield = ucfirst($metadato) . lcfirst($etiqueta);
    foreach ($label as $tag) {
        $c->insertar($table, "idlo", $GLOBALS['idlo']);
        $t = $tag->getElementsByTagName("value");
        $var = $t->item(0)->nodeValue;
        $last = $c->lastValue($table, "id" . $rfield);
        $c->actualizar($table, $etiqueta, $var, "id" . $rfield, $last);
    }
}

function importDateTime1($categoria, $metadato, $etiqueta) {
    global $c;
    $label = $categoria->getElementsByTagName(strtolower($etiqueta));
    $field = ucfirst($metadato) . "_" . lcfirst($etiqueta);
    $rfield = ucfirst($metadato) . lcfirst($etiqueta);
    foreach ($label as $tag) {
        $t = $tag->getElementsByTagName("dateTime");
        $var = $t->item(0)->nodeValue;
        $c->actualizar("lom", $field, $var, "idlo", $GLOBALS['idlo']);
    }
}

function importMetaMetadataContribution($categoria, $metadato, $etiqueta) {
    global $c;
    $label = $categoria->getElementsByTagName(strtolower($etiqueta));
    $table = ucfirst($metadato) . "_" . lcfirst($etiqueta);
    $rfield = ucfirst($metadato) . lcfirst($etiqueta);

    //sacamos todos los contributions
    foreach ($label as $tag) {
        $c->insertar($table, "idlo", $GLOBALS['idlo']);
        //sacamos el rol
        $t = $tag->getElementsByTagName("role");
        $last = $c->lastValue($table, "id" . $rfield);
        foreach ($t as $tt) {
            $x = $tt->getElementsByTagName("value");
            $var = $x->item(0)->nodeValue;
            $c->actualizar($table, "role", $var, "id" . $rfield, $last);
        }
        //sacamos la fecha
        $t = $tag->getElementsByTagName("date");
        foreach ($t as $tt) {
            $x = $tt->getElementsByTagName("dateTime");
            $var = $x->item(0)->nodeValue;
            $c->actualizar($table, "date", $var, "id" . $rfield, $last);
        }
        //ponemos el entity
        $t = $tag->getElementsByTagName("entity");

        for ($i = 0; $i < ($t->length); $i++) {
            $c->insertar("MetaMetadataContribute_entity", "idMetaMetadataContribute", $last);
            $value = $t->item($i)->nodeValue;
            $last2 = $c->lastvalue("MetaMetadataContribute_entity", "idMetaMetadataContributeEntity");
            $c->actualizar("MetaMetadataContribute_entity", "entity", $value, "idMetaMetadataContributeEntity", $last2);
        }
    }
}

function importLifeCycleContribution($categoria, $metadato, $etiqueta) {
    global $c;
    $label = $categoria->getElementsByTagName(strtolower($etiqueta));
    $table = ucfirst($metadato) . "_" . lcfirst($etiqueta);
    $rfield = ucfirst($metadato) . lcfirst($etiqueta);


    // $c->insertar($table, "idlo", $GLOBALS['idlo']);
    //sacamos todos los contributions
    foreach ($label as $tag) {
        $c->insertar($table, "idlo", $GLOBALS['idlo']);
        //sacamos el rol
        $t = $tag->getElementsByTagName("role");
        $last = $c->lastValue($table, "id" . $rfield);
        foreach ($t as $tt) {
            $x = $tt->getElementsByTagName("value");
            $var = $x->item(0)->nodeValue;
            $c->actualizar($table, "role", $var, "id" . $rfield, $last);
        }
        //sacamos la fecha
        $t = $tag->getElementsByTagName("date");
        foreach ($t as $tt) {
            $x = $tt->getElementsByTagName("dateTime");
            $var = $x->item(0)->nodeValue;
            $c->actualizar($table, "date", $var, "id" . $rfield, $last);
        }
        //ponemos el entity
        $t = $tag->getElementsByTagName("entity");

        for ($i = 0; $i < ($t->length); $i++) {
            $c->insertar("LifeCycleContribute_entity", "idLifeCycleContribute", $last);
            $value = $t->item($i)->nodeValue;
            $last2 = $c->lastvalue("LifeCycleContribute_entity", "idLifeCycleContributeEntity");
            $c->actualizar("LifeCycleContribute_entity", "entity", $value, "idLifeCycleContributeEntity", $last2);
        }
    }
}


function importTechnicalRequirement($categoria, $metadato, $etiqueta) {
    global $c;
    $label = $categoria->getElementsByTagName(strtolower($etiqueta));
    $table = ucfirst($metadato) . "_Requirements";
    $rfield = ucfirst($metadato) . lcfirst($etiqueta);

    //cada uno de los requirement
    foreach ($label as $tag) {
        $c->insertar($table, "idlo", $GLOBALS['idlo']);
        
      /*  $last = $c->lastValue($table, "id" . $rfield);

        //cada uno de los orComposite
        $orcomposite = $tag->getElementsByTagName("orcomposite");

        
        foreach ($orcomposite as $oc) {
            $tipo_ = "";
            $name_ = "";
            $min_ = "";
            $max_ = "";
            //tipo
            $tipo = $oc->getElementsByTagName("type");
            foreach ($tipo as $tipos) {
                $x = $tipos->getElementsByTagName("value");
                $tipo_ = $x->item(0)->nodeValue;
            }
            //nombre  
            $nombre = $oc->getElementsByTagName("name");
            foreach ($nombre as $nombres) {
                $x = $nombres->getElementsByTagName("value");
                $name_ = $x->item(0)->nodeValue;
            }
            //versions
            $minv = $oc->getElementsByTagName("minimumversion");
            $min_ = $minv->item(0)->nodeValue;

            $maxv = $oc->getElementsByTagName("maximumversion");
            $max_ = $maxv->item(0)->nodeValue;

          //  $c->realizarOperacion("INSERT INTO Requirements_orComposite(idTechnicalRequirements,type,name,minimumVersion,maximumVersion) VALUES($last,'$tipo_','$name_','$min_','$max_')");
        }
         * */
         
    }
}

?>
