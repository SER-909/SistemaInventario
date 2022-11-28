<?php

if(!empty($_POST['marca'])){

    if(!empty($_POST['modelo'])){
        $id_marca = $_POST['marca'];       
        $num = $_POST['modelo'];       

        $sql=$conexion->query("insert into modelo(
            num,id_marca) values('$num','$id_marca')
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