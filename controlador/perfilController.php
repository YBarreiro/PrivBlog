<?php 

require ('modelo/functions.php');

$sesion=new Sesion;


session_start();


$perfil=$sesion->getPerfil();

$fecha= Persona::getfechaRegistro();

$email=Persona::getEmail(); 






require 'vista/perfil.view.php';
 ?>