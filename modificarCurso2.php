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

    <title>Modificar Curso</title>
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
<form style="position: absolute; top: 10%; width: 97%" class="form-horizontal" action="modificarCurso2.php" method="post">
<fieldset>

<!-- Form Name -->
<legend>Modificar Curso</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtIDV">Código Antiguo</label>
  <div class="col-md-4">
  <input id="txtIDV" name="txtIDV" type="text" placeholder="Antiguo Código" class="form-control input-md" required>
    
  </div>
</div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="txtIDN">Código Nuevo</label>
        <div class="col-md-4">
            <input id="txtIDN" name="txtIDN" type="text" placeholder="Nuevo Código" class="form-control input-md" required>

        </div>
    </div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtNombre">Nombre</label>  
  <div class="col-md-4">
  <input id="txtNombre" name="txtNombre" type="text" placeholder="Nuevo Nombre" class="form-control input-md" required>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="areaObservacion">Observaciones</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="areaObservacion" name="areaObservacion">Nuevas Observaciones...</textarea>
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="btnAceptar"></label>
  <div class="col-md-8">
    <input type="submit" id="btnAceptar" name="btnAceptar" class="btn btn-primary" value="Aceptar">
    <input type="reset" id="btnCancelar" name="btnCancelar" class="btn btn-danger" value="Cancelar">
  </div>
</div>

</fieldset>
</form>
<?php
if (isset($_POST['txtIDV']) && isset($_POST['txtIDN'])){

    if (isset($_POST['txtNombre']) && isset($_POST['areaObservacion'])){
        echo $_POST['txtIDN'];
        $_SESSION['SIACSoft']->modCur($_POST['txtIDV'],$_POST['txtIDN'],$_POST['txtNombre'],$_POST['areaObservacion']);
    }
}
?>
</body>
</html>