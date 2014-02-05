
<div class="cabecera2 gradiente areas" id="area4">
    <?php
    if (isset($_GET['eliminarUsuario'])) {
        $query="DELETE FROM users WHERE iduser='".$_GET["eliminarUsuario"]."'";
        $c->realizarOperacion($query);
    }
    if (isset($_GET['order'])) {
        $order = $_GET['order'];
    } else {
        $order = "lastname";
    }

    $result = $c->realizarOperacion("SELECT * FROM USERS where role=1 ORDER BY $order");
    ?>  


    <table id="area4Lista">
        <tr>
            <td><a href="admin.php?action=area4&order=name"><?= $name ?></a></td>
            <td><a href="admin.php?action=area4&order=lastname"><?= $lastName ?></a></td>
            <td><a href="admin.php?action=area4&order=logging"><?= $user ?></a></td>
            <td><a href="admin.php?action=area4&order=email"><?= $email ?></a></td>
             <td><a  href=""><?= $OAUploaded ?></a></td>
            <td><a  href=""><?= $delete ?></a></td>
           
        <tr/>

<?php
while ($row = pg_fetch_array($result)) {
    
    $query= "select count(*) from lo where iduser= $row[0] ";
     $result2 = $c->realizarOperacion($query);
     $nOAs= pg_fetch_array($result2);
    echo "<tr id=$row[4]>";
    echo "<td>$row[1]</td>";
    echo "<td>$row[2]</td>";
    echo "<td id>$row[4]</td>";
    echo "<td>$row[5]</td>";
     echo "<td>$nOAs[0]</td>";
    echo "<td><a class='borrarUsuario' title='Eliminar Usuario'  href='admin.php?action=area4&order=$order&eliminarUsuario=$row[0]'></a></td>";
    echo "<tr/>";
}
?>

    </table>

</div>