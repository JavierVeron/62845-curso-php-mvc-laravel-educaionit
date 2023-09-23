<?php
include_once "./modelo/producto.php";
include_once './vista/productoVista.php'; 

class productoController {
	
	public static function armarProductos($campo, $orden){
		$productos = Producto::getProductos($campo, $orden);
		$productoVista = new productoVista();
		$vistaAdevolver = $productoVista->vistaListadoProductos($productos);
		return $vistaAdevolver;
	}

	public static function filtrarProductos($nombre){
		$productos = Producto::filtrarProductos($nombre);
		$productoVista = new productoVista();
		$vistaAdevolver = $productoVista->vistaListadoProductos($productos);
		return $vistaAdevolver;
	}

}	