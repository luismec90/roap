<?php
    $nombre_archivo = '../vista/campos.txt';
// Primero vamos a asegurarnos de que el archivo existe y es escribible.
    if (is_writable($nombre_archivo)) {

        // En nuestro ejemplo estamos abriendo $nombre_archivo en modo de adición.
        // El puntero al archivo está al final del archivo
        // donde irá $contenido cuando usemos fwrite() sobre él.
        if (!$gestor = fopen($nombre_archivo, 'w')) {
            echo "No se puede abrir el archivo ($nombre_archivo)";
            exit;
        }
        $campo = "";
        for ($i = 1; $i <= 59; $i++) {
            if (isset($_POST['checkbox' . $i])) {
                switch ($i) {
                    case 1: $campo = $campo . ",generalCatalog";
                        break;
                    case 2: $campo = $campo . ",generalEntry";
                        break;
                    case 3: $campo = $campo . ",generalTitle";
                        break;
                    case 4: $campo = $campo . ",generalLanguage";
                        break;
                    case 5: $campo = $campo . ",generalDescription";
                        break;
                    case 6: $campo = $campo . ",generalKeyword";
                        break;
                    case 7: $campo = $campo . ",generalCoverage";
                        break;
                    case 8: $campo = $campo . ",generalStructure";
                        break;
                    case 9: $campo = $campo . ",generalAggregationLevel";
                        break;
                    case 10: $campo = $campo . ",lifeCycleVersion";
                        break;
                    case 11: $campo = $campo . ",lifeCycleStatus";
                        break;
                    case 12: $campo = $campo . ",lifeCycleRole";
                        break;
                    case 13: $campo = $campo . ",lifeCycleEntity";
                        break;
                    case 14: $campo = $campo . ",lifeCycleDate";
                        break;
                    case 15: $campo = $campo . ",metaMetadataCatalog";
                        break;
                    case 16: $campo = $campo . ",metaMetadataEntry";
                        break;
                    case 17: $campo = $campo . ",metaMetadataRole";
                        break;
                    case 18: $campo = $campo . ",metaMetadataEntity";
                        break;
                    case 19: $campo = $campo . ",metaMetadataDate";
                        break;
                    case 20: $campo = $campo . ",metaMetadataMetadataSchema";
                        break;
                    case 21: $campo = $campo . ",metaMetadataLanguage";
                        break;
                    case 22: $campo = $campo . ",technicalFormat";
                        break;
                    case 23: $campo = $campo . ",technicalSize";
                        break;
                    case 24: $campo = $campo . ",technicalLocation";
                        break;
                    case 25: $campo = $campo . ",technicalType";
                        break;
                    case 26: $campo = $campo . ",technicalName";
                        break;
                    case 27: $campo = $campo . ",technicalMinimumVersion";
                        break;
                    case 28: $campo = $campo . ",technicalMaximumVersion";
                        break;
                    case 29: $campo = $campo . ",technicalInstallationRemarks";
                        break;
                    case 30: $campo = $campo . ",technicalOtherPlatformRequirements";
                        break;
                    case 31: $campo = $campo . ",technicalDuration";
                        break;
                    case 32: $campo = $campo . ",educationalInteractivityType";
                        break;
                    case 33: $campo = $campo . ",educationalLearningResourceType";
                        break;
                    case 34: $campo = $campo . ",educationalInteractivityLevel";
                        break;
                    case 35: $campo = $campo . ",educationalSemanticDensity";
                        break;
                    case 36: $campo = $campo . ",educationalIntendedEndUserRole";
                        break;
                    case 37: $campo = $campo . ",educationalContext";
                        break;
                    case 38: $campo = $campo . ",educationalTypicalAgeRange";
                        break;
                    case 39: $campo = $campo . ",educationalDifficulty";
                        break;
                    case 40: $campo = $campo . ",educationalTypicalLearningTime";
                        break;
                    case 41: $campo = $campo . ",educationalDescription";
                        break;
                    case 42: $campo = $campo . ",educationalLanguage";
                        break;
                    case 43: $campo = $campo . ",rightsCost";
                        break;
                    case 44: $campo = $campo . ",rightsCopyrightandOtherRestrictions";
                        break;
                    case 45: $campo = $campo . ",rightsDescription";
                        break;
                    case 46: $campo = $campo . ",relationKind";
                        break;
                    case 47: $campo = $campo . ",relationCatalog";
                        break;
                    case 48: $campo = $campo . ",relationEntry";
                        break;
                    case 49: $campo = $campo . ",relationDescription";
                        break;
                    case 50: $campo = $campo . ",annotationEntity";
                        break;
                    case 51: $campo = $campo . ",annotationDate";
                        break;
                    case 52: $campo = $campo . ",annotationDescription";
                        break;
                    case 53: $campo = $campo . ",classificationPurpose";
                        break;
                    case 54: $campo = $campo . ",classificationSource";
                        break;
                    case 55: $campo = $campo . ",classificationTaxon";
                        break;
                    case 56: $campo = $campo . ",classificationId";
                        break;
                    case 57: $campo = $campo . ",classificationEntry";
                        break;
                    case 58: $campo = $campo . ",classificationDescription";
                        break;
                    case 59: $campo = $campo . ",classificationKeyword";
                        break;
                }

                // $campo = ",campo" . $i;
            }
        }
        echo $campo;
        $campo.=",generalTitle";
        fwrite($gestor, $campo);
        fclose($gestor);
    }

?>