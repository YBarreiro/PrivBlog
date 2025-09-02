<!DOCTYPE html> 
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>PrivBlog</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script src="https://kit.fontawesome.com/79ab6478f3.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
	<!-- A grey horizontal navbar that becomes vertical on small screens -->
<nav class="navbar navbar-expand-sm bg-light d-flex justify-content-between">
	<!-- Brand/logo -->
  <a class="navbar-brand text-dark" href="index.php"><h4 >PrivBlog<i class="ml-2 fas fa-unlock-alt fa-sm" ></i></h4></a>

   <?php if (isset($_SESSION['nombre'])): ?>
    	<form class="form-inline ml-3" action="busqueda.php" method="GET">
    		<button class="boton_busqueda btn my-2" type="submit"><i class="fa fa-search" style="color:#17a2b8"></i></button>
      <input class="form-control" type="search" name="busqueda" placeholder="Buscar" aria-label="Search">
      
    </form>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="archivo-entradas.php">Archivo</a>
    </li>
    <li class="nav-item">
      <a class="nav-link mr-5 ml-3" href="archivo-categorias.php">Mis categorias</a>
    </li>
      
      <!-- Dropdown -->
    <li class="nav-item dropdown text-info">
      <a class="nav-link dropdown-toggle tex-info alternativa" href="#" id="navbardrop" data-toggle="dropdown" style="color:#17a2b8">
        <?php echo $_SESSION['nombre']; ?>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="perfil.php">Perfil</a>
        <a class="dropdown-item" href="cerrar-sesion.php">Cerrar sesión</a>
      </div>
    </li>
</ul>
  <?php endif ?>

<ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link mr-1s" href="faq.php">FAQ</a>
    </li>
    <li class="nav-item mr-5">
      <a class="nav-link" href="mailto:privblog@gmail.com">Contacto</a>
    </li>
  </ul>

</nav>
</header>








