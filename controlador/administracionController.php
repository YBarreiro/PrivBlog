<?php  

require('modelo/functions.php');

$sesion=new Sesion;

$sesion->protegerContenidoAdmin();


$estadistica=new Estadistica; 


$numero_usuarios=$estadistica->numeroUsuarios(); 

$numero_hombres=$estadistica->numeroHombres();

$numero_mujeres=$estadistica->numeroMujeres();

$numero_tramo1=$estadistica->numeroTramoEdad1();

$numero_tramo2=$estadistica->numeroTramoEdad2();

$numero_tramo3=$estadistica->numeroTramoEdad3();

$numero_tramo4=$estadistica->numeroTramoEdad4();


require 'vista/administracion.view.php';
 ?>