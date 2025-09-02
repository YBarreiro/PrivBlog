<?php  

include_once 'functions.php';

class Tool{

	/*private $db_nombre=DB_NOMBRE;
	private $db_host=DB_HOST;
	private $db_usuario=DB_USUARIO;
	private $db_pass=DB_PASS;*/

	public static $conexion;
	private $error_conexion;

	public static $errores=[];

	public static function setError($clave, $valor){
		self::$errores[$clave] = $valor;
	}

	public static function getError($clave){
		return self::$errores[$clave];
	}

	

	public static function conectarBase(){
		try {
			self::$conexion=new PDO("mysql:host=localhost; dbname=privblog", "root", "");
			return self::$conexion;
		} catch (PDOException $e) {
			//$error_conexion= $e->getMessage();
			//echo $error_conexion;
			header("Location:error_conexion.php");
		}
	}

	


	public static function convertirFecha($fecha){
		$timestamp = strtotime($fecha);
		$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
		$dia = date('d', $timestamp);
		// Ponemos -1 porque los meses en la funcion date empiezan desde el 1
		$mes = date('m', $timestamp) - 1;
		$year = date('Y', $timestamp);
		$fecha = $dia .' de '. $meses[$mes] .' del '. $year;
		return $fecha;
	}

	public static function limpiarDatos($datos){
		$datos = trim($datos);
		$datos = stripslashes($datos);
		$datos = htmlspecialchars($datos);
		return $datos;
	}


















}