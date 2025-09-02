<?php

require ('modelo/functions.php');

$sesion=new Sesion;
$sesion->protegerContenidoUsuario(); 

$categorias_usuario=Categoria::getCategoriasUsuario();

	if(isset($_POST['crear_categoria'])){
		$titulo=$_POST['titulo'];
		$texto=$_POST['texto'];
		$categoria=new Categoria;
		$categoria->validarCategoria();
		$errores_categoria=Tool::getError("categoria");
		if (empty($errores_categoria)){
			$nueva_categoria=$categoria->crearCategoria();
			$categorias_usuario=Categoria::getCategoriasUsuario();
		}
	}


	if(isset($_POST['crear_entrada'])){
		
		$entrada=new Entrada;
		if(!empty($_FILES['imagen']['name'])){
			$entrada->validarImagen();
			$errores_imagen=Tool::getError("imagen");
			//echo $errores_imagen;
			}
		if(empty($errores_imagen)){
			$entrada->crearEntrada();
			$id=$entrada->getLastId();
			

				if(isset($_POST['categorias'])){
					$categorias=$_POST['categorias'];
					for($i=0; $i<(count($categorias)); $i++){
					Asoc_Categoria_Entrada:: asociarCategoriaEntrada($categorias[$i], $id);
				}

				
		}

		header("Location:single.php?id=$id");

	}

		}


require 'vista/nuevo.view.php';
 ?>
