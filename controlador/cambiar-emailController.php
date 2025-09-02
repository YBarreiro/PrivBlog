<?php 
require('modelo/functions.php'); 

$sesion=new Sesion;
session_start();

$perfil=$sesion->getPerfil();

if(isset($_POST['cambiar_email'])){  

$validacion=new Validacion;
		$validacion->validarEmail();
		$validacion->validarPassConectado();
		

	$errores_email= Tool::getError('email');

	$errores_pass= Tool::getError('pass_correcto');

	if(empty($errores_email)&&empty($errores_pass)){

		$persona=new Persona;

		$resultado=$persona->actualizarEmail();
	

	if($resultado>0){
		$exito="El email ha sido cambiado";
	}else{
		$exito="El email no ha podido actualizarse";
	}

	}
}


require('vista/cambiar-email.view.php');