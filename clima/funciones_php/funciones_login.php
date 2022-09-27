<?php

require("conexion.php");
$conn->query("SET NAMES 'UTF8'");

$res = array('error' => false);
$action = 'read';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}


if ($action == 'login') {

    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
    $date = date("Y-m-d");

    $result = $conn->query("SELECT * FROM usuarios WHERE correo='$mail' and pass=SHA1('$pass')");
    $result2 = $conn->query("UPDATE usuarios set fecha_login='$date' WHERE correo='$mail' and pass=SHA1('$pass')");

    if ($result->num_rows >= 1) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        session_start();
        $_SESSION['id_usuario'] = $row['id_usuario'];
        $_SESSION['usuario'] = $row['usuario'];
        $_SESSION['fecha_login'] = $row['fecha_login'];
        $_SESSION['verificar'] = true;
        $res['error'] = false;
        $res['message'] = "Bienvenido";
    } else {
        $res['error'] = true;
        $res['message'] = "Alerta! datos incorrectos";
    }
}


if($action == 'add'){
    $correo = $_POST['correo'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $result = $conn->query("INSERT INTO usuarios(id_usuario, correo, usuario, pass, fecha_login) VALUES (NULL,'$correo','$user',SHA1('$pass'),'')");
    if($result){
        $res['message'] = "Usuario agregado correctamente";
    }

}
$conn->close();
header("Content-type: application/json");
echo json_encode($res);
die();
