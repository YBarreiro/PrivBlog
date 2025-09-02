<?php 
require('modelo/functions.php');

$sesion=new Sesion;
$sesion->protegerIndex();

if(isset($_POST['enviar_registro'])){
	
	$validacion = new Validacion; 

	$validacion->validarRegistroUsuario();

	

	$error_nombre= Tool::getError('nombre');
	$error_email= Tool::getError('email');
	$error_pass= Tool::getError('pass');
	$error_pass2= Tool::getError('pass2');
	$error_fecha= Tool::getError('fecha');
	
	if(!isset($_POST['sexo'])){
		$error_sexo= Tool::getError('sexo');
	}	
	$error_terminos= Tool::getError('terminos'); 


	if (empty($error_nombre)&&empty($error_email)&&empty($error_pass)&&empty($error_pass2)&&empty($error_terminos)){

		

		$usuario=new Persona();
		
		$usuario_creado=$usuario->crearUsuario();

	

		
	}
}

require 'vista/registro.view.php';