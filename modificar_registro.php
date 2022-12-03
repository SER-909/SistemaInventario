<?php
include("modelo/conexion.php");

$id = $_GET["id"];
$sql = $conexion->query("select * from equipos where id=$id");


//sesion
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
            <h1 class="text-center m-5">Modificar Equipo de Cómputo</h1>

            <form class="row" method="POST">
                <input type="hidden" name="id" value="<?= $_GET["id"]; ?>">

                <?php include "controlador/modificar_registro.php"; ?>
                <?php while ($datos = $sql->fetch_object()) { ?>



                    <div class="m-auto col-3">
                        <label class="form-label">Marca</label>
                        <?php
                        $sqlMarca = $conexion->query("select marca.nombre  from equipos INNER JOIN modelo ON equipos.id_modelo = modelo.id INNER JOIN marca on modelo.id_marca = marca.id INNER JOIN sistema_operativo ON equipos.id_sistema_operativo = sistema_operativo.id where equipos.id_modelo = $datos->id_modelo ");

                        while ($datosMarca = $sqlMarca->fetch_object()) { ?>
                            <input type="text" class="form-control monitor" value="<?= $datosMarca->nombre; ?>" readonly>
                            <?php break; ?>
                        <?php  } ?>
                    </div>

                    <div class="m-auto col-3">
                        <label class="form-label">Modelo</label>
                        <?php
                        $sqlModelo = $conexion->query("select * from modelo where id= $datos->id_modelo");
                        while ($datosModelo = $sqlModelo->fetch_object()) {
                            if ($datos->id_modelo == $datosModelo->id) { ?>
                                <input type="text" class="form-control monitor" value="<?= $datosModelo->num; ?>" readonly>

                        <?php }
                        } ?>
                    </div>
                 
                    <div class="m-auto col-3">
                        <label class="form-label">Numero de Serie </label>
                        <input type="text" class="form-control" name="numSerie" value="<?= $datos->numSerie; ?>">
                    </div>


                    <div class="m-auto col-3">
                        <label class="form-label">Estado</label>
                        <select class="form-select" name="estado" value="<?= $datos->estado; ?>">
                            <?php
                            if (strcmp($datos->estado, "Bueno") == 0 || strcmp($datos->estado, "BUENO") == 0) {
                                echo '<option value="Bueno" selected>Bueno</option>';
                                echo '<option value="Regular">Regular</option>';
                                echo '<option value="Malo">Malo</option>';
                            } else if (strcmp($datos->estado, "Regular") == 0 || strcmp($datos->estado, "REGULAR") == 0) {
                                echo '<option value="Bueno">Bueno</option>';
                                echo '<option value="Regular" selected>Regular</option>';
                                echo '<option value="Malo">Malo</option>';
                            } else if (strcmp($datos->estado, "Malo") == 0 || strcmp($datos->estado, "MALO") == 0) {
                                echo '<option value="Bueno">Bueno</option>';
                                echo '<option value="Regular">Regular</option>';
                                echo '<option value="Malo" selected>Malo</option>';
                            }
                            ?>
                        </select>

                    </div>

                    <div class="m-auto col-3">
                        <label class="form-label">Tipo</label>
                        <select class="form-select" name="tipo" id="idTipo" onchange="seleccionarTipo(); value=" <?= $datos->tipo; ?>">
                            <option value="AIO">AIO</option>
                            <option value="Laptop">Laptop</option>
                            <option value="MiniPC">MiniPC</option>
                            <option value="Desktop">Desktop</option>
                        </select>
                    </div>

                    <div class="m-auto col-3">
                        <label class="form-label">Marca - Monitor</label>
                        <input type="text" class="monitor form-control" name="marcaMon" id="monitorM" value="<?= $datos->marcaMon; ?>">
                    </div>
                    <div class="m-auto col-3">
                        <label class="form-label">Modelo - Monitor</label>
                        <input type="text" class="form-control monitor" name="modeloMon" value="<?= $datos->modeloMon; ?>">
                    </div>
                    <div class="m-auto col-3">
                        <label class="form-label">Numero de Serie - Monitor </label>
                        <input type="text" class="form-control monitor" name="numSerialMon" value="<?= $datos->modeloMon; ?>">
                    </div>

                    <div class="m-auto col-3">
                        <label class="form-label">Sistema Operativo</label>
                        <select class="form-select" name="id_sistema_operativo">
                            <?php
                            $sqlSO = $conexion->query("select * from sistema_operativo");
                            while ($datosSO = $sqlSO->fetch_object()) {
                                if ($datos->id_sistema_operativo == $datosSO->id) { ?>
                                    <option value="<?php echo $datosSO->id; ?>" selected>
                                        <?php echo $datosSO->so; ?>
                                    </option>
                                <?php } else { ?>
                                    <option value="<?php echo $datosSO->id; ?>">
                                        <?php echo $datosSO->so; ?>
                                    </option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="m-auto col-3">
                        <label class="form-label">Clave del sistema Operativo</label>
                        <input type="text" class="form-control" name="claveSO" value="<?= $datos->claveSO; ?>">
                    </div>

                    <div class="m-auto col-3">
                        <label class="form-label">Marca - Teclado</label>
                        <input type="text" class="form-control" name="marcaT" value="<?= $datos->marcaT; ?>">
                    </div>
                    <div class="m-auto col-3">
                        <label class="form-label">Modelo - Teclado</label>
                        <input type="text" class="form-control" name="modeloT" value="<?= $datos->modeloT; ?>">
                    </div>
                    <div class="m-auto col-3">
                        <label class="form-label">Numero Serial - Teclado</label>
                        <input type="text" class="form-control" name="numSerialT" value="<?= $datos->numSerie; ?>">
                    </div>


                    <div class="m-auto col-3">
                        <label class="form-label">Marca - Mouse</label>
                        <input type="text" class="form-control" name="marcaMouse" value="<?= $datos->marcaMouse; ?>">
                    </div>
                    <div class="m-auto col-3">
                        <label class="form-label">Modelo - Mouse</label>
                        <input type="text" class="form-control" name="modeloMouse" value="<?= $datos->modeloMouse; ?>">
                    </div>
                    <div class="mb-3 col-3">
                        <label class="form-label">Numero Serial - Mouse</label>
                        <input type="text" class="form-control" name="numSerialMouse" value="<?= $datos->numSerialMouse; ?>">
                    </div>
                    <div class="mb-3 col-12">
                        <label class="form-label">Obervaciones</label>
                        <textarea class="form-control" rows="3" name="observaciones"><?= $datos->observaciones; ?></textarea>
                    </div>


                    <?php
                    $empleadoID = 0;
                    $empleadoNombre = "";
                    $sqlEmpleado = $conexion->query("select * from empleado where id=$id");
                    while ($datosEmpleado = $sqlEmpleado->fetch_assoc()) {
                        $empleadoID = $datosEmpleado['id'];
                        $empleadoNombre = $datosEmpleado['nombre'];
                    }

                    $departamentoID = 0;
                    $departamentoNombre = "";
                    $sqlDepartamento = $conexion->query("select * from departamento where id=$empleadoID");
                    while ($datosDepartamento = $sqlDepartamento->fetch_assoc()) {
                        $departamentoID = $datosDepartamento['id'];
                        $departemamentoNombre = $datosDepartamento['nombreDep'];
                    }

                    $empresaID = 0;
                    $empresaNombre = "";
                    $sqlEmpresa = $conexion->query("select * from empresa where id=$departamentoID");
                    while ($datosEmpresa = $sqlEmpresa->fetch_assoc()) {
                        $empresaID = $datosEmpresa['id'];
                        $empresaNombre = $datosEmpresa['nombreEmpresa'];
                    }
                    ?>

                    <input type="hidden" name="idEmpleado" id="idEmpleado" value="<?= $empleadoID; ?>">
                    <input type="hidden" name="idDepartamento" id="idDepartamento" value="<?= $departamentoID; ?>">
                    <input type="hidden" name="idEmpresa" id="idEmpresa" value="<?= $empresaID; ?>">

                    <div class="mb-3 col-12">
                        <label class="form-label">Filial</label>
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
                    <div class="m-auto col-12">
                        <label class="form-label">Clave de Inventario </label>
                        <input type="text" class="form-control" name="claveInventario" value="<?= $datos->claveInventario; ?>">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary m-5 col-3" name="btnRegistrar" value="ok">Actualizar</button>

                        <button type="reset" class="btn btn-primary m-5 col-3">Reset</button>
                    </div>
                <?php } ?>
            </form>

        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="controlador/js/inputs.js"></script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="controlador/js/listar_departamento.js"></script>

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

</body>

</html>