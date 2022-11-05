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
</head>

<body>


    <div class="container-fluid row">
    
        <header class="header col-3">

            <div class="container">
                <br>
                <div class="logo">
                    <h3>Usuario</h3><br>
                </div>
                <br>
                <nav class="menu">
                    <h4>Registros</h4>
                    <hr class="espacio">
                    <a href="index.php">Registrar - Equipo</a>
                    <a href="index.php">Registrar - Personal</a>
                    <br><h4>Tablas</h4>
                    <hr>
                    <a href="tabla.php">Tabla - Equipos</a>
                    <a href="tabla.php">Tabla - Personal</a>
                    <br><h4>Analisis</h4>
                    <hr>
                    <a href="#">Graficos</a>
                    <br><h4>Sesiones</h4>
                    <hr>
                    <a href="#">Nuevo Usuario</a>
                    <a href="#">Usuarios</a>
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
                <div class="mb-3 col-3">
                    <label class="form-label">Marca</label>
                    <input type="tetx" class="form-control" name="marca">
                </div>
                <div class="mb-3 col-3">
                    <label class="form-label">Modelo</label>
                    <input type="text" class="form-control" name="modelo">
                </div>
                <div class="mb-3 col-3">
                    <label class="form-label">Numero de Serie </label>
                    <input type="text" class="form-control" name="numSerie">
                </div>
                <div class="mb-3 col-3">
                    <label class="form-label">Clave de Inventario </label>
                    <input type="text" class="form-control" name="claveInventario">
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
                    <select class="form-select" name="so">
                        <option value="Windows 7 professional">Windows 7 professional</option>
                        <option value="Windows 7 basic">Windows 7 basic</option>
                        <option value="Windows 8.0">Windows 8.0</option>
                        <option value="Windows 8.1">Windows 8.1</option>
                        <option value="Windows 10 pro">Windows 10 pro</option>
                        <option value="Windows 10 estandar">Windows 10 estandar</option>
                        <option value="Windows 11 pro">Windows 11 pro</option>
                        <option value="Windows 11 estandar">Windows 11 estandar</option>
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
                    <label class="form-label">Asignación</label>
                    <select class="form-select" name="asignacion">
                        <option value="desconocido">Desconocido</option>
                    </select>
                </div>

                <div class="mb-3 col-12">
                    <label class="form-label">Obervaciones</label>
                    <textarea class="form-control" rows="3" name="observaciones"></textarea>
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

    <script src="controlador/inputs.js"></script>

</body>

</html>