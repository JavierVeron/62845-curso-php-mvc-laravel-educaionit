<?php
include_once './conexion.php';
/* MODELO - REGLAS DE NOGOCIO */ 
class Producto {
	/* Retorna Array asosiativo de productos */
	public static function getProductos($campo, $orden){
		$conexionpdo = Conexion::getInstance();

		if ($campo && $orden) {
			$stmt = $conexionpdo->query("SELECT * FROM productos WHERE activo = 1 ORDER BY $campo $orden");
		} else {
			$stmt = $conexionpdo->query("SELECT * FROM productos WHERE activo = 1");
		}

		return $stmt->fetchAll();
	}

	public static function filtrarProductos($nombre){
		$conexionpdo = Conexion::getInstance();

		if ($nombre) {
			$stmt = $conexionpdo->query("SELECT * FROM productos WHERE nombre LIKE '%" .$nombre ."%'");
		} else {
			$stmt = $conexionpdo->query("SELECT * FROM productos WHERE activo = 1");
		}

		return $stmt->fetchAll();
	}
}	