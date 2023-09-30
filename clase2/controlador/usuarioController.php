<?php
include_once "./modelo/usuario.php";
include_once './vista/usuarioVista.php';

class usuarioController {
    public static function renderUsuarios() {
        $usuarios = Usuario::getAll();
		$usuarioVista = new usuarioVista();
		$vistaAdevolver = $usuarioVista->vistaListadoUsuarios($usuarios);
		return $vistaAdevolver;
    }

    public static function renderUsuariosById($request) {
        $usuarios = Usuario::getUsuarioById($request);
		$usuarioVista = new usuarioVista();
		$vistaAdevolver = $usuarioVista->vistaListadoUsuarios($usuarios);
		return $vistaAdevolver;
    }

    public static function formularioUsuario() {
		$usuarioVista = new usuarioVista();
		$vistaAdevolver = $usuarioVista->vistaFormularioUsuario();
		return $vistaAdevolver;
    }

    public static function crearUsuario($request) {
        Usuario::crear($request);
        $usuarios = Usuario::getAll();
		$usuarioVista = new usuarioVista();
		$vistaAdevolver = $usuarioVista->vistaListadoUsuarios($usuarios);
		return $vistaAdevolver;
    }

    public static function eliminarUsuario($request) {
        $usuarios = Usuario::eliminar($request);
		$usuarioVista = new usuarioVista();
		$vistaAdevolver = $usuarioVista->vistaListadoUsuarios($usuarios);
		return $vistaAdevolver;
    }
}