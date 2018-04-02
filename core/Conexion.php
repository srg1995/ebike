<?php

class Conexion
{

    public static function conectar()
    {
        try{
            $conexion=new PDO("mysql:host=localhost; dbname=ibike","root","");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET UTF8");

        }catch(Exception $e)
        {
            die("Error". $e->getMessage());
            echo "Linea del error". $e->getLine();
        }
        return $conexion;
    }
}
?>
