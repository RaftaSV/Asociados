
<?php
require_once ('../Model/usuario.php');
$Usuario = new usuario();
$idUsuario=0;

if(isset($_POST["idUsuario"])){
    $idUsuario=$_POST["idUsuario"];
 }

$Usuario = $Usuario->elimiarUsuario($idUsuario);
?>