<?php 
require('modelo/functions.php');

$sesion=new Sesion;
$sesion->protegerContenidoUsuario(); 

Entrada::borrarEntrada($_GET['id']);

header("Location:contenido.php");