
<?php

session_start();
require '../../modelo/conexion.php';
$c = conector_pg::getInstance();
$iduser_roap = $_SESSION['iduser_roap'];
extract($_POST);

$q = "select count(*) from rating where iduser=$iduser_roap and idlo=$idlo";
$res = $c->realizarOperacion($q);
$res = pg_fetch_array($res);

if ($res[0] == 0) {//Si No ha valorado antes este Objeto
    if (isset($comentarioValoracion)) {//Si hizo un comentario para esta valoración
        $query = "insert into rating(iduser,idlo,valoration,comment,date,anonymus) values($iduser_roap,$idlo,$calificacion,'$comentarioValoracion',now(),'$anonimo')";
    } else {
        $query = "insert into rating(iduser,idlo,valoration,date) values($iduser_roap,$idlo,$calificacion,now())";
    }

    $c->realizarOperacion($query);
} else {//YA ha valorado este Objeto
    if (isset($comentarioValoracion)) {//Hizo un comentario para este valoración
        $query = " update rating set valoration='$calificacion', comment='$comentarioValoracion', date=now(),anonymus='$anonimo' where idlo=$idlo and iduser=$iduser_roap";
    } else {
        $query = " update rating set valoration='$calificacion',comment=null, date=now(), anonymus=false where idlo=$idlo and iduser=$iduser_roap";
    }

    $c->realizarOperacion($query);
}
$propietario = $c->realizarOperacion("select users.iduser from users natural join lo where lo.idlo=$idlo");
$propietario = pg_fetch_array($propietario);
if ($propietario[0] != $iduser_roap) {
    $yaloHevalorado = $c->realizarOperacion("Select count(*) from pending where idUserFrom='$iduser_roap' AND idUserTo='$propietario[0]' AND idLO='$idlo' AND type='11'");
    $yaloHevalorado = pg_fetch_array($yaloHevalorado);
    if ($yaloHevalorado[0] == 0)
        $c->realizarOperacion("insert into pending(idUserFrom,idUserTo,idLO,type)values($iduser_roap,$propietario[0],$idlo,11)");
}


$result = $c->obtenerRating($idlo);
$promedio = pg_fetch_array($result);
$promedio = round($promedio[0]);
$totalVotos = $c->contarVotos($idlo);
$c->close();
$totalVotos = pg_fetch_array($totalVotos);
for ($j = 1; $j <= 10; $j++) {
    $ispar = ($j % 2 == 0) ? 1 : 0;
    if ($ispar == 1) {
        if ($j <= $promedio) {
            echo "<span class='star derP' n='$j' idlo='$idlo' ></span>";
        } else {
            echo "<span class='star der' n='$j' idlo='$idlo' ></span>";
        }
    } else {
        if ($j <= $promedio) {
            echo "<span class='star izqP' n='$j' idlo='$idlo' ></span>";
        } else {
            echo "<span class='star izq' n='$j' idlo='$idlo' ></span>";
        }
    }
}echo "<a href='main.php?action=rateComments&idOA=$idlo' class='contadorVotos link'>($totalVotos[0] Votos)</a>";
?>
