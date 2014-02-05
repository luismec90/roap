


<!-------------->
<script>
    $(document).ready(function() {
        //////////// select NBC///////
        $(".selectNbcArea").live("change",function () {
            var n=$(this).attr("n");
            $("#ssNbc"+n+"").html("");
            $("#ssNbc"+n+"").attr('disabled','');
            $("#sNbc"+n+"").removeAttr('disabled');
            var valor=$(this).val();
              
            if(valor=="01"){
                $("#sNbc"+n+"").html("<option value='01.00'><?= $select ?></option><option value='01.01'>Agronomía</option><option value='01.02'>Medicina Veterinaria</option><option value='01.03'>Zootecnia</option>");
            }
            else if(valor=="02"){
                $("#sNbc"+n+"").html("<option value='02.00'><?= $select ?></option><option value='02.01'>Artes Plásticas, Visuales y afines</option><option value='02.02'>Artes Representativas</option><option value='02.03'>Diseño</option><option value='02.04'>Música</option><option value='02.05'>Otros programas asociados a Bellas Artes</option><option value='02.06'>Publicidad y afines</option>");
            }
            else if(valor=="03"){
                $("#sNbc"+n+"").html("<option value='03.00 '><?= $select ?></option><option value='03.01'>Educación</option>");
            }
            else if(valor=="04"){
                $("#sNbc"+n+"").html("<option value='04.00 '><?= $select ?></option><option value='04.01'>Bacteriología</option><option value='04.02'>Enfermería</option><option value='04.03'>Instrumentación quirúrgica</option><option value='04.04'>Medicina</option><option value='04.05'>Nutrición y Dietética</option><option value='04.06'>Odontología</option><option value='04.07'>Optometría, otros programas de Ciencias de la Salud</option><option value='04.08'>Salud Pública</option><option value='04.09'>Terapias</option>");
            }
            else if(valor=="05"){
                $("#sNbc"+n+"").html("<option value='05.00 '><?= $select ?></option><option value='05.01'>Antropología, Artes Liberales</option><option value='05.02'>Bibliotecología, otros de Ciencias Sociales y Humanas</option><option value='05.03'>Ciencia Política, Relaciones Internacionales</option><option value='05.04'>Comunicación Social, Periodismo y afines</option><option value='05.05'>Deportes, Educación Física y Recreación</option><option value='05.06'>Derecho y afines</option><option value='05.07'>Filosofía, Teología y afines</option><option value='05.08'>Formación relacionada con el campo Militar o Policial</option><option value='05.09'>Geografía e Historia</option><option value='05.10'>Lenguas Modernas, Literatura, Lingüística y afines</option><option value='05.11'>Psicología</option><option value='05.12'>Sociología, Trabajo Social y afines</option>");
            }
            else if(valor=="06"){
                $("#sNbc"+n+"").html("<option value='06.00 '><?= $select ?></option><option value='06.01'>Administración</option><option value='06.02'>Contaduría Pública</option><option value='06.03'>Economía</option>");
            }
            else if(valor=="07"){
                $("#sNbc"+n+"").html("<option value='07.00 '><?= $select ?></option><option value='07.01'>Arquitectura y afines</option><option value='07.02'>Ingeniería Administrativa y afines</option><option value='07.03'>Ingeniería Agrícola, Forestal y afines</option><option value='07.04'>Ingeniería Agroindustrial, Alimentos y afines</option><option value='07.05'>Ingeniería Agronómica, Pecuaria y afines</option><option value='07.06'>Ingeniería Ambiental, Sanitaria y afines</option><option value='07.07'>Ingeniería Biomédica y afines</option><option value='07.08'>Ingeniería Civil y afines</option><option value='07.09'>Ingeniería De Minas, Metalurgia y afines</option><option value='07.10'>Ingeniería De Sistemas, Telemática y afines</option><option value='07.11'>Ingeniería Eléctrica y afines</option><option value='07.12'>Ingeniería Electrónica, Telecomunicaciones y afines</option><option value='07.13'>Ingeniería Industrial y afines</option><option value='07.14'>Ingeniería Mecánica y afines</option><option value='07.15'>Ingeniería Química y afines</option><option value='07.16'>Otras Ingenierías</option>");
            }
            else if(valor=="08"){
                $("#sNbc"+n+"").html("<option value='08.00 '><?= $select ?></option><option value='08.01'>Biología, Microbiología y afines</option><option value='08.02'>Física</option><option value='08.03'>Geología, otros programas de Ciencias Naturales</option><option value='08.04'>Matemáticas, Estadística y afines</option><option value='08.05'>Química y afines</option>");
            }
            else {
                $("#sNbc"+n+"").html("");
                $("#sNbc"+n+"").attr('disabled','');
                $("#ssNbc"+n+"").html("");
            }
        });

        $(".selectSubarea").live("change",function () {
            var n=$(this).attr("n");
            $("#ssNbc"+n+"").html("");
            $("#ssNbc"+n+"").attr('disabled','');
            var valor=$("#sNbc"+n+"").val();
            if(valor=="02.03"){   
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='02.03.00 '><?= $select ?></option><option value='02.03.01'>Gráfico</option><option value='02.03.02'>Industrial</option><option value='02.03.03'>Joyas</option><option value='02.03.04'>Moda</option><option value='02.03.05'>Textil</option>");
            }
            else if(valor=="03.01"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='03.01.00 '><?= $select ?></option><option value='03.01.01'>Ciencias naturales, matemáticas, tecnología e informática</option><option value='03.01.02'>Ciencias sociales, humanas, religiosas y afines</option><option value='03.01.03'>Educación artística y educación física, recreación y deporte</option><option value='03.01.04'>Educación básica</option><option value='03.01.05'>Educación básica y media</option><option value='03.01.06'>Educación media</option><option value='03.01.07'>Educación para otras modalidades</option><option value='03.01.08'>Educación preescolar</option><option value='03.01.09'>Educación técnica</option><option value='03.01.10'>Formación para la educación</option>");
            }
            else if(valor=="04.04"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='04.04.00 '><?= $select ?></option><option value='04.04.01'> Alergología</option><option value='04.04.02'> Anestesia </option><option value='04.04.03'>Cabeza y cuello </option><option value='04.04.04'> Cardiología </option><option value='04.04.05'> Cardiotoráxica </option><option value='04.04.06'> Cardiovascular </option><option value='04.04.07'> Cirugía </option><option value='04.04.08'> Coloproctología </option><option value='04.04.09'>Columna </option><option value='04.04.10'> Córnea </option><option value='04.04.11'> Cuidados intensivos </option><option value='04.04.12'>Dermatología </option><option value='04.04.13'> Dolor </option><option value='04.04.14'>Ecocardiología </option><option value='04.04.15'> Endocrinología</option><option value='04.04.16'>Fisiatría </option><option value='04.04.17'> Fisiología </option><option value='04.04.18'> Gastroenterología </option><option value='04.04.19'>Gastrointestinal </option><option value='04.04.20'> Genética </option><option value='04.04.21'> Geriatría </option><option value='04.04.22'> Ginecobstetricia </option><option value='04.04.23'> Glaucoma </option><option value='04.04.24'> Hematología </option><option value='04.04.25'> Hemodinamia </option><option value='04.04.26'> Imagen Corporal </option><option value='04.04.27'> Imagenología </option><option value='04.04.28'> Infectología </option><option value='04.04.29'> Intervencionista</option><option value='04.04.30'> Laboratorio Clínico</option><option value='04.04.31'> Laparoscópica</option><option value='04.04.32'> Mama </option><option value='04.04.33'> Mano </option><option value='04.04.34'> Medicina Aereoespacial </option><option value='04.04.35'> Medicina de Urgencias</option><option value='04.04.36'> Medicina del Deporte </option><option value='04.04.37'> Medicina del Trabajo </option><option value='04.04.38'> Medicina Estética</option><option value='04.04.39'> Medicina Familiar </option><option value='04.04.40'> Medicina Forense </option><option value='04.04.41'> Medicina Interna</option><option value='04.04.42'> Medicina Nuclear </option><option value='04.04.43'> Nefrología </option><option value='04.04.44'> Neonatología </option><option value='04.04.45'> Neumología </option><option value='04.04.46'> Neurocirugía</option><option value='04.04.47'> Neurofisiología</option><option value='04.04.48'> Neurología </option><option value='04.04.49'> Oftalmología </option><option value='04.04.50'> Oncología </option><option value='04.04.51'> Oncología - Hematología </option><option value='04.04.52'> Ortopedia </option><option value='04.04.53'> Otología </option><option value='04.04.54'> Otorrinolaringología </option><option value='04.04.55'> Patología </option><option value='04.04.56'> Pediatría </option><option value='04.04.57'> Plástica </option><option value='04.04.58'> Psiquiatría</option><option value='04.04.59'> Psiquiatría de Enlace </option><option value='04.04.60'> Radioterapia </option><option value='04.04.61'> Reproducción Humana </option><option value='04.04.62'> Reumatología </option><option value='04.04.63'> Rodilla </option><option value='04.04.64'> Tórax </option><option value='04.04.65'> Toxicología </option><option value='04.04.66'> Trasplantes </option><option value='04.04.67'> Urología </option><option value='04.04.68'> Vascular</option>");
            }
            else if(valor=="04.06"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='04.06.00 '><?= $select ?></option><option value='04.06.01'>Cirugía Oral, Maxilofacial </option><option value='04.06.02'> Endodoncia </option><option value='04.06.03'> Estomatología, Patología Oral y afines </option><option value='04.06.04'> Implantología </option><option value='04.06.05'> Laboratorio Dental </option><option value='04.06.06'> Odontopediatría </option><option value='04.06.07'> Ortodoncia </option><option value='04.06.08'> Periodoncia </option><option value='04.06.09'> Prostodoncia </option><option value='04.06.10'> Rehabilitación Oral</option>");
            }
            else if(valor=="04.07"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='04.07.00 '><?= $select ?></option><option value='04.07.01'>Optometría </option><option value='04.07.02'> Otros programas de Ciencias de la Salud  </option>");
            }
            else if(valor=="04.08"){ 
                $("#ssNbc"+n+"").html("<option value='04.08.00 '><?= $select ?></option><option value='04.08.01'>Epidemiología </option><option value='04.08.02'> Salud Ambienta</option><option value='04.08.03'> Salud Comunitaria</option><option value='04.08.04'> Salud Familiar</option><option value='04.08.05'> Salud Mental </option><option value='04.08.06'> Salud Ocupacional</option>");
            }
            else if(valor=="04.09"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='04.09.00 '><?= $select ?></option><option value='04.09.01'> Fisioterapia</option><option value='04.09.02'> Fonoaudiología</option><option value='04.09.03'> Terapia ocupacional</option><option value='04.09.04'> Terapia respiratoria</option>");
            }
            else if(valor=="05.01"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='05.01.00 '><?= $select ?></option><option value='05.01.01'> Antropología </option><option value='05.01.02'> Artes Liberales</option>");
            }
            else if(valor=="05.02"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='05.02.00 '><?= $select ?></option><option value='05.02.01'> Bibliotecología </option><option value='05.02.02'> Otros de Ciencias Sociales y Humanas</option>");
            }
            else if(valor=="05.04"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='05.04.00 '><?= $select ?></option><option value='05.04.01'> Periodismo </option>");
            }
            else if(valor=="05.06"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='05.06.00 '><?= $select ?></option><option value='05.06.01'> Criminalística </option><option value='05.06.02'> Seguros</option>");
            }
            else if(valor=="05.07"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='05.07.00 '><?= $select ?></option><option value='05.07.01'> Filosofía </option><option value='05.07.02'> Teología y afines</option>");
            }
            else if(valor=="05.09"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='05.09.00 '><?= $select ?></option><option value='05.09.01'> Geografía </option><option value='05.09.02'> Historia</option>");
            }
            else if(valor=="05.10"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='05.10.00 '><?= $select ?></option><option value='05.10.01'> Lenguas Modernas </option><option value='05.10.02'> Literatura, Lingüística y afines</option>");
            }
            else if(valor=="05.12"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='05.12.00 '><?= $select ?></option><option value='05.12.01'> Familia </option><option value='05.12.02'> Gerontología</option><option value='05.12.03'> Sociología </option><option value='05.12.04'> Trabajo Social</option>");
            }
            else if(valor=="06.01"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<select><option value='06.01.00 '><?= $select ?></option><option value='06.01.01'> Control Interno</option><option value='06.01.02'> Finanzas</option><option value='06.01.03'> Formulación, Evaluación y Gestión de Proyectos </option><option value='06.01.04'> Mercados</option><option value='06.01.05'> Negocios Internacionales</option><option value='06.01.06'> Recursos Humanos</option><option value='06.01.07'> Sector Público</option><option value='06.01.08'> Sector Turismo</option></select>");
            }
            else if(valor=="06.02"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='06.02.00 '><?= $select ?></option><option value='06.02.01'> Auditoría de Sistemas</option><option value='06.02.02'> Auditoría en Salud</option>");
            }
            else if(valor=="06.03"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='06.03.00 '><?= $select ?></option><option value='06.03.01'> Comercio Exterior</option><option value='06.03.02'> Formulación, Evaluación y Gestión de Proyectos</option>");
            }
            else if(valor=="07.03"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='07.03.00 '><?= $select ?></option><option value='07.03.01'> Ingeniería Agrícola </option><option value='07.03.02'> Ingeniería Forestal</option>");
            }
            else if(valor=="07.04"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='07.04.00 '><?= $select ?></option><option value='07.04.01'> Alimentos</option>");
            }
            else if(valor=="07.05"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='07.05.00 '><?= $select ?></option><option value='07.05.01'> Ingeniería Agronómica </option><option value='07.05.02'> Ingeniería Pecuaria</option>");
            }
            else if(valor=="07.06"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='07.06.00 '><?= $select ?></option><option value='07.06.01'> Administración Ambiental</option>");
            }
            else if(valor=="07.10"){
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='07.10.00 '><?= $select ?></option><option value='07.10.01'> Administración de Sistemas de Información</option>");
            }
            else if(valor=="07.12"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='07.12.00 '><?= $select ?></option><option value='07.12.01'> Ingeniería en Telecomunicaciones</option>");
            }
            else if(valor=="07.13"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='07.13.00 '><?= $select ?></option><option value='07.13.01'> Calidad </option><option value='07.13.02'> Higiene y Seguridad Industrial </option><option value='07.13.03'> Logística</option>");
            }
            else if(valor=="07.16"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='07.16.00 '><?= $select ?></option><option value='07.16.01'> Sistemas de Información Geográfica</option>");
            }
            else if(valor=="08.01"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='08.01.00 '><?= $select ?></option><option value='08.01.01'> Biología y afines </option><option value='08.01.02'> Microbiología y afines</option>");
            }
            else if(valor=="08.03"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='08.03.00 '><?= $select ?></option><option value='08.03.01'> Geología </option><option value='08.03.02'> Otros programas de Ciencias Naturales</option>");
            }
            else if(valor=="08.04"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='08.04.00 '><?= $select ?></option><option value='08.04.01'> Estadística </option><option value='08.04.02'> Matemáticas</option>");
            }
            else if(valor=="08.05"){ 
                $("#ssNbc"+n+"").removeAttr('disabled');
                $("#ssNbc"+n+"").html("<option value='08.05.00 '><?= $select ?></option><option value='08.05.01'> Farmacia </option>");
            }
        });
        
        $(".enviarNbc").live("click",function(event){ 
            var n=$(this).attr("n");
            if(n==0){
                $("#inputgeneralCatalog").attr('value', 'NBC');
            }
            else{
                $("#inputgeneralCatalog"+n+"").attr('value', 'NBC');
            }        
            if( $("#ssNbc"+n+"").val()==null){
                if($("#sNbc"+n+"").val()=="<?= $select ?>"){
                    alert("Selección inválida")
                    return false;
                }
                if(n==0){
                    $("#inputgeneralEntry").attr('value',  $("#sNbc"+n+"").val());
                }
                else{
                    $("#inputgeneralEntry"+n+"").attr('value',  $("#sNbc"+n+"").val());    
                }
            }
            else{
                if($("#ssNbc"+n+"").val()=="<?= $select ?>"){
                    alert("Selección inválida")
                    return false;
                }
                if(n==0){
                    $("#inputgeneralEntry").attr('value',  $("#ssNbc"+n+"").val());
                }
                else{
                    $("#inputgeneralEntry"+n+"").attr('value',  $("#ssNbc"+n+"").val());
                }
            }

            $("#desplegableNbc"+n+"").hide();

        });
            
        $(".cancelarNbc").live("click",function(){ 
            var n=$(this).attr("n");
            $("#desplegableNbc"+n+"").hide();
        });
        
        //        Estilos de Aprendizaje
                
        $( ".sFslsm" ).slider({
            value:50,
            min: 0,
            max: 100,
            step: 1,
            slide: function( event, ui ) {
                var n=$(this).attr("n");
                var m=$(this).attr("m");
                //                alert(ui.value);
                var r=100-ui.value;
                $("#fslsmR"+n+"_"+m+"L").val(ui.value +"%");
                $("#fslsmR"+n+"_"+m+"R").val(r+"%");
            }
        });
        
        $( ".sVark" ).slider({
            value:50,
            min: 0,
            max: 100,
            step: 1,
            slide: function( event, ui ) {
                var n=$(this).attr("n");
                var m=$(this).attr("m");
                var r2=100-ui.value;
                $( "#varkR"+n+"_"+m+"").val(ui.value +"%");
            }
        });
        $(".eaRadioButton").live("change",function(){ 
            var n=$(this).attr("n");
            $("#desplegableEa"+n+"_0 .eaOcultarInput").each(function() {
                $(this).attr('disabled', 'disabled');       
            });
            $("#desplegableEa"+n+"_1 .eaOcultarInput").each(function() {
                $(this).attr('disabled', 'disabled');       
            });
            if(n==0){
                $("#inputeducationalDescription").attr("value","");}
            else{
                $("#inputeducationalDescription"+n).attr("value","");
            }
            var total=$("#educationalDescription0").attr("n");
            var valor= $(this).val();
            if(valor=="fslsm"){
                var flag=0;
                for(var i=0;i<=total;i++){
                    if($("#eaRadioButtonFslsm"+i+":checked").val()){
                        flag++;
                    }
                }
                if(flag==1){
                    $("#desplegableEa"+n+"_1").hide();
                    $("#desplegableEa"+n+"_0").show();
                }else{
                    alert("No puede agregar más de un Estilo de Aprendizaje del mismo tipo.");
                    $("#eaRadioButtonDescripcion"+n).attr("checked","true");
                    $("#desplegableEa"+n+"_1").hide();
                    $("#desplegableEa"+n+"_0").hide();
                }
            }else if(valor=="vark"){
                var flag=0;
                for(var i=0;i<=total;i++){
                    if($("#eaRadioButtonVark"+i+":checked").val()){
                        flag++;
                    }
                }
                if(flag==1){
                    $("#desplegableEa"+n+"_0").hide();
                    $("#desplegableEa"+n+"_1").show();
                }else{
                    alert("No puede agregar más de un Estilo de Aprendizaje del mismo tipo.");
                    $("#eaRadioButtonDescripcion"+n).attr("checked","true");
                    $("#desplegableEa"+n+"_0").hide();
                    $("#desplegableEa"+n+"_1").hide();
                }
            }else {
                if(n==0){
                    $("#inputeducationalDescription").attr("readOnly",false);
                }
                else{
                    $("#inputeducationalDescription"+n).attr("readOnly",false);
                }
                $("#desplegableEa"+n+"_0").hide();
                $("#desplegableEa"+n+"_1").hide();
                $("#desplegableEa"+n+"_0 .eaOcultarInput").each(function() {
                    $(this).attr('disabled', 'disabled');       
                });
                $("#desplegableEa"+n+"_1 .eaOcultarInput").each(function() {
                    $(this).attr('disabled', 'disabled');       
                });
            }   
        });
        //  $(".eaRadioButton").live("change",function(){ });
        $(".enviarFslsm").live("click",function(){ 
            var n=$(this).attr("n");
            var activo="Activo:"+$("#fslsmR"+n+"_1L").val();
            $("#fslsmRe"+n+"_1").attr("value",$("#fslsmR"+n+"_1L").val());
            
            var sensitivo="Sensitivo:"+$("#fslsmR"+n+"_2L").val();
            $("#fslsmRe"+n+"_2").attr("value",$("#fslsmR"+n+"_2L").val());
                
            var visual="Visual:"+$("#fslsmR"+n+"_3L").val();
            $("#fslsmRe"+n+"_3").attr("value",$("#fslsmR"+n+"_3L").val());
                
            var inductivo="Inductivo:"+$("#fslsmR"+n+"_4L").val();
            $("#fslsmRe"+n+"_4").attr("value",$("#fslsmR"+n+"_4L").val());
                
            var secuencial="Secuencial:"+$("#fslsmR"+n+"_5L").val();
            $("#fslsmRe"+n+"_5").attr("value",$("#fslsmR"+n+"_5L").val());
            
            var string=activo+"; "+sensitivo+"; "+visual+"; "+inductivo+"; "+secuencial;
            string="FSLSM{"+string+"}";
            if(n==0){
                $("#inputeducationalDescription").attr("value",string);
                $("#inputeducationalDescription").attr("readonly",true);
                $("#educationalDescription"+n+" .vark").css({
                    display:"none"
                });
            }
            else{$("#inputeducationalDescription"+n+"").attr("value",string);
                $("#inputeducationalDescription"+n+"").attr("readonly",true);
                $("#educationalDescription"+n+" .vark").css({
                    display:"none"
                });
            }
            $("#desplegableEa"+n+"_0 .eaOcultarInput").each(function() {
                $(this).removeAttr('disabled');        
            });
            $("#desplegableEa"+n+"_1 .eaOcultarInput").each(function() {
                $(this).attr('disabled', 'disabled');       
            });
            
            $("#desplegableEa"+n+"_0").hide();
        });
        
        $(".cancelarFslsm").live("click",function(){
            var n=$(this).attr("n");
            $("#desplegableEa"+n+"_0").hide();
        });
        
        $(".enviarVark").live("click",function(){ 
            var n=$(this).attr("n");
            var visual="Visual:"+$("#varkR"+n+"_1").val();
            $("#varkRe"+n+"_1").attr("value",$("#varkR"+n+"_1").val());
            
            var auditivo="Auditivo:"+$("#varkR"+n+"_2").val();
            $("#varkRe"+n+"_2").attr("value",$("#varkR"+n+"_2").val());
            
            var lector="Lector:"+$("#varkR"+n+"_3").val();
            $("#varkRe"+n+"_3").attr("value",$("#varkR"+n+"_3").val());
            
            var kinestetico="Kinestético:"+$("#varkR"+n+"_4").val();
            $("#varkRe"+n+"_4").attr("value",$("#varkR"+n+"_4").val());
            
            var string=visual+"; "+auditivo+"; "+lector+"; "+kinestetico;
            string="VARK{"+string+"}";
            if(n==0){
                $("#inputeducationalDescription").attr("value",string);
                $("#inputeducationalDescription").attr("readonly",true);
                $("#educationalDescription"+n+" .fslsm").css({
                    display:"none"
                });
            }
            else{$("#inputeducationalDescription"+n+"").attr("value",string);
                $("#inputeducationalDescription"+n+"").attr("readonly",true);
                $("#educationalDescription"+n+" .fslsm").css({
                    display:"none"
                });
            }
            $("#desplegableEa"+n+"_1 .eaOcultarInput").each(function() {
                $(this).removeAttr('disabled');        
            });
            $("#desplegableEa"+n+"_0 .eaOcultarInput").each(function() {
                $(this).attr('disabled', 'disabled');       
            });
            
            $("#desplegableEa"+n+"_1").hide();
        });
        
        $(".cancelarVark").live("click",function(){
            var n=$(this).attr("n");
            $("#desplegableEa"+n+"_1").hide();
        });
        $("[rel=tooltip]").tooltip();  
    });
</script>
<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="vista/css/formulario.css"/>
<link rel="stylesheet" href="vista/css/config.css?<?php echo date('l jS \of F Y h:i:s A'); ?>"/> <!--Evitar que la pagina se almacene en cache-->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--<script type="text/javascript" src="lib/jquery-1.7.1.min.js"></script>-->
<script type="text/javascript" src="vista/js/formulario.js"></script>

<div class="contenedor2">		
    <ul class="tabs">
        <li class="p1 paletaColor4"><a href="#tab1"><span id="image1"></span><?= $general ?></a></li>
        <li class="p2 paletaColor4"><a href="#tab2"><span id="image2"></span><?= $lifeCycle ?></a></li>
        <li class="p3 paletaColor4"><a href="#tab3"><span id="image3"></span><?= $metaMetadata ?></a></li>
        <li class="p4 paletaColor4"><a href="#tab4"><span id="image4"></span><?= $technical ?></a></li>
        <li class="p5 paletaColor4"><a href="#tab5"><span id="image5"></span><?= $educational ?></a></li>
        <li class="p6 paletaColor4"><a href="#tab6"><span id="image6"></span><?= $rights ?></a></li>
        <li class="p7 paletaColor4"><a href="#tab7"><span id="image7"></span><?= $relation ?></a></li>
        <li class="p8 paletaColor4"><a href="#tab8"><span id="image8"></span><?= $annotation ?></a></li>
        <li class="p9 paletaColor4"><a href="#tab9"><span id="image9"></span><?= $classification ?></a></li>
    </ul>

    <div class="contenedor3">
        <form id="formulario" class="nivel3"  action="" method="post" enctype="multipart/form-data">

            <!--General-->
            <div id="tab1" class="tab_content">
                <fieldset class="nivel2"><legend ><label rel="tooltip" data-placement="right" data-original-title="<?= $generalDes ?>"><?= $general ?></label></legend> 
                    <!--Title-->
                    <div class="caja" id="Title0">
                        <div class="caja2">
                            <div class="titulo">
                                <?= $title2  ?>:
                            </div>
                            <div class="input">
                                <input id="inputgeneralTitle" name="generalTitle" type="text" />
                                <a id="desgeneralTitle" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleGeneralTitle2 ?></div> 
                            </div>
                        </div>
                        <div class="caja3">

                        </div>
                    </div>   

                    <!--Description-->
                    <div class="caja" id="Description0">
                        <div class="caja2">
                            <div class="titulo">
                                <?= $description ?>:
                            </div>
                            <div class="input">

                                <textarea id="inputgeneralDescription" name="generalDescription" type="textarea" maxlength="2000"></textarea>
                                <a id="desgeneralDescription" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleGeneralDescription?> </div> 
                            </div>
                        </div>
                        <div class="caja3">
                            <span class="at">
                                <a id="anadirDescription" href="" class="pointer" value="" title="<?= $add ?>"></a>
                            </span>
                        </div>
                    </div>

                    <!--Keyword-->
                    <div class="caja" id="Keyword0">
                        <div class="caja2">
                            <div class="titulo">
                                <?= $keywords ?>:
                            </div>
                            <div class="input">
                                <input id="inputgeneralKeyword" name="generalKeyword" type="text" />
                                <a id="desgeneralKeyword" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleGeneralKeywords ?> </div> 
                            </div>
                        </div>
                        <div class="caja3">
                            <span class="at">
                                <a id="anadirKeyword" href="" class="pointer" value="" title="<?= $add ?>"></a>
                            </span>
                        </div>
                    </div>

                    <!--Language-->
                    <div class="caja"  id="Language0">
                        <div class="caja2">
                            <div class="titulo">
                                <?= $language ?>:
                            </div>
                            <div class="input">
                                <select id='inputgeneralLanguage' name='generalLanguage' ><option value="none"><?= $select ?></option><option value='es'>Español</option><option value='en'>English</option><option value='pt'>Português</option><option value='fr'>French</option><option value='ru'>Russian</option><option value='ja'>Japanese</option><option value='la'>Latin</option><option value='aa'>Afar</option><option value='ab'>Abkhazian</option><option value='af'>Afrikaans</option><option value='am'>Amharic</option><option value='ar'>Arabic</option><option value='as'>Assamese</option><option value='ay'>Aymara</option><option value='az'>Azerbaijani</option><option value='ba'>Bashkir</option><option value='be'>Byelorussian</option><option value='bg'>Bulgarian</option><option value='bh'>Bihari</option><option value='bi'>Bislama</option><option value='bn'>Bengali;Bangla</option><option value='bo'>Tibetan</option><option value='br'>Breton</option><option value='ca'>Catalan</option><option value='co'>Corsican</option><option value='cs'>Czech</option><option value='cy'>Welsh</option><option value='da'>Danish</option><option value='de'>German</option><option value='dz'>Bhutani</option><option value='el'>Greek</option><option value='eo'>Esperanto</option><option value='et'>Estonian</option><option value='eu'>Basque</option><option value='fa'>Persian</option><option value='fi'>Finnish</option><option value='fj'>Fiji</option><option value='fo'>Faeroese</option><option value='fy'>Frisian</option><option value='ga'>Irish</option><option value='gd'>Scots</option><option value='gl'>Galician</option><option value='gn'>Guarani</option><option value='gu'>Gujarati</option><option value='ha'>Hausa</option><option value='hi'>Hindi</option><option value='hr'>Croatian</option><option value='hu'>Hungarian</option><option value='hy'>Armenian</option><option value='ia'>Interlingua</option><option value='ie'>Interlingue</option><option value='ik'>Inupiak</option><option value='in'>Indonesian</option><option value='is'>Icelandic</option><option value='it'>Italian</option><option value='iw'>Hebrew</option><option value='ji'>Yiddish</option><option value='jw'>Javanese</option><option value='ka'>Georgian</option><option value='kk'>Kazakh</option><option value='kl'>Greenlandic</option><option value='km'>Cambodian</option><option value='kn'>Kannada</option><option value='ko'>Korean</option><option value='ks'>Kashmiri</option><option value='ku'>Kurdish</option><option value='ky'>Kirghiz</option><option value='ln'>Lingala</option><option value='lo'>Laothian</option><option value='lt'>Lithuanian</option><option value='lv'>Latvian,Lettish</option><option value='mg'>Malagasy</option><option value='mi'>Maori</option><option value='mk'>Macedonian</option><option value='ml'>Malayalam</option><option value='mn'>Mongolian</option><option value='mo'>Moldavian</option><option value='mr'>Marathi</option><option value='ms'>Malay</option><option value='mt'>Maltese</option><option value='my'>Burmese</option><option value='na'>Nauru</option><option value='ne'>Nepali</option><option value='nl'>Dutch</option><option value='no'>Norwegian</option><option value='oc'>Occitan</option><option value='om'>(Afan)Oromo</option><option value='or'>Oriya</option><option value='pa'>Punjabi</option><option value='pl'>Polish</option><option value='ps'>Pashto,Pushto</option><option value='qu'>Quechua</option><option value='rm'>Rhaeto-Romance</option><option value='rn'>Kirundi</option><option value='ro'>Romanian</option><option value='rw'>Kinyarwanda</option><option value='sa'>Sanskrit</option><option value='sd'>Sindhi</option><option value='sg'>Sangro</option><option value='sh'>Serbo-Croatian</option><option value='si'>Singhalese</option><option value='sk'>Slovak</option><option value='sl'>Slovenian</option><option value='sm'>Samoan</option><option value='sn'>Shona</option><option value='so'>Somali</option><option value='sq'>Albanian</option><option value='sr'>Serbian</option><option value='ss'>Siswati</option><option value='st'>Sesotho</option><option value='su'>Sundanese</option><option value='sv'>Swedish</option><option value='sw'>Swahili</option><option value='ta'>Tamil</option><option value='te'>Tegulu</option><option value='tg'>Tajik</option><option value='th'>Thai</option><option value='ti'>Tigrinya</option><option value='tk'>Turkmen</option><option value='tl'>Tagalog</option><option value='tn'>Setswana</option><option value='to'>Tonga</option><option value='tr'>Turkish</option><option value='ts'>Tsonga</option><option value='tt'>Tatar</option><option value='tw'>Twi</option><option value='uk'>Ukrainian</option><option value='ur'>Urdu</option><option value='uz'>Uzbek</option><option value='vi'>Vietnamese</option><option value='vo'>Volapuk</option><option value='wo'>Wolof</option><option value='xh'>Xhosa</option><option value='yo'>Yoruba</option><option value='zh'>Chinese</option><option value='zu'>Zulu</option></select>
                                <a id="desgeneralLanguage" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleGeneralLanguage ?> </div> 
                            </div>
                        </div>
                        <div class="caja3">
                            <span class="at">
                                <a id="anadirLanguage"  href="" class="pointer" value="" title="<?= $add ?>"></a>
                            </span>
                        </div>
                    </div>


                    <!--Coverage-->
                    <div class="caja" id="Coverage0">
                        <div class="caja2">
                            <div class="titulo">
                                <?= $coverage ?>:
                            </div>
                            <div class="input">
                                <input id="inputgeneralCoverage" name="generalCoverage" type="text" />
                                <a id="desgeneralCoverage" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleGeneralCoverage ?></div> 
                            </div>
                        </div>
                        <div class="caja3">
                            <span class="at">
                                <a id="anadirCoverage"  href="" class="pointer" value="" title="<?= $add ?>"></a>
                            </span>
                        </div>
                    </div>

                    <!--Structure-->
                    <div class="caja" id="Structure0">
                        <div class="caja2">
                            <div class="titulo">
                                <?= $structure ?>:
                            </div>
                            <div class="input">
                                <select id="inputgeneralStructure"  name="generalStructure">
                                    <option value="none"><?= $select ?></option>
                                    <option value="1"><?= $structure1 ?></option>
                                    <option value="2"><?= $structure2 ?></option>
                                    <option value="3"><?= $structure3 ?></option>
                                    <option value="4"><?= $structure4 ?></option>
                                    <option value="5"><?= $structure5 ?></option>

                                </select>
                                <a id="desgeneralStructure" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleGeneralStructure ?></div> 
                            </div>
                        </div>
                        <div class="caja3">

                        </div>                   
                    </div>

                    <!--AggregationLevel-->
                    <div class="caja" id="AggregationLevel0">
                        <div class="caja2">
                            <div class="titulo">
                               <?= $aggregationLevel ?>:
                            </div>
                            <div class="input">                               
                                <select id="inputgeneralAggregationLevel" name="generalAggregationLevel">
                                    <option value="none"><?= $select ?></option>
                                    <option value="1"><?= $aggregationLevel1 ?></option>
                                    <option value="2"><?= $aggregationLevel2 ?></option>
                                    <option value="3"><?= $aggregationLevel3 ?></option>
                                    <option value="4"><?= $aggregationLevel4 ?></option>
                                </select>		
                                <a id="desgeneralAggregationLevel" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b><?= $exampleGeneralAggregationLevel ?></div> 
                            </div>
                        </div>
                        <div class="caja3">

                        </div>
                    </div>

                    <!--Identifier-->
                    <fieldset class="subcategoria"><legend><label rel="tooltip" data-placement="right" data-original-title="<?= $genearlIdentifierDes ?>"><?= $identifier ?></label></legend> </legend>
                        <div class="caja" id="Identifier0">
                            <div class="caja2">
                                <div class="titulo">
                                    <label ><?= $catalog ?>:</label>  
                                </div>
                                <div class="input">
                                    <input id="inputgeneralCatalog" name="generalCatalog" type="text" /> <span class="nbc" n="0"><span class="masnbc"></span>NBC </span>

                                    <a id="desgeneralCatalog" class="descripcion"  title="<?= $help ?>"></a>
                                    <div class="dSubInput"><b><?= $example ?>:</b> <?= $exampleGeneralCatalog ?></div> 		
                                </div>
                                <div class="titulo">
                                    <label ><?= $entry  ?>:</label>
                                </div>
                                <div class="input">
                                    <input id="inputgeneralEntry" name="generalEntry" type="text" /> 
                                    <a id="desgeneralEntry" class="descripcion"  title="<?= $help ?>"></a>
                                    <div class="dSubInput"><b><?= $example ?>:</b> <?= $exampleGeneralEntry ?></div> 		
                                </div>
                                <div id="desplegableNbc0" class="desplegableNbc">

                                    <div class="titulo"> Seleccione una entrada:</div>
                                    <div class="input">

                                        <select id="Nbc0" class="selectNbcArea" n="0">
                                            <option><?= $select ?></option>
                                            <option value="01">Agronomía, Veterinaria y afines</option>
                                            <option value="02">Bellas Artes</option>
                                            <option value="03">Ciencias de la Educación</option>
                                            <option value="04">Ciencias de la Salud</option>
                                            <option value="05">Ciencias Sociales y Humanas</option>
                                            <option value="06">Economía, Administración, Contaduría y afines</option>
                                            <option value="07">Ingeniería, Arquitectura, Urbanismo y afines</option>
                                            <option value="08">Matemáticas y Ciencias Naturales
                                            </option>
                                        </select> </div>
                                    <br/>

                                    <div class="titulo"> </div>
                                    <div class="input">
                                        <select id="sNbc0" class="selectSubarea" n="0">
                                        </select>
                                    </div>

                                    <br/>

                                    <div class="titulo"> </div>
                                    <div class="input">
                                        <select id="ssNbc0" class="selectSubsubarea" n="0">
                                        </select>
                                    </div>
                                    <div class="titulo"> </div>
                                    <div class="input"><input class="enviarNbc" type="button" n="0" value="<?= $accept ?>"/>  <input class="cancelarNbc" type="button" n="0" value="Cancelar"/></div>
                                </div>

                            </div>

                            <div class="caja3">
                                <span class="at">
                                    <a id="anadirIdentifier" class="pointer" href="" value="" title="<?= $add ?>"></a>
                                </span>
                            </div>

                        </div>  
                    </fieldset>

                </fieldset>
                <div class="next"> <!--botton Guardar Parcialmente y Finalmente-->
                    <input name="guardarParcialmente" title="<?= $partialSave ?>" type="button" class="guardarParcialmente pointer" value=""/>  
                    <input name="guardarCompletamente" title="<?= $completelySave ?>" type="button" class="guardarCompletamente pointer" value=""/>  
                </div>
                <div class="next">
                    <a class="bs" id="spg1"  href="#tab2" asd=".p2" ></a>   
                </div>  

            </div>

            <!--Life Cycle-->
            <div id="tab2" class="tab_content">
                <fieldset class="nivel2"><legend><label rel="tooltip" data-placement="right" data-original-title="<?= $lifeCycleDes ?>"><?= $lifeCycle ?></label></legend>

                    <!--Version-->
                    <div class="caja"  id="Version0">
                        <div class="caja2">
                            <div class="titulo">
                                <?= $version ?>:
                            </div>
                            <div class="input">
                                <input id="inputlifeCycleVersion" name="lifeCycleVersion" type="text" />
                                <a id="deslifeCycleVersion" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleLifeCycleVersion ?> </div> 
                            </div>
                        </div>
                        <div class="caja3">
                        </div>
                    </div>

                    <!--Status-->
                    <div class="caja"  id="Status0">
                        <div class="caja2">
                            <div class="titulo">
                                <?= $status ?>:
                            </div>
                            <div class="input">
                                <select id="inputlifeCycleStatus" name="lifeCycleStatus">
                                    <option value="none"><?= $select ?></option>
                                    <option value="1">borrador</option>
                                    <option value="2">final</option>
                                    <option value="3">revisado</option>
                                    <option value="4">no disponible</option>
                                </select>	
                                <a id="deslifeCycleStatus" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleLifeCycleStatus ?> </div> 
                            </div>
                        </div>
                        <div class="caja3">
                        </div>
                    </div>

                    <!--Contribute-->
                    <fieldset class="subcategoria"><legend><label rel="tooltip" data-placement="right" data-original-title="<?= $contributionDes ?>"><?= $contribution ?></label></legend>
                        <div class="caja" id="Contribute0">
                            <div class="caja2 classificationTaxonPath">
                                <!--Role-->
                                <div class="caja" id="lifeCycleRole0">
                                    <div class="caja2"> 

                                        <div class="titulo">
                                            <label>  <?= $role ?>:</label>
                                        </div>
                                        <div class="input">
                                            <select id="inputlifeCycleRole" name="lifeCycleRole0_0">
                                                <option value="none"><?= $select ?></option>
                                                <option value="1"><?= $role1 ?></option>
                                                <option value="2"><?= $role2 ?></option>
                                                <option value="3"><?= $role3 ?></option>
                                                <option value="4"><?= $role4 ?></option>
                                                <option value="5"><?= $role5 ?></option>
                                                <option value="6"><?= $role6 ?></option>
                                                <option value="7"><?= $role7 ?></option>
                                                <option value="8"><?= $role8 ?></option>
                                                <option value="9"><?= $role9 ?></option>
                                                <option value="10"><?= $role10 ?> </option>
                                                <option value="11"><?= $role11 ?></option>
                                                <option value="12"><?= $role12 ?></option>
                                                <option value="13"><?= $role13 ?></option>
                                                <option value="14"><?= $role14 ?></option>
                                            </select>
                                            <a id="deslifeCycleRole" class="descripcion"  title="<?= $help ?>"></a>
                                            <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleLifeCycleRol ?>    </div> 
                                        </div>

                                    </div>
                                </div>
                                <div class="caja" id="lifeCycleEntity0_0">
                                    <div class="caja2"> 

                                        <div class="titulo">
                                            <label > <?= $entity ?>:</label>
                                        </div>
                                        <div class="input">
                                            <input id="inputlifeCycleEntity" name="lifeCycleEntity0_0" type="text"/>
                                            <a id="deslifeCycleEntity" class="descripcion"  title="<?= $help ?>"></a>
                                            <div class="dinput"> <b><?= $example ?>:</b> <?= $exampleLifeCycleEntity ?></div> 		
                                        </div>
                                    </div>
                                    <div class="caja3">
                                        <span class="at">
                                            <a id="anadirlifeCycleEntity" numero="0" cantidadEntity="0" class="pointer" href="" value="" title="<?= $add ?>"></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="caja" id="lifeCycleDate0">
                                    <div class="caja2"> 
                                        <div class="titulo">
                                            <label ><?= $date  ?>:</label>
                                        </div>
                                        <div class="input">
                                            <input id="inputlifeCycleDate" class="date" name="lifeCycleDate0_0" type="text"/> 
                                            <a id="deslifeCycleDate" class="descripcion"  title="<?= $help ?>"></a>
                                            <div class="dinput"><b><?= $example ?>:</b> <?= $exampleLifeCycleDate ?></div> 		
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                            <div class="caja3">
                                <span class="at">
                                    <a id="anadirContribute" class="pointer" href="" value="" title="<?= $add ?>"></a>
                                </span>
                            </div> 

                        </div> 
                    </fieldset>
                </fieldset>


                <div class="prev">
                    <a class="bs" href="#tab1" asd=".p1" ></a>   
                </div> 
                <div class="next"> <!--botton Guardar Parcialmente y Finalmente-->
                    <input name="guardarParcialmente" title="<?= $partialSave ?>" type="button" class="guardarParcialmente pointer" value=""/>  
                    <input name="guardarCompletamente" title="<?= $completelySave ?>" type="button" class="guardarCompletamente pointer" value=""/>  
                </div>
                <div class="next">
                    <a class="bs" href="#tab3" asd=".p3" ></a>   
                </div> 

            </div>

            <!--Meta-Metadata-->
            <div id="tab3" class="tab_content"> 
                <fieldset class="nivel2"><legend><label rel="tooltip" data-placement="right" data-original-title="Esta categoría cubre la información relacionada con los metadatos del objeto de aprendizaje, no con el objeto en sí"><?= $metaMetadata ?></label></legend>

                    <!--Metadata Schema-->
                    <div class="caja" id="metaMetadataMetadataSchema0">
                        <div class="caja2">
                            <div class="titulo">
                                <label><?= $metadataSchema ?>:</label>
                            </div>
                            <div class="input">
                                <input id="inputmetaMetadataMetadataSchema" value="LOMv1.0" readonly="readonly" name="metaMetadataMetadataSchema" type="text"/>
                                <a id="desmetaMetadataMetadataSchema" class="descripcion" title="<?= $help ?>"></a>
                                <div class="dinput"><b><?= $example ?>:</b> <?= $exampleMetadataSchema ?></div>
                            </div>
                        </div>
                        <div class="caja3">
                            <span class="at">
                                <a id="anadirmetaMetadataMetadataSchema" class="pointer" href="" value="" title="<?= $add ?>"></a>
                            </span>
                        </div>
                    </div>

                    <!--Language-->
                    <div class="caja" id="metaMetadataLanguage0">
                        <div class="caja2">
                            <div class="titulo">
                                <label><?= $language ?>:</label>
                            </div>
                            <div class="input">
                                <select id="inputmetaMetadataLanguage" name="metaMetadataLanguage"><option value="none"><?= $select ?></option><option value='es'>Español</option><option value='en'>English</option><option value='pt'>Português</option><option value='fr'>French</option><option value='ru'>Russian</option><option value='ja'>Japanese</option><option value='la'>Latin</option><option value='aa'>Afar</option><option value='ab'>Abkhazian</option><option value='af'>Afrikaans</option><option value='am'>Amharic</option><option value='ar'>Arabic</option><option value='as'>Assamese</option><option value='ay'>Aymara</option><option value='az'>Azerbaijani</option><option value='ba'>Bashkir</option><option value='be'>Byelorussian</option><option value='bg'>Bulgarian</option><option value='bh'>Bihari</option><option value='bi'>Bislama</option><option value='bn'>Bengali;Bangla</option><option value='bo'>Tibetan</option><option value='br'>Breton</option><option value='ca'>Catalan</option><option value='co'>Corsican</option><option value='cs'>Czech</option><option value='cy'>Welsh</option><option value='da'>Danish</option><option value='de'>German</option><option value='dz'>Bhutani</option><option value='el'>Greek</option><option value='eo'>Esperanto</option><option value='et'>Estonian</option><option value='eu'>Basque</option><option value='fa'>Persian</option><option value='fi'>Finnish</option><option value='fj'>Fiji</option><option value='fo'>Faeroese</option><option value='fy'>Frisian</option><option value='ga'>Irish</option><option value='gd'>Scots</option><option value='gl'>Galician</option><option value='gn'>Guarani</option><option value='gu'>Gujarati</option><option value='ha'>Hausa</option><option value='hi'>Hindi</option><option value='hr'>Croatian</option><option value='hu'>Hungarian</option><option value='hy'>Armenian</option><option value='ia'>Interlingua</option><option value='ie'>Interlingue</option><option value='ik'>Inupiak</option><option value='in'>Indonesian</option><option value='is'>Icelandic</option><option value='it'>Italian</option><option value='iw'>Hebrew</option><option value='ji'>Yiddish</option><option value='jw'>Javanese</option><option value='ka'>Georgian</option><option value='kk'>Kazakh</option><option value='kl'>Greenlandic</option><option value='km'>Cambodian</option><option value='kn'>Kannada</option><option value='ko'>Korean</option><option value='ks'>Kashmiri</option><option value='ku'>Kurdish</option><option value='ky'>Kirghiz</option><option value='ln'>Lingala</option><option value='lo'>Laothian</option><option value='lt'>Lithuanian</option><option value='lv'>Latvian,Lettish</option><option value='mg'>Malagasy</option><option value='mi'>Maori</option><option value='mk'>Macedonian</option><option value='ml'>Malayalam</option><option value='mn'>Mongolian</option><option value='mo'>Moldavian</option><option value='mr'>Marathi</option><option value='ms'>Malay</option><option value='mt'>Maltese</option><option value='my'>Burmese</option><option value='na'>Nauru</option><option value='ne'>Nepali</option><option value='nl'>Dutch</option><option value='no'>Norwegian</option><option value='oc'>Occitan</option><option value='om'>(Afan)Oromo</option><option value='or'>Oriya</option><option value='pa'>Punjabi</option><option value='pl'>Polish</option><option value='ps'>Pashto,Pushto</option><option value='qu'>Quechua</option><option value='rm'>Rhaeto-Romance</option><option value='rn'>Kirundi</option><option value='ro'>Romanian</option><option value='rw'>Kinyarwanda</option><option value='sa'>Sanskrit</option><option value='sd'>Sindhi</option><option value='sg'>Sangro</option><option value='sh'>Serbo-Croatian</option><option value='si'>Singhalese</option><option value='sk'>Slovak</option><option value='sl'>Slovenian</option><option value='sm'>Samoan</option><option value='sn'>Shona</option><option value='so'>Somali</option><option value='sq'>Albanian</option><option value='sr'>Serbian</option><option value='ss'>Siswati</option><option value='st'>Sesotho</option><option value='su'>Sundanese</option><option value='sv'>Swedish</option><option value='sw'>Swahili</option><option value='ta'>Tamil</option><option value='te'>Tegulu</option><option value='tg'>Tajik</option><option value='th'>Thai</option><option value='ti'>Tigrinya</option><option value='tk'>Turkmen</option><option value='tl'>Tagalog</option><option value='tn'>Setswana</option><option value='to'>Tonga</option><option value='tr'>Turkish</option><option value='ts'>Tsonga</option><option value='tt'>Tatar</option><option value='tw'>Twi</option><option value='uk'>Ukrainian</option><option value='ur'>Urdu</option><option value='uz'>Uzbek</option><option value='vi'>Vietnamese</option><option value='vo'>Volapuk</option><option value='wo'>Wolof</option><option value='xh'>Xhosa</option><option value='yo'>Yoruba</option><option value='zh'>Chinese</option><option value='zu'>Zulu</option></select>
                                <a id="desmetaMetadataLanguage" class="descripcion" title="<?= $help ?>"></a>
                                <div class="dinput"><b><?= $example ?>:</b> <?= $exampleMetadataLanguage ?></div>
                            </div>
                        </div>
                        <div class="caja3">
                        </div>
                    </div>

                    <!--metaMetadataContribute-->
                    <fieldset class="subcategoria"><legend><label rel="tooltip" data-placement="right" data-original-title="Quién, cómo y cuándo contribuyó con los metadatos"><?= $contribution ?></label></legend>
                        <div class="caja" id="metaMetadataContribute0">
                            <div class="caja2 classificationTaxonPath">
                                <!--Role-->
                                <div class="caja" id="metaMetadataRole0">
                                    <div class="caja2"> 

                                        <div class="titulo">
                                            <label>  <?= $role ?>:</label>
                                        </div>
                                        <div class="input">
                                            <select id="inputmetaMetadataRole" name="metaMetadataRole0_0">
                                                <option value="none"><?= $select ?></option>
                                                <option value="1">creador</option>
                                                <option value="2">revisor</option>
                                            </select>
                                            <a id="desmetaMetadataRole" class="descripcion"  title="<?= $help ?>"></a>
                                            <div class="dinput"><b><?= $example ?>:</b> <?= $exampleMetadataRol ?></div> 
                                        </div>

                                    </div>
                                </div>
                                <div class="caja" id="metaMetadataEntity0_0">
                                    <div class="caja2"> 

                                        <div class="titulo">
                                            <label > <?= $entity ?>:</label>
                                        </div>
                                        <div class="input">
                                            <input id="inputmetaMetadataEntity" name="metaMetadataEntity0_0" type="text"/>
                                            <a id="desmetaMetadataEntity" class="descripcion"  title="<?= $help ?>"></a>
                                            <div class="dinput"><b><?= $example ?>:</b> <?= $exampleMetadataEntity ?></div> 		
                                        </div>
                                    </div>
                                    <div class="caja3">
                                        <span class="at">
                                            <a id="anadirmetaMetadataEntity" numero="0" cantidadEntity="0" class="pointer" href="" value="" title="<?= $add ?>"></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="caja" id="metaMetadataDate0">
                                    <div class="caja2"> 
                                        <div class="titulo">
                                            <label ><?= $date  ?>:</label>
                                        </div>
                                        <div class="input">
                                            <input id="inputmetaMetadataDate" class="date" name="metaMetadataDate0_0" type="text"/> 
                                            <a id="desmetaMetadataDate" class="descripcion"  title="<?= $help ?>"></a>
                                            <div class="dinput"><b><?= $example ?>:</b> <?= $exampleMetadataDate ?></div> 		
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                            <div class="caja3">
                                <span class="at">
                                    <a id="anadirmetaMetadataContribute" class="pointer" href="" value="" title="<?= $add ?>"></a>
                                </span>
                            </div> 

                        </div> 
                    </fieldset>

                    <!--Identifier-->
                    <fieldset class="subcategoria"><legend><label rel="tooltip" data-placement="right" data-original-title="Etiqueta única de identificación del metadato según un sistema de catalogación"><?= $identifier ?></label></legend>
                        <div class="caja" id="metaMetadataIdentifier0"> 
                            <div class="caja2">
                                <div class="titulo">
                                    <label ><?= $catalog ?>:</label>
                                </div>
                                <div class="input">
                                    <input id="inputmetaMetadataCatalog" name="metaMetadataCatalog" type="text" /> 
                                    <a id="desmetaMetadataCatalog" class="descripcion"  title="<?= $help ?>"></a>
                                    <div class="dinput"><b><?= $example ?>:</b> <?= $exampleMetadataCatalog ?></div> 		
                                </div>
                                <div class="titulo">
                                    <label ><?= $entry  ?>:</label>
                                </div>
                                <div class="input">
                                    <input id="inputmetaMetadataEntry" name="metaMetadataEntry" type="text" /> 
                                    <a id="desmetaMetadataEntry" class="descripcion"  title="<?= $help ?>"></a>
                                    <div class="dinput"><b><?= $example ?>:</b> <?= $exampleMetadataEntry ?></div> 		
                                </div>

                            </div>
                            <div class="caja3">
                                <span class="at">
                                    <a id="anadirmetaMetadataIdentifier" class="pointer" href="" value="" title="<?= $add ?>"></a>
                                </span>
                            </div>
                        </div>
                    </fieldset>


                </fieldset>
                <div class="prev">
                    <a class="bs" href="#tab2" asd=".p2" ></a>   
                </div> 
                <div class="next"> <!--botton Guardar Parcialmente y Finalmente-->
                    <input name="guardarParcialmente" title="<?= $partialSave ?>" type="button" class="guardarParcialmente pointer" value=""/>  
                    <input name="guardarCompletamente" title="<?= $completelySave ?>" type="button" class="guardarCompletamente pointer" value=""/>  
                </div>
                <div class="next">
                    <a class="bs" href="#tab4" asd=".p4" ></a>   
                </div> 
            </div>

            <!--Technical-->
            <div id="tab4" class="tab_content">
                <fieldset class="nivel2"><legend><label rel="tooltip" data-placement="right" data-original-title="Esta categoría cubre la información relacionada con las características y requerimientos técnicos del objeto de aprendizaje"><?= $technical ?></label></legend>

                    <!--Format-->
                    <div class="caja"  id="technicalFormat0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $format2 ?>:</label>
                            </div>
                            <div class="input">
                                <input id="inputtechnicalFormat" name="technicalFormat" value="<?php echo $extencion; ?>"  <?php
if (isset($_SESSION["ubicacion"]) && $_SESSION["ubicacion"] == "subir") {
    echo "readonly=readonly";
}
?>   type="text"/>
                                <a id="destechnicalFormat" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleTechnicalFormat ?></div> 
                            </div>
                        </div>
                        <div class="caja3">
                            <span class="at">
                                <a id="anadirtechnicalFormat" class="pointer" href="" value="" title="<?= $add ?>"></a>
                            </span>
                        </div>
                    </div>

                    <!--Size-->
                    <div class="caja"  id="technicalSize0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $size2 ?>:</label>
                            </div>
                            <div class="input">
                                <input id="inputtechnicalSize" name="technicalSize" value="<?php echo $size; ?>" <?php
                                       if ( isset($_SESSION["ubicacion"])&& $_SESSION["ubicacion"] == "subir") {
                                           echo "readonly=readonly";
                                       }
?>    type="text"/>

                                <a id="destechnicalSize" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleTechnicalSize ?></div> 
                            </div>
                        </div>
                        <div class="caja3">
                        </div>
                    </div>

                    <!--Location-->
                    <div class="caja"  id="technicalLocation0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $ubiety     ?>:</label>
                            </div>
                            <div class="input">
                                <input id="inputtechnicalLocation" name="technicalLocation" value="<?php echo $ruta ?>"   readonly="readonly" type="text"/>

                                <a id="destechnicalLocation" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleTechnicalUbiety ?></div> 
                            </div>
                        </div>
                        <div class="caja3">
                            <span class="at">
                                <a id="anadirtechnicalLocation" class="pointer" href="" value="" title="<?= $add ?>"></a>
                            </span>
                        </div>
                    </div>












                    <!--Requirement-->
                    <fieldset class="subcategoria anidada"><legend><label rel="tooltip" data-placement="right" data-original-title="Esta Especificaciones de hardware o software requeridas para usar el objeto de aprendizaje"><?= $requirements ?></label></legend>
                        <!--OrComposite-->
                        <div class="caja" id="technicalRequirement0" >                           
                            <div class="caja" id="technicalOrComposite0_0" >
                                <div class="caja2">
                                    <!--Type-->
                                    <div class="titulo">
                                        <label> <?= $kind ?>:</label>
                                    </div>
                                    <div class="input">
                                        <select id="inputtechnicalType" name="technicalType0_0">
                                            <option value="none"><?= $select ?></option>
                                            <option value="1">sistema operativo </option>
                                            <option value="2">navegador</option>               
                                        </select>
                                        <a id="destechnicalType" class="descripcion"  title="<?= $help ?>"></a>
                                        <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleTechnicalType ?></div> 
                                    </div>

                                    <!--Name-->
                                    <div class="titulo">
                                        <label> <?= $name ?>:</label>
                                    </div>
                                    <div class="input">
                                        <input id="inputtechnicalName" name="technicalName0_0" type="text"/>
                                        <a id="destechnicalName" class="descripcion"  title="<?= $help ?>"></a>
                                        <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleTechnicalName ?></div> 
                                    </div>

                                    <!--Minimum Version-->
                                    <div class="titulo">
                                        <label> <?= $minimumVersion ?>:</label>
                                    </div>
                                    <div class="input">
                                        <input id="inputtechnicalMinimumVersion" name="technicalMinimumVersion0_0" type="text"/>
                                        <a id="destechnicalMinimumVersion" class="descripcion"  title="<?= $help ?>"></a>
                                        <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleTechnicalMinimumVersion ?></div> 
                                    </div>

                                    <!--Maximum Version-->
                                    <div class="titulo">
                                        <label> <?= $maximumVersion ?>:</label>
                                    </div>
                                    <div class="input">
                                        <input id="inputtechnicalMaximumVersion" name="technicalMaximumVersion0_0" type="text"/>
                                        <a id="destechnicalMaximumVersion" class="descripcion"  title="<?= $help ?>"></a>
                                        <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleTechnicalMaximumVersion ?></div> 
                                    </div>
                                </div>
                                <div class="caja3">
                                    <span class="at">
                                        <a id="anadirtechnicalOrComposite" numero="0"  cantidadOrComposite="0" class="pointer" href="" value="" title="<?= $add ?>"></a>
                                    </span>
                                </div>
                            </div>


                        </div>
                    </fieldset>

                    <!--Installation Remarks-->
                    <div class="caja"  id="technicalInstallationRemarks0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $installationRemarks ?>:</label>
                            </div>
                            <div class="input">
                                <input id="inputtechnicalInstallationRemarks" name="technicalInstallationRemarks" type="text"/>
                                <a id="destechnicalInstallationRemarks" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleTechnicalInstallationRemarks ?></div> 
                            </div>
                        </div>
                        <div class="caja3">
                        </div>
                    </div>

                    <!--Other Platform Requirements-->
                    <div class="caja"  id="technicalOtherPlatformRequirements0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $otherPlatformRequirements ?>:</label>
                            </div>
                            <div class="input">
                                <input id="inputtechnicalOtherPlatformRequirements" name="technicalOtherPlatformRequirements" type="text"/>
                                <a id="destechnicalOtherPlatformRequirements" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleTechnicalOtherPlatformRequirements ?></div> 
                            </div>
                        </div>
                        <div class="caja3">
                        </div>
                    </div>

                    <!--Duration-->
                    <div class="caja"  id="technicalDuration0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $duration ?>:</label>
                            </div>
                            <div class="input">
                                <input id="inputtechnicalDuration" name="technicalDuration" type="text"/> <span id="technicalDurationTab"></span>
                                <a id="destechnicalDuration" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleTechnicalDuration ?></div> 
                            </div>
                            <div id="technicalDurationTabContainer" style="display: none;">
                                <div>
                                    Anos:
                                    <select name="yearTD" id="year">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>

                                    Meses:
                                    <select name="monthTD">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                    </select>    


                                    Dias:
                                    <select name="dayTD">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                        <option>24</option>
                                        <option>25</option>
                                        <option>26</option>
                                        <option>27</option>
                                        <option>28</option>
                                        <option>29</option>
                                        <option>30</option>  
                                    </select>

                                    Horas:
                                    <select name="hourTD">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                    </select>

                                    Minutos:
                                    <select name="minuteTD">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                        <option>24</option>
                                        <option>25</option>
                                        <option>26</option>
                                        <option>27</option>
                                        <option>28</option>
                                        <option>29</option>
                                        <option>30</option>
                                        <option>31</option>
                                        <option>32</option>
                                        <option>33</option>
                                        <option>34</option>
                                        <option>35</option>
                                        <option>36</option>
                                        <option>37</option>
                                        <option>38</option>
                                        <option>39</option>
                                        <option>40</option>
                                        <option>41</option>
                                        <option>42</option>
                                        <option>43</option>
                                        <option>44</option>
                                        <option>45</option>
                                        <option>46</option>
                                        <option>47</option>
                                        <option>48</option>
                                        <option>49</option>
                                        <option>50</option>
                                        <option>51</option>
                                        <option>52</option>
                                        <option>53</option>
                                        <option>54</option>
                                        <option>55</option>
                                        <option>56</option>
                                        <option>57</option>
                                        <option>58</option>
                                        <option>59</option>
                                    </select>
                                    Segundos:
                                    <select name="secondTD">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                        <option>24</option>
                                        <option>25</option>
                                        <option>26</option>
                                        <option>27</option>
                                        <option>28</option>
                                        <option>29</option>
                                        <option>30</option>
                                        <option>31</option>
                                        <option>32</option>
                                        <option>33</option>
                                        <option>34</option>
                                        <option>35</option>
                                        <option>36</option>
                                        <option>37</option>
                                        <option>38</option>
                                        <option>39</option>
                                        <option>40</option>
                                        <option>41</option>
                                        <option>42</option>
                                        <option>43</option>
                                        <option>44</option>
                                        <option>45</option>
                                        <option>46</option>
                                        <option>47</option>
                                        <option>48</option>
                                        <option>49</option>
                                        <option>50</option>
                                        <option>51</option>
                                        <option>52</option>
                                        <option>53</option>
                                        <option>54</option>
                                        <option>55</option>
                                        <option>56</option>
                                        <option>57</option>
                                        <option>58</option>
                                        <option>59</option>
                                    </select>
                                </div>
                                <div class="alingButtonCenter">
                                    <input id="technicalDurationTabAcpetar" class="boton" type="button" value="<?= $accept ?>">
                                    <input id="technicalDurationTabCancelar" class="boton" type="button"  value="Cancelar">
                                </div>
                            </div>
                        </div>
                        <div class="caja3">
                        </div>
                    </div>
                </fieldset>
                <div class="prev">
                    <a class="bs" href="#tab3" asd=".p3" ></a>   
                </div> 
                <div class="next"> <!--botton Guardar Parcialmente y Finalmente-->
                    <input name="guardarParcialmente" title="<?= $partialSave ?>" type="button" class="guardarParcialmente pointer" value=""/>  
                    <input name="guardarCompletamente" title="<?= $completelySave ?>" type="button" class="guardarCompletamente pointer" value=""/>  
                </div>
                <div class="next">
                    <a class="bs" href="#tab5" asd=".p5" ></a>   
                </div> 
            </div>

            <!--Educational-->
            <div id="tab5" class="tab_content">
                <fieldset class="nivel2"><legend><label rel="tooltip" data-placement="right" data-original-title="Esta categoría cubre la información relacionada con las características educativas o pedagógicas del objeto de aprendizaje"><?= $educational ?></label></legend>

                    <!--Learning Resource Type-->
                    <div class="caja"  id="educationalLearningResourceType0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $learningResourceType ?>:</label>
                            </div>
                            <div class="input">
                                <select id="inputeducationalLearningResourceType" name="educationalLearningResourceType">
                                    <option value="none"><?= $select ?></option>
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
                                <a id="deseducationalLearningResourceType" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleLearningResourceType ?></div> 
                            </div>
                        </div>
                        <div class="caja3">
                            <span class="at">
                                <a id="anadireducationalLearningResourceType" class="pointer" href="" value="" title="<?= $add ?>"></a>
                            </span>
                        </div>
                    </div>

                    <!--Interactivity Type-->
                    <div class="caja"  id="educationalInteractivityType0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $interactivityType ?>:</label>
                            </div>
                            <div class="input">
                                <select id="inputeducationalInteractivityType" name="educationalInteractivityType">
                                    <option value="none"><?= $select ?></option>
                                    <option value="1">activo</option>
                                    <option value="2">expositivo</option>
                                    <option value="3">mixto</option>        
                                </select>	
                                <a id="deseducationalInteractivityType" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleLearningInteractivityType ?> </div> 
                            </div>
                        </div>
                        <div class="caja3">
                        </div>
                    </div>

                    <!--Interactivity Level-->
                    <div class="caja"  id="educationalInteractivityLevel0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $interactivityLevel ?>:</label>
                            </div>
                            <div class="input">
                                <select id="inputeducationalInteractivityLevel" name="educationalInteractivityLevel">
                                    <option value="none"><?= $select ?></option>
                                    <option value="1">muy bajo</option> 
                                    <option value="2">bajo</option>
                                    <option value="3">medio</option>
                                    <option value="4">alto</option>
                                    <option value="5">muy alto</option>
                                </select>	
                                <a id="deseducationalInteractivityLevel" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleLearningInteractivityLevel ?></div> 
                            </div>
                        </div>
                        <div class="caja3">
                        </div>
                    </div>


                    <!--Intended End User Role-->
                    <div class="caja"  id="educationalIntendedEndUserRole0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $intendedEndUserRole ?>:</label>
                            </div>
                            <div class="input">
                                <select id="inputeducationalIntendedEndUserRole" name="educationalIntendedEndUserRole">
                                    <option value="none"><?= $select ?></option>
                                    <option value="1">profesor</option> 
                                    <option value="2">autor</option>
                                    <option value="3">aprendiz</option>
                                    <option value="4">administrador</option>
                                </select>	
                                <a id="deseducationalIntendedEndUserRole" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleLearningIntendedEndUserRole ?></div> 
                            </div>
                        </div>
                        <div class="caja3">
                            <span class="at">
                                <a id="anadireducationalIntendedEndUserRole" class="pointer" href="" value="" title="<?= $add ?>"></a>
                            </span>
                        </div>
                    </div>

                    <!--Context-->
                    <div class="caja"  id="educationalContext0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $context ?>:</label>
                            </div>
                            <div class="input">
                                <select id="inputeducationalContext" name="educationalContext">
                                    <option value="none"><?= $select ?></option>
                                    <option value="1">escuela básica primaria y/o secundaria</option> 
                                    <option value="2">educación superior</option>
                                    <option value="3">entrenamiento</option>
                                    <option value="4">otro</option>
                                </select>	
                                <a id="deseducationalContext" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleLearningContext ?></div> 
                            </div>
                        </div>
                        <div class="caja3">
                            <span class="at">
                                <a id="anadireducationalContext" class="pointer" href="" value="" title="<?= $add ?>"></a>
                            </span>
                        </div>
                    </div>


                    <!--Typical Age Range-->
                    <div class="caja"  id="educationalTypicalAgeRange0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $typicalAgeRange ?>:</label>
                            </div>
                            <div class="input">
                                <input id="inputeducationalTypicalAgeRange" name="educationalTypicalAgeRange" type="text"/>	
                                <a id="deseducationalTypicalAgeRange" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleLearningTypicalAgeRange ?></div> 
                            </div>
                        </div>
                        <div class="caja3">
                            <span class="at">
                                <a id="anadireducationalTypicalAgeRange" class="pointer" href="" value="" title="<?= $add ?>"></a>
                            </span>
                        </div>
                    </div>
                    <!--Difficulty-->
                    <div class="caja"  id="educationalDifficulty0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $difficulty ?>:</label>
                            </div>
                            <div class="input">
                                <select id="inputeducationalDifficulty" name="educationalDifficulty">
                                    <option value="none"><?= $select ?></option>
                                    <option value="1">muy fácil</option> 
                                    <option value="2">fácil</option>
                                    <option value="3">media</option>
                                    <option value="4">difícil</option>
                                    <option value="5">muy difícil</option>
                                </select>	
                                <a id="deseducationalDifficulty" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleLearningDifficulty ?></div> 
                            </div>
                        </div>
                        <div class="caja3">
                        </div>
                    </div>

                    <!--Typical Learning Time-->
                    <div class="caja"  id="educationalTypicalLearningTime0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $typicalLearningTime ?>:</label>
                            </div>
                            <div class="input">
                                <input id="inputeducationalTypicalLearningTime" name="educationalTypicalLearningTime" type="text"/> <span id="educationalTypicalLearningTimeTab"></span>	
                                <a id="deseducationalTypicalLearningTime" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleLearningTypicalLearningTime ?></div> 
                            </div>
                            <div id="educationalTypicalLearningTimeTabContainer" style="display: none;">
                                <div>
                                    Anos:
                                    <select name="yearETLT" id="year">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>

                                    Meses:
                                    <select name="monthETLT">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                    </select>    


                                    Dias:
                                    <select name="dayETLT">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                        <option>24</option>
                                        <option>25</option>
                                        <option>26</option>
                                        <option>27</option>
                                        <option>28</option>
                                        <option>29</option>
                                        <option>30</option>  
                                    </select>

                                    Horas:
                                    <select name="hourETLT">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                    </select>

                                    Minutos:
                                    <select name="minuteETLT">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                        <option>24</option>
                                        <option>25</option>
                                        <option>26</option>
                                        <option>27</option>
                                        <option>28</option>
                                        <option>29</option>
                                        <option>30</option>
                                        <option>31</option>
                                        <option>32</option>
                                        <option>33</option>
                                        <option>34</option>
                                        <option>35</option>
                                        <option>36</option>
                                        <option>37</option>
                                        <option>38</option>
                                        <option>39</option>
                                        <option>40</option>
                                        <option>41</option>
                                        <option>42</option>
                                        <option>43</option>
                                        <option>44</option>
                                        <option>45</option>
                                        <option>46</option>
                                        <option>47</option>
                                        <option>48</option>
                                        <option>49</option>
                                        <option>50</option>
                                        <option>51</option>
                                        <option>52</option>
                                        <option>53</option>
                                        <option>54</option>
                                        <option>55</option>
                                        <option>56</option>
                                        <option>57</option>
                                        <option>58</option>
                                        <option>59</option>
                                    </select>
                                    Segundos:
                                    <select name="secondETLT">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                        <option>24</option>
                                        <option>25</option>
                                        <option>26</option>
                                        <option>27</option>
                                        <option>28</option>
                                        <option>29</option>
                                        <option>30</option>
                                        <option>31</option>
                                        <option>32</option>
                                        <option>33</option>
                                        <option>34</option>
                                        <option>35</option>
                                        <option>36</option>
                                        <option>37</option>
                                        <option>38</option>
                                        <option>39</option>
                                        <option>40</option>
                                        <option>41</option>
                                        <option>42</option>
                                        <option>43</option>
                                        <option>44</option>
                                        <option>45</option>
                                        <option>46</option>
                                        <option>47</option>
                                        <option>48</option>
                                        <option>49</option>
                                        <option>50</option>
                                        <option>51</option>
                                        <option>52</option>
                                        <option>53</option>
                                        <option>54</option>
                                        <option>55</option>
                                        <option>56</option>
                                        <option>57</option>
                                        <option>58</option>
                                        <option>59</option>
                                    </select>
                                </div>
                                <div class="alingButtonCenter">
                                    <input id="educationalTypicalLearningTimeTabAcpetar" class="boton" type="button" value="<?= $accept ?>">
                                    <input id="educationalTypicalLearningTimeTabCancelar" class="boton" type="button"  value="Cancelar">
                                </div>
                            </div>
                            <div class="caja3">
                            </div>
                        </div>

                        <!--Description-->
                        <div class="caja"  n="0" id="educationalDescription0">
                            <div class="caja2">
                                <div class="titulo">
                                    <label class="radioButonAling">
                                        <input id="eaRadioButtonDescripcion0" class="eaRadioButton" n="0" type="radio" name="eaRadioButton0"  value="descripcionLibre" checked="checked"/> <?= $description ?> Libre<br />
                                        <input id="eaRadioButtonFslsm0"       class="eaRadioButton" n="0" type="radio" name="eaRadioButton0" value="fslsm" /> Fslsm   <br />
                                        <input id="eaRadioButtonVark0"        class="eaRadioButton" n="0" type="radio" name="eaRadioButton0" value="vark" /> Vark</label>
                                </div>
                                <div class="input">
                                    <textarea id="inputeducationalDescription" name="educationalDescription" type="textarea"></textarea>  
                                    <a id="deseducationalDescription" class="descripcion"  title="<?= $help ?>"></a>
                                    <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleLearningDescription ?></div>
                                </div>
                                <div  id="desplegableEa0_0">
                                    <div class="estilosA">
                                        <fieldset class="fFslsm"><legend>FSLSM</legend>
                                            <div class="clear">

                                                <div class="eafloatIz columna1">
                                                    <div>
                                                        <input id="fslsmR0_1L" class="eaOcultarInput" type="text" name="fslsmR0_1L" value="50%" disabled="disabled" readonly='readonly'>
                                                    </div>
                                                    Activo
                                                </div>

                                                <div class="center"> 
                                                    <input type="text"   class="estiloRe" id="fslsmRe0_1" name="fslsmRe0_1" style="display:none"/>
                                                    <input type="text"   class="estiloRe" id="fslsmRe0_2" name="fslsmRe0_2" style="display:none"/>
                                                    <input type="text"   class="estiloRe" id="fslsmRe0_3" name="fslsmRe0_3" style="display:none"/>
                                                    <input type="text"   class="estiloRe" id="fslsmRe0_4" name="fslsmRe0_4" style="display:none"/>
                                                    <input type="text"   class="estiloRe" id="fslsmRe0_5" name="fslsmRe0_5" style="display:none"/>
                                                    <div class="sFslsm" id="sfslsm0_1" n="0" m="1"></div>  
                                                </div>

                                                <div class="eafloatIz columna2">
                                                    <div>
                                                        <input id="fslsmR0_1R" class="eaOcultarInput" type="text" name="fslsmR0_1R"  value="50%" disabled="disabled" readonly='readonly'>
                                                    </div>
                                                    Reflexivo
                                                </div>
                                            </div>

                                            <div class="clear">
                                                <div class="eafloatIz columna1">
                                                    <div>
                                                        <input id="fslsmR0_2L" class="eaOcultarInput" type="text" name="fslsmR0_2L" value="50%" disabled="disabled"readonly='readonly'>
                                                    </div>
                                                    Sensitivo</div>
                                                <div class="center"> 
                                                    <div class="sFslsm" id="sfslsm0_2" n="0" m="2"></div>  
                                                </div>
                                                <div class="eafloatIz columna2">
                                                    <div>
                                                        <input id="fslsmR0_2R" class="eaOcultarInput" type="text" name="fslsmR0_2R" value="50%" disabled="disabled" readonly='readonly'>
                                                    </div>
                                                    Intuitivo</div>
                                            </div>

                                            <div class="clear">
                                                <div class="eafloatIz columna1">
                                                    <div>
                                                        <input id="fslsmR0_3L" class="eaOcultarInput" type="text" name="fslsmR0_3L" value="50%" disabled="disabled" readonly='readonly'>
                                                    </div>
                                                    Visual
                                                </div>
                                                <div class="center">
                                                    <div class="sFslsm" id="sfslsm0_3" n="0" m="3"></div>  
                                                </div>
                                                <div class="eafloatIz columna2">
                                                    <div>
                                                        <input id="fslsmR0_3R" class="eaOcultarInput" type="text" name="fslsmR0_3R" value="50%" disabled="disabled" readonly='readonly'>
                                                    </div>
                                                    Verbal</div>
                                            </div>
                                            <div class="clear">
                                                <div class="eafloatIz columna1">
                                                    <div>
                                                        <input id="fslsmR0_4L" class="eaOcultarInput" type="text" name="fslsmR0_4L" value="50%" disabled="disabled" readonly='readonly'>
                                                    </div>
                                                    Inductivo
                                                </div>
                                                <div class="center">
                                                    <div class="sFslsm" id="sfslsm0_4" n="0" m="4"></div>  
                                                </div>
                                                <div class="eafloatIz columna2">
                                                    <div>
                                                        <input id="fslsmR0_4R" class="eaOcultarInput" type="text" name="fslsmR0_4R" value="50%" disabled="disabled" readonly='readonly'>
                                                    </div>
                                                    Deductivo</div>
                                            </div>

                                            <div class="clear">
                                                <div class="eafloatIz columna1">
                                                    <div>
                                                        <input id="fslsmR0_5L" class="eaOcultarInput" type="text" name="fslsmR0_5L" value="50%" disabled="disabled" readonly='readonly'>
                                                    </div>
                                                    Secuencial</div>
                                                <div class="center">
                                                    <div class="sFslsm" id="sfslsm0_5" n="0" m="5"></div>  
                                                </div>
                                                <div class="eafloatIz columna2">
                                                    <div>
                                                        <input id="fslsmR0_5R" class="eaOcultarInput" type="text" name="fslsmR0_5R" value="50%" disabled="disabled" readonly='readonly'>
                                                    </div>
                                                    Global</div>
                                            </div>
                                            <div class="clear eaEnviar"><input class="enviarFslsm" type="button" n="0" value="<?= $accept ?>"/>  <input class="cancelarFslsm" type="button" n="0" value="Cancelar"/></div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div  id="desplegableEa0_1">
                                    <div class="estilosA">
                                        <fieldset class="fVark"><legend>VARK</legend>
                                            <div class="clear">
                                                <div class="eafloatIz columna1">
                                                    <div>
                                                        <input id="varkR0_1" class="eaOcultarInput" type="text" name="varkR0_1" value="50%" disabled="disabled" readonly='readonly'>
                                                    </div>
                                                    Visual
                                                </div>
                                                <div class="center"> 
                                                    <input type="text"   class="estiloRe" name="varkRe0_1" id="varkRe0_1"  style="display:none"/>
                                                    <input type="text"   class="estiloRe" name="varkRe0_2" id="varkRe0_2"  style="display:none"/>
                                                    <input type="text"   class="estiloRe" name="varkRe0_3" id="varkRe0_3"  style="display:none"/>
                                                    <input type="text"   class="estiloRe" name="varkRe0_4" id="varkRe0_4"  style="display:none"/>

                                                    <div class="sVark" id="svark0_1" n="0" m="1"></div>  
                                                </div>
                                            </div>
                                            <div class="clear">
                                                <div class="eafloatIz columna1">
                                                    <div>
                                                        <input id="varkR0_2" class="eaOcultarInput" type="text" name="varkR0_2" value="50%" disabled="disabled" readonly='readonly'>
                                                    </div>
                                                    Auditivo</div>
                                                <div class="center"> 
                                                    <div class="sVark" id="svark0_2" n="0" m="2"></div>  
                                                </div>
                                            </div>

                                            <div class="clear">
                                                <div class="eafloatIz columna1">
                                                    <div>
                                                        <input id="varkR0_3" class="eaOcultarInput" type="text" name="varkR0_3" value="50%" disabled="disabled" readonly='readonly'>
                                                    </div>
                                                    Lector</div>
                                                <div class="center"> 
                                                    <div class="sVark" id="svark0_3" n="0" m="3"></div>  
                                                </div>
                                            </div>

                                            <div class="clear">
                                                <div class="eafloatIz columna1">
                                                    <div>
                                                        <input id="varkR0_4" class="eaOcultarInput" type="text" name="varkR0_4" value="50%" disabled="disabled" readonly='readonly'>
                                                    </div>
                                                    Kinestético</div>
                                                <div class="center"> 
                                                    <div class="sVark" id="svark0" n="0" m="4"></div>  
                                                </div>
                                            </div>

                                            <div class="clear eaEnviar"><input class="enviarVark" type="button" n="0" value="<?= $accept ?>"/>  <input class="cancelarVark" type="button" n="0" value="Cancelar"/></div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="caja3">
                                <span class="at">
                                    <a id="anadireducationalDescription" class="pointer" href="" value="" title="<?= $add ?>"></a>
                                </span>
                            </div>
                        </div>

                        <!--Language-->
                        <div class="caja"  id="educationalLanguage0">
                            <div class="caja2">
                                <div class="titulo">
                                    <label> <?= $language ?>:</label>
                                </div>
                                <div class="input">
                                    <select id='inputeducationalLanguage' name='educationalLanguage' ><option value="none"><?= $select ?></option><option value='es'>Español</option><option value='en'>English</option><option value='pt'>Português</option><option value='fr'>French</option><option value='ru'>Russian</option><option value='ja'>Japanese</option><option value='la'>Latin</option><option value='aa'>Afar</option><option value='ab'>Abkhazian</option><option value='af'>Afrikaans</option><option value='am'>Amharic</option><option value='ar'>Arabic</option><option value='as'>Assamese</option><option value='ay'>Aymara</option><option value='az'>Azerbaijani</option><option value='ba'>Bashkir</option><option value='be'>Byelorussian</option><option value='bg'>Bulgarian</option><option value='bh'>Bihari</option><option value='bi'>Bislama</option><option value='bn'>Bengali;Bangla</option><option value='bo'>Tibetan</option><option value='br'>Breton</option><option value='ca'>Catalan</option><option value='co'>Corsican</option><option value='cs'>Czech</option><option value='cy'>Welsh</option><option value='da'>Danish</option><option value='de'>German</option><option value='dz'>Bhutani</option><option value='el'>Greek</option><option value='eo'>Esperanto</option><option value='et'>Estonian</option><option value='eu'>Basque</option><option value='fa'>Persian</option><option value='fi'>Finnish</option><option value='fj'>Fiji</option><option value='fo'>Faeroese</option><option value='fy'>Frisian</option><option value='ga'>Irish</option><option value='gd'>Scots</option><option value='gl'>Galician</option><option value='gn'>Guarani</option><option value='gu'>Gujarati</option><option value='ha'>Hausa</option><option value='hi'>Hindi</option><option value='hr'>Croatian</option><option value='hu'>Hungarian</option><option value='hy'>Armenian</option><option value='ia'>Interlingua</option><option value='ie'>Interlingue</option><option value='ik'>Inupiak</option><option value='in'>Indonesian</option><option value='is'>Icelandic</option><option value='it'>Italian</option><option value='iw'>Hebrew</option><option value='ji'>Yiddish</option><option value='jw'>Javanese</option><option value='ka'>Georgian</option><option value='kk'>Kazakh</option><option value='kl'>Greenlandic</option><option value='km'>Cambodian</option><option value='kn'>Kannada</option><option value='ko'>Korean</option><option value='ks'>Kashmiri</option><option value='ku'>Kurdish</option><option value='ky'>Kirghiz</option><option value='ln'>Lingala</option><option value='lo'>Laothian</option><option value='lt'>Lithuanian</option><option value='lv'>Latvian,Lettish</option><option value='mg'>Malagasy</option><option value='mi'>Maori</option><option value='mk'>Macedonian</option><option value='ml'>Malayalam</option><option value='mn'>Mongolian</option><option value='mo'>Moldavian</option><option value='mr'>Marathi</option><option value='ms'>Malay</option><option value='mt'>Maltese</option><option value='my'>Burmese</option><option value='na'>Nauru</option><option value='ne'>Nepali</option><option value='nl'>Dutch</option><option value='no'>Norwegian</option><option value='oc'>Occitan</option><option value='om'>(Afan)Oromo</option><option value='or'>Oriya</option><option value='pa'>Punjabi</option><option value='pl'>Polish</option><option value='ps'>Pashto,Pushto</option><option value='qu'>Quechua</option><option value='rm'>Rhaeto-Romance</option><option value='rn'>Kirundi</option><option value='ro'>Romanian</option><option value='rw'>Kinyarwanda</option><option value='sa'>Sanskrit</option><option value='sd'>Sindhi</option><option value='sg'>Sangro</option><option value='sh'>Serbo-Croatian</option><option value='si'>Singhalese</option><option value='sk'>Slovak</option><option value='sl'>Slovenian</option><option value='sm'>Samoan</option><option value='sn'>Shona</option><option value='so'>Somali</option><option value='sq'>Albanian</option><option value='sr'>Serbian</option><option value='ss'>Siswati</option><option value='st'>Sesotho</option><option value='su'>Sundanese</option><option value='sv'>Swedish</option><option value='sw'>Swahili</option><option value='ta'>Tamil</option><option value='te'>Tegulu</option><option value='tg'>Tajik</option><option value='th'>Thai</option><option value='ti'>Tigrinya</option><option value='tk'>Turkmen</option><option value='tl'>Tagalog</option><option value='tn'>Setswana</option><option value='to'>Tonga</option><option value='tr'>Turkish</option><option value='ts'>Tsonga</option><option value='tt'>Tatar</option><option value='tw'>Twi</option><option value='uk'>Ukrainian</option><option value='ur'>Urdu</option><option value='uz'>Uzbek</option><option value='vi'>Vietnamese</option><option value='vo'>Volapuk</option><option value='wo'>Wolof</option><option value='xh'>Xhosa</option><option value='yo'>Yoruba</option><option value='zh'>Chinese</option><option value='zu'>Zulu</option></select>                                     
                                    <a id="deseducationalLanguage" class="descripcion"  title="<?= $help ?>"></a>
                                    <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleLearningLanguage ?></div> 
                                </div>
                            </div>
                            <div class="caja3">
                                <span class="at">
                                    <a id="anadireducationalLanguage" class="pointer" href="" value="" title="<?= $add ?>"></a>
                                </span>
                            </div>
                        </div>
                        <!--Semantic Density-->
                        <div class="caja"  id="educationalSemanticDensity0">
                            <div class="caja2">
                                <div class="titulo">
                                    <label> <?= $semanticDensity ?>:</label>
                                </div>
                                <div class="input">
                                    <select id="inputeducationalSemanticDensity" name="educationalSemanticDensity">
                                        <option value="none"><?= $select ?></option>
                                        <option value="1">muy baja</option> 
                                        <option value="2">baja</option>
                                        <option value="3">media</option>
                                        <option value="4">alta</option>
                                        <option value="5">muy alta</option>
                                    </select>	
                                    <a id="deseducationalSemanticDensity" class="descripcion"  title="<?= $help ?>"></a>
                                    <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleLearningSemanticDensity ?></div> 
                                </div>
                            </div>
                            <div class="caja3">
                            </div>
                        </div>










                </fieldset>
                <div class="prev">
                    <a class="bs" href="#tab4" asd=".p4" ></a>   
                </div> 
                <div class="next"> <!--botton Guardar Parcialmente y Finalmente-->
                    <input name="guardarParcialmente" title="<?= $partialSave ?>" type="button" class="guardarParcialmente pointer" value=""/>  
                    <input name="guardarCompletamente" title="<?= $completelySave ?>" type="button" class="guardarCompletamente pointer" value=""/>  
                </div>
                <div class="next">
                    <a class="bs" href="#tab6" asd=".p6" ></a>   
                </div> 
            </div>

            <!--Rights-->
            <div id="tab6" class="tab_content">
                <fieldset class="nivel2"><legend><label rel="tooltip" data-placement="right" data-original-title="Esta categoría cubre la información relacionada con los derechos de propiedad y condiciones de uso  del objeto de aprendizaje"><?= $rights ?></label></legend>

                    <!--Cost-->
                    <div class="caja"  id="rightsCost0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $cost ?>:</label>
                            </div>
                            <div class="input">
                                <select id="inputrightsCost" name="rightsCost">
                                    <option value="none"><?= $select ?></option>
                                    <option value="1">si</option> 
                                    <option value="2">no</option>
                                </select>	
                                <a id="desrightsCost" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleRightsCost ?></div> 
                            </div>
                        </div>
                        <div class="caja3">
                        </div>
                    </div>

                    <!--Copyright and Other Restrictions-->
                    <div class="caja"  id="rightsCopyrightandOtherRestrictions0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $copyrightAndOtherRestrictions ?>:</label>
                            </div>
                            <div class="input">
                                <select id="inputrightsCopyrightandOtherRestrictions" name="rightsCopyrightandOtherRestrictions">
                                    <option value="none"><?= $select ?></option>
                                    <option value="1">si</option> 
                                    <option value="2">no</option>
                                </select>	
                                <a id="desrightsCopyrightandOtherRestrictions" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleRightsCopyrightAndOtherRestrictions ?></div> 
                            </div>
                        </div>
                        <div class="caja3">
                        </div>
                    </div>

                    <!--Description-->
                    <div class="caja"  id="rightsDescription0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $description ?>:</label>
                            </div>
                            <div class="input">
                                <textarea id="inputrightsDescription" name="rightsDescription" type="textarea"></textarea>
                                <a id="desrightsDescription" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleRightsDescription ?></div> 
                            </div>
                        </div>
                        <div class="caja3">
                        </div>
                    </div>
                </fieldset>
                <div class="prev">
                    <a class="bs" href="#tab5" asd=".p5" ></a>   
                </div> 
                <div class="next"> <!--botton Guardar Parcialmente y Finalmente-->
                    <input name="guardarParcialmente" title="<?= $partialSave ?>" type="button" class="submit guardarParcialmente pointer" value=""/>  
                    <input name="guardarCompletamente" title="<?= $completelySave ?>" type="button" class="guardarCompletamente pointer" value=""/>  

                </div>
                <div class="next">
                    <a class="bs" href="#tab7" asd=".p7" ></a>   
                </div> 
            </div>

            <!--Relation-->
            <div id="tab7" class="tab_content">
                <fieldset class="nivel2"><legend><label rel="tooltip" data-placement="right" data-original-title="Esta categoría define la relación, si es que hay alguna, entre este objeto de aprendizaje y otros"><?= $relation ?></label></legend>

                    <!--Kind-->
                    <div class="caja"  id="relationKind0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $kind ?>:</label>
                            </div>
                            <div class="input">
                                <select id="inputrelationKind" name="relationKind">
                                    <option value="none"><?= $select ?></option>
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
                                <a id="desrelationKind" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleRelationKind ?></div> 
                            </div>
                        </div>
                        <div class="caja3">
                        </div>
                    </div>

                    <!--Resource-->
                    <fieldset class="caja2 subcategoria anidada fondoBlanco"><legend><label rel="tooltip" data-placement="right" data-original-title="Objeto sobre el cual hace referencia la relación"><?= $resource ?></label></legend>

                        <!--Description-->
                        <div class="caja"  id="relationDescription0">
                            <div class="caja2">
                                <div class="titulo">
                                    <label> <?= $description ?>:</label>
                                </div>
                                <div class="input">
                                    <textarea id="inputrelationDescription" name="relationDescription" type="textarea" maxlength="1000"></textarea>
                                    <a id="desrelationDescription" class="descripcion"  title="<?= $help ?>"></a>
                                    <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleRelationDescription ?></div> 
                                </div>
                            </div>
                            <div class="caja3">
                                <span class="at">
                                    <a id="anadirrelationDescription" class="pointer" href="" value="" title="<?= $add ?>"></a>
                                </span>
                            </div>
                        </div>

                        <fieldset  class="caja2 subcategoria anidada2 " ><legend><label rel="tooltip" data-placement="right" data-original-title="Etiqueta única de identificación del objeto con el que tiene relación según un sistema de catalogación"><?= $identifier ?></label></legend>
                            <!--OrComposite-->

                            <div class="caja"  id="relationIdentifier0">
                                <div class="caja2">

                                    <!--Catalog-->
                                    <div class="titulo">
                                        <label> <?= $catalog ?>:</label>
                                    </div>
                                    <div class="input">
                                        <input id="inputrelationCatalog" name="relationCatalog" type="text"/>
                                        <a id="desrelationCatalog" class="descripcion"  title="<?= $help ?>"></a>
                                        <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleRelationCatalog ?></div> 
                                    </div>

                                    <!--Entry-->
                                    <div class="titulo">
                                        <label> <?= $entry  ?>:</label>
                                    </div>
                                    <div class="input">
                                        <input id="inputrelationEntry" name="relationEntry" type="text"/>
                                        <a id="desrelationEntry" class="descripcion"  title="<?= $help ?>"></a>
                                        <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleRelationEntry ?></div> 
                                    </div>


                                </div>
                                <div class="caja3">
                                    <span class="at">
                                        <a id="anadirrelationIdentifier" class="pointer" href="" value="" title="<?= $add ?>"></a>
                                    </span>
                                </div>
                            </div>



                        </fieldset>



                        <!-- </fieldset>-->
                        <div class="caja3">

                        </div>

                        <!--                                </div> -->


                    </fieldset>

                </fieldset>
                <div class="prev">
                    <a class="bs" href="#tab6" asd=".p6" ></a>   
                </div> 
                <div class="next"> <!--botton Guardar Parcialmente y Finalmente-->
                    <input name="guardarParcialmente" title="<?= $partialSave ?>" type="button" class="guardarParcialmente pointer" value=""/>  
                    <input name="guardarCompletamente" title="<?= $completelySave ?>" type="button" class="guardarCompletamente pointer" value=""/>  
                </div>
                <div class="next">
                    <a class="bs" href="#tab8" asd=".p8" ></a>   
                </div> 
            </div>

            <!--Annotation-->
            <div id="tab8" class="tab_content">
                <fieldset class="nivel2"><legend><label rel="tooltip" data-placement="right" data-original-title="Esta categoría cubre la información relacionada con los comentarios sobre el uso educativo del objeto de aprendizaje, incluyendo quién y cuándo fueron hechos"><?= $annotation ?></label></legend>

                    <!--Entity-->
                    <div class="caja"  id="annotationEntity0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $entity ?>:</label>
                            </div>
                            <div class="input">
                                <input id="inputannotationEntity" name="annotationEntity" type="text"/>	
                                <a id="desannotationEntity" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleAnnotationEntity ?> </div> 
                            </div>
                        </div>
                        <div class="caja3">
                        </div>
                    </div>

                    <!--Date-->
                    <div class="caja"  id="annotationDate0">
                        <div class="caja2">
                            <div class="titulo">
                                <label ><?= $date  ?>:</label>
                            </div>
                            <div class="input">
                                <input id="inputannotationDate" class="date" name="annotationDate" type="text"/> 
                                <a id="desannotationDate" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput"><b><?= $example ?>:</b> <?= $exampleAnnotationDate ?></div> 		
                            </div>
                        </div>
                        <div class="caja3">
                        </div>
                    </div>

                    <!--Description-->
                    <div class="caja"  id="annotationDescription0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $description ?>:</label>
                            </div>
                            <div class="input">
                                <textarea id="inputannotationDescription" name="annotationDescription" type="textarea"></textarea>
                                <a id="desannotationDescription" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleAnnotationDescription ?></div> 
                            </div>
                        </div>
                        <div class="caja3">
                        </div>
                    </div>


                </fieldset>
                <div class="prev">
                    <a class="bs" href="#tab7" asd=".p7" ></a>   
                </div> 
                <div class="next"> <!--botton Guardar Parcialmente y Finalmente-->
                    <input name="guardarParcialmente" title="<?= $partialSave ?>" type="button" class="guardarParcialmente pointer" value=""/>  
                    <input name="guardarCompletamente" title="<?= $completelySave ?>" type="button" class="guardarCompletamente pointer" value=""/>  
                </div>
                <div class="next">
                    <a class="bs" href="#tab9" asd=".p9" ></a>   
                </div> 
            </div>

            <!--Classification-->
            <div id="tab9" class="tab_content">
                <fieldset class="nivel2"><legend><label rel="tooltip" data-placement="right" data-original-title="Esta categoría determina si el objeto de aprendizaje se puede ubicar dentro de un sistema de clasificación específico "><?= $classification ?></label></legend>

                    <!--Purpose-->
                    <div class="caja"  id="classificationPurpose0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $purpose ?>:</label>
                            </div>
                            <div class="input">
                                <select id="inputclassificationPurpose" name="classificationPurpose">
                                    <option value="none"><?= $select ?></option>
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
                                <a id="desclassificationPurpose" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleClassificationPurpose ?></div> 
                            </div>
                        </div>
                        <div class="caja3">
                        </div>
                    </div>


                    <!--Description-->
                    <div class="caja"  id="classificationDescription0">
                        <div class="caja2">
                            <div class="titulo">
                                <label> <?= $description ?>:</label>
                            </div>
                            <div class="input">
                                <textarea id="inputclassificationDescription" name="classificationDescription" type="textarea"></textarea>
                                <a id="desclassificationDescription" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleClassificationDescription ?></div> 
                            </div>
                        </div>
                        <div class="caja3">
                        </div>
                    </div>

                    <!--Keyword-->
                    <div class="caja" id="classificationKeyword0">
                        <div class="caja2">
                            <div class="titulo">
                                <?= $keywords ?>:
                            </div>
                            <div class="input">
                                <input id="inputclassificationKeyword" name="classificationKeyword" type="text" />
                                <a id="desclassificationKeyword" class="descripcion"  title="<?= $help ?>"></a>
                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleClassificationKeywords ?> </div> 
                            </div>
                        </div>
                        <div class="caja3">
                            <span class="at">
                                <a id="anadirclassificationKeyword" href="" class="pointer" value="" title="<?= $add ?>"></a>
                            </span>
                        </div>
                    </div>

                    <!--Taxon Path -->
                    <fieldset class="subcategoria anidada"><legend><label rel="tooltip" data-placement="right" data-original-title="Ruta taxonómica en un sistema de clasificación específico"><?= $taxonomicRoute ?></label></legend>

                        <div class="caja" id="classificationTaxonPath0" >
                            <div class="caja2 classificationTaxonPath">
                                <!--Source-->
                                <div class="caja" id="classificationSource0">
                                    <div class="caja2">
                                        <div class="titulo">
                                            <?= $source ?>:
                                        </div>
                                        <div class="input">
                                            <input id="inputclassificationSource" name="classificationSource0_0" type="text" />
                                            <a id="desclassificationSource" class="descripcion"  title="<?= $help ?>"></a>
                                            <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleClassificationSource ?> </div> 
                                        </div>
                                    </div>
                                    <div class="caja3">
                                    </div>
                                </div>
                                <fieldset class="caja2 subcategoria anidada2 " ><legend><label rel="tooltip" data-placement="right" data-original-title="Nodo particular dentro de la taxonomía"><?= $taxon ?></label></legend>
                                    <div class="caja"  id="classificationTaxon0_0">
                                        <div class="caja2">
                                            <!--Entry-->
                                            <div class="titulo">
                                                <label> <?= $id3 ?>:</label>
                                            </div>
                                            <div class="input">
                                                <input id="inputclassificationId" name="classificationId0_0" type="text"/>
                                                <a id="desclassificationId" class="descripcion"  title="<?= $help ?>"></a>
                                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleClassificationId ?></div> 
                                            </div>
                                        </div>
                                        <div class="caja3">
                                        </div>

                                        <div class="caja2">
                                            <!--Entry-->
                                            <div class="titulo">
                                                <label> <?= $entry  ?>:</label>
                                            </div>
                                            <div class="input">
                                                <input id="inputclassificationEntry" name="classificationEntry0_0" type="text"/>
                                                <a id="desclassificationEntry" class="descripcion"  title="<?= $help ?>"></a>
                                                <div class="dinput" ><b><?= $example ?>:</b> <?= $exampleClassificationEntry ?></div> 
                                            </div>
                                        </div>
                                        <div class="caja3">
                                            <span class="at">
                                                <a id="anadirclassificationTaxon" numero="0" cantidadTaxon="0" class="pointer" href="" value="" title="<?= $add ?>"></a>
                                            </span>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="caja3">
                                <span class="at">
                                    <a id="anadirclassificationTaxonPath" class="pointer" href="" value="" title="<?= $add ?>"></a>
                                </span>
                            </div>
                        </div>
                        <div class="caja3">                                 
                        </div>



                    </fieldset>




                </fieldset>
                <!--                        <div id="cargarphp"> </div>-->
                <div class="prev">
                    <a class="bs" href="#tab8" asd=".p8" ></a>   
                </div> 
                <div id="save"> <!--Guardar Completamente-->

                    <input name="guardarParcialmente" title="<?= $partialSave ?>" type="button" class="guardarParcialmente pointer" value=""/>  
                    <input name="guardarCompletamente" title="<?= $completelySave ?>" type="button" class="guardarCompletamente pointer" value=""/>  
                </div>
            </div> 
        </form>
    </div>
</div>
<div style="clear: both; display: block; padding: 10px 0; text-align:center; font-size:0.9em"> </div>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>

<?php
if ($_GET["action"] != "Formulario_Ver") {
    $archivo = fopen('vista/campos.txt', 'r') or die('Error al abrir el archivo');
    $x = 1;
    $a = (fgets($archivo));
    fclose($archivo);
    $array = (explode(",", $a));
    $limite = sizeof($array);

    /* echo "<script type='text/javascript'>	
      $('.tab_content').hide(); //Hide all content
      </script>"; */

    for ($j = 0; $j < $limite; $j++) {
        echo "<script type='text/javascript'>	
			$('#input" . $array[$j] . "').addClass('req');
			$('#input" . $array[$j] . "').focus().before('<span class=\'obligatorio\'>*</span>');
			
			</script>";
    }
}
?> 