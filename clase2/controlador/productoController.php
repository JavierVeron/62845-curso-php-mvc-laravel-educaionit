<?php
include_once "./modelo/producto.php";
include_once "./modelo/categoria.php";
include_once './vista/productoVista.php'; 

class productoController {
	
	public static function armarProductos(){
		$productos = Producto::getProductos();
		$productoVista = new productoVista();
		$vistaAdevolver = $productoVista->vistaListadoProductos($productos);
		return $vistaAdevolver;
	}
	public static function formularioProducto($GETREQUEST){
		$categorias = Categoria::getCategorias();
		
		/* Viene para editar*/
		if(isset($GETREQUEST['cod_producto'])){
			$Producto = Producto::getProductoPorId($GETREQUEST['cod_producto']);
			$productoVista = new productoVista();
			$vistaAdevolver = $productoVista->vistaFormularioProducto($categorias,'editar',$Producto);
			return $vistaAdevolver;
		}
		else{
			$productoVista = new productoVista();
			$vistaAdevolver = $productoVista->vistaFormularioProducto($categorias,'alta');
			return $vistaAdevolver;
		}
	}
	public static function insertarProducto($POSTREQUEST){
		Producto::insertar($POSTREQUEST);
		header("Location: ./index.php?productos");
		die();
	}
	public static function eliminarProducto($GETREQUEST){
		Producto::eliminar($GETREQUEST['cod_producto']);
		header("Location: ./index.php?productos");
		die();
	}
	public static function editarProducto($POSTREQUEST){
		Producto::editar($POSTREQUEST);
		header("Location: ./index.php?productos");
		die();
	}	
	
}	