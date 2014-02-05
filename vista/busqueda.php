<div id="campoBusqueda">
    <form id="busquedaSimple" method="post" action="control/busquedaC.php?action=simple">
        

        <div class="estilobusquedasimple"> 
            
            <input class="inputbusquedasimple" id="stringDeConsulta" type="text"  name="inputbusquedasimple"  alt="<?= $searchInRoap ?>" />
            <input class="enviarbusquedasimple" type="submit" name="enviarbusquedasimple" value="" title="<?= $searchInRoap ?>" tabindex="50"/>
            <input id="orderBy" name="orderBy" value="<?php
if (isset($_GET["order"])) {
    echo $_GET["order"];
} else {
    echo "insertiondate";
}
?>" style="visibility:hidden"/>
        </div>
        <?php
        if (isset($_GET['idC'])) {
            echo "<input type='checkbox' value='" . $_GET['idC'] . "' name='cidsc'> $searchOnlyInThisCollection";
        }
        ?>
        <br/><span id="iravanzada" class="link"><?= $advancedSearch ?></span>

    </form>

    <form  id="busquedaAvanzada" style="dispaly:none;" method="post"  action="control/busquedaC.php?action=avanzada">
        <input id="orderByAvanzada" name="orderBy" value="<?php
        if (isset($_GET["order"])) {
            echo $_GET["order"];
        } else {
            echo "insertiondate";
        }
        ?>" style="visibility:hidden"/>
        <div class="criterios">
            <span class="alinear1" ><?= $label ?></span>
            <span class="alinear2" ><?= $operator ?></span>
            <span class="alinear3" ><?= $value ?></span>
            <br/> 
            <br/>
            <span class="alinear1"><?= $title2 ?>
            </span>
            <span class="alinear2"><select name="opGeneralTitle">
                    <option value="igual">=</option>
                    <option value="diferente">≠</option>
                </select>
            </span>
            <span class="alinear3"><input type="text" name="sGeneralTitle"/>
            </span>
            <br/> 
            <br/>
            <span class="alinear1"> <?= $keywords ?>
            </span>
            <span class="alinear2"><select name="opGeneralKeyword" >
                    <option value="igual">=</option>
                    <option value="diferente">≠</option>
                </select>
            </span>
            <span class="alinear3"><input type="text"  name="sGeneralKeyword"/>
            </span>

            <br/> 
            <br/>
            <span class="alinear1"><?= $format2 ?>
            </span>
            <span class="alinear2"><select name="opTechnicalFormat">
                    <option value="igual">=</option>
                    <option value="diferente">≠</option>
                </select>
            </span>
            <span class="alinear3" ><input type="text"  name="sTechnicalFormat"/>
            </span>
            <br/> 
            <br/>
            <span class="alinear1"><?= $uploadedBy ?>
            </span>
            <span class="alinear2"><select name="opUsersUsers">
                    <option value="igual">=</option>
                    <option value="diferente">≠</option>
                </select>
            </span>
            <span class="alinear3" ><input type="text" id="sLomUser" name="sUsersUsers"/>
            </span>
            <br/><br/>        <?php
               if (isset($_GET['idC'])) {
                   echo "<input type='checkbox' value='" . $_GET['idC'] . "' name='cidsc'> $searchOnlyInThisCollection";
               }
        ?>
            <br/> <br/>
            <input class="defaultButton" type="submit" value="<?= $search ?>"/> <span class="link" id="irasimple"><?= $simpleSearch ?></span>
        </div> 
        <div class="estilodesplegableBusquedaAvanza">
            <!--General-->
            <div class="tituloDesplegable flip" idsCategoriaImg="sCategoriaImgGeneral" id="flipGeneral"><span id="sCategoriaImgGeneral" class='sCategoriaImg'></span><?= $general ?></div>  
            <div class="margen" id="desplegableGeneral">  <br/>
                <span class="alinear1" ><?= $label ?></span>
                <span class="alinear2" ><?= $operator ?></span>
                <span class="alinear3" ><?= $value ?></span>
                <span class="alinear4" ><?= $options ?></span>
                <br/> 
                <br/>
                <div class="bordeAmarillo">
                    <span class="alinear1"> <?= $catalog ?>
                    </span>
                    <span class="alinear2"><select name="opGeneralCatalog">
                            <option value="igual">=</option>
                            <option value="diferente">≠</option>
                        </select>
                    </span>
                    <span class="alinear3"><input type="text" id="sinputgeneralCatalog" name="sGeneralCatalog"/>
                    </span>
                    <span class="alinear4">
                        <span class="bnbc" n="0"><span class="bmasnbc"></span>NBC</span>
                    </span>  

                    <br/> 
                    <br/>
                    <span class="alinear1">  <?= $entry ?>
                    </span>
                    <span class="alinear2"><select name="opGeneralEntry" >
                            <option value="igual">=</option>
                            <option value="diferente">≠</option>
                        </select>
                    </span>
                    <span class="alinear3"><input type="text" id="sinputgeneralEntry" name="sGeneralEntry"/>
                    </span>

                    <br/> 
                </div>
                <br/>   
                <div id="bdesplegableNbc0" class="bdesplegableNbc">
                    <div class="alinear5"> Seleccione una entrada:</div>

                    <select id="bNbc0" class="bselectNbcArea " n="0">
                        <option>Seleccionar</option>
                        <option value="01">Agronomía, Veterinaria y afines</option>
                        <option value="02">Bellas Artes</option>
                        <option value="03">Ciencias de la Educación</option>
                        <option value="04">Ciencias de la Salud</option>
                        <option value="05">Ciencias Sociales y Humanas</option>
                        <option value="06">Economía, Administración, Contaduría y afines</option>
                        <option value="07">Ingeniería, Arquitectura, Urbanismo y afines</option>
                        <option value="08">Matemáticas y Ciencias Naturales
                        </option>
                    </select> 


                    <select id="bsNbc0" class="bselectSubarea " n="0">
                    </select>

                    <select id="bssNbc0" class="bselectSubsubarea" n="0">
                    </select>

                    <br/>
                    <br/>
                    <div class="alinear6"><input class="benviarNbc" type="button" n="0" value="<?= $accept ?>"/>  <input class="bcancelarNbc" type="button" n="0" value="Cancelar"/></div>
                </div>



                <span class="alinear1"><?= $language ?>
                </span>
                <span class="alinear2"><select name="opGeneralLanguage">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3" ><input type="text" id="inputSearchGeneralLanguage" name="sGeneralLanguage"/>
                </span>
                <span class="alinear4">
                    <select id="selectGeneralLanguage" >
                        <option value='none'>Seleccionar</option>
                        <option value='es'>Spanish</option>
                        <option value='en'>English</option>
                        <option value='pt'>Portuguese</option>
                        <option value='fr'>French</option>
                        <option value='ru'>Russian</option>
                        <option value='ja'>Japanese</option>
                        <option value='la'>Latin</option>
                        <option value='aa'>Afar</option>
                        <option value='ab'>Abkhazian</option>
                        <option value='af'>Afrikaans</option>
                        <option value='am'>Amharic</option>
                        <option value='ar'>Arabic</option>
                        <option value='as'>Assamese</option>
                        <option value='ay'>Aymara</option>
                        <option value='az'>Azerbaijani</option>
                        <option value='ba'>Bashkir</option>
                        <option value='be'>Byelorussian</option>
                        <option value='bg'>Bulgarian</option>
                        <option value='bh'>Bihari</option>
                        <option value='bi'>Bislama</option>
                        <option value='bn'>Bengali;Bangla</option>
                        <option value='bo'>Tibetan</option>
                        <option value='br'>Breton</option>
                        <option value='ca'>Catalan</option>
                        <option value='co'>Corsican</option>
                        <option value='cs'>Czech</option>
                        <option value='cy'>Welsh</option>
                        <option value='da'>Danish</option>
                        <option value='de'>German</option>
                        <option value='dz'>Bhutani</option>
                        <option value='el'>Greek</option>              
                        <option value='eo'>Esperanto</option>                     
                        <option value='et'>Estonian</option>
                        <option value='eu'>Basque</option>
                        <option value='fa'>Persian</option>
                        <option value='fi'>Finnish</option>
                        <option value='fj'>Fiji</option>
                        <option value='fo'>Faeroese</option>
                        <option value='fy'>Frisian</option>
                        <option value='ga'>Irish</option>
                        <option value='gd'>Scots</option>
                        <option value='gl'>Galician</option>
                        <option value='gn'>Guarani</option>
                        <option value='gu'>Gujarati</option>
                        <option value='ha'>Hausa</option>
                        <option value='hi'>Hindi</option>
                        <option value='hr'>Croatian</option>
                        <option value='hu'>Hungarian</option>
                        <option value='hy'>Armenian</option>
                        <option value='ia'>Interlingua</option>
                        <option value='ie'>Interlingue</option>
                        <option value='ik'>Inupiak</option>
                        <option value='in'>Indonesian</option>
                        <option value='is'>Icelandic</option>
                        <option value='it'>Italian</option>
                        <option value='iw'>Hebrew</option>
                        <option value='ji'>Yiddish</option>
                        <option value='jw'>Javanese</option>
                        <option value='ka'>Georgian</option>
                        <option value='kk'>Kazakh</option>
                        <option value='kl'>Greenlandic</option>
                        <option value='km'>Cambodian</option>
                        <option value='kn'>Kannada</option>
                        <option value='ko'>Korean</option>
                        <option value='ks'>Kashmiri</option>
                        <option value='ku'>Kurdish</option>
                        <option value='ky'>Kirghiz</option>
                        <option value='ln'>Lingala</option>
                        <option value='lo'>Laothian</option>
                        <option value='lt'>Lithuanian</option>
                        <option value='lv'>Latvian,Lettish</option>
                        <option value='mg'>Malagasy</option>
                        <option value='mi'>Maori</option>
                        <option value='mk'>Macedonian</option>
                        <option value='ml'>Malayalam</option>
                        <option value='mn'>Mongolian</option>
                        <option value='mo'>Moldavian</option>
                        <option value='mr'>Marathi</option>
                        <option value='ms'>Malay</option>
                        <option value='mt'>Maltese</option>
                        <option value='my'>Burmese</option>
                        <option value='na'>Nauru</option>
                        <option value='ne'>Nepali</option>
                        <option value='nl'>Dutch</option>
                        <option value='no'>Norwegian</option>
                        <option value='oc'>Occitan</option>
                        <option value='om'>(Afan)Oromo</option>
                        <option value='or'>Oriya</option>
                        <option value='pa'>Punjabi</option>
                        <option value='pl'>Polish</option>
                        <option value='ps'>Pashto,Pushto</option>
                        <option value='qu'>Quechua</option>
                        <option value='rm'>Rhaeto-Romance</option>
                        <option value='rn'>Kirundi</option>
                        <option value='ro'>Romanian</option>
                        <option value='rw'>Kinyarwanda</option>
                        <option value='sa'>Sanskrit</option>
                        <option value='sd'>Sindhi</option>
                        <option value='sg'>Sangro</option>
                        <option value='sh'>Serbo-Croatian</option>
                        <option value='si'>Singhalese</option>
                        <option value='sk'>Slovak</option>
                        <option value='sl'>Slovenian</option>
                        <option value='sm'>Samoan</option>
                        <option value='sn'>Shona</option>
                        <option value='so'>Somali</option>
                        <option value='sq'>Albanian</option>
                        <option value='sr'>Serbian</option>
                        <option value='ss'>Siswati</option>
                        <option value='st'>Sesotho</option>
                        <option value='su'>Sundanese</option>
                        <option value='sv'>Swedish</option>
                        <option value='sw'>Swahili</option>
                        <option value='ta'>Tamil</option>
                        <option value='te'>Tegulu</option>
                        <option value='tg'>Tajik</option>
                        <option value='th'>Thai</option>
                        <option value='ti'>Tigrinya</option>
                        <option value='tk'>Turkmen</option>
                        <option value='tl'>Tagalog</option>
                        <option value='tn'>Setswana</option>
                        <option value='to'>Tonga</option>
                        <option value='tr'>Turkish</option>
                        <option value='ts'>Tsonga</option>
                        <option value='tt'>Tatar</option>
                        <option value='tw'>Twi</option>
                        <option value='uk'>Ukrainian</option>
                        <option value='ur'>Urdu</option>
                        <option value='uz'>Uzbek</option>
                        <option value='vi'>Vietnamese</option>
                        <option value='vo'>Volapuk</option>
                        <option value='wo'>Wolof</option>
                        <option value='xh'>Xhosa</option>
                        <option value='yo'>Yoruba</option>
                        <option value='zh'>Chinese</option>
                        <option value='zu'>Zulu</option>
                    </select>
                </span>

                <br/>    
                <br/> 
                <span class="alinear1"><?= $description ?>
                </span>
                <span class="alinear2"><select name="opGeneralDescription">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><textarea type="textarea" name="sGeneralDescription"></textarea>
                </span>
                <br/>    
                <br/> 

                <br/> 
                <br/>
                <span class="alinear1"><?= $coverage ?>
                </span>
                <span class="alinear2"><select id="chGeneralCoverage" name="opGeneralCoverage">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><input type="text" id="inputSearchGeneralCoverage" name="sGeneralCoverage"/>
                </span>

                <br/> 
                <br/>
                <span class="alinear1"><?= $structure ?>
                </span>
                <span class="alinear2"><select id="chGeneralStructure" name="opGeneralStructure">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><select id="inputSearchGeneralStructure" name="sGeneralStructure"> 
                        <option value="none"></option>
                        <option value="2">Atómica</option>
                        <option value="3">Colección</option>
                        <option value="3">En red</option>
                        <option value="3">Jerárquica</option>
                        <option value="3">Lineal</option>
                    </select>
                </span>

                <br/> 
                <br/>
                <span class="alinear1"> <?= $aggregationLevel ?>
                </span>
                <span class="alinear2"><select id="selectSearchGeneralAggregationLevel" name="opGeneralAggregationLevel">
                        <option value="igual">=</option>
                        <option value="mayor">></option>
                        <option value="menor"><</option>
                        <option value="mayoroigual">≥</option>
                        <option value="menoroigual">≤</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><select id="inputSearchGeneralAggregationLevel" name="sGeneralAggregationLevel"> 
                        <option value="none"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </span>
                <br/>
                <br/>
            </div>

            <!--Life Cycle-->
            <div class="tituloDesplegable flip" idsCategoriaImg="sCategoriaImgLifeCycle" id="flipLifeCycle"><span id="sCategoriaImgLifeCycle" class='sCategoriaImg'></span><?= $lifeCycle ?></div>  
            <div class="margen" id="desplegableLifeCycle">
                <br/>
                <span class="alinear1" ><?= $label ?></span>
                <span class="alinear2" ><?= $operator ?></span>
                <span class="alinear3" ><?= $value ?></span>

                <br/> 
                <br/>
                <span class="alinear1"> <?= $version ?>
                </span>
                <span class="alinear2"><select name="opLifeCycleVersion">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><input type="text" name="sLifeCycleVersion"/>
                </span>

                <br/> 
                <br/>
                <span class="alinear1"> <?= $status ?>
                </span>
                <span class="alinear2"><select name="opLifeCycleStatus">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><select type="text" name="sLifeCycleStatus">  <option value="none">Seleccionar</option>
                        <option value="1">borrador</option>
                        <option value="2">final</option>
                        <option value="3">revisado</option>
                        <option value="4">no disponible</option>
                    </select>
                </span>

                <br/> 
                <br/>
                <div class="bordeAmarillo">
                    <span class="alinear1"> <?= $role ?>
                    </span>
                    <span class="alinear2"><select name="opLifeCycleRole">
                            <option value="igual">=</option>
                            <option value="diferente">≠</option>
                        </select>
                    </span>
                    <span class="alinear3"><select id="inputSearchLifeCycleRole" name="sLifeCycleRole">
                            <option value="none">Seleccionar</option>Seleccionar</option>
                            <option value="1">autor</option>
                            <option value="2">desconocido</option>
                            <option value="3">iniciador</option>
                            <option value="4">terminador</option>
                            <option value="5">revisor</option>
                            <option value="6">editor</option>
                            <option value="7">diseñador gráfico</option>
                            <option value="8">desarrollador técnico</option>
                            <option value="9">proveedor de contenidos</option>
                            <option value="10">revisor técnico </option>
                            <option value="11">revisor educativo</option>
                            <option value="12">guionista</option>
                            <option value="13">diseñador educativo</option>
                            <option value="14">experto en la materia</option>
                        </select>
                    </span>

                    <br/> 
                    <br/>
                    <span class="alinear1"> <?= $entity ?>
                    </span>
                    <span class="alinear2"><select name="opLifeCycleEntity">
                            <option value="igual">=</option>
                            <option value="diferente">≠</option>
                        </select>
                    </span>
                    <span class="alinear3"><input type="text" name="sLifeCycleEntity"/>
                    </span>

                    <br/> 
                    <br/>
                    <span class="alinear1"> <?= $date ?>
                    </span>
                    <span class="alinear2"><select name="opLifeCycleDate">
                            <option value="igual">=</option>
                            <option value="diferente">≠</option>
                        </select>
                    </span>
                    <span class="alinear3"><input type="text" class="date" name="sLifeCycleDate"/>
                    </span>

                    <br/>
                </div>
                <br/>
            </div>

            <!--MetaMetadata-->
            <div class="tituloDesplegable flip" idsCategoriaImg="sCategoriaImgMetaMetadata" id="flipMetaMetadata"><span id="sCategoriaImgMetaMetadata" class='sCategoriaImg'></span><?= $metaMetadata ?></div>  
            <div class="margen" id="desplegableMetaMetadata">
                <br/>
                <span class="alinear1" ><?= $label ?></span>
                <span class="alinear2" ><?= $operator ?></span>
                <span class="alinear3" ><?= $value ?></span>
                <span class="alinear4" ><?= $options ?></span>

                <br/> 
                <br/>
                <div class="bordeAmarillo">
                    <span class="alinear1">  <?= $catalog ?>
                    </span>
                    <span class="alinear2"><select name="opMetaMetadataCatalog">
                            <option value="igual">=</option>
                            <option value="diferente">≠</option>
                        </select>
                    </span>
                    <span class="alinear3"><input type="text" name="sMetaMetadataCatalog"/>
                    </span>

                    <br/> 
                    <br/>
                    <span class="alinear1"> <?= $entry ?>
                    </span>
                    <span class="alinear2"><select name="opMetaMetadataEntry">
                            <option value="igual">=</option>
                            <option value="diferente">≠</option>
                        </select>
                    </span>
                    <span class="alinear3"><input type="text" name="sMetaMetadataEntry"/>
                    </span>

                    <br/> 
                </div>
                <br/>
                <div class="bordeAmarillo">
                    <span class="alinear1"> <?= $role ?>
                    </span>
                    <span class="alinear2"><select name="opMetaMetadataRole">
                            <option value="igual">=</option>
                            <option value="diferente">≠</option>
                        </select>
                    </span>
                    <span class="alinear3"><select name="sMetaMetadataRole">
                            <option value="none">Seleccionar</option>
                            <option value="1">creador</option>
                            <option value="2">revisor</option>
                        </select>
                    </span>

                    <br/> 
                    <br/>
                    <span class="alinear1">  <?= $entity ?>
                    </span>
                    <span class="alinear2"><select name="opMetaMetadataEntity">
                            <option value="igual">=</option>
                            <option value="diferente">≠</option>
                        </select>
                    </span>
                    <span class="alinear3"><input type="text" name="sMetaMetadataEntity"/>
                    </span>

                    <br/> 
                    <br/>
                    <span class="alinear1">  <?= $date ?>
                    </span>
                    <span class="alinear2"><select name="opMetaMetadataDate">
                            <option value="igual">=</option>
                            <option value="diferente">≠</option>
                        </select>
                    </span>
                    <span class="alinear3"><input type="text" class="date" name="sMetaMetadataDate"/>
                    </span>

                    <br/>
                </div>
                <br/>
                <span class="alinear1"><?= $metadataSchema ?>
                </span>
                <span class="alinear2"><select name="opMetaMetadataMetadataSchema">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><input type="text" name="sMetaMetadataMetadataSchema"/>
                </span>

                <br/>
                <br/>
                <span class="alinear1"><?= $language ?>
                </span>
                <span class="alinear2"><select name="opMetaMetadataLanguage">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><input type="text" id="inputSearchMetaMetadataLanguage" name="sMetaMetadataLanguage"/>
                </span>
                <span class="alinear4">
                    <select id="selectMetaMetadataLanguage" >
                        <option value='none'>Seleccionar</option>
                        <option value='es'>Spanish</option>
                        <option value='en'>English</option>
                        <option value='pt'>Portuguese</option>
                        <option value='fr'>French</option>
                        <option value='ru'>Russian</option>
                        <option value='ja'>Japanese</option>
                        <option value='la'>Latin</option>
                        <option value='aa'>Afar</option>
                        <option value='ab'>Abkhazian</option>
                        <option value='af'>Afrikaans</option>
                        <option value='am'>Amharic</option>
                        <option value='ar'>Arabic</option>
                        <option value='as'>Assamese</option>
                        <option value='ay'>Aymara</option>
                        <option value='az'>Azerbaijani</option>
                        <option value='ba'>Bashkir</option>
                        <option value='be'>Byelorussian</option>
                        <option value='bg'>Bulgarian</option>
                        <option value='bh'>Bihari</option>
                        <option value='bi'>Bislama</option>
                        <option value='bn'>Bengali;Bangla</option>
                        <option value='bo'>Tibetan</option>
                        <option value='br'>Breton</option>
                        <option value='ca'>Catalan</option>
                        <option value='co'>Corsican</option>
                        <option value='cs'>Czech</option>
                        <option value='cy'>Welsh</option>
                        <option value='da'>Danish</option>
                        <option value='de'>German</option>
                        <option value='dz'>Bhutani</option>
                        <option value='el'>Greek</option>              
                        <option value='eo'>Esperanto</option>                     
                        <option value='et'>Estonian</option>
                        <option value='eu'>Basque</option>
                        <option value='fa'>Persian</option>
                        <option value='fi'>Finnish</option>
                        <option value='fj'>Fiji</option>
                        <option value='fo'>Faeroese</option>
                        <option value='fy'>Frisian</option>
                        <option value='ga'>Irish</option>
                        <option value='gd'>Scots</option>
                        <option value='gl'>Galician</option>
                        <option value='gn'>Guarani</option>
                        <option value='gu'>Gujarati</option>
                        <option value='ha'>Hausa</option>
                        <option value='hi'>Hindi</option>
                        <option value='hr'>Croatian</option>
                        <option value='hu'>Hungarian</option>
                        <option value='hy'>Armenian</option>
                        <option value='ia'>Interlingua</option>
                        <option value='ie'>Interlingue</option>
                        <option value='ik'>Inupiak</option>
                        <option value='in'>Indonesian</option>
                        <option value='is'>Icelandic</option>
                        <option value='it'>Italian</option>
                        <option value='iw'>Hebrew</option>
                        <option value='ji'>Yiddish</option>
                        <option value='jw'>Javanese</option>
                        <option value='ka'>Georgian</option>
                        <option value='kk'>Kazakh</option>
                        <option value='kl'>Greenlandic</option>
                        <option value='km'>Cambodian</option>
                        <option value='kn'>Kannada</option>
                        <option value='ko'>Korean</option>
                        <option value='ks'>Kashmiri</option>
                        <option value='ku'>Kurdish</option>
                        <option value='ky'>Kirghiz</option>
                        <option value='ln'>Lingala</option>
                        <option value='lo'>Laothian</option>
                        <option value='lt'>Lithuanian</option>
                        <option value='lv'>Latvian,Lettish</option>
                        <option value='mg'>Malagasy</option>
                        <option value='mi'>Maori</option>
                        <option value='mk'>Macedonian</option>
                        <option value='ml'>Malayalam</option>
                        <option value='mn'>Mongolian</option>
                        <option value='mo'>Moldavian</option>
                        <option value='mr'>Marathi</option>
                        <option value='ms'>Malay</option>
                        <option value='mt'>Maltese</option>
                        <option value='my'>Burmese</option>
                        <option value='na'>Nauru</option>
                        <option value='ne'>Nepali</option>
                        <option value='nl'>Dutch</option>
                        <option value='no'>Norwegian</option>
                        <option value='oc'>Occitan</option>
                        <option value='om'>(Afan)Oromo</option>
                        <option value='or'>Oriya</option>
                        <option value='pa'>Punjabi</option>
                        <option value='pl'>Polish</option>
                        <option value='ps'>Pashto,Pushto</option>
                        <option value='qu'>Quechua</option>
                        <option value='rm'>Rhaeto-Romance</option>
                        <option value='rn'>Kirundi</option>
                        <option value='ro'>Romanian</option>
                        <option value='rw'>Kinyarwanda</option>
                        <option value='sa'>Sanskrit</option>
                        <option value='sd'>Sindhi</option>
                        <option value='sg'>Sangro</option>
                        <option value='sh'>Serbo-Croatian</option>
                        <option value='si'>Singhalese</option>
                        <option value='sk'>Slovak</option>
                        <option value='sl'>Slovenian</option>
                        <option value='sm'>Samoan</option>
                        <option value='sn'>Shona</option>
                        <option value='so'>Somali</option>
                        <option value='sq'>Albanian</option>
                        <option value='sr'>Serbian</option>
                        <option value='ss'>Siswati</option>
                        <option value='st'>Sesotho</option>
                        <option value='su'>Sundanese</option>
                        <option value='sv'>Swedish</option>
                        <option value='sw'>Swahili</option>
                        <option value='ta'>Tamil</option>
                        <option value='te'>Tegulu</option>
                        <option value='tg'>Tajik</option>
                        <option value='th'>Thai</option>
                        <option value='ti'>Tigrinya</option>
                        <option value='tk'>Turkmen</option>
                        <option value='tl'>Tagalog</option>
                        <option value='tn'>Setswana</option>
                        <option value='to'>Tonga</option>
                        <option value='tr'>Turkish</option>
                        <option value='ts'>Tsonga</option>
                        <option value='tt'>Tatar</option>
                        <option value='tw'>Twi</option>
                        <option value='uk'>Ukrainian</option>
                        <option value='ur'>Urdu</option>
                        <option value='uz'>Uzbek</option>
                        <option value='vi'>Vietnamese</option>
                        <option value='vo'>Volapuk</option>
                        <option value='wo'>Wolof</option>
                        <option value='xh'>Xhosa</option>
                        <option value='yo'>Yoruba</option>
                        <option value='zh'>Chinese</option>
                        <option value='zu'>Zulu</option>
                    </select>
                </span>



                <br/>
                <br/>
            </div>

            <!--Technical-->
            <div class="tituloDesplegable flip" idsCategoriaImg="sCategoriaImgTechnical" id="flipTechnical"><span id="sCategoriaImgTechnical" class='sCategoriaImg'></span><?= $technical ?></div>  
            <div class="margen" id="desplegableTechnical"> 
                <br/>
                <span class="alinear1" ><?= $label ?></span>
                <span class="alinear2" ><?= $operator ?></span>
                <span class="alinear3" ><?= $value ?></span>

                <br/> 
                <br/>
                <span class="alinear1"> <?= $size2 ?>
                </span>
                <span class="alinear2"><select name="opTechnicalSize">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><input type="text" name="sTechnicalSize"/>
                </span>

                <br/> 
                <br/>
                <span class="alinear1"> <?= $location2 ?>
                </span>
                <span class="alinear2"><select name="opTechnicalLocation">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><input type="text" name="sTechnicalLocation"/>
                </span>

                <br/> 
                <br/>
                <div class="bordeAmarillo">
                    <span class="alinear1"> <?= $type ?>
                    </span>
                    <span class="alinear2"><select name="opTechnicalType">
                            <option value="igual">=</option>
                            <option value="diferente">≠</option>
                        </select>
                    </span>
                    <span class="alinear3"><select  name="sTechnicalType">
                            <option value="none">Seleccionar</option>
                            <option value="1">sistema operativo </option>
                            <option value="2">navegador</option>      
                        </select>
                    </span>

                    <br/> 
                    <br/>
                    <span class="alinear1">  <?= $name ?>
                    </span>
                    <span class="alinear2"><select name="opTechnicalName">
                            <option value="igual">=</option>
                            <option value="diferente">≠</option>
                        </select>
                    </span>
                    <span class="alinear3"><input type="text" name="sTechnicalName"/>
                    </span>

                    <br/> 
                    <br/>
                    <span class="alinear1"><?= $minimumVersion ?>
                    </span>
                    <span class="alinear2"><select name="opTechnicalMinimumVersion">
                            <option value="igual">=</option>
                            <option value="diferente">≠</option>
                        </select>
                    </span>
                    <span class="alinear3"><input type="text" name="sTechnicalMinimumVersion"/>
                    </span>

                    <br/> 
                    <br/>
                    <span class="alinear1"><?= $maximumVersion ?>
                    </span>
                    <span class="alinear2"><select name="opTechnicalMaximumVersion">
                            <option value="igual">=</option>
                            <option value="diferente">≠</option>
                        </select>
                    </span>
                    <span class="alinear3"><input type="text" name="sTechnicalMaximumVersion"/>
                    </span>
                    <br/> 
                </div>
                <br/>
                <span class="alinear1"><?= $installationRemarks ?>
                </span>
                <span class="alinear2"><select name="opTechnicalInstallationRemarks">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><input type="text" name="sTechnicalInstallationRemarks"/>
                </span>

                <br/> 
                <br/>
                <span class="alinear1"><?= $otherPlatformRequirements ?>
                </span>
                <span class="alinear2"><select name="opTechnicalOtherPlatformRequirements">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><input type="text" name="sTechnicalOtherPlatformRequirements"/>
                </span>

                <br/> 
                <br/>
                <br/>
                <span class="alinear1"> <?= $duration ?>
                </span>
                <span class="alinear2"><select name="opTechnicalDuration">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><input type="text" name="sTechnicalDuration"/>
                </span>
                <br/> 
                <br/>
            </div>

            <!--Educational-->
            <div class="tituloDesplegable flip" idsCategoriaImg="sCategoriaImgEducational" id="flipEducational"><span id="sCategoriaImgEducational" class='sCategoriaImg'></span><?= $educational ?></div>  
            <div class="margen" id="desplegableEducational">  
                <br/>
                <span class="alinear1" ><?= $label ?></span>
                <span class="alinear2" ><?= $operator ?></span>
                <span class="alinear3" ><?= $value ?></span>   
                <span class="alinear4" ><?= $options ?></span>

                <br/> 
                <br/>
                <span class="alinear1"> <?= $interactivityType ?>
                </span>
                <span class="alinear2"><select name="opEducationalInteractivityType">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><select name="sEducationalInteractivityType">
                        <option value="none">Seleccionar</option>
                        <option value="1">activo</option>
                        <option value="2">expositivo</option>
                        <option value="3">combinado</option>  
                    </select>
                </span>

                <br/> 
                <br/>
                <span class="alinear1"> <?= $learningResourceType ?>
                </span>
                <span class="alinear2"><select name="opEducationalLearningResourceType">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><select  name="sEducationalLearningResourceType"> <option value="none">Seleccionar</option>
                        <option value="1">ejercicio</option>
                        <option value="2">simulación</option>
                        <option value="3">cuestionario</option>
                        <option value="4">diagrama</option>
                        <option value="5">figura</option>
                        <option value="6">gráfico</option> 
                        <option value="7">índice</option>
                        <option value="8">diapositiva</option>
                        <option value="9">tabla</option> 
                        <option value="10">texto narrativo</option>
                        <option value="11">examen</option>
                        <option value="12">experimento</option> 
                        <option value="13">planteamiento de problema </option> 
                        <option value="14">autoevaluación </option> 
                        <option value="15">conferencia</option> 
                    </select>
                </span>

                <br/> 
                <br/>
                <br/>
                <span class="alinear1"><?= $interactivityLevel ?>
                </span>
                <span class="alinear2"><select name="opEducationalInteractivityLevel">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><select name="sEducationalInteractivityLevel">
                        <option value="none">Seleccionar</option>
                        <option value="1">muy bajo</option> 
                        <option value="2">bajo</option>
                        <option value="3">medio</option>
                        <option value="4">alto</option>
                        <option value="5">muy alto</option>
                    </select>
                </span>

                <br/> 
                <br/>
                <span class="alinear1"> <?= $semanticDensity ?>
                </span>
                <span class="alinear2"><select name="opEducationalSemanticDensity">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><select  name="sEducationalSemanticDensity">
                        <option value="none">Seleccionar</option>
                        <option value="1">muy bajo</option> 
                        <option value="2">bajo</option>
                        <option value="3">medio</option>
                        <option value="4">alto</option>
                        <option value="5">muy alto</option>
                    </select>
                </span>

                <br/> 
                <br/>
                <span class="alinear1">  <?= $intendedEndUserRole ?>
                </span>
                <span class="alinear2"><select name="opEducationalIntendedEndUserRole">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><select  name="sEducationalIntendedEndUserRole">
                        <option value="none">Seleccionar</option>
                        <option value="1">profesor</option> 
                        <option value="2">autor</option>
                        <option value="3">aprendiz</option>
                        <option value="4">administrador</option>>
                    </select>
                </span>

                <br/> 
                <br/>
                <span class="alinear1"> <?= $context ?>
                </span>
                <span class="alinear2"><select name="opEducationalContext">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><select  name="sEducationalContext">
                        <option value="none">Seleccionar</option>
                        <option value="1">escuela</option> 
                        <option value="2">educación secundaria</option>
                        <option value="3">entrenamiento</option>
                        <option value="4">otro</option>
                    </select>
                </span>

                <br/> 
                <br/>
                <span class="alinear1"> <?= $typicalAgeRange ?>
                </span>
                <span class="alinear2"><select name="opEducationalTypicalAgeRange">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><input type="text" name="sEducationalTypicalAgeRange"/>
                </span>

                <br/> 
                <br/>
                <span class="alinear1"> <?= $difficulty ?>
                </span>
                <span class="alinear2"><select name="opEducationalDifficulty">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><select name="sEducationalDifficulty">
                        <option value="none">Seleccionar</option>
                        <option value="1">muy fácil</option> 
                        <option value="2">fácil</option>
                        <option value="3">medio</option>
                        <option value="4">difícil</option>
                        <option value="5">muy difícil</option>
                    </select>
                </span>                   

                <br/> 
                <br/>
                <span class="alinear1"><?= $typicalLearningTime ?>
                </span>
                <span class="alinear2"><select name="opEducationalTypicalLearningTime">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><input type="text" name="sEducationalTypicalLearningTime"/>
                </span>

                <br/> 
                <br/>
                <br/>
                <span class="alinear1"><?= $description ?>
                </span>
                <span class="alinear2"><select name="opEducationalDescription">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><textarea type="textarea" name="sEducationalDescription" /></textarea>

                </span>

                <br/>  <br/>  <br/> 


                <br/>

                <fieldset id="fsFSLSM">
                    FSLSM
                    <br/>
                    <br/>

                    <div class="eaFila"><input type="checkbox" class="eaFloatL" id="searchActivo" name="searchActivo"/>  <select name1="Activo" name2="Reflexivo" class="eaFloatL eaCriterio" n="1" name="eaCriterioActivo">
                            <option value="none"></option>
                            <option value="igual">=</option>
                            <option value="mayor">></option>
                            <option value="menor"><</option>
                            <option value="mayoroigual">≥</option>
                            <option value="menoroigual">≤</option>
                        </select>   <div class="eaFloatL marginTop"><div><input type="text" class="eaOcultarInput" disabled="disabled" id="inputDisabled1L" value="50%" name="easActivoL"/></div><div>Activo</div></div>  <div class="easFslsm wsFslsm" m="1"></div>  <div class="eaFloatL marginTop"><div><input type="text" class="eaOcultarInput" value="50%" id="inputDisabled1R" name="easActivoR"/></div><div>Reflexivo</div></div>
                        <textarea class="eaFloatL" id="eaTextArea1"></textarea> 
                    </div>

                    <div class="eaFila"><input type="checkbox"  class="eaFloatL" id="searchSensitvo" name="searchSensitvo"/>  <select name1="Sensitivo" name2="Intuitivo" class="eaFloatL eaCriterio" n="2" name="eaCriterioSensitivo">
                            <option value="none"></option>
                            <option value="igual">=</option>
                            <option value="mayor">></option>
                            <option value="menor"><</option>
                            <option value="mayoroigual">≥</option>
                            <option value="menoroigual">≤</option>
                        </select><div class="eaFloatL marginTop"><div><input type="text" class="eaOcultarInput" disabled="disabled" id="inputDisabled2L" value="50%" name="easSensitivoL"/></div><div>Sensitivo</div></div>  <div class="easFslsm wsFslsm" m="2"></div>  <div class="eaFloatL marginTop"><div><input type="text" class="eaOcultarInput" value="50%" id="inputDisabled2R" name="easSensitivoR"/></div><div>Intuitivo</div></div>
                        <textarea class="eaFloatL" id="eaTextArea2"></textarea> 

                    </div>
                    <div class="eaFila"><input type="checkbox"  class="eaFloatL" id="searchVisual" name="searchVisual"/>  <select name1="Visual" name2="Verbal" class="eaFloatL eaCriterio" n="3" name="eaCriterioVisual">
                            <option value="none"></option>
                            <option value="igual">=</option>
                            <option value="mayor">></option>
                            <option value="menor"><</option>
                            <option value="mayoroigual">≥</option>
                            <option value="menoroigual">≤</option>
                        </select><div class="eaFloatL marginTop"><div><input type="text" class="eaOcultarInput" disabled="disabled" id="inputDisabled3L" value="50%" name="easVisualL"/></div><div>Visual</div></div>  <div class="easFslsm wsFslsm" m="3"></div>  <div class="eaFloatL marginTop"><div><input type="text" class="eaOcultarInput" value="50%" id="inputDisabled3R" name="easVisualR"/></div><div>Verbal</div></div>
                        <textarea class="eaFloatL" id="eaTextArea3"></textarea> 
                    </div>
                    <div class="eaFila"><input type="checkbox"  class="eaFloatL" id="searchInductivo" name="searchInductivo"/>  <select name1="Inductivo" name2="Deductivo" class="eaFloatL eaCriterio" n="4" name="eaCriterioInductivo">
                            <option value="none"></option>
                            <option value="igual">=</option>
                            <option value="mayor">></option>
                            <option value="menor"><</option>
                            <option value="mayoroigual">≥</option>
                            <option value="menoroigual">≤</option>
                        </select><div class="eaFloatL marginTop"><div><input type="text" class="eaOcultarInput" disabled="disabled" id="inputDisabled4L" value="50%" name="easInductivoL"/></div><div>Inductivo</div></div>  <div class="easFslsm wsFslsm" m="4"></div>  <div class="eaFloatL marginTop"><div><input type="text" class="eaOcultarInput" value="50%" id="inputDisabled4R" name="easInductivoR"/></div><div>Deductivo</div></div>
                        <textarea class="eaFloatL" id="eaTextArea4"></textarea> 
                    </div>
                    <div class="eaFila"><input type="checkbox"  class="eaFloatL" id="searchSecuencial" name="searchSecuencial"/>  <select name1="Secuencial" name2="Global" class="eaFloatL eaCriterio" n="5" name="eaCriterioSecuencial">
                            <option value="none"></option>
                            <option value="igual">=</option>
                            <option value="mayor">></option>
                            <option value="menor"><</option>
                            <option value="mayoroigual">≥</option>
                            <option value="menoroigual">≤</option>
                        </select><div class="eaFloatL marginTop"><div><input type="text" class="eaOcultarInput" disabled="disabled" id="inputDisabled5L" value="50%" name="easSecuencialL"/></div><div>Secuencial</div></div>  <div class="easFslsm wsFslsm" m="5"></div>  <div class="eaFloatL marginTop"><div><input type="text" class="eaOcultarInput" value="50%" id="inputDisabled5R" name="easSecuencialR"/></div><div>Global</div></div>
                        <textarea class="eaFloatL" id="eaTextArea5"></textarea> 

                    </div>
                </fieldset>


                <fieldset id="fsVARK">
                    VARK
                    <br/>
                    <br/>

                    <div class="eaFila"><input type="checkbox" class="eaFloatL" id="searchVisualVark" name="searchVisualVark"/>  <select name1="Visual"class="eaFloatL eaCriterioVark" n="1" name="eaCriterioVisualVark">
                            <option value="none"></option>
                            <option value="igual">=</option>
                            <option value="mayor">></option>
                            <option value="menor"><</option>
                            <option value="mayoroigual">≥</option>
                            <option value="menoroigual">≤</option>
                        </select>   <div class="eaFloatL marginTop"><div><input type="text" class="eaOcultarInput" disabled="disabled" id="inputDisabledVark1" value="50%" name="easVisualVarkL"/></div><div>Visual</div></div>  <div class="easVark wsVark" m="1"></div>  
                        <textarea class="eaFloatL" id="eaTextAreaVark1"></textarea> 
                    </div>

                    <div class="eaFila"><input type="checkbox" class="eaFloatL" id="searchAuditivoVark" name="searchAuditivoVark"/>  <select name1="Auditivo" class="eaFloatL eaCriterioVark" n="2" name="eaCriterioAuditivoVark">
                            <option value="none"></option>
                            <option value="igual">=</option>
                            <option value="mayor">></option>
                            <option value="menor"><</option>
                            <option value="mayoroigual">≥</option>
                            <option value="menoroigual">≤</option>
                        </select>   <div class="eaFloatL marginTop"><div><input type="text" class="eaOcultarInput" disabled="disabled" id="inputDisabledVark2" value="50%" name="easAuditivoVarkL"/></div><div>Auditivo</div></div>  <div class="easVark wsVark" m="2"></div>  
                        <textarea class="eaFloatL" id="eaTextAreaVark2"></textarea> 
                    </div>

                    <div class="eaFila"><input type="checkbox" class="eaFloatL" id="searchLector" name="searchLectorVark"/>  <select name1="Lector" class="eaFloatL eaCriterioVark" n="3" name="eaCriterioLectorVark">
                            <option value="none"></option>
                            <option value="igual">=</option>
                            <option value="mayor">></option>
                            <option value="menor"><</option>
                            <option value="mayoroigual">≥</option>
                            <option value="menoroigual">≤</option>
                        </select>   <div class="eaFloatL marginTop"><div><input type="text" class="eaOcultarInput" disabled="disabled" id="inputDisabledVark3" value="50%" name="easLectorVarkL"/></div><div>Lector</div></div>  <div class="easVark wsVark" m="3"></div>  
                        <textarea class="eaFloatL" id="eaTextAreaVark3"></textarea> 
                    </div>

                    <div class="eaFila"><input type="checkbox" class="eaFloatL" id="searchKinestetico" name="searchKinesteticoVark"/>  <select name1="Kinestético" class="eaFloatL eaCriterioVark" n="4" name="eaCriterioKinesteticoVark">
                            <option value="none"></option>
                            <option value="igual">=</option>
                            <option value="mayor">></option>
                            <option value="menor"><</option>
                            <option value="mayoroigual">≥</option>
                            <option value="menoroigual">≤</option>
                        </select>   <div class="eaFloatL marginTop"><div><input type="text" class="eaOcultarInput" disabled="disabled" id="inputDisabledVark4" value="50%" name="easKinesteticoVarkL"/></div><div>Kinestético</div></div>  <div class="easVark wsVark" m="4"></div>  
                        <textarea class="eaFloatL" id="eaTextAreaVark4"></textarea> 
                    </div>
                </fieldset>












                <span class="alinear1"><?= $language ?>
                </span>
                <span class="alinear2"><select name="opEducationalLanguage">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><input type="text" id="inputSearchEducationalLanguage" name="sEducationalLanguage"/>
                </span>
                <span class="alinear4">
                    <select id="selectEducationalLanguage" >
                        <option value='none'>Seleccionar</option>
                        <option value='es'>Spanish</option>
                        <option value='en'>English</option>
                        <option value='pt'>Portuguese</option>
                        <option value='fr'>French</option>
                        <option value='ru'>Russian</option>
                        <option value='ja'>Japanese</option>
                        <option value='la'>Latin</option>
                        <option value='aa'>Afar</option>
                        <option value='ab'>Abkhazian</option>
                        <option value='af'>Afrikaans</option>
                        <option value='am'>Amharic</option>
                        <option value='ar'>Arabic</option>
                        <option value='as'>Assamese</option>
                        <option value='ay'>Aymara</option>
                        <option value='az'>Azerbaijani</option>
                        <option value='ba'>Bashkir</option>
                        <option value='be'>Byelorussian</option>
                        <option value='bg'>Bulgarian</option>
                        <option value='bh'>Bihari</option>
                        <option value='bi'>Bislama</option>
                        <option value='bn'>Bengali;Bangla</option>
                        <option value='bo'>Tibetan</option>
                        <option value='br'>Breton</option>
                        <option value='ca'>Catalan</option>
                        <option value='co'>Corsican</option>
                        <option value='cs'>Czech</option>
                        <option value='cy'>Welsh</option>
                        <option value='da'>Danish</option>
                        <option value='de'>German</option>
                        <option value='dz'>Bhutani</option>
                        <option value='el'>Greek</option>              
                        <option value='eo'>Esperanto</option>                     
                        <option value='et'>Estonian</option>
                        <option value='eu'>Basque</option>
                        <option value='fa'>Persian</option>
                        <option value='fi'>Finnish</option>
                        <option value='fj'>Fiji</option>
                        <option value='fo'>Faeroese</option>
                        <option value='fy'>Frisian</option>
                        <option value='ga'>Irish</option>
                        <option value='gd'>Scots</option>
                        <option value='gl'>Galician</option>
                        <option value='gn'>Guarani</option>
                        <option value='gu'>Gujarati</option>
                        <option value='ha'>Hausa</option>
                        <option value='hi'>Hindi</option>
                        <option value='hr'>Croatian</option>
                        <option value='hu'>Hungarian</option>
                        <option value='hy'>Armenian</option>
                        <option value='ia'>Interlingua</option>
                        <option value='ie'>Interlingue</option>
                        <option value='ik'>Inupiak</option>
                        <option value='in'>Indonesian</option>
                        <option value='is'>Icelandic</option>
                        <option value='it'>Italian</option>
                        <option value='iw'>Hebrew</option>
                        <option value='ji'>Yiddish</option>
                        <option value='jw'>Javanese</option>
                        <option value='ka'>Georgian</option>
                        <option value='kk'>Kazakh</option>
                        <option value='kl'>Greenlandic</option>
                        <option value='km'>Cambodian</option>
                        <option value='kn'>Kannada</option>
                        <option value='ko'>Korean</option>
                        <option value='ks'>Kashmiri</option>
                        <option value='ku'>Kurdish</option>
                        <option value='ky'>Kirghiz</option>
                        <option value='ln'>Lingala</option>
                        <option value='lo'>Laothian</option>
                        <option value='lt'>Lithuanian</option>
                        <option value='lv'>Latvian,Lettish</option>
                        <option value='mg'>Malagasy</option>
                        <option value='mi'>Maori</option>
                        <option value='mk'>Macedonian</option>
                        <option value='ml'>Malayalam</option>
                        <option value='mn'>Mongolian</option>
                        <option value='mo'>Moldavian</option>
                        <option value='mr'>Marathi</option>
                        <option value='ms'>Malay</option>
                        <option value='mt'>Maltese</option>
                        <option value='my'>Burmese</option>
                        <option value='na'>Nauru</option>
                        <option value='ne'>Nepali</option>
                        <option value='nl'>Dutch</option>
                        <option value='no'>Norwegian</option>
                        <option value='oc'>Occitan</option>
                        <option value='om'>(Afan)Oromo</option>
                        <option value='or'>Oriya</option>
                        <option value='pa'>Punjabi</option>
                        <option value='pl'>Polish</option>
                        <option value='ps'>Pashto,Pushto</option>
                        <option value='qu'>Quechua</option>
                        <option value='rm'>Rhaeto-Romance</option>
                        <option value='rn'>Kirundi</option>
                        <option value='ro'>Romanian</option>
                        <option value='rw'>Kinyarwanda</option>
                        <option value='sa'>Sanskrit</option>
                        <option value='sd'>Sindhi</option>
                        <option value='sg'>Sangro</option>
                        <option value='sh'>Serbo-Croatian</option>
                        <option value='si'>Singhalese</option>
                        <option value='sk'>Slovak</option>
                        <option value='sl'>Slovenian</option>
                        <option value='sm'>Samoan</option>
                        <option value='sn'>Shona</option>
                        <option value='so'>Somali</option>
                        <option value='sq'>Albanian</option>
                        <option value='sr'>Serbian</option>
                        <option value='ss'>Siswati</option>
                        <option value='st'>Sesotho</option>
                        <option value='su'>Sundanese</option>
                        <option value='sv'>Swedish</option>
                        <option value='sw'>Swahili</option>
                        <option value='ta'>Tamil</option>
                        <option value='te'>Tegulu</option>
                        <option value='tg'>Tajik</option>
                        <option value='th'>Thai</option>
                        <option value='ti'>Tigrinya</option>
                        <option value='tk'>Turkmen</option>
                        <option value='tl'>Tagalog</option>
                        <option value='tn'>Setswana</option>
                        <option value='to'>Tonga</option>
                        <option value='tr'>Turkish</option>
                        <option value='ts'>Tsonga</option>
                        <option value='tt'>Tatar</option>
                        <option value='tw'>Twi</option>
                        <option value='uk'>Ukrainian</option>
                        <option value='ur'>Urdu</option>
                        <option value='uz'>Uzbek</option>
                        <option value='vi'>Vietnamese</option>
                        <option value='vo'>Volapuk</option>
                        <option value='wo'>Wolof</option>
                        <option value='xh'>Xhosa</option>
                        <option value='yo'>Yoruba</option>
                        <option value='zh'>Chinese</option>
                        <option value='zu'>Zulu</option>
                    </select>
                </span>


                <br/>
                <br/>
            </div>

            <!--Rights-->
            <div class="tituloDesplegable flip" idsCategoriaImg="sCategoriaImgRights" id="flipRights"><span id="sCategoriaImgRights" class='sCategoriaImg'></span><?= $rights ?></div>  
            <div class="margen" id="desplegableRights">
                <br/>
                <span class="alinear1" ><?= $label ?></span>
                <span class="alinear2" ><?= $operator ?></span>
                <span class="alinear3" ><?= $value ?></span>

                <br/> 
                <br/>
                <span class="alinear1"> <?= $cost ?>
                </span>
                <span class="alinear2"><select name="opRightsCost">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><select name="sRightsCost">
                        <option value="none">Seleccionar</option>
                        <option value="1">si</option>
                        <option value="2">no</option>
                    </select>
                </span>

                <br/> 
                <br/>
                <span class="alinear1"><?= $copyrightAndOtherRestrictions ?>
                </span>
                <span class="alinear2"><select name="opRightsCopyrightandOtherRestrictions">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><select name="sRightsCopyrightandOtherRestrictions">
                        <option value="none">Seleccionar</option>
                        <option value="1">si</option>
                        <option value="2">no</option>
                    </select>
                </span>

                <br/>
                <br/> 
                <br/>
                <span class="alinear1"><?= $description ?>
                </span>
                <span class="alinear2"><select name="opRightsDescription">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><textarea type="textarea" name="sRightsDescription"></textarea>
                </span>
                <br/> 
                <br/> 
                <br/>
            </div>

            <!--Relation-->
            <div class="tituloDesplegable flip" idsCategoriaImg="sCategoriaImgRelation" id="flipRelation"><span id="sCategoriaImgRelation" class='sCategoriaImg'></span><?= $relation ?></div>  
            <div class="margen" id="desplegableRelation">
                <br/>
                <span class="alinear1" ><?= $label ?></span>
                <span class="alinear2" ><?= $operator ?></span>
                <span class="alinear3" ><?= $value ?></span>

                <br/> 
                <br/>
                <span class="alinear1"><?= $kind ?>
                </span>
                <span class="alinear2"><select name="opRelationKind">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><select name="sRelationKind">
                        <option value="none">Seleccionar</option>
                        <option value="1">es parte de</option>
                        <option value="2"> tiene parte </option>
                        <option value="3">es versión de </option>
                        <option value="4"> tiene versión </option>
                        <option value="5">es formato de</option>
                        <option value="6">tiene formato</option>
                        <option value="7">referencia</option>
                        <option value="8">es referenciado por</option>
                        <option value="9">se basa en</option>
                        <option value="10">es base para</option>
                        <option value="11">requiere</option>
                        <option value="12">es requerido por </option>
                    </select>
                </span>

                <br/> 
                <br/>
                <div class="bordeAmarillo">
                    <span class="alinear1"><?= $catalog ?>
                    </span>
                    <span class="alinear2"><select name="opRelationCatalog">
                            <option value="igual">=</option>
                            <option value="diferente">≠</option>
                        </select>
                    </span>
                    <span class="alinear3"><input type="text" name="sRelationCatalog"/>
                    </span>

                    <br/> 
                    <br/>
                    <span class="alinear1"><?= $entry ?>
                    </span>
                    <span class="alinear2"><select name="opRelationEntry">
                            <option value="igual">=</option>
                            <option value="diferente">≠</option>
                        </select>
                    </span>
                    <span class="alinear3"><input type="text" name="sRelationEntry"/>
                    </span>

                    <br/> </div>
                <br/>
                <span class="alinear1"><?= $description ?>
                </span>
                <span class="alinear2"><select name="opRelationDescription">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><textarea type="textarea" name="sRelationDescription"></textarea>
                </span>
                <br/>
                <br/>
                <br/>

                <br/>
            </div>

            <!--Annotation-->
            <div class="tituloDesplegable flip" idsCategoriaImg="sCategoriaImgAnnotation" id="flipAnnotation"><span id="sCategoriaImgAnnotation" class='sCategoriaImg'></span><?= $annotation ?></div>  
            <div class="margen" id="desplegableAnnotation">
                <br/>
                <span class="alinear1" ><?= $label ?></span>
                <span class="alinear2" ><?= $operator ?></span>
                <span class="alinear3" ><?= $value ?></span>

                <br/> 
                <br/>
                <span class="alinear1"><?= $entity ?>
                </span>
                <span class="alinear2"><select name="opAnnotationEntity">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><input type="text" name="sAnnotationEntity"/>
                </span>

                <br/> 
                <br/>
                <span class="alinear1"><?= $date ?>
                </span>
                <span class="alinear2"><select name="opAnnotationDate">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><input type="text" class="date" name="sAnnotationDate"/>
                </span>

                <br/> 
                <br/>
                <span class="alinear1"><?= $description ?>
                </span>
                <span class="alinear2"><select name="opAnnotationDescription">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><textarea type="textarea" name="sAnnotationDescription"></textarea>
                </span>
                <br/>
                <br/>
                <br/>
            </div>

            <!--Classification-->
            <div class="tituloDesplegable flip" idsCategoriaImg="sCategoriaImgClassification" id="flipClassification"><span id="sCategoriaImgClassification" class='sCategoriaImg'></span><?= $classification ?></div>  
            <div class="margen" id="desplegableClassification"> 
                <br/>
                <span class="alinear1" ><?= $label ?></span>
                <span class="alinear2" ><?= $operator ?></span>
                <span class="alinear3" ><?= $value ?></span>

                <br/> 
                <br/>
                <span class="alinear1"><?= $purpose ?>
                </span>
                <span class="alinear2"><select name="opClassificationPurpose">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><select name="sClassificationPurpose">
                        <option value="none">Seleccionar</option>
                        <option value="1">disciplina</option>
                        <option value="2">idea</option>
                        <option value="3">prerrequisito</option>
                        <option value="4">objetivo educativo</option>
                        <option value="5">accesibilidad</option>
                        <option value="6">restricciones</option> 
                        <option value="7">nivel educativo </option>
                        <option value="8">nivel de habilidad </option> 
                        <option value="9">nivel de seguridad</option>
                        <option value="10">competencia</option>
                    </select>
                </span>

                <br/> 
                <br/>
                <div class="bordeAmarillo">
                    <span class="alinear1"><?= $source ?>
                    </span>
                    <span class="alinear2"><select name="opClassificationSource">
                            <option value="igual">=</option>
                            <option value="diferente">≠</option>
                        </select>
                    </span>
                    <span class="alinear3"><input type="text" name="sClassificationSource"/>
                    </span>

                    <br/> 
                    <br/>
                    <span class="alinear1"><?= $entry ?>
                    </span>
                    <span class="alinear2"><select name="opClassificationEntry">
                            <option value="igual">=</option>
                            <option value="diferente">≠</option>
                        </select>
                    </span>
                    <span class="alinear3"><input type="text" name="sClassificationEntry"/>
                    </span>

                    <br/> 
                </div>
                <br/>
                <span class="alinear1"><?= $description ?>
                </span>
                <span class="alinear2"><select name="opClassificationDescription">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><textarea type="textarea" name="sClassificationDescription"></textarea>
                </span>
                <br/>    <br/> 
                <br/> 
                <br/>
                <span class="alinear1"><?= $keywords ?>
                </span>
                <span class="alinear2"><select name="opClassificationKeyword">
                        <option value="igual">=</option>
                        <option value="diferente">≠</option>
                    </select>
                </span>
                <span class="alinear3"><input type="text" name="sClassificationKeyword"/>
                </span>

                <br/>
                <br/>
            </div>
        </div>
    </form>
</div>