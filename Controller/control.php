<?php

include_once '../Model/usuario.php';
class control{ 
    public static $MODEL;
    public function __construct(){

        $this->MODEL = new usuario();
    }

    public function login(){
      
        include_once'View/Login.php';

    }

    public function principal(){

        include_once'View/Principal.php';
    }
}
?>