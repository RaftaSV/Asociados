<?php
require_once ('../Model/modelRecord.php');
$record = new record();
$idUsuario="";
$consulta="";
if(isset($_POST['idUsuario'])){
    $idUsuario=$_POST["idUsuario"]; 
 }

    $record = $record->listaCambios($idUsuario);
    echo json_encode($record);
 

?>