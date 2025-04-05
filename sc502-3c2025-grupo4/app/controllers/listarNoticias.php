<?php
require_once __DIR__ . '/../models/Noticia.php';
session_start();

$noticia = new Noticia();
$noticias = $noticia->obtenerTodas();

// Cargamos la vista con los datos
require_once __DIR__ . '/../partials/noticias.php';
