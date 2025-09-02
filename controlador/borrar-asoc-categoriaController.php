<?php 

require('modelo/functions.php');

$sesion=new Sesion;
$sesion->protegerContenidoUsuario(); 

Asoc_Categoria_Entrada::borrarAsoc($_GET['id'], $_GET['entrada']);


$id=$_GET['entrada'];


header("Location:editar-entrada.php?id=$id");


require('vista/borrar-categoria.view.php');

 ?>