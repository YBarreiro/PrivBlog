<?php 

require ('modelo/functions.php');


$sesion=new Sesion;
$sesion->protegerContenidoAdmin();


$fecha= Persona::getfechaRegistro();

$email=Persona::getEmail(); 






require 'vista/perfil-admin.view.php';
 ?>