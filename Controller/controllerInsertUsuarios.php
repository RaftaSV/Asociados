<?php

require_once ('../Model/usuario.php');
$Usuario = new usuario();
$pNombre="";
$sNombre="";
$pApellido="";
$sApellido="";
$DUI="";
$telefono="";
$direccion="";
$idUsuario=0;
if(isset($_POST["idUsuario"])){
    $idUsuario=$_POST["idUsuario"];
 }
if(isset($_POST["pNombre"])){
    $pNombre=$_POST["pNombre"];
 }
 if(isset($_POST["sApellido"])){
    $sApellido=$_POST["sApellido"];
 }
 if(isset($_POST["sNombre"])){
    $sNombre=$_POST["sNombre"];
    $pApellido=$_POST["pApellido"];
    $DUI=$_POST["DUI"];
    $telefono=$_POST["telefono"];
    $direccion=$_POST["direccion"];
 }



    
 if($idUsuario==0)
     {
    $Usuario = $Usuario->insertarUsuario($pNombre,$sNombre,$pApellido,$sApellido,$DUI,$telefono,$direccion);
    echo json_encode($pNombre);
     }else{
       
        $Usuario = $Usuario->actualizarUsuario($idUsuario,$pNombre,$sNombre,$pApellido,$sApellido,$DUI,$telefono,$direccion);
        echo json_encode($pNombre);
      
     }

 ?>