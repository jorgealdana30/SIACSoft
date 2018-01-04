<?php
include "SIACSoft.php";
session_start();
header("Content-Type: text/html;charset=utf-8");
if (!isset($_SESSION["SIACSoft"])) {
    $_SESSION["SIACSoft"] = new SIACSoft();
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->

    <title>Agregar estudiante</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="//d2d3qesrx8xj6s.cloudfront.net/dist/bootsnipp.min.css?ver=7d23ff901039aef6293954d33d23c066">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="login">
    <div style="padding-top: 7px; width: 10%" align="left">
        <a href="index.php"><span style="font-family: 'Source Sans Pro', sans-serif; color: white; font-weight: 500; font-size: large;">SIACSoft</span></a>
    </div>
    <div align="center" style="width: 50%;left: 15%;position: relative; top: -87%;">
        <form role="form" method="post" action="buscar.php">
            <div style="width: 70%" class="input-group">
                <input  placeholder="Ingrese nombre de asignatura a buscar..." style="width: 96%;" class="form-control" id="buscar" name="buscar" required type="text">
                <span class="input-group-btn">
                    <input style="background-color: #0099FF;margin-top: 2px;" type="submit" value="Buscar..." class="btn btn-primary">
                </span>
            </div>
        </form>
    </div>


</div>

<div class="container" id="wrapper">
<form class="form-horizontal" style="position: absolute; top: 10%; width: 97%" method="post" action="agregarEstudiante.php">
<fieldset>

<!-- Form Name -->
<legend>Añadir nuevo Estudiante</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtID">Identificación</label>  
  <div class="col-md-4">
  <input id="txtID" name="txtID" type="text" placeholder="ID" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtNombre">Nombres</label>  
  <div class="col-md-4">
  <input id="txtNombre" name="txtNombre" type="text" placeholder="Nombres" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtApellido">Apellidos</label>  
  <div class="col-md-4">
  <input id="txtApellido" name="txtApellido" type="text" placeholder="Apellidos" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="rdioSexo">Género</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="rdioSexo-0">
      <input type="radio" name="rdioSexo" id="rdioSexo-0" value="femenino">
      Femenino
    </label>
  </div>
  <div class="radio">
    <label for="rdioSexo-1">
      <input type="radio" name="rdioSexo" id="rdioSexo-1" value="masculino">
      Maculino
    </label>
  </div>
  </div>
</div>
  <div class="form-group">
    <label class="col-md-4 control-label" for="txtCursos">Cursos</label>
    <div class="col-md-4">
      <select required class="select" name="txtCursos" title="Paises">
        <option value="">Cursos...</option>
        <?php
            $link = new ConexionMySQL();
            $sql = "SELECT Codigo, Nombre FROM curso";
            $res = $link->getSql()->query($sql);
        while ($curso = $res->fetch_assoc()) {
        echo '<OPTION VALUE="' . $curso['Codigo'] . '">' . $curso['Nombre'] . '</OPTION>';
        }
        ?>
      </select>
    </div>
  </div>

<div class="form-group">
  <label class="col-md-4 control-label" for="btnRegistrar"></label>
  <div class="col-md-4">
    <button id="btnRegistrar" name="btnRegistrar" class="btn btn-primary">Registrar</button>
  </div>
</div> 

</fieldset>
</form>

<?php
    if (isset($_POST['txtID']) && isset($_POST['txtNombre'])){
        if (isset($_POST['txtApellido']) && isset($_POST['rdioSexo'])){
            if(isset($_POST['txtCursos'])){
                $_SESSION['SIACSoft']->agregarEst($_POST['txtID'], $_POST['txtNombre'], $_POST['txtApellido'], $_POST['rdioSexo'], $_POST['txtCursos']);
            }
        }
    }
?>

</body>
</html>