<?php
/* Clase común y corriente */
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
	 return new PDO("mysql:host=".self::$hostname.";dbname=".self::$dbname, self::$username, self::$password);  
	}
}
/* Patron Singleton */
class SingletonConexion { 
	public static $instance = null; 
	public static $hostname 	=	'localhost';
	public static $username 	= 	'root';
	public static $password	= 	'';
	public static $dbname 	= 	'phpdb';
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
echo 'No singleton<br>';
$conexion1 = Conexion::getInstance();
$conexion2 = Conexion::getInstance();
$conexion3 = Conexion::getInstance();
var_dump($conexion1);echo'<br>';
var_dump($conexion2);echo'<br>';
var_dump($conexion3);echo'<br>';

echo '<br>------<br>';

echo 'Singleton<br>';
$conexion1 = SingletonConexion::getInstance(); // Verifica si no está creada la instancia, la crea
$conexion2 = SingletonConexion::getInstance(); // Verifica si está creada, y utliza la instancia creada
$conexion3 = SingletonConexion::getInstance(); // Verifica si está creada, y utliza la instancia creada
var_dump($conexion1);echo'<br>';
var_dump($conexion2);echo'<br>';
var_dump($conexion3);echo'<br>';