<?php 
require('modelo/functions.php'); 

$sesion=new Sesion;
$sesion->protegerContenidoUsuario();   

$busqueda=new Busqueda(2);

$terminos_busqueda=$_GET['busqueda'];

$num_entradas=$busqueda->getNumeroTotalEntradas();

$pagina_actual=$busqueda->getPaginaActual();
$inicio=$busqueda->getInicio();
$num_entradas_por_pagina=$busqueda->getNumEntradasPagina(); 


$resultados=$busqueda->getBusqueda($terminos_busqueda, $inicio, $num_entradas_por_pagina); 

$busqueda->setCabeceraBusqueda();

$cabecera=$busqueda->getCabeceraBusqueda();

$total_paginas=$busqueda->getNumeroPaginas();





require ('vista/busqueda.view.php');