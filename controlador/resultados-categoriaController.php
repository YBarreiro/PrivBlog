<?php 
require_once('modelo/functions.php'); 

$sesion=new Sesion;
$sesion->protegerContenidoUsuario();


if(isset($_GET['id'])){
	$id_categoria=$_GET['id'];
}elseif($_POST['id']){
	$id_categoria=$_POST['id'];
}



$ids_entradas_categoria=Asoc_Categoria_Entrada::getIdsEntradas($id_categoria);


$nombres_categoria=Categoria::getNombresCategorias($id_categoria); 

if(isset($_POST['renombrar'])){

	$categoria= new Categoria;

	$categoria->validarCategoria();

	if(empty(Tool::getError("categoria"))){

		
		$categoria->actualizarCategoria($id_categoria);

	
	} 

	

	header("Location:resultados-categoria.php?id=$id_categoria"); 

 
}


require('vista/resultados-categoria.view.php');





