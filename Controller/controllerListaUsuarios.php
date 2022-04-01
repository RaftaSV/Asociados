<?php

require_once ('../Model/usuario.php');
$Usuario = new usuario();
$duiBuscar="";

if(isset($_POST['dui'])){
    $duiBuscar=$_POST["dui"]; 
 }


 $Usuario = $Usuario->listaUsuarios($duiBuscar);
 echo json_encode($Usuario);
 
