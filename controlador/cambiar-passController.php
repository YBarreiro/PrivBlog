<?php 
require('modelo/functions.php'); 

$sesion=new Sesion;

session_start();
$perfil=$sesion->getPerfil();
 
if(isset($_POST['cambiar_pass'])){  

	$validacion=new Validacion;
	$validacion->validarPass();
	$validacion->validarPass2();

	$validacion->validarPassConectado();

	$errores_pass= Tool::getError('pass');
	$errores_pass2= Tool::getError('pass2');
	$errores_pass_correcto= Tool::getError('pass_correcto');

	if((empty($errores_pass)&&empty($errores_pass2)&&empty($errores_pass_correcto))){

		$persona=new Persona;
		$resultado=$persona->actualizarPass();

		if($resultado>0){
			$exito="La contraseña ha sido cambiada";
		}else{
			$error="La contraseña no ha podido cambiarse";
		}
		
		}
	

}



require('vista/cambiar-pass.view.php');