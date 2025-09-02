<?php 

require_once('modelo/functions.php');

$sesion=new Sesion;
$sesion->protegerContenidoUsuario();


$entrada=Entrada::getEntrada($_GET['id']);


 require('vista/single.view.php');