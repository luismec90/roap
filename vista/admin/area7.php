<?php
$diccionario = file_get_contents($ruta, "r") or exit("Unable to open file!");
$result = $c->realizarOperacion("SELECT * FROM idioma order by nombre");

?>
<div class="cabecera2 gradiente areas" id="area7">
    <form action="../../control/admin/area7.php?action=changeidiom" method="POST">
        <label class="alinear"><?= $selectALanguage ?></label>

        <select  class="alinear" id="seleccionarIdioma"  name="idioma">
            <?php while ($row = pg_fetch_array($result)) { ?>
                <option value="<?= $row[0] ?>" <?php if ($row[2] == "t") echo "selected"; ?>><?= $row[1] ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="<?= $set ?>">
    </form>
    <form action="../../control/admin/area7.php?action=save" method="POST">
        <textarea id="textAreaIdioma" rows=30 wrap='off' name="texto"><?= $diccionario ?></textarea>
        <input type="submit" value="<?= $save ?>">
    </form>
</div>
<style>
    #area7{
        width: 94%;
        border-right: none;
        margin-left: auto;
    }
    #textAreaIdioma{
        width: 100%;
    }
</style>