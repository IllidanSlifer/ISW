<<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $idError = null;
        $cedError = null;
        $nombreError = null;
        $departamentoError = null;
        //$activoError = null;
        $fecha_inicioError = null;
        $fecha_inicioError = null;
        $devengadoError = null;
        $deduccionesError = null;
        $netoError = null;
        // keep track post values
        $id = $_POST['id'];
        $ced = $_POST['ced'];
        $nombre = $_POST['nombre'];
        $departamento = $_POST['departamento'];
        //$activo = $_POST['activo'];
        $fecha_inicio = $_POST['fecha_inicio']; 
        $fecha_final = $_POST['fecha_final'];
        $devengado = $_POST['devengado'];
        $deducciones = $_POST['deducciones'];
        $neto = $_POST['neto'];

        // validate input
        $valid = true;
        if (empty($id)) {
            $idError = 'ingrese su id';
            $valid = false;
        }
         
        if (empty($ced)) {
            $cedError = 'ingrese su cedula';
            $valid = false;
        }
         
        if (empty($nombre)) {
            $nombreError = 'ingrese su nombre';
            $valid = false;
        }
           if (empty($departamento)) {
            $departamentoError = 'ingrese su departamento';
            $valid = false;
        }
        
           
           if (empty($fecha_inicio)) {
            $fecha_inicioError = 'ingrese su fecha_inicio';
            $valid = false;
        }
        if (empty($fecha_final)) {
            $fecha_finalError = 'ingrese su fecha_final';
            $valid = false;
        }
        if (empty($devengado)) {
            $devengadoError = 'ingrese devengado';
            $valid = false;
        }
        if (empty($deducciones)) {
            $deduccionesError = 'ingrese deducciones';
            $valid = false;
        }

        if (empty($neto)) {
            $netoError = 'Su salario neto es';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO salario_empleado (id,ced,nombre,departamento,fecha_inicio,fecha_final,devengado,deducciones,neto) values(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($id,$ced,$nombre,$departamento,$fecha_inicio,$fecha_final,$devengado,$deducciones,$neto));
            Database::disconnect();
            header("Location: index.php");
        }
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
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Crear Empleado</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($idError)?'error':'';?>">
                        <label class="control-label">Id</label>
                        <div class="controls">
                            <input name="id" type="text"  placeholder="Id" value="<?php echo !empty($id)?$id:'';?>">
                            <?php if (!empty($idError)): ?>
                                <span class="help-inline"><?php echo $idError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($cedError)?'error':'';?>">
                        <label class="control-label">Cedula</label>
                        <div class="controls">
                            <input name="ced" type="text" placeholder="cedula" value="<?php echo !empty($ced)?$ced:'';?>">
                            <?php if (!empty($cedlError)): ?>
                                <span class="help-inline"><?php echo $cedError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
                        <label class="control-label">Nombre</label>
                        <div class="controls">
                            <input name="nombre" type="text"  placeholder="Nombre" value="<?php echo !empty($nombre)?$nombre:'';?>">
                            <?php if (!empty($nombreError)): ?>
                                <span class="help-inline"><?php echo $nombreError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                       <div class="control-group <?php echo !empty($departamentoError)?'error':'';?>">
                        <label class="control-label">Departamento</label>
                        <div class="controls">
                            <input name="departamento" type="text"  placeholder="departamento" value="<?php echo !empty($departamento)?$departamento:'';?>">
                            <?php if (!empty($departamentoError)): ?>
                                <span class="help-inline"><?php echo $departamentoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($fecha_inicioError)?'error':'';?>">
                        <label class="control-label">Fecha Inicio</label>
                        <div class="controls">
                            <input name="fecha_inicio" type="date"  placeholder="fecha inicio" value="<?php echo !empty($fecha_inicio)?$fecha_inicio:'';?>">
                            <?php if (!empty($fecha_inicioError)): ?>
                                <span class="help-inline"><?php echo $fecha_inicioError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($fecha_finalError)?'error':'';?>">
                        <label class="control-label">Fecha Final</label>
                        <div class="controls">
                            <input name="fecha_final" type="date"  placeholder="fecha final" value="<?php echo !empty($fecha_final)?$fecha_final:'';?>">
                            <?php if (!empty($fecha_finalError)): ?>
                                <span class="help-inline"><?php echo $fecha_finalError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($devengadoError)?'error':'';?>">
                        <label class="control-label">Devengado</label>
                        <div class="controls">
                            <input name="devengado" type="text"  placeholder="devengado" value="<?php echo !empty($devengado)?$devengado:'';?>">
                            <?php if (!empty($devengadoError)): ?>
                                <span class="help-inline"><?php echo $devengadoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($deduccionesError)?'error':'';?>">
                        <label class="control-label">Deducciones</label>
                        <div class="controls">
                            <input name="deducciones" type="text"  placeholder="deducciones" value="<?php echo !empty($deducciones)?$deducciones:'';?>">
                            <?php if (!empty($deduccionesError)): ?>
                                <span class="help-inline"><?php echo $deduccionesError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                       <div class="control-group <?php echo !empty($netoError)?'error':'';?>">
                        <label class="control-label">Neto</label>
                        <div class="controls">
                        <input name="neto" type="text"  placeholder="neto" value="<?php echo !empty($neto)?$neto:'';?>">

                            <?php if (!empty($netoError)): ?>
                                <span class="help-inline"><?php echo $netoError;?></span>
                            <?php endif;?>
                            
                        </div>
                      </div>
                      <script type="text/javascript">
                      function operaciones($devengado, $deducciones, $operacion) {

            $neto = 0;

            if($operacion == "Restar") {

            $neto = $devengado - $deducciones;

            }

            return $neto; // Devolver el resultado

            }
                      </script>
                    <!--<script type="text/javascript">
                        function showContent() {
                        element = document.getElementById("content");
                        check = document.getElementById("check");
                        if (check.checked) {
                        element.style.display='block';
                        }
                        else {
                        element.style.display='none';
                        }
                        }
                        </script>

                      </div>-->
        

                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Crear</button>
                          <a class="btn" href="index.php">Atras</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->


  </body>
</html>


