<?php
require_once '../../config/database.php';

class Voluntariado
{
    public static function crearVoluntariado($titulo, $descripcion, $ubicacion, $fecha_inicio, $fecha_fin, $imagen, $estado, $id_usuario)
    {
        global $conn;
    
        $stmt = $conn->prepare("INSERT INTO voluntariados (titulo, descripcion, ubicacion, fecha_inicio, fecha_fin, imagen, estado, id_usuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
        if (!$stmt) {
            // Mostrar error si falla el prepare
            die("Error al preparar la consulta: " . $conn->error);
        }
    
        // Asegura que el bind sea correcto: s = string, i = int
        $stmt->bind_param("ssssssii", $titulo, $descripcion, $ubicacion, $fecha_inicio, $fecha_fin, $imagen, $estado,  $id_usuario);
    
        if (!$stmt->execute()) {
            // Mostrar error si falla el execute
            die("Error al ejecutar la consulta: " . $stmt->error);
        }
    
        return true;
    }
    
}