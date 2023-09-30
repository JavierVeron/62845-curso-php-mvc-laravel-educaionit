<?php
include_once './conexion.php';
/* MODELO - REGLAS DE NOGOCIO */ 
class Producto {
	/* Retorna Array asosiativo de productos */
	public static function getProductos(){
		$conexionpdo = Conexion::getInstance();
		$stmt = $conexionpdo->query("SELECT * FROM productos order by cod_producto desc");
		return $stmt->fetchAll();
	}
	
	public static function insertar($POSTREQUEST) {
		//var_dump($POSTREQUEST);die();
		$conexionpdo = Conexion::getInstance();
		$sentencia = $conexionpdo->prepare("INSERT INTO productos (cod_categoria, nombre, precio, stock) 
												   VALUES (:cod_categoria, :nombre, :precio, :stock)");
		$sentencia->bindParam(':cod_categoria', $POSTREQUEST['cod_categoria']);
		$sentencia->bindParam(':nombre', $POSTREQUEST['nombre']);
		$sentencia->bindParam(':precio',$POSTREQUEST['precio']);
		$sentencia->bindParam(':stock', $POSTREQUEST['stock']);
		$sentencia->execute();
		
	}
	
	public static function editar($POSTREQUEST) {
		//var_dump($POSTREQUEST);die();
		$conexionpdo = Conexion::getInstance();
		$sentencia = $conexionpdo->prepare("UPDATE productos 
											SET cod_categoria=:cod_categoria, nombre=:nombre, precio=:precio, stock=:stock
											WHERE cod_producto = :cod_producto
												   ");
												   
		$sentencia->bindParam(':cod_producto', $POSTREQUEST['cod_producto']);
		$sentencia->bindParam(':cod_categoria', $POSTREQUEST['cod_categoria']);
		$sentencia->bindParam(':nombre', $POSTREQUEST['nombre']);
		$sentencia->bindParam(':precio',$POSTREQUEST['precio']);
		$sentencia->bindParam(':stock', $POSTREQUEST['stock']);
		$sentencia->execute();
		
	}
	
	
	public static function eliminar($cod_producto){
		$conexionpdo = Conexion::getInstance();
		$sql = "DELETE FROM productos WHERE cod_producto=".$cod_producto;
		$conexionpdo->exec($sql);
	}
	
	public static function getProductoPorId($cod_producto){
		$conexionpdo = Conexion::getInstance();
		$stmt = $conexionpdo->query("SELECT * FROM productos where cod_producto=".$cod_producto);
		return $stmt->fetch();
	}
	
}	