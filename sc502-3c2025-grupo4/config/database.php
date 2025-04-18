<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "voluntariado";

// Activar errores detallados de mysqli
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


try {
    $conn = new mysqli($host, $user, $password, $database);
    $conn->set_charset("utf8mb4");

} catch (mysqli_sql_exception $e) {
    echo "🛑 Error de conexión: " . $e->getMessage() . "<br>";
}
