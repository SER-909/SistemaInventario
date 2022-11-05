<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="estilos.css">

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/8320905322.js" crossorigin="anonymous"></script>

</head>

<body>

    <div class="container-fluid row">

        <header class="header col-3">
            <div class="container">
                <div class="logo">
                    <br>
                    <h3>Usuario</h3>
                    <br>
                </div>
                <br>
                <nav class="menu">
                    <h4>Registros</h4>
                    <hr class="espacio">
                    <a href="index.php">Registrar - Equipo</a>
                    <a href="index.php">Registrar - Personal</a>
                    <br>
                    <h4>Tablas</h4>
                    <hr>
                    <a href="tabla.php">Tabla - Equipos</a>
                    <a href="tabla.php">Tabla - Personal</a>
                    <br>
                    <h4>Analisis</h4>
                    <hr>
                    <a href="#">Graficos</a>
                    <br>
                    <h4>Sesiones</h4>
                    <hr>
                    <a href="#">Nuevo Usuario</a>
                    <a href="#">Usuarios</a>
                </nav>
            </div>
        </header>

        <div class="col-6 mt-5">

            <?php
            include "modelo/conexion.php";
            include  "controlador/eliminar_registro.php";
            ?>

            <form class="d-flex">
                <input class="form-control mb-4 light-table-filter" data-table="table_id" type="text" placeholder="Buscar">
                <hr>
            </form>

            <a class="btn btn-primary mb-3" href="controlador/excel.php">Excel
                <i class="fa fa-table" aria-hidden="true"></i>
            </a>

            <table class="table table_id">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">N° Serie</th>
                        <th scope="col">Clave de Inventario</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Tipo</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = $conexion->query("select * from equipos");
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= $datos->id ?></td>
                            <td><?= $datos->marca ?></td>
                            <td><?= $datos->modelo ?></td>
                            <td><?= $datos->numSerie ?></td>
                            <td><?= $datos->claveInventario ?></td>
                            <td><?= $datos->estado ?></td>
                            <td><?= $datos->tipo ?></td>
                            <td>
                                <a href="#" class="btn btn-small btn-dark"><i class="fa-solid fa-eye"></i></a>

                                <a href="modificar_registro.php?id=<?= $datos->id; ?>" class="btn btn-small btn-dark"><i class="fa-solid fa-pen-to-square"></i></a>

                                <a onclick="return eliminar()" href="tabla.php?id=<?= $datos->id ?>" class="btn btn-small btn-dark"><i class="fa-solid fa-trash-can"></i></a>

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

    <script src="controlador/confirmacion.js"></script>

    <script src="controlador/buscador.js"></script>

</body>

</html>