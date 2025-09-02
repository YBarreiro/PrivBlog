<?php 
require_once('modelo/functions.php');

$sesion=new Sesion;

$sesion->protegerContenidoUsuario();  

$paginacion=new Paginacion(2);

$pagina_actual=$paginacion->getPaginaActual();
$inicio=$paginacion->getInicio();
$num_entradas_por_pagina=$paginacion->getNumEntradasPagina();
$total_paginas=$paginacion->getNumeroPaginas();

$entradas_usuario=$paginacion->getEntradas($inicio, $num_entradas_por_pagina); 


require 'vista/contenido.view.php';