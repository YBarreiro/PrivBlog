<?php 


class Categoria { 
 

	protected $nueva_categoria;   


	public $idCategoria; 
	private $titulo;
	private $texto;
	private $id_entrada;



	public function __construct(){

		if(isset($_POST['nueva_categoria'])){
			$this->nueva_categoria=$_POST['nueva_categoria'];
		}
		
	}



	public static function getCategNoUsadas($id_entrada){ 
		$statement=Tool::conectarBase()->query("SELECT nombre FROM categoria WHERE autor='".$_SESSION['nombre']."' AND id NOT IN (SELECT id_categoria FROM asoc_categoria_entrada WHERE id_entrada='".$id_entrada."') ORDER BY nombre");
		return $statement->fetchAll();
	}

	public function validarCategoria(){
		$this->validarCategoriaVacia();
		$this->validarExisteCategoria();
	}



	public function validarCategoriaVacia(){
		if(empty($this->nueva_categoria)){
			Tool::setError("categoria", "La categoría no puede estar vacía.");
		}else{
			Tool::setError("categoria", "");
		}
	}

	public function validarExisteCategoria(){
		$statement=Tool::conectarBase()->prepare("SELECT * FROM categoria WHERE nombre=:categoria AND autor=:usuario");
 		$statement->execute(array(':categoria'=>$this->nueva_categoria, ':usuario'=>$_SESSION['nombre']));
 		$resultado=$statement->fetch();
 		if ($resultado){
 			Tool::setError("categoria", "La categoría ya está establecida.");
 			
 		}	
	}

 public function crearCategoria(){

 	$statement=Tool::conectarBase()->prepare("INSERT INTO categoria (nombre, autor) VALUES(:categoria, :autor)");
 	$statement->execute(array(':categoria'=>$this->nueva_categoria, ':autor'=>$_SESSION['nombre']));
 	return $statement;

 }

 	public static function getCategoriasUsuario(){ 

 	$statement=Tool::conectarBase()->query("SELECT nombre FROM categoria WHERE autor='".$_SESSION['nombre']."' ORDER BY nombre");
 	return $statement->fetchAll();

 }


public static function getNombresCategoriasViejas($id_categoria){

		

		$statement=Tool::conectarBase()->query("SELECT nombre FROM categoria WHERE id=".$id_categoria."");
		return $statement->fetchAll(PDO::FETCH_NUM);
	}

//Obtiene los nombres de las categorías ya asociadas a una entrada a partir de los ids de estas. 
//Los necesitaremos para el editor de entradas.

public static function getCategoriasViejas($ids_categorias_viejas){
	$contador=0;
	foreach($ids_categorias_viejas as $id_categoria_vieja){
		$nombres_categorias=self::getNombresCategoriasJuntar($id_categoria_vieja[0]);
		foreach($nombres_categorias as $nombre_categoria){
			$categorias_viejas[$contador]=$nombre_categoria[0];
			$contador++;
			}
		}
return $categorias_viejas;
}


public static function getIdsCategorias(){

 	

 	$statement=Tool::conectarBase()->query("SELECT id FROM categoria WHERE autor='".$_SESSION['nombre']."' ORDER BY nombre");
 	return $statement->fetchAll();

 }

 public static function getNombresCategorias($id_categoria){


		$statement=Tool::conectarBase()->query("SELECT nombre FROM categoria WHERE id=".$id_categoria."");
		return $statement->fetchAll();
	}



public function actualizarCategoria($id){

 	$statement=Tool::conectarBase()->query("UPDATE categoria SET nombre='".$this->nueva_categoria."' WHERE id=".$id."");


 }

 public function borrarCategoria($id){

 	
 	$statement=Tool::conectarBase()->query("DELETE FROM categoria WHERE id=".$id."");

 }





 public function borrarEntradas_categoria($id_categoria){
	$statement=Tool::conectarBase()->query("SELECT id_entrada FROM asoc_categoria_entrada WHERE id_categoria=".$id_categoria."");
	$resultados=$statement->fetchAll();
 	foreach($resultados as $resultado){
 		$statement2=Tool::conectarBase()->query("DELETE FROM entrada WHERE id=".$resultado[0]."");
 	}
 }




	


 }
?>	





