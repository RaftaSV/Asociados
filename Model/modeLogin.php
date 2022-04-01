 <?php

class Login
{
    private $base;
    private $admin;

    public function __construct()
    {
        require_once "../Config/conexion.php";
        $this->base = conexion::conexion();

    }

    public function consultar_Login($usuario, $password)
    {
        $SQL = "call SP_LOGIN(?,?)";
        $resultado = $this->base->prepare($SQL);
        $resultado->bindParam(1, $usuario); //
        $resultado->bindParam(2, $password); //
        $resultado->execute();
       while ($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
        var_dump($fila['idAdmin']);
        $this->admin=($fila['idAdmin']);
    }

    return $this->admin;

    }
}