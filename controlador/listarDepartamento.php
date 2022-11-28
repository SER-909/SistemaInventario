<?php
include "../modelo/conexion.php";

$indice=0;
$id = $_POST['idempresa'];
$sql = $conexion->query("select * from departamento where id_empresa=$id");
$datos = array();

while ($fila = mysqli_fetch_array($sql)) {
    $datos[$indice]=[
        "id_departamento"=>$fila['id'],
        "nombre_departamento"=>$fila['nombreDep'],
        "id_empresa"=>$fila['id_empresa']
    ];
    $indice++;
}

echo json_encode($datos);

?>