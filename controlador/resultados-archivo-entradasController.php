<?php 

require('modelo/functions.php');

$sesion=new Sesion;
$sesion->protegerContenidoUsuario();

	$resultadosArchivo= new ArchivoEntradas(2);

	$ano=$_GET['ano'];
	if(isset($_GET['mes'])){
		$mes=$_GET['mes'];

	}
	
	if(isset($mes)){
		$num_entradas=$resultadosArchivo->getNumeroEntradasMes($ano, $mes);	
	}else{
		$num_entradas=$resultadosArchivo->getEntradasAnyos($ano);
	}
	

$pagina_actual=$resultadosArchivo->getPaginaActual();
$inicio=$resultadosArchivo->getInicio();
$num_entradas_por_pagina=$resultadosArchivo->getNumEntradasPagina();
$total_paginas=$resultadosArchivo->getNumeroPaginas();




	$resultados=$resultadosArchivo->getTextoResultados(); 

	$entradas=$resultadosArchivo->getEntradasFecha($inicio, $num_entradas_por_pagina);
	



require 'vista/resultados-archivo-entradas.view.php';







 ?>