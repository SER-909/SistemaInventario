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
    <!-- <link rel="stylesheet" href="estilos_pass.css"> -->

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
            <h1 class="text-center m-5">Registro de Usuario</h1>
            <?php
            include "modelo/conexion.php";
            include "controlador/registro_usuario.php";

            ?>
            <form class="row" method="POST">

                <div class="border border-primary border-3 rounded mb-4">
                    <h4>Seleecionar Persona</h4>
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
                </div>
                <div class="mb-3 col-12">
                    <label class="form-label">Seleccionar tipo de usuario</label>
                    <select name="rol" class="form-select">
                        <option value="Administrador">Administrador</option>
                        <option value="Normal">Normal</option>
                    </select>
                </div>

                <div class="pass mb-3 col-12">
                    <label class="form-label">Password</label>
                    <input type="password" placeholder="Password" class="form-control" name="password" />
                    <!-- <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small class="alert alert-danger">Contraseña incorrecta</small> -->
                </div>
                <!-- <div class="pass">
                    <label class="form-label">Repetir password</label>
                    <input type="password" placeholder="Password dos" id="password2" class="form-control" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small class="alert alert-danger">Contraseña incorrecta</small>
                </div> -->

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