<?php
require_once __DIR__ . '/../../config/database.php';

class Voluntariado {

    public function crear($titulo, $descripcion, $ubicacion, $fecha_inicio, $fecha_fin, $imagen, $estado, $id_usuario) {
        global $conn;

        $stmt = $conn->prepare("INSERT INTO voluntariados (titulo, descripcion, ubicacion, fecha_inicio, fecha_fin, imagen, estado, id_usuario) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssii", $titulo, $descripcion, $ubicacion, $fecha_inicio, $fecha_fin, $imagen, $estado, $id_usuario);
        return $stmt->execute();
    }

    public function obtenerTodos() {
        global $conn;
    
        if (!isset($conn)) {
            die("🛑 Error: \$conn no está definida.");
        }
    
        if (!$conn) {
            die("🛑 Error: Conexión no válida.");
        }
    
        $query = "SELECT v.*, u.nombre AS nombre_usuario 
                  FROM voluntariados v 
                  JOIN usuarios u ON v.id_usuario = u.id_usuario 
                  ORDER BY fecha_inicio DESC";
    
        $resultado = $conn->query($query);
    
        if (!$resultado) {
            die("🛑 Error en la consulta SQL: " . $conn->error);
        }
    
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    
    

    public function obtenerPorId($id) {
        global $conn;

        $stmt = $conn->prepare("SELECT * FROM voluntariados WHERE id_voluntariado = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizar($id, $titulo, $descripcion, $ubicacion, $fecha_inicio, $fecha_fin, $imagen, $estado, $id_usuario) {
        global $conn;

        $stmt = $conn->prepare("UPDATE voluntariados 
                                SET titulo = ?, descripcion = ?, ubicacion = ?, fecha_inicio = ?, fecha_fin = ?, imagen = ?, estado = ?, id_usuario = ? 
                                WHERE id_voluntariado = ?");
        $stmt->bind_param("ssssssiii", $titulo, $descripcion, $ubicacion, $fecha_inicio, $fecha_fin, $imagen, $estado, $id_usuario, $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        global $conn;

        $stmt = $conn->prepare("DELETE FROM voluntariados WHERE id_voluntariado = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
