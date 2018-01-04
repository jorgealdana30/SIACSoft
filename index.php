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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <title>Pagina Principal</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
    <link rel="stylesheet"
          href="//d2d3qesrx8xj6s.cloudfront.net/dist/bootsnipp.min.css?ver=7d23ff901039aef6293954d33d23c066">
    <link rel="stylesheet" href="css/style.css"
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

        <div style="max-width:400px; background: url(img/back.png), no-repeat;opacity: 0.8;left: 0%;position: absolute;padding-left: 100%;padding-top: 20%;/* padding-bottom: 0%; *//* margin-top: 0%; */"></div>
        <span style="font-family: 'Source Sans Pro', sans-serif;position: absolute;font-size: 255%;font-weight: bold;word-wrap: break-word;color: white;left: 5.6%; top: 15%;"">Bienvenido a nuestro sistema de gestion academica.</span>
    <?php $_SESSION['SIACSoft']->iniciarLogIN() ?>
    <article style="font-family: 'Source Sans Pro', sans-serif;position: absolute;font-size: large;/* font-weight: bold; */word-wrap: break-word;color: white;left: 5.7%;top: 41%;/* margin: 0 auto; */padding-right: 20%;line-height: 2;">SIACSoft es un sistema en línea que tiene la facilidad de desarrollar un sistema de información para gestionar los datos de sus estudiantes, el cuerpo de docentes y los cursos que se ofrecen a través de la plataforma.
                <br><br>Las entidades definidas para este software son:
                <ul>
                    <li><span style="font-weight: bold">Estudiante:</span> Es la entidad que representa a los estudiante de la institución educativa. Cada estudiante está asiganado a varias cursos o puede ser hasta uno solo.</li>
                    <li><span style="font-weight: bold">Docente:</span> Es la entidad que representa a los docente en la institución educativa. Cada docente está asiganado a una o varias asignaturas.</li>
                    <li><span style="font-weight: bold">Curso:</span> Es la entidad que representa los cursos ofrecidos por la institución educativa, en los cuales se asignan tanto estudiantes como docentes.</li>
                </ul>
    </article>
</div>
<footer>
    <div align="center"><span style="font-family: 'Source Sans Pro', sans-serif; color: white; font-weight: 500; font-size: large;">Diseñado y desarrollado por Jorge Aldana. All Rights Reserved 2017</span></div>
</footer>
</body>
</html>