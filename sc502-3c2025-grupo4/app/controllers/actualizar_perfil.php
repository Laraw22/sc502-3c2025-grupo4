<?php
require_once '../models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = trim($_POST['id_usuario'] ?? '');
    $nombre = trim($_POST['nombre'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');
    $contactos = trim($_POST['contactos'] ?? '');

    try {
        if (!empty($id_usuario) && !empty($nombre)) {
            $resultado = User::updateUserProfile($id_usuario, $nombre, $descripcion, $contactos);

            if ($resultado) {
                echo "Perfil actualizado correctamente.";
                header("Location: ../partials/perfil.php"); // Redirige a una página de perfil
                exit;
            } else {
                echo "Error al actualizar el perfil.";
            }
        } else {
            echo "El nombre es obligatorio.";
        }
    } catch (Exception $e) {
        echo "Error al procesar la actualización: " . $e->getMessage();
    }
}
