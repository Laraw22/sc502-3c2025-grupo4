<?php
require_once __DIR__ . '/../../config/database.php';;

class Noticia {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    public function crear($titulo, $contenido, $imagenes, $autor) {
        $stmt = $this->conexion->prepare("INSERT INTO noticias (titulo, contenido, imagenes, autor) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $titulo, $contenido, $imagenes, $autor);
        return $stmt->execute();
    }

    public function obtenerTodas() {
        $resultado = $this->conexion->query("SELECT * FROM noticias ORDER BY fecha_publicacion DESC");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    
    public function obtenerPorId($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM noticias WHERE id_noticia = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizar($id, $titulo, $contenido, $imagenes) {
        $stmt = $this->conexion->prepare("UPDATE noticias SET titulo = ?, contenido = ?, imagenes = ? WHERE id_noticia = ?");
        $stmt->bind_param("sssi", $titulo, $contenido, $imagenes, $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM noticias WHERE id_noticia = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
