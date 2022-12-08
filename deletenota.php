<?php

require("./conexion.php");

//$data = json_decode(file_get_contents('php://input'), true);

$id = $_GET['IDNota'];
$conexion = new Conexion();
$db = $conexion->getConection();
$query = "DELETE FROM noti WHERE IDNota=:id";
$statement = $db->prepare($query);
$statement->bindParam(':id', $id);
$result = $statement->execute();
if ($result) {
    return "removed";
}
return "error!";
