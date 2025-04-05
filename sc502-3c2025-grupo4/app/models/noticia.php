<?php
require_once __DIR__ . '/../../config/database.php';

class Noticia {

    public function crear($titulo, $contenido, $imagenes, $autor) {
        global $conn;

        $stmt = $conn->prepare("INSERT INTO noticias (titulo, contenido, imagenes, autor) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $titulo, $contenido, $imagenes, $autor);
        return $stmt->execute();
    }

    public function obtenerTodas() {
        global $conn;

        $resultado = $conn->query("SELECT n.*, u.nombre AS nombre_autor
                                   FROM noticias n
                                   JOIN usuarios u ON n.autor = u.id_usuario
                                   ORDER BY fecha_publicacion DESC");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    
    public function obtenerPorId($id) {
        global $conn;

        $stmt = $conn->prepare("SELECT * FROM noticias WHERE id_noticia = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizar($id, $titulo, $contenido, $imagenes) {
        global $conn;

        $stmt = $conn->prepare("UPDATE noticias SET titulo = ?, contenido = ?, imagenes = ? WHERE id_noticia = ?");
        $stmt->bind_param("sssi", $titulo, $contenido, $imagenes, $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        global $conn;

        $stmt = $conn->prepare("DELETE FROM noticias WHERE id_noticia = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

