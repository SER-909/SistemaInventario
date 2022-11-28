<?php

if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
            case 'acceso_user';
            acceso_user();
            break;
		}
	}


function acceso_user() {
    include "conexion.php";
    $nombre=$_POST['nombre'];
    $password=$_POST['password'];
    session_start();
    $_SESSION['nombre']=$nombre;

    $consulta= "SELECT * FROM usuarios WHERE nombre='$nombre' AND password='$password'";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);


    if($filas['rol'] == 1){ //admin

        header('Location: ../index.php');

    }
    else if($filas['rol'] == 2){//lector
        header('Location: ../lector/tabla_lector.php');
    }else{

        header('Location: login.php');
        session_destroy();

    }

  
}



?>