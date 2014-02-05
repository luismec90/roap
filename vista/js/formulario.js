// JavaScript Document
$(document).ready(function() {
    $(".date").live('mousedown', function()
    {
        $(this).datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
        });
    });

    var type_submit;
    var ngeneralIdentifier = 0;
    var vgeneralIdentifier = new Array(true);

    var ngeneralLanguage = 0;
    var vgeneralLanguage = new Array(true);

    var ngeneralDescription = 0;
    var vgeneralDescription = new Array(true);

    var ngeneralKeyword = 0;
    var vgeneralKeyword = new Array(true);

    var ngeneralCoverage = 0;
    var vgeneralCoverage = new Array(true);

    var nlifeCycleContribute = 0;
    var vlifeCycleContribute = new Array();
    vlifeCycleContribute[0] = new Array(true);
    var nlifeCycleEntity = 0;

    var nmetaMetadataIdentifier = 0;
    var vmetaMetadataIdentifier = new Array(true);

    var nmetaMetadataContribute = 0;
    var vmetaMetadataContribute = new Array();
    vmetaMetadataContribute[0] = new Array(true);
    var nmetaMetadataEntity = 0;

    var nmetaMetadataMetadataSchema = 0;
    var vmetaMetadataMetadataSchema = new Array(true);

    var ntechnicalFormat = 0;
    var vtechnicalFormat = new Array(true);

    var ntechnicalLocation = 0;
    var vtechnicalLocation = new Array(true);

    var ntechnicalRequirement = 0;
    var vtechnicalRequirement = new Array();
    vtechnicalRequirement[0] = new Array(true);

    var ntechnicalOrComposite = 0;
    //var vtechnicalRequirement = new Array(true);




    var neducationalLearningResourceType = 0;
    var veducationalLearningResourceType = new Array(true);

    var neducationalIntendedEndUserRole = 0;
    var veducationalIntendedEndUserRole = new Array(true);

    var neducationalContext = 0;
    var veducationalContext = new Array(true);

    var neducationalTypicalAgeRange = 0;
    var veducationalTypicalAgeRange = new Array(true);

    var neducationalDescription = 0;
    var veducationalDescription = new Array(true);

    var neducationalLanguage = 0;
    var veducationalLanguage = new Array(true);

    var nrelationIdentifier = 0;
    var vrelationIdentifier = new Array(true);

    var nrelationDescription = 0;
    var vrelationDescription = new Array(true);

    var nclassificationTaxonPath = 0;
    var vclassificationTaxonPath = new Array();
    vclassificationTaxonPath[0] = new Array(true);
    var nclassificationTaxon = 0;

    var nclassificationKeyword = 0;
    var vclassificationKeyword = new Array(true);


    $('.tab_content').hide();
    $("ul.tabs li:first").addClass("visitado");
    $("ul.tabs li:first").addClass("active").show();
    $(".tab_content:first").show();
    $("#quitararea").hide();
    $("#desplegableNbc0").hide();
    $("#desplegableEa0_0").hide();
    $("#desplegableEa0_1").hide();



    if (typeof(idReport) == "undefined") {
        idReport = -1;
    }
    if (idlo != -1) { //si voy a ver un OA entonces cargue lso datos
        //        $.blockUI({
        //            message: '<h1><img src="vista/img/busy.gif" /></h1>'
        //        });       
        $.getJSON("control/cargarDatos.php?idlo=" + idlo, function(data) {
            var posFslsm = -1;
            var myArrayFslsm;
            var posVark = -1;
            var myArrayVark
            $.each(data, function(i, j) {
                if ((i == "generalIdentifier") || i == "metaMetadataIdentifier" || i == "relationIdentifier") {
                    $.each(j, function(k, l) {
                        if (k >= 1) {

                            eval("anadir" + i)();
                        }
                        $.each(l, function(m, n) {
                            //   alert("m: "+m+"   "+"n:  "+n);

                            $("#input" + m + "").attr("value", n);

                        });
                    });
                }
                else if (i == "generalLanguage" || i == "generalDescription" || i == "generalKeyword" || i == "generalCoverage" || i == "metaMetadataMetadataSchema" || i == "technicalFormat" || i == "technicalLocation" || i == "educationalLearningResourceType" || i == "educationalIntendedEndUserRole" || i == "educationalContext" || i == "educationalTypicalAgeRange" || i == "educationalDescription" || i == "educationalLanguage" || i == "relationDescription" || i == "classificationKeyword") {
                    // alert("es "+i+"  "+j);
                    $.each(j, function(k, l) {
                        //  alert("es "+k+"  "+l);
                        if (k >= 1) {
                            eval("anadir" + i)();
                        }
                        $.each(l, function(m, n) {
                            // alert("es "+m+"  "+n);
                            //  alert("m: "+m+"   "+"n:  "+n);
                            $("#input" + m + "").attr("value", n);
                            var stringAux = n;
                            n = n.substring(0, 4);

                            // $("#sfslsm1_1").slider( "option", "value", 10 );
                            if (n == "FSLS") {
                                // $("#sfslsm1_1").slider( "option", "value", 10 );


                                var pos = m.substr(m.length - 1, m.length);

                                if (pos == "n")
                                {
                                    pos = 0;
                                }
                                $("#eaRadioButtonFslsm" + pos).attr("checked", true);
                                $("#input" + m + "").attr('readonly', true);
                                //FSLSM{Activo:50%; Sensitivo:50%; Visual:50%; Inductivo:50%; Secuencial:50%}


                                stringAux = stringAux.replace('FSLSM{Activo:', '');
                                stringAux = stringAux.replace('; Sensitivo:', '');
                                stringAux = stringAux.replace('; Visual:', '');
                                stringAux = stringAux.replace('; Inductivo:', '');
                                stringAux = stringAux.replace('; Secuencial:', '');
                                stringAux = stringAux.replace('}', '');
                                var myArray = stringAux.split('%');
                                //  alert(pos);
                                posFslsm = pos;
                                myArrayFslsm = myArray;
                            }
                            else if (n == "VARK") {
                                pos = m.substr(m.length - 1, m.length);

                                if (pos == "n")
                                {
                                    pos = 0;
                                }

                                $("#eaRadioButtonVark" + pos).attr("checked", true);
                                $("#input" + m + "").attr('readonly', true);
                                //VARK{Visual:50%; Auditivo:50%; Lector:50%; Kinestético:50%}


                                stringAux = stringAux.replace('VARK{Visual:', '');
                                stringAux = stringAux.replace('; Auditivo:', '');
                                stringAux = stringAux.replace('; Lector:', '');
                                stringAux = stringAux.replace('; Kinestético:', '');
                                stringAux = stringAux.replace('}', '');
                                myArray = stringAux.split('%');
                                posVark = pos;
                                myArrayVark = myArray;

                            }
                        });
                    });

                }
                else if (i == "lifeCycleContribute" || i == "metaMetadataContribute" || i == "classificationTaxonPath") {
                    $.each(j, function(k, l) {
                        if (k >= 1) {
                            eval("anadir" + i)();


                        }

                        $.each(l, function(m, n) {
                            if (m == "lifeCycleEntity" || m == "metaMetadataEntity" || m == "classificationEntry") {
                                $.each(n, function(o, p) {
                                    if (o >= 1) {
                                        // alert(m);
                                        eval("anadir" + m)(k);
                                    }
                                    $.each(p, function(r, s) {
                                        $("#input" + r + "").attr("value", s);

                                    });

                                });
                            }
                            else {
                                $("#input" + m + "").attr("value", n);
                            }
                        });
                    });
                }
                else if (i == "technicalRequirement") {
                    //alert(i);
                    $.each(j, function(k, l) {
                        //  alert(j+" "+k+" "+l);
                        if (k >= 1) {
                            eval("anadir" + i)();

                        }

                        $.each(l, function(m, n) {


                            $.each(n, function(o, p) {
                                if (o >= 1) {
                                    eval("anadir" + m)(k);
                                }
                                $.each(p, function(r, s) {
                                    $("#input" + r + "").attr("value", s);
                                });

                            });


                            //   $("#input"+m+"").attr("value",n);

                        });
                    });
                }
                else //if(i=="generalTitle"||i=="generalStructure"||i=="generalAggregationLevel"||i="lifeCycleVers")
                {
                    $("#input" + i + "").attr("value", j);
                }
            });
            if (posFslsm != -1) {
                var r = 100 - myArrayFslsm[0];
                $("#fslsmR" + posFslsm + "_1L").val(myArrayFslsm[0] + "%");
                $("#fslsmR" + posFslsm + "_1R").val(r + "%");

                $("#sfslsm" + posFslsm + "_2").slider("option", "value", myArrayFslsm[0]);
                r = 100 - myArrayFslsm[1];
                $("#fslsmR" + posFslsm + "_2L").val(myArrayFslsm[1] + "%");
                $("#fslsmR" + posFslsm + "_2R").val(r + "%");

                $("#sfslsm" + posFslsm + "_3").slider("option", "value", myArrayFslsm[2]);
                r = 100 - myArrayFslsm[2];
                $("#fslsmR" + posFslsm + "_3L").val(myArrayFslsm[2] + "%");
                $("#fslsmR" + posFslsm + "_3R").val(r + "%");

                $("#sfslsm" + posFslsm + "_4").slider("option", "value", myArrayFslsm[3]);
                r = 100 - myArrayFslsm[3];
                $("#fslsmR" + posFslsm + "_4L").val(myArrayFslsm[3] + "%");
                $("#fslsmR" + posFslsm + "_4R").val(r + "%");

                $("#sfslsm" + posFslsm + "_5").slider("option", "value", myArrayFslsm[4]);
                r = 100 - myArrayFslsm[4];
                $("#fslsmR" + posFslsm + "_5L").val(myArrayFslsm[4] + "%");
                $("#fslsmR" + posFslsm + "_5R").val(r + "%");
                $("#sfslsm" + posFslsm + "_2").slider("option", "value", myArrayFslsm[1]);
                r = 100 - myArrayFslsm[1];
                $("#fslsmR" + posFslsm + "_2L").val(myArrayFslsm[1] + "%");
                $("#fslsmR" + posFslsm + "_2R").val(r + "%");

                $("#sfslsm" + posFslsm + "_3").slider("option", "value", myArrayFslsm[2]);
                r = 100 - myArrayFslsm[2];
                $("#fslsmR" + posFslsm + "_3L").val(myArrayFslsm[2] + "%");
                $("#fslsmR" + posFslsm + "_3R").val(r + "%");

                $("#sfslsm" + posFslsm + "_4").slider("option", "value", myArrayFslsm[3]);
                r = 100 - myArrayFslsm[3];
                $("#fslsmR" + posFslsm + "_4L").val(myArrayFslsm[3] + "%");
                $("#fslsmR" + posFslsm + "_4R").val(r + "%");

                $("#sfslsm" + posFslsm + "_5").slider("option", "value", myArrayFslsm[4]);
                r = 100 - myArrayFslsm[4];
                $("#fslsmR" + posFslsm + "_5L").val(myArrayFslsm[4] + "%");
                $("#fslsmR" + posFslsm + "_5R").val(r + "%");

                $("#desplegableEa" + posFslsm + "_0 .eaOcultarInput").each(function() {
                    $(this).removeAttr('disabled');
                });
                $("#desplegableEa" + posFslsm + "_0").show();
            }
            if (posVark != -1) {
                $("#svark" + posVark + "_1").slider("option", "value", myArrayVark[0]);
                $("#varkR" + posVark + "_1").val(myArrayVark[0] + "%");

                $("#svark" + posVark + "_2").slider("option", "value", myArrayVark[1]);
                $("#varkR" + posVark + "_2").val(myArrayVark[1] + "%");

                $("#svark" + posVark + "_3").slider("option", "value", myArrayVark[2]);
                $("#varkR" + posVark + "_3").val(myArrayVark[2] + "%");

                $("#svark" + posVark + "_4").slider("option", "value", myArrayVark[3]);
                $("#varkR" + posVark + "_4").val(myArrayVark[3] + "%");

                $("#desplegableEa" + posVark + "_1 .eaOcultarInput").each(function() {
                    $(this).removeAttr('disabled');
                });
                $("#desplegableEa" + posVark + "_1").show();
            }
            if (ver == "si") {

                //$("#formulario a").attr('disabled','disabled'); 
                $("#formulario .at,#formulario .qt,#formulario .nbc,#formulario .submit,#formulario .guardarParcialmente,#formulario .guardarCompletamente").css({
                    display: "none"
                });
                $("#formulario div.next a").css({
                    margin: "0"
                });
            }

        });
        // $.unblockUI();
    }
    else {
        //$.unblockUI();
    }



    function anadirgeneralIdentifier() {
        var i = ngeneralIdentifier;
        ngeneralIdentifier++;
        $("#Identifier" + i + "").after("<div class='caja' id='Identifier" + ngeneralIdentifier + "'><div class='caja2'><div class='titulo'><label >Catálogo:</label></div><div class='input'><input id='inputgeneralCatalog" + ngeneralIdentifier + "' name='generalCatalog" + ngeneralIdentifier + "' type='text' /><span class='nbc' n='" + ngeneralIdentifier + "'><span class='masnbc'></span>NBC </span><div class='dinput'></div></div><div class='titulo'>"+entry+":</div><div class='input'><input id='inputgeneralEntry" + ngeneralIdentifier + "' name='generalEntry" + ngeneralIdentifier + "' type='text' /><div class='dinput'></div></div>   <div id='desplegableNbc" + ngeneralIdentifier + "' class='desplegableNbc'><div class='titulo'> Seleccione una entrada:</div><div class='input'><select id='Nbc" + ngeneralIdentifier + "' class='selectNbcArea' n='" + ngeneralIdentifier + "'><option>"+select+"</option><option value='01'>Agronomía, Veterinaria y afines</option><option value='02'>Bellas Artes</option><option value='03'>Ciencias de la Educación</option><option value='04'>Ciencias de la Salud</option><option value='05'>Ciencias Sociales y Humanas</option><option value='06'>Economía, Administración, Contaduría y afines</option><option value='07'>Ingeniería, Arquitectura, Urbanismo y afines</option><option value='08'>Matemáticas y Ciencias Naturales</option></select> </div><br/><div class='titulo'> </div><div class='input'><select id='sNbc" + ngeneralIdentifier + "' class='selectSubarea' n='" + ngeneralIdentifier + "'></select></div><br/><div class='titulo'> </div><div class='input'><select id='ssNbc" + ngeneralIdentifier + "' class='selectSubsubarea' n='" + ngeneralIdentifier + "'></select></div><div class='titulo'> </div><div class='input'><input class='enviarNbc' type='button' n='" + ngeneralIdentifier + "' value='"+accept+"'/> <input class='cancelarNbc' type='button' n='" + ngeneralIdentifier + "' value='Cancelar'/></div></div>  </div><div class='caja3'><span class='qt qtgeneralIdentifier'numero='" + ngeneralIdentifier + "'><a id='quitarIdentifier' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
        $("#desplegableNbc" + ngeneralIdentifier + "").hide();


        vgeneralIdentifier[ngeneralIdentifier] = true;
    }

    function anadirgeneralLanguage() {
        var i = ngeneralLanguage;
        ngeneralLanguage++;
        $("#Language" + i + "").focus().after("<div class='caja' id='Language" + ngeneralLanguage + "'><div class='caja2'><div class='titulo'>Idioma:</div><div class='input'><select id='inputgeneralLanguage" + ngeneralLanguage + "' name='generalLanguage" + ngeneralLanguage + "'>    <option value='none'>"+select+"</option><option value='es'>Español</option><option value='en'>English</option><option value='pt'>Português</option><option value='fr'>French</option><option value='ru'>Russian</option><option value='ja'>Japanese</option><option value='la'>Latin</option><option value='aa'>Afar</option><option value='ab'>Abkhazian</option><option value='af'>Afrikaans</option><option value='am'>Amharic</option><option value='ar'>Arabic</option><option value='as'>Assamese</option><option value='ay'>Aymara</option><option value='az'>Azerbaijani</option><option value='ba'>Bashkir</option><option value='be'>Byelorussian</option><option value='bg'>Bulgarian</option><option value='bh'>Bihari</option><option value='bi'>Bislama</option><option value='bn'>Bengali;Bangla</option><option value='bo'>Tibetan</option><option value='br'>Breton</option><option value='ca'>Catalan</option><option value='co'>Corsican</option><option value='cs'>Czech</option><option value='cy'>Welsh</option><option value='da'>Danish</option><option value='de'>German</option><option value='dz'>Bhutani</option><option value='el'>Greek</option><option value='eo'>Esperanto</option><option value='et'>Estonian</option><option value='eu'>Basque</option><option value='fa'>Persian</option><option value='fi'>Finnish</option><option value='fj'>Fiji</option><option value='fo'>Faeroese</option><option value='fy'>Frisian</option><option value='ga'>Irish</option><option value='gd'>Scots</option><option value='gl'>Galician</option><option value='gn'>Guarani</option><option value='gu'>Gujarati</option><option value='ha'>Hausa</option><option value='hi'>Hindi</option><option value='hr'>Croatian</option><option value='hu'>Hungarian</option><option value='hy'>Armenian</option><option value='ia'>Interlingua</option><option value='ie'>Interlingue</option><option value='ik'>Inupiak</option><option value='in'>Indonesian</option><option value='is'>Icelandic</option><option value='it'>Italian</option><option value='iw'>Hebrew</option><option value='ji'>Yiddish</option><option value='jw'>Javanese</option><option value='ka'>Georgian</option><option value='kk'>Kazakh</option><option value='kl'>Greenlandic</option><option value='km'>Cambodian</option><option value='kn'>Kannada</option><option value='ko'>Korean</option><option value='ks'>Kashmiri</option><option value='ku'>Kurdish</option><option value='ky'>Kirghiz</option><option value='ln'>Lingala</option><option value='lo'>Laothian</option><option value='lt'>Lithuanian</option><option value='lv'>Latvian,Lettish</option><option value='mg'>Malagasy</option><option value='mi'>Maori</option><option value='mk'>Macedonian</option><option value='ml'>Malayalam</option><option value='mn'>Mongolian</option><option value='mo'>Moldavian</option><option value='mr'>Marathi</option><option value='ms'>Malay</option><option value='mt'>Maltese</option><option value='my'>Burmese</option><option value='na'>Nauru</option><option value='ne'>Nepali</option><option value='nl'>Dutch</option><option value='no'>Norwegian</option><option value='oc'>Occitan</option><option value='om'>(Afan)Oromo</option><option value='or'>Oriya</option><option value='pa'>Punjabi</option><option value='pl'>Polish</option><option value='ps'>Pashto,Pushto</option><option value='qu'>Quechua</option><option value='rm'>Rhaeto-Romance</option><option value='rn'>Kirundi</option><option value='ro'>Romanian</option><option value='rw'>Kinyarwanda</option><option value='sa'>Sanskrit</option><option value='sd'>Sindhi</option><option value='sg'>Sangro</option><option value='sh'>Serbo-Croatian</option><option value='si'>Singhalese</option><option value='sk'>Slovak</option><option value='sl'>Slovenian</option><option value='sm'>Samoan</option><option value='sn'>Shona</option><option value='so'>Somali</option><option value='sq'>Albanian</option><option value='sr'>Serbian</option><option value='ss'>Siswati</option><option value='st'>Sesotho</option><option value='su'>Sundanese</option><option value='sv'>Swedish</option><option value='sw'>Swahili</option><option value='ta'>Tamil</option><option value='te'>Tegulu</option><option value='tg'>Tajik</option><option value='th'>Thai</option><option value='ti'>Tigrinya</option><option value='tk'>Turkmen</option><option value='tl'>Tagalog</option><option value='tn'>Setswana</option><option value='to'>Tonga</option><option value='tr'>Turkish</option><option value='ts'>Tsonga</option><option value='tt'>Tatar</option><option value='tw'>Twi</option><option value='uk'>Ukrainian</option><option value='ur'>Urdu</option><option value='uz'>Uzbek</option><option value='vi'>Vietnamese</option><option value='vo'>Volapuk</option><option value='wo'>Wolof</option><option value='xh'>Xhosa</option><option value='yo'>Yoruba</option><option value='zh'>Chinese</option><option value='zu'>Zulu</option>    </select><div class='dinput' > </div></div></div><div class='caja3'><span class='qt qtgeneralLanguage' numero='" + ngeneralLanguage + "'><a id='quitarLanguage' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
        vgeneralLanguage[ngeneralLanguage] = true;
    }

    function anadirgeneralDescription() {
        var i = ngeneralDescription;
        ngeneralDescription++;
        $("#Description" + i + "").focus().after("<div class='caja' id='Description" + ngeneralDescription + "'><div class='caja2'><div class='titulo'>"+description+":</div><div class='input'><textarea id='inputgeneralDescription" + ngeneralDescription + "' name='generalDescription" + ngeneralDescription + "' type='textarea' ></textarea><div class='dinput' > </div></div></div><div class='caja3'><span class='qt qtgeneralDescription' numero='" + ngeneralDescription + "'><a id='quitargeneralDescription' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
        vgeneralDescription[ngeneralDescription] = true;
    }

    function anadirgeneralKeyword() {
        var i = ngeneralKeyword;
        ngeneralKeyword++;
        $("#Keyword" + i + "").focus().after("<div class='caja' id='Keyword" + ngeneralKeyword + "'><div class='caja2'><div class='titulo'>"+keywords+":</div><div class='input'><input id='inputgeneralKeyword" + ngeneralKeyword + "' name='generalKeyword" + ngeneralKeyword + "' type='text' /><div class='dinput' >  </div></div></div><div class='caja3'><span class='qt qtgeneralKeyword' numero='" + ngeneralKeyword + "'><a id='quitargeneralKeyword' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
        vgeneralKeyword[ngeneralKeyword] = true;
    }

    function anadirgeneralCoverage() {
        var i = ngeneralCoverage;
        ngeneralCoverage++;
        $("#Coverage" + i + "").focus().after("<div class='caja' id='Coverage" + ngeneralCoverage + "'><div class='caja2'><div class='titulo'>"+coverage+":</div><div class='input'><input id='inputgeneralCoverage" + ngeneralCoverage + "' name='generalCoverage" + ngeneralCoverage + "' type='text' /><div class='dinput' > </div></div></div><div class='caja3'><span class='qt qtgeneralCoverage' numero='" + ngeneralCoverage + "'><a id='quitargeneralCoverage' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
        vgeneralCoverage[ngeneralCoverage] = true;
    }

    function anadirlifeCycleContribute() {
        var i = nlifeCycleContribute;
        nlifeCycleContribute++;
        nlifeCycleEntity = 0;
        $("#Contribute" + i + "").focus().after("<div class='caja' id='Contribute" + nlifeCycleContribute + "'><div class='caja2 classificationTaxonPath'><!--Role--><div class='caja' id='lifeCycleRole" + nlifeCycleContribute + "_" + nlifeCycleEntity + "'><div class='caja2'><div class='titulo'><label> "+role+":</label></div><div class='input'><select id='inputlifeCycleRole" + nlifeCycleContribute + "_" + nlifeCycleEntity + "' name='lifeCycleRole" + nlifeCycleContribute + "_" + nlifeCycleEntity + "'><option value='none'>"+select+"</option><option value='1'>"+role1+"</option><option value='2'>"+role2+"</option><option value='3'>"+role3+"</option><option value='4'>"+role4+"</option><option value='5'>"+role5+"</option><option value='6'>"+role6+"</option><option value='7'>"+role7+"</option><option value='8'>"+role8+"</option><option value='9'>"+role9+"</option><option value='10'>"+role10+"</option><option value='11'>"+role11+"</option><option value='12'>"+role12+"</option><option value='13'>"+role13+"</option><option value='14'>"+role14+"</option></select><div class='dinput' ></div></div></div></div><div class='caja' id='lifeCycleEntity" + nlifeCycleContribute + "_" + nlifeCycleEntity + "'><div class='caja2'><div class='titulo'><label > "+entity+":</label></div><div class='input'><input id='inputlifeCycleEntity" + nlifeCycleContribute + "_" + nlifeCycleEntity + "' name='lifeCycleEntity" + nlifeCycleContribute + "_" + nlifeCycleEntity + "' type='text'/><div class='dinput'> <br/></div></div></div><div class='caja3'><span class='at'><a id='anadirlifeCycleEntity' numero='" + nlifeCycleContribute + "' cantidadEntity='0' class='pointer' href='' value='' title='A&ntilde;adir'></a></span></div></div><div class='caja' id='tecnicalDate" + nlifeCycleContribute + "_" + nlifeCycleEntity + "'><div class='caja2'><div class='titulo'><label >"+date+":</label></div><div class='input'><input id='inputlifeCycleDate" + nlifeCycleContribute + "_" + nlifeCycleEntity + "' class='date' name='lifeCycleDate" + nlifeCycleContribute + "_" + nlifeCycleEntity + "' type='text'/><div class='dinput'></div></div></div></div></div><div class='caja3'><span class='qt qtlifeCycleContribute' numero='" + nlifeCycleContribute + "'><a id='quitarlifeCycleContribute' class='pointer' href='' value='' title='A&ntilde;adir'></a></span></div></div><div class='caja3'></div>");
        vlifeCycleContribute[nlifeCycleContribute] = new Array(true);
    }

    function anadirlifeCycleEntity(n) {
        var i = nlifeCycleEntity;

        nlifeCycleEntity++;
        $('#lifeCycleEntity' + n + "_" + i + '').focus().after("<div class='caja' id='lifeCycleEntity" + n + "_" + nlifeCycleEntity + "'><div class='caja2'><div class='titulo'><label > "+entity+":</label></div><div class='input'><input id='inputlifeCycleEntity" + n + "_" + nlifeCycleEntity + "' name='lifeCycleEntity" + n + "_" + nlifeCycleEntity + "' type='text'/><div class='dinput'></div></div></div><div class='caja3'><span class='qt qtlifeCycleEntity" + n + "_" + nlifeCycleEntity + " qtEntity' numero='" + n + "' cantidadEntity='" + nlifeCycleEntity + "'><a id='quitarlifeCycleEntity" + n + "' class='pointer' href='' value='' title='A&ntilde;adir'></a></span></div></div>");
        vlifeCycleContribute[n][nlifeCycleEntity] = true;
    }

    function anadirmetaMetadataIdentifier() {
        var i = nmetaMetadataIdentifier;
        nmetaMetadataIdentifier++;
        $("#metaMetadataIdentifier" + i + "").focus().after("<div class='caja' id='metaMetadataIdentifier" + nmetaMetadataIdentifier + "'><div class='caja2'><div class='titulo'><label >"+catalog+":</label></div><div class='input'><input id='inputmetaMetadataCatalog" + nmetaMetadataIdentifier + "' name='metaMetadataCatalog" + nmetaMetadataIdentifier + "' type='text' /><div class='dinput'></div></div><div class='titulo'>"+entry+":</div><div class='input'><input id='inputmetaMetadataEntry" + nmetaMetadataIdentifier + "' name='metaMetadataEntry" + nmetaMetadataIdentifier + "' type='text' /><div class='dinput'>Ejemplo: KUL532</div></div></div><div class='caja3'><span class='qt qtmetaMetadataIdentifier' numero='" + nmetaMetadataIdentifier + "'><a id='quitarmetaMetadataIdentifier' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
        vmetaMetadataIdentifier[nmetaMetadataIdentifier] = true;
    }
    function anadirmetaMetadataContribute() {
        var i = nmetaMetadataContribute;
        nmetaMetadataContribute++;
        nmetaMetadataEntity = 0;
        $("#metaMetadataContribute" + i + "").focus().after("<div class='caja' id='metaMetadataContribute" + nmetaMetadataContribute + "'><div class='caja2 classificationTaxonPath'><!--Role--><div class='caja' id='metaMetadataRole" + nmetaMetadataContribute + "_" + nmetaMetadataEntity + "'><div class='caja2'><div class='titulo'><label> "+role+":</label></div><div class='input'><select id='inputmetaMetadataRole" + nmetaMetadataContribute + "_" + nmetaMetadataEntity + "' name='metaMetadataRole" + nmetaMetadataContribute + "_" + nmetaMetadataEntity + "'><option value='none'>"+select+"</option><option value='1'>creador</option><option value='2'>revizor</option></select><div class='dinput' ></div></div></div></div><div class='caja' id='metaMetadataEntity" + nmetaMetadataContribute + "_" + nmetaMetadataEntity + "'><div class='caja2'><div class='titulo'><label > "+entity+":</label></div><div class='input'><input id='inputmetaMetadataEntity" + nmetaMetadataContribute + "_" + nmetaMetadataEntity + "' name='metaMetadataEntity" + nmetaMetadataContribute + "_" + nmetaMetadataEntity + "' type='text'/><div class='dinput'></div></div></div><div class='caja3'><span class='at'><a id='anadirmetaMetadataEntity' numero='" + nmetaMetadataContribute + "' cantidadEntity='0' class='pointer' href='' value='' title='A&ntilde;adir'></a></span></div></div><div class='caja' id='tecnicalDate" + nmetaMetadataContribute + "_" + nmetaMetadataEntity + "'><div class='caja2'><div class='titulo'><label >"+date+":</label></div><div class='input'><input id='inputmetaMetadataDate" + nmetaMetadataContribute + "_" + nmetaMetadataEntity + "' class='date' name='metaMetadataDate" + nmetaMetadataContribute + "_" + nmetaMetadataEntity + "' type='text'/><div class='dinput'></div></div></div></div></div><div class='caja3'><span class='qt qtmetaMetadataContribute' numero='" + nmetaMetadataContribute + "'><a id='quitarmetaMetadataContribute' class='pointer' href='' value='' title='A&ntilde;adir'></a></span></div></div><div class='caja3'></div>");
        vmetaMetadataContribute[nmetaMetadataContribute] = new Array(true);
    }
    function anadirmetaMetadataEntity(n) {
        var i = nmetaMetadataEntity;

        nmetaMetadataEntity++;
        $('#metaMetadataEntity' + n + "_" + i + '').focus().after("<div class='caja' id='metaMetadataEntity" + n + "_" + nmetaMetadataEntity + "'><div class='caja2'><div class='titulo'><label > "+entity+":</label></div><div class='input'><input id='inputmetaMetadataEntity" + n + "_" + nmetaMetadataEntity + "' name='metaMetadataEntity" + n + "_" + nmetaMetadataEntity + "' type='text'/><div class='dinput'></div></div></div><div class='caja3'><span class='qt qtmetaMetadataEntity" + n + "_" + nmetaMetadataEntity + " qtmetaMetadaEntity' numero='" + n + "' cantidadEntity='" + nmetaMetadataEntity + "'><a id='quitarmetaMetadataEntity" + n + "' class='pointer' href='' value='' title='A&ntilde;adir'></a></span></div></div>");
        vmetaMetadataContribute[n][nmetaMetadataEntity] = true;
    }
    function anadirmetaMetadataMetadataSchema() {
        var i = nmetaMetadataMetadataSchema;
        nmetaMetadataMetadataSchema++;
        $("#metaMetadataMetadataSchema" + i + "").focus().after("<div class='caja' id='metaMetadataMetadataSchema" + nmetaMetadataMetadataSchema + "'><div class='caja2'><div class='titulo'>"+metadataSchema+":</div><div class='input'><input id='inputmetaMetadataMetadataSchema" + nmetaMetadataMetadataSchema + "' name='metaMetadataMetadataSchema" + nmetaMetadataMetadataSchema + "' type='text' /><div class='dinput' >  </div></div></div><div class='caja3'><span class='qt qtmetaMetadataMetadataSchema' numero='" + nmetaMetadataMetadataSchema + "'><a id='quitarmetaMetadataMetadataSchema' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
        vmetaMetadataMetadataSchema[nmetaMetadataMetadataSchema] = true;
    }
    function anadirtechnicalFormat() {
        var i = ntechnicalFormat;
        ntechnicalFormat++;
        $("#technicalFormat" + i + "").focus().after("<div class='caja' id='technicalFormat" + ntechnicalFormat + "'><div class='caja2'><div class='titulo'>Formato:</div><div class='input'><input id='inputtechnicalFormat" + ntechnicalFormat + "' name='technicalFormat" + ntechnicalFormat + "' type='text'><div class='dinput' > </div></div></div><div class='caja3'><span class='qt qttechnicalFormat' numero='" + ntechnicalFormat + "'><a id='quitartechnicalFormat' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
        vtechnicalFormat[ntechnicalFormat] = true;
    }
    function anadirtechnicalLocation() {
        var i = ntechnicalLocation;
        ntechnicalLocation++;
        $("#technicalLocation" + i + "").focus().after("<div class='caja' id='technicalLocation" + ntechnicalLocation + "'><div class='caja2'><div class='titulo'>Localización:</div><div class='input'><input id='inputtechnicalLocation" + ntechnicalLocation + "' name='technicalLocation" + ntechnicalLocation + "' type='text'><div class='dinput' > </div></div></div><div class='caja3'><span class='qt qttechnicalLocation' numero='" + ntechnicalLocation + "'><a id='quitartechnicalLocation' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
        vtechnicalLocation[ntechnicalLocation] = true;
    }
    function anadirtechnicalRequirement() {
        var i = ntechnicalRequirement;
        ntechnicalRequirement++;
        ntechnicalOrComposite = 0;
        $("#technicalRequirement" + i + "").focus().after("<div class='caja' id='technicalRequirement" + ntechnicalRequirement + "' ><fieldset class='caja2 subcategoria anidada2 ' ><legend>Composición</legend><div id='technicalOrComposite" + ntechnicalRequirement + "_" + ntechnicalOrComposite + "' class='caja' ><div class='caja2'><!--Type--><div class='titulo'><label> Tipo:</label></div><div class='input'><select id='inputtechnicalType" + ntechnicalRequirement + "_" + ntechnicalOrComposite + "'+ name='technicalType" + ntechnicalRequirement + "_" + ntechnicalOrComposite + "'><option value='none'>"+select+"</option><option value='1'>sistema operativo</option><option value='2'>navegador</option></select><div class='dinput' ></div></div><!--Name--><div class='titulo'><label> Nombre:</label></div><div class='input'><input id='inputtechnicalName" + ntechnicalRequirement + "_" + ntechnicalOrComposite + "' name='technicalName" + ntechnicalRequirement + "_" + ntechnicalOrComposite + "' type='text'/><div class='dinput' ></div></div><!--Minimum Version--><div class='titulo'><label> Versión Mínima:</label></div><div class='input'><input id='inputtechnicalMinimumVersion" + ntechnicalRequirement + "_" + ntechnicalOrComposite + "' name='technicalMinimumVersion" + ntechnicalRequirement + "_" + ntechnicalOrComposite + "' type='text'/><div class='dinput' ></div></div><!--Maximum Version--><div class='titulo'><label> Versión Máxima:</label></div><div class='input'><input id='inputtechnicalMaximumVersion" + ntechnicalRequirement + "_" + ntechnicalOrComposite + "' name='technicalMaximumVersion" + ntechnicalRequirement + "_" + ntechnicalOrComposite + "' type='text'/><div class='dinput' ></div></div></div><div class='caja3'><span class='at'><a id='anadirtechnicalOrComposite' numero='" + ntechnicalRequirement + "' cantidadOrComposite='0' class='pointer' href='' value='' title='A&ntilde;adir'></a></span></div></div></fieldset><div class='caja3'><span class='qt qttechnicalRequirement' numero='" + ntechnicalRequirement + "'><a id='quitartechnicalRequirement' class='pointer' href='' value='' title='"+quit+"'></a></span></div></div>");
        vtechnicalRequirement[ntechnicalRequirement] = new Array(true);
    }
    function anadirtechnicalOrComposite(n) {
        var i = ntechnicalOrComposite;

        ntechnicalOrComposite++;
        $('#technicalOrComposite' + n + "_" + i + '').focus().after("<div class='caja' id='technicalOrComposite" + n + "_" + ntechnicalOrComposite + "' ><div class='caja2'><!--Type--><div class='titulo'><label> Tipo:</label></div><div class='input'><select id='inputtechnicalType" + n + "_" + ntechnicalOrComposite + "' name='technicalType" + n + "_" + ntechnicalOrComposite + "'><option value='none'>"+select+"</option><option value='1'>sistem a operativo</option><option value='2'> navegador</option></select><div class='dinput' ></div></div><!--Name--><div class='titulo'><label> Nombre:</label></div><div class='input'><input id='inputtechnicalName" + n + "_" + ntechnicalOrComposite + "' name='technicalName" + n + "_" + ntechnicalOrComposite + "' type='text'/><div class='dinput' ></div></div><!--Minimum Version--><div class='titulo'><label> Versión Mínima:</label></div><div class='input'><input id='inputtechnicalMinimumVersion" + n + "_" + ntechnicalOrComposite + "' name='technicalMinimumVersion" + n + "_" + ntechnicalOrComposite + "' type='text'/><div class='dinput' ></div></div><!--Maximum Version--><div class='titulo'><label> Versión Máxima:</label></div><div class='input'><input id='inputtechnicalMaximumVersion" + n + "_" + ntechnicalOrComposite + "' name='technicalMaximumVersion" + n + "_" + ntechnicalOrComposite + "' type='text'/><div class='dinput' ></div></div></div><div class='caja3'><span class='qt qttechnicalOrComposite" + n + "_" + ntechnicalOrComposite + " qtOrComposite' numero='" + n + "' cantidadOrComposite='" + ntechnicalOrComposite + "'><a id='quitartechnicalOrComposite" + n + "' class='pointer' href='' value='' title='"+quit+"'></a></span></div></div>");
        vtechnicalRequirement[n][ntechnicalOrComposite] = true;
    }
    function anadireducationalLearningResourceType() {
        var i = neducationalLearningResourceType;
        neducationalLearningResourceType++;
        $("#educationalLearningResourceType" + i + "").focus().after("<div class='caja' id='educationalLearningResourceType" + neducationalLearningResourceType + "'><div class='caja2'><div class='titulo'>Tipo de Recurso Educativo:</div><div class='input'><select id='inputeducationalLearningResourceType" + neducationalLearningResourceType + "' name='educationalLearningResourceType" + neducationalLearningResourceType + "'><option value='none'>"+select+"</option><option value='1'>ejercicio</option><option value='2'>simulación</option><option value='3'>cuestionario</option><option value='4'>diagrama</option><option value='5'>figura</option><option value='6'>gráfico</option><option value='7'>índice</option><option value='8'>diapositiva</option><option value='9'>tabla</option><option value='10'>texto narrativo</option><option value='11'>examen</option><option value='12'>experimento</option><option value='13'>planteamiento de problema </option><option value='14'>autoevaluación </option><option value='15'>conferencia</option></select><div class='dinput' > </div></div></div><div class='caja3'><span class='qt qteducationalLearningResourceType' numero='" + neducationalLearningResourceType + "'><a id='quitareducationalLearningResourceType' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
        veducationalLearningResourceType[neducationalLearningResourceType] = true;
    }
    function anadireducationalIntendedEndUserRole() {
        var i = neducationalIntendedEndUserRole;
        neducationalIntendedEndUserRole++;
        $("#educationalIntendedEndUserRole" + i + "").focus().after("<div class='caja' id='educationalIntendedEndUserRole" + neducationalIntendedEndUserRole + "'><div class='caja2'><div class='titulo'>Destinatario:</div><div class='input'><select id='inputeducationalIntendedEndUserRole" + neducationalIntendedEndUserRole + "' name='educationalIntendedEndUserRole" + neducationalIntendedEndUserRole + "'><option value='none'>"+select+"</option><option value='1'>profesor</option><option value='2'>autor</option><option value='3'>aprendiz</option><option value='4'>administrador</option></select><div class='dinput' > </div></div></div><div class='caja3'><span class='qt qteducationalIntendedEndUserRole' numero='" + neducationalIntendedEndUserRole + "'><a id='quitareducationalIntendedEndUserRole' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
        veducationalIntendedEndUserRole[neducationalIntendedEndUserRole] = true;
    }
    function anadireducationalContext() {
        var i = neducationalContext;
        neducationalContext++;
        $("#educationalContext" + i + "").focus().after("<div class='caja' id='educationalContext" + neducationalContext + "'><div class='caja2'><div class='titulo'>Contexto:</div><div class='input'><select id='inputeducationalContext" + neducationalContext + "' name='educationalContext" + neducationalContext + "'><option value='none'>"+select+"</option><option value='1'>escuela básica primaria y/o secundaria</option><option value='2'>educación superior</option><option value='3'>entrenamiento</option><option value='4'>otro</option></select><div class='dinput' > </div></div></div><div class='caja3'><span class='qt qteducationalContext' numero='" + neducationalContext + "'><a id='quitareducationalContext' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
        veducationalContext[neducationalContext] = true;
    }
    function anadireducationalTypicalAgeRange() {
        var i = neducationalTypicalAgeRange;
        neducationalTypicalAgeRange++;
        $("#educationalTypicalAgeRange" + i + "").focus().after("<div class='caja' id='educationalTypicalAgeRange" + neducationalTypicalAgeRange + "'><div class='caja2'><div class='titulo'>Rango Típico de Edad:</div><div class='input'><input id='inputeducationalTypicalAgeRange" + neducationalTypicalAgeRange + "' name='educationalTypicalAgeRange" + neducationalTypicalAgeRange + "' type='text'/><div class='dinput' > Ejemplo: 7-9</div></div></div><div class='caja3'><span class='qt qteducationalTypicalAgeRange' numero='" + neducationalTypicalAgeRange + "'><a id='quitareducationalTypicalAgeRange' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
        veducationalTypicalAgeRange[neducationalTypicalAgeRange] = true;
    }
    function anadireducationalDescription() {
        var i = neducationalDescription;
        neducationalDescription++;
        $("#educationalDescription" + i + "").focus().after("<div class='caja' id='educationalDescription" + neducationalDescription + "'><div class='caja2'><div class='titulo'><label class='radioButonAling'><input id='eaRadioButtonDescripcion" + neducationalDescription + "' class='eaRadioButton' n='" + neducationalDescription + "' type='radio' name='eaRadioButton" + neducationalDescription + "' value='descripcionLibre' checked='checked'/> "+description+" Libre<br /><input id='eaRadioButtonFslsm" + neducationalDescription + "' class='eaRadioButton' n='" + neducationalDescription + "' type='radio' name='eaRadioButton" + neducationalDescription + "' value='fslsm' /> Fslsm <br /><input id='eaRadioButtonVark" + neducationalDescription + "' class='eaRadioButton' n='" + neducationalDescription + "' type='radio' name='eaRadioButton" + neducationalDescription + "' value='vark' /> Vark</label></div><div class='input'><textarea id='inputeducationalDescription" + neducationalDescription + "' name='educationalDescription" + neducationalDescription + "'></textarea></div><div id='desplegableEa" + neducationalDescription + "_0'><div class='estilosA'><fieldset class='fFslsm'><legend>FSLSM</legend><div class='clear'><div class='eafloatIz columna1'><div><input id='fslsmR" + neducationalDescription + "_1L' class='eaOcultarInput' type='text' name='fslsmR" + neducationalDescription + "_1L' value='50%' readonly='readonly''></div>Activo</div><div class='center'><input type='text' class='estiloRe' id='fslsmRe" + neducationalDescription + "_1' name='fslsmRe" + neducationalDescription + "_1' style='display:none'/><input type='text' class='estiloRe' id='fslsmRe" + neducationalDescription + "_2' name='fslsmRe" + neducationalDescription + "_2' style='display:none'/><input type='text' class='estiloRe' id='fslsmRe" + neducationalDescription + "_3' name='fslsmRe" + neducationalDescription + "_3' style='display:none'/><input type='text' class='estiloRe' id='fslsmRe" + neducationalDescription + "_4' name='fslsmRe" + neducationalDescription + "_4' style='display:none'/><input type='text' class='estiloRe' id='fslsmRe" + neducationalDescription + "_5' name='fslsmRe" + neducationalDescription + "_5' style='display:none'/><div class='sFslsm' id='sfslsm" + neducationalDescription + "_1' n='" + neducationalDescription + "' m='1'></div></div><div class='eafloatIz columna2'><div><input id='fslsmR" + neducationalDescription + "_1R' class='eaOcultarInput' type='text' name='fslsmR" + neducationalDescription + "_1R' value='50%' readonly='readonly''></div>Reflexivo</div></div><div class='clear'><div class='eafloatIz columna1'><div><input id='fslsmR" + neducationalDescription + "_2L' class='eaOcultarInput' type='text' name='fslsmR" + neducationalDescription + "_2L' value='50%' readonly='readonly''></div>Sensitivo</div><div class='center'><div class='sFslsm' id='sfslsm" + neducationalDescription + "_2' n='" + neducationalDescription + "' m='2'></div></div><div class='eafloatIz columna2'><div><input id='fslsmR" + neducationalDescription + "_2R' class='eaOcultarInput' type='text' name='fslsmR" + neducationalDescription + "_2R' value='50%' readonly='readonly''></div>Intuitivo</div></div><div class='clear'><div class='eafloatIz columna1'><div><input id='fslsmR" + neducationalDescription + "_3L' class='eaOcultarInput' type='text' name='fslsmR" + neducationalDescription + "_3L' value='50%' readonly='readonly''></div>Visual</div><div class='center'><div class='sFslsm' id='sfslsm" + neducationalDescription + "_3' n='" + neducationalDescription + "' m='3'></div></div><div class='eafloatIz columna2'><div><input id='fslsmR" + neducationalDescription + "_3R' class='eaOcultarInput' type='text' name='fslsmR" + neducationalDescription + "_3R' value='50%' readonly='readonly''></div>Verbal</div></div><div class='clear'><div class='eafloatIz columna1'><div><input id='fslsmR" + neducationalDescription + "_4L' class='eaOcultarInput' type='text' name='fslsmR" + neducationalDescription + "_4L' value='50%' readonly='readonly''></div>Inductivo</div><div class='center'><div class='sFslsm' id='sfslsm" + neducationalDescription + "_4' n='" + neducationalDescription + "' m='4'></div></div><div class='eafloatIz columna2'><div><input id='fslsmR" + neducationalDescription + "_4R' class='eaOcultarInput' type='text' name='fslsmR" + neducationalDescription + "_4R' value='50%' readonly='readonly''></div>Deductivo</div></div><div class='clear'><div class='eafloatIz columna1'><div><input id='fslsmR" + neducationalDescription + "_5L' class='eaOcultarInput' type='text' name='fslsmR" + neducationalDescription + "_5L' value='50%' readonly='readonly''></div>Secuencial</div><div class='center'><div class='sFslsm' id='sfslsm" + neducationalDescription + "_5' n='" + neducationalDescription + "' m='5'></div></div><div class='eafloatIz columna2'><div><input id='fslsmR" + neducationalDescription + "_5R' class='eaOcultarInput' type='text' name='fslsmR" + neducationalDescription + "_5R' value='50%' readonly='readonly''></div>Global</div></div><div class='clear eaEnviar'><input class='enviarFslsm' type='button' n='" + neducationalDescription + "' value='"+accept+"'/> <input class='cancelarFslsm' type='button' n='" + neducationalDescription + "' value='Cancelar'/></div></fieldset></div></div><div id='desplegableEa" + neducationalDescription + "_1'><div class='estilosA'><fieldset class='fVark'><legend>VARK</legend><div class='clear'><div class='eafloatIz columna1'><div><input id='varkR" + neducationalDescription + "_1' class='eaOcultarInput' type='text' name='varkR" + neducationalDescription + "_1' value='50%' readonly='readonly''></div>Visual</div><div class='center'><input type='text' class='estiloRe' name='varkRe" + neducationalDescription + "_1' id='varkRe" + neducationalDescription + "_1' style='display:none'/><input type='text' class='estiloRe' name='varkRe" + neducationalDescription + "_2' id='varkRe" + neducationalDescription + "_2' style='display:none'/><input type='text' class='estiloRe' name='varkRe" + neducationalDescription + "_3' id='varkRe" + neducationalDescription + "_3' style='display:none'/><input type='text' class='estiloRe' name='varkRe" + neducationalDescription + "_4' id='varkRe" + neducationalDescription + "_4' style='display:none'/><div class='sVark' id='svark" + neducationalDescription + "_1' n='" + neducationalDescription + "' m='1'></div></div></div><div class='clear'><div class='eafloatIz columna1'><div><input id='varkR" + neducationalDescription + "_2' class='eaOcultarInput' type='text' name='varkR" + neducationalDescription + "_2' value='50%' readonly='readonly''></div>Auditivo</div><div class='center'><div class='sVark' id='svark" + neducationalDescription + "_2' n='" + neducationalDescription + "' m='2'></div></div></div><div class='clear'><div class='eafloatIz columna1'><div><input id='varkR" + neducationalDescription + "_3' class='eaOcultarInput' type='text' name='varkR" + neducationalDescription + "_3' value='50%' readonly='readonly''></div>Lector</div><div class='center'><div class='sVark' id='svark" + neducationalDescription + "_3' n='" + neducationalDescription + "' m='3'></div></div></div><div class='clear'><div class='eafloatIz columna1'><div><input id='varkR" + neducationalDescription + "_4' class='eaOcultarInput' type='text' name='varkR" + neducationalDescription + "_4' value='50%' readonly='readonly''></div>Kinestético</div><div class='center'><div class='sVark' id='svark" + neducationalDescription + "_4' n='" + neducationalDescription + "' m='4'></div></div></div><div class='clear eaEnviar'><input class='enviarVark' type='button' n='" + neducationalDescription + "' value='"+accept+"'/> <input class='cancelarVark' type='button' n='" + neducationalDescription + "' value='Cancelar'/></div></fieldset></div></div></div><div class='caja3'><span class='qt qteducationalDescription' numero='" + neducationalDescription + "'><a id='quitareducationalDescription' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
        veducationalDescription[neducationalDescription] = true;
        $("#educationalDescription0").attr("n", neducationalDescription);
        $(".sFslsm").slider({
            value: 50,
            min: 0,
            max: 100,
            step: 1,
            slide: function(event, ui) {
                var n = $(this).attr("n");
                var m = $(this).attr("m");
                //                alert(ui.value);
                var r = 100 - ui.value;
                $("#fslsmR" + n + "_" + m + "L").val(ui.value + "%");
                $("#fslsmR" + n + "_" + m + "R").val(r + "%");
            }
        });

        $(".sVark").slider({
            value: 50,
            min: 0,
            max: 100,
            step: 1,
            slide: function(event, ui) {
                var n = $(this).attr("n");
                var m = $(this).attr("m");
                $("#varkR" + n + "_" + m + "").val(ui.value + "%");
            }
        });
        $("#desplegableEa" + neducationalDescription + "_0").hide();
        $("#desplegableEa" + neducationalDescription + "_1").hide();
        $("#desplegableEa" + neducationalDescription + "_0 .eaOcultarInput").each(function() {
            $(this).attr('disabled', 'disabled');
        });
        $("#desplegableEa" + neducationalDescription + "_1 .eaOcultarInput").each(function() {
            $(this).attr('disabled', 'disabled');
        });

        //        
        //        $("#educationalDescription"+i+"").focus().after("<div class='caja' id='educationalDescription"+neducationalDescription+"'><div class='caja2'><div class='titulo'>"+description+":</div><div class='input'><textarea id='inputeducationalDescription"+neducationalDescription+"' name='educationalDescription"+neducationalDescription+"'></textarea><div class='dinput' ></div></div></div><div class='caja3'><span class='qt qteducationalDescription' numero='"+neducationalDescription+"'><a id='quitareducationalDescription' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
        //        veducationalDescription[neducationalDescription]=true;
    }
    function anadireducationalLanguage() {
        var i = neducationalLanguage;
        neducationalLanguage++;
        $("#educationalLanguage" + i + "").focus().after("<div class='caja' id='educationalLanguage" + neducationalLanguage + "'><div class='caja2'><div class='titulo'>Idioma:</div><div class='input'><select id='inputeducationalLanguage" + neducationalLanguage + "' name='educationalLanguage" + neducationalLanguage + "'><option value='none'>"+select+"</option><option value='es'>Español</option><option value='en'>English</option><option value='pt'>Português</option><option value='fr'>French</option><option value='ru'>Russian</option><option value='ja'>Japanese</option><option value='la'>Latin</option><option value='aa'>Afar</option><option value='ab'>Abkhazian</option><option value='af'>Afrikaans</option><option value='am'>Amharic</option><option value='ar'>Arabic</option><option value='as'>Assamese</option><option value='ay'>Aymara</option><option value='az'>Azerbaijani</option><option value='ba'>Bashkir</option><option value='be'>Byelorussian</option><option value='bg'>Bulgarian</option><option value='bh'>Bihari</option><option value='bi'>Bislama</option><option value='bn'>Bengali;Bangla</option><option value='bo'>Tibetan</option><option value='br'>Breton</option><option value='ca'>Catalan</option><option value='co'>Corsican</option><option value='cs'>Czech</option><option value='cy'>Welsh</option><option value='da'>Danish</option><option value='de'>German</option><option value='dz'>Bhutani</option><option value='el'>Greek</option><option value='eo'>Esperanto</option><option value='et'>Estonian</option><option value='eu'>Basque</option><option value='fa'>Persian</option><option value='fi'>Finnish</option><option value='fj'>Fiji</option><option value='fo'>Faeroese</option><option value='fy'>Frisian</option><option value='ga'>Irish</option><option value='gd'>Scots</option><option value='gl'>Galician</option><option value='gn'>Guarani</option><option value='gu'>Gujarati</option><option value='ha'>Hausa</option><option value='hi'>Hindi</option><option value='hr'>Croatian</option><option value='hu'>Hungarian</option><option value='hy'>Armenian</option><option value='ia'>Interlingua</option><option value='ie'>Interlingue</option><option value='ik'>Inupiak</option><option value='in'>Indonesian</option><option value='is'>Icelandic</option><option value='it'>Italian</option><option value='iw'>Hebrew</option><option value='ji'>Yiddish</option><option value='jw'>Javanese</option><option value='ka'>Georgian</option><option value='kk'>Kazakh</option><option value='kl'>Greenlandic</option><option value='km'>Cambodian</option><option value='kn'>Kannada</option><option value='ko'>Korean</option><option value='ks'>Kashmiri</option><option value='ku'>Kurdish</option><option value='ky'>Kirghiz</option><option value='ln'>Lingala</option><option value='lo'>Laothian</option><option value='lt'>Lithuanian</option><option value='lv'>Latvian,Lettish</option><option value='mg'>Malagasy</option><option value='mi'>Maori</option><option value='mk'>Macedonian</option><option value='ml'>Malayalam</option><option value='mn'>Mongolian</option><option value='mo'>Moldavian</option><option value='mr'>Marathi</option><option value='ms'>Malay</option><option value='mt'>Maltese</option><option value='my'>Burmese</option><option value='na'>Nauru</option><option value='ne'>Nepali</option><option value='nl'>Dutch</option><option value='no'>Norwegian</option><option value='oc'>Occitan</option><option value='om'>(Afan)Oromo</option><option value='or'>Oriya</option><option value='pa'>Punjabi</option><option value='pl'>Polish</option><option value='ps'>Pashto,Pushto</option><option value='qu'>Quechua</option><option value='rm'>Rhaeto-Romance</option><option value='rn'>Kirundi</option><option value='ro'>Romanian</option><option value='rw'>Kinyarwanda</option><option value='sa'>Sanskrit</option><option value='sd'>Sindhi</option><option value='sg'>Sangro</option><option value='sh'>Serbo-Croatian</option><option value='si'>Singhalese</option><option value='sk'>Slovak</option><option value='sl'>Slovenian</option><option value='sm'>Samoan</option><option value='sn'>Shona</option><option value='so'>Somali</option><option value='sq'>Albanian</option><option value='sr'>Serbian</option><option value='ss'>Siswati</option><option value='st'>Sesotho</option><option value='su'>Sundanese</option><option value='sv'>Swedish</option><option value='sw'>Swahili</option><option value='ta'>Tamil</option><option value='te'>Tegulu</option><option value='tg'>Tajik</option><option value='th'>Thai</option><option value='ti'>Tigrinya</option><option value='tk'>Turkmen</option><option value='tl'>Tagalog</option><option value='tn'>Setswana</option><option value='to'>Tonga</option><option value='tr'>Turkish</option><option value='ts'>Tsonga</option><option value='tt'>Tatar</option><option value='tw'>Twi</option><option value='uk'>Ukrainian</option><option value='ur'>Urdu</option><option value='uz'>Uzbek</option><option value='vi'>Vietnamese</option><option value='vo'>Volapuk</option><option value='wo'>Wolof</option><option value='xh'>Xhosa</option><option value='yo'>Yoruba</option><option value='zh'>Chinese</option><option value='zu'>Zulu</option></select><div class='dinput' > </div></div></div><div class='caja3'><span class='qt qteducationalLanguage' numero='" + neducationalLanguage + "'><a id='quitareducationalLanguage' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
        veducationalLanguage[neducationalLanguage] = true;
    }
    function anadirrelationIdentifier() {
        var i = nrelationIdentifier;
        nrelationIdentifier++;
        $("#relationIdentifier" + i + "").focus().after("<div class='caja' id='relationIdentifier" + nrelationIdentifier + "'><div class='caja2'><!--Catalog--><div class='titulo'><label> "+catalog+":</label></div><div class='input'><input id='inputrelationCatalog" + nrelationIdentifier + "' name='relationCatalog" + nrelationIdentifier + "' type='text'/><div class='dinput' ></div></div><!--Entry--><div class='titulo'><label> "+entry+":</label></div><div class='input'><input id='inputrelationEntry" + nrelationIdentifier + "' name='relationEntry" + nrelationIdentifier + "' type='text'/></a><div class='dinput' ></div></div></div><div class='caja3'><span class='qt qtrelationIdentifier' numero='" + nrelationIdentifier + "'><a id='quitarrelationIdentifier' class='pointer' href='' value='' title='A&ntilde;adir'></a></span></div></div>")
        vrelationIdentifier[nrelationIdentifier] = true;
    }
    function anadirrelationDescription() {
        var i = nrelationDescription;
        nrelationDescription++;
        $("#relationDescription" + i + "").focus().after("<div class='caja' id='relationDescription" + nrelationDescription + "'><div class='caja2'><div class='titulo'>"+description+":</div><div class='input'><textarea id='inputrelationDescription" + nrelationDescription + "' name='relationDescription" + nrelationDescription + "'></textarea><div class='dinput' ></div></div></div><div class='caja3'><span class='qt qtrelationDescription' numero='" + nrelationDescription + "'><a id='quitarrelationDescription' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
        vrelationDescription[nrelationDescription] = true;
    }

    function anadirclassificationTaxonPath() {
        var i = nclassificationTaxonPath;
        nclassificationTaxonPath++;
        nclassificationTaxon = 0;
        $("#classificationTaxonPath" + i + "").focus().after("<div class='caja' id='classificationTaxonPath" + nclassificationTaxonPath + "' ><div class='caja2 classificationTaxonPath'><!--Source--><div class='caja' id='classificationSource" + nclassificationTaxonPath + "_" + nclassificationTaxon + "'><div class='caja2'><div class='titulo'>Fuente:</div><div class='input'><input id='inputclassificationSource" + nclassificationTaxonPath + "_" + nclassificationTaxon + "' name='classificationSource" + nclassificationTaxonPath + "_" + nclassificationTaxon + "' type='text' /></a><div class='dinput' > </div></div></div><div class='caja3'></div></div><fieldset class='caja2 subcategoria anidada2 ' ><legend>Taxon</legend><div class='caja' id='classificationTaxon" + nclassificationTaxonPath + "_" + nclassificationTaxon + "'>    <div class='caja2'> <!--Entry--> <div class='titulo'> <label> Id:</label> </div> <div class='input'> <input id='inputclassificationId" + nclassificationTaxonPath + "_" + nclassificationTaxon + "' name='classificationId" + nclassificationTaxonPath + "_" + nclassificationTaxon + "' type='text'/> <div class='dinput' ><b>Ejemplo:</b> 4.1.2</div> </div> </div> <div class='caja3'> </div>  <div class='caja2'><!--Entry--><div class='titulo'><label> "+entry+":</label></div><div class='input'><input id='inputclassificationEntry" + nclassificationTaxonPath + "_" + nclassificationTaxon + "' name='classificationEntry" + nclassificationTaxonPath + "_" + nclassificationTaxon + "' type='text'/><div class='dinput' ></div></div></div><div class='caja3'><span class='at'><a id='anadirclassificationTaxon' numero='" + nclassificationTaxonPath + "' cantidadTaxon='0' class='pointer' href='' value='' title='A&ntilde;adir'></a></span></div></div></fieldset></div><div class='caja3'><span class='qt qtclassificationTaxonPath' numero='" + nclassificationTaxonPath + "'><a id='quitarclassificationTaxonPath' class='pointer' href='' value='' title='A&ntilde;adir'></a></span></div></div><div class='caja3'></div>");
        vclassificationTaxonPath[nclassificationTaxonPath] = new Array(true);
    }
    function anadirclassificationEntry(n) {
        var i = nclassificationTaxon;

        nclassificationTaxon++;
        $('#classificationTaxon' + n + "_" + i + '').focus().after("<div class='caja' id='classificationTaxon" + n + "_" + nclassificationTaxon + "'><div class='caja2'><!--Entry--><div class='titulo'><label> "+entry+":</label></div><div class='input'><input id='inputclassificationEntry" + n + "_" + nclassificationTaxon + "' name='classificationEntry" + n + "_" + nclassificationTaxon + "' type='text'/><div class='dinput' ></div></div></div><div class='caja3'><span class='qt qtclassificationTaxon" + n + "_" + nclassificationTaxon + " qtTaxon' numero='" + n + "' cantidadTaxon='" + nclassificationTaxon + "'><a id='quitarclassificationTaxon" + n + "' class='pointer' href='' value='' title='"+quit+"'></a></span></div></div>");
        vclassificationTaxonPath[n][nclassificationTaxonPath] = true;
    }

    function anadirclassificationKeyword() {
        var i = nclassificationKeyword;
        nclassificationKeyword++;
        $("#classificationKeyword" + i + "").focus().after("<div class='caja' id='classificationKeyword" + nclassificationKeyword + "'><div class='caja2'><div class='titulo'>"+keywords+":</div><div class='input'><input id='inputclassificationKeyword" + nclassificationKeyword + "' name='classificationKeyword" + nclassificationKeyword + "' type='text'/><div class='dinput' > </div></div></div><div class='caja3'><span class='qt qtclassificationKeyword' numero='" + nclassificationKeyword + "'><a id='quitarclassificationKeyword' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
        vclassificationKeyword[nclassificationKeyword] = true;
    }





    $("ul.tabs li").click(function() {
        var flag = false;
        if (!$('#tab1').is(':hidden')) {

            $("#tab1 input,#tab1 select,#tab1 textarea").each(function() {
                //alert($(this).attr("name"));
                $(".err").remove();
                if ($(this).hasClass("req")) {
                    if ($(this).val() == "" || $(this).val() == "none") {
                        $(this).focus().after("<span class='err'>Campo Obligatorio</span>");
                        flag = true;
                        return false;
                    }
                }
            })
            if (flag)
                return false;
        }
        else if (!$('#tab2').is(':hidden')) {
            $("#tab2 input,#tab2 select").each(function() {
                $(".err").remove();
                if ($(this).hasClass("req")) {
                    if ($(this).val() == "" || $(this).val() == "none") {
                        $(this).focus().after("<span class='err'>Campo Obligatorio</span>");
                        flag = true;
                        return false;
                    }
                }
            })
            if (flag)
                return false;
        }
        else if (!$('#tab3').is(':hidden')) {
            $("#tab3 input,#tab3 select").each(function() {
                $(".err").remove();
                if ($(this).hasClass("req")) {
                    if ($(this).val() == "" || $(this).val() == "none") {
                        $(this).focus().after("<span class='err'>Campo Obligatorio</span>");
                        flag = true;
                        return false;
                    }
                }
            })
            if (flag)
                return false;
        }
        else if (!$('#tab4').is(':hidden')) {
            $("#tab4 input,#tab4 select").each(function() {
                $(".err").remove();
                if ($(this).hasClass("req")) {
                    if ($(this).val() == "" || $(this).val() == "none") {
                        $(this).focus().after("<span class='err'>Campo Obligatorio</span>");
                        flag = true;
                        return false;
                    }
                }
            })
            if (flag)
                return false;
        }
        else if (!$('#tab5').is(':hidden')) {
            $("#tab5 input,#tab5 select,#tab5 textarea").each(function() {
                $(".err").remove();
                if ($(this).hasClass("req")) {
                    if ($(this).val() == "" || $(this).val() == "none") {
                        $(this).focus().after("<span class='err'>Campo Obligatorio</span>");
                        flag = true;
                        return false;
                    }
                }
            })
            if (flag)
                return false;
        }
        else if (!$('#tab6').is(':hidden')) {
            $("#tab6 input,#tab6 select,#tab6 textarea").each(function() {
                $(".err").remove();
                if ($(this).hasClass("req")) {
                    if ($(this).val() == "" || $(this).val() == "none") {
                        $(this).focus().after("<span class='err'>Campo Obligatorio</span>");
                        flag = true;
                        return false;
                    }
                }
            })
            if (flag)
                return false;
        }
        else if (!$('#tab7').is(':hidden')) {
            $("#tab7 input,#tab7 select").each(function() {
                $(".err").remove();
                if ($(this).hasClass("req")) {
                    if ($(this).val() == "" || $(this).val() == "none") {
                        $(this).focus().after("<span class='err'>Campo Obligatorio</span>");
                        flag = true;
                        return false;
                    }
                }
            })
            if (flag)
                return false;
        }
        else if (!$('#tab8').is(':hidden')) {
            $("#tab8 input,#tab8 select,#tab1 textarea").each(function() {
                $(".err").remove();
                if ($(this).hasClass("req")) {
                    if ($(this).val() == "" || $(this).val() == "none") {
                        $(this).focus().after("<span class='err'>Campo Obligatorio</span>");
                        flag = true;
                        return false;
                    }
                }
            })
            if (flag)
                return false;
        }
        else if (!$('#tab9').is(':hidden')) {
            $("#tab9 input,#tab9 select").each(function() {
                $(".err").remove();
                if ($(this).hasClass("req")) {
                    if ($(this).val() == "" || $(this).val() == "none") {
                        $(this).focus().after("<span class='err'>Campo Obligatorio</span>");
                        flag = true;
                        return false;
                    }
                }
            })
            if (flag)
                return false;
        }

        /* $(".err").remove();
         if($("#generalCatalog").hasClass("req")){
         if( $("#generalCatalog").val() == "" ){
         $("#generalCatalog").focus().after("<span class='err'>Campo Obligatorio</span>");
         return false;
         
         
         }  }*/

        $("ul.tabs li").removeClass("active");
        $(this).addClass("visitado");
        $(this).addClass("active");

        $(".tab_content").hide();
        var activeTab = $(this).find("a").attr("href");

        $(activeTab).fadeIn();

        return false;
    });
    $(".bs").click(function() {

        var flag = false;
        if (!$('#tab1').is(':hidden')) {

            $("#tab1 input,#tab1 select,#tab1 textarea").each(function() {
                $(".err").remove();
                if ($(this).hasClass("req")) {
                    if ($(this).val() == "" || $(this).val() == "none") {
                        $(this).focus().after("<span class='err'>Campo Obligatorio</span>");
                        flag = true;
                        return false;
                    }
                }
            })
            if (flag)
                return false;
        }
        else if (!$('#tab2').is(':hidden')) {
            $("#tab2 input,#tab2 select").each(function() {
                $(".err").remove();
                if ($(this).hasClass("req")) {
                    if ($(this).val() == "" || $(this).val() == "none") {
                        $(this).focus().after("<span class='err'>Campo Obligatorio</span>");
                        flag = true;
                        return false;
                    }
                }
            })
            if (flag)
                return false;
        }
        else if (!$('#tab3').is(':hidden')) {
            $("#tab3 input,#tab3 select").each(function() {
                $(".err").remove();
                if ($(this).hasClass("req")) {
                    if ($(this).val() == "" || $(this).val() == "none") {
                        $(this).focus().after("<span class='err'>Campo Obligatorio</span>");
                        flag = true;
                        return false;
                    }
                }
            })
            if (flag)
                return false;
        }
        else if (!$('#tab4').is(':hidden')) {
            $("#tab4 input,#tab4 select").each(function() {
                $(".err").remove();
                if ($(this).hasClass("req")) {
                    if ($(this).val() == "" || $(this).val() == "none") {
                        $(this).focus().after("<span class='err'>Campo Obligatorio</span>");
                        flag = true;
                        return false;
                    }
                }
            })
            if (flag)
                return false;
        }
        else if (!$('#tab5').is(':hidden')) {
            $("#tab5 input,#tab5 select,#tab5 textarea").each(function() {
                $(".err").remove();
                if ($(this).hasClass("req")) {
                    if ($(this).val() == "" || $(this).val() == "none") {
                        $(this).focus().after("<span class='err'>Campo Obligatorio</span>");
                        flag = true;
                        return false;
                    }
                }
            })
            if (flag)
                return false;
        }
        else if (!$('#tab6').is(':hidden')) {
            $("#tab6 input,#tab6 select,#tab6 textarea").each(function() {
                $(".err").remove();
                if ($(this).hasClass("req")) {
                    if ($(this).val() == "" || $(this).val() == "none") {
                        $(this).focus().after("<span class='err'>Campo Obligatorio</span>");
                        flag = true;
                        return false;
                    }
                }
            })
            if (flag)
                return false;
        }
        else if (!$('#tab7').is(':hidden')) {
            $("#tab7 input,#tab7 select").each(function() {
                $(".err").remove();
                if ($(this).hasClass("req")) {
                    if ($(this).val() == "" || $(this).val() == "none") {
                        $(this).focus().after("<span class='err'>Campo Obligatorio</span>");
                        flag = true;
                        return false;
                    }
                }
            })
            if (flag)
                return false;
        }
        else if (!$('#tab8').is(':hidden')) {
            $("#tab8 input,#tab8 select,#tab1 textarea").each(function() {
                $(".err").remove();
                if ($(this).hasClass("req")) {
                    if ($(this).val() == "" || $(this).val() == "none") {
                        $(this).focus().after("<span class='err'>Campo Obligatorio</span>");
                        flag = true;
                        return false;
                    }
                }
            })
            if (flag)
                return false;
        }
        else if (!$('#tab9').is(':hidden')) {
            $("#tab9 input,#tab9 select").each(function() {
                $(".err").remove();
                if ($(this).hasClass("req")) {
                    if ($(this).val() == "" || $(this).val() == "none") {
                        $(this).focus().after("<span class='err'>Campo Obligatorio</span>");
                        flag = true;
                        return false;
                    }
                }
            })
            if (flag)
                return false;
        }

        $("ul.tabs li").removeClass("active");
        var marcar_visitado = $(this).attr("asd");
        $(marcar_visitado).addClass("visitado");
        $(marcar_visitado).addClass("active");
        var pagina = $(this).attr("href");
        $(".tab_content").hide();

        $(pagina).fadeIn();
        // $(pagina).slideDown("slow");
    });

    $(".descripcion").click(function() {
        $(".err").remove();

        //alert($(this).attr("id"));
        if ($(this).attr("id") == "desgeneralCatalog") {
            $(this).focus().after("<span class='err'>"+helpGeneralCatalog+"</span>");
        }
        else if ($(this).attr("id") == "desgeneralEntry") {
            $(this).focus().after("<span class='err'>"+helpGeneralEntry+"</span>");
        }
        else if ($(this).attr("id") == "desgeneralTitle") {
            $(this).focus().after("<span class='err'>"+helpGeneralTitle+"</span>");
        }
        else if ($(this).attr("id") == "desgeneralLanguage") {
            $(this).focus().after("<span class='err'>"+helpGeneralLanguage+"</span>");
        }
        else if ($(this).attr("id") == "desgeneralDescription") {
            $(this).focus().after("<span class='err'>"+helpGeneralDescription+"</span>");
        }
        else if ($(this).attr("id") == "desgeneralKeyword") {
            $(this).focus().after("<span class='err'>"+helpGeneralKeyword+"</span>");
        }
        else if ($(this).attr("id") == "desgeneralCoverage") {
            $(this).focus().after("<span class='err'>"+helpGeneralCoverage+"</span>");
        }
        else if ($(this).attr("id") == "desgeneralStructure") {
            $(this).focus().after("<span class='err'>"+helpGeneralStructure+"</span>");
        }
        else if ($(this).attr("id") == "desgeneralAggregationLevel") {
            $(this).focus().after("<span class='err'>"+helpGeneralAggregationLevel+"</span>");
        }
        else if ($(this).attr("id") == "deslifeCycleVersion") {
            $(this).focus().after("<span class='err'>"+helpLifeCycleVersion+"</span>");
        }
        else if ($(this).attr("id") == "deslifeCycleStatus") {
            $(this).focus().after("<span class='err'>"+helpLifeCycleStatus+"</span>");
        }
        else if ($(this).attr("id") == "deslifeCycleRole") {
            $(this).focus().after("<span class='err'>"+helpLifeCycleRol+"</span>");
        }
        else if ($(this).attr("id") == "deslifeCycleEntity") {
            $(this).focus().after("<span class='err'>"+helpLifeCycleEntity+"</span>");
        }
        else if ($(this).attr("id") == "deslifeCycleDate") {
            $(this).focus().after("<span class='err'>"+helpLifeCycleDate+"</span>");
        }
        else if ($(this).attr("id") == "desmetaMetadataCatalog") {
            $(this).focus().after("<span class='err'>"+helpMetadataCatalog+"</span>");
        }
        else if ($(this).attr("id") == "desmetaMetadataEntry") {
            $(this).focus().after("<span class='err'>"+helpMetadataEntry+"</span>");
        }
        else if ($(this).attr("id") == "desmetaMetadataRole") {
            $(this).focus().after("<span class='err'>"+helpMetadataRol+"</span>");
        }
        else if ($(this).attr("id") == "desmetaMetadataEntity") {
            $(this).focus().after("<span class='err'>"+helpMetadataEntity+"</span>");
        }
        else if ($(this).attr("id") == "desmetaMetadataDate") {
            $(this).focus().after("<span class='err'>"+helpMetadataDate+"</span>");
        }
        else if ($(this).attr("id") == "desmetaMetadataMetadataSchema") {
            $(this).focus().after("<span class='err'>"+helpMetadataSchema+"</span>");
        }
        else if ($(this).attr("id") == "desmetaMetadataLanguage") {
            $(this).focus().after("<span class='err'>"+helpMetadataLanguage+"</span>");
        }
        else if ($(this).attr("id") == "destechnicalFormat") {
            $(this).focus().after("<span class='err'>"+helpTechnicalFormat+"</span>");
        }
        else if ($(this).attr("id") == "destechnicalSize") {
            $(this).focus().after("<span class='err'>"+helpTechnicalSize+"</span>");
        }
        else if ($(this).attr("id") == "destechnicalLocation") {
            $(this).focus().after("<span class='err'>"+helpTechnicalUbiety+"</span>");
        }
        else if ($(this).attr("id") == "destechnicalType") {
            $(this).focus().after("<span class='err'>"+helpTechnicalType+"</span>");
        }
        else if ($(this).attr("id") == "destechnicalName") {
            $(this).focus().after("<span class='err'>"+helpTechnicalName+"</span>");
        }
        else if ($(this).attr("id") == "destechnicalMinimumVersion") {
            $(this).focus().after("<span class='err'>"+helpTechnicalMinimumVersion+"</span>");
        }
        else if ($(this).attr("id") == "destechnicalMaximumVersion") {
            $(this).focus().after("<span class='err'>"+helpTechnicalMaximumVersion+"</span>");
        }
        else if ($(this).attr("id") == "destechnicalInstallationRemarks") {
            $(this).focus().after("<span class='err'>"+helpTechnicalInstallationRemarks+"</span>");
        }
        else if ($(this).attr("id") == "destechnicalOtherPlatformRequirements") {
            $(this).focus().after("<span class='err'>"+helpTechnicalOtherPlatformRequirements+"</span>");
        }
        else if ($(this).attr("id") == "destechnicalDuration") {
            $(this).focus().after("<span class='err'>"+helpTechnicalDuration+"</span>");
        }
        else if ($(this).attr("id") == "deseducationalInteractivityType") {
            $(this).focus().after("<span class='err'>"+helpLearningInteractivityType+"</span>");
        }
        else if ($(this).attr("id") == "deseducationalLearningResourceType") {
            $(this).focus().after("<span class='err'>"+helpLearningResourceType+"</span>");
        }
        else if ($(this).attr("id") == "deseducationalInteractivityLevel") {
            $(this).focus().after("<span class='err'>"+helpLearningInteractivityLevel+"</span>");
        }
        else if ($(this).attr("id") == "deseducationalSemanticDensity") {
            $(this).focus().after("<span class='err'>"+helpLearningSemanticDensity+"</span>");
        }
        else if ($(this).attr("id") == "deseducationalIntendedEndUserRole") {
            $(this).focus().after("<span class='err'>"+helpLearningIntendedEndUserRole+"</span>");
        }
        else if ($(this).attr("id") == "deseducationalContext") {
            $(this).focus().after("<span class='err'>"+helpLearningContext+"</span>");
        }
        else if ($(this).attr("id") == "deseducationalTypicalAgeRange") {
            $(this).focus().after("<span class='err'>"+helpLearningTypicalAgeRange+"</span>");
        }
        else if ($(this).attr("id") == "deseducationalDifficulty") {
            $(this).focus().after("<span class='err'>"+helpLearningDifficulty+"</span>");
        }
        else if ($(this).attr("id") == "deseducationalTypicalLearningTime") {
            $(this).focus().after("<span class='err'>"+helpLearningTypicalLearningTime+"</span>");
        }
        else if ($(this).attr("id") == "deseducationalDescription") {
            $(this).focus().after("<span class='err'>"+helpLearningDescription+"</span>");
        }
        else if ($(this).attr("id") == "deseducationalLanguage") {
            $(this).focus().after("<span class='err'>"+helpLearningLanguage+"</span>");
        }
        else if ($(this).attr("id") == "desrightsCost") {
            $(this).focus().after("<span class='err'>"+helpRightsCost+"</span>");
        }
        else if ($(this).attr("id") == "desrightsCopyrightandOtherRestrictions") {
            $(this).focus().after("<span class='err'>"+helpRightsCopyrightAndOtherRestrictions+"</span>");
        }
        else if ($(this).attr("id") == "desrightsDescription") {
            $(this).focus().after("<span class='err'>"+helpRightsDescription+"</span>");
        }
        else if ($(this).attr("id") == "desrelationKind") {
            $(this).focus().after("<span class='err'>"+helpRelationKind+"</span>");
        }
        else if ($(this).attr("id") == "desrelationCatalog") {
            $(this).focus().after("<span class='err'>"+helpRelationCatalog+"</span>");
        }
        else if ($(this).attr("id") == "desrelationEntry") {
            $(this).focus().after("<span class='err'>"+helpRelationEntry+"</span>");
        }
        else if ($(this).attr("id") == "desrelationDescription") {
            $(this).focus().after("<span class='err'>"+helpRelationDescription+"</span>");
        }
        else if ($(this).attr("id") == "desannotationEntity") {
            $(this).focus().after("<span class='err'>"+helpAnnotationEntity+"</span>");
        }
        else if ($(this).attr("id") == "desannotationDate") {
            $(this).focus().after("<span class='err'>"+helpAnnotationDate+"</span>");
        }
        else if ($(this).attr("id") == "desannotationDescription") {
            $(this).focus().after("<span class='err'>"+helpAnnotationDescription+"</span>");
        }
        else if ($(this).attr("id") == "desclassificationPurpose") {
            $(this).focus().after("<span class='err'>"+helpClassificationPurpose+"</span>");
        }
        else if ($(this).attr("id") == "desclassificationSource") {
            $(this).focus().after("<span class='err'>"+helpClassificationSource+"</span>");
        }
        else if ($(this).attr("id") == "desclassificationTaxon") {
            $(this).focus().after("<span class='err'>Un término concreto dentro de la taxonomía. Un taxón es un nodo que tiene definida una etiqueta o término. Un taxón puede poseer también una identificación o designación alfanumérica para ser utilizada como referencia estandarizada. Tanto la etiqueta como la entrada, o ambos, pueden ser utilizados para identificar un taxón particular</span>");
        }
        else if ($(this).attr("id") == "desclassificationId") {
            $(this).focus().after("<span class='err'>"+helpClassificationId+"</span>");
        }
        else if ($(this).attr("id") == "desclassificationEntry") {
            $(this).focus().after("<span class='err'>"+helpClassificatioEntry+"</span>");
        }
        else if ($(this).attr("id") == "desclassificationDescription") {
            $(this).focus().after("<span class='err'>"+helpClassificationDescription+"</span>");
        }
        else if ($(this).attr("id") == "desclassificationKeyword") {
            $(this).focus().after("<span class='err'>"+helpClassificationKeywords+"</span>");
        }





        return false;
    });




    if (ver == "no") {
        /*Agregar generalIdentifier*/
        $("#anadirIdentifier").click(function() {
            var t = vgeneralIdentifier.length;
            ngeneralIdentifier++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (vgeneralIdentifier[i] == true) {
                    break;
                }
            }
            $("#Identifier" + i + "").after("<div class='caja' id='Identifier" + ngeneralIdentifier + "'><div class='caja2'><div class='titulo'><label >"+catalog+":</label></div><div class='input'><input id='inputgeneralCatalog" + ngeneralIdentifier + "' name='generalCatalog" + ngeneralIdentifier + "' type='text' /> <span class='nbc' n='" + ngeneralIdentifier + "'><span class='masnbc'></span>NBC </span> <div class='dinput'></div></div><div class='titulo'>"+entry+":</div><div class='input'><input id='inputgeneralEntry" + ngeneralIdentifier + "' name='generalEntry" + ngeneralIdentifier + "' type='text' /><div class='dinput'></div></div>    <div id='desplegableNbc" + ngeneralIdentifier + "' class='desplegableNbc'><div class='titulo'> Seleccione una entrada:</div><div class='input'><select id='Nbc" + ngeneralIdentifier + "' class='selectNbcArea' n='" + ngeneralIdentifier + "'><option>"+select+"</option><option value='01'>Agronomía, Veterinaria y afines</option><option value='02'>Bellas Artes</option><option value='03'>Ciencias de la Educación</option><option value='04'>Ciencias de la Salud</option><option value='05'>Ciencias Sociales y Humanas</option><option value='06'>Economía, Administración, Contaduría y afines</option><option value='07'>Ingeniería, Arquitectura, Urbanismo y afines</option><option value='08'>Matemáticas y Ciencias Naturales</option></select> </div><br/><div class='titulo'> </div><div class='input'><select id='sNbc" + ngeneralIdentifier + "' class='selectSubarea' n='" + ngeneralIdentifier + "'></select></div><br/><div class='titulo'> </div><div class='input'><select id='ssNbc" + ngeneralIdentifier + "' class='selectSubsubarea' n='" + ngeneralIdentifier + "'></select></div><div class='titulo'> </div><div class='input'><input class='enviarNbc' type='button' n='" + ngeneralIdentifier + "' value='"+accept+"'/> <input class='cancelarNbc' type='button' n='" + ngeneralIdentifier + "' value='Cancelar'/></div></div>   </div><div class='caja3'><span class='qt qtgeneralIdentifier'numero='" + ngeneralIdentifier + "'><a id='quitarIdentifier' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
            $("#desplegableNbc" + ngeneralIdentifier + "").hide();
            $("#generalCatalog" + ngeneralIdentifier + "").focus();
            vgeneralIdentifier[ngeneralIdentifier] = true;
            return false;
        });

        /*Eliminar generalIdentifier*/
        $(".qtgeneralIdentifier").live("click", function() {
            var pos = $(this).attr("numero");
            $("#Identifier" + pos).remove();
            vgeneralIdentifier[pos] = false;
            return false;
        });





        /*Agregar generalLanguage*/
        $("#anadirLanguage").click(function() {
            var t = vgeneralLanguage.length;
            ngeneralLanguage++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (vgeneralLanguage[i] == true) {
                    break;
                }
            }
            $("#Language" + i + "").focus().after("<div class='caja' id='Language" + ngeneralLanguage + "'><div class='caja2'><div class='titulo'>Idioma:</div><div class='input'><select id='inputgeneralLanguage" + ngeneralLanguage + "' name='generalLanguage" + ngeneralLanguage + "' ><option value='none'>"+select+"</option><option value='es'>Español</option><option value='en'>English</option><option value='pt'>Português</option><option value='fr'>French</option><option value='ru'>Russian</option><option value='ja'>Japanese</option><option value='la'>Latin</option><option value='aa'>Afar</option><option value='ab'>Abkhazian</option><option value='af'>Afrikaans</option><option value='am'>Amharic</option><option value='ar'>Arabic</option><option value='as'>Assamese</option><option value='ay'>Aymara</option><option value='az'>Azerbaijani</option><option value='ba'>Bashkir</option><option value='be'>Byelorussian</option><option value='bg'>Bulgarian</option><option value='bh'>Bihari</option><option value='bi'>Bislama</option><option value='bn'>Bengali;Bangla</option><option value='bo'>Tibetan</option><option value='br'>Breton</option><option value='ca'>Catalan</option><option value='co'>Corsican</option><option value='cs'>Czech</option><option value='cy'>Welsh</option><option value='da'>Danish</option><option value='de'>German</option><option value='dz'>Bhutani</option><option value='el'>Greek</option><option value='eo'>Esperanto</option><option value='et'>Estonian</option><option value='eu'>Basque</option><option value='fa'>Persian</option><option value='fi'>Finnish</option><option value='fj'>Fiji</option><option value='fo'>Faeroese</option><option value='fy'>Frisian</option><option value='ga'>Irish</option><option value='gd'>Scots</option><option value='gl'>Galician</option><option value='gn'>Guarani</option><option value='gu'>Gujarati</option><option value='ha'>Hausa</option><option value='hi'>Hindi</option><option value='hr'>Croatian</option><option value='hu'>Hungarian</option><option value='hy'>Armenian</option><option value='ia'>Interlingua</option><option value='ie'>Interlingue</option><option value='ik'>Inupiak</option><option value='in'>Indonesian</option><option value='is'>Icelandic</option><option value='it'>Italian</option><option value='iw'>Hebrew</option><option value='ji'>Yiddish</option><option value='jw'>Javanese</option><option value='ka'>Georgian</option><option value='kk'>Kazakh</option><option value='kl'>Greenlandic</option><option value='km'>Cambodian</option><option value='kn'>Kannada</option><option value='ko'>Korean</option><option value='ks'>Kashmiri</option><option value='ku'>Kurdish</option><option value='ky'>Kirghiz</option><option value='ln'>Lingala</option><option value='lo'>Laothian</option><option value='lt'>Lithuanian</option><option value='lv'>Latvian,Lettish</option><option value='mg'>Malagasy</option><option value='mi'>Maori</option><option value='mk'>Macedonian</option><option value='ml'>Malayalam</option><option value='mn'>Mongolian</option><option value='mo'>Moldavian</option><option value='mr'>Marathi</option><option value='ms'>Malay</option><option value='mt'>Maltese</option><option value='my'>Burmese</option><option value='na'>Nauru</option><option value='ne'>Nepali</option><option value='nl'>Dutch</option><option value='no'>Norwegian</option><option value='oc'>Occitan</option><option value='om'>(Afan)Oromo</option><option value='or'>Oriya</option><option value='pa'>Punjabi</option><option value='pl'>Polish</option><option value='ps'>Pashto,Pushto</option><option value='qu'>Quechua</option><option value='rm'>Rhaeto-Romance</option><option value='rn'>Kirundi</option><option value='ro'>Romanian</option><option value='rw'>Kinyarwanda</option><option value='sa'>Sanskrit</option><option value='sd'>Sindhi</option><option value='sg'>Sangro</option><option value='sh'>Serbo-Croatian</option><option value='si'>Singhalese</option><option value='sk'>Slovak</option><option value='sl'>Slovenian</option><option value='sm'>Samoan</option><option value='sn'>Shona</option><option value='so'>Somali</option><option value='sq'>Albanian</option><option value='sr'>Serbian</option><option value='ss'>Siswati</option><option value='st'>Sesotho</option><option value='su'>Sundanese</option><option value='sv'>Swedish</option><option value='sw'>Swahili</option><option value='ta'>Tamil</option><option value='te'>Tegulu</option><option value='tg'>Tajik</option><option value='th'>Thai</option><option value='ti'>Tigrinya</option><option value='tk'>Turkmen</option><option value='tl'>Tagalog</option><option value='tn'>Setswana</option><option value='to'>Tonga</option><option value='tr'>Turkish</option><option value='ts'>Tsonga</option><option value='tt'>Tatar</option><option value='tw'>Twi</option><option value='uk'>Ukrainian</option><option value='ur'>Urdu</option><option value='uz'>Uzbek</option><option value='vi'>Vietnamese</option><option value='vo'>Volapuk</option><option value='wo'>Wolof</option><option value='xh'>Xhosa</option><option value='yo'>Yoruba</option><option value='zh'>Chinese</option><option value='zu'>Zulu</option></select><div class='dinput' > </div></div></div><div class='caja3'><span class='qt qtgeneralLanguage' numero='" + ngeneralLanguage + "'><a id='quitarLanguage' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
            vgeneralLanguage[ngeneralLanguage] = true;

            return false;
        });

        /*Eliminar generalLanguage*/
        $(".qtgeneralLanguage").live("click", function() {
            var pos = $(this).attr("numero");
            $("#Language" + pos).remove();
            vgeneralLanguage[pos] = false;
            return false;
        });






        /*Agregar generalDescription*/
        $("#anadirDescription").click(function() {
            var t = vgeneralDescription.length;
            ngeneralDescription++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (vgeneralDescription[i] == true) {
                    break;
                }
            }
            $("#Description" + i + "").focus().after("<div class='caja' id='Description" + ngeneralDescription + "'><div class='caja2'><div class='titulo'>"+description+":</div><div class='input'><textarea id='inputgeneralDescription" + ngeneralDescription + "' name='generalDescription" + ngeneralDescription + "' type='textarea' ></textarea><div class='dinput' > </div></div></div><div class='caja3'><span class='qt qtgeneralDescription' numero='" + ngeneralDescription + "'><a id='quitargeneralDescription' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
            vgeneralDescription[ngeneralDescription] = true;
            return false;
        });

        /*Quitar Description*/
        $(".qtgeneralDescription").live("click", function() {
            var pos = $(this).attr("numero");
            $("#Description" + pos).remove();
            vgeneralDescription[pos] = false;
            return false;
        });





        /*Agregar generalKeyword*/
        $("#anadirKeyword").click(function() {
            var t = vgeneralKeyword.length;
            ngeneralKeyword++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (vgeneralKeyword[i] == true) {
                    break;
                }
            }
            $("#Keyword" + i + "").focus().after("<div class='caja' id='Keyword" + ngeneralKeyword + "'><div class='caja2'><div class='titulo'>"+keywords+":</div><div class='input'><input id='inputgeneralKeyword" + ngeneralKeyword + "' name='generalKeyword" + ngeneralKeyword + "' type='text' /><div class='dinput' >  </div></div></div><div class='caja3'><span class='qt qtgeneralKeyword' numero='" + ngeneralKeyword + "'><a id='quitargeneralKeyword' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
            vgeneralKeyword[ngeneralKeyword] = true;
            return false;
        });

        /*Eliminar generalKeyword*/
        $(".qtgeneralKeyword").live("click", function() {
            var pos = $(this).attr("numero");
            $("#Keyword" + pos).remove();
            vgeneralKeyword[pos] = false;
            return false;
        });




        /*Agregar  generalCoverage*/
        $("#anadirCoverage").click(function() {

            var t = vgeneralCoverage.length;
            ngeneralCoverage++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (vgeneralCoverage[i] == true) {
                    break;
                }
            }
            $("#Coverage" + i + "").focus().after("<div class='caja' id='Coverage" + ngeneralCoverage + "'><div class='caja2'><div class='titulo'>"+coverage+":</div><div class='input'><input id='inputgeneralCoverage" + ngeneralCoverage + "' name='generalCoverage" + ngeneralCoverage + "' type='text' /><div class='dinput' > </div></div></div><div class='caja3'><span class='qt qtgeneralCoverage' numero='" + ngeneralCoverage + "'><a id='quitargeneralCoverage' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
            vgeneralCoverage[ngeneralCoverage] = true;
            return false;
        });

        /*Elimina generalCoverage*/
        $(".qtgeneralCoverage").live("click", function() {
            var pos = $(this).attr("numero");
            $("#Coverage" + pos).remove();
            vgeneralCoverage[pos] = false;
            return false;
        });





        /*Agregar lifeCycleContribute*/
        $("#anadirContribute").click(function() {
            var t = vlifeCycleContribute.length;
            nlifeCycleContribute++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (vlifeCycleContribute[i][0] == true) {
                    break;
                }
            }
            nlifeCycleEntity = 0;
            $("#Contribute" + i + "").focus().after("<div class='caja' id='Contribute" + nlifeCycleContribute + "'><div class='caja2 classificationTaxonPath'><!--Role--><div class='caja' id='lifeCycleRole" + nlifeCycleContribute + "_" + nlifeCycleEntity + "'><div class='caja2'><div class='titulo'><label> "+role+":</label></div><div class='input'><select id='inputlifeCycleRole" + nlifeCycleContribute + "_" + nlifeCycleEntity + "' name='lifeCycleRole" + nlifeCycleContribute + "_" + nlifeCycleEntity + "'><option value='none'>"+select+"</option><option value='1'>"+role1+"</option><option value='2'>"+role2+"</option><option value='3'>"+role3+"</option><option value='4'>"+role4+"</option><option value='5'>"+role5+"</option><option value='6'>"+role6+"</option><option value='7'>"+role7+"</option><option value='8'>"+role8+"</option><option value='9'>"+role9+"</option><option value='10'>"+role10+"</option><option value='11'>"+role11+"</option><option value='12'>"+role12+"</option><option value='13'>"+role13+"</option><option value='14'>"+role14+"</option></select><div class='dinput' ></div></div></div></div><div class='caja' id='lifeCycleEntity" + nlifeCycleContribute + "_" + nlifeCycleEntity + "'><div class='caja2'><div class='titulo'><label > "+entity+":</label></div><div class='input'><input id='inputlifeCycleEntity" + nlifeCycleContribute + "_" + nlifeCycleEntity + "' name='lifeCycleEntity" + nlifeCycleContribute + "_" + nlifeCycleEntity + "' type='text'/><div class='dinput'></div></div></div><div class='caja3'><span class='at'><a id='anadirlifeCycleEntity' numero='" + nlifeCycleContribute + "' cantidadEntity='0' class='pointer' href='' value='' title='A&ntilde;adir'></a></span></div></div><div class='caja' id='tecnicalDate" + nlifeCycleContribute + "_" + nlifeCycleEntity + "'><div class='caja2'><div class='titulo'><label >"+date+":</label></div><div class='input'><input id='inputlifeCycleDate" + nlifeCycleContribute + "_" + nlifeCycleEntity + "' class='date' name='lifeCycleDate" + nlifeCycleContribute + "_" + nlifeCycleEntity + "' type='text'/><div class='dinput'></div></div></div></div></div><div class='caja3'><span class='qt qtlifeCycleContribute' numero='" + nlifeCycleContribute + "'><a id='quitarlifeCycleContribute' class='pointer' href='' value='' title='A&ntilde;adir'></a></span></div></div><div class='caja3'></div>");
            vlifeCycleContribute[nlifeCycleContribute] = new Array(true);
            return false;
        });

        /*Elimina lifeCycleContribute*/
        $(".qtlifeCycleContribute").live("click", function() {
            var pos = $(this).attr("numero");
            $("#Contribute" + pos).remove();
            vlifeCycleContribute[pos][0] = false;
            return false;
        });





        /*Agregar lifeCycleEntity*/
        $("#anadirlifeCycleEntity").live("click", function() {

            var n = $(this).attr("numero");

            var t = vlifeCycleContribute[n].length;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (vlifeCycleContribute[n][i] == true) {
                    break;
                }
            }
            nlifeCycleEntity = t;
            $('#lifeCycleEntity' + n + "_" + i + '').focus().after("<div class='caja' id='lifeCycleEntity" + n + "_" + nlifeCycleEntity + "'><div class='caja2'><div class='titulo'><label > "+entity+":</label></div><div class='input'><input id='inputlifeCycleEntity" + n + "_" + nlifeCycleEntity + "' name='lifeCycleEntity" + n + "_" + nlifeCycleEntity + "' type='text'/><div class='dinput'> <br/></div></div></div><div class='caja3'><span class='qt qtlifeCycleEntity" + n + "_" + nlifeCycleEntity + " qtEntity' numero='" + n + "' cantidadEntity='" + nlifeCycleEntity + "'><a id='quitarlifeCycleEntity" + n + "' class='pointer' href='' value='' title='A&ntilde;adir'></a></span></div></div>");
            vlifeCycleContribute[n][nlifeCycleEntity] = true;
            return false;

        });
        /*Quitar lifeCycleEntity*/
        $(".qtEntity").live("click", function() {
            var a = $(this).attr("numero");
            var b = $(this).attr("cantidadEntity");

            $("#lifeCycleEntity" + a + "_" + b + "").remove();
            vlifeCycleContribute[a][b] = false;
            return false;
        });










        /*Agregar metaMetadataIdentifier*/
        $("#anadirmetaMetadataIdentifier").click(function() {
            var t = vmetaMetadataIdentifier.length;
            nmetaMetadataIdentifier++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (vmetaMetadataIdentifier[i] == true) {
                    break;
                }
            }
            $("#metaMetadataIdentifier" + i + "").focus().after("<div class='caja' id='metaMetadataIdentifier" + nmetaMetadataIdentifier + "'><div class='caja2'><div class='titulo'><label >"+catalog+":</label></div><div class='input'><input id='inputmetaMetadataCatalog" + nmetaMetadataIdentifier + "' name='metaMetadataCatalog" + nmetaMetadataIdentifier + "' type='text' /><div class='dinput'></div></div><div class='titulo'>"+entry+":</div><div class='input'><input id='inputmetaMetadataEntry" + nmetaMetadataIdentifier + "' name='metaMetadataEntry" + nmetaMetadataIdentifier + "' type='text' /><div class='dinput'>Ejemplo: KUL532</div></div></div><div class='caja3'><span class='qt qtmetaMetadataIdentifier' numero='" + nmetaMetadataIdentifier + "'><a id='quitarmetaMetadataIdentifier' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
            vmetaMetadataIdentifier[nmetaMetadataIdentifier] = true;
            return false;
        });

        /*Elimina metaMetadataIdentifier*/
        $(".qtmetaMetadataIdentifier").live("click", function() {
            var pos = $(this).attr("numero");
            $("#metaMetadataIdentifier" + pos).remove();
            vmetaMetadataIdentifier[pos] = false;
            return false;
        });

        /*Agregar metaMetadataContribute*/
        $("#anadirmetaMetadataContribute").click(function() {
            var t = vmetaMetadataContribute.length;
            nmetaMetadataContribute++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (vmetaMetadataContribute[i][0] == true) {
                    break;
                }
            }
            nmetaMetadataEntity = 0;
            $("#metaMetadataContribute" + i + "").focus().after("<div class='caja' id='metaMetadataContribute" + nmetaMetadataContribute + "'><div class='caja2 classificationTaxonPath'><!--Role--><div class='caja' id='metaMetadataRole" + nmetaMetadataContribute + "_" + nmetaMetadataEntity + "'><div class='caja2'><div class='titulo'><label> "+role+":</label></div><div class='input'><select id='inputmetaMetadataRole" + nmetaMetadataContribute + "_" + nmetaMetadataEntity + "' name='metaMetadataRole" + nmetaMetadataContribute + "_" + nmetaMetadataEntity + "'>  <option value='none'>"+select+"</option><option value='1'>creador</option><option value='2'>revisor</option>  </select><div class='dinput' ></div></div></div></div><div class='caja' id='metaMetadataEntity" + nmetaMetadataContribute + "_" + nmetaMetadataEntity + "'><div class='caja2'><div class='titulo'><label > "+entity+":</label></div><div class='input'><input id='inputmetaMetadataEntity" + nmetaMetadataContribute + "_" + nmetaMetadataEntity + "' name='metaMetadataEntity" + nmetaMetadataContribute + "_" + nmetaMetadataEntity + "' type='text'/><div class='dinput'></div></div></div><div class='caja3'><span class='at'><a id='anadirmetaMetadataEntity' numero='" + nmetaMetadataContribute + "' cantidadEntity='0' class='pointer' href='' value='' title='A&ntilde;adir'></a></span></div></div><div class='caja' id='tecnicalDate" + nmetaMetadataContribute + "_" + nmetaMetadataEntity + "'><div class='caja2'><div class='titulo'><label >"+date+":</label></div><div class='input'><input id='inputmetaMetadataDate" + nmetaMetadataContribute + "_" + nmetaMetadataEntity + "' class='date' name='metaMetadataDate" + nmetaMetadataContribute + "_" + nmetaMetadataEntity + "' type='text'/><div class='dinput'></div></div></div></div></div><div class='caja3'><span class='qt qtmetaMetadataContribute' numero='" + nmetaMetadataContribute + "'><a id='quitarmetaMetadataContribute' class='pointer' href='' value='' title='A&ntilde;adir'></a></span></div></div><div class='caja3'></div>");
            vmetaMetadataContribute[nmetaMetadataContribute] = new Array(true);
            return false;
        });

        /*Elimina metaMetadataContribute*/
        $(".qtmetaMetadataContribute").live("click", function() {
            var pos = $(this).attr("numero");
            $("#metaMetadataContribute" + pos).remove();
            vmetaMetadataContribute[pos][0] = false;
            return false;
        });





        /*Agregar metaMetadataEntity*/
        $("#anadirmetaMetadataEntity").live("click", function() {

            var n = $(this).attr("numero");

            var t = vmetaMetadataContribute[n].length;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (vmetaMetadataContribute[n][i] == true) {
                    break;
                }
            }
            nmetaMetadataEntity = t;
            $('#metaMetadataEntity' + n + "_" + i + '').focus().after("<div class='caja' id='metaMetadataEntity" + n + "_" + nmetaMetadataEntity + "'><div class='caja2'><div class='titulo'><label > "+entity+":</label></div><div class='input'><input id='inputmetaMetadataEntity" + n + "_" + nmetaMetadataEntity + "' name='metaMetadataEntity" + n + "_" + nmetaMetadataEntity + "' type='text'/><div class='dinput'></div></div></div><div class='caja3'><span class='qt qtmetaMetadataEntity" + n + "_" + nmetaMetadataEntity + " qtmetaMetadaEntity' numero='" + n + "' cantidadEntity='" + nmetaMetadataEntity + "'><a id='quitarmetaMetadataEntity" + n + "' class='pointer' href='' value='' title='A&ntilde;adir'></a></span></div></div>");
            vmetaMetadataContribute[n][nmetaMetadataEntity] = true;
            return false;
        });
        /*Quitar metaMetadataEntity*/
        $(".qtmetaMetadaEntity").live("click", function() {
            var a = $(this).attr("numero");
            var b = $(this).attr("cantidadEntity");

            $("#metaMetadataEntity" + a + "_" + b + "").remove();
            vmetaMetadataContribute[a][b] = false;
            return false;
        });





        /*Agregar metaMetadataMetadataSchema*/
        $("#anadirmetaMetadataMetadataSchema").click(function() {
            var t = vmetaMetadataMetadataSchema.length;
            nmetaMetadataMetadataSchema++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (vmetaMetadataMetadataSchema[i] == true) {
                    break;
                }
            }
            $("#metaMetadataMetadataSchema" + i + "").focus().after("<div class='caja' id='metaMetadataMetadataSchema" + nmetaMetadataMetadataSchema + "'><div class='caja2'><div class='titulo'>"+metadataSchema+":</div><div class='input'><input id='inputmetaMetadataMetadataSchema" + nmetaMetadataMetadataSchema + "' name='metaMetadataMetadataSchema" + nmetaMetadataMetadataSchema + "' type='text' /><div class='dinput' >   </div></div></div><div class='caja3'><span class='qt qtmetaMetadataMetadataSchema' numero='" + nmetaMetadataMetadataSchema + "'><a id='quitarmetaMetadataMetadataSchema' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
            vmetaMetadataMetadataSchema[nmetaMetadataMetadataSchema] = true
            return false;
        });

        /*Elimina metaMetadataMetadataSchema*/
        $(".qtmetaMetadataMetadataSchema").live("click", function() {
            var pos = $(this).attr("numero");
            $("#metaMetadataMetadataSchema" + pos).remove();
            vmetaMetadataMetadataSchema[pos] = false;
            return false;
        });




        /*Agregar technicalFormat*/
        $("#anadirtechnicalFormat").click(function() {
            var t = vtechnicalFormat.length;
            ntechnicalFormat++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (vtechnicalFormat[i] == true) {
                    break;
                }
            }
            $("#technicalFormat" + i + "").focus().after("<div class='caja' id='technicalFormat" + ntechnicalFormat + "'><div class='caja2'><div class='titulo'>Formato:</div><div class='input'><input id='inputtechnicalFormat" + ntechnicalFormat + "' name='technicalFormat" + ntechnicalFormat + "' type='text'/><div class='dinput' > </div></div></div><div class='caja3'><span class='qt qttechnicalFormat' numero='" + ntechnicalFormat + "'><a id='quitartechnicalFormat' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
            vtechnicalFormat[ntechnicalFormat] = true
            return false;
        });

        /*Elimina technicalFormat*/
        $(".qttechnicalFormat").live("click", function() {
            var pos = $(this).attr("numero");
            $("#technicalFormat" + pos).remove();
            vtechnicalFormat[pos] = false;
            return false;
        });




        /*Agregar technicalLocation*/
        $("#anadirtechnicalLocation").click(function() {
            var t = vtechnicalLocation.length;
            ntechnicalLocation++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (vtechnicalLocation[i] == true) {
                    break;
                }
            }
            $("#technicalLocation" + i + "").focus().after("<div class='caja' id='technicalLocation" + ntechnicalLocation + "'><div class='caja2'><div class='titulo'>Localización:</div><div class='input'><input id='inputtechnicalLocation" + ntechnicalLocation + "' name='technicalLocation" + ntechnicalLocation + "' type='text'><div class='dinput' > </div></div></div><div class='caja3'><span class='qt qttechnicalLocation' numero='" + ntechnicalLocation + "'><a id='quitartechnicalLocation' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
            vtechnicalLocation[ntechnicalLocation] = true
            return false;
        });

        /*Elimina technicalLocation*/
        $(".qttechnicalLocation").live("click", function() {
            var pos = $(this).attr("numero");
            $("#technicalLocation" + pos).remove();
            vtechnicalLocation[pos] = false;
            return false;
        });




        /*Agregar technicalRequirement*/
        $("#anadirtechnicalRequirement").click(function() {
            var t = vtechnicalRequirement.length;
            ntechnicalRequirement++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (vtechnicalRequirement[i][0] == true) {
                    break;
                }
            }

            ntechnicalOrComposite = 0;
            $("#technicalRequirement" + i + "").focus().after("<div class='caja' id='technicalRequirement" + ntechnicalRequirement + "' ><fieldset class='caja2 subcategoria anidada2 ' ><legend>Composición</legend><div id='technicalOrComposite" + ntechnicalRequirement + "_" + ntechnicalOrComposite + "' class='caja' ><div class='caja2'><!--Type--><div class='titulo'><label> Tipo:</label></div><div class='input'><select id='inputtechnicalType" + ntechnicalRequirement + "_" + ntechnicalOrComposite + "'+ name='technicalType" + ntechnicalRequirement + "_" + ntechnicalOrComposite + "'><option value='none'>"+select+"</option><option value='1'>sistema operativo</option><option value='2'>navegador</option></select><div class='dinput' ></div></div><!--Name--><div class='titulo'><label> Nombre:</label></div><div class='input'><input id='inputtechnicalName" + ntechnicalRequirement + "_" + ntechnicalOrComposite + "' name='technicalName" + ntechnicalRequirement + "_" + ntechnicalOrComposite + "' type='text'/><div class='dinput' ></div></div><!--Minimum Version--><div class='titulo'><label> Versión Mínima:</label></div><div class='input'><input id='inputtechnicalMinimumVersion" + ntechnicalRequirement + "_" + ntechnicalOrComposite + "' name='technicalMinimumVersion" + ntechnicalRequirement + "_" + ntechnicalOrComposite + "' type='text'/><div class='dinput' ></div></div><!--Maximum Version--><div class='titulo'><label> Versión Máxima:</label></div><div class='input'><input id='inputtechnicalMaximumVersion" + ntechnicalRequirement + "_" + ntechnicalOrComposite + "' name='technicalMaximumVersion" + ntechnicalRequirement + "_" + ntechnicalOrComposite + "' type='text'/><div class='dinput' ></div></div></div><div class='caja3'><span class='at'><a id='anadirtechnicalOrComposite' numero='" + ntechnicalRequirement + "' cantidadOrComposite='0' class='pointer' href='' value='' title='A&ntilde;adir'></a></span></div></div></fieldset><div class='caja3'><span class='qt qttechnicalRequirement' numero='" + ntechnicalRequirement + "'><a id='quitartechnicalRequirement' class='pointer' href='' value='' title='"+quit+"'></a></span></div></div>");

            vtechnicalRequirement[ntechnicalRequirement] = new Array(true);

            return false;
        });
        /*Eliminar technicalRequirement*/
        $(".qttechnicalRequirement").live("click", function() {
            var pos = $(this).attr("numero");
            $("#technicalRequirement" + pos).remove();
            vtechnicalRequirement[pos][0] = false;
            return false;
        });





        /*Agregar technicalOrComposite*/
        $("#anadirtechnicalOrComposite").live("click", function() {
            var n = $(this).attr("numero");
            var t = vtechnicalRequirement[n].length;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (vtechnicalRequirement[n][i] == true) {
                    break;
                }
            }
            ntechnicalOrComposite = t;
            $('#technicalOrComposite' + n + "_" + i + '').focus().after("<div class='caja' id='technicalOrComposite" + n + "_" + ntechnicalOrComposite + "' ><div class='caja2'><!--Type--><div class='titulo'><label> Tipo:</label></div><div class='input'><select id='inputtechnicalType" + n + "_" + ntechnicalOrComposite + "' name='technicalType" + n + "_" + ntechnicalOrComposite + "'><option value='none'>"+select+"</option><option value='1'>sistema operativo</option><option value='2'>navegador</option></select><div class='dinput' ></div></div><!--Name--><div class='titulo'><label> Nombre:</label></div><div class='input'><input id='inputtechnicalName" + n + "_" + ntechnicalOrComposite + "' name='technicalName" + n + "_" + ntechnicalOrComposite + "' type='text'/><div class='dinput' ></div></div><!--Minimum Version--><div class='titulo'><label> Versión Mínima:</label></div><div class='input'><input id='inputtechnicalMinimumVersion" + n + "_" + ntechnicalOrComposite + "' name='technicalMinimumVersion" + n + "_" + ntechnicalOrComposite + "' type='text'/><div class='dinput' ></div></div><!--Maximum Version--><div class='titulo'><label> Versión Máxima:</label></div><div class='input'><input id='inputtechnicalMaximumVersion" + n + "_" + ntechnicalOrComposite + "' name='technicalMaximumVersion" + n + "_" + ntechnicalOrComposite + "' type='text'/><div class='dinput' ></div></div></div><div class='caja3'><span class='qt qttechnicalOrComposite" + n + "_" + ntechnicalOrComposite + " qtOrComposite' numero='" + n + "' cantidadOrComposite='" + ntechnicalOrComposite + "'><a id='quitartechnicalOrComposite" + n + "' class='pointer' href='' value='' title='"+quit+"'></a></span></div></div>");
            vtechnicalRequirement[n][ntechnicalOrComposite] = true;
            return false;

        });
        /*Quitar technicalOrComposite*/
        $(".qtOrComposite").live("click", function() {
            var a = $(this).attr("numero");
            var b = $(this).attr("cantidadOrComposite");

            $("#technicalOrComposite" + a + "_" + b + "").remove();
            vtechnicalRequirement[a][b] = false;
            return false;
        });





        /*Agregar educationalLearningResourceType*/
        $("#anadireducationalLearningResourceType").click(function() {
            var t = veducationalLearningResourceType.length;
            neducationalLearningResourceType++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (veducationalLearningResourceType[i] == true) {
                    break;
                }
            }
            $("#educationalLearningResourceType" + i + "").focus().after("<div class='caja' id='educationalLearningResourceType" + neducationalLearningResourceType + "'><div class='caja2'><div class='titulo'>Tipo de Recurso Educativo:</div><div class='input'><select id='inputeducationalLearningResourceType" + neducationalLearningResourceType + "' name='educationalLearningResourceType" + neducationalLearningResourceType + "'><option value='none'>"+select+"</option><option value='1'>ejercicio</option><option value='2'>simulación</option><option value='3'>cuestionario</option><option value='4'>diagrama</option><option value='5'>figura</option><option value='6'>gráfico</option><option value='7'>índice</option><option value='8'>diapositiva</option><option value='9'>tabla</option><option value='10'>texto narrativo</option><option value='11'>examen</option><option value='12'>experimento</option><option value='13'>planteamiento de problema </option><option value='14'>autoevaluación </option><option value='15'>conferencia</option></select><div class='dinput' > </div></div></div><div class='caja3'><span class='qt qteducationalLearningResourceType' numero='" + neducationalLearningResourceType + "'><a id='quitareducationalLearningResourceType' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");

            veducationalLearningResourceType[neducationalLearningResourceType] = true
            return false;
        });

        /*Elimina educationalLearningResourceType*/
        $(".qteducationalLearningResourceType").live("click", function() {
            var pos = $(this).attr("numero");
            $("#educationalLearningResourceType" + pos).remove();
            veducationalLearningResourceType[pos] = false;
            return false;
        });




        /*Agregar educationalIntendedEndUserRole*/
        $("#anadireducationalIntendedEndUserRole").click(function() {
            var t = veducationalIntendedEndUserRole.length;
            neducationalIntendedEndUserRole++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (veducationalIntendedEndUserRole[i] == true) {
                    break;
                }
            }
            $("#educationalIntendedEndUserRole" + i + "").focus().after("<div class='caja' id='educationalIntendedEndUserRole" + neducationalIntendedEndUserRole + "'><div class='caja2'><div class='titulo'>Destinatario:</div><div class='input'><select id='inputeducationalIntendedEndUserRole" + neducationalIntendedEndUserRole + "' name='educationalIntendedEndUserRole" + neducationalIntendedEndUserRole + "'><option value='none'>"+select+"</option><option value='1'>profesor</option><option value='2'>autor</option><option value='3'>aprendiz</option><option value='4'>administrador</option></select><div class='dinput' > </div></div></div><div class='caja3'><span class='qt qteducationalIntendedEndUserRole' numero='" + neducationalIntendedEndUserRole + "'><a id='quitareducationalIntendedEndUserRole' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");

            veducationalIntendedEndUserRole[neducationalIntendedEndUserRole] = true
            return false;
        });

        /*Elimina educationalIntendedEndUserRole*/
        $(".qteducationalIntendedEndUserRole").live("click", function() {
            var pos = $(this).attr("numero");
            $("#educationalIntendedEndUserRole" + pos).remove();
            veducationalIntendedEndUserRole[pos] = false;
            return false;
        });




        /*Agregar educationalContext*/
        $("#anadireducationalContext").click(function() {
            var t = veducationalContext.length;
            neducationalContext++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (veducationalContext[i] == true) {
                    break;
                }
            }
            $("#educationalContext" + i + "").focus().after("<div class='caja' id='educationalContext" + neducationalContext + "'><div class='caja2'><div class='titulo'>Contexto:</div><div class='input'><select id='inputeducationalContext" + neducationalContext + "' name='educationalContext" + neducationalContext + "'><option value='none'>"+select+"</option><option value='1'>escuela básica primaria y/o secundaria</option><option value='2'>educación superior</option><option value='3'>entrenamiento</option><option value='4'>otro</option></select><div class='dinput' > </div></div></div><div class='caja3'><span class='qt qteducationalContext' numero='" + neducationalContext + "'><a id='quitareducationalContext' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
            veducationalContext[neducationalContext] = true
            return false;
        });

        /*Elimina educationalContext*/
        $(".qteducationalContext").live("click", function() {
            var pos = $(this).attr("numero");
            $("#educationalContext" + pos).remove();
            veducationalContext[pos] = false;
            return false;
        });




        /*Agregar educationalTypicalAgeRange*/
        $("#anadireducationalTypicalAgeRange").click(function() {
            var t = veducationalTypicalAgeRange.length;
            neducationalTypicalAgeRange++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (veducationalTypicalAgeRange[i] == true) {
                    break;
                }
            }
            $("#educationalTypicalAgeRange" + i + "").focus().after("<div class='caja' id='educationalTypicalAgeRange" + neducationalTypicalAgeRange + "'><div class='caja2'><div class='titulo'>Rango Típico de Edad:</div><div class='input'><input id='inputeducationalTypicalAgeRange" + neducationalTypicalAgeRange + "' name='educationalTypicalAgeRange" + neducationalTypicalAgeRange + "' type='text'/><div class='dinput' > Ejemplo: 7-9</div></div></div><div class='caja3'><span class='qt qteducationalTypicalAgeRange' numero='" + neducationalTypicalAgeRange + "'><a id='quitareducationalTypicalAgeRange' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
            veducationalTypicalAgeRange[neducationalTypicalAgeRange] = true
            return false;
        });

        /*Elimina educationalTypicalAgeRange*/
        $(".qteducationalTypicalAgeRange").live("click", function() {
            var pos = $(this).attr("numero");
            $("#educationalTypicalAgeRange" + pos).remove();
            veducationalTypicalAgeRange[pos] = false;
            return false;
        });




        /*Agregar educationalDescription*/
        $("#anadireducationalDescription").click(function() {
            var t = veducationalDescription.length;
            neducationalDescription++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (veducationalDescription[i] == true) {
                    break;
                }
            }


            $("#educationalDescription" + i + "").focus().after("<div class='caja' id='educationalDescription" + neducationalDescription + "'><div class='caja2'><div class='titulo'><label class='radioButonAling'><input id='eaRadioButtonDescripcion" + neducationalDescription + "' class='eaRadioButton' n='" + neducationalDescription + "' type='radio' name='eaRadioButton" + neducationalDescription + "' value='descripcionLibre' checked='checked'/> "+description+" Libre<br /><input id='eaRadioButtonFslsm" + neducationalDescription + "' class='eaRadioButton' n='" + neducationalDescription + "' type='radio' name='eaRadioButton" + neducationalDescription + "' value='fslsm' /> Fslsm <br /><input id='eaRadioButtonVark" + neducationalDescription + "' class='eaRadioButton' n='" + neducationalDescription + "' type='radio' name='eaRadioButton" + neducationalDescription + "' value='vark' /> Vark</label></div><div class='input'><textarea id='inputeducationalDescription" + neducationalDescription + "' name='educationalDescription" + neducationalDescription + "'></textarea></div><div id='desplegableEa" + neducationalDescription + "_0'><div class='estilosA'><fieldset class='fFslsm'><legend>FSLSM</legend><div class='clear'><div class='eafloatIz columna1'><div><input id='fslsmR" + neducationalDescription + "_1L' class='eaOcultarInput' type='text' name='fslsmR" + neducationalDescription + "_1L' value='50%' readonly='readonly''></div>Activo</div><div class='center'><input type='text' class='estiloRe' id='fslsmRe" + neducationalDescription + "_1' name='fslsmRe" + neducationalDescription + "_1' style='display:none'/><input type='text' class='estiloRe' id='fslsmRe" + neducationalDescription + "_2' name='fslsmRe" + neducationalDescription + "_2' style='display:none'/><input type='text' class='estiloRe' id='fslsmRe" + neducationalDescription + "_3' name='fslsmRe" + neducationalDescription + "_3' style='display:none'/><input type='text' class='estiloRe' id='fslsmRe" + neducationalDescription + "_4' name='fslsmRe" + neducationalDescription + "_4' style='display:none'/><input type='text' class='estiloRe' id='fslsmRe" + neducationalDescription + "_5' name='fslsmRe" + neducationalDescription + "_5' style='display:none'/><div class='sFslsm' id='sfslsm" + neducationalDescription + "_1' n='" + neducationalDescription + "' m='1'></div></div><div class='eafloatIz columna2'><div><input id='fslsmR" + neducationalDescription + "_1R' class='eaOcultarInput' type='text' name='fslsmR" + neducationalDescription + "_1R' value='50%' readonly='readonly''></div>Reflexivo</div></div><div class='clear'><div class='eafloatIz columna1'><div><input id='fslsmR" + neducationalDescription + "_2L' class='eaOcultarInput' type='text' name='fslsmR" + neducationalDescription + "_2L' value='50%' readonly='readonly''></div>Sensitivo</div><div class='center'><div class='sFslsm' id='sfslsm" + neducationalDescription + "_2' n='" + neducationalDescription + "' m='2'></div></div><div class='eafloatIz columna2'><div><input id='fslsmR" + neducationalDescription + "_2R' class='eaOcultarInput' type='text' name='fslsmR" + neducationalDescription + "_2R' value='50%' readonly='readonly''></div>Intuitivo</div></div><div class='clear'><div class='eafloatIz columna1'><div><input id='fslsmR" + neducationalDescription + "_3L' class='eaOcultarInput' type='text' name='fslsmR" + neducationalDescription + "_3L' value='50%' readonly='readonly''></div>Visual</div><div class='center'><div class='sFslsm' id='sfslsm" + neducationalDescription + "_3' n='" + neducationalDescription + "' m='3'></div></div><div class='eafloatIz columna2'><div><input id='fslsmR" + neducationalDescription + "_3R' class='eaOcultarInput' type='text' name='fslsmR" + neducationalDescription + "_3R' value='50%' readonly='readonly''></div>Verbal</div></div><div class='clear'><div class='eafloatIz columna1'><div><input id='fslsmR" + neducationalDescription + "_4L' class='eaOcultarInput' type='text' name='fslsmR" + neducationalDescription + "_4L' value='50%' readonly='readonly''></div>Inductivo</div><div class='center'><div class='sFslsm' id='sfslsm" + neducationalDescription + "_4' n='" + neducationalDescription + "' m='4'></div></div><div class='eafloatIz columna2'><div><input id='fslsmR" + neducationalDescription + "_4R' class='eaOcultarInput' type='text' name='fslsmR" + neducationalDescription + "_4R' value='50%' readonly='readonly''></div>Deductivo</div></div><div class='clear'><div class='eafloatIz columna1'><div><input id='fslsmR" + neducationalDescription + "_5L' class='eaOcultarInput' type='text' name='fslsmR" + neducationalDescription + "_5L' value='50%' readonly='readonly''></div>Secuencial</div><div class='center'><div class='sFslsm' id='sfslsm" + neducationalDescription + "_5' n='" + neducationalDescription + "' m='5'></div></div><div class='eafloatIz columna2'><div><input id='fslsmR" + neducationalDescription + "_5R' class='eaOcultarInput' type='text' name='fslsmR" + neducationalDescription + "_5R' value='50%' readonly='readonly''></div>Global</div></div><div class='clear eaEnviar'><input class='enviarFslsm' type='button' n='" + neducationalDescription + "' value='"+accept+"'/> <input class='cancelarFslsm' type='button' n='" + neducationalDescription + "' value='Cancelar'/></div></fieldset></div></div><div id='desplegableEa" + neducationalDescription + "_1'><div class='estilosA'><fieldset class='fVark'><legend>VARK</legend><div class='clear'><div class='eafloatIz columna1'><div><input id='varkR" + neducationalDescription + "_1' class='eaOcultarInput' type='text' name='varkR" + neducationalDescription + "_1' value='50%' readonly='readonly''></div>Visual</div><div class='center'><input type='text' class='estiloRe' name='varkRe" + neducationalDescription + "_1' id='varkRe" + neducationalDescription + "_1' style='display:none'/><input type='text' class='estiloRe' name='varkRe" + neducationalDescription + "_2' id='varkRe" + neducationalDescription + "_2' style='display:none'/><input type='text' class='estiloRe' name='varkRe" + neducationalDescription + "_3' id='varkRe" + neducationalDescription + "_3' style='display:none'/><input type='text' class='estiloRe' name='varkRe" + neducationalDescription + "_4' id='varkRe" + neducationalDescription + "_4' style='display:none'/><div class='sVark' id='svark" + neducationalDescription + "_1' n='" + neducationalDescription + "' m='1'></div></div></div><div class='clear'><div class='eafloatIz columna1'><div><input id='varkR" + neducationalDescription + "_2' class='eaOcultarInput' type='text' name='varkR" + neducationalDescription + "_2' value='50%' readonly='readonly''></div>Auditivo</div><div class='center'><div class='sVark' id='svark" + neducationalDescription + "_2' n='" + neducationalDescription + "' m='2'></div></div></div><div class='clear'><div class='eafloatIz columna1'><div><input id='varkR" + neducationalDescription + "_3' class='eaOcultarInput' type='text' name='varkR" + neducationalDescription + "_3' value='50%' readonly='readonly''></div>Lector</div><div class='center'><div class='sVark' id='svark" + neducationalDescription + "_3' n='" + neducationalDescription + "' m='3'></div></div></div><div class='clear'><div class='eafloatIz columna1'><div><input id='varkR" + neducationalDescription + "_4' class='eaOcultarInput' type='text' name='varkR" + neducationalDescription + "_4' value='50%' readonly='readonly''></div>Kinestético</div><div class='center'><div class='sVark' id='svark" + neducationalDescription + "_4' n='" + neducationalDescription + "' m='4'></div></div></div><div class='clear eaEnviar'><input class='enviarVark' type='button' n='" + neducationalDescription + "' value='"+accept+"'/> <input class='cancelarVark' type='button' n='" + neducationalDescription + "' value='Cancelar'/></div></fieldset></div></div></div><div class='caja3'><span class='qt qteducationalDescription' numero='" + neducationalDescription + "'><a id='quitareducationalDescription' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
            veducationalDescription[neducationalDescription] = true;
            $("#educationalDescription0").attr("n", neducationalDescription);
            $(".sFslsm").slider({
                value: 50,
                min: 0,
                max: 100,
                step: 1,
                slide: function(event, ui) {
                    var n = $(this).attr("n");
                    var m = $(this).attr("m");
                    //                alert(ui.value);
                    var r = 100 - ui.value;
                    $("#fslsmR" + n + "_" + m + "L").val(ui.value + "%");
                    $("#fslsmR" + n + "_" + m + "R").val(r + "%");
                }
            });

            $(".sVark").slider({
                value: 50,
                min: 0,
                max: 100,
                step: 1,
                slide: function(event, ui) {
                    var n = $(this).attr("n");
                    var m = $(this).attr("m");
                    $("#varkR" + n + "_" + m + "").val(ui.value + "%");
                }
            });

            $("#desplegableEa" + neducationalDescription + "_0").hide();
            $("#desplegableEa" + neducationalDescription + "_1").hide();
            $("#desplegableEa" + neducationalDescription + "_0 .eaOcultarInput").each(function() {
                $(this).attr('disabled', 'disabled');
            });
            $("#desplegableEa" + neducationalDescription + "_1 .eaOcultarInput").each(function() {
                $(this).attr('disabled', 'disabled');
            });
            return false;
        });

        /*Elimina educationalDescription*/
        $(".qteducationalDescription").live("click", function() {
            var pos = $(this).attr("numero");
            $("#educationalDescription" + pos).remove();
            veducationalDescription[pos] = false;
            return false;
        });




        /*Agregar educationalLanguage*/
        $("#anadireducationalLanguage").click(function() {
            var t = veducationalLanguage.length;
            neducationalLanguage++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (veducationalLanguage[i] == true) {
                    break;
                }
            }
            $("#educationalLanguage" + i + "").focus().after("<div class='caja' id='educationalLanguage" + neducationalLanguage + "'><div class='caja2'><div class='titulo'>Idioma:</div><div class='input'><select id='inputeducationalLanguage" + neducationalLanguage + "' name='educationalLanguage" + neducationalLanguage + "' ><option value='none'>"+select+"</option><option value='es'>Español</option><option value='en'>English</option><option value='pt'>Português</option><option value='fr'>French</option><option value='ru'>Russian</option><option value='ja'>Japanese</option><option value='la'>Latin</option><option value='aa'>Afar</option><option value='ab'>Abkhazian</option><option value='af'>Afrikaans</option><option value='am'>Amharic</option><option value='ar'>Arabic</option><option value='as'>Assamese</option><option value='ay'>Aymara</option><option value='az'>Azerbaijani</option><option value='ba'>Bashkir</option><option value='be'>Byelorussian</option><option value='bg'>Bulgarian</option><option value='bh'>Bihari</option><option value='bi'>Bislama</option><option value='bn'>Bengali;Bangla</option><option value='bo'>Tibetan</option><option value='br'>Breton</option><option value='ca'>Catalan</option><option value='co'>Corsican</option><option value='cs'>Czech</option><option value='cy'>Welsh</option><option value='da'>Danish</option><option value='de'>German</option><option value='dz'>Bhutani</option><option value='el'>Greek</option><option value='eo'>Esperanto</option><option value='et'>Estonian</option><option value='eu'>Basque</option><option value='fa'>Persian</option><option value='fi'>Finnish</option><option value='fj'>Fiji</option><option value='fo'>Faeroese</option><option value='fy'>Frisian</option><option value='ga'>Irish</option><option value='gd'>Scots</option><option value='gl'>Galician</option><option value='gn'>Guarani</option><option value='gu'>Gujarati</option><option value='ha'>Hausa</option><option value='hi'>Hindi</option><option value='hr'>Croatian</option><option value='hu'>Hungarian</option><option value='hy'>Armenian</option><option value='ia'>Interlingua</option><option value='ie'>Interlingue</option><option value='ik'>Inupiak</option><option value='in'>Indonesian</option><option value='is'>Icelandic</option><option value='it'>Italian</option><option value='iw'>Hebrew</option><option value='ji'>Yiddish</option><option value='jw'>Javanese</option><option value='ka'>Georgian</option><option value='kk'>Kazakh</option><option value='kl'>Greenlandic</option><option value='km'>Cambodian</option><option value='kn'>Kannada</option><option value='ko'>Korean</option><option value='ks'>Kashmiri</option><option value='ku'>Kurdish</option><option value='ky'>Kirghiz</option><option value='ln'>Lingala</option><option value='lo'>Laothian</option><option value='lt'>Lithuanian</option><option value='lv'>Latvian,Lettish</option><option value='mg'>Malagasy</option><option value='mi'>Maori</option><option value='mk'>Macedonian</option><option value='ml'>Malayalam</option><option value='mn'>Mongolian</option><option value='mo'>Moldavian</option><option value='mr'>Marathi</option><option value='ms'>Malay</option><option value='mt'>Maltese</option><option value='my'>Burmese</option><option value='na'>Nauru</option><option value='ne'>Nepali</option><option value='nl'>Dutch</option><option value='no'>Norwegian</option><option value='oc'>Occitan</option><option value='om'>(Afan)Oromo</option><option value='or'>Oriya</option><option value='pa'>Punjabi</option><option value='pl'>Polish</option><option value='ps'>Pashto,Pushto</option><option value='qu'>Quechua</option><option value='rm'>Rhaeto-Romance</option><option value='rn'>Kirundi</option><option value='ro'>Romanian</option><option value='rw'>Kinyarwanda</option><option value='sa'>Sanskrit</option><option value='sd'>Sindhi</option><option value='sg'>Sangro</option><option value='sh'>Serbo-Croatian</option><option value='si'>Singhalese</option><option value='sk'>Slovak</option><option value='sl'>Slovenian</option><option value='sm'>Samoan</option><option value='sn'>Shona</option><option value='so'>Somali</option><option value='sq'>Albanian</option><option value='sr'>Serbian</option><option value='ss'>Siswati</option><option value='st'>Sesotho</option><option value='su'>Sundanese</option><option value='sv'>Swedish</option><option value='sw'>Swahili</option><option value='ta'>Tamil</option><option value='te'>Tegulu</option><option value='tg'>Tajik</option><option value='th'>Thai</option><option value='ti'>Tigrinya</option><option value='tk'>Turkmen</option><option value='tl'>Tagalog</option><option value='tn'>Setswana</option><option value='to'>Tonga</option><option value='tr'>Turkish</option><option value='ts'>Tsonga</option><option value='tt'>Tatar</option><option value='tw'>Twi</option><option value='uk'>Ukrainian</option><option value='ur'>Urdu</option><option value='uz'>Uzbek</option><option value='vi'>Vietnamese</option><option value='vo'>Volapuk</option><option value='wo'>Wolof</option><option value='xh'>Xhosa</option><option value='yo'>Yoruba</option><option value='zh'>Chinese</option><option value='zu'>Zulu</option>              </select><div class='dinput' > </div></div></div><div class='caja3'><span class='qt qteducationalLanguage' numero='" + neducationalLanguage + "'><a id='quitareducationalLanguage' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
            veducationalLanguage[neducationalLanguage] = true
            return false;
        });

        /*Elimina educationalLanguage*/
        $(".qteducationalLanguage").live("click", function() {
            var pos = $(this).attr("numero");
            $("#educationalLanguage" + pos).remove();
            veducationalLanguage[pos] = false;
            return false;
        });




        /*Agregar relationIdentifier*/
        $("#anadirrelationIdentifier").click(function() {
            var t = vrelationIdentifier.length;
            nrelationIdentifier++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (vrelationIdentifier[i] == true) {
                    break;
                }
            }
            $("#relationIdentifier" + i + "").focus().after("<div class='caja' id='relationIdentifier" + nrelationIdentifier + "'><div class='caja2'><!--Catalog--><div class='titulo'><label> "+catalog+":</label></div><div class='input'><input id='inputrelationCatalog" + nrelationIdentifier + "' name='relationCatalog" + nrelationIdentifier + "' type='text'/><div class='dinput' ></div></div><!--Entry--><div class='titulo'><label> "+entry+":</label></div><div class='input'><input id='inputrelationEntry" + nrelationIdentifier + "' name='relationEntry" + nrelationIdentifier + "' type='text'/></a><div class='dinput' ></div></div></div><div class='caja3'><span class='qt qtrelationIdentifier' numero='" + nrelationIdentifier + "'><a id='quitarrelationIdentifier' class='pointer' href='' value='' title='A&ntilde;adir'></a></span></div></div>")
            vrelationIdentifier[nrelationIdentifier] = true
            return false;
        });
        /*Elimina relationIdentifier*/
        $(".qtrelationIdentifier").live("click", function() {
            var pos = $(this).attr("numero");
            $("#relationIdentifier" + pos).remove();
            vrelationIdentifier[pos] = false;
            return false;
        });


        /*Agregar relationDescription*/
        $("#anadirrelationDescription").click(function() {
            var t = vrelationDescription.length;
            nrelationDescription++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (vrelationDescription[i] == true) {
                    break;
                }
            }
            $("#relationDescription" + i + "").focus().after("<div class='caja' id='relationDescription" + nrelationDescription + "'><div class='caja2'><div class='titulo'>"+description+":</div><div class='input'><textarea id='inputrelationDescription" + nrelationDescription + "' name='relationDescription" + nrelationDescription + "'></textarea><div class='dinput' ></div></div></div><div class='caja3'><span class='qt qtrelationDescription' numero='" + nrelationDescription + "'><a id='quitarrelationDescription' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
            vrelationDescription[nrelationDescription] = true
            return false;
        });

        /*Elimina relationDescription*/
        $(".qtrelationDescription").live("click", function() {
            var pos = $(this).attr("numero");
            $("#relationDescription" + pos).remove();
            vrelationDescription[pos] = false;
            return false;
        });




        /*Agregar classificationTaxonPath*/
        $("#anadirclassificationTaxonPath").click(function() {
            var t = vclassificationTaxonPath.length;
            nclassificationTaxonPath++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (vclassificationTaxonPath[i][0] == true) {
                    break;
                }
            }

            nclassificationTaxon = 0;
            $("#classificationTaxonPath" + i + "").focus().after("<div class='caja' id='classificationTaxonPath" + nclassificationTaxonPath + "' ><div class='caja2 classificationTaxonPath'><!--Source--><div class='caja' id='classificationSource" + nclassificationTaxonPath + "_" + nclassificationTaxon + "'><div class='caja2'><div class='titulo'>Fuente:</div><div class='input'><input id='inputclassificationSource" + nclassificationTaxonPath + "_" + nclassificationTaxon + "' name='classificationSource" + nclassificationTaxonPath + "_" + nclassificationTaxon + "' type='text' /></a><div class='dinput' > </div></div></div><div class='caja3'></div></div><fieldset class='caja2 subcategoria anidada2 ' ><legend>Taxon</legend><div class='caja' id='classificationTaxon" + nclassificationTaxonPath + "_" + nclassificationTaxon + "'>        <div class='caja2'> <!--Entry--> <div class='titulo'> <label> Id:</label> </div> <div class='input'> <input id='inputclassificationId" + nclassificationTaxonPath + "_" + nclassificationTaxon + "' name='classificationId" + nclassificationTaxonPath + "_" + nclassificationTaxon + "' type='text'/>  <div class='dinput' ><b>Ejemplo:</b> 4.1.2</div> </div> </div> <div class='caja3'> </div>       <div class='caja2'><!--Entry--><div class='titulo'><label> "+entry+":</label></div><div class='input'><input id='inputclassificationEntry" + nclassificationTaxonPath + "_" + nclassificationTaxon + "' name='classificationEntry" + nclassificationTaxonPath + "_" + nclassificationTaxon + "' type='text'/><div class='dinput' ></div></div></div><div class='caja3'><span class='at'><a id='anadirclassificationTaxon' numero='" + nclassificationTaxonPath + "' cantidadTaxon='0' class='pointer' href='' value='' title='A&ntilde;adir'></a></span></div></div></fieldset></div><div class='caja3'><span class='qt qtclassificationTaxonPath' numero='" + nclassificationTaxonPath + "'><a id='quitarclassificationTaxonPath' class='pointer' href='' value='' title='A&ntilde;adir'></a></span></div></div><div class='caja3'></div>");
            vclassificationTaxonPath[nclassificationTaxonPath] = new Array(true);

            return false;
        });
        /*Eliminar classificationTaxonPath*/
        $(".qtclassificationTaxonPath").live("click", function() {
            var pos = $(this).attr("numero");
            $("#classificationTaxonPath" + pos).remove();
            vclassificationTaxonPath[pos][0] = false;
            return false;
        });




        /*Agregar classificationTaxon*/
        $("#anadirclassificationTaxon").live("click", function() {
            var n = $(this).attr("numero");
            var t = vclassificationTaxonPath[n].length;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (vclassificationTaxonPath[n][i] == true) {
                    break;
                }
            }
            nclassificationTaxon = t;
            $('#classificationTaxon' + n + "_" + i + '').focus().after("<div class='caja' id='classificationTaxon" + n + "_" + nclassificationTaxon + "'><div class='caja2'><!--Entry--><div class='titulo'><label> "+entry+":</label></div><div class='input'><input id='inputclassificationEntry" + n + "_" + nclassificationTaxon + "' name='classificationEntry" + n + "_" + nclassificationTaxon + "' type='text'/><div class='dinput' ></div></div></div><div class='caja3'><span class='qt qtclassificationTaxon" + n + "_" + nclassificationTaxon + " qtTaxon' numero='" + n + "' cantidadTaxon='" + nclassificationTaxon + "'><a id='quitarclassificationTaxon" + n + "' class='pointer' href='' value='' title='"+quit+"'></a></span></div></div>");
            vclassificationTaxonPath[n][nclassificationTaxon] = true;
            return false;

        });
        /*Quitar classificationTaxon*/
        $(".qtTaxon").live("click", function() {
            var a = $(this).attr("numero");
            var b = $(this).attr("cantidadTaxon");

            $("#classificationTaxon" + a + "_" + b + "").remove();
            vclassificationTaxonPath[a][b] = false;
            return false;
        });










        /*Agregar classificationKeyword*/
        $("#anadirclassificationKeyword").click(function() {
            var t = vclassificationKeyword.length;
            nclassificationKeyword++;
            var i;
            for (i = (t - 1); i > 0; i--) {
                if (vclassificationKeyword[i] == true) {
                    break;
                }
            }
            $("#classificationKeyword" + i + "").focus().after("<div class='caja' id='classificationKeyword" + nclassificationKeyword + "'><div class='caja2'><div class='titulo'>"+keywords+":</div><div class='input'><input id='classificationKeyword" + nclassificationKeyword + "' name='classificationKeyword" + nclassificationKeyword + "' type='text'/><div class='dinput' > </div></div></div><div class='caja3'><span class='qt qtclassificationKeyword' numero='" + nclassificationKeyword + "'><a id='quitarclassificationKeyword' href='' class='pointer' value='' title='"+quit+"'></a></span></div></div>");
            vclassificationKeyword[nclassificationKeyword] = true
            return false;
        });

        /*Elimina classificationKeyword*/
        $(".qtclassificationKeyword").live("click", function() {
            var pos = $(this).attr("numero");
            $("#classificationKeyword" + pos).remove();
            vclassificationKeyword[pos] = false;
            return false;
        });

        $('.descripcion').hover(function() {
            $(this).css('cursor', 'pointer');
        });
        $(".pointer").hover(function() {
            $(this).css('cursor', 'pointer');
        });
        $("#quitararea").mouseover(function() {
            $(this).css('cursor', 'pointer');
        });



        $("#formulario").submit(function(event) {
            //   alert(idlo);

            //   alert($(this).serialize());
            // return false;



            var tipoDeGuardado;
            if (type_submit) {
                tipoDeGuardado = "parcialmente";
            }
            else {
                tipoDeGuardado = "completamente";
            }
            if (confirm("Desea guardar este Objeto de Aprendizaje " + tipoDeGuardado + "")) {


                event.preventDefault();
                //$("#formulario2").submit();
                $("#coverDisplay").css({
                    "opacity": "1",
                    "width": "100%",
                    "height": "100%"
                });
                var t = vtechnicalRequirement.length;

                var auxvtechnicalRequirement = new Array(t);
                for (var i = 0; i < t; i++) {
                    auxvtechnicalRequirement[i] = vtechnicalRequirement[i].length;
                }

                t = vlifeCycleContribute.length;
                var auxvlifeCycleContribute = new Array(t);
                for (var i = 0; i < t; i++) {
                    auxvlifeCycleContribute[i] = vlifeCycleContribute[i].length;
                }

                //vmetaMetadataMetadataSchema
                t = vmetaMetadataMetadataSchema.length;
                var auxvmetaMetadataMetadataSchema = new Array(t);
                for (var i = 0; i < t; i++) {
                    auxvmetaMetadataMetadataSchema[i] = vmetaMetadataMetadataSchema[i].length;
                }

                //vmetaMetadataMetadataContribute
                t = vmetaMetadataContribute.length;
                var auxvmetaMetadataContribute = new Array(t);
                for (var i = 0; i < t; i++) {
                    auxvmetaMetadataContribute[i] = vmetaMetadataContribute[i].length;
                }



                // vclassificationTaxonPath
                t = vclassificationTaxonPath.length;
                var auxvclassificationTaxonPath = new Array(t);
                for (var i = 0; i < t; i++) {
                    auxvclassificationTaxonPath[i] = vclassificationTaxonPath[i].length;
                }

                $.ajax({
                    // el tipo de petici�n
                    type: 'POST',
                    // que archivo vamos a pedir
                    url: 'control/procesarFormulario.php',
                    // los datos que vamos a enviar         
                    data: $(this).serialize() + "&ngeneralIdentifier=" + ngeneralIdentifier + "&ngeneralLanguage=" + ngeneralLanguage + "&ngeneralDescription=" + ngeneralDescription + "&ngeneralKeyword=" + ngeneralKeyword + "&ngeneralCoverage=" + ngeneralCoverage + "&nmetaMetadataMetadataSchema=" + nmetaMetadataMetadataSchema + "&ntechnicalFormat=" + ntechnicalFormat + "&ntechnicalLocation=" + ntechnicalLocation + "&neducationalLearningResourceType=" + neducationalLearningResourceType + "&neducationalIntendedEndUserRole=" + neducationalIntendedEndUserRole + "&neducationalContext=" + neducationalContext + "&neducationalTypicalAgeRange=" + neducationalTypicalAgeRange + "&neducationalDescription=" + neducationalDescription + "&neducationalLanguage=" + neducationalLanguage + "&nclassificationKeyword=" + nclassificationKeyword + "&nmetaMetadataIdentifier=" + nmetaMetadataIdentifier + "&auxvtechnicalRequirement=" + auxvtechnicalRequirement + "&nlifeCycleContribute=" + nlifeCycleContribute + "&nmetaMetadataContribute=" + nmetaMetadataContribute + "&nrelationIdentifier=" + nrelationIdentifier + "&nrelationDescription=" + nrelationDescription + "&auxvlifeCycleContribute=" + auxvlifeCycleContribute + "&auxvmetaMetadataContribute=" + auxvmetaMetadataContribute + "&auxvclassificationTaxonPath=" + auxvclassificationTaxonPath + "&auxvmetaMetadataMetadataSchema=" + auxvmetaMetadataMetadataSchema + "&idlo=" + idlo + "&idReport=" + idReport,
                    // funcion que se ejecutar� antes de enviar la petici�n
                    beforeSend: function() {

                        // 
                    },
                    // cuando la petici�n se hizo satisfactoriamente
                    success: function(result) {
                        $("#coverDisplay").css({
                            "opacity": "0",
                            "width": "0",
                            "height": "0"
                        });
                        idlo = result;
                        //  alert('holis');
                        //  alert(result);
                        if (!type_submit) {
                            location.href = 'main.php'
                        }
                        else {
                            $.ajax({
                                // el tipo de petici�n
                                type: 'POST',
                                // que archivo vamos a pedir
                                url: 'control/procesarFormulario2.php',
                                // los datos que vamos a enviar         
                                data: "idlo=" + idlo,
                                // funcion que se ejecutar� antes de enviar la petici�n
                                beforeSend: function() {

                                },
                                // cuando la petici�n se hizo satisfactoriamente
                                success: function(result2) {
                                    $("#coverDisplay").css({
                                        "opacity": "0",
                                        "width": "0",
                                        "height": "0"
                                    });
                                    //                                    alert(result2);        
                                    location.href = 'main.php'


                                },
                                error: function(geterror) {
                                    // en caso de error hay que reportarle al usuario
                                    // que error se produjo, este resultado se contiene en
                                    // la variable geterror.status, que nos regresa el n�mero
                                    // del error (revisar apache error report).
                                }
                            });

                        }
                    },
                    error: function(geterror) {
                        // en caso de error hay que reportarle al usuario
                        // que error se produjo, este resultado se contiene en
                        // la variable geterror.status, que nos regresa el n�mero
                        // del error (revisar apache error report).
                    }
                });


            }
            else {
                return false;
            }

        });

        $(".guardarParcialmente").hover(function() {
            $(this).css("background", "url(vista/img/savePartial2.png)");
        },
                function() {
                    $(this).css("background", "url(vista/img/savePartial.png)");
                }
        );
        $(".guardarCompletamente").hover(function() {
            $(this).css("background", "url(vista/img/saveFinal2.png)");
        },
                function() {
                    $(this).css("background", "url(vista/img/saveFinal.png)");
                }
        );

        $(".guardarParcialmente").click(function(event) {
            type_submit = true;
            $("#formulario").submit();
        });

        $(".guardarCompletamente").click(function(event) {
            type_submit = false;
            var flag = true;
            $("#formulario input").each(function() {
                //                var elemento= this;
                //                alert("elemento.id="+ elemento.id + ", elemento.value=" + elemento.value); 
                if ($(this).is('.req') && $(this).val() == "") {
                    alert("Faltan campos obligatorios por diligenciar");
                    flag = false;
                    return false;
                }
            });

            if (!flag) {
                return false;
            }
            $("#formulario select").each(function() {
                if ($(this).is('.req') && $(this).val() == "none") {
                    alert("Faltan campos obligatorios por diligenciar");
                    flag = false;
                    return false;
                }
            });
            if (!flag) {
                return false;
            }

            $("#formulario textarea").each(function() {
                if ($(this).is('.req') && $(this).val() == "") {
                    alert("Faltan campos obligatorios por diligenciar");
                    flag = false;
                    return false;
                }
            });
            if (!flag) {
                return false;
            }

            if (flag) {
                $("#formulario").submit();
            }

        });
    }
    $("body").click(function() {
        $(".err").remove();
    });
    $(".nbc").live("click", function() {
        var n = $(this).attr("n");
        $("#desplegableNbc" + n + "").show();
        if ($("#Nbc" + n + "").val() == ""+select+"") {
            $("#sNbc" + n + "").attr('disabled', '');
            $("#ssNbc" + n + "").attr('disabled', '');
        }
    });
    $("#technicalDurationTab").click(function() {
        $("#technicalDurationTabContainer").show("normal");
    });
    $("#technicalDurationTabAcpetar").click(function() {

        year = document.getElementsByName("yearTD")[0].value;
        month = document.getElementsByName("monthTD")[0].value;
        day = document.getElementsByName("dayTD")[0].value;
        hour = document.getElementsByName("hourTD")[0].value;
        minute = document.getElementsByName("minuteTD")[0].value;
        second = document.getElementsByName("secondTD")[0].value;


        //   alert(year + " -- " + month + " -- " + day + " -- "  + hour + " -- "  + minute + " -- " + second) ;
        var str = "P";
        if (year != 0)
            str += year + "Y";

        if (month != 0)
            str += month + "M";
        if (day != 0)
            str += day + "D";
        //  alert(str);

        if (hour != 0 || minute != 0 || second != 0) {
            str += "T";
            if (hour != 0)
                str += hour + "H";
            if (minute != 0)
                str += minute + "M";
            if (second != 0)
                str += second + "S";
        }

        document.getElementById("inputtechnicalDuration").value = str;
        $("#technicalDurationTabContainer").hide();
    });
    $("#technicalDurationTabCancelar").click(function() {
        $("#technicalDurationTabContainer").hide("normal");
    });


    $("#educationalTypicalLearningTimeTab").click(function() {
        $("#educationalTypicalLearningTimeTabContainer").show("normal");
    });
    $("#educationalTypicalLearningTimeTabAcpetar").click(function() {

        year = document.getElementsByName("yearETLT")[0].value;
        month = document.getElementsByName("monthETLT")[0].value;
        day = document.getElementsByName("dayETLT")[0].value;
        hour = document.getElementsByName("hourETLT")[0].value;
        minute = document.getElementsByName("minuteETLT")[0].value;
        second = document.getElementsByName("secondETLT")[0].value;


        //   alert(year + " -- " + month + " -- " + day + " -- "  + hour + " -- "  + minute + " -- " + second) ;
        var str = "P";
        if (year != 0)
            str += year + "Y";

        if (month != 0)
            str += month + "M";
        if (day != 0)
            str += day + "D";
        //  alert(str);

        if (hour != 0 || minute != 0 || second != 0) {
            str += "T";
            if (hour != 0)
                str += hour + "H";
            if (minute != 0)
                str += minute + "M";
            if (second != 0)
                str += second + "S";
        }

        document.getElementById("inputeducationalTypicalLearningTime").value = str;
        $("#educationalTypicalLearningTimeTabContainer").hide("normal");
    });
    $("#educationalTypicalLearningTimeTabCancelar").click(function() {
        $("#educationalTypicalLearningTimeTabContainer").hide("normal");
    });


    //    $(".fslsm").live("click",function(){ 
    //        var n=$(this).attr("n");
    //         $("#desplegableEa"+n+"").load("barra.php?n=0");
    //        $("#desplegableEa"+n+"").show();
    //        
    //    });
    $(".fslsm").live("click", function() {
        var n = $(this).attr("n");
        $("#desplegableEa" + n + "_1").hide();
        $("#desplegableEa" + n + "_0").show();
        $("#desplegableEa" + n + "_1 input").each(function() {
            $(this).attr('disabled', 'disabled');
        })
        $("#desplegableEa" + n + "_0 input").each(function() {
            $(this).removeAttr('disabled');
        })
    });

    $(".vark").live("click", function() {

        var n = $(this).attr("n");
        $("#desplegableEa" + n + "_0").hide();
        $("#desplegableEa" + n + "_1").show();
        $("#desplegableEa" + n + "_0 input").each(function() {
            $(this).attr('disabled', 'disabled');
        })
        $("#desplegableEa" + n + "_1 input").each(function() {
            $(this).removeAttr('disabled');
        })

    });
//   $("#selectNbcArea").change(function () {
//     alert($("#selectNbcArea").val());




// });
});
