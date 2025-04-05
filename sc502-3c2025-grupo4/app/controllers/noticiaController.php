<?php
require_once __DIR__ . '/../models/Noticia.php';

session_start();

$noticia = new Noticia();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';

    switch ($accion) {
        case 'crear':
            $titulo = $_POST['titulo'] ?? '';
            $contenido = $_POST['contenido'] ?? '';
            $imagenes = $_POST['imagenes'] ?? null;
            $autor = $_SESSION['id_usuario'] ?? null;

            if ($titulo && $contenido && $autor) {
                $noticia->crear($titulo, $contenido, $imagenes, $autor);
                header("Location: ../controllers/listarNoticias.php");
                exit;
            } else {
                echo "Faltan datos.";
            }
            break;

        case 'editar':
            $id = $_POST['id_noticia'] ?? null;
            $titulo = $_POST['titulo'] ?? '';
            $contenido = $_POST['contenido'] ?? '';
            $imagenes = $_POST['imagenes'] ?? null;

            if ($id && $titulo && $contenido) {
                $noticia->actualizar($id, $titulo, $contenido, $imagenes);
                header("Location: ../controllers/listarNoticias.php");
                exit;
            }
            break;

        case 'eliminar':
            $id = $_POST['id_noticia'] ?? null;

            if ($id) {
                $noticia->eliminar($id);
                header("Location: ../controllers/listarNoticias.php");
                exit;
            }
            break;
    }
}
