<?php

require("./conexion.php");

//$data = json_decode(file_get_contents('php://input'), true);

$id = $_GET['IDBanda'];
$conexion = new Conexion();
$db = $conexion->getConection();
$query = "DELETE FROM bandas WHERE IDBanda=:id";
$statement = $db->prepare($query);
$statement->bindParam(':id', $id);
$result = $statement->execute();
if ($result) {
    return "removed";
}
return "error!";
