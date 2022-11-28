<?php

if (!empty($_POST["btnRegistrar"])) {

    if (
        !empty($_POST["marca"])
         and !empty($_POST["id_modelo"])
          and !empty($_POST["numSerie"])
           and !empty($_POST["claveInventario"])
            and !empty($_POST["estado"])
            and !empty($_POST["cantidadRam"])
            and !empty($_POST["modulosRam"])
            and !empty($_POST["slotsRam"])
            and !empty($_POST["tipoDisco"])
            and !empty($_POST["cantidadAlmacenamiento"])
            and !empty($_POST["cantidadAlmacenamientoSDD"])
            and !empty($_POST["tipo"])
             and !empty($_POST["marcaMon"])
              and !empty($_POST["modeloMon"])
               and !empty($_POST["numSerialMon"])
                and !empty($_POST["id_sistema_operativo"]) and !empty($_POST["claveSO"]) and !empty($_POST["marcaT"]) and !empty($_POST["modeloT"]) and !empty($_POST["numSerialT"]) and !empty($_POST["marcaMouse"]) and !empty($_POST["modeloMouse"]) and !empty($_POST["numSerialMouse"]) and !empty($_POST["observaciones"]) and !empty($_POST["asignacion"])
    ) {

        $marca = $_POST["marca"];
        $numSerie = $_POST["numSerie"];
        $claveInventario = $_POST["claveInventario"];
        $estado = $_POST["estado"];
        $cantidadRam = $_POST["cantidadRam"];
        $modulosRam = $_POST["modulosRam"];
        $slotsRam = $_POST["slotsRam"];
        $tipoDisco = $_POST["tipoDisco"];
        $cantidadAlmacenamiento = $_POST["cantidadAlmacenamiento"];
        $cantidadAlmacenamientoSDD = $_POST["cantidadAlmacenamientoSDD"];
        $tipo = $_POST["tipo"];
        $marcaMon = $_POST["marcaMon"];
        $modeloMon = $_POST["modeloMon"];
        $numSerialMon = $_POST["numSerialMon"];
        $claveSO = $_POST["claveSO"];
        $marcaT = $_POST["marcaT"];
        $modeloT = $_POST["modeloT"];
        $numSerialT = $_POST["numSerialT"];
        $marcaMouse = $_POST["marcaMouse"];
        $modeloMouse = $_POST["modeloMouse"];
        $numSerialMouse = $_POST["numSerialMouse"];
        $observaciones = $_POST["observaciones"];
        $id_empleado = $_POST["asignacion"];
        $id_sistema_operativo = $_POST["id_sistema_operativo"];
        $id_modelo = $_POST["id_modelo"];

        $sql = $conexion->query("insert into equipos(numSerie,claveInventario,estado,cantidadRam,modulosRam,slotsRam,tipoDisco,cantidadAlmacenamiento,cantidadAlmacenamientoSDD,tipo,marcaMon,modeloMon,numSerialMon,claveSO,marcaT,modeloT,numSerialT,marcaMouse,modeloMouse,numSerialMouse,observaciones,id_empleado,id_sistema_operativo,id_modelo,activo) values ('$numSerie',
        '$claveInventario',
        '$estado',
        '$cantidadRam',
        '$modulosRam',
        '$slotsRam',
        '$tipoDisco',
        '$cantidadAlmacenamiento',
        '$cantidadAlmacenamientoSDD',
        '$tipo',
        '$marcaMon',
        '$modeloMon',
        '$numSerialMon',
        '$claveSO',
        '$marcaT',
        '$modeloT',
        '$numSerialT',
        '$marcaMouse',
        '$modeloMouse',
        '$numSerialMouse',
        '$observaciones',
        '$id_empleado',
        '$id_sistema_operativo',
        '$id_modelo',
        '1') ");

        if ($sql == 1) {
            echo '<div class="alert alert-success">Equipo Registrado correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Equipo Registrado incorrectamente</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Alguno de los campos esta vacio</div>';
    }
}
