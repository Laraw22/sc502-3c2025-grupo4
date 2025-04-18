<?php
require_once __DIR__ . '/../models/Noticia.php';
session_start();

$noticia = new Noticia();
$noticias = $noticia->obtenerTodas();

foreach ($noticias as &$v) {
    $creador = $noticia->obtenerIdUsuarioCreador($v['id_noticia']);
    $v['id_usuario_creador'] = isset($creador) ? $creador : null;
}
// Cargamos la vista con los datos
require_once __DIR__ . '/../partials/noticias.php';
