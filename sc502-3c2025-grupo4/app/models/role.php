<?php
require_once '../../config/database.php';

class Role
{
    public static function getAllRoles()
    {
        global $conn;

        $query = "SELECT id_rol, nombre FROM roles";
        $result = $conn->query($query);

        $roles = [];
        while ($row = $result->fetch_assoc()) {
            $roles[] = $row;
        }

        return $roles;
    }

    public static function updateUserRole($userId, $roleId)
    {
        global $conn;

        $query = "UPDATE usuario_rol SET id_rol = ? WHERE id_usuario = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $roleId, $userId);

        return $stmt->execute();
    }
}
