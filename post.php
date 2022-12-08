<?php
require("./conexion.php");

$data = json_decode(file_get_contents('php://input'), true);

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
