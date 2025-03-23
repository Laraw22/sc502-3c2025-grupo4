<?php
require_once '../models/User.php';

try {

    if (!empty($_POST)) {

        $action = $_POST['action'] ?? '';
        if ($_POST['password'] != "" && $_POST['username'] != "") {
            if ($action === 'login') {
                if (User::login($_POST['username'], $_POST['password'])) {

                    session_start();
                    $_SESSION["username"] = $_POST['username'];
                    header("Location: ../../?action=3");
                }
            } elseif ($action === 'register') {
                if (User::register($_POST['username'], $_POST['password'])) {

                    header("Location: ../../");
                }
            }
        } else {
            echo "Datos incompletos!";
        }
    }
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
