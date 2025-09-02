<?php 
require('modelo/functions.php'); 

$sesion=new Sesion;
$sesion->protegerContenidoUsuario(); 

$archivo=new ArchivoEntradas(2);


$anyos=$archivo->getAnyos();


require('vista/archivo-entradas.view.php');