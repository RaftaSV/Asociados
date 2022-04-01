<?php
class record{
    public $CNX;
   
public function __construct(){
        try {
            require_once"../Config/conexion.php";
            $this->CNX=conexion::conexion();
        } catch (Exeption $e) {
            die($e->getMessege());
        }

    }

    public function listaCambios($idUsuario){
        try {
            $SQL = "call SP_S_RECORD(?)";
            //stm = statement
            $stm= $this->CNX->prepare($SQL);
            $stm->bindParam(1,$idUsuario);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
 
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

    public function listaDatos($idUsuario){
        try {
            $SQL = "call SP_S_DATA(?)";
            //stm = statement
            $stm= $this->CNX->prepare($SQL);
            $stm->bindParam(1,$idUsuario);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
 
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
}
?>