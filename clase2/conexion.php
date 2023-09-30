<?php
/* Patron Singleton */
class Conexion { 
	protected static $instance = null; 
	protected static $hostname 	=	'localhost';
	protected static $username 	= 	'root';
	protected static $password	= 	'';
	protected static $dbname 	= 	'phpdb';
	/** * Make constructor private, so nobody can call "new Class". */
	private function __construct() {} 
	/** * Make clone magic method private, so nobody can clone instance. */ 
	private function __clone() {}

	/* Como es estatica es un metodo a nivel de clase, no hace falta instanciar el objeto, de hecho no se puede instanciar como se menciona arriba,
		ya que se hizo privado el constructor	*/
	public static function getInstance() { 
	   if (!isset(self::$instance)) { 
	   self::$instance = new PDO("mysql:host=".self::$hostname.";dbname=".self::$dbname, self::$username, self::$password); 
	   } 
	 return self::$instance; 
	}
}