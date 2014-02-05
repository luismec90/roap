<?php

class CreadorConsultaAvanzada {

    var $table;
    var $restriction;
    var $order;
    var $subcollection;

    function __construct($order, $isSub, $subcollection) {
        $this->order = $order;
        if ($isSub) {
            $this->table = "users";
            $this->restriction = " subcollection.idsubcollection=$subcollection AND (";
            $this->subcollection = $subcollection;
        } else {
            $this->table = "users";
            $this->restriction = "";
            $this->subcollection = $subcollection;
        }
    }

    function addTable($name, $enlace) {
        $this->table.= " LEFT OUTER JOIN $name ON($enlace)";
    }

    function addRestriction($attribute, $operador, $value) {
        $this->restriction.= " $attribute $operador $value";
    }

    function getQuery() {
        return "SELECT idlo FROM $this->table WHERE $this->restriction) GROUP BY lom.idlo ORDER BY $this->order";
    }

}

?>
