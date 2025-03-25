<?php
require_once '../../config/database.php';

class User
{
    public static function login($correo, $password)
    {
        global $conn;

        try {
            // Preparar la consulta para buscar por correo
            $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['contrasena'])) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (mysqli_sql_exception $e) {
            return false;
        }
    }

    public static function register($name, $correo, $password)
    {
        global $conn;
    
            // Encriptar la contraseña
            $password = password_hash($password, PASSWORD_BCRYPT);
    
            // Preparar la consulta para insertar datos
            $sql = "INSERT INTO usuarios (nombre, correo, contrasena) VALUES ('$name', '$correo', '$password')";

    
            if($conn->query($sql) === TRUE) {
                return true;
            } else {
                return false;
            }
    }
    
}
