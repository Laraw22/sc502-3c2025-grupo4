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
                header("Location: ../partials/nuevaContra.php?id_usuario=" . $usuario['id_usuario']);
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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = trim($_POST['id_usuario'] ?? '');
    $new_password = trim($_POST['new_password'] ?? '');

    try {
        if (!empty($id_usuario) && !empty($new_password)) {
            // Hashear la nueva contraseña
            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

            global $conn; // Conexión a la base de datos
            $stmt = $conn->prepare("UPDATE usuarios SET contrasena = ? WHERE id_usuario = ?");
            $stmt->bind_param("si", $hashed_password, $id_usuario);

            if ($stmt->execute()) {
                echo "Contraseña actualizada correctamente.";
                header("Location: ../partials/Es_inicioSe.php");
                exit;
            } else {
                echo "Error al actualizar la contraseña.";
            }
        } else {
            echo "Datos incompletos.";
        }
    } catch (Exception $e) {
        echo "Error al procesar la solicitud: " . $e->getMessage();
    }
}