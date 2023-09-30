<?php
include_once './conexion.php';
/* MODELO - REGLAS DE NOGOCIO */ 
class Categoria {
	/* Retorna Array asosiativo de categorias */
	public static function getCategorias(){
		$conexionpdo = Conexion::getInstance();
		$stmt = $conexionpdo->query("SELECT * FROM categorias");
		return $stmt->fetchAll();
	}
	
}	