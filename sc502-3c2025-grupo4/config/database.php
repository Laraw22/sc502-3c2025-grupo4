<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "voluntariado";

try {
    $conn = new mysqli($host, $user, $password, $database);

} catch (mysqli_sql_exception $e) {
    die("Error de conexión: " . $e->getMessage());
}
