
$(document).ready(function() {
    var idloToDwonload = "";
    $("#dialogDownload").dialog({
        autoOpen: false,
        modal: true,
        width: 400,
        buttons: {
            "Si, ver OA": function() {
                window.open("control/download.php?id=" + idloToDwonload, '_blank');
                window.focus();
                $(this).dialog("close");
                $(".popoverR").css({
                    display: "block"
                });
            },
            "No, proceder con la descarga": function() {
                window.location = "control/download.php?id=" + idloToDwonload + "&forcedownload";
                $(this).dialog("close");
                $(".popoverR").css({
                    display: "block"
                });
            }
        }
    });

    $("#dialogConfirmCambiarColeccion").hide();
    $("#dialogReportarObjeto").hide();
    $("#dialogComentarObjeto").hide();

    $("#busquedaAvanzada").hide();
    $("#desplegableGeneral").hide();
    $("#desplegableLifeCycle").hide();
    $("#desplegableMetaMetadata").hide();
    $("#desplegableTechnical").hide();
    $("#desplegableEducational").hide();
    $("#desplegableRights").hide();
    $("#desplegableRelation").hide();
    $("#desplegableAnnotation").hide();
    $("#desplegableClassification").hide();

//    function getUrlVars() {
//        var vars = {};
//        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
//            vars[key] = value;
//        });
//        return vars;
//    }
// //   $("#listarColecciones .lsubcolecciones").hide();
//    var activeColection = getUrlVars()["aC"];
//    var idC = getUrlVars()["idC"];
//    if(activeColection!=undefined){
//        $("#listarColecciones .l"+activeColection+"").show();
//        $("#"+activeColection+"").removeClass("trianguloRigth");
//        $("#"+activeColection+"").addClass("trianguloDown");
//    }

    $("#listarColecciones .triangulo").live("click", function(e) {
        var idC = $(this).attr("idC");
        if ($(this).hasClass("trianguloDown")) {
            $("#listarColecciones .l" + idC + "").hide();
            $(this).removeClass("trianguloDown");
            $(this).addClass("trianguloRigth");
        }
        else {
            $("#listarColecciones .l" + idC + "").show();
            $(this).removeClass("trianguloRigth");
            $(this).addClass("trianguloDown");
        }
    });

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
                $(this).attr("value", seeMore);
            });

    /* busqueda.php */
    $(".date").live('mousedown', function()
    {
        $(this).datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
        });

    });


    ///General////
    $("#flipGeneral").toggle(
            function() {
                $("#desplegableGeneral").show("normal");
                $("#" + $(this).attr("idsCategoriaImg") + "").css("background", "url(vista/img/menos.png) no-repeat");
            },
            function() {
                $("#desplegableGeneral").hide("normal");
                $("#" + $(this).attr("idsCategoriaImg") + "").css("background", "url(vista/img/mas.png) no-repeat");
            });

    ///LifeCycle////
    $("#flipLifeCycle").toggle(
            function() {
                $("#desplegableLifeCycle").show("normal");
                $("#" + $(this).attr("idsCategoriaImg") + "").css("background", "url(vista/img/menos.png) no-repeat");
            },
            function() {
                $("#desplegableLifeCycle").hide("normal");
                $("#" + $(this).attr("idsCategoriaImg") + "").css("background", "url(vista/img/mas.png) no-repeat");
            });

    ///MetaMetadata////
    $("#flipMetaMetadata").toggle(
            function() {
                $("#desplegableMetaMetadata").show("normal");
                $("#" + $(this).attr("idsCategoriaImg") + "").css("background", "url(vista/img/menos.png) no-repeat");
            },
            function() {
                $("#desplegableMetaMetadata").hide("normal");
                $("#" + $(this).attr("idsCategoriaImg") + "").css("background", "url(vista/img/mas.png) no-repeat");
            });

    ///Technical////
    $("#flipTechnical").toggle(
            function() {
                $("#desplegableTechnical").show("normal");
                $("#" + $(this).attr("idsCategoriaImg") + "").css("background", "url(vista/img/menos.png) no-repeat");
            },
            function() {
                $("#desplegableTechnical").hide("normal");
                $("#" + $(this).attr("idsCategoriaImg") + "").css("background", "url(vista/img/mas.png) no-repeat");
            });

    ///Educational////
    $("#flipEducational").toggle(
            function() {
                $("#desplegableEducational").show("normal");
                $("#" + $(this).attr("idsCategoriaImg") + "").css("background", "url(vista/img/menos.png) no-repeat");
            },
            function() {
                $("#desplegableEducational").hide("normal");
                $("#" + $(this).attr("idsCategoriaImg") + "").css("background", "url(vista/img/mas.png) no-repeat");
            });

    ///Rights////
    $("#flipRights").toggle(
            function() {
                $("#desplegableRights").show("normal");
                $("#" + $(this).attr("idsCategoriaImg") + "").css("background", "url(vista/img/menos.png) no-repeat");
            },
            function() {
                $("#desplegableRights").hide("normal");
                $("#" + $(this).attr("idsCategoriaImg") + "").css("background", "url(vista/img/mas.png) no-repeat");
            });

    ///Relation////
    $("#flipRelation").toggle(
            function() {
                $("#desplegableRelation").show("normal");
                $("#" + $(this).attr("idsCategoriaImg") + "").css("background", "url(vista/img/menos.png) no-repeat");
            },
            function() {
                $("#desplegableRelation").hide("normal");
                $("#" + $(this).attr("idsCategoriaImg") + "").css("background", "url(vista/img/mas.png) no-repeat");
            });

    ///Annotation////
    $("#flipAnnotation").toggle(
            function() {
                $("#desplegableAnnotation").show("normal");
                $("#" + $(this).attr("idsCategoriaImg") + "").css("background", "url(vista/img/menos.png) no-repeat");
            },
            function() {
                $("#desplegableAnnotation").hide("normal");
                $("#" + $(this).attr("idsCategoriaImg") + "").css("background", "url(vista/img/mas.png) no-repeat");
            });

    ///Classification////
    $("#flipClassification").toggle(
            function() {
                $("#desplegableClassification").show("normal");
                $("#" + $(this).attr("idsCategoriaImg") + "").css("background", "url(vista/img/menos.png) no-repeat");
            },
            function() {
                $("#desplegableClassification").hide("normal");
                $("#" + $(this).attr("idsCategoriaImg") + "").css("background", "url(vista/img/mas.png) no-repeat");
            });

    $("#iravanzada").click(function() {
        $("#busquedaSimple").hide();
        $("#busquedaAvanzada").show();
    });
    $("#irasimple").click(function() {
        $("#busquedaAvanzada").hide();
        $("#busquedaSimple").show();
    });

    $("#busquedaavanzada").submit(function() {
        $.ajax({
            type: 'POST',
            url: 'control/ajax/ajaxBusqueda2.php',
            data: $(this).serialize(),
            beforeSend: function() {
            },
            success: function(result) {
                $("#resultSearch").html(result);
                if (color1 != -1) {
                    $("#resultSearch .color1bg").css({
                        "background": "" + color1 + ""
                    });
                }
            },
            error: function(geterror) {
            }
        });
        return false;
    });
    $("#selectGeneralLanguage").change(function() {
        if ($("#selectGeneralLanguage").val() != "none") {
            if ($("#inputSearchGeneralLanguage").attr("value") == "") {
                $("#inputSearchGeneralLanguage").attr("value", $("#selectGeneralLanguage").val());
            }
            else {
                var str = $("#inputSearchGeneralLanguage").val() + ", " + $("#selectGeneralLanguage").val();
                $("#inputSearchGeneralLanguage").attr("value", str);
            }
        }
    });

    $("#selectMetaMetadataLanguage").change(function() {
        if ($("#selectMetaMetadataLanguage").val() != "none") {
            if ($("#inputSearchMetaMetadataLanguage").attr("value") == "") {
                $("#inputSearchMetaMetadataLanguage").attr("value", $("#selectMetaMetadataLanguage").val());
            }
            else {
                var str = $("#inputSearchMetaMetadataLanguage").val() + ", " + $("#selectMetaMetadataLanguage").val();
                $("#inputSearchMetaMetadataLanguage").attr("value", str);
            }
        }
    });

    $("#selectEducationalLanguage").change(function() {
        if ($("#selectEducationalLanguage").val() != "none") {
            if ($("#inputSearchEducationalLanguage").attr("value") == "") {
                $("#inputSearchEducationalLanguage").attr("value", $("#selectEducationalLanguage").val());
            }
            else {
                var str = $("#inputSearchEducationalLanguage").val() + ", " + $("#selectEducationalLanguage").val();
                $("#inputSearchEducationalLanguage").attr("value", str);
            }
        }
    });


    //////////// select NBC///////
    $("#bdesplegableNbc0").hide();
    $(".bnbc").click(function() {
        var n = $(this).attr("n");
        $("#bdesplegableNbc" + n + "").show();
        if ($("#bNbc" + n + "").val() == "Seleccionar") {
            $("#bsNbc" + n + "").attr('disabled', '');
            $("#bssNbc" + n + "").attr('disabled', '');
        }
    });
    $(".bselectNbcArea").change(function() {
        var n = $(this).attr("n");
        $("#bssNbc" + n + "").html("");
        $("#bssNbc" + n + "").attr('disabled', '');
        $("#bsNbc" + n + "").removeAttr('disabled');
        var valor = $(this).val();

        if (valor == "01") {
            $("#bsNbc" + n + "").html("<option value='01.00'>Seleccionar</option><option value='01.01'>Agronomía</option><option value='01.02'>Medicina Veterinaria</option><option value='01.03'>Zootecnia</option>");
        }
        else if (valor == "02") {
            $("#bsNbc" + n + "").html("<option value='02.00'>Seleccionar</option><option value='02.01'>Artes Plásticas, Visuales y afines</option><option value='02.02'>Artes Representativas</option><option value='02.03'>Diseño</option><option value='02.04'>Música</option><option value='02.05'>Otros programas asociados a Bellas Artes</option><option value='02.06'>Publicidad y afines</option>");
        }
        else if (valor == "03") {
            $("#bsNbc" + n + "").html("<option value='03.00 '>Seleccionar</option><option value='03.01'>Educación</option>");
        }
        else if (valor == "04") {
            $("#bsNbc" + n + "").html("<option value='04.00 '>Seleccionar</option><option value='04.01'>Bacteriología</option><option value='04.02'>Enfermería</option><option value='04.03'>Instrumentación quirúrgica</option><option value='04.04'>Medicina</option><option value='04.05'>Nutrición y Dietética</option><option value='04.06'>Odontología</option><option value='04.07'>Optometría, otros programas de Ciencias de la Salud</option><option value='04.08'>Salud Pública</option><option value='04.09'>Terapias</option>");
        }
        else if (valor == "05") {
            $("#bsNbc" + n + "").html("<option value='05.00 '>Seleccionar</option><option value='05.01'>Antropología, Artes Liberales</option><option value='05.02'>Bibliotecología, otros de Ciencias Sociales y Humanas</option><option value='05.03'>Ciencia Política, Relaciones Internacionales</option><option value='05.04'>Comunicación Social, Periodismo y afines</option><option value='05.05'>Deportes, Educación Física y Recreación</option><option value='05.06'>Derecho y afines</option><option value='05.07'>Filosofía, Teología y afines</option><option value='05.08'>Formación relacionada con el campo Militar o Policial</option><option value='05.09'>Geografía e Historia</option><option value='05.10'>Lenguas Modernas, Literatura, Lingüística y afines</option><option value='05.11'>Psicología</option><option value='05.12'>Sociología, Trabajo Social y afines</option>");
        }
        else if (valor == "06") {
            $("#bsNbc" + n + "").html("<option value='06.00 '>Seleccionar</option><option value='06.01'>Administración</option><option value='06.02'>Contaduría Pública</option><option value='06.03'>Economía</option>");
        }
        else if (valor == "07") {
            $("#bsNbc" + n + "").html("<option value='07.00 '>Seleccionar</option><option value='07.01'>Arquitectura y afines</option><option value='07.02'>Ingeniería Administrativa y afines</option><option value='07.03'>Ingeniería Agrícola, Forestal y afines</option><option value='07.04'>Ingeniería Agroindustrial, Alimentos y afines</option><option value='07.05'>Ingeniería Agronómica, Pecuaria y afines</option><option value='07.06'>Ingeniería Ambiental, Sanitaria y afines</option><option value='07.07'>Ingeniería Biomédica y afines</option><option value='07.08'>Ingeniería Civil y afines</option><option value='07.09'>Ingeniería De Minas, Metalurgia y afines</option><option value='07.10'>Ingeniería De Sistemas, Telemática y afines</option><option value='07.11'>Ingeniería Eléctrica y afines</option><option value='07.12'>Ingeniería Electrónica, Telecomunicaciones y afines</option><option value='07.13'>Ingeniería Industrial y afines</option><option value='07.14'>Ingeniería Mecánica y afines</option><option value='07.15'>Ingeniería Química y afines</option><option value='07.16'>Otras Ingenierías</option>");
        }
        else if (valor == "08") {
            $("#bsNbc" + n + "").html("<option value='08.00 '>Seleccionar</option><option value='08.01'>Biología, Microbiología y afines</option><option value='08.02'>Física</option><option value='08.03'>Geología, otros programas de Ciencias Naturales</option><option value='08.04'>Matemáticas, Estadística y afines</option><option value='08.05'>Química y afines</option>");
        }
        else {
            $("#bsNbc" + n + "").html("");
            $("#bsNbc" + n + "").attr('disabled', '');
            $("#bsNbc" + n + "").html("");
        }
    });

    $(".bselectSubarea").change(function() {
        var n = $(this).attr("n");
        $("#bssNbc" + n + "").html("");
        $("#bssNbc" + n + "").attr('disabled', '');
        var valor = $("#bsNbc" + n + "").val();
        if (valor == "02.03") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='02.03.00 '>Seleccionar</option><option value='02.03.01'>Gráfico</option><option value='02.03.02'>Industrial</option><option value='02.03.03'>Joyas</option><option value='02.03.04'>Moda</option><option value='02.03.05'>Textil</option>");
        }
        else if (valor == "03.01") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='03.01.00 '>Seleccionar</option><option value='03.01.01'>Ciencias naturales, matemáticas, tecnología e informática</option><option value='03.01.02'>Ciencias sociales, humanas, religiosas y afines</option><option value='03.01.03'>Educación artística y educación física, recreación y deporte</option><option value='03.01.04'>Educación básica</option><option value='03.01.05'>Educación básica y media</option><option value='03.01.06'>Educación media</option><option value='03.01.07'>Educación para otras modalidades</option><option value='03.01.08'>Educación preescolar</option><option value='03.01.09'>Educación técnica</option><option value='03.01.10'>Formación para la educación</option>");
        }
        else if (valor == "04.04") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='04.04.00 '>Seleccionar</option><option value='04.04.01'> Alergología</option><option value='04.04.02'> Anestesia </option><option value='04.04.03'>Cabeza y cuello </option><option value='04.04.04'> Cardiología </option><option value='04.04.05'> Cardiotoráxica </option><option value='04.04.06'> Cardiovascular </option><option value='04.04.07'> Cirugía </option><option value='04.04.08'> Coloproctología </option><option value='04.04.09'>Columna </option><option value='04.04.10'> Córnea </option><option value='04.04.11'> Cuidados intensivos </option><option value='04.04.12'>Dermatología </option><option value='04.04.13'> Dolor </option><option value='04.04.14'>Ecocardiología </option><option value='04.04.15'> Endocrinología</option><option value='04.04.16'>Fisiatría </option><option value='04.04.17'> Fisiología </option><option value='04.04.18'> Gastroenterología </option><option value='04.04.19'>Gastrointestinal </option><option value='04.04.20'> Genética </option><option value='04.04.21'> Geriatría </option><option value='04.04.22'> Ginecobstetricia </option><option value='04.04.23'> Glaucoma </option><option value='04.04.24'> Hematología </option><option value='04.04.25'> Hemodinamia </option><option value='04.04.26'> Imagen Corporal </option><option value='04.04.27'> Imagenología </option><option value='04.04.28'> Infectología </option><option value='04.04.29'> Intervencionista</option><option value='04.04.30'> Laboratorio Clínico</option><option value='04.04.31'> Laparoscópica</option><option value='04.04.32'> Mama </option><option value='04.04.33'> Mano </option><option value='04.04.34'> Medicina Aereoespacial </option><option value='04.04.35'> Medicina de Urgencias</option><option value='04.04.36'> Medicina del Deporte </option><option value='04.04.37'> Medicina del Trabajo </option><option value='04.04.38'> Medicina Estética</option><option value='04.04.39'> Medicina Familiar </option><option value='04.04.40'> Medicina Forense </option><option value='04.04.41'> Medicina Interna</option><option value='04.04.42'> Medicina Nuclear </option><option value='04.04.43'> Nefrología </option><option value='04.04.44'> Neonatología </option><option value='04.04.45'> Neumología </option><option value='04.04.46'> Neurocirugía</option><option value='04.04.47'> Neurofisiología</option><option value='04.04.48'> Neurología </option><option value='04.04.49'> Oftalmología </option><option value='04.04.50'> Oncología </option><option value='04.04.51'> Oncología - Hematología </option><option value='04.04.52'> Ortopedia </option><option value='04.04.53'> Otología </option><option value='04.04.54'> Otorrinolaringología </option><option value='04.04.55'> Patología </option><option value='04.04.56'> Pediatría </option><option value='04.04.57'> Plástica </option><option value='04.04.58'> Psiquiatría</option><option value='04.04.59'> Psiquiatría de Enlace </option><option value='04.04.60'> Radioterapia </option><option value='04.04.61'> Reproducción Humana </option><option value='04.04.62'> Reumatología </option><option value='04.04.63'> Rodilla </option><option value='04.04.64'> Tórax </option><option value='04.04.65'> Toxicología </option><option value='04.04.66'> Trasplantes </option><option value='04.04.67'> Urología </option><option value='04.04.68'> Vascular</option>");
        }
        else if (valor == "04.06") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='04.06.00 '>Seleccionar</option><option value='04.06.01'>Cirugía Oral, Maxilofacial </option><option value='04.06.02'> Endodoncia </option><option value='04.06.03'> Estomatología, Patología Oral y afines </option><option value='04.06.04'> Implantología </option><option value='04.06.05'> Laboratorio Dental </option><option value='04.06.06'> Odontopediatría </option><option value='04.06.07'> Ortodoncia </option><option value='04.06.08'> Periodoncia </option><option value='04.06.09'> Prostodoncia </option><option value='04.06.10'> Rehabilitación Oral</option>");
        }
        else if (valor == "04.07") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='04.07.00 '>Seleccionar</option><option value='04.07.01'>Optometría </option><option value='04.07.02'> Otros programas de Ciencias de la Salud  </option>");
        }
        else if (valor == "04.08") {
            $("#bssNbc" + n + "").html("<option value='04.08.00 '>Seleccionar</option><option value='04.08.01'>Epidemiología </option><option value='04.08.02'> Salud Ambienta</option><option value='04.08.03'> Salud Comunitaria</option><option value='04.08.04'> Salud Familiar</option><option value='04.08.05'> Salud Mental </option><option value='04.08.06'> Salud Ocupacional</option>");
        }
        else if (valor == "04.09") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='04.09.00 '>Seleccionar</option><option value='04.09.01'> Fisioterapia</option><option value='04.09.02'> Fonoaudiología</option><option value='04.09.03'> Terapia ocupacional</option><option value='04.09.04'> Terapia respiratoria</option>");
        }
        else if (valor == "05.01") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='05.01.00 '>Seleccionar</option><option value='05.01.01'> Antropología </option><option value='05.01.02'> Artes Liberales</option>");
        }
        else if (valor == "05.02") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='05.02.00 '>Seleccionar</option><option value='05.02.01'> Bibliotecología </option><option value='05.02.02'> Otros de Ciencias Sociales y Humanas</option>");
        }
        else if (valor == "05.04") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='05.04.00 '>Seleccionar</option><option value='05.04.01'> Periodismo </option>");
        }
        else if (valor == "05.06") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='05.06.00 '>Seleccionar</option><option value='05.06.01'> Criminalística </option><option value='05.06.02'> Seguros</option>");
        }
        else if (valor == "05.07") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='05.07.00 '>Seleccionar</option><option value='05.07.01'> Filosofía </option><option value='05.07.02'> Teología y afines</option>");
        }
        else if (valor == "05.09") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='05.09.00 '>Seleccionar</option><option value='05.09.01'> Geografía </option><option value='05.09.02'> Historia</option>");
        }
        else if (valor == "05.10") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='05.10.00 '>Seleccionar</option><option value='05.10.01'> Lenguas Modernas </option><option value='05.10.02'> Literatura, Lingüística y afines</option>");
        }
        else if (valor == "05.12") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='05.12.00 '>Seleccionar</option><option value='05.12.01'> Familia </option><option value='05.12.02'> Gerontología</option><option value='05.12.03'> Sociología </option><option value='05.12.04'> Trabajo Social</option>");
        }
        else if (valor == "06.01") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<select><option value='06.01.00 '>Seleccionar</option><option value='06.01.01'> Control Interno</option><option value='06.01.02'> Finanzas</option><option value='06.01.03'> Formulación, Evaluación y Gestión de Proyectos </option><option value='06.01.04'> Mercados</option><option value='06.01.05'> Negocios Internacionales</option><option value='06.01.06'> Recursos Humanos</option><option value='06.01.07'> Sector Público</option><option value='06.01.08'> Sector Turismo</option></select>");
        }
        else if (valor == "06.02") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='06.02.00 '>Seleccionar</option><option value='06.02.01'> Auditoría de Sistemas</option><option value='06.02.02'> Auditoría en Salud</option>");
        }
        else if (valor == "06.03") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='06.03.00 '>Seleccionar</option><option value='06.03.01'> Comercio Exterior</option><option value='06.03.02'> Formulación, Evaluación y Gestión de Proyectos</option>");
        }
        else if (valor == "07.03") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='07.03.00 '>Seleccionar</option><option value='07.03.01'> Ingeniería Agrícola </option><option value='07.03.02'> Ingeniería Forestal</option>");
        }
        else if (valor == "07.04") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='07.04.00 '>Seleccionar</option><option value='07.04.01'> Alimentos</option>");
        }
        else if (valor == "07.05") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='07.05.00 '>Seleccionar</option><option value='07.05.01'> Ingeniería Agronómica </option><option value='07.05.02'> Ingeniería Pecuaria</option>");
        }
        else if (valor == "07.06") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='07.06.00 '>Seleccionar</option><option value='07.06.01'> Administración Ambiental</option>");
        }
        else if (valor == "07.10") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='07.10.00 '>Seleccionar</option><option value='07.10.01'> Administración de Sistemas de Información</option>");
        }
        else if (valor == "07.12") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='07.12.00 '>Seleccionar</option><option value='07.12.01'> Ingeniería en Telecomunicaciones</option>");
        }
        else if (valor == "07.13") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='07.13.00 '>Seleccionar</option><option value='07.13.01'> Calidad </option><option value='07.13.02'> Higiene y Seguridad Industrial </option><option value='07.13.03'> Logística</option>");
        }
        else if (valor == "07.16") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='07.16.00 '>Seleccionar</option><option value='07.16.01'> Sistemas de Información Geográfica</option>");
        }
        else if (valor == "08.01") {
            $("#bsNbc" + n + "").removeAttr('disabled');
            $("#bsNbc" + n + "").html("<option value='08.01.00 '>Seleccionar</option><option value='08.01.01'> Biología y afines </option><option value='08.01.02'> Microbiología y afines</option>");
        }
        else if (valor == "08.03") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='08.03.00 '>Seleccionar</option><option value='08.03.01'> Geología </option><option value='08.03.02'> Otros programas de Ciencias Naturales</option>");
        }
        else if (valor == "08.04") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='08.04.00 '>Seleccionar</option><option value='08.04.01'> Estadística </option><option value='08.04.02'> Matemáticas</option>");
        }
        else if (valor == "08.05") {
            $("#bssNbc" + n + "").removeAttr('disabled');
            $("#bssNbc" + n + "").html("<option value='08.05.00 '>Seleccionar</option><option value='08.05.01'> Farmacia </option>");
        }
    });
    $(".benviarNbc").click(function(event) {

        var n = $(this).attr("n");
        if (n == 0) {
            $("#sinputgeneralCatalog").attr('value', 'NBC');
        }
        else {
            $("#sinputgeneralCatalog" + n + "").attr('value', 'NBC');
        }


        if ($("#bssNbc" + n + "").val() == null) {
            if ($("#bsNbc" + n + "").val() == "Seleccionar") {
                alert("Selección inválida")
                return false;
            }
            if (n == 0) {
                $("#sinputgeneralEntry").attr('value', $("#bsNbc" + n + "").val());
            }
            else {
                $("#sinputgeneralEntry" + n + "").attr('value', $("#bsNbc" + n + "").val());
            }
        }
        else {
            if ($("#bssNbc" + n + "").val() == "Seleccionar") {
                alert("Selección inválida")
                return false;
            }
            if (n == 0) {
                $("#sinputgeneralEntry").attr('value', $("#bssNbc" + n + "").val());
            }
            else {
                $("#sinputgeneralEntry" + n + "").attr('value', $("#bssNbc" + n + "").val());
            }
        }

        $("#bdesplegableNbc" + n + "").hide();

    });

    $(".bcancelarNbc").click(function() {
        var n = $(this).attr("n");
        $("#bdesplegableNbc" + n + "").hide();
    });

    //////////////FSLSM//////////////
    $(".easFslsm").slider({
        value: 50,
        min: 0,
        max: 100,
        step: 1,
        slide: function(event, ui) {
            var m = $(this).attr("m");
            $("#inputDisabled" + m + "L").attr("value", ui.value + "%");
            $("#inputDisabled" + m + "R").attr("value", 100 - ui.value + "%");
        }
    });
    $(".eaCriterio").change(function() {
        var n = $(this).attr("n");
        var name1 = $(this).attr("name1");
        // alert(name1);
        var name2 = $(this).attr("name2");
        //alert(name2);
        switch ($(this).val()) {
            case "igual":
                $("#eaTextArea" + n).html("Buscará los objetos de aprendizaje que tengan los porcentajes de " + name1 + "/" + name2 + " indicados.");
                break
            case "mayor":
                $("#eaTextArea" + n).html("Buscará los objetos de aprendizaje que tengan como mínimo el porcentaje " + name1 + " indicado (sin incluirlo) y máximo el porcentaje de " + name2 + " indicado (incluyéndolo).");
                break
            case "menor":
                $("#eaTextArea" + n).html("Buscará los objetos de aprendizaje que tengan como máximo el porcentaje " + name1 + " indicado (sin incluirlo) y mínimo el porcentaje de " + name2 + " indicado (incluyéndolo).");
                break
            case "mayoroigual":
                $("#eaTextArea" + n).html("Buscará los objetos de aprendizaje que tengan como mínimo el porcentaje " + name1 + " indicado (incluyéndolo) y máximo el porcentaje de " + name2 + " indicado (sin incluirlo).");
                break
            case "menoroigual":
                $("#eaTextArea" + n).html("Buscará los objetos de aprendizaje que tengan como máximo el porcentaje " + name1 + " indicado (incluyéndolo) y mínimo el porcentaje de " + name2 + " indicado (sin incluirlo).");
                break
        }
    });

    ////////////////////////////

    ////////////////////////VARK////////////
    $(".easVark").slider({
        value: 50,
        min: 0,
        max: 100,
        step: 1,
        slide: function(event, ui) {
            var m = $(this).attr("m");
            $("#inputDisabledVark" + m).attr("value", ui.value + "%");
        }
    });

    $(".eaCriterioVark").change(function() {
        var n = $(this).attr("n");
        var name1 = $(this).attr("name1");
        switch ($(this).val()) {
            case "igual":
                $("#eaTextAreaVark" + n).html("Buscará los objetos de aprendizaje que tengan el porcentaje de " + name1 + " indicado.");
                break
            case "mayor":
                $("#eaTextAreaVark" + n).html("Buscará los objetos de aprendizaje que tengan como mínimo el porcentaje " + name1 + " indicado (sin incluirlo).");
                break
            case "menor":
                $("#eaTextAreaVark" + n).html("Buscará los objetos de aprendizaje que tengan como máximo el porcentaje " + name1 + " indicado (sin incluirlo)");
                break
            case "mayoroigual":
                $("#eaTextAreaVark" + n).html("Buscará los objetos de aprendizaje que tengan como mínimo el porcentaje " + name1 + " indicado (incluyéndolo).");
                break
            case "menoroigual":
                $("#eaTextAreaVark" + n).html("Buscará los objetos de aprendizaje que tengan como máximo el porcentaje " + name1 + " indicado (incluyéndolo).");
                break
        }
    });
    $("#busquedaSimple").submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'control/busquedaC.php?action=simple',
            data: $(this).serialize(),
            success: function(result) {
                $("#contenedorResultados").html(result);
            }
        });
    });
    $("#busquedaAvanzada").submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'control/busquedaC.php?action=avanzada',
            data: $(this).serialize(),
            success: function(result) {
                $("#contenedorResultados").html(result);
            }
        });
    });
    /*---*/

    /*mostrarOA.php*/
    $("#tablaOA .informacionOculta").hide();
    $("#botonesNavegacion a").click(function() {
        var from = $("#posicion").attr("from");
        var pos = "";
        var order = $("#posicion").attr("order");
        var totalOAHide = $("#posicion").attr("totalOAHide");
        var posInicial = parseInt($("#posicion").attr("pos"));
        flag = false;
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
            var idC = $("#posicion").attr("idC");
            var path = $("#posicion").attr("path");
            if ($("#posicion").attr("idC") == -1) {
                var pagina = "main.php?action=surf&from=" + from + "&pos=" + pos + "&order=" + order;
            }
            else {
                var pagina = "main.php?action=surf&from=" + from + "&pos=" + pos + "&order=" + order + "&idC=" + idC + "&path=" + path;
            }
            location.href = pagina;
        }



    });

    $("#criterioOrder").change(function() {
        var from = $("#posicion").attr("from");
        var order = $(this).val();
        var idC = $("#posicion").attr("idC");
        var path = $("#posicion").attr("path");
        if (idC == -1) {
            var pagina = "main.php?action=surf&from=" + from + "&order=" + order;
        }
        else {
            var pagina = "main.php?action=surf&from=" + from + "&order=" + order + "&idC=" + idC + "&path=" + path;
        }
        location.href = pagina;
    });



    $("#fechaOrderDownload").change(function() {
        var oa = $(this).attr("data-oa");
        var desde = $(this).val();
        var pagina = "main.php?action=downloadHistory&idOA=" + oa + "&desde=" + desde;
        location.href = pagina;
    });


    /* Descargar OA*/
    $("#tablaOA .downloadOaimg,#tablaOA .linkTitulo").live("click", function() {
        var posicion = $(this).position();

        posicion.top -= 127;
        posicion.left -= 127;
        $(".popoverR").css({
            top: "" + posicion.top + "px",
            left: "" + posicion.left + "px"
        });

        var idlo = $(this).attr("idlo");
        $("#linkdRecomendarOAs").attr("href", "main.php?action=dRecomendarOAs&idlo=" + idlo + "");
        $("#dialogDownload").dialog("open");
        idloToDwonload = idlo;
        return false;
    });

    $("#cerrarModal").click(function() {
        $(".popoverR").hide();
    });

    /* Reportar OA*/
    $("#tablaOA .reportarObjeto").live("click", function() {
        var idlo = $(this).attr("idlo");
        $.ajax({
            type: 'POST',
            url: 'control/ajax/reportarOA.php?action=validarAccion',
            data: "idlo=" + idlo,
            success: function(result) {
                if (result == "siPuede") {
                    $("#dialogReportarObjeto").dialog({
                        resizable: false,
                        height: "auto",
                        width: "auto",
                        modal: true,
                        buttons: {
                            "Enviar": function() {
                                if ($("#motivoReporte").val() == "") {
                                    alert("Por favor escriba un motivo");
                                    return false;
                                }
                                $.ajax({
                                    type: 'POST',
                                    url: 'control/ajax/reportarOA.php?action=reportar',
                                    data: "idlo=" + idlo + "&motivoReporte=" + $("#motivoReporte").val(),
                                    success: function(result) {
                                        $("#dialogReportarObjeto").dialog("close");
                                        // location.reload();
                                    }
                                });
                            },
                            "Cancelar": function() {
                                $(this).dialog("close");
                            }
                        }
                    });
                }
                else {
                    alert("Usted ya reportó este objeto. Por favor espere que el administrador revise su reporte.");
                }
            }
        });
    });
    /* Cambiar Coleccion OA*/
    $("#tablaOA .cambiarColeccionOA").live("click", function() {
        var idlo = $(this).attr("idlo");
        $.ajax({
            type: 'POST',
            url: 'control/ajax/permisos.php',
            data: "action=verificarPermisoCambiarColeccion&idlo=" + idlo,
            success: function(result) {
                if (result == "si") {
                    $("#selectDialogSubcoleccion").attr('disabled', true)
                    $.getJSON("control/ajax/cambiarColeccion.php?action=consultarColecciones", function(data) {
                        var options = "<option value='none'>Seleccionar</option>";
                        $.each(data, function(i, Coleccion) {
                            options = options + "<option value=" + Coleccion["idcollection"] + ">" + Coleccion["name"] + "</option>";
                        });
                        $("#selectDialogColeccion").html(options);
                        $("#selectDialogSubcoleccion").html("");
                        $("#dialogConfirmCambiarColeccion").dialog({
                            resizable: false,
                            height: "auto",
                            width: "auto",
                            modal: true,
                            buttons: {
                                "Aceptar": function() {
                                    // $( this ).dialog( "close" );
                                    var idC = $("#selectDialogColeccion").val();
                                    var idSC = $("#selectDialogSubcoleccion").val();
                                    if (idC == "none") {
                                        alert("Por favor seleccione una colección");
                                        return false;
                                    }
                                    else if (idSC == "none") {
                                        alert("Por favor seleccione una Subcolección");
                                        return false;
                                    }
                                    $.ajax({
                                        type: 'POST',
                                        url: 'control/ajax/cambiarColeccion.php?action=establecerColeccion',
                                        data: "idlo=" + idlo + "&idsc=" + idSC,
                                        success: function(result) {
                                            $("#dialogConfirmCambiarColeccion").dialog("close");
                                            location.reload();
                                        }
                                    });


                                },
                                "Cancelar": function() {
                                    $(this).dialog("close");
                                }
                            }
                        });
                    });

                } else if (result == "tramite") {
                    alert("Usted no es el autor de este OA, pero ya tiene una la solicitud en tramite para cambiar la colección de este OA.");
                }
                else if (result == "no") {
                    if (confirm("Usted no es el autor de este objeto, ¿desea solicitar permiso para cambiar la colección de este OA?.")) {
                        $.ajax({
                            type: 'POST',
                            url: 'control/ajax/permisos.php',
                            data: "action=solicitarPermisoCambiarColeccion&idlo=" + idlo,
                            success: function(result) {
                            }
                        });
                    }
                }
            }
        });

    });
    $("#selectDialogColeccion").change(function() {
        var idC = $(this).val();
        if (idC == "none") {
            $("#selectDialogSubcoleccion").attr('disabled', true);
            $("#selectDialogSubcoleccion").html("");
        }
        $.getJSON("control/ajax/cambiarColeccion.php?action=consultarSubColecciones&idC=" + idC + "", function(data) {
            var options = "<option value='none'>Seleccionar</option>";
            $.each(data, function(i, SubColeccion) {
                options = options + "<option value=" + SubColeccion["idsubcollection"] + ">" + SubColeccion["name"] + "</option>";

            });
            $("#selectDialogSubcoleccion").removeAttr('disabled');
            $("#selectDialogSubcoleccion").html(options);
        });
    });
    /*---------------*/


    $(".editarOaimg").live("click", function() {
        var idlo = $(this).attr("idlo");
        $.ajax({
            type: 'POST',
            url: 'control/ajax/permisos.php',
            data: "action=verificarPermisoEdicion&idlo=" + idlo,
            success: function(result) {
                if (result == "si") {
                    location.href = 'main.php?action=Formulario_Editar&idlo=' + idlo;
                }
                else if (result == "tramite") {
                    alert("Usted no es el autor de este OA, pero ya tiene una la solicitud de edición en tramite.");
                }
                else if (result == "no") {
                    if (confirm("Usted no es el autor de este objeto, ¿desea solicitar permiso de edición?.")) {
                        $.ajax({
                            type: 'POST',
                            url: 'control/ajax/permisos.php',
                            data: "action=solicitarPermisoEdicion&idlo=" + idlo,
                            success: function(result) {

                            }
                        });
                    }
                }
            }
        });
    });
    $(".borrarOaimg").live("click", function() {
        var idlo = $(this).attr("idlo");
        $.ajax({
            type: 'POST',
            url: 'control/ajax/permisos.php',
            data: "action=verificarPermisoEliminacion&idlo=" + idlo,
            success: function(result) {
                if (result == "si") {
                    if (confirm("¿Esta seguro de eliminar este Objeto de Aprendizaje permanentemente?.")) {
                        $.ajax({
                            type: 'POST',
                            url: 'control/ajax/permisos.php',
                            data: "action=EliminarOa&idlo=" + idlo,
                            success: function(result) {
                                //alert(result);
                                location.reload();
                            }
                        });
                    }

                } else if (result == "tramite") {
                    alert("Usted no es el autor de este OA, pero ya tiene una la solicitud de eliminación en tramite.");
                }
                else if (result == "no") {
                    if (confirm("Usted no es el autor de este objeto, ¿desea solicitar permiso de eliminación?.")) {
                        $.ajax({
                            type: 'POST',
                            url: 'control/ajax/permisos.php',
                            data: "action=solicitarPermisoEliminacion&idlo=" + idlo,
                            success: function(result) {
                            }
                        });
                    }
                }
            }
        });
    });
    /*--*/
});