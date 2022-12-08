<?php

use LDAP\Result;

class Controller
{
    public function GetProductos()
    {

        try {
            $list = array();
            $conexion = new Conexion();
            $db = $conexion->getConection();
            $query = "SELECT * FROM bandas";
            $statement = $db->prepare($query);
            $statement->execute();

            while ($row = $statement->fetch()) {
                $list[] = array(
                    "IDBanda" => $row['IDBanda'],
                    "NombreBanda" => $row['NombreBanda'],
                    "Ciudad" => $row['Ciudad'],
                    "Fecha" => $row['Fecha'],
                    "Link" => $row['Link'],
                );
            }

            return $list;
        } catch (PDOException $e) {
            echo "ERROR: ";
        }
    }

    //Función para registrar una banda en la base de datos
    public function addBanda($data)
    {
        try {
            //$IDBanda = $data['IDBanda'];
            $NombreBanda = $data['NombreBanda'];
            $Ciudad = $data['Ciudad'];
            $Fecha = $data['Fecha'];
            $Link = $data['Link'];

            $conexion = new Conexion();
            $query = "INSERT INTO bandas (NombreBanda,Ciudad,Fecha,Link) VALUES
            (:NombreBanda,:Ciudad,:Fecha,:Link)";
            $db = $conexion->getConection();

            $statement = $db->prepare($query);
            //$statement->bindParam(":IDBanda", $IDBanda);
            $statement->bindParam(":NombreBanda", $NombreBanda);
            $statement->bindParam(":Ciudad", $Ciudad);
            $statement->bindParam(":Fecha", $Fecha);
            $statement->bindParam(":Link", $Link);

            $result = $statement->execute();
            if ($result) {
                return "Dado de alta correctamente";
            }
            return "ERROR";
        } catch (PDOException $e) {
            return "ERROR" . $e->getMessage();
        }
    }
}
