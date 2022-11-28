<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

    header("Location: modelo/login.php");
    die();
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de inventario</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="estilos.css">

    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/8320905322.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid row">
    <header class="header col-3">
            <div class="container">
                <div class="col text-center">
                    <h3 class="text-center"><?php echo $_SESSION['nombre']; ?></h3><br>
                    <a class="btn btn-primary text-center" href="_sesion/cerrarSesion.php">cerrar sesion
                        <i class="fa fa-power-off" aria-hidden="true"></i>
                    </a>
                </div>
                <br>
                <nav class="menu">
                    <h4>Registros</h4>
                    <hr class="espacio">
                    <a href="index.php">Registrar - Equipo</a>
                    <a href="registro_empleado.php">Registrar - Personal</a>
                    <a href="registro_marca.php">Registrar - Marca de PC</a>
                    <a href="registro_modelo.php">Registrar - Modelo de PC</a>
                    <a href="registro_so.php">Registrar - Sistema Operativo</a>
                    <br>
                    <h4>Tablas</h4>
                    <hr>
                    <a href="tabla.php">Tabla - Equipos</a>
                    <a href="tabla_empleado.php">Tabla - Personal</a>
                    <br>
                    <h4>Analisis</h4>
                    <hr>
                    <a href="grafica.php">Graficos</a>
                    <br>
                    <h4>Sesiones</h4>
                    <hr>
                    <a href="#">Nuevo Usuario</a>
                    <a href="#">Usuarios</a>
                </nav>
            </div>
        </header>

        <div class="col-6 m-auto">
            <h1 class="text-center m-5">Registro de Modelo de Equipo de Cómputo</h1>
            <?php
            include "modelo/conexion.php";
            include "controlador/registro_modelo.php";
            ?>

            <form class="row" method="POST">

                <div class="mb-3 col-12">
                    <label class="form-label">Marca</label>
                    <select class="form-select combobox" name="marca">
                        <?php
                        $sql = $conexion->query("select * from marca");
                        while ($datos = $sql->fetch_object()) {
                        ?>
                            <option value="<?= $datos->id; ?>"><?= $datos->nombre; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3 col-12">
                    <label class="form-label">Numero de Modelo</label>
                    <input type="tetx" class="form-control" name="modelo">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary m-5 col-3" name="btnRegistrar" value="ok">Enviar</button>

                    <button type="reset" class="btn btn-primary m-5 col-3">Limpiar</button>
                </div>

            </form>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>