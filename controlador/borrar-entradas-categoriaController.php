<?php 

require('modelo/functions.php');

$sesion=new Sesion;
$sesion->protegerContenidoUsuario(); 

$categoria=new Categoria;

$categoria->borrarEntradas_categoria($_GET['id']);



$id=$_GET['id'];

header("Location:resultados-categoria.php?id=$id");
