<?php 

require('modelo/functions.php');

$sesion=new Sesion;
$sesion->protegerContenidoUsuario(); 

$categoria=new Categoria;

$categoria->borrarCategoria($_GET['id']);

header("Location:archivo-categorias.php");


require('vista/borrar-categoria.view.php');

 ?>