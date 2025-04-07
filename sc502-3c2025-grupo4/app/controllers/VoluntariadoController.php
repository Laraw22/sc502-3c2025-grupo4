<?php
require_once '../../config/database.php';
require_once '../models/Voluntariado.php';

class VoluntariadoController
{
    public function agregarVoluntariado()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titulo = $_POST['titulo'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $ubicacion = $_POST['ubicacion'] ?? '';
            $fecha_inicio = $_POST['fecha_inicio'] ?? '';
            $fecha_fin = $_POST['fecha_fin'] ?? '';
             $id_usuario = $_POST['id_usuario'] ?? '';
            
            $imagen = $_POST['imagen'] ?? '';
            
            $resultado = Voluntariado::crearVoluntariado($titulo, $descripcion, $ubicacion, $fecha_inicio, $fecha_fin, $imagen, 1,  $id_usuario);
            
            if ($resultado) {
                header("Location: ../partials/CrearVolutariado.php");
                exit();
            } else {
                header("Location: ../views/voluntariado.php?error=1");
                exit();
            }
        }
    }
}

$controller = new VoluntariadoController();
$controller->agregarVoluntariado();
