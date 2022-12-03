<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

    header("Location: ../modelo/login.php");
    die();
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="../estilos.css">

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/8320905322.js" crossorigin="anonymous"></script>

</head>

<body>

    <div class="container-fluid row">

        <header class="header col-3" style="height: 100vh;">
            <div class="container">
            <div class="col text-center"><br>
                    <h3 class="text-center"><?php echo $_SESSION['nombre'];?></h3><br>
                    <a class="btn btn-primary text-center" href="../_sesion/cerrarSesion.php">cerrar sesion
                        <i class="fa fa-power-off" aria-hidden="true"></i>
                    </a>
                </div>
                <br>
                <nav class="menu">                 
                    <h4>Tablas</h4>
                    <hr>
                    <a href="tabla_lector.php">Tabla - Equipos</a>
                    <a href="tabla_empleado_lector.php">Tabla - Personal</a>
                    <br>
                    <h4>Analisis</h4>
                    <hr>
                    <a href="grafica_lector.php">Graficos</a>
                    <br>                
                </nav>
            </div>
        </header>

        <div class="col-7 mt-5">

            <?php
            include "../modelo/conexion.php";
            ?>

            <form class="d-flex">
                <input class="form-control mb-4 light-table-filter" data-table="table_id" type="text" placeholder="Buscar">
                <hr>
            </form>

            <a class="btn btn-primary mb-3" href="../controlador/excel.php"><b>Excel</b>
                <i class="fa fa-table" aria-hidden="true"></i>
            </a>
            <a href="../pdf.php" class="btn btn-primary mb-3"><b>PDF</b>
                <i class="fa-solid fa-file-pdf"></i>
            </a>

            <table class="table table_id">
                <thead class="bg-info">
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">Tipo</th>
                        <th scope="col" class="text-center">Estado</th>
                        <th scope="col" class="text-center">Marca</th>
                        <th scope="col" class="text-center">Modelo</th>
                        <th scope="col" class="text-center">N° Serie</th>
                        <th scope="col" class="text-center">Clave de Inventario</th>
                        <th scope="col" class="text-center">Memoria RAM</th>
                        <th scope="col" class="text-center">Almacenamiento</th>
                        <th scope="col" class="text-center">S.O</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = $conexion->query("
                    select equipos.id,equipos.tipo,equipos.estado,equipos.numSerie,equipos.claveInventario,equipos.cantidadRam,equipos.cantidadAlmacenamiento,marca.nombre as nombreM,modelo.num,sistema_operativo.so from equipos INNER JOIN modelo ON equipos.id_modelo = modelo.id INNER JOIN marca on modelo.id_marca = marca.id INNER JOIN sistema_operativo ON equipos.id_sistema_operativo = sistema_operativo.id where equipos.activo = 1 GROUP BY equipos.id           
                    ");

                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= $datos->id ?></td>
                            <td><?= $datos->tipo ?></td>
                            <td><?= $datos->estado ?></td>
                            <td><?= $datos->nombreM?></td>
                            <td><?= $datos->num ?></td>
                            <td><?= $datos->numSerie ?></td>
                            <td><?= $datos->claveInventario?></td>
                            <td><?= $datos->cantidadRam?></td>
                            <td><?= $datos->cantidadAlmacenamiento?></td>
                            <td><?= $datos->so?></td>                  
                            <td>
                                <a href="#" class="btn btn-small btn-dark"><i class="fa-solid fa-eye"></i></a><br>                                
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>

    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>



    <script src="../controlador/js/buscador.js"></script>

</body>

</html>