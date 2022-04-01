<?php
require_once "../Model/modeLogin.php";
$usuario = htmlentities(addslashes($_POST["user"]));
$password = htmlentities(addslashes($_POST["pass"]));
$loguear = new Login();
$admin = $loguear->consultar_Login($usuario, $password);
// $numero_conexion = $loguear->rowCount();



if ($admin >= 1) {
session_start();
$_SESSION["inicio"] = "CORRECTO";
$_SESSION["usuarioactual"] = $usuario;
$_SESSION["idAdmin"] = $admin;
header("location: ../view/Principal.php");
} else
{
header("location: ../view/Login.php");

echo "usuario no encontrado";
}
?>