<?php
include "../modelo/conexion.php";

$indice=0;
$sql = $conexion->query("Select * from empresa");
$datos = array();

while ($fila = mysqli_fetch_array($sql)) {
    $datos[$indice]=[
        "id_empresa"=>$fila['id'],
        "nombre_empresa"=>$fila['nombreEmpresa']
    ];
    $indice++;
}

echo json_encode($datos);

?>