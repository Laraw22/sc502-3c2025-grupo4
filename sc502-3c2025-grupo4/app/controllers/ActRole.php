<?php
session_start();
require_once '../models/role.php';

try {
    if (!empty($_POST)) {
        $userId = intval($_POST['user_id'] ?? 0);
        $roleId = intval($_POST['role_id'] ?? 0);
        $action = $_POST['action'] ?? '';

        if ($action === 'update_role' && $userId > 0 && $roleId > 0) {
            if (Role::updateUserRole($userId, $roleId)) {
                header("Location: ../../index.php");
                exit;
            } else {
                echo "Error al actualizar el rol.";
            }
        } else {
            echo "Datos incompletos o inválidos.";
        }
    }
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
