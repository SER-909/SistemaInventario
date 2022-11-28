<?php

if(!empty($_GET['id'])){
    $id = $_GET['id'];

    $sql = $conexion->query("update equipos set activo='0' where id='$id'");

    if($sql==1){
        echo '<div class="alert alert-success">Equipo eliminado correctamente</div>';
    }else{
        echo '<div class="alert alert-danger">Error al eliminar</div>';
    }
}

?>