<?php
class conexion{

  
    public static function conexion()
    {     
        try {
            $conexion = new PDO ('mysql:host=localhost:3306; dbname=asociados', 'root', 'root');
            $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion -> exec('SET CHARACTER SET UTF8'); 
        } catch (Exception $e) {
            die ("Error: " . $e->getMessage());
            echo "Linea del error es: " . $e -> getLine();
        }
    return $conexion;
    }
}
?>