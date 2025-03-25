<?php
require_once '../models/User.php';

try {
    if (!empty($_POST)) {
        $action = $_POST['action'] ?? '';
        $correo = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $name = $_POST['name'] ?? ''; 

        if ($correo && $password != "") {
            if ($action === 'login') {
                if (User::login($correo, $password)) {
                    session_start();
                    $_SESSION['correo'] = $correo;
                    header("Location: ../../index.php");                    
                } else {
                    echo "Credenciales inválidas.";
                }
            } elseif ($action === 'register') {
                if (!empty($name)) { // Verificar que el nombre esté presente en el registro
                    if (User::register($name, $correo, $password)) {                                            
                        header("Location: ../../index.php");                        
                    } else {
                        echo "Ocurrió un error al registrar el usuario.";
                    }
                } else {
                    echo "Por favor, complete todos los campos para el registro.";
                }
            }
        } else {
            echo "Datos incompletos.";
        }
    }
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
