<?php 

class Persona{

	private $nombre; 
	private $email;
	private $pass;
	private $pass_cifrado;
	private $pass2;
	private $fecha;
	private $sexo;

	private $pass_correcto;

	private $perfil="administrador";

	
	public function __construct(){

		if(isset($_POST['nombre'])){
		$this->nombre=$_POST['nombre'];
		}
		if(isset($_POST['email'])){
		$this->email=$_POST['email'];
		}
		if(isset($_POST['pass'])){
		$this->pass=$_POST['pass'];
		}
		if(isset($_POST['fecha'])){
		$this->fecha=$_POST['fecha'];
		}
		if(isset($_POST['sexo'])){
		$this->sexo=$_POST['sexo'];
		}
	}


	public function crearUsuario(){ 
		$statement=Tool::conectarBase()->prepare("INSERT INTO persona (nombre, pass, sexo, fecha_nacimiento, email) VALUES (:nombre, :pass, :sexo, :fecha, :email)");
		$usuario_creado=$statement->execute(array(
			':nombre'=>$this->nombre,
			':pass'=>password_hash($this->pass,PASSWORD_DEFAULT),
			':sexo'=>$this->sexo,
			':fecha'=>$this->fecha,
			':email'=>$this->email));
		return $usuario_creado;
	}



public function crearAdmin(){


$statement=Tool::conectarBase()->prepare("INSERT INTO persona (nombre, pass, perfil, email) VALUES (:nombre, :pass, :perfil, :email)");
	$admin_creado=$statement->execute(array(
		':nombre'=>$this->nombre,
		//':pass'=>$this->pass,
		':pass'=>password_hash($this->pass,PASSWORD_DEFAULT),
		':perfil'=>$this->perfil,
		':email'=>$this->email));
	return $admin_creado;
}

	public static function getfechaRegistro(){

		$statement=Tool::conectarBase()->query("SELECT fecha_registro FROM persona WHERE nombre='".$_SESSION['nombre']."'");
		return $statement->fetch();

	}


	public static function getEmail(){

		$statement=Tool::conectarBase()->query("SELECT email FROM persona WHERE nombre='".$_SESSION['nombre']."'");
		return $statement->fetch();
	}


	public function actualizarEmail(){
	
	   
		$statement=Tool::conectarBase()->prepare("UPDATE persona SET email=:email WHERE nombre='".$_SESSION['nombre']."'");
		$statement->execute(array(
			':email'=>$this->email 
		));
		return  $statement->rowCount();
	}


public function actualizarPass(){ 
		
		$statement=Tool::conectarBase()->prepare("UPDATE persona SET pass=:pass WHERE nombre='".$_SESSION['nombre']."'");
		$statement->execute(array(
			':pass'=>password_hash($this->pass, PASSWORD_DEFAULT)
		));

		return $statement->rowCount();
	}

	public function borrarPersona(){
		$statement=Tool::conectarBase()->query("DELETE FROM persona WHERE nombre='".$_SESSION['nombre']."'");
	}








}
?>