<?php 


class Entrada{ 

	private $carpeta_destino;
	private $archivo_subido;
	private $id_entrada;

	private$id_categoria;



public function __construct(){ 

	if(isset($_POST['titulo'])){
		$this->titulo=$_POST['titulo'];
	}
	if(isset($_POST['texto'])){
		$this->texto=$_POST['texto'];
	}
	if(isset($_POST['categorias'])){
		$this->categorias=$_POST['categorias'];
	}
	if(isset($_FILES['imagen'])){
		$this->imagen=$_FILES['imagen']['name'];;
	}

}

	public static function getEntradas(){ 

		$statement=Tool::conectarBase()->query("SELECT * FROM entrada WHERE autor='".$_SESSION['nombre']."' ORDER BY fecha DESC");
		return $statement->fetchAll();
	}


	public static function getEntrada($id_entrada){

		$statement=Tool::conectarBase()->query("SELECT * FROM entrada WHERE id=".$id_entrada."");
		return $statement->fetch();
	}


	public function validarImagen(){
			//Con getimagesize() obtenemos las propiedades de la imagen si esta lo es, y "false" si el archivo subido no es una imagen. 
			//Ponemos @ delante para evitar un posible error de tipo Notice.
			$check=@getimagesize($_FILES['imagen']['tmp_name']);
			if ($check!==false) {
				$this->carpeta_destino='fotos/';
				$this->archivo_subido=$this->carpeta_destino.$_FILES['imagen']['name'];
				if($_FILES['imagen']['size']>1048576){
						Tool::setError("imagen", "El archivo pesa demasiado. El peso máximo permitido para el archivo es de 1MB.");
						}else{
							Tool::setError("imagen", "");
						//Con la función "move_uploaded_file" pasamos la imagen de la ubicación temporal a la carpeta donde guardamos las imágenes.
						move_uploaded_file($_FILES['imagen']['tmp_name'], $this->archivo_subido);
						}
				}else{
				 Tool::setError("imagen", "El archivo no es una imagen.");
				}
			}
	//}			
		


		public function crearEntrada(){
			$statement=Tool::conectarBase()->prepare("INSERT INTO entrada (titulo, texto, autor, imagen) VALUES (:titulo, :texto, :autor, :imagen)");
			$statement->execute(array(':titulo'=>$this->titulo, ':texto'=>$this->texto,':autor'=>$_SESSION['nombre'], ':imagen'=>$this->imagen));
			$this->id_entrada=Tool::$conexion->lastInsertId();
		}


	public function getLastId(){
		return $this->id_entrada;
	}

	public function getIdEntrada(){
		return $this->id_entrada;
	}


public static function borrarEntrada($id_entrada){ 

			$statement=Tool::conectarBase()->query("DELETE FROM entrada WHERE id=".$id_entrada."");
			
		}	



	public function actualizarEntrada(){

		if(!empty($this->imagen)){

	$statement=Tool::conectarBase()->prepare("UPDATE entrada SET titulo=:titulo, texto=:texto, autor=:autor, imagen=:imagen WHERE id=:id");
	$statement->execute(array(
		':titulo'=>$this->titulo,
		':texto'=>$this->texto,
		':autor'=>$_SESSION['nombre'],
		':imagen'=>$this->imagen,
		':id'=>$_POST['id']
	));

	}

	else{
		echo "ldskfnls";
		$statement=Tool::conectarBase()->prepare("UPDATE entrada SET titulo=:titulo, texto=:texto, autor=:autor WHERE id=:id");
	$statement->execute(array(
		':titulo'=>$this->titulo,
		':texto'=>$this->texto,
		':autor'=>$_SESSION['nombre'],
		':id'=>$_POST['id']
	));

	}
	}


}
 ?>