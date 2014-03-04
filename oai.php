<?php

header("Content-type: text/xml");
require ('./modelo/conexion.php');
define("SERVER", "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME']);

class OAIPMH {

    var $request;
    var $response;
    var $error;
    var $supported_protocols;
    var $conexion;
    var $token_separator;
    var $limit_page;

    function __construct($request) {
        $this->response = "";
        $this->request = $request;
        $this->supported_protocols['lom'] = true;
        $this->conexion = new conector_pg();
        $this->token_separator = '@';
        $this->limit_page = 100;
        $this->create_response();
    }

    function create_response() {
        $this->add_to_response($this->get_header_XML());
        $this->add_to_response($this->get_header_OAI());
        $this->add_to_response($this->get_response_date());

        switch ($this->request['verb']) {
            case 'GetRecord':
                if ($this->is_valid_getRecord_request()) {
                    $this->add_to_response($this->get_request(true));
                    //cremos la respuestas
                    $this->add_to_response($this->get_record());
                } else {
                    $this->add_to_response($this->get_request(false));
                    //echo ">> {$this->error['GetRecord']}";
                    switch ($this->error['GetRecord']) {
                        case 1:
                            $this->add_to_response($this->get_error("badArgument"));
                            break;
                        case 2:
                            $this->add_to_response($this->get_error("cannotDisseminateFormat"));
                            break;
                        case 3:
                            $this->add_to_response($this->get_error("idDoesNotExist"));
                            break;
                        default :
                            $this->add_to_response($this->get_error("Not supported"));
                            break;
                    }
                }
                break;
            case 'ListRecords';
                if ($this->is_valid_listRecords_request()) {
                    $this->add_to_response($this->get_request(true));
                    $this->get_listRecord();
                    //  $this->get_resumption_token();
                } else {
                    $this->add_to_response($this->get_request(false));
                    //echo ">> {$this->error['GetRecord']}";
                    switch ($this->error['ListRecords']) {
                        case 1:
                            $this->add_to_response($this->get_error("badArgument"));
                            break;
                        case 2:
                            $this->add_to_response($this->get_error("Not supported"));
                            break;
                        case 3:
                            $this->add_to_response($this->get_error("cannotDisseminateFormat"));
                            break;
                        case 4:
                            $this->add_to_response($this->get_error("noRecordsMatch"));
                            break;
                        case 5:
                            $this->add_to_response($this->get_error("noSetHierarchy"));
                            break;
                        case 6:
                            $this->add_to_response($this->get_error("badResumptionToken"));
                            break;
                        default :
                            $this->add_to_response($this->get_error("Not supported"));
                            break;
                    }
                }
                break;

            case 'Identify':

                if ($this->is_valid_identify_request()) {
                    $this->add_to_response($this->get_request(true));
                    $this->add_to_response($this->get_data_Identify());
                } else {
                    $this->add_to_response($this->get_request(false));
                    $this->add_to_response($this->get_error("badArgument"));
                }
                break;
            default :
                $this->add_to_response($this->get_request(false));
                $this->add_to_response($this->get_error("badVerb"));
                break;
        }

        $this->add_to_response($this->get_footer_OAI());
    }

    public function print_response() {

//echo $this->get_full_query_offset(10);
        echo ($this->response);
    }

    //VALIDACIONES 
    //GETRECORD
    private function is_valid_getRecord_request() {

        if ($this->has_all_getRecord_arguments()) {

            if ($this->has_supported_getRecord_format()) {
                if ($this->has_getRecord_record()) {
                    return true;
                } else {
                    $this->error['GetRecord'] = 3;
                }
            } else {
                $this->error['GetRecord'] = 2;
            }
        } else {

            $this->error['GetRecord'] = 1;
        }
        return false;
    }

    private function has_all_getRecord_arguments() {
        return (isset($this->request['verb']) && isset($this->request['identifier']) && isset($this->request['metadataPrefix']) && sizeof($this->request) == 3) ? true : false;
    }

    private function has_supported_getRecord_format() {

        if (isset($this->request['resumptionToken']))
            return true;

        return (isset($this->supported_protocols[$this->request['metadataPrefix']]));
    }

    private function has_getRecord_record() {
        $result = $this->get_xmlo($this->request['identifier']);

        return pg_num_rows($result) == 1;
    }

    private function get_record() {
        $this->add_to_response($this->close_below("GetRecord", $this->close_below("record", $this->close_below("header", $this->close("identifier", SERVER) . $this->close("datestamp", $this->get_xmlo($this->request['identifier'], 'insertiondate', false)))) . $this->close_below("metadata", $this->get_xmlo($this->request['identifier'], 'xmlo', false))));
    }

    private function get_listRecord() {
        $offset = 0;
        if ($this->has_resumption_token()) {
            $resumptionToken = $this->split_resumption_token();
            $offset = $resumptionToken['offset'];
        }


        $this->add_to_response($this->initial_label("ListRecords"));
        $objetos = $this->conexion->realizarOperacion($this->get_full_query_offset($offset));
        //  $deleted = $this->conexion->realizarOperacion($this->get_listRecordsDeleted_query());
        while ($data = pg_fetch_array($objetos)) {
            $this->create_record($data);
        }
//        while ($data = pg_fetch_array($deleted)) {
//            $this->create_deleted_record($data);
//        }

        $this->get_resumption_token();            // aqui se agrega el resumption token
        $this->add_to_response($this->final_label("ListRecords"));
    }

    private function get_listRecordsDeleted_query() {
        $query = "SELECT idlo, '' as  xmlo, '' as lastModified, date, 1 as deleted FROM deletedlo WHERE TRUE ";
        if (isset($this->request['from']) && !isset($this->request['until'])) {
            $query .= "AND date >= '{$this->request['from']}' ";
        } else if (isset($this->request['from']) && isset($this->request['until'])) {
            $query .= "AND date >= '{$this->request['from']}' AND date <=  '{$this->request['until']}'";
        } else if (!isset($this->request['from']) && isset($this->request['until'])) {
            $query .= "AND date <= '{$this->request['until']}'";
        }
        return $query;
    }

    private function create_deleted_record($data) {
        $this->add_to_response($this->initial_label("record"));
        $this->add_to_response("<header status='deleted'>");
        $this->add_to_response($this->close("identifier", $data['idlo']));
        $this->add_to_response($this->close("datestamp", $data['date']));
        $this->add_to_response($this->final_label("header"));
        $this->add_to_response($this->final_label("record"));
    }

    private function create_record($data) {
        //var_dump($data);
        if ($data['deleted'] == 0) {

            $this->add_to_response($this->initial_label("record"));
            $this->add_to_response($this->initial_label("header"));
            $this->add_to_response($this->close("identifier", $data['idlo']));
            $this->add_to_response($this->close("datestamp", $data['lastmodified'])); //strftime("%Y-%m-%dT%H:%M:%SZ")
            $this->add_to_response($this->final_label("header"));
            $this->add_to_response($this->initial_label("metadata"));
            $this->add_to_response($data['xmlo']);
            $this->add_to_response($this->final_label("metadata"));
            $this->add_to_response($this->final_label("record"));
        } else if ($data['deleted'] == 1) {
            $this->create_deleted_record($data);
        }
    }

    //LISTRECORDS
    private function is_valid_listRecords_request() {
        if ($this->has_all_listRecords_arguments()) {
            if ($this->has_supported_getRecord_format()) {
                if ($this->has_listRecords_record()) {
                    if ($this->has_valid_resumption_token()) {
                        return true;
                    } else {
                        $this->error['ListRecords'] = 6;
                    }
                } else {
                    $this->error['ListRecords'] = 4;
                }
            } else {
                $this->error['ListRecords'] = 3;
            }
        } else {
            //   echo "pasa1";
            if ($this->has_listRecords_set_argument()) {
                $this->error['ListRecords'] = 5;
            } else {

                $this->error['ListRecords'] = 1;
            }
        }
    }

    //identify
    private function is_valid_identify_request() {
        return (count($this->request) == 1 && isset($this->request['verb']) && $this->request['verb'] == "Identify");
    }

    #information about idetify verb

    private function get_data_Identify() {


        $information = $this->get_repository_information();


        $this->add_to_response($this->initial_label("Identify"));

        $this->add_to_response($this->close("repositoryName", $information['repository_name']));
        $this->add_to_response($this->close("baseURL", SERVER));
        $this->add_to_response($this->close("protocolVersion", "2.0"));
        $this->add_to_response($this->close("adminEmail", $information['email_administrator']));
        $this->add_to_response($this->close("deletedRecord", "transient"));
        $this->add_to_response($this->close("granularity", "YYYY-MM-DDThh:mm:ssZ"));
        $this->add_to_response($this->close("compression", "deflate"));



        $this->add_to_response($this->final_label("Identify"));
    }

    
    
    
    
    
    #funcion que retorna la informacion del repositorio

    private function get_repository_information() {

        $query = "SELECT  * FROM repository_information";
        $result = $this->conexion->realizarOperacion($query);

        return pg_fetch_assoc($result);
    }

//agrega la etiqueta del siguiente token
    private function get_resumption_token() {
        if ($this->has_next_resumption_token()) {
            $resumptionToken = $this->create_resumption_token();
            $offset = 0;
            if ($this->has_resumption_token()) {
                $token = $this->split_resumption_token();
                $offset = $token['offset'];
            }
            $parameter['cursor'] = $offset;
            $this->add_to_response($this->close_parameters('resumptionToken', $parameter, $resumptionToken));
        }
    }

    private function split_resumption_token() {
        $resumptionToken = array();
        //echo ">> {$this->token_separator}";
        $token = explode($this->token_separator, base64_decode($this->request['resumptionToken']));
        $resumptionToken['offset'] = $token[0];
        $resumptionToken['expiration'] = $token[1];
        $resumptionToken['generated_at'] = $token[2];


        return $resumptionToken;
    }

    private function has_valid_resumption_token() {
        if (!$this->has_resumption_token() || ($this->has_resumption_token() && $this->is_exclusive('resumptionToken') && $this->valid_resumption_token())) {
            return true;
        }
        return false;
    }

    private function is_exclusive($parameter) {
        // echo ".---" .count($this->request);
        if (count($this->request) == 2 && isset($this->request[$parameter])) {
            return true;
        }

        return false;
    }

    private function has_resumption_token() {
        return isset($this->request['resumptionToken']);
    }

    private function valid_resumption_token() {
        //   return true; //<<<<< ojo con esta linea;
        $resumptionToken = $this->split_resumption_token();
        // var_dump($resumptionToken);
        // echo "pasa0";
        if (count($resumptionToken) == 3 && is_numeric($resumptionToken['offset']) && is_numeric($resumptionToken['expiration']) && is_numeric($resumptionToken['generated_at'])) { // offset , expiration , generated_at                     
            if (time() > $resumptionToken['expiration']) {
                //     echo "pasa2";
                return false;
            }
            return true;
        }
        return false;
    }

    private function create_resumption_token() {
        if ($this->has_resumption_token()) {
            $resumptionToken = $this->split_resumption_token();
            $resumptionToken = ($resumptionToken['offset'] + $this->limit_page) . $this->token_separator . (time() + 86400) . $this->token_separator . (time());
            return base64_encode($resumptionToken);
        } else {
            // $resumptionToken = $this->split_resumption_token();
            $resumptionToken = ( $this->limit_page) . $this->token_separator . (time() + 86400) . $this->token_separator . (time());
            return base64_encode($resumptionToken);
        }
    }

    private function has_next_resumption_token() {
        $offset = 0;
        if ($this->has_resumption_token()) {
            $resumption_token = $this->split_resumption_token();
            $offset = $resumption_token['offset'];
        }
        if (($offset + $this->limit_page) < @pg_num_rows($this->conexion->realizarOperacion($this->get_full_query()))) {
            return true;
        }

        return false;
    }

    private function has_all_listRecords_arguments() {
        $arg['from'] = $arg['until'] = $arg['metadataPrefix'] = $arg['verb'] = true;
        if (isset($this->request['resumptionToken']) && isset($this->request['verb']) && count($this->request) == 2) { // es un resumptionToken
            return true;
        } else if (isset($this->request['metadataPrefix'])) {
            foreach ($this->request as $key => $value) {
                if (!isset($arg[$key]))
                    return false;
            }
        }else {
            return false;
        }
        return true;
    }

    private function has_listRecords_set_argument() {
        return isset($this->request['set']) ? true : false;
    }

    private function has_listRecords_record() {
        $result = @pg_num_rows($this->conexion->realizarOperacion($this->get_full_query())) > 0 ? true : false;
        return ($result) ? true : false;
    }

    private function get_listRecords_query() {
        $query = "SELECT idlo, xmlo, to_char(lastModified,'YYYY-mm-ddThh:ii:ssZ') as lastModified,now() as date,0 as deleted FROM lo WHERE TRUE ";

        if (isset($this->request['from']) && !isset($this->request['until'])) {
            $query .= "AND insertionDate >= '{$this->request['from']}' ";
        } else if (isset($this->request['from']) && isset($this->request['until'])) {
            $query .= "AND insertionDate >= '{$this->request['from']}' AND insertionDate <=  '{$this->request['until']}'";
        } else if (!isset($this->request['from']) && isset($this->request['until'])) {
            $query .= "AND insertionDate <= '{$this->request['until']}'";
        }
        //echo "<h3>$query</h3>";
        return $query;
    }

    private function get_full_query() {
        $active = $this->get_listRecords_query();
        $deleted = $this->get_listRecordsDeleted_query();
        $query = "SELECT *
            FROM ( $active UNION $deleted ) s ORDER BY s.deleted, s.lastmodified";
        return $query;
    }

    private function get_full_query_offset($offset = 0) {
        return $this->get_full_query() . " LIMIT " . $this->limit_page . " OFFSET " . $offset;
    }

    //DEL PROTOCOLO
    private function get_header_XML() {
        return ("<?xml version='1.0' encoding='UTF-8'?>");
    }

    private function get_header_OAI() {
        return ("
           <OAI-PMH xmlns='http://www.openarchives.org/OAI/2.0/' 
                 xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance'
                xsi:schemaLocation='http://www.openarchives.org/OAI/2.0/
               http://www.openarchives.org/OAI/2.0/OAI-PMH.xsd'>");
    }

    private function get_response_date() {
        return $this->close("responseDate", strftime("%Y-%m-%dT%H:%M:%SZ"));
    }

    public function get_response() {
        return $this->response;
    }

    private function get_request($type) {
        if ($type) {
            return $this->close_parameters("request", $this->request, SERVER);
        } else {
            return $this->close("request", SERVER);
        }
    }

    private function get_error($code) {
        $response = "";
        switch ($code) {
            case 'badVerb':
                $parameter['code'] = $code;
                $response = $this->close_parameters("error", $parameter, "Illegal verb");
                break;

            case 'badArgument':
                $parameter['code'] = $code;
                $response = $this->close_parameters("error", $parameter, "The request's arguments are not valid or missing");
                break;

            case 'idDoesNotExist':
                $parameter['code'] = $code;
                $response = $this->close_parameters("error", $parameter, "The object with identifier {$this->request['identifier']} does not exist in this repository");
                break;


            case 'cannotDisseminateFormat':
                $parameter['code'] = $code;
                $response = $this->close_parameters("error", $parameter, "{$this->request['metadataPrefix']} is not supported by the item or by the repository");
                break;

            case 'noRecordsMatch':
                $parameter['code'] = $code;
                $response = $this->close_parameters("error", $parameter, "The combination of the values of the from, until, set and metadataPrefix arguments results in an empty list.");
                break;

            case 'noSetHierarchy':
                $parameter['code'] = $code;
                $response = $this->close_parameters("error", $parameter, "The repository does not support sets");
                break;

            case 'badResumptionToken':
                $parameter['code'] = $code;
                $response = $this->close_parameters("error", $parameter, "The value of the resumptionToken argument is invalid or expired");
                break;


            default:
                $response = $this->close("error", "Not supported yet");
                break;
        }
        return $response;
    }

    private function get_footer_OAI() {
        return ("</OAI-PMH>");
    }

    private function get_xmlo($idlo, $attr = 'xmlo', $text = true) {
        $result = $this->conexion->realizarOperacion("SELECT xmlo,insertiondate FROM lo WHERE idlo='$idlo'");
        if ($text) {
            return $result;
        } else {
            $result = pg_fetch_array($result);
            return ($result[$attr]);
        }
    }

    //U T I L E S
    private function initial_label($texto) {
        return ("<$texto>");
    }

    private function final_label($texto) {
        return ("</$texto>");
    }

    private function close($etiqueta, $texto) {
        return ("<$etiqueta>$texto</$etiqueta>");
    }

    private function close_below($etiqueta, $texto) {
        return $this->initial_label("$etiqueta") . $texto . $this->final_label($etiqueta);
    }

    private function close_parameters($etiqueta, $parameter, $texto) {
        $s = "<$etiqueta ";
        foreach ($parameter as $key => $value) {
            $s.="$key='{$value}' ";
        }
        $s = trim($s) . ">$texto</$etiqueta>";
        return ($s);
    }

    private function add_to_response($text) {
        $this->response.="{$text}";
    }

    public function is_consultable() {
        $file = @fopen("control/admin/configoai.txt", "r");
        $line = fgets($file);
        @fclose($file);
        return ($line == "1") ? true : false;
    }

}

$OAI = new OAIPMH($_GET);
if ($OAI->is_consultable()) {
    $OAI->print_response();
} else {
    echo "Error: Este repositorio no se puede consultar por OAI-PMH";
}


