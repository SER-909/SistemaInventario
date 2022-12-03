<?php

require_once "../modelo/conexion.php";
$sql = $conexion->query("select * from equipos");

$SQL = "SELECT * FROM equipos";
$consulta = mysqli_query($conexion, $SQL);


$con1 = 0;
$con2 = 0;
$con3 = 0;
$con4 = 0;
$con5 = 0;
$con6 = 0;
$con7 = 0;
$con8 = 0;
$con9 = 0;

$cont1 = 0;
$cont2 = 0;
$cont3 = 0;
$cont4 = 0;

$conR1 = 0;
$conR2 = 0;
$conR3 = 0;
$conR4 = 0;
$conR5 = 0;
$conR6 = 0;

while ($resultado = mysqli_fetch_assoc($consulta)) {

  if ($resultado['id_sistema_operativo'] == 1) {
    $con1++;
  } else if ($resultado['id_sistema_operativo'] == 2) {
    $con2++;
  } else if ($resultado['id_sistema_operativo'] == 3) {
    $con3++;
  } else if ($resultado['id_sistema_operativo'] == 4) {
    $con4++;
  } else if ($resultado['id_sistema_operativo'] == 5) {
    $con5++;
  } else if ($resultado['id_sistema_operativo'] == 6) {
    $con6++;
  } else if ($resultado['id_sistema_operativo'] == 7) {
    $con7++;
  }
  if ($resultado['id_sistema_operativo'] == 8) {
    $con8++;
  }
  if ($resultado['id_sistema_operativo'] == 9) {
    $con9++;
  }

  if (strcmp($resultado['tipo'], "AIO") == 0) {
    $cont1++;
  } else if (strcmp($resultado['tipo'], "MiniPC") == 0) {
    $cont2++;
  } else if (strcmp($resultado['tipo'], "Laptop") == 0) {
    $cont3++;
  } else if (strcmp($resultado['tipo'], "Desktop") == 0) {
    $cont4++;
  }

  if (strcmp($resultado['cantidadRam'], "1 GB") == 0) {
    $conR1++;
  } else if (strcmp($resultado['cantidadRam'], "2 GB") == 0) {
    $conR2++;
  } else if (strcmp($resultado['cantidadRam'], "4 GB") == 0) {
    $conR3++;
  } else if (strcmp($resultado['cantidadRam'], "8 GB") == 0) {
    $conR4++;
  } else if (strcmp($resultado['cantidadRam'], "16 GB") == 0) {
    $conR5++;
  } else if (strcmp($resultado['cantidadRam'], "32 GB") == 0) {
    $conR6++;
  }
}

//sesion

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

        <header class="header col-3">
            <div class="container">
                <div class="col text-center"><br>
                    <h3 class="text-center"><?php echo $_SESSION['nombre']; ?></h3><br>
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

        <div class="col-8 mt-5">

      <!-- Grafica 1 -->
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
              echo "['Windows 7 Standard'," . $con3 . "],";
              echo "['Windows 8.0'," . $con4 . "],";
              echo "['Windows 8.1'," . $con5 . "],";
              echo "['Windows 10 Home'," . $con6 . "],";
              echo "['Windows 10 Pro'," . $con7 . "],";
              echo "['Windows 11 Home'," . $con8 . "],";
              echo "['Windows 11 Pro'," . $con9 . "],";
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
      <div id="piechart" style="width: 150%; height: 70vh;"></div>

      <!-- Grafica 2 -->
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
              echo "['MiniPC '," . $cont2 . "],";
              echo "['Laptop'," . $cont3 . "],";
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
      <div id="piechart2" style="width: 150%; height: 70vh;"></div>

      <!-- Grafica 3 -->
      <!-- <div>
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
              echo "['1 GB'," . $conR1 . "],";
              echo "['2 GB'," . $conR2 . "],";
              echo "['4 GB'," . $conR3 . "],";
              echo "['8 GB'," . $conR4 . "],";
              echo "['16 GB'," . $conR5 . "],";
              echo "['32 GB'," . $conR6 . "],";

              ?>
            ]);

            var options = {
              title: 'Memoria Ram Instalada'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

            chart.draw(data, options);
          }
        </script>
      </div>
      <div id="piechart3" style="width: 150%; height: 70vh;"></div> -->

      <div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load('current', {
            'packages': ['bar']
          });
          google.charts.setOnLoadCallback(drawStuff);

          function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
              ['RAM', 'Cantidad de RAM'],
              <?php
              echo "['1 GB'," . $conR1 . "],";
              echo "['2 GB'," . $conR2 . "],";
              echo "['4 GB'," . $conR3 . "],";
              echo "['8 GB'," . $conR4 . "],";
              echo "['16 GB'," . $conR5 . "],";
              echo "['32 GB'," . $conR6 . "],";
              ?>
            ]);

            var options = {
              width: 800,
              legend: {
                position: 'center'
              },
              chart: {
                title: 'Cantidad de Memoria Ram',
                subtitle: 'Cantidad Instalada'
              },
              axes: {
                x: {
                  0: {
                    side: 'bottom',
                    label: 'RAM'
                  } // Top x-axis.
                }
              },
              bar: {
                groupWidth: "100%"
              }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            // Convert the Classic options to Material options.
            chart.draw(data, google.charts.Bar.convertOptions(options));
          };
        </script>
      </div>
      <div id="top_x_div" style="width: 150%; height: 60vh; margin-left: 30%;"></div>




    </div>
    </div>

    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>



</body>

</html>