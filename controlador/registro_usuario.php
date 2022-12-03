<?php

if(!empty($_POST['asignacion'])){

    if(!empty($_POST['asignacion']) and !empty($_POST['rol']) and !empty($_POST['password'])){
        $id_empleado = $_POST['asignacion'];
        $rol =$_POST['rol'];
        $pass =$_POST['password'];        

        $sqli = $conexion->query("select * from empleado where id = $id_empleado");
        while ($datos = $sqli->fetch_object()) {
            $nombre = $datos->nombre;
            $apellidoM = $datos->apellidoM;
            $apellidoP = $datos->apellidoP;
        }

        $nombreCom=trim($nombre)." ".trim($apellidoM)." ".trim($apellidoP);

        $sql=$conexion->query("insert into usuarios(
            rol,password,id_empleado,nombre,activo) values('$rol','$pass','$id_empleado','$nombreCom','1')
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
