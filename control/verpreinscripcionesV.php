<div id="contenedorPreinscripciones">
    <fieldset>

        <legend><h3><center><?= $curso[0]->nombre ?></center></h3>    <h4>Lista de preinscritos:</h4></legend>
        <form action="<?= base_url() ?>eliminarpreinscripciones/<?= $idCurso ?>" method="post">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Documento</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>E-mail</th>
                        <th>Teléfono</th>
                        <th>Categoria</th>
                        <th>Fecha de preinscripción</th>
                        <?php if (isset($_SESSION["usuario"]["id"])) { ?>
                            <th>Eliminar</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($preisncritos as $row) { ?>
                        <tr>
                              <td><?= $row->documento; ?></td>
                            <td><?= $row->nombres; ?></td>
                            <td><?= $row->apellidos; ?></td>
                            <td><?= $row->email; ?></td>
                            <td><?= $row->telefono; ?></td>
                            <td><?= $row->categoria; ?></td>
                            <td><?= $row->fecha; ?></td>
                            <?php if (isset($_SESSION["usuario"]["id"])) { ?>
                                <th><input name="inscritos[]" value="<?= $row->documento; ?>" type="checkbox"></th>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php if (count($preisncritos) > 0) { ?>
                <button class="btn btn-danger pull-right">Eliminar</button>
            <?php } ?>
        </form>
    </fieldset>
</div>
