<?php
include "../modelo/conexion.php";

$indice=0;
$sql = $conexion->query("Select * from marca");
$datos = array();

while ($fila = mysqli_fetch_array($sql)) {
    $datos[$indice]=[
        "id_marca"=>$fila['id'],
        "nombre_marca"=>$fila['nombre']
    ];
    $indice++;
}

echo json_encode($datos);

?>