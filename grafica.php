<?php

require_once "modelo/conexion.php";
$sql = $conexion->query("select * from equipos");

$SQL = "SELECT * FROM equipos";
$consulta = mysqli_query($conexion, $SQL);


$con1 = 0;
$con2 = 0;
$con3 = 0;
$con4 = 0;
$con5 = 0;
$con6 = 0;

$cont1 = 0;
$cont2 = 0;
$cont3 = 0;
$cont4 = 0;

while ($resultado = mysqli_fetch_assoc($consulta)) {

  if ($resultado['id_sistema_operativo'] == 1) {
    $con1++;
  } else if ($resultado['id_sistema_operativo'] == 2) {
    $con2++;
  } else if ($resultado['id_sistema_operativo'] == 3) {
    $con3++;
  }

  if (strcmp($resultado['tipo'], "AIO") == 0) {
    $cont1++;
  } else if (strcmp($resultado['tipo'], "MiniPC") == 0) {
    $cont3++;
  } else if (strcmp($resultado['tipo'], "Laptop") == 0) {
    $cont2++;
  } else if (strcmp($resultado['tipo'], "Desktop") == 0) {
    $cont2++;
  }
}

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

    <div class="col-6 mt-5">




      <div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load('current', {
            'packages': ['corechart']
          });
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {

            var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              <?php

              echo "['Windows 7 Professional'," . $con1 . "],";
              echo "['Windows 7 Basic'," . $con2 . "],";
              echo "['Windows 8.1'," . $con3 . "],";
              echo "['Windows 10 Pro'," . $con4 . "],";
              echo "['Windows 10 Estandar'," . $con5 . "],";
              ?>

            ]);

            var options = {
              title: 'Sistemas Opetarivos'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
          }
        </script>
      </div>
      <div id="piechart" style="width: 900px; height: 500px;"></div>

      <div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load('current', {
            'packages': ['corechart']
          });
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {

            var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              <?php

              echo "['AIO'," . $cont1 . "],";
              echo "['Laptop'," . $cont2 . "],";
              echo "['MiniPC'," . $cont3 . "],";
              echo "['Desktop'," . $cont4 . "],";

              ?>

            ]);

            var options = {
              title: 'Tipo de Equipo'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

            chart.draw(data, options);
          }
        </script>
      </div>
      <div id="piechart2" style="width: 900px; height: 500px;"></div>





    </div>
  </div>

  <!-- Boostrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>



</body>

</html>