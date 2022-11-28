<?php
include "../modelo/conexion.php";

$indice=0;
 $id = $_POST['idDepartamento'];

$sql = $conexion->query("select * from empleado where id_departamento=$id");
$datos = array();

while ($fila = mysqli_fetch_array($sql)) {
    $datos[$indice]=[
        "id_empleado"=>$fila['id'],
        "nombre_empleado"=>$fila['nombre'],
        "apellidoP_empleado"=>$fila['apellidoP'],
        "apellidoM_empleado"=>$fila['apellidoM'],
    ];
    $indice++;
}

echo json_encode($datos);

?>