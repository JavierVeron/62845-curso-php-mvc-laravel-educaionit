<?php
include_once './conexion.php';

class Articulo {
    public static function getAll() {
        $conexionpdo = Conexion::getInstance();
		$stmt = $conexionpdo->query("SELECT * FROM articulos order by id asc");
		return $stmt->fetchAll();
    }

    public static function getArticulosByName($request) {
        $nombre = $request["nombre"];
        $conexionpdo = Conexion::getInstance();
		$stmt = $conexionpdo->query("SELECT * FROM articulos WHERE (nombre LIKE '%$nombre%') order by id asc");
		return $stmt->fetchAll();
    }

    public static function getArticulosByRange($request) {
        $precioMin = $request["precioMin"];
        $precioMax = $request["precioMax"];
        $conexionpdo = Conexion::getInstance();
		$stmt = $conexionpdo->query("SELECT * FROM articulos WHERE (precio >= $precioMin) AND (precio <= $precioMax) order by id asc");
		return $stmt->fetchAll();
    }
}