<?php

include 'ConexionMySQL.php';

class SIACSoft
{
    public function loguear($user, $pass)
    {
        $link = new ConexionMySQL();
        $sql = "SELECT * FROM login WHERE user LIKE '" . $user . "%'";
        $x = $link->getSql()->query($sql);
        $x1 = $x->fetch_assoc();
        if (strcasecmp($x1['user'], $user) == 0 && $x1['Contrasena'] == $pass) {
            setcookie("NickUser",  $user, time() + (60 * 60 * 24 * 365));
            setcookie("TipoUser", hash('md5', 10), time() + (60 * 60 * 24 * 365));
            $_SESSION['Inicio'] = $user;
            $bool = true;
        } else {
            $bool = false;
        }
        return $bool;
    }

    public function cerrar()
    {
        setcookie("NickUser");
        setcookie("TipoUser");
        header("location: index.php");
    }

    public function iniciarLogIN()
    {
        if (isset($_COOKIE['NickUser']) && $_COOKIE['NickUser'] != '') {
                echo "<div class=\"panel panel-primary\" style=\"position: absolute; width: 27%;right: 2%;/* margin-top: 3%; */top: 110px;\">

            <div style=\"background-color: #0099FF; font-family: 'Source Sans Pro', sans-serif;font-weight: 500; font-size: large; \" class=\"panel-heading\">Bienvenido al sistema: <span style=\"color: #fff;\">". $_COOKIE['NickUser']."</span></div>
            <div class=\"panel-body\">
                <a style=\"width: 100%; background-color: #0099FF\" class=\"btn btn-primary\" type=\"reset\" href=\"gestionar.php\">Ir al Panel de gestión</a><br>
                <a style=\"width: 100%; background-color: #0099FF\" class=\"btn btn-primary\" type=\"reset\" href=\"logout.php\">Cerrar sesión</a>
                        </div>
            </div>
        </div>";
            }
            else {
                echo "<div class=\"panel panel-primary\" style=\"position: absolute;width: 27%;right: 2%;/* margin-top: 3%; */top: 80px;\">

            <div style=\"background-color: #0099FF\" class=\"panel-heading\">Ingresar al sistema:</div>
            <div class=\"panel-body\">
                <form role=\"form\" method=\"post\" action=\"login.php\">
                    <div class=\"row\">
                        <div class=\"form-group col-xs-12\">
                            <label style=\"font-size: inherit; color: black\" for=\"username\"><span class=\"text-danger\" style=\"margin-right:5px;\">*</span>Nombre de Usuario:</label>
                            <div class=\"input-group\">
                                <input style=\"width: 94%;\" class=\"form-control\" id=\"username\" name=\"username\" required autofocus
                                       type=\"text\">
                                <span class=\"input-group-btn\">
                                <label class=\"btn btn-primary\"><span class=\"glyphicon glyphicon-user\" aria-hidden=\"true\"></label>
                            </span>
                            </div>
                        </div>
                    </div>

                    <div class=\"row\">
                        <div class=\"form-group col-xs-12\">
                            <label style=\"font-size: inherit; color: #000;\" for=\"password\"><span class=\"text-danger\" style=\"margin-right:5px;\">*</span>Contraseña:</label>
                            <div class=\"input-group\">
                                <input style=\"width: 94%;\" class=\"form-control\" id=\"password\" name=\"password\" required type=\"password\">
                                <span class=\"input-group-btn\">
                                <label class=\"btn btn-primary\"><span class=\"glyphicon glyphicon-lock\"
                                                                     aria-hidden=\"true\"></label>
                            </span>
                            </div>
                        </div>
                    </div>

                    <div class=\"row\">
                        <div class=\"form-group col-xs-4\">
                            <input class=\"btn btn-primary\" style=\"background-color: #0099FF\" type=\"submit\" value=\"Ingresar\">
                        </div>
                        <div class=\"row\">
                            <div class=\"form-group col-xs-4\">
                                <input style=\"background-color: #0099FF\" class=\"btn btn-primary\" type=\"reset\" value=\"Limpiar\">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>";
            }

    }
    public function agregarEst($id, $nombres, $apellidos, $genero, $cursos)
    {
        $link = new ConexionMySQL();
        if (isset($_COOKIE['NickUser'])) {
            if ($_COOKIE['NickUser'] != '') {
                $sql = "INSERT INTO estudiantes (Identificacion, Nombres, Apellidos, Genero ) VALUES ('" . $id . "','" . $nombres . "', '" . $apellidos . "', '" . $genero . "')";
                if ($link->getSql()->query($sql)) {
                    $sql2 = "INSERT INTO estudiantescursos (idEst, idCurso) VALUES ('" . $id . "','" . $cursos . "')";
                    if ($link->getSql()->query($sql2)) {
                        echo "<script type='text/javascript'>alert('Estudiante agregado Correctamente.')</script>";
                    }
                } else {
                    echo "<script type='text/javascript'>alert('No se pudo añadir un nuevo estudiante, compruebe los datos.')</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('No puedes realizar esta accion como invitado, por favor inicia sesion.')</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('No puedes realizar esta accion como invitado, por favor inicia sesion.')</script>";
        }
    }

    public function buscarMat($buscar)
    {
        $link = new ConexionMySQL();
        $sql = "SELECT * FROM curso WHERE curso.Nombre LIKE '" . $buscar . "%'";
        $res = $link->getSql()->query($sql);
        while ($res1 = $res->fetch_assoc()) {
            echo "
        <div class=\"panel panel-primary\">
            <div style=\"background-color: #0099FF\" class=\"panel-heading\">Información del curso</div>
            <div class=\"panel-body\">
        
        <div style='position: relative; float: left'>
        <span style='font-family: Source Sans Pro, sans-serif; position: relative; left: 15px; color: black'>
        <b>Codigo:</b>" . $res1['Codigo'] . ", <b>Nombre: </b>" . $res1['Nombre'] . ", <b>Observaciones: </b>" . $res1['Observaciones'] . "<br><br>
        </div>
        </span>
        </div>
        </div>
      
        </br><br>";
        }

    }


    public function agregarDoc($id, $nombres, $apellidos, $genero, $cursos)
    {
        $link = new ConexionMySQL();
        if (isset($_COOKIE['NickUser'])) {
            if ($_COOKIE['NickUser'] != '') {
                $sql = "INSERT INTO docentes (Identificacion, Nombres, Apellidos, Genero ) VALUES ('" . $id . "','" . $nombres . "', '" . $apellidos . "', '" . $genero . "')";
                if ($link->getSql()->query($sql)) {
                    $sql2 = "INSERT INTO docentescursos (idDocente, idCurso) VALUES ('" . $id . "','" . $cursos . "')";
                    if ($link->getSql()->query($sql2)) {
                        echo "<script type='text/javascript'>alert('Docente agregado Correctamente.')</script>";
                    }
                } else {
                    echo "<script type='text/javascript'>alert('No se pudo añadir un nuevo docente, compruebe los datos.')</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('No puedes realizar esta accion como invitado, por favor inicia sesion.')</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('No puedes realizar esta accion como invitado, por favor inicia sesion.')</script>";
        }
    }

    public function agregarCurso($codigo, $nombre, $obs)
    {
        $link = new ConexionMySQL();
        if (isset($_COOKIE['NickUser'])) {
            if ($_COOKIE['NickUser'] != '') {
                $sql = "INSERT INTO curso(Codigo, Nombre, Observaciones) VALUES ('" . $codigo . "','" . $nombre . "', '" . $obs . "')";
                if ($link->getSql()->query($sql)) {
                    echo "<script type='text/javascript'>alert('Curso agregado Correctamente.')</script>";
                } else {
                    echo "<script type='text/javascript'>alert('No se pudo añadir un nuevo curso, compruebe los datos.')</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('No puedes realizar esta accion como invitado, por favor inicia sesion.')</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('No puedes realizar esta accion como invitado, por favor inicia sesion.')</script>";
        }
    }

    public function siEstaEst($id)
    {
        $link = new ConexionMySQL();
        $sql = "SELECT Identificacion FROM estudiantes WHERE Identificacion = " . $id;
        $res = $link->getSql()->query($sql);
        $bool = false;
        while ($res1 = $res->fetch_assoc()) {
            if ($res1['Identificacion'] == $id) {
                $bool = true;
            }
        }
        return $bool;
    }

    public function siEstaDoc($id)
    {
        $link = new ConexionMySQL();
        $sql = "SELECT Identificacion FROM docentes WHERE Identificacion = " . $id;
        $res = $link->getSql()->query($sql);
        $bool = false;
        while ($res1 = $res->fetch_assoc()) {
            if ($res1['Identificacion'] == $id) {
                $bool = true;
            }
        }
        return $bool;
    }

    public function siEstaCur($id)
    {
        $link = new ConexionMySQL();
        $sql = "SELECT Codigo FROM curso WHERE Codigo = " . $id;
        $res = $link->getSql()->query($sql);
        $bool = false;
        while ($res1 = $res->fetch_assoc()) {
            if ($res1['Codigo'] == $id) {
                $bool = true;
            }
        }
        return $bool;
    }

    public function modEst($idV, $idN, $nombres, $apellido, $genero)
    {
        $link = new ConexionMySQL();

        if (isset($_COOKIE['NickUser'])) {
            if ($_COOKIE['NickUser'] != '') {
                $sql = "UPDATE estudiantes SET Identificacion = '" . $idN . "', Nombres = '" . $nombres . "', Apellidos = '" . $apellido . "', Genero = '" . $genero . "' WHERE Identificacion = " . $idV;
                if ($link->getSql()->query($sql)) {
                    $sql3 = "SELECT id FROM estudiantescursos WHERE idEst = " . $idV;
                    $res = $link->getSql()->query($sql3);
                    $res2 = $res->fetch_assoc();
                    $sql2 = "UPDATE estudiantescursos SET idEst = '" . $idN . "' WHERE  id = " . $res2['id'];
                    if ($link->getSql()->query($sql2)) {
                        echo "<script type='text/javascript'>
                            alert('Estudiante Actualizado Correctamente');
                            </script>";
                    }
                } else {
                    echo "<script type='text/javascript'>
            alert('No se ha podido actualizar el estudiante. Error: '+" . $link->getSql()->error . ");
            </script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('No puedes realizar esta accion como invitado, por favor inicia sesion.')</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('No puedes realizar esta accion como invitado, por favor inicia sesion.')</script>";
        }
    }

    public function modDoc($idV, $idN, $nombres, $apellido, $genero)
    {
        $link = new ConexionMySQL();

        if (isset($_COOKIE['NickUser'])) {
            if ($_COOKIE['NickUser'] != '') {
                $sql = "UPDATE docentes SET Identificacion = '" . $idN . "', Nombres = '" . $nombres . "', Apellidos = '" . $apellido . "', Genero = '" . $genero . "' WHERE Identificacion = " . $idV;
                if ($link->getSql()->query($sql)) {
                    $sql3 = "SELECT id FROM docentescursos WHERE idDocente = " . $idV;
                    $res = $link->getSql()->query($sql3);
                    $res2 = $res->fetch_assoc();
                    $sql2 = "UPDATE docentescursos SET idDocente = '" . $idN . "' WHERE  id = " . $res2['id'];
                    if ($link->getSql()->query($sql2)) {
                        echo "<script type='text/javascript'>
                            alert('Docente Actualizado Correctamente');
                            </script>";
                    }
                } else {
                    echo "<script type='text/javascript'>
            alert('No se ha podido actualizar el docente. Error: '+" . $link->getSql()->error . ");
            </script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('No puedes realizar esta accion como invitado, por favor inicia sesion.')</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('No puedes realizar esta accion como invitado, por favor inicia sesion.')</script>";
        }
    }

    public function modCur($idV, $idN, $nombres, $obs)
    {
        $link = new ConexionMySQL();
        if (isset($_COOKIE['NickUser'])) {
            if ($_COOKIE['NickUser'] != '') {
                $sql = "UPDATE curso SET Codigo = " . $idN . ", Nombre = '" . $nombres . "', Observaciones = '" . $obs . "' WHERE Codigo = " . $idV;
                $sql3 = "SELECT id FROM docentescursos WHERE idCurso = " . $idV;
                $sql4 = "SELECT id FROM estudiantescursos WHERE idCurso = " . $idV;
                if ($link->getSql()->query($sql)) {
                    $res = $link->getSql()->query($sql3);
                    $res3 = $link->getSql()->query($sql4);
                    $res4 = $res3->fetch_assoc();
                    $res2 = $res->fetch_assoc();
                    $sql2 = "UPDATE docentescursos SET idCurso = " . $idN . " WHERE  id = " . $res2['id'];
                    $sql5 = "UPDATE estudiantescursos SET idCurso = " . $idN . " WHERE  id = " . $res4['id'];
                    if ($link->getSql()->query($sql2) && $link->getSql()->query($sql5)) {
                        echo "<script type='text/javascript'>
                            alert('Curso Actualizado Correctamente');
                            </script>";
                    } else {
                        echo "<script type='text/javascript'>
            alert('No se ha podido actualizar el curso. Error: '+" . $link->getSql()->error . ");
            </script>";
                    }
                } else {
                    echo "<script type='text/javascript'>
            alert('No se ha podido actualizar el curso. Error: '+" . $link->getSql()->error . ");
            </script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('No puedes realizar esta accion como invitado, por favor inicia sesion.')</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('No puedes realizar esta accion como invitado, por favor inicia sesion.')</script>";
        }
    }

    public function eliminarEst($id)
    {
        $link = new ConexionMySQL();
        $sql = "DELETE FROM estudiantes WHERE Identificacion = " . $id;
        if ($link->getSql()->query($sql)) {
            $sql2 = "DELETE FROM estudiantescursos WHERE idEst = " . $id;
            if ($link->getSql()->query($sql2)) {
                echo "<script type='text/javascript'>
                            alert('Estudiante Eliminado Correctamente');
                            </script>";
            } else {
                echo "<script type='text/javascript'>
            alert('No se ha podido eliminar el estudiante. Error: '+" . $link->getSql()->error . ");
            </script>";
            }
        }
    }

    public function eliminarDoc($id)
    {
        $link = new ConexionMySQL();
        $sql = "DELETE FROM docentes WHERE Identificacion = " . $id;
        if ($link->getSql()->query($sql)) {
            $sql2 = "DELETE FROM docentescursos WHERE idDocente = " . $id;
            if ($link->getSql()->query($sql2)) {
                echo "<script type='text/javascript'>
                            alert('Docente Eliminado Correctamente');
                            </script>";
            } else {
                echo "<script type='text/javascript'>
            alert('No se ha podido eliminar el docente. Error: '+" . $link->getSql()->error . ");
            </script>";
            }
        }
    }

    public function eliminarCur($id)
    {
        $link = new ConexionMySQL();
        $sql = "DELETE FROM curso WHERE Codigo = " . $id;
        if ($link->getSql()->query($sql)) {
            $sql2 = "DELETE FROM docentescursos WHERE idCurso = " . $id;
            $sql3 = "DELETE FROM estudiantescursos WHERE idCurso = " . $id;
            if ($link->getSql()->query($sql2) && $link->getSql()->query($sql3)) {
                echo "<script type='text/javascript'>
                            alert('Curso Eliminado Correctamente');
                            </script>";
            } else {
                echo "<script type='text/javascript'>
            alert('No se ha podido eliminar el curso. Error: '+" . $link->getSql()->error . ");
            </script>";
            }
        }
    }

    public function listarEst($nombre){
        $link = new ConexionMySQL();
        if($nombre == ''){
            $sql = "SELECT Identificacion, Nombres, Apellidos, Genero FROM estudiantes";
            $res = $link->getSql()->query($sql);
            while($res1 = $res->fetch_assoc()) {
                $sql2 = "SELECT c.Nombre FROM curso c INNER JOIN estudiantescursos e ON c.Codigo=e.idCurso WHERE e.idEst = " . $res1['Identificacion'];
                $res3 = $link->getSql()->query($sql2);

                echo "<div class=\"panel panel-primary\">
            <div style=\"background-color: #4caf50\" class=\"panel-heading\">Información del Estudiante</div>
            <div class=\"panel-body\">
            <div style='position: relative; float: left'>
            <span style='font-family: Source Sans Pro, sans-serif; position: relative; left: 15px; color: black'>
            <b>Identificacion:</b>" . $res1['Identificacion'] . ", <b>Nombres: </b>" . $res1['Nombres'] . ", <b>Apellidos: </b>" . $res1['Apellidos'] . ", <b>Genero: </b>" . $res1['Genero'] . ", <b>Asignaturas: </b>
            ";
                while ($res2 = $res3->fetch_assoc()) {
                    echo $res2['Nombre']. " - ";
                }
                    echo "<br><br>
            </div>
            </span>
            </div>
            </div>
            </br><br>";

            }
        }else{
            $sql = "SELECT Identificacion, Nombres, Apellidos, Genero FROM estudiantes WHERE Nombres LIKE '".$nombre."%'";
            $res = $link->getSql()->query($sql);
            while($res1 = $res->fetch_assoc()) {
                $sql2 = "SELECT c.Nombre FROM curso c INNER JOIN estudiantescursos e ON c.Codigo=e.idCurso WHERE e.idEst = " . $res1['Identificacion'];
                $res3 = $link->getSql()->query($sql2);

                echo "<div class=\"panel panel-primary\">
            <div style=\"background-color: #4caf50\" class=\"panel-heading\">Información del Estudiante</div>
            <div class=\"panel-body\">
            <div style='position: relative; float: left'>
            <span style='font-family: Source Sans Pro, sans-serif; position: relative; left: 15px; color: black'>
            <b>Identificacion:</b>" . $res1['Identificacion'] . ", <b>Nombres: </b>" . $res1['Nombres'] . ", <b>Apellidos: </b>" . $res1['Apellidos'] . ", <b>Genero: </b>" . $res1['Genero'] . ", <b>Asignaturas: </b>
            ";
                while ($res2 = $res3->fetch_assoc()) {
                    echo $res2['Nombre']. " - ";
                }
                echo "<br><br>
            </div>
            </span>
            </div>
            </div>
            </br><br>";
            }
        }

    }
    public function listarDoc($nombre){
    $link = new ConexionMySQL();
    if($nombre == ''){
        $sql = "SELECT Identificacion, Nombres, Apellidos, Genero FROM docentes";
        $res = $link->getSql()->query($sql);
        while($res1 = $res->fetch_assoc()) {
            $sql2 = "SELECT c.Nombre FROM curso c INNER JOIN docentescursos d ON c.Codigo=d.idCurso WHERE d.idDocente = " . $res1['Identificacion'];
            $res3 = $link->getSql()->query($sql2);

            echo "<div class=\"panel panel-primary\">
            <div style=\"background-color: #4caf50\" class=\"panel-heading\">Información del Estudiante</div>
            <div class=\"panel-body\">
            <div style='position: relative; float: left'>
            <span style='font-family: Source Sans Pro, sans-serif; position: relative; left: 15px; color: black'>
            <b>Identificacion:</b>" . $res1['Identificacion'] . ", <b>Nombres: </b>" . $res1['Nombres'] . ", <b>Apellidos: </b>" . $res1['Apellidos'] . ", <b>Genero: </b>" . $res1['Genero'] . ", <b>Asignaturas: </b>
            ";
            while ($res2 = $res3->fetch_assoc()) {
                echo $res2['Nombre']. " - ";
            }
            echo "<br><br>
            </div>
            </span>
            </div>
            </div>
            </br><br>";
        }
    }else{
        $sql = "SELECT Identificacion, Nombres, Apellidos, Genero FROM docentes WHERE Nombres LIKE '".$nombre."%'";
        $res = $link->getSql()->query($sql);
        while($res1 = $res->fetch_assoc()) {
            $sql2 = "SELECT c.Nombre FROM curso c INNER JOIN docentescursos d ON c.Codigo=d.idCurso WHERE d.idDocente = " . $res1['Identificacion'];
            $res3 = $link->getSql()->query($sql2);

            echo "<div class=\"panel panel-primary\">
            <div style=\"background-color: #4caf50\" class=\"panel-heading\">Información del Estudiante</div>
            <div class=\"panel-body\">
            <div style='position: relative; float: left'>
            <span style='font-family: Source Sans Pro, sans-serif; position: relative; left: 15px; color: black'>
            <b>Identificacion:</b>" . $res1['Identificacion'] . ", <b>Nombres: </b>" . $res1['Nombres'] . ", <b>Apellidos: </b>" . $res1['Apellidos'] . ", <b>Genero: </b>" . $res1['Genero'] . ", <b>Asignaturas: </b>
            ";
            while ($res2 = $res3->fetch_assoc()) {
                echo $res2['Nombre']. " - ";
            }
            echo "<br><br>
            </div>
            </span>
            </div>
            </div>
            </br><br>";
        }
    }

}
    public function listarCur($nombre){
        $link = new ConexionMySQL();
        if($nombre == ''){
            $sql = "SELECT Codigo, Nombre, Observaciones FROM curso";
            $res = $link->getSql()->query($sql);
            while($res1 = $res->fetch_assoc()) {
                echo "<div class=\"panel panel-primary\">
            <div style=\"background-color: #4caf50\" class=\"panel-heading\">Información de la Asignatura</div>
            <div class=\"panel-body\">
            <div style='position: relative; float: left'>
            <span style='font-family: Source Sans Pro, sans-serif; position: relative; left: 15px; color: black'>
            <b>Codigo:</b>" . $res1['Codigo'] . ", <b>Nombre: </b>" . $res1['Nombre'] . ", <b>Observaciones: </b>" . $res1['Observaciones'] . "
            <br><br>
            </div>
            </span>
            </div>
            </div>
            </br><br>";
            }
        }else{
            $sql = "SELECT Codigo, Nombre, Observaciones FROM curso WHERE Nombre LIKE'".$nombre."%'";
            $res = $link->getSql()->query($sql);
            while($res1 = $res->fetch_assoc()) {
                echo "<div class=\"panel panel-primary\">
            <div style=\"background-color: #4caf50\" class=\"panel-heading\">Información de la Asignatura</div>
            <div class=\"panel-body\">
            <div style='position: relative; float: left'>
            <span style='font-family: Source Sans Pro, sans-serif; position: relative; left: 15px; color: black'>
            <b>Codigo:</b>" . $res1['Codigo'] . ", <b>Nombre: </b>" . $res1['Nombre'] . ", <b>Observaciones: </b>" . $res1['Observaciones'] . "
            <br><br>
            </div>
            </span>
            </div>
            </div>
            </br><br>";
            }
        }
    }
}