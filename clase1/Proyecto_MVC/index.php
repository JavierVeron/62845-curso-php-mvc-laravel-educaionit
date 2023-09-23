<?php
require './controlador/productoController.php';

/* Simple estructura de rutas */
if(isset($_GET['hola'])) {
    echo 'hola mundo';
} else if (isset($_GET['productos'])) {
    $campo = isset($_GET['campo']) ? $_GET['campo'] : "";
    $orden =  isset($_GET['orden']) ? $_GET['orden'] : "";

    echo productoController::armarProductos($campo, $orden);
} else if (isset($_GET['filtrar'])) {
    $nombre = isset($_GET['filtrar']) ? $_GET['filtrar'] : "";

    echo productoController::filtrarProductos($nombre);
}

