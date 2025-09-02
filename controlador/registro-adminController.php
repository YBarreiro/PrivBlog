<?php 

require_once ('modelo/functions.php');


$sesion=new Sesion;
$sesion->protegerContenidoAdmin();


if (isset($_POST['enviar_registro'])) { 

	$validacion=new Validacion;

	$validacion->validarRegistroAdmin();

	$errores_nombre= Tool::getError('nombre');
	$errores_email= Tool::getError('email');
	$errores_pass= Tool::getError('pass');
	$errores_pass2= Tool::getError('pass2');

	if(empty($errores_nombre)&&empty($errores_email)&&empty($errores_pass)&&empty($errores_pass2)){

	
		$persona=new Persona;
	$admin_creado=$persona->crearAdmin();


	}


	

	
}

require 'vista/registro-admin.view.php';