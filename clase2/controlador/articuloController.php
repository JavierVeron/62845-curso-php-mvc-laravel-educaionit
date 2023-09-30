<?php
include_once "./modelo/articulo.php";
include_once './vista/articuloVista.php';

class articuloController {
    public static function renderArticulos() {
        $articulos = Articulo::getAll();
		$articuloVista = new articuloVista();
		$vistaAdevolver = $articuloVista->vistaListadoArticulos($articulos);
		return $vistaAdevolver;
    }

    public static function renderArticulosByName($request) {
        $articulos = Articulo::getArticulosByName($request);
		$articuloVista = new articuloVista();
		$vistaAdevolver = $articuloVista->vistaListadoArticulos($articulos);
		return $vistaAdevolver;
    }

    public static function renderArticulosByRange($request) {
        $articulos = Articulo::getArticulosByRange($request);
		$articuloVista = new articuloVista();
		$vistaAdevolver = $articuloVista->vistaListadoArticulos($articulos);
		return $vistaAdevolver;
    }
}