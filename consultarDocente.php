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

    <title>Listado de Docentes</title>
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
    <form role="form" method="post" action="consultarDocente.php" style="width: 24%; background-color: white; position: absolute;top:  12%;left: 5%;">
        <div style="width: 70%" class="input-group">
            <input  placeholder="Ingrese nombre de Docente a buscar..." style=" width: 96%;" class="form-control" id="buscar" name="nombre" required type="text">
            <span class="input-group-btn">
                    <input style=" background-color: #4caf50;margin-top: auto;position: absolute;top: 0;height: 100%;left: 50px;" type="submit" value="Buscar..." class="btn btn-primary">
                </span>
        </div>
    </form>
    <a class="btn btn-primary" href="gestionar.php" style="background-color: #4caf50;position: absolute;left: 30%;top: 11.5%;">Regresar</a>
    <div style="position: absolute;top: 20%;left: 5%;width: 85%;word-wrap: break-word;">
        <span style="font-family: 'Source Sans Pro', sans-serif;position: absolute;font-size: 155%;font-weight: bold;word-wrap: break-word;color: white;">Listado de Docentes en el sistema.</span>
        <br><br><?php
        if(isset($_POST['nombre'])){
            $_SESSION['SIACSoft']->listarDoc($_POST['nombre']);
        }else{
            $_SESSION['SIACSoft']->listarDoc('');
        }
        ?>
    </div>
</div>
</body>
</html>