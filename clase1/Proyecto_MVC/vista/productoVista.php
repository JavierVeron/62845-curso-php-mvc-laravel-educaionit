<?php
/* Vista - Interfaz de usuario */ 

class productoVista {
	
	public function vistaListadoProductos($productos){
		$templateproductos = $this->armarListado($productos);
		return $templateproductos;
	}
	
	public function armarListado($productos){
		
		$tabla=file_get_contents('./vista/template_listado.html');	
		$contenido_tabla='';	
		foreach($productos as $producto){
		$contenido_tabla.="<tr>
								<td>".$producto['cod_producto']."</td>
								<td>".$producto['cod_categoria']."</td>
								<td>".$producto['nombre']."</td>
								<td>$".$producto['precio']."</td>
								<td>".$producto['stock']."</td>
							</tr>
							";
		}
		
		$tabla = str_replace('{contenido_tabla}',$contenido_tabla,$tabla);
		
		return $tabla;
	}
}	