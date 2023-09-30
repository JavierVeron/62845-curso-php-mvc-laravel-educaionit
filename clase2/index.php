<?php
require './controlador/productoController.php';
require './controlador/articuloController.php';
require './controlador/usuarioController.php';

/* Archivo de Simple estructura de rutas */
if(isset($_GET['hola']))
echo 'hola mundo';
if(isset($_GET['productos']))
echo productoController::armarProductos();
if(isset($_GET['formularioproducto']))
echo productoController::formularioProducto($_GET);
if(isset($_GET['eliminarProducto']))
productoController::eliminarProducto($_GET);
if(isset($_POST['insertarProducto']))
productoController::insertarProducto($_POST);
if(isset($_POST['editarProducto']))
productoController::editarProducto($_POST);

if(isset($_GET['articulos']))
echo articuloController::renderArticulos();
if(isset($_GET['articulosbyname']))
echo articuloController::renderArticulosByName($_GET);
if(isset($_GET['articulosbyrange']))
echo articuloController::renderArticulosByRange($_GET);

if(isset($_GET['usuarios']))
echo usuarioController::renderUsuarios();
if(isset($_GET['usuariosbyid']))
echo usuarioController::renderUsuariosById($_GET);
if(isset($_GET['formulariousuario']))
echo usuarioController::formularioUsuario();
if(isset($_GET['crearusuario']))
echo usuarioController::crearUsuario($_POST);
if(isset($_GET['eliminarusuario']))
echo usuarioController::eliminarUsuario($_GET);

/* no se pasan parametros al ruteador */
if(empty($_GET) && empty($_POST))
echo productoController::armarProductos();
	
	