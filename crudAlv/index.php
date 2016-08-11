<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body background="https://thumbs.dreamstime.com/z/hombres-de-negocios-internacionales-de-mundo-del-globo-de-la-correspondencia-14146693.jpg">
    <div class="container">
            <div class="row">
                <h3>Empleado</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Crear</a>
                </p>
                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Cedula</th>
                          <th>Nombre</th>
                          <th>Departamento</th>
                          <!--<th>Activo</th>-->
                          <th>Fecha Inicio</th>
                          <th>Fecha Final</th>
                          <th>Devengado</th>
                          <th>Deducciones</th>
                          <th>Neto</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                       include 'database.php';
                       $pdo = Database::connect();
                       $sql = 'SELECT * FROM salario_empleado ORDER BY id DESC';
                       foreach ($pdo->query($sql) as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['id'] . '</td>';
                                echo '<td>'. $row['ced'] . '</td>';
                                echo '<td>'. $row['nombre'] . '</td>';
                                echo '<td>'. $row['departamento'] . '</td>';
                               // echo '<td>'. $row['activo'] . '</td>';
                                echo '<td>'. $row['fecha_inicio'] . '</td>';
                                echo '<td>'. $row['fecha_final'] . '</td>';
                                echo '<td>'. $row['devengado'] . '</td>';
                                echo '<td>'. $row['deducciones'] . '</td>';
                                echo '<td>'. $row['neto'] . '</td>';
                                echo '<td width=250>';
                                echo '<a class="btn" href="read.php?id='.$row['id'].'">Leer</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Modificar</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Borrar</a>';
                                echo '</td>';

                                echo '</tr>';
                                
                       }
                       Database::disconnect();
                      ?>
                      </tbody>
                </table>

        </div>
    </div> <!-- /container -->
  </body>
</html>
