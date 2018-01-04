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

    <title>Modificar Docente</title>
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
<form style="position: absolute; top: 10%; width: 97%" class="form-horizontal" action="modificarDocente2.php" method="post">
<fieldset>

<!-- Form Name -->
<legend>Modificar Docente</legend>

<!-- Text input-->

    <div class="form-group">
        <label class="col-md-4 control-label" for="txtID">ID Docente Antiguo</label>
        <div class="col-md-4">
            <input id="txtID" name="txtIDV" type="text" placeholder="Antigua Identificación" class="form-control input-md" required>

        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="txtID">ID Docente Nueva</label>
        <div class="col-md-4">
            <input id="txtID" name="txtIDN" type="text" placeholder="Nueva Identificación" class="form-control input-md" required>

        </div>
    </div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtNombre">Nombres</label>  
  <div class="col-md-4">
  <input id="txtNombre" name="txtNombre" type="text" placeholder="Nuevo Nombre" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtApellido">Apellidos</label>  
  <div class="col-md-4">
  <input id="txtApellido" name="txtApellido" type="text" placeholder="Nuevo Apellido" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="rdioSexo">Genero</label>
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

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="btnAceptar"></label>
  <div class="col-md-8">
    <button id="btnAceptar" name="btnAceptar" class="btn btn-primary">Aceptar</button>
    <button id="btnCancelar" name="btnCancelar" class="btn btn-danger">Cancelar</button>
  </div>
</div>

</fieldset>
</form>
<?php
if (isset($_POST['txtIDV']) && isset($_POST['txtIDN'])){
    if (isset($_POST['txtNombre']) && isset($_POST['txtApellido'])){
        if (isset($_POST['rdioSexo'])){
            $_SESSION['SIACSoft']->modDoc($_POST['txtIDV'],$_POST['txtIDN'],$_POST['txtNombre'], $_POST['txtApellido'], $_POST['rdioSexo']);
        }
    }
}
?>
</body>
</html>