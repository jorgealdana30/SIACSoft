<?php
include "SIACSoft.php";
session_start();
if (!isset($_SESSION["SIACSoft"])) {
    $_SESSION["SIACSoft"] = new SIACSoft();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Redirigiendo...</title>
</head>
<body>
<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    $bool = $_SESSION['SIACSoft']->loguear($_POST['username'], $_POST['password']);
    if($bool == true){
        header("location: gestionar.php");
    }else{
        echo "<script type=\"text/javascript\">
                    alert('Datos erroneos, no se ha podido ingresar');
                    window.location='index.php';
                </script>";
    }
}
?>
</body>
</html>