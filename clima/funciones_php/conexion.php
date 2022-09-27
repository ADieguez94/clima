<?php

date_default_timezone_set('America/Monterrey');
header("Access-Control-Allow-Origin: *");

$conn = new mysqli("localhost", "root", "", "clima");
if ($conn->connect_error) {
    die("No se puede conectar a la Base de datos");
}
