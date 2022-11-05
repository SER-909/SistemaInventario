<?php

require_once("../modelo/conexion.php");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporte.xls");
?>


<table class="table table-striped table-dark " id="table_id">


    <thead>
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Num Serie</th>
            <th>Clave de Invebtario</th>
            <th>Estado</th>
            <th>Tipo</th>


        </tr>
    </thead>
    <tbody>

        <?php

        // include "modelo/conexion.php";

        $sql = $conexion->query("select * from equipos");
        while ($datos = $sql->fetch_object()) { ?>

            <tr>
                <td><?= $datos->id ?></td>
                <td><?= $datos->marca ?></td>
                <td><?= $datos->modelo ?></td>
                <td><?= $datos->numSerie ?></td>
                <td><?= $datos->claveInventario ?></td>
                <td><?= $datos->estado ?></td>
                <td><?= $datos->tipo ?></td>
                <td>
                </td>
            </tr>
        <?php } ?>