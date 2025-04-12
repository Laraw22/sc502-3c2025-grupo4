<?php
require_once __DIR__ . '/../models/Voluntariado.php';
session_start();

$voluntariado = new Voluntariado();
$voluntariados = $voluntariado->obtenerTodos();

// Cargamos la vista con los datos
require_once __DIR__ . '/../partials/CrearVolutariado.php';
require_once __DIR__ . '/../partials/buscar.php';

