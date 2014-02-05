<?php

$metricaCompletitud = 0;
$metricaConsistencia = 0;
$metricaCoherencia = 0;
$Q = 0;
$DEFAULT_VALUE = "none";
if ($generalCatalog != "") {
    $metricaCompletitud+=0.09;
}
if ($generalEntry != "") {
    $metricaCompletitud+=0.35;
}
if ($generalTitle != "") {
    $metricaCompletitud+=22.18;
}

if ($generalLanguage != $DEFAULT_VALUE) {
    $metricaCompletitud+=3.12;
}
if ($generalDescription != "") {
    $metricaCompletitud+=12.48;
}
if ($generalKeyword != "") {
    $metricaCompletitud+=19.50;
}
if ($generalCoverage != "") {
    $metricaCompletitud+=0.09;
}
if ($generalStructure != $DEFAULT_VALUE) {
    $metricaCompletitud+=0.09;
    $metricaConsistencia = 100;
}
if ($generalAggregationLevel != $DEFAULT_VALUE) {
    $metricaCompletitud+=0.78;
    $metricaConsistencia = 100;
}
if ($lifeCycleVersion != "") {
    $metricaCompletitud+=0.09;
}
if ($lifeCycleStatus != $DEFAULT_VALUE) {
    $metricaCompletitud+=0.35;
    $metricaConsistencia = 100;
}
if ($lifeCycleRole0_0 != $DEFAULT_VALUE) {
    $metricaCompletitud+=0.09;
    $metricaConsistencia = 100;
}

if ($lifeCycleEntity0_0 != "") {
    $metricaCompletitud+=12.48;
}
if ($lifeCycleDate0_0 != "") {
    $metricaCompletitud+=0.09;
}

if ($metaMetadataCatalog != "") {
    $metricaCompletitud+=0.09;
}
if ($metaMetadataEntry != "") {
    $metricaCompletitud+=0.09;
}
if ($metaMetadataRole0_0 != $DEFAULT_VALUE) {
    $metricaCompletitud+=0.09;
    $metricaConsistencia = 100;
}
if ($metaMetadataEntity0_0 != "") {
    $metricaCompletitud+=0.09;
}
if ($metaMetadataDate0_0 != "") {
    $metricaCompletitud+=0.09;
}
if ($metaMetadataMetadataSchema != "") {
    $metricaCompletitud+=0.09;
}
if ($metaMetadataLanguage != $DEFAULT_VALUE) {
    $metricaCompletitud+=0.09;
}
if ($technicalFormat != "") {
    $metricaCompletitud+=7.02;
}
if ($technicalSize != "") {
    $metricaCompletitud+=0.09;
}
if ($technicalLocation != "") {
    $metricaCompletitud+=0.78;
}
if ($technicalType0_0 != $DEFAULT_VALUE) {
    $metricaCompletitud+=0.09;
}
if ($technicalName0_0 != "") {
    $metricaCompletitud+=0.09;
}
if ($technicalMinimumVersion0_0 != "") {
    $metricaCompletitud+=0.09;
}
if ($technicalMaximumVersion0_0 != "") {
    $metricaCompletitud+=0.09;
}
if ($technicalInstallationRemarks != "") {
    $metricaCompletitud+=0.09;
}
if ($technicalOtherPlatformRequirements != "") {
    $metricaCompletitud+=0.09;
}
if ($technicalDuration != "") {
    $metricaCompletitud+=0.09;
}
if ($educationalInteractivityType != $DEFAULT_VALUE) {
    $metricaCompletitud+=1.39;
    $metricaConsistencia = 100;
}
if ($educationalLearningResourceType != $DEFAULT_VALUE) {
    $metricaCompletitud+=8.67;
    $metricaConsistencia = 100;
}
if ($educationalInteractivityLevel != $DEFAULT_VALUE) {
    $metricaCompletitud+=0.09;
    $metricaConsistencia = 100;
}
if ($educationalSemanticDensity != $DEFAULT_VALUE) {
    $metricaCompletitud+=0.09;
    $metricaConsistencia = 100;
}
if ($educationalIntendedEndUserRole != $DEFAULT_VALUE) {
    $metricaCompletitud+=0.09;
    $metricaConsistencia = 100;
}
if ($educationalContext != $DEFAULT_VALUE) {
    $metricaCompletitud+=4.25;
    $metricaConsistencia = 100;
}
if ($educationalTypicalAgeRange != "") {
    $metricaCompletitud+=1.39;
}
if ($educationalDifficulty != $DEFAULT_VALUE) {
    $metricaCompletitud+=0.09;
    $metricaConsistencia = 100;
}
if ($educationalTypicalLearningTime != "") {
    $metricaCompletitud+=0.09;
}
if ($educationalDescription != "") {
    $metricaCompletitud+=0.35;
}
if ($educationalLanguage != $DEFAULT_VALUE) {
    $metricaCompletitud+=0.09;
}

if ($rightsCost != $DEFAULT_VALUE) {
    $metricaCompletitud+=0.78;
    $metricaConsistencia = 100;
}
if ($rightsCopyrightandOtherRestrictions != $DEFAULT_VALUE) {
    $metricaCompletitud+=0.35;
    $metricaConsistencia = 100;
}
if ($rightsDescription != $DEFAULT_VALUE) {
    $metricaCompletitud+=0.09;
}
if ($relationKind != $DEFAULT_VALUE) {
    $metricaCompletitud+=0.09;
}
if ($relationCatalog != "") {
    $metricaCompletitud+=0.09;
}
if ($relationEntry != "") {
    $metricaCompletitud+=0.09;
}
if ($relationDescription != "") {
    $metricaCompletitud+=0.09;
}
if ($annotationEntity != "") {
    $metricaCompletitud+=0.09;
}
if ($annotationDate != "") {
    $metricaCompletitud+=0.09;
}
if ($annotationDescription != "") {
    $metricaCompletitud+=0.09;
}
if ($classificationPurpose != $DEFAULT_VALUE) {
    $metricaCompletitud+=0.09;
    $metricaConsistencia = 100;
}
if ($classificationSource0_0 != "") {
    $metricaCompletitud+=0.35;
}
if ($classificationId0_0 != "") {
    $metricaCompletitud+=0.09;
}
if ($classificationEntry0_0 != "") {
    $metricaCompletitud+=0.09;
}
if ($classificationDescription != "") {
    $metricaCompletitud+=0.09;
}
if ($classificationKeyword != "") {
    $metricaCompletitud+=0.09;
}

$flagQ = false;
switch ($generalStructure) {
    case "none":
        $metricaCoherencia +=0;
        break;
    case "1":

        switch ($generalAggregationLevel) {
            case "none":
                $metricaCoherencia +=0;
                break;
            case "1":
                $metricaCoherencia = 100;
                $flagQ = true;
                break;
            case "2":
                $metricaCoherencia = 50;
                $flagQ = true;
                break;
            case "3":
                $metricaCoherencia = 25;
                $flagQ = true;
                break;
            case "4":
                $metricaCoherencia = 12.5;
                $flagQ = true;
                break;
        }
        break;
    default:
        switch ($generalAggregationLevel) {
            case "none":
                $metricaCoherencia +=0;
                break;
            case "1":
                $metricaCoherencia = 50;
                $flagQ = true;
                break;
            default:
                $metricaCoherencia = 100;
                $flagQ = true;
                break;
        }
        break;
}
if ($flagQ) {
    $Q++;
}
$flagQ = false;
switch ($educationalInteractivityType) {
    case "none":
        $metricaCoherencia +=0;
        break;
    case "1":
        switch ($educationalInteractivityLevel) {
            case "none";
                $metricaCoherencia +=0;
                break;
            default:
                $metricaCoherencia = 100;
                $flagQ = true;
        }
        break;
    case "2":
        switch ($educationalInteractivityLevel) {
            case "none";
                $metricaCoherencia +=0;
                break;
            case "1";
                $metricaCoherencia += 100;
                $flagQ = true;
                break;
            case "2";
                $metricaCoherencia += 100;
                $flagQ = true;
                break;
            case "3";
                $metricaCoherencia += 50;
                $flagQ = true;
                break;
            case "4";
                $metricaCoherencia += 0;
                $flagQ = true;
                break;
            case "5";
                $metricaCoherencia += 0;
                $flagQ = true;
                break;
        }
        break;
    case "3":
        switch ($educationalInteractivityLevel) {
            case "none";
                $metricaCoherencia +=0;
                break;
            default:
                $metricaCoherencia = 100;
                $flagQ = true;
        }
}
if ($flagQ) {
    $Q++;
}

$flagQ = false;
switch ($educationalInteractivityType) {
    case "none":
        $metricaCoherencia +=0;
        break;
    case "1":
        switch ($educationalLearningResourceType) {
            case "none";
                $metricaCoherencia +=0;
                break;
            case "1":
                $metricaCoherencia += 100;
                $flagQ = true;
                break;
            case "2":
                $metricaCoherencia += 100;
                $flagQ = true;
                break;
            case "3":
                $metricaCoherencia += 100;
                $flagQ = true;
                break;
            case "4":
                $metricaCoherencia += 0;
                $flagQ = true;
                break;
            case "5":
                $metricaCoherencia += 0;
                $flagQ = true;
                break;
            case "6":
                $metricaCoherencia += 0;
                $flagQ = true;
                break;
            case "7":
                $metricaCoherencia += 0;
                $flagQ = true;
                break;
            case "8":
                $metricaCoherencia += 0;
                $flagQ = true;
                break;
            case "9":
                $metricaCoherencia += 0;
                $flagQ = true;
                break;
            case "10":
                $metricaCoherencia += 0;
                $flagQ = true;
                break;
            case "11":
                $metricaCoherencia += 100;
                $flagQ = true;
                break;
            case "12":
                $metricaCoherencia += 100;
                $flagQ = true;
                break;
            case "13":
                $metricaCoherencia += 100;
                $flagQ = true;
                break;
            case "14":
                $metricaCoherencia += 100;
                $flagQ = true;
                break;
            case "15":
                $metricaCoherencia += 0;
                $flagQ = true;
                break;
        }
        break;
    case "2":
        switch ($educationalLearningResourceType) {
            case "none";
                $metricaCoherencia +=0;
                break;
            case "1":
                $metricaCoherencia += 0;
                $flagQ = true;
                break;
            case "2":
                $metricaCoherencia += 0;
                $flagQ = true;
                break;
            case "3":
                $metricaCoherencia += 0;
                $flagQ = true;
                break;
            case "4":
                $metricaCoherencia += 100;
                $flagQ = true;
                break;
            case "5":
                $metricaCoherencia += 100;
                $flagQ = true;
                break;
            case "6":
                $metricaCoherencia += 100;
                $flagQ = true;
                break;
            case "7":
                $metricaCoherencia += 100;
                $flagQ = true;
                break;
            case "8":
                $metricaCoherencia += 100;
                $flagQ = true;
                break;
            case "9":
                $metricaCoherencia += 100;
                $flagQ = true;
                break;
            case "10":
                $metricaCoherencia += 100;
                $flagQ = true;
                break;
            case "11":
                $metricaCoherencia += 0;
                $flagQ = true;
                break;
            case "12":
                $metricaCoherencia += 0;
                $flagQ = true;
                break;
            case "13":
                $metricaCoherencia += 0;
                $flagQ = true;
                break;
            case "14":
                $metricaCoherencia += 0;
                $flagQ = true;
                break;
            case "15":
                $metricaCoherencia += 100;
                $flagQ = true;
                break;
        }
        break;
    case "3":
        switch ($educationalLearningResourceType) {
            case "none";
                $metricaCoherencia +=0;
                break;
            default:
                $metricaCoherencia +=100;
                $flagQ = true;
                break;
        }
        break;
}

$metricaCompletitud = round($metricaCompletitud, 1);

if ($metricaConsistencia == 0) {
    $metricaConsistencia = -1;
}
if ($flagQ) {
    $Q++;
}
if ($Q == 0) {
    $metricaCoherencia = -1;
} else {
    $metricaCoherencia = round($metricaCoherencia / $Q, 1);
}
if ($metricaCompletitud > 100) {
    $metricaCompletitud = 100;
}
if ($metricaConsistencia > 100) {
    $metricaConsistencia = 100;
}
if ($metricaCoherencia > 100) {
    $metricaCoherencia = 100;
}
$c->guardarMetrica($current, $metricaCompletitud, $metricaConsistencia, $metricaCoherencia);
?>