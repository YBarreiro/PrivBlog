<?php  

require_once('modelo/functions.php');

$sesion=new Sesion;
$sesion->protegerIndex();


if (isset($_POST['enviar_login'])) {

	$validacion=new Validacion;

	$validacion->validarNombreVacio();
	$validacion->validarPassVacio();


	$error_usuario_vacio=Tool::getError('nombre_vacio');
	$error_pass_vacio=Tool::getError('pass_vacio');


	if(empty($error_usuario_vacio)&&empty($error_pass_vacio)){

			$validacion->validarDatos();
			$error_login=Tool::getError('login');
			if(empty($error_login)){

				$sesion=new Sesion;

				$sesion->iniciarSesion();

				$sesion->redirigir();
			}

			}

			}


require('vista/index.view.php');

 ?>