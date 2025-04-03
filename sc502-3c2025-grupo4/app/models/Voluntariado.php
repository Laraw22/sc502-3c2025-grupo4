<?php
require_once '../../config/database.php';

class Voluntariado
{
    public static function crearVoluntariado($titulo,$descripcion,$ubicacion,$fecha_inicio,$fecha_fin,$imagen,$estado,$id_fundaciones)
    {
        global $conn;

        $stmt = $conn->prepare("INSERT INTO voluntariado (titulo, descripcion, ubicacion, fecha_inicio, fecha_fin, imagen, estado, id_fundaciones) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssi", $titulo, $descripcion, $ubicacion, $fecha_inicio, $fecha_fin, $imagen, $estado, $id_fundaciones);
        return $stmt->execute();
    }
    

    
}