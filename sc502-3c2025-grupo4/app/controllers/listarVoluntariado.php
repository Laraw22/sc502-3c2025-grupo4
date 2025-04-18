<?php
require_once __DIR__ . '/../models/Voluntariado.php';
session_start();

$voluntariado = new Voluntariado();
$voluntariados = $voluntariado->obtenerTodos();

// Añade el id_usuario del creador a cada voluntariado
foreach ($voluntariados as &$v) {
    $v['id_usuario_creador'] = $voluntariado->obtenerIdUsuarioCreador($v['id_voluntariado']);
}
// Cargamos la vista con los datos
require_once __DIR__ . '/../partials/CrearVolutariado.php';


