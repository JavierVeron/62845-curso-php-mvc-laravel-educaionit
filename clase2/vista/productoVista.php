<?php
/* Vista - Interfaz de usuario */ 
class productoVista {
	
	
	
	public function vistaFormularioProducto($categorias,$tipo,$Producto=null){		
		if($tipo=='alta')
		$formulario = $this->armarFormularioAlta($categorias);
		if($tipo=='editar')
		$formulario = $this->armarFormularioEdicion($categorias,$Producto);
	
		return $formulario;
	}
	
	public function armarFormularioEdicion($categorias,$Producto){
		$formulario=file_get_contents('./vista/formularioedicion.html');
		
		$formulario = str_replace('{cod_producto}',$Producto['cod_producto'],$formulario);
		$formulario = str_replace('{nombre}',$Producto['nombre'],$formulario);
		$formulario = str_replace('{precio}',$Producto['precio'],$formulario);
		$formulario = str_replace('{stock}',$Producto['stock'],$formulario);
		
		$categorias_select='<select name="cod_categoria">';		
			foreach($categorias as $categoria){
				if($categoria['cod_categoria']==$Producto['cod_categoria'])
					$categorias_select.="<option selected value='".$categoria['cod_categoria']."'>".$categoria['descripcion']."</option>";
				else
				$categorias_select.="<option value='".$categoria['cod_categoria']."'>".$categoria['descripcion']."</option>";
			}
		$categorias_select.='</select>';	
		
		$formulario = str_replace('{categorias_select}',$categorias_select,$formulario);
		
		return $formulario;	
	}
	
	public function armarFormularioAlta($categorias){
		$formulario=file_get_contents('./vista/formularioalta.html');
		
		$categorias_select='<select name="cod_categoria">';		
			foreach($categorias as $categoria){
				$categorias_select.="<option value='".$categoria['cod_categoria']."'>".$categoria['descripcion']."</option>";
			}
		$categorias_select.='</select>';	
		
		$formulario = str_replace('{categorias_select}',$categorias_select,$formulario);
		
		return $formulario;	
		
	}
	
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
								<td>".$producto['precio']."</td>
								<td>".$producto['stock']."</td>
								<td>
								<a onClick=\"javascript: return confirm('Esta seguro que desea eliminar el producto ".$producto['nombre']."?');\" 
								   href='./index.php?eliminarProducto&cod_producto=".$producto['cod_producto']."'>Eliminar</a>
								<br>
								<a href='./index.php?formularioproducto&cod_producto=".$producto['cod_producto']."'>Editar</a></td>
							</tr>
							";
		}
		
		$tabla = str_replace('{contenido_tabla}',$contenido_tabla,$tabla);
		
		return $tabla;
	}
}	