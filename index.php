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
    <title>Sistema de Inventario</title>

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
                <div class="col text-center"><br>
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
                    <a href="registro_usuario.php">Nuevo Usuario</a>
                    <a href="tabla_usuarios.php">Usuarios</a>
                </nav>
            </div>
        </header>

        <div class="col-6 m-auto">
            <h1 class="text-center m-5">Registro de Equipo de Cómputo</h1>
            <?php
            include "modelo/conexion.php";
            include "controlador/registro_computo.php";
            ?>
            <form class="row" method="POST">

                <div class="mb-3 col-6">
                    <label class="form-label">Marca</label>
                    <select class="form-select combobox2" name="marca" id="selMarca" style="width: 100%;">
                    </select>
                </div>

                <div class="mb-3 col-6">
                    <label class="form-label">Modelo</label>
                    <select class="form-select combobox2" name="id_modelo" id="selModelo" style="width: 100%;">
                    </select>
                </div>

                <div class="mb-3 col-3">
                    <label class="form-label">Numero de Serie </label>
                    <input type="text" class="form-control" name="numSerie">
                </div>

                <div class="mb-3 col-3">
                    <label class="form-label">Estado</label>
                    <select class="form-select" name="estado">
                        <option value="Bueno">Bueno</option>
                        <option value="Regular">Regular</option>
                        <option value="Malo">Malo</option>
                    </select>
                </div>
                <div class="mb-3 col-3">
                    <label class="form-label">Cantidad de RAM</label>
                    <select class="form-select" name="cantidadRam">
                        <option value="">Seleccionar</option>
                        <option value="1 GB">1 GB</option>
                        <option value="2 GB">2 GB</option>
                        <option value="4 GB">4 GB</option>
                        <option value="8 GB">8 GB</option>
                        <option value="16 GB">16 GB</option>
                    </select>
                </div>
                <div class="mb-3 col-3">
                    <label class="form-label">Modulos de RAM Instalados</label>
                    <select class="form-select" name="modulosRam">
                        <option value="">Seleccionar</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="mb-3 col-3">
                    <label class="form-label">Slots de RAM del PC</label>
                    <select class="form-select" name="slotsRam">
                        <option value="">Seleccionar</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="mb-3 col-3">
                    <label class="form-label">Tipo de Disco</label>
                    <select class="form-select" name="tipoDisco">
                        <option value="">Seleccionar</option>
                        <option value="HDD">HDD</option>
                        <option value="SDD">SDD</option>
                        <option value="HDD y SDD">HDD y SDD</option>
                    </select>
                </div>
                <div class="mb-3 col-3">
                    <label class="form-label">Cantidad de Almacenamiento HDD</label>
                    <select class="form-select" name="cantidadAlmacenamiento" id="idHDD">
                        <option value="">Seleccionar</option>
                        <option value="N/A">N/A</option>
                        <option value="240 GB">240 GB</option>
                        <option value="500 GB">500 GB</option>
                        <option value="1 TB">1 TB</option>
                        <option value="2 TB">2 TB</option>
                    </select>
                </div>
                <div class="mb-3 col-3">
                    <label class="form-label">Cantidad de Almacenamiento SDD</label>
                    <select class="form-select" name="cantidadAlmacenamientoSDD">
                        <option value="">Seleccionar</option>
                        <option value="N/A">N/A</option>
                        <option value="120 GB">120 GB</option>
                        <option value="240 GB">240 GB</option>
                        <option value="500 GB">500 GB</option>
                    </select>
                </div>
                <div class="mb-3 col-3">
                    <label class="form-label">Tipo</label>
                    <select class="form-select" name="tipo" id="idTipo" onchange="seleccionarTipo();">
                        <option value="">Seleccionar</option>
                        <option value="AIO">AIO</option>
                        <option value="Laptop">Laptop</option>
                        <option value="MiniPC">MiniPC</option>
                        <option value="Desktop">Desktop</option>
                    </select>
                </div>

                <div class="mb-3 col-3">
                    <label class="form-label">Marca - Monitor</label>
                    <input type="text" class="monitor form-control" name="marcaMon" id="monitorM">
                </div>
                <div class="mb-3 col-3">
                    <label class="form-label">Modelo - Monitor</label>
                    <input type="text" class="form-control monitor" name="modeloMon">
                </div>
                <div class="mb-3 col-3">
                    <label class="form-label">Numero de Serie - Monitor </label>
                    <input type="text" class="form-control monitor" name="numSerialMon">
                </div>

                <div class="mb-3 col-3">
                    <label class="form-label">Sistema Operativo</label>
                    <select class="form-select" name="id_sistema_operativo">
                        <?php
                        $sql = $conexion->query("select * from sistema_operativo");
                        while ($datosSis = $sql->fetch_object()) {
                            $sisID = $datosSis->id;
                            $sisNom = $datosSis->so;
                        ?>
                            <option value="<?= $sisID; ?>"><?= $sisNom; ?></option>

                        <?php } ?>

                    </select>
                </div>

                <div class="mb-3 col-3">
                    <label class="form-label">Clave del sistema Operativo</label>
                    <input type="text" class="form-control" name="claveSO">
                </div>

                <div class="mb-3 col-3">
                    <label class="form-label">Marca - Teclado</label>
                    <input type="text" class="form-control" name="marcaT">
                </div>
                <div class="mb-3 col-3">
                    <label class="form-label">Modelo - Teclado</label>
                    <input type="text" class="form-control" name="modeloT">
                </div>
                <div class="mb-3 col-3">
                    <label class="form-label">Numero Serial - Teclado</label>
                    <input type="text" class="form-control" name="numSerialT">
                </div>


                <div class="mb-3 col-3">
                    <label class="form-label">Marca - Mouse</label>
                    <input type="text" class="form-control" name="marcaMouse">
                </div>
                <div class="mb-3 col-3">
                    <label class="form-label">Modelo - Mouse</label>
                    <input type="text" class="form-control" name="modeloMouse">
                </div>
                <div class="mb-3 col-3">
                    <label class="form-label">Numero Serial - Mouse</label>
                    <input type="text" class="form-control" name="numSerialMouse">
                </div>


                <div class="mb-3 col-12">
                    <label class="form-label">Obervaciones</label>
                    <textarea class="form-control" rows="3" name="observaciones"></textarea>
                </div>
                <div class="mb-3 col-12">
                    <label class="form-label">Establecimientos</label>
                    <select class="form-select combobox" name="empresa" id="selEmpresa" style="width: 100%;">
                    </select>
                </div>
                <div class="mb-3 col-12">
                    <label class="form-label">Departamento</label>
                    <select class="form-select combobox" name="departamento" id="selDepartamento" style="width: 100%;">
                    </select>
                </div>
                <div class="mb-3 col-12">
                    <label class="form-label">Asignación</label>
                    <select class="form-select combobox" name="asignacion" id="selAsignacion" style="width: 100%;">
                    </select>
                </div>

                <div class="mb-3 col-12">
                    <label class="form-label">Clave de Inventario </label>
                    <input type="text" class="form-control" name="claveInventario">
                </div>


                <div class="text-center">
                    <button type="submit" class="btn btn-primary m-5 col-3" name="btnRegistrar" value="ok">Enviar</button>

                    <button type="reset" class="btn btn-primary m-5 col-3">Limpiar</button>
                </div>

            </form>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="controlador/js/inputs.js"></script>

    <script src="controlador/js/listar_departamento.js"></script>
    <script src="controlador/js/listar_marca.js"></script>

    <script>
        $(document).ready(function() {
            $('.combobox').select2();
            listar_empresa();
        });

        $("#selEmpresa").change(function() {
            let idempresa = $("#selEmpresa").val();
            listar_departamento(idempresa);
        })

        $("#selDepartamento").change(function() {
            let idDepartamento = $("#selDepartamento").val();
            listar_empleado(idDepartamento);
        })
    </script>

    <script>
        $(document).ready(function() {
            $('.combobox2').select2();
            listar_marca();
        });

        $("#selMarca").change(function() {
            let idmarca = $("#selMarca").val();
            listar_modelo(idmarca);
        })
    </script>


</body>

</html>