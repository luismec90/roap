<div id="aresRAteComments"> 
    <?php
    if (isset($_GET["idOA"])) {
        $idlo = $_GET["idOA"];
        $res = $c->realizarOperacion("SELECT * FROM rating WHERE idlo='$idlo' AND comment <> '' order by date desc");
        $n = pg_num_rows($res);
        if ($n > 0) {
            $titulo = pg_fetch_array($c->getGeneralTitle($_GET["idOA"]));
            echo "<div id='commentNombreOA'><label>Objeto de aprendizaje:</label> <a id='commentLinkOA' href='control/download.php?id=$idlo'>$titulo[0]</a></div>";
            while ($r = pg_fetch_array($res)) {

                if ($r[5] == "t") {
                    $nombre = "Anónimo";
                } else {
                    $nombre = pg_fetch_array($c->obtenerDatosUsuario("name, lastname", $r[1]));
                    $nombre = $nombre[0] . " " . $nombre[1];
                }
                $fecha = substr($r[4], 0, -7);
                $rating = $r[2];
                $valoracion = "<span id='$idlo'>";
                for ($j = 1; $j <= 10; $j++) {
                    $ispar = ($j % 2 == 0) ? 1 : 0;
                    if ($ispar == 1) {
                        if ($j <= $rating) {
                            $valoracion .= "<span class='star2 derP' n='$j' idlo='$idlo' ></span>";
                        } else {
                            $valoracion .= "<span class='star2 der' n='$j' idlo='$idlo' ></span>";
                        }
                    } else {
                        if ($j <= $rating) {
                            $valoracion .= "<span class='star2 izqP' n='$j' idlo='$idlo' ></span>";
                        } else {
                            $valoracion .= "<span class='star2 izq' n='$j' idlo='$idlo' ></span>";
                        }
                    }
                }
                $valoracion .= "</span>";

                echo "<div class='commentFila'>
                     <label>Usuario:</label> $nombre, <label>Fecha:</label> $fecha, <label>Valoración:$valoracion</label>
                 <div class='commentArea'>
                 </div>
                <br/>
                   <label>Comentario:</label> $r[3]
                </div>";
            }
        } else {
            echo "<div id='noHaveComments'>$textAunNoTieneComentarios";
        }
    } else {
        
    }
    ?>


</div>
<style>
    #commentNombreOA {
        text-align: center;
        font-size: 1.7em;
    }
    #commentLinkOA{
        color: #0A6380;
        text-decoration: none;
    }
    #commentLinkOA:hover{
        color:black;
    }
    #aresRAteComments{
        width: 80%;
        background: #EBEBEB;
        margin-left: auto;
        margin-right: auto;
        min-height:90%;
        padding: 1em;
        min-height: 400px;
        color: #333;
        -webkit-box-shadow: 0 0 5px 1px #C7C7C7;
        -moz-box-shadow: 0 0 5px 1px #c7c7c7;
        box-shadow: 0 0 5px 1px #C7C7C7;
        background: white;
    }
    #aresRAteComments .commentFila{
        margin-top:1em;
        padding: 1em;
        padding-left: 1em;
        background: #E7E7E7;
        border: 1px solid B8B8B8;
        -webkit-box-shadow: 0 0 5px 1px #C7C7C7;
        -moz-box-shadow: 0 0 5px 1px #c7c7c7;
        box-shadow: 0 0 5px 1px #C7C7C7;
    }
    #aresRAteComments label{
        color:#1769FF;
        font-weight: bold;
        margin-left: 0em;
    }
    #noHaveComments{
        text-align: center;
        font-size: 1.7em;
        color:#1769FF;
    }
</style>