<?php

if(!empty($_POST['nombre'])){ 

if(!empty($_POST['nombre'])){ 
        $nombre = $_POST['nombre'];       
        $sql=$conexion->query("insert into marca(
            nombre) values('$nombre')
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

