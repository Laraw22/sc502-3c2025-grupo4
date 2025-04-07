<?php
require_once '../models/User.php'; // Ajusta la ruta según tu estructura

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');

    try {
        if (!empty($name) && !empty($email)) {
            // Buscar al usuario por nombre y correo
            $usuario = User::getUserByNameAndEmail($name, $email);

            if ($usuario) {
                // Redirigir a la página de cambio de contraseña
                header("Location: cambiar_contrasena.php?id_usuario=" . $usuario['id_usuario']);
                exit;
            } else {
                echo "No se encontró un usuario con ese nombre y correo.";
            }
        } else {
            echo "Por favor, complete todos los campos.";
        }
    } catch (Exception $e) {
        echo "Error al procesar la solicitud: " . $e->getMessage();
    }
}
