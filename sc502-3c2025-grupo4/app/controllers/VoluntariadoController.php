<?php
require_once __DIR__ . '/../models/Voluntariado.php';
session_start();

$voluntariado = new Voluntariado();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';

    switch ($accion) {
        case 'crear':
            $titulo = $_POST['titulo'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $ubicacion = $_POST['ubicacion'] ?? '';
            $fecha_inicio = $_POST['fecha_inicio'] ?? '';
            $fecha_fin = $_POST['fecha_fin'] ?? '';
            $imagen = $_POST['imagen'] ?? '';
            $estado = 1; 
            $id_usuario = $_SESSION['id_usuario'] ?? null;

            if ($titulo && $descripcion && $ubicacion && $fecha_inicio && $fecha_fin && $id_usuario) {
                $voluntariado->crear($titulo, $descripcion, $ubicacion, $fecha_inicio, $fecha_fin, $imagen, $estado, $id_usuario);
                header("Location: ../controllers/listarVoluntariado.php");
                exit;
            } else {
                echo "Faltan datos para crear voluntariado.";
            }
            break;

        case 'editar':
            $id = $_POST['id_voluntariado'] ?? null;
            $titulo = $_POST['titulo'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $ubicacion = $_POST['ubicacion'] ?? '';
            $fecha_inicio = $_POST['fecha_inicio'] ?? '';
            $fecha_fin = $_POST['fecha_fin'] ?? '';
            $imagen = $_POST['imagen'] ?? '';
            $estado = $_POST['estado'] ?? 1;
            $id_usuario = $_SESSION['id_usuario'] ?? null;

            if ($id && $titulo && $descripcion && $ubicacion && $fecha_inicio && $fecha_fin && $id_usuario) {
                $voluntariado->actualizar($id, $titulo, $descripcion, $ubicacion, $fecha_inicio, $fecha_fin, $imagen, $estado, $id_usuario);
                header("Location: ../controllers/listarVoluntariado.php");
                exit;
            } else {
                echo "Faltan datos para editar voluntariado.";
            }
            break;

        case 'eliminar':
            $id = $_POST['id_voluntariado'] ?? null;

            if ($id) {
                $voluntariado->eliminar($id);
                header("Location: ../controllers/listarVoluntariado.php");
                exit;
            } else {
                echo "ID de voluntariado no proporcionado.";
            }
            break;
    }
}
