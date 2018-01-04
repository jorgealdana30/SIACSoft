<?php
include "SIACSoft.php";
session_start();
header("Content-Type: text/html;charset=utf-8");
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
$_SESSION['SIACSoft']->cerrar()
?>
</body>
</html>
