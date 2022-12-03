<?php

require_once("../modelo/conexion.php");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporte.xls");
?>


<table class="table table-striped table-dark " id="table_id">


    <thead>
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Estado</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Numero de Serie</th>
            <th>Clave de Inventario</th>
            <th>RAM</th>
            <th>Almacenamiento</th>
            <th>S.O</th>
        </tr>
    </thead>
    <tbody>

        <?php

        // include "modelo/conexion.php";

        $sql = $conexion->query("select equipos.id,equipos.tipo,equipos.estado,equipos.numSerie,equipos.claveInventario,equipos.cantidadRam,equipos.cantidadAlmacenamiento,marca.nombre as nombreM,modelo.num,sistema_operativo.so from equipos INNER JOIN modelo ON equipos.id_modelo = modelo.id INNER JOIN marca on modelo.id_marca = marca.id INNER JOIN sistema_operativo ON equipos.id_sistema_operativo = sistema_operativo.id where equipos.activo = 1 GROUP BY equipos.id");
        while ($datos = $sql->fetch_object()) { ?>

            <tr>
                <td><?= $datos->id ?></td>
                <td><?= $datos->tipo ?></td>
                <td><?= $datos->estado ?></td>
                <td><?= $datos->nombreM ?></td>
                <td><?= $datos->num ?></td>
                <td><?= $datos->numSerie ?></td>
                <td><?= $datos->claveInventario ?></td>
                <td><?= $datos->cantidadRam ?></td>
                <td><?= $datos->cantidadAlmacenamiento ?></td>
                <td><?= $datos->so ?></td>
                <td>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>