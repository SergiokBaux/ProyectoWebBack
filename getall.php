<?php
require("./cors.php");
require("./Conexion.php");
$conexion = new Conexion();
$db = $conexion->getConection();
$query = "SELECT * FROM bandas ORDER BY IDBanda";
$statement = $db->prepare($query);
$statement->execute();
$vec = [];
while ($row = $statement->fetch()) {
    $vec[] = $row;
}

$cad = json_encode($vec);
echo $cad;
