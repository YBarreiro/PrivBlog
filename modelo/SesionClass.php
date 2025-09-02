<?php 

class Sesion{




	private $nombre;
	private $pass;

	private $perfil;


	public function __construct(){


		if(isset($_POST['nombre'])){
			$this->nombre=$_POST['nombre'];
		}
		if(isset($_POST['pass'])){
			$this->pass=$_POST['pass'];
		}
	}



	public function iniciarSesion(){
		if(empty(Tool::getError("login"))){

			$_SESSION['nombre']=$this->nombre;
		}
	}


	public function getPerfil(){ 
		$statement=Tool::conectarBase()->query("SELECT perfil FROM persona WHERE nombre='".$_SESSION['nombre']."'");
		$resultado=$statement->fetch(PDO::FETCH_OBJ);
		return $this->perfil=$resultado->perfil;
	}

	public function redirigir(){
		echo $this->getPerfil();
		if($this->perfil=="usuario"){
				header('Location:contenido.php');
			}else{
				header('Location:administracion.php');
			}
		}   



	public function protegerIndex(){ 
		session_start();
		if(isset($_SESSION['nombre'])){
			if($this->getPerfil()=="usuario"){
				header("Location:contenido.php");
			}elseif($this->getPerfil()=="administrador"){
				header("Location:administracion.php");
			}
		}
	}


	public static function cerrarSesion(){
		session_start();
		if(isset($_SESSION['nombre'])){
			session_unset();
			session_destroy();
			header("Location:index.php");
		}else{
			header("Location:index.php");
		}
	}





	public function protegerContenidoUsuario(){
		session_start();

		if(!$_SESSION['nombre']){
			header("Location:index.php");
		}elseif($this->getPerfil()=="administrador"){
			header("Location:administracion.php");
			}
		}
		
	

	public function protegerContenidoAdmin(){
		session_start();

		if(!$_SESSION['nombre']){
			header("Location:index.php");
		}elseif($this->getPerfil()=="usuario"){
			header("Location:contenido.php");
		}
	}
		
	



}
?>