<?php

if(!empty($_POST['so'])){ 

if(!empty($_POST['so'])){ 
        $so = $_POST['so'];       
        $sql=$conexion->query("insert into sistema_operativo(
            so) values('$so')
        ");

        if($sql == 1){
            echo '<div class="alert alert-success">Sistema Operativo registrado correctamente</div>';
        }else{
            echo '<div class="alert alert-danger">Sistema Operativo registrado incorrectamente</div>';
        }
    
}else{
    echo '<div class="alert alert-warning">Alguno de los campos esta vacio</div>';
}

}
