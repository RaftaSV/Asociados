<?php
@session_start();
class usuario{

public $CNX;


    public function __construct(){
        try {
            require_once"../Config/conexion.php";
            $this->CNX=conexion::conexion();
        } catch (Exeption $e) {
            die($e->getMessege());
        }

    }

    public function listaUsuarios(string $dui){
        try {
            $SQL = "call SP_S_USER(?)";
            //stm = statement
            $stm= $this->CNX->prepare($SQL);
            $stm->bindParam(1,$dui);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
 
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

    public function insertarUsuario( string $pNombre, string $sNombre, string $pApellido,
     string $sApellido, string $DUI, string $telefono, String $direccion){
        try {
            $SQL = "call SP_I_USER(?,?,?,?,?,?,?)";
            //stm = statement
            $stm= $this->CNX->prepare($SQL);
            $stm->bindParam(1,$pNombre);
            $stm->bindParam(2,$sNombre);
            $stm->bindParam(3,$pApellido);
            $stm->bindParam(4,$sApellido);
            $stm->bindParam(5,$DUI);
            $stm->bindParam(6,$telefono);
            $stm->bindParam(7,$direccion);
            $stm->execute();
 
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
    public function actualizarUsuario(int $idUsuario, string $pNombre, string $sNombre, string $pApellido,
     string $sApellido, string $DUI, string $telefono, String $direccion){
        try {
            $SQL = "call SP_U_USER(?,?,?,?,?,?,?,?,?)";
            //stm = statement
            $stm= $this->CNX->prepare($SQL);
            $stm->bindParam(1,$idUsuario);
            $stm->bindParam(2,$pNombre);
            $stm->bindParam(3,$sNombre);
            $stm->bindParam(4,$pApellido);
            $stm->bindParam(5,$sApellido);
            $stm->bindParam(6,$DUI);
            $stm->bindParam(7,$telefono);
            $stm->bindParam(8,$direccion);
            $stm->bindParam(9,$_SESSION['idAdmin']);
            $stm->execute();
 
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
    public function elimiarUsuario(int $idUsuario){
        try {
            $SQL = "call SP_D_USER(?)";
            //stm = statement
            $stm= $this->CNX->prepare($SQL);
            $stm->bindParam(1,$idUsuario);
            $stm->execute();
 
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

}
?>