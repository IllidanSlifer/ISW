<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM salario_empleado where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body background="https://thumbs.dreamstime.com/z/hombres-de-negocios-internacionales-de-mundo-del-globo-de-la-correspondencia-14146693.jpg">
    <div class="container">
     <table>
      <td></td>
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Leer Empleado</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Cedula</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['ced'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Nombre</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['nombre'];?>
                            </label>
                        </div>
                      </div>
                      </div>
                       <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Departamento</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['departamento'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Fecha Inicio</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['fecha_inicio'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Fecha Inicio</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['fecha_inicio'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Devengado</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['devengado'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Deducciones</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['deducciones'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Neto</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['neto'];?>
                            </label>
                        </div>
                      </div>

                        <div class="form-actions">
                          <a class="btn" href="index.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
           </table>      
    </div> <!-- /container -->
  </body>
</html>
