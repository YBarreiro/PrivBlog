<?php 
require ('modelo/functions.php');

$sesion=new Sesion;
$sesion->protegerContenidoUsuario(); 


$ids_categorias=Categoria::getIdsCategorias(); 

if(isset($_POST['anadir_categoria'])){ 

	$categoria=new Categoria;

	$categoria->validarCategoria(); 

	$errores_categoria=Tool::getError("categoria");
	

	if(empty($errores_categoria)){
		$exito=$categoria->crearCategoria();
		$ids_categorias=Categoria::getIdsCategorias(); 
	}

}


require('vista/archivo-categorias.view.php');

?>