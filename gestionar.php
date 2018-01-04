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
    <title>Gestionar informacion</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
    <link rel="stylesheet"
          href="//d2d3qesrx8xj6s.cloudfront.net/dist/bootsnipp.min.css?ver=7d23ff901039aef6293954d33d23c066">
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
    <main style="margin: 2%;padding-top: 20px;padding-bottom: 20%;">
    <div class="container">
        <div class="row" style="padding-top: 20px">
            <!-- Tarjeta 1 -->
            <div class="col-md-4">
                <div class="card" style="top: 50%; left: 5%;">
                    <div class="card-block">
                        <h4 class="title" style="font-weight: 400;">
                            Gestion Estudiantes
                        </h4>
                        <p class="card-text" style="font-weight: 300;">A continuación encontrará las paginas que le ayudarán a gestionar estudiantes.</p>
                        <a class="btn btn-primary" href="agregarEstudiante.php">Agregar Estudiante</a>
                        <br><br>
                        <a class="btn btn-primary" href="eliminarEstudiante.php">Eliminar Estudiante</a>
                        <br><br>
                        <a class="btn btn-primary" href="modificarEstudiante.php">Modificar Estudiante</a>
                        <br><br>
                        <a class="btn btn-primary" href="consultarEstudiante.php">Consultar Estudiantes</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="top: 50%; left: 5%;">

                    <div class="card-block">
                        <h4 class="title" style="font-weight: 400;">
                            Gestion Docentes
                        </h4>
                        <p class="card-text" style="font-weight: 300;">A continuación encontrará las paginas que le ayudarán a gestionar docentes.</p>
                        <a class="btn btn-primary" href="agregarDocente.php">Agregar Docente</a>
                        <br><br>
                        <a class="btn btn-primary" href="eliminarDocente.php">Eliminar Docente</a>
                        <br><br>
                        <a class="btn btn-primary" href="modificarDocente.php">Modificar Docente</a>
                        <br><br>
                        <a class="btn btn-primary" href="consultarDocente.php">Consultar Docentes</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="top: 50%; left: 5%;">
                    <div class="card-block">
                        <h4 class="title" style="font-weight: 400;">
                            Gestion Cursos
                        </h4>
                        <p class="card-text" style="font-weight: 300;">A continuación encontrará las paginas que le ayudarán a gestionar las asiganturas.</p>
                        <a class="btn btn-primary" href="agregarCurso.php">Agregar Cursos</a>
                        <br><br>
                        <a class="btn btn-primary" href="eliminarCurso.php">Eliminar Cursos</a>
                        <br><br>
                        <a class="btn btn-primary" href="modificarCurso.php">Modificar Cursos</a>
                        <br><br>
                        <a class="btn btn-primary" href="consultarCurso.php">Consultar Cursos</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="padding-top: 20px;top: 0;position: absolute;width: 100%;/* left: 2.3%; *//* height: 100%; */">
            <!-- Tarjeta 1 -->
            <div class="col-md-4" style="left: 1.6%;">
                <div class="card">
                    <div class="card-block">
                        <h4 class="title" style="font-weight: 400;">
                            Opciones
                        </h4>
                        <a class="btn btn-primary" href="index.php">Volver a la pagina principal</a>

                        <a class="btn btn-primary" href="logout.php">Cerrar Sesion</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div align="center"><span style="font-family: 'Source Sans Pro', sans-serif; color: white; font-weight: 500; font-size: large;">Diseñado y desarrollado por Jorge Aldana. All Rights Reserved 2017</span></div>
    </footer>
</body>
</html>