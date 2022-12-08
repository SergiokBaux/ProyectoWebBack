<?php
require("./conexion.php");

$data = json_decode(file_get_contents('php://input'), true);

$Titulo = $data['Titulo'];
$Autor = $data['Autor'];
$Nota = $data['Nota'];

$conexion = new Conexion();
$query = "INSERT INTO noti (Titulo,Autor,Nota) VALUES
(:Titulo,:Autor,:Nota)";
$db = $conexion->getConection();

$statement = $db->prepare($query);
//$statement->bindParam(":IDBanda", $IDBanda);
$statement->bindParam(":Titulo", $Titulo);
$statement->bindParam(":Autor", $Autor);
$statement->bindParam(":Nota", $Nota);

$result = $statement->execute();
if ($result) {
    return "Dado de alta correctamente";
}
return "ERROR";
