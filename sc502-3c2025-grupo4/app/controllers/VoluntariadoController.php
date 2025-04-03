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
            $estado = $_POST['estado'] ?? '';
            $id_fundaciones = $_POST['id_fundaciones'] ?? '';
            
            // Manejo de la imagen
            $imagen = '';
            if (!empty($_FILES['imagen']['name'])) {
                $target_dir = "../../uploads/";
                $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
                if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
                    $imagen = $target_file;
                }
            }
            
            $resultado = Voluntariado::crearVoluntariado($titulo, $descripcion, $ubicacion, $fecha_inicio, $fecha_fin, $imagen, $estado, $id_fundaciones);
            
            if ($resultado) {
                header("Location: ../views/voluntariado.php?success=1");
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
