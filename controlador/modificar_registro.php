
<?php

if(!empty($_POST["btnRegistrar"])){

    if (!empty($_POST["marca"]) and !empty($_POST["modelo"]) and !empty($_POST["numSerie"]) and !empty($_POST["claveInventario"]) and !empty($_POST["estado"]) and !empty($_POST["tipo"]) and !empty($_POST["marcaMon"]) and !empty($_POST["modeloMon"]) and !empty($_POST["numSerialMon"]) and !empty($_POST["so"]) and !empty($_POST["claveSO"]) and !empty($_POST["marcaT"]) and !empty($_POST["modeloT"]) and !empty($_POST["numSerialT"]) and !empty($_POST["marcaMouse"]) and !empty($_POST["modeloMouse"]) and !empty($_POST["numSerialMouse"]) and !empty($_POST["observaciones"])){
        
        $id=$_POST["id"];
        $marca=$_POST["marca"];
        $modelo=$_POST["modelo"];
        $numSerie=$_POST["numSerie"];
        $claveInventario=$_POST["claveInventario"];
        $estado=$_POST["estado"];
        $tipo=$_POST["tipo"];
        $marcaMon=$_POST["marcaMon"];
        $modeloMon=$_POST["modeloMon"];
        $numSerialMon=$_POST["numSerialMon"];
        $so=$_POST["so"];
        $claveSO=$_POST["claveSO"];
        $marcaT=$_POST["marcaT"];
        $modeloT=$_POST["modeloT"];
        $numSerialT=$_POST["numSerialT"];
        $marcaMouse=$_POST["marcaMouse"];
        $modeloMouse=$_POST["modeloMouse"];
        $numSerialMouse=$_POST["numSerialMouse"];
        $observaciones=$_POST["observaciones"];

        $sql = $conexion->query("update equipos set
            marca='$marca',modelo='$modelo',numSerie='$numSerie',claveInventario='$claveInventario' ,estado='$estado',tipo='$tipo',marcaMon='$marcaMon',modeloMon='$modeloMon',numSerialMon='$numSerialMon',so='$so',claveSO='$claveSO',marcaT='$marcaT',modeloT='$modeloT',numSerialT='$numSerialT',marcaMouse='$marcaMouse',modeloMouse='$modeloMouse',numSerialMouse='$numSerialMouse',observaciones='$observaciones'  where id='$id'");

        if($sql==1){
            header("location:tabla.php");
        }else{
            echo '<div class="alert alert-danger">Equipo Registrado incorrectamente</div>';
        }


    }else{
        echo '<div class="alert alert-danger">Alguno de los campos esta vacio</div>';
    }
}