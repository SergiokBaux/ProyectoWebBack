<?php
class Conexion
{
    public static function getConection()
    {
        $server = "localhost";
        $db = "proyectoweb2";
        $user = "root";
        $password = "ElPreciosoDelCano2";
        $conn = "";

        try {
            $conn = new PDO("mysql:host=$server;dbname=$db", $user, $password);
            //echo ("Conectado correctamente a la Base de Datos");
        } catch (PDOException $exp) {
            //echo ("No se pudo conectar a la Base de Datos" . $exp);
        }
        return $conn;
    }
}
