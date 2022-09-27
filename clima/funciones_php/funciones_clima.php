<?php

require("conexion.php");
$conn->query("SET NAMES 'UTF8'");

$res = array('error' => false);
$action = 'read';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}


if ($action == 'insert') {
    $ciudad = $_POST['ciudad'];
    $user_id = $_POST['user_id'];
    $user = $_POST['user'];
    $hora = date("h:i:sa");

    $result = $conn->query("INSERT INTO consultas(id_consulta, id_usuario, usuario, hora, ciudad) VALUES (NULL,'$user_id', '$user','$hora','$ciudad')");

    if ($result) {
        $res['message'] = "consulta agregada correctamente";
    } else {
        $res['error'] = true;
        $res['message'] = "No se pudo agregar consulta";
    }
}



$conn->close();
header("Content-type: application/json");
echo json_encode($res);
die();
