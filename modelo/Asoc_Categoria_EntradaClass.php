<?php 

class Asoc_Categoria_Entrada{  



	public static function getIdsCategorias($id_entrada){
																
		$statement=Tool::conectarBase()->query("SELECT id_categoria FROM asoc_categoria_entrada WHERE id_entrada=".$id_entrada."");	
		return $statement->fetchAll(); 

		}

	public static function getNombreCategoria($id_categoria){

		$statement=Tool::conectarBase()->query("SELECT nombre FROM categoria WHERE id=".$id_categoria."");
		return $statement->fetch();
	}


	public static function getIdsEntradas($id_categoria){

	$statement=Tool::conectarBase()->query("SELECT id_entrada FROM asoc_categoria_entrada WHERE id_categoria=".$id_categoria."");
	return $statement->fetchAll();

	}


	public static function asociarCategoriaEntrada($nombre_categoria, $id_entrada){
		$statement=Tool::conectarBase()->query("SELECT id FROM categoria WHERE nombre='".$nombre_categoria."'");
		$id_categoria=$statement->fetch(PDO::FETCH_OBJ);

		$statement2=Tool::conectarBase()->query("INSERT INTO asoc_categoria_entrada VALUES (".$id_categoria->id.",".$id_entrada.")");
		}


	public static function borrarAsoc($id_categoria, $id_entrada){
	
$statement=Tool::conectarBase()->query("DELETE  FROM asoc_categoria_entrada WHERE id_categoria=".$id_categoria." AND id_entrada=".$id_entrada."");
}

//Obtiene el número de entradas asociadas a una categoría

	public static function getNumeroEntradasCategorias($id_categoria){
		
		$statement=Tool::conectarBase()->query("SELECT COUNT(id_categoria) FROM asoc_categoria_entrada WHERE id_categoria=$id_categoria");
		return $statement->fetch();
	}




}
?>