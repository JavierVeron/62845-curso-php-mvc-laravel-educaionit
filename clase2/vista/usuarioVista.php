<?php
/* Vista - Interfaz de usuario */ 
class usuarioVista {	
	public function vistaListadoUsuarios($usuarios){
		$templateusuarios = $this->armarListado($usuarios);
		return $templateusuarios;
	}
	
	public function armarListado($usuarios){
		$tabla=file_get_contents('./vista/template_listadoUsuario.html');	
		$contenido_tabla='';		
		foreach($usuarios as $usuario){
		$contenido_tabla.="<tr>
			<td>".$usuario['id']."</td>
			<td>".$usuario['nombre']."</td>
			<td>".$usuario['apellido']."</td>
			<td>".$usuario['email']."</td>
			<td>".$usuario['clave']."</td>
			<td><a class='btn btn-danger btn-sm' onClick=\"javascript: return confirm('Esta seguro que desea eliminar el usuario ".$usuario['nombre'] .' ' .$usuario['apellido'] ."?');\" 
				href='./index.php?eliminarusuario&id=".$usuario['id']."'>Eliminar</a></td>
		</tr>";
		}
		
		$tabla = str_replace('{contenido_tabla}',$contenido_tabla,$tabla);
		
		return $tabla;
	}

	public function vistaFormularioUsuario() {
		$formulario = file_get_contents('./vista/formularioUsuario.html');		
				
		return $formulario;	
	}
}