<?php
include 'conexion.php';

if (isset($_GET['termino'])) {
    $termino = mysqli_real_escape_string($conn, $_GET['termino']);

    $sql = "SELECT * FROM voluntariados WHERE nombre LIKE '%$termino%' OR zona LIKE '%$termino%'";
    $resultado = mysqli_query($conn, $sql);

    $salida = "";
    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $salida .= "<div><strong>" . $fila['nombre'] . "</strong> - " . $fila['zona'] . "</div>";
        }
    } else {
        $salida = "<p>No se encontraron coincidencias.</p>";
    }

    header("Location: buscar.php?resultados=" . urlencode($salida));
    exit();
}
?>
