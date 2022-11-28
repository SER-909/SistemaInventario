<?php
include "../modelo/conexion.php";

$indice=0;
$id = $_POST['idmarca'];
$sql = $conexion->query("Select * from modelo where id_marca=$id");
$datos = array();

while ($fila = mysqli_fetch_array($sql)) {
    $datos[$indice]=[
        "id_modelo"=>$fila['id'],
        "num"=>$fila['num']
    ];
    $indice++;
}

echo json_encode($datos);

?>
