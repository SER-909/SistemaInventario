<?php

if(!empty($_POST['btnRegistrar'])){

    if(!empty($_POST['nombre']) and !empty($_POST['apellidoP']) and !empty($_POST['apellidoM']) and !empty($_POST['departamento']) and !empty($_POST['numEmpleado'])){
        $nombre = $_POST['nombre'];
        $apellidoP =$_POST['apellidoP'];
        $apellidoM =$_POST['apellidoM'];
        $idDepartamento =$_POST['departamento'];
        $numEmpleado = $_POST['numEmpleado'];

        $sql=$conexion->query("insert into empleado(
            nombre,apellidoP,apellidoM,numEmpleado,id_departamento,activo) values('$nombre','$apellidoP','$apellidoM','$numEmpleado','$idDepartamento','1')
        ");

        if($sql == 1){
            echo '<div class="alert alert-success">Empleado registrado correctamente</div>';
        }else{
            echo '<div class="alert alert-danger">Empleado registrado incorrectamente</div>';
        }
    }else{
        echo '<div class="alert alert-warning">Alguno de los campos esta vacio</div>';
    }

}



?>