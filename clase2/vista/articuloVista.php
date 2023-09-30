<?php

class articuloVista {
    public function vistaListadoArticulos($articulos) {
        $templateproductos = $this->armarListado($articulos);
		return $templateproductos;
	}	
	
	public function armarListado($articulos) {
		$tabla = file_get_contents('./vista/template_listadoArticulo.html');	
		$contenido_tabla = '';		
		foreach($articulos as $articulo){
            $contenido_tabla .= '<div class="col-md-4">
                <div class="card border border-0 text-center">
                    <img src="' .$articulo['imagen'] .'" alt="' .$articulo['nombre'] .'">
                    <div class="card-body">
                        <p class="card-text"><b>' .$articulo['nombre'] .'</b><br>$' .$articulo['precio'] .'</p>
                    </div>
                </div>
            </div>';
        }
		
		$tabla = str_replace('{contenido_articulos}',$contenido_tabla,$tabla);
		
		return $tabla;
	}
}