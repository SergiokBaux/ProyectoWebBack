<!-------
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexión de php a MySQL</title>
</head>

<body>

</body>

</html>
--------->

<?php
//include_once("conexion.php");
//Conexion::getConection();
require_once('conexion.php');
require_once('controller.php');
require_once('cors.php');

$methodHTTP = $_SERVER['REQUEST_METHOD'];
switch ($methodHTTP) {
    case 'GET':
        if (empty($_GET)) {
            $ctl = new Controller();
            $data = $ctl->GetProductos();
            echo json_encode([$data]);
        } else {
            $data = $_GET;
            $ctl = new Controller();
            $result = $ctl->GetProductos($data);
            echo json_encode([$data]);
        }
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $ctl = new Controller();
        $result = $ctl->addBanda($data);
        echo json_encode([$result]);
        break;
}
?>