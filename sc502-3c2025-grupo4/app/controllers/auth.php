<?php
session_start();
require_once '../models/User.php';

try {
    if (!empty($_POST)) {
        $action = $_POST['action'] ?? '';
        $correo = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $name = trim($_POST['name'] ?? ''); 

        if ($correo && $password != "") {

            if ($action === 'login') {

                $usuario = User::login($correo, $password);

                if ($usuario) {
                    $_SESSION['id_usuario'] = $usuario['id_usuario'];
                    $_SESSION['nombre'] = $usuario['nombre'];
                    $_SESSION['roles'] = $usuario['roles']; 
                
                    header("Location: ../../index.php");
                    exit;
                } else {
                    echo "Correo o contraseña incorrectos.";
                }

            } elseif ($action === 'register') {

                if (!empty($name)) {
                    if (User::register($name, $correo, $password)) {
                        header("Location: ../../index.php");                        
                        exit;
                    } else {
                        echo "Ocurrió un error al registrar el usuario.";
                    }
                } else {
                    echo "Por favor, complete todos los campos para el registro.";
                }

            } else {
                echo "Acción inválida.";
            }

        } else {
            echo "Datos incompletos.";
        }
    }
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}

