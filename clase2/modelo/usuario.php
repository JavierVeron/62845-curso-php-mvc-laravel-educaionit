<?php
include_once './conexion.php';

class Usuario {
    public static function getAll() {
        $conexionpdo = Conexion::getInstance();
		$stmt = $conexionpdo->query("SELECT * FROM usuarios order by id asc");
		return $stmt->fetchAll();
    }

    public static function getUsuarioById($request) {
        $id = $request["id"];
        $conexionpdo = Conexion::getInstance();
		$stmt = $conexionpdo->query("SELECT * FROM usuarios WHERE (id = $id) order by id asc");
		return $stmt->fetchAll();
    }

    public static function crear($request) {
        $nombre = $request["nombre"];
        $apellido = $request["apellido"];
        $email = $request["email"];
        $clave = md5($request["clave"]);
        $conexionpdo = Conexion::getInstance();
        $sql = "INSERT INTO usuarios (nombre, apellido, email, clave) VALUES ('$nombre', '$apellido', '$email', '$clave')";
		$stmt = $conexionpdo->query($sql);
		return $stmt->fetchAll();
    }

    public static function eliminar($request) {
        $id = $request["id"];
        $conexionpdo = Conexion::getInstance();
        $sql = "DELETE FROM usuarios WHERE id = $id";
		$stmt = $conexionpdo->query($sql);
        $stmt = $conexionpdo->query("SELECT * FROM usuarios order by id asc");
		return $stmt->fetchAll();
    }
}