 <?php 

require_once('modelo/functions.php');  

$sesion=new Sesion;
$sesion->protegerContenidoUsuario(); 

if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id=$_POST['id'];
}

$entrada_vieja=Entrada::getEntrada($id);  



$categorias_no_usadas=Categoria::getCategNoUsadas($id);  

$ids_categorias_viejas=Asoc_Categoria_Entrada::getIdsCategorias($id);


	if(isset($_POST['crear_categoria'])){ 
		$titulo=$_POST['titulo'];
		$texto=$_POST['texto'];
		$categoria=new Categoria;
		$categoria->validarCategoria();
		$errores_categoria=Tool::getError("categoria");
		if (empty($errores_categoria)){
			$nueva_categoria=$categoria->crearCategoria();
			$categorias_no_usadas=Categoria::getCategNoUsadas($id);
			
		}
	}






	if(isset($_POST['editar_entrada'])){

		$entrada=new Entrada;

		echo $entrada_vieja['imagen'];

		if(!empty($_FILES['imagen']['name'])){
			$entrada->validarImagen();
			$errores_imagen=Tool::getError("imagen");
			echo $errores_imagen;
			}
		if(empty($errores_imagen)){
			$entrada->actualizarEntrada();
			//$id=$entrada->getLastId();

			

			echo $_POST['titulo'];

		
			

				if(isset($_POST['categorias'])){
					$categorias=$_POST['categorias'];



					for($i=0; $i<(count($categorias)); $i++){
					Asoc_Categoria_Entrada:: asociarCategoriaEntrada($categorias[$i], $id);
				}

				
		}


}

echo $_FILES['imagen']['name'];
	
	header("Location:single.php?id=$id");
	}

		 	




require('vista/editar-entrada.view.php');