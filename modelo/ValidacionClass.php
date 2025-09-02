<?php 

class Validacion{

	private $nombre;
	private $email;
	private $pass;
	private $pass2;
	private $fecha;
	private $sexo;
	private $terminos;

	private $pass_correcto;
	private $pass_comprobado;


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
		if(isset($_POST['pass2'])){
		$this->pass2=$_POST['pass2'];
		}
		if(isset($_POST['pass_correcto'])){
			$this->pass_correcto=$_POST['pass_correcto'];
		}
		if(isset($_POST['fecha'])){
		$this->fecha=$_POST['fecha'];
		}
		if(isset($_POST['sexo'])){
			$this->sexo=$_POST['sexo'];
		}
		if(isset($_POST_terminos)){
			$this->terminos=$_POST['terminos'];
		}
		
	}

	
	public function validarRegistroUsuario(){
		$this->validarNombre();
		$this->validarExisteNombre();
		$this->validarEmail();
		$this->validarPass();
		$this->validarPass2();
		$this->validarFecha();
		$this->validarSexo();
		$this->validarTerminos();
	}

	public function validarRegistroAdmin(){
		$this->validarNombre();
		$this->validarExisteNombre();
		$this->ValidarEmail();
		$this->ValidarPass();
		$this->validarPass2();
	}



public function validarNombre(){		
	$val=$this->nombre;
		if(empty($val)){
			  Tool::setError("nombre","Por favor, introduce tu nombre de usuario.");
		}
		elseif(!preg_match('/^[a-zA-Z0-9]{3,12}$/', $val)){ 
				Tool::setError("nombre", "Por favor, introduce un nombre de usuario válido.");
			}else{
				Tool::setError("nombre", "");
				}
	}
	

	public function validarExisteNombre(){
		
		$statement= Tool::conectarBase()->prepare("SELECT nombre FROM persona WHERE nombre=:nombre");
		$statement->execute(array(':nombre'=>$this->nombre));
		$nombre_existe=$statement->fetch();
		if($nombre_existe){
		Tool::setError("nombre", "El nombre de usuario ya existe.");
		}
	}

	public function validarNombreVacio(){

	if(empty($this->nombre)){
			Tool::setError("nombre_vacio","Por favor, introduce tu nombre de usuario.");
		}elseif(!empty($this->nombre)){
			Tool::setError("nombre_vacio", "");
		} 
	}

	public function validarPassVacio(){

	if(empty($this->nombre)){
			Tool::setError("pass_vacio","Por favor, introduce tu contraseña.");
		}elseif(!empty($this->nombre)){
			Tool::setError("pass_vacio", "");
		} 
	}



	/*public function validarDatos(){
		$statement=Tool::conectarBase()->prepare("SELECT * FROM persona WHERE nombre=:usuario");
		$statement->execute(array(':usuario'=>$this->nombre));
		$datos=$statement->fetch();
		if(!$datos||(password_verify($this->pass, $datos['pass']))){ 
			Tool::setError("login", "El nombre de usuario o la contraseña son incorrectos. Por favor, inténtalo de nuevo.");
		}else{
			Tool::setError("login", "");
		}
	}*/

	public function validarDatos(){
		$statement=Tool::conectarBase()->prepare("SELECT * FROM persona WHERE nombre=:usuario");
		$statement->execute(array(':usuario'=>$this->nombre));
		$datos=$statement->fetch();
		if(!$datos||!(password_verify($this->pass, $datos['pass']))){ 
			Tool::setError("login", "El nombre de usuario o la contraseña son incorrectos. Por favor, inténtalo de nuevo.");
		}else{
			Tool::setError("login", "");
		}
	}



	public function validarEmail(){
	$val=$this->email;
		if(empty($val)){
			  Tool::setError("email","Por favor, introduce una dirección de correo.");
		}elseif(!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/', $val)){
				Tool::setError("email", "Por favor, introduce una dirección de correo válida.");
			}else{
				Tool::setError("email", "");
			}
	}

	public function validarPass(){
	$val=$this->pass;
		if(empty($val)){
			  Tool::setError("pass","Por favor, introduce una contraseña.");
		} elseif(!preg_match('/^[a-zA-Z0-9]{3,12}$/', $val)){
				Tool::setError("pass", "Por favor, introduce una contraseña válida.");
			}else{
				Tool::setError("pass", "");
			}
	}

	public function validarPass2(){
	$val=$this->pass2;
		if(empty($val)){
			  Tool::setError("pass2","Por favor, introduce la contraseña de nuevo.");
		} elseif($this->pass!=$this->pass2){
				Tool::setError("pass2", "Las contraseñas no son iguales. Por favor, inténtalo de nuevo.");
			}else{
				Tool::setError("pass2", "");
			}
	}


	public function validarPassConectado(){

		$this->getPass();

		//echo $this->getPass();
		Tool::setError("pass_correcto", "");

		



	if(empty($this->pass_correcto)){
		
		Tool::setError("pass_correcto", "Por favor, introduce tu contraseña");
	}

	if ((!empty($this->pass_correcto))&&!(password_verify($this->pass_correcto, $this->pass_comprobado))/*($this->pass_correcto!=$this->pass_comprobado)*/){
		Tool::setError("pass_correcto", "La contraseña no es correcta. Por favor, inténtalo de nuevo.");
	}

	
}

public function getPass(){

		$statement=Tool::conectarBase()->query("SELECT pass FROM persona WHERE nombre='".$_SESSION['nombre']."'");
		return $this->pass_comprobado=$statement->fetch(PDO::FETCH_OBJ)->pass; //pasarlo a objeto!!!
		//$this->total_entradas=$statement->fetch(PDO::FETCH_OBJ)->total;
	}



	public function validarFecha(){
	$val=$this->fecha;
		if(empty($val)){
			  Tool::setError("fecha","Por favor, introduce tu fecha de nacimiento.");
		} else{
			  Tool::setError("fecha", "");
			}
	}

	public function validarSexo(){
		if(!isset($_POST['sexo'])){
			Tool::setError("sexo","Por favor, marca tu sexo.");
		}else{
			Tool::setError("sexo", "");
		}
	}

	public function validarTerminos(){
		if (!isset($_POST['terminos'])) {
			Tool::setError("terminos", "Por favor, acepta los términos y condiciones");
		}else{
			Tool::setError("terminos", "");
		}
	}


}
?>