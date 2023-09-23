<?php

class Conexion { 
	protected static $hostname 	=	'localhost';
	protected static $username 	= 	'root';
	protected static $password	= 	'';
	protected static $dbname 	= 	'phpdb';

	/* Como es estatica es un metodo a nivel de clase, no hace falta instanciar el objeto, de hecho no se puede instanciar como se menciona arriba,
		ya que se hizo privado el constructor	*/
	public static function getInstance() { 
	   return new PDO("mysql:host=".self::$hostname.";dbname=".self::$dbname, self::$username, self::$password); 
	}
}