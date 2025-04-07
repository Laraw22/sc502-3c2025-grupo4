<?php
require_once '../../config/database.php';


class User
{
    public static function getAllUsers()
    {
        global $conn;

        $query = "SELECT id_usuario, nombre FROM usuarios";
        $result = $conn->query($query);

        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        return $users;
    }
    // Método para el inicio de sesión
    public static function login($correo, $password)
    {
        global $conn;

        try {
            // Buscar al usuario por correo
            $stmt = $conn->prepare("SELECT id_usuario, nombre, contrasena FROM usuarios WHERE correo = ?");
            $stmt->bind_param("s", $correo);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows === 1) {
                // Obtener datos del usuario
                $usuario = $resultado->fetch_assoc();

                // Verificar contraseña
                if (password_verify($password, $usuario['contrasena'])) {
                    $id_usuario = $usuario['id_usuario'];
                    $nombre = $usuario['nombre'];

                    // Obtener roles del usuario desde la tabla usuario_rol
                    $stmt_roles = $conn->prepare("
                        SELECT r.nombre 
                        FROM usuario_rol ur 
                        JOIN roles r ON ur.id_rol = r.id_rol 
                        WHERE ur.id_usuario = ?
                    ");
                    $stmt_roles->bind_param("i", $id_usuario);
                    $stmt_roles->execute();
                    $roles_result = $stmt_roles->get_result();

                    $roles = [];
                    while ($rol = $roles_result->fetch_assoc()) {
                        $roles[] = $rol['nombre']; // Cambié a 'nombre' para que coincida con la tabla roles
                    }

                    // Devolver datos del usuario junto con los roles
                    return [
                        'id_usuario' => $id_usuario,
                        'nombre' => $nombre,
                        'roles' => $roles
                    ];
                }
            }

            return false;

        } catch (mysqli_sql_exception $e) {
            return false;
        }
    }

    // Método para registrar un nuevo usuario
    public static function register($name, $correo, $password)
    {
        global $conn;

        // Hashear la contraseña antes de almacenarla
        $password = password_hash($password, PASSWORD_BCRYPT);

        try {
            $stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $correo, $password);
            return $stmt->execute();
        } catch (mysqli_sql_exception $e) {
            return false;
        }
    }

    // Método para obtener el ID de usuario por correo (puede ser útil para roles)
    public static function getUserIdByEmail($correo)
    {
        global $conn;

        try {
            $stmt = $conn->prepare("SELECT id_usuario FROM usuarios WHERE correo = ?");
            $stmt->bind_param("s", $correo);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows === 1) {
                $usuario = $resultado->fetch_assoc();
                return $usuario['id_usuario'];
            }

            return false;

        } catch (mysqli_sql_exception $e) {
            return false;
        }
    }

    public static function getUserByNameAndEmail($name, $email)
{
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT id_usuario FROM usuarios WHERE nombre = ? AND correo = ?");
        $stmt->bind_param("ss", $name, $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            return $resultado->fetch_assoc();
        }

        return false;
    } catch (mysqli_sql_exception $e) {
        return false;
    }
}

}
