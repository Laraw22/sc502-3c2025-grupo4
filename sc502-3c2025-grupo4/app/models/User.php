<?php
require_once '../../config/database.php';

class User
{
    public static function login($correo, $password)
    {
        
        global $conn;

        try {

            $stmt = $conn->prepare("SELECT id_usuario, nombre, contrasena FROM usuarios WHERE correo = ?"); //Buscamos al usuario por su correo
            $stmt->bind_param("s", $correo);
            $stmt->execute();
            $resultado = $stmt->get_result(); 

            if ($resultado->num_rows === 1) {       
                $usuario = $resultado->fetch_assoc();  //si encuentra coincidencia lo guarda los datos que le pedi en la variable $usuario
                             
                if (password_verify($password, $usuario['contrasena'])) { //ahora verificamos la contraseña
                    $id_usuario = $usuario['id_usuario'];
                    $nombre = $usuario['nombre'];

                    //Necesitamos saber el rol del usuario, para eso buscamos en la tabla usuario_rol
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
                        $roles[] = $rol['nombre_rol'];
                    }


                    //Devolvemos los datos del usuario y los roles que tiene
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
    
    public static function register($name, $correo, $password)
{
    global $conn;

    $password = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $correo, $password);

    return $stmt->execute();
}

}
