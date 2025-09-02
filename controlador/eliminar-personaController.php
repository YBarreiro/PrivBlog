<?php 
require('modelo/functions.php');

$sesion=new Sesion;


session_start();

$persona=new Persona;

$persona->borrarPersona();

Sesion::cerrarSesion();

header("Location:usuario-borrado.php"); 
